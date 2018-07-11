$(function() {
    /**
     * Ativação do menu
     * @type {Location | string | any}
     */
    var url = window.location; // pega a url requisitada

    var nUrl = url.href.split("/"); // transforma a url em array

    // verifica se a array é maior que 4 e monta nova url
    if (nUrl.length > 4) {
        for (var i = 0; i < 5; i++) {
            if (i === 0) {
                url = nUrl[i] + "/";
            } else {
                url += nUrl[i] + "/";
            }
        }
        url = url.substring(0, url.length - 1); // remove última barra
    }

    $('ul.sidebar-menu a').filter(function() {
        return this.href == url;
    }).parent().addClass('active');

    $('ul.treeview-menu a').filter(function() {
        return this.href == url;
    }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

    /**
     * Validação de Formulário
     * @type {Array}
     */
    var fieldRequired = [];

    $('[required]').each(function() {
        fieldRequired.push($(this).attr('name'));
    });

    $.each(fieldRequired, function(name, index) {
        $('form').validate({
            rules: {
                index: "required"
            },
            errorElement: "small",
            highlight: function(element, errorClass, validClass) {
                for (var i = 1; i <= 12; i++) {
                    $(element).parents(".col-md-"+i).addClass("has-error").removeClass("has-success");
                }
            },
            unhighlight: function (element, errorClass, validClass) {
                for (var i = 1; i <= 12; i++) {
                    $(element).parents(".col-md-"+i).addClass("has-success").removeClass("has-error");
                }
            }
        });
    });

    /**
     * Evita multiplos click
     */
    $('form').submit(function() {
        $(this).submit(function() {
            return false;
        });
        return true;
    });

    $('#calendar').fullCalendar({
        themeSystem: 'bootstrap3',
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        eventLimit: true, // allow "more" link when too many events
        //events: 'https://fullcalendar.io/demo-events.json'
    });

    $('[data-toggle="tooltip"]').tooltip();

    $('#table').DataTable({
        responsive: true,
        autoWidth: false,
        language: {
            url: "/lib/datatables/language/pt-BR.json"
        }
    });

    /**
     * Input Mask
     */
    $('#desZip').mask(
        '00000-000', {
            placeholder: "_____-___",
            clearIfNotMatch: true,
            reverse: true
        }
    );

    var SPMaskBehavior = function(val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };
    $('.phone').mask(SPMaskBehavior, spOptions);
});
$(function() {
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
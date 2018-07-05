$(function() {

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

});
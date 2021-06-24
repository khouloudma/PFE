// Code goes here
$(document).ready(function() {

  // page is now ready, initialize the calendar...

  var calendar = $('#calendar').fullCalendar({
    // put your options and callbacks here
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'year,month,basicWeek,basicDay'

    },
    timezone: 'local',
    height: "auto",
    selectable: true,
    dragabble: true,
    defaultView: 'month',
    yearColumns: 3,

    durationEditable: true,
    bootstrap: false,

    

    
  })
});
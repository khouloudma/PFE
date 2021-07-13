<script src="../assets/js/core/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="crossorigin="anonymous"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>

  <script>
    $(document).ready(function() {
      $("#open_time_monday").css('visibility', 'hidden'); // to show
      $("#open_time_Tuesday").css('visibility', 'hidden'); // to show
      $("#open_time_Wednesday").css('visibility', 'hidden'); // to show
      $("#open_time_Thursday").css('visibility', 'hidden'); // to show
      $("#open_time_Friday").css('visibility', 'hidden'); // to show
      $("#open_time_Saturday").css('visibility', 'hidden'); // to show
      $("#open_time_Sunday").css('visibility', 'hidden'); // to show
      $("#break_monday").css('visibility', 'hidden'); // to show
      $("#break_Tuesday").css('visibility', 'hidden'); // to show
      $("#break_Wednesday").css('visibility', 'hidden'); // to show
      $("#break_Thursday").css('visibility', 'hidden'); // to show
      $("#break_Friday").css('visibility', 'hidden'); // to show
      $("#break_Saturday").css('visibility', 'hidden'); // to show
      $("#break_Sunday").css('visibility', 'hidden'); // to show

function getHora() {
    date = new Date();
    return date.getHours()+':'+date.getMinutes();
};
      $(function() {
  var $dp1 = $("#start_monday");
  $dp1.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),
    yearRange: "-100:+20",
  });
  var $dp2 = $("#end_monday");
  $dp2.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),
    yearRange: "-100:+20",
  });
  var $dp3 = $("#start_break_monday");
  $dp3.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),


    yearRange: "-100:+20",
  });
   $dp4 = $("#end_break_monday");
  $dp4.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),
    yearRange: "-100:+20",
  });

  var $dpT1 = $("#start_Tuesday");
  $dpT1.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),
    yearRange: "-100:+20",
  });
  var $dpT2 = $("#end_Tuesday");
  $dpT2.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),
    yearRange: "-100:+20",
  });
  var $dpT3 = $("#start_break_Tuesday");
  $dpT3.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),


    yearRange: "-100:+20",
  });
   $dpT4 = $("#end_break_Tuesday");
  $dpT4.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),
    yearRange: "-100:+20",
  });

  var $dpW1 = $("#start_Wednesday");
  $dpW1.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),
    yearRange: "-100:+20",
  });
  var $dpW2 = $("#end_Wednesday");
  $dpW2.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),
    yearRange: "-100:+20",
  });
  var $dpW2 = $("#start_break_Wednesday");
  $dpW2.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),


    yearRange: "-100:+20",
  });
   $dpW3 = $("#end_break_Wednesday");
  $dpW3.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),
    yearRange: "-100:+20",
  });

  var $dpTH1 = $("#start_Thursday");
  $dpTH1.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),
    yearRange: "-100:+20",
  });
  var $dpTH2 = $("#end_Thursday");
  $dpTH2.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),
    yearRange: "-100:+20",
  });
  var $dpTH3 = $("#start_break_Thursday");
  $dpTH3.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),


    yearRange: "-100:+20",
  });
   $dpTH4 = $("#end_break_Thursday");
  $dpTH4.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),
    yearRange: "-100:+20",
  });

  var $dpF1 = $("#start_Friday");
  $dpF1.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),
    yearRange: "-100:+20",
  });
  var $dpF2 = $("#end_Friday");
  $dpF2.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),
    yearRange: "-100:+20",
  });
  var $dpF3 = $("#start_break_Friday");
  $dpF3.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),


    yearRange: "-100:+20",
  });
   $dpF4 = $("#end_break_Friday");
  $dpF4.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),
    yearRange: "-100:+20",
  });

  var $dpS1 = $("#start_Saturday");
  $dpS1.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),
    yearRange: "-100:+20",
  });
  var $dpS2 = $("#end_Saturday");
  $dpS2.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),
    yearRange: "-100:+20",
  });
  var $dpS3 = $("#start_break_Saturday");
  $dpS3.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),


    yearRange: "-100:+20",
  });
   $dpS4 = $("#end_break_Saturday");
  $dpS4.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),
    yearRange: "-100:+20",
  });

  var $dpSU1 = $("#start_Sunday");
  $dpSU1.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),
    yearRange: "-100:+20",
  });
  var $dpSU2 = $("#end_Sunday");
  $dpSU2.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),
    yearRange: "-100:+20",
  });
  var $dpSU3 = $("#start_break_Sunday");
  $dpSU3.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),


    yearRange: "-100:+20",
  });
   $dpSU4 = $("#end_break_Sunday");
  $dpSU4.datepicker({
    changeYear: true,
    changeMonth: true,
      minDate:0,
      dateFormat: "yy-mm-dd "+getHora(),
    yearRange: "-100:+20",
  });

});
     $('#breaktime_monday').change(function(){
        $inputValue = $(this).val();
        if($inputValue=='Partial')
        {  $("#break_monday").css('visibility', 'visible'); // to show
}
        else{      $("#break").css('visibility', 'hidden'); // to show
}
    });
    $('#state_monday').change(function(){
        $Value = $(this).val();

      if($Value=='open time')
        {$("#open_time_monday").css('visibility', 'visible'); // to show*
          }else{$("#open_time_monday").css('visibility', 'hidden'); }
    });
    
    // monday 
    $('#breaktime_Tuesday').change(function(){
        $inputValue = $(this).val();
        if($inputValue=='Partial')
        {  $("#break_Tuesday").css('visibility', 'visible'); // to show
}
        else{      $("#break_Tuesday").css('visibility', 'hidden'); // to show
}
    });
    $('#state_Tuesday').change(function(){
        $Value = $(this).val();

      if($Value=='open time')
        {$("#open_time_Tuesday").css('visibility', 'visible'); // to show*
          }else{$("#open_time_Tuesday").css('visibility', 'hidden'); }
    });
    // Tuesday
    $('#breaktime_Wednesday').change(function(){
        $inputValue = $(this).val();
        if($inputValue=='Partial')
        {  $("#break_Wednesday").css('visibility', 'visible'); // to show
}
        else{      $("#break_Wednesday").css('visibility', 'hidden'); // to show
}
    });
    $('#state_Wednesday').change(function(){
        $Value = $(this).val();

      if($Value=='open time')
        {$("#open_time_Wednesday").css('visibility', 'visible'); // to show*
          }else{$("#open_time_Wednesday").css('visibility', 'hidden'); }
    });
    //wednesday

    $('#breaktime_Thursday').change(function(){
        $inputValue = $(this).val();
        if($inputValue=='Partial')
        {  $("#break_Thursday").css('visibility', 'visible'); // to show
}
        else{      $("#break_Thursday").css('visibility', 'hidden'); // to show
}
    });
    $('#state_Thursday').change(function(){
        $Value = $(this).val();

      if($Value=='open time')
        {$("#open_time_Thursday").css('visibility', 'visible'); // to show*
          }else{$("#open_time_Thursday").css('visibility', 'hidden'); }
    });
    //THursday
    $('#breaktime_Friday').change(function(){
        $inputValue = $(this).val();
        if($inputValue=='Partial')
        {  $("#break_Friday").css('visibility', 'visible'); // to show
}
        else{      $("#break_Friday").css('visibility', 'hidden'); // to show
}
    });
    $('#state_Friday').change(function(){
        $Value = $(this).val();

      if($Value=='open time')
        {$("#open_time_Friday").css('visibility', 'visible'); // to show*
          }else{$("#open_time_Friday").css('visibility', 'hidden'); }
    });
    // Friday

    $('#breaktime_Saturday').change(function(){
        $inputValue = $(this).val();
        if($inputValue=='Partial')
        {  $("#break_Saturday").css('visibility', 'visible'); // to show
}
        else{      $("#break_Saturday").css('visibility', 'hidden'); // to show
}
    });
    $('#state_Saturday').change(function(){
        $Value = $(this).val();

      if($Value=='open time')
        {$("#open_time_Saturday").css('visibility', 'visible'); // to show*
          }else{$("#open_time_Saturday").css('visibility', 'hidden'); }
    });
//Saturday
$('#breaktime_Sunday').change(function(){
        $inputValue = $(this).val();
        if($inputValue=='Partial')
        {  $("#break_Sunday").css('visibility', 'visible'); // to show
}
        else{      $("#break_Sunday").css('visibility', 'hidden'); // to show
}
    });
    $('#state_Sunday').change(function(){
        $Value = $(this).val();

      if($Value=='open time')
        {$("#open_time_Sunday").css('visibility', 'visible'); // to show*
          }else{$("#open_time_Sunday").css('visibility', 'hidden'); }
    });


    });</script>
    
    
    <script>
    
    function Monday() {
      var m= document.getElementById("Monday");
      var t = document.getElementById("Tuesday");
      var w = document.getElementById("Wednesday");
      var th = document.getElementById("Thursday");
      var f = document.getElementById("Friday");
      var sa = document.getElementById("Saturday");
      var su= document.getElementById("Sunday");
  if (  m.style.display == "none")//show none=hide
  {
      m.style.display = "block";  t.style.display = "none";w.style.display = "none";th.style.display = "none";f.style.display = "none";sa.style.display = "none";su.style.display = "none";} else {m.style.display = "none";}};
      function Tuesday() {
      var m= document.getElementById("Monday");
      var t = document.getElementById("Tuesday");
      var w = document.getElementById("Wednesday");
      var th = document.getElementById("Thursday");
      var f = document.getElementById("Friday");
      var sa = document.getElementById("Saturday");
      var su= document.getElementById("Sunday");
  if (  t.style.display == "none") {
      t.style.display = "block";  m.style.display = "none";w.style.display = "none";th.style.display = "none";f.style.display = "none";sa.style.display = "none";su.style.display = "none";} else {t.style.display = "none";}};
      function Wednesday() {
      var m= document.getElementById("Monday");
      var t = document.getElementById("Tuesday");
      var w = document.getElementById("Wednesday");
      var th = document.getElementById("Thursday");
      var f = document.getElementById("Friday");
      var sa = document.getElementById("Saturday");
      var su= document.getElementById("Sunday");
  if (  w.style.display == "none") {
      w.style.display = "block";  t.style.display = "none";m.style.display = "none";th.style.display = "none";f.style.display = "none";sa.style.display = "none";su.style.display = "none";} else {w.style.display = "none";}};
      function Thursday() {
      var m= document.getElementById("Monday");
      var t = document.getElementById("Tuesday");
      var w = document.getElementById("Wednesday");
      var th = document.getElementById("Thursday");
      var f = document.getElementById("Friday");
      var sa = document.getElementById("Saturday");
      var su= document.getElementById("Sunday");
  if (  th.style.display == "none") {
      th.style.display = "block";  t.style.display = "none";w.style.display = "none";m.style.display = "none";f.style.display = "none";sa.style.display = "none";su.style.display = "none";} else {th .style.display = "none";}};
      function Friday() {
      var m= document.getElementById("Monday");
      var t = document.getElementById("Tuesday");
      var w = document.getElementById("Wednesday");
      var th = document.getElementById("Thursday");
      var f = document.getElementById("Friday");
      var sa = document.getElementById("Saturday");
      var su= document.getElementById("Sunday");
  if (  f.style.display == "none") {
      f.style.display = "block";  t.style.display = "none";w.style.display = "none";th.style.display = "none";m.style.display = "none";sa.style.display = "none";su.style.display = "none";} else {f.style.display = "none";}};
      function Saturday() {
      var m= document.getElementById("Monday");
      var t = document.getElementById("Tuesday");
      var w = document.getElementById("Wednesday");
      var th = document.getElementById("Thursday");
      var f = document.getElementById("Friday");
      var sa = document.getElementById("Saturday");
      var su= document.getElementById("Sunday");
  if (  sa.style.display == "none") {
      sa.style.display = "block";  t.style.display = "none";w.style.display = "none";th.style.display = "none";f.style.display = "none";m.style.display = "none";su.style.display = "none";} else {sa.style.display = "none";}};
  function Sunday() {
      var m= document.getElementById("Monday");
      var t = document.getElementById("Tuesday");
      var w = document.getElementById("Wednesday");
      var th = document.getElementById("Thursday");
      var f = document.getElementById("Friday");
      var sa = document.getElementById("Saturday");
      var su= document.getElementById("Sunday");
  if (  su.style.display == "none") {
      su.style.display = "block";  t.style.display = "none";w.style.display = "none";th.style.display = "none";f.style.display = "none";sa.style.display = "none";m.style.display = "none";} else {su.style.display = "none";}};

    </script>
$(document).ready(function(){

    setInterval(function(){

      o = 1;

      $.ajax({
        type: "POST",
        url: "http://192.168.0.104/MZK/ajax/showDate",
        dataType : 'json',
        data: {
            ajax : 'showDate'
        },
        success: function(json) {
          $('#info-date').html(json.date);
          $('#info-hour').html(json.hour);
        },
        complete: function() {
        },
        error: function() {
        }
      });

    }, 5000);

});

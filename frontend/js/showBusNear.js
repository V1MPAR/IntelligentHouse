$(document).ready(function(){

    setInterval(function(){

      $.ajax({
        type: "POST",
        url: "http://192.168.0.104/MZK/ajax/showBusNear",
        dataType : 'json',
        data: {
            ajax : 'showBusNear'
        },
        success: function(json) {
          if ( json.rowCount != 0 ) {
            $('#busNearInfo').hide();
            $('#busNear').show();
            $('#busNear').html('');
            for ( i = 0; i < json.rowCount; i++ ) {
              $('#busNear').append('<tr><td>' + json.line[i] + '</td>' + '<td>' + json.route[i] + '</td>' + '<td>' + json.date[i] + '</td>' + '<td>' + json.stop[i] + '</td></tr>');
            }
          } else {
            $('#busNear').html('');
            $('#busNear').hide();
            $('#busNearInfo').show();
          }
        },
        complete: function() {
        },
        error: function() {
        }
      });

    }, 5000);

});

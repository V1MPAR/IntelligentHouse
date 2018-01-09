$(document).ready(function(){

  $('#back').on('click', function(){
    $('#lines').show();
    $('#subLines').hide();
    $('#back').hide();
    $('#subLines').attr('line', 0);
    $('#subLines').attr('subline', 0);
  });

    $('#lines li a').on('click', function(){

      $('#lines').hide();
      $('#back').show();

      $('#subLines').attr('line', $(this).attr('line')).show();
      $('#subLines').attr('subline', $(this).attr('subline'));
      var line = $('#subLines').attr('line');
      var subLine = $('#subLines').attr('subline');

      $('#subLines').find('li').each(function(){
        var current = $(this);
        if ( current.attr('line') == line && current.attr('subline') == subLine ) {
          current.show();
        } else {
          current.hide();
        }
      });

    });

    $('#subLines li a').on('click', function(){
      var line = $('#subLines').attr('line');
      var subLine = $(this).attr('subline');
      $('#timetable-tbody').html('');
      $.ajax({
        type: "POST",
        url: "http://192.168.0.104/MZK/ajax/showTimetable",
        dataType : 'json',
        data: {
            ajax : 'showTimetable',
            line : line,
            subline : subLine
        },
        success: function(json) {
          if ( json.rowCount != 0 ) {
            $('#timetable-info').hide();
            $('#timetable').show();
            $('#timetable-line').html(json.line[0]);
            $('#timetable-line-info').html(json.lineinfo);
            $('#timetable-line-route').html(subLine);
            for ( i = 0; i < json.rowCount; i++ ) {
              if ( json.hour[i] <= 9 ) {
                var hour = '0' + json.hour[i];
              } else {
                var hour = json.hour[i];
              }
              if ( json.minute[i] <= 9 ) {
                var minute = '0' + json.minute[i];
              } else {
                var minute = json.minute[i];
              }
              $('#timetable-tbody').append('<tr><td>' + hour + '</td><td>' + minute + '</td><td>' + json.exception[i] + '</td><td>' + json.stop[i] + '</td></tr>');
            }
          } else {
            $('#timetable').hide();
            $('#timetable-info').show();
          }
        },
        complete: function() {
        },
        error: function() {
        }
      });
    });

});

$(document).ready(function(){

      $.ajax({
        type: "POST",
        url: "http://192.168.0.104/MZK/ajax/showArticles",
        dataType : 'json',
        data: {
            ajax : 'showArticles'
        },
        success: function(json) {
          if ( json.rowCount != 0 ) {
            $('#articlesInfo').hide();
            for ( i = 0; i < json.rowCount; i++ ) {
              $('#articles').append(
                '<div class="col-md-12 article-title"><h1><a href="http://192.168.0.104/MZK/article/' + json.link[i] + '" class="article-link">' + json.title[i] + '</a></h1></div><div class="col-md-12 article-info"><div class="col-md-6"><i class="fa fa-clock-o"></i>' + json.date[i] + '</div><div class="col-md-6"><span class="label label-primary pull-right">' + json.tag[i] + '</span></div></div><div class="col-md-12 article-content-half"><p id="article-content-' + i + '">' + json.content[i] + '</p></div>');
                $("#article-content-" + i).each(function () {
                  var text = $(this).text();
                  if (text.length > 300) {
                    $(this).html(text.substr(0, text.lastIndexOf(' ', 197)) + '... - <a href="' + json.link[i] + '">czytaj dalej</a>');
                  }
                });
            }
          } else {
            $('#articlesInfo').show();
          }
        },
        complete: function() {
        },
        error: function() {
        }
      });

});


<div class="container">
  <div class="row">
    <div class="col-md-8">
      <footer>
          &copy; {{ @copyright }} - hyparec.com
      </footer>
    </div>
    <div class="col-md-4"></div>
  </div>
</div>

<include href="{{ '/templates/includes/basicModals.php' }}" />

    <script>
    	$(function() {
            
        });
    </script>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
      (function () {

        var $button = $("<div id='source-button' class='btn btn-primary btn-xs'>&lt; &gt;</div>").click(function () {
          var index = $('.bs-component').index($(this).parent());
          $.get(window.location.href, function (data) {
            var html = $(data).find('.bs-component').eq(index).html();
            html = cleanSource(html);
            $("#source-modal pre").text(html);
            $("#source-modal").modal();
          })

        });

        $('.bs-component [data-toggle="popover"]').popover();
        $('.bs-component [data-toggle="tooltip"]').tooltip();

        $(".bs-component").hover(function () {
          $(this).append($button);
          $button.show();
        }, function () {
          $button.hide();
        });

        function cleanSource(html) {
          var lines = html.split(/\n/);

          lines.shift();
          lines.splice(-1, 1);

          var indentSize = lines[0].length - lines[0].trim().length,
              re = new RegExp(" {" + indentSize + "}");

          lines = lines.map(function (line) {
            if (line.match(re)) {
              line = line.substring(indentSize);
            }

            return line;
          });

          lines = lines.join("\n");

          return lines;
        }

        $(".icons-material .icon").each(function () {
          $(this).after("<br><br><code>" + $(this).attr("class").replace("icon ", "") + "</code>");
        });

      })();

    </script>
    <script src="/js/ripples.min.js"></script>
    <script src="/js/material.min.js"></script>
    <script src="/js/snackbar.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/noUiSlider/6.2.0/jquery.nouislider.min.js"></script>
    
    <exclude><!--Warren, if you need this just let me know.  I couldn't find where it went ;P-->
    <script>
      $(function () {
        $.material.init();
        $(".shor").noUiSlider({
          start: 40,
          connect: "lower",
          range: {
            min: 0,
            max: 100
          }
        });

        $(".svert").noUiSlider({
          orientation: "vertical",
          start: 40,
          connect: "lower",
          range: {
            min: 0,
            max: 100
          }
        });
      });
    </script>
    </exclude>

    
</body>
</html>
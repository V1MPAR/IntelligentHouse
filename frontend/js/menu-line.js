var j$ = jQuery,
    $nav = j$("#navigation"),
    $slideLine = j$("#slide-line"),
    $currentItem = j$(".current-item");

j$(function(){
  // Menu has active item
  if ($currentItem[0]) {
    $slideLine.css({
      "width": $currentItem.width(),
      "left": $currentItem.position().left + 10
    });
  }

  // Underline transition
  j$($nav).find("li").hover(
    // Hover on
    function(){
      $slideLine.css({
        "width": j$(this).width(),
        "left": j$(this).position().left + 10
      });
    },
    // Hover out
    function(){
      if ($currentItem[0]) {
        // Go back to current
        $slideLine.css({
          "width": $currentItem.width(),
          "left": $currentItem.position().left + 10
        });
      } else {
        // Disapear
        $slideLine.width(0);
      }
    }
   );
});

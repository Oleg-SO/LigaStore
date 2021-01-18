$(function(){

    var showcase = $("#showcase"),
    title = $("#item-title");

    showcase.Cloud9Carousel({
        yOrigin: 40,
          yRadius: 46,
          mirror: {
             gap: 11,
              height: 0.3
       },
        buttonLeft: $("#nav > .left-slide"),
         buttonRight: $("#nav > .right-slide"),
       autoPlay: 1,
          bringToFront: true,
       itemClass: "3d-slide",
          onRendered: rendered,
         onLoaded: function(){
      
             showcase.css("visibility", "visible");
            showcase.css("display", "none");
              showcase.fadeIn(1300);
        }
      });
      
      function rendered(carousel){
      
          title.text(carousel.nearestItem().element.alt);
       var c = Math.cos((carousel.floatIndex() % 1) * 2 * Math.PI);
          title.css("opacity", 0.5 + (0.5 * c));
      };

      $("#nav > button").click(function(e){

        var b = $(e.target).addClass("down");
     setTimeout(function(){
          b.removeClass("down");
        }, 80);
    });

    $(document).keydown(function(e){

        switch(e.keyCode){
    
          case 37:
                $("#nav > .left-slide").click();
               break;
    
          case 39:
                $("#nav > .right-slide").click();
              break;
      };
    });

});
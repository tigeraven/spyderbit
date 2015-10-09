/**
 * @file
 * Custum.js.
 *
 * Filename:     custum.js.
 * Website:      http://www.ordasoft.com
 * Description:  file custom javascript
 * Author:       ordasoft dev team ordasoft.com.
 */

(function ($) {
  "use strict";
  Drupal.behaviors.osDeltaReady = {
    attach: function (context, settings) {
      if ($("[rel=tooltip]").length) {
        $("[rel=tooltip]").tooltip();
      }
      $(".fancybox").fancybox();

      var clsName = $("#videoBox").attr("class");
      var options = {videoId: clsName};
      $("#videoBox").tubular(options);

      // Global responsive menu.
      var gmenu = $(".mainMenu ul.menu");
      gmenu.find("ul").has("li").removeClass("menu");
      gmenu.find("li").has("ul").addClass("parent");
      gmenu.find("li").has("a.active").addClass("active");
      gmenu.find("li.parent > a").removeAttr("href").next("ul").hide();
      gmenu.find("li.parent > a").append("<span class='arrow'></span>");

      function clickOrHover() {
        if ($(window).width() >= 980) {
          return true;
        }
        return false;
      }
      gmenu.find("li.parent").hover(function () {
        if (clickOrHover() && !$.children("ul").is(":visible")) {
          $.children("ul").stop().slideDown(100);
        }
      },
      function () {
        if (clickOrHover() && $.children("ul").is(":visible")) {
          $.children("ul").slideUp(100);
        }
      });

      gmenu.find("li.parent a").click(function () {
        var checkElement = $.next();
        if (checkElement.is("ul")) {
          if (!checkElement.is(":visible")) {
            checkElement.slideDown(100);
          }
          else {
            checkElement.slideUp(100);
          }
        }
      });

      $(".itemFeatur, .rowImages").addClass("hideme").viewportChecker({
        classToAdd: "visible animated zoomIn",
        // Class to add to the elements when they are visible.
        classToRemove: "zoomIn",
        // Class to remove before adding 'classToAdd' to the elements.
        offset: 30,
        // The offset of the elements (let them appear earlier or later).
        invertBottomOffset: true,
        // Add the offset as a negative number to the element's bottom.
        repeat: true,
        // Add the possibility to remove the class if the elements are not visible
        callbackFunction: function (elem, action) { } // Callback to do after a class was added to an element. Action will return "add" or "remove", depending if the class was added or removed
      });
    }
  };
})(jQuery);

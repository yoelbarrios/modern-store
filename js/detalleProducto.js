var App = (function() {
    //=== Use Strict ===//
    "use strict";

    //=== variable privada ===//
    var gallery = $("#js-gallery");

    //=== objeto Gallery ===//
    var Gallery = {
        zoom: function(imgContainer, img) {
            var containerHeight = imgContainer.outerHeight(),
                src = img.attr("src");
        },
        switch: function(trigger, imgContainer) {
            var src = trigger.attr("href"),
                thumbs = trigger.siblings(),
                img = trigger.parent().prev().children();

            // agregar la clase active a thumbs
            trigger.addClass("is-active");

            // remover la clase active de thumbs
            thumbs.each(function() {
                if ($(this).hasClass("is-active")) {
                    $(this).removeClass("is-active");
                }
            });
            // cambiar ruta de imagen
            img.attr("src", src);
        }
    };
    //=== metodos publicos ===//
    function init() {
        //escuchar los clicks dentro de gallery
        gallery.delegate("a", "click", function(event) {
            var trigger = $(this);
            var triggerData = trigger.data("gallery");
            if (triggerData === "thumb") {
                var imgContainer = trigger.parent().siblings();
                Gallery.switch(trigger, imgContainer);
            } else {
                return;
            }
            event.preventDefault();
        });
    }

    //=== hacer los metodos publicos ===//
    return {
        init: init
    };

})();

App.init();
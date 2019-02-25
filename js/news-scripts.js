var breakingStart = true; // autostart breaking news
var breakingSpeed = 40; // breaking msg speed

var breakingScroll = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
var breakingOffset = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
var elementsToClone = [true, true, true, true, true, true, true, true, true, true];
var elementsActive = [];
var theCount = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];


(function ($) {
    "use strict";



	jQuery(window).ready(function() {

		// Breaking News Scroller
        jQuery(".breaking-news").mouseenter(function () {
            var thisindex = jQuery(this).attr("rel");
            clearTimeout(elementsActive[thisindex]);
        }).mouseleave(function () {
            var thisindex = jQuery(this).attr("rel");
            elementsActive[thisindex] = false;
        });

        start();






	});


})(jQuery);



function start() {
    var z = 0;
    jQuery('.breaking-block ul').each(function () {
        var thisitem = jQuery(this), thisindex = z;
        z = z + 1;
        if (thisitem.find("li").size() > 0) {

            if (!breakingStart) { return false; }
            var theBreakingMargin = parseInt(thisitem.find("li").css("margin-right")),
            	theBreakingWidth = parseInt(thisitem.parent().css("width")),

				itemul = thisitem,
            	itemtemp = 0,
            	items = itemul.find("li").each(function(){
            		itemtemp = itemtemp+parseInt(jQuery(this).width()) + parseInt(jQuery(this).css("padding-right")) + parseInt(jQuery(this).css("margin-right"));
            	});

            theCount[thisindex] = (itemtemp / 2);

            if (elementsToClone[thisindex]) {
                jQuery(this).parent().parent().addClass("isscrolling");
                jQuery('.breaking-block').eq(thisindex).parent().attr("rel", thisindex);
                thisitem.find("li").clone().appendTo(this);

                elementsToClone[thisindex] = false;
            }
            var theNumber = theCount[thisindex] + breakingOffset[thisindex];

            if (Math.abs(theNumber) <= (Math.abs(breakingScroll[thisindex]))) {
                cloneBreakingLine(thisindex);
            }

            if (!elementsActive[thisindex]) {
                elementsActive[thisindex] = setInterval(function () {
                    beginScrolling(thisitem, thisindex);
                }, breakingSpeed);
            }
        }
    });

    setTimeout("start()", breakingSpeed);
}

function beginScrolling(thisitem, thisindex) {
    breakingScroll[thisindex] = breakingScroll[thisindex] - 1;
    thisitem.css("left", breakingScroll[thisindex] + 'px');
}

function cloneBreakingLine(thisindex) {
    breakingScroll[thisindex] = 0;
    jQuery('.breaking-block').eq(thisindex).find('ul').css("left", "0px");
}

function lightboxclose() {
	jQuery(".lightbox").css('overflow', 'hidden');
	jQuery(".lightbox .lightcontent").fadeOut('fast');
	jQuery(".lightbox").fadeOut('slow');
	jQuery("body").css('overflow', 'auto');
}


// smooth appear start here //
function appearMe() {
	(function ($, win) {
		jQuery.fn.inViewport = function (cb) {
			return this.each(function (i, el) {
				function visPx() {
					var H = $(this).height(),
					r = el.getBoundingClientRect(),
					t = r.top,
					b = r.bottom;
					return cb.call(el, Math.max(0, t > 0 ? H - t : (b < H ? b : H)));
				}
				visPx();
				jQuery(win).on("resize scroll load", visPx);
			});
		};
	}(jQuery, window));

	jQuery(".animate").inViewport(function (px) {
		if (px) {
			jQuery(this).addClass("animateMe");
		}
	});


}

var isTouchCon = 0;

jQuery(document).ready(function($){

	"use strict";

	appearMe();

	var checkMobile = function(){

			//Check Device
			var isTouch = ('ontouchstart' in document.documentElement);

			//Check Device //All Touch Devices
			if ( isTouch ) {
				isTouchCon = 1;
				$('html').addClass('touch');

			}
			else {
				isTouchCon = 0;
				$('html').addClass('no-touch');

			};

		};
	//Execute Check
	checkMobile();

	if(navigator.userAgent.indexOf('Mac') > 0){
		$('body').addClass('mac-os');
	}

	//Delete user

$('.userDelete').click(function() {
            var id = $(this).attr("id");
            if (confirm("Are you sure you want to delete this user")) {
                $.ajax({
                    type: "POST",
                    url: "user_delete.php",
                    data: ({
                        id: id
                    }),
                    cache: false,
                    success: function(html) {
                        $(".userDelete" + id).fadeOut('slow');
                    }
                });
            } else {
                return false;
            }
        });

	

	




});


$(window).on("load", function () {
	$('body').addClass("loaded");
	setTimeout(function() {
		$('body').addClass('loadscreen2');
	}, 1000);

	setTimeout(function() {
		$('.Screen1').remove();
		$('body').addClass('scrollpage');
	}, 2000);


});



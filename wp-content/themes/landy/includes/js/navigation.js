!function (a) {
	function b() {
		a(window).scroll(function () {
			var b = a(window).scrollTop();
			b >= 120 ? a("#dynamic").addClass("show") : a("#dynamic").removeClass("show")
		});
		var b = a("section"),
			c = a(".nav a");
		b.waypoint({
			handler: function (a, b) {
				var d;
				d = jQuery(this), "up" === b && (d = d.prev());
				var e = jQuery('.nav a[href="#' + d.attr("id") + '"]');
				c.removeClass("selected"), e.addClass("selected")
			},
			offset: "30"
		}), a(".nav a").click(function () {
			return a.scrollTo(a(this).attr("href"), {
				duration: 800,
				offset: -60
			}), !1
		}), a(".mobile-menu-inner .nav-mobile li a").click(function () {
			a("#collapse").removeClass("burger-open");
			return a.scrollTo(a(this).attr("href"), {
				duration: 800,
				offset: 0
			}), !1
		})
	}
	a(document).ready(function () {
		b()
	})
}(jQuery);
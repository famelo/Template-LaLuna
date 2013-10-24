//@codekit-prepend "../Components/bootstrap/js/affix.js"
//@codekit-prepend "../Components/bootstrap/js/alert.js"
//@codekit-prepend "../Components/bootstrap/js/button.js"
//@codekit-prepend "../Components/bootstrap/js/carousel.js"
//@codekit-prepend "../Components/bootstrap/js/collapse.js"
//@codekit-prepend "../Components/bootstrap/js/dropdown.js"
//@codekit-prepend "../Components/bootstrap/js/modal.js"
//@codekit-prepend "../Components/bootstrap/js/tooltip.js"
//@codekit-prepend "../Components/bootstrap/js/popover.js"
//@codekit-prepend "../Components/bootstrap/js/scrollspy.js"
//@codekit-prepend "../Components/bootstrap/js/tab.js"
//@codekit-prepend "../Components/bootstrap/js/transition.js"

(function($) {
    $(document).ready(function() {

	});

	window.onresize = function(){
		var agent = navigator.userAgent;
		var current_width = window.innerWidth;
		var html = document.getElementsByTagName('html')[0];
		if (agent.match(/MSIE 8/i)) {
			html.className = "ie8";
		} else if (agent.match(/MSIE 9/i)) {
			html.className = "ie9";
		} else if (agent.match(/MSIE 10/i)) {
			html.className = "ie10";
		} else if (agent.match(/MSIE 11/i)) {
			html.className = "ie11";
		}
		}();
})(jQuery);
(function($){

	"use strict";

	$.fn.sndaWidgetForm = function() {
		if(!this.length)
			return false;

		var $form 	= this;
		var $type 	= $('.js-snda-type', $form);
		var $theme 	= $('.js-snda-theme', $form);
		var $iframe = $('.js-snda-iframe', $form);
		var $affid = $('.js-snda-affid', $form);
		var $codeBox = $('.js-snda-codebox', $form);
		var $codeBoxScript = $('.js-snda-script-tag', $codeBox);
		var $codeBoxWidget = $('.js-snda-widget-tag', $codeBox);

		var pluginExampleURL = $form.data('example');

		var disableTheme = function() {
			$theme.val("default").attr('disabled', 1).addClass('disabled');
		};

		var enableTheme = function() {
			$theme.removeAttr('disabled').removeClass('disabled');
		};

		var updateExample = function() {
			($type.val() == "widget") ? disableTheme() : enableTheme();
			var newURL = pluginExampleURL + 'type=' + $type.val() + '&theme=' + $theme.val() + '&' + Math.random();
			$iframe.attr('src', newURL);
		};

		var validateForm = function() {
			if($affid.val() == "") {
				$affid.addClass('error');
				$affid.focus();

				$('body, html').animate({
					scrollTop:$affid.offset().top - 100
				}, 500);

				$affid.on('keyup', function() {
					($affid.val() != "") ? $affid.removeClass('error') : $affid.addClass('error');
				});
				return false;
			}
			$affid.removeClass('error');
			return true;
		}

		var handleSubmit = function() {
			$codeBox.hide();
			
			if(!validateForm())
				return false;

			$codeBoxScript.val('<script type="text/javascript" src="//www.debt.ca/debt-widget/widget.min.js?key='+$affid.val()+'"></script>');
			$codeBoxWidget.val('<div data-dw="'+$type.val()+'" data-dw-theme="'+$theme.val()+'"></div>');

			$codeBox.slideDown(500);

			setTimeout(function() {
				$('body, html').animate({
					scrollTop:$codeBox.offset().top - 200
				}, 500);
			}, 100);

			return false;
		};

		// 
		// 
		$type.on('change', updateExample);
		$theme.on('change', updateExample);

		$form.on('submit', handleSubmit);
	};

	var init = function() {
		$('.js-snda-widget').sndaWidgetForm();
	};

	$(init);

})(window.jQuery);
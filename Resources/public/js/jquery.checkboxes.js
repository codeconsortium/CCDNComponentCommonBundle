<!--
/*
 * This file is part of the CCDN CommonBundle
 *
 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/> 
 * 
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/*
 * Plugin jQuery.Profile
 * Requires JQuery, make sure to have JQuery included in your JS to use this.
 * JQuery needs to be loaded before this script in order for it to work.
 */
$(document).ready(function() {
	$().checkboxes();
	
//	$("input[name='Profile[avatar]']").prop("disabled", true);
});
	
(function($) {
	$.fn.checkboxes = function() {
		
		$("input[name='check_all']").click(function(event) {

			this.check_all = $("input[name='check_all']");

			if (this.check_all.is(':checked')) {
				this.check_all.attr('checked', true);
				$(this).parents('form:eq(0)').find(':checkbox').attr('checked', true);
			} else {
				this.check_all.attr('checked', false);
				$(this).parents('form:eq(0)').find(':checkbox').attr('checked', false);
			}
			
//			$(this).parents('form:eq(0)').find(':checkbox').attr('checked', this.checked);
			
			return true;
		});
		
		// Work on check_all boxes that work on groups of checkboxes
		$("input[name^='check_all_for_']").click(function(event) {

			this.check_all = $("input[name='" + event.target.name + "']");
			this.for_item = event.target.name.replace(/check_all(.*)/, '$1'); // /^\_for\_([0-9]*)$/
			
			if (this.check_all.is(':checked')) {
				this.check_all.attr('checked', true);
				$("input[name$='" + this.for_item + "']").attr('checked', true);
			} else {
				this.check_all.attr('checked', false);
				$("input[name$='" + this.for_item + "']").attr('checked', false);
			}

			return true;
		});
	}

})(jQuery);

// -->
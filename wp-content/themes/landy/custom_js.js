
/*CUSTOM JS EXTENDING LANDY THEME FUNCTIONALITY*/

(function($) {
	

	$(document).ready(function() {

		/*LEARN MORE SECTION*/

		//is the learn more section opened?
		var learn_opened = 0;
	    
	    //when learn more is clicked
		$('.learn').click(function(){

			var source = $(this).attr('class').split(' ').pop();
			console.log(source);

	 		//if already opened
	 		if(learn_opened == 1){

	 			//close the placeholder
	 			$('.more_info').css('height', '0');
	 			//hide "close" button
	 			$('.close_features').css('opacity', '0');

	 			learn_opened = 0;

	 			//hide all content
	 			$('.feature_content').css('display', 'none');


	 		}
	 		//if not opened yet
	 		else {

	 			//open the placeholder
	 			$('.more_info').css('height', '300px');
	 			//display "close" button
	 			$('.close_features').css('opacity', '1');

	 			learn_opened = 1;

	 			//display an appropriate content piece
	 			$('.feature_content.' + source).css('display', 'block');

	 		}
		});


		/*TESTIMONIALS SECTION*/


		//add quotation marks to the quotes
		$('.text-blockquote.custom').children('p').append('<span class="quote_mark">&ldquo;</span>');
		$('.text-blockquote.custom').children('p').prepend('<span class="quote_mark">&rdquo;</span>');

		//on section hover
		$('.one_testim').hover(

			//in callback
			function(){

			//dispaly filter
			$(this).children('.filter').css('opacity', '0.7');
			//show quote and hide title
			$(this).children('.text-blockquote.custom').children('p').css('opacity', '1');
			$(this).children('.text-blockquote.custom').children('h6').css('opacity', '0');




			//out callback
		}, function(){

				//hide filter
				$(this).children('.filter').css('opacity', '0');
				//hide quote and show title
				$(this).children('.text-blockquote.custom').children('p').css('opacity', '0');
				$(this).children('.text-blockquote.custom').children('h6').css('opacity', '1');

		});


	});


})(jQuery);

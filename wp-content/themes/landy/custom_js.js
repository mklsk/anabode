/*CUSTOM JS EXTENDING LANDY THEME FUNCTIONALITY*/

(function($) {


    $(document).ready(function() {

        /*LEARN MORE SECTION*/

        var all_closed = true;

        //when learn more is clicked
        $('.learn').click(function() {

        	console.log(all_closed);

            source = $(this).attr('class').split(' ').pop();

            if (all_closed) {

                //open the placeholder
                $('.more_info').css('height', '300px');


                setTimeout(function() {

                    //display "close" button
                    $('.close_features').css('opacity', '1');



                    //display an appropriate content piece
                    $('.feature_content.' + source).show(300);
                    $('.feature_content.' + source).attr('opened', 'true');
                    $('.close_features').css('display', 'block');

                    all_closed = false;

                }, 700);


            } else {


                $('.feature_content[opened]').hide(300, function() {

                    //display an appropriate content piece
                    $('.feature_content.' + source).show(300);
                    $('.feature_content.' + source).attr('opened', 'true');

                });
            }

        });

        //when close button is clicked
        $('.close_features').click(function() {


            //close the placeholder
            $('.more_info').css('height', '0');
            //hide "close" button
            $('.close_features').css('opacity', '0');
            //hide all content
            $('.feature_content').hide(300);
            $('.feature_content.' + source + "[opened='true']").removeAttr('opened');
            all_closed = true;

        });


        /*TESTIMONIALS SECTION*/


        //add quotation marks to the quotes
        $('.text-blockquote.custom').children('p').append('<span class="quote_mark">&ldquo;</span>');
        $('.text-blockquote.custom').children('p').prepend('<span class="quote_mark">&rdquo;</span>');

        //on section hover
        $('.one_testim').hover(

            //in callback
            function() {

                //dispaly filter
                $(this).children('.filter').css('opacity', '0.7');
                //show quote and hide title
                $(this).children('.text-blockquote.custom').children('p').css('opacity', '1');
                $(this).children('.text-blockquote.custom').children('h6').css('opacity', '0');




                //out callback
            },
            function() {

                //hide filter
                $(this).children('.filter').css('opacity', '0');
                //hide quote and show title
                $(this).children('.text-blockquote.custom').children('p').css('opacity', '0');
                $(this).children('.text-blockquote.custom').children('h6').css('opacity', '1');

            });


    });


})(jQuery);

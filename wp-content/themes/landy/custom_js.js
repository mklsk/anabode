/*CUSTOM JS EXTENDING LANDY THEME FUNCTIONALITY*/

(function($) {
    $(document).ready(function() {

        $('.testims_row').addClass('wow fadeIn animated data-wow-duration="1.5s"');

        /*LEARN MORE SECTION*/

        $('.learn').data('open', 'false');
        //when learn more is clicked
        $('.learn').click(function(e) {

            e.stopPropagation();
            var status = $(this).data('open');
            var source = $(this).attr('class').split(' ').pop();

            if (status == 'true') {

                $('.hidden_descrp.' + source).css('opacity', '0');
                $(this).data('open', 'false');


            } else {

                $('.hidden_descrp.' + source).css('opacity', '1');
                $(this).data('open', 'true');
            }

        });




        $('.learn').hover(function(e) {


            e.stopPropagation();
            var status = $(this).data('open');
            var source = $(this).attr('class').split(' ').pop();

            if (status == 'false') {

                $('.hidden_descrp.' + source).css('opacity', '1');
            }



        }, function(e) {


            e.stopPropagation();
            var status = $(this).data('open');
            var source = $(this).attr('class').split(' ').pop();

            if (status == 'false') {

                $('.hidden_descrp.' + source).css('opacity', '0');
            }

        });


        $(window).click(function() {


            $('.hidden_descrp').css('opacity', '0');
            $(this).data('open', 'false');
        });

        /*TESTIMONIALS SECTION*/


        //add quotation marks to the quotes
        $('.text-blockquote.custom').children('.quote').append('<span class="quote_mark">&ldquo;</span>');
        $('.text-blockquote.custom').children('.quote').prepend('<span class="quote_mark">&rdquo;</span>');

        //on section hover
        $('.one_testim').hover(

            //in callback
            function() {

                //dispaly filter
                $(this).children('.filter').css('opacity', '0.7');
                //show quote and hide title
                $(this).children('.text-blockquote.custom').children('.quote').css('opacity', '1');
                $(this).children('.text-blockquote.custom').children('h6').css('opacity', '0');
                $(this).children('.text-blockquote.custom').children('.excerpt').css('opacity', '0');

                //out callback
            },
            function() {

                //hide filter
                $(this).children('.filter').css('opacity', '0');
                //hide quote and show title
                $(this).children('.text-blockquote.custom').children('.quote').css('opacity', '0');
                $(this).children('.text-blockquote.custom').children('h6').css('opacity', '1');
                $(this).children('.text-blockquote.custom').children('.excerpt').css('opacity', '1');

            });


        /* GET STARTED SECTION*/

        //hide tenant from
        $('.tenant_form').hide();
        $('.landlord').addClass('switcher_on');


        //add color switching to form changing buttons

        $('.landlord').click(function() {

            if (!$(this).hasClass('switcher_on')) {

                $(this).addClass('switcher_on');
                $('.tenant').removeClass('switcher_on');

                $('.landlord_form').show();
                $('.tenant_form').hide();

            }

        });

        $('.tenant').click(function() {

            if (!$(this).hasClass('switcher_on')) {

                $(this).addClass('switcher_on');
                $('.landlord').removeClass('switcher_on');

                $('.landlord_form').hide();
                $('.tenant_form').show();

            }
        });

    });



})(jQuery);

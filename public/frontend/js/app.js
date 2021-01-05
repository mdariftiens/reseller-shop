$(document).ready(function() {

    /*
    $('.datepicker').datepicker({
        dateFormat: "yy-mm-dd"
    });
    */

    
    $('body').on( 'click', '#printButton',function () {
        window.print();
    });

 

	/*
     * Sidebar dropdown
    */

    // $('body').on( 'click', '.db-aside-dropdown a',function () {
    //     $(this).parent('li').toggleClass('open');
    //     $(this).parent('li').siblings().removeClass('open');
    // })

    $('.db-aside-dropdown a').on( 'click',function () {
        $(this).parent('li').toggleClass('open');
        $(this).parent('li').siblings().removeClass('open');
    })

    $('button[data-toggle="toggle-drawer').click(function () {
        $('.db-aside').toggleClass('collapsed');
        console.log('toggle-drawer clickd');
    })
    //
    // $('body').on( 'click', 'button[data-toggle="toggle-drawer"]',function () {
    //     $('.db-aside').toggleClass('collapsed')
    // })

    /*
     * Topbar dropdown
    */
    $(document).mouseup(function (e) {
        if ($('.db-header-dropdown').has(e.target).length === 0)
        {
            $('.db-header-dropdown').css('display', 'none');
        }

        if ($('.db-drop-menu').has(e.target).length === 0)
        {
            $('.db-drop-menu').css('display', 'none');
        }
    });
    // $('body').on( 'click', 'button[data-toggle="db-dropdown"]',function () {
    //     $('.db-header-dropdown').show();
    //     $('div[aria-labelledby="'+$(this).attr('id')+'"]').show();
    // });

    $('body').on( 'click', '#labelAccount',function () {
        $('#labelAccountShow').show();
        // $('div[aria-labelledby="'+$(this).attr('id')+'"]').show();
    })

    $('body').on( 'click', '#labelNotify',function () {
        $('#labelNotifyShow').show();
        // $('div[aria-labelledby="'+$(this).attr('id')+'"]').show();
    })

    // $('#labelAccount').click(function () {
    //     console.log('clickd');
    //     $('#labelAccountShow').show();
    //     // $('div[aria-labelledby="'+$(this).attr('id')+'"]').show();
    // })

    /*
     * dropleft
    */
    $('body').on( 'click', 'button[data-toggle="db-dropleft"]',function () {
        $('.db-drop-menu').hide();
        $(this).next('.db-drop-menu').toggle();
    });


        $( "#password" ).checkStrength({
            min: 8,
            both_letter: true,
            digits_with_symbol: true,
        });



})

$.fn.checkStrength = function( options ) {
    if ( $(this).prop("tagName") == undefined) {
      return;
    }
    if ($(this).prop("tagName").toLowerCase() == 'input') {
        var settings = $.extend({
            success: {
                color: 'green',
            },
            error: {
                color: 'red'
            },
            message: {
                min: '<p title="min">8 characters or longer.!</p>',
                both_letter: '<p title="both_letter">Both upper and lower case letters.!</p>',
                digits_with_symbol: '<p title="digits_with_symbol">At least one number and symbol (like 1!@#$%^2)!</p>'
            }
        }, options );

        var password_check = $('#password_check').append(
            settings.message.min,
            settings.message.both_letter,
            settings.message.digits_with_symbol
        );

        password_check.children('p').css({
            color: settings.error.color
        });
        $(this).keyup(function () {
            var input_str = $.trim($(this).val());

            if (input_str.length > options.min)
            {
                password_check.children('p[title="min"]').css({
                    color: settings.success.color
                });
            }
            else
            {
                password_check.children('p[title="min"]').css({
                    color: settings.error.color
                });
            }

            if (options.both_letter) {
                if (input_str.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
                    password_check.children('p[title="both_letter"]').css({
                        color: settings.success.color
                    });
                }
                else
                {
                    password_check.children('p[title="both_letter"]').css({
                        color: settings.error.color
                    });
                }
            }

            if (options.digits_with_symbol) {
                if (input_str.match(/([0-9])/) && input_str.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
                    password_check.children('p[title="digits_with_symbol"]').css({
                        color: settings.success.color
                    });
                }
                else
                {
                    password_check.children('p[title="digits_with_symbol"]').css({
                        color: settings.error.color
                    });
                }
            }
        });

    }
};
/*

function printData()
{
   var divToPrint=document.getElementById("transcript");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
*/

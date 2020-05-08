/* global $, alert, console */
$(function(){
    'use strict';
    $('form input, textarea').on('focus', function(){
        $(this).attr("data-placeholder", $(this).attr('placeholder'));
        $(this).attr('placeholder', '');
        //console.log($(this).data('placeholder'));
    })
    $('form input, textarea').on('blur', function(){
        $(this).attr('placeholder', $(this).data('placeholder'));
    })

    // Validate Client Side
    function ClientSideValide(selector, condition){
    selector.on('blur', function(){
        if($(this).val().length < condition){
          $(this).parent().find('.custom-alert').fadeIn(200);
          $(this).parent().find('.asterisx').fadeIn(100);
          $(this).css('border', '1px solid #F00');
          $(this).removeClass('valid');
        } else{
              $(this).parent().find('.custom-alert').fadeOut(200);
              $(this).parent().find('.asterisx').fadeOut(100);
                $(this).css('border', '1px solid green');
                $(this).addClass('valid');
        }
        /*
          Also You can use end()  ==> Search in jQuery
        */
      });
    }
    ClientSideValide($('.username'),  4);
    ClientSideValide($('.email'), 1);
    ClientSideValide($('.msg'), 5);
//Submit from Validation
var myFormElements = $('.username, .email, .email');
$('.contact-form').submit(function(e){
  if(! myFormElements.hasClass('valid')){
    e.preventDefault();
    myFormElements.blur();
  }

})












});

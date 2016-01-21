/**
 * Created by john on 5/30/15.
 */
$("#login-button").click(function(event){
    event.preventDefault();

    $('form').fadeOut(500);
    $('.wrapper').addClass('form-success');
});
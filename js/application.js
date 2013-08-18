$(document).ready(function(){
	submitLogin();
	blockOnSubmit();
})

var submitLogin = function () {
	$('.form-signin').submit(login);
}

var login = function (){
	$('.loading-signin').css('display', 'inline-block');
	$.ajax({
	    type: 'POST',
	    url: $(this).attr('action'),
	    data: $(this).serialize(),
	    success: function(data, textStatus, jqXHR){
	    	if(data!="FALSE")
	      		loginSuccess(data);
	      	else
	      		loginError();
	    },
	    error: ajaxErrorHandler,
	    dataType: 'html'
	});
	return false;
}

var loginSuccess = function(data) {
	window.location = "panel.php"
	console.log(data);
}

var loginError = function() {
	$('.error-login').show();
	$('.loading-signin').hide();
}

var ajaxErrorHandler = function () {
	console.log('error on ajax call')
}

var blockOnSubmit = function () {
	$('form').submit(function () {
		$(this).children('input').prop('disabled', true);
	})

	$( document ).ajaxComplete(function() {
		$('form').children('input').removeAttr('disabled')
   	});
}
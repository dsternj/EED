$(document).ready(function(){
	submitLogin();
	blockOnSubmit();
	searchClassList();
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

var searchClassList = function()  {
    $('.search.class_list').keyup(function(){
    	$('.professor-table tr').show();
        q = $(this).val().toLowerCase();
        $('.professor-table').find('tr').not('thead tr').each(function(){
            val=$(this).text().toLowerCase()
            if(val.search(q)!=-1){
                $(this).show();
            }
            else {
                $(this).hide();
            }
        })

        $('.class_time').each(function(){
    		q = $(this).val().toLowerCase();
    		$('.professor-table').find('tr').not('thead tr').each(function(){
    			if($(this).is(":visible")){
		            val=$(this).find(">:first-child").text().toLowerCase()
		            if(val.search(q)!=-1 || q == 'todos'){
		                $(this).show();
		            }
		            else {
		                $(this).hide();
		            }
		        }
    		})
    	})
    })

    $('.class_time').change(function(){
    	$('.search.class_list').keyup();
    })
}
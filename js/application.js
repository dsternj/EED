$(document).ready(function(){
	submitLogin();
	blockOnSubmit();
	searchClassList();
	goToEvaluate();
	validateEvaluation();
	hideErrorNotResponded();
	changeChartType();
	professorScroll();
	searchProfessorList();
	toggleProfessor();
	closeComments();
	openComments();
	searchAutocomplete();

})

var submitLogin = function () {
	$('.form-signin').submit(login);
}

var login = function (){
	$('.loading-signin').css('visibility', 'inherit');
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
	$('.loading-signin').css('visibility', 'hidden');
}

var ajaxErrorHandler = function () {
	console.log('error on ajax call')
}

var blockOnSubmit = function () {
	$('form').submit(function () {
		$(this).find('input').prop('disabled', true);
	})

	$( document ).ajaxComplete(function() {
		$('form').find('input').removeAttr('disabled')
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

var searchProfessorList = function()  {
    $('.professor_list_search').keyup(function(){
    	//console.log('a');
    	$('.professor_selector').show();
        q = $(this).val().toLowerCase();
        $('.professor_selector').each(function(){
            val=$(this).text().toLowerCase()
            if(val.search(q)!=-1){
                $(this).show();
            }
            else {
                $(this).hide();
            }
        })


    })

}

var goToEvaluate = function () {
	$('a.evaluate').click(function(){
		$(this).parents('form').submit();
		return false;

	})
}

var validateEvaluation = function () {
	$('form.evaluete_professor').submit( function(){
		var notResponded = notEvaluatedQuestion();
		console.log(notResponded);
		if(notResponded.length>0){

			notResponded.forEach(function(entry) {
    			$('#error-'+entry).show();
			});

			$('html, body').animate({
	        	scrollTop: $("#"+notResponded[0]).offset().top
	    	}, 500);
				
			return false;
		}
	});
}

var notEvaluatedQuestion = function () {
	question_id = Array();
	$('input:radio').each(function(){
		name = $(this).attr('name')
		question_id.push(name);
		//console.log(name)
	})
	question_id = question_id.reverse().filter(function (e, i, arr) {
    	return arr.indexOf(e, i+1) === -1;
	}).reverse();

	$('input:radio:checked').each(function(){
		name = $(this).attr('name')
		index = question_id.indexOf(name);
		question_id.splice(index, 1);
		//console.log(name);
	})

	return question_id;
}

var hideErrorNotResponded = function () {
	$('label.ql').click(function(){
		//console.log('clicked');
		$(this).parent().siblings('.alert-msg-error').hide();
	})
}

var changeChartType = function () {
	$('.chart-type button').click(function() {
		$(this).attr('disabled', 'disabled').toggleClass('active');
		$(this).siblings().removeAttr("disabled").toggleClass('active');  
		//console.log('click');
		q = $(this).parent().data('q');
		$('.Chart-q'+q).toggle();
	})
}

function professorScroll() {

    $('.professor_list_holder').slimScroll({
        height: '400px',
        size: '5px',
        position: 'right',
        alwaysVisible: false,
        railVisible: false,
        railOpacity: 0.3,
        wheelStep: 10,
        allowPageScroll: false,
        disableFadeOut: false

    });
}

var toggleProfessor = function () {
	$('.professor_selector:not(.disabled)').click(function() {
		$(this).toggleClass('selected');
		q = $(this).data('q');
		if($(this).hasClass('selected')) {
			$('input:checkbox').each(function() {
				val=$(this).attr('name');
				//console.log(val);
				if(val.search(q)!=-1){
	                $(this).prop("checked", true).change();
	            }
			})
		}
		else {
			$('input:checkbox').each(function() {
				val=$(this).attr('name');
				if(val.search(q)!=-1){
	                $(this).removeAttr('checked').change();
	            }
			})			
		}
	}).children('.label_container').click(function(e) {
		console.log('a')
  		return false;

	});
}

var closeComments  = function () {
	$('.close_comments').click(function(){
		$(this).parents('.comments_holder').toggle();
	})
}

var openComments = function () {
	$('.open_comments').click(function(){
		console.log('click');
		$('.comments_holder').hide();
		name = $(this).data('n');
		$('.comments_holder.'+name).show();
	})
	
}

var searchAutocompleteOld = function () {
	$.widget("custom.catcomplete", $.ui.autocomplete, {
		_renderMenu: function (ul, items) {
		    var self = this,
		        currentCategory = "";
		    $.each(items, function (index, item) {
		        if (item.category != currentCategory) {
		            ul.append("<li class='ui-autocomplete-category'>" + item.category + "</li>");
		            currentCategory = item.category;
		        }
		        self._renderItem(ul, item);
		    });
		}
	});

    $( "#search" ).autocomplete({
        source: "backend/search.php",
        minLength: 1,
        select: function( event, ui ) {
            log( ui.item ?
                "Selected: " + ui.item.value + " aka " + ui.item.id :
                "Nothing selected, input was " + this.value );
        }
    }).data("catcomplete")._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<a>" + item.label + "<br><small style='color:#999'>" + item.faculty + "</small></a>" )
        .appendTo( ul );
    };
}
var searchAutocomplete = function () {
	$.widget( "custom.catcomplete", $.ui.autocomplete, {
	        _renderItemData: function( ul, item ) {
	        	if(item.category == "Cursos") {
	        		anchor = 'answers.php?cun='+item.cun;
	        	}
	        	else {
	        		anchor = 'professor.php?id='+item.id;
	        	}
	            return $( "<li></li>" )
	                .data( "item.autocomplete", item )
	                .append( "<a href='"+anchor+"'>" + item.label + "<br><small style='color:#999'>" + item.faculty + "</small></a>" )
	                .appendTo( ul );
	        },

	        _renderMenu: function( ul, items ) {
	            var that = this,
	            currentCategory = "";
	            $.each( items, function( index, item ) {
	                if (item.category != currentCategory) {
	                    if (item.category != undefined) {
	                        ul.append( "<li style='border-bottom: 1px solid lightgray; padding:3px; margin: 3px;'><h5 style='font-weight:bold;'>" + item.category + "</h5></li>" );
	                        currentCategory = item.category;
	          			}
	                }
	                that._renderItemData( ul, item );
	            });
	        },


	});

	$('#search').catcomplete({
	   appendTo: '#search_query_wrapper',
	    source: "backend/search.php"
	}).focus(function(){
      $(this).catcomplete("search");
    });
}
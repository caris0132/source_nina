$(document).ready(function(e) {

    $('#menu ul li').hover(

		function(){

			 $(this).children('ul').stop().slideDown();

		},

		function(){

			$(this).children('ul').css({'display':'none'});

		}

    );

    $('.left-ul i').click(function (event) {
        event.preventDefault();
        event.stopPropagation();
        var ele = $(this).parents('li').children('ul').slideToggle();

    })

});

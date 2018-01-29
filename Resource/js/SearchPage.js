	$(document).ready(function(){
        var width = $(this).width();
        if( width <= 414 ){
            $(".ui.cards").removeClass("four");
            $(".ui.cards").addClass("one");
        }
    });

	var offset = 0;
	var str_card = $('.cards').html();
	$('.cards').html("");
	showResults( offset++, 4);

	$('.button').click(function(){
	   showResults( offset++, 4);
	});

	function showResults( offset, limit ){
	    $.ajax({
	        url:"/API/Search/ItemSearch",
	        data:{
	           "search": $("input[name='sk']").val(),
	           "start": offset*4,
	           "limit": limit 
	        },
	        type:'post',
	        success:function(data){
	            console.log( "Success", data );
	            $result = '';
		        $.each( data.results , function( index, each ){
		            $result += str_card
		            	.replace(/{ID}/g, each.Sell_ID)
		            	.replace("{title}",each.sell_title)
		                .replace("{img}", mackPhoto(each.sell_photo) )
		                .replace("{price}",each.sell_price);
		        });
	    		$('.cards').append($result);
	        },
	        error:function(data){
	            console.log( "error", data );
	        }
	    });
	}

    $(window).resize(function (e) {
        width = $(this).width();
        if( width > 414 ){
            $(".ui.cards").removeClass("four one");
            $(".ui.cards").addClass("four");
        }else if( width <= 414 ){
            $(".ui.cards").removeClass("four one");
            $(".ui.cards").addClass("one");
        }
    });

	function mackTag (tags){
		var html_tags = "";
		$.each( tags, function(i,e){
			html_tags += str_tag.replace("{{tags}}", e);
		});
		return html_tags;
	}

	function mackPhoto (photos){
		// 暫時
		return photos[0];
	}
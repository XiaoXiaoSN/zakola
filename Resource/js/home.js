	$('.menu .item').tab();
    $(document).ready(function(){
        var width = $(this).width();
        if( width <= 414 ){
            $(".ui.cards").removeClass("four");
            $(".ui.cards").addClass("one");
        }
    });
	
	//var str_tag  = '<a class="ui label">{{TAG}}</a>';
	var str_card = $('.cards').html();
	$('.cards').html("");
   	var Tabs = {
   		"first-tab" :{
   			"search":"first",
   			"now":0
   		},"second-tab" :{
   			"search":"second",
   			"now":0
   		}
   	};
	$.each(Tabs, function( i, e ){
		showItems(i, e.search , e.now, 4);
		e.now+=4;
	});


	$('.button').click(function(){
	   var now_tab = $(this).parent().data('tab') + "-tab";
	   showItems( now_tab, Tabs[now_tab]["search"], Tabs[now_tab]["now"] ,4 );
	   Tabs[now_tab]["now"]+=4;
	});


	function showItems(tab, search, start, limit){
	    $.ajax({
	        url:"/Item",
	        data:{
	           "search": search,
	           "start": start,
	           "limit": limit
	        },
	        type:'post',
	        success:function(data){
	            console.log( tab + " success", data );
	            $result = '';
		        $.each( data.results , function( index, each ){
		            $result += str_card
		            	.replace(/{{ID}}/g,each.Sell_ID)
		            	.replace("{{title}}",each.sell_title)
		                .replace("{{img}}", mackPhoto(each.sell_photo) )
		                .replace("{{price}}",each.sell_price);
		        });

	    		$('.'+tab).append($result);
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

	function mackPhoto (photos){
		// 暫時
		return photos[0];
	}

	// function mackTag (tags){
	// 	var html_tags = "";
	// 	$.each( tags, function(i,e){
	// 		html_tags += str_tag.replace("{{TAG}}", e);
	// 	});
	// 	return html_tags;
	// }
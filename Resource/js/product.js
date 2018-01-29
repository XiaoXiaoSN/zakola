	showProduct( location.pathname.substr(9) );
	function showProduct(id){
		console.log(id);
	    $.ajax({
	        url:"/getProduct",
	        data:{
	           "ID": id
	        },
	        type:'post',
	        success:function(data){
	            console.log( "success", data );
	        },
	        error:function(data){
	            console.log( "error", data );
	        }
	    });
	}

	// //search
	function check(){
		var s = $("#s-input").val().trim().replace(/(<([^>]+)>)/ig,"");
		var regexpsafety = [ /\"/g, /\'/g, /\\/g , /\/\//g ];
		$.each(regexpsafety, function(i, e){
			s = s.replace(e, "");
		});
		document.getElementById('s-input').value = s;
		if( s == "" ){
			return false;
		}else{
			return true;
		}
	}
	function submi(){
		$(".search .input").submit();
	}
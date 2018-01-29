<?php
	
	if( !empty($_SESSION["User"]["UID"]) && empty($_SESSION["Zakola"]["Logout"]) &&
	  empty($_SESSION["Zakola"]["AccessToken"]) && empty($_SESSION["Zakola"]["RequestOAuth"]) ){
			$_SESSION["Zakola"]["RequestOAuth"] = 1;
			Apps::run("Authentication");
	} else if (!empty($_SESSION["Zakola"]["RequestNickname"]) && $_SESSION["Zakola"]["RequestNickname"] > 0 && Route::GetURI() !== "/update") {
		$_SESSION["Zakola"]["RequestNickname"] = 0;
		Route::Location( "http://accounts.tenoz.asia/Settings?request=nickname&redirect=".
		urlencode("http://zakola.tenoz.asia/update") );	
	}
	Route::Add("/",function(){

		Apps::run( "Home" );//Home
		
	},"Route" );

	Route::Add("/getProduct",function(){

		Apps::run( "API/getProduct" );
		
	},"Route" );

	Route::Add("/Item",function(){

		Apps::run( "API/Item" );
		
	},"Route" );

	Route::Add("/searchpage",function(){

		$Search = htmlentities(strip_tags($_POST["search"]));
		$Search = str_replace(array("'", '"', '\\', '/'),"", trim($Search) );
		if( mb_strlen( trim($Search), "UTF-8" ) <= 0 ){
			//Util::Status403("Missing Content");
			Apps::run("Home");
			exit;
		}

		if( strpos( $Search, " " ) !== -1 ){
			$Search = preg_split("/[\s]+/", $Search);
			$Search = implode(" ", $Search);
		}

		$d = date("U");
		$_SESSION["search"][$d] = $Search;
		echo "<input name='sk' type='hidden' value='$d'>";

		Apps::run( "SearchPage" );
		
	},"Route" );

	Route::Add("API/Search/ItemSearch",function(){

		Apps::run( "API/Search/ItemSearch" );
		
	},"Route" );

	Route::Add("/Product/([0-9]+)",function(){

		$_GET["Product"]["ID"] = substr_replace($_SERVER['REQUEST_URI'],"",0,9);
		Apps::run( "Product" );
	
	},"Route");

	Route::Add("/test",function(){

		Apps::run( "test" );
		
	},"Route" );

	Route::Add("/debug",function(){
		echo "<pre>";
		print_r($_SESSION);
		
	},"Route" );

	Route::Add("/oauth/redirect",function(){
		if( Route::GetQuery()["state"] === "authorize"){
			Apps::run("OAuthSDK/ReceiveOAuthCode");
		} else {
			echo "NO";
			
		}
		
	},"Route" );
	
	// // add 
	// Route::Add("/Item",function(){

	// 	header( "location:http://{$_SERVER["HTTP_HOST"]}");
	// 	exit;
	
	// },"Route");
	

	Route::Add("/update",function(){
		
		Apps::run( "UpdateUser" );

	},"Route");



	Route::Submit( "Route" );
	echo "No Match";

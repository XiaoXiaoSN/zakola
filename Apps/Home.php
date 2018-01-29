<?php

	$div1 = array(
		"class" => "ui container",
		"style" => "margin-top:60px"
	);
	
	Page::Title("ZaKolA");
	Page::Init(function(){
		Assets::Style("/Resource/semantic/semantic.min.css");
		Assets::Import("jquery");
		Assets::Style("/Resource/css/home.css");
	});

	
	Page::TagOn("body");
	
		Page::HTML( "Navbar/Navbar");

		Page::TagOn("div", $div1);

			Page::HTML( "Search");
		    Page::HTML( "Home" );

		Page::TagOff("div");


	Page::TagOff("body");
	
	Assets::Script("/Resource/semantic/semantic.min.js");
	Assets::Script("/Resource/js/home.js");
	Assets::Script("/Resource/js/search.js");
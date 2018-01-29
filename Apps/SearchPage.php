<?php

	$div1 = array(
		"class" => "ui container",
		"style" => "margin-top:60px"
	);
	
	Page::Title("ZaKolA-Search");
	Page::Init(function(){
		Assets::Style("/Resource/semantic/semantic.min.css");
		Assets::Style("/Resource/css/SearchPage.css");
		Assets::Import("jquery");
	});

	
	Page::TagOn("body");
	
		Page::HTML( "Navbar/Navbar");

		Page::TagOn("div", $div1);

			Page::HTML( "Search");
			Page::HTML( "SearchPage");	

		Page::TagOff("div");


	Page::TagOff("body");
	
	Assets::Script("/Resource/semantic/semantic.min.js");
	Assets::Script("/Resource/js/SearchPage.js");
	Assets::Script("/Resource/js/search.js");
<?php

	Page::Title("ZaKolA");
	Page::Init(function(){
		Assets::Style("/Resource/semantic/semantic.min.css");
		Assets::Import("jquery");
		Assets::Import("tinymce");
	});

	Page::HTML( "test" );

	
	Assets::Script("/Resource/semantic/semantic.min.js");
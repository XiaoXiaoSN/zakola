<?php
	Models::Load("Product");

	$div1 = array(
		"class" => "ui column doubling stackable grid container",
		"style" => "margin-top:3px"
	);
	$div2 = array(
		"class" => "ui segment"
	);
		
	
	$product = Product::Product_formID( $_GET["Product"]["ID"] );

	if ( $product ){

		Page::Title($product["sell_title"]);
		Page::Init(function(){
			Assets::Import("jquery");
			Assets::Import("semantic");
			Assets::Import("product");
		});


		Page::TagOn("body");
		
			Page::HTML( "Navbar/Navbar");
			Page::TagOn("div", $div1);
			    Page::TagOn("div", $div2);

			    	Page::HTML( "Search" );
					Page::HTML( "HotTag" );
					Page::Item( "Product",
						$product
					);

			    Page::TagOff("div");
			Page::TagOff("div");

			Page::TagOff("body");

	}else{

		echo "no correct ID";

	}
	
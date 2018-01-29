<?php
	Models::Load("Product");
	$product = Product::Product_formID( $_POST['ID'] );


	Util::StatusTrue( $product );



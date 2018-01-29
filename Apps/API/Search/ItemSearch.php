<?php
	
	Models::Load("ItemSearch");

	$Search = $_SESSION["search"][ $_POST["search"] ];

	$Search = htmlentities(strip_tags($Search));
	if( mb_strlen( trim($Search), "UTF-8" ) <= 0 ){
		Util::Status403("Missing Content");
	}

	if( strpos( $Search, " " ) !== -1 ){
		$Search = preg_split("/[\s]+/", $Search);
		$Search = implode("%", $Search);
	}

	Util::StatusTrue(
		ItemSearch::Search( $Search, $_POST["start"] , $_POST["limit"] )
	);
<?php
	Models::Load("Item");
	
	$item = Item::Query( $_POST['search'], $_POST['start'], $_POST['limit'] );


	Util::StatusTrue( $item );



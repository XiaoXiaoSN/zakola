<?php
	Models::Load("DataProcess");
	class Product {
		public static function Product_formID( $id ) {
			$SQL =
			"	SELECT * FROM `Sell_list`
				WHERE `sell_ID` = {$id}
			";

			$Result = DB::Query( $SQL )->fetch(PDO::FETCH_ASSOC);
			$Result = $Result?$Result:false;
			if ($Result){
				$Result["sell_quantity"] = DataProcess::quantity( $Result["sell_quantity"], $Result["sell_ID"] );

				$Result["sell_photo"] = DataProcess::splitPhoto( $Result["sell_photo"] );
				$Result["sell_tag"] = DataProcess::splitTag( $Result["sell_tag"] );
			}
			return  $Result;			
		}

	}
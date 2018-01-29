<?php
	Models::Load("DataProcess");
	class Item {
		public static function Query( $tab, $Start = 0, $Limit = 4 ) {
			$SQL =
			"	SELECT `sell_title`,`sell_photo`,`sell_description`,`Sell_ID`,`sell_tag`,`sell_price`
				FROM `Sell_list` WHERE `sell_tag` LIKE '%#{$tab}#%'
				AND `trade_status` = 1
				LIMIT $Start , $Limit
			";

			$Result = DB::Query( $SQL );
			$Data = array();
			while( $Fetch = $Result->fetch(PDO::FETCH_ASSOC) ){

				$Fetch["sell_photo"] = DataProcess::splitTag( $Fetch["sell_photo"] );
				$Fetch["sell_tag"] = DataProcess::splitTag( $Fetch["sell_tag"] );
				$Data[] = $Fetch ;
			}
			$Data = $Data?$Data:false;
			return  $Data;			
		}

		public static function Query_favorite( $ID, $Start = 0, $Limit = 4 ) {
			$SQL =
			"	SELECT `sell_title`,`sell_photo`,`sell_description`,`Sell_ID`,`sell_tag`,`sell_price`
				FROM `Sell_list` INNER JOIN `favorite`
				ON `Sell_list`.`sell_ID` = `favorite`.`item_ID`
				WHERE `tenoz_AccID` = {$ID} AND `favorite_visible` = 1
				LIMIT $Start , $Limit
			";

			$Result = DB::Query( $SQL );
			$Data = array();
			while( $Fetch = $Result->fetch(PDO::FETCH_ASSOC) ){
				$Fetch["sell_photo"] = DataProcess::splitTag( $Fetch["sell_photo"] );
				$Fetch["sell_tag"] = DataProcess::splitTag( $Fetch["sell_tag"] );
				
				$Data[] = $Fetch ;
			}
			$Data = $Data?$Data:false;
			return  $Data;			
		}


		public static function Query_purchase( $ID, $Start = 0, $Limit = 4 ) {
			$SQL =
			"	SELECT 
				`Sell_list`.`sell_title`,`Sell_list`.`sell_photo`,`Sell_list`.`sell_description`,`Sell_list`.`Sell_ID`,`Sell_list`.`sell_tag`,`Sell_list`.`sell_price` ,`PurchaseList`.`purchase_time`, `PurchaseList`.`purchase_quantity`,`PurchaseList`.`evaluate_customer`, `PurchaseList`.`evaluate_seller`
				FROM `Sell_list`    INNER JOIN `PurchaseList`
				ON `Sell_list`.`sell_ID` = `PurchaseList`.`sell_ID`
				WHERE `PurchaseList`.`customer_ID` = {$ID}
				LIMIT $Start , $Limit

			";

			$Result = DB::Query( $SQL );
			$Data = array();
			while( $Fetch = $Result->fetch(PDO::FETCH_ASSOC) ){
				$Fetch["sell_photo"] = DataProcess::splitTag( $Fetch["sell_photo"] );
				$Fetch["sell_tag"] = DataProcess::splitTag( $Fetch["sell_tag"] );

				$Data[] = $Fetch ;
			}
			$Data = $Data?$Data:false;
			return  $Data;			
		}


		public static function Query_sell( $ID, $Start = 0, $Limit = 4 ) {
			$SQL =
			"	SELECT `sell_title`,`sell_photo`,`sell_description`,`Sell_ID`,`sell_tag`,`sell_price`
				FROM `Sell_list` WHERE `sell_ID` = {$ID}
				LIMIT $Start , $Limit
			";

			$Result = DB::Query( $SQL );
			$Data = array();
			while( $Fetch = $Result->fetch(PDO::FETCH_ASSOC) ){
				$Fetch["sell_photo"] = DataProcess::splitTag( $Fetch["sell_photo"] );
				$Fetch["sell_tag"] = DataProcess::splitTag( $Fetch["sell_tag"] );

				$Data[] = $Fetch ;
			}
			$Data = $Data?$Data:false;
			return  $Data;			
		}
	}
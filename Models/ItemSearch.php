<?php
	Models::Load("DataProcess");
	class ItemSearch {

		public static function Search( $secrch , $Start = 0 , $Limit = 12 ) {
			$SQL =
			"	SELECT `sell_title`,`sell_photo`,`sell_description`,`Sell_ID`,`sell_tag`,`sell_price`
				FROM 	`Sell_list`
				WHERE 	CONCAT(
					CONCAT_WS(' ', `seller_ID`,`sell_title`,`sell_Item`,`sell_tag`  ),' '
					,CONCAT_WS(' ', `seller_ID`,`sell_title`,`sell_Item`,`sell_tag` )
				)
				LIKE  '%{$secrch}%'
				AND `trade_status` = 1
				LIMIT {$Start} , {$Limit}
			";
			$Result = DB::Query( $SQL );
			$Data = array();
			while( $Fetch = $Result->fetch(PDO::FETCH_ASSOC) ){
				$Fetch["sell_quantity"] = DataProcess::quantity( $Fetch["sell_quantity"], $Fetch["sell_ID"] );

				$Fetch["sell_photo"] = DataProcess::splitPhoto( $Fetch["sell_photo"] );
				$Fetch["sell_tag"] = DataProcess::splitTag( $Fetch["sell_tag"] );
				
				$Data[] = $Fetch ;
			}
			$Data = $Data?$Data:false;
			return  $Data;		
		}
	}
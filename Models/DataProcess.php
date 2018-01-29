<?php
	class DataProcess {
		public static function splitTag( $tag ) {
			$i = 0;
			$Tag[$i] = strtok($tag, "#");

			while( $temp = strtok( "#" ) ){
				$Tag[++$i] = $temp;
			}

			return $Tag;
		}

		public static function splitPhoto( $photo ) {
			$i = 0;
			$Photo[$i] = strtok($photo, ",");

			while( $temp = strtok( "," ) ){
				$Photo[++$i] = $temp;
			}
			return $Photo;
		}

		public static function quantity ( $quantity, $id ){
			$SQL =
				"	SELECT  COUNT(*) FROM `PurchaseList`
					WHERE `sell_ID` = '{$id}'
				";

			$selled =  DB::Query( $SQL );
			if ( is_numeric($selled) ){
				return $quantity -= (int)$selled ;	
			}else{
				return $quantity;
			}

		}
	}
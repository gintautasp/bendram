<?php

	class DuomenuBaze {
	
		public
			
			$ercl_db = false 
			
			, $last_insert_id = 0,  $last_afected_rows = 0, $mysql_num_rows = 0
		;
		
		public function __construct ( $name_db, $name_user_db = 'root', $password_user_db = '', $name_server_db = 'localhost' ) {
		
			if ( $this -> ercl_db = mysqli_connect ( $name_server_db, $name_user_db, $password_user_db, $name_db  ) ) {
			
				mysqli_set_charset ( $this -> ercl_db, 'utf8' );
				
				/*
				if ( mysqli_select_db ( $this ->ercl_db, $name_db  ) ) {
				
					die ( 'serverio klaida: nepavyksta prisijungti prie duomenų bazės' );
				}
				*/
			} else {
			
				die ( 'serverio klaida: nepavyksta prisijungti prie duomenų bazės serverio' );
			}
		}
		
		public function uzklausa ( $uzklausa, $efektine_reiksme = 'x' ) {
		
			$uzklausos_resursas = false;
		
			if ( ! ( $uzklausos_resursas = mysqli_query ( $this -> ercl_db, $uzklausa ) ) ) { 
			
				die ( 'severio klaida: klaidinga užklausa' );
				
			} else {
			
				if ( $efektine_reiksme == 'afected_rows' ) $this -> last_afected_rows = $this ->ercl_db -> affected_rows;

				if ( $efektine_reiksme == 'last_insert_id' ) $this -> last_insert_id = $this ->ercl_db -> insert_id;
				
				if ( $efektine_reiksme == 'mysql_num_rows' ) $this -> mysq_num_rows = $this ->ercl_db -> mysql_num_rows;
			}
			
			return $uzklausos_resursas;
		}
		
		
	}
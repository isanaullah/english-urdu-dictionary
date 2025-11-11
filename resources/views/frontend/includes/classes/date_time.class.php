<?php
/************************************************************************************
	Author		:	Bilal Shah       															*	
	File Name 	:	date_time.class.php													*
************************************************************************************/
/************************************************************************************
                                          *

	FUNCTIONS LIST:																	
	function mysqltonormal()
	function mysqltonormal2()
	function mysqltourdu()
	function current_date()
	function date_now()
	funciton normaltomysql()
	function mysqltonormal3()
  
																					*	
************************************************************************************/
include("db.class.php");
class date_time extends db_connect {

	/// METHOD FOR CALL PARENT CONSTRUCTOR ///
	public function __construct(string $host, string $db, string $user, string $pass){
		parent::__construct($host, $db, $user, $pass);
	}
	/// METHOD FOR CALL PARENT CONSTRUCTOR ///

	/// METHOD FOR CONVERT DATE MYSQL TO NORMAL ///
		// Format : 12 January 2012 //
		function mysqltonormal($dated){
			$date_create = date_create($dated);
			$final = date_format($date_create, 'd F Y');
			return $final;		
		}

		// Format : Jul 28, 2019 //
		function mysqltonormal2($dated){
			$date_create = date_create($dated);
			$final = date_format($date_create, 'M j, Y');
			return $final;		
		}

		// Format : 2019 ,30 urdu month //
		function mysqltourdu($dated){
			// Find urdu month from enlish month
			$en_month = date('F', strtotime($dated));
			$months = array(
							'January' => 'جنوری',
							'February' => 'فروری',
							'March' => 'مارچ',
							'April' => 'اپریل',
							'May' => 'مئی',
							'June' => 'جون',
							'July' => 'جولائی',
							'August' => ' اگست',
							'September' => ' ستمبر',
							'October' => 'اکتوبر',
							'November' => 'نومبر',
							'December' => 'دسمبر'
			);
			
			// Find urdu month from enlish month //
			foreach ($months as $en => $ur) {
				if ($en == $en_month) {
					$ur_month = $ur;
				}
			}
	
			$date_create = date_create($dated);
			$final = date_format($date_create, ' j, Y');
			return $ur_month.$final;		
		}
		// Format : 2019 ,30 urdu month //
	/// METHOD FOR CONVERT DATE MYSQL TO NORMAL ///


	/// METHOD TO SHOW CORRUENT DATE ///
		// Format : WEDNESDAY , 31 JULY 2018 //
		function current_date() {
			$date = date('l , d F Y');
			return $date;
		}
	/// METHOD TO SHOW CORRUENT DATE ///


	/// METHOD TO SHOW CORRUENT DATE WITHOUT ANY FORMAT
		function date_now() {
			$date = date('Y-m-d');
			return $date;
		}
	/// METHOD TO SHOW CORRUENT DATE WITHOUT ANY FORMAT	


	/// METHOD FOR CONVERT DATE NORMAL TO MYSQL ///	
		function normaltomysql($dated){	
			$final=  date('Y-m-d', strtotime($dated));
			if($final !='--') {
				return $final;		
			}
		}
	/// METHOD FOR CONVERT DATE NORMAL TO MYSQL ///	
	
	
	/// METHOD FOR CONVERT MYSQL DATE TO ANOTHER NORMAL FORMAT ///
		// Format : 12 Jan //
		function mysqltonormal3($dated){ 
			$final=  date('j M', strtotime($dated));
		
			if($final !='--') {
				return $final;    
			}
		}	
	/// METHOD FOR CONVERT MYSQL DATE TO ANOTHER NORMAL FORMAT ///	

} // end class
?>
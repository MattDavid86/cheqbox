<?
    class SearchSQL {
        /*
        Blair's old search terms in sesame
        a. Value (ie ON)
        b. Multiple values (ie ON;BC)
        c. Not Values (ie /ON)
        d. Multiple Not Values (ie /ON;BC)
        e. Wild Card Searches (ie ..john..)
        f. Multiple Condition Wild Card Searches (ie ..john..smith..)
        g. Multiple wild card searches (ie ..john..;..susan..)
        h. Numeric Formulas (ie >200)
        i. Numeric Ranges (ie 200..500)
        j. Date searches (ie <@date)
        k. Date Formulas (ie <@date+10)
        */
        
        //! as the first character will perform a 'NOT' in the SQL
        
        /*Metacharacter   Behavior
        ^   matches the position at the beginning of the searched string
        $   matches the position at the end of the searched string
        .   matches any single character
        […] matches any character specified inside the square brackets
        [^…]    matches any character not specified inside the square brackets
        p1|p2   matches any of the patterns p1 or p2
        *   matches the preceding character zero or more times
        +   matches preceding character one or more times
        {n} matches n number of instances of the preceding character
        {m,n}   matches from m to n number of instances of the preceding character
        */
        
        public static function searchWithSQLFullSearch( $debtor, $offset = 0 ) {
       		$offset = ( is_nan($offset) ) ? 0 : $offset;
			
        	$start = "
        		      SELECT 
				        DBID, casefileUID
				      FROM db01_debtor
				      WHERE dateDeleted IS NULL
				      ";
			
			$end = "
			         ORDER BY DBID DESC
      				 LIMIT 1000 OFFSET $offset;
      			   ";
					
			$resultSet = self::buildInlineSQL( $debtor, $start, $end );
			
			return $resultSet;
        }
		
		public static function searchWithSQLFullSearchCount( $debtor ) {
       		$start = "
       		          SELECT 
				        COUNT(DBID) as recordCount 
				      FROM db01_debtor
				      WHERE dateDeleted IS NULL
				     ";
			
			$end = "ORDER BY DBID DESC;";
					
			$resultSet = self::buildInlineSQL( $debtor, $start, $end );
			
			$recordCount = 0;
            if ($resultSet) {
                $recordCount = $resultSet[0]["recordCount"];
            }
            
            return $recordCount;
			//return $resultSet;
        }
		
		private static function buildInlineSQL( $debtor, $start, $end ) {
			$dbConn = new HyparecMySQL();
            $conn = $dbConn->getPDOConn();
			
			$sqlString = $start;
			$sqlString .= self::buildANDStatement( $debtor->DBID, "DBID" );
			$sqlString .= self::buildANDStatement( $debtor->DBTitle, "DBTitle" );
			$sqlString .= self::buildANDStatement( $debtor->DBName, "DBName" );
			$sqlString .= $end;
			
			echo $sqlString;
			
			$sql = $conn->prepare( $sqlString );
			if ( $debtor->DBID != "" ) { $sql->bindParam(":DBID", $debtor->DBID ); }
            if ( $debtor->DBTitle != "" ) { $sql->bindParam(":DBTitle", $debtor->DBTitle ); }
			if ( $debtor->DBName != "" ) { $sql->bindParam(":DBName", $debtor->DBName ); }
			$sql->execute();
			
			echo "<pre>";
			print_r($sql->errorInfo());
			echo "</pre>";
            
            return $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		
		private static function buildANDStatement( $string, $column ) {
			$result = "";
            
			if ( $string != "" ) {
				if (strrpos($string, '|') > 0) {
				    $orArr = array();
				    foreach (explode("|", $string) as $splitArr) {
						array_push($orArr, $splitArr);
					}
                    $result .= " AND ( $column LIKE :" . implode(" OR $column LIKE :", $orArr) . " ) ";
				} else {
				    $result = " AND $column LIKE :$column ";
				}
			}
			
			return $result;
		}
        
        public static function buildF3ANDStatement( $string, $column ) {
            $result = "";
            $arrValues = array();
            $count = 0;
            
            if ( $string != "" ) {
                if (strrpos($string, '|') > 0) {
                    foreach (explode("|", $string) as $splitArr) {
                        array_push($arrValues, $splitArr);
                        $count++;
                    }
                    $result .= " AND ( $column LIKE ?" . implode(" OR $column LIKE ?", $arrValues) . " ) ";
                } else {
                    $result = " AND $column LIKE ? ";
                    $count++;
                }
            }
            
            return array( "result" => $result, "count" => $count );
        }
    }
    
?>
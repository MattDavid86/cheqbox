<?
    class Search {
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
        
        https://dev.mysql.com/doc/refman/5.7/en/regexp.html#operator_regexp
        
        */
        
        public static function checkForNumberOrDateModifiers( $debtor ) {   // check for either ++ or -- to add/subtract from a number or a date
            foreach ($debtor as $key => $value) {
                if ( strpos( $value , "++")  > -1 ) {   //check to numbers and add to the value
                    $arr = explode("++", $value);
                    if ( is_numeric($arr[0]) ) {
                        $value = $arr[0] + $arr[1];
                    } else {
                        $date = strtotime( $arr[0] . " + " . $arr[1] . " days" );
                        $date = date("Y-m-d", $date);
                        $value = $date;
                    }
                } elseif ( strpos( $value , "--")  > -1 ) {   //check to numbers and subtract to the value
                    $arr = explode("--", $value);
                    if ( is_numeric($arr[0]) ) {
                        $value = $arr[0] - $arr[1];
                    } else {
                        $date = strtotime( $arr[0] . " - " . $arr[1] . " days" );
                        $date = date("Y-m-d", $date);
                        $value = $date;
                    }
                }
            }
            
            return $debtor;
        }
        
        public static function debtorCafeFilefullSearch( $debtor, $offset = 0, $limit = 1000 ) {
            $dbConn = new HyparecMySQL();
            $conn = $dbConn->getPDOConn();
            
            $debtor = self::checkForNumberOrDateModifiers( $debtor );
            
            $sql = $conn->prepare("call debtorCafeFilefullSearch ( :DBID, :DBTitle, :DBComm, :DBName, :DBAdd1, :DBAdd2, :DBCity, :DBProv, :DBPCod, :DBCnt, :DBSAdd, :DBCountry, :DB2Name, :DB2Add1, :DB2Add2, :DB2City, :DB2Prov, :DB2PCod, :DB2Tel, :DB2SIN, :DB2Rel, :DB2DOB, :DBCltNo, :DBClt, :DBSalesRep, :DBCollNum, :DBTracNum, :DBLglNum, :DBComRate, :DBRefNum, :DBListed, :DBStatus, :DBCrBu, :CrBuOn, :DBTel1, :DBTel2, :DBTel3, :DBEmail, :POE, :PTel, :DBBTC, :DBList, :DBIncurred, :DBWorked, :DBIntRate, :DBItIntDef, :DBNxt, :DBPriority, :DBColNot, :DBScore, :TUCScore, :DBSIN, :DBDOB, :DBDLNum, :DBCCNum, :DBAKA, :DBCCExp, :DBOrigCreditory, :DBComment1, :DBComment2, :DBPOEAddress, :DBPOECity, :DBPOEProv, :DBPOEPostalCode, :DBPOEContact, :DBPOEFax, :DBPOEJobTitle, :DBPOESalary, :DBPOENote, :CltInfo1, :CltInfo2, :CltInfo3, :CltInfo4, :CltInfo5, :CltInfo6, :CltInfo7, :DBLttrLog, :TraceNote, :LGLClaim, :LGLPreJudgement, :LGLCourtAddress, :LGLPostJudgement, :LGLSchedA, :LGLJudgementIntRate, :LGLAmtClaimed, :LGLJudgDate, :LGLCourtCosts, :LGLJudgAmt, :DBPadDate, :DBBankNo, :DBPadAmt, :DBTransitNo, :DBPadTrm, :DBAcctNo, :DBPadLft, :DBAcctName, :DBPadAct, :DBViciLoad, :casefileUID, :DBCCExpMonth, :DBCCExpYear, :offset, :DBBal, :DBPd, :DBInstr0, :limit )");
            $sql->bindParam(":DBID", $debtor->DBID );
            $sql->bindParam(":DBTitle", $debtor->DBTitle );
            $sql->bindParam(":DBComm", $debtor->DBComm );
            $sql->bindParam(":DBName", $debtor->DBName );
            $sql->bindParam(":DBAdd1", $debtor->DBAdd1 );
            $sql->bindParam(":DBAdd2", $debtor->DBAdd2 );
            $sql->bindParam(":DBCity", $debtor->DBCity );
            $sql->bindParam(":DBProv", $debtor->DBProv );
            $sql->bindParam(":DBPCod", $debtor->DBPCod );
            $sql->bindParam(":DBCnt", $debtor->DBCnt );
            $sql->bindParam(":DBSAdd", $debtor->DBSAdd );
            $sql->bindParam(":DBCountry", $debtor->DBCountry );
            $sql->bindParam(":DB2Name", $debtor->DB2Name );
            $sql->bindParam(":DB2Add1", $debtor->DB2Add1 );
            $sql->bindParam(":DB2Add2", $debtor->DB2Add2 );
            $sql->bindParam(":DB2City", $debtor->DB2City );
            $sql->bindParam(":DB2Prov", $debtor->DB2Prov );
            $sql->bindParam(":DB2PCod", $debtor->DB2PCod );
            $sql->bindParam(":DB2Tel", $debtor->DB2Tel );
            $sql->bindParam(":DB2SIN", $debtor->DB2SIN );
            $sql->bindParam(":DB2Rel", $debtor->DB2Rel );
            $sql->bindParam(":DB2DOB", $debtor->DB2DOB );
            $sql->bindParam(":DBCltNo", $debtor->DBCltNo );
            $sql->bindParam(":DBClt", $debtor->DBClt );
            $sql->bindParam(":DBSalesRep", $debtor->DBSalesRep );
            $sql->bindParam(":DBCollNum", $debtor->DBCollNum );
            $sql->bindParam(":DBTracNum", $debtor->DBTracNum );
            $sql->bindParam(":DBLglNum", $debtor->DBLglNum );
            $sql->bindParam(":DBComRate", $debtor->DBComRate );
            $sql->bindParam(":DBRefNum", $debtor->DBRefNum );
            $sql->bindParam(":DBListed", $debtor->DBListed );
            $sql->bindParam(":DBStatus", $debtor->DBStatus );
            $sql->bindParam(":DBCrBu", $debtor->DBCrBu );
            $sql->bindParam(":CrBuOn", $debtor->CrBuOn );
            $sql->bindParam(":DBTel1", $debtor->DBTel1 );
            $sql->bindParam(":DBTel2", $debtor->DBTel2 );
            $sql->bindParam(":DBTel3", $debtor->DBTel3 );
            $sql->bindParam(":DBEmail", $debtor->DBEmail );
            $sql->bindParam(":POE", $debtor->POE );
            $sql->bindParam(":PTel", $debtor->PTel );
            $sql->bindParam(":DBBTC", $debtor->DBBTC );
            $sql->bindParam(":DBList", $debtor->DBList );
            $sql->bindParam(":DBIncurred", $debtor->DBIncurred );
            $sql->bindParam(":DBWorked", $debtor->DBWorked );
            $sql->bindParam(":DBIntRate", $debtor->DBIntRate );
            $sql->bindParam(":DBItIntDef", $debtor->DBItIntDef );
            $sql->bindParam(":DBNxt", $debtor->DBNxt );
            $sql->bindParam(":DBPriority", $debtor->DBPriority );
            $sql->bindParam(":DBColNot", $debtor->DBColNot );
            $sql->bindParam(":DBScore", $debtor->DBScore );
            $sql->bindParam(":TUCScore", $debtor->TUCScore );
            $sql->bindParam(":DBSIN", $debtor->DBSIN );
            $sql->bindParam(":DBDOB", $debtor->DBDOB );
            $sql->bindParam(":DBDLNum", $debtor->DBDLNum );
            $sql->bindParam(":DBCCNum", $debtor->DBCCNum );
            $sql->bindParam(":DBAKA", $debtor->DBAKA );
            $sql->bindParam(":DBCCExp", $debtor->DBCCExp );
            $sql->bindParam(":DBOrigCreditory", $debtor->DBOrigCreditory );
            $sql->bindParam(":DBComment1", $debtor->DBComment1 );
            $sql->bindParam(":DBComment2", $debtor->DBComment2 );
            $sql->bindParam(":DBPOEAddress", $debtor->DBPOEAddress );
            $sql->bindParam(":DBPOECity", $debtor->DBPOECity );
            $sql->bindParam(":DBPOEProv", $debtor->DBPOEProv );
            $sql->bindParam(":DBPOEPostalCode", $debtor->DBPOEPostalCode );
            $sql->bindParam(":DBPOEContact", $debtor->DBPOEContact );
            $sql->bindParam(":DBPOEFax", $debtor->DBPOEFax );
            $sql->bindParam(":DBPOEJobTitle", $debtor->DBPOEJobTitle );
            $sql->bindParam(":DBPOESalary", $debtor->DBPOESalary );
            $sql->bindParam(":DBPOENote", $debtor->DBPOENote );
            $sql->bindParam(":CltInfo1", $debtor->CltInfo1 );
            $sql->bindParam(":CltInfo2", $debtor->CltInfo2 );
            $sql->bindParam(":CltInfo3", $debtor->CltInfo3 );
            $sql->bindParam(":CltInfo4", $debtor->CltInfo4 );
            $sql->bindParam(":CltInfo5", $debtor->CltInfo5 );
            $sql->bindParam(":CltInfo6", $debtor->CltInfo6 );
            $sql->bindParam(":CltInfo7", $debtor->CltInfo7 );
            $sql->bindParam(":DBLttrLog", $debtor->DBLttrLog );
            $sql->bindParam(":TraceNote", $debtor->TraceNote );
            $sql->bindParam(":LGLClaim", $debtor->LGLClaim );
            $sql->bindParam(":LGLPreJudgement", $debtor->LGLPreJudgement );
            $sql->bindParam(":LGLCourtAddress", $debtor->LGLCourtAddress );
            $sql->bindParam(":LGLPostJudgement", $debtor->LGLPostJudgement );
            $sql->bindParam(":LGLSchedA", $debtor->LGLSchedA );
            $sql->bindParam(":LGLJudgementIntRate", $debtor->LGLJudgementIntRate );
            $sql->bindParam(":LGLAmtClaimed", $debtor->LGLAmtClaimed );
            $sql->bindParam(":LGLJudgDate", $debtor->LGLJudgDate );
            $sql->bindParam(":LGLCourtCosts", $debtor->LGLCourtCosts );
            $sql->bindParam(":LGLJudgAmt", $debtor->LGLJudgAmt );
            $sql->bindParam(":DBPadDate", $debtor->DBPadDate );
            $sql->bindParam(":DBBankNo", $debtor->DBBankNo );
            $sql->bindParam(":DBPadAmt", $debtor->DBPadAmt );
            $sql->bindParam(":DBTransitNo", $debtor->DBTransitNo );
            $sql->bindParam(":DBPadTrm", $debtor->DBPadTrm );
            $sql->bindParam(":DBAcctNo", $debtor->DBAcctNo );
            $sql->bindParam(":DBPadLft", $debtor->DBPadLft );
            $sql->bindParam(":DBAcctName", $debtor->DBAcctName );
            $sql->bindParam(":DBPadAct", $debtor->DBPadAct );
            $sql->bindParam(":DBViciLoad", $debtor->DBViciLoad );
            $sql->bindParam(":casefileUID", $debtor->casefileUID );
            $sql->bindParam(":DBCCExpMonth", $debtor->DBCCExpMonth );
            $sql->bindParam(":DBCCExpYear", $debtor->DBCCExpYear );
            $sql->bindParam(":offset", $offset );
            $sql->bindParam(":DBBal", $debtor->DBBal );
            $sql->bindParam(":DBPd", $debtor->DBPd );
            $sql->bindParam(":DBInstr0", $debtor->DBInstr0 );
            $sql->bindParam(":limit", $limit );
            $sql->execute();
            //echo "call debtorCafeFilefullSearch ( '$debtor->DBID', '$debtor->DBTitle', '$debtor->DBComm', '$debtor->DBName', '$debtor->DBAdd1', '$debtor->DBAdd2', '$debtor->DBCity', '$debtor->DBProv', '$debtor->DBPCod', '$debtor->DBCnt', '$debtor->DBSAdd', '$debtor->DBCountry', '$debtor->DB2Name', '$debtor->DB2Add1', '$debtor->DB2Add2', '$debtor->DB2City', '$debtor->DB2Prov', '$debtor->DB2PCod', '$debtor->DB2Tel', '$debtor->DB2SIN', '$debtor->DB2Rel', '$debtor->DB2DOB', '$debtor->DBCltNo', '$debtor->DBClt', '$debtor->DBSalesRep', '$debtor->DBCollNum', '$debtor->DBTracNum', '$debtor->DBLglNum', '$debtor->DBComRate', '$debtor->DBRefNum', '$debtor->DBListed', '$debtor->DBStatus', '$debtor->DBCrBu', '$debtor->CrBuOn', '$debtor->DBTel1', '$debtor->DBTel2', '$debtor->DBTel3', '$debtor->DBEmail', '$debtor->POE', '$debtor->PTel', '$debtor->DBBTC', '$debtor->DBList', '$debtor->DBIncurred', '$debtor->DBWorked', '$debtor->DBIntRate', '$debtor->DBItIntDef', '$debtor->DBNxt', '$debtor->DBPriority', '$debtor->DBColNot', '$debtor->DBScore', '$debtor->TUCScore', '$debtor->DBSIN', '$debtor->DBDOB', '$debtor->DBDLNum', '$debtor->DBCCNum', '$debtor->DBAKA', '$debtor->DBCCExp', '$debtor->DBOrigCreditory', '$debtor->DBComment1', '$debtor->DBComment2', '$debtor->DBPOEAddress', '$debtor->DBPOECity', '$debtor->DBPOEProv', '$debtor->DBPOEPostalCode', '$debtor->DBPOEContact', '$debtor->DBPOEFax', '$debtor->DBPOEJobTitle', '$debtor->DBPOESalary', '$debtor->DBPOENote', '$debtor->CltInfo1', '$debtor->CltInfo2', '$debtor->CltInfo3', '$debtor->CltInfo4', '$debtor->CltInfo5', '$debtor->CltInfo6', '$debtor->CltInfo7', '$debtor->DBLttrLog', '$debtor->TraceNote', '$debtor->LGLClaim', '$debtor->LGLPreJudgement', '$debtor->LGLCourtAddress', '$debtor->LGLPostJudgement', '$debtor->LGLSchedA', '$debtor->LGLJudgementIntRate', '$debtor->LGLAmtClaimed', '$debtor->LGLJudgDate', '$debtor->LGLCourtCosts', '$debtor->LGLJudgAmt', '$debtor->DBPadDate', '$debtor->DBBankNo', '$debtor->DBPadAmt', '$debtor->DBTransitNo', '$debtor->DBPadTrm', '$debtor->DBAcctNo', '$debtor->DBPadLft', '$debtor->DBAcctName', '$debtor->DBPadAct', '$debtor->DBViciLoad', '$debtor->casefileUID', '$debtor->DBCCExpMonth', '$debtor->DBCCExpYear', '$offset', '$debtor->DBBal', '$debtor->DBPd', '$debtor->DBInstr0', '$limit' );";
            
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public static function debtorCafeFilefullSearchCount( $debtor ) {
            $dbConn = new HyparecMySQL();
            $conn = $dbConn->getPDOConn();
            
            $debtor = self::checkForNumberOrDateModifiers( $debtor );
            
            $sql = $conn->prepare("call debtorCafeFilefullSearchCount ( :DBID, :DBTitle, :DBComm, :DBName, :DBAdd1, :DBAdd2, :DBCity, :DBProv, :DBPCod, :DBCnt, :DBSAdd, :DBCountry, :DB2Name, :DB2Add1, :DB2Add2, :DB2City, :DB2Prov, :DB2PCod, :DB2Tel, :DB2SIN, :DB2Rel, :DB2DOB, :DBCltNo, :DBClt, :DBSalesRep, :DBCollNum, :DBTracNum, :DBLglNum, :DBComRate, :DBRefNum, :DBListed, :DBStatus, :DBCrBu, :CrBuOn, :DBTel1, :DBTel2, :DBTel3, :DBEmail, :POE, :PTel, :DBBTC, :DBList, :DBIncurred, :DBWorked, :DBIntRate, :DBItIntDef, :DBNxt, :DBPriority, :DBColNot, :DBScore, :TUCScore, :DBSIN, :DBDOB, :DBDLNum, :DBCCNum, :DBAKA, :DBCCExp, :DBOrigCreditory, :DBComment1, :DBComment2, :DBPOEAddress, :DBPOECity, :DBPOEProv, :DBPOEPostalCode, :DBPOEContact, :DBPOEFax, :DBPOEJobTitle, :DBPOESalary, :DBPOENote, :CltInfo1, :CltInfo2, :CltInfo3, :CltInfo4, :CltInfo5, :CltInfo6, :CltInfo7, :DBLttrLog, :TraceNote, :LGLClaim, :LGLPreJudgement, :LGLCourtAddress, :LGLPostJudgement, :LGLSchedA, :LGLJudgementIntRate, :LGLAmtClaimed, :LGLJudgDate, :LGLCourtCosts, :LGLJudgAmt, :DBPadDate, :DBBankNo, :DBPadAmt, :DBTransitNo, :DBPadTrm, :DBAcctNo, :DBPadLft, :DBAcctName, :DBPadAct, :DBViciLoad, :casefileUID, :DBCCExpMonth, :DBCCExpYear, :DBBal, :DBPd, :DBInstr0 )");
            $sql->bindParam(":DBID", $debtor->DBID );
            $sql->bindParam(":DBTitle", $debtor->DBTitle );
            $sql->bindParam(":DBComm", $debtor->DBComm );
            $sql->bindParam(":DBName", $debtor->DBName );
            $sql->bindParam(":DBAdd1", $debtor->DBAdd1 );
            $sql->bindParam(":DBAdd2", $debtor->DBAdd2 );
            $sql->bindParam(":DBCity", $debtor->DBCity );
            $sql->bindParam(":DBProv", $debtor->DBProv );
            $sql->bindParam(":DBPCod", $debtor->DBPCod );
            $sql->bindParam(":DBCnt", $debtor->DBCnt );
            $sql->bindParam(":DBSAdd", $debtor->DBSAdd );
            $sql->bindParam(":DBCountry", $debtor->DBCountry );
            $sql->bindParam(":DB2Name", $debtor->DB2Name );
            $sql->bindParam(":DB2Add1", $debtor->DB2Add1 );
            $sql->bindParam(":DB2Add2", $debtor->DB2Add2 );
            $sql->bindParam(":DB2City", $debtor->DB2City );
            $sql->bindParam(":DB2Prov", $debtor->DB2Prov );
            $sql->bindParam(":DB2PCod", $debtor->DB2PCod );
            $sql->bindParam(":DB2Tel", $debtor->DB2Tel );
            $sql->bindParam(":DB2SIN", $debtor->DB2SIN );
            $sql->bindParam(":DB2Rel", $debtor->DB2Rel );
            $sql->bindParam(":DB2DOB", $debtor->DB2DOB );
            $sql->bindParam(":DBCltNo", $debtor->DBCltNo );
            $sql->bindParam(":DBClt", $debtor->DBClt );
            $sql->bindParam(":DBSalesRep", $debtor->DBSalesRep );
            $sql->bindParam(":DBCollNum", $debtor->DBCollNum );
            $sql->bindParam(":DBTracNum", $debtor->DBTracNum );
            $sql->bindParam(":DBLglNum", $debtor->DBLglNum );
            $sql->bindParam(":DBComRate", $debtor->DBComRate );
            $sql->bindParam(":DBRefNum", $debtor->DBRefNum );
            $sql->bindParam(":DBListed", $debtor->DBListed );
            $sql->bindParam(":DBStatus", $debtor->DBStatus );
            $sql->bindParam(":DBCrBu", $debtor->DBCrBu );
            $sql->bindParam(":CrBuOn", $debtor->CrBuOn );
            $sql->bindParam(":DBTel1", $debtor->DBTel1 );
            $sql->bindParam(":DBTel2", $debtor->DBTel2 );
            $sql->bindParam(":DBTel3", $debtor->DBTel3 );
            $sql->bindParam(":DBEmail", $debtor->DBEmail );
            $sql->bindParam(":POE", $debtor->POE );
            $sql->bindParam(":PTel", $debtor->PTel );
            $sql->bindParam(":DBBTC", $debtor->DBBTC );
            $sql->bindParam(":DBList", $debtor->DBList );
            $sql->bindParam(":DBIncurred", $debtor->DBIncurred );
            $sql->bindParam(":DBWorked", $debtor->DBWorked );
            $sql->bindParam(":DBIntRate", $debtor->DBIntRate );
            $sql->bindParam(":DBItIntDef", $debtor->DBItIntDef );
            $sql->bindParam(":DBNxt", $debtor->DBNxt );
            $sql->bindParam(":DBPriority", $debtor->DBPriority );
            $sql->bindParam(":DBColNot", $debtor->DBColNot );
            $sql->bindParam(":DBScore", $debtor->DBScore );
            $sql->bindParam(":TUCScore", $debtor->TUCScore );
            $sql->bindParam(":DBSIN", $debtor->DBSIN );
            $sql->bindParam(":DBDOB", $debtor->DBDOB );
            $sql->bindParam(":DBDLNum", $debtor->DBDLNum );
            $sql->bindParam(":DBCCNum", $debtor->DBCCNum );
            $sql->bindParam(":DBAKA", $debtor->DBAKA );
            $sql->bindParam(":DBCCExp", $debtor->DBCCExp );
            $sql->bindParam(":DBOrigCreditory", $debtor->DBOrigCreditory );
            $sql->bindParam(":DBComment1", $debtor->DBComment1 );
            $sql->bindParam(":DBComment2", $debtor->DBComment2 );
            $sql->bindParam(":DBPOEAddress", $debtor->DBPOEAddress );
            $sql->bindParam(":DBPOECity", $debtor->DBPOECity );
            $sql->bindParam(":DBPOEProv", $debtor->DBPOEProv );
            $sql->bindParam(":DBPOEPostalCode", $debtor->DBPOEPostalCode );
            $sql->bindParam(":DBPOEContact", $debtor->DBPOEContact );
            $sql->bindParam(":DBPOEFax", $debtor->DBPOEFax );
            $sql->bindParam(":DBPOEJobTitle", $debtor->DBPOEJobTitle );
            $sql->bindParam(":DBPOESalary", $debtor->DBPOESalary );
            $sql->bindParam(":DBPOENote", $debtor->DBPOENote );
            $sql->bindParam(":CltInfo1", $debtor->CltInfo1 );
            $sql->bindParam(":CltInfo2", $debtor->CltInfo2 );
            $sql->bindParam(":CltInfo3", $debtor->CltInfo3 );
            $sql->bindParam(":CltInfo4", $debtor->CltInfo4 );
            $sql->bindParam(":CltInfo5", $debtor->CltInfo5 );
            $sql->bindParam(":CltInfo6", $debtor->CltInfo6 );
            $sql->bindParam(":CltInfo7", $debtor->CltInfo7 );
            $sql->bindParam(":DBLttrLog", $debtor->DBLttrLog );
            $sql->bindParam(":TraceNote", $debtor->TraceNote );
            $sql->bindParam(":LGLClaim", $debtor->LGLClaim );
            $sql->bindParam(":LGLPreJudgement", $debtor->LGLPreJudgement );
            $sql->bindParam(":LGLCourtAddress", $debtor->LGLCourtAddress );
            $sql->bindParam(":LGLPostJudgement", $debtor->LGLPostJudgement );
            $sql->bindParam(":LGLSchedA", $debtor->LGLSchedA );
            $sql->bindParam(":LGLJudgementIntRate", $debtor->LGLJudgementIntRate );
            $sql->bindParam(":LGLAmtClaimed", $debtor->LGLAmtClaimed );
            $sql->bindParam(":LGLJudgDate", $debtor->LGLJudgDate );
            $sql->bindParam(":LGLCourtCosts", $debtor->LGLCourtCosts );
            $sql->bindParam(":LGLJudgAmt", $debtor->LGLJudgAmt );
            $sql->bindParam(":DBPadDate", $debtor->DBPadDate );
            $sql->bindParam(":DBBankNo", $debtor->DBBankNo );
            $sql->bindParam(":DBPadAmt", $debtor->DBPadAmt );
            $sql->bindParam(":DBTransitNo", $debtor->DBTransitNo );
            $sql->bindParam(":DBPadTrm", $debtor->DBPadTrm );
            $sql->bindParam(":DBAcctNo", $debtor->DBAcctNo );
            $sql->bindParam(":DBPadLft", $debtor->DBPadLft );
            $sql->bindParam(":DBAcctName", $debtor->DBAcctName );
            $sql->bindParam(":DBPadAct", $debtor->DBPadAct );
            $sql->bindParam(":DBViciLoad", $debtor->DBViciLoad );
            $sql->bindParam(":casefileUID", $debtor->casefileUID );
            $sql->bindParam(":DBCCExpMonth", $debtor->DBCCExpMonth );
            $sql->bindParam(":DBCCExpYear", $debtor->DBCCExpYear );
            $sql->bindParam(":DBBal", $debtor->DBBal );
            $sql->bindParam(":DBPd", $debtor->DBPd );
            $sql->bindParam(":DBInstr0", $debtor->DBInstr0 );
            $sql->execute();
            //echo "call debtorCafeFilefullSearchCount ( '$debtor->DBID', '$debtor->DBTitle', '$debtor->DBComm', '$debtor->DBName', '$debtor->DBAdd1', '$debtor->DBAdd2', '$debtor->DBCity', '$debtor->DBProv', '$debtor->DBPCod', '$debtor->DBCnt', '$debtor->DBSAdd', '$debtor->DBCountry', '$debtor->DB2Name', '$debtor->DB2Add1', '$debtor->DB2Add2', '$debtor->DB2City', '$debtor->DB2Prov', '$debtor->DB2PCod', '$debtor->DB2Tel', '$debtor->DB2SIN', '$debtor->DB2Rel', '$debtor->DB2DOB', '$debtor->DBCltNo', '$debtor->DBClt', '$debtor->DBSalesRep', '$debtor->DBCollNum', '$debtor->DBTracNum', '$debtor->DBLglNum', '$debtor->DBComRate', '$debtor->DBRefNum', '$debtor->DBListed', '$debtor->DBStatus', '$debtor->DBCrBu', '$debtor->CrBuOn', '$debtor->DBTel1', '$debtor->DBTel2', '$debtor->DBTel3', '$debtor->DBEmail', '$debtor->POE', '$debtor->PTel', '$debtor->DBBTC', '$debtor->DBList', '$debtor->DBIncurred', '$debtor->DBWorked', '$debtor->DBIntRate', '$debtor->DBItIntDef', '$debtor->DBNxt', '$debtor->DBPriority', '$debtor->DBColNot', '$debtor->DBScore', '$debtor->TUCScore', '$debtor->DBSIN', '$debtor->DBDOB', '$debtor->DBDLNum', '$debtor->DBCCNum', '$debtor->DBAKA', '$debtor->DBCCExp', '$debtor->DBOrigCreditory', '$debtor->DBComment1', '$debtor->DBComment2', '$debtor->DBPOEAddress', '$debtor->DBPOECity', '$debtor->DBPOEProv', '$debtor->DBPOEPostalCode', '$debtor->DBPOEContact', '$debtor->DBPOEFax', '$debtor->DBPOEJobTitle', '$debtor->DBPOESalary', '$debtor->DBPOENote', '$debtor->CltInfo1', '$debtor->CltInfo2', '$debtor->CltInfo3', '$debtor->CltInfo4', '$debtor->CltInfo5', '$debtor->CltInfo6', '$debtor->CltInfo7', '$debtor->DBLttrLog', '$debtor->TraceNote', '$debtor->LGLClaim', '$debtor->LGLPreJudgement', '$debtor->LGLCourtAddress', '$debtor->LGLPostJudgement', '$debtor->LGLSchedA', '$debtor->LGLJudgementIntRate', '$debtor->LGLAmtClaimed', '$debtor->LGLJudgDate', '$debtor->LGLCourtCosts', '$debtor->LGLJudgAmt', '$debtor->DBPadDate', '$debtor->DBBankNo', '$debtor->DBPadAmt', '$debtor->DBTransitNo', '$debtor->DBPadTrm', '$debtor->DBAcctNo', '$debtor->DBPadLft', '$debtor->DBAcctName', '$debtor->DBPadAct', '$debtor->DBViciLoad', '$debtor->casefileUID', '$debtor->DBCCExpMonth', '$debtor->DBCCExpYear', '$debtor->DBBal', '$debtor->DBPd', '$debtor->DBInstr0' );";
            
            $recordCount = 0;
            if ($resultSet = $sql->fetch(PDO::FETCH_ASSOC)) {
                $recordCount = $resultSet["recordCount"];
            }
            
            return $recordCount;
        }
        
        // public static function searchWithFullDetails( $companyUID, $userUID, $debtor, $offset = 0, $limit = 1000 ) {
        public static function searchWithFullDetails( $companyUID, $userUID, $searchTerms, $offset = 0, $limit = 1000 ) {
            
            $debtor = self::createDebtorFromSearchResults($searchTerms);
            $searchResults = self::debtorCafeFilefullSearch( $debtor, $offset, $limit );
            
            $staffDetails = User::getStaffDetails($userUID, $companyUID);
            $debtors = array();
            foreach ($searchResults as $search) {
                $debtor = Debtor::getDebtorCaseFileFromCasefileUID( $search["casefileUID"], $companyUID, $userUID );
                array_push($debtors, $debtor);
            } 
            return $debtors;
        }

        public static function createDebtorFromSearchResults($searchTerms){
            $debtor = new Debtor();
             /*1st row - 1st grouping*/
            //DBData Tab
            $debtor->DBID = $searchTerms["DBID"];
            $debtor->DBTitle = $searchTerms["DBTitle"];
            // $debtor->DBComm = $searchTerms["DBComm"];
            $debtor->DBName = $searchTerms["DBName"];
            $debtor->DBAdd1 = $searchTerms["DBAdd1"];
            $debtor->DBAdd2 = $searchTerms["DBAdd2"];
            $debtor->DBCity = $searchTerms["DBCity"];
            $debtor->DBProv = $searchTerms["DBProv"];
            $debtor->DBPCod = $searchTerms["DBPCod"];
            $debtor->DBCnt = $searchTerms["DBCnt"];
            $debtor->DBSAdd = $searchTerms["DBSAdd"];
            $debtor->DBCountry = $searchTerms["DBCountry"];
            
            //DB2Data
            $debtor->DB2Name = $searchTerms["DB2Name"];
            $debtor->DB2Add1 = $searchTerms["DB2Add1"];
            $debtor->DB2Add2 = $searchTerms["DB2Add2"];
            $debtor->DB2City = $searchTerms["DB2City"];
            $debtor->DB2Prov = $searchTerms["DB2Prov"];
            $debtor->DB2PCod = $searchTerms["DB2PCod"];
            $debtor->DB2Tel = $searchTerms["DB2Tel"];
            $debtor->DB2SIN = $searchTerms["DB2SIN"];
            $debtor->DB2Rel = $searchTerms["DB2Rel"];
            $debtor->DB2DOB = $searchTerms["DB2DOB"];
            
            
            /*1st row - 2nd grouping*/
            //DBCItInfo
            $debtor->DBCltNo = $searchTerms["DBCltNo"];
            $debtor->DBInstr0 = $searchTerms["DBInstr0"];
            $debtor->DBClt = $searchTerms["DBClt"];
            $debtor->DBSalesRep = $searchTerms["DBSalesRep"];
            $debtor->DBCollNum = $searchTerms["DBCollNum"];
            $debtor->DBTracNum = $searchTerms["DBTracNum"];
            $debtor->DBLglNum = $searchTerms["DBLglNum"];
            $debtor->DBComRate = $searchTerms["DBComRate"];
            $debtor->DBRefNum = $searchTerms["DBRefNum"];
            $debtor->DBListed = $searchTerms["DBListed"];
            $debtor->DBStatus = $searchTerms["DBStatus"];
            $debtor->DBCrBu = $searchTerms["DBCrBu"];
            // $debtor->CrBuOn = $searchTerms["CrBuOn"];
            
            /*2nd row - 1st grouping*/
            $debtor->DBTel1 = $searchTerms["DBTel1"];
            $debtor->DBTel2 = $searchTerms["DBTel2"];
            $debtor->DBTel3 = $searchTerms["DBTel3"];
            $debtor->DBEmail = $searchTerms["DBEmail"];
            $debtor->POE = $searchTerms["POE"];
            $debtor->PTel = $searchTerms["PTel"];
            $debtor->DBBTC = $searchTerms["DBBTC"];
            //function VICI         //Vicidial Update
            $debtor->DBList = $searchTerms["DBList"];
            $debtor->DBIncurred = $searchTerms["DBIncurred"];
            $debtor->DBPd = $searchTerms["DBPd"];
            
            $debtor->DBWorked = $searchTerms["DBWorked"];
            $debtor->DBBal = $searchTerms["DBBal"];
            $debtor->DBIntRate = $searchTerms["DBIntRate"];
            // $debtor->DBItIntDef = $searchTerms["DBItIntDef"];
            $debtor->DBNxt = $searchTerms["DBNxt"];
            $debtor->DBPriority = $searchTerms["DBPriority"];
            $debtor->DBColNot = $searchTerms["DBColNot"];
            $debtor->DBScore = $searchTerms["DBScore"];
            $debtor->TUCScore = $searchTerms["TUCScore"];
            
            /*2nd row - 2nd grouping*/
            //DBINF
            $debtor->DBSIN = $searchTerms["DBSIN"];
            $debtor->DBDOB = $searchTerms["DBDOB"];
            $debtor->DBDLNum = $searchTerms["DBDLNum"];
            $debtor->DBCCNum = $searchTerms["DBCCNum"];
            $debtor->DBAKA = $searchTerms["DBAKA"];
            $debtor->DBCCExp = $searchTerms["DBCCExp"];
            $debtor->DBOrigCreditory = $searchTerms["DBOrigCreditory"];
            $debtor->DBComment1 = $searchTerms["DBComment1"];
            $debtor->DBComment2 = $searchTerms["DBComment2"];
            
            //POE - Place of Employment
            $debtor->DBPOEAddress = $searchTerms["DBPOEAddress"];
            $debtor->DBPOECity = $searchTerms["DBPOECity"];
            $debtor->DBPOEProv = $searchTerms["DBPOEProv"];
            $debtor->DBPOEPostalCode = $searchTerms["DBPOEPostalCode"];
            $debtor->DBPOEContact = $searchTerms["DBPOEContact"];
            $debtor->DBPOEFax = $searchTerms["DBPOEFax"];
            $debtor->DBPOEJobTitle = $searchTerms["DBPOEJobTitle"];
            $debtor->DBPOESalary = $searchTerms["DBPOESalary"];
            $debtor->DBPOENote = $searchTerms["DBPOENote"];
            
            //CLTiNF
            $debtor->CltInfo1 = $searchTerms["CltInfo1"];
            $debtor->CltInfo2 = $searchTerms["CltInfo2"];
            $debtor->CltInfo3 = $searchTerms["CltInfo3"];
            $debtor->CltInfo4 = $searchTerms["CltInfo4"];
            $debtor->CltInfo5 = $searchTerms["CltInfo5"];
            $debtor->CltInfo6 = $searchTerms["CltInfo6"];
            $debtor->CltInfo7 = $searchTerms["CltInfo7"];
            
            //LTTR
            $debtor->DBLttrLog = $searchTerms["DBLttrLog"];

            
            //TRACE
            $debtor->TraceNote = $searchTerms["TraceNote"];

            
            //LGL - Legal
            $debtor->LGLClaim = $searchTerms["LGLClaim"];
            $debtor->LGLPreJudgement = $searchTerms["LGLPreJudgement"];
            $debtor->LGLCourtAddress = $searchTerms["LGLCourtAddress"];
            $debtor->LGLPostJudgement = $searchTerms["LGLPostJudgement"];
            $debtor->LGLSchedA = $searchTerms["LGLSchedA"];
            $debtor->LGLJudgementIntRate = $searchTerms["LGLJudgementIntRate"];
            // $debtor->LGLAmtClaimed = $searchTerms["LGLAmtClaimed"];
            $debtor->LGLJudgDate = $searchTerms["LGLJudgDate"];
            $debtor->LGLCourtCosts = $searchTerms["LGLCourtCosts"];
            $debtor->LGLJudgAmt = $searchTerms["LGLJudgAmt"];
            
            //PMTS
            $debtor->DBPadDate = $searchTerms["DBPadDate"];
            $debtor->DBBankNo = $searchTerms["DBBankNo"];
            $debtor->DBPadAmt = $searchTerms["DBPadAmt"];
            $debtor->DBTransitNo = $searchTerms["DBTransitNo"];
            $debtor->DBPadTrm = $searchTerms["DBPadTrm"];
            $debtor->DBAcctNo = $searchTerms["DBAcctNo"];
            $debtor->DBPadLft = $searchTerms["DBPadLft"];
            $debtor->DBAcctName = $searchTerms["DBAcctName"];
            $debtor->DBPadAct = $searchTerms["DBPadAct"];

            return $debtor;
        }
        
        public static function salesFullSearch( $sales, $companyUID, $offset = 0, $limit = -1 ) {
            $dbConn = new HyparecMySQL();
            $conn = $dbConn->getPDOConn();
            
            $debtor = self::checkForNumberOrDateModifiers( $sales );
            
            $sql = $conn->prepare("call salesFullSearch ( :salesUID, :userUID, :companyUID,  
                :RevPanel, :CltID, :CltBill, :CltInv, :CltScrn, :CltGST, :CltStmt, :CltLgl, :CltCrBu, :CltClosed, :CltTrust, :CltBank, :CltTransit, :CltAcct,
                :CltNo, :CltGrpNo, :CltCt1, :CltCt1Title, :CltCt1Note, :CltName, :CltCt2, :CltCt2Title, :CltCt2Note, :CltAdd1, :CltCt3, :CltCt3Title, :CltCt3Note,
                :CltAdd2, :CltInstructions, :CltCity, :CltProv, :CltPCod, :CltTel1, :CltFax, :CltEmlPm, :CltReview, :CltRefNum, :CltEmIn, :CltTel2, :CltEmail,
                :CltViciList, :CltTel3, :CltACH, :SalesNoteSum, :CltImportSpec, :CltIntDeferred, :SalesStatus, :CltComRate, :CltSales, :CltWorked, :CltSpcStats,
                :CltPrefCol, :CltIntRate, :CltSalesNotes, :CltNxt, :Score, :CltNote0, :GrpNote0, :CltStartDate, :CltIndGrp, :CltDRNNo, :CltLastListed,
                :CltDRNNoteBatch, :CltDRNStatusBatch, :CltAccts, :CltDRNPmtBatch, :CltListed, :CltDRNRemitBatch, :CltColl, :CltDRNShortName, :CltLiq, :CltStMonth,
                :CltStComH, :CltStBill, :CltAR91, :CltStPdHere, :CltStComD, :CltStPrevB, :CltStPdDir, :CltStComT, :CltOwes, :CltStHST, :CltOwesTtl,
                :CltSalesFull, :CltSalesTitle, :CltSalesExt, :CltSalesEmail, :CltIntRate2, :LE3, :LE4,
                :limit, :offset
            )");
            $sql->bindParam(":salesUID", $sales->salesUID );
            $sql->bindParam(":userUID", $sales->userUID );
            $sql->bindParam(":companyUID", $sales->companyUID );
            
            $sql->bindParam(":RevPanel", $sales->RevPanel );
            $sql->bindParam(":CltID", $sales->CltID );
            $sql->bindParam(":CltBill", $sales->CltBill );
            $sql->bindParam(":CltInv", $sales->CltInv );
            $sql->bindParam(":CltScrn", $sales->CltScrn );
            $sql->bindParam(":CltGST", $sales->CltGST );
            $sql->bindParam(":CltStmt", $sales->CltStmt );
            $sql->bindParam(":CltLgl", $sales->CltLgl );
            $sql->bindParam(":CltCrBu", $sales->CltCrBu );
            $sql->bindParam(":CltClosed", $sales->CltClosed );
            $sql->bindParam(":CltTrust", $sales->CltTrust );
            $sql->bindParam(":CltBank", $sales->CltBank );
            $sql->bindParam(":CltTransit", $sales->CltTransit );
            $sql->bindParam(":CltAcct", $sales->CltAcct );
            $sql->bindParam(":CltNo", $sales->CltNo );
            $sql->bindParam(":CltGrpNo", $sales->CltGrpNo );
            $sql->bindParam(":CltCt1", $sales->CltCt1 );
            $sql->bindParam(":CltCt1Title", $sales->CltCt1Title );
            $sql->bindParam(":CltCt1Note", $sales->CltCt1Note );
            $sql->bindParam(":CltName", $sales->CltName );
            $sql->bindParam(":CltCt2", $sales->CltCt2 );
            $sql->bindParam(":CltCt2Title", $sales->CltCt2Title );
            $sql->bindParam(":CltCt2Note", $sales->CltCt2Note );
            $sql->bindParam(":CltAdd1", $sales->CltAdd1 );
            $sql->bindParam(":CltCt3", $sales->CltCt3 );
            $sql->bindParam(":CltCt3Title", $sales->CltCt3Title );
            $sql->bindParam(":CltCt3Note", $sales->CltCt3Note );
            $sql->bindParam(":CltAdd2", $sales->CltAdd2 );
            $sql->bindParam(":CltInstructions", $sales->CltInstructions );
            $sql->bindParam(":CltCity", $sales->CltCity );
            $sql->bindParam(":CltProv", $sales->CltProv );
            $sql->bindParam(":CltPCod", $sales->CltPCod );
            $sql->bindParam(":CltTel1", $sales->CltTel1 );
            $sql->bindParam(":CltFax", $sales->CltFax );
            $sql->bindParam(":CltEmlPm", $sales->CltEmlPm );
            $sql->bindParam(":CltReview", $sales->CltReview );
            $sql->bindParam(":CltRefNum", $sales->CltRefNum );
            $sql->bindParam(":CltEmIn", $sales->CltEmIn );
            $sql->bindParam(":CltTel2", $sales->CltTel2 );
            $sql->bindParam(":CltEmail", $sales->CltEmail );
            $sql->bindParam(":CltViciList", $sales->CltViciList );
            $sql->bindParam(":CltTel3", $sales->CltTel3 );
            $sql->bindParam(":CltACH", $sales->CltACH );
            $sql->bindParam(":SalesNoteSum", $sales->SalesNoteSum );
            $sql->bindParam(":CltImportSpec", $sales->CltImportSpec );
            $sql->bindParam(":CltIntDeferred", $sales->CltIntDeferred );
            $sql->bindParam(":SalesStatus", $sales->SalesStatus );
            $sql->bindParam(":CltComRate", $sales->CltComRate );
            $sql->bindParam(":CltSales", $sales->CltSales );
            $sql->bindParam(":CltWorked", $sales->CltWorked );
            $sql->bindParam(":CltSpcStats", $sales->CltSpcStats );
            $sql->bindParam(":CltPrefCol", $sales->CltPrefCol );
            $sql->bindParam(":CltIntRate", $sales->CltIntRate );
            $sql->bindParam(":CltSalesNotes", $sales->CltSalesNotes );
            $sql->bindParam(":CltNxt", $sales->CltNxt );
            $sql->bindParam(":Score", $sales->Score );
            $sql->bindParam(":CltNote0", $sales->CltNote0 );
            $sql->bindParam(":GrpNote0", $sales->GrpNote0 );
            $sql->bindParam(":CltStartDate", $sales->CltStartDate );
            $sql->bindParam(":CltIndGrp", $sales->CltIndGrp );
            $sql->bindParam(":CltDRNNo", $sales->CltDRNNo );
            $sql->bindParam(":CltLastListed", $sales->CltLastListed );
            $sql->bindParam(":CltDRNNoteBatch", $sales->CltDRNNoteBatch );
            $sql->bindParam(":CltDRNStatusBatch", $sales->CltDRNStatusBatch );
            $sql->bindParam(":CltAccts", $sales->CltAccts );
            $sql->bindParam(":CltDRNPmtBatch", $sales->CltDRNPmtBatch );
            $sql->bindParam(":CltListed", $sales->CltListed );
            $sql->bindParam(":CltDRNRemitBatch", $sales->CltDRNRemitBatch );
            $sql->bindParam(":CltColl", $sales->CltColl );
            $sql->bindParam(":CltDRNShortName", $sales->CltDRNShortName );
            $sql->bindParam(":CltLiq", $sales->CltLiq );
            $sql->bindParam(":CltStMonth", $sales->CltStMonth );
            $sql->bindParam(":CltStComH", $sales->CltStComH );
            $sql->bindParam(":CltStBill", $sales->CltStBill );
            $sql->bindParam(":CltAR91", $sales->CltAR91 );
            $sql->bindParam(":CltStPdHere", $sales->CltStPdHere );
            $sql->bindParam(":CltStComD", $sales->CltStComD );
            $sql->bindParam(":CltStPrevB", $sales->CltStPrevB );
            $sql->bindParam(":CltStPdDir", $sales->CltStPdDir );
            $sql->bindParam(":CltStComT", $sales->CltStComT );
            $sql->bindParam(":CltOwes", $sales->CltOwes );
            $sql->bindParam(":CltStHST", $sales->CltStHST );
            $sql->bindParam(":CltOwesTtl", $sales->CltOwesTtl );
            $sql->bindParam(":CltSalesFull", $sales->CltSalesFull );
            $sql->bindParam(":CltSalesTitle", $sales->CltSalesTitle );
            $sql->bindParam(":CltSalesExt", $sales->CltSalesExt );
            $sql->bindParam(":CltSalesEmail", $sales->CltSalesEmail );
            $sql->bindParam(":CltIntRate2", $sales->CltIntRate2 );
            $sql->bindParam(":LE3", $sales->LE3 );
            $sql->bindParam(":LE4", $sales->LE4 );
            $sql->bindParam(":limit", $limit );
            $sql->bindParam(":offset", $offset );
            $sql->execute();
            //echo "call salesFullSearch ( '$sales->salesUID', '$sales->userUID', '$sales->companyUID', '$sales->RevPanel', '$sales->CltID', '$sales->CltBill', '$sales->CltInv', '$sales->CltScrn', '$sales->CltGST', '$sales->CltStmt', '$sales->CltLgl', '$sales->CltCrBu', '$sales->CltClosed', '$sales->CltTrust', '$sales->CltBank', '$sales->CltTransit', '$sales->CltAcct','$sales->CltNo', '$sales->CltGrpNo', '$sales->CltCt1', '$sales->CltCt1Title', '$sales->CltCt1Note', '$sales->CltName', '$sales->CltCt2', '$sales->CltCt2Title', '$sales->CltCt2Note', '$sales->CltAdd1', '$sales->CltCt3', '$sales->CltCt3Title', '$sales->CltCt3Note','$sales->CltAdd2', '$sales->CltInstructions', '$sales->CltCity', '$sales->CltProv', '$sales->CltPCod', '$sales->CltTel1', '$sales->CltFax', '$sales->CltEmlPm', '$sales->CltReview', '$sales->CltRefNum', '$sales->CltEmIn', '$sales->CltTel2', '$sales->CltEmail','$sales->CltViciList', '$sales->CltTel3', '$sales->CltACH', '$sales->SalesNoteSum', '$sales->CltImportSpec', '$sales->CltIntDeferred', '$sales->SalesStatus', '$sales->CltComRate', '$sales->CltSales', '$sales->CltWorked', '$sales->CltSpcStats','$sales->CltPrefCol', '$sales->CltIntRate', '$sales->CltSalesNotes', '$sales->CltNxt', '$sales->Score', '$sales->CltNote0', '$sales->GrpNote0', '$sales->CltStartDate', '$sales->CltIndGrp', '$sales->CltDRNNo', '$sales->CltLastListed','$sales->CltDRNNoteBatch', '$sales->CltDRNStatusBatch', '$sales->CltAccts', '$sales->CltDRNPmtBatch', '$sales->CltListed', '$sales->CltDRNRemitBatch', '$sales->CltColl', '$sales->CltDRNShortName', '$sales->CltLiq', '$sales->CltStMonth','$sales->CltStComH', '$sales->CltStBill', '$sales->CltAR91', '$sales->CltStPdHere', '$sales->CltStComD', '$sales->CltStPrevB', '$sales->CltStPdDir', '$sales->CltStComT', '$sales->CltOwes', '$sales->CltStHST', '$sales->CltOwesTtl','$sales->CltSalesFull', '$sales->CltSalesTitle', '$sales->CltSalesExt', '$sales->CltSalesEmail', '$sales->CltIntRate2', '$sales->LE3', '$sales->LE4', '$limit', '$offset' )";
            
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public static function staffFullSearch( $staff, $companyUID, $offset = 0, $limit = -1 ) {
            $dbConn = new HyparecMySQL();
            $conn = $dbConn->getPDOConn();
            
            $debtor = self::checkForNumberOrDateModifiers( $staff );
            
            $sql = $conn->prepare("call staffFullSearch ( :staffUID, :userUID, :companyUID,  
                :StaffID, :StaffRef, :StaffAdd1, :StaffBenefits, :StaffSignature, :StaffName, :StaffAdd2, :StaffPension, :StaffTitle, 
                :StaffCity, :StaffPerks, :StaffPic, :StaffEmail, :StaffProv, :StaffSec, :StaffLicNo, :StaffPCod, :StaffPwd, :StaffStartDate, 
                :StaffBranch, :StaffTransferLimit, :StaffOffProbDate, :StaffExt, :StaffLimitBranch, :StaffEndDate, :Staff8000, :StaffLimitClt, 
                :StaffRank, :StaffQueue, :StaffLimitUser, :StaffViciCampaign, :StaffTelIP, :StaffTel, :StaffViciList, :StaffMU, :StaffNote, 
                :StaffPortfolio, :StaffSpill, :StAbsCt, :StPrsCt, :StVacCt, :StLearning, :StAttendNote, :StAttendPanel, :StAccPmtSc, 
                :StAccTasks, :StAltDocs, :StAccBackup, :StAccTasks0, :StTimeOut, :StAccNoteSc, :StAccSales, :StAccNewBiz, :StAccNewLead, 
                :StAccStaff, :StLimitCltNo, :StLimitSales, :StAccDBPayDep, :StAccDBPayEFT, :StAccSMS, :StAccDBPayBack, :StAccDBPayCC, 
                :StAccRevRept, :StAccLttr, :StAccDBPayFwd, :StAccDBPayChq, :StAccStStRept, :StAccCalendar, :StAccDBPayButton, 
                :StAccDBPayMO, :StAccRevTRept, :StAccDBMSMS, :StAccNSFOverride, :StAccDBPayDir, :StAccDBPayRfd, :StAccDBLglFees, :StAccDBMEmail, 
                :StAccDBPayOut, :StAccDBPayACH, :StAccDBPayAdj, :StAccMLttr, :StAccDBPayNSF, :StaffPmtNoVerify, :StDBKill, :StAccSensitive, 
                :StAccDBPayClAd, :StAccDBPayInv, :StaffStatOUT, :StaffStatINB, :StaffStatEML, :StaffStatSMS, :StaffStatINX, :StaffScore, 
                :RevRevenue, :RevHistory, :StaffYTD, :RevCallCount, :RevAbs, :RevSocialMed, :RevAdj, :RevComments, :StaffAgent, :StaffAgTel, 
                :StaffAgAdd, :StaffAgFax, :StaffAgCity, :StaffAgLSUC, :StaffAgProv, :StaffAgPC, :Note0,
                :limit, :offset
            )");
            $sql->bindParam(":staffUID", $staff->staffUID );
            $sql->bindParam(":userUID", $staff->userUID );
            $sql->bindParam(":companyUID", $staff->companyUID );
            
            $sql->bindParam(":StaffID", $staff->StaffID );
            $sql->bindParam(":StaffRef", $staff->StaffRef );
            $sql->bindParam(":StaffAdd1", $staff->StaffAdd1 );
            $sql->bindParam(":StaffBenefits", $staff->StaffBenefits );
            $sql->bindParam(":StaffSignature", $staff->StaffSignature );
            $sql->bindParam(":StaffName", $staff->StaffName );
            $sql->bindParam(":StaffAdd2", $staff->StaffAdd2 );
            $sql->bindParam(":StaffPension", $staff->StaffPension );
            $sql->bindParam(":StaffTitle", $staff->StaffTitle );
            $sql->bindParam(":StaffCity", $staff->StaffCity );
            $sql->bindParam(":StaffPerks", $staff->StaffPerks );
            $sql->bindParam(":StaffPic", $staff->StaffPic );
            $sql->bindParam(":StaffEmail", $staff->StaffEmail );
            $sql->bindParam(":StaffProv", $staff->StaffProv );
            $sql->bindParam(":StaffSec", $staff->StaffSec );
            $sql->bindParam(":StaffLicNo", $staff->StaffLicNo );
            $sql->bindParam(":StaffPCod", $staff->StaffPCod );
            $sql->bindParam(":StaffPwd", $staff->StaffPwd );
            $sql->bindParam(":StaffStartDate", $staff->StaffStartDate );
            $sql->bindParam(":StaffBranch", $staff->StaffBranch );
            $sql->bindParam(":StaffTransferLimit", $staff->StaffTransferLimit );
            $sql->bindParam(":StaffOffProbDate", $staff->StaffOffProbDate );
            $sql->bindParam(":StaffExt", $staff->StaffExt );
            $sql->bindParam(":StaffLimitBranch", $staff->StaffLimitBranch );
            $sql->bindParam(":StaffEndDate", $staff->StaffEndDate );
            $sql->bindParam(":Staff8000", $staff->Staff8000 );
            $sql->bindParam(":StaffLimitClt", $staff->StaffLimitClt );
            $sql->bindParam(":StaffRank", $staff->StaffRank );
            $sql->bindParam(":StaffQueue", $staff->StaffQueue );
            $sql->bindParam(":StaffLimitUser", $staff->StaffLimitUser );
            $sql->bindParam(":StaffViciCampaign", $staff->StaffViciCampaign );
            $sql->bindParam(":StaffTelIP", $staff->StaffTelIP );
            $sql->bindParam(":StaffTel", $staff->StaffTel );
            $sql->bindParam(":StaffViciList", $staff->StaffViciList );
            $sql->bindParam(":StaffMU", $staff->StaffMU );
            $sql->bindParam(":StaffNote", $staff->StaffNote );
            $sql->bindParam(":StaffPortfolio", $staff->StaffPortfolio );
            $sql->bindParam(":StaffSpill", $staff->StaffSpill );
            $sql->bindParam(":StAbsCt", $staff->StAbsCt );
            $sql->bindParam(":StPrsCt", $staff->StPrsCt );
            $sql->bindParam(":StVacCt", $staff->StVacCt );
            $sql->bindParam(":StLearning", $staff->StLearning );
            $sql->bindParam(":StAttendNote", $staff->StAttendNote );
            $sql->bindParam(":StAttendPanel", $staff->StAttendPanel );
            $sql->bindParam(":StAccPmtSc", $staff->StAccPmtSc );
            $sql->bindParam(":StAccTasks", $staff->StAccTasks );
            $sql->bindParam(":StAltDocs", $staff->StAltDocs );
            $sql->bindParam(":StAccBackup", $staff->StAccBackup );
            $sql->bindParam(":StAccTasks0", $staff->StAccTasks0 );
            $sql->bindParam(":StTimeOut", $staff->StTimeOut );
            $sql->bindParam(":StAccNoteSc", $staff->StAccNoteSc );
            $sql->bindParam(":StAccSales", $staff->StAccSales );
            $sql->bindParam(":StAccNewBiz", $staff->StAccNewBiz );
            $sql->bindParam(":StAccNewLead", $staff->StAccNewLead );
            $sql->bindParam(":StAccStaff", $staff->StAccStaff );
            $sql->bindParam(":StLimitCltNo", $staff->StLimitCltNo );
            $sql->bindParam(":StLimitSales", $staff->StLimitSales );
            $sql->bindParam(":StAccDBPayDep", $staff->StAccDBPayDep );
            $sql->bindParam(":StAccDBPayEFT", $staff->StAccDBPayEFT );
            $sql->bindParam(":StAccSMS", $staff->StAccSMS );
            $sql->bindParam(":StAccDBPayBack", $staff->StAccDBPayBack );
            $sql->bindParam(":StAccDBPayCC", $staff->StAccDBPayCC );
            $sql->bindParam(":StAccRevRept", $staff->StAccRevRept );
            $sql->bindParam(":StAccLttr", $staff->StAccLttr );
            $sql->bindParam(":StAccDBPayFwd", $staff->StAccDBPayFwd );
            $sql->bindParam(":StAccDBPayChq", $staff->StAccDBPayChq );
            $sql->bindParam(":StAccStStRept", $staff->StAccStStRept );
            $sql->bindParam(":StAccCalendar", $staff->StAccCalendar );
            $sql->bindParam(":StAccDBPayButton", $staff->StAccDBPayButton );
            $sql->bindParam(":StAccDBPayMO", $staff->StAccDBPayMO );
            $sql->bindParam(":StAccRevTRept", $staff->StAccRevTRept );
            $sql->bindParam(":StAccDBMSMS", $staff->StAccDBMSMS );
            $sql->bindParam(":StAccNSFOverride", $staff->StAccNSFOverride );
            $sql->bindParam(":StAccDBPayDir", $staff->StAccDBPayDir );
            $sql->bindParam(":StAccDBPayRfd", $staff->StAccDBPayRfd );
            $sql->bindParam(":StAccDBLglFees", $staff->StAccDBLglFees );
            $sql->bindParam(":StAccDBMEmail", $staff->StAccDBMEmail );
            $sql->bindParam(":StAccDBPayOut", $staff->StAccDBPayOut );
            $sql->bindParam(":StAccDBPayACH", $staff->StAccDBPayACH );
            $sql->bindParam(":StAccDBPayAdj", $staff->StAccDBPayAdj );
            $sql->bindParam(":StAccMLttr", $staff->StAccMLttr );
            $sql->bindParam(":StAccDBPayNSF", $staff->StAccDBPayNSF );
            $sql->bindParam(":StaffPmtNoVerify", $staff->StaffPmtNoVerify );
            $sql->bindParam(":StDBKill", $staff->StDBKill );
            $sql->bindParam(":StAccSensitive", $staff->StAccSensitive );
            $sql->bindParam(":StAccDBPayClAd", $staff->StAccDBPayClAd );
            $sql->bindParam(":StAccDBPayInv", $staff->StAccDBPayInv );
            $sql->bindParam(":StaffStatOUT", $staff->StaffStatOUT );
            $sql->bindParam(":StaffStatINB", $staff->StaffStatINB );
            $sql->bindParam(":StaffStatEML", $staff->StaffStatEML );
            $sql->bindParam(":StaffStatSMS", $staff->StaffStatSMS );
            $sql->bindParam(":StaffStatINX", $staff->StaffStatINX );
            $sql->bindParam(":StaffScore", $staff->StaffScore );
            $sql->bindParam(":RevRevenue", $staff->RevRevenue );
            $sql->bindParam(":RevHistory", $staff->RevHistory );
            $sql->bindParam(":StaffYTD", $staff->StaffYTD );
            $sql->bindParam(":RevCallCount", $staff->RevCallCount );
            $sql->bindParam(":RevAbs", $staff->RevAbs );
            $sql->bindParam(":RevSocialMed", $staff->RevSocialMed );
            $sql->bindParam(":RevAdj", $staff->RevAdj );
            $sql->bindParam(":RevComments", $staff->RevComments );
            $sql->bindParam(":StaffAgent", $staff->StaffAgent );
            $sql->bindParam(":StaffAgTel", $staff->StaffAgTel );
            $sql->bindParam(":StaffAgAdd", $staff->StaffAgAdd );
            $sql->bindParam(":StaffAgFax", $staff->StaffAgFax );
            $sql->bindParam(":StaffAgCity", $staff->StaffAgCity );
            $sql->bindParam(":StaffAgLSUC", $staff->StaffAgLSUC );
            $sql->bindParam(":StaffAgProv", $staff->StaffAgProv );
            $sql->bindParam(":StaffAgPC", $staff->StaffAgPC );
            $sql->bindParam(":Note0", $staff->Note0 );
            $sql->bindParam(":limit", $limit );
            $sql->bindParam(":offset", $offset );
            $sql->execute();
            //echo "call staffFullSearch ( '$staff->staffUID', '$staff->userUID', '$staff->companyUID', '$staff->StaffID', '$staff->StaffRef', '$staff->StaffAdd1', '$staff->StaffBenefits', '$staff->StaffSignature', '$staff->StaffName', '$staff->StaffAdd2', '$staff->StaffPension', '$staff->StaffTitle', '$staff->StaffCity', '$staff->StaffPerks', '$staff->StaffPic', '$staff->StaffEmail', '$staff->StaffProv', '$staff->StaffSec', '$staff->StaffLicNo', '$staff->StaffPCod', '$staff->StaffPwd', '$staff->StaffStartDate', '$staff->StaffBranch', '$staff->StaffTransferLimit', '$staff->StaffOffProbDate', '$staff->StaffExt', '$staff->StaffLimitBranch', '$staff->StaffEndDate', '$staff->Staff8000', '$staff->StaffLimitClt', '$staff->StaffRank', '$staff->StaffQueue', '$staff->StaffLimitUser', '$staff->StaffViciCampaign', '$staff->StaffTelIP', '$staff->StaffTel', '$staff->StaffViciList', '$staff->StaffMU', '$staff->StaffNote', '$staff->StaffPortfolio', '$staff->StaffSpill', '$staff->StAbsCt', '$staff->StPrsCt', '$staff->StVacCt', '$staff->StLearning', '$staff->StAttendNote', '$staff->StAttendPanel', '$staff->StAccPmtSc', '$staff->StAccTasks', '$staff->StAltDocs', '$staff->StAccBackup', '$staff->StAccTasks0', '$staff->StTimeOut', '$staff->StAccNoteSc', '$staff->StAccSales', '$staff->StAccNewBiz', '$staff->StAccNewLead', '$staff->StAccStaff', '$staff->StLimitCltNo', '$staff->StLimitSales', '$staff->StAccDBPayDep', '$staff->StAccDBPayEFT', '$staff->StAccSMS', '$staff->StAccDBPayBack', '$staff->StAccDBPayCC', '$staff->StAccRevRept', '$staff->StAccLttr', '$staff->StAccDBPayFwd', '$staff->StAccDBPayChq', '$staff->StAccStStRept', '$staff->StAccCalendar', '$staff->StAccDBPayButton', '$staff->StAccDBPayMO', '$staff->StAccRevTRept', '$staff->StAccDBMSMS', '$staff->StAccNSFOverride', '$staff->StAccDBPayDir', '$staff->StAccDBPayRfd', '$staff->StAccDBLglFees', '$staff->StAccDBMEmail', '$staff->StAccDBPayOut', '$staff->StAccDBPayACH', '$staff->StAccDBPayAdj', '$staff->StAccMLttr', '$staff->StAccDBPayNSF', '$staff->StaffPmtNoVerify', '$staff->StDBKill', '$staff->StAccSensitive', '$staff->StAccDBPayClAd', '$staff->StAccDBPayInv', '$staff->StaffStatOUT', '$staff->StaffStatINB', '$staff->StaffStatEML', '$staff->StaffStatSMS', '$staff->StaffStatINX', '$staff->StaffScore', '$staff->RevRevenue', '$staff->RevHistory', '$staff->StaffYTD', '$staff->RevCallCount', '$staff->RevAbs', '$staff->RevSocialMed', '$staff->RevAdj', '$staff->RevComments', '$staff->StaffAgent', '$staff->StaffAgTel', '$staff->StaffAgAdd', '$staff->StaffAgFax', '$staff->StaffAgCity', '$staff->StaffAgLSUC', '$staff->StaffAgProv', '$staff->StaffAgPC', '$staff->Note0', '$limit', '$offset' )";
            
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        
    }
    
?>
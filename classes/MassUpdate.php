<?
/**
 * Update All of the Search Results at once
 */
    class MassUpdate {
        
        
        public static function fixNameUpperLowerCase ( $debtor ) {
            $result = self::processSQLStatement( "fixNameUpperLowerCase", $debtor);
            return $result;
        }
        
        private static function processSQLStatement ( $storedProc, $debtor ) {
            $dbConn = new HyparecMySQL();
            $conn = $dbConn->getPDOConn();
            
            $sql = $conn->prepare("call $storedProc ( :DBID, :DBTitle, :DBComm, :DBName, :DBAdd1, :DBAdd2, :DBCity, :DBProv, :DBPCod, :DBCnt, :DBSAdd, :DBCountry, :DB2Name, :DB2Add1, :DB2Add2, :DB2City, :DB2Prov, :DB2PCod, :DB2Tel, :DB2SIN, :DB2Rel, :DB2DOB, :DBCltNo, :DBClt, :DBSalesRep, :DBCollNum, :DBTracNum, :DBLglNum, :DBComRate, :DBRefNum, :DBListed, :DBStatus, :DBCrBu, :CrBuOn, :DBTel1, :DBTel2, :DBTel3, :DBEmail, :POE, :PTel, :DBBTC, :DBList, :DBIncurred, :DBWorked, :DBIntRate, :DBItIntDef, :DBNxt, :DBPriority, :DBColNot, :DBScore, :TUCScore, :DBSIN, :DBDOB, :DBDLNum, :DBCCNum, :DBAKA, :DBCCExp, :DBOrigCreditory, :DBComment1, :DBComment2, :DBPOEAddress, :DBPOECity, :DBPOEProv, :DBPOEPostalCode, :DBPOEContact, :DBPOEFax, :DBPOEJobTitle, :DBPOESalary, :DBPOENote, :CltInfo1, :CltInfo2, :CltInfo3, :CltInfo4, :CltInfo5, :CltInfo6, :CltInfo7, :DBLttrLog, :TraceNote, :LGLClaim, :LGLPreJudgement, :LGLCourtAddress, :LGLPostJudgement, :LGLSchedA, :LGLJudgementIntRate, :LGLAmtClaimed, :LGLJudgDate, :LGLCourtCosts, :LGLJudgAmt, :DBPadDate, :DBBankNo, :DBPadAmt, :DBTransitNo, :DBPadTrm, :DBAcctNo, :DBPadLft, :DBAcctName, :DBPadAct, :DBViciLoad, :casefileUID, :DBCCExpMonth, :DBCCExpYear, :DBBal, :DBPd, :DBInstr0 )");
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
            
            //echo "call fixNameUpperLowerCase ( '$debtor->DBID', '$debtor->DBTitle', '$debtor->DBComm', '$debtor->DBName', '$debtor->DBAdd1', '$debtor->DBAdd2', '$debtor->DBCity', '$debtor->DBProv', '$debtor->DBPCod', '$debtor->DBCnt', '$debtor->DBSAdd', '$debtor->DBCountry', '$debtor->DB2Name', '$debtor->DB2Add1', '$debtor->DB2Add2', '$debtor->DB2City', '$debtor->DB2Prov', '$debtor->DB2PCod', '$debtor->DB2Tel', '$debtor->DB2SIN', '$debtor->DB2Rel', '$debtor->DB2DOB', '$debtor->DBCltNo', '$debtor->DBClt', '$debtor->DBSalesRep', '$debtor->DBCollNum', '$debtor->DBTracNum', '$debtor->DBLglNum', '$debtor->DBComRate', '$debtor->DBRefNum', '$debtor->DBListed', '$debtor->DBStatus', '$debtor->DBCrBu', '$debtor->CrBuOn', '$debtor->DBTel1', '$debtor->DBTel2', '$debtor->DBTel3', '$debtor->DBEmail', '$debtor->POE', '$debtor->PTel', '$debtor->DBBTC', '$debtor->DBList', '$debtor->DBIncurred', '$debtor->DBWorked', '$debtor->DBIntRate', '$debtor->DBItIntDef', '$debtor->DBNxt', '$debtor->DBPriority', '$debtor->DBColNot', '$debtor->DBScore', '$debtor->TUCScore', '$debtor->DBSIN', '$debtor->DBDOB', '$debtor->DBDLNum', '$debtor->DBCCNum', '$debtor->DBAKA', '$debtor->DBCCExp', '$debtor->DBOrigCreditory', '$debtor->DBComment1', '$debtor->DBComment2', '$debtor->DBPOEAddress', '$debtor->DBPOECity', '$debtor->DBPOEProv', '$debtor->DBPOEPostalCode', '$debtor->DBPOEContact', '$debtor->DBPOEFax', '$debtor->DBPOEJobTitle', '$debtor->DBPOESalary', '$debtor->DBPOENote', '$debtor->CltInfo1', '$debtor->CltInfo2', '$debtor->CltInfo3', '$debtor->CltInfo4', '$debtor->CltInfo5', '$debtor->CltInfo6', '$debtor->CltInfo7', '$debtor->DBLttrLog', '$debtor->TraceNote', '$debtor->LGLClaim', '$debtor->LGLPreJudgement', '$debtor->LGLCourtAddress', '$debtor->LGLPostJudgement', '$debtor->LGLSchedA', '$debtor->LGLJudgementIntRate', '$debtor->LGLAmtClaimed', '$debtor->LGLJudgDate', '$debtor->LGLCourtCosts', '$debtor->LGLJudgAmt', '$debtor->DBPadDate', '$debtor->DBBankNo', '$debtor->DBPadAmt', '$debtor->DBTransitNo', '$debtor->DBPadTrm', '$debtor->DBAcctNo', '$debtor->DBPadLft', '$debtor->DBAcctName', '$debtor->DBPadAct', '$debtor->DBViciLoad', '$debtor->casefileUID', '$debtor->DBCCExpMonth', '$debtor->DBCCExpYear', '$debtor->DBBal', '$debtor->DBPd', '$debtor->DBInstr0' )";
            
            return $sql->errorInfo();
        }
        
    }
    
?>
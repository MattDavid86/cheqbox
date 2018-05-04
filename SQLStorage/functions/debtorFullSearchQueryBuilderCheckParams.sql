CREATE FUNCTION `debtorFullSearchQueryBuilderCheckParams` ( 
  in_DBID VARCHAR(500),
  in_DBTitle VARCHAR(500),
  in_DBComm VARCHAR(500),
  in_DBName VARCHAR(500),
  in_DBAdd1 VARCHAR(500),
  in_DBAdd2 VARCHAR(500),
  in_DBCity VARCHAR(500),
  in_DBProv VARCHAR(500),
  in_DBPCod VARCHAR(500),
  in_DBCnt VARCHAR(500),
  in_DBSAdd VARCHAR(500),
  in_DBCountry VARCHAR(500),
  in_DB2Name VARCHAR(500),
  in_DB2Add1 VARCHAR(500),
  in_DB2Add2 VARCHAR(500),
  in_DB2City VARCHAR(500),
  in_DB2Prov VARCHAR(500),
  in_DB2PCod VARCHAR(500),
  in_DB2Tel VARCHAR(500),
  in_DB2SIN VARCHAR(500),
  in_DB2Rel VARCHAR(500),
  in_DB2DOB VARCHAR(500),
  in_DBCltNo VARCHAR(500),
  in_DBClt VARCHAR(500),
  in_DBSalesRep VARCHAR(500),
  in_DBCollNum VARCHAR(500),
  in_DBTracNum VARCHAR(500),
  in_DBLglNum VARCHAR(500),
  in_DBComRate VARCHAR(500),
  in_DBRefNum VARCHAR(500),
  in_DBListed VARCHAR(500),
  in_DBStatus VARCHAR(500),
  in_DBCrBu VARCHAR(500),
  in_CrBuOn VARCHAR(500),
  in_DBTel1 VARCHAR(500),
  in_DBTel2 VARCHAR(500),
  in_DBTel3 VARCHAR(500),
  in_DBEmail VARCHAR(500),
  in_POE VARCHAR(500),
  in_PTel VARCHAR(500),
  in_DBBTC VARCHAR(500),
  in_DBList VARCHAR(500),
  in_DBIncurred VARCHAR(500),
  in_DBWorked VARCHAR(500),
  in_DBIntRate VARCHAR(500),
  in_DBItIntDef VARCHAR(500),
  in_DBNxt VARCHAR(500),
  in_DBPriority VARCHAR(500),
  in_DBColNot VARCHAR(500),
  in_DBScore VARCHAR(500),
  in_TUCScore VARCHAR(500),
  in_DBSIN VARCHAR(500),
  in_DBDOB VARCHAR(500),
  in_DBDLNum VARCHAR(500),
  in_DBCCNum VARCHAR(500),
  in_DBAKA VARCHAR(500),
  in_DBCCExp VARCHAR(500),
  in_DBOrigCreditory VARCHAR(500),
  in_DBComment1 VARCHAR(500),
  in_DBComment2 VARCHAR(500),
  in_DBPOEAddress VARCHAR(500),
  in_DBPOECity VARCHAR(500),
  in_DBPOEProv VARCHAR(500),
  in_DBPOEPostalCode VARCHAR(500),
  in_DBPOEContact VARCHAR(500),
  in_DBPOEFax VARCHAR(500),
  in_DBPOEJobTitle VARCHAR(500),
  in_DBPOESalary VARCHAR(500),
  in_DBPOENote VARCHAR(500),
  in_CltInfo1 LONGTEXT,
  in_CltInfo2 LONGTEXT,
  in_CltInfo3 LONGTEXT,
  in_CltInfo4 LONGTEXT,
  in_CltInfo5 LONGTEXT,
  in_CltInfo6 LONGTEXT,
  in_CltInfo7 LONGTEXT,
  in_DBLttrLog LONGTEXT,
  in_TraceNote LONGTEXT,
  in_LGLClaim VARCHAR(500),
  in_LGLPreJudgement VARCHAR(500),
  in_LGLCourtAddress VARCHAR(500),
  in_LGLPostJudgement VARCHAR(500),
  in_LGLSchedA LONGTEXT,
  in_LGLJudgementIntRate VARCHAR(500),
  in_LGLAmtClaimed VARCHAR(500),
  in_LGLJudgDate VARCHAR(500),
  in_LGLCourtCosts VARCHAR(500),
  in_LGLJudgAmt VARCHAR(500),
  in_DBPadDate VARCHAR(500),
  in_DBBankNo VARCHAR(500),
  in_DBPadAmt VARCHAR(500),
  in_DBTransitNo VARCHAR(500),
  in_DBPadTrm VARCHAR(500),
  in_DBAcctNo VARCHAR(500),
  in_DBPadLft VARCHAR(500),
  in_DBAcctName VARCHAR(500),
  in_DBPadAct VARCHAR(500),
  in_DBViciLoad VARCHAR(500),
  in_casefileUID VARCHAR(500),
  in_DBCCExpMonth VARCHAR(500),
  in_DBCCExpYear VARCHAR(500),
  in_DBBal VARCHAR(500),
  in_DBPd VARCHAR(500),
  in_DBInstr0 LONGTEXT
)
RETURNS LONGTEXT
BEGIN
	DECLARE _SQL LONGTEXT;
    
    SET _SQL = CONCAT( '
      
    ');
    
    /*start all*/
    IF (char_length(in_DBID) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBID', in_DBID ) );
    END IF;
    IF (char_length(in_DBTitle) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBTitle', in_DBTitle ) );
    END IF;
    IF (char_length(in_DBComm) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBComm', in_DBComm ) );
    END IF;
    IF (char_length(in_DBName) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBName', in_DBName ) );
    END IF;
    IF (char_length(in_DBAdd1) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBAdd1', in_DBAdd1 ) );
    END IF;
    IF (char_length(in_DBAdd2) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBAdd2', in_DBAdd2 ) );
    END IF;
    IF (char_length(in_DBCity) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBCity', in_DBCity ) );
    END IF;
    IF (char_length(in_DBProv) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBProv', in_DBProv ) );
    END IF;
    IF (char_length(in_DBPCod) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBPCod', in_DBPCod ) );
    END IF;
    IF (char_length(in_DBCnt) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBCnt', in_DBCnt ) );
    END IF;
    IF (char_length(in_DBSAdd) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBSAdd', in_DBSAdd ) );
    END IF;
    IF (char_length(in_DBCountry) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBCountry', in_DBCountry ) );
    END IF;
    IF (char_length(in_DB2Name) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DB2Name', in_DB2Name ) );
    END IF;
    IF (char_length(in_DB2Add1) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DB2Add1', in_DB2Add1 ) );
    END IF;
    IF (char_length(in_DB2Add2) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DB2Add2', in_DB2Add2 ) );
    END IF;
    IF (char_length(in_DB2City) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DB2City', in_DB2City ) );
    END IF;
    IF (char_length(in_DB2Prov) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DB2Prov', in_DB2Prov ) );
    END IF;
    IF (char_length(in_DB2PCod) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DB2PCod', in_DB2PCod ) );
    END IF;
    IF (char_length(in_DB2Tel) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DB2Tel', in_DB2Tel ) );
    END IF;
    IF (char_length(in_DB2SIN) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DB2SIN', in_DB2SIN ) );
    END IF;
    IF (char_length(in_DB2Rel) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DB2Rel', in_DB2Rel ) );
    END IF;
    IF (char_length(in_DB2DOB) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DB2DOB', in_DB2DOB ) );
    END IF;
    IF (char_length(in_DBCltNo) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBCltNo', in_DBCltNo ) );
    END IF;
    IF (char_length(in_DBClt) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBClt', in_DBClt ) );
    END IF;
    IF (char_length(in_DBSalesRep) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBSalesRep', in_DBSalesRep ) );
    END IF;
    IF (char_length(in_DBCollNum) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBCollNum', in_DBCollNum ) );
    END IF;
    IF (char_length(in_DBTracNum) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBTracNum', in_DBTracNum ) );
    END IF;
    IF (char_length(in_DBLglNum) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBLglNum', in_DBLglNum ) );
    END IF;
    IF (char_length(in_DBComRate) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBComRate', in_DBComRate ) );
    END IF;
    IF (char_length(in_DBRefNum) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBRefNum', in_DBRefNum ) );
    END IF;
    IF (char_length(in_DBListed) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBListed', in_DBListed ) );
    END IF;
    IF (char_length(in_DBStatus) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBStatus', in_DBStatus ) );
    END IF;
    IF (char_length(in_DBCrBu) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBCrBu', in_DBCrBu ) );
    END IF;
    IF (char_length(in_CrBuOn) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CrBuOn', in_CrBuOn ) );
    END IF;
    IF (char_length(in_DBTel1) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBTel1', in_DBTel1 ) );
    END IF;
    IF (char_length(in_DBTel2) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBTel2', in_DBTel2 ) );
    END IF;
    IF (char_length(in_DBTel3) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBTel3', in_DBTel3 ) );
    END IF;
    IF (char_length(in_DBEmail) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBEmail', in_DBEmail ) );
    END IF;
    IF (char_length(in_POE) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'POE', in_POE ) );
    END IF;
    IF (char_length(in_PTel) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'PTel', in_PTel ) );
    END IF;
    IF (char_length(in_DBBTC) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBBTC', in_DBBTC ) );
    END IF;
    IF (char_length(in_DBList) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBList', in_DBList ) );
    END IF;
    IF (char_length(in_DBIncurred) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBIncurred', in_DBIncurred ) );
    END IF;
    IF (char_length(in_DBWorked) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBWorked', in_DBWorked ) );
    END IF;
    IF (char_length(in_DBIntRate) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBIntRate', in_DBIntRate ) );
    END IF;
    IF (char_length(in_DBItIntDef) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBItIntDef', in_DBItIntDef ) );
    END IF;
    IF (char_length(in_DBNxt) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBNxt', in_DBNxt ) );
    END IF;
    IF (char_length(in_DBPriority) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBPriority', in_DBPriority ) );
    END IF;
    IF (char_length(in_DBColNot) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBColNot', in_DBColNot ) );
    END IF;
    IF (char_length(in_DBScore) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBScore', in_DBScore ) );
    END IF;
    IF (char_length(in_TUCScore) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'TUCScore', in_TUCScore ) );
    END IF;
    IF (char_length(in_DBSIN) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBSIN', in_DBSIN ) );
    END IF;
    IF (char_length(in_DBDOB) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBDOB', in_DBDOB ) );
    END IF;
    IF (char_length(in_DBDLNum) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBDLNum', in_DBDLNum ) );
    END IF;
    IF (char_length(in_DBCCNum) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBCCNum', in_DBCCNum ) );
    END IF;
    IF (char_length(in_DBAKA) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBAKA', in_DBAKA ) );
    END IF;
    IF (char_length(in_DBCCExp) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBCCExp', in_DBCCExp ) );
    END IF;
    IF (char_length(in_DBOrigCreditory) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBOrigCreditory', in_DBOrigCreditory ) );
    END IF;
    IF (char_length(in_DBComment1) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBComment1', in_DBComment1 ) );
    END IF;
    IF (char_length(in_DBComment2) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBComment2', in_DBComment2 ) );
    END IF;
    IF (char_length(in_DBPOEAddress) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBPOEAddress', in_DBPOEAddress ) );
    END IF;
    IF (char_length(in_DBPOECity) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBPOECity', in_DBPOECity ) );
    END IF;
    IF (char_length(in_DBPOEProv) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBPOEProv', in_DBPOEProv ) );
    END IF;
    IF (char_length(in_DBPOEPostalCode) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBPOEPostalCode', in_DBPOEPostalCode ) );
    END IF;
    IF (char_length(in_DBPOEContact) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBPOEContact', in_DBPOEContact ) );
    END IF;
    IF (char_length(in_DBPOEFax) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBPOEFax', in_DBPOEFax ) );
    END IF;
    IF (char_length(in_DBPOEJobTitle) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBPOEJobTitle', in_DBPOEJobTitle ) );
    END IF;
    IF (char_length(in_DBPOESalary) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBPOESalary', in_DBPOESalary ) );
    END IF;
    IF (char_length(in_DBPOENote) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBPOENote', in_DBPOENote ) );
    END IF;
    IF (char_length(in_CltInfo1) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltInfo1', in_CltInfo1 ) );
    END IF;
    IF (char_length(in_CltInfo2) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltInfo2', in_CltInfo2 ) );
    END IF;
    IF (char_length(in_CltInfo3) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltInfo3', in_CltInfo3 ) );
    END IF;
    IF (char_length(in_CltInfo4) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltInfo4', in_CltInfo4 ) );
    END IF;
    IF (char_length(in_CltInfo5) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltInfo5', in_CltInfo5 ) );
    END IF;
    IF (char_length(in_CltInfo6) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltInfo6', in_CltInfo6 ) );
    END IF;
    IF (char_length(in_CltInfo7) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltInfo7', in_CltInfo7 ) );
    END IF;
    IF (char_length(in_DBLttrLog) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBLttrLog', in_DBLttrLog ) );
    END IF;
    IF (char_length(in_TraceNote) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'TraceNote', in_TraceNote ) );
    END IF;
    IF (char_length(in_LGLClaim) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'LGLClaim', in_LGLClaim ) );
    END IF;
    IF (char_length(in_LGLPreJudgement) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'LGLPreJudgement', in_LGLPreJudgement ) );
    END IF;
    IF (char_length(in_LGLCourtAddress) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'LGLCourtAddress', in_LGLCourtAddress ) );
    END IF;
    IF (char_length(in_LGLPostJudgement) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'LGLPostJudgement', in_LGLPostJudgement ) );
    END IF;
    IF (char_length(in_LGLSchedA) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'LGLSchedA', in_LGLSchedA ) );
    END IF;
    IF (char_length(in_LGLJudgementIntRate) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'LGLJudgementIntRate', in_LGLJudgementIntRate ) );
    END IF;
    IF (char_length(in_LGLAmtClaimed) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'LGLAmtClaimed', in_LGLAmtClaimed ) );
    END IF;
    IF (char_length(in_LGLJudgDate) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'LGLJudgDate', in_LGLJudgDate ) );
    END IF;
    IF (char_length(in_LGLCourtCosts) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'LGLCourtCosts', in_LGLCourtCosts ) );
    END IF;
    IF (char_length(in_LGLJudgAmt) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'LGLJudgAmt', in_LGLJudgAmt ) );
    END IF;
    IF (char_length(in_DBPadDate) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBPadDate', in_DBPadDate ) );
    END IF;
    IF (char_length(in_DBBankNo) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBBankNo', in_DBBankNo ) );
    END IF;
    IF (char_length(in_DBPadAmt) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBPadAmt', in_DBPadAmt ) );
    END IF;
    IF (char_length(in_DBTransitNo) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBTransitNo', in_DBTransitNo ) );
    END IF;
    IF (char_length(in_DBPadTrm) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBPadTrm', in_DBPadTrm ) );
    END IF;
    IF (char_length(in_DBAcctNo) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBAcctNo', in_DBAcctNo ) );
    END IF;
    IF (char_length(in_DBPadLft) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBPadLft', in_DBPadLft ) );
    END IF;
    IF (char_length(in_DBAcctName) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBAcctName', in_DBAcctName ) );
    END IF;
    IF (char_length(in_DBPadAct) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBPadAct', in_DBPadAct ) );
    END IF;
    IF (char_length(in_DBViciLoad) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBViciLoad', in_DBViciLoad ) );
    END IF;
    IF (char_length(in_DBCCExpMonth) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBCCExpMonth', in_DBCCExpMonth ) );
    END IF;
    IF (char_length(in_DBCCExpYear) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBCCExpYear', in_DBCCExpYear ) );
    END IF;
    IF (char_length(in_DBBal) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBBal', in_DBBal ) );
    END IF;
    IF (char_length(in_DBPd) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBPd', in_DBPd ) );
    END IF;
    IF (char_length(in_DBInstr0) > 0) THEN
      SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'DBInstr0', in_DBInstr0 ) );
    END IF;
    /*end all*/
    
	RETURN _SQL;
END

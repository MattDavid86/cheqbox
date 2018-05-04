-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `getDebtorCaseFile`(
	in_companyUID VARCHAR(45),
  in_userUID VARCHAR(45),
  in_DBID INT
)
BEGIN
	SELECT 
    /*ID*/
    DBID, 
    
    /*debtor info*/
    DBTitle, DBComm, DBName, DBAdd1, DBAdd2, DBCity, DBProv, DBPCod, DBCnt, DBSAdd, DBCountry, DBTel1, DBTel2, DBTel3, DBEmail, 
      DBSIN, DBDOB, DBDLNum, DBCCNum, DBAKA, DBCCExp, DBOrigCreditory, 
      POE, PTel, DBBTC, DBPOEAddress, DBPOECity, DBPOEProv, DBPOEPostalCode, DBPOEContact, DBPOEFax, DBPOEJobTitle, DBPOESalary, DBPOENote, 
      DBList, DBIncurred, DBIntRate, DBItIntDef, 
      DBComment1, DBComment2, 
      DBNxt, DBColNot, 
      
    /*cosigner info*/
    DB2Name, DB2Add1, DB2Add2, DB2City, DB2Prov, DB2PCod, DB2Tel, DB2SIN, DB2Rel, DB2DOB, 
    
    /*kingston data info*/
    DBCltNo, DBSalesRep, DBCollNum, DBTracNum, DBLglNum, DBComRate, DBRefNum, DBListed, DBStatus, DBCrBu, CrBuOn, 
    DBWorked, DBPriority, DBScore, TUCScore, 
    
    /*client info*/
    CltInfo1, CltInfo2, CltInfo3, CltInfo4, CltInfo5, CltInfo6, CltInfo7, 
    
    /*logs*/
    DBLttrLog, TraceNote, 
    
    /*legal*/
    LGLClaim, LGLPreJudgement, LGLCourtAddress, LGLPostJudgement, LGLSchedA, LGLJudgementIntRate, LGLAmtClaimed, LGLJudgDate, LGLCourtCosts, LGLJudgAmt, 
    
    /*payments*/
    DBPadDate, DBBankNo, DBPadAmt, DBTransitNo, DBPadTrm, DBAcctNo, DBPadLft, DBAcctName, DBPadAct, 
    
    /*other*/
    DBViciLoad, 
    
    casefileUID
  FROM db01_debtor
  
	WHERE companyUID = in_companyUID
  AND DBID = in_DBID
  AND dateDeleted IS NULL;
END
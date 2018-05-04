-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `editDebtorCaseFile`(
  in_DBID INT,
	in_DBTitle VARCHAR(10),
  in_DBComm INT,
  in_DBName VARCHAR(100),
  in_DBAdd1 VARCHAR(100),
  in_DBAdd2 VARCHAR(100),
  in_DBCity VARCHAR(45),
  in_DBProv VARCHAR(45),
  in_DBPCod VARCHAR(45),
  in_DBCnt VARCHAR(45),
  in_DBSAdd VARCHAR(100),
  in_DBCountry VARCHAR(45),
  in_DB2Name VARCHAR(100),
  in_DB2Add1 VARCHAR(100),
  in_DB2Add2 VARCHAR(100),
  in_DB2City VARCHAR(45),
  in_DB2Prov VARCHAR(45),
  in_DB2PCod VARCHAR(20),
  in_DB2Tel VARCHAR(45),
  in_DB2SIN VARCHAR(10),
  in_DB2Rel VARCHAR(20),
  in_DB2DOB DATE,
  in_DBCltNo INT,
  in_DBClt VARCHAR(200),
  in_DBSalesRep VARCHAR(45),
  in_DBCollNum VARCHAR(45),
  in_DBTracNum VARCHAR(45),
  in_DBLglNum VARCHAR(45),
  in_DBComRate DECIMAL(10,2),
  in_DBRefNum VARCHAR(45),
  in_DBListed DATE,
  in_DBStatus VARCHAR(45),
  in_DBCrBu DATE,
  in_CrBuOn INT,
  in_DBTel1 VARCHAR(45),
  in_DBTel2 VARCHAR(45),
  in_DBTel3 VARCHAR(45),
  in_DBEmail VARCHAR(100),
  in_POE VARCHAR(45),
  in_PTel VARCHAR(20),
  in_DBBTC VARCHAR(45),
  in_DBList DECIMAL(10,2),
  in_DBIncurred DATE,
  in_DBIntRate DECIMAL(10,8),
  in_DBItIntDef INT,
  in_DBNxt DATE,
  in_DBPriority INT,
  in_DBColNot VARCHAR(500),
  in_DBScore INT,
  in_TUCScore INT,
  in_DBSIN VARCHAR(10),
  in_DBDOB DATE,
  in_DBDLNum VARCHAR(45),
  in_DBCCNum INT,
  in_DBAKA VARCHAR(45),
  in_DBCCExpMonth VARCHAR(10),
  in_DBCCExpYear VARCHAR(10),
  in_DBCCExp VARCHAR(10),
  in_DBOrigCreditory VARCHAR(50),
  in_DBComment1 VARCHAR(500),
  in_DBComment2 VARCHAR(500),
  in_DBPOEAddress VARCHAR(100),
  in_DBPOECity VARCHAR(45),
  in_DBPOEProv VARCHAR(45),
  in_DBPOEPostalCode VARCHAR(20),
  in_DBPOEContact VARCHAR(45),
  in_DBPOEFax VARCHAR(20),
  in_DBPOEJobTitle VARCHAR(45),
  in_DBPOESalary DECIMAL(10,2),
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
  in_LGLClaim VARCHAR(45),
  in_LGLPreJudgement DECIMAL(10,2),
  in_LGLCourtAddress VARCHAR(100),
  in_LGLPostJudgement DECIMAL(10,2),
  in_LGLSchedA LONGTEXT,
  in_LGLJudgementIntRate DECIMAL(10,8),
  in_LGLAmtClaimed DECIMAL(10,2),
  in_LGLJudgDate DATE,
  in_LGLCourtCosts DECIMAL(10,2),
  in_LGLJudgAmt DECIMAL(10,2),
  in_DBPadDate INT,
  in_DBBankNo INT,
  in_DBPadAmt DECIMAL(10,2),
  in_DBTransitNo INT,
  in_DBPadTrm INT,
  in_DBAcctNo INT,
  in_DBPadLft INT,
  in_DBAcctName VARCHAR(45),
  in_DBPadAct INT,
  in_DBViciLoad DATE,
  in_companyUID VARCHAR(45),
  in_addedBy VARCHAR(45),
  in_casefileUID VARCHAR(45),
  in_DBBal DECIMAL(10,2),
  in_DBPd DECIMAL(10,2),
  in_DBInstr0 LONGTEXT
)
BEGIN
  DECLARE var_dateNow DATETIME;
  SET var_dateNow = CURRENT_TIMESTAMP;
  
	UPDATE `db01_debtor`
  SET 
      DBComm = in_DBComm, 
      DBTitle = in_DBTitle, 
      DBName = in_DBName, 
      DBAKA = in_DBAKA, 
      DBAdd1 = in_DBAdd1, 
      DBAdd2 = in_DBAdd2, 
      DBCity = in_DBCity, 
      DBProv = in_DBProv, 
      DBCountry = in_DBCountry, 
      DBPCod = in_DBPCod, 
      DBCnt = in_DBCnt, 
      DBSAdd = in_DBSAdd, 
      DBTel1 = in_DBTel1, 
      DBTel2 = in_DBTel2, 
      DBTel3 = in_DBTel3, 
      DBEmail = in_DBEmail, 
      DBSIN = in_DBSIN, 
      DBDOB = in_DBDOB, 
      DBDLNum = in_DBDLNum, 
      DBBTC = in_DBBTC, 
      DBComment1 = in_DBComment1, 
      DBComment2 = in_DBComment2, 
      DBNxt = in_DBNxt, 
      DBColNot = in_DBColNot,
      
      DBCCNum = in_DBCCNum, 
      DBCCExpMonth = in_DBCCExpMonth, 
      DBCCExpYear = in_DBCCExpYear, 
      DBOrigCreditory = in_DBOrigCreditory, 
      DBList = in_DBList, 
      DBIncurred = in_DBIncurred, 
      DBIntRate = in_DBIntRate, 
      DBItIntDef = in_DBItIntDef, 
      
      POE = in_POE, 
      PTel = in_PTel, 
      DBPOEAddress = in_DBPOEAddress, 
      DBPOECity = in_DBPOECity, 
      DBPOEProv = in_DBPOEProv, 
      DBPOEPostalCode = in_DBPOEPostalCode, 
      DBPOEContact = in_DBPOEContact, 
      DBPOEFax = in_DBPOEFax, 
      DBPOEJobTitle = in_DBPOEJobTitle, 
      DBPOESalary = in_DBPOESalary, 
      DBPOENote = in_DBPOENote, 
      
      DB2Name = in_DB2Name, 
      DB2Add1 = in_DB2Add1, 
      DB2Add2 = in_DB2Add2, 
      DB2City = in_DB2City, 
      DB2Prov = in_DB2Prov, 
      DB2PCod = in_DB2PCod, 
      DB2Tel = in_DB2Tel, 
      DB2SIN = in_DB2SIN, 
      DB2Rel = in_DB2Rel, 
      DB2DOB = in_DB2DOB, 
      
      DBSalesRep = in_DBSalesRep, 
      DBCollNum = in_DBCollNum, 
      DBTracNum = in_DBTracNum, 
      DBLglNum = in_DBLglNum, 
      DBComRate = in_DBComRate, 
      DBRefNum = in_DBRefNum, 
      DBListed = in_DBListed, 
      DBStatus = in_DBStatus, 
      DBPriority = in_DBPriority, 
      CrBuOn = in_CrBuOn, 
      DBCrBu = in_DBCrBu, 
      DBScore = in_DBScore, 
      TUCScore = in_TUCScore, 
      
      DBCltNo = in_DBCltNo, 
      DBClt = in_DBClt, 
      DBInstr0 = in_DBInstr0, 
      CltInfo1 = in_CltInfo1, 
      CltInfo2 = in_CltInfo2, 
      CltInfo3 = in_CltInfo3, 
      CltInfo4 = in_CltInfo4, 
      CltInfo5 = in_CltInfo5, 
      CltInfo6 = in_CltInfo6, 
      CltInfo7 = in_CltInfo7, 
      
      DBLttrLog = in_DBLttrLog, 
      TraceNote = in_TraceNote, 
      
      LGLClaim = in_LGLClaim, 
      LGLPreJudgement = in_LGLPreJudgement, 
      LGLPostJudgement = in_LGLPostJudgement, 
      LGLCourtAddress = in_LGLCourtAddress, 
      LGLSchedA = in_LGLSchedA, 
      LGLJudgementIntRate = in_LGLJudgementIntRate, 
      LGLJudgDate = in_LGLJudgDate, 
      LGLCourtCosts = in_LGLCourtCosts, 
      LGLJudgAmt = in_LGLJudgAmt, 
      
      DBPadDate = in_DBPadDate, 
      DBPadAmt = in_DBPadAmt, 
      DBPadTrm = in_DBPadTrm, 
      DBPadLft = in_DBPadLft, 
      DBPadAct = in_DBPadAct, 
      DBBankNo = in_DBBankNo, 
      DBTransitNo = in_DBTransitNo, 
      DBAcctNo = in_DBAcctNo, 
      DBAcctName = in_DBAcctName, 
      
      DBViciLoad = in_DBViciLoad, 
      DBBal = in_DBBal, 
      DBPd = in_DBPd,
      
      companyUID = in_companyUID, 
      dateAdded = var_dateNow, 
      addedBy = in_addedBy, 
      casefileUID = in_casefileUID, 
      DBWorked = var_dateNow
  WHERE DBID = in_DBID;
  
    
    
    CALL insertIntoDebtorHistory(
      in_DBID, 
      in_DBTitle, in_DBComm, in_DBName, in_DBAdd1, in_DBAdd2, in_DBCity, in_DBProv, in_DBPCod, in_DBCnt, in_DBSAdd, in_DBCountry, in_DB2Name, in_DB2Add1, in_DB2Add2, in_DB2City,
      in_DB2Prov, in_DB2PCod, in_DB2Tel, in_DB2SIN, in_DB2Rel, in_DB2DOB, in_DBCltNo, in_DBClt, in_DBSalesRep, in_DBCollNum, in_DBTracNum, in_DBLglNum, in_DBComRate, in_DBRefNum,
      in_DBListed, in_DBStatus, in_DBCrBu, in_CrBuOn, in_DBTel1, in_DBTel2, in_DBTel3, in_DBEmail, in_POE, in_PTel, in_DBBTC, in_DBList, in_DBIncurred, in_DBIntRate, in_DBItIntDef,
      in_DBNxt, in_DBPriority, in_DBColNot, in_DBScore, in_TUCScore, in_DBSIN, in_DBDOB, in_DBDLNum, in_DBCCNum, in_DBAKA, in_DBCCExpMonth, in_DBCCExpYear, in_DBCCExp, in_DBOrigCreditory,
      in_DBComment1, in_DBComment2, in_DBPOEAddress, in_DBPOECity, in_DBPOEProv, in_DBPOEPostalCode, in_DBPOEContact, in_DBPOEFax, in_DBPOEJobTitle, in_DBPOESalary, in_DBPOENote,
      in_CltInfo1, in_CltInfo2, in_CltInfo3, in_CltInfo4, in_CltInfo5, in_CltInfo6, in_CltInfo7, in_DBLttrLog, in_TraceNote, in_LGLClaim, in_LGLPreJudgement, in_LGLCourtAddress,
      in_LGLPostJudgement, in_LGLSchedA, in_LGLJudgementIntRate, in_LGLAmtClaimed, in_LGLJudgDate, in_LGLCourtCosts, in_LGLJudgAmt, in_DBPadDate, in_DBBankNo, in_DBPadAmt, in_DBTransitNo,
      in_DBPadTrm, in_DBAcctNo, in_DBPadLft, in_DBAcctName, in_DBPadAct, in_DBViciLoad, in_companyUID, in_addedBy, in_casefileUID, in_DBBal, in_DBPd, in_DBInstr0, var_dateNow
    );
  
END
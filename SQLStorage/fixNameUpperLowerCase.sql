-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `fixNameUpperLowerCase`(
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
BEGIN
	
  DECLARE _SQL VARCHAR(4000);

  SET _SQL = CONCAT( '
      UPDATE db01_debtor
      SET 
        DBName = CAP_FIRST(DBName)
      WHERE dateDeleted IS NULL
      
    ');
  
  
  /*start all*/
  SET _SQL = CONCAT( _SQL, 
    debtorFullSearchQueryBuilderCheckParams( 
      in_DBID,in_DBTitle,in_DBComm,in_DBName,in_DBAdd1,in_DBAdd2,in_DBCity,in_DBProv,in_DBPCod,in_DBCnt,in_DBSAdd,in_DBCountry,in_DB2Name,in_DB2Add1,
      in_DB2Add2,in_DB2City,in_DB2Prov,in_DB2PCod,in_DB2Tel,in_DB2SIN,in_DB2Rel,in_DB2DOB,in_DBCltNo,in_DBClt,in_DBSalesRep,in_DBCollNum,in_DBTracNum,
      in_DBLglNum,in_DBComRate,in_DBRefNum,in_DBListed,in_DBStatus,in_DBCrBu,in_CrBuOn,in_DBTel1,in_DBTel2,in_DBTel3,in_DBEmail,in_POE,
      in_PTel,in_DBBTC,in_DBList,in_DBIncurred,in_DBWorked,in_DBIntRate,in_DBItIntDef,in_DBNxt,in_DBPriority,in_DBColNot,in_DBScore,in_TUCScore,
      in_DBSIN,in_DBDOB,in_DBDLNum,in_DBCCNum,in_DBAKA,in_DBCCExp,in_DBOrigCreditory,in_DBComment1,in_DBComment2,in_DBPOEAddress,in_DBPOECity,
      in_DBPOEProv,in_DBPOEPostalCode,in_DBPOEContact,in_DBPOEFax,in_DBPOEJobTitle,in_DBPOESalary,in_DBPOENote,in_CltInfo1,in_CltInfo2,
      in_CltInfo3,in_CltInfo4,in_CltInfo5,in_CltInfo6,in_CltInfo7,in_DBLttrLog,in_TraceNote,in_LGLClaim,in_LGLPreJudgement,in_LGLCourtAddress,
      in_LGLPostJudgement,in_LGLSchedA,in_LGLJudgementIntRate,in_LGLAmtClaimed,in_LGLJudgDate,in_LGLCourtCosts,in_LGLJudgAmt,in_DBPadDate,in_DBBankNo,
      in_DBPadAmt,in_DBTransitNo,in_DBPadTrm,in_DBAcctNo,in_DBPadLft,in_DBAcctName,in_DBPadAct,in_DBViciLoad,in_casefileUID,in_DBCCExpMonth,
      in_DBCCExpYear,in_DBBal,in_DBPd,in_DBInstr0
    ) 
  );
  /*end all*/
  
  
  
  #SELECT _SQL; /*uncomment to view the sql statement*/
  
  SET @SQL = _SQL;
  PREPARE sqlStatement FROM @SQL;
  EXECUTE sqlStatement;
  DEALLOCATE PREPARE sqlStatement;
  
END
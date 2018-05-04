-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE editSales(
	in_salesUID VARCHAR(45), 
  in_userUID VARCHAR(45), 
  in_companyUID VARCHAR(45), 
  
  in_RevPanel VARCHAR(45),
  in_CltID VARCHAR(45),
  in_CltBill VARCHAR(45),
  in_CltInv VARCHAR(45),
  in_CltScrn VARCHAR(45),
  in_CltGST VARCHAR(45),
  in_CltStmt VARCHAR(45),
  in_CltLgl VARCHAR(45),
  in_CltCrBu VARCHAR(45),
  in_CltClosed VARCHAR(45),
  in_CltTrust VARCHAR(45),
  in_CltBank VARCHAR(45),
  in_CltTransit VARCHAR(45),
  in_CltAcct VARCHAR(45),
  in_CltNo VARCHAR(45),
  in_CltGrpNo VARCHAR(45),
  in_CltCt1 VARCHAR(45),
  in_CltCt1Title VARCHAR(45),
  in_CltCt1Note VARCHAR(45),
  in_CltName VARCHAR(45),
  in_CltCt2 VARCHAR(45),
  in_CltCt2Title VARCHAR(45),
  in_CltCt2Note VARCHAR(45),
  in_CltAdd1 VARCHAR(45),
  in_CltCt3 VARCHAR(45),
  in_CltCt3Title VARCHAR(45),
  in_CltCt3Note VARCHAR(45),
  in_CltAdd2 VARCHAR(45),
  in_CltInstructions VARCHAR(45),
  in_CltCity VARCHAR(45),
  in_CltProv VARCHAR(45),
  in_CltPCod VARCHAR(45),
  in_CltTel1 VARCHAR(45),
  in_CltFax VARCHAR(45),
  in_CltEmlPm VARCHAR(45),
  in_CltReview VARCHAR(45),
  in_CltRefNum VARCHAR(45),
  in_CltEmIn VARCHAR(45),
  in_CltTel2 VARCHAR(45),
  in_CltEmail VARCHAR(45),
  in_CltViciList VARCHAR(45),
  in_CltTel3 VARCHAR(45),
  in_CltACH VARCHAR(45),
  in_SalesNoteSum VARCHAR(45),
  in_CltImportSpec VARCHAR(45),
  in_CltIntDeferred VARCHAR(45),
  in_SalesStatus VARCHAR(45),
  in_CltComRate VARCHAR(45),
  in_CltSales VARCHAR(45),
  in_CltWorked VARCHAR(45),
  in_CltSpcStats VARCHAR(45),
  in_CltPrefCol VARCHAR(45),
  in_CltIntRate VARCHAR(45),
  in_CltSalesNotes VARCHAR(45),
  in_CltNxt VARCHAR(45),
  in_Score VARCHAR(45),
  in_CltNote0 VARCHAR(45),
  in_GrpNote0 VARCHAR(45),
  in_CltStartDate VARCHAR(45),
  in_CltIndGrp VARCHAR(45),
  in_CltDRNNo VARCHAR(45),
  in_CltLastListed VARCHAR(45),
  in_CltDRNNoteBatch VARCHAR(45),
  in_CltDRNStatusBatch VARCHAR(45),
  in_CltAccts VARCHAR(45),
  in_CltDRNPmtBatch VARCHAR(45),
  in_CltListed VARCHAR(45),
  in_CltDRNRemitBatch VARCHAR(45),
  in_CltColl VARCHAR(45),
  in_CltDRNShortName VARCHAR(45),
  in_CltLiq VARCHAR(45),
  in_CltStMonth VARCHAR(45),
  in_CltStComH VARCHAR(45),
  in_CltStBill VARCHAR(45),
  in_CltAR91 VARCHAR(45),
  in_CltStPdHere VARCHAR(45),
  in_CltStComD VARCHAR(45),
  in_CltStPrevB VARCHAR(45),
  in_CltStPdDir VARCHAR(45),
  in_CltStComT VARCHAR(45),
  in_CltOwes VARCHAR(45),
  in_CltStHST VARCHAR(45),
  in_CltOwesTtl VARCHAR(45),
  in_CltSalesFull VARCHAR(45),
  in_CltSalesTitle VARCHAR(45),
  in_CltSalesExt VARCHAR(45),
  in_CltSalesEmail VARCHAR(45),
  in_CltIntRate2 VARCHAR(45),
  in_LE3 VARCHAR(45),
  in_LE4 VARCHAR(45)
)
BEGIN
  
	UPDATE us06_sales
    SET
      userUID = in_userUID,
      companyUID = in_companyUID,
      
      RevPanel = in_RevPanel,
      CltID = in_CltID,
      CltBill = in_CltBill,
      CltInv = in_CltInv,
      CltScrn = in_CltScrn,
      CltGST = in_CltGST,
      CltStmt = in_CltStmt,
      CltLgl = in_CltLgl,
      CltCrBu = in_CltCrBu,
      CltClosed = in_CltClosed,
      CltTrust = in_CltTrust,
      CltBank = in_CltBank,
      CltTransit = in_CltTransit,
      CltAcct = in_CltAcct,
      CltNo = in_CltNo,
      CltGrpNo = in_CltGrpNo,
      CltCt1 = in_CltCt1,
      CltCt1Title = in_CltCt1Title,
      CltCt1Note = in_CltCt1Note,
      CltName = in_CltName,
      CltCt2 = in_CltCt2,
      CltCt2Title = in_CltCt2Title,
      CltCt2Note = in_CltCt2Note,
      CltAdd1 = in_CltAdd1,
      CltCt3 = in_CltCt3,
      CltCt3Title = in_CltCt3Title,
      CltCt3Note = in_CltCt3Note,
      CltAdd2 = in_CltAdd2,
      CltInstructions = in_CltInstructions,
      CltCity = in_CltCity,
      CltProv = in_CltProv,
      CltPCod = in_CltPCod,
      CltTel1 = in_CltTel1,
      CltFax = in_CltFax,
      CltEmlPm = in_CltEmlPm,
      CltReview = in_CltReview,
      CltRefNum = in_CltRefNum,
      CltEmIn = in_CltEmIn,
      CltTel2 = in_CltTel2,
      CltEmail = in_CltEmail,
      CltViciList = in_CltViciList,
      CltTel3 = in_CltTel3,
      CltACH = in_CltACH,
      SalesNoteSum = in_SalesNoteSum,
      CltImportSpec = in_CltImportSpec,
      CltIntDeferred = in_CltIntDeferred,
      SalesStatus = in_SalesStatus,
      CltComRate = in_CltComRate,
      CltSales = in_CltSales,
      CltWorked = in_CltWorked,
      CltSpcStats = in_CltSpcStats,
      CltPrefCol = in_CltPrefCol,
      CltIntRate = in_CltIntRate,
      CltSalesNotes = in_CltSalesNotes,
      CltNxt = in_CltNxt,
      Score = in_Score,
      CltNote0 = in_CltNote0,
      GrpNote0 = in_GrpNote0,
      CltStartDate = in_CltStartDate,
      CltIndGrp = in_CltIndGrp,
      CltDRNNo = in_CltDRNNo,
      CltLastListed = in_CltLastListed,
      CltDRNNoteBatch = in_CltDRNNoteBatch,
      CltDRNStatusBatch = in_CltDRNStatusBatch,
      CltAccts = in_CltAccts,
      CltDRNPmtBatch = in_CltDRNPmtBatch,
      CltListed = in_CltListed,
      CltDRNRemitBatch = in_CltDRNRemitBatch,
      CltColl = in_CltColl,
      CltDRNShortName = in_CltDRNShortName,
      CltLiq = in_CltLiq,
      CltStMonth = in_CltStMonth,
      CltStComH = in_CltStComH,
      CltStBill = in_CltStBill,
      CltAR91 = in_CltAR91,
      CltStPdHere = in_CltStPdHere,
      CltStComD = in_CltStComD,
      CltStPrevB = in_CltStPrevB,
      CltStPdDir = in_CltStPdDir,
      CltStComT = in_CltStComT,
      CltOwes = in_CltOwes,
      CltStHST = in_CltStHST,
      CltOwesTtl = in_CltOwesTtl,
      CltSalesFull = in_CltSalesFull,
      CltSalesTitle = in_CltSalesTitle,
      CltSalesExt = in_CltSalesExt,
      CltSalesEmail = in_CltSalesEmail,
      CltIntRate2 = in_CltIntRate2,
      LE3 = in_LE3,
      LE4 = in_LE4
      
  WHERE salesUID = in_salesUID;


END
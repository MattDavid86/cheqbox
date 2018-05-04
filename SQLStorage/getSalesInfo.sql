-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE getSalesInfo(
	in_salesUID VARCHAR(45)
)
BEGIN
	SELECT 
    salesUID, userUID, companyUID,

    RevPanel, CltID, CltBill, CltInv, CltScrn, CltGST, CltStmt, CltLgl, CltCrBu, CltClosed, CltTrust, CltBank, CltTransit, CltAcct, CltNo, CltGrpNo,
    CltCt1, CltCt1Title, CltCt1Note, CltName, CltCt2, CltCt2Title, CltCt2Note, CltAdd1, CltCt3, CltCt3Title, CltCt3Note, CltAdd2, CltInstructions, CltCity,
    CltProv, CltPCod, CltTel1, CltFax, CltEmlPm, CltReview, CltRefNum, CltEmIn, CltTel2, CltEmail, CltViciList, CltTel3, CltACH, SalesNoteSum, CltImportSpec,
    CltIntDeferred, SalesStatus, CltComRate, CltSales, CltWorked, CltSpcStats, CltPrefCol, CltIntRate, CltSalesNotes, CltNxt, Score, CltNote0, GrpNote0,
    CltStartDate, CltIndGrp, CltDRNNo, CltLastListed, CltDRNNoteBatch, CltDRNStatusBatch, CltAccts, CltDRNPmtBatch, CltListed, CltDRNRemitBatch, CltColl,
    CltDRNShortName, CltLiq, CltStMonth, CltStComH, CltStBill, CltAR91, CltStPdHere, CltStComD, CltStPrevB, CltStPdDir, CltStComT, CltOwes, CltStHST,
    CltOwesTtl, CltSalesFull, CltSalesTitle, CltSalesExt, CltSalesEmail, CltIntRate2, LE3, LE4
    
  FROM us06_sales
  
	WHERE salesUID = in_salesUID
  AND dateDeleted IS NULL;
END
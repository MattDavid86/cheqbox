-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `salesFullSearch`(
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
  in_LE4 VARCHAR(45),
  
  in_limit INT,
  in_offset INT
)
BEGIN
	
  DECLARE _SQL VARCHAR(4000);

  SET _SQL = CONCAT( '
      SELECT 
        salesUID, CltName
      FROM us06_sales
      WHERE companyUID = ''', in_companyUID, '''
      
    ');
  
  
  /*start all*/
  IF (char_length(in_RevPanel) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'RevPanel', in_RevPanel ) );       END IF;
  IF (char_length(in_CltID) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltID', in_CltID ) );       END IF;
  IF (char_length(in_CltBill) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltBill', in_CltBill ) );       END IF;
  IF (char_length(in_CltInv) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltInv', in_CltInv ) );       END IF;
  IF (char_length(in_CltScrn) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltScrn', in_CltScrn ) );       END IF;
  IF (char_length(in_CltGST) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltGST', in_CltGST ) );       END IF;
  IF (char_length(in_CltStmt) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltStmt', in_CltStmt ) );       END IF;
  IF (char_length(in_CltLgl) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltLgl', in_CltLgl ) );       END IF;
  IF (char_length(in_CltCrBu) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltCrBu', in_CltCrBu ) );       END IF;
  IF (char_length(in_CltClosed) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltClosed', in_CltClosed ) );       END IF;
  IF (char_length(in_CltTrust) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltTrust', in_CltTrust ) );       END IF;
  IF (char_length(in_CltBank) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltBank', in_CltBank ) );       END IF;
  IF (char_length(in_CltTransit) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltTransit', in_CltTransit ) );       END IF;
  IF (char_length(in_CltAcct) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltAcct', in_CltAcct ) );       END IF;
  IF (char_length(in_CltNo) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltNo', in_CltNo ) );       END IF;
  IF (char_length(in_CltGrpNo) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltGrpNo', in_CltGrpNo ) );       END IF;
  IF (char_length(in_CltCt1) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltCt1', in_CltCt1 ) );       END IF;
  IF (char_length(in_CltCt1Title) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltCt1Title', in_CltCt1Title ) );       END IF;
  IF (char_length(in_CltCt1Note) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltCt1Note', in_CltCt1Note ) );       END IF;
  IF (char_length(in_CltName) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltName', in_CltName ) );       END IF;
  IF (char_length(in_CltCt2) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltCt2', in_CltCt2 ) );       END IF;
  IF (char_length(in_CltCt2Title) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltCt2Title', in_CltCt2Title ) );       END IF;
  IF (char_length(in_CltCt2Note) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltCt2Note', in_CltCt2Note ) );       END IF;
  IF (char_length(in_CltAdd1) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltAdd1', in_CltAdd1 ) );       END IF;
  IF (char_length(in_CltCt3) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltCt3', in_CltCt3 ) );       END IF;
  IF (char_length(in_CltCt3Title) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltCt3Title', in_CltCt3Title ) );       END IF;
  IF (char_length(in_CltCt3Note) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltCt3Note', in_CltCt3Note ) );       END IF;
  IF (char_length(in_CltAdd2) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltAdd2', in_CltAdd2 ) );       END IF;
  IF (char_length(in_CltInstructions) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltInstructions', in_CltInstructions ) );       END IF;
  IF (char_length(in_CltCity) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltCity', in_CltCity ) );       END IF;
  IF (char_length(in_CltProv) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltProv', in_CltProv ) );       END IF;
  IF (char_length(in_CltPCod) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltPCod', in_CltPCod ) );       END IF;
  IF (char_length(in_CltTel1) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltTel1', in_CltTel1 ) );       END IF;
  IF (char_length(in_CltFax) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltFax', in_CltFax ) );       END IF;
  IF (char_length(in_CltEmlPm) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltEmlPm', in_CltEmlPm ) );       END IF;
  IF (char_length(in_CltReview) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltReview', in_CltReview ) );       END IF;
  IF (char_length(in_CltRefNum) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltRefNum', in_CltRefNum ) );       END IF;
  IF (char_length(in_CltEmIn) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltEmIn', in_CltEmIn ) );       END IF;
  IF (char_length(in_CltTel2) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltTel2', in_CltTel2 ) );       END IF;
  IF (char_length(in_CltEmail) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltEmail', in_CltEmail ) );       END IF;
  IF (char_length(in_CltViciList) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltViciList', in_CltViciList ) );       END IF;
  IF (char_length(in_CltTel3) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltTel3', in_CltTel3 ) );       END IF;
  IF (char_length(in_CltACH) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltACH', in_CltACH ) );       END IF;
  IF (char_length(in_SalesNoteSum) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'SalesNoteSum', in_SalesNoteSum ) );       END IF;
  IF (char_length(in_CltImportSpec) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltImportSpec', in_CltImportSpec ) );       END IF;
  IF (char_length(in_CltIntDeferred) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltIntDeferred', in_CltIntDeferred ) );       END IF;
  IF (char_length(in_SalesStatus) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'SalesStatus', in_SalesStatus ) );       END IF;
  IF (char_length(in_CltComRate) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltComRate', in_CltComRate ) );       END IF;
  IF (char_length(in_CltSales) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltSales', in_CltSales ) );       END IF;
  IF (char_length(in_CltWorked) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltWorked', in_CltWorked ) );       END IF;
  IF (char_length(in_CltSpcStats) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltSpcStats', in_CltSpcStats ) );       END IF;
  IF (char_length(in_CltPrefCol) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltPrefCol', in_CltPrefCol ) );       END IF;
  IF (char_length(in_CltIntRate) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltIntRate', in_CltIntRate ) );       END IF;
  IF (char_length(in_CltSalesNotes) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltSalesNotes', in_CltSalesNotes ) );       END IF;
  IF (char_length(in_CltNxt) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltNxt', in_CltNxt ) );       END IF;
  IF (char_length(in_Score) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'Score', in_Score ) );       END IF;
  IF (char_length(in_CltNote0) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltNote0', in_CltNote0 ) );       END IF;
  IF (char_length(in_GrpNote0) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'GrpNote0', in_GrpNote0 ) );       END IF;
  IF (char_length(in_CltStartDate) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltStartDate', in_CltStartDate ) );       END IF;
  IF (char_length(in_CltIndGrp) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltIndGrp', in_CltIndGrp ) );       END IF;
  IF (char_length(in_CltDRNNo) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltDRNNo', in_CltDRNNo ) );       END IF;
  IF (char_length(in_CltLastListed) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltLastListed', in_CltLastListed ) );       END IF;
  IF (char_length(in_CltDRNNoteBatch) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltDRNNoteBatch', in_CltDRNNoteBatch ) );       END IF;
  IF (char_length(in_CltDRNStatusBatch) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltDRNStatusBatch', in_CltDRNStatusBatch ) );       END IF;
  IF (char_length(in_CltAccts) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltAccts', in_CltAccts ) );       END IF;
  IF (char_length(in_CltDRNPmtBatch) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltDRNPmtBatch', in_CltDRNPmtBatch ) );       END IF;
  IF (char_length(in_CltListed) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltListed', in_CltListed ) );       END IF;
  IF (char_length(in_CltDRNRemitBatch) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltDRNRemitBatch', in_CltDRNRemitBatch ) );       END IF;
  IF (char_length(in_CltColl) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltColl', in_CltColl ) );       END IF;
  IF (char_length(in_CltDRNShortName) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltDRNShortName', in_CltDRNShortName ) );       END IF;
  IF (char_length(in_CltLiq) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltLiq', in_CltLiq ) );       END IF;
  IF (char_length(in_CltStMonth) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltStMonth', in_CltStMonth ) );       END IF;
  IF (char_length(in_CltStComH) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltStComH', in_CltStComH ) );       END IF;
  IF (char_length(in_CltStBill) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltStBill', in_CltStBill ) );       END IF;
  IF (char_length(in_CltAR91) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltAR91', in_CltAR91 ) );       END IF;
  IF (char_length(in_CltStPdHere) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltStPdHere', in_CltStPdHere ) );       END IF;
  IF (char_length(in_CltStComD) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltStComD', in_CltStComD ) );       END IF;
  IF (char_length(in_CltStPrevB) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltStPrevB', in_CltStPrevB ) );       END IF;
  IF (char_length(in_CltStPdDir) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltStPdDir', in_CltStPdDir ) );       END IF;
  IF (char_length(in_CltStComT) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltStComT', in_CltStComT ) );       END IF;
  IF (char_length(in_CltOwes) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltOwes', in_CltOwes ) );       END IF;
  IF (char_length(in_CltStHST) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltStHST', in_CltStHST ) );       END IF;
  IF (char_length(in_CltOwesTtl) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltOwesTtl', in_CltOwesTtl ) );       END IF;
  IF (char_length(in_CltSalesFull) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltSalesFull', in_CltSalesFull ) );       END IF;
  IF (char_length(in_CltSalesTitle) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltSalesTitle', in_CltSalesTitle ) );       END IF;
  IF (char_length(in_CltSalesExt) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltSalesExt', in_CltSalesExt ) );       END IF;
  IF (char_length(in_CltSalesEmail) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltSalesEmail', in_CltSalesEmail ) );       END IF;
  IF (char_length(in_CltIntRate2) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'CltIntRate2', in_CltIntRate2 ) );       END IF;
  IF (char_length(in_LE3) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'LE3', in_LE3 ) );       END IF;
  IF (char_length(in_LE4) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'LE4', in_LE4 ) );       END IF;
  /*end all*/
  
  
  
  
  SET _SQL = CONCAT( _SQL, ' 
      ORDER BY CltName
    ');
    
  IF (in_limit <> -1) THEN
    SET _SQL = CONCAT( _SQL, ' 
      LIMIT ', in_limit, ' OFFSET ', in_offset, ';
    ');
  END IF;

  
  #SELECT _SQL; /*uncomment to view the sql statement*/
  
  SET @SQL = _SQL;
  PREPARE sqlStatement FROM @SQL;
  EXECUTE sqlStatement;
  DEALLOCATE PREPARE sqlStatement;
  
END
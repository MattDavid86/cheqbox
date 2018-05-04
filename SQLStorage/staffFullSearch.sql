-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `staffFullSearch`(
	in_staffUID VARCHAR(45), 
  in_userUID VARCHAR(45), 
  in_companyUID VARCHAR(45), 
  
  in_StaffID VARCHAR(45), 
  in_StaffRef VARCHAR(45), 
  in_StaffAdd1 VARCHAR(45), 
  in_StaffBenefits VARCHAR(45), 
  in_StaffSignature VARCHAR(45), 
  in_StaffName VARCHAR(45), 
  in_StaffAdd2 VARCHAR(45), 
  in_StaffPension VARCHAR(45), 
  in_StaffTitle VARCHAR(45), 
  in_StaffCity VARCHAR(45), 
  in_StaffPerks VARCHAR(45), 
  in_StaffPic VARCHAR(45), 
  in_StaffEmail VARCHAR(45), 
  in_StaffProv VARCHAR(45), 
  in_StaffSec VARCHAR(45), 
  in_StaffLicNo VARCHAR(45), 
  in_StaffPCod VARCHAR(45), 
  in_StaffPwd VARCHAR(45), 
  in_StaffStartDate VARCHAR(45), 
  in_StaffBranch VARCHAR(45), 
  in_StaffTransferLimit VARCHAR(45), 
  in_StaffOffProbDate VARCHAR(45), 
  in_StaffExt VARCHAR(45), 
  in_StaffLimitBranch VARCHAR(45), 
  in_StaffEndDate VARCHAR(45), 
  in_Staff8000 VARCHAR(45), 
  in_StaffLimitClt VARCHAR(45), 
  in_StaffRank VARCHAR(45), 
  in_StaffQueue VARCHAR(45), 
  in_StaffLimitUser VARCHAR(45), 
  in_StaffViciCampaign VARCHAR(45), 
  in_StaffTelIP VARCHAR(45), 
  in_StaffTel VARCHAR(45), 
  in_StaffViciList VARCHAR(45), 
  in_StaffMU VARCHAR(45), 
  in_StaffNote VARCHAR(45), 
  in_StaffPortfolio VARCHAR(45), 
  in_StaffSpill VARCHAR(500), 
  in_StAbsCt VARCHAR(45), 
  in_StPrsCt VARCHAR(45), 
  in_StVacCt VARCHAR(45), 
  in_StLearning VARCHAR(45), 
  in_StAttendNote LONGTEXT, 
  in_StAttendPanel LONGTEXT, 
  in_StAccPmtSc VARCHAR(45), 
  in_StAccTasks VARCHAR(45), 
  in_StAltDocs VARCHAR(45), 
  in_StAccBackup VARCHAR(45), 
  in_StAccTasks0 VARCHAR(45), 
  in_StTimeOut VARCHAR(45), 
  in_StAccNoteSc VARCHAR(45), 
  in_StAccSales VARCHAR(45), 
  in_StAccNewBiz VARCHAR(45), 
  in_StAccNewLead VARCHAR(45), 
  in_StAccStaff VARCHAR(45), 
  in_StLimitCltNo VARCHAR(45), 
  in_StLimitSales VARCHAR(45), 
  in_StAccDBPayDep VARCHAR(45), 
  in_StAccDBPayEFT VARCHAR(45), 
  in_StAccSMS VARCHAR(45), 
  in_StAccDBPayBack VARCHAR(45), 
  in_StAccDBPayCC VARCHAR(45), 
  in_StAccRevRept VARCHAR(45), 
  in_StAccLttr VARCHAR(45), 
  in_StAccDBPayFwd VARCHAR(45), 
  in_StAccDBPayChq VARCHAR(45), 
  in_StAccStStRept VARCHAR(45), 
  in_StAccCalendar VARCHAR(45), 
  in_StAccDBPayButton VARCHAR(45), 
  in_StAccDBPayMO VARCHAR(45), 
  in_StAccRevTRept VARCHAR(45), 
  in_StAccDBMSMS VARCHAR(45), 
  in_StAccNSFOverride VARCHAR(45), 
  in_StAccDBPayDir VARCHAR(45), 
  in_StAccDBPayRfd VARCHAR(45), 
  in_StAccDBLglFees VARCHAR(45), 
  in_StAccDBMEmail VARCHAR(45), 
  in_StAccDBPayOut VARCHAR(45), 
  in_StAccDBPayACH VARCHAR(45), 
  in_StAccDBPayAdj VARCHAR(45), 
  in_StAccMLttr VARCHAR(45), 
  in_StAccDBPayNSF VARCHAR(45), 
  in_StaffPmtNoVerify VARCHAR(45), 
  in_StDBKill VARCHAR(45), 
  in_StAccSensitive VARCHAR(45), 
  in_StAccDBPayClAd VARCHAR(45), 
  in_StAccDBPayInv VARCHAR(45), 
  in_StaffStatOUT VARCHAR(45), 
  in_StaffStatINB VARCHAR(45), 
  in_StaffStatEML VARCHAR(45), 
  in_StaffStatSMS VARCHAR(45), 
  in_StaffStatINX VARCHAR(45), 
  in_StaffScore VARCHAR(45), 
  in_RevRevenue VARCHAR(45), 
  in_RevHistory VARCHAR(45), 
  in_StaffYTD VARCHAR(45), 
  in_RevCallCount VARCHAR(45), 
  in_RevAbs VARCHAR(45), 
  in_RevSocialMed VARCHAR(45), 
  in_RevAdj VARCHAR(45), 
  in_RevComments VARCHAR(45), 
  in_StaffAgent VARCHAR(45), 
  in_StaffAgTel VARCHAR(45), 
  in_StaffAgAdd VARCHAR(45), 
  in_StaffAgFax VARCHAR(45), 
  in_StaffAgCity VARCHAR(45), 
  in_StaffAgLSUC VARCHAR(45), 
  in_StaffAgProv VARCHAR(45), 
  in_StaffAgPC VARCHAR(45), 
  in_Note0 LONGTEXT,
  
  in_limit INT,
  in_offset INT
)
BEGIN
	
  DECLARE _SQL VARCHAR(4000);

  SET _SQL = CONCAT( '
      SELECT 
        staffUID, StaffName
      FROM us05_staff
      WHERE companyUID = ''', in_companyUID, '''
      
    ');
  
  
  /*start all*/
  IF (char_length(in_StaffID) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffID', in_StaffID ) );       END IF;
  IF (char_length(in_StaffRef) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffRef', in_StaffRef ) );       END IF;
  IF (char_length(in_StaffAdd1) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffAdd1', in_StaffAdd1 ) );       END IF;
  IF (char_length(in_StaffBenefits) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffBenefits', in_StaffBenefits ) );       END IF;
  IF (char_length(in_StaffSignature) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffSignature', in_StaffSignature ) );       END IF;
  IF (char_length(in_StaffName) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffName', in_StaffName ) );       END IF;
  IF (char_length(in_StaffAdd2) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffAdd2', in_StaffAdd2 ) );       END IF;
  IF (char_length(in_StaffPension) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffPension', in_StaffPension ) );       END IF;
  IF (char_length(in_StaffTitle) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffTitle', in_StaffTitle ) );       END IF;
  IF (char_length(in_StaffCity) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffCity', in_StaffCity ) );       END IF;
  IF (char_length(in_StaffPerks) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffPerks', in_StaffPerks ) );       END IF;
  IF (char_length(in_StaffPic) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffPic', in_StaffPic ) );       END IF;
  IF (char_length(in_StaffEmail) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffEmail', in_StaffEmail ) );       END IF;
  IF (char_length(in_StaffProv) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffProv', in_StaffProv ) );       END IF;
  IF (char_length(in_StaffSec) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffSec', in_StaffSec ) );       END IF;
  IF (char_length(in_StaffLicNo) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffLicNo', in_StaffLicNo ) );       END IF;
  IF (char_length(in_StaffPCod) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffPCod', in_StaffPCod ) );       END IF;
  IF (char_length(in_StaffPwd) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffPwd', in_StaffPwd ) );       END IF;
  IF (char_length(in_StaffStartDate) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffStartDate', in_StaffStartDate ) );       END IF;
  IF (char_length(in_StaffBranch) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffBranch', in_StaffBranch ) );       END IF;
  IF (char_length(in_StaffTransferLimit) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffTransferLimit', in_StaffTransferLimit ) );       END IF;
  IF (char_length(in_StaffOffProbDate) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffOffProbDate', in_StaffOffProbDate ) );       END IF;
  IF (char_length(in_StaffExt) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffExt', in_StaffExt ) );       END IF;
  IF (char_length(in_StaffLimitBranch) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffLimitBranch', in_StaffLimitBranch ) );       END IF;
  IF (char_length(in_StaffEndDate) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffEndDate', in_StaffEndDate ) );       END IF;
  IF (char_length(in_Staff8000) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'Staff8000', in_Staff8000 ) );       END IF;
  IF (char_length(in_StaffLimitClt) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffLimitClt', in_StaffLimitClt ) );       END IF;
  IF (char_length(in_StaffRank) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffRank', in_StaffRank ) );       END IF;
  IF (char_length(in_StaffQueue) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffQueue', in_StaffQueue ) );       END IF;
  IF (char_length(in_StaffLimitUser) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffLimitUser', in_StaffLimitUser ) );       END IF;
  IF (char_length(in_StaffViciCampaign) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffViciCampaign', in_StaffViciCampaign ) );       END IF;
  IF (char_length(in_StaffTelIP) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffTelIP', in_StaffTelIP ) );       END IF;
  IF (char_length(in_StaffTel) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffTel', in_StaffTel ) );       END IF;
  IF (char_length(in_StaffViciList) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffViciList', in_StaffViciList ) );       END IF;
  IF (char_length(in_StaffMU) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffMU', in_StaffMU ) );       END IF;
  IF (char_length(in_StaffNote) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffNote', in_StaffNote ) );       END IF;
  IF (char_length(in_StaffPortfolio) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffPortfolio', in_StaffPortfolio ) );       END IF;
  IF (char_length(in_StaffSpill) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffSpill', in_StaffSpill ) );       END IF;
  IF (char_length(in_StAbsCt) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAbsCt', in_StAbsCt ) );       END IF;
  IF (char_length(in_StPrsCt) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StPrsCt', in_StPrsCt ) );       END IF;
  IF (char_length(in_StVacCt) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StVacCt', in_StVacCt ) );       END IF;
  IF (char_length(in_StLearning) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StLearning', in_StLearning ) );       END IF;
  IF (char_length(in_StAttendNote) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAttendNote', in_StAttendNote ) );       END IF;
  IF (char_length(in_StAttendPanel) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAttendPanel', in_StAttendPanel ) );       END IF;
  IF (char_length(in_StAccPmtSc) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccPmtSc', in_StAccPmtSc ) );       END IF;
  IF (char_length(in_StAccTasks) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccTasks', in_StAccTasks ) );       END IF;
  IF (char_length(in_StAltDocs) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAltDocs', in_StAltDocs ) );       END IF;
  IF (char_length(in_StAccBackup) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccBackup', in_StAccBackup ) );       END IF;
  IF (char_length(in_StAccTasks0) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccTasks0', in_StAccTasks0 ) );       END IF;
  IF (char_length(in_StTimeOut) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StTimeOut', in_StTimeOut ) );       END IF;
  IF (char_length(in_StAccNoteSc) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccNoteSc', in_StAccNoteSc ) );       END IF;
  IF (char_length(in_StAccSales) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccSales', in_StAccSales ) );       END IF;
  IF (char_length(in_StAccNewBiz) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccNewBiz', in_StAccNewBiz ) );       END IF;
  IF (char_length(in_StAccNewLead) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccNewLead', in_StAccNewLead ) );       END IF;
  IF (char_length(in_StAccStaff) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccStaff', in_StAccStaff ) );       END IF;
  IF (char_length(in_StLimitCltNo) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StLimitCltNo', in_StLimitCltNo ) );       END IF;
  IF (char_length(in_StLimitSales) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StLimitSales', in_StLimitSales ) );       END IF;
  IF (char_length(in_StAccDBPayDep) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccDBPayDep', in_StAccDBPayDep ) );       END IF;
  IF (char_length(in_StAccDBPayEFT) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccDBPayEFT', in_StAccDBPayEFT ) );       END IF;
  IF (char_length(in_StAccSMS) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccSMS', in_StAccSMS ) );       END IF;
  IF (char_length(in_StAccDBPayBack) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccDBPayBack', in_StAccDBPayBack ) );       END IF;
  IF (char_length(in_StAccDBPayCC) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccDBPayCC', in_StAccDBPayCC ) );       END IF;
  IF (char_length(in_StAccRevRept) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccRevRept', in_StAccRevRept ) );       END IF;
  IF (char_length(in_StAccLttr) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccLttr', in_StAccLttr ) );       END IF;
  IF (char_length(in_StAccDBPayFwd) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccDBPayFwd', in_StAccDBPayFwd ) );       END IF;
  IF (char_length(in_StAccDBPayChq) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccDBPayChq', in_StAccDBPayChq ) );       END IF;
  IF (char_length(in_StAccStStRept) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccStStRept', in_StAccStStRept ) );       END IF;
  IF (char_length(in_StAccCalendar) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccCalendar', in_StAccCalendar ) );       END IF;
  IF (char_length(in_StAccDBPayButton) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccDBPayButton', in_StAccDBPayButton ) );       END IF;
  IF (char_length(in_StAccDBPayMO) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccDBPayMO', in_StAccDBPayMO ) );       END IF;
  IF (char_length(in_StAccRevTRept) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccRevTRept', in_StAccRevTRept ) );       END IF;
  IF (char_length(in_StAccDBMSMS) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccDBMSMS', in_StAccDBMSMS ) );       END IF;
  IF (char_length(in_StAccNSFOverride) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccNSFOverride', in_StAccNSFOverride ) );       END IF;
  IF (char_length(in_StAccDBPayDir) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccDBPayDir', in_StAccDBPayDir ) );       END IF;
  IF (char_length(in_StAccDBPayRfd) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccDBPayRfd', in_StAccDBPayRfd ) );       END IF;
  IF (char_length(in_StAccDBLglFees) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccDBLglFees', in_StAccDBLglFees ) );       END IF;
  IF (char_length(in_StAccDBMEmail) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccDBMEmail', in_StAccDBMEmail ) );       END IF;
  IF (char_length(in_StAccDBPayOut) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccDBPayOut', in_StAccDBPayOut ) );       END IF;
  IF (char_length(in_StAccDBPayACH) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccDBPayACH', in_StAccDBPayACH ) );       END IF;
  IF (char_length(in_StAccDBPayAdj) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccDBPayAdj', in_StAccDBPayAdj ) );       END IF;
  IF (char_length(in_StAccMLttr) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccMLttr', in_StAccMLttr ) );       END IF;
  IF (char_length(in_StAccDBPayNSF) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccDBPayNSF', in_StAccDBPayNSF ) );       END IF;
  IF (char_length(in_StaffPmtNoVerify) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffPmtNoVerify', in_StaffPmtNoVerify ) );       END IF;
  IF (char_length(in_StDBKill) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StDBKill', in_StDBKill ) );       END IF;
  IF (char_length(in_StAccSensitive) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccSensitive', in_StAccSensitive ) );       END IF;
  IF (char_length(in_StAccDBPayClAd) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccDBPayClAd', in_StAccDBPayClAd ) );       END IF;
  IF (char_length(in_StAccDBPayInv) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StAccDBPayInv', in_StAccDBPayInv ) );       END IF;
  IF (char_length(in_StaffStatOUT) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffStatOUT', in_StaffStatOUT ) );       END IF;
  IF (char_length(in_StaffStatINB) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffStatINB', in_StaffStatINB ) );       END IF;
  IF (char_length(in_StaffStatEML) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffStatEML', in_StaffStatEML ) );       END IF;
  IF (char_length(in_StaffStatSMS) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffStatSMS', in_StaffStatSMS ) );       END IF;
  IF (char_length(in_StaffStatINX) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffStatINX', in_StaffStatINX ) );       END IF;
  IF (char_length(in_StaffScore) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffScore', in_StaffScore ) );       END IF;
  IF (char_length(in_RevRevenue) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'RevRevenue', in_RevRevenue ) );       END IF;
  IF (char_length(in_RevHistory) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'RevHistory', in_RevHistory ) );       END IF;
  IF (char_length(in_StaffYTD) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffYTD', in_StaffYTD ) );       END IF;
  IF (char_length(in_RevCallCount) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'RevCallCount', in_RevCallCount ) );       END IF;
  IF (char_length(in_RevAbs) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'RevAbs', in_RevAbs ) );       END IF;
  IF (char_length(in_RevSocialMed) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'RevSocialMed', in_RevSocialMed ) );       END IF;
  IF (char_length(in_RevAdj) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'RevAdj', in_RevAdj ) );       END IF;
  IF (char_length(in_RevComments) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'RevComments', in_RevComments ) );       END IF;
  IF (char_length(in_StaffAgent) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffAgent', in_StaffAgent ) );       END IF;
  IF (char_length(in_StaffAgTel) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffAgTel', in_StaffAgTel ) );       END IF;
  IF (char_length(in_StaffAgAdd) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffAgAdd', in_StaffAgAdd ) );       END IF;
  IF (char_length(in_StaffAgFax) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffAgFax', in_StaffAgFax ) );       END IF;
  IF (char_length(in_StaffAgCity) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffAgCity', in_StaffAgCity ) );       END IF;
  IF (char_length(in_StaffAgLSUC) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffAgLSUC', in_StaffAgLSUC ) );       END IF;
  IF (char_length(in_StaffAgProv) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffAgProv', in_StaffAgProv ) );       END IF;
  IF (char_length(in_StaffAgPC) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'StaffAgPC', in_StaffAgPC ) );       END IF;
  IF (char_length(in_Note0) > 0) THEN        SET _SQL = CONCAT( _SQL, debtorFullSearchQueryBuilder( 'Note0', in_Note0 ) );       END IF;
  /*end all*/
  
  
  
  
  SET _SQL = CONCAT( _SQL, ' 
      ORDER BY StaffName
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
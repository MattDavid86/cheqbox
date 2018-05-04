-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE addStaff(
	in_staffUID VARCHAR(45), 
  in_userUID VARCHAR(45), 
  in_companyUID VARCHAR(45), 
  in_addedBy VARCHAR(45), 
  
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
  in_Note0 LONGTEXT
)
BEGIN
	INSERT INTO us05_staff
  (
    staffUID, userUID, companyUID, dateAdded, addedBy, 

    StaffID, StaffRef, StaffAdd1, StaffBenefits, StaffSignature, StaffName, StaffAdd2, StaffPension, 
    StaffTitle, StaffCity, StaffPerks, StaffPic, StaffEmail, StaffProv, StaffSec, StaffLicNo, StaffPCod, StaffPwd, StaffStartDate, StaffBranch, 
    StaffTransferLimit, StaffOffProbDate, StaffExt, StaffLimitBranch, StaffEndDate, Staff8000, StaffLimitClt, StaffRank, StaffQueue, StaffLimitUser, 
    StaffViciCampaign, StaffTelIP, StaffTel, StaffViciList, StaffMU, StaffNote, StaffPortfolio, StaffSpill, StAbsCt, StPrsCt, StVacCt, StLearning, 
    StAttendNote, StAttendPanel, StAccPmtSc, StAccTasks, StAltDocs, StAccBackup, StAccTasks0, StTimeOut, StAccNoteSc, StAccSales, StAccNewBiz, 
    StAccNewLead, StAccStaff, StLimitCltNo, StLimitSales, StAccDBPayDep, StAccDBPayEFT, StAccSMS, StAccDBPayBack, StAccDBPayCC, StAccRevRept, 
    StAccLttr, StAccDBPayFwd, StAccDBPayChq, StAccStStRept, StAccCalendar, StAccDBPayButton, StAccDBPayMO, StAccRevTRept, StAccDBMSMS, StAccNSFOverride, 
    StAccDBPayDir, StAccDBPayRfd, StAccDBLglFees, StAccDBMEmail, StAccDBPayOut, StAccDBPayACH, StAccDBPayAdj, StAccMLttr, StAccDBPayNSF, 
    StaffPmtNoVerify, StDBKill, StAccSensitive, StAccDBPayClAd, StAccDBPayInv, StaffStatOUT, StaffStatINB, StaffStatEML, StaffStatSMS, 
    StaffStatINX, StaffScore, RevRevenue, RevHistory, StaffYTD, RevCallCount, RevAbs, RevSocialMed, RevAdj, RevComments, StaffAgent, StaffAgTel, 
    StaffAgAdd, StaffAgFax, StaffAgCity, StaffAgLSUC, StaffAgProv, StaffAgPC, Note0
  )
VALUES
  (
    in_staffUID, in_userUID, in_companyUID, CURRENT_TIMESTAMP, in_addedBy, 

    in_StaffID, in_StaffRef, in_StaffAdd1, in_StaffBenefits, in_StaffSignature, in_StaffName, in_StaffAdd2, in_StaffPension, in_StaffTitle, 
    in_StaffCity, in_StaffPerks, in_StaffPic, in_StaffEmail, in_StaffProv, in_StaffSec, in_StaffLicNo, in_StaffPCod, in_StaffPwd, in_StaffStartDate, 
    in_StaffBranch, in_StaffTransferLimit, in_StaffOffProbDate, in_StaffExt, in_StaffLimitBranch, in_StaffEndDate, in_Staff8000, in_StaffLimitClt, 
    in_StaffRank, in_StaffQueue, in_StaffLimitUser, in_StaffViciCampaign, in_StaffTelIP, in_StaffTel, in_StaffViciList, in_StaffMU, in_StaffNote, 
    in_StaffPortfolio, in_StaffSpill, in_StAbsCt, in_StPrsCt, in_StVacCt, in_StLearning, in_StAttendNote, in_StAttendPanel, in_StAccPmtSc, 
    in_StAccTasks, in_StAltDocs, in_StAccBackup, in_StAccTasks0, in_StTimeOut, in_StAccNoteSc, in_StAccSales, in_StAccNewBiz, in_StAccNewLead, 
    in_StAccStaff, in_StLimitCltNo, in_StLimitSales, in_StAccDBPayDep, in_StAccDBPayEFT, in_StAccSMS, in_StAccDBPayBack, in_StAccDBPayCC, 
    in_StAccRevRept, in_StAccLttr, in_StAccDBPayFwd, in_StAccDBPayChq, in_StAccStStRept, in_StAccCalendar, in_StAccDBPayButton, 
    in_StAccDBPayMO, in_StAccRevTRept, in_StAccDBMSMS, in_StAccNSFOverride, in_StAccDBPayDir, in_StAccDBPayRfd, in_StAccDBLglFees, in_StAccDBMEmail, 
    in_StAccDBPayOut, in_StAccDBPayACH, in_StAccDBPayAdj, in_StAccMLttr, in_StAccDBPayNSF, in_StaffPmtNoVerify, in_StDBKill, in_StAccSensitive, 
    in_StAccDBPayClAd, in_StAccDBPayInv, in_StaffStatOUT, in_StaffStatINB, in_StaffStatEML, in_StaffStatSMS, in_StaffStatINX, in_StaffScore, 
    in_RevRevenue, in_RevHistory, in_StaffYTD, in_RevCallCount, in_RevAbs, in_RevSocialMed, in_RevAdj, in_RevComments, in_StaffAgent, in_StaffAgTel, 
    in_StaffAgAdd, in_StaffAgFax, in_StaffAgCity, in_StaffAgLSUC, in_StaffAgProv, in_StaffAgPC, in_Note0
  );

END
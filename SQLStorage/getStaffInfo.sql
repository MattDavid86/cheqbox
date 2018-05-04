-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE getStaffInfo(
	in_staffUID VARCHAR(45)
)
BEGIN
	SELECT 
    
    staffUID, userUID, companyUID, 
    
    StaffID, StaffRef, StaffAdd1, StaffBenefits, StaffSignature, StaffName, StaffAdd2, StaffPension, StaffTitle, StaffCity, StaffPerks, StaffPic, StaffEmail,
    StaffProv, StaffSec, StaffLicNo, StaffPCod, StaffPwd, StaffStartDate, StaffBranch, StaffTransferLimit, StaffOffProbDate, StaffExt, StaffLimitBranch,
    StaffEndDate, Staff8000, StaffLimitClt, StaffRank, StaffQueue, StaffLimitUser, StaffViciCampaign, StaffTelIP, StaffTel, StaffViciList,
    StaffMU, StaffNote, StaffPortfolio, StaffSpill, StAbsCt, StPrsCt, StVacCt, StLearning, StAttendNote, StAttendPanel, StAccPmtSc,
    StAccTasks, StAltDocs, StAccBackup, StAccTasks0, StTimeOut, StAccNoteSc, StAccSales, StAccNewBiz, StAccNewLead, StAccStaff, StLimitCltNo,
    StLimitSales, StAccDBPayDep, StAccDBPayEFT, StAccSMS, StAccDBPayBack, StAccDBPayCC, StAccRevRept, StAccLttr, StAccDBPayFwd,
    StAccDBPayChq, StAccStStRept, StAccCalendar, StAccDBPayButton, StAccDBPayMO, StAccRevTRept, StAccDBMSMS, StAccNSFOverride, StAccDBPayDir,
    StAccDBPayRfd, StAccDBLglFees, StAccDBMEmail, StAccDBPayOut, StAccDBPayACH, StAccDBPayAdj, StAccMLttr, StAccDBPayNSF, StaffPmtNoVerify,
    StDBKill, StAccSensitive, StAccDBPayClAd, StAccDBPayInv, StaffStatOUT, StaffStatINB, StaffStatEML, StaffStatSMS, StaffStatINX,
    StaffScore, RevRevenue, RevHistory, StaffYTD, RevCallCount, RevAbs, RevSocialMed, RevAdj, RevComments, StaffAgent, StaffAgTel,
    StaffAgAdd, StaffAgFax, StaffAgCity, StaffAgLSUC, StaffAgProv, StaffAgPC, Note0
  
  FROM us05_staff
  
	WHERE staffUID = in_staffUID
  AND dateDeleted IS NULL;
END
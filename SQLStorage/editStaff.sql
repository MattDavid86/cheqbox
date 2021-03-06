-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE editStaff(
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
  in_Note0 LONGTEXT
)
BEGIN
  
	UPDATE us05_staff
    SET
      userUID = in_userUID,
      companyUID = in_companyUID,
      
      StaffID = in_StaffID,
      StaffRef = in_StaffRef,
      StaffAdd1 = in_StaffAdd1,
      StaffBenefits = in_StaffBenefits,
      StaffSignature = in_StaffSignature,
      StaffName = in_StaffName,
      StaffAdd2 = in_StaffAdd2,
      StaffPension = in_StaffPension,
      StaffTitle = in_StaffTitle,
      StaffCity = in_StaffCity,
      StaffPerks = in_StaffPerks,
      StaffPic = in_StaffPic,
      StaffEmail = in_StaffEmail,
      StaffProv = in_StaffProv,
      StaffSec = in_StaffSec,
      StaffLicNo = in_StaffLicNo,
      StaffPCod = in_StaffPCod,
      StaffPwd = in_StaffPwd,
      StaffStartDate = in_StaffStartDate,
      StaffBranch = in_StaffBranch,
      StaffTransferLimit = in_StaffTransferLimit,
      StaffOffProbDate = in_StaffOffProbDate,
      StaffExt = in_StaffExt,
      StaffLimitBranch = in_StaffLimitBranch,
      StaffEndDate = in_StaffEndDate,
      Staff8000 = in_Staff8000,
      StaffLimitClt = in_StaffLimitClt,
      StaffRank = in_StaffRank,
      StaffQueue = in_StaffQueue,
      StaffLimitUser = in_StaffLimitUser,
      StaffViciCampaign = in_StaffViciCampaign,
      StaffTelIP = in_StaffTelIP,
      StaffTel = in_StaffTel,
      StaffViciList = in_StaffViciList,
      StaffMU = in_StaffMU,
      StaffNote = in_StaffNote,
      StaffPortfolio = in_StaffPortfolio,
      StaffSpill = in_StaffSpill,
      StAbsCt = in_StAbsCt,
      StPrsCt = in_StPrsCt,
      StVacCt = in_StVacCt,
      StLearning = in_StLearning,
      StAttendNote = in_StAttendNote,
      StAttendPanel = in_StAttendPanel,
      StAccPmtSc = in_StAccPmtSc,
      StAccTasks = in_StAccTasks,
      StAltDocs = in_StAltDocs,
      StAccBackup = in_StAccBackup,
      StAccTasks0 = in_StAccTasks0,
      StTimeOut = in_StTimeOut,
      StAccNoteSc = in_StAccNoteSc,
      StAccSales = in_StAccSales,
      StAccNewBiz = in_StAccNewBiz,
      StAccNewLead = in_StAccNewLead,
      StAccStaff = in_StAccStaff,
      StLimitCltNo = in_StLimitCltNo,
      StLimitSales = in_StLimitSales,
      StAccDBPayDep = in_StAccDBPayDep,
      StAccDBPayEFT = in_StAccDBPayEFT,
      StAccSMS = in_StAccSMS,
      StAccDBPayBack = in_StAccDBPayBack,
      StAccDBPayCC = in_StAccDBPayCC,
      StAccRevRept = in_StAccRevRept,
      StAccLttr = in_StAccLttr,
      StAccDBPayFwd = in_StAccDBPayFwd,
      StAccDBPayChq = in_StAccDBPayChq,
      StAccStStRept = in_StAccStStRept,
      StAccCalendar = in_StAccCalendar,
      StAccDBPayButton = in_StAccDBPayButton,
      StAccDBPayMO = in_StAccDBPayMO,
      StAccRevTRept = in_StAccRevTRept,
      StAccDBMSMS = in_StAccDBMSMS,
      StAccNSFOverride = in_StAccNSFOverride,
      StAccDBPayDir = in_StAccDBPayDir,
      StAccDBPayRfd = in_StAccDBPayRfd,
      StAccDBLglFees = in_StAccDBLglFees,
      StAccDBMEmail = in_StAccDBMEmail,
      StAccDBPayOut = in_StAccDBPayOut,
      StAccDBPayACH = in_StAccDBPayACH,
      StAccDBPayAdj = in_StAccDBPayAdj,
      StAccMLttr = in_StAccMLttr,
      StAccDBPayNSF = in_StAccDBPayNSF,
      StaffPmtNoVerify = in_StaffPmtNoVerify,
      StDBKill = in_StDBKill,
      StAccSensitive = in_StAccSensitive,
      StAccDBPayClAd = in_StAccDBPayClAd,
      StAccDBPayInv = in_StAccDBPayInv,
      StaffStatOUT = in_StaffStatOUT,
      StaffStatINB = in_StaffStatINB,
      StaffStatEML = in_StaffStatEML,
      StaffStatSMS = in_StaffStatSMS,
      StaffStatINX = in_StaffStatINX,
      StaffScore = in_StaffScore,
      RevRevenue = in_RevRevenue,
      RevHistory = in_RevHistory,
      StaffYTD = in_StaffYTD,
      RevCallCount = in_RevCallCount,
      RevAbs = in_RevAbs,
      RevSocialMed = in_RevSocialMed,
      RevAdj = in_RevAdj,
      RevComments = in_RevComments,
      StaffAgent = in_StaffAgent,
      StaffAgTel = in_StaffAgTel,
      StaffAgAdd = in_StaffAgAdd,
      StaffAgFax = in_StaffAgFax,
      StaffAgCity = in_StaffAgCity,
      StaffAgLSUC = in_StaffAgLSUC,
      StaffAgProv = in_StaffAgProv,
      StaffAgPC = in_StaffAgPC,
      Note0 = in_Note0
  WHERE staffUID = in_staffUID;


END
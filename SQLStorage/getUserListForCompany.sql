-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `getUserListForCompany`(
	in_companyUID VARCHAR(45)
)
BEGIN
	SELECT 
		cm02.uid, cm02.userUID, cm02.inactive, cm02.userLevel,
    us01.fname, us01.lname, us01.email,
    us02.userLevelDesc
	FROM cm02_company_users cm02
  LEFT OUTER JOIN us01_users us01 ON us01.userUID = cm02.userUID
  LEFT OUTER JOIN us02_userlevel us02 ON us02.userLevelUID = cm02.userLevel
	WHERE cm02.companyUID = in_companyUID
	AND cm02.dateDeleted IS NULL;
END
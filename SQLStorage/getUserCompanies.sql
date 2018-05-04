-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `getUserCompanies`(
	in_userUID varchar(45)
)
BEGIN
	SELECT 
		uid, companyUID, userLevel
	FROM cm02_company_users
	WHERE userUID = in_userUID
  AND dateDeleted IS NULL
	AND inactive = 0;
END
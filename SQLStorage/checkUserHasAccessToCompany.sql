-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `checkUserHasAccessToCompany`(
	in_userUID VARCHAR(45),
  in_companyUID VARCHAR(45)
)
BEGIN
	SELECT 
		userLevel
	FROM cm02_company_users
	WHERE userUID = in_userUID
  AND companyUID = in_companyUID
  AND dateDeleted IS NULL
	AND inactive = 0;
END
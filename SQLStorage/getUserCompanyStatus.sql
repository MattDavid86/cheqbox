-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `getUserCompanyStatus`(
	in_userUID VARCHAR(45),
  in_companyUID VARCHAR(45)
)
BEGIN
	SELECT 
    inactive, userLevel
  FROM cm02_company_users 
  WHERE userUID = in_userUID
  AND companyUID = in_companyUID
  AND dateDeleted IS NULL;
END
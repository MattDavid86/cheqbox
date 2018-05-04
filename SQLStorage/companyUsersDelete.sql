-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `companyUsersDelete`(
	in_userUID VARCHAR(45),
  in_companyUID VARCHAR(45)
)
BEGIN
	UPDATE cm02_company_users 
  SET
    dateDeleted = CURRENT_TIMESTAMP
  WHERE userUID = in_userUID
  AND companyUID = in_companyUID;
END
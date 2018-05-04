-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `companyUsersInactive`(
	in_userUID VARCHAR(45),
  in_companyUID VARCHAR(45),
  in_inactive INT
)
BEGIN
	UPDATE cm02_company_users 
  SET
    inactive = in_inactive
  WHERE userUID = in_userUID
  AND companyUID = in_companyUID;
END
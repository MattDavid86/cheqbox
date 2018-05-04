-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `addUserToCompany`(
	in_userUID VARCHAR(45),
  in_companyUID VARCHAR(45),
  in_inactive INT,
  in_userLevel INT
)
BEGIN
	INSERT INTO cm02_company_users
    ( userUID, companyUID, dateAdded, inactive, userLevel ) 
  VALUES 
    ( in_userUID, in_companyUID, CURRENT_TIMESTAMP, in_inactive, in_userLevel );
END
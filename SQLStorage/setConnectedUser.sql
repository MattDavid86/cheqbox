-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `setConnectedUser`(
	in_companyUID VARCHAR(45),
  in_userUID VARCHAR(45)
)
BEGIN
	UPDATE cm01_company
  SET 
    userUID = in_userUID
  WHERE companyUID = in_companyUID
  AND dateDeleted IS NULL;
  
END
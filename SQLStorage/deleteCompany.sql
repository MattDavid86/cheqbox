-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `deleteCompany`(
	in_companyUID VARCHAR(45)
)
BEGIN
	UPDATE cm01_company
  SET 
    dateDeleted = CURRENT_TIMESTAMP
  WHERE companyUID = in_companyUID
  AND dateDeleted IS NULL;
  
END
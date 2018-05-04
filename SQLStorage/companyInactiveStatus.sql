-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `companyInactiveStatus`(
	in_companyUID VARCHAR(45),
  in_inactive INT
)
BEGIN
	UPDATE cm01_company
  SET 
    inactive = in_inactive
  WHERE companyUID = in_companyUID
  AND dateDeleted IS NULL;
  
END
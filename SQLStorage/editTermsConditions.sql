-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `editTermsConditions` (
  in_companyUID VARCHAR(45),
  in_termsConditions LONGTEXT
)
BEGIN
  UPDATE cm01_company
  SET 
    termsConditions = in_termsConditions
  WHERE companyUID = in_companyUID;
END
-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `getCompanyList`(
	
)
BEGIN
	SELECT 
    companyUID, companyName, website, phone, email, contactFName, contactLName, userUID, inactive
  FROM cm01_company
  WHERE dateDeleted IS NULL
  LIMIT 1000;
  
END
-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `getCompanyDetails`(
	in_companyUID VARCHAR(45)
)
BEGIN
	SELECT 
    companyUID, companyName, website, phone, contactFName, contactLName, userUID, email,
    aboutUs, companyLogo, addressOne, addressTwo, city, province, country, postalCode, 
    termsConditions
  FROM cm01_company
  WHERE companyUID = in_companyUID
  AND dateDeleted IS NULL;
  
END
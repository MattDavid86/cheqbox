-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `editCompany`(
	in_companyUID VARCHAR(45),
  in_companyName VARCHAR(250), 
  in_website VARCHAR(100), 
  in_phone VARCHAR(45), 
  in_contactFName VARCHAR(45), 
  in_contactLName VARCHAR(45), 
  in_email VARCHAR(45),
  in_aboutUs LONGTEXT,
  in_companyLogo VARCHAR(500),
  in_addressOne VARCHAR(45),
  in_addressTwo VARCHAR(45),
  in_city VARCHAR(45),
  in_province VARCHAR(45),
  in_country VARCHAR(45),
  in_postalCode VARCHAR(45),
  in_termsConditions LONGTEXT
)
BEGIN
	UPDATE cm01_company 
  SET 
    companyName = in_companyName, 
    website = in_website, 
    phone = in_phone, 
    contactFName = in_contactFName, 
    contactLName = in_contactLName, 
    email = in_email,
    aboutUs = in_aboutUs,
    companyLogo = in_companyLogo,
    addressOne = in_addressOne,
    addressTwo = in_addressTwo,
    city = in_city,
    province = in_province,
    country = in_country,
    postalCode = in_postalCode,
    termsConditions = in_termsConditions
  WHERE companyUID = in_companyUID;
  
END
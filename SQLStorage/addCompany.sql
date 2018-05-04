-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `addCompany`(
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
	INSERT INTO cm01_company 
    ( 
      companyUID, companyName, website, phone, contactFName, contactLName, email,
      aboutUs, companyLogo, addressOne, addressTwo, city, province, country, postalCode, termsConditions
    ) 
  VALUES 
    ( 
      in_companyUID, in_companyName, in_website, in_phone, in_contactFName, in_contactLName, in_email, 
      in_aboutUs, in_companyLogo, in_addressOne, in_addressTwo, in_city, in_province, in_country, in_postalCode, in_termsConditions
    );
  
END
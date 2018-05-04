-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `getCountries` (
  
)
BEGIN
  SELECT 
    countryUID, country, countryCode
  FROM us04_countries;
END
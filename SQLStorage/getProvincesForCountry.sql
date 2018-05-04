-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `getProvincesForCountry` (
  in_countryUID INT
)
BEGIN
  SELECT 
    provinceID, provinceCode, province 
  FROM us03_provinces
  WHERE countryUID = in_countryUID;
END
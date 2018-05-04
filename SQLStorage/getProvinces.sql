-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `getProvinces` (
  
)
BEGIN
  SELECT 
    provinceID, provinceCode, province 
  FROM us03_provinces;
END
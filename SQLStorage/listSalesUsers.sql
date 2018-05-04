-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE listSalesUsers(
	in_companyUID VARCHAR(45)
)
BEGIN
	SELECT 
    salesUID, CltName
  FROM us06_sales
  WHERE companyUID = in_companyUID;
END
-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE deleteSales(
	in_salesUID VARCHAR(45)
)
BEGIN
	UPDATE us06_sales
  SET 
    dateDeleted = CURRENT_TIMESTAMP
	WHERE salesUID = in_salesUID;
END
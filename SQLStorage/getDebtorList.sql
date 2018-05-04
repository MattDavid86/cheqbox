-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `getDebtorList`(
	in_companyUID VARCHAR(45),
  in_userUID VARCHAR(45),
  in_limit INT,
  in_offset INT
)
BEGIN
	SELECT 
    DBID, DBName, DBRefNum
  FROM db01_debtor
  
	WHERE companyUID = in_companyUID
  AND dateDeleted IS NULL
  
  LIMIT in_limit
  OFFSET in_offset
  ;
END
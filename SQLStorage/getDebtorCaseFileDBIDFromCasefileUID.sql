-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `getDebtorCaseFileDBIDFromCasefileUID`(
  in_casefileUID VARCHAR(45)
)
BEGIN
  SELECT 
    DBID 
  FROM db01_debtor 
  WHERE casefileUID = in_casefileUID;
  
END
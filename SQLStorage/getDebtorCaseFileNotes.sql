-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `getDebtorCaseFileNotes`(
	in_casefileUID VARCHAR(45)
)
BEGIN
	SELECT 
    db03.notes, db03.dateAdded, 
    db03.addedBy, us01.fname, us01.lname
  FROM db03_debtor_case_notes db03
  LEFT OUTER JOIN us01_users us01 ON us01.userUID = db03.addedBy
  WHERE db03.casefileUID = in_casefileUID
  ORDER BY db03.dateAdded DESC;
END
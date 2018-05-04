-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `addDebtorCaseFileNotes`(
	in_casefileUID VARCHAR(45),
  in_notes LONGTEXT,
  in_companyUID VARCHAR(45),
  in_addedBy VARCHAR(45)
)
BEGIN
	INSERT INTO db03_debtor_case_notes 
    ( casefileUID, notes, companyUID, addedBy, dateAdded ) 
  VALUES 
    ( in_casefileUID, in_notes, in_companyUID, in_addedBy, CURRENT_TIMESTAMP );
END
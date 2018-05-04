-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `addMassDebtorCommunication`(
	in_userUID VARCHAR(45),
  in_contactType INT, 
  in_delayInMilliseconds INT, 
  in_messageToAll LONGTEXT
)
BEGIN
	INSERT INTO ctc01_debtor_contact
    ( 
      userUID, contactType, dateAdded, delayInMilliseconds, messageToAll
    ) 
  VALUES 
    ( 
      in_userUID, in_contactType, CURRENT_TIMESTAMP, in_delayInMilliseconds, in_messageToAll
    );
  
END
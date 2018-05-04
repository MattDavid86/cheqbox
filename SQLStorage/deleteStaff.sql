-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE deleteStaff(
	in_staffUID VARCHAR(45)
)
BEGIN
	UPDATE us05_staff
  SET 
    dateDeleted = CURRENT_TIMESTAMP
	WHERE staffUID = in_staffUID;
END
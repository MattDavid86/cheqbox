-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `deleteUser`(
	in_userUID varchar(45)
)
BEGIN
	UPDATE us01_users
	SET 
    deleted = 1,
    dateDeleted = CURRENT_TIMESTAMP
	WHERE userUID = in_userUID;
END
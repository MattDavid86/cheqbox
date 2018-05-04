-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `changePassword`(
	in_userUID varchar(45),
  in_password varchar(45)
)
BEGIN
	UPDATE us01_users
	SET password = in_password
	WHERE userUID = in_userUID;
END
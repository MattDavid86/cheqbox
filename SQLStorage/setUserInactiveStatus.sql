-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `setUserInactiveStatus`(
	in_userUID varchar(45),
  in_inactive int
)
BEGIN
	UPDATE us01_users
	SET inactive = in_inactive
	WHERE userUID = in_userUID;
END
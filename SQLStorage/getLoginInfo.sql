-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `getLoginInfo`(
	in_email varchar(45),
	in_password varchar(45)
)
BEGIN
	SELECT 
		userUID, fname, lname, userLevel
	FROM us01_users
	WHERE email = in_email
	AND password = in_password
	AND inactive = 0;
END
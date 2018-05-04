-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `getUserInfo`(
	in_userUID varchar(45)
)
BEGIN
	SELECT 
		userUID, fname, lname, email, userLevel, phone, address, city, province, country, postalCode, inactive
	FROM us01_users
	WHERE userUID = in_userUID;
END
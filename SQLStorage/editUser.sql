-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `editUser`(
	in_userUID varchar(45),
	in_fname varchar(45),
	in_lname varchar(45),
	in_email varchar(200),
	in_userLevel int,
	in_address varchar(250),
	in_city varchar(45),
	in_province varchar(45),
	in_country varchar(45),
	in_postalCode varchar(45),
	in_phone varchar(45),
	in_inactive int
)
BEGIN
	UPDATE us01_users
  SET 
    `fname` = in_fname,
    `lname` = in_lname,
    `email` = in_email,
    `userLevel` = in_userLevel,
    `address` = in_address,
    `city` = in_city,
    `province` = in_province,
    `country` = in_country,
    `postalCode` = in_postalCode,
    `phone` = in_phone,
    `inactive` = in_inactive
	WHERE userUID = in_userUID;
END
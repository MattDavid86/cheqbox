-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `addUser`(
	in_userUID varchar(45),
	in_fname varchar(45),
	in_lname varchar(45),
	in_email varchar(200),
  in_password varchar(45),
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
	DECLARE emailCount INT;
  DECLARE socialMediaLoginsCount INT;
  SET emailCount = (SELECT Count(userUID) FROM us01_users WHERE email = in_email);
  
  IF (emailCount = 0) THEN
    INSERT INTO `us01_users`
      ( `userUID`, `fname`, `lname`, `email`, `password`, `userLevel`, `phone`, `address`, `city`, `province`, `country`, `postalCode`, `inactive`, dateAdded )
    VALUES
      ( in_userUID, in_fname, in_lname, in_email, in_password, in_userLevel, in_phone, in_address, in_city, in_province, in_country, in_postalCode, in_inactive, CURRENT_TIMESTAMP );
  END IF;
  
  SELECT emailCount;
  
END
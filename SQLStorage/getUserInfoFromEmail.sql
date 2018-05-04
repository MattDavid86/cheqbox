-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `getUserInfoFromEmail` (
  in_email varchar(45)
)
BEGIN
	SELECT `userUID`, `fname`, `lname` FROM us01_users WHERE `email` = in_email;
END
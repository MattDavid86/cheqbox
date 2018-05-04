-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `getUserList`(
	
)
BEGIN
	SELECT 
		us01.userUID, us01.fname, us01.lname, us01.email, us01.userLevel, us01.inactive,
    us02.userLevelDesc
	FROM us01_users us01
  LEFT OUTER JOIN us02_userlevel us02 ON us01.userLevel = us02.userLevelUID
  WHERE us01.dateDeleted is null;
END
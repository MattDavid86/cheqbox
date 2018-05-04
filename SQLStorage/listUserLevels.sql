-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `listUserLevels`(
	
)
BEGIN
	SELECT 
		userLevelUID, userLevelDesc
	FROM us02_userlevel;
END
-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `getDebtorTitleTypes`(
	
)
BEGIN
	SELECT 
    uid, title, rank
  FROM db02_title_types
  WHERE deleted = 0
  ORDER BY title, rank
  ;
END
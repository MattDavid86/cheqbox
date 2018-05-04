-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE listStaffUsers(
	in_companyUID VARCHAR(45)
)
BEGIN
	SELECT 
    staffUID, StaffName
  FROM us05_staff
  WHERE companyUID = in_companyUID;
END
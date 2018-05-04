CREATE PROCEDURE `getStaffDetails` (
	in_useruid varchar (45),
    in_companyUID varchar (45)
)
BEGIN
	SELECT StaffName, StaffTitle, StaffExt, Staff8000, StaffEmail
    FROM us05_staff
    WHERE userUID = in_useruid AND
    companyUID = in_companyUID;    
END

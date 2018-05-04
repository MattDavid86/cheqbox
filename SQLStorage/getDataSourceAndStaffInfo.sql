CREATE PROCEDURE `getDataSourceStaffInfo`(
	in_casefileUID VARCHAR (45)
)
BEGIN
SELECT s.StaffEmail, s.StaffName, s.StaffTitle, s.StaffExt, s.Staff800, d.DBID, d.DBName, d.DBAdd1, d.DBAdd2, d.DBCity, d.DBProv, d.DBPCod, d.DBClt, d.DBOrigCreditory, d.DBBal, d.DBRefNum
FROM us05_staff s 
INNER JOIN 
db01_debtor d on s.companyUID = d.companyUID
INNER JOIN
us01_users u on s.userUID = u.userUID
WHERE 
d.casefileUID = in_casefileUID;
END
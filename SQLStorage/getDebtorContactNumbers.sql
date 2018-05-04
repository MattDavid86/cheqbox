CREATE PROCEDURE `getDebtorContactNumbers`(
	in_DB varchar(45)
)
BEGIN
	SELECT DBID, DBTel1, DBTel2, DBTel3 From db01_debtor WHERE DBID = in_DB;
END
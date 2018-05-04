CREATE PROCEDURE `getDebtorMassContactNumbers` (
	in_dbname varchar(100)
)
BEGIN
	SELECT DBTel1, DBTel2, DBTel3 FROM db01_debtor Where DBName = in_dbname;
END

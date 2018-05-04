CREATE PROCEDURE `getMassDebtorEmails`(
	in_dbname varchar(100)
)
BEGIN
	SELECT DBID, DBCollNum, DBSalesRep, DBLglNum, DBEmail, DBName FROM db01_debtor WHERE DBName = in_dbname ORDER BY DBID DESC;
END

CREATE PROCEDURE `getDebtorEmailList`(
	in_DBID VARCHAR(45)
)
BEGIN
	SELECT DBID, DBCollNum, DBSalesRep, DBLglNum, DBEmail, DBName FROM db01_debtor WHERE DBID = in_DBID; 
END
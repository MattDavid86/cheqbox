CREATE PROCEDURE `getUserEmail` (
	in_userUid varchar(45)
)
BEGIN
	SELECT email
FROM us01_users
	where userUID = in_userUid;
END

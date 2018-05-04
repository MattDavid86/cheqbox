-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE PROCEDURE `addUserToCompanyByEmail`(
	in_email VARCHAR(200),
  in_companyUID VARCHAR(45),
  in_userLevel INT
)
BEGIN
	DECLARE var_userUID VARCHAR(45);
  DECLARE var_cm02UID INT;
  
  SET var_userUID = (
    SELECT 
      userUID
    FROM us01_users 
    WHERE email = in_email
    AND dateDeleted IS NULL
  );
  
  SET var_cm02UID = (
    SELECT 
      uid
    FROM cm02_company_users 
    WHERE userUID = var_userUID
    AND companyUID = in_companyUID
    AND dateDeleted IS NULL
  );
  
  IF ( var_userUID IS NOT NULL ) THEN
    IF ( var_cm02UID IS NULL ) THEN
      call addUserToCompany( var_userUID, in_companyUID, 0, in_userLevel );
      SELECT 'User added successfully' AS message, 'true' AS status;
    ELSE
      SELECT 'This user exists as a member of your company' AS message, 'false' AS status;
    END IF;
  ELSE
    SELECT 'The email could not be found' AS message, 'false' AS status;
  END IF;
  
END
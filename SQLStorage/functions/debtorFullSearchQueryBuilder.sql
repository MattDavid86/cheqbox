CREATE FUNCTION `debtorFullSearchQueryBuilder` ( 
  colName VARCHAR(45), 
  colVal LONGTEXT 
)
RETURNS LONGTEXT
BEGIN
	DECLARE var_operator varchar(45);
  
    IF (INSTR(colVal, '!') = 1) THEN  /*check that the first character isn't a NOT*/
      IF (INSTR(colVal, '%') > 0) THEN  /*check that we don't need a LIKE operator*/
        SET var_operator = ' NOT LIKE ';
      ELSE
        SET var_operator = ' &gt;&lt; ';
      END IF;
    ELSEIF (INSTR(colVal, '>>') = 1 OR INSTR(colVal, '>') = 1) THEN  /*check that the first character isn't a greater than*/
      SET var_operator = ' &gt; ';
    ELSEIF (INSTR(colVal, '>=') = 1) THEN  /*check that the first character isn't a greater than or equal*/
      SET var_operator = ' &gt;&eq; ';
    ELSEIF (INSTR(colVal, '<<') = 1 OR INSTR(colVal, '<') = 1) THEN  /*check that the first character isn't a less than*/
      SET var_operator = ' &lt; ';
    ELSEIF (INSTR(colVal, '<=') = 1) THEN  /*check that the first character isn't a less than or equal*/
      SET var_operator = ' &lt;&eq; ';
    ELSE 
      IF (INSTR(colVal, '%') > 0) THEN  /*check that we don't need a LIKE operator*/
        SET var_operator = ' LIKE ';
      ELSE
        SET var_operator = ' = ';
      END IF;
    END IF;
    
    
    /*split the string for AND/OR by using &&/|| as the delimiter*/
    IF (
      INSTR(colVal, '&&') > 0 OR INSTR(colVal, '&') > 0 OR 
      INSTR(colVal, '||') > 0 OR INSTR(colVal, '|') > 0 OR 
      INSTR(colVal, '&!') > 0
    ) THEN
      /*start split the string and loop through the results for AND*/
      SET colVal = REPLACE(
        colVal, 
        '&&', 
        CONCAT( ''' AND ', colName, ' ', var_operator, ' ''')
      );
      SET colVal = REPLACE(
        colVal, 
        '&', 
        CONCAT( ''' AND ', colName, ' ', var_operator, ' ''')
      );
      /*end split the string and loop through the results for OR*/
      
      /*start split the string and loop through the results for AND*/
      SET colVal = REPLACE(
        colVal, 
        '&!', 
        CONCAT( ''' AND NOT ', colName, ' ', var_operator, ' ''')
      );
      /*end split the string and loop through the results for OR*/
      
      /*start split the string and loop through the results for OR*/
      SET colVal = REPLACE(
        colVal, 
        '||', 
        CONCAT( ''' OR ', colName, ' ', var_operator, ' ''')
      );
      SET colVal = REPLACE(
        colVal, 
        '|', 
        CONCAT( ''' OR ', colName, ' ', var_operator, ' ''')
      );
      /*end split the string and loop through the results for OR*/
      
      SET colVal = CONCAT( ' AND (', colName, ' ', var_operator, ' ''', colVal, ''' ) ');
    ELSEIF (INSTR(colVal, '..') > 0) THEN  /*check range value for numbers*/
      SET colVal = CONCAT( ' AND ', colName, ' BETWEEN ', 
        ' ''',
        REPLACE(
          colVal, 
          '..', 
          '''  AND '''
        )
        , ''' '
      );
      
    ELSE
      SET colVal = CONCAT( ' AND ', colName, ' ', var_operator, ' ''', colVal, ''' ');
    END IF;
    
    /*replace %% with % for the like*/
    SET colVal = REPLACE(
      colVal, 
      '%%', 
      '%'
    );
    
    /*replace ! as it has been dealt with in the var_operator*/
    SET colVal = REPLACE( colVal, '!', '' );
    
    /*replace >> as it has been dealt with in the var_operator*/
    SET colVal = REPLACE( colVal, '>>', '' );
    SET colVal = REPLACE( colVal, '>', '' );
    SET colVal = REPLACE( colVal, '&gt;', '>' );
    
    /*replace >= as it has been dealt with in the var_operator*/
    SET colVal = REPLACE( colVal, '>=', '' );
    SET colVal = REPLACE( colVal, '&gt;&eq;', '>=' );
    
    /*replace << as it has been dealt with in the var_operator*/
    SET colVal = REPLACE( colVal, '<<', '' );
    SET colVal = REPLACE( colVal, '<', '' );
    SET colVal = REPLACE( colVal, '&lt;', '<' );
    
    /*replace <= as it has been dealt with in the var_operator*/
    SET colVal = REPLACE( colVal, '<=', '' );
    SET colVal = REPLACE( colVal, '&lt;&eq;', '<=' );
    
	RETURN colVal;
END

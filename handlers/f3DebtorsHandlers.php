<?
    use Twilio\Rest\Client;
    use Twilio\Exceptions;  
    
    class f3DebtorsHandlers {
        function debtorsList($f3) {
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $f3->set('title', 'Users');
                $f3->set('debtorList', Debtor::getDebtorList( $f3->get('COOKIE.companyUID'), $f3->get('COOKIE.userUID') ) );
                
                echo Template::instance()->render('/includes/header.php');
                echo Template::instance()->render('/templates/debtors/list.php');
                echo Template::instance()->render('/includes/footer.php');
            } else {
                $f3->reroute( User::userNoAccessRedirect );
            }
        }
        
        function assigndebtors($f3) {
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $f3->set('title', 'Users');
                $f3->set('debtorList', Debtor::getDebtorList( $f3->get('COOKIE.companyUID'), $f3->get('COOKIE.userUID') ) );
                
                echo Template::instance()->render('/includes/header.php');
                echo Template::instance()->render('/templates/debtors/assigndebtors.php');
                echo Template::instance()->render('/includes/footer.php');
            } else {
                $f3->reroute( User::userNoAccessRedirect );
            }
        }

        function duplicatedebtors($f3) {
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $f3->set('title', 'Users');
                $f3->set('debtorList', Debtor::getDebtorList( $f3->get('COOKIE.companyUID'), $f3->get('COOKIE.userUID') ) );
                
                echo Template::instance()->render('/includes/header.php');
                echo Template::instance()->render('/templates/debtors/duplicatedebtors.php');
                echo Template::instance()->render('/includes/footer.php');
            } else {
                $f3->reroute( User::userNoAccessRedirect );
            }
        }

        function newCaseFile($f3) {
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $f3->set('title', 'New Case File'); 
                $f3->set('userList', Company::getUserListForCompany( $f3->get('COOKIE.companyUID') ));
                
                $debtorCaseFile = Debtor::getDebtorCaseFile( $f3->get('COOKIE.companyUID'), $f3->get('COOKIE.userUID'), -1 );
                $f3->set('debtorCaseFile', $debtorCaseFile );
                $f3->set('debtorTitles', Debtor::getDebtorTitleTypes( ) );
                $f3->set('formSubmitURL', '/ajax/debtor/caseFile/add');
                $f3->set('DBID', '-1');
                $f3->set('DBCCExpMonth', '');
                $f3->set('DBCCExpYear', '');
                
                $f3->set('searchType', $f3->get('PARAMS.type') );
                
                echo Template::instance()->render('/includes/header.php');
                echo Template::instance()->render('/templates/debtors/caseFile.php');
                echo Template::instance()->render('/includes/footer.php');
            } else {
                $f3->reroute( User::userNoAccessRedirect );
            }
        }

        function searchCaseFile($f3) {
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $f3->set('title', 'Search Case File'); 
                $f3->set('userList', Company::getUserListForCompany( $f3->get('COOKIE.companyUID') ));
                
                $debtorCaseFile = Debtor::getDebtorCaseFile( $f3->get('COOKIE.companyUID'), $f3->get('COOKIE.userUID'), -1 );
                $f3->set('debtorCaseFile', $debtorCaseFile );
                $f3->set('debtorTitles', Debtor::getDebtorTitleTypes( ) );
                $f3->set('formSubmitURL', '/ajax/debtor/caseFile/add');
                $f3->set('DBID', '-1');
                $f3->set('DBCCExpMonth', '01');
                $f3->set('DBCCExpYear', '1901');
                
                echo Template::instance()->render('/includes/header.php');
                echo Template::instance()->render('/templates/debtors/searchFile.php');
                echo Template::instance()->render('/includes/footer.php');
            } else {
                $f3->reroute( User::userNoAccessRedirect );
            }
        }        
        function editCaseFile($f3) {
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $f3->set('title', 'New Case File');
                
                $f3->set('userList', Company::getUserListForCompany( $f3->get('COOKIE.companyUID') ));
                
                $dbid = Debtor::getDebtorCaseFileDBIDFromCasefileUID( $f3->get('PARAMS.casefileUID') );
                $debtorCaseFile = Debtor::getDebtorCaseFile( $f3->get('COOKIE.companyUID'), $f3->get('COOKIE.userUID'), $dbid );
                
                $f3->set('debtorCaseFile', $debtorCaseFile );
                $f3->set('debtorTitles', Debtor::getDebtorTitleTypes( ) );
                $f3->set('formSubmitURL', '/ajax/debtor/caseFile/edit');
                $f3->set('DBID', '-1');
                $f3->set('DBCCExpMonth', '01');
                $f3->set('DBCCExpYear', '1901');
                
                echo Template::instance()->render('/includes/header.php');
                echo Template::instance()->render('/templates/debtors/caseFile.php');
                echo Template::instance()->render('/includes/footer.php');
            } else {
                $f3->reroute( User::userNoAccessRedirect );
            }
        }


        /**
         * 
         * 
         * Involved with Everything Passed Here
         * 
         * 
         */
        function getDebtorEmail($f3){
            if( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ){
                $f3->set('title', 'New Case File');
                
                $f3->set('userList', Company::getUserListForCompany( $f3->get('COOKIE.companyUID') ));   
                
                //Need to set the values in the Email Modal....
                $dbid = Debtor::getDebtorCaseFileDBIDFromCasefileUID( $f3->get('PARAMS.casefileUID') );

                $debtorEmailList = Debtor::getDebtorEmail($dbid);
                print_r($debtorEmailList);
                echo Template::instance()->render('/includes/header.php');
                echo Template::instance()->render('/templates/debtors/caseFile.php');
                echo Template::instance()->render('/includes/footer.php');
            } else {
                $f3->reroute( User::userNoAccessRedirect );
            }
        }

        function writeDoc($f3){
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $f3->set('title', 'PHP Doc'); 
                $f3->set('userList', Company::getUserListForCompany( $f3->get('COOKIE.companyUID') ));
                    
                echo Template::instance()->render('/includes/header.php');
                echo Template::instance()->render('/templates/debtors/includes/testDoc.php'); 
                echo Template::instance()->render('/includes/footer.php');
            }
        }
        
    }
?>
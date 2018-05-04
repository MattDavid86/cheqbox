<?
    class f3KingSesameHandlers {
        function basicCheck($f3) {
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                echo "basic check";
            } else {
                $f3->reroute( User::userNoAccessRedirect );
            }
        }
        
        function adminCheck($f3) {
            if ( User::validateUserIsAdmin( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                echo "admin check";
            } else {
                $f3->reroute( User::userNoAccessRedirect );
            }
        }
        
        function companyUserlistSales($f3) {
            if ( User::validateUserIsAdmin( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $f3->set('title', 'Sales');
                
                echo Template::instance()->render('/includes/header.php');
                echo Template::instance()->render('/templates/company/companyUserlistSales.php');
                echo Template::instance()->render('/includes/footer.php');
            } else {
                $f3->reroute( User::userNoAccessRedirect );
            }
        }
        
        function companyUserlistStaff($f3) {
            if ( User::validateUserIsAdmin( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $f3->set('title', 'Staff');
                
                echo Template::instance()->render('/includes/header.php');
                echo Template::instance()->render('/templates/company/companyUserlistStaff.php');
                echo Template::instance()->render('/includes/footer.php');
            } else {
                $f3->reroute( User::userNoAccessRedirect );
            }
        }
        
        function companyUserlist($f3) {
            if ( User::validateUserIsAdmin( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $f3->set('title', 'Users');
                $f3->set('userList', Company::getUserListForCompany( $f3->get('COOKIE.companyUID') ));
                
                echo Template::instance()->render('/includes/header.php');
                echo Template::instance()->render('/templates/company/userList.php');
                echo Template::instance()->render('/includes/footer.php');
            } else {
                $f3->reroute( User::userNoAccessRedirect );
            }
        }
        
        function userInfo($f3) {
            if ( User::validateUserIsAdmin( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $f3->set('title', 'User Info');
                $f3->set('headerDesc', 'User Info');
                $f3->set('formSubmitURL', '/ajax/edituser');
                $f3->set('submitBtn', 'Update');
                $f3->set('showPasswordFields', false);
                $f3->set('func', 'editUser');
                
                $userinfo = User::getUserInfo($f3->get('COOKIE.userUID'));
                $f3->set('userinfo', $userinfo);
                
                $f3->set('userRolesList', User::listUserLevels());
                
                echo Template::instance()->render('/includes/header.php');
                echo Template::instance()->render('/templates/userInfo.php');
                echo Template::instance()->render('/includes/footer.php');
            } else {
                $f3->reroute( User::userNoAccessRedirect );
            }
        }
        
        function userStatus($f3) {
            if ( User::validateUserIsAdmin( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $f3->set('title', 'User Status');
                
                $userinfo = Company::getUserCompanyStatus($f3->get('PARAMS.userUID'), $f3->get('COOKIE.companyUID'));
                $f3->set('userinfo', $userinfo);
                
                $f3->set('userRolesList', User::listUserLevels());
                
                echo Template::instance()->render('/includes/header.php');
                echo Template::instance()->render('/templates/company/userCompanyStatus.php');
                echo Template::instance()->render('/includes/footer.php');
            } else {
                $f3->reroute( User::userNoAccessRedirect );
            }
        }

        /**
         * 
         * Downloads the mergeData incase the original file couldn't be copied over
         * or the User wanted a copy themselves
         */
        function mailMerge($f3){ 
            $file = dirname(__DIR__).'/datasource/mergeData.xlsx';
            if(file_exists($file)){
                header('Content_Description: File Transfer');
                header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 
                header('Content-Disposition: attachment; filename="'.basename($file).'"');
                header('Cache-Control: max-age=0');
                header('Content-Length: ' .filesize($file));
                readfile($file);
            } else {
                echo 'File does not exist';
            }
            
        }
        
    }
?>
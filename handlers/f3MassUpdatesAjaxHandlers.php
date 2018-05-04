<?
    class f3MassUpdatesAjaxHandlers {
        
        function fixNameUpperLowerCase($f3){
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                               
                $debtor = Debtor::createFromPost();
                
                $results = MassUpdate::fixNameUpperLowerCase($debtor);
                $message = ($results[0] != "00000") ? "An error occurred" : "";
                
                $message = json_encode( $message );
                $results = json_encode( $results );
                
                header('Content-type: application/json');
                echo "{ \"message\": $message, \"results\": $results }";
            } else {
                $f3->error(404);
            }
        }

    }
?>

<?
    session_start();
    use Twilio\Rest\Client;
    use Twilio\Exceptions;  

    class f3AjaxHandlers {
        public static $debtor = "";
        public static $fullResults="";
        public static $fullRecordCount=""; 

        function edituser($f3) {
            if ($f3->get('userLevel') == 3) {
            	$userlevel = $f3->get('POST.userLevel');
				$inactive = $f3->get('POST.inactive');
            } else {
            	$userinfo = User::getUserInfo($f3->get('POST.userUID'));
            	$userlevel = $userinfo["userLevel"];
				$inactive = $userinfo["inactive"];
            }
			
            $user = new User(
				$f3->get('POST.userUID'), 
				$f3->get('POST.fname'), 
				$f3->get('POST.lname'), 
				$f3->get('POST.email'), 
				"", 
				$userlevel, 
				$f3->get('POST.phone'), 
				$f3->get('POST.address'), 
				$f3->get('POST.city'), 
				$f3->get('POST.province'), 
				$f3->get('POST.country'), 
				$f3->get('POST.postalCode'), 
				$inactive
			);
			
			$success = json_encode(User::editUser($user)); 
			header('Content-type: application/json');
			echo "{ \"success\": $success }";
        }
		
		function addUser($f3) {
            if ($f3->get('userLevel') == 3) {
            	$userUID = getGUID();
            	$password = md5($f3->get('POST.password') . HyparecMySQL::pwSalt);
				
            	$user = new User();
				$user->userUID = $userUID; 
				$user->fname = $f3->get('POST.fname'); 
				$user->lname = $f3->get('POST.lname'); 
				$user->email = $f3->get('POST.email'); 
				$user->password = $password;
				$user->userLevel = $f3->get('POST.userLevel'); 
				$user->phone = $f3->get('POST.phone');
				$user->address = $f3->get('POST.address');
				$user->city = $f3->get('POST.city');
				$user->province = $f3->get('POST.province'); 
				$user->country = $f3->get('POST.country');
				$user->postalCode = $f3->get('POST.postalCode'); 
				$user->inactive = 0;
				
				$result = User::addUser($user);
				
				$companyUID = $f3->get('COOKIE.companyUID');
                if ( $result[0] == "00000" && $companyUID != "" ) {
                    $company = User::addUserToCompany($user->userUID, $companyUID, $user->inactive, $user->userLevel);
                }
                
                $success = json_encode($result);
                
                if ($result["emailCount"] == 0) {
                    $messageBody = "Hi there " . $f3->get('POST.fname') . ", you have been added to " . Hyparec::baseURL . ".  Your login credentials are as follows:<br/>" . 
                        "Email: " . $f3->get('POST.email') . "<br/>" . 
                        "Password: " . $f3->get('POST.password') . "<br/>" . 
                        "You can <a href=\"" . Hyparec::baseURL . "\login\">login here</a>";
                    
                    $messageBody = Email::addEmailHeaderAndFooter($messageBody);
                    
                    Hyparec::sendMail( $user->email, "Hyparec User Info", $messageBody, Hyparec::contactEmail );
                }
                
                header('Content-type: application/json');
                echo "{ \"success\": $success }";
            } else {
            	$f3->error(404);
            }
        }

		function userInactiveStatus($f3) {
            if ($f3->get('userLevel') == 3) {
            	$user = new User();
				$user->userUID = $f3->get('POST.userUID');
				$user->inactive = $f3->get('POST.inactive'); 
				
				$success = json_encode(User::setUserInactiveStatus($user));
	            
				header('Content-type: application/json');
				echo "{ \"success\": $success }";
            } else {
            	$f3->error(404);
            }
        }
		
		function changePassword($f3) {
            if ($f3->get('userUID') == "") {
            	$f3->error(404);
            } else {
            	$user = new User();
				$user->userUID = $f3->get('POST.userUID');
				$user->password = md5($f3->get('POST.password') . HyparecMySQL::pwSalt); 
				
				$success = json_encode(User::changePassword($user));
	            
				header('Content-type: application/json');
				echo "{ \"success\": $success }";
            }
        }
		
		function deleteUser($f3) {
            if ($f3->get('userUID') == "" && $f3->get('userLevel') != 3) {
            	$f3->error(404);
            } else {
            	$success = json_encode(User::deleteUser($f3->get('POST.userUID')));
	            
				header('Content-type: application/json');
				echo "{ \"success\": $success }";
            }
        }
		
		function forgotPassword($f3) {
			$email = $f3->get("POST.email");
	        
	        $dbConn = new HyparecMySQL();
	        $conn = $dbConn->getPDOConn();
	        
	        $sql = $conn->prepare("call getUserInfoFromEmail ( :email )");
	        $sql->bindParam(":email", $email);
	        $sql->execute();
	        
	        $jsonResponse = "{\"success\" : true}";
	        
	        if ($resultSet = $sql->fetch(PDO::FETCH_ASSOC)) {
				$time = time();
	            $userUID = str_replace( "}", "", str_replace( "{", "", $resultSet["userUID"] ) );
	            $fname = $resultSet["fname"];
	            $name = $resultSet["fname"] . " " . $resultSet["lname"];
	            $md5Email = md5($email .HyparecMySQL::pwSalt);
				//$md5Time = md5($time .HyparecMySQL::pwSalt);
	            
	            if ($userUID != "") {
	                $messageBody = "Hi there $fname Someone has requested a change to your password.  <br/>If you did this, then click the link below.  <br/>If you did not request this, you can ignore this email. <br/><a href=\"" . Hyparec::baseURL . "/resetPassword/$userUID/$md5Email/$time\">Change Password</a>";
					$messageBody = Email::addEmailHeaderAndFooter($messageBody);
	                $subject    = "Email Reset";
	                
	                Hyparec::sendMail( $email, $subject, $messageBody, Hyparec::contactEmail );
	            }
				
	        }
	        
			header('Content-type: application/json');
	        echo $jsonResponse;
	        //echo $messageBody;
		}
        
        function addCompany($f3) {
            $companyUID = getGUID();
            $company = Company::createFromPost($companyUID);
            
            $message = "";
            $uploadFile = "";
            
            if (isset($_FILES["uploadFile"])) {
                if ($_FILES["uploadFile"]["name"] != "") {
                    $fileExt = explode(".", $_FILES["uploadFile"]["name"]);
                    $fileExt = strtolower(end($fileExt));
                    
                    $uploadDir = "images/uploads/";
                    $filename = getGUID() . "." . $fileExt;
                    $uploadFile = $uploadDir . $filename;
                    
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, TRUE);
                    }
                    
                    if ($fileExt == 'jpg' || $fileExt == 'jpeg' || $fileExt == 'png' || $fileExt == 'gif') {
                        if ($_FILES['uploadFile']["size"] > 3000000) {
                            $message = "Image File Too Large";
                        } elseif (move_uploaded_file($_FILES['uploadFile']['tmp_name'], $uploadFile)) {
                            $message = "";
                        } else {
                            $message = "Error uploading file";
                        }
                    } else {
                        $message = "Disallowed File Type";
                    }
                }
            }
            
            if ($uploadFile != "") {
                $company->companyLogo = "/".$uploadFile;
            } else {
                $company->companyLogo = "/images/noImage.png";
            }
            
            $result = Company::addCompany($company);
            $success = json_encode($result);
            
            $messageBody = "Thanks for your request to join our network of companies.  One of our associates will be in contact with you shortly to confirm your details." .
                "You can view the details <a href=\"" . Hyparec::baseURL . "/admin/company/details/" . $company->companyUID . "\">here</a>";
            
            $messageBody = Email::addEmailHeaderAndFooter($messageBody);
            //echo $messageBody;
            
            Hyparec::sendMail( $company->email, "Company Info", $messageBody, Hyparec::contactEmail );
            Hyparec::sendMail( Hyparec::contactEmail, "Company Info", $messageBody, Hyparec::contactEmail );
            
            header('Content-type: application/json');
            echo "{ \"success\": $success }";
        }
        
        function editCompany($f3) {
            $companyUID = $f3->get('POST.companyUID');
            $company = Company::createFromPost($companyUID);
            
            $existingCompanyDetails = Company::getCompanyDetails($companyUID);
            
            $message = "";
            $uploadFile = "";
            
            if (isset($_FILES["uploadFile"])) {
                if ($_FILES["uploadFile"]["name"] != "") {
                    $fileExt = explode(".", $_FILES["uploadFile"]["name"]);
                    $fileExt = strtolower(end($fileExt));
                    
                    $uploadDir = "images/uploads/";
                    $filename = getGUID() . "." . $fileExt;
                    $uploadFile = $uploadDir . $filename;
                    
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, TRUE);
                    }
                    
                    if ($fileExt == 'jpg' || $fileExt == 'jpeg' || $fileExt == 'png' || $fileExt == 'gif') {
                        if ($_FILES['uploadFile']["size"] > 3000000) {
                            $message = "Image File Too Large";
                        } elseif (move_uploaded_file($_FILES['uploadFile']['tmp_name'], $uploadFile)) {
                            $message = "";
                        } else {
                            $message = "Error uploading file";
                        }
                    } else {
                        $message = "Disallowed File Type";
                    }
                }
            }
            
            if ($uploadFile != "") {
                $company->companyLogo = "/".$uploadFile;
            } else {
                $company->companyLogo = ($existingCompanyDetails["companyLogo"] != "") ? $existingCompanyDetails["companyLogo"] : "/images/noImage.png";
            }
            
            $result = Company::editCompany($company);
            $success = json_encode($result);
            
            header('Content-type: application/json');
            echo "{ \"success\": $success, \"message\": \"$message\", \"logo\": \"$company->companyLogo\" }";
        }
        
        function deleteCompany($f3) {
            if ($f3->get('userLevel') == 3) {
                
                $success = json_encode( Company::deleteCompany( $f3->get('POST.companyUID') ) );
                
                header('Content-type: application/json');
                echo "{ \"success\": $success }";
            } else {
                $f3->error(404);
            }
        }
        
        function companyInactiveStatus($f3) {
            if ($f3->get('userLevel') == 3) {
                
                $success = json_encode( Company::companyInactiveStatus( $f3->get('POST.companyUID'), $f3->get('POST.inactive') ) );
                
                header('Content-type: application/json');
                echo "{ \"success\": $success }";
            } else {
                $f3->error(404);
            }
        }
        
        function setConnectedUser($f3) {
            if ($f3->get('userLevel') == 3) {
                $success = json_encode(Company::setConnectedUser( $f3->get('POST.companyUID'), $f3->get('POST.userUID') ));
                
                if ($success[0] == "00000") {
                    $companyInfo = Company::getCompanyDetails( $f3->get('POST.companyUID') );
                    $messageToCompany = "You have been made the primary contact for " . $companyInfo["companyName"] . ".<br/>If you are having issues seeing the data for this new company, please log out and log back in again.  " ;
                    $messageToCompany = Email::addEmailHeaderAndFooter($messageToCompany);
                    Hyparec::sendMail( $companyInfo["email"], "Connected To Company", $messageToCompany, Hyparec::contactEmail );
                    
                    $messageToTripsi = "A new company connection has been made for " . $companyInfo["companyName"] . "<br/> " . $companyInfo["contactFName"] . " " . $companyInfo["contactLName"] . " (" . $companyInfo["email"] . ") has been added as the primary contact for this company";
                    $messageToTripsi = Email::addEmailHeaderAndFooter($messageToTripsi);
                    Hyparec::sendMail( Hyparec::contactEmail, "Connected To Company", $messageToTripsi, Hyparec::contactEmail );
                }
                
                header('Content-type: application/json');
                echo "{ \"success\": $success }";
            } else {
                $f3->error(404);
            }
        }
        
        function companyUsersInactive($f3) {
            if ($f3->get('userLevel') == 2 || $f3->get('userLevel') == 3) {
                
                $success = json_encode( Company::companyUsersInactive( $f3->get('POST.userUID'), $f3->get('COOKIE.companyUID'), $f3->get('POST.inactive') ) );
                
                header('Content-type: application/json');
                echo "{ \"success\": $success }";
            } else {
                $f3->error(404);
            }
        }
        
        function companyUsersDelete($f3) {
            if ($f3->get('userLevel') == 2 || $f3->get('userLevel') == 3) {
                
                $success = json_encode( Company::companyUsersDelete( $f3->get('POST.userUID'), $f3->get('COOKIE.companyUID') ) );
                
                header('Content-type: application/json');
                echo "{ \"success\": $success }";
            } else {
                $f3->error(404);
            }
        }
        
        function companyUserStatus($f3) {
            if ($f3->get('userLevel') == 2 || $f3->get('userLevel') == 3) {
                
                $userUID = $f3->get('POST.userUID');
                $companyUID = $f3->get('COOKIE.companyUID');
                $userLevel = $f3->get('POST.userLevel');
                $inactive = $f3->get('POST.inactive');
                
                $success = json_encode( Company::setCompanyUserStatus( $userUID, $companyUID, $userLevel, $inactive ) );
                
                header('Content-type: application/json');
                echo "{ \"success\": $success }";
            } else {
                $f3->error(404);
            }
        }
        
/**
 * 
 * Everything After This I was Involved in
 * 
 * 
 */
        function searchForRecords($f3) {
            if ($f3->get('userUID') == "") {
                $f3->error(404);
            } else { 
                $debtor =""; 
                // $f3AjaxHandlers = new f3AjaxHandlers();  
                if($f3->get('POST.debtor')){
                    $debtor = json_decode($f3->get('POST.debtor'));
                    $_SESSION["debtor"] = $debtor;
                }else{
                    $debtor = Debtor::createFromPost();
                    $_SESSION["debtor"] = $debtor;
                }
                $offset =0;
                if($f3->get('POST.offset')){
                    $offset = $f3->get('POST.offset');
                }               
                
                $recordCount = Search::debtorCafeFilefullSearchCount($debtor);
                $_SESSION["recordCount"] = $recordCount;

                $searchResults  = Search::debtorCafeFilefullSearch($debtor, $offset );
                
                //Set the Global Variable fullResults to searchResults so we can reference it later
                $_SESSION["searchResults"] = $searchResults;              
                
                $searchResults = json_encode( $searchResults); 
                
                // $debtor = json_encode(f3AjaxHandlers::$debtor); 
                header('Content-type: application/json'); 
                echo "{ \"recordCount\": $recordCount, \"offset\": $offset, \"searchResults\": $searchResults}";  
            }
        }
        function searchForRecordOnlyCaseFileUIDs($f3) {
            if ($f3->get('userUID') == "") {
                $f3->error(404);
            } else { 
                $debtor = Debtor::createFromPost();
                $offset = $f3->get('POST.offset');
                
                $searchResults = Search::debtorCafeFilefullSearch( $debtor, $offset );
                $searchResults = json_encode( $searchResults ); 
                header('Content-type: application/json'); 
                echo "{ \"offset\": $offset, \"searchResults\": $searchResults}";
 
            }
        }
        

        function getDebtorCaseFile($f3) {
            if ($f3->get('userUID') == "") {
                $f3->error(404);
            } else {
                $companyUID = $f3->get('COOKIE.companyUID');
                $userUID = $f3->get('COOKIE.userUID');
                //$DBID = $f3->get('POST.DBID');
                $casefileUID = $f3->get('POST.casefileUID');
                $offset = $f3->get('POST.offset');
                
                if(!isset($offset)){
                    $offset =0;
                }            

                //$casefile = Debtor::getDebtorCaseFile( $companyUID, $userUID, $DBID, $offset );
                $casefile = Debtor::getDebtorCaseFileFromCasefileUID( $casefileUID, $companyUID, $userUID );
                $casefile = json_encode( $casefile );
                
                header('Content-type: application/json');
                echo "{ \"casefile\": $casefile }";
            }
        }
        
        function debtorCaseFileAdd($f3) {
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $debtor = Debtor::createFromPost( );
                $debtor->casefileUID = getGUID();
                $debtor->companyUID = $f3->get('COOKIE.companyUID');
                $debtor->addedBy = $f3->get('COOKIE.userUID');
                
                $success = json_encode( Debtor::addDebtorCaseFile( $debtor ) );
                // $success = json_encode( Search::searchWithFullDetails( $debtor->companyUID, $debtor->addedBy, $debtor, $offset = 0, $limit = 1000 ));
                
                header('Content-type: application/json');
                echo "{ \"success\": $success }";
            } else {
                $f3->error(404);
            }
        }
        
        function debtorCaseFileEdit($f3) {
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $debtor = Debtor::createFromPost( );
                $debtor->companyUID = $f3->get('COOKIE.companyUID');
                $debtor->addedBy = $f3->get('COOKIE.userUID');
                
                $success = json_encode( Debtor::editDebtorCaseFile( $debtor ) );
                
                header('Content-type: application/json');
                echo "{ \"success\": $success }";
            } else {
                $f3->error(404);
            }
        }
        
        function addUserToCompanyByEmail($f3) {
            if ($f3->get('userLevel') == 2 || $f3->get('userLevel') == 3) {
                
                $email = $f3->get('POST.email');
                $companyUID = $f3->get('COOKIE.companyUID');
                $userLevel = $f3->get('POST.userLevel');
                
                $success = json_encode( User::addUserToCompanyByEmail($email, $companyUID, $userLevel) );
                
                header('Content-type: application/json');
                echo $success;
            } else {
                $f3->error(404);
            }
        }
        
        function debtorCaseFileAddNotes($f3) {
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $casefileUID = $f3->get('POST.casefileUID');
                $notes = $f3->get('POST.notes');
                $companyUID = $f3->get('COOKIE.companyUID');
                $addedBy = $f3->get('COOKIE.userUID');
                $message = "";
				$casefileNotes = "";
                

                if ($casefileUID == "") {
                    $message = "No debtor case file selected";
                } else {
                    $success = Debtor::addDebtorCaseFileNotes( $casefileUID, $notes, $companyUID, $addedBy ) ;
                    
                    if ($success[0] != "00000") {
                        $message = "An error occurred saving the note.";
                    } else {
                    	$casefileNotes = Debtor::getDebtorCaseFileNotes( $casefileUID );
                    }
                }
                
                $message = json_encode($message);
				$casefileNotes = json_encode($casefileNotes);
                
                header('Content-type: application/json');
                echo "{ \"message\": $message, \"notes\": $casefileNotes }"; 
            } else {
                $f3->error(404);
            }
        }//end debtorCaseFileAddNotes

        /*Grab Emails attached to Account*/
        function debtorEmailList($f3){
            if ($f3->get('userUID') == "") {
                $f3->error(404);
                header('Content-type: application/json');
                echo "{\"success\": \"nope, sorry you are not logged in.  Matt...We should change these 404 messages.\"}";
            } else {
                $companyUID = $f3->get('COOKIE.companyUID');
                $userUID = $f3->get('COOKIE.userUID');
                $DBID = $f3->get('POST.DBID');
                $emailList = json_encode(Debtor::getDebtorEmailList($DBID));
                $userEmail = json_encode(User::getUserInfo($userUID));
                // $userEmail = ($userUID); 
                header('Content-type: application/json');
                echo "{\"emailList\": $emailList, \"userEmail\": $userEmail}";
            }
        }

        function debtorMassEmailList($f3){
            if ($f3->get('userUID') == "") {
                $f3->error(404);
                header('Content-type: application/json');
                echo "{\"success\": \"nope, sorry you are not logged in.  Liam...We should change these 404 messages.\"}";
            } else {
                $companyUID = $f3->get('COOKIE.companyUID');
                $userUID = $f3->get('COOKIE.userUID');
                $dbidList = $f3->get('POST.dbidList');
                $emailList = array();
                $DBID="";
                $testList =array();
                for($x=0; $x < count($dbidList); $x++){ 
                    $DBID= $dbidList[$x]['DBID'];
                    array_push($emailList,(Debtor::getDebtorEmailList($DBID)));
                }

                $dbidList= json_encode($dbidList[1]['DBID']); 
                $emailList = json_encode($emailList);
                header('Content-type: application/json');
                echo "{\"emailList\": $emailList}";
            }
        }

        //Email all accounts attached to CaseID
        //Change to accept array of recipients, caseID, and Message
        function debtorSendEmail($f3){
            if ($f3->get('userUID') == "") {
                $f3->error(404);
                header('Content-type: application/json');
                echo "{\"success\": \"nope, sorry you are not logged in.  Matt...We should change these 404 messages.\"}";
            } else {
                $emailList = ($f3->get("POST.emailListResults"));
                $recipients = array(); 
                $caseID = $f3->get('POST.caseID');
                 
                for($x =0; $x < count($emailList); $x++ ){
                     array_push($recipients, $emailList[$x]);    
                } 
                
                $recipients = implode(";", $emailList);    
                
                $caseID = $f3->get('POST.caseID');
                $subject = "A new note has been posted on account: " . $caseID;
                $message = $f3->get('POST.messageTxt');
                $from ="abc@email.ca";
                for($x =0; $x < count($emailList);$x++){ 
                    try{
                        Email::addEmailHeaderAndFooter($message); 
                        Hyparec::sendMail($emailList[$x], $subject, $message, $from);
                    
                    } catch (Exception $e){
                        echo "Problem with sending email";
                    }
                    sleep(2);
                }
                
                echo "{\"recipients: \" $recipients}";
            }  
        }

        /**
         * Send SMS message to a debtor
         */
        function debtorSendSMS($f3){
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $casefileUID = $f3->get('POST.casefileUID');
                $contactNumber = $f3->get('POST.contactNumber');
                $message =$f3->get('POST.message');
                $success ="";

                Twilio::sendMessage($contactNumber, $message);
                
                $failure = "failed";
                
                header('Content-type: application/json');
                echo "{\"success\": \"$contactNumber\"}";
            } else {
                $f3->error(404);
            }  
        }

        /**
         * Find the contact number attached to a Debtor account
         */
        function debtorContactNumber($f3){
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $casefileUID = $f3->get('POST.casefileUID');
                $DBID = $f3->get('POST.DBID');
                $message ="";
                $success ="";
                

                if ($casefileUID == "") {
                    $success= "Failed";
                    $message = "No debtor case file selected";
                } else {                    
                    $success = json_encode(Debtor::getDebtorContactNumbers($DBID));
                    $message = "Contacts Grabbed";
                }
                $message = json_encode($message);
                header('Content-type: application/json');
                echo "{\"success\": $success}";
            } else {
                $f3->error(404);
            }  
        }

        /**
         * Finds ALL contact numbers (insurees, spouses, claimers )
         */
        function debtorMassContactNumber($f3){
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $casefileUID = $f3->get('POST.casefileUID');
                $DBName = $f3->get('POST.DBName');

                $success ="";
                $message ="";
                if ($casefileUID == "") {
                    $success= "Failed";
                    $message = "No debtor case file selected";
                } else {                    
                    $success = json_encode(Debtor::getDebtorMassContactNumbers($DBName));
                    $message = "Contacts Grabbed";
                }

                header('Content-type: application/json');
                echo "{\"success\": $success}";
            } else {
                $f3->error(404);
            }  
        }

        /**
         * Grabs all the Contact Numbers for a Debtor account
         * to be Displayed in a Modal to confirm SMS message recipients
         */
        function debtorMassSMS($f3){
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $casefileUID = $f3->get('POST.casefileUID');
                $dbidList = $f3->get('POST.dbidList');
                $phoneList = array();  
                for($x=0; $x < count($dbidList); $x++){ 
                    $DBID= $dbidList[$x]['DBID'];
                    array_push($phoneList,(Debtor::getDebtorContactNumbers($DBID)));
                }
    
                $dbidList= json_encode($dbidList[1]['DBID']); 
                $phoneList = json_encode($phoneList);
                header('Content-type: application/json');
                echo "{\"phoneList\": $phoneList}";
            } else {
                $f3->error(404);
            }  
        }
        
        /**
         * Wasn't involved with this
         */
        function addMassDebtorCommunication($f3) {
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $communication = DebtorCommunication::createFromPost();
                
                $results = DebtorCommunication::addMassDebtorCommunication( $communication );
                if ($results[0] != "00000") {
                    $message = "An error occurred saving the mass communications details.";
                    $success = "false";
                } else {
                    $message = "Mass communications details saved.";
                    $success = "true";
                }
                
                $message = json_encode($message);
                $success = json_encode($success);
                
                header('Content-type: application/json');
                echo "{ \"success\": $success, \"message\": $message }"; 
            } else {
                $f3->error(404);
            }
        }

        function callTwilio($f3){
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $f3->set('title', 'Twilio SMS'); 
                $f3->set('userList', Company::getUserListForCompany( $f3->get('COOKIE.companyUID') ));

                $recipients = $f3->get('POST.recipients');
                $message = $f3->get('POST.message');
                // $numbers = $f3->get('POST.numbers');
                Twilio::sendMessage($recipients, $message);
                header('Content-type: application/json');
                $recipients = json_decode($recipients); 
                echo "{ \"recipients\": \"$recipients\", \"message\": \"$message \"}";  

            } else {
                $f3->error(404);
            }
        }

        function callMassTwilio($f3){
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $f3->set('title', 'Twilio SMS'); 
                $f3->set('userList', Company::getUserListForCompany( $f3->get('COOKIE.companyUID') ));

                $recipients = $f3->get('POST.phoneList');
                $message = $f3->get('POST.message');
                // $numbers = $f3->get('POST.numbers');
                Twilio::sendMassMessages($recipients, $message);
                $recipients = json_encode($recipients);
                header('Content-type: application/json'); 
                $count = count($recipients);
                $test ="";
                for($x=0; $x < $count; $x++){
                    $recipients= str_replace('+',"",$recipients);
                }
                echo "{ \"message\": \"$message \"}";
            } else {
                $f3->error(404);
            }
        }

        /**
         * Item that needed to be fixed
         */
        function receiveSMS($f3){
            $test = $f3->get('REQUEST.Body');
            $response = Twilio::receiveSMS();
            print $response;
            
        }
        

        /** Name:  mergeDocSource
         *  Purpose: creates an Excel spreadsheet that will be used as a data source
         *           for Word Mail Merge Function
         *           Creates  Excel Spreadsheet in /trunk/datasource folder then copies to 
         *           Word's default Document Source folder    (this is only temporary as the file path differs between computers)
         * 
         */
        function mergeDocSource($f3){
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {

                $formKeys= $f3->get('POST.keys');
                $formValues = $f3->get('POST.values');
                $companyUID = $f3->get('COOKIE.companyUID');
                $userUID = $f3->get('COOKIE.userUID');

                $message ="";
                $fileDest ="mergeData.txt";

                $keyArray = explode(",",$formKeys);
                $valueArray = explode(",",$formValues);
                
                $staffDetails = User::getStaffDetails($userUID, $companyUID);

                $formData = array();
                for($x =0; $x < count($keyArray); $x++){
                    $formData[$keyArray[$x]] = $valueArray[$x];
                } 
                //Combine Form Data and Staff Details together
                $fullDetails = array_merge_recursive($formData, $staffDetails);

                $excel = new PHPExcel();  

                //select active sheet
                $excel->setActiveSheetIndex(0);
                $A = 'A';
                
                foreach($fullDetails as $key => $value){
                    $excel->getActiveSheet()
                        ->setCellValue($A.'1',$key)
                        ->setCellValue($A.'2', $value);
                    $excel->getActiveSheet()->getColumnDimension($A)->setWidth(15);                    
                    ++$A;
                }

                $file = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');

                if(!file_exists($file->save('datasource/mergeData.xlsx'))){
                    $file->save('datasource/mergeData.xlsx');
                } 

                // f3AjaxHandlers::createWordDoc();                
                
                $type= dirname(__DIR__);
                $type = json_encode($fullDetails);
                // $message = base64_encode($message); 
                $message = json_encode($message);
                header('Content-type: application/json');
                echo "{ \"message\": $type}"; 
                
            } else {
                $f3->error(404);
            } 
        }//end mergeDoc
        

        //Creates Word Mail Merge Document Source from Array
        function createDocSource($f3){ 
            $mergeDocSource =$_SESSION["mergeDocSource"];
            $formKeys = $f3->get('POST.keys');

            $keyArray = explode(",",$formKeys);
            $success = json_encode(($keyArray[0]));

            $excel = new PHPExcel(); 
            //select active sheet
            $excel->setActiveSheetIndex(0);
            $A = 'A';
            $start = 2;

            foreach($keyArray as $key => $value){
                $excel->getActiveSheet()
                    ->setCellValue($A.'1',$value);
                $excel->getActiveSheet()->getColumnDimension($A)->setWidth(15);                    
                ++$A;
            }
 
            $array = array();
            $spreadsheet = $excel->getActiveSheet(); 
            for($x =0; $x < count($mergeDocSource); ++$x){
                foreach($mergeDocSource as $row => $columns){
                    foreach($columns as $column => $value){ 
                        $spreadsheet->fromArray($mergeDocSource, NULL, 'A2');
                    }
                }
            }    
            // $success = json_encode($keyArray); 
            $success = json_encode($mergeDocSource); 
            
            // $file = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
            $file = PHPExcel_IOFactory::createWriter($excel, 'CSV');

            // if(!file_exists($file->save('datasource/mergeData2.xlsx'))){
            //     $file->save('datasource/mergeData2.xlsx');
            // } 

            if(!file_exists($file->save('datasource/mergeData.csv'))){
                $file->save('datasource/mergeData.csv');
            } 

            header('Content-type: application/json');    
            
            echo "{ \"success\": $success}"; 
            // f3AjaxHandlers::createWordDoc();
        }

        function createWordDoc($f3){
            // $mergeDestFolder = dirname(__DIR__).'\mergeData.xlsx';
            // $mergeDestFolder = 'C:\Users\Owner\Documents\My Data Sources\mergeData.xlsx';
            $mergeDestFolder = 'C:\Users\Owner\Documents\My Data Sources\mergeData.csv';
            $document = $f3->get('POST.templateID');

            if(!file_exists($mergeDestFolder)){
                copy('datasource/mergeData.csv',$mergeDestFolder);
            } else {                    
                copy('datasource/mergeData.csv',$mergeDestFolder);
                copy('datasource/mergeData.csv','C:\Sesame2\Docs\mergeData.csv');
            }                 
            //Open Word Document
            try{
                com_load_typelib('Word.Application');
                $word = new COM("word.application");
                $doc= dirname(__DIR__).'/document templates/'.$document.'.doc';
                    
                //Causing an Error: Figure out 
               // if($word->Documents->Open($doc)){
               //     $word->Quit(); 
               //     unset($word);
               // }
                    
                $word->Documents->Open($doc) or die("Unable to Open Document");
                $word->Visible = 1;                      
                fopen($doc, 'w'); 
                $word->ActiveDocument->Close(false);                   
                    
                $message ="Worked";
                    
                } catch(Exception $e){
                    $message = $e->getMessage();
                }

                echo "{\"doc: $doc\"}";
        }
        

        /**
         * I don't believe I was involved with the following functions
         */
        function companyUsersSalesAdd($f3){
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $sales = Sales::createFromPost();
                $sales->salesUID = getGUID();
                //$sales->userUID = "";     //the associated userUID from us01.  need to see how these line up
                $sales->companyUID = $f3->get('COOKIE.companyUID');
                $sales->addedBy = $f3->get('COOKIE.userUID');
                
                $results = Sales::addSales( $sales );
                
                $success = "true";
                $message = "";
                if ( $results[0] != "00000" ) {
                    $success = "false";
                    $message = $results;
                }
                
                $message = json_encode($message);
                
                header('Content-type: application/json');
                echo "{ \"success\": $success, \"message\": $message }";  
                
            } else {
                $f3->error(404);
            }
        }
        
        function companyUsersSalesEdit($f3){
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $sales = Sales::createFromPost();
                //$sales->userUID = "";     //the associated userUID from us01.  need to see how these line up
                $sales->companyUID = $f3->get('COOKIE.companyUID');
                $sales->addedBy = $f3->get('COOKIE.userUID');
                
                $results = Sales::editSales( $sales );
                
                $success = "true";
                $message = "";
                if ( $results[0] != "00000" ) {
                    $success = "false";
                    $message = $results;
                }
                
                $message = json_encode($message);
                
                header('Content-type: application/json');
                echo "{ \"success\": $success, \"message\": $message }";  
                
            } else {
                $f3->error(404);
            }
        }
        
        function companyUsersSalesSearch($f3){
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $offset = 0;
                if($f3->get('POST.offset')){
                    $offset = $f3->get('POST.offset');
                }
                
                $sales = Sales::createFromPost();
                //$sales->userUID = "";     //the associated userUID from us01.  need to see how these line up
                $sales->companyUID = $f3->get('COOKIE.companyUID');
                
                $searchResults = Search::salesFullSearch( $sales, $f3->get('COOKIE.companyUID') );
                $recordCount = count( $searchResults );
                
                $searchResults = json_encode( $searchResults );
                 
                header('Content-type: application/json'); 
                echo "{ \"recordCount\": $recordCount, \"offset\": $offset, \"searchResults\": $searchResults}";  
                
            } else {
                $f3->error(404);
            }
        }
        
        function companyUsersSalesGetSalesInfo($f3){
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $salesUID = $f3->get('POST.salesUID');
                
                $sales = Sales::getSalesInfo( $salesUID );
                $sales = json_encode($sales);
                
                header('Content-type: application/json');
                echo "{ \"sales\": $sales }";  
                
            } else {
                $f3->error(404);
            }
        }
        
        function companyUsersStaffAdd($f3){
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $staff = Staff::createFromPost();
                $staff->staffUID = getGUID();
                //$staff->userUID = "";     //the associated userUID from us01.  need to see how these line up
                $staff->companyUID = $f3->get('COOKIE.companyUID');
                $staff->addedBy = $f3->get('COOKIE.userUID');
                
                $results = Staff::addStaff( $staff );
                
                $success = "true";
                $message = "";
                if ( $results[0] != "00000" ) {
                    $success = "false";
                    $message = $results;
                }
                
                $message = json_encode($message);
                
                header('Content-type: application/json');
                echo "{ \"success\": $success, \"message\": $message }";  
                
            } else {
                $f3->error(404);
            }
        }
        
        function companyUsersStaffEdit($f3){
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $staff = Staff::createFromPost();
                //$staff->userUID = "";     //the associated userUID from us01.  need to see how these line up
                $staff->companyUID = $f3->get('COOKIE.companyUID');
                $staff->addedBy = $f3->get('COOKIE.userUID');
                
                $results = Staff::editStaff( $staff );
                
                $success = "true";
                $message = "";
                if ( $results[0] != "00000" ) {
                    $success = "false";
                    $message = $results;
                }
                
                $message = json_encode($message);
                
                header('Content-type: application/json');
                echo "{ \"success\": $success, \"message\": $message }";  
                
            } else {
                $f3->error(404);
            }
        }
        
        function companyUsersStaffSearch($f3){
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $offset = 0;
                if($f3->get('POST.offset')){
                    $offset = $f3->get('POST.offset');
                }
                
                $staff = Staff::createFromPost();
                //$staff->userUID = "";     //the associated userUID from us01.  need to see how these line up
                $staff->companyUID = $f3->get('COOKIE.companyUID');
                
                $searchResults = Search::staffFullSearch( $staff, $f3->get('COOKIE.companyUID') );
                $recordCount = count( $searchResults );
                
                $searchResults = json_encode( $searchResults );
                 
                header('Content-type: application/json'); 
                echo "{ \"recordCount\": $recordCount, \"offset\": $offset, \"searchResults\": $searchResults}";  
                
            } else {
                $f3->error(404);
            }
        }
        
        function companyUsersStaffGetStaffInfo($f3){
            if ( User::validateUser( $f3->get('COOKIE.userUID'), $f3->get('COOKIE.companyUID') ) ) {
                $staffUID = $f3->get('POST.staffUID');
                
                $staff = Staff::getStaffInfo( $staffUID );
                $staff = json_encode($staff);
                
                header('Content-type: application/json');
                echo "{ \"staff\": $staff }";  
                
            } else {
                $f3->error(404);
            }
        }

       

        function getDataSourceAndStaffInfo($f3){
            $userUID = $f3->get('POST.userUID');
            
            // $searchRecords =$f3->get('POST.searchRecords.records');
            $searchRecords =$_SESSION["searchResults"];

            $type= gettype($searchRecords);
            $result=array(); 
            
            for($x = 0; $x < count($searchRecords); $x++){
                $casefileUID = ($searchRecords[$x]['casefileUID']);
                // array_push($results,$casefileUID);
                array_push($result, Debtor::getDataSourceAndStaffInfo($casefileUID));
            }
            $results = array();
            for($x=0; $x < count($result); $x++){
                array_push($results, $result[$x][0]);
            }

            //Store the results in a Session Variable
            $_SESSION["mergeDocSource"] = $results;
            $success = json_encode($result);
            echo "{ \"SearchRecords\": $success }"; 
        }


        /**
         * Stores an array with the current search results 
         * for use later on
         */
        function getFullResults(){        
            $offsetSearchResults;
            $offset =0;
            $fullResults = $_SESSION["searchResults"];
            $fullRecordCount = $_SESSION["recordCount"];
            $debtor = $_SESSION["debtor"];

            if($fullRecordCount > 1000){
                for($x =0; $x < $fullRecordCount; $x++){
                    if($x % 1000 ==0){
                        $offset += 1000;
                        $offsetSearchResults = Search::debtorCafeFilefullSearch( $debtor, $offset );
                        $fullResults = array_merge_recursive($fullResults, $offsetSearchResults);
                    }
                }
            }  
            $success = json_encode($fullResults);
            // return f3AjaxHandlers::$fullResults;
            echo "{ \"success\": $success }"; 
        }
		

    }//end f3AjaxHandlers class

?>
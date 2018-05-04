<?php
    // require_once '../../twilio-php-master\Twilio/autoload.php';
    use Twilio\Rest\Client;
    use Twilio\Exceptions;  
    use Twiio\Twiml;

    class Twilio {
        private static $sid = 'ACe2b9d5800f0bf65f90805b7621bd8da1';
        private static $token = 'a5ef874caee83a20f192e362f47c2eee';
        private static $twilio_number = '+12262100194';

        private static $testSid = 'AC116b112d21973c300c72381f7daecd17';
        private static $testToken = '903a948015ce8fcc50aa5e8955083b52';
        private static $test_number ='+15005550006';
        
        public static function sendMessage($contactNumber, $message){            
            $twilio = new Twilio();
            // $client = new Client(self::$testSid, self::$testToken); 
            $client = new Client(self::$sid, self::$token); 

            // $from = self::$test_number;
            $from = self::$twilio_number;

            $people = array(
                $contactNumber => "George"
            );
            foreach ($people as $number=> $name) {
                
                    $sms = $client->account->messages->create(
                
                    // the number we are sending to - Any phone number
                    $number,            
                    array(  
                    'from' => $from, 
                    'body' => $message,
                )
            );  
            }    
        }
        public static function sendMassMessages($contactNumber, $message){            
            $twilio = new Twilio();
            $client = new Client(self::$testSid, self::$testToken); 
            // $client = new Client(self::$sid, self::$token); 
            
            $from = self::$test_number;
            // $from = self::$twilio_number;

            $people = array( );

            foreach ($contactNumber as $number) {
                
                    $sms = $client->account->messages->create(
                
                    // the number we are sending to - Any phone number
                    $number,            
                    array(  
                    'from' => $from, 
                    'body' => $message,                   
                ));
                //Delay between texts as Carriers don't like when texts
                //are sent more then 1/ sec;
                sleep(1);
            }    
        }

        public static function receiveSMS(){
            $twilio = new Twilio();
            $response = new Twiml;
            // $body = $_REQUEST['Body'];
            // $status =$_REQUEST['SmsStatus'];
            $response->message("Thank you , but be warned! The robots are coming!");
            return  $response;
        }



        public static function getAccountSid(){
            return self::$sid;
        }

        public static function getAuthToken(){
            return self::$token;
        }

        public static function getTwilioNumber(){
            return self::$twilio_number;
        }

        
        public static function getTestAccountSid(){
            return self::$testSid;
        }

        public static function getTestAuthToken(){
            return self::$testToken;
        }

        public static function getTestTwilioNumber(){
            return self::$test_number;
        }
    }//end class


?>
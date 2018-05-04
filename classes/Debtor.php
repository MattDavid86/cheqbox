<?
    class Debtor {
        public $casefileUID;    //internal uid - now just used to obfuscate the DBID
        /*1st row - 1st grouping*/
        //DBData Tab
        public $DBID;       //unique ID - auto incrementing
        public $DBTitle;    //Mr/Mrs/Dr/etc
        public $DBComm;     //Commercial Flag y/n
        public $DBName;     //debtor full name
        public $DBAdd1;     //debtor address 
        public $DBAdd2;     //debtor address continued
        public $DBCity;     //debtor city
        public $DBProv;     //debtor province
        public $DBPCod;     //debtor postal code
        public $DBCnt;      //debtor contact at company/power of attorney/etc
        public $DBSAdd;     //service address - used for property management or hydro to indicate a previous address linked to the service or debt
        public $DBCountry;  //debtor country
        
        //DB2Data
        public $DB2Name;        //column is labelled DB2Name - secondary debtor/co-signer/etc.
        public $DB2Add1;    //secondary debtor/co-signer/etc. address1
        public $DB2Add2;    //secondary debtor/co-signer/etc. address2
        public $DB2City;    //secondary debtor/co-signer/etc. city
        public $DB2Prov;    //secondary debtor/co-signer/etc. city
        public $DB2PCod;    //secondary debtor/co-signer/etc. postal code
        public $DB2Tel;     //secondary debtor/co-signer/etc. telephone
        public $DB2SIN;     //secondary debtor/co-signer/etc. SIN
        public $DB2Rel;     //secondary debtor/co-signer/etc. relationship to the debtor
        public $DB2DOB;     //secondary debtor/co-signer/etc. DOB
        
        
        /*1st row - 2nd grouping*/
        //DBCItInfo
        public $DBCltNo;    //Clt# - client number - auto increments in a different table/class
        public $DBClt;      //client name - pull from other table
        public $DBInstr0;   //client instructions
        public $DBSalesRep;   //Sales rep file assigned to
        public $DBCollNum;   //Collector file assigned to
        public $DBTracNum;   //Tracer file assigned to
        public $DBLglNum;   //Legal Agent file assigned to
        public $DBComRate;  //commission rate
        public $DBRefNum;   //Client Reference Number
        public $DBListed;   //date file assigned to Kingston Data
        public $DBStatus;   //file status
        public $DBCrBu;     //date the file was reported to the credit bureau
        public $CrBuOn;     //whether the file should go to bureau reporting.  yes/no 
        
        /*2nd row - 1st grouping*/
        public $DBTel1;         //debtor telephone1
        public $DBTel2;         //debtor telephone2
        public $DBTel3;         //debtor telephone3
        public $DBEmail;        //debtor email - opens mailto:
        public $POE;            //Place of Employment
        public $PTel;           //Place of Employment Telephone
        public $DBBTC;          //Best Time To Call
        //function VICI         //Vicidial Update
        public $DBList;         //DB List Amount - starting balance
        public $DBIncurred;     //date debt incurred by debtor
        public $DBPd;           //debt paid by debtor - show total payments made by debtor from payment table
        //public $DBLPay;       //last payment date - show last payment made by debtor from payment table
        //public $DBAdj;        //DB Adjustment Amount - shot total adjustments made by debtor from payment table
        public $DBWorked;       //last time the file was updated be a user
        public $DBBal;          //balance owed by debtor - DBList - DBAdj = DBBal, except when compound interest is involved
        public $DBIntRate;      //interest rate of debt - Runs at 0 to 0.599, no value over 1 should be allowed.
        public $DBItIntDef;     //Intereste Deferred - y/n - Indicates whether interest should be calculated or not, usable by collector
        public $DBNxt;          //next scheduled call
        public $DBPriority;          //Runs 0-10, grouping by order of work, set by DBStatus
        public $DBColNot;       //Collector shorthand note section for reminders
        public $DBScore;        //Runs (null) or 0 - 1000, Internal KDC abstract score
        public $TUCScore;       //Runs (null) or 0 - 1000, TUC abstract score
        //public $DBGrpFlag;      //Number of accounts packeted or grouped, counts string in DBGrpID, lights yellow when over 1
        //public $DBBranch;       //Branch label to limit access
        
        /*2nd row - 2nd grouping*/
        //DBINF
        public $DBSIN;                  //Debtor SIN/SSN
        public $DBDOB;                  //Debtor DOB
        public $DBDLNum;                //Debtor Driver's License Number
        public $DBCCNum;                //Debtor credit card number
        public $DBAKA;                  //Debtor aliases/aka/maiden name/etc
        public $DBCCExp;                //Debtor credit card expiry date
        public $DBOrigCreditory;        //Name of original creditor
        public $DBComment1;             //comments on debtor
        public $DBComment2;             //comments of debtor continued
        
        //POE - Place of Employment
        public $DBPOEAddress;                 //Debtor POE Address
        public $DBPOECity;              //Debtor POE city
        public $DBPOEProv;                //Debtor POE province
        public $DBPOEPostalCode;                //Debtor POE postal code
        public $DBPOEContact;                  //name of contact at POE
        public $DBPOEFax;                 //Debtor POE fax
        public $DBPOEJobTitle;                 //Debtor POE job title
        public $DBPOESalary;                 //Debtor POE salary
        public $DBPOENote;                //Debtor POE notes
        
        //CLTiNF
        public $CltInfo1;               //Client info field 1
        public $CltInfo2;               //Client info field 2
        public $CltInfo3;               //Client info field 3
        public $CltInfo4;               //Client info field 4
        public $CltInfo5;               //Client info field 5
        public $CltInfo6;               //Client info field 6
        public $CltInfo7;               //Client info field 7
        
        //LTTR
        public $DBLttrLog;             //Letter Log
        
        //TRACE
        public $TraceNote;              //Trace Log
        
        //LGL - Legal
        public $LGLClaim;        //Legal Claim Number
        public $LGLPreJudgement;     //Pre-Judgment Interest
        public $LGLCourtAddress;       //Court Address
        public $LGLPostJudgement;    //Post-Judgment Interest
        public $LGLSchedA;       //Schedule A Insert
        public $LGLJudgementIntRate;     //Judgment Interest Rate - Runs at 0 to 0.599, no value over 1 should be allowed.
        public $LGLAmtClaimed;  //Legal Amount Claimed
        public $LGLJudgDate;    //Judgment Date
        public $LGLCourtCosts;  //Court Costs Awarded
        public $LGLJudgAmt;     //Judgment Amount - Calculated based on other LGL money fields
        
        //PMTS
        public $DBPadDate;      //PAD Date - 1-31, day of month to run payment
        public $DBBankNo;       //Bank Number - Institution Number for EFT
        public $DBPadAmt;       //PAD Amount - Amount of Monthly Payment
        public $DBTransitNo;    //Transit Number - Branch or ABA Number
        public $DBPadTrm;       //PAD Term - Number of months to run PAD
        public $DBAcctNo;       //Account Number - Bank Account Number
        public $DBPadLft;       //PAD LEFT - Number of months left to run PAD
        public $DBAcctName;     //Account Name - Name on Bank Account or CC
        public $DBPadAct;       //PAD Active Flag - Y/N - Flag to run PAD or not
        
        /*3rd row - single grouping*/
        //DBNote1
        //public $Note0;          //debtor notes - change to it's own table to allow sort/search/etc
        
        //DBGrpNote
        //public $DBGrpID;            //grouping ID with other files - change to it's own table/page
        
        //DBInfoLog
        public $DBViciLoad;         //Vicidial Load Date - date file updated on VICI
        
        public static function createFromPost( $variablePrepend = "" ) {
            $debtor = new Debtor();
            
            $isSearch = (isset($_POST["isSearch"])) ? $_POST["isSearch"] : "FALSE";
            $newGUID = ($isSearch == "TRUE") ? "" : getGUID();
            
            $debtor->casefileUID = isset($_POST[$variablePrepend . "casefileUID"]) ? $_POST[$variablePrepend . "casefileUID"] : $newGUID;       //unique ID - deprecated as we aren't going to have all the records on one table
            
            /*1st row - 1st grouping*/
            //DBData Tab
            $debtor->DBID = isset($_POST[$variablePrepend . "DBID"]) ? $_POST[$variablePrepend . "DBID"] : "";       //unique ID - auto incrementing
            $debtor->DBTitle = isset($_POST[$variablePrepend . "DBTitle"]) ? $_POST[$variablePrepend . "DBTitle"] : "";    //Mr/Mrs/Dr/etc
            $debtor->DBComm = isset($_POST[$variablePrepend . "DBComm"]) ? $_POST[$variablePrepend . "DBComm"] : "";     //Commercial Flag y/n
            $debtor->DBName = isset($_POST[$variablePrepend . "DBName"]) ? $_POST[$variablePrepend . "DBName"] : "";     //debtor full name
            $debtor->DBAdd1 = isset($_POST[$variablePrepend . "DBAdd1"]) ? $_POST[$variablePrepend . "DBAdd1"] : "";     //debtor address 
            $debtor->DBAdd2 = isset($_POST[$variablePrepend . "DBAdd2"]) ? $_POST[$variablePrepend . "DBAdd2"] : "";     //debtor address continued
            $debtor->DBCity = isset($_POST[$variablePrepend . "DBCity"]) ? $_POST[$variablePrepend . "DBCity"] : "";     //debtor city
            $debtor->DBProv = isset($_POST[$variablePrepend . "DBProv"]) ? $_POST[$variablePrepend . "DBProv"] : "";     //debtor province
            $debtor->DBPCod = isset($_POST[$variablePrepend . "DBPCod"]) ? $_POST[$variablePrepend . "DBPCod"] : "";     //debtor postal code
            $debtor->DBCnt = isset($_POST[$variablePrepend . "DBCnt"]) ? $_POST[$variablePrepend . "DBCnt"] : "";      //debtor contact at company/power of attorney/etc
            $debtor->DBSAdd = isset($_POST[$variablePrepend . "DBSAdd"]) ? $_POST[$variablePrepend . "DBSAdd"] : "";     //service address - used for property management or hydro to indicate a previous address linked to the service or debt
            $debtor->DBCountry = isset($_POST[$variablePrepend . "DBCountry"]) ? $_POST[$variablePrepend . "DBCountry"] : "";  //debtor country
            
            //DB2Data
            $debtor->DB2Name = isset($_POST[$variablePrepend . "DB2Name"]) ? $_POST[$variablePrepend . "DB2Name"] : "";        //column is labelled DB2Name - secondary debtor/co-signer/etc.
            $debtor->DB2Add1 = isset($_POST[$variablePrepend . "DB2Add1"]) ? $_POST[$variablePrepend . "DB2Add1"] : "";    //secondary debtor/co-signer/etc. address1
            $debtor->DB2Add2 = isset($_POST[$variablePrepend . "DB2Add2"]) ? $_POST[$variablePrepend . "DB2Add2"] : "";    //secondary debtor/co-signer/etc. address2
            $debtor->DB2City = isset($_POST[$variablePrepend . "DB2City"]) ? $_POST[$variablePrepend . "DB2City"] : "";    //secondary debtor/co-signer/etc. city
            $debtor->DB2Prov = isset($_POST[$variablePrepend . "DB2Prov"]) ? $_POST[$variablePrepend . "DB2Prov"] : "";    //secondary debtor/co-signer/etc. city
            $debtor->DB2PCod = isset($_POST[$variablePrepend . "DB2PCod"]) ? $_POST[$variablePrepend . "DB2PCod"] : "";    //secondary debtor/co-signer/etc. postal code
            $debtor->DB2Tel = isset($_POST[$variablePrepend . "DB2Tel"]) ? $_POST[$variablePrepend . "DB2Tel"] : "";     //secondary debtor/co-signer/etc. telephone
            $debtor->DB2SIN = isset($_POST[$variablePrepend . "DB2SIN"]) ? $_POST[$variablePrepend . "DB2SIN"] : "";     //secondary debtor/co-signer/etc. SIN
            $debtor->DB2Rel = isset($_POST[$variablePrepend . "DB2Rel"]) ? $_POST[$variablePrepend . "DB2Rel"] : "";     //secondary debtor/co-signer/etc. relationship to the debtor
            $debtor->DB2DOB = isset($_POST[$variablePrepend . "DB2DOB"]) ? $_POST[$variablePrepend . "DB2DOB"] : "";     //secondary debtor/co-signer/etc. DOB
            
            
            /*1st row - 2nd grouping*/
            //DBCItInfo
            $debtor->DBCltNo = isset($_POST[$variablePrepend . "DBCltNo"]) ? $_POST[$variablePrepend . "DBCltNo"] : "";    //Clt# - client number - auto increments in a different table/class
            $debtor->DBInstr0 = isset($_POST[$variablePrepend . "DBInstr0"]) ? $_POST[$variablePrepend . "DBInstr0"] : "";      //client instructions
            $debtor->DBClt = isset($_POST[$variablePrepend . "DBClt"]) ? $_POST[$variablePrepend . "DBClt"] : "";      //client name - pull from other table
            $debtor->DBSalesRep = isset($_POST[$variablePrepend . "DBSalesRep"]) ? $_POST[$variablePrepend . "DBSalesRep"] : "";   //Sales rep file assigned to
            $debtor->DBCollNum = isset($_POST[$variablePrepend . "DBCollNum"]) ? $_POST[$variablePrepend . "DBCollNum"] : "";   //Collector file assigned to
            $debtor->DBTracNum = isset($_POST[$variablePrepend . "DBTracNum"]) ? $_POST[$variablePrepend . "DBTracNum"] : "";   //Tracer file assigned to
            $debtor->DBLglNum = isset($_POST[$variablePrepend . "DBLglNum"]) ? $_POST[$variablePrepend . "DBLglNum"] : "";   //Legal Agent file assigned to
            $debtor->DBComRate = isset($_POST[$variablePrepend . "DBComRate"]) ? $_POST[$variablePrepend . "DBComRate"] : "";  //commission rate
            $debtor->DBRefNum = isset($_POST[$variablePrepend . "DBRefNum"]) ? $_POST[$variablePrepend . "DBRefNum"] : "";   //Client Reference Number
            $debtor->DBListed = isset($_POST[$variablePrepend . "DBListed"]) ? $_POST[$variablePrepend . "DBListed"] : "";   //date file assigned to Kingston Data
            $debtor->DBStatus = isset($_POST[$variablePrepend . "DBStatus"]) ? $_POST[$variablePrepend . "DBStatus"] : "";   //file status
            $debtor->DBCrBu = isset($_POST[$variablePrepend . "DBCrBu"]) ? $_POST[$variablePrepend . "DBCrBu"] : "";     //date the file was reported to the credit bureau
            $debtor->CrBuOn = isset($_POST[$variablePrepend . "CrBuOn"]) ? $_POST[$variablePrepend . "CrBuOn"] : "";     //whether the file should go to bureau reporting.  yes/no 
            
            /*2nd row - 1st grouping*/
            $debtor->DBTel1 = isset($_POST[$variablePrepend . "DBTel1"]) ? $_POST[$variablePrepend . "DBTel1"] : "";       //debtor telephone 1
            $debtor->DBTel2 = isset($_POST[$variablePrepend . "DBTel2"]) ? $_POST[$variablePrepend . "DBTel2"] : "";       //debtor telephone 2
            $debtor->DBTel3 = isset($_POST[$variablePrepend . "DBTel3"]) ? $_POST[$variablePrepend . "DBTel3"] : "";       //debtor telephone 3
            $debtor->DBEmail = isset($_POST[$variablePrepend . "DBEmail"]) ? $_POST[$variablePrepend . "DBEmail"] : "";      //debtor email - opens mailto:
            $debtor->POE = isset($_POST[$variablePrepend . "POE"]) ? $_POST[$variablePrepend . "POE"] : "";            //Place of Employment
            $debtor->PTel = isset($_POST[$variablePrepend . "PTel"]) ? $_POST[$variablePrepend . "PTel"] : "";           //Place of Employment Telephone
            $debtor->DBBTC = isset($_POST[$variablePrepend . "DBBTC"]) ? $_POST[$variablePrepend . "DBBTC"] : "";          //Best Time To Call
            //function VICI         //Vicidial Update
            $debtor->DBList = isset($_POST[$variablePrepend . "DBList"]) ? $_POST[$variablePrepend . "DBList"] : "";         //DB List Amount - starting balance
            $debtor->DBIncurred = isset($_POST[$variablePrepend . "DBIncurred"]) ? $_POST[$variablePrepend . "DBIncurred"] : "";     //date debt incurred by debtor
            $debtor->DBPd = isset($_POST[$variablePrepend . "DBPd"]) ? $_POST[$variablePrepend . "DBPd"] : "";         //debt paid by debtor - show total payments made by debtor from payment table
            //$debtor->DBLPay = isset($_POST[$variablePrepend . "DBLPay"]) ? $_POST[$variablePrepend . "DBLPay"] : "";       //last payment date - show last payment made by debtor from payment table
            //$debtor->DBAdj = isset($_POST[$variablePrepend . "DBAdj"]) ? $_POST[$variablePrepend . "DBAdj"] : "";        //DB Adjustment Amount - shot total adjustments made by debtor from payment table
            $debtor->DBWorked = isset($_POST[$variablePrepend . "DBWorked"]) ? $_POST[$variablePrepend . "DBWorked"] : "";       //last time the file was updated be a user
            $debtor->DBBal = isset($_POST[$variablePrepend . "DBBal"]) ? $_POST[$variablePrepend . "DBBal"] : "";        //balance owed by debtor - DBList - DBAdj = DBBal, except when compound interest is involved
            $debtor->DBIntRate = isset($_POST[$variablePrepend . "DBIntRate"]) ? $_POST[$variablePrepend . "DBIntRate"] : "";      //interest rate of debt - Runs at 0 to 0.599, no value over 1 should be allowed.
            $debtor->DBItIntDef = isset($_POST[$variablePrepend . "DBItIntDef"]) ? $_POST[$variablePrepend . "DBItIntDef"] : "";     //Intereste Deferred - y/n - Indicates whether interest should be calculated or not, usable by collector
            $debtor->DBNxt = isset($_POST[$variablePrepend . "DBNxt"]) ? $_POST[$variablePrepend . "DBNxt"] : "";          //next scheduled call
            $debtor->DBPriority = isset($_POST[$variablePrepend . "DBPriority"]) ? $_POST[$variablePrepend . "DBPriority"] : "";          //Runs 0-10, grouping by order of work, set by DBStatus
            $debtor->DBColNot = isset($_POST[$variablePrepend . "DBColNot"]) ? $_POST[$variablePrepend . "DBColNot"] : "";       //Collector shorthand note section for reminders
            $debtor->DBScore = isset($_POST[$variablePrepend . "DBScore"]) ? $_POST[$variablePrepend . "DBScore"] : "";        //Runs (null) or 0 - 1000, Internal KDC abstract score
            $debtor->TUCScore = isset($_POST[$variablePrepend . "TUCScore"]) ? $_POST[$variablePrepend . "TUCScore"] : "";       //Runs (null) or 0 - 1000, TUC abstract score
            //$debtor->DBGrpFlag = isset($_POST[$variablePrepend . "DBGrpFlag"]) ? $_POST[$variablePrepend . "DBGrpFlag"] : "";      //Number of accounts packeted or grouped, counts string in DBGrpID, lights yellow when over 1
            //$debtor->DBBranch = isset($_POST[$variablePrepend . "DBBranch"]) ? $_POST[$variablePrepend . "DBBranch"] : "";       //Branch label to limit access
            
            /*2nd row - 2nd grouping*/
            //DBINF
            $debtor->DBSIN = isset($_POST[$variablePrepend . "DBSIN"]) ? $_POST[$variablePrepend . "DBSIN"] : "";                  //Debtor SIN/SSN
            $debtor->DBDOB = isset($_POST[$variablePrepend . "DBDOB"]) ? $_POST[$variablePrepend . "DBDOB"] : "";                  //Debtor DOB
            $debtor->DBDLNum = isset($_POST[$variablePrepend . "DBDLNum"]) ? $_POST[$variablePrepend . "DBDLNum"] : "";                //Debtor Driver's License Number
            $debtor->DBCCNum = isset($_POST[$variablePrepend . "DBCCNum"]) ? $_POST[$variablePrepend . "DBCCNum"] : "";                //Debtor credit card number
            $debtor->DBAKA = isset($_POST[$variablePrepend . "DBAKA"]) ? $_POST[$variablePrepend . "DBAKA"] : "";                  //Debtor aliases/aka/maiden name/etc
            $debtor->DBCCExp = isset($_POST[$variablePrepend . "DBCCExp"]) ? $_POST[$variablePrepend . "DBCCExp"] : "";                //Debtor credit card expiry date
            $debtor->DBOrigCreditory = isset($_POST[$variablePrepend . "DBOrigCreditory"]) ? $_POST[$variablePrepend . "DBOrigCreditory"] : "";        //Name of original creditor
            $debtor->DBComment1 = isset($_POST[$variablePrepend . "DBComment1"]) ? $_POST[$variablePrepend . "DBComment1"] : "";             //comments on debtor
            $debtor->DBComment2 = isset($_POST[$variablePrepend . "DBComment2"]) ? $_POST[$variablePrepend . "DBComment2"] : "";             //comments of debtor continued
            
            //POE - Place of Employment
            $debtor->DBPOEAddress = isset($_POST[$variablePrepend . "DBPOEAddress"]) ? $_POST[$variablePrepend . "DBPOEAddress"] : "";                 //Debtor POE Address
            $debtor->DBPOECity = isset($_POST[$variablePrepend . "DBPOECity"]) ? $_POST[$variablePrepend . "DBPOECity"] : "";              //Debtor POE city
            $debtor->DBPOEProv = isset($_POST[$variablePrepend . "DBPOEProv"]) ? $_POST[$variablePrepend . "DBPOEProv"] : "";                //Debtor POE province
            $debtor->DBPOEPostalCode = isset($_POST[$variablePrepend . "DBPOEPostalCode"]) ? $_POST[$variablePrepend . "DBPOEPostalCode"] : "";                //Debtor POE postal code
            $debtor->DBPOEContact = isset($_POST[$variablePrepend . "DBPOEContact"]) ? $_POST[$variablePrepend . "DBPOEContact"] : "";                  //name of contact at POE
            $debtor->DBPOEFax = isset($_POST[$variablePrepend . "DBPOEFax"]) ? $_POST[$variablePrepend . "DBPOEFax"] : "";                 //Debtor POE fax
            $debtor->DBPOEJobTitle = isset($_POST[$variablePrepend . "DBPOEJobTitle"]) ? $_POST[$variablePrepend . "DBPOEJobTitle"] : "";                 //Debtor POE job title
            $debtor->DBPOESalary = isset($_POST[$variablePrepend . "DBPOESalary"]) ? $_POST[$variablePrepend . "DBPOESalary"] : "";                 //Debtor POE salary
            $debtor->DBPOENote = isset($_POST[$variablePrepend . "DBPOENote"]) ? $_POST[$variablePrepend . "DBPOENote"] : "";                //Debtor POE notes
            
            //CLTiNF
            $debtor->CltInfo1 = isset($_POST[$variablePrepend . "CltInfo1"]) ? $_POST[$variablePrepend . "CltInfo1"] : "";               //Client info field 1
            $debtor->CltInfo2 = isset($_POST[$variablePrepend . "CltInfo2"]) ? $_POST[$variablePrepend . "CltInfo2"] : "";               //Client info field 2
            $debtor->CltInfo3 = isset($_POST[$variablePrepend . "CltInfo3"]) ? $_POST[$variablePrepend . "CltInfo3"] : "";               //Client info field 3
            $debtor->CltInfo4 = isset($_POST[$variablePrepend . "CltInfo4"]) ? $_POST[$variablePrepend . "CltInfo4"] : "";               //Client info field 4
            $debtor->CltInfo5 = isset($_POST[$variablePrepend . "CltInfo5"]) ? $_POST[$variablePrepend . "CltInfo5"] : "";               //Client info field 5
            $debtor->CltInfo6 = isset($_POST[$variablePrepend . "CltInfo6"]) ? $_POST[$variablePrepend . "CltInfo6"] : "";               //Client info field 6
            $debtor->CltInfo7 = isset($_POST[$variablePrepend . "CltInfo7"]) ? $_POST[$variablePrepend . "CltInfo7"] : "";               //Client info field 7
            
            //LTTR
            $debtor->DBLttrLog = isset($_POST[$variablePrepend . "DBLttrLog"]) ? $_POST[$variablePrepend . "DBLttrLog"] : "";             //Letter Log
            if ( isset($_POST["ignoreLetterLogInSearch"]) && $isSearch == "TRUE" ) {
                $debtor->DBLttrLog = "";
            }
            
            //TRACE
            $debtor->TraceNote = isset($_POST[$variablePrepend . "TraceNote"]) ? $_POST[$variablePrepend . "TraceNote"] : "";              //Trace Log
            if ( isset($_POST["ignoreTraceNoteInSearch"]) && $isSearch == "TRUE" ) {
                $debtor->TraceNote = "";
            }
            
            //LGL - Legal
            $debtor->LGLClaim = isset($_POST[$variablePrepend . "LGLClaim"]) ? $_POST[$variablePrepend . "LGLClaim"] : "";        //Legal Claim Number
            $debtor->LGLPreJudgement = isset($_POST[$variablePrepend . "LGLPreJudgement"]) ? $_POST[$variablePrepend . "LGLPreJudgement"] : "";     //Pre-Judgment Interest
            $debtor->LGLCourtAddress = isset($_POST[$variablePrepend . "LGLCourtAddress"]) ? $_POST[$variablePrepend . "LGLCourtAddress"] : "";       //Court Address
            $debtor->LGLPostJudgement = isset($_POST[$variablePrepend . "LGLPostJudgement"]) ? $_POST[$variablePrepend . "LGLPostJudgement"] : "";    //Post-Judgment Interest
            $debtor->LGLSchedA = isset($_POST[$variablePrepend . "LGLSchedA"]) ? $_POST[$variablePrepend . "LGLSchedA"] : "";       //Schedule A Insert
            $debtor->LGLJudgementIntRate = isset($_POST[$variablePrepend . "LGLJudgementIntRate"]) ? $_POST[$variablePrepend . "LGLJudgementIntRate"] : "";     //Judgment Interest Rate - Runs at 0 to 0.599, no value over 1 should be allowed.
            $debtor->LGLAmtClaimed = isset($_POST[$variablePrepend . "LGLAmtClaimed"]) ? $_POST[$variablePrepend . "LGLAmtClaimed"] : "";  //Legal Amount Claimed
            $debtor->LGLJudgDate = isset($_POST[$variablePrepend . "LGLJudgDate"]) ? $_POST[$variablePrepend . "LGLJudgDate"] : "";    //Judgment Date
            $debtor->LGLCourtCosts = isset($_POST[$variablePrepend . "LGLCourtCosts"]) ? $_POST[$variablePrepend . "LGLCourtCosts"] : "";  //Court Costs Awarded
            $debtor->LGLJudgAmt = isset($_POST[$variablePrepend . "LGLJudgAmt"]) ? $_POST[$variablePrepend . "LGLJudgAmt"] : "";     //Judgment Amount - Calculated based on other LGL money fields
            
            //PMTS
            $debtor->DBPadDate = isset($_POST[$variablePrepend . "DBPadDate"]) ? $_POST[$variablePrepend . "DBPadDate"] : "";      //PAD Date - 1-31, day of month to run payment
            $debtor->DBBankNo = isset($_POST[$variablePrepend . "DBBankNo"]) ? $_POST[$variablePrepend . "DBBankNo"] : "";       //Bank Number - Institution Number for EFT
            $debtor->DBPadAmt = isset($_POST[$variablePrepend . "DBPadAmt"]) ? $_POST[$variablePrepend . "DBPadAmt"] : "";       //PAD Amount - Amount of Monthly Payment
            $debtor->DBTransitNo = isset($_POST[$variablePrepend . "DBTransitNo"]) ? $_POST[$variablePrepend . "DBTransitNo"] : "";    //Transit Number - Branch or ABA Number
            $debtor->DBPadTrm = isset($_POST[$variablePrepend . "DBPadTrm"]) ? $_POST[$variablePrepend . "DBPadTrm"] : "";       //PAD Term - Number of months to run PAD
            $debtor->DBAcctNo = isset($_POST[$variablePrepend . "DBAcctNo"]) ? $_POST[$variablePrepend . "DBAcctNo"] : "";       //Account Number - Bank Account Number
            $debtor->DBPadLft = isset($_POST[$variablePrepend . "DBPadLft"]) ? $_POST[$variablePrepend . "DBPadLft"] : "";       //PAD LEFT - Number of months left to run PAD
            $debtor->DBAcctName = isset($_POST[$variablePrepend . "DBAcctName"]) ? $_POST[$variablePrepend . "DBAcctName"] : "";     //Account Name - Name on Bank Account or CC
            $debtor->DBPadAct = isset($_POST[$variablePrepend . "DBPadAct"]) ? $_POST[$variablePrepend . "DBPadAct"] : "";       //PAD Active Flag - Y/N - Flag to run PAD or not
            
            /*3rd row - single grouping*/
            //DBNote1
            //$debtor->Note0 = isset($_POST[$variablePrepend . "Note0"]) ? $_POST[$variablePrepend . "Note0"] : "";          //debtor notes - change to it's own table to allow sort/search/etc
            
            //DBGrpNote
            //$debtor->DBGrpID = isset($_POST[$variablePrepend . "DBGrpID"]) ? $_POST[$variablePrepend . "DBGrpID"] : "";            //grouping ID with other files - change to it's own table/page
            
            //DBInfoLog
            $debtor->DBViciLoad = isset($_POST[$variablePrepend . "DBViciLoad"]) ? $_POST[$variablePrepend . "DBViciLoad"] : "";         //Vicidial Load Date - date file updated on VICI
            
            
            return $debtor;
        }
        
        public static function addDebtorCaseFile ( $debtor ) {
            $dbConn = new HyparecMySQL();
            $conn = $dbConn->getPDOConn();
            
            $sql = $conn->prepare("call addDebtorCaseFile ( :DBTitle, :DBComm, :DBName, :DBAdd1, :DBAdd2, :DBCity, :DBProv, :DBPCod, :DBCnt, :DBSAdd, :DBCountry, :DB2Name, :DB2Add1, :DB2Add2, :DB2City, :DB2Prov, :DB2PCod, :DB2Tel, :DB2SIN, :DB2Rel, :DB2DOB, :DBCltNo, :DBClt, :DBSalesRep, :DBCollNum, :DBTracNum, :DBLglNum, :DBComRate, :DBRefNum, :DBListed, :DBStatus, :DBCrBu, :CrBuOn, :DBTel1, :DBTel2, :DBTel3, :DBEmail, :POE, :PTel, :DBBTC, :DBList, :DBIncurred, :DBIntRate, :DBItIntDef, :DBNxt, :DBPriority, :DBColNot, :DBScore, :TUCScore, :DBSIN, :DBDOB, :DBDLNum, :DBCCNum, :DBAKA, :DBCCExpMonth, :DBCCExpYear, :DBCCExp, :DBOrigCreditory, :DBComment1, :DBComment2, :DBPOEAddress, :DBPOECity, :DBPOEProv, :DBPOEPostalCode, :DBPOEContact, :DBPOEFax, :DBPOEJobTitle, :DBPOESalary, :DBPOENote, :CltInfo1, :CltInfo2, :CltInfo3, :CltInfo4, :CltInfo5, :CltInfo6, :CltInfo7, :DBLttrLog, :TraceNote, :LGLClaim, :LGLPreJudgement, :LGLCourtAddress, :LGLPostJudgement, :LGLSchedA, :LGLJudgementIntRate, :LGLAmtClaimed, :LGLJudgDate, :LGLCourtCosts, :LGLJudgAmt, :DBPadDate, :DBBankNo, :DBPadAmt, :DBTransitNo, :DBPadTrm, :DBAcctNo, :DBPadLft, :DBAcctName, :DBPadAct, :DBViciLoad, :companyUID, :addedBy, :casefileUID, :DBBal, :DBPd, :DBInstr0 )");
            $sql->bindParam(":DBTitle", $debtor->DBTitle );
            $sql->bindParam(":DBComm", $debtor->DBComm );
            $sql->bindParam(":DBName", $debtor->DBName );
            $sql->bindParam(":DBAdd1", $debtor->DBAdd1 );
            $sql->bindParam(":DBAdd2", $debtor->DBAdd2 );
            $sql->bindParam(":DBCity", $debtor->DBCity );
            $sql->bindParam(":DBProv", $debtor->DBProv );
            $sql->bindParam(":DBPCod", $debtor->DBPCod );
            $sql->bindParam(":DBCnt", $debtor->DBCnt );
            $sql->bindParam(":DBSAdd", $debtor->DBSAdd );
            $sql->bindParam(":DBCountry", $debtor->DBCountry );
            $sql->bindParam(":DB2Name", $debtor->DB2Name );
            $sql->bindParam(":DB2Add1", $debtor->DB2Add1 );
            $sql->bindParam(":DB2Add2", $debtor->DB2Add2 );
            $sql->bindParam(":DB2City", $debtor->DB2City );
            $sql->bindParam(":DB2Prov", $debtor->DB2Prov );
            $sql->bindParam(":DB2PCod", $debtor->DB2PCod );
            $sql->bindParam(":DB2Tel", $debtor->DB2Tel );
            $sql->bindParam(":DB2SIN", $debtor->DB2SIN );
            $sql->bindParam(":DB2Rel", $debtor->DB2Rel );
            $sql->bindParam(":DB2DOB", $debtor->DB2DOB );
            $sql->bindParam(":DBCltNo", $debtor->DBCltNo );
            $sql->bindParam(":DBClt", $debtor->DBClt );
            $sql->bindParam(":DBSalesRep", $debtor->DBSalesRep );
            $sql->bindParam(":DBCollNum", $debtor->DBCollNum );
            $sql->bindParam(":DBTracNum", $debtor->DBTracNum );
            $sql->bindParam(":DBLglNum", $debtor->DBLglNum );
            $sql->bindParam(":DBComRate", $debtor->DBComRate );
            $sql->bindParam(":DBRefNum", $debtor->DBRefNum );
            $sql->bindParam(":DBListed", $debtor->DBListed );
            $sql->bindParam(":DBStatus", $debtor->DBStatus );
            $sql->bindParam(":DBCrBu", $debtor->DBCrBu );
            $sql->bindParam(":CrBuOn", $debtor->CrBuOn );
            $sql->bindParam(":DBTel1", $debtor->DBTel1 );
            $sql->bindParam(":DBTel2", $debtor->DBTel2 );
            $sql->bindParam(":DBTel3", $debtor->DBTel3 );
            $sql->bindParam(":DBEmail", $debtor->DBEmail );
            $sql->bindParam(":POE", $debtor->POE );
            $sql->bindParam(":PTel", $debtor->PTel );
            $sql->bindParam(":DBBTC", $debtor->DBBTC );
            $sql->bindParam(":DBList", $debtor->DBList );
            $sql->bindParam(":DBIncurred", $debtor->DBIncurred );
            $sql->bindParam(":DBIntRate", $debtor->DBIntRate );
            $sql->bindParam(":DBItIntDef", $debtor->DBItIntDef );
            $sql->bindParam(":DBNxt", $debtor->DBNxt );
            $sql->bindParam(":DBPriority", $debtor->DBPriority );
            $sql->bindParam(":DBColNot", $debtor->DBColNot );
            $sql->bindParam(":DBScore", $debtor->DBScore );
            $sql->bindParam(":TUCScore", $debtor->TUCScore );
            $sql->bindParam(":DBSIN", $debtor->DBSIN );
            $sql->bindParam(":DBDOB", $debtor->DBDOB );
            $sql->bindParam(":DBDLNum", $debtor->DBDLNum );
            $sql->bindParam(":DBCCNum", $debtor->DBCCNum );
            $sql->bindParam(":DBAKA", $debtor->DBAKA );
            $sql->bindParam(":DBCCExpMonth", $debtor->DBCCExpMonth );
            $sql->bindParam(":DBCCExpYear", $debtor->DBCCExpYear );
            $sql->bindParam(":DBCCExp", $debtor->DBCCExp );
            $sql->bindParam(":DBOrigCreditory", $debtor->DBOrigCreditory );
            $sql->bindParam(":DBComment1", $debtor->DBComment1 );
            $sql->bindParam(":DBComment2", $debtor->DBComment2 );
            $sql->bindParam(":DBPOEAddress", $debtor->DBPOEAddress );
            $sql->bindParam(":DBPOECity", $debtor->DBPOECity );
            $sql->bindParam(":DBPOEProv", $debtor->DBPOEProv );
            $sql->bindParam(":DBPOEPostalCode", $debtor->DBPOEPostalCode );
            $sql->bindParam(":DBPOEContact", $debtor->DBPOEContact );
            $sql->bindParam(":DBPOEFax", $debtor->DBPOEFax );
            $sql->bindParam(":DBPOEJobTitle", $debtor->DBPOEJobTitle );
            $sql->bindParam(":DBPOESalary", $debtor->DBPOESalary );
            $sql->bindParam(":DBPOENote", $debtor->DBPOENote );
            $sql->bindParam(":CltInfo1", $debtor->CltInfo1 );
            $sql->bindParam(":CltInfo2", $debtor->CltInfo2 );
            $sql->bindParam(":CltInfo3", $debtor->CltInfo3 );
            $sql->bindParam(":CltInfo4", $debtor->CltInfo4 );
            $sql->bindParam(":CltInfo5", $debtor->CltInfo5 );
            $sql->bindParam(":CltInfo6", $debtor->CltInfo6 );
            $sql->bindParam(":CltInfo7", $debtor->CltInfo7 );
            $sql->bindParam(":DBLttrLog", $debtor->DBLttrLog );
            $sql->bindParam(":TraceNote", $debtor->TraceNote );
            $sql->bindParam(":LGLClaim", $debtor->LGLClaim );
            $sql->bindParam(":LGLPreJudgement", $debtor->LGLPreJudgement );
            $sql->bindParam(":LGLCourtAddress", $debtor->LGLCourtAddress );
            $sql->bindParam(":LGLPostJudgement", $debtor->LGLPostJudgement );
            $sql->bindParam(":LGLSchedA", $debtor->LGLSchedA );
            $sql->bindParam(":LGLJudgementIntRate", $debtor->LGLJudgementIntRate );
            $sql->bindParam(":LGLAmtClaimed", $debtor->LGLAmtClaimed );
            $sql->bindParam(":LGLJudgDate", $debtor->LGLJudgDate );
            $sql->bindParam(":LGLCourtCosts", $debtor->LGLCourtCosts );
            $sql->bindParam(":LGLJudgAmt", $debtor->LGLJudgAmt );
            $sql->bindParam(":DBPadDate", $debtor->DBPadDate );
            $sql->bindParam(":DBBankNo", $debtor->DBBankNo );
            $sql->bindParam(":DBPadAmt", $debtor->DBPadAmt );
            $sql->bindParam(":DBTransitNo", $debtor->DBTransitNo );
            $sql->bindParam(":DBPadTrm", $debtor->DBPadTrm );
            $sql->bindParam(":DBAcctNo", $debtor->DBAcctNo );
            $sql->bindParam(":DBPadLft", $debtor->DBPadLft );
            $sql->bindParam(":DBAcctName", $debtor->DBAcctName );
            $sql->bindParam(":DBPadAct", $debtor->DBPadAct );
            $sql->bindParam(":DBViciLoad", $debtor->DBViciLoad );
            $sql->bindParam(":companyUID", $debtor->companyUID );
            $sql->bindParam(":addedBy", $debtor->addedBy );
            $sql->bindParam(":casefileUID", $debtor->casefileUID );
            $sql->bindParam(":DBBal", $debtor->DBBal );
            $sql->bindParam(":DBPd", $debtor->DBPd );
            $sql->bindParam(":DBInstr0", $debtor->DBInstr0 );
            $sql->execute();
            
            //echo "call addDebtorCaseFile ( '$debtor->DBTitle', '$debtor->DBComm', '$debtor->DBName', '$debtor->DBAdd1', '$debtor->DBAdd2', '$debtor->DBCity', '$debtor->DBProv', '$debtor->DBPCod', '$debtor->DBCnt', '$debtor->DBSAdd', '$debtor->DBCountry', '$debtor->DB2Name', '$debtor->DB2Add1', '$debtor->DB2Add2', '$debtor->DB2City', '$debtor->DB2Prov', '$debtor->DB2PCod', '$debtor->DB2Tel', '$debtor->DB2SIN', '$debtor->DB2Rel', '$debtor->DB2DOB', '$debtor->DBCltNo', '$debtor->DBClt', '$debtor->DBSalesRep', '$debtor->DBCollNum', '$debtor->DBTracNum', '$debtor->DBLglNum', '$debtor->DBComRate', '$debtor->DBRefNum', '$debtor->DBListed', '$debtor->DBStatus', '$debtor->DBCrBu', '$debtor->CrBuOn', '$debtor->DBTel1', '$debtor->DBTel2', '$debtor->DBTel3', '$debtor->DBEmail', '$debtor->POE', '$debtor->PTel', '$debtor->DBBTC', '$debtor->DBList', '$debtor->DBIncurred', '$debtor->DBIntRate', '$debtor->DBItIntDef', '$debtor->DBNxt', '$debtor->DBPriority', '$debtor->DBColNot', '$debtor->DBScore', '$debtor->TUCScore', '$debtor->DBSIN', '$debtor->DBDOB', '$debtor->DBDLNum', '$debtor->DBCCNum', '$debtor->DBAKA', '$debtor->DBCCExpMonth', '$debtor->DBCCExpYear', '$debtor->DBCCExp', '$debtor->DBOrigCreditory', '$debtor->DBComment1', '$debtor->DBComment2', '$debtor->DBPOEAddress', '$debtor->DBPOECity', '$debtor->DBPOEProv', '$debtor->DBPOEPostalCode', '$debtor->DBPOEContact', '$debtor->DBPOEFax', '$debtor->DBPOEJobTitle', '$debtor->DBPOESalary', '$debtor->DBPOENote', '$debtor->CltInfo1', '$debtor->CltInfo2', '$debtor->CltInfo3', '$debtor->CltInfo4', '$debtor->CltInfo5', '$debtor->CltInfo6', '$debtor->CltInfo7', '$debtor->DBLttrLog', '$debtor->TraceNote', '$debtor->LGLClaim', '$debtor->LGLPreJudgement', '$debtor->LGLCourtAddress', '$debtor->LGLPostJudgement', '$debtor->LGLSchedA', '$debtor->LGLJudgementIntRate', '$debtor->LGLAmtClaimed', '$debtor->LGLJudgDate', '$debtor->LGLCourtCosts', '$debtor->LGLJudgAmt', '$debtor->DBPadDate', '$debtor->DBBankNo', '$debtor->DBPadAmt', '$debtor->DBTransitNo', '$debtor->DBPadTrm', '$debtor->DBAcctNo', '$debtor->DBPadLft', '$debtor->DBAcctName', '$debtor->DBPadAct', '$debtor->DBViciLoad', '$debtor->companyUID', '$debtor->addedBy', '$debtor->casefileUID', '$debtor->DBBal', '$debtor->DBPd', '$debtor->DBInstr0' )";
            
            return $sql->errorInfo();
        }
        
        public static function editDebtorCaseFile ( $debtor ) {
            $dbConn = new HyparecMySQL();
            $conn = $dbConn->getPDOConn();
            
            $sql = $conn->prepare("call editDebtorCaseFile ( :DBID, :DBTitle, :DBComm, :DBName, :DBAdd1, :DBAdd2, :DBCity, :DBProv, :DBPCod, :DBCnt, :DBSAdd, :DBCountry, :DB2Name, :DB2Add1, :DB2Add2, :DB2City, :DB2Prov, :DB2PCod, :DB2Tel, :DB2SIN, :DB2Rel, :DB2DOB, :DBCltNo, :DBClt, :DBSalesRep, :DBCollNum, :DBTracNum, :DBLglNum, :DBComRate, :DBRefNum, :DBListed, :DBStatus, :DBCrBu, :CrBuOn, :DBTel1, :DBTel2, :DBTel3, :DBEmail, :POE, :PTel, :DBBTC, :DBList, :DBIncurred, :DBIntRate, :DBItIntDef, :DBNxt, :DBPriority, :DBColNot, :DBScore, :TUCScore, :DBSIN, :DBDOB, :DBDLNum, :DBCCNum, :DBAKA, :DBCCExpMonth, :DBCCExpYear, :DBCCExp, :DBOrigCreditory, :DBComment1, :DBComment2, :DBPOEAddress, :DBPOECity, :DBPOEProv, :DBPOEPostalCode, :DBPOEContact, :DBPOEFax, :DBPOEJobTitle, :DBPOESalary, :DBPOENote, :CltInfo1, :CltInfo2, :CltInfo3, :CltInfo4, :CltInfo5, :CltInfo6, :CltInfo7, :DBLttrLog, :TraceNote, :LGLClaim, :LGLPreJudgement, :LGLCourtAddress, :LGLPostJudgement, :LGLSchedA, :LGLJudgementIntRate, :LGLAmtClaimed, :LGLJudgDate, :LGLCourtCosts, :LGLJudgAmt, :DBPadDate, :DBBankNo, :DBPadAmt, :DBTransitNo, :DBPadTrm, :DBAcctNo, :DBPadLft, :DBAcctName, :DBPadAct, :DBViciLoad, :companyUID, :addedBy, :casefileUID, :DBBal, :DBPd, :DBInstr0 )");
            $sql->bindParam(":DBID", $debtor->DBID );
            $sql->bindParam(":DBTitle", $debtor->DBTitle );
            $sql->bindParam(":DBComm", $debtor->DBComm );
            $sql->bindParam(":DBName", $debtor->DBName );
            $sql->bindParam(":DBAdd1", $debtor->DBAdd1 );
            $sql->bindParam(":DBAdd2", $debtor->DBAdd2 );
            $sql->bindParam(":DBCity", $debtor->DBCity );
            $sql->bindParam(":DBProv", $debtor->DBProv );
            $sql->bindParam(":DBPCod", $debtor->DBPCod );
            $sql->bindParam(":DBCnt", $debtor->DBCnt );
            $sql->bindParam(":DBSAdd", $debtor->DBSAdd );
            $sql->bindParam(":DBCountry", $debtor->DBCountry );
            $sql->bindParam(":DB2Name", $debtor->DB2Name );
            $sql->bindParam(":DB2Add1", $debtor->DB2Add1 );
            $sql->bindParam(":DB2Add2", $debtor->DB2Add2 );
            $sql->bindParam(":DB2City", $debtor->DB2City );
            $sql->bindParam(":DB2Prov", $debtor->DB2Prov );
            $sql->bindParam(":DB2PCod", $debtor->DB2PCod );
            $sql->bindParam(":DB2Tel", $debtor->DB2Tel );
            $sql->bindParam(":DB2SIN", $debtor->DB2SIN );
            $sql->bindParam(":DB2Rel", $debtor->DB2Rel );
            $sql->bindParam(":DB2DOB", $debtor->DB2DOB );
            $sql->bindParam(":DBCltNo", $debtor->DBCltNo );
            $sql->bindParam(":DBClt", $debtor->DBClt );
            $sql->bindParam(":DBSalesRep", $debtor->DBSalesRep );
            $sql->bindParam(":DBCollNum", $debtor->DBCollNum );
            $sql->bindParam(":DBTracNum", $debtor->DBTracNum );
            $sql->bindParam(":DBLglNum", $debtor->DBLglNum );
            $sql->bindParam(":DBComRate", $debtor->DBComRate );
            $sql->bindParam(":DBRefNum", $debtor->DBRefNum );
            $sql->bindParam(":DBListed", $debtor->DBListed );
            $sql->bindParam(":DBStatus", $debtor->DBStatus );
            $sql->bindParam(":DBCrBu", $debtor->DBCrBu );
            $sql->bindParam(":CrBuOn", $debtor->CrBuOn );
            $sql->bindParam(":DBTel1", $debtor->DBTel1 );
            $sql->bindParam(":DBTel2", $debtor->DBTel2 );
            $sql->bindParam(":DBTel3", $debtor->DBTel3 );
            $sql->bindParam(":DBEmail", $debtor->DBEmail );
            $sql->bindParam(":POE", $debtor->POE );
            $sql->bindParam(":PTel", $debtor->PTel );
            $sql->bindParam(":DBBTC", $debtor->DBBTC );
            $sql->bindParam(":DBList", $debtor->DBList );
            $sql->bindParam(":DBIncurred", $debtor->DBIncurred );
            $sql->bindParam(":DBIntRate", $debtor->DBIntRate );
            $sql->bindParam(":DBItIntDef", $debtor->DBItIntDef );
            $sql->bindParam(":DBNxt", $debtor->DBNxt );
            $sql->bindParam(":DBPriority", $debtor->DBPriority );
            $sql->bindParam(":DBColNot", $debtor->DBColNot );
            $sql->bindParam(":DBScore", $debtor->DBScore );
            $sql->bindParam(":TUCScore", $debtor->TUCScore );
            $sql->bindParam(":DBSIN", $debtor->DBSIN );
            $sql->bindParam(":DBDOB", $debtor->DBDOB );
            $sql->bindParam(":DBDLNum", $debtor->DBDLNum );
            $sql->bindParam(":DBCCNum", $debtor->DBCCNum );
            $sql->bindParam(":DBAKA", $debtor->DBAKA );
            $sql->bindParam(":DBCCExpMonth", $debtor->DBCCExpMonth );
            $sql->bindParam(":DBCCExpYear", $debtor->DBCCExpYear );
            $sql->bindParam(":DBCCExp", $debtor->DBCCExp );
            $sql->bindParam(":DBOrigCreditory", $debtor->DBOrigCreditory );
            $sql->bindParam(":DBComment1", $debtor->DBComment1 );
            $sql->bindParam(":DBComment2", $debtor->DBComment2 );
            $sql->bindParam(":DBPOEAddress", $debtor->DBPOEAddress );
            $sql->bindParam(":DBPOECity", $debtor->DBPOECity );
            $sql->bindParam(":DBPOEProv", $debtor->DBPOEProv );
            $sql->bindParam(":DBPOEPostalCode", $debtor->DBPOEPostalCode );
            $sql->bindParam(":DBPOEContact", $debtor->DBPOEContact );
            $sql->bindParam(":DBPOEFax", $debtor->DBPOEFax );
            $sql->bindParam(":DBPOEJobTitle", $debtor->DBPOEJobTitle );
            $sql->bindParam(":DBPOESalary", $debtor->DBPOESalary );
            $sql->bindParam(":DBPOENote", $debtor->DBPOENote );
            $sql->bindParam(":CltInfo1", $debtor->CltInfo1 );
            $sql->bindParam(":CltInfo2", $debtor->CltInfo2 );
            $sql->bindParam(":CltInfo3", $debtor->CltInfo3 );
            $sql->bindParam(":CltInfo4", $debtor->CltInfo4 );
            $sql->bindParam(":CltInfo5", $debtor->CltInfo5 );
            $sql->bindParam(":CltInfo6", $debtor->CltInfo6 );
            $sql->bindParam(":CltInfo7", $debtor->CltInfo7 );
            $sql->bindParam(":DBLttrLog", $debtor->DBLttrLog );
            $sql->bindParam(":TraceNote", $debtor->TraceNote );
            $sql->bindParam(":LGLClaim", $debtor->LGLClaim );
            $sql->bindParam(":LGLPreJudgement", $debtor->LGLPreJudgement );
            $sql->bindParam(":LGLCourtAddress", $debtor->LGLCourtAddress );
            $sql->bindParam(":LGLPostJudgement", $debtor->LGLPostJudgement );
            $sql->bindParam(":LGLSchedA", $debtor->LGLSchedA );
            $sql->bindParam(":LGLJudgementIntRate", $debtor->LGLJudgementIntRate );
            $sql->bindParam(":LGLAmtClaimed", $debtor->LGLAmtClaimed );
            $sql->bindParam(":LGLJudgDate", $debtor->LGLJudgDate );
            $sql->bindParam(":LGLCourtCosts", $debtor->LGLCourtCosts );
            $sql->bindParam(":LGLJudgAmt", $debtor->LGLJudgAmt );
            $sql->bindParam(":DBPadDate", $debtor->DBPadDate );
            $sql->bindParam(":DBBankNo", $debtor->DBBankNo );
            $sql->bindParam(":DBPadAmt", $debtor->DBPadAmt );
            $sql->bindParam(":DBTransitNo", $debtor->DBTransitNo );
            $sql->bindParam(":DBPadTrm", $debtor->DBPadTrm );
            $sql->bindParam(":DBAcctNo", $debtor->DBAcctNo );
            $sql->bindParam(":DBPadLft", $debtor->DBPadLft );
            $sql->bindParam(":DBAcctName", $debtor->DBAcctName );
            $sql->bindParam(":DBPadAct", $debtor->DBPadAct );
            $sql->bindParam(":DBViciLoad", $debtor->DBViciLoad );
            $sql->bindParam(":companyUID", $debtor->companyUID );
            $sql->bindParam(":addedBy", $debtor->addedBy );
            $sql->bindParam(":casefileUID", $debtor->casefileUID );
            $sql->bindParam(":DBBal", $debtor->DBBal );
            $sql->bindParam(":DBPd", $debtor->DBPd );
            $sql->bindParam(":DBInstr0", $debtor->DBInstr0 );
            $sql->execute();
            
            //echo "call editDebtorCaseFile ( '$debtor->DBTitle', '$debtor->DBComm', '$debtor->DBName', '$debtor->DBAdd1', '$debtor->DBAdd2', '$debtor->DBCity', '$debtor->DBProv', '$debtor->DBPCod', '$debtor->DBCnt', '$debtor->DBSAdd', '$debtor->DBCountry', '$debtor->DB2Name', '$debtor->DB2Add1', '$debtor->DB2Add2', '$debtor->DB2City', '$debtor->DB2Prov', '$debtor->DB2PCod', '$debtor->DB2Tel', '$debtor->DB2SIN', '$debtor->DB2Rel', '$debtor->DB2DOB', '$debtor->DBCltNo', '$debtor->DBClt', '$debtor->DBSalesRep', '$debtor->DBCollNum', '$debtor->DBTracNum', '$debtor->DBLglNum', '$debtor->DBComRate', '$debtor->DBRefNum', '$debtor->DBListed', '$debtor->DBStatus', '$debtor->DBCrBu', '$debtor->CrBuOn', '$debtor->DBTel1', '$debtor->DBTel2', '$debtor->DBTel3', '$debtor->DBEmail', '$debtor->POE', '$debtor->PTel', '$debtor->DBBTC', '$debtor->DBList', '$debtor->DBIncurred', '$debtor->DBIntRate', '$debtor->DBItIntDef', '$debtor->DBNxt', '$debtor->DBPriority', '$debtor->DBColNot', '$debtor->DBScore', '$debtor->TUCScore', '$debtor->DBSIN', '$debtor->DBDOB', '$debtor->DBDLNum', '$debtor->DBCCNum', '$debtor->DBAKA', '$debtor->DBCCExpMonth', '$debtor->DBCCExpYear', '$debtor->DBCCExp', '$debtor->DBOrigCreditory', '$debtor->DBComment1', '$debtor->DBComment2', '$debtor->DBPOEAddress', '$debtor->DBPOECity', '$debtor->DBPOEProv', '$debtor->DBPOEPostalCode', '$debtor->DBPOEContact', '$debtor->DBPOEFax', '$debtor->DBPOEJobTitle', '$debtor->DBPOESalary', '$debtor->DBPOENote', '$debtor->CltInfo1', '$debtor->CltInfo2', '$debtor->CltInfo3', '$debtor->CltInfo4', '$debtor->CltInfo5', '$debtor->CltInfo6', '$debtor->CltInfo7', '$debtor->DBLttrLog', '$debtor->TraceNote', '$debtor->LGLClaim', '$debtor->LGLPreJudgement', '$debtor->LGLCourtAddress', '$debtor->LGLPostJudgement', '$debtor->LGLSchedA', '$debtor->LGLJudgementIntRate', '$debtor->LGLAmtClaimed', '$debtor->LGLJudgDate', '$debtor->LGLCourtCosts', '$debtor->LGLJudgAmt', '$debtor->DBPadDate', '$debtor->DBBankNo', '$debtor->DBPadAmt', '$debtor->DBTransitNo', '$debtor->DBPadTrm', '$debtor->DBAcctNo', '$debtor->DBPadLft', '$debtor->DBAcctName', '$debtor->DBPadAct', '$debtor->DBViciLoad', '$debtor->companyUID', '$debtor->addedBy', '$debtor->casefileUID', '$debtor->DBBal', '$debtor->DBPd', '$debtor->DBInstr0' )";
            
            return $sql->errorInfo();
        }
        
        public static function getDebtorList( $companyUID, $userUID, $limit = 1000, $offset = 0) {
            $dbConn = new HyparecMySQL();
            $conn = $dbConn->getPDOConn();
            
            $sql = $conn->prepare("call getDebtorList ( :companyUID, :userUID, :limit, :offset )");
            $sql->bindParam(":companyUID", $companyUID );
            $sql->bindParam(":userUID", $userUID );
            $sql->bindParam(":limit", $limit );
            $sql->bindParam(":offset", $offset );
            $sql->execute();
            
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public static function getDebtorCaseFile( $companyUID, $userUID, $DBID ) {
            $debtorCaseFile = self::getDebtorCaseFileMainDetails($companyUID, $userUID, $DBID);
            if ( $debtorCaseFile["casefileUID"] != "" ) {
                $debtorCaseFile["notes"] = self::getDebtorCaseFileNotes( $debtorCaseFile["casefileUID"] );
            }
            
            return $debtorCaseFile;
        }
        
        private static function getDebtorCaseFileMainDetails( $companyUID, $userUID, $DBID ) {
            $dbConn = new HyparecMySQL();
            $conn = $dbConn->getPDOConn();
            
            $sql = $conn->prepare("call getDebtorCaseFile ( :companyUID, :userUID, :DBID )");
            $sql->bindParam(":companyUID", $companyUID );
            $sql->bindParam(":userUID", $userUID );
            $sql->bindParam(":DBID", $DBID );
            $sql->execute();
            
            return $sql->fetch(PDO::FETCH_ASSOC);
        }
        
        public static function getDebtorCaseFileNotes( $casefileUID ) {
            $dbConn = new HyparecMySQL();
            $conn = $dbConn->getPDOConn();
            
            $sql = $conn->prepare("call getDebtorCaseFileNotes ( :casefileUID )");
            $sql->bindParam(":casefileUID", $casefileUID );
            $sql->execute(); 

            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
        /**
         * Everything after this I was Directly Involved With
         **/


        //Get emails associated with debtor account
        public static function getDebtorEmailList($DBID){
            $dbConn = new HyparecMySQL();
            $conn = $dbConn->getPDOConn();
                
            $sql = $conn->prepare("call getDebtorEmailList ( :DBID )");
            // print_r($sql->errorInfo());
            $sql->bindParam(":DBID", $DBID);
            $sql->execute(); 

            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function getMassDebtorEmailList($DBName){
            $dbConn = new HyparecMySQL();
            $conn = $dbConn->getPDOConn();
                
            $sql = $conn->prepare("call getMassDebtorEmails ( :DBName )");
            // print_r($sql->errorInfo());
            $sql->bindParam(":DBName", $DBName);
            $sql->execute(); 

            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public static function getDebtorCaseFileFromCasefileUID( $casefileUID, $companyUID, $userUID ) {
           
            $DBID = self::getDebtorCaseFileDBIDFromCasefileUID( $casefileUID );
            $debtorCaseFile = self::getDebtorCaseFile( $companyUID, $userUID, $DBID );
            
            return $debtorCaseFile;
        }
        
        public static function getDebtorCaseFileDBIDFromCasefileUID( $casefileUID ) {
            $dbConn = new HyparecMySQL();
            $conn = $dbConn->getPDOConn();
            
            $sql = $conn->prepare("call getDebtorCaseFileDBIDFromCasefileUID ( :casefileUID )");
            $sql->bindParam(":casefileUID", $casefileUID );
            $sql->execute();
            
            $DBID = -1;
            if ($resultSet = $sql->fetch(PDO::FETCH_ASSOC)) {
                $DBID = $resultSet["DBID"];
            }
            
            return $DBID;
        }
        
        public static function getDebtorTitleTypes( ) {
            $dbConn = new HyparecMySQL();
            $conn = $dbConn->getPDOConn();
            
            $sql = $conn->prepare("call getDebtorTitleTypes ( )");
            $sql->execute();
            
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public static function addDebtorCaseFileNotes( $casefileUID, $notes, $companyUID, $addedBy ) {
            $dbConn = new HyparecMySQL();
            $conn = $dbConn->getPDOConn();
            
            $sql = $conn->prepare("call addDebtorCaseFileNotes ( :casefileUID, :notes, :companyUID, :addedBy )");
            $sql->bindParam(":casefileUID", $casefileUID );
            $sql->bindParam(":notes", $notes );
            $sql->bindParam(":companyUID", $companyUID );
            $sql->bindParam(":addedBy", $addedBy );
            $sql->execute();
            
            return $sql->errorInfo();
        }

        public static function getDebtorContactNumbers($DBID){
            $dbConn = new HyparecMySQL();
            $conn = $dbConn->getPDOConn();

            $sql = $conn->prepare("call getDebtorContactNumbers ( :DBID )");
            $sql->bindParam(":DBID", $DBID ); 
            $sql->execute();
            
            return $sql->fetchAll(PDO::FETCH_ASSOC);
            // echo $sql->errorInfo();

        }

        public static function getDebtorMassContactNumbers($DBName){
            $dbConn = new HyparecMySQL();
            $conn = $dbConn->getPDOConn();
            
            $sql = $conn->prepare("call getDebtorMassContactNumbers ( :DBName )");
            $sql->bindParam(":DBName", $DBName ); 
            $sql->execute();
            
            
            return $sql->fetchAll(PDO::FETCH_ASSOC);
            echo $sql->errorInfo();
        }

        public static function getDataSourceAndStaffInfo($casefileUID, $offset =0, $limit =-1){
            $dbConn = new HyparecMySQL();
            $conn = $dbConn->getPDOConn();


            $sql = $conn->prepare("call getDataSourceStaffInfo ( :casefileUID )");
            $sql->bindParam(":casefileUID", $casefileUID ); 
            $sql->execute();
            
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
?>
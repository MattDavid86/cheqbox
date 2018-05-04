<?
    /**
     * 
     */
    class Sales {
        public $salesUID;
        public $userUID;
        public $companyUID;
        public $dateAdded;
        public $addedBy;
        public $dateDeleted;
        
        public $RevPanel;
        public $CltID;
        public $CltBill;
        public $CltInv;
        public $CltScrn;
        public $CltGST;
        public $CltStmt;
        public $CltLgl;
        public $CltCrBu;
        public $CltClosed;
        public $CltTrust;
        public $CltBank;
        public $CltTransit;
        public $CltAcct;
        public $CltNo;
        public $CltGrpNo;
        public $CltCt1;
        public $CltCt1Title;
        public $CltCt1Note;
        public $CltName;
        public $CltCt2;
        public $CltCt2Title;
        public $CltCt2Note;
        public $CltAdd1;
        public $CltCt3;
        public $CltCt3Title;
        public $CltCt3Note;
        public $CltAdd2;
        public $CltInstructions;
        public $CltCity;
        public $CltProv;
        public $CltPCod;
        public $CltTel1;
        public $CltFax;
        public $CltEmlPm;
        public $CltReview;
        public $CltRefNum;
        public $CltEmIn;
        public $CltTel2;
        public $CltEmail;
        public $CltViciList;
        public $CltTel3;
        public $CltACH;
        public $SalesNoteSum;
        public $CltImportSpec;
        public $CltIntDeferred;
        public $SalesStatus;
        public $CltComRate;
        public $CltSales;
        public $CltWorked;
        public $CltSpcStats;
        public $CltPrefCol;
        public $CltIntRate;
        public $CltSalesNotes;
        public $CltNxt;
        public $Score;
        public $CltNote0;
        public $GrpNote0;
        public $CltStartDate;
        public $CltIndGrp;
        public $CltDRNNo;
        public $CltLastListed;
        public $CltDRNNoteBatch;
        public $CltDRNStatusBatch;
        public $CltAccts;
        public $CltDRNPmtBatch;
        public $CltListed;
        public $CltDRNRemitBatch;
        public $CltColl;
        public $CltDRNShortName;
        public $CltLiq;
        public $CltStMonth;
        public $CltStComH;
        public $CltStBill;
        public $CltAR91;
        public $CltStPdHere;
        public $CltStComD;
        public $CltStPrevB;
        public $CltStPdDir;
        public $CltStComT;
        public $CltOwes;
        public $CltStHST;
        public $CltOwesTtl;
        public $CltSalesFull;
        public $CltSalesTitle;
        public $CltSalesExt;
        public $CltSalesEmail;
        public $CltIntRate2;
        public $LE3;
        public $LE4;
        
        public static function createFromPost( ) {
            $sales = new Sales();
            
            $sales->salesUID = isset($_POST["salesUID"]) ? $_POST["salesUID"] : getGUID();
            $sales->userUID = isset($_POST["userUID"]) ? $_POST["userUID"] : "";
            $sales->companyUID = isset($_POST["companyUID"]) ? $_POST["companyUID"] : "";
            $sales->addedBy = isset($_POST["addedBy"]) ? $_POST["addedBy"] : "";
            
            $sales->RevPanel = isset($_POST["RevPanel"]) ? $_POST["RevPanel"] : "";
            $sales->CltID = isset($_POST["CltID"]) ? $_POST["CltID"] : "";
            $sales->CltBill = isset($_POST["CltBill"]) ? $_POST["CltBill"] : "";
            $sales->CltInv = isset($_POST["CltInv"]) ? $_POST["CltInv"] : "";
            $sales->CltScrn = isset($_POST["CltScrn"]) ? $_POST["CltScrn"] : "";
            $sales->CltGST = isset($_POST["CltGST"]) ? $_POST["CltGST"] : "";
            $sales->CltStmt = isset($_POST["CltStmt"]) ? $_POST["CltStmt"] : "";
            $sales->CltLgl = isset($_POST["CltLgl"]) ? $_POST["CltLgl"] : "";
            $sales->CltCrBu = isset($_POST["CltCrBu"]) ? $_POST["CltCrBu"] : "";
            $sales->CltClosed = isset($_POST["CltClosed"]) ? $_POST["CltClosed"] : "";
            $sales->CltTrust = isset($_POST["CltTrust"]) ? $_POST["CltTrust"] : "";
            $sales->CltBank = isset($_POST["CltBank"]) ? $_POST["CltBank"] : "";
            $sales->CltTransit = isset($_POST["CltTransit"]) ? $_POST["CltTransit"] : "";
            $sales->CltAcct = isset($_POST["CltAcct"]) ? $_POST["CltAcct"] : "";
            $sales->CltNo = isset($_POST["CltNo"]) ? $_POST["CltNo"] : "";
            $sales->CltGrpNo = isset($_POST["CltGrpNo"]) ? $_POST["CltGrpNo"] : "";
            $sales->CltCt1 = isset($_POST["CltCt1"]) ? $_POST["CltCt1"] : "";
            $sales->CltCt1Title = isset($_POST["CltCt1Title"]) ? $_POST["CltCt1Title"] : "";
            $sales->CltCt1Note = isset($_POST["CltCt1Note"]) ? $_POST["CltCt1Note"] : "";
            $sales->CltName = isset($_POST["CltName"]) ? $_POST["CltName"] : "";
            $sales->CltCt2 = isset($_POST["CltCt2"]) ? $_POST["CltCt2"] : "";
            $sales->CltCt2Title = isset($_POST["CltCt2Title"]) ? $_POST["CltCt2Title"] : "";
            $sales->CltCt2Note = isset($_POST["CltCt2Note"]) ? $_POST["CltCt2Note"] : "";
            $sales->CltAdd1 = isset($_POST["CltAdd1"]) ? $_POST["CltAdd1"] : "";
            $sales->CltCt3 = isset($_POST["CltCt3"]) ? $_POST["CltCt3"] : "";
            $sales->CltCt3Title = isset($_POST["CltCt3Title"]) ? $_POST["CltCt3Title"] : "";
            $sales->CltCt3Note = isset($_POST["CltCt3Note"]) ? $_POST["CltCt3Note"] : "";
            $sales->CltAdd2 = isset($_POST["CltAdd2"]) ? $_POST["CltAdd2"] : "";
            $sales->CltInstructions = isset($_POST["CltInstructions"]) ? $_POST["CltInstructions"] : "";
            $sales->CltCity = isset($_POST["CltCity"]) ? $_POST["CltCity"] : "";
            $sales->CltProv = isset($_POST["CltProv"]) ? $_POST["CltProv"] : "";
            $sales->CltPCod = isset($_POST["CltPCod"]) ? $_POST["CltPCod"] : "";
            $sales->CltTel1 = isset($_POST["CltTel1"]) ? $_POST["CltTel1"] : "";
            $sales->CltFax = isset($_POST["CltFax"]) ? $_POST["CltFax"] : "";
            $sales->CltEmlPm = isset($_POST["CltEmlPm"]) ? $_POST["CltEmlPm"] : "";
            $sales->CltReview = isset($_POST["CltReview"]) ? $_POST["CltReview"] : "";
            $sales->CltRefNum = isset($_POST["CltRefNum"]) ? $_POST["CltRefNum"] : "";
            $sales->CltEmIn = isset($_POST["CltEmIn"]) ? $_POST["CltEmIn"] : "";
            $sales->CltTel2 = isset($_POST["CltTel2"]) ? $_POST["CltTel2"] : "";
            $sales->CltEmail = isset($_POST["CltEmail"]) ? $_POST["CltEmail"] : "";
            $sales->CltViciList = isset($_POST["CltViciList"]) ? $_POST["CltViciList"] : "";
            $sales->CltTel3 = isset($_POST["CltTel3"]) ? $_POST["CltTel3"] : "";
            $sales->CltACH = isset($_POST["CltACH"]) ? $_POST["CltACH"] : "";
            $sales->SalesNoteSum = isset($_POST["SalesNoteSum"]) ? $_POST["SalesNoteSum"] : "";
            $sales->CltImportSpec = isset($_POST["CltImportSpec"]) ? $_POST["CltImportSpec"] : "";
            $sales->CltIntDeferred = isset($_POST["CltIntDeferred"]) ? $_POST["CltIntDeferred"] : "";
            $sales->SalesStatus = isset($_POST["SalesStatus"]) ? $_POST["SalesStatus"] : "";
            $sales->CltComRate = isset($_POST["CltComRate"]) ? $_POST["CltComRate"] : "";
            $sales->CltSales = isset($_POST["CltSales"]) ? $_POST["CltSales"] : "";
            $sales->CltWorked = isset($_POST["CltWorked"]) ? $_POST["CltWorked"] : "";
            $sales->CltSpcStats = isset($_POST["CltSpcStats"]) ? $_POST["CltSpcStats"] : "";
            $sales->CltPrefCol = isset($_POST["CltPrefCol"]) ? $_POST["CltPrefCol"] : "";
            $sales->CltIntRate = isset($_POST["CltIntRate"]) ? $_POST["CltIntRate"] : "";
            $sales->CltSalesNotes = isset($_POST["CltSalesNotes"]) ? $_POST["CltSalesNotes"] : "";
            $sales->CltNxt = isset($_POST["CltNxt"]) ? $_POST["CltNxt"] : "";
            $sales->Score = isset($_POST["Score"]) ? $_POST["Score"] : "";
            $sales->CltNote0 = isset($_POST["CltNote0"]) ? $_POST["CltNote0"] : "";
            $sales->GrpNote0 = isset($_POST["GrpNote0"]) ? $_POST["GrpNote0"] : "";
            $sales->CltStartDate = isset($_POST["CltStartDate"]) ? $_POST["CltStartDate"] : "";
            $sales->CltIndGrp = isset($_POST["CltIndGrp"]) ? $_POST["CltIndGrp"] : "";
            $sales->CltDRNNo = isset($_POST["CltDRNNo"]) ? $_POST["CltDRNNo"] : "";
            $sales->CltLastListed = isset($_POST["CltLastListed"]) ? $_POST["CltLastListed"] : "";
            $sales->CltDRNNoteBatch = isset($_POST["CltDRNNoteBatch"]) ? $_POST["CltDRNNoteBatch"] : "";
            $sales->CltDRNStatusBatch = isset($_POST["CltDRNStatusBatch"]) ? $_POST["CltDRNStatusBatch"] : "";
            $sales->CltAccts = isset($_POST["CltAccts"]) ? $_POST["CltAccts"] : "";
            $sales->CltDRNPmtBatch = isset($_POST["CltDRNPmtBatch"]) ? $_POST["CltDRNPmtBatch"] : "";
            $sales->CltListed = isset($_POST["CltListed"]) ? $_POST["CltListed"] : "";
            $sales->CltDRNRemitBatch = isset($_POST["CltDRNRemitBatch"]) ? $_POST["CltDRNRemitBatch"] : "";
            $sales->CltColl = isset($_POST["CltColl"]) ? $_POST["CltColl"] : "";
            $sales->CltDRNShortName = isset($_POST["CltDRNShortName"]) ? $_POST["CltDRNShortName"] : "";
            $sales->CltLiq = isset($_POST["CltLiq"]) ? $_POST["CltLiq"] : "";
            $sales->CltStMonth = isset($_POST["CltStMonth"]) ? $_POST["CltStMonth"] : "";
            $sales->CltStComH = isset($_POST["CltStComH"]) ? $_POST["CltStComH"] : "";
            $sales->CltStBill = isset($_POST["CltStBill"]) ? $_POST["CltStBill"] : "";
            $sales->CltAR91 = isset($_POST["CltAR91"]) ? $_POST["CltAR91"] : "";
            $sales->CltStPdHere = isset($_POST["CltStPdHere"]) ? $_POST["CltStPdHere"] : "";
            $sales->CltStComD = isset($_POST["CltStComD"]) ? $_POST["CltStComD"] : "";
            $sales->CltStPrevB = isset($_POST["CltStPrevB"]) ? $_POST["CltStPrevB"] : "";
            $sales->CltStPdDir = isset($_POST["CltStPdDir"]) ? $_POST["CltStPdDir"] : "";
            $sales->CltStComT = isset($_POST["CltStComT"]) ? $_POST["CltStComT"] : "";
            $sales->CltOwes = isset($_POST["CltOwes"]) ? $_POST["CltOwes"] : "";
            $sales->CltStHST = isset($_POST["CltStHST"]) ? $_POST["CltStHST"] : "";
            $sales->CltOwesTtl = isset($_POST["CltOwesTtl"]) ? $_POST["CltOwesTtl"] : "";
            $sales->CltSalesFull = isset($_POST["CltSalesFull"]) ? $_POST["CltSalesFull"] : "";
            $sales->CltSalesTitle = isset($_POST["CltSalesTitle"]) ? $_POST["CltSalesTitle"] : "";
            $sales->CltSalesExt = isset($_POST["CltSalesExt"]) ? $_POST["CltSalesExt"] : "";
            $sales->CltSalesEmail = isset($_POST["CltSalesEmail"]) ? $_POST["CltSalesEmail"] : "";
            $sales->CltIntRate2 = isset($_POST["CltIntRate2"]) ? $_POST["CltIntRate2"] : "";
            $sales->LE3 = isset($_POST["LE3"]) ? $_POST["LE3"] : "";
            $sales->LE4 = isset($_POST["LE4"]) ? $_POST["LE4"] : "";
            
            return $sales;
        }
        
        public static function listSalesUsers( $companyUID ) {
            $dbConn = new HyparecMySQL();
            $conn = $dbConn->getPDOConn();
            
            $sql = $conn->prepare("call listSalesUsers ( :companyUID )");
            $sql->bindParam(":companyUID", $companyUID );
            $sql->execute();
            
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public static function getSalesInfo( $salesUID ) {
            $dbConn = new HyparecMySQL();
            $conn = $dbConn->getPDOConn();
            
            $sql = $conn->prepare("call getSalesInfo ( :salesUID )");
            $sql->bindParam(":salesUID", $salesUID );
            $sql->execute();
            
            return $sql->fetch(PDO::FETCH_ASSOC);
        }
        
        public static function addSales ( $sales ) {
            $dbConn = new HyparecMySQL();
            $conn = $dbConn->getPDOConn();
            
            $sql = $conn->prepare("call addSales ( :salesUID, :userUID, :companyUID, :addedBy, 
                :RevPanel, :CltID, :CltBill, :CltInv, :CltScrn, :CltGST, :CltStmt, :CltLgl, :CltCrBu, :CltClosed, :CltTrust, :CltBank, :CltTransit, :CltAcct,
                :CltNo, :CltGrpNo, :CltCt1, :CltCt1Title, :CltCt1Note, :CltName, :CltCt2, :CltCt2Title, :CltCt2Note, :CltAdd1, :CltCt3, :CltCt3Title, :CltCt3Note,
                :CltAdd2, :CltInstructions, :CltCity, :CltProv, :CltPCod, :CltTel1, :CltFax, :CltEmlPm, :CltReview, :CltRefNum, :CltEmIn, :CltTel2, :CltEmail,
                :CltViciList, :CltTel3, :CltACH, :SalesNoteSum, :CltImportSpec, :CltIntDeferred, :SalesStatus, :CltComRate, :CltSales, :CltWorked, :CltSpcStats,
                :CltPrefCol, :CltIntRate, :CltSalesNotes, :CltNxt, :Score, :CltNote0, :GrpNote0, :CltStartDate, :CltIndGrp, :CltDRNNo, :CltLastListed,
                :CltDRNNoteBatch, :CltDRNStatusBatch, :CltAccts, :CltDRNPmtBatch, :CltListed, :CltDRNRemitBatch, :CltColl, :CltDRNShortName, :CltLiq, :CltStMonth,
                :CltStComH, :CltStBill, :CltAR91, :CltStPdHere, :CltStComD, :CltStPrevB, :CltStPdDir, :CltStComT, :CltOwes, :CltStHST, :CltOwesTtl,
                :CltSalesFull, :CltSalesTitle, :CltSalesExt, :CltSalesEmail, :CltIntRate2, :LE3, :LE4
            )");
            $sql->bindParam(":salesUID", $sales->salesUID );
            $sql->bindParam(":userUID", $sales->userUID );
            $sql->bindParam(":companyUID", $sales->companyUID );
            $sql->bindParam(":addedBy", $sales->addedBy );
            
            $sql->bindParam(":RevPanel", $sales->RevPanel );
            $sql->bindParam(":CltID", $sales->CltID );
            $sql->bindParam(":CltBill", $sales->CltBill );
            $sql->bindParam(":CltInv", $sales->CltInv );
            $sql->bindParam(":CltScrn", $sales->CltScrn );
            $sql->bindParam(":CltGST", $sales->CltGST );
            $sql->bindParam(":CltStmt", $sales->CltStmt );
            $sql->bindParam(":CltLgl", $sales->CltLgl );
            $sql->bindParam(":CltCrBu", $sales->CltCrBu );
            $sql->bindParam(":CltClosed", $sales->CltClosed );
            $sql->bindParam(":CltTrust", $sales->CltTrust );
            $sql->bindParam(":CltBank", $sales->CltBank );
            $sql->bindParam(":CltTransit", $sales->CltTransit );
            $sql->bindParam(":CltAcct", $sales->CltAcct );
            $sql->bindParam(":CltNo", $sales->CltNo );
            $sql->bindParam(":CltGrpNo", $sales->CltGrpNo );
            $sql->bindParam(":CltCt1", $sales->CltCt1 );
            $sql->bindParam(":CltCt1Title", $sales->CltCt1Title );
            $sql->bindParam(":CltCt1Note", $sales->CltCt1Note );
            $sql->bindParam(":CltName", $sales->CltName );
            $sql->bindParam(":CltCt2", $sales->CltCt2 );
            $sql->bindParam(":CltCt2Title", $sales->CltCt2Title );
            $sql->bindParam(":CltCt2Note", $sales->CltCt2Note );
            $sql->bindParam(":CltAdd1", $sales->CltAdd1 );
            $sql->bindParam(":CltCt3", $sales->CltCt3 );
            $sql->bindParam(":CltCt3Title", $sales->CltCt3Title );
            $sql->bindParam(":CltCt3Note", $sales->CltCt3Note );
            $sql->bindParam(":CltAdd2", $sales->CltAdd2 );
            $sql->bindParam(":CltInstructions", $sales->CltInstructions );
            $sql->bindParam(":CltCity", $sales->CltCity );
            $sql->bindParam(":CltProv", $sales->CltProv );
            $sql->bindParam(":CltPCod", $sales->CltPCod );
            $sql->bindParam(":CltTel1", $sales->CltTel1 );
            $sql->bindParam(":CltFax", $sales->CltFax );
            $sql->bindParam(":CltEmlPm", $sales->CltEmlPm );
            $sql->bindParam(":CltReview", $sales->CltReview );
            $sql->bindParam(":CltRefNum", $sales->CltRefNum );
            $sql->bindParam(":CltEmIn", $sales->CltEmIn );
            $sql->bindParam(":CltTel2", $sales->CltTel2 );
            $sql->bindParam(":CltEmail", $sales->CltEmail );
            $sql->bindParam(":CltViciList", $sales->CltViciList );
            $sql->bindParam(":CltTel3", $sales->CltTel3 );
            $sql->bindParam(":CltACH", $sales->CltACH );
            $sql->bindParam(":SalesNoteSum", $sales->SalesNoteSum );
            $sql->bindParam(":CltImportSpec", $sales->CltImportSpec );
            $sql->bindParam(":CltIntDeferred", $sales->CltIntDeferred );
            $sql->bindParam(":SalesStatus", $sales->SalesStatus );
            $sql->bindParam(":CltComRate", $sales->CltComRate );
            $sql->bindParam(":CltSales", $sales->CltSales );
            $sql->bindParam(":CltWorked", $sales->CltWorked );
            $sql->bindParam(":CltSpcStats", $sales->CltSpcStats );
            $sql->bindParam(":CltPrefCol", $sales->CltPrefCol );
            $sql->bindParam(":CltIntRate", $sales->CltIntRate );
            $sql->bindParam(":CltSalesNotes", $sales->CltSalesNotes );
            $sql->bindParam(":CltNxt", $sales->CltNxt );
            $sql->bindParam(":Score", $sales->Score );
            $sql->bindParam(":CltNote0", $sales->CltNote0 );
            $sql->bindParam(":GrpNote0", $sales->GrpNote0 );
            $sql->bindParam(":CltStartDate", $sales->CltStartDate );
            $sql->bindParam(":CltIndGrp", $sales->CltIndGrp );
            $sql->bindParam(":CltDRNNo", $sales->CltDRNNo );
            $sql->bindParam(":CltLastListed", $sales->CltLastListed );
            $sql->bindParam(":CltDRNNoteBatch", $sales->CltDRNNoteBatch );
            $sql->bindParam(":CltDRNStatusBatch", $sales->CltDRNStatusBatch );
            $sql->bindParam(":CltAccts", $sales->CltAccts );
            $sql->bindParam(":CltDRNPmtBatch", $sales->CltDRNPmtBatch );
            $sql->bindParam(":CltListed", $sales->CltListed );
            $sql->bindParam(":CltDRNRemitBatch", $sales->CltDRNRemitBatch );
            $sql->bindParam(":CltColl", $sales->CltColl );
            $sql->bindParam(":CltDRNShortName", $sales->CltDRNShortName );
            $sql->bindParam(":CltLiq", $sales->CltLiq );
            $sql->bindParam(":CltStMonth", $sales->CltStMonth );
            $sql->bindParam(":CltStComH", $sales->CltStComH );
            $sql->bindParam(":CltStBill", $sales->CltStBill );
            $sql->bindParam(":CltAR91", $sales->CltAR91 );
            $sql->bindParam(":CltStPdHere", $sales->CltStPdHere );
            $sql->bindParam(":CltStComD", $sales->CltStComD );
            $sql->bindParam(":CltStPrevB", $sales->CltStPrevB );
            $sql->bindParam(":CltStPdDir", $sales->CltStPdDir );
            $sql->bindParam(":CltStComT", $sales->CltStComT );
            $sql->bindParam(":CltOwes", $sales->CltOwes );
            $sql->bindParam(":CltStHST", $sales->CltStHST );
            $sql->bindParam(":CltOwesTtl", $sales->CltOwesTtl );
            $sql->bindParam(":CltSalesFull", $sales->CltSalesFull );
            $sql->bindParam(":CltSalesTitle", $sales->CltSalesTitle );
            $sql->bindParam(":CltSalesExt", $sales->CltSalesExt );
            $sql->bindParam(":CltSalesEmail", $sales->CltSalesEmail );
            $sql->bindParam(":CltIntRate2", $sales->CltIntRate2 );
            $sql->bindParam(":LE3", $sales->LE3 );
            $sql->bindParam(":LE4", $sales->LE4 );
            
            
            $sql->execute();
            
            return $sql->errorInfo();
        }
        
        public static function editSales ( $sales ) {
            $dbConn = new HyparecMySQL();
            $conn = $dbConn->getPDOConn();
            
            $sql = $conn->prepare("call editSales ( :salesUID, :userUID, :companyUID,  
                :RevPanel, :CltID, :CltBill, :CltInv, :CltScrn, :CltGST, :CltStmt, :CltLgl, :CltCrBu, :CltClosed, :CltTrust, :CltBank, :CltTransit, :CltAcct,
                :CltNo, :CltGrpNo, :CltCt1, :CltCt1Title, :CltCt1Note, :CltName, :CltCt2, :CltCt2Title, :CltCt2Note, :CltAdd1, :CltCt3, :CltCt3Title, :CltCt3Note,
                :CltAdd2, :CltInstructions, :CltCity, :CltProv, :CltPCod, :CltTel1, :CltFax, :CltEmlPm, :CltReview, :CltRefNum, :CltEmIn, :CltTel2, :CltEmail,
                :CltViciList, :CltTel3, :CltACH, :SalesNoteSum, :CltImportSpec, :CltIntDeferred, :SalesStatus, :CltComRate, :CltSales, :CltWorked, :CltSpcStats,
                :CltPrefCol, :CltIntRate, :CltSalesNotes, :CltNxt, :Score, :CltNote0, :GrpNote0, :CltStartDate, :CltIndGrp, :CltDRNNo, :CltLastListed,
                :CltDRNNoteBatch, :CltDRNStatusBatch, :CltAccts, :CltDRNPmtBatch, :CltListed, :CltDRNRemitBatch, :CltColl, :CltDRNShortName, :CltLiq, :CltStMonth,
                :CltStComH, :CltStBill, :CltAR91, :CltStPdHere, :CltStComD, :CltStPrevB, :CltStPdDir, :CltStComT, :CltOwes, :CltStHST, :CltOwesTtl,
                :CltSalesFull, :CltSalesTitle, :CltSalesExt, :CltSalesEmail, :CltIntRate2, :LE3, :LE4
            )");
            $sql->bindParam(":salesUID", $sales->salesUID );
            $sql->bindParam(":userUID", $sales->userUID );
            $sql->bindParam(":companyUID", $sales->companyUID );
            
            $sql->bindParam(":RevPanel", $sales->RevPanel );
            $sql->bindParam(":CltID", $sales->CltID );
            $sql->bindParam(":CltBill", $sales->CltBill );
            $sql->bindParam(":CltInv", $sales->CltInv );
            $sql->bindParam(":CltScrn", $sales->CltScrn );
            $sql->bindParam(":CltGST", $sales->CltGST );
            $sql->bindParam(":CltStmt", $sales->CltStmt );
            $sql->bindParam(":CltLgl", $sales->CltLgl );
            $sql->bindParam(":CltCrBu", $sales->CltCrBu );
            $sql->bindParam(":CltClosed", $sales->CltClosed );
            $sql->bindParam(":CltTrust", $sales->CltTrust );
            $sql->bindParam(":CltBank", $sales->CltBank );
            $sql->bindParam(":CltTransit", $sales->CltTransit );
            $sql->bindParam(":CltAcct", $sales->CltAcct );
            $sql->bindParam(":CltNo", $sales->CltNo );
            $sql->bindParam(":CltGrpNo", $sales->CltGrpNo );
            $sql->bindParam(":CltCt1", $sales->CltCt1 );
            $sql->bindParam(":CltCt1Title", $sales->CltCt1Title );
            $sql->bindParam(":CltCt1Note", $sales->CltCt1Note );
            $sql->bindParam(":CltName", $sales->CltName );
            $sql->bindParam(":CltCt2", $sales->CltCt2 );
            $sql->bindParam(":CltCt2Title", $sales->CltCt2Title );
            $sql->bindParam(":CltCt2Note", $sales->CltCt2Note );
            $sql->bindParam(":CltAdd1", $sales->CltAdd1 );
            $sql->bindParam(":CltCt3", $sales->CltCt3 );
            $sql->bindParam(":CltCt3Title", $sales->CltCt3Title );
            $sql->bindParam(":CltCt3Note", $sales->CltCt3Note );
            $sql->bindParam(":CltAdd2", $sales->CltAdd2 );
            $sql->bindParam(":CltInstructions", $sales->CltInstructions );
            $sql->bindParam(":CltCity", $sales->CltCity );
            $sql->bindParam(":CltProv", $sales->CltProv );
            $sql->bindParam(":CltPCod", $sales->CltPCod );
            $sql->bindParam(":CltTel1", $sales->CltTel1 );
            $sql->bindParam(":CltFax", $sales->CltFax );
            $sql->bindParam(":CltEmlPm", $sales->CltEmlPm );
            $sql->bindParam(":CltReview", $sales->CltReview );
            $sql->bindParam(":CltRefNum", $sales->CltRefNum );
            $sql->bindParam(":CltEmIn", $sales->CltEmIn );
            $sql->bindParam(":CltTel2", $sales->CltTel2 );
            $sql->bindParam(":CltEmail", $sales->CltEmail );
            $sql->bindParam(":CltViciList", $sales->CltViciList );
            $sql->bindParam(":CltTel3", $sales->CltTel3 );
            $sql->bindParam(":CltACH", $sales->CltACH );
            $sql->bindParam(":SalesNoteSum", $sales->SalesNoteSum );
            $sql->bindParam(":CltImportSpec", $sales->CltImportSpec );
            $sql->bindParam(":CltIntDeferred", $sales->CltIntDeferred );
            $sql->bindParam(":SalesStatus", $sales->SalesStatus );
            $sql->bindParam(":CltComRate", $sales->CltComRate );
            $sql->bindParam(":CltSales", $sales->CltSales );
            $sql->bindParam(":CltWorked", $sales->CltWorked );
            $sql->bindParam(":CltSpcStats", $sales->CltSpcStats );
            $sql->bindParam(":CltPrefCol", $sales->CltPrefCol );
            $sql->bindParam(":CltIntRate", $sales->CltIntRate );
            $sql->bindParam(":CltSalesNotes", $sales->CltSalesNotes );
            $sql->bindParam(":CltNxt", $sales->CltNxt );
            $sql->bindParam(":Score", $sales->Score );
            $sql->bindParam(":CltNote0", $sales->CltNote0 );
            $sql->bindParam(":GrpNote0", $sales->GrpNote0 );
            $sql->bindParam(":CltStartDate", $sales->CltStartDate );
            $sql->bindParam(":CltIndGrp", $sales->CltIndGrp );
            $sql->bindParam(":CltDRNNo", $sales->CltDRNNo );
            $sql->bindParam(":CltLastListed", $sales->CltLastListed );
            $sql->bindParam(":CltDRNNoteBatch", $sales->CltDRNNoteBatch );
            $sql->bindParam(":CltDRNStatusBatch", $sales->CltDRNStatusBatch );
            $sql->bindParam(":CltAccts", $sales->CltAccts );
            $sql->bindParam(":CltDRNPmtBatch", $sales->CltDRNPmtBatch );
            $sql->bindParam(":CltListed", $sales->CltListed );
            $sql->bindParam(":CltDRNRemitBatch", $sales->CltDRNRemitBatch );
            $sql->bindParam(":CltColl", $sales->CltColl );
            $sql->bindParam(":CltDRNShortName", $sales->CltDRNShortName );
            $sql->bindParam(":CltLiq", $sales->CltLiq );
            $sql->bindParam(":CltStMonth", $sales->CltStMonth );
            $sql->bindParam(":CltStComH", $sales->CltStComH );
            $sql->bindParam(":CltStBill", $sales->CltStBill );
            $sql->bindParam(":CltAR91", $sales->CltAR91 );
            $sql->bindParam(":CltStPdHere", $sales->CltStPdHere );
            $sql->bindParam(":CltStComD", $sales->CltStComD );
            $sql->bindParam(":CltStPrevB", $sales->CltStPrevB );
            $sql->bindParam(":CltStPdDir", $sales->CltStPdDir );
            $sql->bindParam(":CltStComT", $sales->CltStComT );
            $sql->bindParam(":CltOwes", $sales->CltOwes );
            $sql->bindParam(":CltStHST", $sales->CltStHST );
            $sql->bindParam(":CltOwesTtl", $sales->CltOwesTtl );
            $sql->bindParam(":CltSalesFull", $sales->CltSalesFull );
            $sql->bindParam(":CltSalesTitle", $sales->CltSalesTitle );
            $sql->bindParam(":CltSalesExt", $sales->CltSalesExt );
            $sql->bindParam(":CltSalesEmail", $sales->CltSalesEmail );
            $sql->bindParam(":CltIntRate2", $sales->CltIntRate2 );
            $sql->bindParam(":LE3", $sales->LE3 );
            $sql->bindParam(":LE4", $sales->LE4 );
            $sql->execute();
            
            return $sql->errorInfo();
        }
        
        
        public static function deleteSales( $salesUID ) {
            $dbConn = new HyparecMySQL();
            $conn = $dbConn->getPDOConn();
            
            $sql = $conn->prepare("call deleteStaff ( :staffUID )");
            $sql->bindParam(":staffUID", $staffUID );
            $sql->execute();
            
            return $sql->errorInfo();
        }
        
    }
    
?>
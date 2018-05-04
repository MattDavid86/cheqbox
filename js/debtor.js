$('html, body').animate({ scrollTop: 30 },'5');

$('.datePicker').datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: 'yy-mm-dd',
    yearRange: '-0:+5'
});

$('#packageName').change(function() {
    ($('#packageName').val() == '') ? $('#packageNameGroup').addClass('has-error') : $('#packageNameGroup').removeClass('has-error');
});


function showOverlay() {
    $("#overlay").show();
}

function hideOverlay() {
    $("#overlay").hide();
}

function slug(str) {
  str = str.replace(/^\s+|\s+$/g, ''); // trim
  str = str.toLowerCase();

  // remove accents, swap � for n, etc
  var from = "�����?�������������������/_,:;";
  var to   = "aaaaaeeeeeiiiiooooouuuunc------";
  for (var i=0, l=from.length ; i<l ; i++) {
    str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
  }

  str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
    .replace(/\s+/g, '-') // collapse whitespace and replace by -
    .replace(/-+/g, '-'); // collapse dashes

  return str;
}

//Global Variables
var searchRecords = { index: 0, offset: 0, recordCount: 0, records: [], searchTerms: "", casefileUIDs: [] };

var emailListResults = new Array();
var massSMSList = new Array();
var dbidList = new Array(); 
var debtor;
var fullRecords = new Array();
//Functions

function postMessage(note, overlayShown){
    // var notes = '<div>' + $('#notes').val() + '</div>';
    var notes;
    notes = '<div>' + note + '</div>';
    
    var casefileUID = $('#casefileUID').val();
    // console.log(overlayShown);
    showOverlay();
    $.ajax({
        url: '/ajax/debtor/caseFile/notes/add',
        type: 'POST',
        data: { notes: notes, casefileUID: casefileUID },
        dataType: 'json',
        success: function (json) {
        	console.info(json);
            if (json.message == '') {
            	// console.info(json.notes);
            	if (json.notes) {
                    var casefileNotes = '<table id="tblCaseNotes" class="table">';
                    for ( var i = 0; i < json.notes.length; i++ ) {
                        var note = json.notes[i];
                        // console.info(note);
                        var initials = note.fname.charAt(0) + note.lname.charAt(0);
                        var fullname = note.fname + ' ' + note.lname;
                        
                        casefileNotes += '<tr><td class="casefileNotesDate">' + note.dateAdded + '</td><td class="casefileNotesInitials" title="' + fullname + '">' + initials + '</td><td>' + note.notes + '</td></tr>';
                    }
                    casefileNotes += '</table>';
                    $('#casefileNotes').html( casefileNotes );
                }
                
                $('#notes').val('');
            } else {
                if(overlayShown !=0){
                    $('#messagingPopupWarningMessage').html( json.message );
                    
                    $('#messagingPopupWarning').fadeIn();
                    $('#messagingPopupWarning').delay( 1200 ).fadeOut( );
                }
            }
        },
        failure: function(json) {
            sModalHTML = '<div class="alert alert-danger" role="alert">' + 
                            '    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>' + 
                            '    <span class="sr-only">Warning:</span>' + 
                            '    An error occurred while committing the information to the database.  Please try again later.' + 
                            '</div>';
              
            $('#basicInfoModalTitle').html('Information');
            $('#basicInfoModalBody').html(sModalHTML);
            $('#basicInfoModal').modal();
              
            console.info(json);
        },
        complete: function() {
            hideOverlay();
        }
    });
}

function canSendMessage() {
    var bCanSendMessage = ( $('#DBName').val() != '' ) ? true : false;
    
    ($('#DBName').val() == '') ? $('#DBNameGroup').addClass('has-error') : $('#DBNameGroup').removeClass('has-error');
    
    var fieldsIssues = new Array();
    
    if ($('#DBName').val() == '') {
        fieldsIssues.push('  Missing Debtor Name');
    }
    
    if (fieldsIssues.length > 0) {
        alert('Please ensure that all the basic fields have been entered correctly. \r\n' + fieldsIssues.join('\r\n'));
    }
    
    return bCanSendMessage;
}

function resetPackageForm() {
    //$('form#frmMainDebtor')[0].reset();
    $('#frmMainDebtor').trigger('reset');
    $("#frmMainDebtor input:hidden,#frmMainDebtor :text,#frmMainDebtor textarea").val(''); //hidden fields don't get reset by the trigger reset
    CKEDITOR.instances.ckDBLttrLog.setData('');
    CKEDITOR.instances.ckTraceNote.setData('');
    $('#DBLttrLog').val('');
    $('#TraceNote').val('');
    searchRecords.offset = 0;
    $('#casefileNotes').html( '' );
}

function newSearchTab(){
    window.open("", "", "width=200,height=200");
}

function sendSMS(){
    // window.open("callTwilio","_blank");
    var recipients = $("#smsRecipient").val();
    var message = $("#smsTxt").val();
    recipients = recipients.replace(/[\-]/g, '').replace(/[\s]+/g, '');

    //Format numbers for Texting
    if(!recipients.match(/^(\+1)/g)){
        recipients = "+1" + recipients;
    }    
    $.ajax({
        url: '/ajax/debtor/casefile/callTwilio',
        type: 'POST',
        dataType: 'json',
        data: {recipients: recipients, message: message},
        success: function (json) { 
            console.log('Worked'); 
            console.log(json);
        },
        failure: function(json) {
              console.log("Done messed up");
              console.log(json);
        },
        error: function(jqXHR){
              console.log(jqXHR); 
              var jsonResponse = JSON.parse(jqXHR.responseText);
              console.log(jsonResponse);
        },
        complete: function() { 
            hideOverlay();
        }
    });
}

function searchForRecords() {
    searchRecords.offset = 0;   //reset the offset before searching
    $('#offset').val( searchRecords.offset );   //reset the offset before searching
    
    $('#recordSearchCount').html( 'Searching...' );
    var recordSearchCountHTML = '';
    debtor = $('#frmMainDebtor').serialize(); 
    
    $('#DBLttrLog').val(CKEDITOR.instances.ckDBLttrLog.getData());
    $('#TraceNote').val(CKEDITOR.instances.ckTraceNote.getData());
    
    searchRecords.searchTerms = $('#frmMainDebtor').serialize();
    // console.info(searchRecords.searchTerms);
    showOverlay();

    $.ajax({
          url: $('#frmMainDebtor').attr("action"),  //'/ajax/debtor/caseFile/add'
          type: 'POST',
          data: searchRecords.searchTerms,
          dataType: 'json',
          success: function (json) {
              searchRecords.recordCount = json.recordCount;
              searchRecords.records = json.searchResults;
              searchRecords.index = 0;
              $('#offset').val( searchRecords.offset );
              console.log(json);
              searchRecords.offset = json.offset; 
              var firstRecord = (searchRecords.recordCount > 0) ? 1 : 0;
              recordSearchCountHTML = 'Record ' + firstRecord + ' of ' + searchRecords.recordCount;  
              closeSearch();
              getDebtorCaseFile();
              
          },
          failure: function(json, jqXHR) {
              recordSearchCountHTML = 'An error occurred.';
              console.log(JSON.parse(jqXHR.responseText));
          },
          complete: function() { 
              $('#recordSearchCount').html( recordSearchCountHTML ); 
              hideOverlay();         
              //getDBID();
              //getFullDebtorCaseFileDetails();   
          }
      });
}


function addToSearchRecords() {
    if ( searchRecords.offset < searchRecords.recordCount ) {
        
        /*start form manipulation*/
        var frmJSON = deparamToJSON(searchRecords.searchTerms);
        loadDebtorDataIntoForm( frmJSON );
        
        searchRecords.offset += 1000;
        $('#offset').val( searchRecords.offset );   //update the offset
        
        searchRecords.searchTerms = $('#frmMainDebtor').serialize();
        /*end form manipulation*/
        
        $.ajax({
              url: '/ajax/search/records/onlyCaseFile',
              type: 'POST',
              data: searchRecords.searchTerms,
              dataType: 'json',
              success: function (json) {
                  $.merge( searchRecords.records, json.searchResults ); //combine the existing searchRecords with the results from the offset
              },
              failure: function(json, jqXHR) {
                  console.log(JSON.parse(jqXHR.responseText));
              },
              complete: function() { 
                  //console.info(json);
              }
          });
    }
}

function fillSearchRecords( callbackFunctionToCall ) {
    if ( searchRecords.offset < searchRecords.recordCount ) {
        
        /*start form manipulation*/
        var frmJSON = deparamToJSON(searchRecords.searchTerms);
        loadDebtorDataIntoForm( frmJSON );
        
        searchRecords.offset += 100000;
        $('#offset').val( searchRecords.offset );   //update the offset
        
        searchRecords.searchTerms = $('#frmMainDebtor').serialize();
        /*end form manipulation*/
        
        $.ajax({
              url: '/ajax/search/records/onlyCaseFile',
              type: 'POST',
              data: searchRecords.searchTerms,
              dataType: 'json',
              success: function (json) {
                  $.merge( searchRecords.records, json.searchResults ); //combine the existing searchRecords with the results from the offset
                  
                  if ( searchRecords.offset < searchRecords.recordCount ) {
                      fillSearchRecords( callbackFunctionToCall );
                  } else {
                        searchRecords.casefileUIDs = [];
                        for ( var i = 0; i < searchRecords.records.length; i++ ) {
                            searchRecords.casefileUIDs.push( searchRecords.records[i].casefileUID );
                        }
                        
                        callbackFunctionToCall();
                  }
              },
              failure: function(json, jqXHR) {
                  console.log(JSON.parse(jqXHR.responseText));
              },
              complete: function() { 
                  //console.info(json);
              }
          });
    }
}

function getDBID(){
    //console.log('get DBIDs');
    var a = new Date();
    // $("#docLetterBtn").removeClass("disabled");
    $.ajax({
        url: '/debtors/caseFile/getID',
        type: 'POST',
        data: searchRecords.searchTerms,
        dataType: 'json',
        success: function (json) {
            var b = new Date();
            console.log('Get IDs worked');
            console.log(json);
            console.log('Time Taken: ' + (b.getTime()-a.getTime())/1000);
        },
        failure: function(json, jqXHR) {
            console.log(JSON.parse(jqXHR.responseText));
        },
        error: function(jqXHR){
            console.log(jqXHR); 
            var jsonResponse = JSON.parse(jqXHR.responseText);
            console.log(jsonResponse);
        },
        complete: function() { 
            //console.info(json);
        }
    });
}


/**
* Matthew David
* 
* The following functions are built to fit the below purposes
*     -The ability to call them inline HTML without checks or arrays
*     -The ability to check the existence of a setting without previous logic
*     -Easily readable
*
* NOTE: the functions below utilize the private function _getAssociationSettings
*/

function searchForEmails() {
    var DBID = searchRecords.records[searchRecords.index].DBID; 
    var note = $('#notes').val();
    console.log(searchRecords); 
    $.ajax({
          url: "/ajax/debtor/caseFile/emails",
          type: 'POST',
          data: { DBID: DBID}, 
          success: function (json) {
                console.log('Emails');
                console.log(json.emailList);  
                console.log(json);  
                
                console.log($("#emailList").length);
                if(json.emailList[0].DBEmail ==""){
                    $("#emailList").append('<option id="txtdebtorEmail" value="No Email On Account">No Email On Account</option>"');    
                }else{
                    $("#emailList").append('<option id="txtdebtorEmail" value="'+json.emailList[0].DBEmail +'">'+json.emailList[0].DBEmail +'</option>"');
                }
                $("#emailList").append('<option id="userEmail" value="'+json.userEmail['email']+ '">'+json.userEmail['email'] +'</option>"');
                
                
                $('#caseID').val(json.emailList[0].DBID);
                $('#messageTxt').text(note);
          },
          failure: function(json) {
                console.log("Done messed up");
                console.log(json);
          },
          error: function(jqXHR){
                console.log(jqXHR); 
                var jsonResponse = JSON.parse(jqXHR.responseText);
                console.log(jsonResponse);
          },
          complete: function() { 
              hideOverlay();
          }
      });
}

function loadFromSearchRecords( incrementLevel ) {
    if (searchRecords.records.length > 0) {
        
        //saveCaseFileDetails();  //save the case you were editing
        
        switch ( incrementLevel ) {
            case 'decrease':
                searchRecords.index = ( (searchRecords.index-1) < 0 ) ? searchRecords.records.length-1 : searchRecords.index-1;
                break;
            case 'increase':
                searchRecords.index = ( (searchRecords.index+1) > searchRecords.records.length-1 ) ? 0 : searchRecords.index+1;
                break;
            case 'end':
                searchRecords.index = searchRecords.records.length-1;
                break;
            case 'start':   //reduce by the limit (1000) until we reach 0
                searchRecords.index = ( (searchRecords.index+1) > 1000 ) ? searchRecords.index-1000 : 0 ;
                break;
            default:
                searchRecords.index = 0;
                break;
        }
        
        if ( searchRecords.index == (searchRecords.records.length-1) ) {
            addToSearchRecords();
        }    
        
        getDebtorCaseFile( );
    } else {
        $('#messagingPopupWarningMessage').html( 'No records to scroll through' );
        
        $('#messagingPopupWarning').fadeIn();
        $('#messagingPopupWarning').delay( 800 ).fadeOut( );
    }
}


function getDebtorCaseFile( ) {
    if ( searchRecords.records.length > 0 ) {
        var DBID = searchRecords.records[searchRecords.index].DBID;
        var casefileUID = searchRecords.records[searchRecords.index].casefileUID;
        var offset = searchRecords.offset;
        $.ajax({
          url: '/ajax/search/getDebtorCaseFile',
          type: 'POST',
          data: { casefileUID: casefileUID },
          dataType: 'json',
          success: function (json) {
              
            $('#recordSearchCount').html( 'Record ' + (searchRecords.index+1) + ' of ' + searchRecords.recordCount ); 
            $('#recordSearchCount').html( 'Record ' + (searchRecords.index+1) + ' of ' + searchRecords.recordCount );

                
                loadDebtorDataIntoForm( json.casefile );
                // console.log(json.casefile);
          },
          failure: function(json) {
              console.info( json );
              console.log(JSON.parse(jqXHR.responseText));
          },
          complete: function() {
              hideOverlay();
          }
      });
    }
}//end getDebtorCaseFile

function loadDebtorDataIntoForm( casefile ) {
    $('#DBID').val( casefile.DBID );
    $('#DBTitle').val( casefile.DBTitle );
    $('#DBComm').val( casefile.DBComm );
    $('#DBName').val( casefile.DBName );
    $('#DBAdd1').val( casefile.DBAdd1 );
    $('#DBAdd2').val( casefile.DBAdd2 );
    $('#DBCity').val( casefile.DBCity );
    $('#DBProv').val( casefile.DBProv );
    $('#DBPCod').val( casefile.DBPCod );
    $('#DBCnt').val( casefile.DBCnt );
    $('#DBSAdd').val( casefile.DBSAdd );
    $('#DBCountry').val( casefile.DBCountry );
    
    $('#DB2Name').val( casefile.DB2Name );
    $('#DB2Add1').val( casefile.DB2Add1 );
    $('#DB2Add2').val( casefile.DB2Add2 );
    $('#DB2City').val( casefile.DB2City );
    $('#DB2Prov').val( casefile.DB2Prov );
    $('#DB2PCod').val( casefile.DB2PCod );
    $('#DB2Tel').val( casefile.DB2Tel );
    $('#DB2SIN').val( casefile.DB2SIN );
    $('#DB2Rel').val( casefile.DB2Rel );
    $('#DB2DOB').val( casefile.DB2DOB );
    
    $('#DBCltNo').val( casefile.DBCltNo );
    //$('#DBClt').val( casefile.DBClt );
    $('#DBSalesRep').val( casefile.DBSalesRep );
    $('#DBCollNum').val( casefile.DBCollNum );
    $('#DBTracNum').val( casefile.DBTracNum );
    $('#DBLglNum').val( casefile.DBLglNum );
    $('#DBComRate').val( casefile.DBComRate );
    $('#DBRefNum').val( casefile.DBRefNum );
    $('#DBListed').val( casefile.DBListed );
    $('#DBStatus').val( casefile.DBStatus );
    $('#DBCrBu').val( casefile.DBCrBu );
    $('#CrBuOn').val( casefile.CrBuOn );
    
    $('#DBTel1').val( casefile.DBTel1 );
    $('#DBTel2').val( casefile.DBTel2 );
    $('#DBTel3').val( casefile.DBTel3 );
    $('#DBEmail').val( casefile.DBEmail );
    $('#POE').val( casefile.POE );
    $('#PTel').val( casefile.PTel );
    $('#DBBTC').val( casefile.DBBTC );
    $('#DBList').val( casefile.DBList );
    $('#DBIncurred').val( casefile.DBIncurred );
    //$('#DBPd').val( casefile.DBPd );
    //$('#DBLPay').val( casefile.DBLPay );
    //$('#DBAdj').val( casefile.DBAdj );
    $('#DBWorked').val( casefile.DBWorked );
    //$('#DBBal').val( casefile.DBBal );
    $('#DBIntRate').val( casefile.DBIntRate );
    $('#DBItIntDef').val( casefile.DBItIntDef );
    $('#DBNxt').val( casefile.DBNxt );
    $('#DBPriority').val( casefile.DBPriority );
    $('#DBColNot').val( casefile.DBColNot );
    $('#DBScore').val( casefile.DBScore );
    $('#TUCScore').val( casefile.TUCScore );
    //$('#DBGrpFlag').val( casefile.DBGrpFlag );
    //$('#DBBranch').val( casefile.DBBranch );
    
    $('#DBSIN').val( casefile.DBSIN );
    $('#DBDOB').val( casefile.DBDOB );
    $('#DBDLNum').val( casefile.DBDLNum );
    $('#DBCCNum').val( casefile.DBCCNum );
    $('#DBAKA').val( casefile.DBAKA );
    $('#DBCCExp').val( casefile.DBCCExp );
    $('#DBOrigCreditory').val( casefile.DBOrigCreditory );
    $('#DBComment1').val( casefile.DBComment1 );
    $('#DBComment2').val( casefile.DBComment2 );
    
    $('#DBPOEAddress').val( casefile.DBPOEAddress );
    $('#DBPOECity').val( casefile.DBPOECity );
    $('#DBPOEProv').val( casefile.DBPOEProv );
    $('#DBPOEPostalCode').val( casefile.DBPOEPostalCode );
    $('#DBPOEContact').val( casefile.DBPOEContact );
    $('#DBPOEFax').val( casefile.DBPOEFax );
    $('#DBPOEJobTitle').val( casefile.DBPOEJobTitle );
    $('#DBPOESalary').val( casefile.DBPOESalary );
    $('#DBPOENote').val( casefile.DBPOENote );
    
    $('#CltInfo1').val( casefile.CltInfo1 );
    $('#CltInfo2').val( casefile.CltInfo2 );
    $('#CltInfo3').val( casefile.CltInfo3 );
    $('#CltInfo4').val( casefile.CltInfo4 );
    $('#CltInfo5').val( casefile.CltInfo5 );
    $('#CltInfo6').val( casefile.CltInfo6 );
    $('#CltInfo7').val( casefile.CltInfo7 );
    
    $('#DBLttrLog').val( casefile.DBLttrLog );
    CKEDITOR.instances.ckDBLttrLog.setData( casefile.DBLttrLog );
    
    $('#TraceNote').val( casefile.TraceNote );
    CKEDITOR.instances.ckTraceNote.setData( casefile.TraceNote );
    
    $('#LGLClaim').val( casefile.LGLClaim );
    $('#LGLPreJudgement').val( casefile.LGLPreJudgement );
    $('#LGLCourtAddress').val( casefile.LGLCourtAddress );
    $('#LGLPostJudgement').val( casefile.LGLPostJudgement );
    $('#LGLSchedA').val( casefile.LGLSchedA );
    $('#LGLJudgementIntRate').val( casefile.LGLJudgementIntRate );
    $('#LGLAmtClaimed').val( casefile.LGLAmtClaimed );
    $('#LGLJudgDate').val( casefile.LGLJudgDate );
    $('#LGLCourtCosts').val( casefile.LGLCourtCosts );
    $('#LGLJudgAmt').val( casefile.LGLJudgAmt );
    
    $('#DBPadDate').val( casefile.DBPadDate );
    $('#DBBankNo').val( casefile.DBBankNo );
    $('#DBPadAmt').val( casefile.DBPadAmt );
    $('#DBTransitNo').val( casefile.DBTransitNo );
    $('#DBPadTrm').val( casefile.DBPadTrm );
    $('#DBAcctNo').val( casefile.DBAcctNo );
    $('#DBPadLft').val( casefile.DBPadLft );-
    $('#DBAcctName').val( casefile.DBAcctName );
    $('#DBPadAct').val( casefile.DBPadAct );
    
    //$('#Note0').val( casefile.Note0 );
    //$('#DBGrpID').val( casefile.DBGrpID );
    
    $('#DBViciLoad').val( casefile.DBViciLoad );
    
    $('#casefileUID').val( casefile.casefileUID );
    
    if (casefile.notes) {
        var casefileNotes = '<table id="tblCaseNotes" class="table">';
        for ( var i = 0; i < casefile.notes.length; i++ ) {
            var note = casefile.notes[i];
            var initials = note.fname.charAt(0) + note.lname.charAt(0);
            var fullname = note.fname + ' ' + note.lname;
            
            casefileNotes += '<tr><td class="casefileNotesDate">' + note.dateAdded + '</td><td class="casefileNotesInitials" title="' + fullname + '">' + initials + '</td><td>' + note.notes + '</td></tr>';
        }
        casefileNotes += '</table>';
        $('#casefileNotes').html( casefileNotes );
    }
}


function addWorkDays(days) {
    // Get the day of the week as a number (0 = Sunday, 1 = Monday, .... 6 = Saturday)
    var startDate = new Date();
    var dow = startDate.getDay();
    var daysToAdd = parseInt(days);
    
    // If the current day is Sunday add one day
    if (dow == 0)
        daysToAdd++;
    // If the start date plus the additional days falls on or after the closest Saturday calculate weekends
    if (dow + daysToAdd >= 6) {
        //Subtract days in current working week from work days
        var remainingWorkDays = daysToAdd - (5 - dow);
        //Add current working week's weekend
        daysToAdd += 2;
        if (remainingWorkDays > 5) {
            //Add two days for each working week by calculating how many weeks are included
            daysToAdd += 2 * Math.floor(remainingWorkDays / 5);
            //Exclude final weekend if remainingWorkDays resolves to an exact number of weeks
            if (remainingWorkDays % 5 == 0)
                daysToAdd -= 2;
        }
    }
    
    console.info(daysToAdd);
    console.info(dow);
    startDate.setDate(startDate.getDate() + daysToAdd);
    
    return startDate;
}

//Function to email everyone attached to a debtor account
function emailPostMessage(){
    
    var recipients= "";
    var caseNumber= $("#caseID").val();
    var subject ="New Note on Account: " + caseNumber;
    var message = $("#messageTxt").val();
    var body = "There has been a new note posted on account:  "+ caseNumber
                +".%0D%0A \""+message+"\"";
    // var body = "There has been a new note posted on account:  "+ caseNumber
    //             +"\""+message+"\"";

    $("#frmPostShareEmail :input[type=text]").each(function($this){
       recipients += $(this).val() +";"; 
       recipients += $(this).text()+ ";"; 
    });

    var paymentWizard = $("#frmDebtorEmail").serialize();
    //console.log(paymentWizard); 

    // recipients = recipients.replace(/,| /g,";").replace(/;;/,";");
        
    location.href="mailto:"+recipients+"?subject="+encodeURI(subject)+"&body="+body;
    $("#otherEmail").val("");
    $("#messageTxt").val("");
}//end emailPostMessage

//For Email Btn
function getDebtorEmail(){
    var DBID = searchRecords.records[searchRecords.index].DBID; 
    $.ajax({
    url: "/ajax/debtor/caseFile/emails",
    type: 'POST',
    data: { DBID: DBID}, 
    success: function (json) { 
        // console.log(json.emailList[0]);  
        if(json.emailList[0].DBEmail){
            $('#debtorEmail').val(json.emailList[0].DBEmail); 
        } else{ 
            $('#debtorEmail').val("No Contact Email"); 
        }

        $('#caseID').val(json.emailList[0].DBID);
    },
    failure: function(json) {
        //console.log("Done messed up");
        console.log(json);
    },
    error: function(jqXHR){
        console.log(jqXHR); 
        var jsonResponse = JSON.parse(jqXHR.responseText);
        console.log(jsonResponse);
    },
    complete: function() { 
        hideOverlay();
    }
    }); 
}

function getMassDebtorEmail(){
    showOverlay();
    //console.log(dbidList.length);
    var numMissingEmails =0;
    var missingEmailAccounts = new Array();
        // var DBID = dbidList[x].DBID;
        $.ajax({
            url: "/ajax/debtor/caseFile/getMassEmail",
            type: 'POST',
            data: { dbidList: dbidList}, 
            success: function (json) { 
                // console.log(searchRecords); 
                // console.log('EMAIL paymentWizard');
                //console.log(json.emailList); 
                for(var x=0; x < json.emailList.length; x++){
                    if(!json.emailList[x][0].DBEmail){
                        numMissingEmails++;
                        missingEmailAccounts.push(json.emailList[x][0].DBID);
                    }else{
                        emailListResults.push(json.emailList[x][0].DBEmail);
                    }
                }                
                $("#massNumberEmails").val(emailListResults.length);
                // $("#massMissingEmails").val(numMissingEmails);
            },
            failure: function(json) {
                console.log("Done messed up");
                console.log(json);
            },
            error: function(jqXHR){
                console.log(jqXHR); 
                var jsonResponse = JSON.parse(jqXHR.responseText);
                console.log(jsonResponse);
            },
            complete: function() { 
                hideOverlay();
            }
        });
}

/**
 * 
 */
function emailMessage(){
    var recipients= "";
    var caseNumber= $("#caseID").val();
    var subject ="New Note on Account: " + caseNumber;
    var message = $("#emailMessageTxt").val();
    var body = "There has been a new note posted on account: "+ caseNumber
                +".%0D%0A \" "+message+"\"";
    // var body = "There has been a new note posted on account:  "+ caseNumber
    //             +"\" "+message+"\"";

    recipients = $("#debtorEmail").val();
    // $("form#frmDebtorEmail :input[type=text], p").each(function($this){
    //    recipients += ";"+$(this).val(); 
    //    recipients += ";"+$(this).text(); 
    // });

    location.href="mailto:"+recipients+"?subject="+subject+"&body="+body;
    $("#debtorEmail").val("");
    $("#emailMessageTxt").val("");
}

function emailMassMessages(){
    var DBID = searchRecords.records[searchRecords.index].DBID;
    var caseFileUID = searchRecords.records[searchRecords.index].casefileUID; 
     
    $.ajax({
        url: "/ajax/debtor/casefile/sendEmail",
        type: 'POST',
        data: { DBID: DBID, emailListResults:emailListResults}, 
        success: function (json) {
                console.log('Worked');
                console.log(json);
            },
            failure: function(json) {
                console.log("Done messed up");
                console.log(json);
            },
            error: function(jqXHR){
                console.log(jqXHR); 
                var jsonResponse = JSON.parse(jqXHR.responseText);
                console.log(jsonResponse);
            },
            complete: function() { 
                hideOverlay();
            }
        });
}


function getDebtorContactNumbers(){
    var DBID = searchRecords.records[searchRecords.index].DBID;
    var caseFileUID = searchRecords.records[searchRecords.index].casefileUID;

    $.ajax({
        url: "/ajax/debtor/casefile/contactNumber",
        type: "POST",
        data: {DBID: DBID, casefileUID: caseFileUID},
        success: function(json){
            console.log(json.success); 
            console.log("Worked");
            var contactNumber = "";
            if(json.success[0].DBTel1){
                $('#smsRecipient').val(json.success[0].DBTel1);    
            }
            else if(json.success[0].DBTel2){
                $('#smsRecipient').val(json.success[0].DBTel2);    
            }
            else if(json.success[0].DBTel3){
                $('#smsRecipient').val(json.success[0].DBTel3);    
            }
            else
                $('#smsRecipient').val("No Contact Number");    
        },
        failure: function(json){
            console.log(json);
            console.log("Failure");
        },
        error: function(jqXHR){
            console.log("Error");
            console.log(jqXHR); 
            var jsonResponse = jqXHR.responseText;
            console.log(jsonResponse);
        },
        complete: function(){
            hideOverlay();
        }
    }); 
}

function getMassDebtorContactNumbers(){
    var DBID = searchRecords.records[searchRecords.index].DBID;
    var DBName = $("#DBName").val();
    var caseFileUID = searchRecords.records[searchRecords.index].casefileUID;
    var missingPhoneNumbers=0;
    var missingPhoneAccounts = Array();
    $.ajax({
        url: "/ajax/debtor/casefile/massSMS",
        type: "POST",
        data: {dbidList: dbidList},
        success: function(json){
            console.log(json); 
            console.log("Worked");
            // console.log(json.phoneList);  
            var numResults = json.phoneList.length;
            
            for(var x=0; x< numResults; x++){
                if(json.phoneList[x][0].DBTel1){
                    var recipient = json.phoneList[x][0].DBTel1.replace(/[\-]/g, '').replace(/[\s]+/g, '');
                    
                    //Format numbers for Texting
                    if(!recipient.match(/^(\+1)/g)){
                        recipient = "+1" + recipient;
                    }
                    massSMSList.push(recipient);
                }
                else if(json.phoneList[x][0].DBTel2){
                    var recipient = json.phoneList[x][0].DBTel2.replace(/[\-]/g, '').replace(/[\s]+/g, '');
                    
                    //Format numbers for Texting
                    if(!recipient.match(/^(\+1)/g)){
                        recipient = "+1" + recipient;
                    }
                    massSMSList.push(recipient);
                }
                else if(json.phoneList[x][0].DBTel3){
                    var recipient = json.phoneList[x][0].DBTel3.replace(/[\-]/g, '').replace(/[\s]+/g, '');
                    
                    //Format numbers for Texting
                    if(!recipient.match(/^(\+1)/g)){
                        recipient = "+1" + recipient;
                    }
                    massSMSList.push(recipient);
                }     
                else{ 
                    missingPhoneAccounts.push(json.phoneList[x].DBID);
                }
            }
            
            $('#numOfRecipients').val(massSMSList.length); 
            // console.log(missingPhoneAccounts.length);
            // console.log(massSMSList);
            for(var x=0; x < massSMSList.length; x++){
                console.log(massSMSList[x]);
            }
        },
        failure: function(json){
            console.log(json);
            console.log("Failure");
        },
        error: function(jqXHR){
            console.log("Error");
            console.log(jqXHR); 
            var jsonResponse = JSON.parse(jqXHR.responseText);
            console.log( jsonResponse);
        },
        complete: function(){
            hideOverlay();
        }
    }); 
}

function sendSMS(event){
    var recipients = $("#smsRecipient").val();
    var message = $("#smsTxt").val();
    recipients = recipients.replace(/[\-]/g, '').replace(/[\s]+/g, '');

    //Format numbers for Texting
    if(!recipients.match(/^(\+1)/g)){
        recipients = "+1" + recipients;
    }
    
    $.ajax({
        url: '/ajax/debtor/casefile/callTwilio',
        type: 'POST',
        dataType: 'json',
        data: {recipients: recipients, message: message},
        success: function (json) { 
            console.log('Worked'); 
            console.log(json);
        },
        failure: function(json) {
              console.log("Done messed up");
              console.log(json);
        },
        error: function(jqXHR){
              console.log(jqXHR); 
              var jsonResponse = JSON.parse(jqXHR.responseText);
              console.log(jsonResponse);
        },
        complete: function() { 
            hideOverlay();
        }
    });
    
 } //end sendSMS

 function sendMassSMS(){
    event.preventDefault();
    var numberOfContacts = Number($("#numOfRecipients").val());
    var message = $("#massSmsMsgTxt").val();
    var delay = $("#delayValueTxt").val();
    var delayInSecs =1000;
    var smsCount =0;

    
    if(delay != ""){
        delayInSecs = Number(delay) * 1000;
        console.log(delayInSecs);
    }
    $.ajax({
        url: '/ajax/debtor/casefile/callTwiliopaymentWizard',
        type: 'POST',
        dataType: 'json',
        data: {phoneList: massSMSList, message: message},
        success: function (json) { 
            console.log('Worked'); 
            console.log(json);
        },
        failure: function(json) {
              console.log("Done messed up");
              console.log(json);
        },
        error: function(jqXHR){
              console.log(jqXHR); 
              var jsonResponse = JSON.parse(jqXHR.responseText);
              console.log(jsonResponse);
        },
        complete: function() { 
            hideOverlay();
        }
    });

    // var msgDelay = setInterval(function(){
        // for(var x=0; x < numberOfContacts; x++){ 
            // smsCount++;

            //thiis where the the sms third party would go
    //         if(smsCount == numberOfContacts)
    //             stopFunction();
    //     }
    // }, delayInSecs);


    // function stopFunction(){
    //     clearInterval(msgDelay);
    //     // alert(smsCount + " messages were sent out of " +smsCount+" messages");
    // }

    $("#delayValueTxt").val("");
    $("#smsRecipient").val("");
    $("#massSmsMsgTxt").val("");

 }

function swapFormToSearch( ) {
    $('#frmMainDebtor').attr('action', '/ajax/search/records');
    $('#formSearchButtons').show();
    //$('#mailButtons').hide();
    $('#DBID').attr('readonly', false);
    $('#isSearch').val('TRUE');
    $('#casefileNotes').html( '' );
    
    var frmJSON = deparamToJSON(searchRecords.searchTerms);
    loadDebtorDataIntoForm( frmJSON );
}

function closeSearch( ) {
    $('#frmMainDebtor').attr('action', '/ajax/debtor/caseFile/edit');
    $('#formSearchButtons').hide();
    //$('#mailButtons').show();
    $('#DBID').attr('readonly', true);
    $('#isSearch').val('FALSE');
}

function writeCasefileDoc(){
    var keys="";
    var keyArray = new Array();
    var values = "";
    console.log('Keys');
    var a = new Date();
    for(key in fullRecords[0][0]){
        keys += key+",";
        keyArray.push(key); 
    }  
    keys = keys.slice(0, -1);

    $.ajax({
        // url: '/debtors/caseFile/mergeDoc',
        url: '/debtors/caseFile/testDoc',
        type: 'POST', 
        // data:{keys:keys, fullRecords:fullRecords},
        data:{keys:keys},
        dataType: 'json',
        success: function(json){
            console.log('Worked'); 
            var b = new Date();
            console.log(json);
            
            console.log("Total Time: " + (b.getTime()-a.getTime())/1000);
            // window.open("/caseFile/mailmerge","_blank");
        },
        failure: function(json) {
              console.log("Done messed up");
            //   console.log(json);
        },
        error: function(jqXHR){
              console.log('Error');
              console.log(jqXHR); 
              var jsonResponse = JSON.parse(jqXHR.responseText);
              console.log(jsonResponse);
            //   window.open("/caseFile/mailmerge","_blank");
        },
        complete: function() { 
            hideOverlay();
            $("#docLetterBtn").removeClass("disabled");
        } 
    });
}

function getFullDebtorCaseFileDetails(){ 
    var a = new Date();     
    $.ajax({
        url: '/ajax/debtor/casefile/debtorCasefiles',
        type: 'POST',
        // data: {debtor: debtor, keys: keys, values: values},
        // data: {searchRecords: searchRecords},
        dataType: 'json',
        success: function(json){        
            // console.log(json);     
            console.log('after');
            var count = Object.keys(json.SearchRecords).length; 
            
            for(var x=0; x < count; x++){
                fullRecords.push(json.SearchRecords[x]);
            }               
            // for(var x=0; x < count; x++){
            //     console.log(fullRecords[x]);
            // }

            writeCasefileDoc();
            var b = new Date();
            console.log((b.getTime()-a.getTime())/1000);
        },
        failure: function(json) {
            console.log("Done messed up");
            console.log(json);
      },
      error: function(jqXHR){
            console.log(jqXHR); 
            var jsonResponse = JSON.parse(jqXHR.responseText);
            console.log(jsonResponse);
      },
      complete: function() { 
          hideOverlay(); 
          console.log('Finished Get Full Debtor Casefile Details');
      }
    });

}

function createCasefileDoc(){
 
    $.ajax({
        url: '/debtors/caseFile/createDoc',
        type: 'POST',
        data:{fullRecords: fullRecords},
        dataType: 'json',
        success: function(json){
            console.log('Worked'); 
            console.log(json);
            // window.open("/caseFile/mailmerge","_blank");
        },
        failure: function(json) {
              console.log("Done messed up");
            //   console.log(json);
        },
        error: function(jqXHR){
              console.log('Error');
              console.log(jqXHR); 
              var jsonResponse = JSON.parse(jqXHR.responseText);
              console.log(jsonResponse);
            //   window.open("/caseFile/mailmerge","_blank");
        },
        complete: function() { 
            hideOverlay();
        } 
    });
}


/**
 * Takes the serialized form data and separates it into two strings, keys and values
 */
function formDataSource(formData, returnString){ 
    //Deserialize the Form Data
    formData= formData.replace(/\+/g, '%20');
    var formattedStr = formData.split("&"); 
    var formKeys="";
    var formValues="";
    var textFileData="";
    $.each(formattedStr, function(i, pair){
        var nameValue = pair.split("=");
        var keys = decodeURIComponent(nameValue[0]);
        var value = decodeURIComponent(nameValue[1]);   
            formKeys += keys+",";
            formValues += value+","; 
        
    });  
    if(returnString == 'key'){
        textFileData = formKeys;
    } 
    if(returnString=='values'){
        textFileData = formValues;
    }
    textFileData = textFileData.slice(0, -1);
    var paymentWizard = textFileData.split(",");
    // console.log(textFileData);
    // console.log(paymentWizard.length);
    return textFileData;
}


function saveCaseFileDetails() {
    var frmAction = $('#frmMainDebtor').attr('action');
    console.info(frmAction);
    if ( frmAction == '/ajax/debtor/caseFile/edit' ) {
        showOverlay();
          
        $('#DBLttrLog').val(CKEDITOR.instances.ckDBLttrLog.getData());
        $('#TraceNote').val(CKEDITOR.instances.ckTraceNote.getData());
        
        var DBList = accounting.formatMoney($('#DBList').val()).replace('$','').replace(/,/g,'');
        $('#DBList').val(DBList);
        var DBPOESalary = accounting.formatMoney($('#DBPOESalary').val()).replace('$','').replace(/,/g,'');
        $('#DBPOESalary').val(DBPOESalary);
        var DBPadAmt = accounting.formatMoney($('#DBPadAmt').val()).replace('$','').replace(/,/g,'');
        $('#DBPadAmt').val(DBPadAmt);
        
        var sModalHTML = '';
        
        //grab all form data  
        $.ajax({
          url: $('#frmMainDebtor').attr("action"),
          type: 'POST',
          data: $('#frmMainDebtor').serialize(),
          dataType: 'json',
          success: function (json) {
              if (json.success[0] == '00000') {
                  //sModalHTML = '<div>The case file has been saved</div><div><a href="/debtors/list" class="btn btn-warning">Back To List</a></div>';
                  sModalHTML = '';
                  
                  if ('{{ @formSubmitURL }}' == '/ajax/debtor/caseFile/add') {
                      resetPackageForm();
                  }
              } else {
                  sModalHTML = '<div class="alert alert-danger" role="alert">' + 
                               '    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>' + 
                               '    <span class="sr-only">Warning:</span>' + 
                               '    An error occurred while committing the information to the database. Please try again later.' + 
                               '</div>';
                  //console.info(json);
              }
          },
          failure: function(json) {
              sModalHTML = '<div class="alert alert-danger" role="alert">' + 
                               '    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>' + 
                               '    <span class="sr-only">Warning:</span>' + 
                               '    An error occurred while committing the information to the database.  Please try again later.' + 
                               '</div>';
              console.info(json);
          },
          complete: function() {
              if ( sModalHTML != '' ) {
                  $('#basicInfoModalTitle').html('Information');
                  $('#basicInfoModalBody').html(sModalHTML);
                  $('#basicInfoModal').modal();
              }
              
              hideOverlay();
          }
      });
    }
}

function PopupCenter(url, title, w, h) {
    // Fixes dual-screen position                         Most bpmtRowsers      Firefox
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

    var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    var left = ((width / 2) - (w / 2)) + dualScreenLeft;
    var top = ((height / 2) - (h / 2)) + dualScreenTop;
    var newWindow = window.open(url, title, 'location=yes, ,scrollbars=no, width=' + w + ', height=' + h + ', top=' 
                                + top + ', left=' + left);

    // Puts focus on the newWindow
    if (window.focus) {
        newWindow.focus();
    }
    return newWindow;
}

var wizCount=0;
function paymentWizard(){ 
    var DBID = $('#DBID').val();
    var message="Debtor Number?";
    var modalHtml ='<div class="col-md-6">'+
               '<p>'+message+'</p>'+
                    '<input type="text" name="modal'+DBID+'" id="modal'+DBID+'" class="form-control confirm" maxlength="45" value="'+DBID+'"/>'+
                '</div>';

    $('#basicPaymentWizardModalTitle').html('Information'); 
    $('#basicPaymentWizardModalBody').html(modalHtml);
    $('#basicPaymentWizardModal').modal();
    console.log('Debtor Number');
    // wizCount++;
}


function paymentMethod(){

    var id = $('#paymentType option:selected').attr("id");
    console.log(id);
    switch(id){
        case 'clientAdjustment':
        break;

        case 'cashPayment':
        break;

        case 'ccPayment':
            // ccModal();
            $('#pmtMethodBtn').attr('data-target','#ccPaymentModal');
            $('#modalPmtAmount').val($('#DBPd').val());
            $('#modalPmtCCNum').val($('#DBCCNum').val());
            var exp = $('#DBCCExpMonth').val() +'/'+$('#DBCCExpYear').val();
            $('#modalPmtCCExp').val(exp);
            $('#modalPmtCreditCardHolder').val($('#DBName').val());
            $('#modalPmtCCEmail').val($('#DBEmail').val());
        break;
        
        case 'EFTPayment':
        break;
        
        case 'moPayment':
        break;
        
        case 'ACHPayment':
        break;

        case 'clientPayment':
        break;
        
        case 'promisePayment':
        break;
        
        default:
        break;
        
    }
}
var payFieldCount=0;
function showPaymentFields(){ 
    if(payFieldCount > 5)
    payFieldCount=0;

    $('#pmtConfirmBtn'+(payFieldCount+1)).addClass('hidden');
    switch(payFieldCount){
        case 0:{
            $('.pmtRow1').removeClass('hidden');
            break;
        }
        case 1:{
            $('.pmtRow2').removeClass('hidden');
            break;
        }
        case 2:{
            $('.pmtRow3').removeClass('hidden');
            break;
        }
        case 3:{
            $('.pmtRow4').removeClass('hidden');
            break;
        }
        case 4:{
            $('.pmtRow5').removeClass('hidden');
            break;
        }
        case 5:{
            $('.pmtRow6').removeClass('hidden');
            break;
        }
        default:{
            // console.log('too far');
        }
    }
    payFieldCount++;
} 
function populatePmtModal(){
    $('#debtorNumberTxt').val($('#DBID').val());
    $('#pmtModalCollectorPaymentModalTxt').val($('#DBCollNum').val());
    var today = new Date();
    $('#pmtModalPaymentDateTxt').val(today.getFullYear()+' / '+(today.getMonth()+1)+' / '+today.getDate());
}

function loadUserCaseFiles() {
    console.info('loadUserCaseFiles() - needs to be built to initialize the page with the users records');
}

function openWordDoc(){
    var templateID = $("#templateID").val();
    console.log(templateID);
    $.ajax({
        url: '/ajax/debtors/caseFile/createDoc',
        type: 'POST',
        data:{templateID: templateID},
        dataType: 'json',
        success: function(json){
            console.log('Worked'); 
            console.log(json);
            // window.open("/caseFile/mailmerge","_blank");
        },
        failure: function(json) {
              console.log("Done messed up");
            //   console.log(json);
        },
        error: function(jqXHR){
              console.log('Error');
              console.log(jqXHR); 
              var jsonResponse = JSON.parse(jqXHR.responseText);
              console.log(jsonResponse);
            //   window.open("/caseFile/mailmerge","_blank");
        },
        complete: function() { 
            hideOverlay();
        } 
    }); 
}


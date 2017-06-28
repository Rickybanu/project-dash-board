<?php 
ob_start();
session_start();
$link=mysql_pconnect("localhost","root","") or die("Sorry, Database Could Not be Connected !");
mysql_select_db("vehicle_tracking",$link);
if(!isset($_SESSION['userid'])){
	header("Location: index.php");
}
if(isset($_REQUEST['emp_emailId'])){

	$emailId = $_REQUEST['emp_emailId'];
	$res="select * from employee_details where `emp_emailId`='$emailId'";

				$result = mysql_query($res);
				  				  $num_rows = mysql_num_rows($result);
								   $row = mysql_fetch_array($result);
								   
								if($num_rows == 1)
								{   
									$_REQUEST['Msg'] = "Error";
								
								}else{
									$birthdateArr = explode("/",$_REQUEST['datebirth']);
		
									$birthDateStr = $birthdateArr[2]."-".$birthdateArr[0]."-".$birthdateArr[1];
										
										$query = "INSERT INTO `vehicle_tracking`.`employee_details` 
												( `first_name`, `last_name`, `emp_emailId`, `password`, `address1`, `address2`, `date_birth`, `emp_gender`, `emp_designation`) 
													VALUES ('" . $_REQUEST['firstname'] ."','" .$_REQUEST['lastname'] . "','" .$_REQUEST['emp_emailId'] . "', '" .$_REQUEST['pwd1'] . "','" . $_REQUEST['address1']."','" .$_REQUEST['address2']."','"
												.$birthDateStr."', '".$_REQUEST['gender']."', '".$_REQUEST['emp_designation']."')";
									// Perform Query
									$result = mysql_query($query);

									// Check result
									// This shows the actual query sent to MySQL, and the error. Useful for debugging.
									if (!$result) {
										$message  = 'Invalid query: ' . mysql_error() . "\n";
										$message .= 'Whole query: ' . $query;
										die($message);
									}
									unset($_REQUEST['firstname']);
									unset($_REQUEST['lastname']);
									unset($_REQUEST['emp_emailId']);
									unset($_REQUEST['address1']);
									unset($_REQUEST['address2']);
									unset($_REQUEST['datebirth']);
									unset($_REQUEST['gender']);
									unset($_REQUEST['emp_designation']);
									
									$_REQUEST['Msg'] = "Success";							
								}
	
	
	
	//unset($_REQUEST['salary']);
}
					
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE> Online Vehicle Tracking System - Employee Details Entry Page</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">

<META content="MSHTML 6.00.2900.2180" name=GENERATOR>
<style type="text/css">
<!--
.style1 {
	color: #000066;
	font-size: 14pt;
}
.style2 {
	font-size: 12pt;
	font-weight: bold;
	color: #990000;
}
.style3 {
	color: #000066;
	font-weight: bold;
}
.style4 {
	color: #333333;
	font-weight: bold;
}
.style9 {font-size: 12px; color: #00CCFF;}
.style10 {
	color: #999999;
	font-weight: bold;
}
body {
	background-color: #C9D8FA;
}
.style11 {color: #000000}
-->
</style>

<script type="text/javascript">

function submitform()
{
    document.form1.submit();
}

var dtCh= "/";
var minYear=1900;
var maxYear=2100;

function isInteger(s){
	var i;
    for (i = 0; i < s.length; i++){   
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
    return true;
}

function stripCharsInBag(s, bag){
	var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not in bag, append to returnString.
    for (i = 0; i < s.length; i++){   
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
}

function daysInFebruary (year){
	// February has 29 days in any year evenly divisible by four,
    // EXCEPT for centurial years which are not also divisible by 400.
    return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
}
function DaysArray(n) {
	for (var i = 1; i <= n; i++) {
		this[i] = 31
		if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
		if (i==2) {this[i] = 29}
   } 
   return this
}

function isDate(dtStr){
	var daysInMonth = DaysArray(12)
	var pos1=dtStr.indexOf(dtCh)
	var pos2=dtStr.indexOf(dtCh,pos1+1)
	var strMonth=dtStr.substring(0,pos1)
	var strDay=dtStr.substring(pos1+1,pos2)
	var strYear=dtStr.substring(pos2+1)
	strYr=strYear
	if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
	if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
	for (var i = 1; i <= 3; i++) {
		if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
	}
	month=parseInt(strMonth)
	day=parseInt(strDay)
	year=parseInt(strYr)
	if (pos1==-1 || pos2==-1){
		alert("The date format should be : mm/dd/yyyy")
		return false
	}
	if (strMonth.length<1 || month<1 || month>12){
		alert("Please enter a valid month")
		return false
	}
	if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
		alert("Please enter a valid day")
		return false
	}
	if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
		alert("Please enter a valid 4 digit year between "+minYear+" and "+maxYear)
		return false
	}
	if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){
		alert("Please enter a valid date")
		return false
	}
return true
}

function validateInt(str) {
    str = alltrim(str);
    return /^[-+]?[0-9]+(\.[0-9]+)?$/.test(str);
}

function ltrim(str){
	return str.replace(/^\s+/, '');
}
function rtrim(str) {
	return str.replace(/\s+$/, '');
}
function alltrim(str) {
	return str.replace(/^\s+|\s+$/g, '');
}

function validateEmailAddress(form_id,email) {
 
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   var address = document.forms[form_id].elements[email].value;
   if(reg.test(address) == false) {
 
      alert('Invalid Email Address');
      return false;
   }
}

function checkForm() {    
    var re = /^\w+$/;
   var pwd1 = document.getElementById('pwd1');
   var pwd2 = document.getElementById('pwd2');
    if (pwd1.value != "" &&  pwd1.value ==  pwd2.value) {
        if ( pwd1.value.length < 6) {
            alert("Error: Password must contain at least six characters!");
             pwd1.focus();
            return false;
        }        
       /* re = /[0-9]/;
        if (!re.test( pwd1.value)) {
            alert("Error: password must contain at least one number (0-9)!");
             pwd1.focus();
            return false;
        }
        re = /[a-z]/;
        if (!re.test( pwd1.value)) {
            alert("Error: password must contain at least one lowercase letter (a-z)!");
             pwd1.focus();
            return false;
        }
        re = /[A-Z]/;
        if (!re.test( pwd1.value)) {
            alert("Error: password must contain at least one uppercase letter (A-Z)!");
             pwd1.focus();
            return false;
        }*/
    } else {
        alert("Error: Please check that you've entered and confirmed your password!");
         pwd1.focus();
        return false;
    }
    //alert("You entered a valid password: " +  pwd1.value);
	document.form1.submit();
	return true;
}


function ValidateForm(form){

	var dateBirth=document.getElementById('datebirth');
	var emailId = document.getElementById('emp_emailId').value;
	var firstname=document.getElementById('firstname').value;
	var lastname=document.getElementById('lastname').value;
	var address1=document.getElementById('address1').value;
	var address2=document.getElementById('address2').value;
		
	
	if(alltrim(firstname)==''){
		    alert("Enter valid First Name");
			return false;
	}else if(alltrim(lastname)==''){
		    alert("Enter valid Last Name");
			return false;
	}else if(alltrim(address1)==''){
		    alert("Enter valid Address1");
			return false;
	}else if(alltrim(address2)==''){
		    alert("Enter valid Address2");
			return false;
	}else if (isDate(dateBirth.value)==false){
			dateBirth.focus();		
			return false;
	}else if(alltrim(emailId)==''){
		alert('Invalid Email Address');
		  emailId.focus();
		  return false;
	}else {
		if(alltrim(emailId)!=''){
			var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
			   var address = emailId;
			   if(reg.test(address) == false) {
				  alert('Invalid Email Address');
				  emailId.focus();
				  return false;
			   }else{
					checkForm();					
			}
		}
	}
    return true;
 }
 
</script>

</HEAD>
<BODY
marginheight="0" marginwidth="0">
<FORM name="form1" method="post" >
<TABLE cellSpacing=0 cellPadding=0 width=780 align=center border=0>
  <TBODY>
  <TR>
    <TD bgColor=white height=50><TABLE width="851" border="1" bordercolor="#FF0000" class="style1">
      
      <TR bgColor=red>
        <TD height=38 bordercolor="#990000" bgcolor="#A9BDF3"><div align="center">WELCOME TO ONLINE VEHICLE TRACKING</div></TD>
      </TR>
      <TR bgColor=#0162b1>
        <TD height=2 bordercolor="#990000" bgcolor="#A9BDF3"></TD>
      </TR>
      <TR bgColor=#0162b1>
        <TD height=30 bordercolor="#990000" bgcolor="#A9BDF3" class=content3><div align="right"><a href="logout.php">LOGOUT</a></div><div align="right"><a href="home.php">HOME</a></div></TD>
		
      </TR>
      <TBODY>
        <TR>
          <TD width="865" height="283" bordercolor="#990000" bgcolor="#D8E1FA">           
			<TABLE class=PgHeader width=381 align=center>
              <TBODY>
                <TR>
                  <TD width="288"><div align="left" class="style3">
                      <div align="center">
					  
					  <?php
						if(isset($_REQUEST['Msg'])){
							if($_REQUEST['Msg']=="Error"){
							?>
								<font color="red">EmailId Already Exists</font></div>
							
							<?php
							}else{
							?>
								<font color="green">Employee Details Added Successfully</font></div>
							
							<?php
							}
						}
						
						
						
					  ?>
					  
                  </div></TD>
                </TR>
              </TBODY>
            </TABLE>		  
            <TABLE class=PgHeader width=381 align=center>
              <TBODY>
                <TR>
                  <TD width="288"><div align="left" class="style3">
                    <div align="center">ENTER EMPLOYEE DETAILS</div>
                  </div></TD>
                </TR>
              </TBODY>
            </TABLE>
            <TABLE class=Outline cellSpacing=0 cellPadding=0
              border=0>
              <TBODY>
                <TR height=20>
                  <TD></TD>
                  <TD></TD>
                </TR>
                <TR>
                  <TD class=headingsmall2 width="341" height=32>
				  <div align="right"><strong><span class="style11">First Name :</span>&nbsp;&nbsp;&nbsp; </strong></div></TD>
                  <TD width=490>
                    <div align="left">
                      <INPUT size=22 type="text" name="firstname" id="firstname" value="<?php if(isset($_REQUEST['firstname']))echo $_REQUEST['firstname']; ?>">
                    </div></TD>
                </TR>
                <TR>
                  <TD class=headingsmall2 width="341" height=30><div align="right" class="style4">
                    <div align="right"><span class="style11">Last Name :</span>&nbsp;&nbsp;&nbsp;
                      </div>
                  </div></TD>
                  <TD width=490>
                    <div align="left">
                      <INPUT
                  name="lastname" type="text" id="lastname" size=22 value="<?php if(isset($_REQUEST['lastname']))echo $_REQUEST['lastname']; ?>">
                    </div></TD>
                </TR>
				<TR>
                  <TD class=headingsmall2 width="341" height=32>
				  <div align="right"><strong><span class="style11">Address1 :</span>&nbsp;&nbsp;&nbsp; </strong></div></TD>
                  <TD width=490>
                    <div align="left">
                      <INPUT size=22 type="text" name="address1" id="address1" value="<?php if(isset($_REQUEST['address1']))echo $_REQUEST['address1']; ?>">
                    </div></TD>
                </TR>
                <TR>
                  <TD class=headingsmall2 width="341" height=30><div align="right" class="style4">
                    <div align="right"><span class="style11">Address2 :</span>&nbsp;&nbsp;&nbsp;
                      </div>
                  </div></TD>
                  <TD width=490>
                    <div align="left">
                      <INPUT
                  name="address2" type="text" id="address2" size=22 value="<?php if(isset($_REQUEST['address2']))echo $_REQUEST['address2']; ?>">
                    </div></TD>
                </TR>
				<TR>
                  <TD class=headingsmall2 width="341" height=32>
				  <div align="right"><strong><span class="style11">Gender :</span>&nbsp;&nbsp;&nbsp; </strong></div></TD>
                  <TD width=490>
                    <div align="left">                      
					  <select name="gender" id="gender">
					  <?php
						if(isset($_REQUEST['address2'])){
							
						}
					  ?>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					  </select>
                    </div></TD>
                </TR>				
				<TR>
                  <TD class=headingsmall2 width="341" height=32>
				  <div align="right"><strong><span class="style11">Date of Birth :</span>&nbsp;&nbsp;&nbsp; </strong></div></TD>
                  <TD width=490>
                    <div align="left">
                      <INPUT size=22 type="text" name="datebirth" id="datebirth" value="<?php if(isset($_REQUEST['datebirth']))echo $_REQUEST['datebirth']; ?>">					  
                    </div>
					<div align="left">
                      <font color="red">(mm/dd/yyyy)</font>					  
                    </div></TD>
                </TR>
				<TR>
                  <TD class=headingsmall2 width="341" height=32>
				  <div align="right"><strong><span class="style11">Employee Designation :</span>&nbsp;&nbsp;&nbsp; </strong></div></TD>
                  <TD width=490>
                    <div align="left">                      
					  <select name="emp_designation" id="emp_designation">
						<option value="Administrator">Administrator</option>
						<option value="Staff">Staff</option>
						<option value="Security">Security</option>
					  </select>
                    </div></TD>
                </TR>               		
                <TR>
                  <TD class=headingsmall2 width="341" height=30><div align="right" class="style4">
                    <div align="right"><span class="style11">EmailId/User Name :</span>&nbsp;&nbsp;&nbsp;
                      </div>
                  </div></TD>
                  <TD width=490>
                    <div align="left">
                      <INPUT
                  name="emp_emailId" type="text" id="emp_emailId" size=22 value="<?php if(isset($_REQUEST['emp_emailId']))echo $_REQUEST['emp_emailId']; ?>">
                    </div></TD>
                </TR>
				
				<TR>
                  <TD class=headingsmall2 width="341" height=30><div align="right" class="style4">
                    <div align="right"><span class="style11">Password :</span>&nbsp;&nbsp;&nbsp;
                      </div>
                  </div></TD>
                  <TD width=490>
                    <div align="left">
                      <INPUT
                  name="pwd1" type="password" id="pwd1" size=22>
                    </div></TD>
                </TR>
				
				<TR>
                  <TD class=headingsmall2 width="341" height=30><div align="right" class="style4">
                    <div align="right"><span class="style11">Confirm Password :</span>&nbsp;&nbsp;&nbsp;
                      </div>
                  </div></TD>
                  <TD width=490>
                    <div align="left">
                      <INPUT
                  name="pwd2" type="password" id="pwd2" size=22>
                    </div></TD>
                </TR>
				
                <TR>
                  <TD
      colSpan=2>&nbsp;</TD>
                </TR>
                <TR>
                  <TD
      colSpan=2>                    <table width="500" border="0">
                      <tr>
                        <td width="330">&nbsp;</td>
                        <td width="160"><input name="Create" type=button class=div#buttonA id="Create" value="Create" onclick="return ValidateForm(this);">
                        </td>
                      </tr>
                    </table></TD>
                </TR>
              </TBODY>
          </TABLE></TD>
        </TR>
      </TBODY>
    </TABLE></TD></TR>
  <TR bgColor=red>
    <TD height=3></TD>
  </TR>
  <TR bgColor=#000000>
    <TD height=22>
        </marquee></TD>
  </TR></TBODY></TABLE>
<div align="center">
</div>
</FORM></BODY></HTML>

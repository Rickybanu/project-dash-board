<?php 
ob_start();
session_start();
$link=mysql_pconnect("localhost","root","") or die("Sorry, Database Could Not be Connected !");
mysql_select_db("vehicle_tracking",$link);
if(!isset($_SESSION['userid'])){
	header("Location: index.php");
	}
		
			$empquery="select * from employee_details";			
			$queryResult = mysql_query($empquery);			 

		
			if(isset($_REQUEST['vehicle_id']) && isset($_REQUEST['vehicle_process'])){
				if($_REQUEST['vehicle_process']=='update'){
					$query = "UPDATE `vehicle_tracking`.`vehicle_details` 
							SET `time_out` = '".$_REQUEST['vehicle_outtime']."', `vehicle_status` = 'Closed' WHERE `vehicle_details`.`vehicle_id` ='".$_REQUEST['vehicle_id']."'";
					
					// Perform Query
					$result = mysql_query($query);
					
							
					if (!$result) {
						$message  = 'Invalid query: ' . mysql_error() . "\n";
						$message .= 'Whole query: ' . $query;
						die($message);
					}
					$_REQUEST['Msg'] = "Vehicle Details Updated Successfully";
									
				}
				
				
			}
			if(isset($_REQUEST['vehicle_id'])){
					$vehiclequery="select * from vehicle_details where vehicle_id='".$_REQUEST['vehicle_id']."'";			
					$vehiclequeryResult = mysql_query($vehiclequery);			 
						$vehicleRowValue = mysql_fetch_array($vehiclequeryResult);
			}	
if(isset($_REQUEST['vehicle_number'])){
	//$_REQUEST['Msg'] = "Error";
	$query = "INSERT INTO `vehicle_tracking`.`vehicle_details` 
				(`vehicle_category`, `vehicle_type`, `emp_id`, `vehicle_number`, `time_in`, `vehicle_status`) 
				VALUES ('".$_REQUEST['vehicle_category']."', '".$_REQUEST['vehicle_type']."', '".$_SESSION['userid']."', '".$_REQUEST['vehicle_number']."',
					'".$_REQUEST['vehicle_intime']."', 'Pending');";
		
	// Perform Query
	$result = mysql_query($query);
	
			
	if (!$result) {
		$message  = 'Invalid query: ' . mysql_error() . "\n";
		$message .= 'Whole query: ' . $query;
		die($message);
	}
	$_REQUEST['Msg'] = "Vehicle Details Added Successfully";
	unset($_REQUEST['vehicle_number']);
}
					
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE> Vehicle Management - Vehicle Entry Page</TITLE>
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

function ValidateForm(){
	
	var vehicleOutTime = document.getElementById('vehicle_outtime').value;	
	if(vehicleOutTime=="New"){
		var vehicleNumber = document.getElementById('vehicle_number').value;
		var vehicleInTime = document.getElementById('vehicle_intime').value;
		if(alltrim(vehicleNumber)==''){
		    alert("Enter valid Vehicle Number");
			return false;
		}else if(alltrim(vehicleInTime)==''){
				alert("Enter valid Vehicle In-Time");
				return false;
		}else {		
			document.form1.submit();
			return true;
		}
	}else{
		var vehicleProcess = document.getElementById('vehicle_process').value;
		if(alltrim(vehicleOutTime)==''){
				alert("Enter valid Vehicle Out-Time");
				return false;
		}else {		
			document.form1.submit();
			return true;
		}
	}
	
	
    return true;
 }
 
 
</script>
<script src="Scripts/DateTimePicker.js" type="text/javascript"></script>
</HEAD>
<BODY marginheight="0" marginwidth="0">
<FORM name="form1" method="post" >

<TABLE cellSpacing=0 cellPadding=0 width=780 align=center border=0>
  <TBODY>
  <TR>
    <TD bgColor=white height=50><TABLE width="851" border="1" bordercolor="#FF0000" class="style1">
      
      <TR bgColor=red>
        <TD height=38 bordercolor="#990000" bgcolor="#A9BDF3"><div align="center">WELCOME TO ONLINE VEHICLE MANAGEMENT</div></TD>
      </TR>
      <TR bgColor=#0162b1>
        <TD height=2 bordercolor="#990000" bgcolor="#A9BDF3"></TD>
      </TR>
      <TR bgColor=#0162b1>
        <TD height=30 bordercolor="#990000" bgcolor="#A9BDF3" class=content3>
		<div align="right"><a href="logout.php">LOGOUT</a></div>
		<div align="right"><a href="home.php">HOME</a></div>
		</TD>
		
      </TR>
      <TBODY>
        <TR>
          <TD width="865" height="283" bordercolor="#990000" bgcolor="#D8E1FA">           
			<TABLE class=PgHeader width=381 align=center>
              <TBODY>
                <TR>
                  <TD width="288"><div align="left" class="style3">
                      <div align="center"><font color="green"><?php if(isset($_REQUEST['Msg']))echo $_REQUEST['Msg']?></font></div>
                  </div></TD>
                </TR>
              </TBODY>
            </TABLE>		  
            	  
            <TABLE class=PgHeader width=381 align=center>
              <TBODY>
                <TR>
                  <TD width="288"><div align="left" class="style3">
                    <div align="center">ENTER VEHICLE DETAILS</div>
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
				  
				  <div align="right"><strong><span class="style11">Select Vehicle Category &nbsp;&nbsp;</span>:&nbsp;&nbsp;&nbsp; </strong></div></TD>
                  <TD width=490>
                    <div align="left">
					<?php if(isset($_REQUEST['vehicle_id'])){ ?>
						<span class="style11"><?php echo $vehicleRowValue['vehicle_category'];?></span>
					  <?php }else{?>
						  <select id="vehicle_category" name="vehicle_category">
							  <option value="College vehicle">College vehicle</option>
							  <option value="Staff Vehicle">Staff vehicle</option>
							  <option value="Student vehicle">Student vehicle</option>
							  <option value="Others vehicle">Others vehicle</option>
						  </select>						
					  <?php } ?>
					</div></TD>
                </TR>
				<TR>
                  <TD class=headingsmall2 width="341" height=32>                      
				  <div align="right"><strong><span class="style11">Select Vehicle Type &nbsp;&nbsp;</span>:&nbsp;&nbsp;&nbsp;</strong></div></TD>
                  <TD width=490>
                    <div align="left">
					<?php if(isset($_REQUEST['vehicle_id'])){ ?>
						<span class="style11"><?php echo $vehicleRowValue['vehicle_type'];?></span>
					  <?php }else{?>
						  <select id="vehicle_type" name="vehicle_type">
							  <option value="Two Wheeler">Two Wheeler</option>
							  <option value="Four Wheeler">Four Wheeler</option>
							  <option value="Heavy Vehicle">Heavy Vehicle</option>
							  <option value="Other category">Other category</option>
						  </select>
					  <?php } ?>
                    </div></TD>
                </TR>					
				<TR>
                  <TD class=headingsmall2 width="341" height=30><div align="right" class="style4">
                    <div align="right"><strong><span class="style11">Vehicle Number &nbsp;&nbsp;</span>:&nbsp;&nbsp;&nbsp;</strong>
                      </div>
                  </div></TD>
                  <TD width=490>
                    <div align="left">
					<?php if(isset($_REQUEST['vehicle_id'])){ ?>
						<span class="style11"><?php echo $vehicleRowValue['vehicle_number'];?></span>
					  <?php }else{?>
                      <INPUT
                  name="vehicle_number" type="text" id="vehicle_number" size=22>
                   <?php } ?>
					</div></TD>
                </TR>
				<TR>
                  <TD class=headingsmall2 width="341" height=30><div align="right" class="style4">
                    <div align="right"><strong><span class="style11">Vehicle In Time &nbsp;&nbsp;</span>:&nbsp;&nbsp;&nbsp;</strong>
                      </div>
                  </div></TD>
                  <TD width=490>
                    <div align="left">
					<?php if(isset($_REQUEST['vehicle_id'])){ ?>
						<span class="style11"><?php echo $vehicleRowValue['time_in'];?></span>
					  <?php }else{?>
						<input type="Text" readonly="readonly" id="vehicle_intime" name="vehicle_intime" size="25"><a onclick="javascript:NewCssCal('vehicle_intime','yyyyMMdd','arrow',true,'24',true)"><img src="Image/cal.gif" style="cursor: pointer;" width="16" height="16" border="0" alt="Pick a date"></a>	  		
                    <?php } ?>
					</div></TD>
                </TR>
				<TR>
                  <TD class=headingsmall2 width="341" height=30><div align="right" class="style4">
                    <div align="right"><strong><span class="style11">Vehicle Out Time &nbsp;&nbsp;</span>:&nbsp;&nbsp;&nbsp;</strong>
                      </div>
                  </div></TD>
                  <TD width=490>
                    <div align="left">
					<?php if(isset($_REQUEST['vehicle_id']) && isset($_REQUEST['vehicle_process'])){ ?>
							<span class="style11"><?php echo $vehicleRowValue['time_out'];?></span>
						<?php
						}else if(isset($_REQUEST['vehicle_id'])){ ?>
						<input type="hidden" id="vehicle_process" name="vehicle_process" size="25"  value="update"/>
						<input type="Text" readonly="readonly" id="vehicle_outtime" name="vehicle_outtime" size="25"><a onclick="javascript:NewCssCal('vehicle_outtime','yyyyMMdd','arrow',true,'24',true)"><img src="Image/cal.gif" style="cursor: pointer;"  width="16" height="16" border="0" alt="Pick a date"></a>	  		
					 <?php }else{?>
							<input type="hidden" id="vehicle_outtime" name="vehicle_outtime" size="25" value="New"/>
						<?php } ?>	  
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
						<?php if(isset($_REQUEST['vehicle_id']) && isset($_REQUEST['vehicle_process'])){ ?>
							<td width="330">&nbsp;</td>
						<?php }else { ?>
							<td width="160"><input name="vehicle_entry" type=button class=div#buttonA id="vehicle_entry" value="Make Entry" onclick="return ValidateForm();"></td>						
						<?php }?>
					   
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

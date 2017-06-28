<?php 
ob_start();
session_start();

$link=mysql_pconnect("localhost","root","") or die("Sorry, Database Could Not be Connected !");
mysql_select_db("vehicle_tracking",$link);
if(!isset($_SESSION['userid'])){
	header("Location: index.php");
}
	if(isset($_REQUEST['report_process']) && !empty($_REQUEST['report_process'])){		
		if($_REQUEST['report_process']=="Daily"){
			$query = "SELECT * FROM `vehicle_details` where `time_in`=curdate()";			
		}else if($_REQUEST['report_process']=="Monthly"){
			$query = "SELECT * FROM `vehicle_details` WHERE month(`time_in`)='".$_REQUEST['report_month']."' and year(`time_in`)='".$_REQUEST['report_year']."'";
		}
		// Perform Query
		$result = mysql_query($query);

		// Check result
		// This shows the actual query sent to MySQL, and the error. Useful for debugging.
		if (!$result) {
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message .= 'Whole query: ' . $query;
			die($message);
		}
	}	
			
?>
<HTML><HEAD><TITLE> Vehicle Tracking - Home Page</TITLE>
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

function ReportGeneration(reportProcess)
{	
	document.getElementById('report_process').value = reportProcess;	
    document.form1.submit();	
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
                    <div align="center">REPORT GENRATION</div>
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
                  <TD class=headingsmall2 width="500" height=30>
					<input type="hidden" id="report_process" name="report_process">
					</input>
				  <div align="right" class="style4">
                    <div align="right">
					<input name="daily_report" type=button class=div#buttonA id="daily_report" value="Daily Report" onclick="return ReportGeneration('Daily');">						
                      </div>
                  </div></TD>
				  <TD>&nbsp;&nbsp;&nbsp;</TD>
                  <TD width=490>
                    <div align="left">
						<input name="monthly_report" type=button class=div#buttonA id="monthly_report" value="Monthly Report" onclick="return ReportGeneration('Monthly');">						
						<select id="report_month" name="report_month">
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="4">April</option>
							<option value="5">May</option>
							<option value="6">June</option>
							<option value="7">July</option>
							<option value="8">August</option>
							<option value="9">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
						</select>
						<select id="report_year" name="report_year">
							<option value="2010">2010</option>
							<option value="2011">2011</option>
							<option value="2012" selected=true>2012</option>
							<option value="2013">2013</option>
							<option value="2014">2014</option>
							<option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
						</select>
					</div></TD>					
                 
                </TR> 
				<TR>
                  <TD
      colSpan=2>&nbsp;</TD>
                </TR>
                <TR>
              </TBODY>
          </TABLE>
		  
		  <TABLE width="800" class="Outline" align="center" cellSpacing=0 cellPadding=0
              border="1">
             <TBODY>               
                <TR>
				   <TH>
						<div align="left" class="style3">
						<div align="center">Vehicle Category</div>
						</div>
				   </TH>
				   <TH>
						<div align="left" class="style3">
						<div align="center">Vehicle Type</div>
						</div>
				  </TH>
				   <TH width><div align="left" class="style3">
                    <div align="center">Vehicle Number</div>
					</div>
				  </TH>
				  <TH width><div align="left" class="style3">
                    <div align="center">Vehicle Entry Made By</div>
					</div>
				  </TH>
				   <TH><div align="left" class="style3">
                    <div align="center">Vehicle In-Time</div>
                  </div></TH>
				   <TH><div align="left" class="style3">
                    <div align="center">Vehicle Out-Time</div>
                  </div></TH>	  
                </TR>
				<?php if(isset($result)){
					$num_rows = mysql_num_rows($result);
					
					if($num_rows>=1){
					while($row = mysql_fetch_array($result)){?>
						<TR>
				   <TD>
						<div align="left" class="style5">
						<div align="center"><?php echo $row['vehicle_category']; ?></div>
						</div>
				   </TD>				   
				   <TD>
						<div align="left" class="style5">
						<div align="center"><?php echo $row['vehicle_type']; ?></div>
						</div>
				  </TD>
				   <TD width><div align="left" class="style5">
                    <div align="center"><?php echo $row['vehicle_number']; ?></div>
					</div>
				  </TD>			 
				 
				  <?php
						$mandetail_query = "select * from employee_details where emp_id='".$row['emp_id']."'";
						$mandetailqueryResult = mysql_query($mandetail_query);			 
						$manrowVal = mysql_fetch_array($mandetailqueryResult);
				   ?>
				   <TD><div align="left" class="style5">
                    <div align="center"><?php echo $manrowVal['first_name']." ". $manrowVal['last_name'];?></div>
                  </div></TD>				     
				    <TD>
						<div align="left" class="style5">
						<div align="center"><?php echo $row['time_in']; ?></div>
						</div>
				   </TD>
				   
				    <TD>
						<div align="left" class="style5">
						<?php if($row['vehicle_status']=='Pending'){?>
						<div align="center"> - </div>
						<?php }else{?>
						<div align="center"><?php echo $row['time_out']; ?></div>
						<?php } ?>
						</div>
				   </TD>
                </TR>
					<?php 
					}
				}else{?>				
					<TR>
					  <TD  colspan="7"><div align="left" class="style3">
						<div align="center"><font color="red">No Results Found</font></div>
					  </div></TD>                  
					</TR>						
				<?php				
					}	
				}else{?>				
					<TR>
					  <TD  colspan="7"><div align="left" class="style3">
						<div align="center"><font color="red">No Results Found</font></div>
					  </div></TD>                  
					</TR>						
				<?php				
					}				
				?>
				 
			</TBODY>
          </TABLE>

		  </TD>
		</TR>
  <TR bgColor=red>
    <TD height=3></TD>
  </TR>
  </TBODY></TABLE>
<div align="center">
</div>
</FORM></BODY></HTML>

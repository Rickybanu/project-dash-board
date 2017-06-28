<?php 
ob_start();
session_start();
$link=mysql_pconnect("localhost","root","") or die("Sorry, Database Could Not be Connected !");
mysql_select_db("vehicle_tracking",$link);
if(!isset($_SESSION['userid'])){
	header("Location: index.php");
}
if(isset($_POST["submit"])){
	if(!empty($_REQUEST['vehicle_category']) && !empty($_REQUEST['vehicle_type']) && !empty($_REQUEST['vehicle_number'])){		
		$query = "SELECT * FROM `vehicle_details` WHERE `vehicle_category` = '".$_REQUEST['vehicle_category']."' 
				and `vehicle_type`='".$_REQUEST['vehicle_type']."' and `vehicle_number`='".$_REQUEST['vehicle_number']."' and `vehicle_status`='Pending'";
	}else if(!empty($_REQUEST['vehicle_category']) && !empty($_REQUEST['vehicle_type'])){		
		$query = "SELECT * FROM `vehicle_details` WHERE `vehicle_category` = '".$_REQUEST['vehicle_category']."' and `vehicle_type`='".$_REQUEST['vehicle_type']."' and `vehicle_status`='Pending'";
	}else if(!empty($_REQUEST['vehicle_type']) && !empty($_REQUEST['vehicle_number'])){		
		$query = "SELECT * FROM `vehicle_details` WHERE `vehicle_type` = '".$_REQUEST['vehicle_type']."' and `vehicle_number`='".$_REQUEST['vehicle_number']."' and `vehicle_status`='Pending'";
	}else if(!empty($_REQUEST['vehicle_category']) && !empty($_REQUEST['vehicle_number'])){		
		$query = "SELECT * FROM `vehicle_details` WHERE `vehicle_category` = '".$_REQUEST['vehicle_category']."' and `vehicle_number`='".$_REQUEST['vehicle_number']."' and `vehicle_status`='Pending'";
	}else if(!empty($_REQUEST['vehicle_category'])){
		$query = "SELECT * FROM `vehicle_details` where `vehicle_category` = '".$_REQUEST['vehicle_category']."' and `vehicle_status`='Pending'";	
	}else if(!empty($_REQUEST['vehicle_type'])){
		$query = "SELECT * FROM `vehicle_details` where `vehicle_type`='".$_REQUEST['vehicle_type']."' and `vehicle_status`='Pending'";	
	}else if(!empty($_REQUEST['vehicle_number'])){
		$query = "SELECT * FROM `vehicle_details` where `vehicle_number` = '".$_REQUEST['vehicle_number']."' and `vehicle_status`='Pending'";	
	}else{
		$query = "SELECT * FROM `vehicle_details` where `vehicle_status` = 'Pending'";	
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

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE> Project Management - Project Details Page</TITLE>
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
.style5 {
	color: #000066;
	
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
</HEAD>
<BODY
marginheight="0" marginwidth="0">
<FORM name="form1" method="post" >
<TABLE cellSpacing=0 cellPadding=0 width=780 align=center border=0>
  <TBODY>
  <TR>
    <TD bgColor=white height=50><TABLE width="851" border="1" bordercolor="#FF0000" class="style1">
      
      <TR bgColor=red>
        <TD height=38 bordercolor="#990000" bgcolor="#A9BDF3"><div align="center">WELCOME TO ONLINE PROJECT MANAGEMENT</div></TD>
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
                      <div align="center"><font color="green"><?php if(isset($_SESSION['Msg'])){ echo $_SESSION['Msg']; unset($_SESSION['Msg']); }?></font></div>
                  </div></TD>
                </TR>
              </TBODY>
            </TABLE>
			<TABLE class=PgHeader width=381 align=center>
              <TBODY>
                <TR>
                  <TD width="288"><div align="left" class="style3">
                    <div align="center">ENTER SEARCH CRITERIA</div>
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
				  <div align="right"><strong><span class="style11">Vehicle Number </span>: </strong></div></TD>
                  <TD width=490>
                    <div align="left">
					<INPUT
						name="vehicle_number" type="text" id="vehicle_number" size=22>
                    </div></TD>
                </TR>
                <TR>
                  <TD class=headingsmall2 width="341" height=32>                      
				  <div align="right"><strong><span class="style11">Select Vehicle Category </span>: </strong></div></TD>
                  <TD width=490>
                    <div align="left">
					 <select id="vehicle_category" name="vehicle_category">
								<option value="">--Select--</option>
							  <option value="College vehicle">College vehicle</option>
							  <option value="Staff Vehicle">Staff vehicle</option>
							  <option value="Student vehicle">Student vehicle</option>
							  <option value="Others vehicle">Others vehicle</option>
						  </select>	
                    </div></TD>
                </TR>
                <TR>
                  <TD class=headingsmall2 width="341" height=30>                      
				  <div align="right" class="style4">
                    <div align="right"><span class="style11">Select Vehicle Type </span>:
                      </div>
                  </div></TD>
                  <TD width=490>
                    <div align="left">
						<select id="vehicle_type" name="vehicle_type">
							  <option value="">--Select--</option>
							  <option value="Two Wheeler">Two Wheeler</option>
							  <option value="Four Wheeler">Four Wheeler</option>
							  <option value="Heavy Vehicle">Heavy Vehicle</option>
							  <option value="Other category">Other category</option>
						  </select>
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
                        <td width="160">
						<input name=submit type=submit class=div#buttonA id="submit" value=Search>
                        </td>
                      </tr>
                    </table></TD>
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
				  <TH><div align="left" class="style3">
                    <div align="center">&nbsp;&nbsp;&nbsp;</div>
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
					<TD><div align="left" class="style5">
                    <div align="center"><a href="vehicledetail.php?vehicle_id= <?php echo $row['vehicle_id'] ?>">Update</a></div>					
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

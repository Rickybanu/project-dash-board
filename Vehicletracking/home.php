<?php 
ob_start();
session_start();
$link=mysql_pconnect("localhost","root","") or die("Sorry, Database Could Not be Connected !");
mysql_select_db("vehicle_tracking",$link);
if(!isset($_SESSION['userid'])){
	header("Location: index.php");
}
					
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE> Vehicle Management - Home Page</TITLE>
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
</HEAD>
<BODY
marginheight="0" marginwidth="0">
<FORM name="form1" method="post" >
<TABLE cellSpacing=0 cellPadding=0 width=780 align=center border=0>
  <TBODY>
  <TR>
    <TD bgColor=white height=50><TABLE width="851" border="1" bordercolor="#FF0000" class="style1">
      <TR bgColor=white>
        <TD bordercolor="#990000" bgcolor="#FFFFFF"><div align="center" class="HeaderRow style1">
            <div align="center"></div>
        </div></TD>
      </TR>
      <TR bgColor=red>
        <TD height=38 bordercolor="#990000" bgcolor="#A9BDF3"><div align="center">WELCOME TO ONLINE VEHICLE MANAGEMENT</div></TD>
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
                  <TD width="288" height=30><div align="left" class="style3">
                      <div><a href="home.php">HOME</a></div>
                  </div></TD>			
				  <TD width="288"><div align="left" class="style3">
                      <div>&nbsp;&nbsp;&nbsp;</div>
                  </div></TD>
				  <TD width="288"><div align="left" class="style3">
                      <div>&nbsp;&nbsp;&nbsp;</div>
                  </div></TD>
				  <TD width="288"><div align="left" class="style3">
                      <div><a href="employeedetails.php">STAFF DETAIL ENTRY</a></div>
                  </div></TD>
				  <TD width="288"><div align="left" class="style3">
                      <div>&nbsp;&nbsp;&nbsp;</div>
                  </div></TD>
				  <TD width="288"><div align="left" class="style3">
                      <div>&nbsp;&nbsp;&nbsp;</div>
                  </div></TD>
				  <TD width="288"><div align="left" class="style3">
                      <div><a href="vehicledetail.php">VEHICLE DETAIL ENTRY</a></div>
                  </div></TD>
				  <TD width="288"><div align="left" class="style3">
                      <div>&nbsp;&nbsp;&nbsp;</div>
                  </div></TD>
				  <TD width="288"><div align="left" class="style3">
                      <div>&nbsp;&nbsp;&nbsp;</div>
                  </div></TD>
				  <TD width="288"><div align="left" class="style3">
                      <div><a href="vehicletracking.php">VEHICLE TRACKING</a></div>
                  </div></TD>
				  <TD width="288"><div align="left" class="style3">
                      <div>&nbsp;&nbsp;&nbsp;</div>
                  </div></TD>
				  <TD width="288"><div align="left" class="style3">
                      <div>&nbsp;&nbsp;&nbsp;</div>
                  </div></TD>
				  <TD width="288"><div align="left" class="style3">
                      <div><a href="vehiclereport.php">REPORT GENERATION</a></div>
                  </div></TD>
                </TR>
              </TBODY>
            </TABLE>
            </TD>
        </TR>
      </TBODY>
    </TABLE></TD></TR>
  <TR bgColor=red>
    <TD height=3></TD>
  </TR>
  </TBODY></TABLE>
<div align="center">
</div>
</FORM></BODY></HTML>

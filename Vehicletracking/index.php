<?php 
ob_start();
session_start();
$link=mysql_pconnect("localhost","root","") or die("Sorry, Database Could Not be Connected !");
mysql_select_db("vehicle_tracking",$link);
if(isset($_POST["submit"]))
		{		 
			
				$userid=$_POST['username'];
				 $passwd=$_POST["password"];
				 $res="select * from employee_details where `emp_emailId`='$userid' and `password`='$passwd'";

						$result = mysql_query($res);
				  				  $num_rows = mysql_num_rows($result);
								   $row = mysql_fetch_array($result);
						   
								if($num_rows == 1)
								{   
								 
								   $_SESSION['userid'] = $row['emp_id'];								  
								   header("Location: home.php");

								   }
								   else
								   {
								   	 
									echo '<script> alert("Invalid Username / Password "); </script>';
								   
								   }
								   
				  	
				}
				
				
					
								?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE> Vehicle Management - Login User Page</TITLE>
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
      
      <TR bgColor=red>
        <TD height=38 bordercolor="#990000" bgcolor="#A9BDF3"><div align="center">WELCOME TO ONLINE VEHICLE MANAGEMENT</div></TD>
      </TR>
      <TR bgColor=#0162b1>
        <TD height=2 bordercolor="#990000" bgcolor="#A9BDF3"></TD>
      </TR>
      <TR bgColor=#0162b1>
        <TD height=30 bordercolor="#990000" bgcolor="#A9BDF3" class=content3><div align="center"></div></TD>
      </TR>
      <TBODY>
        <TR>
          <TD width="865" height="283" bordercolor="#990000" bgcolor="#D8E1FA">            
            <TABLE class=PgHeader width=381 align=center>
              <TBODY>
                <TR>
                  <TD width="288"><div align="left" class="style3">
                    <div align="center">ENTER USERNAME AND PASSWORD</div>
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
                  <TD class=headingsmall2 width="341" height=32>                      <div align="right"><strong><span class="style11">UserName </span>: </strong></div></TD>
                  <TD width=490>
                    <div align="left">
                      <INPUT maxLength=20 size=12  name="username">
                    </div></TD>
                </TR>
                <TR>
                  <TD class=headingsmall2 width="341" height=30>                      <div align="right" class="style4">
                    <div align="right"><span class="style11">Password </span>:
                      </div>
                  </div></TD>
                  <TD width=490>
                    <div align="left">
                      <INPUT
                  name="password" type=password id="password" size=12 maxLength=30>
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
                        <td width="160"><input name=submit type=submit class=div#buttonA id="submit" value=Submit>
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

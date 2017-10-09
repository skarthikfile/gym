<?php
require("lang.php");
require("include.php");
echo "<HTML><HEAD><TITLE>$cif_title</TITLE></HEAD><BODY BGCOLOR='#000000'>";
//-- Top part of table --
echo "<CENTER><FORM METHOD=POST ACTION='listdata.php?option=WRITE'>";
//<TABLE BGCOLOR='#CCCCCC' BORDER='0' CELLSPACING='0' CELLPADDING='5'>
//<TR><TD COLSPAN='3' BGCOLOR='#6677DD'>
//<CENTER><FONT SIZE='+1' FACE='arial,helvetica' COLOR='#FFFFFF'>$lpwd_del</FONT></CENTER>
//</TD>
//</TR>
//<TR>
//<TD><B>$lpwd_add</B></TD><TD COLSPAN='2'>
//<INPUT TYPE='text' SIZE=40 NAME='email'>
//</TD></TR>
//<TR><TD><B>$lpwd_pass</B></TD><TD COLSPAN='2'>
//<INPUT TYPE=PASSWORD SIZE=40 NAME='epasswd'></TD>
//</TR>
//<TR>
//<TD>&nbsp;</TD>
//<TD><CENTER><INPUT TYPE='submit' VALUE='$lpwd_rem'></CENTER></TD>
//<TD><CENTER><A HREF='$g_help_lng'>$g_help</A><BR><A HREF='adminoptions.php'>$g_options</A><BR>
//<A HREF='index.php'>$g_home</A></CENTER></TD>
//</TR>
//</TABLE>
echo $modulo;
echo "</FORM></BODY></HTML>";
?>

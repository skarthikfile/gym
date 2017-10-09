<?php
require("lang.php");
require("config.optional.php");

/*

  File: include.php

  E*Reminders: Copyright 1999 Benjamin Suto <ben@amvalue.com>

  You should have received a copy of the GNU Public License along
  with this package;  if not, write to the Free Software Foundation, Inc.
  59 Temple Palace - Suite 330, Boston, MA 02111-1307, USA.

*/
function msg_box($heading, $message, $messageclr) {
  echo "<CENTER>
  <TABLE BGCOLOR=#CCCCCC BORDER=0 CELLSPACING=0 CELLPADDING=5 WIDTH=75%>
  <TR><TD COLSPAN=3 BGCOLOR=#6677DD><CENTER>
  <FONT SIZE=+1 FACE='arial, helvetica' COLOR=#FFFFFF>$heading</FONT></CENTER></TD>
  <TR><TD><FONT FACE='arial,helvetica' COLOR=$messageclr>$message</FONT></TD><TR>
  <TD><CENTER><FONT COLOR=#000000>
  <A HREF='$g_help_lng'>$g_help</A><BR>
  <A HREF='adminoptions.php'>$g_options</A><BR>
  <A HREF='index.php'>$g_home</A>
  </CENTER></TD></TABLE></CENTER>";
}

if (USE_APACHE_AUTHENTICATION) {

  $email=$REMOTE_USER;
  if ( ( !(ereg("@",$email))) && ( $email != '' )){
          $email=$email.$hostmask;
  }
} 

$modulo ="<TABLE BGCOLOR='#CCCCCC' BORDER='0' CELLSPACING='0' CELLPADDING='5'>
<TR><TD COLSPAN='3' BGCOLOR='#6677DD'>
<CENTER><FONT SIZE='+1' FACE='arial,helvetica' COLOR='#FFFFFF'>$cif_dati</FONT></CENTER></TD>
</TR><TR><TD><B>$cif_email</B></TD><TD COLSPAN='2'><INPUT TYPE='text' SIZE=40 NAME='email'";

if (USE_APACHE_AUTHENTICATION) {
  $modulo = $modulo . " VALUE=" . $email;
}

$modulo = $modulo . ">
</TD></TR><TR><TD><B>$cif_pass</B></TD><TD COLSPAN='2'><INPUT TYPE=PASSWORD SIZE=40 NAME='epasswd'></TD>
</TR><TR><TD><CENTER><A HREF='$g_help_lng'>$g_help</A><BR><A HREF='adminoptions.php'>$g_options</A><BR>
<A HREF='index.php'>$g_home</A></CENTER></TD><TD ALIGN=center><INPUT TYPE=SUBMIT VALUE='$cif_send'></TD>
</TR></TABLE>";
?>

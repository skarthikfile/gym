<?php
require("lang.php");
echo "<HTML><HEAD><TITLE>$spf_title</TITLE></HEAD><BODY BGCOLOR='#000000'>
<CENTER>
<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=5 BGCOLOR='#DDDDDD'>
<FORM METHOD=POST ACTION=sendpass.php>
<TR>
<TD COLSPAN=2 BGCOLOR='#6677DD' ALIGN=CENTER>
<FONT SIZE=+1 COLOR='#FFFFFF' FACE='arial,helvetica'>$spf_sendmy</FONT></TD>
</TR>
<TR>
<TD><B>$spf_email</B></TD>
<TD><INPUT TYPE=TEXT SIZE=40 NAME=email></TD>
</TR>
<TR>
<TD><CENTER><A HREF='$g_help_lng'>$g_help</A><BR><A HREF='adminoptions.php'>$g_options</A><BR>
<A HREF='index.php'>$g_home</A></CENTER></TD>
<TD ALIGN=center><INPUT TYPE=SUBMIT VALUE='$spf_send'></TD>
</TR>
</FORM>
</TABLE>
</CENTER>
</BODY></HTML>";
?>

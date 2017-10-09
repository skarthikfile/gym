<?php
require("lang.php");

echo "<HTML><HEAD><TITLE>$cpf_chpass</TITLE></HEAD>
<BODY BGCOLOR='#000000'>
<CENTER>
<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=5 BGCOLOR='#DDDDDD'>
<FORM METHOD=POST ACTION=changepass.php?option=WRITE>
<TR>
<TD COLSPAN=2 BGCOLOR='#6677DD' ALIGN=CENTER>
<FONT SIZE=+1 COLOR='#FFFFFF' FACE='arial,helvetica'>$cpf_form
</FONT></TD>
</TR>
<TR>
<TD><B>$cpf_add</B></TD>
<TD><INPUT TYPE=TEXT SIZE=40 NAME=email></TD>
</TR>
<TR>
<TD><B>$cpf_pass</B></TD>
<TD><INPUT TYPE=PASSWORD SIZE=40 NAME=opasswd></TD>
</TR>
<TR>
<TD><B>$cpf_new</B></TD>
<TD><INPUT TYPE=PASSWORD SIZE=40 NAME=epasswd1></TD>
</TR>
<TR>
<TD><B>$cpf_check</B></TD>
<TD><INPUT TYPE=PASSWORD SIZE=40 NAME=epasswd2></TD>
</TR>
<TR>
<TD><CENTER><A HREF='$g_help_lng'>$g_help</A><BR><A HREF='adminoptions.html'>$g_options</A><BR><A HREF='index.php'>$g_home</A></CENTER></TD>
<TD ALIGN=center><INPUT TYPE=SUBMIT VALUE='$cpf_change'></TD>
</TR>
</FORM>
</TABLE>
</CENTER>

</BODY>
</HTML>";
?>

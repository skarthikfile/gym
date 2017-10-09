<?
require_once("lang.php");

echo "<HTML><HEAD><TITLE>$adm_opt</TITLE>";
echo "</HEAD><BODY BGCOLOR=\"#000000\">";
//-- Top part of table -->
echo "<CENTER><TABLE BGCOLOR=\"#CCCCCC\" BORDER=\"0\" CELLSPACING=\"1\" CELLPADDING=\"5\" WIDTH=50%>
<TR>
<TD BGCOLOR=\"#6677DD\">
<CENTER><FONT SIZE=\"+1\" FACE=\"arial,helvetica\" COLOR=\"#FFFFFF\">
$adm_opt</FONT></CENTER>
</TD></TR>
<TD>
<CENTER>
<A HREF=\"listdataform.php\">$adm_pending</A>
<P>
<A HREF=\"changepassform.php\">$adm_chpass</A>
<P>
<A HREF=\"sendpassform.php\">$adm_for_pass</A>
<P>
<A HREF=\"blockaddressform.php\">$adm_add</A>
<P>
</TD>
</TR>
<TR>
<TD ALIGN=center><A HREF=\"$g_help_lng\">$g_help</A><BR><A HREF=\"index.php\">$g_home</A></TD>
</TR>
</TABLE>
</BODY>
</HTML>";
?>

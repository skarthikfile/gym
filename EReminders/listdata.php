<?php
require("database.php");
require("include.php");
require("lang.php");
require("config.optional.php");

echo "<HTML><HEAD><TITLE>$lst_pend</TITLE>";

/* check password */
$result=mysql_query("SELECT *
                     FROM passwd
                     WHERE email='$email'");

while ($row=mysql_fetch_array($result)){
	$ckpasswd=$row['epasswd'];
}

if (  ( 
       ((USE_EREMINDERS_AUTHENTICATION) && ($ckpasswd=='')) 
       || ( (USE_APACHE_AUTHENTICATION) && ($result==0)) 
      )
    || ($email == '')) {
	echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=listdataform.php\"></HEAD><BODY BGCOLOR=\"#000000\" TEXT=#FFFFFF>";
	msg_box($lst_acc,"<CENTER>$lst_noacc</CENTER>",
	"black");
	echo "</BODY></HTML>";
	exit;
}

if ($ckpasswd==$epasswd){
	/* Query Database */
	$num=1;
	$result=mysql_query("   SELECT email, subject, comment,
UNIX_TIMESTAMP(date_field),id,recurring,recur_num,recur_val,adv_notice,notify_num,notify_val
        	                FROM notify
                	        WHERE email='$email'      ");
	echo "
	</HEAD><BODY BGCOLOR=\"#000000\"><FORM METHOD=POST ACTION=deletedata.php?option=WRITE>
	<INPUT TYPE=hidden NAME=email VALUE=$email>
	<INPUT TYPE=hidden NAME=epasswd VALUE=$epasswd>
	<CENTER>
	<TABLE BORDER=0 BGCOLOR=#DDDDDD CELLSPACING=1 CELLPADDING=3 WIDTH=80%>
	<FONT SIZE=+2>
	<TD COLSPAN=6 BGCOLOR=#6677DD>
	<CENTER>
	<FONT SIZE=+1 FACE=\"arial,helvetica\" COLOR=#FFFFFF>$lst_erem&nbsp;$email</FONT>
	</CENTER>
	</TD>
	<TR>
	<TD ALIGN=CENTER><B>$lst_del</B></TD>
	<TD ALIGN=CENTER><B>$lst_date</B></TD>
	<TD ALIGN=CENTER><B>$lst_note</B></TD>
	<TD ALIGN=CENTER><B>$lst_rec</B></TD>
	<TD ALIGN=CENTER><B>$lst_eve</B></TD>
	<TD ALIGN=CENTER><B>$lst_msg</B></TD>
	";

	while ($row=mysql_fetch_array($result)){
		$email=$row['email'];
		$subject=$row['subject'];
		$comment=$row['comment'];

		/* Get date field to friendly format */
		$date_field=$row['UNIX_TIMESTAMP(date_field)'];
		$neat_date=date($g_date,$date_field);

		$id=$row['id'];
		$recurring=$row['recurring'];
		$recur_num=$row['recur_num'];
		$recur_val=$row['recur_val'];
		$adv_notice=$row['adv_notice'];
		$notify_num=$row['notify_num'];
		$notify_val=$row['notify_val'];
		$r1=$recurring.", ".$recur_num." ".$recur_val;
		$n1=$adv_notice.", ".$notify_num." ".$notify_val;
		if ($recurring=="") {$r1="no";}
		if ($adv_notice=="") {$n1="no";}
		echo "
		<TR>
		<TD ALIGN=CENTER>
		<INPUT TYPE=checkbox VALUE=$id NAME=del[$num]></TD>
		<TD ALIGN=CENTER>$neat_date $dbtimezone</TD>
		<TD ALIGN=CENTER>$n1</TD>
		<TD ALIGN=CENTER>$r1</TD>
		<TD ALIGN=CENTER>&nbsp;$subject</TD>
		<TD>&nbsp;$comment</TD>
		";
		$num=$num+1;
        }
	if ($num==1) {
		echo "
		<TR>
		<TD COLSPAN=6 ALIGN=CENTER>
		<FONT SIZE=+1>
		<BR><BR><BR>
		<B>$lst_nopend</B>
		<BR><BR><BR>
		</FONT>
		</TD>
		";
	}
	echo "<TR><TD COLSPAN=5 ALIGN=CENTER>
	<INPUT TYPE=submit VALUE='$lst_delentry'>
	</TD>
	<TD ALIGN=CENTER><A HREF=\"$g_help_lng\">$g_help</A><BR><A HREF=\"adminoptions.php\">$g_options</A><BR>
	<A HREF=\"index.php\">$g_home</A></TD>
	</TR>
	</FORM></TABLE></FONT></CENTER>
	";
}
else {
	echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=listdataform.php\"></HEAD><BODY BGCOLOR=\"#000000\" TEXT=#FFFFFF>";
	msg_box($lst_npass,"<CENTER>$lst_again</CENTER>",
	"black");
}

echo "</BODY></HTML>";
?>

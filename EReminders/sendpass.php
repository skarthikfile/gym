<?php
require("database.php");
require("include.php");
require("lang.php");

echo "<HTML><HEAD><TITLE>$cpp_chpass</TITLE>";
/* check password */
$result=mysql_query("SELECT *
                     FROM passwd
                     WHERE email='$email'");
if ($result){
	$row=mysql_fetch_array($result);
	$ckpasswd=$row['epasswd'];
	$email=$row['email'];
	$blocked=$row['eblocked'];
}
$result=mysql_query("	SELECT unix_timestamp(esentpass)
			FROM passwd
			WHERE email='$email'");

if ($result){
	$row=mysql_fetch_array($result);
	$date_field=$row['unix_timestamp(esentpass)'];
}

$unixtime=date("U");

if (($ckpasswd != "") && ($blocked=='N') && ($unixtime-$date_field>86400))
{
	@mysql_query("	UPDATE passwd
			SET esentpass=NOW()
			WHERE email='$email'");
	$message.="$snd_msg1 $REMOTE_ADDR\n";
	$message.="$snd_msg2\n";
	$message.="$snd_msg3  \n\n";
	$message.="$snd_msg4 $ckpasswd\n\n";
	$message.="$snd_msg5 $site\n";
	$message.="$snd_msg6\n";

	mail ($email, "$snd_pass", $message, "From: $from");

	echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"10; URL=index.php\"></HEAD><BODY BGCOLOR=#000000>";

	msg_box($snd_spr,
	"<CENTER>$snd_sent</CENTER>", "black");
}
else {
	echo "</HEAD><BODY BGCOLOR=#000000>";
	msg_box($snd_spr,
	"<CENTER><B>$email</CENTER><P>$snd_msg01</B><P>$snd_msg02&nbsp;<A HREF=index.php>$snd_msg03</A>&nbsp;$snd_msg04&nbsp;\"$snd_emailto\"&nbsp;$snd_msg05&nbsp;\"$snd_save\"", "black");
}
echo "</CENTER></BODY></HTML>";

?>

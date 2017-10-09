<?php
require("database.php");
require("include.php");
require("lang.php");

//-- Code for top of page -->
echo "<HTML><HEAD><TITLE>$blkp_blkd</TITLE>";

/* check password */
$result=mysql_query("SELECT *
                     FROM passwd
                     WHERE email='$email'");

while ($row=mysql_fetch_array($result)){
	$ckpasswd=$row['epasswd'];
	$blocked=$row['eblocked'];
}

if ($ckpasswd==''){
		echo "</HEAD><BODY BGCOLOR=#000000>";
		msg_box($blkp_not,
		$blkp_msg1, "black");
		echo "</BODY></HTML>";
		exit;
}

if ($ckpasswd==$epasswd){
	if ($blocked=='N'){
		// Block from further messages
		@mysql_query("	UPDATE passwd
				SET eblocked='Y' WHERE email='$email'");
		// Delete any entries in the database
		@mysql_query("	DELETE FROM notify
				WHERE email='$email'");
		echo "</HEAD><BODY BGCOLOR=#000000>";
		msg_box($blkp_blkd, $blkp_msg2.":<P><B>".$blkp_note."</B>".$blkp_msg3, "black");
	}
	else {
		@mysql_query("	UPDATE passwd
				SET eblocked='N' WHERE email='$email'");
		echo "</HEAD><BODY BGCOLOR=#000000>";
		msg_box($blkp_unblk, $blkp_msg4, "black");
	}
}
else {
	echo "</HEAD><BODY BGCOLOR=\"#000000\" TEXT=#FFFFFF>";
	msg_box($blkp_pass,$blkp_again, "black");
}
echo "</BODY></HTML>";
?>

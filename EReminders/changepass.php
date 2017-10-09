<?php
require("database.php");
require("include.php");
require("lang.php");
require("config.optional.php");

echo "<HTML><HEAD><TITLE>".$cpp_chpass."</TITLE>";

/* check password */
$result=mysql_query("SELECT *
                     FROM passwd
                     WHERE email='$email'");



// Algorithm note:
// need to compare general case then particular case
// This is because I need to check if (result != 0) so that I can store passwd.epasswd into variable

if (($result!=0) && ($email != '') ){ // email should never be blank... this is established in earlier preconditions
	$row=mysql_fetch_array($result);
	$ckpasswd=$row['epasswd'];
}

if (   ($result == 0)
    || ($email == '')
    || ( (USE_EREMINDERS_AUTHENTICATION) && ($ckpasswd == '') )  ){ // passwd will be blank if apache auth
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"5; URL=changepassform.php\"></HEAD><BODY BGCOLOR=\"#000000\" TEXT=#FFFFFF>";
	msg_box($cpp_not,
	"<CENTER>".$cpp_notdb."</CENTER>",
	"black");
	echo "</BODY></HTML>";
	exit;
}



if ($ckpasswd==$opasswd)
{
	if (  ($epasswd1!=$epasswd2) 
            || ((USE_EREMINDERS_AUTHENTICATION) && ($epasswd1==''))  ) {
		echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"10; URL=changepassform.php\"></HEAD><BODY BGCOLOR=\"#000000\" TEXT=#FFFFFF>";

                if (USE_EREMINDERS_AUTHENTICATION) {
                  $changepass_nonmatch_password_commentary = $cpp_again_1 . " " . $cpp_again_2; 
                }
                else if (USE_APACHE_AUTHENTICATION) {
                  $changepass_nonmatch_password_commentary = $cpp_again_1; 
                }

		msg_box($cpp_res, $changepass_nonmatch_password_commentary, "black");
		echo "</BODY></HTML>";
	}
	else {	@mysql_query("		UPDATE passwd
					SET epasswd='$epasswd1'
					WHERE email='$email'");

		echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"3; URL=index.php\"></HEAD><BODY BGCOLOR=\"#000000\" TEXT=#FFFFFF>";
		msg_box($cpp_res,"<CENTER>$cpp_ok</CENTER>",
		"black");
		$epasswd=$epasswd1;
	}
}

else { 	echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"5; URL=changepassform.php\"></HEAD><BODY BGCOLOR=\"#000000\" TEXT=#FFFFFF>";
	msg_box($cpp_res,"<CENTER>$cpp_inc</CENTER>",
	"black");

	$epasswd=$opasswd; /* set password to null since user doesn't know it */
}

echo "</CENTER></BODY></HTML>";
?>

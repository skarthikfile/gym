<?php
require("database.php");
require("include.php");
require("lang.php");
require("config.optional.php");

echo "<HTML><HEAD><TITLE>$ins_esub</TITLE></HEAD><BODY BGCOLOR='#000000'><CENTER>";

/* check password to make sure it is correct OR blank */
$result=mysql_query("	SELECT *
			FROM passwd
			WHERE email='$email'");

while ($row=mysql_fetch_array($result)){
	$ckpasswd=$row['epasswd'];
	$blocked=$row['eblocked'];
}

$edate=date("M d Y, h:ia ").$dbtimezone;

/* Is this a new user that doesn't have a password yet?  Joy! :-) */
if (  ( 
       ((USE_EREMINDERS_AUTHENTICATION) && ($ckpasswd=="")) 
       || ( (USE_APACHE_AUTHENTICATION) && ($result==0)) 
      )
    && ($email != ''))
{
	/* Let's generate a new random password */

	// Seed random generator
	srand((double)microtime()*1000000);

	for ($i=1; $i<=$passlength; $i++){
		$epasswd=$epasswd.chr(rand(97,122));
	}

if (RESTRICT_NEW_USER_REGISTRATION) {
} else if (PERMIT_NEW_USER_REGISTRATION) {
	@mysql_query("	INSERT INTO passwd (email,epasswd,eip,edate)
			VALUES ('$email','$epasswd','$REMOTE_ADDR','$edate')");
}
	$ckpasswd=$epasswd;

	$message = $ins_req. " ".$REMOTE_ADDR." ".$ins_made."\n";
	$message .= $ins_add."\n";
	$message .= $ins_at." ".$site.".  \n\n";
	$message .= $ins_log." ".$epasswd;
	$message .= "\n\n".$ins_msg1.": \n".$site.".  \n\n";
	$message .= "\n".$ins_msg2."\n";
	$message .= $ins_msg3."\n";
	$message .= $ins_msg4."\n";

if (RESTRICT_NEW_USER_REGISTRATION) {
} else if (PERMIT_NEW_USER_REGISTRATION) {
	mail ($email, $ins_rem, $message,"From: $from");
}

	msg_box($ins_new,
	$ins_set."<P>".$ins_sent." ".$email.$ins_back1." <b>".$ins_back2."</b> ".$ins_back3."<P>".$ins_tnx,"black");

	// Yes, this exit in the middle is not optimal, but it works.
	echo "</BODY></HTML>";
	exit;
}

/* if password matches, do the database add */
if ($ckpasswd==$epasswd)
{
	/* Rewrite the passwd data to update edate and eip */
	@mysql_query("	UPDATE passwd
			SET edate='$edate'
			WHERE email='$email'");
	/* ...maybe this can be shortened to just one query? */
	@mysql_query("	UPDATE passwd
			SET eip='$REMOTE_ADDR'
			WHERE email='$email'");

	/* Construct Database Query , also check for 12 pm/am idiosyncracy */

        if ($hour == "12") {$hour="00";}
        if ($ampm == "pm") {$hour=$hour+12;}

	$query=$year.$month.$cal_day.$hour.$minute."00";
	$id=uniqid("");

	$shortcomment=$comment;

	/* Show the time THEY set the event for, in THEIR timezone */
	if ($adv_notice == "yes"){
		$comment=$month."-".$cal_day."-".$year." at ".$hour.":".$minute." GMT".($localzone>=0?'+':'').$localzone."...\n\n".$comment;
	}

	@mysql_query("	INSERT INTO notify
				(date_field,email,comment,recur_num,
				 recur_val,adv_notice,notify_num,notify_val,
				 recurring,id,subject)
			VALUES
				('$query','$email','$comment','$recur_num',
				 '$recur_val','$adv_notice',
				 '$notify_num','$notify_val','$recurring','$id','$subject')
				");

	/* 	if advanced notice was checked calculate actual notify date
		and update.  this is kind of messy.  we really could be
		using the newer mysql support for this.  Maybe we'll find
		time to do it one day
	*/
	if ($adv_notice=="yes") {
			$result=mysql_query("	SELECT *
               		                   	FROM notify
                                  		WHERE id='$id'");
 			$row=mysql_fetch_array($result);
			$interval=$row['notify_num'];

	                switch ($row['notify_val']) {
                        case "day"      :
                                $interval=$interval*86400;
                                break;
                        case "minute"      :
                                $interval=$interval*60;
                                break;
                        case "hour"     :
                                $interval=$interval*3600;
                                break;
                        case "month"    :
				$interval=$interval*2592000;
                                break;
                        case "year"     :
                                $interval=$interval*31536000;
                                break;
					}
			$result=mysql_query("
					SELECT unix_timestamp(date_field)
                        	        FROM notify
                                	WHERE id='$id'
			");

                	$row=mysql_fetch_array($result);
			$new_time=$row['unix_timestamp(date_field)']-$interval;

                	@mysql_query("  UPDATE notify
					SET date_field=FROM_UNIXTIME($new_time)
                                        WHERE id='$id'");
	}

	/* Adjust event date to compensate for Timezone user selected */
	$result=mysql_query("
		SELECT unix_timestamp(date_field)
                FROM notify
                WHERE id='$id'
	");

        $row=mysql_fetch_array($result);
	$new_time=$row['unix_timestamp(date_field)']-(($localzone-$dbtzoffset)*3600);

        @mysql_query("  UPDATE notify
			SET date_field=FROM_UNIXTIME($new_time)
                        WHERE id='$id'");

	echo "<TABLE BGCOLOR=#CCCCCC BORDER=0 CELLSPACING=1 CELLPADDING=5 WIDTH=60%>
	<TR><TD COLSPAN=2 BGCOLOR=#6677DD ALIGN=CENTER><B><CENTER>
	<FONT SIZE=+1 COLOR=#FFFFFF FACE='arial,helvetica'>$ins_sub</FONT></CENTER></B></TD>";

        if ( ($hour == "00") || ($hour == "12") ) {
          if ($minute == "00") { 

            echo "<TR><TD COLSPAN=2 BGCOLOR=#FFFF00 ALIGN=LEFT>";
            echo "<FONT SIZE=+1 COLOR=#000000 FACE='arial,helvetica'>";
          
            echo $insertdata_page_noon_midnight_caveat_1 . ":";

            echo "<br/><br/>" . $insertdata_page_noon_midnight_caveat_2;
            echo "<BR/></BR>" . $insertdata_page_noon_midnight_caveat_3;
            echo " " . $insertdata_page_noon_midnight_caveat_4; 

            echo "<br/><br/><div align=\"center\"><FONT COLOR=#FF0000><b>" 
               . $insertdata_page_noon_midnight_caveat_message_scheduled 
               . "</FONT></div></b>";

            echo "<br/><div align=\"right\">" . $insertdata_page_noon_midnight_caveat_links . ":";
            echo "<BR/><A HREF=\"http://greenwichmeantime.com/info/noon.htm\">" 
               . $insertdata_page_noon_midnight_link_1 . "</A>";
            echo "<BR/><A HREF=\"http://www.google.com/search?q=noon+midnight+12+AM+12+PM\">"
               . $insertdata_page_noon_midnight_link_2 . "</A>";
            echo "</div><P>";
            echo "</FONT></TD>";
          }
        }

        echo "<TR><TD ALIGN=CENTER COLSPAN=2><FONT SIZE=+1>";
	echo "$ins_msg $email<P>$ins_time <BR>	$month/$cal_day/$year $hour:$minute:00 GMT".($localzone>=0?'+':'')."$localzone
	<P>$ins_eve $subject<P>$ins_cont<BR>$shortcomment</FONT></TD></TR>
	<TR><TD ALIGN=center>
	<FORM METHOD=POST ACTION=listdata.php>
	<INPUT TYPE=hidden VALUE=$email NAME=email>
	<INPUT TYPE=hidden VALUE=$epasswd NAME=epasswd>
	<INPUT TYPE=submit VALUE='$ins_edit'>
	</FORM></TD>
	<TD ALIGN=center>
	<A HREF=\"$g_help_lng\">$g_help</A><BR><A HREF=\"adminoptions.php\">$g_options</A><BR><A HREF=\"index.php\">$g_home</A>
	</TD></TR>
	</TABLE></CENTER>";
}
else {
	msg_box($ins_inc,$ins_blk, "black");
}
?>
</BODY></HTML>

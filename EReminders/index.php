<?php
require("config.php");
require("lang.php");
require("config.optional.php");

echo "<HTML><HEAD><TITLE>$ndx_title</TITLE></HEAD><BODY BGCOLOR=\"#000000\"><CENTER>";
//-- Top Bar of Table --
echo "<TABLE BORDER=0 CELLPADDING=5 CELLSPACING=1 WIDTH=85% BGCOLOR=\"#CCCCCC\">
<FORM METHOD=POST ACTION=\"insertdata.php?option=WRITE\">
<TR><TD WIDTH=\"10%\" ALIGN=CENTER BGCOLOR=\"#6677DD\">
<FONT SIZE=+1 Face=\"arial,helvetica\" COLOR=\"#FFFFFF\">$ndx_eve</FONT></TD>
<TD WIDTH=\"50%\" ALIGN=CENTER BGCOLOR=\"#6677DD\">
<FONT Face=\"arial,helvetica\" COLOR=\"#FFFFFF\">
$ndx_msg1&nbsp;$ndx_clk&nbsp;\"$ndx_save\"&nbsp;$ndx_msg2&nbsp;$ndx_msg3&nbsp;\"$ndx_options\"&nbsp;$ndx_msg4&nbsp;\"$ndx_pending\"
</FONT></TD>
<TD WIDTH=\"40%\" ALIGN=CENTER BGCOLOR=\"#6677DD\">
<FONT SIZE=+1 Face=\"arial,helvetica\" COLOR=\"#FFFFFF\">$ndx_sys</FONT></TD></TR>";

//-- Date --
// $monthname=date(\"F\");
$monthnum=date('m');
$yearnum=date('Y');
$dayname=date('j');
$daynum=date('d');


// mese
$mese=
  "<SELECT NAME=month>"
. "<OPTION SELECTED VALUE=" . $monthnum . ">" . $ndx_mese[((integer)$monthnum)] . "</OPTION>"
. "<OPTION VALUE=01>" . $ndx_mese[1] . "</OPTION>"
. "<OPTION VALUE=02>" . $ndx_mese[2] . "</OPTION>"
. "<OPTION VALUE=03>" . $ndx_mese[3] . "</OPTION>"
. "<OPTION VALUE=04>" . $ndx_mese[4] . "</OPTION>"
. "<OPTION VALUE=05>" . $ndx_mese[5] . "</OPTION>"
. "<OPTION VALUE=06>" . $ndx_mese[6] . "</OPTION>"
. "<OPTION VALUE=07>" . $ndx_mese[7] . "</OPTION>"
. "<OPTION VALUE=08>" . $ndx_mese[8] . "</OPTION>"
. "<OPTION VALUE=09>" . $ndx_mese[9] . "</OPTION>"
. "<OPTION VALUE=10>" . $ndx_mese[10] . "</OPTION>"
. "<OPTION VALUE=11>" . $ndx_mese[11] . "</OPTION>"
. "<OPTION VALUE=12>" . $ndx_mese[12] . "</OPTION>"
. "</SELECT>";

// Giorno
$giorno="<SELECT NAME=cal_day>
<OPTION SELECTED VALUE=$daynum>$dayname</OPTION>
<OPTION VALUE=01>1</OPTION>
<OPTION VALUE=02>2</OPTION>
<OPTION VALUE=03>3</OPTION>
<OPTION VALUE=04>4</OPTION>
<OPTION VALUE=05>5</OPTION>
<OPTION VALUE=06>6</OPTION>
<OPTION VALUE=07>7</OPTION>
<OPTION VALUE=08>8</OPTION>
<OPTION VALUE=09>9</OPTION>
<OPTION>10</OPTION>
<OPTION>11</OPTION>
<OPTION>12</OPTION>
<OPTION>13</OPTION>
<OPTION>14</OPTION>
<OPTION>15</OPTION>
<OPTION>16</OPTION>
<OPTION>17</OPTION>
<OPTION>18</OPTION>
<OPTION>19</OPTION>
<OPTION>20</OPTION>
<OPTION>21</OPTION>
<OPTION>22</OPTION>
<OPTION>23</OPTION>
<OPTION>24</OPTION>
<OPTION>25</OPTION>
<OPTION>26</OPTION>
<OPTION>27</OPTION>
<OPTION>28</OPTION>
<OPTION>29</OPTION>
<OPTION>30</OPTION>
<OPTION>31</OPTION>
</SELECT>";

// anno
$anno="<SELECT NAME=year>
<OPTION SELECTED>$yearnum<br>
<OPTION>2017
<OPTION>2018
<OPTION>2019
<OPTION>2020
<OPTION>2021
<OPTION>2022
<OPTION>2023
</SELECT>";

// $g_date="D d M Y H:i:s";

$ordData=Array($giorno=>strpos($g_date,"d"), $anno=>strpos($g_date,"Y"), $mese=>strpos($g_date,"M"));

asort($ordData, SORT_NUMERIC);
reset ($ordData);
echo "<TR><TD BGCOLOR=\"#CCCCCC\"><TD BGCOLOR=\"#CCCCCC\">
<A HREF=\"adminoptions.php\">$g_options</A>&nbsp;&nbsp;&nbsp;
<A HREF=\"$g_help_lng\">$g_help</A></TD>
<TD BGCOLOR=\"#CCCCCC\">
<FONT SIZE=+1 face=\"arial,helvetica\"><B>$ndx_advs</B></FONT></TD>
</TR>
<TR><TD>
<B>$ndx_date</B>
</TD>
<TD><IMG SRC=\"q.gif\" ALT=\"$ndx_alt\" title=\"$ndx_alt\">&nbsp;&nbsp;&nbsp;";
while (list ($key, $val) = each ($ordData)) {
   echo "$key";
}
echo "</TD>";

// -- Beginning of Advanced Settings Column --
echo "
<TD>
<!-- FONT SIZE=+1 face=\"arial,helvetica\"><B>$ndx_advs</B></FONT><BR -->
<INPUT TYPE=checkbox  VALUE=yes NAME=recurring><B>$ndx_rev</B>&nbsp;$ndx_yes
<BR>
<SELECT NAME=recur_num>";
for ( $i=1; $i<=59;$i++ )
{
	echo "<OPTION>$i\n";
}
echo "</SELECT>
<SELECT NAME=recur_val>
<OPTION VALUE=year>$ndx_yrs
<OPTION VALUE=month>$ndx_mns
<OPTION VALUE=day>$ndx_day
</SELECT>
</TD></TR>";
$hourname=date('g');
$hournum=date('h');
$minutenum=date('i');
echo "<TR><TD><B>$ndx_time</B></TD><TD>
<IMG SRC=\"q.gif\" ALT=\"$ndx_sel\" title=\"$ndx_sel\">&nbsp;&nbsp;&nbsp;<SELECT NAME=hour>
<OPTION SELECTED VALUE=$hournum>$hourname<br>
<OPTION VALUE=01>1
<OPTION VALUE=02>2
<OPTION VALUE=03>3
<OPTION VALUE=04>4
<OPTION VALUE=05>5
<OPTION VALUE=06>6
<OPTION VALUE=07>7
<OPTION VALUE=08>8
<OPTION VALUE=09>9
<OPTION>10
<OPTION>11
<OPTION>12
</SELECT>";
echo "<SELECT NAME=minute>
<OPTION SELECTED>$minutenum<br>
<OPTION>00
<OPTION>05
<OPTION>10
<OPTION>15
<OPTION>20
<OPTION>25
<OPTION>30
<OPTION>35
<OPTION>40
<OPTION>45
<OPTION>50
<OPTION>55
</SELECT>";
$meridianname=date('A');
$meridiannum=date('a');
echo "<SELECT NAME=ampm>
<OPTION SELECTED VALUE=$meridiannum>$meridianname
<OPTION VALUE=pm>PM
<OPTION VALUE=am>AM
</SELECT><BR>";
// -- timezone --
echo "<select name=\"localzone\">";
reset($ndx_dbtz);
while (list ($key, $val) = each ($ndx_dbtz)) {
	if($key==($defaulttz) ) {
   	echo "<option selected value=\"$key\">$val";
	}else{
   	echo "<option value=\"$key\">$val";
	}
}
echo "</select>
</TD>
<TD WIDTH='20%' BGCOLOR='#CCCCCC'>
<INPUT TYPE=checkbox  VALUE=yes NAME=adv_notice>
<B>$ndx_ntc</B>$ndx_pls<BR>
<SELECT NAME=notify_num>";
for ( $i=1; $i<=59;$i++ )
{
	echo "<OPTION>$i\n";
}
echo "</SELECT>
<SELECT NAME=notify_val>
<OPTION VALUE=minute>$ndx_min
<OPTION VALUE=hour>$ndx_hrs
<OPTION VALUE=day>$ndx_day
<OPTION VALUE=month>$ndx_mns
<OPTION VALUE=year>$ndx_yrs
</SELECT>
<BR>$ndx_adv</TD>
</TR>";
// -- Password Row --
echo "<TR><TD>
<B>$ndx_pwd</B></TD><TD><IMG SRC=\"q.gif\" ALT=\"$ndx_acc\" title=\"$ndx_acc\">&nbsp;&nbsp;&nbsp;
<INPUT TYPE=PASSWORD SIZE=40 NAME=\"epasswd\">
</TD><TD><!-- A HREF=\"$g_help_lng\">$g_help</A --></TD>
</TR>";
// -- Email Address row --

if (USE_APACHE_AUTHENTICATION) {
  $email = $REMOTE_USER;
  if ( ( !(ereg("@",$email))) && ( $email != '' )){
        $email = $email.$hostmask;
  }
}

echo "<TR><TD>
<B>$ndx_emt</B></TD><TD>
<IMG SRC=\"q.gif\" ALT=\"$ndx_add\" title=\"$ndx_add\">&nbsp;&nbsp;&nbsp;
<INPUT TYPE=TEXT SIZE=40 NAME=email";

if (USE_APACHE_AUTHENTICATION) {
  echo " VALUE=" . $email;
}


echo "></TD><TD>
<!-- A HREF=\"adminoptions.php\">$g_options</A--></TD>
</TR>";

//-- Subject Row --
echo "<TR><TD>
<B>$ndx_eve_name</B></TD><TD>
<IMG SRC=\"q.gif\" ALT=\"$ndx_eve_desc\" title=\"$ndx_eve_desc\">&nbsp;&nbsp;&nbsp;
<INPUT TYPE=SUBJECT SIZE=40 NAME=\"subject\">
</TD><TD></TD></TR>";

// -- Message Row --
echo "<TR><TD>
<B>$ndx_msg</B>&nbsp;&nbsp;&nbsp;<IMG SRC=\"q.gif\" ALT=\"$ndx_body\" title=\"$ndx_body\"></TD><TD></TD>
<TD><INPUT TYPE=submit VALUE=$ndx_save>&nbsp;&nbsp;&nbsp;
<IMG SRC=\"q.gif\" ALT=\"$ndx_clk&nbsp;$ndx_save&nbsp;$ndx_str\" title=\"$ndx_clk&nbsp;$ndx_save&nbsp;$ndx_str\">
</TD></TR>
<TR><TD COLSPAN=\"3\">
<TEXTAREA NAME=\"comment\" COLS=\"70\" WRAP=hard ROWS=\"10\"></TEXTAREA>
</TD></TR>
</FORM>
</TABLE>
</CENTER>
</BODY>
</HTML>";
?>

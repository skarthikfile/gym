<?
/*	This is where you set the default E-mail address
	(i.e. if $default_email is set to @company.com, then any E-mail
	addresses entered without an @ symbol in them will automatically
	have @company.com appended to them)
*/
$hostmask="@company.com";
/* -----------------04/10/2003 16.56-----------------
this will appear in the header line "From: "
nino@vessella.it
 --------------------------------------------------*/
$from="E*Reminder";

/*	The web site location where E-reminders will be
	available.	*/
$site="http://www.company.com/reminder";

/*	MySQL Database Information:  Read the README file for more
	information.  	*/

$dbhost= "localhost";
$dbuser= "root";
$dbpass= "root";
$db_name= "dbgym";

/* Specify the length of the generated random password for new users */
$passlength= "6";

/* Specify the timezone your MySQL server runs in */
$dbtimezone= "EST";

/*
0=   "GMT Greenwich Mean Time, London, Dublin, Edinburgh",
1=   "GMT+1 Berlin,Rome,Paris,Stockholm,Warsaw,Amsterdam",
2=   "GMT+2 Israel, Cairo, Athens, Helsinki, Istanbul",
3=   "GMT+3 Moscow, St. Petersburg, Kuwait, Baghdad",
4=   "GMT+4 Abu Dhabi, Muscat, Mauritius, Tbilisi, Kazan",
5=   "GMT+5 Islamabad, Karachi, Ekaterinburg, Tashkent",
6=   "GMT+6 Zone E7, Almaty, Dhaka",
7=   "GMT+7 Bangkok, Jakarta, Hanoi",
8=   "GMT+8 Hong Kong, Beijing, Singapore, Taipei",
9=   "GMT+9 Tokyo, Osaka, Seoul, Sapporo, Yakutsk",
10=  "GMT+10 Sydney, Melbourne, Guam, Vladivostok",
11=  "GMT+11 Zone E12, Magadan, Soloman Is.",
12=  "GMT+12 Fiji, Wellington, Auckland, Kamchatka",
-11= "GMT-11 Zone W11, Miway Island, Samoa",
-10= "GMT-10 Hawaii",
-9=  "GMT-9 Alaska, Anchorage",
-8=  "GMT-8 PST-Pacific US, San Francisco, Los Angeles",
-7=  "GMT-7 MST-Mountain US, Denver, Arizona",
-6=  "GMT-6 CST-Central US,Chicago,Mexico,Sackatchewan",
-5=  "GMT-5 EST-Eastern US, New York, Bogota, Lima",
-4=  "GMT-4 Atlantic, Canada, Barbados, Caracas,La Paz",
-3=  "GMT-3 Brazilia, Buenos Aries, Rio de Janeiro",
-2=  "GMT-2 Zone W2, Mid-Atlantic",
-1=  "GMT-1 Zone W1, Azores, Cape Verde Is".
*/


/* Specify the server timezone as an offset from GMT. Modify as per the list above */
$dbtzoffset= -5;

/* Specify the timezone presented to users suggested by default when user makes new E*Reminder event. */
$defaulttz= -5;


/* -----------------04/10/2003 17.48-----------------
Please choose the date format:
 25 12 2003 feb 25 12 2003 13:50:10
 $g_date="D d M Y H:i:s"
 $ins_neat_date ->$g_date

 Feb 12 25, 2003 1:50:10 pm
 $g_date="D M d, Y h:i:s A"
 nino@vessella.it
  --------------------------------------------------*/
 $g_date="D M d, Y h:i:s A";
 $g_formdate="d M H:i";





/* FINALLY

ENGLISH IS SELECTED BY DEFAULT.

IF YOU INTEND TO USE A LANGUAGE OTHER THAN ENGLISH IN YOUR INSTALLATION,
view lang.php for further instructions

OTHERWISE,
You're done.
*/

?>

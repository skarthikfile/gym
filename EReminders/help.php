<?

require("lang.php");

echo "
<!doctype html public \"-//w3c//dtd html 4.0 transitional//en\">
<html>
<head>
   <title>$help_page_browser_title </title>
</head>
<body bgcolor=\"#FFFFFF\">

<center>
<h2>
$help_page_title</h2></center>

<h4>
$help_page_how_to_setup_email_q </h4>
$help_page_how_to_setup_email_a <h4>
$help_page_how_to_use_q </h4>
$help_page_how_to_use_a
<br>&nbsp;
<br>&nbsp;
<h4>
$help_page_advanced_options_q </h4>
$help_page_advanced_options_a 
<p>$help_page_advanced_options_example_q 
$help_page_advanced_options_example_a 
<h4>
$help_page_anything_else_q </h4>
$help_page_anything_else_a
<h4>
$help_page_about_software_q </h4>
$help_page_about_software_a_p1
 
<p>$help_page_about_software_a_p2 
<p>$help_page_about_software_a_p3 
&nbsp;
<hr>$help_page_exit 
</body>
</html>"
?>

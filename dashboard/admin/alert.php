<?php

require 'db_conn.php';

$host = "localhost"; 
$user = "root"; 
$pass = "root"; 
$db = "dbgym";
mysqli_connect($host,$user,$pass) or die("ERROR:".mysqli_connect_error());
 
$query="SELECT id, mem_id, name, sub_type, paid_date, expiry, `total`, `paid`, `invoice`, `sub_type_name`, `bal`, `exp_time`, `renewal` FROM subsciption WHERE expiry > NOW()+7 ORDER BY subsciption ASC";


$i=0;

while ($i < $num) {
    $id = mysqli_result($result, $i, "id");
    $mem_id = mysqli_result($result, $i, "mem_id");
    $sub_type = mysqli_result($result, $i, "sub_type");
    $paid_date = mysqli_result($result, $i, "paid_date");
    $expiry = mysqli_result($result, $i, "expiry");
    $total = mysqli_result($result, $i, "total");
    $paid = mysqli_result($result, $i, "paid");
    $invoice = mysqli_result($result, $i, "invoice");
    $sub_type_name = mysqli_result($result, $i, "sub_type_name");
    $bal = mysqli_result($result, $i, "bal");
    $exp_time = mysqli_result($result, $i, "exp_time");
    $renewal = mysqli_result($result, $i, "renewal");
    $to = 'skarthikfile@gmail.com';
    $subject = 'Domain renewall reminder';
    $message = 'The following domains will expire in 7 days
 
<BR><BR>
$domain_name - $company_name<BR>
<BR><BR>
Dont forget to renew!<BR><BR>
Domain Team
';
    $headers = 'From: skarthikfile@gmail.com' . "\r\n" .
        'Reply-To: skarthikfile@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
}
?>








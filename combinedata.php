<?php
require 'connection.php';
session_start();

$mysql_results = mysql_query("select a12.qtr_desc,a12.qtr_id,a11.revenue,a11.wheels_count,a11.hours,a11.invoice_count from fct_awrs_order_month a11 left  outer join dim_month a12 on a11.month_id=a12.month_id where a11.franchise_id='".$_SESSION['franchise_id']."' and a12.month_end_date >'". $_SESSION['datefrom']."'
 and a12.month_start_date <'". $_SESSION['dateto']."' group by a11.month_id,a11.franchise_id");

$row = array();
while($r = mysql_fetch_assoc($mysql_results)) {
    $row[] = $r;
}
$json_personal_information=json_encode($row);
//echo $json_personal_information;






$mysql_result = mysql_query("select AVG(a11.revenue) average from fct_awrs_order_month a11 left  outer join dim_month a12 on a11.month_id=a12.month_id where a11.franchise_id='".$_SESSION['franchise_id']."' and a12.month_end_date >'". $_SESSION['datefrom']."'
 and a12.month_start_date <'". $_SESSION['dateto']."'");

$rows = array();
while($r = mysql_fetch_assoc($mysql_result)) {
    $rows[] = $r;
}
$json_doctor_information=json_encode($rows);
//echo $json_doctor_information;

echo $merger=json_encode(array_merge(json_decode($json_personal_information, true),json_decode($json_doctor_information, true)));



?>
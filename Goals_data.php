<?php

require 'connection.php';



include 'ChromePhp.php';
ChromePhp::log('Hello console!');
ChromePhp::log($_SERVER);
ChromePhp::warn('something went wrong!'); 

 	
 // add the header line to specify that the content type is JSON
    header("Content-type: application/json");

    // determine the request type
    $verb = $_SERVER["REQUEST_METHOD"];


       // handle a GET 
    if ($verb == "GET") {
        $query2= mysql_query("select substr(a12.month_desc,1,3) month_desc,a12.month_id,a11.revenue,a11.wheels_count,a11.hours,a11.invoice_count from fct_awrs_order_month a11 left  outer join dim_month a12 on a11.month_id=a12.month_id where a11.franchise_id='1' and a12.month_end_date >'2013-01-01'
 and a12.month_start_date <'2013-12-31' group by a11.month_id,a11.franchise_id");

$arr= array();

  while ($row2=mysql_fetch_assoc($query2)) {

        $arr[]=$row2;
      }

      echo json_encode($arr);
    }

// handle a POST  
    if ($verb == "POST") {

 // DISCLAIMER: It is better to use PHP prepared statements to communicate with the database. 
        //             this provides better protection against SQL injection.
        //             [http://php.net/manual/en/pdo.prepared-statements.php][4]
        // get the parameters from the post. escape them to protect against sql injection.

       $rev = mysql_real_escape_string($_POST["revenue"]);
 $whl = mysql_real_escape_string($_POST["wheels_count"]);
$hr = mysql_real_escape_string($_POST["hours"]);
 $ic = mysql_real_escape_string($_POST["invoice_count"]);
 $mon = mysql_real_escape_string($_POST["month_id"]);

 $query = sprintf("UPDATE fct_awrs_order_month SET revenue = '" . $rev ."',wheels_count = '" . $whl ."',hours = '" . $hr ."',invoice_count = '" . $ic ."' WHERE month_id = '" .$mon. "' and franchise_id='1' ");

 console.log($query);

        $rs = mysql_query("UPDATE fct_awrs_order_month SET revenue = '" . $rev ."',wheels_count = '" . $whl ."',hours = '" . $hr ."',invoice_count = '" . $ic ."' WHERE month_id = '" .$mon. "' and franchise_id='1' ");
if ($rs) {
        
        return $rs;
    }
    else {
        header("HTTP/1.1 500 Internal Server Error");
        echo "Update failed for Month: ";
    }

     
}
      

?>
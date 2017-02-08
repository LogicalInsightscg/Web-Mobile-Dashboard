<?php

require 'connection.php';




 	
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

 parse_str(file_get_contents("php://input"),$post_vars);

$mod = $_POST['models'];

$request = json_decode($mod);
 
foreach ($request as $product) {
 
$sql = "UPDATE fct_awrs_order_month
        SET revenue='{$product->revenue}',
        wheels_count='{$product->wheels_count}',
        hours='{$product->hours}',
        invoice_count='{$product->invoice_count}'
        WHERE month_id='{$product->month_id}'
        and franchise_id='1';";
 

$retval = mysql_query( $sql, $con );
 
if(!$retval )
{
  echo "OUCH!";
  //die('Could not update data: ' . mysql_error());
}
else
{
        $result3 = "Your Data is Updated Successfully";
echo $result3;
 
}
}
mysql_close($con);
     
}
      

?>
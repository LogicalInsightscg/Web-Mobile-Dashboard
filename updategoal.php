<?php


$con = @mysql_connect('localhost','root','demo');

if(!$con)
{

	die('');
}


 // add the header line to specify that the content type is JSON
   

   parse_str(file_get_contents("php://input"),$post_vars);

$mod = $_GET['models'];

$request = json_decode($mod);
 
foreach ($request as $product) {
 
$sql = "UPDATE fct_awrs_order_month
        SET revenue='{$product->revenue}',
        wheels_count='{$product->wheels_count}',
        hours='{$product->hours}',
        invoice_count='{$product->invoice_count}'
        WHERE month_id='{$product->month_id}'
        and franchise_id='1';";
 
mysql_select_db('awrs');
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

/*
// handle a POST  
    if ($verb == "POST") {

 // DISCLAIMER: It is better to use PHP prepared statements to communicate with the database. 
        //             this provides better protection against SQL injection.
        //             [http://php.net/manual/en/pdo.prepared-statements.php][4]
        // get the parameters from the post. escape them to protect against sql injection.

       $rev = mysql_real_escape_string($_GET["revenue"]);
 $whl = mysql_real_escape_string($_GET["wheels_count"]);
$hr = mysql_real_escape_string($_GET["hours"]);
 $ic = mysql_real_escape_string($_GET["invoice_count"]);
 $mon = mysql_real_escape_string($_GET["month_id"]);

 

        $rs = mysql_query("UPDATE fct_awrs_order_month SET revenue = '" . $rev ."',wheels_count = '" . $whl ."',hours = '" . $hr ."',invoice_count = '" . $ic ."' WHERE month_id = '" .$mon. "' and franchise_id='1' ");
if ($rs) {
        
        echo json_encode($rs);
    }
    else {
        header("HTTP/1.1 500 Internal Server Error");
        echo "Update failed for Month: ";
    }

     
}*/
      

?>
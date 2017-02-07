<?php


require 'connection.php';

function getrevenue_data($data){

  

	if($data=="6week")
	{

	
$query2= mysql_query("select substr(a12.month_desc,1,3) month_desc,a12.month_id,a11.revenue,a11.wheels_count,a11.hours,a11.invoice_count from fct_awrs_order_month a11 left  outer join dim_month a12 on a11.month_id=a12.month_id where a11.franchise_id='1' and a12.month_end_date >'2013-01-01'
 and a12.month_start_date <'2013-12-31' group by a11.month_id,a11.franchise_id");

$arr= array();

  while ($row2=mysql_fetch_object($query2)) {

        $arr[]=$row2;
      }

      $jsonstring =  json_encode($arr);
     

      return $jsonstring;

      

}

elseif ($data=="12week") {

	$query2= mysql_query("select substr(a12.month_desc,1,3) month_desc,a12.month_id,a11.revenue,a11.wheels_count,a11.hours,a11.invoice_count from fct_awrs_order_month a11 left  outer join dim_month a12 on a11.month_id=a12.month_id where a11.franchise_id='2' and a12.month_end_date >'2013-01-01'
 and a12.month_start_date <'2013-12-31' group by a11.month_id,a11.franchise_id");

$arr= array();

  while ($row2=mysql_fetch_object($query2)) {

        $arr[]=$row2;
      }

      $jsonstring =  json_encode($arr);
     

      return $jsonstring;
}

elseif ($data=="6month") {

	echo "6month";
}

elseif ($data=="12month") {



	echo "12month";
}

/*elseif ($data=="12weeks") {

	$query2= mysql_query("select a12.qtr_desc,a12.qtr_id,a11.revenue,a11.wheels_count,a11.hours,a11.invoice_count from fct_awrs_order_month a11 left  outer join dim_month a12 on a11.month_id=a12.month_id where a11.franchise_id='".$_SESSION['franchise_id']."' and a12.month_end_date >'". $_SESSION['datefrom']."'
 and a12.month_start_date <'". $_SESSION['dateto']."' group by a11.month_id,a11.franchise_id");

$arr= array();

  while ($row2=mysql_fetch_object($query2)) {

        $arr[]=$row2;
      }
}

elseif ($data=="6weeks") {

	$query2= mysql_query("select a12.qtr_desc,a12.qtr_id,a11.revenue,a11.wheels_count,a11.hours,a11.invoice_count from fct_awrs_order_month a11 left  outer join dim_month a12 on a11.month_id=a12.month_id where a11.franchise_id='".$_SESSION['franchise_id']."' and a12.month_end_date >'". $_SESSION['datefrom']."'
 and a12.month_start_date <'". $_SESSION['dateto']."' group by a11.month_id,a11.franchise_id");

$arr= array();

  while ($row2=mysql_fetch_object($query2)) {

        $arr[]=$row2;
      }
}
*/


}


?>

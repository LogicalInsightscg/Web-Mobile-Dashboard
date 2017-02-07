<?php
$con = @mysql_connect('localhost','root','demo');

if(!$con)
{

	die('');
}
else
{

if(@mysql_select_db('awrs'))
{


}
else
die('');

}



?>
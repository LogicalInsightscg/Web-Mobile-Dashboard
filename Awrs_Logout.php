<?php
session_start();
unset($_SESSION['user'],$_SESSION['franchise_id'],$_SESSION['franchise_unit_id'],$_SESSION['error']);
session_destroy();
header("location: Awrs_Index.html");
?>
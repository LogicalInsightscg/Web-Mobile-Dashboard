
<?php
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']==False)
{
  header("Location: http://localhost/AWRS/AWRS_Actual_Website/Awrs_Index.html");
}
?>

<?php 
require 'connection.php';
$query= mysql_query("select franchise_name from dim_franchises where franchise_id='".$_SESSION['franchise_id']."'");


$franchise_unit_id=$_SESSION['franchise_unit_id'];

$numrow=mysql_num_rows($query);
if($numrow!=0)
{

	while ($row=mysql_fetch_assoc($query)) {

				$franchise_name=$row['franchise_name'];
			}
}



?>

 <?php

            if(isset($_POST["franchise_unit"]) && isset($_POST["startdate"]) && isset($_POST["enddate"]) && isset($_POST["Productivity"]) && $_POST["startdate"]!="" && $_POST["enddate"]!="")
            {



            	$_SESSION["franchise_unit_id"]=$_POST["franchise_unit"];
            	$_SESSION["datefrom"]= $_POST["startdate"];
            	$_SESSION["dateto"]= $_POST["enddate"];

            	header("Location: http://localhost/AWRS/AWRS_Actual_Website/Awrs_Productivity.php");
            }



            ?>

<!DOCTYPE html> 
<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="description" content="A full service alloy wheel repair, wheel refinishing, wheel straightening, wheel remanufacturing and OEM wheel replacement company. Certified Technicians." />
        <meta name="keywords" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<link rel="shortcut icon" href="images/awrsalt.png" type="image/x-icon">
		
		
		<meta name="google-site-verification" content="JZUxWjkbG66H73vPxHSAmr2CUGoFLjmZQEXPT__BjvE" /><meta name="google-site-verification" content="JZUxWjkbG66H73vPxHSAmr2CUGoFLjmZQEXPT__BjvE" />
		
		
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
		<link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/fonts.css" />
        <link rel="stylesheet" type="text/css" href="css/awrshome.css" />
        <link rel="stylesheet" type="text/css" href="css/media-queries.css" />
        <link rel="icon" type="/templates/awr/staticresources/assets/image/vnd.microsoft.icon" href="images/favicon.ico" />
        <!--[if lt IE 8]>
          <link href="/templates/awr/staticresources/assets/css/ie7.css" rel="stylesheet" type="text/css" />
        <![endif]-->

        <!-- jQuery library (served from Google) -->
        <script src="js/jquery.min.js"></script>
        <!-- bxSlider Javascript file -->
        <script src="js/jquery.bxslider.min.js"></script>
        <!-- bxSlider CSS file -->
        <link href="css/jquery.bxslider.css" rel="stylesheet" />
		
		<script type="text/javascript" src="js/jquery.aw-showcase.min.js"></script>

		<link rel="stylesheet" href="Kendostyles/kendo.common.min.css" />
    
    <link rel="stylesheet" href="Kendostyles/kendo.flat.min.css" />
    <link rel="stylesheet" href="Kendostyles/kendo.flat.mobile.min.css" />
    


    <script src="Kendojs/jquery.min.js"></script>
    <script src="Kendojs/kendo.all.min.js"></script>
    <script src="Settings.js"></script>

    <!-- for mobile slid menu navigation-->

    <script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}
function openSettingNav() {
    document.getElementById("Setting_Sidenav").style.width = "100%";
    document.getElementById("setting").style.background = "black";
    document.getElementById("home").style.background = "#ddd";

}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

function closeSettingNav() {
    document.getElementById("Setting_Sidenav").style.width = "0";
    document.getElementById("setting").style.background = "#ddd";
    document.getElementById("home").style.background = "black";
}


</script>

<style type="text/css">
  
#popup{
  background-color: rgba(150, 150, 150, 0.5); overflow: hidden; position: fixed; left: 0px; top: 0px; bottom: 0px; right: 0px; z-index: 1000; display:none;
}

</style>
     
 <!-- end of script for mobile slid menu navigation-->
		

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','js/analytics.js','ga');

  ga('create', 'UA-20050354-1', 'auto');
  ga('send', 'pageview');


</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','js/analytics.js','ga');

  ga('create', 'UA-20050354-1', 'auto');
  ga('send', 'pageview');


</script>



  <script>



        

  function createChart() {
            $("#commission_top_chart").kendoChart({
              
              plotArea: {
   background: "green",
    opacity: 0.1,
               
  },
                title: {
                    text: ""
                },
                legend: {
                    visible: false
                },
                seriesDefaults: {
                    type: "bar",
                  background: "#ff0000",
                  labels: {
                        visible: true,
                        background: "transparent",
                   
                    
                    },
                 
                  gap: 0 ,
                },
                series: [ {
                    name: "Unique visitors",
                    data: [5400]
                }],
                valueAxis: {
                  visible: false,
                 
                    max: 6600,
                    line: {
                        visible: false
                    },
                    minorGridLines: {
                        visible: false
                    },
                  majorGridLines: {
                        visible: false
                    },
                    labels: {
                        rotation: "auto"
                    }
                },
                categoryAxis: {
                  
                    categories: ["Goal"],
                   line: {
                        visible: false
                    },
                    majorGridLines: {
                        visible: false
                    }
                },
                tooltip: {
                    visible: true,
                    template: "#= series.name #: #= value #"
                }
            });
        }

        function createChart2() {
            $("#revenue_chart").kendoChart({
                title: {
                    text: ""
                },
                legend: {
                  visible: false,
                    position: "bottom"
                },
                chartArea: {
                    background: "",
                    

                },
                seriesDefaults: {
                    type: "line",
                    style: "smooth"
                },
                series: [{
                    name: "Robbie",
                    data: [3907, 7943, 7848, 9284, 9263, 9801, 3890, 8238, 9552, 6855,2349,7843]
                }],
                valueAxis: {
                   
                    line: {
                        visible: true
                    },
                    minorGridLines: {
                        visible: false
                    },
                    majorGridLines: {
                        visible: false
                    },
                    axisCrossingValue: 0
                },
                categoryAxis: {
                    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                    majorGridLines: {
                        visible: false
                    },
                    labels: {
                        rotation: 270
                    }
                },
                tooltip: {
                    visible: true,
                    
                    template: "#= series.name #: #= value #"
                }
            });
        }


      

   $(window).resize(function () {
       
        if($(window).width() < 485)
        {
        $("#revenue_chart").height(160);
       
    }
    else{
 $("#revenue_chart").height(260);
    }
        
    
    });

    // Document ready function
    $(document).ready(function () {

        // Initialize the chart with a delay to make sure
        // the initial animation is visible


        // Initially
         if($(window).width() < 485)
        {
        $("#revenue_chart").height(160);
        
    }
    else{
 $("#revenue_chart").height(260);
    }

    $(".set_goal").click(function(){

      $("#popup").css("display", "block");

    });

    $("#close").click(function(){

      $("#popup").css("display", "none");

    });
        

    });
  

        $(document).ready(createChart2);
        $(document).bind("kendo:skinChange", createChart2);

        $(document).ready(createChart);
        $(document).bind("kendo:skinChange", createChart);



        function resizechart()
{

  kendo.resize(".chart-wrapper");
}

$(window).on("resize",resizechart);

 

            </script>



		
    </head>
    <body onload="init()">

    <header>

          <div class="pagewidth">

          <div id="mySidenav" class="sidenav" >
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <p style="    color: #fff;
    display: inline-block;
    font-family: Bebas-Regular;
    font-size: 25px;
    font-weight: normal;
   
    position: relative;
    transition: all ease 0.2s;padding: 8px 8px 8px 32px;"> Hi <?php echo($_SESSION['user']);?></p>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Customers</a>
  <a href="#">Contact</a>

<a href="Awrs_Logout.php" >Logout </a>
</div>

<!-- for setting view on mobile-->

<div id="Setting_Sidenav" class="sidenav" style="background: white; padding-top: 0px;">
<div id="topheader" style="background-color: black;border-bottom: 5px solid #e51818;margin-bottom: 12px;">
              
              <p style="color: white;padding-left: 125px;margin-bottom: 10px;margin-top: 4px;"> Settings</p>
              <a href="javascript:void(0)" class="closebtn" onclick="closeSettingNav()">&#10554;</a>
              </div>

  
 
 <div class="accordionItem">
      <h2>My Profile</h2>
      <div>
        <p>My Profile in a Web page.</p>
        <p>This is a simple Design.</p>
      </div>
    </div>

    <div class="accordionItem">
      <h2>Set Goals</h2>
      <div>
        <p class="set_goal">Set Your Goal.</p>
        <p>You can Set any</p>
        <ul>
          <li>Set Goal 1</li>
          <li>Set Goal 2</li>
          <li>Set Goal 3</li>
        </ul>
      </div>
    </div>

    <div class="accordionItem">
      <h2>Reminders</h2>
      <div>
        <p>Click to set reminders.</p>
      </div>
    </div>

    <div class="accordionItem">
      <h2>Helps</h2>
      <div>
        <p>Click to Take Helps</p>
      </div>
    </div>
    <div class="accordionItem">
      <h2>Syn</h2>
      <div>
        <p>Click To Syn</p>
      </div>
    </div>
 
</div>
		  
              <h1><a class="logo" href="#"></a></h1>
              <div id="topheader">
              <span style="font-size:30px;cursor:pointer;color: white;" onclick="openNav()">&#9776;</span>
              <p style="color: white;float: right;padding-right: 110px;margin-bottom: 0px;margin-top: 4px;"> myAWRS</p>
              </div>
			  
			<div class="pull-right" style="max-width: 820px; ">
			
			
			<nav id="menu">
                <ul>
                <li><a href="#" >Home<span></span></a>
              
            </li>
            <li><a href="Commission.php" >Commission<span></span></a>
              
            </li>
            <li><a href="Revenue.php" >Revenue<span></span></a>
              
            </li>
            <li><a href="#" >Cost<span></span></a>
              
            </li>
            <li><a href="#" >Settings<span></span></a>

             <ul class="sub-menu">
                
                  <li><a href="#" >My Profile<span></span></a></li>
                
                  <li><a href="#" class="set_goal">Set Goals<span></span></a></li>
                
                  <li><a href="#" >Reminders<span></span></a></li>
                
                  <li><a href="#" >Help<span></span></a></li>
                
                  <li><a href="#" >Work Calendar<span></span></a></li>

                  <li><a href="#" >Syn<span></span></a></li>
                
                </ul>
              
            </li>
				
					 <li>
&nbsp;&nbsp;&nbsp;
           <p style="    color: #29bb06;
    display: inline-block;
    font-family: Bebas-Regular;
    font-size: 25px;
    font-weight: normal;
   
    position: relative;
    transition: all ease 0.2s;"> Hi <?php echo($_SESSION['user']);?></p>
<a href="Awrs_Logout.php" >Logout </a>
</li>
        
					
				
                </ul>
				
              </nav>
			  
			  
			

			  
			  
			  </div>
			  
          </div>
		  
    </header><!--stop header-->

       <div id="wrapper">
	    <h2 style="color: #000;
    font-family: Bebas-Regular;
    font-size: 50px;
    font-weight: normal;
    margin: 0 auto;
    max-width: 1020px;
    padding: 3% 5% 0 5%;
    position: relative;
    width: 90%;">AWRS Analytics&nbsp; &nbsp;<!--<img src="images/114531.png" border="0" alt="" width="283" height="99" />--></h2>

			<section id="page-content">

<div class="whitebox">
<div class="pagewidth">
<div class="box100">
<!--<h2 class="page-title">Safe <strong>REPAIRS</strong>&nbsp; &nbsp;<img src="images/114531.png" border="0" alt="" width="283" height="99" /></h2>
<p style="text-align: justify;">&nbsp;</p>-->

<div id="popup">
    <div style="background-color: rgb(255, 255, 255); width: 60%; position: static; margin: 20px auto; padding: 20px 30px 0px; top: 110px; overflow: hidden; z-index: 1001; box-shadow: 0px 3px 8px rgba(34, 25, 25, 0.4);height: 80%">
    <button id="close" style="float: right;">Close</button>
        <iframe src="setgoals.html" width="100%" height="90%"></iframe>
        
    </div>
    
</div>

 <div id="top">
  <div class="first">
  <div style="padding-left: 8%; padding-top: 4%;"> 
<u>Commission (Monthly Goal)</u>

<div class="chart-wrapper" id="commission_top_chart"></div>
</div>

  </div>
<div class="divider"></div>
  <div class="second">
<div style="padding-left: 8%;"> 
<u>Wheels Remaining  (Monthly Goal) </u>

<br>
<br>
<br>
<?php

$first_number = 200;
$second_number = 151;
$sub_total = $first_number - $second_number;


echo "<strong>".$first_number."</strong>" .str_repeat('&nbsp;', 2)." - ".str_repeat('&nbsp;', 2). "<strong>".$second_number."</strong>".str_repeat('&nbsp;', 2)."=".str_repeat('&nbsp;', 2). "<strong>".$sub_total."</strong>";

?>

</div>

  </div>
</div>



<div id="bottom">
<div class="chart-wrapper" id="revenue_chart" style="padding-left: 8%;"> 



</div>
</div>
            

</div>

</div>
</div>


</section>

			
		
		

        </div>
		
		<div style="clear:both;"></div>

        <footer>
          <div class="pagewidth">
			
				<div style="float: left;">
<h5><span style="color: #ff0000;"><a href="#"><span style="color: #ff0000;">EMAIL LOGIN</span></a>&nbsp;&nbsp;&bull; &nbsp;<a href="#"><span style="color: #ff0000;">ORDER SUPPLIES</span></a>&nbsp; &bull; &nbsp;<a href="#"><span style="color: #ff0000;">TECH CENTER</span></a>&nbsp;&nbsp;&bull; &nbsp;&nbsp;<a href="#"><span style="color: #ff0000;">LOGOED MERCHANDISE&nbsp;&amp; EMPLOYEE APPAREL</span></a></span></h5>
</div>
<p>
<script></script>
<script>// <![CDATA[
new a2z.Widget('iv5F%2b%2fbCFrUn%2fx%2bYwglsE8gq%2bwagv0PWWfBeQ%2bK%2b%2bZKdud5vL4oJJ87MuxuJcUbw',2599,'http://libs.a2zinc.net/Common/Widgets/ExhibitorBadge.aspx',22,126135,330,200).render();
// ]]></script>
</p>
			
			
            <ul class="social" style="float:right;">
			
              <li><a class="facebook" href="#"></a></li>
			
              <li><a class="twitter" href="#"></a></li>
			
			  <li><a class="linkedin" href="#"></a></li>
			
			  <li><a class="youtube" href="#"></a></li>
			
			  <li><a class="rss" href="#"></a></li>
			
            </ul>
			

          </div>
		  
		  <div style="clear:both;"><div>

          <script>
          $(document).ready(function(){
            $('.bxslider').bxSlider();
          });
          </script>

        </footer><!--stop footer-->

        <!--for Mobile App Down Menu Bar -->

        <nav class="fixed-nav">
      
    <ul> 
        <li><a href="Awrs_profile.php" style="background-color: black" id="home">
  <img src="images/home.png" alt="Home" width="30" height="30">
  
</a></li>
        <li><a href="Commission.php"><img src="images/commission.png" alt="Home" width="30" height="30"></a></li>
        <li><a href="Revenue.php"><img src="images/revenue.png" alt="Home" width="30" height="30"></a></li>
        <li><a href="#"><img src="images/cost.png" alt="Home" width="30" height="30"></a></li>
        <li><a href="#" onclick="openSettingNav()" id="setting"><img src="images/settings.png" alt="Home" width="30" height="30"></a></li>
    </ul>
 
    </nav>

    </body>
</html>

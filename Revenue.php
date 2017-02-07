
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

require "modular_data_fetch.php";
            if(isset($_POST["6week"]))
            {

             $sixweek = getrevenue_data("6week");
              
            	
            	
            }

            elseif(isset($_POST["12week"]))
            {



               $sixweek = getrevenue_data("12week");
            }

            elseif(isset($_POST["6month"]))
            {



               getrevenue_data("6month");
            }

            elseif(isset($_POST["12month"]))
            {



               getrevenue_data("12month");
              
            }

            elseif(isset($_POST["4quarter"]))
            {



               getrevenue_data("4quarter");
              
            }
            elseif(isset($_POST["8quarter"]))
            {



               getrevenue_data("8quarter");
              
            }

            else
              $sixweek = getrevenue_data("6week");




            ?>

<!DOCTYPE html> 
<html>
    <head>
        <title>Revenue</title>
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
    document.getElementById("revenue").style.background = "#ddd";

}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

function closeSettingNav() {
    document.getElementById("Setting_Sidenav").style.width = "0";
    document.getElementById("setting").style.background = "#ddd";
    document.getElementById("revenue").style.background = "black";
}


</script>


     
 <!-- end of script for mobile slid menu navigation-->
     
<script type="text/javascript">

$(document).ready(function(){


    $(".metric_container").hide();
  $(".metric_selector").show();
  
  $('.metric_selector').click(function(){
  $(".metric_container").slideToggle(1000);
  $(".time_container").hide(1000);


  });

  $(".time_container").hide();
  $(".time_selector").show();
  
  $('.time_selector').click(function(){
  $(".time_container").slideToggle(1000);
  $(".metric_container").hide(1000);


  });

  



});

document.addEventListener('DOMContentLoaded',function(){

  
        document.getElementById("revenue").click();
        
        document.getElementById("revenue").focus();
});

</script>
		<style type="text/css">
    
  
    </style>

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
            $("#customer_bar_chart").kendoChart({
              theme: "Flat",
              
                   title: {
                    text: ""
                },
                legend: {
                    visible: false
                },
                seriesDefaults: {
                    type: "bar",
                    height: 100,
                  background: "#ff0000",
                  labels: {
                        visible: true,
                        background: "transparent",
                   
                    
                    },
                 
                  
                },
                series: [ {
                    name: "Revenue",
                    data: [5490,4999,3690,3300,2800,2100]
                },
                {
                    name: "Wheels",
                    data: [24,19,17,14,10,6]
                },
                {
                    name: "Avg/Wheels",
                    data: [490,399,360,300,250,200]
                },
                {
                    name: "Commission",
                    data: [2490,1999,1690,1100,800,600]
                }],
                valueAxis: {
                  visible: false,
                 
                    
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
                  
                    categories: ["Thompson BMW","Keenan Mercedes","Sloane Audi","Fred Beans Ford","Audi of Willow Grove","Dolylestown volvo"],
                   line: {
                        visible: true
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

$("#revenue").on("click", function() {
            
   $(".metric_container").hide(1000);
  
   $(".metric_selector").text("Revenue");

   var chart = $("#customer_bar_chart").data("kendoChart");
    chart.options.series[0].visible = true;
    chart.options.series[1].visible = false;
    chart.options.series[2].visible = false;
            chart.options.series[3].visible = false;
            
            chart.refresh();

    
});

$("#wheels_repired").on("click", function() {
            
   $(".metric_container").hide(1000);
  
   $(".metric_selector").text("Wheels");

   var chart = $("#customer_bar_chart").data("kendoChart");
    chart.options.series[0].visible = false;
    chart.options.series[1].visible = true;
    chart.options.series[2].visible = false;
            chart.options.series[3].visible = false;
            
            chart.refresh();

    
});





$("#commission").on("click", function() {
            
   $(".metric_container").hide(1000);
  
   $(".metric_selector").text("Commission");

   var chart = $("#customer_bar_chart").data("kendoChart");
    chart.options.series[0].visible = false;
    chart.options.series[1].visible = false;
    chart.options.series[2].visible = false;
            chart.options.series[3].visible = true;
            
            chart.refresh();

    
});

        }

        var MonthDataSource = <?php 
        echo $sixweek;



         ?>;

        function createChart2() {
            $("#revenue_chart").kendoChart({

              dataSource: {
                    data: MonthDataSource,

                    schema: {
    
  model: {
    
    fields: {
      
      revenue: {type: "number"},
      wheels_count: { tyep: "number"},
      hours: {type: "number"},
      invoice_count: {type:"number"},
       month_desc: {type: "string"}
      
      
    }
  }
  }
                },
              theme: "Flat",
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
                    name: "Revnue",
                    field: "revenue",
                    color: "#93B6C1"
                  
                }, {
                    name: "Wheels",
                    field: "wheels_count",
                    color: "#187AAB"
                },
                {
                  name: "Hours",
                  field: "hours",
                  color: "#A3A3A3"
                },
                {
                  name: "Invoice Count",
                  field: "invoice_count",
                  color: "#334672"
                }
                ],
                valueAxis: {
                   title: {
            text: "Dollar",
            font: "12px sans-serif",
        },
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
                   field: "month_desc",
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

            

$("#revenue").on("click", function() {
            
   $(".metric_container").hide(1000);
  
   $(".metric_selector").text("Revenue");

   var chart = $("#revenue_chart").data("kendoChart");
    chart.options.series[0].visible = true;
    chart.options.series[1].visible = false;
    chart.options.series[2].visible = false;
            chart.options.series[3].visible = false;
            chart.options.valueAxis.title.text = "Revenue";
            
            
            chart.refresh();

    
});

$("#wheels_repired").on("click", function() {
            
   $(".metric_container").hide(1000);
  
   $(".metric_selector").text("Wheels");

   var chart = $("#revenue_chart").data("kendoChart");
    chart.options.series[0].visible = false;
    chart.options.series[1].visible = true;
    chart.options.series[2].visible = false;
            chart.options.series[3].visible = false;
            chart.options.valueAxis.title.text = "Wheels";
           
            chart.refresh();

    
});





$("#commission").on("click", function() {
            
   $(".metric_container").hide(1000);
  
   $(".metric_selector").text("Commission");

   var chart = $("#revenue_chart").data("kendoChart");
    chart.options.series[0].visible = false;
    chart.options.series[1].visible = false;
    chart.options.series[2].visible = false;
            chart.options.series[3].visible = true;

chart.options.valueAxis.title.text = "Commission";
            
            chart.refresh();

    
});


        }


      

   $(window).resize(function () {
       
        if($(window).width() < 485)
        {
        $("#revenue_chart").height(160);
        $(".metric_container").height(100);
        $(".metric_container").width(80);
        

       
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
        $(".metric_container").height(100);
        $(".metric_container").width(80);
        
        
    }
    else{
 $("#revenue_chart").height(260);
    }
        

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

   $(document).ready(function() {
                    $("#tabstrip").kendoTabStrip({
                        animation:  {
                            open: {
                                effects: "fadeIn",
                                duration: 1000
                            }
                        }
                    });


                    $("#avg_wheel").on("click", function() {
            
   $(".metric_container").hide(1000);
  
   $(".metric_selector").text("Avg / wheel");
   var chart = $("#revenue_chart").data("kendoChart");
    chart.options.series[0].visible = false;
    chart.options.series[1].visible = false;
    chart.options.series[2].visible = true;
            chart.options.series[3].visible = false;
            chart.options.valueAxis.title.text = "avg_wheel";
            
            chart.refresh();

    
});

                    $("#avg_wheel").on("click", function() {
            
   $(".metric_container").hide(1000);
  
   $(".metric_selector").text("Avg / wheel");
   var chart = $("#customer_bar_chart").data("kendoChart");
    chart.options.series[0].visible = false;
    chart.options.series[1].visible = false;
    chart.options.series[2].visible = true;
            chart.options.series[3].visible = false;
            
            chart.refresh();

    
});


                });

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
        <p>Set Your Goal.</p>
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
              <p style="color: white;float: right;padding-right: 110px;margin-bottom: 0px;margin-top: 4px;"> Revenue</p>
              </div>
			  
			<div class="pull-right" style="max-width: 820px; ">
			
			
			<nav id="menu">
                <ul>
                <li><a href="Awrs_profile.php" >Home<span></span></a>
              
            </li>
            <li><a href="Commission.php" >Commission<span></span></a>
              
            </li>
            <li><a href="#" >Revenue<span></span></a>
              
            </li>
            <li><a href="#" >Cost<span></span></a>
              
            </li>
            <li><a href="#" >Settings<span></span></a>
              
            </li>
				
					 <li>
&nbsp;&nbsp;
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
  
<div id="tabstrip" style="background:white;border:none;">
        
        <ul >
          <li class="k-state-active" style="border-color: white;">Analyze My Revenue Drivers</li>
          <li style="border-color: white;">Review Benchmarks</li>
          
          <div class="metric_time_iw">
          <div class="metric_iw" >
<a href="#" class="metric_selector" id="metric_selector">Revenue</a><br />
 
    <div class="metric_container" >

        <button id="revenue" class="k-button" style="border-color: #ccc;"> Revenue</button>
          <button id="wheels_repired" class="k-button" style="border-color: #ccc;">Wheels</button>
          <button id="avg_wheel" class="k-button" style="border-color: #ccc;"> Avg / wheel</button>
          <button id="commission" class="k-button" style="border-color: #ccc;">Commission</button>
    </div>
          </div>

          <div class="time_iw">
<a href="#" class="time_selector" id="time_selector">
  
<?php

if(isset($_POST["6week"]))
            {

             echo ("6week");
              
              
              
            }

            elseif(isset($_POST["12week"]))
            {



              echo ("12week");
            }

            elseif(isset($_POST["6month"]))
            {



               echo ("6month");
            }

            elseif(isset($_POST["12month"]))
            {



               echo ("12month");
              
            }

            elseif(isset($_POST["4quarter"]))
            {



               echo ("4quarter");
              
            }
            elseif(isset($_POST["8quarter"]))
            {



               echo ("8quarter");
              
            }

            else
              echo ("6week");

?>

</a><br />
<div class="time_container" >
<form method="POST" action="">

          <button id="6week" name="6week" class="k-button" style="border-color: #ccc;"> 6 Week</button>
          <button id="12week" name="12week" class="k-button" style="border-color: #ccc;">12 Week</button>
          <button id="6month" name="6month" class="k-button" style="border-color: #ccc;"> 6 Month</button>
          <button id="12month" name="12month" class="k-button" style="border-color: #ccc;">12 Month</button>
          <button id="4quarter" name="4quarter" class="k-button" style="border-color: #ccc;">4 Quarter</button>
          <button id="8quarter" name="8quarter" class="k-button" style="border-color: #ccc;">8 Quarter</button>

          </form>
    </div>
          </div>

           <div class="customer_iw">
<a href="#" class="customer_selector" id="customer_selector">filter</a><br />

<div class="customer_container" >

        
    </div>
          </div>

        </div>
        </ul>
       

       

       
        
    <div style=" border-style: none;float: right;width: 100%;padding-right: 0px;margin-right: 0px;">
        <div id="r_top">
  
  <div style=" padding-top: 2%;"> 

<div class="chart-wrapper" id="revenue_chart" style="padding-left: 4%;"> </div>

</div>

  

</div>



<div id="c_bottom">
<br>
<u><center>Top Customers</center></u>

<br>


<div class="chart-wrapper" id="customer_bar_chart"></div> 


</div>

    </div>            
        <div style=" border-style: none;float: right;width: 100%;padding-right: 0px;margin-right: 0px;">
        <div id="chart2" class="chart-wrapper"></div>
    </div> 
        <div style=" border-style: none;float: right;width: 100%;padding-right: 0px;margin-right: 0px;"> Yearly Content</div>
</div>



<!--
 <div id="top">
  <div class="first">
  <div style="padding-left: 8%; padding-top: 4%;"> 
Commission (Monthly Goal)

<div class="chart-wrapper" id="commission_top_chart"></div>
</div>

  </div>
<div class="divider"></div>
  <div class="second">
<div style="padding-left: 8%;"> 
Wheels Remaining  (Monthly Goal) 

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
       -->     

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
        <li><a href="Awrs_profile.php" class="active">
  <img src="images/home.png" alt="Home" width="30" height="30">
  
</a></li>
        <li><a href="Commission.php"><img src="images/commission.png" alt="Home" width="30" height="30"></a></li>
        <li><a href="#" style="background-color: black" id="revenue"><img src="images/revenue.png" alt="Home" width="30" height="30"></a></li>
        <li><a href="#"><img src="images/cost.png" alt="Home" width="30" height="30"></a></li>
        <li><a href="#" onclick="openSettingNav()" id="setting"><img src="images/settings.png" alt="Home" width="30" height="30"></a></li>
    </ul>
 
    </nav>

    </body>
</html>

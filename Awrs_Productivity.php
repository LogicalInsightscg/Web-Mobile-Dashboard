
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
require 'connection.php';

$query2= mysql_query("select (select AVG(a11.revenue) average from fct_awrs_order_month a11 left  outer join dim_month a12 on a11.month_id=a12.month_id where a11.franchise_id='".$_SESSION['franchise_id']."' and a12.month_end_date >'". $_SESSION['datefrom']."'
 and a12.month_start_date <'". $_SESSION['dateto']."') Average,a12.qtr_desc,a12.qtr_id,a11.revenue,a11.wheels_count,a11.hours,a11.invoice_count from fct_awrs_order_month a11 left  outer join dim_month a12 on a11.month_id=a12.month_id where a11.franchise_id='".$_SESSION['franchise_id']."' and a12.month_end_date >'". $_SESSION['datefrom']."'
 and a12.month_start_date <'". $_SESSION['dateto']."' group by a11.month_id,a11.franchise_id");

$arr= array();

  while ($row2=mysql_fetch_object($query2)) {

        $arr[]=$row2;
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
        <title>Safe Repairs</title>
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
    
    <link rel="stylesheet" href="Kendostyles/kendo.highcontrast.min.css" />
    <link rel="stylesheet" href="Kendostyles/kendo.highcontrast.mobile.min.css" />
    


    <script src="Kendojs/jquery.min.js"></script>
    <script src="Kendojs/kendo.all.min.js"></script>

    

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

    var DataSource = new kendo.data.DataSource({
    transport: {
        read: {
            url: "http://localhost/AWRS/AWRS_POC/franchise_units_name.php",
            dataType: "json"
        }
    },
  
});

                $(document).ready(function() {

                   $("#datepicker1").kendoDatePicker({

                    format: "yyyy-MM-dd",
                   });
                    $("#datepicker2").kendoDatePicker({

                      format: "yyyy-MM-dd",

                    });
                    $("#products").kendoDropDownList({
                        dataTextField: "franchise_unit_name",
                        dataValueField: "franchise_unit_id",
                         optionLabel: "Select Franchise",
                         dataSource: DataSource
                        
                    });

                    var viewModel = kendo.observable({
  selectedFranchiseId: <?php echo($franchise_unit_id);?>,
  
});

kendo.bind($("#products"), viewModel);

                });


function resizechart()
{

  kendo.resize(".chart-wrapper");
}

$(window).on("resize",resizechart);

var QuarterDataSource = <?php echo json_encode($arr); ?>;
    var sharedDataSource = new kendo.data.DataSource({
    data: QuarterDataSource,
  group:{
    field: "qtr_desc",
    aggregates:[
    {field: "revenue" , aggregate:"sum"},
    {field: "wheels_count" , aggregate:"sum"},
    {field: "hours" , aggregate:"sum"},
    {field: "invoice_count" , aggregate:"sum"},
    {field: "Average" , aggregate:"average"},

    
    ]
    
    
  },
  schema:
  {
    model:{
    fields:{
      
      revenue: { type: "number"},
      wheels_count: { type: "number"},
      hours: { type: "number"},
      invoice_count: { type: "number"},
      Average: { type: "number"},
      
      
    }
    }
  }
  
  
});
sharedDataSource.read();

var seriesA = [],
    seriesB = [],
  seriesC = [],
  seriesD = [],
  seriesE = [],
    categories = [],
    items = sharedDataSource.view(),
    length = items.length,
    item;

//create the chart series  
for (var i = 0; i < length; i++) {
    item = items[i];
    
    //    This is what I want to do..
    //seriesA[0].push(item.aggregates.len.sum);
    //seriesA[1].push(item.aggregates.wid.sum);
    //     or
    //seriesA.push([{item.aggregates.len.sum},{item.aggregates.wid.sum}]);
    
    
    seriesA.push(item.aggregates.revenue.sum);
    seriesB.push(item.aggregates.wheels_count.sum);
    seriesC.push(item.aggregates.hours.sum);
    seriesD.push(item.aggregates.invoice_count.sum);
    seriesE.push(item.aggregates.Average.average);
  categories.push(item.value);
}
  
 function createChart() {
           $("#chart").kendoChart({

              dataSource: sharedDataSource,
                title: {
                    text: "Quarterly Data"
                },
                legend: {
                    visible: true,
                    position: "bottom"
                },
                seriesDefaults: {
                    type: "column"
                },
                series: [{
                    name: "Revenue",
                   data: seriesA,
        color: "#93B6C1"},
        {
          name: "Wheels",
                    data: seriesB,
        color: "#187AAB"
        },
        {
          name: "Hours",
                    data: seriesC,
        color: "#A3A3A3"
                },
                {
          name: "Invoice Count",
                    data: seriesD,
        color: "#334672"
                },
                {
                  type: "line",
          name: "average",
                    data: seriesE,
        color: "#334672"
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
                    labels: {
                        rotation: "auto"
                    }
                },
                categoryAxis: {
                    categories: categories,
                    majorGridLines: {
                        visible: false
                    },

                    minorGridLines: {
                        visible: false
                    }
                },
                tooltip: {
                    visible: true,
                    template: "#= series.name #: #= value #"
                }

            });
          
          $("#revenue").on("click", function() {
            var chart = $("#chart").data("kendoChart");
    chart.options.series[1].visible = false;
    chart.options.series[2].visible = false;
    chart.options.series[3].visible = false;
            chart.options.series[0].visible = true;
            chart.options.series[4].visible = true;
            chart.refresh();
   
    
});
           $("#hours").on("click", function() {
            var chart = $("#chart").data("kendoChart");
    chart.options.series[1].visible = false;
    chart.options.series[0].visible = false;
    chart.options.series[3].visible = false;
            chart.options.series[2].visible = true;
            chart.options.series[4].visible = true;
            chart.refresh();
   
    
});

          $("#invoice").on("click", function() {
            var chart = $("#chart").data("kendoChart");
    chart.options.series[1].visible = false;
    chart.options.series[2].visible = false;
    chart.options.series[0].visible = false;
            chart.options.series[3].visible = true;
            chart.options.series[4].visible = true;
            chart.refresh();
   
    
});

$("#wheels").on("click", function() {
  var chart = $("#chart").data("kendoChart");
     chart.options.series[0].visible = false;
     chart.options.series[2].visible = false;
     chart.options.series[3].visible = false;
     chart.options.series[1].visible = true;
     chart.options.series[4].visible = true;
            chart.refresh();
    
});
        }

           function createChart2() {
           $("#chart2").kendoChart({

              dataSource: {
                    transport: {
                        read: {
                            url: "http://localhost/AWRS/AWRS_POC/fct_order_month_data.php",
                            dataType: "json"
                        }
                    },
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
                title: {
                    text: "Monthly View",

                },
                legend: {
                    visible: true,
                    position: "bottom"
                },
                seriesDefaults: {
                    type: "column",
                     background: "transparent"
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
                    
                    line: {
                        visible: true
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
                    field: "month_desc",
                    majorGridLines: {
                        visible: false
                    },
                    labels: {
              template: labelsTemplate
            },
                     minorGridLines: {
                        visible: false
                    }
                },
                tooltip: {
                    visible: true,
                    template: "#= series.name #: #= value #"
                }
            });


           function labelsTemplate(e) {
          var ds = $("#chart2").data("kendoChart").dataSource;
          debugger;
          var index = ds.indexOf(e.dataItem);
          var label = index % 2 !== 0 ? "&nbsp;\n" : ""; 
          label += e.value

          return label;
        }

          
          $("#revenue").on("click", function() {
            var chart = $("#chart2").data("kendoChart");
    chart.options.series[1].visible = false;
    chart.options.series[2].visible = false;
    chart.options.series[3].visible = false;
            chart.options.series[0].visible = true;
            chart.refresh();
   
    
});

          $("#hours").on("click", function() {
            var chart = $("#chart2").data("kendoChart");
    chart.options.series[1].visible = false;
    chart.options.series[0].visible = false;
    chart.options.series[3].visible = false;
            chart.options.series[2].visible = true;
            chart.refresh();
   
    
});

          $("#invoice").on("click", function() {
            var chart = $("#chart2").data("kendoChart");
    chart.options.series[1].visible = false;
    chart.options.series[2].visible = false;
    chart.options.series[0].visible = false;
            chart.options.series[3].visible = true;
            chart.refresh();
   
    
});

$("#wheels").on("click", function() {
  var chart = $("#chart2").data("kendoChart");
     chart.options.series[0].visible = false;
     chart.options.series[2].visible = false;
     chart.options.series[3].visible = false;
     chart.options.series[1].visible = true;
            chart.refresh();
    
});
        }
      
       
      
    $(document).ready(function() {
                    $("#tabstrip").kendoTabStrip({
                        animation:  {
                            open: {
                                effects: "fadeIn"
                            }
                        }
                    });
                });
      
       $(document).ready(createChart2);
        $(document).bind("kendo:skinChange", createChart2);
       $(document).ready(createChart);
        $(document).bind("kendo:skinChange", createChart);

        document.addEventListener('DOMContentLoaded',function(){
        document.getElementById("revenue").click();
        document.getElementById("revenue").focus();
});
     
    </script>

    
    </head>
    <body>

    <header>

          <div class="pagewidth">
      
              <h1><a class="logo" href="#"></a></h1>
        
      <div class="pull-right" style="max-width: 820px; ">
      
      
      <nav id="menu">
                <ul>
        
          
          
            <li>

           <p style="    color: #fff;
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

       <a href="Awrs_profile.php" >
       <p style="color: #000;
    font-family: Bebas-Regular;
    font-size: 20px;
    font-weight: normal;
    margin: 0 auto;
    max-width: 1020px;
    padding: 3% 5% 0 5%;
    position: relative;
    width: 90%;"><img src="images/backbutton.png" border="0" alt="" width="33" height="20" />Back&nbsp; &nbsp;</p>
    </a>

     <h2 style="color: #000;
    font-family: Bebas-Regular;
    font-size: 50px;
    font-weight: normal;
    margin: 0 auto;
    max-width: 1020px;
    padding: 5% 5% 0 5%;
    position: relative;
    width: 90%;">AWRS Analytics&nbsp; &nbsp;<!--<img src="images/114531.png" border="0" alt="" width="283" height="99" />--></h2>

      <section id="page-content">

<div class="whitebox">
<div class="pagewidth">
<div class="box100">

<h2 class="page-title">Productive Analysis&nbsp; &nbsp;<!--<img src="images/114531.png" border="0" alt="" width="283" height="99" />--></h2>
<p style="text-align: justify;">&nbsp;</p>

 <div id="fn">
<p>Franchise Name: <span style="padding-left: 1%;"><?php echo($franchise_name."<br />");?></span></p>
</div>
</br>
            <form method="POST" action="">
            <div id="fu">
            <div class="first">
           <p> Franchise Units:</p>
           </div>
           <div class="second">

                <input id="products" data-bind="value: selectedFranchiseId" name="franchise_unit" style="width: 100%" />
                </div>

                </div>
                </br></br>

                <div id="fr">
                <div class="time">
                  <p> Time Period:</p>
                </div>
   <div class="first">

  <input id="datepicker1" name="startdate" value=<?php echo($_SESSION["datefrom"]);?> style="width: 100%" />
                 </div>
                 <div class="dash">
                  <p> -</p>
                </div>
       <div class="second">
 <input id="datepicker2" name="enddate" value=<?php echo($_SESSION["dateto"]);?>  style="width: 100%" />
                          </div>
</div>
</br></br>
              <!-- <p> Date from:</p>
                <input id="datepicker1" name="startdate" value=<?php echo($_SESSION["datefrom"]);?> style="width: 100%" />
                </br></br>

                <p>Date To:</p>
                 <input id="datepicker2" name="enddate" value=<?php echo($_SESSION["dateto"]);?>  style="width: 100%" /> -->
                 
                 
               <input type="submit" class="k-button" value="Search" name="Productivity">
               
                </form>
                </br></br>
       <div style="width:100%">
          <button id="revenue" class="k-button" clicked="true" > Revenue</button>
          <button id="wheels" class="k-button">Wheels</button>
          <button id="hours" class="k-button" clicked="true" > Hours</button>
          <button id="invoice" class="k-button">Invoice</button>
      </div>

      <div id="tabstrip">
        <ul>
          <li class="k-state-active">Quarterly</li>
          <li>Monthly</li>
          <li>Weekly</li>
        </ul>
        
    <div class="demo-section k-content wide">
        <div id="chart" class="chart-wrapper"></div>
    </div>            
        <div class="demo-section2 k-content wide">
        <div id="chart2" class="chart-wrapper"></div>
    </div> 
        <div> Weekly Content</div>
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
    </body>
</html>

<?php

session_start();
if(isset($_SESSION['user']) && $_SESSION['user']==true)
{
	header("Location: http://localhost/AWRS/AWRS_Actual_Website/Awrs_profile.php");
}

?>
<?php

	if(isset($_POST["awrsuname"]) && isset($_POST["awrsupass"]) && isset($_POST["Login"]))
	{

		$username=$_POST["awrsuname"];
		$userpass=$_POST["awrsupass"];

		require 'connection.php';

		$query= mysql_query("select * from user_login where user_name='".$username."' and password='".$userpass."'");

		$numrow=mysql_num_rows($query);

		if($numrow!=0)
		{

			while ($row=mysql_fetch_assoc($query)) {

				$dbuser=$row['user_name'];
				$dbpass=$row['password'];
				$dbfranchise=$row['franchise_id'];
				$dbfranchiseunit=$row['franchise_unit_id'];

			}

		}

		if($dbuser== $username && $dbpass==$userpass)
		{

			
			$_SESSION['user']=$dbuser;
			$_SESSION['franchise_id']=$dbfranchise;
			$_SESSION['franchise_unit_id']=$dbfranchiseunit;

			header("Location:http://localhost/AWRS/AWRS_Actual_Website/Awrs_profile.php");




		}

		else
		{

			$_SESSION['error']=array("Your username or password was incorrect.");
		}

	}


	?>

<!DOCTYPE html> 
<html>
    <head>
        <title>Alloy Wheel Repair Specialists, LLC | Alloy Wheel Repair, Powder Coating, OEM Replacements</title>
        <meta charset="UTF-8">
        <meta name="description" content="A full service alloy wheel repair, wheel refinishing, wheel straightening, wheel remanufacturing and OEM wheel replacement company. Certified Technicians." />
        <meta name="keywords" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<link rel="shortcut icon" href="images/awrsalt.png" type="image/x-icon">
		
		
		
		
		
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
		<link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/fonts.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
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

    <!-- for mobile slid menu navigation-->

    <script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
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
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','js/analytics.js','ga');

  ga('create', 'UA-20050354-1', 'auto');
  ga('send', 'pageview');


</script>

		
    </head>
    <body>

    <header>

          <div class="pagewidth">
		  
              <div id="mySidenav" class="sidenav" >
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  
  <nav id="menu">
                <ul>
        
          <li><a href="Awrs_Index.html" >Home<span></span></a>
            <li><a href="#" >Wheel Services<span></span></a>
              
                <ul class="sub-menu">
                
                  <li><a href="#" >Wheel Refinishing<span></span></a></li>
                
                  <li><a href="#" >Wheel Straightening<span></span></a></li>
                
                  <li><a href="#" >Wheel Personalization<span></span></a></li>
                
                  <li><a href="#" >Wheel Remanufacturing<span></span></a></li>
                
                  <li><a href="#" >Wheel Replacement<span></span></a></li>
                
                </ul>
              
            </li>
          
            <li><a href="#" >Locations<span></span></a>
              
            </li>
          
            <li><a href="#" >About Us<span></span></a>
              
                <ul class="sub-menu">
                
                  <li><a href="#" >Photo Gallery<span></span></a></li>
                
                  <li><a href="#" >Customer Pay Program<span></span></a></li>
                
                  <li><a href="#" >Claims Department<span></span></a></li>
                
                  <li><a href="#" >Own A Franchise<span></span></a></li>
                
                  <li><a href="#" >Green Initiative<span></span></a></li>
                
                  <li><a href="#" >Lifetime Warranty<span></span></a></li>
                
                  <li><a href="#" >Wheel Care<span></span></a></li>
                
                  <li><a href="#" >Careers<span></span></a></li>
                
                </ul>
              
            </li>
          
            <li><a href="#" >REQUEST A QUOTE<span></span></a>
              
            </li>
          
            <li><a href="#" >Safe Repairs<span></span></a>
              
            </li>
          
            
          <li><a href="Member.php" class="active">Member Area<span></span></a>
              
            </li>
        
                </ul>
        
              </nav>


</div>
		  
              <h1><a class="logo" href="Awrs_Index.html"></a></h1>
              <div id="topheader">
              <span style="font-size:30px;cursor:pointer;color: white;" onclick="openNav()">&#9776;</span>
              <p style="color: white;float: right;padding-right: 85px;    margin-bottom: 0px;
    margin-top: 4px;"> myAWRS Login</p>
              </div>
			  
			<div class="pull-right" style="max-width: 820px;">
			
			
			<nav id="menu">
                <ul>
				
					
						<li><a href="#" >Wheel Services<span></span></a>
							
								<ul class="sub-menu">
								
									<li><a href="#" >Wheel Refinishing<span></span></a></li>
								
									<li><a href="#" >Wheel Straightening<span></span></a></li>
								
									<li><a href="#" >Wheel Personalization<span></span></a></li>
								
									<li><a href="#" >Wheel Remanufacturing<span></span></a></li>
								
									<li><a href="#" >Wheel Replacement<span></span></a></li>
								
								</ul>
							
						</li>
					
						<li><a href="#" >Locations<span></span></a>
							
						</li>
					
						<li><a href="#" >About Us<span></span></a>
							
								<ul class="sub-menu">
								
									<li><a href="#" >Photo Gallery<span></span></a></li>
								
									<li><a href="#" >Customer Pay Program<span></span></a></li>
								
									<li><a href="#" >Claims Department<span></span></a></li>
								
									<li><a href="#" >Own A Franchise<span></span></a></li>
								
									<li><a href="#" >Green Initiative<span></span></a></li>
								
									<li><a href="#" >Lifetime Warranty<span></span></a></li>
								
									<li><a href="#" >Wheel Care<span></span></a></li>
								
									<li><a href="#" >Careers<span></span></a></li>
								
								</ul>
							
						</li>
					
						<li><a href="#" >REQUEST A QUOTE<span></span></a>
							
						</li>
					
						<li><a href="#" >Safe Repairs<span></span></a>
							
						</li>
					
						<li><a href="Member.php" >Member Area<span></span></a>
							
						</li>
					
				
                </ul>
				
              </nav>
			  
			  
			

			  
			  
			  </div>
			  
          </div>
		  
    </header><!--stop header-->

       <div id="wrapper">
	   

			<script type="text/javascript" src="js/jquery.maphilight.min.js"></script>
<script type="text/javascript">

$(function() {
	$.fn.maphilight.defaults = {
		fill: true,
		fillColor: '000000',
		fillOpacity: 0.2,
		stroke: true,
		strokeColor: 'DFBE8C',
		strokeOpacity: 1,
		strokeWidth: 0.5,
		fade: true,
		alwaysOn: false,
		neverOn: false,
		groupBy: false
	};	
	
	$('.map').maphilight();
} );
</script>

<section id="page-content">

<div class="whitebox">
<div class="pagewidth">

	<div class="box100">
<!--		<h2 class="page-title">AWRS Locator</h2> -->
	
		<p>Member Login Area.</p>
		
		<!--BEGIN error_message -->
		<p style="color:red;" class="Error"></p>
		<!-- ERROR error_message -->
		
	</div>
	
	<center>
	
	<div class="box70 last">

	<form method="POST" action="">
                
               <input type="text" class="k-textbox" name="awrsuname" placeholder="Username" required><br/><br/>


				<input type="password" class="k-textbox" name="awrsupass" placeholder="Password" required ><br/><br/>
				<input type="submit" class="k-button" value="Login" name="Login">
             
                
                </form>
                      
		
		
	</div>
	
	</center>
	
	<div class="box20"></div>
	


	
</div>
</div>

</section>

			
		
		<section id="become" class="whitebox"> 
			<a id="signup"></a>
			<div class="pagewidth">
				<h5>BECOME AN <span>AWRS</span> <b>INSIDER!</b></h5>
				<form action="/requestinfo/shortform" method="post">
					
					<input type="text" name="email" placeholder="YOUR EMAIL HERE" /><br/><br/>
					<input type="submit" value="Submit Email" />
				</form>
				<p>Sign up to receive monthly promotions, specials, news and more!</p>
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

<DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<style type="text/css">
  html { height: 100% }
  body { height: 100%; margin: 0; padding: 0 }
  #map_canvas { height: 100% }
</style>
<link rel="stylesheet" href="https://c94471.ssl.cf3.rackcdn.com/cwd.css" type="text/css">
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="http://www.heatmapapi.com/Javascript/HeatmapAPIGoogle3.js"></script>
<script type="text/javascript" src="http://www.heatmapapi.com/Javascript/HeatMapAPI3.aspx?k=a4dd66ff-c6e6-45d7-b646-41dc6c869e90"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.js"></script>
<style type="text/css">
	#cwd_header
	{
		background: #005823;
	}

	#map
	{
		background: url('wait.png');
	}

</style>

<title>University of Lincoln Energy Usage HeatMap</title>


<script type="text/javascript">

//Create a heatmap
var myHeatmap = new GEOHeatmap();
var flag = false;
var rValD = 0;


$(function() {
  
    myData = new Array();
    //Get JSON object for energy data
    $.getJSON('getData.php', function(data) {
    var myData;
    for(i = 0; i< data.length; i++)
    {
      window.rValD = data[i].totalEnergy;
      window.myData.push(data[i].latitude);
      window.myData.push(data[i].longitude);
      window.myData.push(window.rValD);
    }
     genMap();
   });
});

function genMap()
{
  // configure HeatMapAPI
myHeatmap.Init(984, 500); // set at pixels for your map
myHeatmap.SetBoost(0.1);
myHeatmap.SetDecay(0.0); // see documentation
myHeatmap.SetData(window.myData);
myHeatmap.SetProxyURL('http://jamie.lncd.lincoln.ac.uk/energy/proxy.php');

// set up Google map, pass in the heatmap function
var myLatlng = new google.maps.LatLng(53.228492, -0.548029);
    var myOptions =
    {
     zoom: 16,
     center: myLatlng,
     mapTypeId: google.maps.MapTypeId.SATELLITE
    }
    
    
var map = new google.maps.Map(document.getElementById("map"), myOptions);
  google.maps.event.addListener(map, 'idle', function(event) {
   myHeatmap.AddOverlay(this, myHeatmap);
  });
}
</script>
</head>
<body onload="initialize()">
	<div class="grid_12">
	<header id="cwd_header" role="banner"> 
	
		<section class="cwd_container"> 
	
			<hgroup class="grid_12" id="cwd_hgroup"> 
						
				<a href="/"> 
					<h1>Energy Data Visualisation</h1> 
					<h2></h2> 
				</a> 
							
			</hgroup> 
 
		</section> 
			
	</header> 

        <nav class="cwd_container" role="navigation"> 
		<ul id="cwd_navigation" class="grid_12">  
			<li class="current"><a href="index.php">Campus Heat Map</a></li>
	        	<li><a href="comparison.php">Energy Usage Comparison</a></li>
			<li><a href="courts.php">Student Courts Leaderboard</a></li>
			<li><a href="documentation.php">Documentation</a></li> 
    	</ul>  
	</nav>

	<section class="cwd_container" id="cwd_content" role="main">
          <p style ="margin: 20px">The map below shows the relative energy usage of various buildings on campus (excluding student courts). Figures are based on the previous
          24 hours energy usage per square metre. Zooming in to a particular area of the map will adjust the amount of 'heat' shown on that particular part of the map, taking
	only the buildings being shown into account.</p>
          <div id="map" class="grid_12" style="height:500px" ></div>
        </section>
</div>
</body>
</html>


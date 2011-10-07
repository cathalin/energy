<DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="https://c94471.ssl.cf3.rackcdn.com/cwd.css" type="text/css">
<style type="text/css">
	#cwd_header
	{
		background: #005823;
	}
</style>
</head>
<body onload="initialize()">
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
			<li><a href="index.php">Campus Heat Map</a></li> 
	        	<li><a href="comparison.php">Energy Usage Comparison</a></li>
			<li><a href="courts.php">Student Courts Leaderboard</a></li>
			<li class="current"><a href="documentation.php">Documentation</a></li> 
    	        </ul>  
	</nav>
        <section class="cwd_container" id="cwd_content" role="main">
	<div class="grid_12">
        <h2>Campus Heat Map</h2> 
	<p>This energy usage heat map was made by combining <a href="http://maps.google.co.uk/">Google Maps</a>, the <a href="http://www.heatmapapi.com/">Heat Map API</a> and APIs from <a href="http://data.lincoln.ac.uk/">data.lincoln.ac.uk</a></p>
	<p>The Heat Map API creates an overlay which graphically representes the relative values of a data set based on a longitude and latitidue pair, along with a numerical value. For use on any particular domain, the Heat Map API requires a unique key to be registered. The key is free to request, but if used on a different domain then an annoying message is overlayed across the map. You can register for a unique key here: <a href="http://www.heatmapapi.com/Register.aspx">http://www.heatmapapi.com/Register.aspx</a>.</p> 	
	<h2>Energy Usage Comparison Map</h2>
	<p>This map was created using the Google Maps API, overlaying <a href="http://code.google.com/apis/maps/documentation/javascript/overlays.html#Polygons">'polygons'</a> on top of the the Google Maps layer.</p>
	<p>The outline of each building was generated as a set of points, the longitude and latitude of each point taken from the <a href="data.lincoln.ac.uk">data.lincoln.ac.uk</a> API.</p>
	<p>Two sets of energy data was then taken from the API, a comparison made and the correct colour assigned to each building. This data was then fed back into the Google Map, and each building
	shown on the map layer.</p>
	<p>More info soon!</p>
</div>        
</section>
</body>
</html>


<script type="text/javascript">
    var one,two,three,four,five,six,seven,eight,nine,ten = "";
    var eleven, twelve, thirteen, fourteen, fifteen, sixteen, seventeen = "";	    

    window.onload = function()
    {
        woo();
    }
    
    function woo()
    {
        $.getJSON('getCourtsData.php', function(data) {
            window.one = data[0];
            window.two = data[1];
            window.three = data[2];
            window.four = data[3];
            window.five = data[4];
            window.six = data[5];
            window.seven = data[6];
            window.eight = data[7];
            window.nine = data[8];
            	window.ten = data[9 ];
		window.eleven = data[10];
		window.twelve = data[11];
		window.thirteen = data[12];
		window.fourteen = data[13];
		window.fifteen = data[14];
		window.sixteen = data[15];
		window.seventeen = data[16];            

testing();
            setTimeout('woo()',1860000);
     });
    }
</script>
<html>
<head>

    <title>Student Courts Energy Usage Leaderboard</title>
    <link href='http://fonts.googleapis.com/css?family=Wallpoet' rel='stylesheet' type='text/css'>
    <link href="https://c94471.ssl.cf3.rackcdn.com/cwd.css" rel="stylesheet" type="text/css">
    <script type="text/javascript">
    function testing()
    {
        $('#one').airport([window.one]);
        $('#two').airport([window.two]);
         $('#three').airport([window.three]);
        $('#four').airport([window.four]);
        $('#five').airport([window.five]);
        $('#six').airport([window.six]);
         $('#seven').airport([window.seven]);
        $('#eight').airport([window.eight]);
        $('#nine').airport([window.nine]);
        $('#ten').airport([window.ten]);
	$('#eleven').airport([window.eleven]);
        $('#twelve').airport([window.twelve]);
        $('#thirteen').airport([window.thirteen]);
         $('#fourteen').airport([window.fourteen]);
        $('#fifteen').airport([window.fifteen]);
        $('#sixteen').airport([window.sixteen]);
        $('#seventeen').airport([window.seventeen]);
        
        setTimeout('testing()',300000);
    }
    
</script>
    <style type="text/css">
        body{
     	    font-family: 'Wallpoet', cursive; 
            font-size: 28pt;
            color: white;
            background-color: black;
        }
        
        .board
        {
            margin-left: 100px;
        }
    </style>
</head>
<body>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.js"></script>
    <script type="text/javascript" src="jquery.airport-1.1.source.js"></script>
    <section class="cwd_container" id="cwd_content" role="main">
    <div class="grid_2"><span class="invisible">hello</span></div>
    <div class="grid_8">
        <span class = "grid_8" style="text-align: center">Student Courts<br/>Energy Data</span>
        <div id="one" class="board"></div>
        <div id="two" class="board"></div>
        <div id="three" class="board"></div>
        <div id="four" class="board"></div>
        <div id="five" class="board"></div>
        <div id="six" class="board"></div>
        <div id="seven" class="board"></div>
        <div id="eight" class="board"></div>
        <div id="nine" class="board"></div>
        <div id="ten" class="board"></div>
	<div id="eleven" class="board"></div>
        <div id="twelve" class="board"></div>
        <div id="thirteen" class="board"></div>
        <div id="fourteen" class="board"></div>
        <div id="fifteen" class="board"></div>
        <div id="sixteen" class="board"></div>
        <div id="seventeen" class="board"></div>
	<span class="grid_8" style="text-align: center; margin-top: 30px; font-size: 14pt">Estimated energy usage per room.</span>    
</div>
    <div class="grid_2 last"><span class="invisible">hello</span></div>
    
    </section>
</body>
</html>

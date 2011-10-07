<?php
    //Array of each building to use 
    $buildingArray = array();
    $buildingArray[0][0] = "Archi";
    $buildingArray[0][1] = "BR-009";
    $buildingArray[1][0] = "bridgeHouse";
    $buildingArray[1][1] = "BR-008";
    $buildingArray[2][0] = "canoeClub";
    $buildingArray[2][1] = "BR-048";
    $buildingArray[3][0] = "emmtec";
    $buildingArray[3][1] = "BR-054";
    $buildingArray[4][0] = "library";
    $buildingArray[4][1] = "BR-006";
    $buildingArray[5][0] = "harrison";
    $buildingArray[5][1] = "BR-069";
    $buildingArray[6][0] = "mainAdmin";
    $buildingArray[6][1] = "BR-001";
    $buildingArray[7][0] = "mht";
    $buildingArray[7][1] = "BR-003";
    $buildingArray[8][0] = "scienceCentre";
    $buildingArray[8][1] = "BR-007";
    $buildingArray[9][0] = "services";
    $buildingArray[9][1] = "BR-057";
    $buildingArray[10][0] = "sparkHouse";
    $buildingArray[10][1] = "BR-017";
    $buildingArray[11][0] = "sportsCentre";
    $buildingArray[11][1] = "BR-010";
    $buildingArray[12][0] = "engineShed";
    $buildingArray[12][1] = "BR-005";
    $buildingArray[13][0] = "villageHall";
    $buildingArray[13][1] = "BR-015";
    $buildingArray[14][0] = "withamHouse";
    $buildingArray[14][1] = "BR-068";
    $buildingArray[15][0] = "court1";
    $buildingArray[15][1] = "BR-018";
    $buildingArray[16][0] = "court2";
    $buildingArray[16][1] = "BR-019";
    $buildingArray[17][0] = "court3";
    $buildingArray[17][1] = "BR-020";
    $buildingArray[18][0] = "court4";
    $buildingArray[18][1] = "BR-021";
    $buildingArray[19][0] = "court5";
    $buildingArray[19][1] = "BR-022";
    $buildingArray[20][0] = "court6";
    $buildingArray[20][1] = "BR-023";
    $buildingArray[21][0] = "court7";
    $buildingArray[21][1] = "BR-024";
    $buildingArray[22][0] = "court8";
    $buildingArray[22][1] = "BR-025";
    $buildingArray[23][0] = "court9";
    $buildingArray[23][1] = "BR-026";
    $buildingArray[24][0] = "court10";
    $buildingArray[24][1] = "BR-027";
    $buildingArray[25][0] = "court11";
    $buildingArray[25][1] = "BR-028";
    $buildingArray[26][0] = "court12";
    $buildingArray[26][1] = "BR-029";
    $buildingArray[27][0] = "court13";
    $buildingArray[27][1] = "BR-030";
    $buildingArray[28][0] = "court14";
    $buildingArray[28][1] = "BR-031";
    $buildingArray[29][0] = "court15";
    $buildingArray[29][1] = "BR-032";
    $buildingArray[30][0] = "court16";
    $buildingArray[30][1] = "BR-033";
    $buildingArray[31][0] = "court17";
    $buildingArray[31][1] = "BR-034";
    $buildingArray[32][0] = "lpac";
    $buildingArray[32][1] = "BR-053";
    
    $count = 0;
    $returning = array();
    $firstStamp;
    
    //Currently uses nucleus-dev to get last 24hours energy usage
    for($i = 0; $i < 33; $i ++)
    {
        $url = "https://nucleus-dev.online.lincoln.ac.uk/energy/last_day/building/" . $buildingArray[$i][1] ;          
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
        $energyData = curl_exec($ch);
        $energyData = json_decode($energyData);
        curl_close($ch);
        
        if(($energyData->error == 0))
        {
                $returning[$i][0] = $energyData->results->summary->total;
                if($returning[$i][0] == null)
                {
                    $returning[$i][0] = 0;
                }
        }
        else
            $returning[$i][0] = 0; 
       
        
        if($energyData->results->points[0]->timestamp != null)
            $firstStamp = $energyData->results->points[0]->timestamp;
        
        
        
         $count ++;
    }
    
    $startDateTime = strftime("%Y-%m-%d %H:%M:%S",$firstStamp - (24*60*60));
    $endDateTime = strftime("%Y-%m-%d %H:%M:%S",$firstStamp);
    $startDateTime = str_replace(' ','%20',$startDateTime);
    $endDateTime = str_replace(' ','%20',$endDateTime);
    $count = 0;
    while($count < count($buildingArray))
    {
	//THIS NEEDS CHANGING TO GET INFORMATION FROM NUCLEUS-DEV RATHER THAN DEREK'S API
        $url = "http://thesocialapp.internal.lincoln.ac.uk/RestService/RestServiceImpl.svc/energy?format=JSON&building=" . $buildingArray[$count][0]. "&dateStart=" . ($startDateTime) . "&dateEnd=" . ($endDateTime);            
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
        $energyData = curl_exec($ch);
        $energyData = json_decode($energyData);
        curl_close($ch);
        $sum = 0;
        $innerCounter = 0;
        while($innerCounter < 48)
        {
            $sum += $energyData->JSONDataResult[$innerCounter]->energy_KWh;
            $innerCounter += 1;
        }
      

        
        $returning[$count][1] = $sum;
    
       $count+= 1;
    }
    
    $colours = array();
    
    for($i = 0; $i < 33; $i++)
    {
        if(intval($returning[$i][0]) <= intval($returning[$i][1]))
            $colours[$i] = '#33ff00';
        else
            $colours[$i] = '#ff0000';
            
        if((intval($returning[$i][0]) == 0) || (intval($returning[$i][1] == 0)))
            $colours[$i] = '#0000ff';
    }
    
    $colours = json_encode($colours);
    echo $colours;
?>

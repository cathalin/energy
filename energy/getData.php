<?php
	//Array of buildings with long / lat. Saves repeatedly retrieving static data (for now)    
	$dataEnergy[0]['buildingID'] = "BR-001";
	$dataEnergy[0]['latitude'] = 53.228492;
	$dataEnergy[0]['longitude'] = -0.548029;
	
	$dataEnergy[1]['buildingID'] = "BR-003";
	$dataEnergy[1]['latitude'] = 53.2289;
	$dataEnergy[1]['longitude'] = -0.549402;

	$dataEnergy[2]['buildingID'] = "BR-004";
        $dataEnergy[2]['latitude'] = 53.23007;
        $dataEnergy[2]['longitude'] = -0.554213;

	$dataEnergy[3]['buildingID'] = "BR-005";
        $dataEnergy[3]['latitude'] = 53.227194;
        $dataEnergy[3]['longitude'] = -0.545229;

	$dataEnergy[4]['buildingID'] = "BR-006";
	$dataEnergy[4]['latitude'] = 53.226648;
	$dataEnergy[4]['longitude'] = -0.545197;
	
	$dataEnergy[5]['buildingID'] = "BR-007";
	$dataEnergy[5]['latitude'] = 53.228325;
	$dataEnergy[5]['longitude'] = -0.549833;

	$dataEnergy[6]['buildingID'] = "BR-007";
        $dataEnergy[6]['latitude'] = 53.228325;
        $dataEnergy[6]['longitude'] = -0.549833;

	$dataEnergy[7]['buildingID'] = "BR-008";
        $dataEnergy[7]['latitude'] = 53.229471;
        $dataEnergy[7]['longitude'] = -0.550776;

	$dataEnergy[8]['buildingID'] = "BR-010";
        $dataEnergy[8]['latitude'] = 53.229333;
        $dataEnergy[8]['longitude'] = -0.553601;

	$dataEnergy[9]['buildingID'] = "BR-010";
        $dataEnergy[9]['latitude'] = 53.229333;
        $dataEnergy[9]['longitude'] = -0.553601;

	$dataEnergy[10]['buildingID'] = "BR-015";
        $dataEnergy[10]['latitude'] = 53.229525;
        $dataEnergy[10]['longitude'] = -0.552538;

	$dataEnergy[11]['buildingID'] = "BR-017";
        $dataEnergy[11]['latitude'] = 53.226475;
        $dataEnergy[11]['longitude'] = -0.545722;

	$dataEnergy[12]['buildingID'] = "BR-053";
        $dataEnergy[12]['latitude'] = 53.227284;
        $dataEnergy[12]['longitude'] = -0.546141;

	$dataEnergy[13]['buildingID'] = "BR-054";
        $dataEnergy[13]['latitude'] = 53.2292258525461;
        $dataEnergy[13]['longitude'] = -0.5495714997245338;


	//For each building
	for($i = 0; $i < count($dataEnergy); $i++)
	{                  
		//Uses nucleus-dev  
        	$url = "https://nucleus-dev.online.lincoln.ac.uk/energy/last_day/building/" . $dataEnergy[$i]['buildingID'];
                   
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
                            $dataEnergy[$i]['totalEnergy'] = $energyData->results->summary->kwh_m2;
                            if($dataEnergy[$i]['totalEnergy'] == null)
                                $dataEnergy[$i]['totalEnergy'] = 0;
                    }
                    else
                        $dataEnergy[$i]['totalEnergy'] = 0;
         }
                //Create json object and echo
                $jsonData = json_encode($dataEnergy);
                echo $jsonData;

?>

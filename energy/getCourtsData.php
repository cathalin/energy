<?php

$buildingArray = array();
$buildingArray[0] = "BR-018";
$buildingArray[1] = "BR-019";
$buildingArray[2] = "BR-020";
$buildingArray[3] = "BR-021";
$buildingArray[4] = "BR-022";
$buildingArray[5] = "BR-023";
$buildingArray[6] = "BR-024";
$buildingArray[7] = "BR-025";
$buildingArray[8] = "BR-026";
$buildingArray[9] = "BR-027";
$buildingArray[10] = "BR-028";

//Court 12 currently excluded due to lack of data
$buildingArray[11] = "BR-029";

$buildingArray[11] = "BR-030";
$buildingArray[12] = "BR-031";
$buildingArray[13] = "BR-032";
$buildingArray[14] = "BR-033";
$buildingArray[15] = "BR-034";

$energy = array();
$energy[0]['name'] = "COURT 01";
$energy[1]['name'] = "COURT 02";
$energy[2]['name'] = "COURT 03";
$energy[3]['name'] = "COURT 04";
$energy[4]['name'] = "COURT 05";
$energy[5]['name'] = "COURT 06";
$energy[6]['name'] = "COURT 07";
$energy[7]['name'] = "COURT 08";
$energy[8]['name'] = "COURT 09";
$energy[9]['name'] = "COURT 10";
$energy[10]['name'] = "COURT 11";

//Court 12 excluded
$energy[11]['name'] = "COURT 12";

$energy[11]['name'] = "COURT 13";
$energy[12]['name'] = "COURT 14";
$energy[13]['name'] = "COURT 15";
$energy[14]['name'] = "COURT 16";
$energy[15]['name'] = "COURT 17";

$count = 0;
                while($count < count($energy))
                {
                    //Currently using nucleus-dev for energy data
                    $url = "https://nucleus-dev.online.lincoln.ac.uk/energy/last_day/building/" . $buildingArray[$count];
                    
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
                            $energy[$count]['energy'] = $energyData->results->summary->total;
                            
                            $url = "https://nucleus.online.lincoln.ac.uk/locations2/rooms?building_id=" . $buildingArray[$count];
                    
                            $ch = curl_init();
                            $timeout = 5;
                            curl_setopt($ch,CURLOPT_URL,$url);
                            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                            curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
                            $roomData = curl_exec($ch);
                            $roomData = json_decode($roomData);
                            
                            curl_close($ch);
                            $counter = 0;
                            foreach($roomData->results as $result)
                            {
                                $counter += 1;
                            }
                            $energy[$count]['rooms'] = $counter;
                            if($energy[$count]['energy'] == null)
                            {
                                $energy[$count]['energy'] = 0;
                            }
                           ; 
                           $energy[$count]['energy'] = number_format(round($energy[$count]['energy'] / $energy[$count]['rooms'],3),3);
                    }
                    else
                        $energy[$count]['energy'    ] = 0;
                    
                    $count +=1;
                }

                $finalEnergy = array();
                
                for($i = 0; $i< count($energy); $i++)
                {
                    $thisRecord =  $energy[$i]['energy'] . 'kWh - ' . $energy[$i]['name'];
                    $finalEnergy[$i] = $thisRecord; 
                }
           
                //Quick sorting
                sort($finalEnergy,SORT_STRING);
                 $finalEnergy = json_encode($finalEnergy);
                 echo $finalEnergy;
?>

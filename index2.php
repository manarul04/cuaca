<?php
 $kota = "demak";
 $api = '50a7aa80fa492fa92e874d23ad061374';
 $filePath = "https://api.openweathermap.org/data/2.5/weather?q=".$kota."&appid=50a7aa80fa492fa92e874d23ad061374";
//  $weather_data = json_decode(file_get_contents($api_url), true);  
 
//    $weather_data = json_decode(file_get_contents($api_url), true, $depth=512, JSON_THROW_ON_ERROR); 
   

  
try {  
    json_decode(file_get_contents($api_url), false, 512, JSON_THROW_ON_ERROR);  
  }  
  catch (\JsonException $exception) {  
    echo $exception->getMessage(); // displays "Syntax error"  
  }
     
?>
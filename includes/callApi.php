<?php



  $randomId = rand(0,8);
  $randomInfo = rand(0,2);
  
  $id = array ('69','644','346','213','620','165','149','659','332');
  $informations = array ('Le nom complet de ','Le lieu de naissance de ','La base de ',' se situe à '); // array for sentence
  $moreWords = array (' est ',);


  $api = 'http://www.superheroapi.com/api.php/1181332432002034/'.$id[$randomId].''; // call random hero
  $result = file_get_contents($api);
  $result = json_decode($result);

  $fullName = $result->biography->{'full-name'};
  $placeOfBirth = $result->biography->{'place-of-birth'};
  $base = $result->work->{'base'};
  $name = $result->{'name'};


  if($placeOfBirth == "New York, New York"){  //Fixe Errors with api json
      $placeOfBirth = "New York";
  }
  if($base == "New York, New York"){
      $base = "New York";
  }
  if($base == "(Banner) Hulkbuster Base, New Mexico, (Hulk) mobile, but prefers New Mexico"){
      $base = "Albuquerque, New Mexico"; 
  }

  if($randomInfo == 0){ //True name
    
    $sentence = "$informations[0]+$name+$moreWords[0]+$fullName+".".";
    $sentence = str_replace("+","",$sentence);
  //  echo $sentence;
    
  }else if($randomInfo == 1){ // Place of birth
    
    $sentence = "$informations[1]+$name+$moreWords[0]+$placeOfBirth+".".";
    $sentence = str_replace("+","",$sentence);
   // echo $sentence;
    
  }else if($randomInfo == 2){ // Base
    
    $sentence = "$informations[2]+$name+$informations[3]+$base+".".";
    $sentence = str_replace("+","",$sentence);
   // echo $sentence;
    
  }else {
    echo "error";
  }
  
  if(!empty($_POST['reload'])){
    
  }




?>



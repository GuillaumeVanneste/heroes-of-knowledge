<?php
    echo '<pre>';
    //var_dump($_POST);
    echo '</pre>';

    $errorMessages = [];
    $successMessages = [];
    $page = !empty($_GET["page"]) ? $_GET["page"] : '';
    $id = !empty($_GET["id"]) ? $_GET["id"] : '';
    $answer ="GuiGuiLePlusBo";
    $won = 0;


    if(!empty($_POST))  
    {
    $userAnswer =($_POST['rep']);
      
    $UsserRepReplace = str_replace([" ","  ","$",".","?","/","-","+","_","<",">","=","(",")"], "", $userAnswer);  // retirer les caracteres relou
    $TrueRepReplace = str_replace([" ","  ","$",".","?","/","-","+","_","<",">","=","(",")"], "", $answer);
      
    $UsserRepLC = strtolower($UsserRepReplace);     // Lowercase
    $TrueRepLC = strtolower($TrueRepReplace);
      
    $UsserRepLength = strlen($UsserRepLC);     // Calc lenght
    $TrueRepLength = strlen($TrueRepLC);
      
    $marge = floor($TrueRepLength*0.2);
    $levenshtein = levenshtein($UsserRepLC, $TrueRepLC);
    $margeLeven = floor($TrueRepLength*0.10);
      
     if($UsserRepLC == $TrueRepLC){
       $Won = 1;
     }
      else{
        if(($UsserRepLength)<=($TrueRepLength+$marge) && ($UsserRepLength)>=($TrueRepLength-$marge)){
          if($levenshtein>($margeLeven+2)){
            echo 'nan';
           }
          else if($levenshtein==$margeLeven){
            $won=1;
            echo 'bravo';
          }
          else if($levenshtein==($margeLeven+1)){
            echo 'tu y es presque';
          }
          else{
            echo 'nan';
          }
        }
        else{
          echo 'nan';
        }
      }
      
    echo '<pre>';
    var_dump($won);
    echo '</pre>';
    
   
      
    }

?>
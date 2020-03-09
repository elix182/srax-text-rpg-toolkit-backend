<?php

namespace App\Services;

class MonsterService
{
  private $RULE_USE_LIMIT = 3;
  /*
    * Every A char in the name will be replaced with O
    * Every U char in the name will  be replaced with A
    * Every I will add another I right next to it
    * Every E char in the name will change position with the next character on the right
    * Every O char in the name will add an R on the left side of it
    * Every R and G chars will change to “an apostrophe and a space” ( or \’\s in regular expression) 
    * Non alphanumeric chars (like spaces or dashes) will make everything on the right to be ignored
    * All this rules can be applied more than once, recursively, if the string allows it and if it keeps adding characters
    * To prevent issues with endless loop, make each rule work a maximum of 3 times per character
   */
  public function generateRandomName(String $raceName){
    $string = strtoupper($raceName);
    $raw = $this->generateName($string, 0, [0,0,0,0,0,0,0]);
    $result = ucfirst(strtolower($raw));
    return $result;
  }
    
  private function generateName(String $string, Int $index, $ruleCounter){
    if($string[$index] == 'A'){
      if($ruleCounter[0] < $this->RULE_USE_LIMIT){
        $string[$index] = 'O';
        $ruleCounter[0]++;
      }
    } else $ruleCounter[0] = 0;
    
    if($string[$index] == 'U'){
      if($ruleCounter[1] < $this->RULE_USE_LIMIT){
        $string[$index] = 'A';
        $ruleCounter[1]++;
      }
    } else $ruleCounter[1] = 0;

    if($string[$index] == 'I'){
      if($ruleCounter[2] < $this->RULE_USE_LIMIT){
        $a = substr($string, 0, $index);
        $b = substr($string, $index);
        $string = $a.'I'.$b;
        $ruleCounter[2]++;
      }
    } else $ruleCounter[2] = 0;

    if($string[$index] == 'E'){
      if($ruleCounter[3] < $this->RULE_USE_LIMIT){
        $temp = $string[$index+1];
        $string[$index+1] = $string[$index];
        $string[$index] = $temp;
        $ruleCounter[3]++;
      }
    } else $ruleCounter[3] = 0;
    
    if($string[$index] == 'O'){
      if($ruleCounter[4] < $this->RULE_USE_LIMIT){
        $a = substr($string, 0, $index);
        $b = substr($string, $index);
        $string = $a.'R'.$b;
        $ruleCounter[4]++;
      }
    } else $ruleCounter[4] = 0;
    
    if($string[$index] == 'R' || $string[$index] == 'G'){
      if($ruleCounter[5] < $this->RULE_USE_LIMIT){
        $string[$index] = "' ";
        $ruleCounter[5]++;
      }
    } else $ruleCounter[5] = 0;
    
    if(!ctype_alnum($string[$index])){
      if($ruleCounter[6] < $this->RULE_USE_LIMIT){
        $string = substr($string, 0, $index);
        $ruleCounter[6]++;
      }
    } else $ruleCounter[6] = 0;
    
    if($index+1 < strlen($string)){
      return $this->generateName($string, $index+1, $ruleCounter);
    }
    return $string;
  }
    
  public function generateRandomPicture(){
    return "[]";
  }
}

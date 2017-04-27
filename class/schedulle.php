<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of schedulle
 *
 * @author mc
 */
class schedulle {
    
    private  $calendarArray = array();
    private $teamsArray = array();
    
    
    
    
    public function __construct(){
        $this->setTeams();
        $this->setCallendar();
    }
    
    private function setTeams(){       

        $html = new simple_html_dom();
        $html->load_file('http://rotoguru2.com/hoop/schedule.html');


        foreach ( $html->find('table[cellspacing="1"] tbody tr') as $test){
            foreach($test->find('th') as $singleTh){

                if(!($singleTh->plaintext === 'Date')){
                   $this->teamsArray[] = $singleTh->plaintext;
                }

            }
            break;   
        }
     }

    private function setCallendar(){

        $html = new simple_html_dom();
        $html->load_file('http://rotoguru2.com/hoop/schedule.html');

       foreach ( $html->find('table[cellspacing="1"] tbody tr') as $test){          
           
           
          if($test->find('td',0)){ 
                $dayArray = explode('/', substr($test->find('td',0)->plaintext, 3));
                $dayString ="";
                $x=1;
                $year = "";
                
                foreach($dayArray as $dayValues){       
        
                        if($x==1){//check which year
                            if(intval($dayValues) > 9){
                                $year = '2016';
                            }
                            else {
                                $year = '2017';
                            }
                        }            
            
                    if(strlen($dayValues) == 1){//if moth is single int - add 0 at begining
                        $dayString .= "0".$dayValues;
                    }else {
                        $dayString .= $dayValues;
                    }

                    $dayString.= "-";
                    if($x==2) $dayString .= $year;

                    $x++;
                }
             
                $this->calendarArray[] = $dayString;    
          }
       }
    } 
    
    

    
    
    
    
    public function getTeams(){
        return $this->teamsArray;
    }
    
     public function getCallendar(){
        return $this->calendarArray;
    }
    
    
}

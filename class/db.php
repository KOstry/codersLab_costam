<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of db
 *
 * @author mc
 */
class db {
    
    private static $instance = null;
    public $_pdo,
            $_query,
            $_count,
            $_results,
            $_error = false;
    
    
    
    private function __construct(){
        try{
            $this->_pdo = new PDO('mysql:host='.config::getConfig('mysql/host').';dbname='.config::getConfig('mysql/dbname'), config::getConfig('mysql/login'), config::getConfig('mysql/pass'));
        } catch (Exception $ex) {
            die($ex->getMessage());
        }        
    }
    
    
    public static function getInstance(){
        
        if(!isset(self::$instance)){
            self::$instance= new db();
        }
        return self::$instance;
    }    
    
    
    
    
    public function insert( $table, $values = array()){
        
        $keys = implode(',',array_keys($values));
        $questionMarks = "";
        $x = 1;
        
        
        for($i=0;$i< count($values);$i++){ // get question mars char to set bindValue
            $questionMarks .= "?";
            if($x < count($values)){
                $questionMarks .= ",";
            }
            $x++;
        }//end for 
       $insertSql = "Insert into ".$table." ({$keys}) values (".$questionMarks.")" ;
        
       $this->query($insertSql, array_values($values)); 
        
        
    }// end insert
    
    
    
    public function query($sql, $params = array()){
        
        echo $sql."</br>";
        if($this->_query = $this->_pdo->prepare($sql, $params)){
            $x=1;
            if(count($params)){
                foreach($params as $param){
                    $this->_query->bindValue($x, $param);
                    $x++;                            
                }//for each
            }//if count
            
            
            if($this->_query->execute()){
            $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
            $this->_count = $this->_query->rowCount();
            } else {
                $this->_error = true;                
            }
           
            
            
        }//if this
        return $this;
        
    }
    
    
     public function error(){
        return $this->_error;
    }
    
    public function get($table, $where){
        return $this->action('SELECT *', $table, $where);
    }
    
    public function getResult(){
        return $this->_results;
    }
    
     public function action($action, $table, $where = array()){
         echo "action 1</br>";
        if(count($where) === 3){
            echo "action 2</br>";
            $operators = array('=', '>', '<', '>=', '<=');

            $field          = $where[0];
            $operator       = $where[1];
            $value          = $where[2];

            if(in_array($operator, $operators)){
                echo "action 3</br>";
                $sql = "{$action} FROM {$table}  WHERE {$field} {$operator} ?";
               echo $sql;
                if(!$this->query($sql, array($value))->error()){
                    return $this;
                }
            }
        }
        return false;

    }
    
    
}

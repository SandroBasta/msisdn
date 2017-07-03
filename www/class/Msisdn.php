<?php

class Msisdn
{

 /**
 * @author  Sandro Basta <[<sandrobasta@outlook.com>]>
 * @copyright [project is only for purpose of test, contact for more inormation]
 * |takes MSISDN INPUT
 * |returns MNO identifier, country dialling code, subscriber number and country identifier as defined with ISO 3166-1-alpha-2
 */ 

    
    private $msisdn;
    
    private static $db;
    
    public function __construct($msisdn)
    {
        
        $this->msisdn = trim($msisdn);
        
    }
    
    public function validate()
    {
        /**
         *    @param  string -> number
         *    @return info string 
         */
        
        
        $validate_msisdn = array(
            
            "validation" => "Your input is not valid  MSISDN number!",
            "data" => array()
            
        );
        
        if ($this->msisdn != "") {
            
            // using Regular expression matching E.164 formatted phone numbers              
            
            
            if (preg_match("/^\+?[1-9][\d]{1,14}$/", $this->msisdn)) {
                
                $validate_msisdn = array(
                    
                    "validation" => "Your input is Valid MSISDN number",
                    "data" => $this->number_format($this->msisdn)
                );
            }
        }
        
        
        return json_encode($validate_msisdn);
    }
    
    
    
    public function number_format()
    {
        /**
         *    @param  string -> number
         *    @return info string -> number 
         */
        
        self::$db = require '../db/db.php'; //  This just for the purpose of testing, produced this should be databases
        
        $data = array();
        
        foreach (self::$db as $country => $country_data) {
            
            foreach ($country_data as $carrier => $prefix) {
                
                foreach ($prefix as $carrier => $regex) {
                    
                    if (preg_match($regex, $this->msisdn)) {
                        
                        $data = array($carrier, $country );
                        
                        break;
                    }
                }
                
                if (count($data) > 0) {
                    break;
                }
            }
            if (count($data) > 0) {
                break;
            }
            
        }
        
        if (count($data) > 0) {
            
            $output = (array_keys(self::$db[$data[1]]));
            $num    = substr($this->msisdn, strlen('+' . $output[0]));
            $return = $data[0] . ', ' . $output[0] . ', ' . $num . ', ' . $data[1];
            
            return $return;
        }
    }
    
}

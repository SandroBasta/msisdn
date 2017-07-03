<?php

require_once  '../vendor/autoload.php';
require_once ('../class/Msisdn.php');

class MsisdnTest extends  PHPUnit_Framework_TestCase
{
 
 /**
 * @author  Sandro Basta <[<sandrobasta@outlook.com>]>
 * @copyright [project is only for purpose of test, contact for more inormation]
 * 
 */ 

   /**
     * @test
     * @expected Exception Invalid
     * @dataProvider invalid
     */
    public function throw_exception_invalid_argument($msisdn)
    {       
             $validate = new Msisdn($msisdn);
             $validate->validate();
    } 

     /**
     * @test
     * @dataProvider valid
     */
    public function get_result($msisdn, $expected)
    {    
    	$validate = new Msisdn($msisdn);
        $this->assertEquals($expected, $validate->validate());
    }

    public function invalid(){

    	return[
                         
            "validation" => "Your input is not valid  MSISDN number!",
            "data" => array(),                  
    	];

    }

    public function valid(){

    	return[
                         
            "validation":"Your input is Valid MSISDN number",
            "data":"TELENOR, 381, 63123456, SR"              
    	];
    	
    }


}
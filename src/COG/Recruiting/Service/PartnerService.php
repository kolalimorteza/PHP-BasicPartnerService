<?php

namespace COG\Recruiting\Service;

use COG\Recruiting\Entity;
use COG\Recruiting\Utils;

//Can be automated with class loader later on, just for test
require '../Entity/Hotel.php';
require '../Entity/Partner.php';
require '../Entity/Price.php';
require '../Utils/Validation.php';

/**
 * This class is an implementation of an partner service.
 *
 *
 */
class PartnerService implements PartnerServiceInterface
{

    //For dummy mock data
    private $path = "../../../../data/15475.json";   
    
    /**
     * This function will recieve the data base connection or object in production
     *
     *
     */ 
    public function __construct()
    {
       
    }
    /**
    *   Dummy data loader function
    *   
    *   @return JSONArray
    *
    */
    public function loadFile(){
        return json_decode(file_get_contents($this->path), true);
    }

    /* @param integer $iCityId
     *
     * @return \COG\Recruiting\Entity\Hotel[]
     */
    public function getResultForCityId($iCityId){

        //varibale to retrun finally
        $result = array();


        /* In Production, jsonArray will receieved by running a sql query on database object
            with $iCityID as filter.
        */

        //load dummy data    
        $jsonArray = $this->loadFile();


        /* Parse JSON to Entities */
        foreach($jsonArray['hotels'] as $hotel) {

            $hotelobj = new Entity\Hotel($hotel['name'], $hotel['adr']);
            
            foreach($hotel['partners'] as $partner){
                
                if(!Utils\Validation::isURLValid($partner['url'])){
                    $partner['url'] = "error";
                    echo "URL is not valid";
                    //This check can also be done while inputing the value in db
                }

                $partnerObj = new Entity\Partner($partner['name'], $partner['url']);

                foreach ($partner['prices'] as $price) {
                    
                    $priceObj = new Entity\Price($price['description'], $price['amount'], $price['from'], $price['to']);

                    $partnerObj->addPrice($priceObj);
                }
                $hotelobj->addPartners($partnerObj);
                    
            }

            array_push($result, $hotelobj);
        }
        return $result;
    }
}





<?php
namespace COG\Recruiting\Service;


/**
 * This class implementation of an Name Ordered hotel service.
 *
 * @author pulkit gupta
 */
class NameOrderedHotelService implements HotelServiceInterface
{

    /**
     * function to get sorted array of hotels[]
     */
    public function getHotelsForCity($CityName)
    {
        if (!isset($this->aCityToIdMapping[$CityName]))
        {
            throw new \InvalidArgumentException(sprintf('Given city name [%s] is not mapped.', $CityName));
        }

        $iCityId = $this->aCityToIdMapping[$CityName];
        
        //get Unordered Function and passed in variable
        $aPartnerResults = $this->oPartnerService->getResultForCityId($iCityId);

        usort($aPartnerResults, function($a, $b){
            //change here to sub arrays for comparisions.
            return strnatcmp($a->name, $b->name);
        });

        return $aPartnerResults;

    }
}




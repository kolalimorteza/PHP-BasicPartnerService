<?php

namespace COG\Recruiting\Service;

/**
 * The implementation is responsible for resolving the id of the city from the
 * given city name (in this simple case via an array of CityName => id). The second 
 * responsibility is to sort the returning result from the partner service in whatever
 * way. 
 * 
 * This breaks with the rule of the separation of concerns, but for this test case we want to
 * keep it simple.
 *
 * @author vovke
 */
interface HotelServiceInterface
{
    /**
     * @param string $cityName Name of the city to search for.
     *
     * @return \COG\Recruiting\Entity\Hotel[]
     * @throws \InvalidArgumentException if city name is unknown.
     */
    protected $PartnerService;
    /**
	 * Maps from city name to the id for the partner service.
	 *  
	 * @var array
	 */
	protected $aCityToIdMapping = array(
        "Düsseldorf" => 15475
    );

    /**
     * @param PartnerServiceInterface $oPartnerService
     */
    public function __construct(PartnerServiceInterface $oPartnerService)
    {
        $this->PartnerService = $oPartnerService;

    }
    /**
     * @param string $sCityName Name of the city to search for.
     *
     * @return COG\Recruiting\Entity\Hotel[]
     * @throws \InvalidArgumentException if city name is unknown.
     */
    public function getHotelsForCity($cityName);
    
}
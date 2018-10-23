<?php

namespace COG\Recruiting\Entity;

/**
 * Represents a single price from a search result
 * related to a single partner.
 * 
 * @author vovke
 */
class Price
{
    /**
     * Description text for the rate/price
     * 
     * @var string
     */
    public $description;

    /**
     * Price in euro
     * 
     * @var float
     */
    public $amount;

    /**
     * Arrival date, represented by a DateTime obj
     * which needs to be converted from a string on 
     * write of the property.
     *
     * @var \DateTime
     */
    public $fromDate;

    /**
     * Departure date, represented by a DateTime obj
     * which needs to be converted from a string on 
     * write of the property
     *
     * @var \DateTime
     */
    public $toDate;
    /**
     * @param $date string with format YYYY-MM-DD
     *
     * 
     * Converting code from string to data object
     */
    public function getDateObj($date){
        $dateTime = \datetime::createfromformat('Y-m-d',$date);
        return $dateTime;
    }

    /**
     * @param $date string
     *
     * Setter for oToDate
     */
    public function setToDate($date){
        $this->oToDate = $this->getDateObj($date);
    }

    /**
     * @param $date string
     *
     * Setter for fromDate
     */
    public function setFromDate($date){
        $this->fromDate = $this->getDateObj($date);
    }


     /**
     * @param $date string
     *
     * Getter for toDate
     * @return datetime object for ToDate
     */
    public function getToDate($date){
        return $this->toDate;
    }

    /**
     * @param $date string
     *
     * Getter for fromDate
     * @return datetime object for FromDate
     */
    public function getFromDate($date){
        return $this->fromDate;
    }



    /**
     * @param $desc, $amount, $from , $to
     *
     * Constructor
     */
    public function __construct($desc, $amount, $from, $to){

        $this->description = $desc;
        $this->amount = $amount;
        
        $this->setToDate($to);
        $this->setFromDate($from);
        
    }
    
}

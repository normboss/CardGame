<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//echo "This is Card.php<BR>";

/**
 *
 * @author Norm
 */
class Card /* implements Comparable<Card> */
{
    public $value;
    public $suit;
    private $numericValue;
    private $image;
    
    function __construct( $value, $suit, $image )
    {
//        print "\nIn Card constructor\n";
        $this->value = $value;
        $this->suit = $suit;
        $this->image = $image;
    }
    
    function getImage()
    {
        return $this->image;
    }
    
    function initSetNumericValue( $value )
    {
        switch ( value )
        {
            case "A":
                $this->numericValue = 1;
                break;
            case "T":
                $this->numericValue = 10;
                break;
            case "J":
                $this->numericValue = 11;
                break;
            case "Q":
                $this->numericValue = 12;
                break;
            case "K":
                $this->numericValue = 13;
                break;
            default:
                $this->numericValue = $value;
        }
        
    }
    
    function getNumericValue()
    {
        return $this->numericValue;
    }
    
    function getValue() {
        return $this->value;
    }
    
    function getSuit() {
        return $this->suit;
    }
    
    function toString()
    {
        $s = "-" . $this->value . $this->suit;
        return $s;
    }
    
//    public int compareTo( Card c ) 
//    {
//        // usually toString should not be used,
//        // instead one of the attributes or more in a comparator chain
//        //return toString()->compareTo(o->toString());
//        return ( $this->getNumericValue() < c->getNumericValue() );
//    }
    

}

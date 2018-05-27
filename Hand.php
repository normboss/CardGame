<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//echo "This is Hand.php<BR>";
require_once "Card.php";

/**
 *
 * @author Norm
 */
class Hand 
{
    private $hand;
    private $cardCount = 0;
    private $hasStraight = FALSE;
    private $hasFlush = FALSE;
    private $has4OfaKind = FALSE;
    private $valueOf4OfaKind = null;
    private $has3OfaKind = FALSE;
    private $valueOf3OfaKind = null;
    private $has2OfaKind1 = FALSE;
    private $has2OfaKind2 = FALSE;
    private $valueOfFirst2OfaKind = null;
    private $valueOfSecond2OfaKind = null;
    
    function __construct()   
    {
        $this->hand = array();
    }
    
    function addCard( $c )
    {
        $this->hand[ $this->cardCount ] = $c;
        $this->cardCount++;
    }
    
    function getHighCard()
    {
        return hand[ sizeof($this->hand) - 1 ];
    }
    
    function showHand()
    {
        //sortByValue();
        $this->bubbleSortByValue();
     
        echo "<BR>";
        for ( $i = 0; $i < sizeof($this->hand); $i++ )
        {
            $c = $this->hand[$i];
            echo '<img src="' . $c->getImage() . '" width="50" height="70"/>';
        }
        echo "<BR>";
       
        $h = " :";
        for ( $i=0; $i < sizeof($this->hand); $i++ )
        {
            $c = $this->hand[$i];
            $h .= $c->toString();
        }
//        return $h;
        
        $s = " ";
        if ( $this->hasStraight && $this->hasFlush ) {
            if ( getHighCard()->getValue()->equalsIgnoreCase("A")) {
                $s = $s .  " [royal-flush] ";
            } else {
                $s = $s .  " [straight-flush] ";
            }
        }
        if ( $this->hasStraight ) {
            $s = $s . " [Straight] ";
        }
        if ( $this->hasFlush ) {
            $s = $s . " [Flush] ";
        }
        if ( $this->has4OfaKind ) {
            $s = $s . " [4 of a Kind] ";
        }
        
        if ( $this->has3OfaKind && $this->has2OfaKind1 ) 
        {
            $s = $s . " [full house] ";
        }
        else
        {
            if ( $this->has3OfaKind ) {
                $s = $s . " [3 of a kind] ";
            }
            if ( $this->has2OfaKind2 ) {
                $s = $s . " [(2) 2 of a kind] ";
            } else if ( $this->has2OfaKind1 ) {
                $s = $s . " [(1) 2 of a kind] ";
            }
        }
        return $h . $s;
    }
    
    function sortByValue()
    {
        // 1-> sort using Comparable
//        Arrays->sort(books);
//        System->out->println(Arrays->asList(books));

        // 2-> sort using comparator: sort by id
//        Arrays->sort($this->hand, new Comparator<Card>() {
//            @Override
//            public int compare(Card o1, Card o2) {
//                return o1->getValue()->compareTo(o2->getValue());
//            }
//        });
//        System->out->println(Arrays->asList(hand));
    }

    function bubbleSortByValue()
    {  
        $n = sizeof($this->hand);  
        $temp = null;
        for ($i=0; $i < $n; $i++)
        {  
            for($j=1; $j < ($n-$i); $j++)
            {  
                if( $this->hand[$j-1]->getNumericValue() > $this->hand[$j]->getNumericValue() )
                {  
                    //swap elements  
                    $temp = $this->hand[$j-1];  
                    $this->hand[$j-1] = $this->hand[$j];  
                    $this->hand[$j] = $temp;  
                }  
            }  
        }      
    }
    
//    public void AnalyzeHand()
//    {
//        $this->bubbleSortByValue();
//        
//        $this->has4OfaKind = checkFor4OfaKind();
//        if ( !has4OfaKind ) 
//        {
//            $this->hasStraight = checkForStraight();
//            $this->hasFlush = checkForFlush();
//            if ( !(hasStraight && hasFlush ))
//            {
//                $this->has3OfaKind = checkFor3ofaKind();
//                $this->has2OfaKind = checkFor2ofaKind();
//            }
//        }
//    }
    
    function AnalyzeHand()
    {
        $this->bubbleSortByValue();
        $this->hasStraight = $this->checkForStraight();
        $this->hasFlush = $this->checkForFlush();
        $this->has4OfaKind = $this->checkFor4OfaKind();
        if ( !$this->has4OfaKind ) 
        {
            $this->has3OfaKind = $this->checkFor3ofaKind();
            $this->has2OfaKind = $this->checkFor2ofaKind();
        }
        $this->checkForNofAKind();
    }
    
    function isContained( $seenArray, $value )
    {
        if ( $seenArray == null ) {
            return FALSE;
        }
        foreach ( $seenArray as $i )
        {
            if ( $value == $i ) {
                return TRUE;
            }
        }
        return FALSE;
    }
    
    function checkForNofAKind()
    {
        $valuesSeen = null;
        $seenIndex = 0;
        
        $matchCount = 0;
//        for ( Card c : $this->hand )
        $c = null;
        foreach ( $this->hand as $c )
        {
            $value = $c->getNumericValue();
            if ( $this->isContained( $valuesSeen, $value )) {
                continue;
            }
            $valuesSeen[ $seenIndex++ ] = $value;
            $matchCount = $this->checkForNofAKindHelper($value);
            switch ( $matchCount )
            {
                case 4:
                    $this->has4OfaKind = TRUE;
                    break;
                case 3:
                    $this->has3OfaKind = TRUE;
                    break;
                case 2:
                    if ( $this->has2OfaKind1 ) {
                        $this->has2OfaKind2 = TRUE;
                    } else {
                        $this->has2OfaKind1 = TRUE;
                    }
                    break;
            }
        }
    }
    
    function checkForNofAKindHelper( $searchValue )
    {
        $count = 0;
        //for ( Card c : $this->hand )
        foreach ( $this->hand as $c )
        {
            $value = $c->getNumericValue();
            if ( $value == $searchValue ) {
                $count++;
            }
        }
        return $count;
    }
    
    function checkFor2ofaKind()
    {
        $matchCount = 0;
        $prev = null;           // previous card
        //for ( Card c : $this->hand )
        foreach ( $this->hand as $c )
        {
            if ( $c->getValue() == $this->valueOfFirst2OfaKind ) {
                continue;
            }
            if ( $c->getValue() == $this->valueOf3OfaKind ) {
                continue;
            }
            
            if ( $prev != null ) {
                if ( $c->getNumericValue() == $prev->getNumericValue() ) {
                    $matchCount++;
                }
            }
            $prev = $c;
        }
        if ( $matchCount == 1 ) 
        {
            if ( $this->valueOfFirst2OfaKind != null ) {
                $this->valueOfSecond2OfaKind = $prev->getValue();
            } else {
                $this->valueOfFirst2OfaKind = $prev->getValue();
            }
            return TRUE;
        }
        return TRUE;
    }
    
    function checkFor3ofaKind()
    {
        $matchValue = 0;
        $matchCount = 0;
        $prev = null;           // previous card
        //for ( Card c : $this->hand )
//        foreach ( $c as $this->hand )
        foreach ( $this->hand as $c )
        {
            if ( $prev != null ) {
                if ( $c->getNumericValue() == $prev->getNumericValue() ) {
                    
                    $matchCount++;
                    $matchValue = $c->getNumericValue();
                }
            }
            
            $prev = $c;
        }
        if ( $matchCount == 2 ) {
            $this->valueOf3OfaKind = $prev->getValue();
            return TRUE;
        }
        return FALSE;
    }
    
    function checkFor4OfaKind()
    {
        $matchCount = 0;
        $prev = null;           // previous card
        //for ( Card c : $this->hand )
        foreach ( $this->hand as $c )
        {
            if ( $prev != null ) {
                if ( $c->getNumericValue() == $prev->getNumericValue() ) {
                    $matchCount++;
                }
            }
            $prev = $c;
        }
        if ( $matchCount == 3 ) {
            $this->valueOf4OfaKind = $prev->getValue();
            return TRUE;
        }
        return FALSE;
    }

    function checkForFlush()
    {
        $prev = null;           // previous card
//        for ( Card c : $this->hand )
        $c = null;
        foreach ( $this->hand as $c )
        {
//            echo get_class($c) . "<BR>";
//            echo "checkForFlush: " . $c->getValue() . $c->getSuit() . "<BR>";
            if ( $prev != null ) {
                if ( !$c->getSuit() == $prev->getSuit() ) {
                    return FALSE;
                }
            }
            $prev = $c;
        }
        return TRUE;
    }
    
    function checkForStraight()
    {
        $prev = null;           // previous card
        //for ( Card c : $this->hand )
        foreach ( $this->hand as $c )
        {
            if ( $prev != null ) {
                if ( $c->getNumericValue() != $prev->getNumericValue() + 1 ) {
                    return FALSE;
                }
            }
            $prev = $c;
        }
        return TRUE;
    }

}


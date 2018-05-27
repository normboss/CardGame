<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 *
 * @author Norm
 */
class Player 
{
    private $playerNumber;
    private $playerName;
//    private Card[] hand;
//    private int cardCount = 0;
//    boolean hasStraight = false;
//    boolean hasFlush = false;
//    boolean has4OfaKind = false;
//    String valueOf4OfaKind = null;
//    boolean has3OfaKind = false;
//    String valueOf3OfaKind = null;
//    boolean has2OfaKind = false;
//    String valueOfFirst2OfaKind = null;
//    String valueOfSecond2OfaKind = null;
    private $hand;
    private $cardCount = 0;
    
    function __construct( $number, $name )
    {
//        echo "Player Number: " . $number;
//        echo "Player Name: " . $name;
        $this->playerNumber = $number;
        $this->playerName = $name;
        $this->hand = null;
        //hand = new Card[5];
    }

    function beginNewHand()
    {
        $this->hand = new Hand;
        $this->cardCount = 0;
    }
    
    function addCard( $c )
    {
        $this->cardCount++;
        if ( $this->hand == null )
        {
            $this->hand = new Hand;
        }
        if ( $this->cardCount <= 5 ) 
        {
            $this->hand->addCard($c);
        }
    }
     
    function getName()
    {
        return $this->playerName;
    }
        
    function evalHand()
    {
        
        $this->hand->AnalyzeHand();
//        String s = this->playerName + hand->showHand();
//        System->out->println(s);
    }
    
    function showHand()
    {
        return $this->playerName . "  " . $this->hand->showHand();
    }
    
//    function Test()
//    {
//        // -5D-JS-JD-KC-KD  [3 of a kind]
//        $h = new Hand;
//        $h->addCard( new Card( "5", "D", "images2/Playing Cards/PNG-cards-1.3/5_of_diamonds.png" ));
//        $h->addCard( new Card( "J", "S", "images2/Playing Cards/PNG-cards-1.3/jack_of_spdes2.png" ));
//        $h->addCard( new Card( "J", "D", "images2/Playing Cards/PNG-cards-1.3/jack_of_diamonds2.png" ));
//        $h->addCard( new Card( "K", "C", "images2/Playing Cards/PNG-cards-1.3/king_of_clubs2.png" ));
//        $h->addCard( new Card( "K", "D", "images2/Playing Cards/PNG-cards-1.3/king_of_diamonds2.png" ));
//        $h->AnalyzeHand();
//        
//        //Player2 :-6C-8S-8H-QC-QD  [3 of a kind]  [(1) 2 of a kind] 
//    }
    
}

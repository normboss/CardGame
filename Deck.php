<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//import java.util. *;
//import java.util.concurrent.ThreadLocalRandom;
//echo "This is Deck.php<br>";

require_once "Card.php";


/**
 *
 * @author Norm
 */
class Deck 
{
    private $suits = array("H","D","S","C");
    const DIAMONDS = 0;
    const HEARTS = 1;
    const CLUBS = 2;
    const SPADES = 3;
    
//    private Card[] theDeck = new Card[52];
    private $theDeck = array();
    
    private $topOfDeck = 0;
    private $cardNum;

    function __construct()
    {
//        print "\nIn Deck constructor\n";
        $this->cardNum = 0;
//        for ( $i = 0; $i < sizeof($this->suits); $i++ )
//        {
//            $suit = $this->suits[$i];
//            $this->createCard( $suit );
//        }
    }
    
//    function createCard( $suit )
//    {
//        for ( $j = 1; $j <= 13; $j++ )
//        {
//            switch ( $j )
//            {
//                case 1: $value = "A"; break;
//                case 2: $value = "2"; break;
//                case 3: $value = "3"; break;
//                case 4: $value = "4"; break;
//                case 5: $value = "5"; break;
//                case 6: $value = "6"; break;
//                case 7: $value = "7"; break;
//                case 8: $value = "8"; break;
//                case 9: $value = "9"; break;
//                case 10: $value = "T"; break;
//                case 11: $value = "J"; break;
//                case 12: $value = "Q"; break;
//                case 13: $value = "K"; break;
//            }
//            $c = new Card( $value, $suit );
//            $this->theDeck[ $this->cardNum ] = $c;
//            $this->cardNum++;
//        }
//    }
    
    function createDeck()
    {
        $this->cardNum = 0;
        $this->theDeck[ $this->cardNum++ ] = new Card( "A", "D", "images2/Playing Cards/PNG-cards-1.3/ace_of_diamonds.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "2", "D", "images2/Playing Cards/PNG-cards-1.3/2_of_diamonds.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "3", "D", "images2/Playing Cards/PNG-cards-1.3/3_of_diamonds.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "4", "D", "images2/Playing Cards/PNG-cards-1.3/4_of_diamonds.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "5", "D", "images2/Playing Cards/PNG-cards-1.3/5_of_diamonds.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "6", "D", "images2/Playing Cards/PNG-cards-1.3/6_of_diamonds.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "7", "D", "images2/Playing Cards/PNG-cards-1.3/7_of_diamonds.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "8", "D", "images2/Playing Cards/PNG-cards-1.3/8_of_diamonds.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "9", "D", "images2/Playing Cards/PNG-cards-1.3/9_of_diamonds.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "T", "D", "images2/Playing Cards/PNG-cards-1.3/10_of_diamonds.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "J", "D", "images2/Playing Cards/PNG-cards-1.3/jack_of_diamonds2.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "Q", "D", "images2/Playing Cards/PNG-cards-1.3/queen_of_diamonds2.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "K", "D", "images2/Playing Cards/PNG-cards-1.3/king_of_diamonds2.png" );
        
        $this->theDeck[ $this->cardNum++ ] = new Card( "A", "C", "images2/Playing Cards/PNG-cards-1.3/ace_of_clubs.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "2", "C", "images2/Playing Cards/PNG-cards-1.3/2_of_clubs.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "3", "C", "images2/Playing Cards/PNG-cards-1.3/3_of_clubs.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "4", "C", "images2/Playing Cards/PNG-cards-1.3/4_of_clubs.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "5", "C", "images2/Playing Cards/PNG-cards-1.3/5_of_clubs.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "6", "C", "images2/Playing Cards/PNG-cards-1.3/6_of_clubs.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "7", "C", "images2/Playing Cards/PNG-cards-1.3/7_of_clubs.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "8", "C", "images2/Playing Cards/PNG-cards-1.3/8_of_clubs.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "9", "C", "images2/Playing Cards/PNG-cards-1.3/9_of_clubs.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "T", "C", "images2/Playing Cards/PNG-cards-1.3/10_of_clubs.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "J", "C", "images2/Playing Cards/PNG-cards-1.3/jack_of_clubs2.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "Q", "C", "images2/Playing Cards/PNG-cards-1.3/queen_of_clubs2.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "K", "C", "images2/Playing Cards/PNG-cards-1.3/king_of_clubs2.png" );
        
        $this->theDeck[ $this->cardNum++ ] = new Card( "A", "H", "images2/Playing Cards/PNG-cards-1.3/ace_of_hearts.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "2", "H", "images2/Playing Cards/PNG-cards-1.3/2_of_hearts.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "3", "H", "images2/Playing Cards/PNG-cards-1.3/3_of_hearts.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "4", "H", "images2/Playing Cards/PNG-cards-1.3/4_of_hearts.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "5", "H", "images2/Playing Cards/PNG-cards-1.3/5_of_hearts.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "6", "H", "images2/Playing Cards/PNG-cards-1.3/6_of_hearts.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "7", "H", "images2/Playing Cards/PNG-cards-1.3/7_of_hearts.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "8", "H", "images2/Playing Cards/PNG-cards-1.3/8_of_hearts.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "9", "H", "images2/Playing Cards/PNG-cards-1.3/9_of_hearts.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "T", "H", "images2/Playing Cards/PNG-cards-1.3/10_of_hearts.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "J", "H", "images2/Playing Cards/PNG-cards-1.3/jack_of_hearts2.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "Q", "H", "images2/Playing Cards/PNG-cards-1.3/queen_of_hearts2.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "K", "H", "images2/Playing Cards/PNG-cards-1.3/king_of_hearts2.png" );
        
        $this->theDeck[ $this->cardNum++ ] = new Card( "A", "S", "images2/Playing Cards/PNG-cards-1.3/ace_of_spades.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "2", "S", "images2/Playing Cards/PNG-cards-1.3/2_of_spades.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "3", "S", "images2/Playing Cards/PNG-cards-1.3/3_of_spades.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "4", "S", "images2/Playing Cards/PNG-cards-1.3/4_of_spades.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "5", "S", "images2/Playing Cards/PNG-cards-1.3/5_of_spades.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "6", "S", "images2/Playing Cards/PNG-cards-1.3/6_of_spades.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "7", "S", "images2/Playing Cards/PNG-cards-1.3/7_of_spades.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "8", "S", "images2/Playing Cards/PNG-cards-1.3/8_of_spades.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "9", "S", "images2/Playing Cards/PNG-cards-1.3/9_of_spades.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "T", "S", "images2/Playing Cards/PNG-cards-1.3/10_of_spades.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "J", "S", "images2/Playing Cards/PNG-cards-1.3/jack_of_spades2.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "Q", "S", "images2/Playing Cards/PNG-cards-1.3/queen_of_spades2.png" );
        $this->theDeck[ $this->cardNum++ ] = new Card( "K", "S", "images2/Playing Cards/PNG-cards-1.3/king_of_spades2.png" );
    }
    
    function reset()
    {
        $this->topOfDeck = 0;
    }
    
    function printDeck()
    {
        echo "<BR>";
        echo "<h1>Print Deck</h1><br>";
        for ( $i = 0; $i < sizeof( $this->theDeck ); $i++ )
        {
            $c = $this->theDeck[$i];
            echo '<img src="' . $c->getImage() . '" width="50" height="70"/>';
        }
        echo "<BR>";
    }
    
    function shuffle( $numTimes )
    {
        $this->topOfDeck = 0;
        //Random rnd = ThreadLocalRandom->current();
        
        for ( $j = 0; $j < $numTimes; $j++ )
        {
            for ( $i = sizeof($this->theDeck) - 1; $i > 0; $i-- ) 
            {
                $index = random_int ( 0, 51 );
                //int index = rnd->nextInt(i + 1);
                // Simple swap
                $tmp = $this->theDeck[$index];
                $this->theDeck[$index] = $this->theDeck[$i];
                $this->theDeck[$i] = $tmp;
            }
        }
    }    
    
    function getNextCard()
    {
//        echo "topOfDeck = " . $this->topOfDeck;
//        print_r($this->theDeck);
        return $this->theDeck[ $this->topOfDeck++ ];
    }
    
}

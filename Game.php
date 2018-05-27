<?php

/* 
 * To change this license header, choose License Headers in Project Properties->
 * To change this template file, choose Tools | Templates
 * and open the template in the editor->
 */
require_once "Deck.php";
require_once "Player.php";

//echo "This is Game->php<BR>";
/**
 *
 * @author Norm
 */
class Game 
{
    private $numberOfCards = 5;
    private $numPlayers;
    private $theDeck;
    private $players;
    
   
    function __construct( $numPlayers )
    {
        $this->numPlayers = $numPlayers;
    }
    
    function init()
    {
//        echo "Game->init<BR>";
        $this->theDeck = new Deck;
        $this->theDeck->createDeck();
        $this->theDeck->printDeck();
        $this->theDeck->shuffle(10);
        $this->theDeck->printDeck();
        
        //players = new Player[this->numPlayers];
        //$this->players = new array();
        for ( $i=0; $i < $this->numPlayers; $i++ )
        {
            $this->players[$i] = new Player( $i, "Player" . $i);		
        }
        
        //$this->players[0]->Test();
        
        for ( $j = 0; $j < 1; $j++ )
        {
            //System->out->println("Hand " + j);
            //echo "Hand " . $j;
            $this->dealCards();
            $this->evalHands();
            $this->showCards();
            //$this->theDeck->shuffle(3);
        }
    }
    
    function evalHands()
    {
        for ( $i = 0; $i < $this->numPlayers; $i++ )
        {
            $this->players[$i]->evalHand();
        }
        
    }
    
    function dealCards()
    {
        foreach ( $this->players as $p ) 
        {
            $p->beginNewHand();
        }
//        foreach ($players as $p) 
//        {
//        }
        for ( $j = 0; $j < $this->numberOfCards; $j++ )
        {
            for ( $i = 0; $i < $this->numPlayers; $i++ )
            {
                $this->players[$i]->addCard( $this->theDeck->getNextCard() );
            }
        }
    }
    
    function play()
    {
        
    }
    
    function showCards()
    {
        echo "<BR>";
        for ( $i = 0; $i < $this->numPlayers; $i++ )
        {
            //System->out->println( this->players[i]->showHand() );
            echo $this->players[$i]->showHand() . "<BR>";
        }
    }       
}

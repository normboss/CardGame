<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
    List of classes
    Game, Card, Deck, Player, Dealer, Hand, 
    The program must also have a scoring function to 
    determine the winning hand.
*/
//echo "This is CardGameApp<br>";

require_once "Deck.php";
require_once "Game.php";
require_once "Hand.php";

// main is where the OS starts the application after loading it into memory.
//	$h = new Hand;
//	$h->addCard( new Card( "5", "D" ));
//	$h->addCard( new Card( "5", "S" ));
//	$h->addCard( new Card( "K", "S" ));
//	$h->addCard( new Card( "K", "C" ));
//	$h->addCard( new Card( "K", "D" ));
//	$h->AnalyzeHand();

	
    echo "Hello World!<BR>";
    
    // Declare and initialize an object reference variable->
    // NOTE: The “new” command causes memory to be allocated
    // for the class and then the “constructor” for the class is called.
    // This constructor requires a parameter
    $cga = new CardGameApp;

    // Use the object reference variable “cga” to start the game
    // by calling the objects function “playTheGame()”
    $cga->start();



class CardGameApp 
{
    //  class member variables 
    public $numberOfPlayers;
    public $gameName;
    public $theDeck;
    //Scanner scan = new Scanner(System.in);
    public $game;

    // This is the class constructor
    // It is called when the “new” command is issued
    // It initializes class variables (data)
    function __construct()
    {
        print "In CardGameApp constructor\n";
        //scan = new Scanner(System.in);
    }

    // builds the deck of cards and creates the player objects
    function initializeGame()
    {
//        game = new Game( numberOfPlayers );
        
    }

    // This is where the game really starts
    function playTheGame()
    {
            // call function to initialize the app
        initializeGame();

    }

    function start()
    {
        $this->gameName = "Poker"; //sscan.nextLine();
        $this->numberOfPlayers = 4; //scan.nextInt();
//        $this->theDeck = new Deck;
//        $this->theDeck->createDeck();
//        $this->theDeck->printDeck();
        $this->game = new Game( $this->numberOfPlayers );
        $this->game->init();
    }
    
    function run()
    {
//        System.out.println("Question1?");
//        String answer = scan.nextLine();
        
    }

 
}
?>
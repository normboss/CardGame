/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package cardgameapp;

/**
 *
 * @author Norm
 */
public class Game 
{
    private final int numberOfCards = 5;
    private int numPlayers;
    private Deck theDeck;
    private Player[] players;
    
    public Game( int numPlayers )
    {
        this.numPlayers = numPlayers;
    }
    
    public void init()
    {
        theDeck = new Deck();
        theDeck.print();
        theDeck.shuffle(3);
        theDeck.print();
        
        players = new Player[this.numPlayers];
        for ( int i=0; i < this.numPlayers; i++ )
        {
            players[i] = new Player( i, "Player" + i);		
        }
        
        players[0].Test();
        
        for ( int j = 0; j < 1000; j++ )
        {
            System.out.println("Hand " + j);
            dealCards();
            evalHands();
            showCards();
            theDeck.shuffle(3);
        }
    }
    
    public void evalHands()
    {
        for ( int i = 0; i < this.numPlayers; i++ )
        {
            this.players[i].evalHand();
        }
        
    }
    
    private void dealCards()
    {
        for ( Player p : players ) {
            p.beginNewHand();
        }
        for ( int j = 0; j < this.numberOfCards; j++ )
        {
            for ( int i = 0; i < this.numPlayers; i++ )
            {
                this.players[i].addCard( this.theDeck.getNextCard() );
            }
        }
    }
    
    public void play()
    {
        
    }
    
    public void showCards()
    {
        for ( int i = 0; i < this.numPlayers; i++ )
        {
            System.out.println( this.players[i].showHand() );
        }
        
    }
}

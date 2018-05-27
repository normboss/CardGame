/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package cardgameapp;

import java.util. *;
import java.util.concurrent.ThreadLocalRandom;

/**
 *
 * @author Norm
 */
public class Deck {
    
    private enum CARD_SUITS {
        Diamonds,
        Hearts,
        Clubs,
        Spades
    }
    private String[] suits = {"H","D","S","C"};
    
    private Card[] theDeck = new Card[52];
    private int topOfDeck = 0;
    
    public Deck()
    {
        int cardNum = 0;
        for ( int i = 0; i < suits.length; i++ )
        {
            String suit = suits[i];

            for ( int j = 1; j <= 13; j++ )
            {
                String value = null;
                
                switch ( j )
                {
                    case 1: value = "A"; break;
                    case 2: value = "2"; break;
                    case 3: value = "3"; break;
                    case 4: value = "4"; break;
                    case 5: value = "5"; break;
                    case 6: value = "6"; break;
                    case 7: value = "7"; break;
                    case 8: value = "8"; break;
                    case 9: value = "9"; break;
                    case 10: value = "T"; break;
                    case 11: value = "J"; break;
                    case 12: value = "Q"; break;
                    case 13: value = "K"; break;
                }
                Card c = new Card( value, suit );
                this.theDeck[ cardNum ] = c;
                cardNum++;
            }
        }
    }
    
    public void reset()
    {
        topOfDeck = 0;
    }
    
    public void print()
    {
        System.out.println();
        for ( int i = 0; i < this.theDeck.length; i++ )
        {
            System.out.print( "-" + this.theDeck[i].toString() );
        }
        System.out.println();
    }
    
    public void shuffle(int numTimes )
    {
        topOfDeck = 0;
        Random rnd = ThreadLocalRandom.current();
        for ( int j = 0; j < numTimes; j++ )
        {
            for (int i = this.theDeck.length - 1; i > 0; i--) 
            {
                int index = rnd.nextInt(i + 1);
                // Simple swap
                Card a = theDeck[index];
                theDeck[index] = theDeck[i];
                theDeck[i] = a;
            }
        }
    }    
    
    public Card getNextCard()
    {
        return this.theDeck[ this.topOfDeck++ ];
    }
    
}

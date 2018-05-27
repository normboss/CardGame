/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package cardgameapp;

import static java.awt.PageAttributes.MediaType.C;
import java.util.Arrays;
import java.util.Comparator;

/**
 *
 * @author Norm
 */
public class Player 
{
    private int playerNumber;
    private String playerName;
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
    private Hand hand;
    private int cardCount = 0;
    
    public Player( int number, String name )
    {
        playerNumber = number;
        playerName = name;
        //hand = new Card[5];
    }

    public void beginNewHand()
    {
        hand = new Hand();
        cardCount = 0;
    }
    
    public void addCard( Card c )
    {
        cardCount++;
        if ( hand == null )
        {
            hand = new Hand();
        }
        if ( cardCount <= 5 ) {
            hand.addCard(c);
        }
    }
     
    public String getName()
    {
        return this.playerName;
    }
        
    public void evalHand()
    {
        
        hand.AnalyzeHand();
//        String s = this.playerName + hand.showHand();
//        System.out.println(s);
    }
    
    public String showHand()
    {
        return this.playerName + hand.showHand();
    }
    
    public void Test()
    {
        // -5D-JS-JD-KC-KD  [3 of a kind]
        Hand h = new Hand();
        h.addCard( new Card( "5", "D" ));
        h.addCard( new Card( "J", "S" ));
        h.addCard( new Card( "J", "D" ));
        h.addCard( new Card( "K", "C" ));
        h.addCard( new Card( "K", "D" ));
        h.AnalyzeHand();
        
        //Player2 :-6C-8S-8H-QC-QD  [3 of a kind]  [(1) 2 of a kind] 
    }
    
}

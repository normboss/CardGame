/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package cardgameapp;

import java.util.Arrays;
import java.util.Comparator;

/**
 *
 * @author Norm
 */
public class Hand 
{
    private Card[] hand;
    private int cardCount = 0;
    private boolean hasStraight = false;
    private boolean hasFlush = false;
    private boolean has4OfaKind = false;
    private String valueOf4OfaKind = null;
    private boolean has3OfaKind = false;
    private String valueOf3OfaKind = null;
    private boolean has2OfaKind1 = false;
    private boolean has2OfaKind2 = false;
    private String valueOfFirst2OfaKind = null;
    private String valueOfSecond2OfaKind = null;
    
    public Hand()   
    {
        hand = new Card[5];
    }
    
    public void addCard( Card c )
    {
        hand[ cardCount++ ] = c;
    }
    
    public Card getHighCard()
    {
        return hand[ this.hand.length - 1 ];
    }
    
    public String showHand()
    {
        //sortByValue();
        bubbleSortByValue();
        
        String h = " :";
        for ( int i=0; i<this.hand.length; i++ )
        {
            Card c = this.hand[i];
            h += c.toString();
        }
        
        String s = " ";
        if ( this.hasStraight && this.hasFlush ) {
            if ( getHighCard().getValue().equalsIgnoreCase("A")) {
                s += " [royal-flush] ";
            } else {
                s += " [straight-flush] ";
            }
        }
        if ( this.hasStraight ) {
            s += " [Straight] ";
        }
        if ( this.hasFlush ) {
            s += " [Flush] ";
        }
        if ( this.has4OfaKind ) {
            s += " [4 of a Kind] ";
        }
        
        if ( this.has3OfaKind && this.has2OfaKind1 ) 
        {
            s += " [full house] ";
        }
        else
        {
            if ( this.has3OfaKind ) {
                s += " [3 of a kind] ";
            }
            if ( this.has2OfaKind2 ) {
                s += " [(2) 2 of a kind] ";
            } else if ( this.has2OfaKind1 ) {
                s += " [(1) 2 of a kind] ";
            }
        }
        return h+s;
    }
    
    public void sortByValue()
    {
        // 1. sort using Comparable
//        Arrays.sort(books);
//        System.out.println(Arrays.asList(books));

        // 2. sort using comparator: sort by id
        Arrays.sort(this.hand, new Comparator<Card>() {
            @Override
            public int compare(Card o1, Card o2) {
                return o1.getValue().compareTo(o2.getValue());
            }
        });
        System.out.println(Arrays.asList(hand));
    }

    public void bubbleSortByValue()
    {  
        int n = hand.length;  
        Card temp = null;
        for(int i=0; i < n; i++)
        {  
            for(int j=1; j < (n-i); j++)
            {  
                if(hand[j-1].getNumericValue() > hand[j].getNumericValue() )
                {  
                    //swap elements  
                    temp = hand[j-1];  
                    hand[j-1] = hand[j];  
                    hand[j] = temp;  
                }  
            }  
        }      
    }
    
//    public void AnalyzeHand()
//    {
//        this.bubbleSortByValue();
//        
//        this.has4OfaKind = checkFor4OfaKind();
//        if ( !has4OfaKind ) 
//        {
//            this.hasStraight = checkForStraight();
//            this.hasFlush = checkForFlush();
//            if ( !(hasStraight && hasFlush ))
//            {
//                this.has3OfaKind = checkFor3ofaKind();
//                this.has2OfaKind = checkFor2ofaKind();
//            }
//        }
//    }
    
    public void AnalyzeHand()
    {
        this.bubbleSortByValue();
        this.hasStraight = checkForStraight();
        this.hasFlush = checkForFlush();
//        this.has4OfaKind = checkFor4OfaKind();
//        if ( !has4OfaKind ) 
//        {
//            this.has3OfaKind = checkFor3ofaKind();
//            this.has2OfaKind = checkFor2ofaKind();
//        }
        this.checkForNofAKind();
    }
    
    boolean isContained( int[] seenArray, int value )
    {
        for ( int i : seenArray )
        {
            if ( value == i )
                return true;
        }
        return false;
    }
    
    public void checkForNofAKind()
    {
        int[] valuesSeen = new int[hand.length];
        int seenIndex = 0;
        
        int matchCount = 0;
        for ( Card c : this.hand )
        {
            int value = c.getNumericValue();
            if ( isContained( valuesSeen, value )) {
                continue;
            }
            valuesSeen[ seenIndex++ ] = value;
            matchCount = checkForNofAKindHelper(value);
            switch ( matchCount )
            {
                case 4:
                    this.has4OfaKind = true;
                    break;
                case 3:
                    this.has3OfaKind = true;
                    break;
                case 2:
                    if ( this.has2OfaKind1 ) {
                        this.has2OfaKind2 = true;
                    } else {
                        this.has2OfaKind1 = true;
                    }
                    break;
            }
        }
    }
    
    int checkForNofAKindHelper( int searchValue )
    {
        int count = 0;
        for ( Card c : this.hand )
        {
            int value = c.getNumericValue();
            if ( value == searchValue ) {
                count++;
            }
        }
        return count;
    }
    
    boolean checkFor2ofaKind()
    {
        int matchCount = 0;
        Card prev = null;           // previous card
        for ( Card c : this.hand )
        {
            if ( c.getValue().equalsIgnoreCase(this.valueOfFirst2OfaKind)) {
                continue;
            }
            if ( c.getValue().equalsIgnoreCase( this.valueOf3OfaKind )) {
                continue;
            }
            
            if ( prev != null ) {
                if ( c.getNumericValue() == prev.getNumericValue() ) {
                    matchCount++;
                }
            }
            prev = c;
        }
        if ( matchCount == 1 ) 
        {
            if ( this.valueOfFirst2OfaKind != null ) {
                this.valueOfSecond2OfaKind = prev.getValue();
            } else {
            this.valueOfFirst2OfaKind = prev.getValue();
            }
            return true;
        }
        return true;
    }
    
    boolean checkFor3ofaKind()
    {
        int matchValue = 0;
        int matchCount = 0;
        Card prev = null;           // previous card
        for ( Card c : this.hand )
        {
            if ( prev != null ) {
                if ( c.getNumericValue() == prev.getNumericValue() ) {
                    
                    matchCount++;
                    matchValue = c.getNumericValue();
                }
            }
            
            prev = c;
        }
        if ( matchCount == 2 ) {
            this.valueOf3OfaKind = prev.getValue();
            return true;
        }
        return false;
    }
    
    boolean checkFor4OfaKind()
    {
        int matchCount = 0;
        Card prev = null;           // previous card
        for ( Card c : this.hand )
        {
            if ( prev != null ) {
                if ( c.getNumericValue() == prev.getNumericValue() ) {
                    matchCount++;
                }
            }
            prev = c;
        }
        if ( matchCount == 3 ) {
            this.valueOf4OfaKind = prev.getValue();
            return true;
        }
        return false;
    }

    boolean checkForFlush()
    {
        Card prev = null;           // previous card
        for ( Card c : this.hand )
        {
            if ( prev != null ) {
                if ( !c.getSuit().equalsIgnoreCase( prev.getSuit() ) ) {
                    return false;
                }
            }
            prev = c;
        }
        return true;
    }
    
    boolean checkForStraight()
    {
        Card prev = null;           // previous card
        for ( Card c : this.hand )
        {
            if ( prev != null ) {
                if ( c.getNumericValue() != prev.getNumericValue() + 1 ) {
                    return false;
                }
            }
            prev = c;
        }
        return true;
    }

}

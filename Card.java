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
public class Card /* implements Comparable<Card> */
{
    private String value;
    private String suit;
    private int numericValue;
    
    public Card( String value, String suit )
    {
        this.value = value;
        this.suit = suit;
        switch ( value )
        {
            case "A":
                this.numericValue = 1;
                break;
            case "T":
                this.numericValue = 10;
                break;
            case "J":
                this.numericValue = 11;
                break;
            case "Q":
                this.numericValue = 12;
                break;
            case "K":
                this.numericValue = 13;
                break;
            default:
                this.numericValue = Integer.parseInt(value);
        }
    }
    
    public int getNumericValue()
    {
        return this.numericValue;
    }
    
    public String getValue() {
        return value;
    }
    
    public String getSuit() {
        return suit;
    }
    
    public String toString()
    {
        String s = "-" + value + suit;
        return s;
    }
    
//    public int compareTo( Card c ) 
//    {
//        // usually toString should not be used,
//        // instead one of the attributes or more in a comparator chain
//        //return toString().compareTo(o.toString());
//        return ( this.getNumericValue() < c.getNumericValue() );
//    }
    

}

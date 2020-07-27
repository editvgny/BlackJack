<?php


class CardFactory
{

    static public function createCardDeck($game)
    {
        $symbols = array('♠', '♦', '♥', '♣');
        $values = array(2, 3, 4, 5, 6, 7, 8, 9, 10, "J", "D", "K", "A");

        foreach ($symbols as $symbol) {
            foreach ($values as $value) {
                $game->addCardToDeck(new Card($symbol,$value));
            }
        }



        //        suits_symbols = ['♠', '♦', '♥', '♣']
//        │░░░░░░░░░

//        $unicodeChar1 = '\u2664';
//        $unicodeChar2 = '\u2661';
//        $unicodeChar3 = '\u2662';
//        $unicodeChar4 = '\u2667';
//        $card = new Card($unicodeChar1,2);
//        $card = new Card($unicodeChar1,3);
//        $card = new Card($unicodeChar4,4);
//        $card = new Card($unicodeChar2,5);
//        $card = new Card($unicodeChar1,6);
    }
}
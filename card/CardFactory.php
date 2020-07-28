<?php


class CardFactory
{

    static public function createCardDeck($game)
    {
        $symbols = array('♠', '♦', '♥', '♣');
        $values = array("2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K", "A");

        foreach ($symbols as $symbol) {
            foreach ($values as $value) {
                $game->addCardToDeck(new Card($symbol,$value));
            }
        }


    }

}
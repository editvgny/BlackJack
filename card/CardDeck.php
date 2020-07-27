<?php


class CardDeck
{
    private $deck = array();

    public function addCardToDeck($card){
        array_push($this->deck,$card);
    }

    public function getCards(){
        foreach ($this->deck as $card){
            $card->getCard();
        }
    }


    /**
     * @return array
     */
    public function getDeck(): array
    {
        return $this->deck;
    }
}
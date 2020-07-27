<?php


class Dealer
{
    private $name = "Dealer";
    private $cards = array();


    /**
     * @return null[]
     */
    public function getCards(): array
    {
        return $this->cards;
    }

    public function addCard($card){
        array_push($this->cards,$card);
    }
}
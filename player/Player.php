<?php


class Player
{
    private $name = "";
    private $cards = array();
    private $cash = 1000;


    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getCash(): int
    {
        return $this->cash;
    }

    /**
     * @return null[]
     */
    public function getCards()
    {
        return $this->cards;
    }

    public function addCard($card){
        array_push($this->cards,$card);
    }

    /**
     * @param int $cash
     */
    public function setCash(int $cash)
    {
        $this->cash = $this->cash+$cash;
    }

    public function deleteCard(){
        $this->cards = array();
    }


    public function playerPoint(){
        $point = 0;
        foreach ($this->cards as $card){
            $point += $card->getPoint();
        }
        return $point;
    }


}
<?php


class Dealer
{
    private $name = "Dealer";
    private $cards = array();
    private $hide = true;


    /**
     * @return null[]
     */
    public function getCards(): array
    {
        return $this->cards;
    }

    public function addCard($card)
    {
        array_push($this->cards, $card);
    }

    public function dealerPoint()
    {

        return PointCounter::bestPointCounter($this->cards);
    }


    public function deleteCard()
    {
        $this->cards = array();
    }

    public function isCardNeeded()
    {
        if ($this->dealerPoint() < 17) {
            return true;
        }
        return false;
    }


    public function isHide()
    {
        return $this->hide;

    }

    /**
     * @param bool $hide
     */
    public function setHide(bool $hide)
    {
        $this->hide = $hide;
    }
}
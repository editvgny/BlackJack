<?php


class Dealer {
    private $cards = array();
    private $hide = true;

    /**
     * @return null[]
     */
    public function getCards(): array {
        return $this->cards;
    }

    /**
     * @param $card
     */
    public function addCard($card) {
        array_push($this->cards, $card);
    }

    /**
     * @return float|int|mixed
     */
    public function dealerPoint() {
        return PointCounter::bestPointCounter($this->cards);
    }

    public function deleteCard() {
        $this->cards = array();
    }

    public function isCardNeeded(): bool {
        if ($this->dealerPoint() < 17) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function isHide(): bool {
        return $this->hide;
    }

    /**
     * @param bool $hide
     */
    public function setHide(bool $hide) {
        $this->hide = $hide;
    }
}
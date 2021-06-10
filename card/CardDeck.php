<?php


class CardDeck {
    private $deck = array();

    /**
     * @param $card
     */
    public function addCardToDeck($card) {
        array_push($this->deck, $card);
    }

    public function getCards() {
        foreach ($this->deck as $card) {
            $card->getCard();
        }
    }

    /**
     * @param $index
     * @return mixed
     */
    public function dealCard($index) {
        $randomCard = $this->deck[$index];
        unset($this->deck[$index]);
        return $randomCard;
    }

    /**
     * @return array
     */
    public function getDeck(): array {
        return $this->deck;
    }

    /**
     * @return int
     */
    public function getNumberOfCardsInDeck(): int {
        return count($this->deck);
    }
}
<?php


class Board {
    /**
     * @param $dealer
     * @param $player
     * @param $deck
     */
    public function printTable($dealer, $player, $deck) {
        $playerName = $player->getName();
        $playerCards = $player->getCards();
        $playerCredit = $player->getCash();
        $dealerCards = $dealer->getCards();
        $this->printHeader($playerName, $playerCredit, $deck);
        $this->printDealerCards($dealerCards, $dealer);
        $this->printDealersPoint($dealerCards, $dealer);
        $this->printDeck();
        $this->printPlayerCards($playerCards);
        $this->printPlayersPoint($player);
    }

    /**
     * @param $name
     * @param $playerCash
     * @param $deck
     */
    public function printHeader($name, $playerCash, $deck) {
        echo "\n                                                     Player: ";
        echo $name . "      Credit: " . $playerCash;
        echo "                                               Cards left in deck: ";
        echo $deck->getNumberOfCardsInDeck() . "\n";
        $this->newLine(2);
    }

    /**
     * @param $dealerCards
     * @param $dealer
     */
    public function printDealersPoint($dealerCards, $dealer) {
        if ($dealer->isHide() && count($dealerCards) > 0) {
            $point = $dealerCards[1]->getPoint();
        } else {
            $point = $dealer->dealerPoint();
        }
        $this->newLine(1);
        echo "Dealer's cards value: " . $point;
        $this->newLine(2);
    }

    /**
     * @param $player
     */
    public function printPlayersPoint($player) {
        $this->newLine(1);
        echo "Player's cards value: " . $player->playerPoint();
        $this->newLine(2);
    }

    /**
     * @param $dealerCards
     * @param $dealer
     */
    public function printDealerCards($dealerCards, $dealer) {
        echo "Dealer`s cards: ";
        $this->newLine(2);
        if ($dealer->isHide()) {
            $cardSymbol = "░";
        } else {
            $cardSymbol = " ";
        }
        for ($i = 0; $i < count($dealerCards) - 1; $i++) {
            echo "┌───";
        }
        echo "┌──────────┐";
        echo "\n";
        if ($dealer->isHide()) {
            echo "|" . $cardSymbol . $cardSymbol . $cardSymbol;
            for ($i = 1; $i < count($dealerCards); $i++) {
                if ($dealerCards[$i]->getValue() == 10) {
                    $this->printCardUpperSymbol($dealerCards[$i]);
                } else {
                    $this->printCardUpperSymbol($dealerCards[$i]);
                    echo " ";
                }
            }
        } else {
            for ($i = 0; $i < count($dealerCards); $i++) {
                if ($dealerCards[$i]->getValue() == 10) {
                    $this->printCardUpperSymbol($dealerCards[$i]);

                } else {
                    $this->printCardUpperSymbol($dealerCards[$i]);
                    echo " ";
                }
            }
        }
        echo "       |";
        $i = $this->printDealerCardSides($cardSymbol, $dealerCards);
        $this->printCardMiddleSymbol($dealerCards[$i]);
        $i = $this->printDealerCardSides($cardSymbol, $dealerCards);
        if (end($dealerCards)->getValue() == 10) {
            $this->printCardLowerSymbol(end($dealerCards));
            echo "|";
        } else {
            $this->printCardLowerSymbol(end($dealerCards));
            echo " |";
        }
        echo "\n";
        for ($i = 0; $i < count($dealerCards) - 1; $i++) {
            echo "└───";
        }
        echo "└──────────┘";
    }

    /**
     * @param $playerCards
     */
    public function printPlayerCards($playerCards) {
        echo "Player's cards: ";
        echo "\n";
        echo "\n";
        for ($i = 0; $i < count($playerCards) - 1; $i++) {
            echo "┌───";
        }
        echo "┌──────────┐";
        echo "\n";
        for ($i = 0; $i < count($playerCards); $i++) {
            if ($playerCards[$i]->getValue() == 10) {
                $this->printCardUpperSymbol($playerCards[$i]);
            } else {
                $this->printCardUpperSymbol($playerCards[$i]);
                echo " ";
            }
        }
        echo "       |";
        $i = $this->printPlayerCardSides($playerCards);
        $this->printCardMiddleSymbol($playerCards[$i]);
        $i = $this->printPlayerCardSides($playerCards);
        if ($playerCards[$i]->getValue() == 10) {
            $this->printCardLowerSymbol($playerCards[$i]);
        } else {
            $this->printCardLowerSymbol($playerCards[$i]);
            echo " |";
        }
        echo "\n";
        for ($i = 0; $i < count($playerCards) - 1; $i++) {
            echo "└───";
        }
        echo "└──────────┘";
    }

    public function printDeck() {
        $faceDownPatternHalfMinusOne = "░░░";
        $faceDownPatternHalf = "░░░░";
        $faceDownPattern = "░░░░░░░░";
        $spaceInsideCard = " " . $faceDownPattern . $faceDownPattern . " ";
        $spaceInsideCardHalf = " " . $faceDownPatternHalf . "Black" . "\e[01;31mJack\e[0m" . $faceDownPatternHalfMinusOne . " ";
        $space = "                 ";
        echo $space . "┌──────────────────┐\n" . $space . "|" . $spaceInsideCard . "|\n" . $space . "|" . $spaceInsideCardHalf . "|\n" . $space . "|" . $spaceInsideCard . "|\n" . $space . "└──────────────────┘";
        echo "\n";
        echo "\n";
    }

    /**
     * @param $card
     */
    public function printCardMiddleSymbol($card) {
        switch ($card->getForm()) {
            case '♥':
            case "♦":
                echo "|    " . "\e[01;31m" . $card->getForm() . "\e[0m" . "     |";
                break;
            default:
                echo "|    " . $card->getForm() . "     |";
                break;
        }
    }

    /**
     * @param $card
     */
    public function printCardUpperSymbol($card) {
        switch ($card->getForm()) {
            case '♥':
            case "♦":
                echo "|" . "\e[01;31m" . $card->getValue() . $card->getForm() . "\e[0m";
                break;
            default:
                echo "|" . $card->getValue() . $card->getForm();
                break;
        }
    }

    /**
     * @param $card
     */
    public function printCardLowerSymbol($card) {
        switch ($card->getForm()) {
            case '♥':
            case "♦":
                echo "|       " . "\e[01;31m" . $card->getValue() . $card->getForm() . "\e[0m";
                break;
            default:
                echo "|       " . $card->getValue() . $card->getForm();
                break;
        }
    }

    /**
     * @param $num
     */
    public function newLine($num) {
        for ($i = 0; $i < $num; $i++) {
            echo "\n";
        }
        echo "\n";
    }

    /**
     * @param string $cardSymbol
     * @param $dealerCards
     * @return int
     */
    public function printDealerCardSides(string $cardSymbol, $dealerCards): int {
        echo "\n";
        echo "|" . $cardSymbol . $cardSymbol . $cardSymbol;
        for ($i = 1; $i < count($dealerCards) - 1; $i++) {
            echo "|   ";
        }
        echo "|          |";

        echo "\n";
        echo "|" . $cardSymbol . $cardSymbol . $cardSymbol;

        for ($i = 1; $i < count($dealerCards) - 1; $i++) {
            echo "|   ";
        }
        return $i;
    }

    /**
     * @param $playerCards
     * @return int
     */
    public function printPlayerCardSides($playerCards): int {
        echo "\n";
        for ($i = 0; $i < count($playerCards) - 1; $i++) {
            echo "|   ";
        }
        echo "|          |";
        echo "\n";
        for ($i = 0; $i < count($playerCards) - 1; $i++) {
            echo "|   ";
        }
        return $i;
    }
}
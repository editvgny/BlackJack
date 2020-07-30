<?php


class Table
{
    public function printTable($dealer, $player, $deck)
    {
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

    public function printHeader($name, $playerCash, $deck)
    {
        echo "\n                                                     Player: ";
        echo $name . "      Credit: " . $playerCash;
        echo "                                               Cards left in deck: ";
        echo $deck->getNumberOfCardsInDeck() . "\n";
        $this->newLine(2);
    }


    public function printDealersPoint($dealerCards, $dealer)
    {
        $point = 0;
        if ($dealer->isHide() && count($dealerCards) > 0) {
            $point = $dealerCards[1]->getPoint();
        } else {
            $point = $dealer->dealerPoint();
        }
        $this->newLine(1);
        echo "Dealer's cards value: " . $point;
        $this->newLine(2);

    }

    public function printPlayersPoint($player)
    {
        $this->newLine(1);
        echo "Player's cards value: " . $player->playerPoint();
        $this->newLine(2);
    }


    public function printDealerCards($dealerCards, $dealer)
    {
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
                    echo" ";


                }
            }
        }
        echo "       |";
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
        $this->printCardMiddleSymbol($dealerCards[$i]);
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





    public function printPlayerCards($playerCards)
    {


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
        echo "\n";
        for ($i = 0; $i < count($playerCards) - 1; $i++) {
            echo "|   ";
        }
        echo "|          |";

        echo "\n";
        for ($i = 0; $i < count($playerCards) - 1; $i++) {
            echo "|   ";
        }
        $this->printCardMiddleSymbol($playerCards[$i]);

        echo "\n";
        for ($i = 0; $i < count($playerCards) - 1; $i++) {
            echo "|   ";
        }
        echo "|          |";

        echo "\n";
        for ($i = 0; $i < count($playerCards) - 1; $i++) {
            echo "|   ";
        }
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

























    public function printDeck()

    {
        $faceDownPatternHalfMinusOne = "░░░";
        $faceDownPatternHalf = "░░░░";
        $faceDownPattern = "░░░░░░░░";
        $spaceInsideCard = " " . $faceDownPattern . $faceDownPattern . " ";
        $spaceInsideCardHalf = " " . $faceDownPatternHalf . "Black" . "\e[01;31mJack\e[0m" . $faceDownPatternHalfMinusOne . " ";
        $space = "                 ";
        echo $space . "┌──────────────────┐\n" . $space . "|" . $spaceInsideCard . "|\n" . $space . "|" . $spaceInsideCardHalf . "|\n"
            . $space . "|" . $spaceInsideCard . "|\n" . $space . "└──────────────────┘";
        echo "\n";
        echo "\n";
    }
    public function printCardMiddleSymbol($card)
    {
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

    public function printCardUpperSymbol($card)
    {
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

    public function printCardLowerSymbol($card)
    {
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

    public function newLine($num)
    {
        for ($i = 0; $i < $num; $i++) {
            echo "\n";
        }
        echo "\n";
    }
}
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
                    $this->printCardFirstSymbol($dealerCards[$i]);
                } else {
                    if ($dealerCards[$i]->getForm() == '♦' || $dealerCards[$i]->getForm() == '♥') {
                        echo "|" . "\e[01;31m" . $dealerCards[$i]->getValue() . $dealerCards[$i]->getForm() . "\e[0m" . " ";
                    } else {
                        echo "|" . $dealerCards[$i]->getValue() . $dealerCards[$i]->getForm() . " ";
                    }
                }
            }
        } else {
            for ($i = 0; $i < count($dealerCards); $i++) {
                if ($dealerCards[$i]->getValue() == 10) {
                    if ($dealerCards[$i]->getForm() == '♦' || $dealerCards[$i]->getForm() == '♥') {
                        echo "|" . "\e[01;31m" . $dealerCards[$i]->getValue() . $dealerCards[$i]->getForm() . "\e[0m";
                    } else {
                        echo "|" . $dealerCards[$i]->getValue() . $dealerCards[$i]->getForm();
                    };
                } else {
                    if ($dealerCards[$i]->getForm() == '♦' || $dealerCards[$i]->getForm() == '♥') {
                        echo "|" . "\e[01;31m" . $dealerCards[$i]->getValue() . $dealerCards[$i]->getForm() . "\e[0m" . " ";
                    } else {
                        echo "|" . $dealerCards[$i]->getValue() . $dealerCards[$i]->getForm() . " ";
                    }
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
        if ($dealerCards[$i]->getForm() == '♦' || $dealerCards[$i]->getForm() == '♥') {
            echo "|    " . "\e[01;31m" . end($dealerCards)->getForm() . "\e[0m" . "     |";
        } else {
            echo "|    " . end($dealerCards)->getForm() . "     |";
        }
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
            if ($dealerCards[$i]->getForm() == '♦' || $dealerCards[$i]->getForm() == '♥') {
                echo "|       " . "\e[01;31m" . end($dealerCards)->getValue() . end($dealerCards)->getForm() . "\e[0m" . "|";
            } else {
                echo "|       " . end($dealerCards)->getValue() . end($dealerCards)->getForm() . "|";
            }
        } else {
            if ($dealerCards[$i]->getForm() == '♦' || $dealerCards[$i]->getForm() == '♥') {
                echo "|       " . "\e[01;31m" . end($dealerCards)->getValue() . end($dealerCards)->getForm() . "\e[0m" . " |";
            } else {
                echo "|       " . end($dealerCards)->getValue() . end($dealerCards)->getForm() . " |";
            }
        }

        echo "\n";

        for ($i = 0; $i < count($dealerCards) - 1; $i++) {
            echo "└───";
        }

        echo "└──────────┘";
    }




    public function printCardFirstSymbol($card){
        switch($card->getForm()){
            case '♥':
            case "♦":
                echo "|" . "\e[01;31m" . $card->getValue() . $card->getForm() . "\e[0m";
            break;
        }
    }

    public function printCardLastSymbol($symbol,$card){
        switch($symbol){
            case '♥':
            case "♦":
                echo "|       " . $card->getValue() . $card->getForm() . " |";
                break;
        }
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
                if ($playerCards[$i]->getForm() == '♦' || $playerCards[$i]->getForm() == '♥') {
                    echo "|" . "\e[01;31m" . $playerCards[$i]->getValue() . $playerCards[$i]->getForm() . "\e[0m";
                } else {
                    echo "|" . $playerCards[$i]->getValue() . $playerCards[$i]->getForm();
                };
            } else {
                if ($playerCards[$i]->getForm() == '♦' || $playerCards[$i]->getForm() == '♥') {
                    echo "|" . "\e[01;31m" . $playerCards[$i]->getValue() . $playerCards[$i]->getForm() . "\e[0m" . " ";
                } else {
                    echo "|" . $playerCards[$i]->getValue() . $playerCards[$i]->getForm() . " ";
                }
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
        if ($playerCards[$i]->getForm() == '♦' || $playerCards[$i]->getForm() == '♥') {
            echo "|    " . "\e[01;31m" . end($playerCards)->getForm() . "\e[0m" . "     |";
        } else {
            echo "|    " . end($playerCards)->getForm() . "     |";
        }
        echo "\n";
        for ($i = 0; $i < count($playerCards) - 1; $i++) {
            echo "|   ";
        }
        echo "|          |";

        echo "\n";
        for ($i = 0; $i < count($playerCards) - 1; $i++) {
            echo "|   ";
        }
        if (end($playerCards)->getValue() == 10) {
            if ($playerCards[$i]->getForm() == '♦' || $playerCards[$i]->getForm() == '♥') {
                echo "|       " . "\e[01;31m" . end($playerCards)->getValue() . end($playerCards)->getForm() . "\e[0m" . "|";
            } else {
                echo "|       " . end($playerCards)->getValue() . end($playerCards)->getForm() . "|";
            }
        } else {
            if ($playerCards[$i]->getForm() == '♦' || $playerCards[$i]->getForm() == '♥') {
                echo "|       " . "\e[01;31m" . end($playerCards)->getValue() . end($playerCards)->getForm() . "\e[0m" . " |";
            } else {
                echo "|       " . end($playerCards)->getValue() . end($playerCards)->getForm() . " |";
            }
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


    public function newLine($num)
    {
        for ($i = 0; $i < $num; $i++) {
            echo "\n";
        }
        echo "\n";
    }
}
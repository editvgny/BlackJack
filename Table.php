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
        echo $deck->getNumberOfCardsInDeck()."\n";
        $this->newLine(2);
    }


    public function newLine($num){
        for($i = 0; $i < $num; $i++){
            echo "\n";
        }
        echo "\n";
    }

    public function printDealersPoint($dealerCards, $dealer)
    {
        $point = 0;
        if ($dealer->isHide() && count($dealerCards) > 0) {
            $point = $dealerCards[1]->getPoint();
        } else {
            foreach ($dealerCards as $card) {
                $point += $card->getPoint();
            }
        }
        echo "\n";

        echo "Dealer's cards value: " . $point;
        echo "\n";
        echo "\n";

    }

    public function printPlayersPoint($player)
    {

        echo "\n";

        echo "Player's cards value: " . $player->playerPoint();
        echo "\n";
        echo "\n";

    }


    public function printDealerCards($dealerCards, $dealer)
    {
        echo "Dealer`s cards: ";
        echo "\n";
        echo "\n";


        if ($dealer->isHide()) {
            $firstCard = "░";
        } else {
            $firstCard = " ";
        }
        for ($i = 0; $i < count($dealerCards) - 1; $i++) {
            echo "┌───";
        }
        echo "┌──────────┐";

        echo "\n";
        if ($dealer->isHide()) {
            echo "|" . $firstCard . $firstCard . $firstCard;
            for ($i = 1; $i < count($dealerCards); $i++) {
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
        echo "|" . $firstCard . $firstCard . $firstCard;
        for ($i = 1; $i < count($dealerCards) - 1; $i++) {
            echo "|   ";
        }
        echo "|          |";

        echo "\n";
        echo "|" . $firstCard . $firstCard . $firstCard;

        for ($i = 1; $i < count($dealerCards) - 1; $i++) {
            echo "|   ";
        }
        if ($dealerCards[$i]->getForm() == '♦' || $dealerCards[$i]->getForm() == '♥') {
            echo "|    " . "\e[01;31m" . end($dealerCards)->getForm() . "\e[0m" . "     |";
        } else {
            echo "|    " . end($dealerCards)->getForm() . "     |";
        }
        echo "\n";
        echo "|" . $firstCard . $firstCard . $firstCard;

        for ($i = 1; $i < count($dealerCards) - 1; $i++) {
            echo "|   ";
        }
        echo "|          |";

        echo "\n";
        echo "|" . $firstCard . $firstCard . $firstCard;

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
}
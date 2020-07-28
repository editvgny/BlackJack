<?php


class Table
{
    public function printTable($name, $playerCash, $dealerCards,$playerCards){
        $this->printHeader($name, $playerCash);
        $this->printDealerCards($dealerCards);
        $this->printDealersPoint($dealerCards);
        $this->printDeck();
        $this->printPlayerCards($playerCards);
        $this->printPlayersPoint($playerCards);

    }

    public function printHeader($name, $playerCash){
        echo "                                                       Hello ".$name."      Your cash: ".$playerCash."\n";
        echo "\n";
        echo "\n";

    }
    public function printDealersPoint($dealerCards){
        $point = 0;
        foreach ($dealerCards as $card){
            $point += $card->getPoint();
        }
        echo "\n";

        echo "Dealers creadit: ".$point;
        echo "\n";
        echo "\n";

    }

    public function printPlayersPoint($playerCards){
        $point = 0;
        foreach ($playerCards as $card){
            $point += $card->getPoint();
        }
        echo "\n";

        echo "Player's creadit: ".$point;
        echo "\n";
        echo "\n";

    }


    public function printDealerCards($dealerCards){


        echo "Dealer`s cards: ";
        echo "\n";
        echo "\n";

        for ($i = 0; $i < count($dealerCards)-1;$i++){
            echo "┌───";
        }
        echo "┌──────────┐";

        echo "\n";

        for ($i = 0; $i < count($dealerCards);$i++){
            if($dealerCards[$i]->getValue() == 10) {
                if ($dealerCards[$i]->getForm() == '♦' || $dealerCards[$i]->getForm() == '♥') {
                    echo "|" . "\e[01;31m" . $dealerCards[$i]->getValue() . $dealerCards[$i]->getForm() . "\e[0m";
                } else {
                    echo "|" . $dealerCards[$i]->getValue() . $dealerCards[$i]->getForm();
                };
            }else {
                if ($dealerCards[$i]->getForm() == '♦' || $dealerCards[$i]->getForm() == '♥') {
                    echo "|" . "\e[01;31m". $dealerCards[$i]->getValue() . $dealerCards[$i]->getForm(). "\e[0m" . " ";
                } else {
                    echo "|" . $dealerCards[$i]->getValue() . $dealerCards[$i]->getForm() . " ";
                }
            }
        }
        echo "       |";
        echo "\n";
        for ($i = 0; $i < count($dealerCards)-1;$i++){
            echo "|   ";
        }
        echo "|          |";

        echo "\n";
        for ($i = 0; $i < count($dealerCards)-1;$i++){
            echo "|   ";
        }
        if ($dealerCards[$i]->getForm() == '♦' || $dealerCards[$i]->getForm() == '♥'){
            echo "|    " . "\e[01;31m". end($dealerCards)->getForm() . "\e[0m". "     |";
        }else {
            echo "|    " . end($dealerCards)->getForm() . "     |";
        }
        echo "\n";
        for ($i = 0; $i < count($dealerCards)-1;$i++){
            echo "|   ";
        }
        echo "|          |";

        echo "\n";
        for ($i = 0; $i < count($dealerCards)-1;$i++){
            echo "|   ";
        }
        if(end($dealerCards)->getValue() == 10){
            if ($dealerCards[$i]->getForm() == '♦' || $dealerCards[$i]->getForm() == '♥'){
                echo "|       " ."\e[01;31m".  end($dealerCards)->getValue() . end($dealerCards)->getForm() . "\e[0m". "|";
            }else {
                echo "|       " . end($dealerCards)->getValue() . end($dealerCards)->getForm() . "|";
            }
        }else{
            if ($dealerCards[$i]->getForm() == '♦' || $dealerCards[$i]->getForm() == '♥') {
                echo "|       " ."\e[01;31m". end($dealerCards)->getValue() . end($dealerCards)->getForm() . "\e[0m". " |";
            }else{
                echo "|       " . end($dealerCards)->getValue() . end($dealerCards)->getForm() . " |";
            }
        }

        echo "\n";

        for ($i = 0; $i < count($dealerCards)-1;$i++){
            echo "└───";
        }

        echo"└──────────┘";
    }
    public function printPlayerCards($playerCards){


        echo "Player's cards: ";
        echo "\n";
        echo "\n";

        for ($i = 0; $i < count($playerCards)-1;$i++){
            echo "┌───";
        }
        echo "┌──────────┐";

        echo "\n";

        for ($i = 0; $i < count($playerCards);$i++){
            if($playerCards[$i]->getValue() == 10) {
                if ($playerCards[$i]->getForm() == '♦' || $playerCards[$i]->getForm() == '♥') {
                    echo "|" . "\e[01;31m" . $playerCards[$i]->getValue() . $playerCards[$i]->getForm() . "\e[0m";
                } else {
                    echo "|" . $playerCards[$i]->getValue() . $playerCards[$i]->getForm();
                };
            }else {
                if ($playerCards[$i]->getForm() == '♦' || $playerCards[$i]->getForm() == '♥') {
                    echo "|" . "\e[01;31m". $playerCards[$i]->getValue() . $playerCards[$i]->getForm(). "\e[0m" . " ";
                } else {
                    echo "|" . $playerCards[$i]->getValue() . $playerCards[$i]->getForm() . " ";
                }
            }
        }
        echo "       |";
        echo "\n";
        for ($i = 0; $i < count($playerCards)-1;$i++){
            echo "|   ";
        }
        echo "|          |";

        echo "\n";
        for ($i = 0; $i < count($playerCards)-1;$i++){
            echo "|   ";
        }
        if ($playerCards[$i]->getForm() == '♦' || $playerCards[$i]->getForm() == '♥'){
            echo "|    " . "\e[01;31m". end($playerCards)->getForm() . "\e[0m". "     |";
        }else {
            echo "|    " . end($playerCards)->getForm() . "     |";
        }
        echo "\n";
        for ($i = 0; $i < count($playerCards)-1;$i++){
            echo "|   ";
        }
        echo "|          |";

        echo "\n";
        for ($i = 0; $i < count($playerCards)-1;$i++){
            echo "|   ";
        }
        if(end($playerCards)->getValue() == 10){
            if ($playerCards[$i]->getForm() == '♦' || $playerCards[$i]->getForm() == '♥'){
                echo "|       " ."\e[01;31m".  end($playerCards)->getValue() . end($playerCards)->getForm() . "\e[0m". "|";
            }else {
                echo "|       " . end($playerCards)->getValue() . end($playerCards)->getForm() . "|";
            }
        }else{
            if ($playerCards[$i]->getForm() == '♦' || $playerCards[$i]->getForm() == '♥') {
                echo "|       " ."\e[01;31m". end($playerCards)->getValue() . end($playerCards)->getForm() . "\e[0m". " |";
            }else{
                echo "|       " . end($playerCards)->getValue() . end($playerCards)->getForm() . " |";
            }
        }

        echo "\n";

        for ($i = 0; $i < count($playerCards)-1;$i++){
            echo "└───";
        }

        echo"└──────────┘";
    }

    public function printDeck()

    {   $faceDownPatternHalfMinusOne = "░░░";
        $faceDownPatternHalf = "░░░░";
        $faceDownPattern = "░░░░░░░░";
        $spaceInsideCard = " ".$faceDownPattern.$faceDownPattern." ";
        $spaceInsideCardHalf = " ".$faceDownPatternHalf."Black"."\e[01;31mJack\e[0m".$faceDownPatternHalfMinusOne." ";
        $space= "                 ";
        echo $space."┌──────────────────┐\n".$space."|".$spaceInsideCard."|\n".$space."|".$spaceInsideCardHalf."|\n"
            .$space."|".$spaceInsideCard."|\n".$space."└──────────────────┘";
        echo "\n";
        echo "\n";



    }
}
<?php


class Table
{
    public function printTable($name, $playerCash, $dealerCards){
        $this->printHeader($name, $playerCash);
        $this->printDealerCards($dealerCards);
        $this->printDealersPoint($dealerCards);

    }

    public function printHeader($name, $playerCash){
        echo "Hello ".$name."      Your cash: ".$playerCash."\n";
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
            if($dealerCards[$i]->getValue() == 10){
                echo "|".$dealerCards[$i]->getValue().$dealerCards[$i]->getForm();

            }else{
                echo "|".$dealerCards[$i]->getValue().$dealerCards[$i]->getForm()." ";

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
        echo "|    ".end($dealerCards)->getForm()."     |";
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
            echo "|       ".end($dealerCards)->getValue().end($dealerCards)->getForm()."|";

        }else{
            echo "|       ".end($dealerCards)->getValue().end($dealerCards)->getForm()." |";

        }

        echo "\n";

        for ($i = 0; $i < count($dealerCards)-1;$i++){
            echo "└───";
        }

        echo"└──────────┘";
    }
}
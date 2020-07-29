<?php
require "Logo.php";

class Game
{

    private $cardDeck;
    private $player;
    private $dealer;
    private $table;


    public function showWelcomePage()
    {
        Logo::printLogo();
        echo "Enter you name: ";
        $playerName = readline("Enter your name: ");
        $this->player->setName($playerName);
        $this->table->printHeader($playerName, $this->player->getCash());
    }

    public function __construct()
    {
        $this->cardDeck = new CardDeck();
        $this->player = new Player();
        $this->dealer = new Dealer();
        $this->table = new Table();
    }

    public function prepareGame()
    {
        CardFactory::createCardDeck($this->cardDeck);

        //TODO kartyak keverese
//        for ($i=0;$i<15;$i++){
//            $this->dealer->addCard($this->cardDeck->getDeck()[$i]);
//        }
//
//        for ($i=0;$i<15;$i++){
//            $this->player->addCard($this->cardDeck->getDeck()[$i]);
//        }
    }

    public function playGame()
    {
        $turn = true;
        while ($turn) {
            $this->dealer->setHide(true);

            //TODO Tetadas
            echo "\nWhat is your bet: ";
            $bet = readline();
            $this->handleCash($bet);

            //TODO elso 2-2 lap kiosztasa
            $this->dealCard("player");
            $this->dealCard("dealer");
            $this->dealCard("player");
            $this->dealCard("dealer");
            $this->table->printTable($this->player->getName(), $this->player->getCash(), $this->dealer->getCards(), $this->player->getCards(), $this->dealer);

            //TODO input ker/megall  - kell a validacio
            echo "\nWhat do you want to do (STAND - S, HIT - H) ?  ";
            $action = readline();
            while ($action == "H") {
                $this->dealCard("player");
                $this->table->printTable($this->player->getName(), $this->player->getCash(), $this->dealer->getCards(), $this->player->getCards(), $this->dealer);
                if ($this->endOfTurn()) {
                    $action = "end";
                } else {
                    echo "\nWhat do you want to do (STAND - S, HIT - H) ?  ";
                    $action = readline();
                }
            }
            if ($action != "end") {
                $this->dealer->setHide(false);
                while ($this->dealer->isCardNeeded()) {
                    echo $this->dealer->dealerPoint();
                    $this->dealCard("dealer");
                    $this->table->printTable($this->player->getName(), $this->player->getCash(), $this->dealer->getCards(), $this->player->getCards(), $this->dealer);
                }
            }

            switch ($this->winChecker()) {
                case "player":
                    $this->playerWin($bet);
                    break;
                case "dealer":
                    echo "\nDealer won!";
                    break;
                case "draw":
                    $this->draw($bet);
                    break;
            }
            //TODO dealer es player kartyak torlese
            $this->dealer->deleteCard();
            $this->player->deleteCard();
            //TODO pakli ujratoltese ha x alatt van a kartyak szama

        }
    }

    public function dealCard($who)
    {
        $randomCard = $this->cardDeck->dealCard(array_rand($this->cardDeck->getDeck()));
        switch ($who) {
            case "player":
                $this->player->addCard($randomCard);
                break;
            case "dealer":
                $this->dealer->addCard($randomCard);
                break;
        }
    }

    public function handleCash($bet)
    {
        $this->player->setCash($bet * (-1));
    }

    public function winChecker()
    {
        if ($this->player->playerPoint() > 21 || 21 - $this->player->playerPoint() > 21 - $this->dealer->dealerPoint() && $this->dealer->dealerPoint() < 22) {
            return "dealer";
        } elseif ($this->player->playerPoint() == $this->dealer->dealerPoint()) {
            return "draw";
        } elseif (21 - $this->player->playerPoint() < 21 - $this->dealer->dealerPoint() || $this->dealer->dealerPoint() > 21) {
            return "player";
        } else {
            return "dont Know";
        }
    }

    public function playerWin($bet)
    {
        $this->player->setCash($bet * 2);
        echo "\nYou won!";
    }

    public function draw($bet)
    {
        $this->player->setCash($bet);
        echo "\nIt's a draw!";
    }


    public function endOfTurn()
    {
        if ($this->player->playerPoint() > 21) {
            return true;
        }
        return false;
    }


}












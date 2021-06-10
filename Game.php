<?php
require "Logo.php";

class Game {
    private $cardDeck;
    private $player;
    private $dealer;
    private $table;

    /**
     * Game constructor.
     */
    public function __construct() {
        $this->cardDeck = new CardDeck();
        $this->player = new Player();
        $this->dealer = new Dealer();
        $this->table = new Board();
    }

    public function showWelcomePage() {
        Logo::printLogo();
        echo "Enter you name: ";
        $playerName = readline("Enter your name: ");
        $this->player->setName($playerName);
    }

    public function prepareGame() {
        CardFactory::createCardDeck($this->cardDeck);
    }

    public function playGame() {
        $turn = true;
        while ($turn) {
            $this->dealer->setHide(true);
            $bet = $this->askForBet();
            $this->handleCash($bet);
            $this->dealFirstTurnCards();
            $action = $this->askForAction();
            while ($action != "H" && $action != "S") {
                $action = $this->askForAction();
            }
            $action = $this->handleHitAction($action);
            $this->handleDealersTurn($action);
            $this->displayWinResult($bet);
            $this->dealer->deleteCard();
            $this->player->deleteCard();
        }
    }

    /**
     * @param $who
     */
    public function dealCard($who) {
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

    /**
     * @param $bet
     */
    public function handleCash($bet) {
        $this->player->setCash($bet * (-1));
    }

    /**
     * @return string
     */
    public function winChecker(): string {
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

    /**
     * @param $bet
     */
    public function playerWin($bet) {
        $this->player->setCash($bet * 2);
        echo "\nYou won!";
    }

    public function draw($bet) {
        $this->player->setCash($bet);
        echo "\nIt's a draw!";
    }

    public function endOfTurn(): bool {
        if ($this->player->playerPoint() > 21) {
            return true;
        }
        return false;
    }

    /**
     * @return int|string
     */
    public function askForBet() {
        echo "\nYou have " . $this->player->getCash() . " credit. What is your bet: ";
        $bet = readline();
        while ($bet > $this->player->getCash() || is_numeric($bet) == false) {
            if ($bet > $this->player->getCash()) {
                echo "\nYou dont have enough credit! You have " . $this->player->getCash() . " credit. \n What is your bet: ";
            } else {
                echo "\nYou should type numeric characters! \n What is your bet: ";
            }
            $bet = readline();
        }
        return $bet;
    }

    public function dealFirstTurnCards() {
        for ($i = 0; $i < 2; $i++) {
            $this->dealCard("player");
            $this->dealCard("dealer");
        }
        $this->table->printTable($this->dealer, $this->player, $this->cardDeck);
    }

    /**
     * @return false|string
     */
    public function askForAction() {
        echo "\nWhat do you want to do (STAND - S, HIT - H) ?  ";
        return readline();
    }

    /**
     * @param $action
     * @return false|mixed|string
     */
    public function handleHitAction($action) {
        while ($action == "H") {
            sleep(1);
            $this->dealCard("player");
            $this->table->printTable($this->dealer, $this->player, $this->cardDeck);
            if ($this->endOfTurn()) {
                $action = "end";
            } else {
                $action = $this->askForAction();
                while ($action != "H" && $action != "S") {
                    $action = $this->askForAction();
                }
            }
        }
        return $action;
    }

    /**
     * @param $action
     */
    public function handleDealersTurn($action) {
        if ($action != "end") {
            $this->dealer->setHide(false);
            $this->table->printTable($this->dealer, $this->player, $this->cardDeck);
            while ($this->dealer->isCardNeeded()) {
                sleep(1.5);
                $this->dealCard("dealer");
                $this->table->printTable($this->dealer, $this->player, $this->cardDeck);
            }
        }
    }

    /**
     * @param $bet
     */
    public function displayWinResult($bet) {
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
    }
}












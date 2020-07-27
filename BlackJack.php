<?php
require "card/Card.php";
require "Game.php";
require "card/CardDeck.php";
require "card/CardFactory.php";
require "player/Player.php";
require "player/Dealer.php";
require "Table.php";

class BlackJack
{
    public function start()
    {
        $game = new Game();
        $game->showWelcomePage();
        $game->prepareGame();
        $game->playGame();
    }
}

$blackJack = new BlackJack();
$blackJack->start();

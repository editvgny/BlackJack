<?php

class Game{

    private $cardDeck = array();
    private $player;
    private $dealer;

    //kirakja az udvozlo kepet
    //egy inputra halad tovabb
    public function showWelcomePage(){
        //inputtal be kell kerni a jatekos nevet es elmenteni a playerba
        $this->player->setName("input");

    }

    public function __construct()
    {
        $this->cardDeck =  new CardDeck();
        $this->player = new Player();
        $this->dealer = new Dealer();
    }

    public function prepareGame(){
        CardFactory::createCardDeck($this);

    }


    public function playGame()
    {
//        $this->cardDeck->getCards();

    }


    public function addCardToDeck($card){
        $this->cardDeck->addCardToDeck($card);
    }


}












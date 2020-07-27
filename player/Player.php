<?php


class Player
{
    private $name = "";
    private $cards = array(null,null,null,null,null,null,null,null,null);
    private $cash = 1000;


    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }
}
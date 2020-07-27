<?php


class Player
{
    private $name = "";
    private $cards = array();
    private $cash = 1000;


    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
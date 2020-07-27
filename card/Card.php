<?php


class Card
{
    private $form;
    private $value;
    private $design=array();

    public function __construct($form, $value)
    {
        $this->form = $form;
        $this->value=$value;
        array_push($this->design,'┌──────────┐');
        array_push($this->design,'│ '."\033[31m".$value.'♠'."\033[37m".'       │');
        array_push($this->design,'│          │');
        array_push($this->design,'│    '."\033[31m".json_decode('"'.$form.'"')."\033[37m".'     │');
        array_push($this->design,'│          │');
        array_push($this->design,'│       '."\033[31m".$value.json_decode('"'.$form.'"')."\033[37m".' │');
        array_push($this->design,'└──────────┘');


//        foreach ($this->design as $row){
//            echo $row."\n";
//        }
    }


    public function getCard(){
        echo $this->form."-".$this->value."\n";
    }
}
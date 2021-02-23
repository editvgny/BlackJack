<?php


class Card
{
    private $form;
    private $value;
    private $point;
    private $design=array();


    public function __construct($form, $value)
    {
        $this->form = $form;
        $this->value = $value;
        if($value == "J" || $value == "Q" || $value == "K" ){
            $this->point = 10;
        } elseIf($value == "A"){
            $this->point = 11;
        }else{
            $this->point = $value;
        }


//        array_push($this->design,'┌──────────┐');
//        array_push($this->design,'│ '."\033[31m".$value.'♠'."\033[37m".'       │');
//        array_push($this->design,'│          │');
//        array_push($this->design,'│    '."\033[31m".json_decode('"'.$form.'"')."\033[37m".'     │');
//        array_push($this->design,'│          │');
//        array_push($this->design,'│       '."\033[31m".$value.json_decode('"'.$form.'"')."\033[37m".' │');
//        array_push($this->design,'└──────────┘');

//        foreach ($this->design as $row){
//            echo $row."\n";
//        }
    }


    public function getCard(){
        echo $this->form."-".$this->value."\n";
    }

    /**
     * @return mixed
     */
    public function getForm()
    {
        return $this->form;
    }


    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }


    /**
     * @return int
     */
    public function getPoint(): int
    {
        return $this->point;
    }
}
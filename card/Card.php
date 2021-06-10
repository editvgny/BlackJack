<?php


class Card {
    private $form;
    private $value;
    private $point;

    /**
     * Card constructor.
     * @param $form
     * @param $value
     */
    public function __construct($form, $value) {
        $this->form = $form;
        $this->value = $value;
        if ($value == "J" || $value == "Q" || $value == "K") {
            $this->point = 10;
        } elseif ($value == "A") {
            $this->point = 11;
        } else {
            $this->point = $value;
        }
    }

    public function getCard() {
        echo $this->form . "-" . $this->value . "\n";
    }

    /**
     * @return mixed
     */
    public function getForm() {
        return $this->form;
    }

    /**
     * @return mixed
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * @return int
     */
    public function getPoint(): int {
        return $this->point;
    }
}
<?php

class Arbeit
{
    private $titel;
    private $startzeitpunkt;
    private $endzeitpunkt;
    
    public function __construct($titel, $startzeitpunkt, $endzeitpunkt)
    {
        $this->titel = $titel;
        $this->startzeitpunkt = $startzeitpunkt;
        $this->endzeitpunkt = $endzeitpunkt;
    }
        
    public function getTitel() {
        return $this->startzeitpunkt;
    }

    public function setTitel($titel) {
        $this->titel = $titel;
    }

    public function getStartzeitpunkt() {
        return $this->startzeitpunkt;
    }

    public function setStartzeitpunkt($startzeitpunkt) {
            $this->startzeitpunkt = $startzeitpunkt;
    }

    public function getEndzeitpunkt() {
        return $this->endzeitpunkt;
    }

    public function setEndzeitpunkt($endzeitpunkt) {
                $this->endzeitpunkt = $endzeitpunkt;
    }


}

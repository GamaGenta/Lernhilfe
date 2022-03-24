<?php

class Arbeit
{
    private $titel;
    private $startzeitpunkt;
    private $endzeitpunkt;

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
        if (checkdate($startzeitpunkt['month'], $startzeitpunkt['day'], $startzeitpunkt['year'])) {
            $this->startzeitpunkt = $startzeitpunkt;
        }
    }

    public function getEndzeitpunkt() {
        return $this->endzeitpunkt;
    }

    public function setEndzeitpunkt($endzeitpunkt) {
        if (checkdate($endzeitpunkt['month'], $endzeitpunkt['day'], $endzeitpunkt['year'])) {
            if($endzeitpunkt > $this->startzeitpunkt) {
                $this->endzeitpunkt = $endzeitpunkt;
            }
        }
    }


}

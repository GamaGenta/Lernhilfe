<?php

class ToDo
{
    private $titel;
    private $deadline;
    private $zeitspanne;
    private $info;

    public function __construct($titel, $deadline = null, $zeitspanne = null, $info = null)
    {
        $this->titel = $titel;
        $this->deadline = $deadline;
        $this->zeitspanne = $zeitspanne;
        $this->info = $info;
    }

    public function getTitel()
    {
        return $this->titel;
    }

    public function getDeadline()
    {
        return $this->deadline;
    }

    public function getZeitspanne()
    {
        return $this->zeitspanne;
    }

    public function getInfo()
    {
        return $this->info;
    }

}

?>

<?php


class DozentenkarteKarte extends Karteikarte
{
    private $antwortQuote = array("richtig"=>0, "falsch"=>0);
    private $antwortAnzahl=0;

    public function __construct($titel, $frage, $antwort, $antwortArt, $bild, $antwortenR=0, $antwortenF=0, $antwortAnzahl=0)
    {
        parent::__construct($titel, $frage, $antwort, $antwortArt, $bild);
        $this->antwortQuote["richtig"] = $antwortenR;
        $this->antwortQuote["falsch"] = $antwortenF;
        $this->antwortAnzahl = $antwortAnzahl;
    }

    public function getAntwortQuote()
    {
        return $this->antwortQuote;
    }

    public function richtigeAntwort()
    {
        $this->antwortQuote["richtig"] += 1;
        $this->antwortenAnzahlErhöhen();
    }

    public function falscheAntwort()
    {
        $this->antwortQuote["falsch"] += 1;
        $this->antwortenAnzahlErhöhen();
    }

    public function getAntwortAnzahl()
    {
        return $this->antwortAnzahl;
    }

    private function antwortenAnzahlErhöhen()
    {
        $this->antwortAnzahl +=1;
    }

    public function __toString()
    {
        return "Dozenten".parent::__toString()." | AntwortQuote[richtig=>".$this->antwortQuote["richtig"]."; falsch=>".$this->antwortQuote["falsch"]."] | beantwortungsAnzahl: ".$this->antwortAnzahl;
    }
}
<?php
require_once "bd_utils.php";

class Concursant{
    public string $id;
    public string $nom;
    public string $imatge;
    public string $amo;
    public string $raça;
    public string $fase;
    public int $vots = 0;

    function __construct(string $nom, string $imatge, string $amo, string $raça, string $fase)
    {
        $this->id = $fase . $nom;
        $this->nom = $nom;
        $this->imatge = $imatge;
        $this->amo = $amo;
        $this->raça = $raça;
        $this->fase = $fase;
    }

    function insert(){
        insert(CONCURSANT, [$this->id, $this->nom, $this->imatge, $this->amo, $this->raça, $this->fase, $this->vots]);
    }

    function borrarVots(): void{
        //$this->vots = 0;
        update(CONCURSANT, "vots", 0, "id", $this->id);
    }

    function afegirVot(): void{
        //$this->vots += 1;
        incrementarVot(CONCURSANT, "vots", "id", $this->id);
    }
}

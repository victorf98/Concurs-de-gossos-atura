<?php
    require_once "bd_utils.php";

    class Fase {
        public int $nFase;
        public string $dataInici;
        public string $dataFi;
        public array $concursants;

        function __construct(int $nFase, string $dataInici, string $dataFi, array $concursants)
        {
            $this->nFase = $nFase;
            $this->dataInici = date("Y-m-d", strtotime($dataInici));
            $this->dataFi =  date("Y-m-d", strtotime($dataFi));
            $this->concursants = $concursants;
        }

        function insert(){
            insert(FASE, [$this->nFase, $this->dataInici, $this->dataFi, json_encode($this->concursants)]);
        }

        function setConcursants(array $concursants):void{
            //$this->concursants = $concursants;
            update(FASE, "concursants", json_encode($concursants), "nFase", $this->nFase);
        }

        function updateFase():void{
            update(FASE, "dataInici", $this->dataInici, "nFase", $this->nFase);
            update(FASE, "dataFi", $this->dataFi, "nFase", $this->nFase);
            update(FASE, "concursants", json_encode($this->concursants), "nFase", $this->nFase);
        }
    }
?>
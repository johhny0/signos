<?php

class SignoOcidental
{
    private string $id;
    private string $nome;
    private string $dataInicio;
    private string $dataFim;
    private string $link;
    private string $planeta;

    private ?ElementoOcidental $elemento;
    private ?ModalidadesOcidentais $modalidade;

    private array $anos;

    public function __construct(
        SimpleXMLElement $element, 
        ?ElementoOcidental $elementoOcidental, 
        ?ModalidadesOcidentais $modalidade) {
        if($element === null) {
            $this->nome = "";
            return;
        }

        $this->id = $element->id;
        $this->nome = $element->nome;
        $this->elemento = $elementoOcidental;
        $this->modalidade = $modalidade;
        $this->dataInicio = $element->dataInicio;
        $this->dataFim = $element->dataFim;
        $this->link = $element->link;
        $this->planeta = $element->planeta;
    }

   public function getId(): string {
        return $this->id;
    }
   
    public function getNome(): string {
        return $this->nome;
    }
   
    public function getElemento(): ?ElementoOcidental {
        if($this->elemento === null) {
            return null;
        }
        return $this->elemento;
    }

    public function getModalidade(): ?ModalidadesOcidentais {
        if($this->modalidade === null) {
            return null;
        }
        return $this->modalidade;
    }

    public function getDataInicio(): string {
        return $this->dataInicio;
    }

    public function getDataFim(): string {
        return $this->dataFim;
    }

    public function getLink(): string {
        return $this->link;
    }

    public function getPlaneta(): string {
        return $this->planeta;
    }

    public function contemData(int $dia, int $mes): bool {
        $anoAtual = intVal(date('Y'));

        $dataInicio = DateTime::createFromFormat('d/m/Y', $this->dataInicio . '/' . $anoAtual);
        $dataFim = DateTime::createFromFormat('d/m/Y', $this->dataFim . '/' . $anoAtual);
        $dataAtual = DateTime::createFromFormat('d/m/Y', sprintf('%02d/%02d/%04d', $dia, $mes, $anoAtual));

        if ($this->isCapricornio($dataInicio)) {
            $dataFim->modify('+1 year');
        }

        if($this->isComecoDoAno($dia, $mes)) {
            $dataAtual->modify('+1 year');
        }
        
        $dtInicioStr = $dataInicio->format('d/m/Y');
        $dtFimStr = $dataFim->format('d/m/Y');
        $dataAtualStr = $dataAtual->format('d/m/Y');

        return $dataAtual >= $dataInicio && $dataAtual <= $dataFim;
    }

    private function isComecoDoAno(int $dia, int $mes): bool{
        return $mes == 1 && $dia <= 19;
    }

    private function isCapricornio(DateTime $dataInicio): bool {
        return $dataInicio->format('m') == '12' && $dataInicio->format('d') >= '22';
    }
}
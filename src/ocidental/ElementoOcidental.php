<?php

class ElementoOcidental{

    private string $id;
    private string $nome;
    private string $polaridade;
    private string $simbolo;
    private string $descricao;

    public function __construct(SimpleXMLElement $element = null) {
        $this->id = $element->id;
        $this->nome = $element->nome;
        $this->descricao = $element->descricao;
        $this->polaridade = $element->polaridade;
        $this->simbolo = $element->simbolo;
    }

    public function getId(): string {
        return $this->id;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getDescricao(): string {
        return $this->descricao;
    }

    public function getPolaridade(): string {
        return $this->polaridade;
    }

    public function getSimbolo(): string {
        return $this->simbolo;
    }
}

?>
<?php
class ModalidadesOcidentais{

    private string $id;
    private string $nome;
    private string $simbolo;
    private string $descricao;

    public function __construct(SimpleXMLElement $element = null) {
        $this->id = $element->id;
        $this->nome = $element->nome;
        $this->descricao = $element->descricao;
        $this->simbolo = $element->simbolo;
    }

    public function getId(): string {
        return $this->id;
    }
    public function getNome(): string {
        return $this->nome;
    }
    public function getSimbolo(): string {
        return $this->simbolo;
    }
    public function getDescricao(): string {
        return $this->descricao;
    }
}
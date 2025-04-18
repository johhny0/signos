<?php

class ElementoOriental{

    private string $id;
    private string $nome;
    private string $descricao;

    public function __construct(SimpleXMLElement $element = null) {
        $this->id = $element->id;
        $this->nome = $element->nome;
        $this->descricao = $element->descricao;
    }

    public function getId(): string {
        return $this->id;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }
    public function getNome(): string {
        return $this->nome;
    }
    public function setNome(string $nome): void {
        $this->nome = $nome;
    }
    public function getDescricao(): string {
        return $this->descricao;
    }
    public function setDescricao(string $descricao): void {
        $this->descricao = $descricao;
    }
}



?>
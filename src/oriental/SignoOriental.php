<?php

class SignoOriental
{
    private string $id;
    private string $nome;
    private string $yinYang;

    private string $direcao;
    private string $estacao;
    private ?ElementoOriental $elemento;
    private string $trigono;
    private string $link;

    private array $anos;

    public function __construct(SimpleXMLElement $element, ?ElementoOriental $elementoOriental) {
        if($element === null) {
            $this->nome = "";
            return;
        }

        $this->id = $element->id;
        $this->nome = $element->nome;
        $this->yinYang = $element->yinYang;
        $this->direcao = $element->direcao;
        $this->estacao = $element->estacao;
        $this->elemento = $elementoOriental;
        $this->trigono = $element->trigono;
        $this->link = $element->link;

        foreach ($element->anos->ano as $ano) {
            $this->anos[] = intval($ano);
        }
    }

    public function getId(): int {
        return $this->id;
    }
    
    public function getNome(): string {
        return $this->nome;
    }

    public function getYinYang(): string {
        return $this->yinYang;
    }

    public function getDirecao(): string {
        return $this->direcao;
    }

    public function getEstacao(): string {
        return $this->estacao;
    }

    public function getElemento(): ?ElementoOriental {
        if($this->elemento === null) {
            return null;
        }
        return $this->elemento;
    }

    public function getTrigono(): string {
        return $this->trigono;
    }

    public function getAnos(): array {
        return $this->anos;
    }

    public function getLink(): string {
        return $this->link;
    }

    public function contemAno(int $ano): bool {
        return in_array($ano, $this->anos);
    }

    /*
    function encontrarSignoChines($ano) {
        // Ciclo dos 12 signos do Zodíaco Chinês (em ordem)
        $signos = [
            "Rato",    "Boi",     "Tigre",   "Coelho",
            "Dragão",  "Serpente", "Cavalo",  "Cabra",
            "Macaco",  "Galo",     "Cão",     "Porco"
        ];
        
        // O ciclo começa em 2020 (ano do Rato, usado como referência)
        $anoReferencia = 2020; // Ano do Rato
        $indice = ($ano - $anoReferencia) % 12;
        
        // Ajuste para índices negativos (anos anteriores a 2020)
        if ($indice < 0) {
            $indice += 12;
        }
        
        return $signos[$indice];
    }

    // Exemplo de uso:
    $anoNascimento = 1990; // Altere para o ano desejado
    $signo = encontrarSignoChines($anoNascimento);

    echo "Se você nasceu em $anoNascimento, seu signo chinês é: $signo 🧧";
    */
}
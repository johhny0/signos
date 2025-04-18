<?php
class SignoService{
    private array $signosOrientais = [];
    private array $signosOcidentais = [];
    private array $elementosOrientais = [];
    private array $elementosOcidentais = [];
    private array $modalidadesOcidentais = [];

    public function __construct() {
        $this->loadData();
    }

    private function loadData() {
        $signosXml = file_get_contents('signos.xml');
        $signos = new SimpleXMLElement($signosXml);

        $this->loadOriental($signos);
        $this->loadOcidental($signos);
    }

    public function getSignoOrientalByAno(int $ano): ?SignoOriental {
        foreach ($this->signosOrientais as $signo) {
            if ($signo->contemAno($ano)) {

                return $signo;
            }
        }
        return null;
    }

    public function getSignoOcidentalByDate(int $dia, int $mes): ?SignoOcidental {
        foreach ($this->signosOcidentais as $signo) {
            if ($signo->contemData($dia, $mes)) {
                return $signo;
            }
        }
        return null;
    }

    // Ocidental
    private function loadOcidental(SimpleXMLElement $signos) {
        foreach ($signos->elementosOcidentais->elemento as $value) {
            $this->elementosOcidentais[] = new ElementoOcidental($value);
        }

        foreach ($signos->modalidadesOcidentais->modalidade as $value) {
            $this->modalidadesOcidentais[] = new ModalidadesOcidentais($value);
        }

        foreach ($signos->signosOcidentais->signo as $value) {
            $elemento = $this->getElementoOcidentalById($value->elemento);
            $modalidade = $this->getModalidadesOcidentaisById($value->modalidade);
            $this->signosOcidentais[] = new SignoOcidental($value, $elemento, $modalidade);
        }
    }

    private function getModalidadesOcidentaisById(string $id): ?ModalidadesOcidentais {
        foreach ($this->modalidadesOcidentais as $modalidade) {
            if ($modalidade->getId() === $id) {
                return $modalidade;
            }
        }
        return null;
    }

    private function getElementoOcidentalById(string $id): ?ElementoOcidental {
        foreach ($this->elementosOcidentais as $elemento) {
            if ($elemento->getId() === $id) {
                return $elemento;
            }
        }
        return null;
    }


    // Oriental
    private function loadOriental(SimpleXMLElement $signos) {
        foreach ($signos->elementosOrientais->elemento as $value) {
            $this->elementosOrientais[] = new ElementoOriental($value);
        }

        foreach ($signos->signosOrientais->signo as $value) {
            $elemento = $this->getElementoOrientalById($value->elemento);

            $this->signosOrientais[] = new SignoOriental($value, $elemento);
        }
       
    }

    private function getElementoOrientalById(string $id): ?ElementoOriental {
        foreach ($this->elementosOrientais as $elemento) {
            if ($elemento->getId() === $id) {
                return $elemento;
            }
        }
        return null;
    }
}
?>
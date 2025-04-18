<?php
require_once './src/oriental/ElementoOriental.php';
require_once './src/oriental/SignoOriental.php';

require_once './src/ocidental/ElementoOcidental.php';
require_once './src/ocidental/ModalidadesOcidentais.php';
require_once './src/ocidental/SignoOcidental.php';

require_once './src/SignoService.php';

$data = new DateTime(date('Y-m-d', strtotime('-12 months')));

$days = 365;

$signoService = new SignoService();

while ($days > 0) {
    $data->modify("+1 day");

    $ano = $data->format('Y');
    $mes = $data->format('m');
    $dia = $data->format('d');

    $signoOcidental = $signoService->getSignoOcidentalByDate($dia, $mes);

    if($signoOcidental == null){
        echo (":::::::::::::::::::::$dia/$mes:::::::::::::::::::::");
        echo "<br>";
        $days--;
        continue;
    }

    if($signoOcidental->getElemento() == null) {
        echo (":::::::::::::::::::::ELEMENTO: {$signoOcidental->getNome()} - $dia/$mes:::::::::::::::::::::");
        echo "<br>";
        $days--;
        continue;
    }

    if($signoOcidental->getModalidade() == null) {
        echo (":::::::::::::::::::::MODALIDADE: {$signoOcidental->getNome()} - $dia/$mes:::::::::::::::::::::");
        echo "<br>";
        $days--;
        continue;
    }

    //echo $signoOcidental->getNome() . " -- " . $dia . ' / ' . $mes . ' / ' . $ano;
    //echo "<br>";
    $days--;
}
?>

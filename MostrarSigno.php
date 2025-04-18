<?php

include('./src/layouts/header.php'); 

require_once './src/oriental/ElementoOriental.php';
require_once './src/oriental/SignoOriental.php';

require_once './src/ocidental/ElementoOcidental.php';
require_once './src/ocidental/ModalidadesOcidentais.php';
require_once './src/ocidental/SignoOcidental.php';

require_once './src/SignoService.php';

// https://pt.wikipedia.org/wiki/Signo_astrol%C3%B3gico


$dtNascimento = $_POST['dataNascimento'] ?? null;
if ($dtNascimento === null) {
    die("SEM DATA");
}

$data = new DateTime($dtNascimento);
$ano = $data->format('Y');
$mes = $data->format('m');
$dia = $data->format('d');

$signoService = new SignoService();
$signoOriental = $signoService->getSignoOrientalByAno($ano);
$signoOcidental = $signoService->getSignoOcidentalByDate($dia, $mes);

$bgSignoOcidental = [
    'Leão' => 'bg-leao',
    'Áries' => 'bg-aries',
    'Sagitário' => 'bg-sagitario',
    'Gêmeos' => 'bg-gemeos',
    'Libra' => 'bg-libra',
    'Aquário' => 'bg-aquario',
    'Touro' => 'bg-touro',
    'Virgem' => 'bg-virgem',
    'Capricórnio' => 'bg-capricornio',
    'Câncer' => 'bg-cancer',
    'Escorpião' => 'bg-escorpiao',
    'Peixes' => 'bg-peixes',    
];

$bgSignoOriental = [
    'Dragão' => 'bg-dragao',
    'Rato' => 'bg-rato',
    'Macaco' => 'bg-macaco',
    'Cobra' => 'bg-cobra',
    'Cavalo' => 'bg-cavalo',
    'Cabra' => 'bg-cabra',
    'Galo' => 'bg-galo',
    'Coelho' => 'bg-coelho',
    'Porco' => 'bg-porco',
    'Boi' => 'bg-boi',
    'Tigre' => 'bg-tigre',
    'Serpente' => 'bg-serpente',    	
];

$badgeElemento = [
    'Fogo' => 'badge-fogo',
    'Terra' => 'badge-terra',
    'Ar' => 'badge-ar',
    'Água' => 'badge-agua',
    'Metal' => 'badge-metal',
    'Madeira' => 'badge-madeira',
];

?>


<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white py-3">
                    <h1 class="h4 text-center mb-0">AstroSignos - Sabedoria Ocidental e Oriental</h1>
                </div>
                <div class="card-body">

                    <div id="resultado" class="mt-4">
                        <div class="row g-4">
                            <!-- Signo Ocidental -->
                            <div class="col-md-6">
                                <div class="card-signo <?= $bgSignoOcidental[$signoOcidental->getNome()] ?> text-white">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h2 id="nomeSignoOcidental" class="h3 mb-2"><?= $signoOcidental->getNome() ?></h2>
                                                <div class="d-flex gap-2 mb-3">
                                                    <span class="elemento-badge <?= $badgeElemento[$signoOcidental->getElemento()->getNome()] ?> text-white"><?= $signoOcidental->getElemento()->getNome() ?></span>
                                                    <span class="elemento-badge bg-dark text-white"><?= $signoOcidental->getModalidade()->getNome() ?></span>
                                                </div>
                                            </div>
                                            <img id="imgSignoOcidental" src="./assets/imgs/ocidentais/signos/<?= $signoOcidental->getLink() ?>" alt="<?= $signoOcidental->getNome() ?>" style="width: 80px; height: 80px; object-fit: contain;">
                                        </div>
                                        
                                        <ul class="list-unstyled">
                                            <li class="mb-2"><strong>Período:</strong> <span id="periodoOcidental"><?= $signoOcidental->getDataInicio() ?> a <?= $signoOcidental->getDataFim() ?></span></li>
                                            <li class="mb-2"><strong>Planeta Regente:</strong> <?= $signoOcidental->getPlaneta() ?></li>
                                            <li class="mb-2"><strong>Elemento:</strong> <?= $signoOcidental->getElemento()->getNome() ?></li>
                                            <li class="mb-2"><strong>Características:</strong> <?= $signoOcidental->getElemento()->getDescricao() ?></li>
                                            <li><strong>Modalidade:</strong> <?= $signoOcidental->getModalidade()->getNome() ?> (<?= $signoOcidental->getModalidade()->getDescricao() ?>)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Signo Oriental -->
                            <div class="col-md-6">
                                <div class="card-signo <?= $bgSignoOriental[$signoOriental->getNome()] ?> text-white">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h2 id="nomeSignoOriental" class="h3 mb-2"><?= $signoOriental->getNome() ?></h2>
                                                <div class="d-flex gap-2 mb-3">
                                                    <span class="elemento-badge <?= $badgeElemento[$signoOriental->getElemento()->getNome()] ?> text-white"><?= $signoOriental->getElemento()->getNome() ?></span>
                                                    <span class="elemento-badge bg-dark text-white"><?= $signoOriental->getYinYang() ?></span>
                                                </div>
                                            </div>
                                            <img id="imgSignoOriental" src="./assets/imgs/orientais/<?= $signoOriental->getLink() ?>" alt="<?= $signoOriental->getNome() ?>" style="width: 80px; height: 80px; object-fit: contain;">
                                        </div>
                                        
                                        <ul class="list-unstyled">
                                            <li class="mb-2"><strong>Direção:</strong> <?= $signoOriental->getDirecao() ?></li>
                                            <li class="mb-2"><strong>Estação:</strong> <?= $signoOriental->getEstacao() ?></li>
                                            <li class="mb-2"><strong>Trigono:</strong> <?= $signoOriental->getTrigono() ?></li>
                                            <li class="mb-2"><strong>Elemento:</strong> <?= $signoOriental->getElemento()->getNome() ?></li>
                                            <li><strong>Personalidade:</strong> <?= $signoOriental->getElemento()->getDescricao() ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center mt-4">
                            <a id="btnReset" class="btn btn-outline-primary" href="./"> 
                                <i class="bi bi-arrow-repeat me-2"></i> Nova Consulta
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('./src/layouts/footer.php'); ?>


<?php
$activos = 0;
$inactivos = 0;
$this->extend('templates/template_new');
$this->section('content');
?>
<div class="container">
    <div class="row d-flex">
        <div class="col-md-4 align-items-center">
            <div class="card" style="width: 18rem;">
                <img src="<?php echo base_url('public/img/' . $site . '/verbs/verb-regular.png'); ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Verbos Regulares</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="<?php echo base_url('/verbs/list/' . $site . '/regulares'); ?>" class="btn btn-primary">Mira los verbos</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 align-items-center">
            <div class="card" style="width: 18rem;">
                <img src="<?php echo base_url('public/img/' . $site . '/verbs/verb-irregular.png'); ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Verbos Irregulares</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="<?php echo base_url('/verbs/list/' . $site . '/irregulares'); ?>" class="btn btn-primary">Mira los verbos</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 align-items-center">
            <div class="card" style="width: 18rem;">
                <img src="<?php echo base_url('public/img/' . $site . '/verbs/verb-phrasal.png'); ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Verbos Fraseales</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="<?php echo base_url('/verbs/list/' . $site . '/fraseales'); ?>" class="btn btn-primary">Mira los verbos</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->endSection();
?>
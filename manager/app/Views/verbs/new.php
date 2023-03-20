<?php
$activos = 0;
$inactivos = 0;
$this->extend('templates/dash_header');
$this->section('content');
?>
<div class="container">
  <div class="row d-flex">
    <div class="app-page-title">
      <div class="page-title-wrapper">
        <div class="page-title-heading">
          <div class="page-title-icon">
            <i class="pe-7s-note2 icon-gradient bg-mean-fruit">
            </i>
          </div>
          <div>Nuevo Verbo
            <div class="page-title-subheading">Administre cada uno de los elementos y su posición en los listados
            </div>
          </div>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('verbs/create'); ?>" method="post" class="row g-3">
      <div class="col-md-4">
        <label for="mundo" class="form-label">Plataforma</label>
        <select class="form-select" id="mundo" name="mundo" required>
          <option selected disabled value="">Escoja...</option>
          <option value="TEENS">TEENS</option>
          <option value="KIDS">KIDS</option>
        </select>
        <div class="valid-feedback">
          Please select a valid state.
        </div>
      </div>
      <div class="col-md-4">
        <label for="mundo" class="form-label">Tipo de verbo</label>
        <select class="form-select" id="tipo" name="tipo" required>
          <option selected disabled value="">Escoja...</option>
          <option value="reg">Regulares</option>
          <option value="irr">Irregulares</option>
          <option value="phr">Fraseales</option>
        </select>
        <div class="valid-feedback">
          Please select a valid state.
        </div>
      </div> 
      <div class="col-md-4">
        <label for="position" class="form-label">Posicion en el listado</label>
        <input type="number" class="form-control" id="position" name="position" required>
        <div class="invalid-feedback">
          Please provide a valid city.
        </div>
      </div>           
      <div class="col-md-3">
        <label for="past" class="form-label">Pasado del verbo</label>
        <input type="text" class="form-control" id="past" name="past" placeholder="Pasado del verbo" required>
        <div class="invalid-feedback">
          Please provide a valid city.
        </div>
      </div>           
      <div class="col-md-3">
        <label for="present" class="form-label">Presente del verbo</label>
        <input type="text" class="form-control" id="present" name="present" placeholder="presente del verbo" required>
        <div class="invalid-feedback">
          Please provide a valid city.
        </div>
      </div>           
      <div class="col-md-3">
        <label for="participle" class="form-label">Participio del verbo</label>
        <input type="text" class="form-control" id="participle" name="participle" placeholder="participio del verbo"required>
        <div class="invalid-feedback">
          Please provide a valid city.
        </div>
      </div>  
      <div class="col-md-3">
        <label for="significado" class="form-label">Significado en español</label>
        <input type="text" class="form-control" id="significado" name="significado" placeholder="significado en español"required>
        <div class="invalid-feedback">
          Please provide a valid city.
        </div>
      </div>               
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Guardar</button>
      </div>
    </form>
  </div>
</div>
<?php
$this->endSection();
?>
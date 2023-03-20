<?php
$activos = 0;
$inactivos = 0;
$this->extend('templates/dash_header');
$this->section('content');
helper('form');
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
    <form action="<?php echo base_url('verbs/update/'. $verb->id); ?>" method="post" class="row g-3">
      <div class="col-md-4">
        <label for="mundo" class="form-label">Plataforma</label>
        <select class="form-select" id="mundo" name="mundo" value="" required>        
          <option selected disabled value="">Escoja...</option>
          <?php foreach($mundos as $mundo) { ?> 
            <option value="<?php echo $mundo.'" ';
             if($mundo == strtoupper( $verb->mundo)){
                echo ' selected';
                }; ?>><?php echo $mundo ?></option>;
          <?php } ?>      
        </select>
        <div class="valid-feedback">
          Please select a valid state.
        </div>
      </div>
      <div class="col-md-4">
        <label for="mundo" class="form-label">Tipo de verbo</label>
        <select class="form-select" id="tipo" name="tipo" required>
          <option selected disabled value="">Escoja...</option>
          <?php foreach($tipos as $tipo) { ?> 
            <option value="<?php echo substr($tipo,0,3) .'" ';
             if(substr($tipo,0,3) == strtoupper( $verb->tipo)){
                echo ' selected';
                }; ?>><?php echo $tipo ?></option>;
          <?php } ?>
        </select>
        <div class="valid-feedback">
          Please select a valid state.
        </div>
      </div> 
      <div class="col-md-4">
        <label for="position" class="form-label">Posicion en el listado</label>
        <input type="number" class="form-control" id="position" name="position" value="<?php echo $verb->position ?>" required>
        <div class="invalid-feedback">
          Please provide a valid city.
        </div>
      </div>           
      <div class="col-md-3">
        <label for="past" class="form-label">Pasado del verbo</label>
        <input type="text" class="form-control" id="past" name="past" placeholder="Pasado del verbo" value="<?php echo $verb->past ?>" required>
        <div class="invalid-feedback">
          Please provide a valid city.
        </div>
      </div>           
      <div class="col-md-3">
        <label for="present" class="form-label">Presente del verbo</label>
        <input type="text" class="form-control" id="present" name="present" placeholder="presente del verbo" value="<?php echo $verb->present ?>" required>
        <div class="invalid-feedback">
          Please provide a valid city.
        </div>
      </div>           
      <div class="col-md-3">
        <label for="participle" class="form-label">Participio del verbo</label>
        <input type="text" class="form-control" id="participle" name="participle" placeholder="participio del verbo" value="<?php echo $verb->participle ?>" required>
        <div class="invalid-feedback">
          Please provide a valid city.
        </div>
      </div>  
      <div class="col-md-3">
        <label for="significado" class="form-label">Significado en español</label>
        <input type="text" class="form-control" id="significado" name="significado" placeholder="significado en español" value="<?php echo $verb->significado ?>" required>
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
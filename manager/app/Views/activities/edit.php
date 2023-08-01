<?php
$activos = 0;
$inactivos = 0;
$this->extend('templates/dash_header');
$this->section('content');
$session = session();
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
          <div><?php echo 'Editar Actividad para lección ' . $session->get('lesson') . ' :: Mundo ' . $session->get('mundoName'); ?>
            <div class="page-title-subheading">Administre cada uno de las actividades y su posición en los listados
            </div>
          </div>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('activities/update/' . $record->id); ?>" method="post" class="row g-3">
      <!-- lessonid hidden -->
      <input type="number" class="form-control" id="id" name="id" value="<?php echo $record->id; ?>" hidden>
      <div class="col-md-2">
        <label for="activityNumber" class="form-label">Actividad No.</label>
        <input type="number" class="form-control" id="activityNumber" name="activityNumber" min="1" value="<?php echo $record->activityNumber; ?>" required>
        <div class="invalid-feedback">
          Por favor digite el número de actividad.
        </div>
      </div>
      <div class="col-md-3">
        <label for="img" class="form-label">Imagen asociada</label>
        <select class="form-select" id="image" name="image" required>
          <option selected disabled value="">Escoja...</option>
          <?php
          foreach ($images as $img) {
            echo "<option value='" . $img['img_path'] . "'";
            if ($img['img_path'] == $record->img_path) {
              echo " selected";
            }
            echo ">" . $img['img_path'] . "</option>;";
          }
          ?>
        </select>
        <div class="valid-feedback">
          Please select a valid state.
        </div>
      </div>
      <div class="col-md-2">
        <label for="objectId" class="form-label">ID objeto Moodle</label>
        <input type="number" class="form-control" id="objectId" name="objectId" min="1" value="<?php echo $record->objectId; ?>" required>
        <div class="invalid-feedback">
          Por favor digite el id de moodle.
        </div>
      </div>
      <div class="col-md-2">
        <label for="tipo" class="form-label">Tipo</label>
        <select class="form-select" id="tipo" name="tipo" required>
          <option selected disabled value="">Escoja...</option>
          <?php
          foreach ($tools as $t) {
            echo "<option value='" . $t . "'";
            if (strtolower($t) == $record->tipo) {
              echo " selected";
            }
            echo ">" . $t . "</option>";
          }
          ?>
        </select>
        <div class="valid-feedback">
          Please select a valid state.
        </div>
      </div>
      <div class="col-md-3">
        <label for="quiz" class="form-label">¿Es un quiz?</label>        
        <select class="form-select" id="quiz" name="quiz" required>
          <option selected disabled value="">Escoja...</option>
          <?php
          foreach ($answers as $a) {
            echo "<option value='" . $a . "'";
            if ($a == $record->quiz) {
              echo " selected";
            }
            echo ">" . $a . "</option>";
          }
          ?>          
        </select>
        <div class="valid-feedback">
          Please select a valid state.
        </div>
      </div>
      <div class="col-md-12">
        <label for="desc" class="form-label">Descripción de la actividad</label>
        <input type="text" class="form-control" id="desc" name="desc" value="<?php echo $record->descripcion; ?>">
        <div class="invalid-feedback">
          Please provide a valid city.
        </div>
      </div>
      <div class="col-md-12">
        <label for="url_resources" class="form-label">URL del recurso (Solo si es PDF)</label>
        <input type="text" class="form-control" id="url_resources" name="url_resources" value="<?php echo $record->url_resources; ?>" placeholder="-">
        <div class="invalid-feedback">
          Please provide a valid city.
        </div>
      </div>
      <div class="col-md-12">
        <label for="podcastName" class="form-label">Nombre del podcast</label>
        <input type="text" class="form-control" id="desc" name="podcastName" value="<?php echo $record->podcastName; ?>">
        <div class="invalid-feedback">
          Please provide a podcast Name.
        </div>
      </div>
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Guardar</button>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">

</script>

<?php
$this->endSection();
?>
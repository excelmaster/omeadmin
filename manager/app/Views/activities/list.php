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
          <div>listado de actividades para mundo <?php echo $session->get('mundoName') .' -- lección ' . $session->get('lesson') ; ?>
            <div class="page-title-subheading">Administre cada uno de los elementos y su posición en los listados
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="d-flex justify-content-around">
        <a class="btn btn-primary btn-sm " href="<?php echo base_url('activities/new/'.$session->get('lessonId')); ?>"   role="button"><i class="fa fa-plus-circle" aria-hidden="true"></i> Nueva actividad</a>
        <a class="btn btn-primary btn-sm " href="<?php echo base_url('lessons/list/'.$session->get('courseId').'/'. $session->get('mundoName')); ?>"   role="button"><i class="fa fa-chevron-left" aria-hidden="true"></i> Volver al listado de lecciones</a>
      </div>
    </div>
    <table id="omedata" class="table table-bordered table-light table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Mundo</th>
          <th scope="col">Lección No.</th>
          <th scope="col">Actividad No.</th>
          <th scope="col">Imagen asignada</th>
          <th scope="col">Id objeto</th>
          <th scope="col">Tipo</th>
          <th scope="col">Descripción</th>
          <th scope="col">Url Resource</th>
          <th scope="col">Eliminado en</th>
          <th span="3">Acciones</th>
          <th></th>        
        </tr>
      </thead>
      <tbody>
        <?php foreach ($activities as $item) { ?>
          <tr>
            <td><?php echo $item['id'] ?></td>
            <td><?php echo $session->get('mundoName') ?></td>
            <td><?php echo $session->get('lesson') ?></td>
            <td><?php echo $item['activityNumber'] ?></td>
            <td><?php echo $item['img_path'] ?></td>
            <td><?php echo $item['objectId'] ?></td>
            <td><?php echo $item['tipo'] ?></td>
            <td><?php echo $item['descripcion'] ?></td>
            <td><?php echo $item['url_resources'] ?></td>
            <td><?php echo $item['deleted_at'] ?></td>
            <td><a class="btn btn-info btn-sm txt-black" href="<?php echo base_url('activities/edit/'.$item['id']); ?>" role="button">Editar </a></td>
            <td>
              <form action="<?php echo base_url('activities/delete/'.$item['id']) ?>" method="post">
                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
              </form>              
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<?php
$this->endSection();
?>
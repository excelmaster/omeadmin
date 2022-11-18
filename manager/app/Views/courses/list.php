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
          <div>listado de mundos
            <div class="page-title-subheading">Administre cada uno de los elementos y su posición en los listados
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <!-- <col-md-3>
        <a class="btn btn-primary btn-sm " href="<?php echo base_url('courses/new'); ?>"   role="button"><i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo mundo</a>
      </col-md-3> -->
    </div>
    <table id="omedata" class="table table-bordered table-light table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Categoría</th>
          <th scope="col">Nombre</th>
          <th scope="col">nombre clave</th>
          <th scope="col">Mundo No.</th>
          <th scope="col">Imagen asignada</th>
          <th scope="col">Fecha de Eliminación</th>
          <th span="3">Acciones</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($worlds as $item) { ?>
          <tr>
            <td><?php echo $item['id'] ?></td>
            <td><?php echo $item['category'] ?></td>
            <td><?php echo $item['fullname'] ?></td>
            <td><?php echo $item['idnumber'] ?></td>
            <td><?php echo $item['mundo'] ?></td>
            <td><?php echo $item['img'] ?></td>
            <td><?php echo $item['deleted_at'] ?></td>
            <td><a class="btn btn-primary btn-sm " href="<?php echo base_url('lessons/list/'.$item['id'].'/'.$item['idnumber']); ?>" role="button">Ver lecciones </a></td>
            <!-- <td><a class="btn btn-info btn-sm txt-black" href="<?php echo base_url('courses/edit/'.$item['id']); ?>" role="button">Editar </a></td>
            <td>
              <form action="<?php echo base_url('courses/delete/'.$item['id']) ?>" method="post">
                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
              </form>              
            </td> -->
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<?php
$this->endSection();
?>
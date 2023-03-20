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
          <div>Listados de verbos
            <div class="page-title-subheading">Administre cada uno de los elementos y su posición en los listados
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <col-md-3>
        <a class="btn btn-primary btn-sm " href="<?php echo base_url('verbs/new'); ?>"   role="button"><i class="fa fa-plus-circle" aria-hidden="true"></i> Nuevo verbo</a>
      </col-md-3>
    </div>
    <table id="omedata" class="table table-bordered table-light table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Mundo</th>
          <th scope="col">Tipo</th>
          <th scope="col">Past</th>
          <th scope="col">Present</th>
          <th scope="col">Participle</th>
          <th scope="col">Significado</th>
          <th scope="col">Posición</th>
          <th scope="col" span="2">Acciones</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($verbos as $item) { ?>
          <tr>
            <td><?php echo strtoupper($item['id']) ?></td>
            <td><?php echo strtoupper($item['mundo']) ?></td>
            <td><?php echo strtoupper($item['tipo']) ?></td>
            <td><?php echo strtoupper($item['past']) ?></td>
            <td><?php echo strtoupper($item['present']) ?></td>
            <td><?php echo strtoupper($item['participle']) ?></td>
            <td><?php echo strtoupper($item['significado']) ?></td>
            <td><?php echo strtoupper($item['position']) ?></td>
            <td><a class="btn btn-success btn-sm " href="<?php echo base_url('/verbs/edit/'.$item['id']); ?>" role="button">Editar </a></td>            
            <td>              
                <button type="button" class="btn btn-danger" onclick="confirmDeletion(<?php echo $item['id'] ?>,'<?php echo str_replace(',','-',$item['present']) ?>')">Eliminar</button>                          
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<script type="text/javascript">
  url = '<?php echo base_url(); ?>';
  function confirmDeletion(id, verb){
    var r = confirm('Realmente desea eliminar el registro' + verb);
    if (r == true) {
      window.location= url + '/verbs/delete/' + id;
    } else {
      return false;
    }
  }
</script>

<?php
$this->endSection();
?>
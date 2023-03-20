<?php
$activos = 0;
$inactivos = 0;
$this->extend('templates/template_new');
$this->section('content');
?>
<div class="container">
    <div class="row d-flex">
        
        <div class="jumbotron">
            <div class="container">
                <h1>Mira cuantos verbos <?php echo $tipo ?> !</h1>
                <p>Estudia muy bien estos verbos, es muy importante usarlos en todas nuestras conversaciones</p>                
            </div>
        </div>
        
        <table class="table table-bordered table-light table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">PAST</th>
              <th scope="col">PRESENT</th>
              <th scope="col">PARTICIPLE</th>
              <th scope="col">SIGNIFICADO</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($verbos as $item){ ?>
            <tr>
              <td><?php echo strtoupper( $item['past']) ?></td>
              <td><?php echo strtoupper($item['present']) ?></td>
              <td><?php echo strtoupper($item['participle']) ?></td>
              <td><?php echo strtoupper($item['significado']) ?></td>
            </tr>         
            <?php } ?>   
          </tbody>
        </table>
    </div>
</div>
<?php
$this->endSection();
?>
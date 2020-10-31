<?php 

include 'layout\layout.php';
include 'helpers\utilidades.php';


session_start();

$_SESSION['estudiantes'] = isset($_SESSION['estudiantes']) ?  $_SESSION['estudiantes'] : array();
 

$lista = $_SESSION['estudiantes'];

if(!empty($lista)){
if(isset($_GET['carreraId'])){

  $lista = buscar($lista,'carrera',$_GET['carreraId']);
}
}
?>

<?php printHeader();?>

<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      
        <a href="estudiantes/agregar.php" class="btn btn-primary my-2">Registrar estudiantes</a>
      
    </div>
  </section>

  
</main>

<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
<div class="btn-group">
<a href="index.php" class= "btn btn-dark text-light">Todos</a>
<a href="index.php?carreraId=1" class= "btn btn-dark text-light">Redes</a>
<a href="index.php?carreraId=2" class= "btn btn-dark text-light">Software</a>
<a href="index.php?carreraId=3" class= "btn btn-dark text-light">Multimedia</a>
<a href="index.php?carreraId=4" class= "btn btn-dark text-light">Mecatronica </a>
<a href="index.php?carreraId=5" class= "btn btn-dark text-light">Seguridad informática</a>

</div>
</div>
</div>
<div class="col-md-4"></div>

<?php if(empty($lista)):?>
<p>No hay contactos registrados <p>


<?php else:?>
  <?php foreach($lista as $contact):?>
    <div class="col-md-4"></div>
<div class="col-md-4">
  <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $contact['nombre'] ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $contact['apellido'] ?></h6>
    <p class="card-text"><?php echo getcarreraName($contact['carrera']) ?></p>
    <a href="estudiantes/delete.php?id=<?php echo $contact['id']; ?>" class="card-link">Borrar</a>
    <a href="estudiantes/editar.php?id=<?php echo $contact['id']; ?>" class="card-link">editar</a>
    
  </div>
</div>
</div>


  <?php endforeach;?>

<?php endif;?>

<?php printFooter();?>

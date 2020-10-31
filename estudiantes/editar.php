<?php 

include '..\layout\layout.php';
include '..\helpers\utilidades.php';

session_start();

if(isset($_GET['id'])){

$editID=$_GET['id'];

  $_SESSION['estudiantes'] = isset($_SESSION['estudiantes']) ?  $_SESSION['estudiantes'] : array();

  $estudiantes = $_SESSION['estudiantes'];

$element = buscar($estudiantes,'id',$editID)[0];
$elementIndex = getIndexElement($estudiantes,'id',$editID);

if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['carrera'])){ 


  

  

  $newalum =  [ 'id' => $editID, 'nombre'=>$_POST['nombre'], 'apellido' =>$_POST['apellido'], 'carrera'=>$_POST['carrera'] ];

  $estudiantes[$elementIndex] = $newalum;
  $_SESSION['estudiantes'] = $estudiantes;

  header("Location: ../index.php");
  exit();


}

 
}

else{
  header("Location: ../index.php");
  exit(); 
}
?>

<?php printHeader(true);?>

<main role="main"> 
<div class="row margin-top">
<div class=" col-md-3"></div>

<div class=" col-md-6">
<div class="card">
  <div class="card-header">
       <a href="../index.php" class="btn btn-secondary">Volver atras</a> Registro de estudiantes
  </div>
  <div class="card-body">

  <form action="editar.php?id=<?php echo $element['id'] ?>" method="POST">

  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" value="<?php echo $element['nombre']?>"class="form-control" id="nombre" name="nombre">
  </div>

  <div class="form-group">
    <label for="apellido">Apellido</label>  
    <input type="text" value="<?php echo $element['nombre']?>" class="form-control" id="apellido" name="apellido">
  </div>


  <div class="form-group">
        <label for="carrera">Carrera</label>
            <select class="form-control" id="carrera" name="carrera">

              <?php foreach($carrera as $id => $text): ?>

              <?php if($id==$element['company']):   ?>
                <option selected value="<?php echo($id); ?>"> <?php echo $text; ?></option>
              <?php else:   ?>
                <option value="<?php echo($id); ?>"> <?php echo $text; ?></option>
              <?php endif;   ?>
              <?php endforeach; ?>
            </select>
    </div>
    <button type="submit" class="btn btn-secondary">Guardar</button>
</form>



  </div>
  
</div>

</div>




<div class=" col-md-3"></div> 

</div>





 
</main>

<?php printFooter(true);?>

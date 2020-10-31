<?php 

include "../helpers/utilidades.php";

session_start();



$estudiantes = $_SESSION['estudiantes'];

if(isset($_GET['id'])){

    $estudianteId = $_GET['id'];

    $elementIndex = getIndexElement($estudiantes,'id',$estudianteId);

    unset($estudiantes[$elementIndex]);

    $_SESSION['estudiantes'] = $estudiantes;
}

header("Location: ../index.php");
exit();

?>
 <?php 
 session_start();
     try {

	$conexion= new PDO('mysql:host=localhost;dbname=plataner_certificados','plataner_vistas','aapps20182019');
	echo "conexion exitosa";
	
         } 
     catch (PDOException $e) {
         	echo "Error: ".$e->getMessage();
         }

      ?>



	
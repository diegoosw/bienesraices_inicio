<?php 
$id = $_GET['id'] ?? null;
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id) {
  header('Location: index.php');
}

 //importar conexion
  require "includes/config/database.php";
  $db = conectarDB();

  //consultar
  $query = "SELECT * FROM propiedades WHERE id_propiedad = {$id}";


  //obtener los resultados
  $resultado = mysqli_query($db, $query);

    if(!$resultado->num_rows) {
    header('Location: /');
  }

  $propidad = mysqli_fetch_assoc($resultado);


require 'includes/funciones.php';
incluirTemplate('header');
 ?>


    <main class="contenedor seccion contenido-centrado">
      <h1><?php echo $propidad['titulo']; ?></h1>

        <img
          loading="lazy"src="imagenes/<?php echo $propidad['imagen']; ?>" alt="anuncio de la propiedad"/>

      <div class="resumen-propiedad">
        <p class="precio">$<?php echo number_format($propidad['precio'], 2); ?></p>
        <ul class="iconos-caracteristicas">
          <li>
            <img
              class="icono"
              loading="lazy"
              src="build/img/icono_wc.svg"
              alt="icono wc"
            />
            <p><?php echo $propidad['wc']; ?></p>
          </li>
          <li>
            <img
              class="icono"
              loading="lazy"
              src="build/img/icono_estacionamiento.svg"
              alt="icono estacionamiento"
            />
            <p><?php echo $propidad['estacionamiento']; ?></p>
          </li>
          <li>
            <img
              class="icono"
              loading="lazy"
              src="build/img/icono_dormitorio.svg"
              alt="icono dormitorio"
            />
            <p><?php echo $propidad['habitaciones']; ?></p>
          </li>
        </ul>
        <p>
          <?php echo $propidad['descripcion']; ?>
        </p>
      </div>
    </main>
<?php
  mysqli_close($db);

  incluirTemplate('footer');

?>

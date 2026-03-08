<?php 
require '../../includes/config/database.php';
$db=conectarDB();
//Arreglo con mensaje de errores
$errores=[];
//consulta para obtener los vendedores
$consulta="SELECT * FROM vendedores";
$resultado=mysqli_query($db, $consulta);
//Ejecutar el codigo despues de que usuario enviar el formulario
    $titulo='';
    $precio='';
    $descripcion='';
    $habitaciones='';
    $wc='';
    $estacionamiento='';
    $vendedor='';

if($_SERVER['REQUEST_METHOD']==='POST'){
    //$numero="1hola";
    $numero2=1;
    //Limpia los datos de una variable, dependiendo del filtro que se le pase como segundo argumento
    $resultado = filter_var($numero, FILTER_SANITIZE_NUMBER_INT);
    $resultado = filter_var($numero2, FILTER_VALIDATE_INT);
    var_dump($resultado);
    //exit;
    /*echo"<pre>";
    var_dump($_POST);
    echo "</pre>"; */
    echo"<pre>";
    //OBTENER INFORMACION DE LA IMAGEN
    var_dump($_FILES);
    echo "</pre>";
    $titulo=mysqli_real_escape_string($db, $_POST['titulo']);
    $precio=mysqli_real_escape_string($db,$_POST['precio']);
    $descripcion=mysqli_real_escape_string($db,$_POST['descripcion']);
    $habitaciones=mysqli_real_escape_string($db,$_POST['habitaciones']);
    $wc=mysqli_real_escape_string($db,$_POST['sanitarios']);
    $estacionamiento=mysqli_real_escape_string($db,$_POST['estacionamiento']);
    $vendedor=mysqli_real_escape_string($db,$_POST['vendedor']);
    $creado=date('Y/m/d');

    if(!$titulo){
        $errores[]="Debes agregar un titulo";
    }
    if(!$precio){
        $errores[]="El precio no es correcto";
    }
     if(strlen($descripcion)<50){
         $errores[]="La descripcion debe tener al menos 50 caracteres";
    }
     if(!$habitaciones){
        $errores[]="El numero de habitaciones es obligatorio";
    }
     if(!$wc){
        $errores[]="El numero de sanitarios es obligatorio";
    }
     if(!$estacionamiento){
        $errores[]="El numero de estacionamientos es obligatorio";
    }
     if(!$vendedor){
        $errores[]="Elige un vendedor";
    }      
    /*echo"<pre>";
    var_dump($errores);
    echo "</pre>";
    exit;*/
    if(empty($errores)){

    //Insertar en la base de datos
        $query= "INSERT INTO propiedades(titulo, precio, descripcion,habitaciones,wc, estacionamiento, creado, vendedores_id) VALUES ('$titulo','$precio','$descripcion','$habitaciones','$wc','$estacionamiento', '$creado', '$vendedor')";
         //echo $query;
        $resultado=mysqli_query($db, $query);
        if($resultado){
           header('Location: /admin');
        }
    }
}
require '../../includes/funciones.php';
incluirTemplate('header');
 ?>
    <main class="contenedor seccion">
      <h1>Crear</h1>
      <a href="/admin" class="boton boton-verde">Volver</a>
      <?php foreach ($errores as $error): ?>
        <div class="alerta error">
          <?php echo $error; ?>
        </div>
      <?php endforeach; ?>
      <form class="formulario" method="POST" action="/admin/propiedades/crear.php" endtype="multipart/form-data">
        <fieldset>
            <legend>Informacion general</legend>
            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo propiedad" value="<?php echo $titulo; ?>">
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" placeholder="Precio propiedad" value="<?php echo $precio; ?>">
            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen" accept="image/jpeg image/png">
            <label for="descripcion">Descripcion:</label>
            <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
            
        </fieldset>
         <fieldset>
            <legend>Informacion propiedad</legend>
            <label for="habitaciones">Habitaciones:</label>
            <input type="number" name="habitaciones" id="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">
            <label for="wc">Sanitarios:</label>
            <input type="number" name="sanitarios" id="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc; ?>">
            <label for="Estacionamiento">Estacionamiento:</label>
            <input type="number" name="estacionamiento" id="Estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">
          </fieldset>   
          <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedor" id="vendedor" value="<?php echo $vendedor; ?>">
                <option value="" >Selecciona una opcion</option>
                <?php while($vendedor = mysqli_fetch_assoc($resultado)): ?>
                    <option value="<?php echo $vendedor['id']; ?>" <?php echo $vendedor['id'] === $vendedor ? 'selected' : ''; ?>>
                        <?php echo $vendedor['nombre'] . ' ' . $vendedor['apellido']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
         </fieldset> 
         <input type="submit" value="Crear propiedad" class="boton boton-verde">
      </form>
    </main>

     <?php incluirTemplate('footer');?>
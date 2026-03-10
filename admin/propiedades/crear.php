<?php
    require '../../includes/funciones.php';
    $auth = estaAutenticado();

    if(!$auth) {
        header('Location: /');
    }
    //base de datos
    require '../../includes/config/database.php';
    $db=conectarDB();


    //consulta para obtener los vendedores
    $consulta="SELECT * FROM vendedores";
    $resultado=mysqli_query($db, $consulta);

    //Arreglo con mensaje de errores
    $errores=[];

    //Ejecutar el codigo despues de que usuario enviar el formulario
    $titulo='';
    $precio='';
    $descripcion='';
    $habitaciones='';
    $wc='';
    $estacionamiento='';
    $vendedorId = '';

    //ejecutar el codigo despues de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD']==='POST'){

        echo "<pre>";
        var_dump($_FILES);
        echo "</pre>";


        $titulo=mysqli_real_escape_string($db, $_POST['titulo']);
        $precio=mysqli_real_escape_string($db,$_POST['precio']);
        $descripcion=mysqli_real_escape_string($db,$_POST['descripcion']);
        $habitaciones=mysqli_real_escape_string($db,$_POST['habitaciones']);
        $wc=mysqli_real_escape_string($db,$_POST['sanitarios']);
        $estacionamiento=mysqli_real_escape_string($db,$_POST['estacionamiento']);
        $vendedorId=mysqli_real_escape_string($db,$_POST['vendedor']);
        $creado=date('Y/m/d');

        //Asignar files hacia una variable
        $imagen=$_FILES['imagen'];

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

        if(!$vendedorId){
            $errores[]="Elige un vendedor";
        }      

        if(!$imagen['name'] || $imagen['error']){
            $errores[]="La imagen es obligatoria";
        }

        //Validar por tamaño (1mb max)
        $medida=1000*1000*20;
        if($imagen['size']>$medida){
            $errores[]="La imagen es muy pesada";
        }

    /*echo"<pre>";
    var_dump($errores);
    echo "</pre>";
    exit;*/




        if(empty($errores)){

        //Subida de archivos

            //Crear carpeta
            $carpetaImagenes='../../imagenes/';
            if(!is_dir($carpetaImagenes)){

                mkdir($carpetaImagenes);
            }
            //Generar un nombre unico
            $nombreImagen=md5(uniqid(rand(), true)) . ".jpg";


            //subir imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen );


            //isertar en la base de datos
            $query= "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUES ('$titulo','$precio','$nombreImagen','$descripcion','$habitaciones','$wc','$estacionamiento', '$creado', '$vendedorId')";

            //echo $query;
        
            $resultado=mysqli_query($db, $query);

            if($resultado){
                //Redireccionar al usuario
                header('Location: /admin?resultado=1');
                exit;
            }
    }
}
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

      <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
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
            <select name="vendedor" id="vendedor" value="<?php echo $vendedorId; ?>">
                <option value="" >Selecciona una opcion</option>
                <?php while($vendedor_db = mysqli_fetch_assoc($resultado)): ?>
                    <option value="<?php echo $vendedor_db['id']; ?>" <?php echo $vendedorId === $vendedor_db['id'] ? 'selected' : ''; ?>>
                        <?php echo $vendedor_db['nombre'] . ' ' . $vendedor_db['apellido']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
         </fieldset> 
         <input type="submit" value="Crear propiedad" class="boton boton-verde">
      </form>
    </main>

     <?php incluirTemplate('footer');?>
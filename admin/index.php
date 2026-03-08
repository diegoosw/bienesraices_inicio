<?php 
require '../includes/funciones.php';
incluirTemplate('header');
 ?>
    <main class="contenedor seccion">
      <h1>Administrador de bienes raices</h1>
      <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>
      <form class="formulario">
        <fieldset>
            <legend>Informacion general</legend>
            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" placeholder="Titulo propiedad">
            <label for="precio">Precio:</label>
            <input type="number" id="precio" placeholder="Precio propiedad">
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg image/png">
            <label for="descripcion">Descripcion:</label>
            <textarea id="descripcion"></textarea>
            
        </fieldset>
         <fieldset>
            <legend>Informacion propiedad</legend>
            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" placeholder="Ej: 3" min="1" max="9">
            <label for="wc">Sanitarios:</label>
            <input type="number" id="wc" placeholder="Ej: 3" min="1" max="9">
            <label for="Estacionamiento">Estacionamiento:</label>
            <input type="number" id="Estacionamiento" placeholder="Ej: 3" min="1" max="9">
          </fieldset>   
          <fieldset>
            <legend>Vendedor</legend>
            <select>
                <option value="1">Juan</option>
                <option value="2">Karen</option>
            </select>
         </fieldset> 
         <input type="submit" value="Crear propiedad" class="boton boton-verde">
      </form>
    </main>

     <?php incluirTemplate('footer');?>

    
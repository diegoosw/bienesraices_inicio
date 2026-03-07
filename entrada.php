<?php 
require 'includes/funciones.php';
incluirTemplate('header');
 ?>
    <main class="contenedor seccion contenido-centrado">
      <h1>Guía para la decoración de tu hogar</h1>

      <picture>
        <source srcset="build/img/destacada2.webp" type="image/webp" />
        <source srcset="build/img/destacada2.jpg" type="image/jpeg" />
        <img
          loading="lazy"
          src="build/img/destacada2.jpg"
          alt="anuncio de la propiedad"
        />
      </picture>

      <p class="informacion-meta">
        Escrito el: <span>20/10/2025</span> por: <span>Admin</span>
      </p>
      <div class="resume-propiedad">
        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veritatis id
          placeat fuga! Tempore ipsam assumenda repudiandae quidem eos placeat
          similique architecto? Dolorem ipsa, illo quae quaerat saepe iure velit
          quas error, eligendi rerum dolorum incidunt perferendis, asperiores
          repellat fugiat qui voluptatum accusamus aspernatur cum. Aperiam rerum
          saepe accusantium ullam doloribus molestias quisquam, fugit maiores
          hic iure earum vero modi distinctio facere laboriosam qui magni
          aspernatur corrupti officiis ad quibusdam labore? Quibusdam numquam et
          ipsa aut nisi a quaerat voluptatem, animi voluptatum libero, voluptas
          assumenda aspernatur eum aliquid? Nobis, expedita quae.
        </p>
        <p>
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo
          repudiandae quis illo, magni provident, aut ratione obcaecati
          voluptates beatae, atque neque aperiam? Temporibus veniam modi, eius
          hic numquam earum sequi voluptatem, amet voluptatum illum vel dolore
          recusandae blanditiis totam quam!
        </p>
      </div>
    </main>

 <?php incluirTemplate('footer');?>

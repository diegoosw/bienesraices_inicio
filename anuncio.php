<?php 
require 'includes/funciones.php';
incluirTemplate('header');
 ?>
    <main class="contenedor seccion contenido-centrado">
      <h1>Casa en Venta Frente al Bosque</h1>
      <picture>
        <source srcset="build/img/destacada.webp" type="image/webp" />
        <source srcset="build/img/destacada.jpg" type="image/jpeg" />
        <img
          loading="lazy"
          src="build/img/destacada.jpg"
          alt="anuncio de la propiedad"
        />
      </picture>
      <div class="resumen-propiedad">
        <p class="precio">$3,000,000</p>
        <ul class="iconos-caracteristicas">
          <li>
            <img
              class="icono"
              loading="lazy"
              src="build/img/icono_wc.svg"
              alt="icono wc"
            />
            <p>3</p>
          </li>
          <li>
            <img
              class="icono"
              loading="lazy"
              src="build/img/icono_estacionamiento.svg"
              alt="icono estacionamiento"
            />
            <p>3</p>
          </li>
          <li>
            <img
              class="icono"
              loading="lazy"
              src="build/img/icono_dormitorio.svg"
              alt="icono dormitorio"
            />
            <p>4</p>
          </li>
        </ul>
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
 
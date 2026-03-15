<?php
// Elige tu ruta dependiendo de tu servidor local
//$ruta = '/'; // Usa esta si usas Laragon (.test)
$ruta = '/bienesraices_inicio/'; // usa esta si usas XAMPP (localhost)
?>

<footer class="footer seccion">
  <div class="contenedor contenedor-footer">
    <nav class="navegacion">
      <a href="<?php echo $ruta; ?>nosotros.php">Nosotros</a>
      <a href="<?php echo $ruta; ?>anuncios.php">Anuncios</a>
      <a href="<?php echo $ruta; ?>blog.php">Blog</a>
      <a href="<?php echo $ruta; ?>contacto.php">Contacto</a>
    </nav>
  </div>
  <p class="copyright">Todos los derechos reservados <?php echo date('Y'); ?> &copy;</p>
</footer>
<script src="/build/js/bundle.min.js"></script>
</body>

</html>
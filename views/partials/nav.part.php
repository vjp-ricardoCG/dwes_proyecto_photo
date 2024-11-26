<!-- Navigation Bar -->



<nav class="navbar navbar-fixed-top navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand page-scroll" href="#page-top">
        <span>[PHOTO]</span>
      </a>
    </div>
    <div class="collapse navbar-collapse navbar-right" id="menu">
      <ul class="nav navbar-nav">
        <li class="lien <?php echo esOpcionMenuActiva('index.php') ? 'active' : ''; ?>">
          <a href="index.php"><i class="fa fa-home sr-icons"></i> Home</a>
        </li>
        <li class="lien <?php echo esOpcionMenuActiva('about.php') ? 'active' : ''; ?>">
          <a href="about.php"><i class="fa fa-bookmark sr-icons"></i> About</a>
        </li>
        <li class="lien <?php echo existeOpcionMenuActivaEnArray(['blog.php', 'single_post.php']) ? 'active' : ''; ?>">
          <a href="blog.php"><i class="fa fa-file-text sr-icons"></i> Blog</a>
        </li>
        <li class="lien <?php echo esOpcionMenuActiva('contact.php') ? 'active' : ''; ?>">
          <a href="contact.php"><i class="fa fa-phone-square sr-icons"></i> Contacto</a>
        <li class="lien <?php echo esOpcionMenuActiva('galeria.php') ? 'active' : ''; ?>">
          <a href="galeria.php"><i class="fa fa-solid fa-image"></i> Gallery</a>
          
        </li>
        <li class="lien <?php echo esOpcionMenuActiva('asociados.php') ? 'active' : ''; ?>">
          <a href="asociados.php"><i class="fa fa-hand-o-right"></i> Asociados</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <!-- End of Navigation Bar -->
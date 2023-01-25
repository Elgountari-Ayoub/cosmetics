<nav class="navbar navbar-expand-lg navbar-dark mb-3" style="background-color: #ea656d">
  <div class="container">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>/pages/index">
      <img src="<?php echo URLROOT   ?>/public/assets/images/productImages/logo.webp" alt=""
        style="width: 80px; height:80px; border-radius:20%">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link text-white" href="<?php echo URLROOT; ?>"><i class="fas fa-home"
              aria-hidden="true"></i>Home</a></a>
        </li>
        <li class="nav-item"></li>
        <a class="nav-link text-white" href="<?php echo URLROOT; ?>/pages/products"><i class="fas fa-shopping-cart"
            aria-hidden="true"></i> Products</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <?php if (isset($_SESSION['user_id'])) : ?>
        <li class="nav-item mr-4">
          <a class="nav-link text-light" href="<?php echo URLROOT; ?>/products/index"><i class="fas fa-cog"
              aria-hidden="true"></i>
            Products Managment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="<?php echo URLROOT; ?>/users/logout"><i class="fa fa-sign-out"
              aria-hidden="true"></i> Logout</a>
        </li>
        <?php else : ?>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo URLROOT; ?>/users/login"><i
              class="fa-solid fa-right-to-bracket px-2"></i>Login</a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
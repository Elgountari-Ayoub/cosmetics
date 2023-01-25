<?php require APPROOT . '/views/inc/header.php'; ?>
<?php $product = $data['Product'] ?>
<div class="container-fluid ">
  <section class="hero">
    <div class="jumbotron text-center" style="background-color: #ea656d">
      <h1 class="display-4">Welcome to our Cosmetics Store!</h1>
      <p class="lead">We have the best selection of cosmetics products.</p>
      <a href="<?php echo URLROOT; ?>/pages/products" class="btn btn-lg text-white"
        style="background-color: #99005c">Show
        All</a>
    </div>
  </section>
  <section id="popular-products" class="container">
    <h2 class="text-center">Popular Products</h2>
    <div class="row">
      <?php foreach ($data['Product'] as $i => $product) : ?>
      <div class="col-md-3 p-4">
        <div class="card d-flex align-items-center justify-content-center rounded">
          <div class="card-body">
            <img style="width: 100%;height:200px;" class="card-img-top" src="<?php echo URLROOT . '/public/assets/images/' . $product->image
                                                                                ?>" alt="Cosmitecs Product">
          </div>
          <h5 class="card-title product-title"><?php echo $product->title ?></h5>
          <p class="card-text px-4 text-center"><?php echo substr($product->description, 0, 40) ?> ...</p>
          <p class="card-text m-2"><?php echo $product->price ?>$</p>
        </div>
      </div>
      <?php endforeach; ?>

    </div>

    <!-- <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="product2.jpg" alt="Product 2">
          <div class="card-body">
            <h5 class="card-title">Product 2</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
            <a href="#" class="btn btn-primary">Add to Cart</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="product3.jpg" alt="Product 3">
          <div class="card-body">
            <h5 class="card-title">Product 3</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
            <a href="#" class="btn btn-primary">Add to Cart</a>
          </div>
        </div>
      </div> -->

</div>
</section>
<section class="container testimonials m-4">
  <h2 class="text-center m-4">Testimonials</h2>
  <div class="card-deck">
    <div class="card">
      <div class="card-body">
        <blockquote class="blockquote">
          <p class="mb-0">I have been using product 1 for a month now and I can already see a difference in my skin.
            It has never looked so good!</p>
          <footer class="blockquote-footer">Jane Doe</footer>
        </blockquote>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <blockquote class="blockquote">
          <p class="mb-0">I love product 2! It goes on smoothly and makes my makeup look flawless.</p>
          <footer class="blockquote-footer">John Smith</footer>
        </blockquote>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <blockquote class="blockquote">
          <p class="mb-0">I have been using product 3 for years and I will never switch to another brand. It works
            wonders on my sensitive skin.</p>
          <footer class="blockquote-footer">Samantha Johnson</footer>
        </blockquote>
      </div>
    </div>
  </div>
</section>


</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
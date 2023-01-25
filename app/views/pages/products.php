<?php require APPROOT . '/views/inc/header.php'; ?>

<section id="popular-products" class="container">
  <h2 class="text-center">Our Products</h2>
  <div class="row px-4">
    <input type="text" class="search rounded col-md-3" id="search-input" placeholder="Search for a product">
    <p class="not-found pl-4 mb-0 font-weight-bold" style="visibility: hidden;">Product not found!</p>
  </div>
  <div class="row">
    <?php foreach ($data['Product'] as $i => $product) : ?>
    <div class="col-md-3 p-4">
      <div class="card d-flex align-items-center justify-content-center ">
        <div class="card-body ">
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
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>
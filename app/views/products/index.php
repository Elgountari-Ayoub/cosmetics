<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
  <?php flash('product_message'); ?>
  <div class="row">
    <a class="col-md-4" href="<?php echo URLROOT; ?>/products/add"><button class="btn btn-success">Add
        Product</button></a>
    <div class="col-md-8  rounded border-secondary bg-danger text-light pt-1">
      <span class="total-products col-md-3 font-weight-bold  px-3 mt-1">Total Products :
        <?php echo ($data['totalProducts']) ?></span>
      <span class="total-products col-md-3 font-weight-bold  px-3 mt-1">Total Price :
        <?php echo ($data['totalPrice']) ?>4</span>
      <span class="max-price col-md-3 font-weight-bold px-3 mt-1">Max Price : <?php echo ($data['maxPrice']) ?>$</span>
      <span class="min-price col-md-3 font-weight-bold px-3 mt-1">Min Price : <?php echo ($data['minPrice']) ?>$</span>
    </div>
  </div>
  <div>
    <table class="table my-4">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">image</th>
          <th scope="col">title</th>
          <th scope="col">description</th>
          <th scope="col">price</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data['products'] as $i => $product) : ?>
        <tr>
          <th scope="row"><?php echo $i + 1 ?></th>
          <td class="logo ">
            <img style="width: 70px;height:70px; border-radius:50%"
              src="<?php echo URLROOT . '/public/assets/images/' . $product->image ?>" alt=" products image">
          </td>
          <td class="title"><?php echo $product->title ?></td>
          <td class=""><?php echo substr($product->description, 0, 40) ?>...</td>
          <td class="creationDate"><?php echo $product->price ?></td>
          <td class="action">
            <a href="<?php echo URLROOT; ?>/products/edit/<?php echo $product->id; ?>">
              <button class="btn btn-primary">Edit</button>
            </a>

            <a href="<?php echo URLROOT; ?>/products/delete/<?php echo $product->id; ?>">
              <button class="btn btn-danger">Delete</button>
            </a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
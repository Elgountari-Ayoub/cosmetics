<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container m-auto ">
  <a href="<?php echo URLROOT . '/products'; ?>" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i>
    Back</a>
  <!-- <pre>
  <?php //var_dump($data) 
  ?>
  <pre> -->
  <fieldset class="">
    <form class="m-auto pb-4" action="<?php echo URLROOT; ?>/products/add" method="POST" enctype="multipart/form-data"
      style="max-width: 80%;" name="product-container">
      <div class="products form_add">

        <div class="form-group">
          <label for="chooseLogo">Product image</label>
          <br>
          <input requireds type="file" class="form-control-file" name="images[]" multiple required>
        </div>

        <div class="form-group">
          <label for="full-name">Product title</label>
          <input type="text" class="form-control" name="title[]"
            <?php echo (!empty($data['title_err'][0])) ? 'is-invalid' : ''; ?>" required>
          <span class="invalid-feedback">aerber</span>
        </div>
        <div class="form-group">
          <label for="full-name">Product price</label>
          <input type="number" min="0" class="form-control" name="price[]" required>
        </div>
        <div class="form-group">
          <label for="full-name">Product description</label>
          <br>
          <textarea name="description[]" required id="" cols="20" style="width: 100%;" rows="2"></textarea>
        </div>
      </div>
      <div class="d-flex gap justify-content-center  pb-4">
        <button type="submit" class="btn btn-success mr-4">Save</button>
        <button onclick="addProduct()" id="btn" class="btn btn-primary ">Add one more product</button>
      </div>
    </form>
  </fieldset>


</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
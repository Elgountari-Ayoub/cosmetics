<?php require APPROOT . '/views/inc/header.php'; ?>
<?php $product = $data['Product'] ?>
<div class="container m-auto">
  <a href="<?php echo URLROOT . '/products'; ?>" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i>
    Back</a>
  <form class="member-form m-auto pb-4" action="<?php echo URLROOT; ?>/products/edit/<?php echo $product->id; ?>"
    method="POST" enctype="multipart/form-data" style="max-width: 80%;">

    <input value="<?php echo $product->id ?>" type="text" class="form-control d-none" name="id">
    <div class="form-group">
      <label for="chooseLogo">Product image</label>
      <br>
      <input type="file" class="form-control-file" name="image">
    </div>
    <div class="form-group">
      <label for="full-name">Product title</label>
      <input value="<?php echo $product->title ?>" type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
      <label for="full-name">Product price</label>
      <input value="<?php echo $product->price ?>" type="number" min="0" class="form-control" name="price">
    </div>
    <div class="form-group">
      <label for="full-name">Product description</label>
      <br>
      <textarea name="description" id="" cols="10" style="width: 100%;" rows="5" required>
<?php echo $product->description ?>
    </textarea>
    </div>

    <button type="submit" class="btn btn-primary">
      Edit
    </button>
  </form>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
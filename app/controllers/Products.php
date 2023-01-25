<?php
class Products extends Controller
{
  protected $productModel;
  protected $userModel;
  public function __construct()
  {
    if (!isset($_SESSION['user_id'])) {
      redirect('users/login');
    }
    // Load Models
    $this->productModel = $this->model('Product');
    $this->userModel = $this->model('User');
  }

  // Load All Posts
  public function index()
  {
    // Get product from model
    $product = $this->productModel->getProducts();
    $totalProducts = $this->productModel->getTotalProducts();
    $totalPrice = $this->productModel->getTotalPrice();
    $maxPrice = $this->productModel->getMaxPrice();
    $minPrice = $this->productModel->getMinPrice();
    $data = [
      'products' => $product,
      'totalProducts' => $totalProducts->total,
      'totalPrice' => $totalPrice->totalPrice,
      'maxPrice' => $maxPrice->maxPrice,
      'minPrice' => $minPrice->minPrice
    ];
    $this->view('products/index', $data);
  }

  // Show Single Post
  public function show($id)
  {
    $product = $this->productModel->getProductById($id);
    $user = $this->userModel->getUserById($product->id_admin);

    $data = [
      'product' => $product,
      'user' => $user
    ];

    $this->view('products/show', $data);
  }



  public function add()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'user_id' => $_SESSION['user_id'],
        'images' => $_FILES['images'],
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],

        'user_id_err' => '',
        'images_err' => [],
        'title_err' => [],
        'description_err' => [],
        'price_err' => [],
      ];

      // Loop through multiple products
      for ($i = 0; $i < count($data['title']); $i++) {
        // echo "gu";
        // Validate images
        if (empty($data['images']['name'][$i])) {
          $data['images_err'][$i] = 'Please select at least one image';
        } else if (count($data['images']['name']) != count($data['title'])) {
          $data['images_err'][$i] = 'Number of images should match the number of products';
        }
        // Validate Title
        if (empty($data['title'][$i])) {
          $data['title_err'][$i] = 'Please enter the product title';
        }
        // Validate description
        if (empty($data['description'][$i])) {
          $data['description_err'][$i] = 'Please enter the product description';
        }
        // Validate description
        if (empty($data['price'][$i])) {
          $data['price_err'][$i] = 'Please enter the product price';
        }
      }
      // Make sure there are no errors
      $hasError = false;
      for ($i = 0; $i < count($data['title']); $i++) {
        if (!empty($data['images_err'][$i]) || !empty($data['title_err'][$i]) || !empty($data['description_err'][$i]) || !empty($data['price_err'][$i])) {
          $hasError = true;
          break;
        }
      }

      if (!$hasError) {
        for ($i = 0; $i < count($data['title']); $i++) {
          //validate images
          $allowedImageTypes = array('jpeg', 'jpg', 'png', 'gif', 'svg');
          for ($j = 0; $j < count($data['images']['name']); $j++) {
            $fileType = strtolower(pathinfo($data['images']['name'][$j], PATHINFO_EXTENSION));
            if (!in_array($fileType, $allowedImageTypes)) {
              $data['images_err'][$j] = 'Invalid image type, only jpeg, jpg, png, gif, svg are allowed';
              $hasError = true;
              break;
            }
            if ($data['images']['size'][$j] > MAX_IMAGE_SIZE) {
              $data['images_err'][$j] = 'Image size should be less than ' . MAX_IMAGE_SIZE / 1000000 . 'MB';
              $hasError = true;
              break;
            }
          }
          if (!$hasError) {
            for ($j = 0; $j < count($data['images']['name']); $j++) {
              $imgPath = 'productImages/' . $data["images"]["name"][$j];
              move_uploaded_file($data["images"]["tmp_name"][$j], APP . '/public/assets/images/' . $imgPath);
              $data['images'][$j] = $imgPath;
            }
            $productData = [
              'user_id' => $data['user_id'],
              'images' => $data['images'][$i],
              'title' => $data['title'][$i],
              'description' => $data['description'][$i],
              'price' => $data['price'][$i],
            ];
            if (!$this->productModel->addProduct($productData)) {
              die('Something went wrong');
            }
          }
        }
        if (!$hasError) {
          // Redirect to products page
          flash('products_added', 'Products Added');
          redirect('products');
        } else {
          // Load view with errors
          $this->view('products/add', $data);
        }
      } else {
        $this->view('products/add', $data);
      }
    } else {
      $data = [
        'user_id' => '',
        'images' => '',
        'title' => '',
        'description' => '',
        'price' => '',
      ];
      $this->view('products/add', $data);
    }
  }


  public function edit($id)
  {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'id' => trim($_POST['id']),
        'id_admin' => $_SESSION['user_id'],
        'image' => ($_FILES['image']),
        'title' => trim($_POST['title']),
        'description' => trim($_POST['description']),
        'price' => floatval($_POST['price']),

        'user_id_err' => '',
        'image_err' => '',
        'title_err' => '',
        'description_err' => '',
        'price_err' => '',
      ];

      // Validate image
      if (empty($data['description'])) {
        $data['description_err'] = 'Please enter the product description';
      }
      // Validate title
      if (empty($data['title'])) {
        $data['title_err'] = 'Please enter product title';
      }
      // Validate description
      if (empty($data['description'])) {
        $data['description_err'] = 'Please enter the product description';
      }
      // Validate description
      if (empty($data['description'])) {
        $data['description_err'] = 'Please enter the product description';
      }



      // Make sure there are no errors
      if (empty($data['title_err']) && empty($data['body_err'])) {
        // Validation passed
        $imgPath =  'productImages/' . $data["image"]["name"];

        move_uploaded_file($data["image"]["tmp_name"], APP . '/public/assets/images/' . $imgPath);
        $data['image'] = $imgPath;

        //Execute
        if ($this->productModel->updateProduct($data)) {
          // Redirect to login
          flash('product_message', 'Product Updated');
          redirect('products');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('products/edit', $data);
      }
    } else {


      // Get product from model
      $product = $this->productModel->getProductById($id);

      // Check for owner
      if ($product->id_admin != $_SESSION['user_id']) {
        redirect('products');
      }

      $data = [
        'Product' => $product
        // 'id' => $id,
        // 'title' => $product->title,
        // 'image' => $product->image,
        // 'description' => $product->description,
        // 'price' => $product->price,
      ];

      $this->view('products/edit', $data);
    }
  }

  // Delete Post
  public function delete($id)
  {

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
      //Execute
      if ($this->productModel->deleteProduct($id)) {
        // Redirect to login
        flash('product_message', 'Product Removed');
        redirect('products');
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('products');
    }
  }
}
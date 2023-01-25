<?php
class Pages extends Controller
{
  protected $productModel;
  protected $userModel;
  public function __construct()
  {
    $this->productModel = $this->model('Product');
    $this->userModel = $this->model('User');
  }

  // Load Homepage
  public function index()
  {

    // Get product from model
    $product = $this->productModel->getProducts();
    $data = [
      'Product' => $product
      // 'id' => $id,
      // 'title' => $product->title,
      // 'image' => $product->image,
      // 'description' => $product->description,
      // 'price' => $product->price,
    ];

    $this->view('pages/index', $data);
  }
  public function products()
  {

    // Get product from model
    $product = $this->productModel->getProducts();
    $data = [
      'Product' => $product
    ];
    $this->view('pages/products', $data);
  }

  public function about()
  {
    //Set Data
    $data = [
      'version' => '1.0.0'
    ];

    // Load about view
    $this->view('pages/about', $data);
  }
}
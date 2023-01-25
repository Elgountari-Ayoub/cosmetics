<?php
class Product
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // Get All Posts
  public function getProducts()
  {
    $this->db->query("SELECT * FROM products");

    $results = $this->db->resultset();

    return $results;
  }

  // Get Product By ID
  public function getProductById($id)
  {
    $this->db->query("SELECT * FROM products WHERE id = :id");

    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }

  //SELECT count(*) as 'Total Prooducts', MAX(price) as 'Max Price', MIN(price) as 'Min Price'FROM `products`;
  //SELECT count(*) as 'Total Prooducts'FROM `products`;
  public function getTotalProducts()
  {
    $this->db->query("SELECT count(*) as 'total' FROM products");
    $row = $this->db->single();
    return $row;
  }
  public function getMaxPrice()
  {
    $this->db->query("SELECT MAX(price) as 'maxPrice' FROM products");
    $row = $this->db->single();
    return $row;
  }
  public function getMinPrice()
  {
    $this->db->query("SELECT MIN(price) as 'minPrice' FROM products");
    $row = $this->db->single();
    return $row;
  }
  public function getTotalPrice()
  {
    $this->db->query("SELECT SUM(price) as 'totalPrice' FROM products");
    $row = $this->db->single();
    return $row;
  }

  // Add Product
  public function addProduct($data)
  {
    // Prepare Query
    $this->db->query('INSERT INTO products (id_admin, title, description, image, price) 
      VALUES (:id_admin, :title, :description, :image, :price)');

    //the image manipulation;

    // Bind Values
    echo '<pre>';
    var_dump($data);
    echo '<pre>';
    $this->db->bind(':id_admin', $data['user_id']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':description', $data['description']);
    $this->db->bind(':image', $data['images']); //Not like that
    $this->db->bind(':price', $data['price']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Update Product
  public function updateProduct($data)
  {

    if ($data['image'] === 'productImages/') {
      $this->db->query('UPDATE products SET id_admin = :id_admin, title = :title, 
    description = :description, price = :price WHERE id = :id');
    } else {
      // Prepare Query
      $this->db->query('UPDATE products SET id_admin = :id_admin, title = :title, 
    description = :description, image = :image, price = :price WHERE id = :id');
      $this->db->bind(':image', $data['image']);
    }

    // Bind Values
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':id_admin', $data['id_admin']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':description', $data['description']);
    $this->db->bind(':price', $data['price']);
    $this->db->bind(':id', $data['id']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Delete Product
  public function deleteProduct($id)
  {
    // Prepare Query
    $this->db->query('DELETE FROM products WHERE id = :id');

    // Bind Values
    $this->db->bind(':id', $id);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}

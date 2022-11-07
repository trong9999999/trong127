<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';
?>


<?php



class product
{
  private $db;
  private $fm;
  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }
  public function insert_product($data, $files)
  {


    $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
    $category = mysqli_real_escape_string($this->db->link, $data['category']);
    $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
    $productdesc = mysqli_real_escape_string($this->db->link, $data['productdesc']);
    $price = mysqli_real_escape_string($this->db->link, $data['price']);
    $type_1 = mysqli_real_escape_string($this->db->link, $data['type_1']);

    // Kiem tre hinh anh va lay hinh anhcho vao folder upload
    $permited = array('jpg', 'jpeg', 'png', 'gif');
    $file_name_1 = $_FILES['image_1']['name'];
    $file_size = $_FILES['image_1']['size'];
    $file_temp = $_FILES['image_1']['tmp_name'];

    $div = explode('.', $file_name_1);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
    $uploaded_image = "uploads/" . $unique_image;

    if ($productName == "" || $category == "" ||  $brand == "" || $productdesc == "" || $price == "" || $type_1 == "" || $file_name_1 == "") {
      $alert = "<span class='error'>Files must be not empty</span>";
      return $alert;
    } else {
      move_uploaded_file($file_temp, $uploaded_image);
      $query = "INSERT INTO `tbl_product`( `productName`, `catId`, `brandId`, `productdesc`, `type_1`, `price`, `image_1`) VALUES ('$productName','$category','$brand','$productdesc','$type_1','$price','$unique_image')";
      $result = $this->db->insert($query);
      if ($result) {
        $alert = "<span class='success'>Insert Product Successfully</span>";
        return $alert;
      } else {
        $alert = "<span class='error'>Insert Product Not Successfully</span>";
        return $alert;
      }
    }
  }
  public function show_product()
  {
    $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
        FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
        INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
        order by tbl_product.productId desc";
    $result = $this->db->select($query);
    return $result;
  }


  public function update_product($data, $files, $id)
  {

    $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
    $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
    $category = mysqli_real_escape_string($this->db->link, $data['category']);
    $productdesc = mysqli_real_escape_string($this->db->link, $data['productdesc']);
    $price = mysqli_real_escape_string($this->db->link, $data['price']);
    $type_1 = mysqli_real_escape_string($this->db->link, $data['type_1']);
    // Kiem tre hinh anh va lay hinh anhcho vao folder upload
    $permited = array('jpg', 'jpeg', 'png', 'gif');
    $file_name_1 = $_FILES['image_1']['name'];
    $file_size = $_FILES['image_1']['size'];
    $file_temp = $_FILES['image_1']['tmp_name'];

    $div = explode('.', $file_name_1);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
    $uploaded_image = "uploads/" . $unique_image;


    if ($productName == "" || $brand == "" || $category == "" ||   $productdesc == "" || $price == "" || $type_1 == "") {
      $alert = "<span class='error'>Files must be not empty</span>";
      return $alert;
    } else {
      if ($file_name_1) {
        // neu nguoi dung chon anh
        if ($file_size > 1009600) {
          $alert = "<span class='success'>Image Size should be less hen 2MB!</span>";
          return $alert;
        } else if (in_array($file_ext, $permited) === false) {

          $alert = "<span class='success'>You can upload only:-" . implode(', ', $permited) . "</span>";
          return $alert;
        }
        move_uploaded_file($file_temp, $uploaded_image);
        $query = "UPDATE tbl_product SET 
             productName = '$productName',
             brandId = '$brand',
             catId = '$category',
             type_1 = '$type_1',
             price = '$price',
             image_1 = '$unique_image',
             productdesc = '$productdesc'
             WHERE productId = '$id'";
      } else {
        //neu nguoi dung khong chon anh
        $query = "UPDATE tbl_product SET
             
             productName = '$productName',
             brandId = '$brand',
             catId = '$category',
             type_1 = '$type_1',
             price = '$price',
            
             productdesc = '$productdesc'
             WHERE productId = '$id'";
      }



      $result = $this->db->update($query);
      if ($result) {
        $alert = "<span class='success'>Product Upload Successfully</span>";
        return $alert;
      } else {
        $alert = "<span class='error'>Product Upload Not Successfully</span>";
        return $alert;
      }
    }
  }
  public function del_product($id)
  {
    $query = "DELETE FROM tbl_product WHERE productId = '$id'";
    $result = $this->db->delete($query);
    if ($result) {
      $alert = "<span class='success'>Insert Deleted Successfully</span>";
      return $alert;
    } else {
      $alert = "<span class='error'>Insert Deleted Not Successfully</span>";
      return $alert;
    }
  }
  public function getproductbyId($id)
  {
    $query = "SELECT * FROM tbl_product WHERE productId = '$id'";
    $result = $this->db->select($query);
    return $result;
  }
}


?>
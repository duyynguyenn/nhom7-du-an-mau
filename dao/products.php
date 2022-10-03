<?php
// lấy nhiều
function product_select_all()
{
  $sql = "SELECT * FROM products";
  return  pdo_query($sql);
}
//lấy 1
function product_select_by_id($id)
{
  $sql = "SELECT * FROM products Where id = ?";
  return pdo_query_one($sql, $id);
}
//thêm
function product_insert($name, $price, $quantity, $featured, $active, $description, $category_id, $voucher_id, $brand_id)
{
  $sql = "INSERT INTO products (name, price,quantity, featured, active, description, category_id, voucher_id, brand_id) values(?,?,?,?,?,?,?,?,?)";
  pdo_execute($sql, $name, $price, $quantity, $featured, $active, $description, $category_id, $voucher_id, $brand_id);
}
//sửa
function product_update($id, $name, $price, $quantity, $featured, $active, $description, $category_id, $voucher_id, $brand_id)
{
  $sql = "UPDATE products SET name = ?, price = ?, quantity = ?, featured = ?, active = ?, description = ?, category_id = ?, voucher_id = ?, brand_id = ? where id = ?";
  pdo_execute($sql, $name, $price, $quantity, $featured, $active, $description, $category_id, $voucher_id, $brand_id, $id);
}
//xoá
function product_delete($id)
{
  $sql = "DELETE FROM products WHERE id = ?";
  if (is_array($id)) {
    foreach ($id as $item) {
      pdo_execute($sql, $item);
    }
  }
  pdo_execute($sql, $id);
}


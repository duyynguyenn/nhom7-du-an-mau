<?php
require_once 'base_dao.php';
// lấy toàn bộ dữ liệu của bảng
function recipients_select_all()
{
  $sql = "SELECT * FROM recipients";
  return  pdo_query($sql);
}
//lấy 1 bản ghi dựa vào id
function recipients_select_by_id($id)
{
  $sql = "SELECT * FROM recipients Where id = ?";
  return pdo_query_one($sql, $id);
}
//thêm dữ liệu vào bảng
function recipients_insert($name, $phone, $address, $user_id)
{
  $sql = "INSERT INTO recipients (name, phone,address, user_id) values(?,?,?,?,?)";
  pdo_execute($sql,$name, $phone, $address, $user_id);
}
//cập nhập dữ liệu dựa vào id
function recipients_update($id, $name, $phone, $address, $user_id)
{
  $sql = "UPDATE recipients SET name = ?, phone =?, address =?, user_id =? where id = ?";
  pdo_execute($sql, $name, $phone, $address, $user_id, $id);
}
//xoá bản ghi dựa vào id
function recipients_delete($id)
{
  $sql = " delete from recipients where id = ? " ;
  pdo_execute ( $sql , $id ) ;
}
?>
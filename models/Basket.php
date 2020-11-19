<?php
namespace app\models;

class Basket extends Model
{
    public function getTableName(): string
    {
        return "basket";
    }
    public function getIdis() {
        $productIds = array_filter(
            array_keys($_SESSION['basket']),
            function ($element) {
                return is_int($element);
            }
        );
    }

    public function getAll(array $productIds = [])
    {
        $where = '';
            if(!empty($productIds)) {
                $in = implode(', ', $productIds);
                $where = "WHERE id IN ($in)";
                $sql = "SELECT * FROM {$this->tableName} {$where}";
            }
    return $this->db->queryAll($sql);
    }
    public function addProduct() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $productId = $_POST['id'];
            $productQty = $_POST['qty'];
            
            if(isset($_SESSION['basket'][$productId])) {
                $_SESSION['basket'][$productId] +=$productQty;
                      
            }else {
                $_SESSION['basket'][$productId] = $productQty;
               
            }  
        }
    }
    public function changeQty() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $newData = $_POST['quantity'];
            
            foreach($newData as $key => $val) {
                if($val == 0) {
                    unset($_SESSION['basket'][$key]);
                    
                } else {
                    $_SESSION['basket'][$key] = $val;
                   
                }
            }
        }
    }

    
}
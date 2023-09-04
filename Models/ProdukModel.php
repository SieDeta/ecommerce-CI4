<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
     protected $table                = 'tabel_barang';
     protected $primaryKey           = 'id';
     protected $useAutoIncrement = true;
     protected $allowedFields      = ['nama', 'harga', 'jumlah', 'keterangan','foto'];

     public function decreaseStock($id, $quantity)
    {
        $this->set('jumlah', "jumlah - $quantity", false)->where('id', $id)->update();
    }
}

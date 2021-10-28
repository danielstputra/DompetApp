<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    public $table = "transaksi";

    protected $primaryKey = 'trx_id';
    
    public $timestamps = true;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'trx_code',
        'trx_description',
        'trx_value',
        'dompet_id',
        'cat_id',
        'trx_status_id'
    ];

    //function membuat format id baru berbentuk 00001
    public function get_newid($auto_id){
        $newId = substr($auto_id, 1,4);
        $tambah = (int)$newId + 1;

        if (strlen($tambah) == 1){
            $id_mobil = "00000" .$tambah;
        }
        else if (strlen($tambah) == 2){
            $id_mobil = "0000" .$tambah;
        }
        else if(strlen($tambah) == 3){
            $id_mobil = "000".$tambah;   
        }
        else if (strlen($tambah) == 4){
            $id_mobil = "00" .$tambah;
        }
        else if(strlen($tambah) == 5){
            $id_mobil = "0" .$tambah;
        }
        else if(strlen($tambah) == 6){
            $id_mobil = $tambah;   
        }
        return $id_mobil;
    }
}

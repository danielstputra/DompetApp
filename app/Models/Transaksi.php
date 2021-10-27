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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DompetStatus extends Model
{
    use HasFactory;

    public $table = "dompet_status";

    protected $primaryKey = 'status_id';
    
    public $timestamps = true;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status_name'
    ];
}

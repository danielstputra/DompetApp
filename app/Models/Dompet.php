<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dompet extends Model
{
    use HasFactory;

    public $table = "dompet";

    protected $primaryKey = 'id';
    
    public $timestamps = true;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'reference',
        'description',
        'dompet_status_id'
    ];
}

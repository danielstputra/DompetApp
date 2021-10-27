<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dompet extends Model
{
    use HasFactory;

    public $table = "dompet";

    protected $primaryKey = 'dompet_id';
    
    public $timestamps = true;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dompet_name',
        'dompet_reference',
        'dompet_description',
        'dompet_status_id'
    ];
}

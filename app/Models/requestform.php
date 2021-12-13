<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requestform extends Model
{
    use HasFactory;

    protected $table   = 'requestforms';
    protected $guarded = ['id'];
    protected $dates   = ['created_at, updated_at'];
    
    public function getservicetype(){
        return $this->hasOne('servicetype', 'id');
      }
}

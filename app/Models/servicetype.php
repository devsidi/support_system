<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicetype extends Model
{
    use HasFactory;

    protected $table   = 'servicetypes';
    protected $guarded = ['id'];
    protected $dates   = ['created_at, updated_at'];

}

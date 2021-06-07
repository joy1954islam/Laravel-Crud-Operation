<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    protected $fillable = [
        'user_id',
        'category_name',
    ];
    public function user()
    {
        return $this->hasOne(User::class,'id', 'user_id');
    }

    use HasFactory;
    use SoftDeletes;
}

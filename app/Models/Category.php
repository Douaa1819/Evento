<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use SoftDeletes;
    protected $table = 'categories';
    protected $fillable = ['nom'];

public function evenements()
{
    return $this->hasMany(Evenement::class)->where('admin_validation', 1);
}

}




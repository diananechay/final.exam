<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roles extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['name'];

    public function user() {
        return $this->hasMany(User::class);
    }
}

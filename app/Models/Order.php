<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Order extends Model
{
    //
     protected $fillable=['vacancy_id','user_id'];

    public static function boot()
    {

        parent::boot();

        static::creating(function ($table) {
            if(Auth::user()) {
                $table->user_id = Auth::user()->id;
            }
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function vacancy(){
        return $this->belongsTo(Vacancy::class);
    }

}

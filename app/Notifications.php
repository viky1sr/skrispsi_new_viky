<?php

namespace App;

use App\HomeCare\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','data'];
    protected $casts = [
        'data' => 'array'
    ];

    public function user(){
        return $this->hasOne(User::class,'id','user_id')
            ->select('id','full_name','email','number_phone');
    }
}

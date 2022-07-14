<?php

namespace App\HomeCare\MasterHomeCare;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterHomeCare extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'master_home_cares';
    protected $fillable = ['name','price'];
    protected $dates = ['deleted_at'];
}

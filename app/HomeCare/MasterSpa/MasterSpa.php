<?php

namespace App\HomeCare\MasterSpa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterSpa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'master_spas';
    protected $fillable = ['name','price'];
    protected $dates = ['deleted_at'];
}

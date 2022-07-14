<?php

namespace App\MasterFile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterFile extends Model
{
    use HasFactory, SoftDeletes;
}

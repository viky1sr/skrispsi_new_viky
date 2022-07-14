<?php

namespace App\HomeCare\Payment;

use App\HomeCare\MasterStatus\MasterStatus;
use App\HomeCare\User\User;
use App\MasterFile\MasterFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'payments';
    protected $fillable = ['user_id','file_id','status_id','updated_by'];
    protected $dates = 'deleted_at';

    public function getFile() {
        return $this->hasOne(MasterFile::class,'id','file_id')
            ->select('id','name','address','path');
    }

    public function getUser() {
        return $this->hasOne(User::class,'id','user_id')
            ->select('id','full_name','number_phone');
    }

    public function getStatus() {
        return $this->hasOne(MasterStatus::class,'id','status_id')
            ->select('id','name');
    }

}

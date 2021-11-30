<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LisensiModel extends Model
{
    protected $connection = "mysql";
    protected $table = "lisensi";
    public $timestamps = false;

    public function status()
    {
        return $this->hasOne('App\Models\StatusModel', 'id', 'status_id');
    }
}

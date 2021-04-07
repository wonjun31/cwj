<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like_status extends Model
{
    use HasFactory;

    protected $primaryKey = 'like_no';
    public $table = "like_status";

    //타임테이블 확인 -펄스
    public $timestamps = false;

    protected $fillable = [
        'like_no','board_no', 'email', 'status',
    ];
}

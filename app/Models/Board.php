<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $primaryKey = 'board_no';
    public $table = "board";

    //타임테이블 확인 -펄스
    public $timestamps = false;

    protected $fillable = [
        'board_no','title', 'content', 'views','writer',
    ];
}

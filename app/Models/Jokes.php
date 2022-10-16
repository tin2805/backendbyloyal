<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jokes extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'joke_status','joke_desc'
    ];
    protected $primaryKey = 'joke_id';
    protected $table = 'create_tbl_jokes';
}

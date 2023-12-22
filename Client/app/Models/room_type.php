<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room_type extends Model
{
    use HasFactory;
    protected $table = 'room_type';

    public function images(){
        return $this->hasMany(img_room_type::class, 'room_type_id');
    }
}

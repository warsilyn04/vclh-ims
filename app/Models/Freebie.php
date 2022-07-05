<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freebie extends Model
{
    use HasFactory;

    protected $table = 'freebies';
    public $primaryKey = 'id';
    public $timestamp = true;

    public function room_rates() {
        return $this->hasMany('App\Models\RoomRate');
    }
}

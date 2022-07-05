<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomRate extends Model
{
    use HasFactory;

    protected $table = 'room_rates';
    public $primaryKey = 'id';
    public $timestamp = true;

    public function freebie() {
        return $this->belongsTo('App\Models\Freebie');
    }
}

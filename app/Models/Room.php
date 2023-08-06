<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'rooms';
    protected $fillable = [
        'id','name','image','capacity','services','description','price','type_id'
    ];
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

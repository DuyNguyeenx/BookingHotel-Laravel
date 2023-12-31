<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $table = 'types';
		protected $fillable = [
			'id', 'name',
		];
        public function room()
        {
            return $this->hasMany(Room::class);
        }
}

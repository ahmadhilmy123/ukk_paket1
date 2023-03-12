<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    protected $table = 'spp';
   
    protected $fillable = [
         'tahun', 'nominal'
    ];
   
    /**
   * Belongs To Spp -> User
   *
   * @return void
   */
   public function user()
   {
         return $this->belongsTo(User::class);
   }
}

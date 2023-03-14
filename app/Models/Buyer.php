<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
  use HasFactory;

  public function tiket()
  {
    return $this->hasOne(Tiket::class);
  }
}

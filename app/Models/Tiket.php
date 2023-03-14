<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  public function buyer()
  {
    return $this->belongsTo(Buyer::class);
  }
  public function concert()
  {
    return $this->belongsTo(Concert::class);
  }
}

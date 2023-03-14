<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiketsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('tikets', function (Blueprint $table) {
      $table->id();
      $table->integer("price");
      $table->foreignId("concert_id");
      $table->foreignId("buyer_id");
      $table->boolean("is_used")->default("0");
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('tikets');
  }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tiket;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // \App\Models\User::factory(10)->create();
    //buat seeder user admin
    User::create([
      'name' => "admin",
      'email' => "admin@gmail.com",
      'email_verified_at' => now(),
      'password' => Hash::make('123'),
    ]);

    User::create([
      'name' => "user1",
      'email' => "user1@gmail.com",
      'email_verified_at' => now(),
      'password' => Hash::make('123'),
    ]);

    // Tiket::factory(3)->create();

  }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    DB::table('addressbook')->delete();

    $addressbook = array(
      ['id' => 1, 'name' => 'Adam Mason', 'phone' => 3134954327, 'address' => '3624 Cornell St. Dearborn, MI 48124', 'email' => 'adam.mason86@gmail.com'],
      ['id' => 2, 'name' => 'Homer Simpson', 'phone' => 5557334, 'address' => '742 Evergreen Terr. Springfield, USA', 'email' => 'chunkylover53@aol.com'],
      ['id' => 3, 'name' => 'Peter Griffin', 'phone' => 4015551125, 'address' => '31 Spooner St. Quahog, RI', 'email' => '']
    );

    DB::table('addressbook')->insert($addressbook);
  }
}

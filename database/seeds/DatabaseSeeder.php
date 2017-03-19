<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    DB::table('addressbook')->delete();

    $contacts = array(
      ['id' => 1, 'name' => 'Adam Mason', 'phone' => 3134954327, 'address' => '3624 Cornell St. Dearborn, MI 48124', 'email' => 'adam.mason86@gmail.com'],
      ['id' => 1, 'name' => 'Homer Simpson', 'phone' => 5557334, 'address' => '742 Evergreen Terrace Springfield, USA', 'email' => 'chunkylover53@aol.com'],
      ['id' => 1, 'name' => 'Peter Griffin', 'phone' => 4015551125, 'address' => '31 Spooner St. Quahog, RI', 'email' => '']
    );

    DB::table('addressbook')->insert($contacts);
  }
}

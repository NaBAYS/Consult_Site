<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RolesTableSeed::class);
         $this->call(UsersTableSeed::class);
         $this->call(FileCategoriesTableSeed::class);
         $this->call(TagsTableSeed::class);
         $this->call(FileUploadSeed::class);
    }
}

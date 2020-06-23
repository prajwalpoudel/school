<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(MenuGroupTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(EmailTemplateTableSeeder::class);
    }
}

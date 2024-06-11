<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Создание ролей
        DB::table('roles')->insert([
            ['role_name' => 'admin'],
            ['role_name' => 'moderator'],
        ]);

        // Получение ID ролей
        $adminRoleId = DB::table('roles')->where('role_name', 'admin')->first()->id;
        $moderatorRoleId = DB::table('roles')->where('role_name', 'moderator')->first()->id;

        // Создание пользователей
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => Hash::make('password'),
            'role_id' => $adminRoleId,
        ]);

        DB::table('users')->insert([
            'username' => 'moderator',
            'password' => Hash::make('password'),
            'role_id' => $moderatorRoleId,
        ]);

        // Создание категорий
        DB::table('categories')->insert([
            ['category_name' => 'Technology'],
            ['category_name' => 'Health'],
        ]);

        // Создание постов
        DB::table('posts')->insert([
            [
                'title' => 'First Post',
                'content' => 'Content of the first post',
                'visibility' => true,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Second Post',
                'content' => 'Content of the second post',
                'visibility' => false,
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

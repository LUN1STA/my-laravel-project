<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'test@example.com')->first();

        $moderatorRole = Role::where('name', 'moderator')->first();

        if ($user && $moderatorRole) {
            $user->role()->associate($moderatorRole);
            $user->save();
        }
    }
}

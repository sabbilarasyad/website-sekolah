<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ResetPasswordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultPassword = 'password123';
        $users = User::all();

        $this->command->info("Resetting passwords for {$users->count()} users to '$defaultPassword'...");

        foreach ($users as $user) {
            $user->password = Hash::make($defaultPassword);
            $user->save();
            $this->command->line("Updated: {$user->username} ({$user->role})");
        }

        $this->command->info("Done! Updated {$users->count()} users.");
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InitialAdminSeeder extends Seeder
{
    /**
     * Seed the initial company, branch, and root user.
     */
    public function run(): void
    {
        $company = DB::table('companies')->where('slug', 'admin')->first();
        if (!$company) {
            $companyId = DB::table('companies')->insertGetId([
                'name' => 'Admin',
                'slug' => 'admin',
                'is_root' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            $companyId = $company->id;
        }

        $branch = DB::table('branches')->where('cnpj', '40886443000146')->first();
        if (!$branch) {
            $branchId = DB::table('branches')->insertGetId([
                'company_id' => $companyId,
                'cnpj' => '40886443000146',
                'name' => 'Filial 1',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            $branchId = $branch->id;
        }

        $user = DB::table('users')->where('email', 'rsddossantos@gmail.com')->first();
        if (!$user) {
            DB::table('users')->insert([
                'name' => 'Rodrigo Santos',
                'email' => 'rsddossantos@gmail.com',
                'password' => Hash::make('020302@Rn'),
                'is_root' => true,
                'company_id' => $companyId,
                'branch_id' => $branchId,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        if(tenant()){

            \App\Models\User::factory()->create([
                'name' => tenant()->id . ' User',
                'email' => tenant()->id . '@example.com',
            ]);

        } else {
            $tenant = \App\Models\Tenant::query()->create(['id' => 'foo']);
            $tenant->domains()->create(['domain' => 'foo.saas.test']);

            $tenant = \App\Models\Tenant::query()->create(['id' => 'bar']);
            $tenant->domains()->create(['domain' => 'bar.saas.test']);
        }
    }
}

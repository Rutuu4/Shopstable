<?php

namespace App\Jobs;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateTenantAdmin implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public Tenant $tenant)
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Log::info('creating default user...');
        $this->tenant->run(function ($tenant) {

            $tenant_data = (array) json_decode(json_encode($tenant));
            // dd($tenant_data['password']);
            User::factory()->create([
                'name' => $tenant_data['name'],
                'email' => $tenant_data['email'],
                'password' => $tenant_data['password'],
            ]);
        });
    }
}

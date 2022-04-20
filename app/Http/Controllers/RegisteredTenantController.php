<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisteredTenantRequest;
use App\Models\Tenant as ModelsTenant;

class RegisteredTenantController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store(RegisteredTenantRequest $request)
    {
        // $tenant = (array) json_decode(json_encode($this->tenant));
        // dd($tenant[0]->name);
        // dd('cacaca');

        $tenant = ModelsTenant::create($request->validated());

        $tenant->createDomain(['domain' => $request->domain]);
        // $tenant = ModelsTenant::domains()->create(['domain' => $request->domain]);
        // return redirect()->away();
    }

}

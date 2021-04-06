<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class InitDataController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if($user->id === 1)
        {
            Role::create(['name' => 'Client']);
            Role::create(['name' => 'Super Admin']);

            $user->assignRole('Super Admin');

        }
    }
}

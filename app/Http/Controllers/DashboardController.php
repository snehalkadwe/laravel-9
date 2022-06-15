<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class DashboardController extends Controller
{
    public function index()
    {
        // dd(User::all());
        // $s = QueryBuilder::for(User::class)->allowedFilters(
        //     AllowedFilter::custom('search', new CustomFilterName)
        // );
        // $s = User::select(
        //     DB::raw('SUM(id) as count')
        // )->first();

        $users = auth()->user()->member()->get();
        return Inertia::render('Dashboard', [
            'users' => $users,
        ]);
    }

    public function impersonateUser(User $user)
    {
        auth()->user()->impersonate($user);
        return redirect()->route('dashboard');
    }

    public function leaveImpersonateUser()
    {
        auth()->user()->leaveImpersonation();
        return redirect()->route('dashboard');
    }
}

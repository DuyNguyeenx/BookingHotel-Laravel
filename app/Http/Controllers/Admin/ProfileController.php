<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index() {
        $user = \Illuminate\Support\Facades\Auth::user();
		return view('admin.profile.index', compact('user'));
    }
}

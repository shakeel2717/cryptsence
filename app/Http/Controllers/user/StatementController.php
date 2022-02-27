<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatementController extends Controller
{
    public function deposits()
    {
        return view('user.dashboard.statement.deposits');
    }
}

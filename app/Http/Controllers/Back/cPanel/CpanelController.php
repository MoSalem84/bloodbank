<?php

namespace App\Http\Controllers\Back\cPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CpanelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        return view('back.admin.cpanel.home');
    }

   
    }

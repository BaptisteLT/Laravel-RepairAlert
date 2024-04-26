<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    public function showAndCreate(): View
    {
        

        return view('repair.parts', [
            
        ]);
    }
}

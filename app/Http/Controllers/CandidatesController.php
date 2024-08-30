<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class CandidatesController extends Controller
{
    public function index(Vacancy $vacancy){
        return view('candidates.index',[
            'vacancy' => $vacancy
        ]);
    }
}

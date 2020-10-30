<?php

namespace App\Http\Controllers;

use App\Program;

class ProgramController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $programs = Program::query()->paginate(5);

        return view('programs.index', ['programs' => $programs]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('programs.create');
    }
}

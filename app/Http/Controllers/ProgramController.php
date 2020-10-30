<?php

namespace App\Http\Controllers;

use App\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $programs = Program::query()->get();

        return view('programs.index', ['programs' => $programs]);
    }

    public function stepOne(Request $request)
    {
        dd($request->all());
        return redirect()->route('program.stepTwo');
    }

}

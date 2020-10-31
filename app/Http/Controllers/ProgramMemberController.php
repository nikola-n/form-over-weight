<?php

namespace App\Http\Controllers;

use App\Program;
use App\Trainer;
use App\ProgramMember;
use Illuminate\Http\Request;
use App\Http\Requests\ProgramMemberRequest;

class ProgramMemberController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $program_members = ProgramMember::paginate(5);

        return view('program_members.index', compact('program_members'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', ProgramMember::class);

        $trainers = Trainer::query()->get();

        return view('program_members.create', compact('trainers'));
    }

    /**
     * @param \App\Http\Requests\ProgramMemberRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProgramMemberRequest $request)
    {
        $user = auth()->user();

        $programMembers = ProgramMember::where('member_id', $user->member->id)->get();

        foreach ($programMembers as $programMember) {
            if (($programMember->start_date <= $request->start_date)
                || ($programMember->end_date >= $request->end_date)) {
                flash()->warning("You selected invalid dates, you are attending to <a href='/programsmembers'>training</a> that day!");
                return back();
            }
        }

        ProgramMember::create([
            'start_date' => $request->start_date,
            'end_date'   => $request->end_date,
            'program_id' => $request->program_id,
            'trainer_id' => $request->trainer_id,
            'member_id'  => auth()->id(),
        ]);

        flash()->success('You have successfully applied to this program!');

        return redirect()->route('programsmembers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ProgramMember $programsmember
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(ProgramMember $programsmember)
    {
        $trainers = Trainer::query()->get();

        return view('program_members.edit', compact('programsmember', 'trainers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @param \App\ProgramMember       $programsmember
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, ProgramMember $programsmember)
    {
        $programsmember->update($request->all());

        flash()->success('Program updated!');

        return redirect()->route('programsmembers.index', compact('programsmember'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ProgramMember $programsmember
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(ProgramMember $programsmember)
    {
        $programsmember->delete();

        flash()->warning("You have unsubscribed from the program successfully!");

        return redirect()->route('programsmembers.index');
    }
}

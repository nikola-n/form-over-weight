<?php

namespace App\Http\Controllers;

use App\Gym;
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
        if (auth()->user()->isMember()) {
            $program_members = ProgramMember::where('member_id', auth()->user()->member->id)
                ->with('program')
                ->paginate(5);

            return view('program_members.index', compact('program_members'));
        }
        if (auth()->user()->isTrainer()) {
            $program_members = ProgramMember::where('member_id', null)
                ->with('program')
                ->paginate(5);

            return view('program_members.index', compact('program_members'));
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $trainers = Trainer::query()->get();
        $gyms     = Gym::query()->get();

        return view('program_members.create', compact('trainers', 'gyms'));
    }

    /**
     * @param \App\Http\Requests\ProgramMemberRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProgramMemberRequest $request)
    {
        if (auth()->user()->isMember()) {
            $programMembers = ProgramMember::where('member_id', auth()->user()->member->id)->get();
            foreach ($programMembers as $programMember) {
                if ($programMember->start_date <= $request->start_date
                    && $programMember->end_date >= $request->end_date) {
                    flash()->warning("You selected invalid dates, you are attending to <a href='/programs/members'>training</a> that day!");
                    return back();
                }
            }
        } else {
            $programMembers = ProgramMember::where('member_id', auth()->user()->trainer->id)->get();
            foreach ($programMembers as $programMember) {
                if ($programMember->start_date <= $request->start_date
                    && $programMember->end_date >= $request->end_date) {
                    flash()->warning("You selected invalid dates, you are attending to <a href='/programs/members'>training</a> that day!");
                    return back();
                }
            }
        }

        $programMember = new ProgramMember($request->except('_token', 'is_member'));

        if ($request->get('is_member') == 1 && auth()->user()->isMember()) {
            $programMember->member_id = auth()->user()->member->id;
            $programMember->save();
        } else {
            $programMember->member_id = null;
            $programMember->save();
        }
        if ($request->get('is_member') == 2) {
            $programMember->member_id = null;
            $programMember->save();
        }

        flash()->success('You have successfully applied to this program!');

        return redirect()->route('programs.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit()
    {
        if (auth()->user()->isMember()) {
            $program_member = ProgramMember::where('member_id', auth()->user()->member->id)
                ->with('trainer')
                ->with('gym')
                ->first();
        }
        if (auth()->user()->isTrainer()) {
            $program_member = ProgramMember::where('member_id', null)
                ->with('trainer')
                ->with('gym')
                ->first();
        }
        $trainers = Trainer::query()->get();
        $gyms     = Gym::query()->get();
        return view('program_members.edit', compact('trainers', 'gyms', 'program_member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\ProgramMemberRequest $request
     * @param \App\ProgramMember                      $programMember
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, ProgramMember $programMember)
    {
        if (auth()->user()->isMember()) {
            $program_member = ProgramMember::where('member_id', auth()->user()->member->id)
                ->with('trainer')
                ->with('gym')
                ->first();
            $program_member->update($request->except('_token', '_method'));
        }
        if (auth()->user()->isTrainer()) {
            $program_member = ProgramMember::where('member_id', null)
                ->with('trainer')
                ->with('gym')
                ->first();
            $program_member->update($request->except('_token', '_method'));
        }

        return redirect()->route('members.index', compact('programMember'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {
        if (auth()->user()->isMember()) {
            $program_member = ProgramMember::where('member_id', auth()->user()->member->id)
                ->with('trainer')
                ->with('gym')
                ->first();
            $program_member->delete();
        }
        if (auth()->user()->isTrainer()) {
            $program_member = ProgramMember::where('member_id', null)
                ->with('trainer')
                ->with('gym')
                ->first();
            $program_member->delete();
        }
        flash()->warning("You have unsubscribed from the program successfully!");

        return redirect()->route('members.index');
    }
}

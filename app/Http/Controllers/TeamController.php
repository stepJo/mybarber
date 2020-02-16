<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Team;
use App\TeamHeader;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();

        return view('admin.teams.index', compact('teams'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teams.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tm_name' => 'required',
            'tm_job' => 'required',
            'tm_profile' => 'required',
            'tm_image' => 'required|image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'tm_name.required' => 'Team Name is required!',
            'tm_job.required' => 'Team Job is required!',
            'tm_profile.required' => 'Team profile is required!',
            'tm_image.required' => 'Team Image is required!',
            'tm_image.image' => 'This file is not an image!'
        ]);

        $image = time().'.'.$request->tm_image->extension();

        $destination = public_path('assets/uploads');

        $request->tm_image->move($destination, $image);

        $team = Team::create([
            'tm_name' => $request->tm_name,
            'tm_job' => $request->tm_job,
            'tm_profile' => $request->tm_profile,
            'tm_image' => $image
        ]);

        return redirect('admin/teams')->with('success', 'added team');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $this->validate($request, [
            'tm_name' => 'required|unique:team,tm_name,'.$team->tm_id.',tm_id',
            'tm_job' => 'required',
            'tm_profile' => 'required',
            'tm_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'tm_name.required' => 'Team Name is required!',
            'tm_job.required' => 'Team Job is required!',
            'tm_profile.required' => 'Team Profile is required!',
            'tm_image.image' => 'This file is not an image!'
        ]);

        $team->tm_name = $request->tm_name;
        $team->tm_job = $request->tm_job;
        $team->tm_profile = $request->tm_profile;

        if($request->has('tm_image')) {
            $image = time().'.'.$request->serv_image->extension();

            $destination = public_path('assets/uploads');

            $request->tm_image->move($destination, $image);

            $team->tm_image = $image;
        } 

        $team->update();

        return redirect('admin/teams')->with('success', 'updated team');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return redirect('admin/teams')->with('success', 'deleted team');
    }


    public function header() 
    {
        $team_headers = TeamHeader::all();

        return view('admin.teams.hd_index', compact('team_headers'));      
    }


    public function createHeader()
    {
        return view('admin.teams.hd_add');
    }


    public function storeHeader(Request $request)
    {
        $this->validate($request, [
            'tm_hd_title' => 'required',
            'tm_hd_caption' => 'required',
        ],
        [
            'tm_hd_title.required' => 'Team Header Title is required!',
            'tm_hd_caption.required' => 'Team Header Caption is required!',
        ]);

        $team_header = TeamHeader::create([
            'tm_hd_title' => $request->tm_hd_title,
            'tm_hd_caption' => $request->tm_hd_caption,
        ]);

        return redirect('admin/teams/headers')->with('success', 'added team header');
    }


    public function editHeader(TeamHeader $header)
    {
        return view('admin.teams.hd_edit', compact('header'));
    }


    public function updateHeader(Request $request, TeamHeader $header)
    {
        $this->validate($request, [
            'tm_hd_title' => 'required',
            'tm_hd_caption' => 'required',
        ],
        [
            'tm_hd_title.required' => 'Team Header Title is required!',
            'tm_hd_caption.required' => 'Team Header Caption is required!',
        ]);

        $header->tm_hd_title = $request->tm_hd_title;
        $header->tm_hd_caption = $request->tm_hd_caption;

        $header->update();

        return redirect('admin/teams/headers')->with('success', 'updated team header');
    }


    public function destroyHeader(TeamHeader $header)
    {
        $header->delete();

        return redirect('admin/teams/headers')->with('success', 'deleted team header');
    }


    public function active(TeamHeader $header)
    {
        $header->tm_hd_active = 1;

        $header->update();

        DB::table('team_headers')->where('tm_hd_id', '!=', $header->tm_hd_id)->update(['tm_hd_active' => 0]);

        return redirect('admin/teams/headers')->with('success', 'used team header preset');

    }
}

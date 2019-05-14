<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveProjectRequest;
use App\Models\Projects\Project;
use App\Models\Users\User;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{

    private $objProject;

    public function __construct(Project $objProject)
    {
        $this->objProject = $objProject;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // use Illuminate\Support\Facades\Mail;
        // $user = auth()->user();

        // dd(Mail::send('emails.welcome', ['user' => $user], function ($m) use ($user) {
        // $m->from('neha@mt.com', 'Required money');

        // $m->to('prajaktakhairnar23@gmail.com', $user->name)->subject('Urgent required money!');
        // }));

        $arrObjProjects = $this->objProject->all();

        return view('clients.projects.index')
        ->with('jsonProjects', $arrObjProjects->toJson());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrUserOptions = User::all(['id', DB::raw("CONCAT(name, ' (', email, ')') AS label")]);

        return view('clients.projects.create')
        ->with('objProject', $this->objProject)
        ->with('arrUserOptions', $arrUserOptions->toJson());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $objRequest
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProjectRequest $objRequest)
    {
        if ($this->objProject->saveProject($objRequest)) {
            return parent::passResponse('Project created successfully.');
        }

        return parent::failedResponse();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Projects\Project $objProject
     * @return \Illuminate\Http\Response
     */
    public function show($intId)
    {
        $objProject = $this->objProject->findOrFail($intId);

        $objProject->teammates = $objProject->projectTeammates()->pluck('assignee_id')->toArray();

        $arrUserOptions = User::all(['id', DB::raw("CONCAT(name, ' (', email, ')') AS label")]);

        return view('clients.projects.show')
        ->with('objProject', $objProject)
        ->with('arrUserOptions', $arrUserOptions->pluck('label', 'id')->toJson());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Projects\Project $objProject
     * @return \Illuminate\Http\Response
     */
    public function edit($intId)
    {
        $objProject = $this->objProject->find($intId);

        $objProject->teammates = $objProject->projectTeammates()->pluck('assignee_id')->toArray();

        $arrUserOptions = User::all(['id', DB::raw("CONCAT(name, ' (', email, ')') AS label")]);

        return view('clients.projects.create')
        ->with('objProject', $objProject)
        ->with('arrUserOptions', $arrUserOptions->toJson());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $objRequest
     * @param \App\Models\Projects\Project $objProject
     * @return \Illuminate\Http\Response
     */
    public function update($intId, SaveProjectRequest $objRequest)
    {
        if ($this->objProject->saveProject($objRequest, $intId)) {
            return parent::passResponse('Project updated successfully.');
        }

        return parent::failedResponse();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Projects\Project $objProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $objProject)
    {
        //
    }
}

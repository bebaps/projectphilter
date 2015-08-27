<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\Lead;
use App\Http\Requests;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller {

    public function __construct() {

        $user     = Auth::user();
        $projects = $user->projects;

        foreach ($projects as $project) {
        /*****
        *   Set the User bottom lines
        *****/
            $userValues = collect([
                'rate'             => $user->rate,
                'type'             => $user->project,
                'budget'           => $user->budget,
                'hours'            => $user->hours,
                'days'             => $user->days,
                'size'             => $user->size,
                'framework'        => $user->framework,
                'theme'            => $user->theme,
                'cms'              => $user->cms,
                'lead type'        => $user->type,
                'lead focus'       => $user->focus,
                'lead involvement' => $user->involvement,
                'lead boss'        => $user->boss,
            ]);

        // set as individual values for comparison
            $userRate            = $userValues->get('rate');
            $userProjectType     = $userValues->get('type');
            $userBudget          = $userValues->get('budget');
            $userHours           = $userValues->get('budget') / $userValues->get('rate');
            $userDays            = $userValues->get('days');
            $userSize            = $userValues->get('size');
            $userFramework       = $userValues->get('framework');
            $userTheme           = $userValues->get('theme');
            $userCms             = $userValues->get('cms');
            $userLeadType        = $userValues->get('lead type');
            $userLeadFocus       = $userValues->get('lead focus');
            $userLeadInvolvement = $userValues->get('lead involvement');
            $userLeadBoss        = $userValues->get('lead boss');

        /*****
        *   Set the actual Project values
        *****/
            $actualValues = collect([
                'rate'             => $user->rate,
                'type'             => $project->project_type,
                'budget'           => $project->project_budget,
                'hours'            => $project->project_hours,
                'days'             => $project->project_timeline,
                'size'             => $project->project_size,
                'framework'        => $project->project_framework,
                'theme'            => $project->project_theme,
                'cms'              => $project->project_cms,
                'lead type'        => $project->lead->lead_type,
                'lead focus'       => $project->lead->lead_focus,
                'lead involvement' => $project->lead->lead_involvement,
                'lead boss'        => $project->lead->lead_boss,
            ]);

        // set as individual values for comparison
            $actualRate            = $actualValues->get('rate');
            $actualProjectType     = $actualValues->get('type');
            $actualBudget          = $actualValues->get('budget');
            $actualHours           = $actualValues->get('budget') / $actualValues->get('rate');
            $actualDays            = $actualValues->get('days');
            $actualSize            = $actualValues->get('size');
            $actualFramework       = $actualValues->get('framework');
            $actualTheme           = $actualValues->get('theme');
            $actualCms             = $actualValues->get('cms');
            $actualLeadType        = $actualValues->get('lead type');
            $actualLeadFocus       = $actualValues->get('lead focus');
            $actualLeadInvolvement = $actualValues->get('lead involvement');
            $actualLeadBoss        = $actualValues->get('lead boss');

        /*****
        *   Grade calculation
        *****/
            $scores = collect([
                'budget'           => 0,
                'type'             => 0,
                'hours'            => 0,
                'days'             => 0,
                'size'             => 0,
                'framework'        => 0,
                'theme'            => 0,
                'cms'              => 0,
                'lead type'        => 0,
                'lead focus'       => 0,
                'lead involvement' => 0,
                'lead boss'        => 0,
            ]);

        // Budget comparison

            if ($actualBudget >= ($userBudget * 2)) {
                $scores['budget'] = 2;
            } else if ($actualBudget >= $userBudget) {
                $scores['budget'] = 1;
            }

        // Project Type comparison

            if ($actualProjectType === $userProjectType) {
                $scores['type'] = 1;
            }

        // Hours comparison

            if ($actualHours > ($userHours * 2)) {
                $scores['hours'] = 2;
            } else if ($actualHours >= $userHours) {
                $scores['hours'] = 1;
            }

        // Timeline comparison

            $today      = Carbon::today();

            $launchDate = Carbon::createFromFormat('Y-m-d', $actualDays);

            $days       = $today->diffInDays($launchDate);

            if ($days >= ($userDays * 2)) {
                $scores['days'] = 2;
            } else if ($days >= $userDays) {
                $scores['days'] = 1;
            }

        // Size comparison

            if ($actualSize === $userSize) {
                $scores['size'] = 1;
            }

        // Framework comparison

            if ($actualFramework === $userFramework) {
                $scores['framework'] = 1;
            }

        // Theme comparison

            if ($actualTheme === $userTheme) {
                $scores['theme'] = 1;
            }

        // CMS comparison

            if ($actualCms === $userCms) {
                $scores['cms'] = 1;
            }

        // Lead Type comparison

            if ($actualLeadType === $userLeadType) {
                $scores['lead type'] = 1;
            }

        // Lead Focus comparison

            if ($actualLeadFocus === $userLeadFocus) {
                $scores['lead focus'] = 1;
            }

        // Lead Involvement comparison

            if ($actualLeadInvolvement === $userLeadInvolvement) {
                $scores['lead involvement'] = 1;
            }

        // Lead Boss comparison

            if ($actualLeadBoss === $userLeadBoss) {
                $scores['lead boss'] = 1;
            }

        // calculate the final scores and grade
            $numericGrade = $scores->sum() / $scores->count();

            $grade = 'A';

                if ($numericGrade >= 0.90) {
                    $grade = "A";
                } else if ($numericGrade >= 0.80) {
                    $grade = "B";
                } else if ($numericGrade >= 0.70) {
                    $grade = "C";
                } else if ($numericGrade >= 0.60) {
                    $grade = "D";
                } else {
                    $grade = "F";
                }

        // update the database
            $project->project_score = $numericGrade;
            $project->project_grade = $grade;
            $project->project_hours = $actualHours;
            $project->project_days  = $days;

            $project->save();
        }
    }

    /****************************************
        View all Projects
    ****************************************/
    public function index() {

        $projects = Auth::user()->projects;

        return view('all-projects',[ 'projects' => $projects]);
    }

    /****************************************
        Show a form to create a new Project
    ****************************************/
    public function create() {

        return view('new-project');
    }

    /****************************************
        Save a new Project in the database
    ****************************************/
    public function store(Request $request) {

        $project                      = new Project;

        $project->project_name        = $request->input('project_name');
        $project->project_type        = $request->input('project_type');
        $project->project_description = $request->input('project_description');
        $project->project_budget      = $request->input('project_budget');
        $project->project_timeline    = $request->input('project_timeline');
        $project->project_size        = $request->input('project_size');
        $project->project_framework   = $request->input('project_framework');
        $project->project_theme       = $request->input('project_theme');
        $project->project_cms         = $request->input('project_cms');

        $lead                   = new Lead;

        $lead->lead_name        = $request->input('lead_name');
        $lead->lead_company     = $request->input('lead_company');
        $lead->lead_email       = $request->input('lead_email');
        $lead->lead_phone       = $request->input('lead_phone');
        $lead->lead_address     = $request->input('lead_address');
        $lead->lead_city        = $request->input('lead_city');
        $lead->lead_state       = $request->input('lead_state');
        $lead->lead_zip         = $request->input('lead_zip');
        $lead->lead_type        = $request->input('lead_type');
        $lead->lead_focus       = $request->input('lead_focus');
        $lead->lead_involvement = $request->input('lead_involvement');
        $lead->lead_boss        = $request->input('lead_boss');

        $lead->save();

        // link the new project and lead together in the database
        $project->user_id         = Auth::user()->id;
        $project->lead_id         = $lead->id;

        $project->save();

        return redirect('projects');
    }

    /****************************************
        Show an individual Project
    ****************************************/
    public function show($id) {

        $user    = Auth::user();
        $project = $user->projects->find($id);

        return view('project', ['user' => $user, 'project' => $project]);
    }

    /****************************************
        Show the form to edit a Project
    ****************************************/
    public function edit($id) {

        $project = Project::findOrFail($id);

        return view('edit-project', [ 'project' => $project ]);
    }

    /****************************************
        Update the Project in the database
    ****************************************/
    public function update(Request $request, $id) {

        $project                      = Project::findOrFail($id);

        $project->project_name        = $request->input('project_name');
        $project->project_type        = $request->input('project_type');
        $project->project_budget      = $request->input('project_budget');
        $project->project_timeline    = $request->input('project_timeline');
        $project->project_size        = $request->input('project_size');
        $project->project_framework   = $request->input('project_framework');
        $project->project_theme       = $request->input('project_theme');
        $project->project_cms         = $request->input('project_cms');

        $project->save();

        return redirect('projects');
    }

    /****************************************
        Delete a Project from the database
    ****************************************/
    public function destroy($id) {

        Project::destroy($id);

        return redirect('projects');
    }

}

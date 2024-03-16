<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Project as Projects;


class Project extends Controller
{
    public function index()
    {
        $project = Projects::where('status', 1)->get();
        return view('pages.project', ['projects' => $project]);
    }
}

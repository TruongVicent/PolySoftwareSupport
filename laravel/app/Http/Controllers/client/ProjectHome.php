<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Project;


class ProjectHome extends Controller
{

    public function index()
    {
        $project = Project::where('status', 1)->get();
        $event = Event::where('status', 1)->limit(4)->get();
        return view('pages.bodyHome', ['projects' => $project, 'events' => $event]);
    }
}

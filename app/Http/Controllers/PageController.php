<?php

namespace App\Http\Controllers;

use App\Http\Resources\BannerResource;
use App\Http\Resources\BoardResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\DocumentResource;
use App\Http\Resources\FacilityResource;
use App\Http\Resources\NoticeResource;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\ScheduleResource;
use App\Http\Resources\UserResource;
use App\Models\Banner;
use App\Models\Notice;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
    public function index(Request $request)
    {
        return view('index');
        return response()->file(public_path("/index.html"));
    }

    public function sample()
    {
        return Inertia::render("Sample");
    }

    public function front()
    {
        return Inertia::render("Contents/Front");
    }

    public function design()
    {
        return Inertia::render("Contents/Design");
    }

    public function backend()
    {
        return Inertia::render("Contents/Backend");
    }

    public function planning()
    {
        return Inertia::render("Contents/Planning");
    }

}

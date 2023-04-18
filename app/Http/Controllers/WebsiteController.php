<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(Request $request)
    {
        $startDateTime = $request->input('startDateTime');
        $endDateTime = $request->input('endDateTime');

        $websites = Website::withCount(['visits' => function ($query) use ($startDateTime, $endDateTime) {
            if (!empty($startDateTime) && !empty($endDateTime)) {
                $query->whereBetween('created_at', [$startDateTime, $endDateTime]);
            }
        }])->get();

        return view('websites', ["websites" => $websites]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'hostname' => 'required|max:255',
            'ip' => 'required|max:255',
        ]);

        $website = Website::firstOrCreate(
            ['hostname' => $validatedData['hostname']]
        );

        $visit = new Visit([
            'ip' => $validatedData['ip']
        ]);

        $website->visits()->save($visit);

        return response()->json(['message' => 'Website created successfully'], 201);
    }

}

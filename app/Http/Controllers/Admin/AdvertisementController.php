<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Http\Requests\AdvertisementRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advertisements = Advertisement::orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.advertisements.index', compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $positions = Advertisement::getPositions();
        return view('dashboard.admin.advertisements.create', compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdvertisementRequest $request)
    {
        Advertisement::create([
            'name' => $request->name,
            'position' => $request->position,
            'ad_code' => $request->ad_code,
            'status' => $request->status,
        ]);

        return redirect()->route('advertisements.manage')->with('success', 'Advertisement created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $advertisement = Advertisement::findOrFail($id);
        return view('dashboard.admin.advertisements.show', compact('advertisement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $positions = Advertisement::getPositions();
        return view('dashboard.admin.advertisements.edit', compact('advertisement', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdvertisementRequest $request, string $id)
    {
        $advertisement = Advertisement::findOrFail($id);

        $advertisement->update([
            'name' => $request->name,
            'position' => $request->position,
            'ad_code' => $request->ad_code,
            'status' => $request->status,
        ]);

        return redirect()->route('advertisements.manage')->with('success', 'Advertisement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->delete();

        return redirect()->route('advertisements.manage')->with('success', 'Advertisement deleted successfully.');
    }


    /**
     * Update status via AJAX
     */
    public function updateStatus(Request $request)
    {
        $advertisement = Advertisement::findOrFail($request->id);
        $advertisement->status = $request->status;
        $advertisement->save();

        return response()->json(['success' => true, 'message' => 'Status updated successfully']);
    }
}

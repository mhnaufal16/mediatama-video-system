<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccessRequestController extends Controller
{
    public function index()
    {
        $requests = \App\Models\AccessRequest::with(['user', 'video'])->orderBy('created_at', 'desc')->get();
        return view('admin.access_requests.index', compact('requests'));
    }

    public function update(Request $request, \App\Models\AccessRequest $accessRequest)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
            'duration' => 'nullable|integer|min:1', // Duration in hours, required if approved
        ]);

        if ($request->status === 'approved') {
            $accessRequest->update([
                'status' => 'approved',
                'access_start_time' => now(),
                'access_end_time' => now()->addHours($request->duration),
            ]);
        } else {
            $accessRequest->update([
                'status' => 'rejected',
                'access_start_time' => null,
                'access_end_time' => null,
            ]);
        }

        return redirect()->route('admin.access-requests.index')->with('success', 'Request updated successfully.');
    }
}

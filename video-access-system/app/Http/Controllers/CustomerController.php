<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $videos = \App\Models\Video::with(['category', 'accessRequests' => function ($query) {
            $query->where('user_id', auth()->id());
        }])->get();
        return view('customer.videos.index', compact('videos'));
    }

    public function requestAccess(\App\Models\Video $video)
    {
        // Check if request already exists
        $existingRequest = \App\Models\AccessRequest::where('user_id', auth()->id())
            ->where('video_id', $video->id)
            ->whereIn('status', ['pending', 'approved'])
            ->first();

        if ($existingRequest) {
            if ($existingRequest->status === 'approved' && $existingRequest->access_end_time > now()) {
                return redirect()->back()->with('info', 'You already have access to this video.');
            }
            if ($existingRequest->status === 'pending') {
                return redirect()->back()->with('info', 'Request already pending.');
            }
        }

        \App\Models\AccessRequest::create([
            'user_id' => auth()->id(),
            'video_id' => $video->id,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Access requested successfully.');
    }

    public function watch(\App\Models\Video $video)
    {
        $access = \App\Models\AccessRequest::where('user_id', auth()->id())
            ->where('video_id', $video->id)
            ->where('status', 'approved')
            ->where('access_end_time', '>', now())
            ->first();

        if (! $access) {
            return redirect()->route('videos.index')->with('error', 'You do not have access to this video or your access has expired.');
        }

        return view('customer.videos.watch', compact('video'));
    }
}

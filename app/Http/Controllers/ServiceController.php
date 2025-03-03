<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ServiceController extends Controller
{
    public function index(){
        return inertia::render('service');
    }

    public function store(Request $request){
        $validated =$request->validate([
            'title' =>'required',
            'description' =>'required',
            'preview_image' =>'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
        $imagePath = null;
        if ($request->hasFile('preview_image')) {
            $imagePath = $request->file('preview_image')->store('services', 'public');
        }

        $service = Service::create([
            'title' =>              $request->title,
            'description' =>        $request->description,
            'preview_image'=>       $imagePath
        ]);
        return response()->json([
            'message' => 'Service created successfully!',
            'service' => $service
        ], 201);
    }

    public function show($id){
        $service = Service::findOrFail($id);

        return response()->json($service);
    }
    public function update(Request $request, $id){
        $service = Service::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'preview_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        
        if ($request->hasFile('preview_image')) {
            
            if ($service->preview_image) {
                Storage::disk('public')->delete($service->preview_image);
            }

            
            $imagePath = $request->file('preview_image')->store('services', 'public');
            $service->preview_image = $imagePath;
        }

        
        $service->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json([
            'message' => 'Service updated successfully!',
            'service' => $service
        ]);
    }
    public function destroy($id){
        $service = Service::findOrFail($id);

       
        if ($service->preview_image) {
            Storage::disk('public')->delete($service->preview_image);
        }

        $service->delete();

        return response()->json(['message' => 'Service deleted successfully!']);
    }


}

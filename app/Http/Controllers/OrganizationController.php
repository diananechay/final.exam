<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Organization::class);
    }

    public function index()
    {
        $this->authorize( Organization::class);
        return response()->json(['success' => Organization::all()]);
    }

    public function show(Organization $organization)
    {
        return response()->json($organization, 200);
    }

    public function store(Request $request)
    {
        $organization= Organization::create($request->all());
        return response()->json($organization, 201);
    }

    public function update(Request $request, Organization $organization)
    {
        $organization->update($request->all());
        return response()->json($organization);
    }

    public function destroy(Organization $organization)
    {
        return response()->json(['success' => $organization->delete()], 200);
    }

    public function statistics()
    {
        $this->authorize( Organization::class);
        $organization =Organization::get()->count();
        return response()->json(['organization' =>$organization ],200);
    }

}

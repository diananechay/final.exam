<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use Auth;
class VacancyController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Vacancy::class);
    }
    public function index()
    {
        $this->authorize(Vacancy::class);
        $user = Auth::guard()->user();
        if($user->role_id==3)
        {
            return response()->json(['success' =>  Vacancy::all()]);
        }
        else {
            return response()->json(['success' =>  Vacancy::where('status',0)->get()]);
        }
    }

    public function show(Vacancy $vacancy)
    {
        return response()->json($vacancy, 200);
    }

    public function store(Request $request)
    {
        $vacancy= Vacancy::create($request->all());
        return response()->json($vacancy, 201);
    }

    public function update(Request $request, Vacancy $vacancy)
    {
        $vacancy->update($request->all());
        return response()->json($vacancy);
    }

    public function destroy(Vacancy $vacancy)
    {
        return response()->json(['success' => $vacancy->delete()], 200);
    }
    public function statistics()
    {
        $this->authorize(Vacancy::class);
        $active =Vacancy::where('status',0)->get()->count();
        $passive =Vacancy::where('status',1)->get()->count();
        $all=Vacancy::get()->count();
        return response()->json(['active vacancy' =>$active, 'passive vacancy' =>$passive,'all vacancy' =>$all],200);
    }

}

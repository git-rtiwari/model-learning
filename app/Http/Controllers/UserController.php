<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index')->with('users', User::select(['id', 'name', 'email', 'phone', 'gender'])->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create')->with([
            'stateCityMap' => $this->getStateCityMap(),
            'states' => State::select(['id', 'title'])->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'dob' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'state' => 'required',
            'city' => 'required',
            'education.field.*' => 'required|string',
            'education.year.*' => 'required|string',
            'skills.*' => 'required|string',
            'profession' => 'required|string',
            'company_name' => "exclude_if:profession,self-employed|required|string",
            'started_year' => 'exclude_if:profession,self-employed|required|string',
            'business_name' => 'exclude_if:profession,salaried|required|string',
            'location' => 'exclude_if:profession,salaried|required|string',
            'profile_pic' => 'required',
            'certificates' => 'required',
        ]);

        $profilePicPath = $request->file('profile_pic')->store('photos', 'public');
        $documentPaths = [];
        foreach ($request->file('certificates') as $document) {
            $documentPaths[] = $document->store('documents', 'public');
        }

        $profession = [];

        switch ($request->get('profession')) {
            case 'self-employed':
                $profession = [
                    'business_name' => $request->get('business_name'),
                    'location' => $request->get('location'),
                ];
                break;
            case 'salaried':
                $profession = [
                    'company_name' => $request->get('company_name'),
                    'started_year' => $request->get('started_year'),
                ];
                break;
        }

        $education = [];
        foreach ($request->get('education')['year'] as $i => $year) {
            $education[] = [
                'year' => $year,
                'field' => $request->get('education')['field'][$i],
            ];
        }

        User::create([
            'name' => $request->get('name'),
            'dob' => $request->get('dob'),
            'email' => fake()->email,
            'phone' => $request->get('phone'),
            'gender' => $request->get('gender'),
            'state_id' => $request->get('state'),
            'city_id' => $request->get('city'),
            'education' => json_encode($education),
            'skills' => json_encode($request->get('skills')),
            'profession' => $request->get('profession'),
            'profession_details' => json_encode($profession),
            'profile_pic' => $profilePicPath,
            'certificates' => json_encode($documentPaths),
        ]);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('user.detail')->with('user', User::with(['state', 'city'])->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        User::find($id)->delete();
    }

    protected function getStateCityMap()
    {
        $map = [];
        foreach (State::with('cities')->get() as $stateCity) {
            $map[$stateCity->id] = $stateCity['cities'];
        }
        return $map;
    }
}

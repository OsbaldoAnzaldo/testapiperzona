<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDirectorRequest;
use App\Http\Requests\UpdateDirectorRequest;
use App\Http\Resources\DirectorCollection;
use App\Models\Director;
use F9Web\ApiResponseHelpers;

class DirectorController extends Controller
{
    use ApiResponseHelpers;
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $directors = Director::all();
        return $this->respondWithSuccess($directors);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDirectorRequest $request)
    {
        
        $director = Director::create($request->all());

        return $this->respondCreated($director);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        $director = Director::findOrFail($id);

        return $this->respondWithSuccess($director);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Director $director)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDirectorRequest $request, $id)
    {
        $director = Director::findOrFail($id);
        $director->update($request->all());

        return $this->respondWithSuccess($director);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $director = Director::findOrFail($id);
        $director->delete();

        return $this->respondWithSuccess($director);
    }
}

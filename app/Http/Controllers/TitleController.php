<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTitleRequest;
use App\Http\Requests\UpdateTitleRequest;
use App\Http\Resources\TitleCollection;
use App\Models\Title;
use F9Web\ApiResponseHelpers;

class TitleController extends Controller
{
    use ApiResponseHelpers;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titles = Title::all();
        return $this->respondWithSuccess($titles);
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
    public function store(StoreTitleRequest $request)
    {
        
        $title = Title::create($request->all());

        return $this->respondCreated($title);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        $title = Title::findOrFail($id);

        return $this->respondWithSuccess($title);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Title $title)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTitleRequest $request, $id)
    {
        
        $title = Title::findOrFail($id);
        $title->update($request->all());

        return $this->respondWithSuccess($title);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Title $title)
    {
        //
    }
}

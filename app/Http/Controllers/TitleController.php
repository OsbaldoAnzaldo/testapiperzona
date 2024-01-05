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
    *  @OA\Get(
    *      path="/titles",
    *      summary="Obtener titulos",
    *      operationId="titles",
    *      tags={"Titles"},
    *      security={{"bearer_token":{}}},
    *      @OA\Response(
    *          response=200,
    *          description="listado de registros."
    *      ),
    *      @OA\Response(
    *          response="500",
    *          description="error en el servidor."
    *      )
    *  )
    */

    public function index()
    {
        $titles = Title::all();
        return $this->respondWithSuccess($titles);
    }

    public function store(StoreTitleRequest $request)
    {
        
        $title = Title::create($request->all());

        return $this->respondCreated($title);
    }

    public function show($id)
    {
        
        $title = Title::findOrFail($id);

        return $this->respondWithSuccess($title);
    }

    public function update(UpdateTitleRequest $request, $id)
    {
        
        $title = Title::findOrFail($id);
        $title->update($request->all());

        return $this->respondWithSuccess($title);
    }

    public function destroy($id)
    {
        
        $title = Title::findOrFail($id);
        $title->delete();

        return $this->respondWithSuccess($title);
    }
}

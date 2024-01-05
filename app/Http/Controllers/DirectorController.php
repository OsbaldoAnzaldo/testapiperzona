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
     *  @OA\Get(
     *      path="/directors",
     *      summary="Obtener directores",
     *      operationId="directors",
     *      tags={"Directors"},
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
        $directors = Director::all();
        return $this->respondWithSuccess($directors);
    }

        /**
     * @OA\Post(
     * path="/api/directors",
     * summary="Crear director",
     * description="Se requiere name",
     * operationId="directors store",
     * tags={"Directors"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Valores",
     *    @OA\JsonContent(
     *       required={"name"},
     *       @OA\Property(property="name", type="string", format="text", example="James Cameron"),
     *    ),
     * ),
     * @OA\Response(
     *    response=422,
     *    description="datos incorrectos",
     *    @OA\JsonContent(
     *          @OA\Property(property="validaciones", type="string", example="el nombre es requerido")
     *        )
     *     )
     * )
     */

    public function store(StoreDirectorRequest $request)
    {
        
        $director = Director::create($request->all());

        return $this->respondCreated($director);
    }

            /**
     * @OA\GET(
     * path="/api/directors/id",
     * summary="Obtener director por id",
     * description="Se requiere id",
     * operationId="director get",
     * tags={"Directors"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Valores",
     *    @OA\JsonContent(
     *       required={"id"},
     *       @OA\Property(property="id", type="integer", format="number", example="1"),
     *    ),
     * ),
     * @OA\Response(
     *    response=404,
     *    description="datos incorrectos",
     *    @OA\JsonContent(
     *          @OA\Property(property="response", type="string", example="no encontrado")
     *        )
     *     )
     * )
     */
    public function show($id)
    {
        
        $director = Director::findOrFail($id);

        return $this->respondWithSuccess($director);
    }

        /**
     * @OA\Put(
     * path="/api/directors/id",
     * summary="Editar director",
     * description="Se requiere name y id",
     * operationId="directors update",
     * tags={"Directors"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Valores",
     *    @OA\JsonContent(
     *       required={"name"},
     *       @OA\Property(property="name", type="string", format="text", example="James Cameron"),
     *    ),
     * ),
     * @OA\Response(
     *    response=422,
     *    description="datos incorrectos",
     *    @OA\JsonContent(
     *          @OA\Property(property="validaciones", type="string", example="el nombre es requerido")
     *        )
     *     )
     * )
     */

    public function update(UpdateDirectorRequest $request, $id)
    {
        $director = Director::findOrFail($id);
        $director->update($request->all());

        return $this->respondWithSuccess($director);
    }

     /**
     *  @OA\Delete(
     *      path="/directors/id",
     *      summary="eliminar director por id",
     *      operationId="delete director",
     *      tags={"Directors"},
     *      security={{"bearer_token":{}}},
     *      @OA\Response(
     *          response=200,
     *          description=" registro eliminado."
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="no encontrrado."
     *      )
     *  )
     */

    public function destroy($id)
    {
        
        $director = Director::findOrFail($id);
        $director->delete();

        return $this->respondWithSuccess($director);
    }
}

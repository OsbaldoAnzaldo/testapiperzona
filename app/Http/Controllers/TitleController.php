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

            /**
     * @OA\Post(
     * path="/api/titles",
     * summary="Crear title",
     * description="Se requiere name",
     * operationId="titles store",
     * tags={"Titles"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Valores",
     *    @OA\JsonContent(
     *       required={"name"},
     *       @OA\Property(property="director_id", type="string", format="text", example="1"),
     *          @OA\Property(property="name", type="string", format="text", example="Titanic"),
     * @OA\Property(property="year", type="string", format="text", example="2023"),
     *    ),
     * ),
     * @OA\Response(
     *    response=422,
     *    description="datos incorrectos",
     *    @OA\JsonContent(
     *          @OA\Property(property="validaciones", type="string", example="validaciones")
     *        )
     *     )
     * )
     */

    public function store(StoreTitleRequest $request)
    {
        
        $title = Title::create($request->all());

        return $this->respondCreated($title);
    }

    /**
* @OA\GET(
* path="/api/titles/id",
* summary="Obtener title por id",
* description="Se requiere id",
* operationId="title get",
* tags={"Titles"},
* @OA\RequestBody(
*    required=true,
*    description="Valores",
*    @OA\JsonContent(
*       required={"id"},
     *       @OA\Property(property="director_id", type="string", format="text", example="1"),
     *          @OA\Property(property="name", type="string", format="text", example="Titanic"),
     * @OA\Property(property="year", type="string", format="text", example="2023"),
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
        
        $title = Title::findOrFail($id);

        return $this->respondWithSuccess($title);
    }

    /**
 * @OA\Put(
 * path="/api/titles/id",
 * summary="Editar title",
 * description="Se requiere name",
 * operationId="titles update",
 * tags={"Titles"},
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

    public function update(UpdateTitleRequest $request, $id)
    {
        
        $title = Title::findOrFail($id);
        $title->update($request->all());

        return $this->respondWithSuccess($title);
    }


     /**
     *  @OA\Delete(
     *      path="/titles/id",
     *      summary="eliminar titles por id",
     *      operationId="delete title",
     *      tags={"Titles"},
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
        
        $title = Title::findOrFail($id);
        $title->delete();

        return $this->respondWithSuccess($title);
    }
}

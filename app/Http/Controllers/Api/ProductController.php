<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\services\ProductService;

/**
 * Class ProductController
 *
 * Controlador responsable de manejar las solicitudes HTTP relacionadas
 * con la gestión de productos vía API.
 *
 * @package App\Http\Controllers\Api
 */
class ProductController extends Controller
{
    /**
     * Constructor que inyecta la capa de servicio para manipulación de productos.
     *
     * @param  ProductService  $service
     */
    public function __construct(private ProductService $service) {}

    /**
     * Listado completo de productos.
     *
     * GET /api/products
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->success("Products loaded", $this->service->all());
    }

    /**
     * Mostrar un solo producto por su ID.
     *
     * GET /api/products/{id}
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $product = $this->service->find($id);

        if (!$product) {
            return $this->error("Product not found");
        }

        return $this->success("Product found", $product);
    }

    /**
     * Crear un nuevo producto.
     *
     * POST /api/products
     *
     * @param  ProductStoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductStoreRequest $request)
    {
        $product = $this->service->create($request->validated());

        return $this->success("Product created", $product);
    }

    /**
     * Actualizar un producto existente.
     *
     * PUT /api/products/{id}
     *
     * @param  ProductUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ProductUpdateRequest $request, int $id)
    {
        $product = $this->service->update($id, $request->validated());

        if (!$product) {
            return $this->error("Product not found");
        }

        return $this->success("Product updated", $product);
    }

    /**
     * Eliminar un producto por ID.
     *
     * DELETE /api/products/{id}
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $deleted = $this->service->delete($id);

        if (!$deleted) {
            return $this->error("Product not found");
        }

        return $this->success("Product deleted", ["id" => $id]);
    }

    /**
     * Respuesta estándar de éxito para la API.
     *
     * @param  string  $msg  Mensaje descriptivo.
     * @param  mixed|null  $data  Datos opcionales.
     * @return \Illuminate\Http\JsonResponse
     */
    private function success(string $msg, mixed $data = null)
    {
        return response()->json([
            "status" => 200,
            "message" => $msg,
            "data" => $data
        ], 200);
    }

    /**
     * Respuesta estándar de error para la API.
     *
     * @param  string  $msg  Mensaje de error.
     * @return \Illuminate\Http\JsonResponse
     */
    private function error(string $msg)
    {
        return response()->json([
            "status" => 100,
            "message" => $msg,
            "data" => null
        ], 200);
    }
}
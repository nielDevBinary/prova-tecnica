<?php

namespace App\services;

use Illuminate\Support\Facades\DB;

/**
 * Class ProductService
 *
 * Servicio encargado de manejar la lógica de negocio relacionada
 * con productos, utilizando consultas SQL manuales.
 *
 * @package App\Services
 */
class ProductService
{
    /**
     * Obtiene todos los productos ordenados del más reciente al más antiguo.
     *
     * @return array Lista de productos.
     */
    public function all(): array
    {
        return DB::select("SELECT * FROM products ORDER BY id DESC");
    }

    /**
     * Busca un producto por su ID.
     *
     * @param  int  $id  Identificador del producto.
     * @return object|null Retorna un objeto del producto o null si no existe.
     */
    public function find(int $id): object|null
    {
        $rows = DB::select("SELECT * FROM products WHERE id = ? LIMIT 1", [$id]);
        return $rows[0] ?? null;
    }

    /**
     * Crea un nuevo producto en la base de datos.
     *
     * @param  array  $data  Datos del producto: name, price, description (opcional).
     * @return object|null Producto recién creado.
     */
    public function create(array $data): object|null
    {
        $now = now();

        DB::insert(
            "INSERT INTO products (name, price, description, created_at, updated_at)
             VALUES (?, ?, ?, ?, ?)",
            [
                $data['name'],
                $data['price'],
                $data['description'] ?? null,
                $now,
                $now
            ]
        );

        return $this->find(DB::getPdo()->lastInsertId());
    }

    /**
     * Actualiza un producto existente.
     *
     * @param  int    $id    ID del producto.
     * @param  array  $data  Datos a actualizar (name, price, description, etc).
     * @return object|null Producto actualizado o null si no existe.
     */
    public function update(int $id, array $data): object|null
    {
        $product = $this->find($id);
        if (!$product) {
            return null;
        }

        $fields = [];
        $values = [];

        foreach ($data as $key => $value) {
            $fields[] = "$key = ?";
            $values[] = $value;
        }

        $values[] = now();
        $values[] = $id;

        DB::update(
            "UPDATE products SET " . implode(", ", $fields) . ", updated_at = ? WHERE id = ?",
            $values
        );

        return $this->find($id);
    }

    /**
     * Elimina un producto por ID.
     *
     * @param  int  $id
     * @return int Número de filas afectadas (1 si se eliminó, 0 si no existe).
     */
    public function delete(int $id): int
    {
        return DB::delete("DELETE FROM products WHERE id = ?", [$id]);
    }
}
// URL base de la API de productos
const apiBase = "http://127.0.0.1:8000/api/v1/products";

// Función para obtener todos los productos
export async function getProducts() {
    try {
        // Realiza la solicitud GET a la API
        const res = await fetch(apiBase);
        // Retorna la respuesta JSON
        return await res.json();
    } catch {
        // En caso de error, retorna un objeto de error uniforme
        return { status: 500, message: "Failed to load products", data: null };
    }
}

// Función para obtener un producto específico por su ID
export async function getProduct(id) {
    try {
        // Realiza la solicitud GET con el ID del producto
        const res = await fetch(`${apiBase}/${id}`);
        // Retorna la respuesta JSON
        return await res.json();
    } catch {
        // En caso de error, retorna un objeto de error uniforme
        return { status: 500, message: "Failed to load product", data: null };
    }
}

// Función para crear un producto o actualizar uno existente
export async function saveProduct(id, body) {
    try {
        // Determina si se usará POST (crear) o PUT (actualizar)
        const method = id ? "PUT" : "POST";
        // Determina la URL según si se actualiza o crea
        const url = id ? `${apiBase}/${id}` : apiBase;

        // Realiza la solicitud con método, headers y body JSON
        const res = await fetch(url, {
            method,
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(body)
        });

        // Retorna la respuesta JSON
        return await res.json();
    } catch {
        // En caso de error, retorna un objeto de error uniforme
        return { status: 500, message: "Failed to save product", data: null };
    }
}

// Función para eliminar un producto por su ID
export async function deleteProductApi(id) {
    try {
        // Realiza la solicitud DELETE a la API
        const res = await fetch(`${apiBase}/${id}`, { method: "DELETE" });
        // Retorna la respuesta JSON
        return await res.json();
    } catch {
        // En caso de error, retorna un objeto de error uniforme
        return { status: 500, message: "Failed to delete product", data: null };
    }
}

// Renderiza la tabla de productos en el HTML.
export function renderTable(products) {
    const table = document.getElementById("products-table");
    table.innerHTML = "";

    products.forEach(product => {
        table.innerHTML += `
            <tr class="border-b">
                <td class="p-2">${product.id}</td>
                <td class="p-2">${product.name}</td>
                <td class="p-2">${product.price}</td>
                <td class="p-2">${product.description}</td>
                <td class="p-2 flex gap-2">
                    <button data-edit="${product.id}"
                        class="bg-yellow-500 text-white px-3 py-1 rounded-lg">Editar</button>

                    <button data-delete="${product.id}"
                        class="bg-red-600 text-white px-3 py-1 rounded-lg">Eliminar</button>
                </td>
            </tr>
        `;
    });
}

// Llena el formulario con los datos de un producto para editarlo.
export function fillForm(product) {
    document.getElementById("product-id").value = product.id;
    document.getElementById("name").value = product.name;
    document.getElementById("price").value = product.price;
    document.getElementById("description").value = product.description;

    document.getElementById("submit-btn").textContent = "Actualizar Producto";
    document.getElementById("form-title").textContent = "Editar Producto";
}

// Resetea el formulario a su estado inicial para crear un nuevo producto.
export function resetForm() {
    document.getElementById("product-form").reset();
    document.getElementById("product-id").value = "";

    document.getElementById("submit-btn").textContent = "Crear Producto";
    document.getElementById("form-title").textContent = "Crear Producto";
}

// Muestra un mensaje en la interfaz con el texto y color indicados.
export function showMessage(text, color) {
    const messageBox = document.getElementById("message");
    messageBox.textContent = text;
    messageBox.className = `${color} mb-4 text-lg font-semibold`;
}

import {
    getProducts,
    getProduct,
    saveProduct,
    deleteProductApi
} from "../api/productsApi";

import {
    renderTable,
    fillForm,
    resetForm,
    showMessage
} from "../dom/productsDom";


document.addEventListener("DOMContentLoaded", () => {

    const productForm = document.getElementById("product-form");

    // ======================
    //   CARGAR PRODUCTOS
    // ======================
    async function loadProducts() {
        const response = await getProducts();
        renderTable(response.data);
    }

    // ======================
    //   GUARDAR PRODUCTO
    // ======================
    productForm.addEventListener("submit", async (e) => {
        e.preventDefault();

        const id = document.getElementById("product-id").value;
        const body = {
            name: document.getElementById("name").value,
            price: document.getElementById("price").value,
            description: document.getElementById("description").value
        };

        const res = await saveProduct(id, body);

        showMessage(res.message, "text-green-600");
        resetForm();
        loadProducts();
    });

    // ======================
    //   EDITAR Y ELIMINAR
    // ======================
    document.addEventListener("click", async (e) => {

        // Editar
        if (e.target.dataset.edit) {
            const id = e.target.dataset.edit;
            const response = await getProduct(id);
            fillForm(response.data);
        }

        // Eliminar
        if (e.target.dataset.delete) {
            const id = e.target.dataset.delete;

            if (confirm("¿Seguro que deseas eliminar este producto?")) {
                const response = await deleteProductApi(id);
                showMessage(response.message, "text-red-600");
                loadProducts();
            }
        }
    });

    loadProducts();
});

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/pages/products.js'])

</head>

<body class="bg-gray-100 p-10">

    <div class="max-w-4xl mx-auto">

        <h1 class="text-3xl font-bold mb-6">Gestión de Productos</h1>

        <!-- FORMULARIO -->
        <div class="bg-white p-6 rounded-xl shadow-md mb-10">
            <h2 id="form-title" class="text-xl font-semibold mb-4">Crear Producto</h2>

            <form id="product-form" class="space-y-4">
                <input type="hidden" id="product-id">

                <div>
                    <label class="block font-medium">Nombre</label>
                    <input id="name" type="text" class="w-full p-2 rounded-lg border border-gray-300" required>
                </div>

                <div>
                    <label class="block font-medium">Precio</label>
                    <input id="price" type="number" step="0.01"
                        class="w-full p-2 rounded-lg border border-gray-300" required>
                </div>

                <div>
                    <label class="block font-medium">Descripción</label>
                    <textarea id="description" class="w-full p-2 rounded-lg border border-gray-300" required></textarea>
                </div>

                <button id="submit-btn" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Crear Producto
                </button>
            </form>
        </div>

        <!-- MENSAJES -->
        <div id="message" class="mb-4 text-lg font-semibold"></div>

        <!-- TABLA -->
        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-xl font-semibold mb-4">Listado de Productos</h2>

            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="p-2">ID</th>
                        <th class="p-2">Nombre</th>
                        <th class="p-2">Precio</th>
                        <th class="p-2">Descripción</th>
                        <th class="p-2">Acciones</th>
                    </tr>
                </thead>

                <tbody id="products-table"></tbody>
            </table>
        </div>

    </div>

</body> 
</html>

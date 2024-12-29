<?php
require __DIR__ . '/../partials/head.php';
require __DIR__ . '/../partials/nav-dashboard.php';
?>

<div class="relative md:ml-64 bg-blueGray-50">
    <?php
    require __DIR__ . '/../partials/nav-header-dashboard.php';
    ?>
    <div class="relative bg-pink-600 md:pt-32 pb-32 pt-12">
        <div class="px-4 md:px-10 mx-auto w-full">
            <div>

                <div class="flex flex-wrap">
                    <div class="w-full lg:w-12 xl:w-12 px-4">
                        <div class="relative flex flex-col min-w-0 break-words">
                            <div class="flex content-center items-center justify-center h-full">
                                <div class="w-full lg:w-6/12 px-4">
                                    <div
                                            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0"
                                    >
                                        <div class="flex-auto mt-8 px-4 lg:px-10 py-10 pt-0">
                                            <form id="order-create" action="/dashboard/orders/update" method="POST">
                                                <input type="hidden" name="_method" value="PUT">
                                                <div class="relative w-full mb-3">
                                                    <label
                                                            for="description"
                                                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                            htmlFor="grid-password"
                                                    >
                                                        <span class="text-red-500">* </span>Descrição do Pedido
                                                    </label>
                                                    <input
                                                            type="text"
                                                            id="description"
                                                            name="description"
                                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                            placeholder="Descrição"
                                                            value="<?= $render_data['description'] ?>"
                                                            required
                                                    />
                                                </div>
                                                <div class="relative w-full mb-3">
                                                    <label
                                                            for="quantity"
                                                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                            htmlFor="grid-password"
                                                    >
                                                        <span class="text-red-500">* </span>Quantidade
                                                    </label>
                                                    <input
                                                            type="number"
                                                            id="quantity"
                                                            name="quantity"
                                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                            placeholder="Quantidade"
                                                            value="<?= $render_data['quantity'] ?>"
                                                            required
                                                    />
                                                </div>

                                                <div class="relative w-full mb-3">
                                                    <label
                                                            for="price"
                                                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                            htmlFor="grid-password"
                                                    >
                                                        <span class="text-red-500">* </span>Preço
                                                    </label>
                                                    <input
                                                            type="text"
                                                            id="price"
                                                            name="price"
                                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                            placeholder="R$0,00"
                                                            value="<?= $render_data['price'] ?>"
                                                            required
                                                    />
                                                </div>
                                                <span class="p-2"><span class="text-red-500">* </span>Campos obrigatórios.</span>

                                                <div class="text-center mt-6">
                                                    <button
                                                            class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                                                            type="submit"
                                                    >
                                                        Cadastrar
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require __DIR__ . '/../partials/footer-dashboard.php';
    ?>
</div>
</div>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script type="text/javascript" src="/assets/js/main.js"></script>
<script type="text/javascript" src="/assets/js/input-masks.js"></script>
</body>
</html>

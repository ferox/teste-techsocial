<?php
require __DIR__ . '/../partials/head.php';
require __DIR__ . '/../partials/nav-dashboard.php';
?>

<div class="relative md:ml-64 bg-blueGray-50">
    <?php
    require __DIR__ . '/../partials/nav-header-dashboard.php';
    ?>
    <div class="relative bg-pink-600 md:pt-32 pb-32 pt-12">
        <div class="w-full mb-12 px-4">
            <div class="flex justify-center align-middle">
                <div id="createAlert" class="text-white px-12 py-4 border-0 rounded relative mb-8 bg-emerald-500 hidden">
                        <span class="inline-block align-middle mr-8">
                            <b class="capitalize">Pedido criado com sucesso!</b>
                        </span>
                    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 pr-4 outline-none focus:outline-none" onclick="closeAlert(event)">
                        <span>×</span>

                    </button>
                </div>
                <div id="errorCreateAlert" class="text-white px-12 py-4 border-0 rounded relative mb-8 bg-orange-500 hidden">
                        <span class="inline-block align-middle mr-8">
                            <b class="capitalize">Não foi possível criar pedido!</b>
                        </span>
                    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 pr-4 outline-none focus:outline-none" onclick="closeAlert(event)">
                        <span>×</span>

                    </button>
                </div>
                <div id="deleteAlert" class="text-white px-12 py-4 border-0 rounded relative mb-8 bg-emerald-500 hidden">
                        <span class="inline-block align-middle mr-8">
                            <b class="capitalize">Pedido deletado com sucesso!</b>
                        </span>
                    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 pr-4 outline-none focus:outline-none" onclick="closeAlert(event)">
                        <span>×</span>

                    </button>
                </div>
                <div id="errorDeleteAlert" class="text-white px-12 py-4 border-0 rounded relative mb-8 bg-orange-500 hidden">
                        <span class="inline-block align-middle mr-8">
                            <b class="capitalize">Não foi possível deletar pedido!</b>
                        </span>
                    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 pr-4 outline-none focus:outline-none" onclick="closeAlert(event)">
                        <span>×</span>

                    </button>
                </div>
                <div id="updateAlert" class="text-white px-12 py-4 border-0 rounded relative mb-8 bg-emerald-500 hidden">
                        <span class="inline-block align-middle mr-8">
                            <b class="capitalize">Pedido atualizado com sucesso!</b>
                        </span>
                    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 pr-4 outline-none focus:outline-none" onclick="closeAlert(event)">
                        <span>×</span>

                    </button>
                </div>
                <div id="errorUpdateAlert" class="text-white px-12 py-4 border-0 rounded relative mb-8 bg-orange-500 hidden">
                        <span class="inline-block align-middle mr-8">
                            <b class="capitalize">Não foi possível atualizar pedido!</b>
                        </span>
                    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 pr-4 outline-none focus:outline-none" onclick="closeAlert(event)">
                        <span>×</span>

                    </button>
                </div>
            </div>
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-lg text-blueGray-700">
                                Pedidos
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="block w-full overflow-x-auto">

                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                        <tr>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                Descrição
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                Quantidade
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                Preço
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                Responsável
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($render_data as $order): ?>
                        <tr>
                            <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center">
                                <span class="ml-3 font-bold text-blueGray-600">
                                    <?= $order['description']; ?>
                                </span>
                            </th>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                <?= $order['quantity']; ?>
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                R$<?= $order['price']; ?>
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                <?= $order['user_name']; ?>
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right">
                                <a href="#" class="text-blueGray-500 block py-1 px-3" onclick="openDropdown(event,'actions-order-<?= $order['id']; ?>')"">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48" id="actions-order-<?= $order['id']; ?>">
                                    <a href="/dashboard/orders/edit/<?= htmlspecialchars($order['id']); ?>" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                        Editar
                                    </a>
                                    <a href="/dashboard/orders/delete/<?= htmlspecialchars($order['id']); ?>" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                        Deletar
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php
                    if (count($render_data) === 0) { ?>
                        <span class="flex align-middle justify-center p-8 font-semibold text-lg text-blueGray-700">Nenhum registro encontrado</span>
                    <?php }
                    ?>
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
<script type="text/javascript" src="/assets/js/alerts.js"></script>
</body>
</html>
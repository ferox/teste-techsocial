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
                        <?php foreach ($ordersList as $order): ?>
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
                                <?= $order['price']; ?>
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
                    if (count($ordersList) === 0) { ?>
                        <span class="flex align-middle justify-center p-8 font-semibold text-lg text-blueGray-700">Nenhum registro encontrado</span>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="px-4 md:px-10 mx-auto w-full">
        <?php
        require __DIR__ . '/../partials/footer-dashboard.php';
        ?>
    </div>
</div>
</div>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script type="text/javascript" src="/assets/js/scripts.js"></script>
</body>
</html>
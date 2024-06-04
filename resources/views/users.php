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
                            <b class="capitalize">Usuário criado com sucesso!</b>
                        </span>
                    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 pr-4 outline-none focus:outline-none" onclick="closeAlert(event)">
                        <span>×</span>

                    </button>
                </div>
                <div id="errorCreateAlert" class="text-white px-12 py-4 border-0 rounded relative mb-8 bg-orange-500 hidden">
                        <span class="inline-block align-middle mr-8">
                            <b class="capitalize">Não foi possível criar usuário!</b>
                        </span>
                    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 pr-4 outline-none focus:outline-none" onclick="closeAlert(event)">
                        <span>×</span>

                    </button>
                </div>
                <div id="deleteAlert" class="text-white px-12 py-4 border-0 rounded relative mb-8 bg-emerald-500 hidden">
                        <span class="inline-block align-middle mr-8">
                            <b class="capitalize">Usuário deletado com sucesso!</b>
                        </span>
                    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 pr-4 outline-none focus:outline-none" onclick="closeAlert(event)">
                        <span>×</span>

                    </button>
                </div>
                <div id="errorDeleteAlert" class="text-white px-12 py-4 border-0 rounded relative mb-8 bg-orange-500 hidden">
                        <span class="inline-block align-middle mr-8">
                            <b class="capitalize">Não foi possível deletar usuário!</b>
                        </span>
                    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 pr-4 outline-none focus:outline-none" onclick="closeAlert(event)">
                        <span>×</span>

                    </button>
                </div>
                <div id="updateAlert" class="text-white px-12 py-4 border-0 rounded relative mb-8 bg-emerald-500 hidden">
                        <span class="inline-block align-middle mr-8">
                            <b class="capitalize">Usuário atualizado com sucesso!</b>
                        </span>
                    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 pr-4 outline-none focus:outline-none" onclick="closeAlert(event)">
                        <span>×</span>

                    </button>
                </div>
                <div id="errorUpdateAlert" class="text-white px-12 py-4 border-0 rounded relative mb-8 bg-orange-500 hidden">
                        <span class="inline-block align-middle mr-8">
                            <b class="capitalize">Não foi possível atualizar usuário!</b>
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
                                Usuários
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="block w-full overflow-x-auto">

                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                        <tr>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                Nome
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                Sobrenome
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                Documento
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                Email
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                Telefone
                            </th>
                            <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($render_data as $user): ?>
                        <tr>
                            <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center">
                                <span class="ml-3 font-bold text-blueGray-600">
                                    <?= $user['first_name']; ?>
                                </span>
                            </th>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                <?= empty($user['last_name']) ? 'N/I' : $user['last_name'];; ?>
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                <?= empty($user['document']) ? 'N/I' : $user['document']; ?>
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                <?= $user['email']; ?>
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                <?= empty($user['phone_number']) ? 'N/I' : $user['phone_number']; ?>
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right">
                                <a href="#" class="text-blueGray-500 block py-1 px-3" onclick="openDropdown(event,'actions-user-<?= $user['id']; ?>')">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48" id="actions-user-<?= $user['id']; ?>">
                                    <a href="/dashboard/users/edit/<?= htmlspecialchars($user['id']); ?>" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                        Editar
                                    </a>
                                    <a href="/dashboard/users/delete/<?= htmlspecialchars($user['id']); ?>" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
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
    <div class="px-4 md:px-10 mx-auto w-full">
        <?php
        require __DIR__ . '/../partials/footer-dashboard.php';
        ?>
    </div>
</div>
</div>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script type="text/javascript" src="/assets/js/main.js"></script>
<script type="text/javascript" src="/assets/js/alerts.js"></script>
</body>
</html>
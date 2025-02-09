<?php
require __DIR__ . '/../partials/head.php';
require __DIR__ . '/../partials/nav-home.php';
?>

<section class="relative w-full h-full py-40 min-h-screen">
    <div
        class="absolute top-0 w-full h-full bg-blueGray-800 bg-full bg-no-repeat"
        style="background-image: url(../assets/images/register_bg_2.png)"
    ></div>
    <div class="container mx-auto px-4 h-full">
        <div class="flex content-center items-center justify-center h-full">

            <div class="w-full lg:w-4/12 px-4">
                <div id="createAlert" class="text-white px-6 py-4 border-0 rounded relative mb-8 bg-emerald-500 hidden">
                    <span class="inline-block align-middle mr-8">
                        <b class="capitalize">Usuário criado com sucesso!</b>
                    </span>
                    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 pr-4 outline-none focus:outline-none" onclick="closeAlert(event)">
                        <span>×</span>

                    </button>
                </div>
                <div id="notFoundUserAlert" class="text-white px-6 py-4 border-0 rounded relative mb-8 bg-yellow-500 hidden">
                    <span class="inline-block align-middle mr-8">
                        <b class="capitalize">Usuário não econtrado!</b>
                    </span>
                    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 pr-4 outline-none focus:outline-none" onclick="closeAlert(event)">
                        <span>×</span>

                    </button>
                </div>
                <div
                    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0"
                >
                    <div class="flex-auto mt-8 px-4 lg:px-10 py-10 pt-0">
                        <form action="/login" method="POST">
                            <div class="relative w-full mb-3">
                                <label
                                        for="email"
                                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                >Email</label
                                ><input
                                    type="email"
                                    id="email"
                                    name="email"
                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                    placeholder="Email"
                                />
                            </div>
                            <div class="text-center mt-6">
                                <button
                                    class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                                    type="submit"
                                >
                                    Logar-se
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>

</script>


<?php
require __DIR__ . '/../partials/footer.php';
?>
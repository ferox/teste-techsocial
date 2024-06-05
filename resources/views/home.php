<?php
require __DIR__ . '/../partials/head.php';
require __DIR__ . '/../partials/nav-home.php';
?>

<section
        class="header relative pt-16 items-center flex h-screen max-h-860-px"
>
    <div class="container mx-auto items-center flex flex-wrap">
        <div class="w-full md:w-8/12 lg:w-6/12 xl:w-6/12 px-4">
            <div class="pt-32 sm:pt-0">
                <h2 class="font-semibold text-4xl text-blueGray-600">
                    Petitones a sua solução para gestão de pedidos em demanda.
                </h2>
                <p class="mt-4 text-lg leading-relaxed text-blueGray-500">
                    O Petitiones é sistema web usado em vários setores para entrada e processamento de pedidos.
                </p>
                <p class="mt-4 text-lg leading-relaxed text-blueGray-500">
                    O gerenciamento de pedidos é o processo de captura, rastreamento e atendimento de pedidos de clientes.
                </p>
                <p class="mt-4 text-lg leading-relaxed text-blueGray-500">
                    O processo de gerenciamento de pedidos começa quando um pedido é feito e termina quando o cliente recebe o seu produto.
                </p>
                <div class="mt-12">
                    <a
                            href="/register"
                            class="get-started text-white font-bold px-6 py-4 rounded outline-none focus:outline-none mr-1 mb-1 bg-pink-500 active:bg-pink-600 uppercase text-sm shadow hover:shadow-lg ease-linear transition-all duration-150"
                    >
                        Comece aqui
                    </a>
                    <a
                            href="https://github.com/ferox/teste-techsocial"
                            class="github-star ml-1 text-white font-bold px-6 py-4 rounded outline-none focus:outline-none mr-1 mb-1 bg-blueGray-700 active:bg-blueGray-600 uppercase text-sm shadow hover:shadow-lg ease-linear transition-all duration-150"
                            target="_blank"
                    >
                        Estrela no repo
                    </a>
                </div>
            </div>
        </div>
    </div>

    <img
            class="absolute top-0 b-auto right-0 pt-16 sm:w-6/12 -mt-48 sm:mt-0 w-10/12 max-h-860-px"
            src="./assets/images/ill_header_3.png"
            alt="..."
    />
</section>

<?php
require __DIR__ . '/../partials/footer.php';
?>

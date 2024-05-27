<nav
    class="top-0 fixed z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg bg-white shadow"
>
    <div
        class="container px-4 mx-auto flex flex-wrap items-center justify-between"
    >
        <div
            class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start"
        >
            <a
                class="text-blueGray-700 text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase"
                href="/"
            >Petitiones</a
            ><button
                class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                type="button"
                onclick="toggleNavbar('collapse-navbar')"
            >
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <div
            class="lg:flex flex-grow items-center bg-white lg:bg-opacity-0 lg:shadow-none hidden"
            id="collapse-navbar"
        >
            <ul
                class="flex flex-col lg:flex-row list-none lg:ml-auto items-center"
            >
                <li class="flex items-center">
                    <button
                        class="text-white bg-pink-500 active:bg-pink-600 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3 ease-linear transition-all duration-150"
                        type="button"
                        onclick="location.href='/login'"
                    >
                        <i class="fas fa-sign-in-alt"></i> Login
                    </button>
                </li>

                <li class="flex items-center">
                    <button
                        class="text-white bg-pink-500 active:bg-pink-600 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3 ease-linear transition-all duration-150"
                        type="button"
                        onclick="location.href='/register'"
                    >
                        <i class="fas fa-user-plus"></i> Cadastro
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>
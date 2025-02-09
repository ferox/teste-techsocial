<nav
        class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6"
>
    <div
            class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto"
    >
        <button
                class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                type="button"
                onclick="toggleNavbar('collapse-sidebar')"
        >
            <i class="fas fa-bars"></i>
        </button>
        <a
                class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                href="/"
        >
            Petitiones
        </a>
        <ul class="md:hidden items-center flex flex-wrap list-none">
            <li class="inline-block relative">
                <a
                        class="text-blueGray-500 block"
                        href="#"
                        onclick="openDropdown(event,'user-responsive-dropdown')"
                ><div class="items-center flex">
                  <span
                          class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"
                  >
                       <i class="fas fa-user fa-lg"></i>
                  </span></div
                    ></a>
                <div
                        class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                        id="user-responsive-dropdown"
                >
                    <a
                            href="/logout"
                            class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                    >Logout</a
                    >
                </div>
            </li>
        </ul>
        <div
                class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden"
                id="collapse-sidebar"
        >
            <div
                    class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200"
            >
                <div class="flex flex-wrap">
                    <div class="w-6/12">
                        <a
                                class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                                href="/"
                        >
                           Petitiones
                        </a>
                    </div>
                    <div class="w-6/12 flex justify-end">
                        <button
                                type="button"
                                class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                                onclick="toggleNavbar('collapse-sidebar')"
                        >
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
            <h6
                    class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 no-underline"
            >
                <a
                        href="/dashboard"
                        class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-pink-600"
                >
                    <i class="fas fa-warehouse r-2 text-sm opacity-75"></i>
                    Dashboard
                </a>
            </h6>
            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <h6
            class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
            >
            Usuários
            </h6>
            <!-- Navigation -->

            <ul
                    class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4"
            >
                <li class="items-center">
                    <a
                            href="/dashboard/users"
                            class="text-blueGray-700 hover:text-pink-600 text-xs uppercase py-3 font-bold block"
                    >
                        <i class="fas fa-users text-blueGray-300 mr-2 text-sm"></i>
                        Listagem
                    </a>
                </li>

                <li class="items-center">
                    <a
                            href="/dashboard/users/form"
                            class="text-blueGray-700 hover:text-pink-600 text-xs uppercase py-3 font-bold block"
                    >
                        <i
                                class="fas fa-user-plus text-blueGray-300 mr-2 text-sm"
                        ></i>
                        Cadastro
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <h6
                    class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
            >
                Pedidos
            </h6>
            <!-- Navigation -->

            <ul
                    class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4"
            >
                <li class="items-center">
                    <a
                            href="/dashboard/orders"
                            class="text-blueGray-700 hover:text-pink-600 text-xs uppercase py-3 font-bold block"
                    >
                        <i class="fas fa-shopping-cart text-blueGray-300 mr-2 text-sm"></i>
                        Listagem
                    </a>
                </li>

                <li class="items-center">
                    <a
                            href="/dashboard/orders/form"
                            class="text-blueGray-700 hover:text-pink-600 text-xs uppercase py-3 font-bold block"
                    >
                        <i
                                class="fas fa-cart-plus text-blueGray-300 mr-2 text-sm"
                        ></i>
                        Cadastro
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
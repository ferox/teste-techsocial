<nav class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
    <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
        <a class="text-white text-sm uppercase hidden lg:inline-block font-semibold" href="/dashboard">Dashboard</a>
        <ul class="flex-col md:flex-row list-none items-center hidden md:flex">
            <a class="text-blueGray-500 block" href="#" onclick="openDropdown(event,'user-dropdown')">
                <div class="items-center flex">
                        <span class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full">
                            <i class="fas fa-user fa-lg"></i>
                        </span>
                </div>
            </a>
            <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48" id="user-dropdown">
                <a href="/logout" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                    Logout
                </a>
            </div>
        </ul>
    </div>
</nav>

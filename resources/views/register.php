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
            <div class="w-full lg:w-6/12 px-4">
              <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0"
                >
                <div class="flex-auto mt-8 px-4 lg:px-10 py-10 pt-0">
                  <form action="/users/create" method="POST">
                    <div class="relative w-full mb-3">
                      <label
                              for="first_name"
                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                        htmlFor="grid-password"
                            >
                            Nome
                      </label>
                      <input
                        type="text"
                        id="first_name"
                        name="first_name"
                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                        placeholder="Nome"
                            />
                    </div>
                      <div class="relative w-full mb-3">
                          <label
                                  for="last_name"
                                  class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                  htmlFor="grid-password"
                          >
                              Sobrenome
                          </label>
                          <input
                                  type="text"
                                  id="last_name"
                                  name="last_name"
                                  class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                  placeholder="Sobrenome"
                          />
                      </div>

                      <div class="relative w-full mb-3">
                          <label
                                  for="document"
                                  class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                  htmlFor="grid-password"
                          >
                              Documento de Identificação
                          </label>
                          <input
                                  type="text"
                                  id="document"
                                  name="document"
                                  class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                  placeholder="RG ou CPF"
                          />
                      </div>

                    <div class="relative w-full mb-3">
                      <label
                        for="email"
                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                        htmlFor="grid-password"
                            >
                            Email
                      </label>
                      <input
                        type="email"
                        id="email"
                        name="email"
                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                        placeholder="Email"
                            />
                    </div>

                      <div class="relative w-full mb-3">
                          <label
                                  for="phone_number"
                                  class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                  htmlFor="grid-password"
                          >
                              Telefone
                          </label>
                          <input
                                  type="text"
                                  id="phone_number"
                                  name="phone_number"
                                  class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                  placeholder="Telefone"
                          />
                      </div>

                      <div class="relative w-full mb-3">
                          <label
                                  for="birth_date"
                                  class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                  htmlFor="grid-password"
                          >
                              Data Nascimento
                          </label>
                          <input
                                  type="text"
                                  id="birth_date"
                                  name="birth_date"
                                  class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                  placeholder="dd/mm/aaaa"
                          />
                      </div>

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
      </section>

<?php
require __DIR__ . '/../partials/footer.php';
?>
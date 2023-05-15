<template>
  <nav class="bg-white border-gray-200 dark:bg-emerald-500">
    <div
      class=" flex flex-wrap items-center justify-between mx-auto p-4 container"
    >

      <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul
          class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-emerald-500 md:dark:bg-emerald-500 dark:border-gray-700"
        >
          <li>
            <a
              href="/login"
              class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"
              aria-current="page"
              >Login</a
            >
          </li>
          <li>
            <a
              href="/register"
              class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
              >Cadastro</a
            >
          </li>
          <li>
            <a
              href="/cadastro-reservas"
              class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
              >Fazer Reservas</a
            >
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <router-view></router-view>
</template>

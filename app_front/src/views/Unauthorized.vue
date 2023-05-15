

<template>	

<div
  class="
    flex
    items-center
    justify-center
    w-full
    h-screen
    bg-gradient-to-r
    from-indigo-600
    to-emerald-400
  "
>
  <div class="px-40 py-20 bg-white rounded-md shadow-xl">
    <div class="flex flex-col items-center">
      <h1 class="font-bold text-blue-600 text-9xl">404</h1>

      <h6 class="mb-2 text-2xl font-bold text-center text-gray-800 md:text-3xl">
        <span class="text-red-500">Oops!</span> Não Autorizado
      </h6>

      <p class="mb-8 text-center text-gray-500 md:text-lg">
        Você não tem autorização para acessar essa página. Faça o Login
      </p>

      <a
        href="/login"
        class="px-6 py-2 text-sm font-semibold text-blue-800 bg-blue-100"
        >Fazer Login</a
      >
    </div>
  </div>
</div>
</template>

<script>
import { defineComponent } from 'vue';
export default defineComponent({
	name: 'Unauthorized',
	props: {}
});
</script>
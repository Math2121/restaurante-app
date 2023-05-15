
<template>	
<div class="flex flex-col justify-center min-h-screen overflow-hidden">
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full text-left text-sm font-light">
          <thead class="border-b font-medium dark:border-neutral-500">
            <tr>
              <th scope="col" class="px-6 py-4">Nome</th>
              <th scope="col" class="px-6 py-4">Dia</th>
              <th scope="col" class="px-6 py-4">Horário</th>

            </tr>
          </thead>
          <tbody>
            <tr class="border-b dark:border-neutral-500">
              <td class="whitespace-nowrap px-6 py-4 font-medium">1</td>
              <td class="whitespace-nowrap px-6 py-4">Mark</td>
              <td class="whitespace-nowrap px-6 py-4">Otto</td>

            </tr>
            <tr class="border-b dark:border-neutral-500">
              <td class="whitespace-nowrap px-6 py-4 font-medium">2</td>
              <td class="whitespace-nowrap px-6 py-4">Jacob</td>
              <td class="whitespace-nowrap px-6 py-4">Thornton</td>

            </tr>
  
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</template>

<script>

export default {
	name: 'Reservas',
	props: {}
}
</script>

<template>
  <section class="container mx-auto">
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
              <tbody v-for="item in items" :key="item.nome">
                <tr class="border-b dark:border-neutral-500">
                  <td class="whitespace-nowrap px-6 py-4 font-medium">
                    {{ item.nome }}
                  </td>
                  <td class="whitespace-nowrap px-6 py-4">{{ formatarData(item.dia) }}</td>
                  <td class="whitespace-nowrap px-6 py-4">
                    {{ item.horario }}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import httpClient from "../services/axios";
import { getToken } from "../utils/utils";
import moment from "moment"
export default {
  name: "Reservas",
  data() {
    return {
      items: [],
    };
  },
  created() {
    this.pegarTodasAsReservas();
  },
  methods: {
    pegarTodasAsReservas() {
      httpClient
        .get("/reservas", {
          headers: {
            Authorization: `Bearer ${getToken()}`,
          },
        })
        .then((response) => {
          console.log(response);
          this.items = response.data;

        });
    },
    formatarData(dia){
      const dataMoment = moment(dia)

      return dataMoment.format('DD/MM/YYYY')
    }
  },
};
</script>

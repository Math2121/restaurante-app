<template>
  <div
    class="relative flex flex-col justify-center min-h-screen overflow-hidden"
  >
    <div
      class="w-full p-6 m-auto bg-white rounded shadow-lg ring-2 emerald-500/50 lg:max-w-md"
    >
      <h1 class="text-3xl font-semibold text-center text-emerald-700">
        Fazer Reserva
      </h1>

      <form class="mt-6" @submit.prevent="submitReserva">
        <div class="mt-4">
          <div>
            <Input label="Nome" type="text" v-model="nome" />
          </div>
        </div>
        <div class="mt-4">
          <div>
            <Input label="Data" type="date" v-model="dataEscolhida" />
          </div>
        </div>
        <div class="mt-4">
          <div>
            <Input label="Horario" type="time" v-model="horario" />
          </div>
        </div>
        <div class="mt-6">
          <button
            class="w-full px-4 py-2 text-white transition-colors duration-200 transform bg-emerald-500 rounded-md hover:bg-emerald-200 disabled:opacity-25"
            :disabled="isDisabled"
          >
            Reservar
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Input from "../components/Input.vue";
import httpClient from "../services/axios";
export default {
  components: {
    Input,
  },
  name: "CadastroReservas",
  data() {
    return {
      nome: "",
      dataEscolhida: "",
      horario: "",
      isDisabled: false,
    };
  },
  methods: {
    submitReserva() {
      this.isDisabled = true;
      const data = {
        nome: this.nome,
        dia: this.dataEscolhida,
        horario: this.horario,
      };

      httpClient
        .post("criar/reserva", data)
        .then((response) => {
          this.$swal({
            title: "Sucesso",
            icon: "success",
            html: "<div>Rerserva Realizada!</div>",
            confirmButtonText: "Ok",
            customClass: {
              confirmButton:
                "text-white transition-colors duration-200 transform bg-purple-700 rounded-md hover:bg-purple-600 w-full px-4 py-2",
            },
            buttonsStyling: false,
          });
        })
        .catch((error) => {
      
          this.$swal({
            title: "Erro",
            icon: "warning",
            html: `<div>${error.response.data.message}</div>`,
            confirmButtonText: "Ok",
            customClass: {
              confirmButton:
                "text-white transition-colors duration-200 transform bg-purple-700 rounded-md hover:bg-purple-600 w-full px-4 py-2",
            },
            buttonsStyling: false,
          });
        })
        .finally(() => {
          this.nome = "";
          this.dataEscolhida = "";
          this.horario = "";
		  this.isDisabled = false;
        });
    },
  },
};
</script>

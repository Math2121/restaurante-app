<template>
  <div
    class="relative flex flex-col justify-center min-h-screen overflow-hidden"
  >
    <div
      class="w-full p-6 m-auto bg-white rounded shadow-lg ring-2 emerald-500/50 lg:max-w-md"
    >
      <h1 class="text-3xl font-semibold text-center text-emerald-700">
        Cadastro
      </h1>

      <form class="mt-6" @submit.prevent="submitRegister">
        <div>
          <Input label="Email" type="email" v-model="email" />
        </div>
        <div class="mt-4">
          <div>
            <Input label="Senha" type="password" v-model="senha" />
          </div>
        </div>
        <div class="mt-6">
          <button
            class="w-full px-4 py-2 text-white transition-colors duration-200 transform bg-emerald-500 rounded-md hover:bg-emerald-200"
            :disabled="isDisabled"
          >
            Cadastrar
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Input from "../components/Input.vue";
import router from '@/router'; 
import httpClient from "../services/axios";
export default {
  components: {
    Input,
  },
  name: "Register",
  data() {
    return {
      email: "",
      senha: "",
      isDisabled:false
    };
  },
  methods: {
    submitRegister() {
      this.isDisabled = true
      const data = {
        email: this.email,
        password: this.senha,
      };

      httpClient
        .post('registra',  data )
        .then((response) => {
          console.log(response);
          localStorage.setItem('token', response.data.token);
          router.push('/reservas')
        })
        .catch((error) => {
          this.$swal({
                title: 'Erro',
                icon: 'warning',
                html: '<div>Houve um erro ao tentar cadastrar.Tente novamente</div>',
                confirmButtonText: 'Ok',
                customClass: {
                confirmButton: 'text-white transition-colors duration-200 transform bg-purple-700 rounded-md hover:bg-purple-600 w-full px-4 py-2',
                },
                buttonsStyling: false,
            })
        });
        this.isDisabled = false
    },
  },
};
</script>

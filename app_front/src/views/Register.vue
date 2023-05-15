<template>
  <div
    class="relative flex flex-col justify-center min-h-screen overflow-hidden"
  >
    <div
      class="w-full p-6 m-auto bg-white rounded shadow-lg ring-2 ring-purple-800/50 lg:max-w-md"
    >
      <h1 class="text-3xl font-semibold text-center text-purple-700">
        Cadastro
      </h1>

      <form class="mt-6" @submit.prevent="submitRegister">
        <div>
        <Input label="Email"  type="email" v-model="email"/>
        </div>
        <div class="mt-4">
          <div>
			<Input label="Senha" type="password" v-model="senha"/>
          </div>
		</div>
          <div class="mt-6">
            <button
              class="w-full px-4 py-2 text-white transition-colors duration-200 transform bg-purple-700 rounded-md hover:bg-purple-600 "
            >
              Cadastrar
            </button>
          </div>
    
      </form>
      <p class="mt-8 text-xs font-light text-center text-gray-700">
        <a href="#" class="font-medium text-purple-600 hover:underline"
          >Login</a
        >
      </p>
    </div>
  </div>
</template>

<script>
import Input from "../components/Input.vue";
export default {
  components: {
    Input,
  },
  name: "Register",
  data(){
	return {
		email: '',
		senha: ''
	}
  },
  methods: {
	submitRegister() {
		console.log('je')


		console.log(this.email)
		console.log(this.senha)
	}
  }
};
</script>

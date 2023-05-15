import { createRouter, createWebHistory } from 'vue-router'
import Register from '../views/Register.vue'
import Login from '../views/Login.vue'
import Reservas from '../views/Reservas.vue'
import CadastroReservas from '../views/CadastroReservas.vue'
import Unauthorized from '../views/Unauthorized.vue'
import { getToken } from '../utils/utils'
const routes = [
  {
    path: '/register',
    name: 'Register',
    component: Register
  },
  {
    path: '/login',
    name: 'Login',
    component: Login
  },
  {
    path: '/',
    name: 'CadastroReservas',
    component: CadastroReservas

  },
  {
    path: '/unauthorized',
    name: 'Unauthorized',
    component: Unauthorized

  },
  {
    path: '/reservas',
    name: 'Reservas',
    component: Reservas,
    meta: {
      resource: 'ACL'
    }
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})


router.beforeEach((to, _, next) => {

  const token = getToken();
  console.log(token)
  if (to.meta.resource === 'ACL') {
    if (!token) return next({ name: 'Unauthorized' })
  }

  return next()
});

export default router
import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";
import About from "../views/About.vue";
import NotFound from "../views/NotFound.vue";
import AuthLayout from "../layouts/AuthLayout.vue";
import Login from "../views/auth/Login.vue";
import AppLayout from "../layouts/AppLayout.vue";
import Register from "../views/auth/Register.vue";
import ListAllMotorista from "../views/motorista/ListAllMotorista.vue";
import AddMotorista from "../views/motorista/AddMotorista.vue";

const routes = [
    {
      path: "/login",
      component: AuthLayout,
      children: [
        {
          path: "",
          name: "Login",
          component: Login
        },
        {
          path: "/register",
          name: "Register",
          component: Register
        }
      ]
    },
    {
      path: "/",
      component: AppLayout,
      children: [
        {
          path: "",
          name: "Home",
          component: Home
        },
        {
          path: "about",
          name: "About",
          component: About
        },
        {
          path: "motorista",
          name:"ListAllMotorista",
          component: ListAllMotorista, // Listar todos os motoristas
        },
        {
          path: "motorista/add", // Adicionar motorista
          name: "AddMotorista",
          component: AddMotorista
        }
      ]
    },
    {
      path: "/:pathMatch(.*)*",
      name: "NotFound",
      component: NotFound
    }
  ];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default createRouter({
    history: createWebHistory(),
    routes,
});

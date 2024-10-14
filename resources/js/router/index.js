import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";
import NotFound from "../views/NotFound.vue";
import AuthLayout from "../layouts/AuthLayout.vue";
import Login from "../views/auth/Login.vue";
import AppLayout from "../layouts/AppLayout.vue";
import Register from "../views/auth/Register.vue";
import ListAllMotorista from "../views/motorista/ListAllMotorista.vue";
import AddMotorista from "../views/motorista/AddMotorista.vue";
import ListAllTransportadora from "../views/transportadora/ListAllTransportadora.vue";
import AddTransportadora from "../views/transportadora/AddTransportadora.vue";
import EditTransportadora from "../views/transportadora/EditTransportadora.vue";
import EditMotorista from "../views/motorista/EditMotorista.vue";

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
          path: "motorista",
          name:"ListAllMotorista",
          component: ListAllMotorista, 
        },
        {
          path: "motorista/add", 
          name: "AddMotorista",
          component: AddMotorista
        },
        {
          path: "motorista/:id/edit", 
          name: "EditMotorista",
          component: EditMotorista
        },
        {
          path: "transportadora",
          name:"ListAllTransportadora",
          component: ListAllTransportadora, 
        },
        {
          path: "transportadora/add", 
          name: "AddTransportadora",
          component: AddTransportadora
        },
        {
          path: "transportadora/:id/edit", 
          name: "EditTransportadora",
          component: EditTransportadora
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

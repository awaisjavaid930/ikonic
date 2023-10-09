import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";

const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/register",
    name: "register",
    component: () => import("../views/auth/RegisterPage.vue"),
  },
  {
    path: "/login",
    name: "login",
    component: () => import("../views/auth/LoginPage.vue"),
  },
  {
    path: "/",
    component: import("../components/header/MenubarComponent.vue"),
    children: [
      {
        path: "/dashboard",
        component: import("../views/dashboard/DashboardPage.vue"),
      },
      {
        path: "/product",
        component: import("../views/product/ProductList.vue"),
      },
      {
        path: "/product/add",
        component: import("../views/product/ProductAdd.vue"),
      },
      {
        path: "/product/:id",
        component: import("../views/product/ProductDetail.vue"),
      },
    ],
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;

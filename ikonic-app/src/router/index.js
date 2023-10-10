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
      {
        path: "/product/:product_id/feedback",
        component: import("../views/feedback/FeedbackList.vue"),
      },
      {
        path: "/feedback/add/:product_id",
        component: import("../views/feedback/AddFeedback.vue"),
      },
      {
        path: "/permission",
        component: import("../views/permission/RoleList.vue"),
      },
      {
        path: "/role/:id",
        component: import("../views/permission/RoleDetailPage.vue"),
      },
    ],
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;

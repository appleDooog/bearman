import { createRouter, createWebHistory } from "vue-router";
import App from "@/App.vue";

const routes = [
  {
    path: "/",
  },
  {
    path: "/admin",
    name: "admin",
    components: {
      // logo: () => import("../components/admin/Home/adminLogo.vue"),
      default: () => import("../components/admin/login.vue"),
    },
  },
  {
    path: "/admin/home",
    name: "home",
    components: {
      logo: () => import("../components/admin/Home/adminLogo.vue"),
      default: () => import("../components/admin/home.vue"),
    },
  },
  {
    path: "/admin/member",
    name: "memberPanel",
    components: {
      logo: () => import("../components/admin/Home/adminLogo.vue"),
      default: () => import("../components/admin/member/index.vue"),
    },
    children: [
      {
        name: "list",
        path: "",
        component: () => import("../components/admin/member/memberList.vue"),
      },
      {
        name: "add",
        path: "add",
        component: () => import("../components/admin/member/memberAdd.vue"),
      },
      {
        name: "edit",
        path: "edit/:id?",
        component: () => import("../components/admin/member/memberEdit.vue"),
      },
    ],
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;

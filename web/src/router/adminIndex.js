import { createRouter, createWebHistory } from "vue-router";
import App from "@/App.vue";
import store from "@/store";

const routes = [
  {
    path: "/admin",
    name: "admin",
    components: {
      default: () => import("../components/admin/login.vue"),
    },
  },
  {
    path: "/admin/home",
    name: "home",
    components: {
      logo: () => import("../components/admin/Home/adminLogo.vue"),
      default: () => import("../components/admin/index.vue"),
    },
    children: [
      {
        name: "homeMemberList",
        path: "", // 預設顯示
        component: () => import("../components/admin/member/memberList.vue"),
      },
    ],
  },
  {
    path: "/admin/member",
    name: "memberPanel",
    components: {
      logo: () => import("../components/admin/Home/adminLogo.vue"),
      default: () => import("../components/admin/index.vue"),
    },
    children: [
      {
        name: "list",
        path: "",
        component: () => import("../components/admin/member/memberList.vue"),
      },
      {
        name: "add",
        path: ".",
        component: () => import("../components/admin/member/memberAdd.vue"),
      },
      {
        name: "edit",
        path: "./:id?",
        component: () => import("../components/admin/member/memberEdit.vue"),
      },
    ],
  },
  {
    path: "/admin/manager",
    name: "managerPanel",
    components: {
      logo: () => import("../components/admin/Home/adminLogo.vue"),
      default: () => import("../components/admin/index.vue"),
    },
    children: [
      {
        name: "adminList",
        path: "",
        component: () => import("../components/admin/manager/list.vue"),
      },
      {
        name: "adminAdd",
        path: ".",
        component: () => import("../components/admin/manager/add.vue"),
      },
      {
        name: "adminEdit",
        path: "./:id?",
        component: () => import("../components/admin/manager/edit.vue"),
      },
    ],
  },
  {
    path: "/admin/product",
    name: "productPanel",
    components: {
      logo: () => import("../components/admin/Home/adminLogo.vue"),
      default: () => import("../components/admin/index.vue"),
    },
    children: [
      {
        name: "productList",
        path: "",
        component: () => import("../components/admin/product/item/list.vue"),
      },
    ],
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

router.beforeEach((to, from) => {
  console.log(`Navigating from ${from.path} to ${to.path}`);
  const isLogin = store.state.auth.isLogin;

  // 如果是未登入狀態，導向登入頁
  if (!isLogin && to.path !== "/admin") {
    return { name: "admin" }; // 導向登入頁
  }

  // 如果是登入狀態並嘗試訪問登入頁，導向首頁
  if (isLogin && to.path === "/admin") {
    return { name: "home" }; // 導向首頁
  }

  return true; // 允許導航
});

export default router;

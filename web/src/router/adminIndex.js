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
    redirect: { name: "homeMemberList" }, // 指向子路由
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
    path: "/admin/settings",
    name: "webPanel",
    components: {
      logo: () => import("../components/admin/Home/adminLogo.vue"),
      default: () => import("../components/admin/index.vue"),
    },
    children: [
      {
        name: "web_home",
        path: "home",
        component: () => import("../components/admin/web/web_home.vue"),
      },
      {
        name: "web_home_add",
        path: "home/.",
        component: () =>
          import("../components/admin/web/home_features/web_add.vue"),
      },
      {
        name: "web_home_edit",
        path: "home/./:id?",
        component: () =>
          import("../components/admin/web/home_features/web_edit.vue"),
        props: true,
      },
      {
        name: "web_logo",
        path: "logos",
        component: () => import("../components/admin/logos/list.vue"),
      },
      {
        name: "web_logo_add",
        path: "logos/.",
        component: () =>
          import("../components/admin/logos/add.vue"),
      },
      {
        name: "web_logo_edit",
        path: "logos/./:id?",
        component: () =>
          import("../components/admin/logos/edit.vue"),
        props: true,
      },
      {
        name: "web_class",
        path: "course",
        component: () => import("../components/admin/web/web_home.vue"),
      },
      {
        name: "web_contact",
        path: "contact",
        component: () => import("../components/admin/web/web_home.vue"),
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
  const isLogin = store.state.auth.isLogin; // 從 Vuex 獲取登入狀態

  // 未登入情況：除了登入頁外，其他路由都導向登入頁
  if (!isLogin && to.path !== "/admin") {
    return { name: "admin" }; // 導向登入頁
  }

  // 已登入情況：若嘗試訪問登入頁，導向首頁
  if (isLogin && to.path === "/admin") {
    return { name: "home" }; // 導向首頁
  }

  return true; // 允許導航
});

export default router;

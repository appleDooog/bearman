import { createRouter, createWebHistory } from "vue-router";
import App from "@/App.vue";
import store from "@/store";

const routes = [
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
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

router.beforeEach((to, from) => {
  const isLogin = store.state.auth.isLogin;

  if (to.path === "/admin") return;

  if(!isLogin){
    return {name: "admin"};
  }else{
    return true;
  }
  
})

export default router;

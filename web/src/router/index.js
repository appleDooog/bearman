import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";

const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/about",
    name: "about",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/AboutView.vue"),
  },
  {
    path: "/admin",
    name: "admin",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    components: {
      logo: () =>
        import(
          /* webpackChunkName: "about" */ "../components/admin/Home/adminLogo.vue"
        ),
      default: () => import("../components/admin/home.vue"),
    },
  },
  {
    path: "/admin/member",
    name: "memberPanel",
    components: {
      logo: () =>
        import(
          "../components/admin/Home/adminLogo.vue"
        ),
      default: () => import("../components/admin/member/index.vue"),
    },
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;

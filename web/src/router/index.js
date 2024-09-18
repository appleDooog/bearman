import { createRouter, createWebHistory } from "vue-router";
import App from "@/App.vue";
import store from "@/store";
import Footer from "@/components/front/footer.vue";

const routes = [
  {
    path: "/",
    name: "home",
    components: {
      mainLogo: () => import("../components/front/mainLogo.vue"),
      Footer
    },
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;

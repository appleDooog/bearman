import axios from "axios";
import store from "../store";

axios.defaults.headers.post["Content-Type"] =
  "application/x-www-form-urlencoded";
axios.defaults.headers.common["Authorization"] = "AUTH TOKEN";
axios.defaults.withXSRFToken = true;
axios.defaults.withCredentials = true;

const adminApi = axios.create({
  baseURL: "http://127.0.0.1:8000/api/admin",
});

// req攔截器, 使用token
adminApi.interceptors.request.use(
  (config) => {
    // 發送req前判斷vuex中是否存在token
    // 若存在則統一在http請求的header都加上token
    const token = store.state.auth.token;
    token && (config.headers.Authorization = "Bearer " + token);
    return config;
  },
  (error) => {
    return Promise.reject(error);
  }
);

export default function (method, url, data = null) {
  method = method.toLowerCase();
  if (method == "get") {
    return adminApi.get(url, data);
  } else if (method == "post") {
    return adminApi.post(url, data);
  } else if (method == "put") {
    return adminApi.put(url, data);
  } else if (method == "patch") {
    return adminApi.patch(url, data);
  } else if (method == "delete") {
    return adminApi.delete(url, data);
  } else {
    console.error("未知的method" + method);
    return false;
  }
}

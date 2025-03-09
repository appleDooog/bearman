// apiDefault.js - API 基礎設定
import axios from "axios";
import store from "../store";

axios.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
axios.defaults.withCredentials = true;

// 建立後台 (需要 Token) 的 axios 實例
export const createAdminApiInstance = (baseURL) => {
  const apiInstance = axios.create({ baseURL });

  apiInstance.interceptors.request.use(
    (config) => {
      const token = store.state.auth.token;
      if (token) {
        config.headers.Authorization = `Bearer ${token}`;
      }
      return config;
    },
    (error) => Promise.reject(error)
  );

  return apiInstance;
};

// 建立前台 (可選擇是否需要 Token) 的 axios 實例
export const createFrontApiInstance = (baseURL, withToken = false) => {
  const apiInstance = axios.create({ baseURL });

  if (withToken) {
    apiInstance.interceptors.request.use(
      (config) => {
        const token = store.state.auth.token;
        if (token) {
          config.headers.Authorization = `Bearer ${token}`;
        }
        return config;
      },
      (error) => Promise.reject(error)
    );
  }

  return apiInstance;
};
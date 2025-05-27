// adminApi.js - 後台 API 設定
import { createAdminApiInstance } from "./apiDefault";

const adminApi = createAdminApiInstance(process.env.VUE_APP_API_BASE);

// admin/manager 相關的 API
export const apiManagerCaptcha = () => adminApi.post("/manager/code");
export const apiManagerLogin = (data) => adminApi.post("/manager/login", data);
export const apiManagerList = () => adminApi.post("/manager");
export const apiManagerShow = (id) => adminApi.post(`/manager/${id}`);
export const apiManagerAdd = (data) => adminApi.put("/manager", data);
export const apiManagerUpdate = (data) => adminApi.patch("/manager", data);
export const apiManagerDel = (id) => adminApi.delete(`/manager/${id}`);

// admin/member 相關的 API
export const apiMemberList = (data) => adminApi.post("/member", data);
export const apiMemberAdd = (data) => adminApi.put("/member", data);
export const apiMemberEdit = (id) => adminApi.post(`/member/${id}`);
export const apiMemberUpdate = (data) => adminApi.patch("/member", data);
export const apiMemberDel = (id) => adminApi.delete(`/member/${id}`);

//admin/settings/ 相關的API
// web 網頁設置
export const apiWebPageList = () => adminApi.post("/settings/web");
export const apiTypeTList = () => adminApi.post("/settings/typeT")

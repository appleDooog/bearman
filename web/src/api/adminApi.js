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
export const apiWebActiveChange = (data) =>adminApi.patch("/settings/web/active", data);
export const apiWebPageAdd = (data) => adminApi.post("/settings/web/insert", data);
export const apiWebDelete = (id) => adminApi.delete(`/settings/web/${id}`);
// web edit 顯示首頁版塊詳細內容和修改
export const apiWebPageDetail = (id) => adminApi.get(`/settings/web/${id}`);
export const apiWebPageUpdate = (id, data) => adminApi.post(`/settings/web/${id}`, data);

// =====================
// 品牌 LOGO 管理 (logos)
// =====================
export const apiLogosList = () => adminApi.get("/settings/logos");
export const apiLogosAdd = (data) => adminApi.post("/settings/logos", data);
export const apiLogosUpdate = (id, data) => adminApi.post(`/settings/logos/${id}`, data);
export const apiLogosDelete = (id) => adminApi.delete(`/settings/logos/${id}`);

// =====================
// Logo 區塊管理 (front_type_logo)
// =====================
export const apiLogoBlocksList = () => adminApi.get("/settings/logo-blocks");
export const apiLogoBlocksAdd = (data) => adminApi.post("/settings/logo-blocks", data);
export const apiLogoBlocksAttach = (id, logoIds) => adminApi.post(`/settings/logo-blocks/${id}/attach`, { logo_ids: logoIds });
export const apiLogoBlocksDelete = (id) => adminApi.delete(`/settings/logo-blocks/${id}`);

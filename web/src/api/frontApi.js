// frontApi.js - 前台 API 設定
import { createFrontApiInstance } from "./apiDefault";

const frontApi = createFrontApiInstance(process.env.VUE_APP_API_FRONT);
const frontApiToken = createFrontApiInstance(process.env.VUE_APP_API_FRONT, true);

// front/home 相關的 API
export const frontHome = () => frontApi.post("/");

// 需要 Token 的前台 API (例如會員專區)
// export const frontMemberInfo = () => frontApiToken.get("/member/info");
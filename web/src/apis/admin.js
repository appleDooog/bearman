import adminApi from './setting';


// admin/manager 相關的api
// 後台管理員帳號
export const apiManagerCaptcha = () => adminApi.post("/manager/code");
export const apiManagerLogin = (data) => adminApi.post("/manager/login", data);

export const apiManagerList = () => adminApi.post("/manager/");
export const apiManagerShow = (data) => adminApi.post("/manager/" + data);
export const apiManagerAdd = (data) => adminApi.put("/manager/", data);
export const apiManagerUpdate = (data) => adminApi.patch("/manager/", data);
export const apiManagerDel = (data) => adminApi.delete("/manager/"+ data);



// admin/member 相關的api
// apiMemberList(data)
// data: {type:'list'}=> 取得所有資料, {type: 'count'}=> 取得總筆數
export const apiMemberList = (data) => adminApi("post", "/member/", data);
export const apiMemberAdd = (data) => adminApi.put("/member/", data);
export const apiMemberEdit = (data) => adminApi.post("/member/" + data);
export const apiMemberUpdate = (data) => adminApi.patch("/member/", data);
export const apiMemberDel = (data) => adminApi.delete("/member/"+ data);



// admin/product相關的api
const adminProductApi = axios.create({});

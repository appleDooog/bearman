import axios from "axios";



axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
axios.defaults.headers.common['Authorization'] = 'AUTH TOKEN';


// admin/member相關的api
const adminMemberApi = axios.create({
  baseURL: "http://127.0.0.1:8000/api/admin/member",
  
});

// admin/member 相關的api
// apiMemberList(data)
// data: {type:'list'}=> 取得所有資料, {type: 'count'}=> 取得總筆數
export const apiMemberList = (data) => adminMemberApi.post("/list", data);
export const apiMemberAdd = (data) => adminMemberApi.post("/insert", data);
export const apiMemberEdit = (data) => adminMemberApi.post("/edit/" + data);
export const apiMemberUpdate = (data) => adminMemberApi.post("/update", data);
export const apiMemberDel = (data) => adminMemberApi.post("/delete", data);


// admin/manager 相關的api
// 後台管理員帳號
const adminManagerApi = axios.create({
  baseURL: "http://127.0.0.1:8000/api/admin/manager",
});

export const apiManagerCaptcha = () => adminManagerApi.get("/code");
export const apiManagerLogin = (data) => adminManagerApi.post("/login", data);


// admin/product相關的api
const adminProductApi = axios.create({});
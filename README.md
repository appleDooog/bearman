# BEARMAN遠熊樂器

## 專案名稱與描述
BEARMAN預計將成為一個完整的電商平台，專注於樂器的銷售與管理。網站包含前後台頁面，以及會員與商品的 CRUD 功能。

## 專案架構
- **後端**：Laravel (RESTful API)
- **前端**：Vue + Vuex + Vue Router + Components 元件化架構
- **API 通信**：Axios
- **資料儲存**：vuex-persistedstate

## 技術亮點
### 後端
- Laravel 提供 RESTful API 設計，遵循資源導向架構
- CORS 防護系統
- Sanctum 驗證系統
- 會員資料驗證系統

### 前端
- Vue 即時資料渲染
- Vue Components 元件化結構，模組化頁面
- 路由守衛及管理後台登入
- CAPTCHA 驗證（用於後台登入）
- VUEX 及 vuex-persistedstate 資料管理
- Axios 與後端 API 通信，進行資料庫互動

## 功能展示
### 前台功能
- 商品瀏覽與篩選（使用元件化的商品卡片、商品篩選工具等）
- 會員註冊、登入與資料修改

### 後台功能
- 商品管理（CRUD 操作，元件化的商品表單和清單）
- 會員管理（CRUD 操作）
- 管理員登入驗證及路由守衛，使用 CAPTCHA 驗證系統

## 系統流程
### RESTful API
- 使用 Laravel 提供標準的 HTTP 動詞（GET, POST, PUT, DELETE）與 RESTful 資源路由，管理商品和會員資料
- API 支援跨域請求 (CORS) 並確保安全性驗證

### 資料流
- 使用 Axios 從 RESTful API 獲取資料，並即時渲染至前端頁面
- 將操作資料回傳至後端，更新資料庫

### 驗證流程
- 後端使用 Sanctum 進行驗證，前端後台登入頁面使用 CAPTCHA 進行圖形驗證

## 前端元件化結構
### 元件範例
- 商品列表元件（`ProductList.vue`）
- 商品詳細頁面元件（`ProductDetail.vue`）
- 會員表單元件（`MemberForm.vue`）
- 管理登入表單元件（`AdminLogin.vue`，包含 CAPTCHA 驗證）

前端頁面拆分為獨立可重複使用的 Vue 元件，提升代碼的可維護性與可擴展性。

## 專案結構
- 前端與後端的檔案夾結構簡介，展示如何分離 API 與 Vue 的程式邏輯，並介紹元件化結構與 API 互動方式。

## 開發工具與依賴
- Laravel + PHP 8.2 (RESTful API)
- Vue 2 + Vuex + Vue Router + Components
- Axios
- MySQL / phpMyAdmin
- Docker-compose 佈署環境

## 未來擴充與優化
- 可能的技術擴充或功能改善方向，例如更多 API 安全性措施、前端 UI/UX 優化，或加入更多 Vue 元件以提升頁面模組化。

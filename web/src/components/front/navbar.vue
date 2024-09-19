<template>
  <nav class="navbar navbar-expand-md navbar-light navbar-dark p-0">
    <div class="container-fluid">
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">首頁</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">課程介紹</a>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Dropdown
            </a>
            <ul class="dropdown-menu drop" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li>
                <a class="dropdown-item" href="#">Another action</a>
              </li>
              <li><hr class="dropdown-divider" /></li>
              <li>
                <a class="dropdown-item" href="#">Something</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">課程介紹</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">課程介紹</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<style>
.navbar {
  font-size: 25px;
}

.dropdown-menu {
  --bs-dropdown-font-size: 1em;
  --bs-dropdown-min-width: 0;
}
</style>

<template>
  <div>
    <div class="container">
      <div class="card mt-3">
        <div class="card-header">
          <h2>會員管理系統</h2>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-2">
              <button type="button" class="btn btn-primary">新增</button>
            </div>
          </div>
          <div class="row mt-3">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>會員編號</th>
                  <th>姓名</th>
                  <th>聯絡地址</th>
                  <th>聯絡電話</th>
                  <th>電子郵件</th>
                  <th>備註</th>
                </tr>
                <tbody>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tbody>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default{
  name: "memberList",
  data(){
    var res=[];
  },
  
  methods:{
    getList(){
      axios({
        methods: 'get',
        url: ''
      })
    }
  }
}
</script>

<template>
    <el-table :data="colors" border fit highlight-current-row ref="multipleTable">
        <el-table-column
                type="selection"
                width="95" align="center">
        </el-table-column>
        <!--<el-table-column align="center" label='ID' width="95">
            <template slot-scope="scope">
                {{scope.row.id}}
            </template>
        </el-table-column>-->
        <el-table-column label="标记代码" align="center">
            <template slot-scope="scope">
                {{scope.row.markcode}}
            </template>
        </el-table-column>
        <el-table-column label="标记名称" width="180" align="center">
            <template slot-scope="scope">
                <span>{{scope.row.markname}}</span>
            </template>
        </el-table-column>
        <el-table-column label="颜色" width="180" align="center">
            <template slot-scope="scope">
                <el-color-picker v-model="scope.row.color"></el-color-picker>
            </template>
        </el-table-column>
        <el-table-column label="描述" width="180" align="center">
            <template slot-scope="scope">
               {{scope.row.description}}
            </template>
        </el-table-column>
        <el-table-column align="center" label="状态：0=停用，1=启用" width="200">
            <template slot-scope="scope">
                <span>{{scope.row.status}}</span>
            </template>
        </el-table-column>
    </el-table>
</template>
<script>
  export default {
    data() {
      return {
        newOpt: [
          {
            cnt: '新增',
            icon: 'bf-add',
            ent: this.addNew
          },
          {
            cnt: '修改',
            icon: 'bf-change',
            ent: this.addNew
          },
          {
            cnt: '删除',
            icon: 'bf-del',
            ent: this.addNew
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.addNew
          }
        ],
        colors: [],
        multipleTable:[]
      }
    },
    methods: {
      get: function () {
        this.$http.get('http://bferp.test/api/markcolors').then(function (res) {
          this.colors = res.body.data;
        }, function (err) {
          console.log(err);
        });
      },
      addNew(){
        alert(1);
      }
    },
    mounted() {
      this.$store.state.opt.opts = this.newOpt;
      this.$store.commit('change', this.newOpt);
      const that = this;
      $(window).resize(() => {
        return (() => {
          that.$store.state.opt.opts = that.newOpt;
          that.$store.commit('change', that.newOpt);
        })()
      });

      this.get();
    }
  }
</script>
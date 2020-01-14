<template>
    <div>
        <light-table @handleSelect="handleSelectionChange" :listData="getsInfo" :tableHead="tableHead" @editSave="editSave" @handleEdit="handleEdit" @del="del" :loading="loading" @edit="edit" :currentIndex="currentIndex"  @editCancel="editCancel"></light-table>
        <!--新增-->
        <add-new :visible-add="showMaskArr" :title="title"
                 :rule-form="ruleForm" :rules="rules" :add-arr="addArr"
                 :url="url" @submitEvent="submitForm" :new-ref="refArr" @CB-dialog="CB_dialog"></add-new>
        <!--删除-->
        <el-popover
                placement="top"
                width="160"
                v-model="showDel" slot="tip">
            <p>确定删除该条数据？</p>
            <div style="text-align: right; margin: 0">
                <el-button size="mini" type="text" @click="cancelD">取消</el-button>
                <el-button type="primary" size="mini" @click="confirmD(delId)">确定</el-button>
            </div>
        </el-popover>
        <!--页码-->
        <Pagination :page-url="url"></Pagination>
    </div>
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
            cnt: '删除',
            icon: 'bf-del',
            ent: this.delMore
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.refresh
          }
        ],
        getsInfo: [],
        tableHead:[
          {
            label: '部门代码',
            width: '',
            prop: "dept_no",
            holder:'请输入部门代码',
            type: 'text',
            beAble:true
          },
          {
            label: '部门名称',
            width: '',
            prop: "name",
            holder: '请输入部门名称',
            type: 'text'
          },
          {
            label: '所属部门',
            width: '',
            prop: "p_dept",
            holder: '请输入所属部门',
            type: 'text'
          },
          {
            label: '是否验证',
            width: '',
            prop: "is_verify",
            holder: '请选择是否验证',
            type: 'select_def'
          },
          {
            label: '备注',
            width: '',
            prop: "remark",
            holder: '请输入备注',
            type: 'textarea'
          },
          {
            label: '状态',
            width: '',
            prop: "status",
            holder: '状态',
            type: 'select_stu',
            doSort: true
          }
        ],
        loading: true,
        currentIndex: '',
        url: '/departments',
        showMaskArr: false,
        title: '新增部门',
        ruleForm: {
          dept_no: '',
          name: '',
          p_dept: '',
          is_verify: '0',
          remark: '',
          status: '1'
        },
        rules:{
          dept_no: [
            {required: true, message: '请输入部门代码', trigger: 'blur'},
          ],
          name: [
            {required: true, message: '请输入部门名称', trigger: 'blur'},
          ],
          p_dept: [
            {required: true, message: '请输入所属部门', trigger: 'blur'},
          ]
        },
        addArr: [
          {
            label:'部门代码',
            prop:'dept_no',
            holder:'请输入运费类型',
            type: 'text'
          },
          {
            label:'部门名称',
            prop:'name',
            holder:'请输入部门名称',
            type: 'text'
          },
          {
            label:'所属部门',
            prop:'p_dept',
            holder:'请输入所属部门',
            type: 'text'
          },
          {
            label:'是否验证',
            prop:'is_verify',
            holder:'请选择是否验证',
            type: 'select_def'
          },
          {
            label:'备注',
            prop:'remark',
            holder:'请输入备注',
            type: 'textarea'
          },
          {
            label:'状态',
            prop:'status',
            holder:'请选择状态',
            type: 'select_stu'
          }
        ] ,
        refArr: 'ruleDepart',
        showDel: false,
        delId: '',
        inputChange: false,
        multipleSelection: [],
        delArr: [],
        pagination: {
          current_page: 1,
          per_page: 0,
          page_total: 0
        },
      }
    },
    methods:{
      test(){
        console.log(1);
      },
      addNew() {
        this.ruleForm.name='';
        this.showMaskArr = true;
      },
      CB_dialog(val) {
        this.showMaskArr = val;
      },
      submitForm() {
        this.$post(this.url, this.ruleForm)
          .then(() => {
            this.$message({
              message: '添加成功',
              type: 'success'
            });
            this.showMaskArr = false;
            this.refresh();
          }, (err) => {
            if (err.response) {
              let arr = err.response.data.errors;
              let arr1 = [];
              for (let i in arr) {
                arr1.push(arr[i]);
              }
              let str = arr1.join(',');
              this.$message.error({
                message: str
              });
            }
          })
      },
      /*处理批量删除*/
      handleSelectionChange(val) {
        this.multipleSelection = val;
        let del = [];
        this.multipleSelection.forEach(selectedItem => {
          del.push(selectedItem.id);
        });
        this.delArr = del.join(',');
      },
      delMore() {
        if (this.delArr.length === 0) {
          this.$message({
            message: '没有选中数据',
            type: 'warning'
          });
        } else {
          this.$confirm('此操作将永久删除该数据, 是否继续?', '提示', {
            confirmButtonText: '确定',
            cancelButtonText: '取消',
            type: 'warning'
          }).then(() => {
            this.$del(this.url, {ids: this.delArr})
              .then(() => {
                this.$message({
                  message: '删除成功',
                  type: 'success'
                });
                this.refresh();
              }, err => {
                if (err.response) {
                  let arr = err.response.data.errors;
                  let arr1 = [];
                  for (let i in arr) {
                    arr1.push(arr[i]);
                  }
                  let str = arr1.join(',');
                  this.$message.error({
                    message: str
                  });
                }
              })
          }).catch(() => {
            this.$message({
              type: 'info',
              message: '已取消删除'
            });
          });
        }
      },
      /*修改保存*/
      edit(index) {
        this.currentIndex = 'index' + index;
      },
      editCancel() {
        this.$message({
          message: '取消修改',
          type: 'info'
        });
        this.currentIndex = '';
      },
      editSave(row) {
        let obj = {
          id: row.id,
          name: row.name,
          is_default: row.is_default,
          status: row.status
        };
        if (this.inputChange) {
          this.$patch(this.url + '/' + row.id, obj)
            .then(() => {
              this.$message({
                message: '修改成功',
                type: 'success'
              });
              this.getInfo(this.url);
              this.currentIndex = '';
              this.inputChange = false;
            }, err => {
              if (err.response) {
                let arr = err.response.data.errors;
                let arr1 = [];
                for (let i in arr) {
                  arr1.push(arr[i]);
                }
                let str = arr1.join(',');
                this.$message.error({
                  message: str
                })
              }
            })
        } else {
          this.$message({
            message: '数据未改动',
            type: 'info'
          });
        }
      },
      handleEdit() {
        this.inputChange = true;
      },
      getInfo(url) {
        this.showPage = true;
        this.$fetch(url)
          .then(res => {
            this.getsInfo = res.data;
            this.$store.dispatch('setFreights', res.data);
            this.loading = false;
            let pg = res.meta.pagination;
            this.$store.dispatch('currentPage', pg.current_page);
            this.$store.commit('PER_PAGE', pg.per_page);
            this.$store.commit('PAGE_TOTAL', pg.total);
          }, err => {
            if (err.response) {
              let arr = err.response.data.errors;
              let arr1 = [];
              for (let i in arr) {
                arr1.push(arr[i]);
              }
              let str = arr1.join(',');
              this.$message.error({
                message: str
              });
            }
          })
      },
      del(row, e) {
        this.showDel = true;
        $('.el-popper').css({left: e.x - 100 + 'px', top: e.y - 125 + 'px'});
        this.delId = row.id;
      },
      cancelD() {
        this.showDel = false;
        this.$message({
          message: '取消删除',
          type: 'info'
        });
      },
      confirmD(id) {
        this.$del(this.url + '/' + id)
          .then(() => {
            this.$message({
              message: '删除成功',
              type: 'success'
            });
            this.showDel = false;
            this.refresh();
          }, err => {
            if (err.response) {
              this.showDel = false;
              let arr = err.response.data.errors;
              let arr1 = [];
              for (let i in arr) {
                arr1.push(arr[i]);
              }
              let str = arr1.join(',');
              this.$message.error({
                message: str
              });
            }
          })
      },
      refresh() {
        this.loading = true;
        this.getInfo(this.url);
        setTimeout(() => {
          this.loading = false;
        }, 2000);
      },
    },
    mounted() {
      this.getInfo(this.url);
      this.$store.dispatch('setOpt', this.newOpt);
      let that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt', that.newOpt);
      });
    }
  }
</script>
<template>
    <div>
        <light-table @handleSelect="handleSelectionChange" :listData="getsInfo" :tableHead="tableHead"
                     @editSave="editSave" @handleEdit="handleEdit" @del="del" :loading="loading" @edit="edit"
                     :currentIndex="currentIndex" @editCancel="editCancel" :height="400"></light-table>

        <!--新增-->
        <add-new :visible-add="showMaskArr" :title="title"
                 :rule-form="ruleForm" :rules="rules" :add-arr="addArr"
                 :url="urls.purchasereturntypes" @submitEvent="submitForm" :new-ref="refArr" @CB-dialog="CB_dialog" @handleArea="handleArea"></add-new>

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
        <Pagination :page-url="urls.purchasereturntypes"></Pagination>
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
        tableHead:[
            {
              label: '采购退货类型',
              prop: "name",
              holder: '请输入采购退货类型',
              type: 'text'
            },
            {
              label: '状态',
              prop: "status",
              type: 'checkbox'
            },
            {
              label: '创建时间',
              prop: "created_at",
              type: 'text',
              chgAble: true
            }
        ],
        loading: true,
        currentIndex: '',
        showMaskArr: false,
        title: '新建采购退货类型',
        getsInfo: [],
        ruleForm: {
          name: '',
          status: true
        },
        rules: {
          name: [
            {required: true, message: '请输入采购退货类型名称', trigger: 'blur'},
          ]
        },
        addArr: [
          {
            label: '采购退货类型',
            prop: 'name',
            holder: '请输入采购退货类型名称',
            type: 'text'
          },
          {
            label: '状态',
            prop: 'status',
            type: 'checkbox'
          }
        ],
        refArr: 'ruleWare',
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
        areaArr: [],
        doChange: true
      }
    },
    computed:{
      urls:{
        get:function(){
          return this.$store.state.urls
        },
        set:function(){}
      }
    },
    methods: {
      addNew() {
        this.ruleForm.name='';
        this.showMaskArr = true;
      },
      CB_dialog(val) {
        this.showMaskArr = val;
      },
      submitForm() {
        let obj = {
          name: this.ruleForm.name,
          status: this.ruleForm.status
        };
        this.$post(this.urls.purchasereturntypes,obj)
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
            this.$del(this.urls.purchasereturntypes, {ids: this.delArr})
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
          name: row.name,
          status: row.status
        };
        if (this.inputChange) {
          this.$patch(this.urls.purchasereturntypes + '/' + row.id, obj)
            .then(() => {
              this.$message({
                message: '修改成功',
                type: 'success'
              });
              this.getInfo();
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
      getInfo() {
        this.showPage = true;
        this.$fetch(this.urls.purchasereturntypes)
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
              this.$message.error(str);
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
        this.$del(this.urls.purchasereturntypes + '/' + id)
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
        this.getInfo();
        setTimeout(() => {
          this.loading = false;
        }, 2000);
      },
      handleArea(value){
        this.areaArr = value;
      }
    },
    mounted() {
      this.getInfo();
      this.$store.dispatch('setOpt', this.newOpt);
      let that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt', that.newOpt);
      });
    }
  }
</script>

<template>
    <div>
        <light-table @handleSelect="handleSelectionChange" :listData="getsInfo" :tableHead="tableHead"
                     @editSave="editSave" @handleEdit="handleEdit" @del="del" :loading="loading" @edit="edit"
                     :currentIndex="currentIndex" @editCancel="editCancel" :doChange="doChange"></light-table>
        <!--新增-->
        <add-new :visible-add="showMaskArr" :title="title"
                 :rule-form="ruleForm" :rules="rules" :add-arr="addArr"
                 :url="url" @submitEvent="submitForm" :new-ref="refArr" @CB-dialog="CB_dialog" @handleArea="handleArea"></add-new>
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
  import { CodeToText } from 'element-china-area-data'
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
              label: '仓库名称',
              width: '180',
              prop: "name",
              holder: '请输入标记名称',
              type: 'text'
            },
            {
              label: '仓库地址',
              width: '260',
              prop: "address",
              holder: '请输入仓库地址',
              type: 'text',
              lists: 'more_prop'
            },
            {
              label: '是否默认仓库',
              width: '160',
              prop: "is_default",
              holder: '描述',
              type: 'select_def'
            },
            {
              label: '是否可用',
              width: '160',
              prop: "status",
              holder: '状态',
              type: 'select_stu',
              doSort: true
            }
        ],
        loading: true,
        currentIndex: '',
        url: '/warehouses',
        showMaskArr: false,
        title: '新建仓库',
        getsInfo: [],
        ruleForm: {
          name: '',
          province: '',
          city: '',
          district: '',
          address: '',
          is_default: '0',
          status: '1'
        },
        rules: {
          name: [
            {required: true, message: '请输入仓库名称', trigger: 'blur'},
          ],
          address: [
            {required: true, message: '请输入仓库详细地址', trigger: 'blur'},
          ]
        },
        addArr: [
          {
            label: '仓库名称',
            prop: 'name',
            holder: '请输入仓库名称',
            type: 'text'
          },
          {
            label: '地区',
            prop: '',
            holder: '请输入仓库所在省市区',
            type: 'cascader'
          },
          {
            label: '地址',
            prop: 'address',
            holder: '请输入详细地址',
            type: 'text'
          },
          {
            label: '是否默认',
            prop: 'is_default',
            holder: '请选择是否默认',
            type: 'select_def'
          },
          {
            label: '是否可用',
            prop: 'status',
            holder: '请选择是否可用',
            type: 'select_stu'
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
          province: CodeToText[this.areaArr[0]],
          city: CodeToText[this.areaArr[1]],
          district: CodeToText[this.areaArr[2]],
          address: this.ruleForm.address,
          is_default: this.ruleForm.is_default,
          status: this.ruleForm.status
        };
        this.$post(this.url,obj)
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
          name: row.name,
          address: row.address,
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
      handleArea(value){
        this.areaArr = value;
        console.log(value);
      }
    },
    mounted() {
      this.getInfo(this.url);
      this.$store.dispatch('setTabs', false);
      this.$store.dispatch('setOpt', this.newOpt);
      let that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt', that.newOpt);
      });
    }
  }
</script>

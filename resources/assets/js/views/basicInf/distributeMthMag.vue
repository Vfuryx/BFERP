<template>
    <div>
        <el-tabs v-model="activeName" @tab-click="tabsClick">
            <el-tab-pane label="配送方式管理" name="0">
                 <light-table :listData="getsData"
                            :tableHead="disHead" @editSave="editSave" @handleEdit="handleEdit" @del="del" :loading="loading[activeName]" :currentIndex="currentIndex" @edit="edit" @editCancel="editCancel"  @handleSelect="handleSelectionChange"></light-table>
            </el-tab-pane>
            <el-tab-pane label="入库方式管理" name="1">
                 <light-table :listData="getsData"
                              :tableHead="stockHead" @editSave="editSave" @handleEdit="handleEdit" @del="del" :loading="loading[activeName]" :currentIndex="currentIndex" @edit="edit" @editCancel="editCancel"  @handleSelect="handleSelectionChange"></light-table>
            </el-tab-pane>
        </el-tabs>

        <!--新增-->
        <add-new :visible-add="showMask" :title="title[activeName]"
                 :rule-form="ruleForm[activeName]" :rules="rules[activeName]" :add-arr="addArr[activeName]"
                 :url="url[activeName]" @submitEvent="submitForm" :new-ref="refArr[activeName]" @CB-dialog="CB_dialog"></add-new>

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

        <Pagination :page-url="url[activeName]"></Pagination>
    </div>
</template>
<script>
  export default {
    data(){
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
        disHead:[
          {
            label: '配送方式',
            prop: "name",
            holder:'配送方式',
            type: 'text'
          },
          {
            label: '状态',
            prop: "status",
            holder: '状态',
            // type: 'select_stu',
            type: 'checkbox',
            doSort: true,
            chgAble: true,
            editChgAble: false
          }
        ],
        stockHead:[
          {
            label: '入库方式方式',
            prop: "name",
            holder:'配送方式',
            type: 'text'
          },
          {
            label: '状态',
            prop: "status",
            holder: '状态',
            // type: 'select_stu',
            type: 'checkbox',
            doSort: true,
            chgAble: true,
            editChgAble: false
          }
        ],
        url:['/distmets','/stockintypes'],
        title: ['新增配送方式','新增入库方式'],
        ruleForm: [
          {
          name: '',
          status: true
          },
          {
            name: '',
            status: true
          }
          ],
        rules:[
            {
          name:
            [{required: true, message: '请输入配送方式', trigger: 'blur'}]
            },
            {
            name:
              [{required: true, message: '请输入入库方式', trigger: 'blur'}]
            }],
        addArr:[
          [
            {
              label:'配送方式',
              prop:'name',
              holder:'请输入配送方式',
              type: 'text'
            },
            {
              label:'状态',
              prop:'status',
              holder:'请选择状态',
              // type: 'select_stu'
              type: 'checkbox'
            }
          ],
          [
            {
              label:'入库方式',
              prop:'name',
              holder:'请输入入库方式',
              type: 'text'
            },
            {
              label:'状态',
              prop:'status',
              holder:'请选择状态',
              // type: 'select_stu'
              type: 'checkbox'
            }
          ]
        ],
        activeName:'0',
        getsData:[],
        loading: [true,true],
        currentIndex:'',
        /*新增*/
        showMask: false,
        showDel: false,
        editId:'',
        inputChange: false,
        delArr:[],
        multipleSelection:[],
        refArr:['distri','stock'],
      }
    },
    methods:{
      //新增
      addNew(){
        this.showMask = true;
      },
      CB_dialog(val) {
        this.showMask = val;
      },
      submitForm(){
        this.$post(this.url[this.activeName],this.ruleForm[this.activeName])
          .then(() => {
            this.$message({
              message: '添加成功',
              type: 'success'
            });
            this.showMask = false;
            this.refresh();
          },err => {
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
      tabsClick(){
        this.loading=[true,true];
        this.getData(this.url[this.activeName]);
      },
      getData(url) {
        this.$fetch(url)
          .then(res => {
            this.loading[this.activeName] = false;
            this.getsData = res.data;
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
          });
      },
      edit(index){
        this.currentIndex = 'index'+index;
      },
      handleEdit() {
        this.inputChange = true;
      },
      editCancel(){
        this.$message({
          message: '取消修改',
          type: 'info'
        });
        this.currentIndex = '';
      },
      editSave(row){
        this.$patch(this.url[this.activeName] + '/' + row.id, row)
          .then(() => {
            this.$message({
              message: '修改成功',
              type: 'success'
            });
            this.currentIndex = '';
            this.inputChange = false;
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
              })
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
        this.$del(this.url[this.activeName] + '/' + id)
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
      /*批量删除*/
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
            this.$del(this.url[this.activeName], {ids: this.delArr})
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
      handleSelectionChange(val) {
        if (val.length != 0) {
          this.editId = val[0].id;
        } else {
          this.editId = '';
        }
        this.multipleSelection = val;
        let del = [];
        this.multipleSelection.forEach(selectedItem => {
          del.push(selectedItem.id);
        });
        this.delArr = del.join(',');
      },
      /*页面刷新*/
      refresh() {
        this.loading = [true,true];
        this.getData(this.url[this.activeName]);
      },
    },
    mounted(){
      this.getData(this.url[this.activeName]);
      this.$store.dispatch('setOpt',this.newOpt);
      let that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt',that.newOpt);
      });
    }
  }
</script>

<template>
    <div>
        <el-table :data="getsInfo"  fit
                  @selection-change="handleSelectionChange"
                  v-loading="loading"
                  height="400"
                  ref="multipleTable">
            <el-table-column
                    type="selection"
                    width="95" align="center"
                    :checked="checkboxInit">
            </el-table-column>
            <el-table-column v-for="(item,index) in tableHead" :label="item.label" align="center" :width="item.width" :key="index" :sortable="item.doSort" :prop="item.prop">
                <template slot-scope="scope">
                    <span v-if="currentIndex =='index'+scope.$index">
                        <span v-if="item.type == 'checkbox'">
                                <el-checkbox v-model="scope.row[item.prop]" @change="handleEdit"></el-checkbox>
                        </span>
                        <span v-else-if="item.type == 'cascader'">
                            <el-cascader size="middle" :options="options"  v-model="scope.row[item.prop]" @change="handleEdit"></el-cascader>
                        </span>
                        <span v-else>
                               <el-input size="small" v-model.trim="scope.row[item.prop]" :placeholder="item.holder" @change="handleEdit"></el-input>
                            </span>
                    </span>
                    <span v-else>
                        <span v-if="item.type=='checkbox'">
                            <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
                    </span>
                        <span v-else>
                        {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
            </span>
                     </span>
                </template>
            </el-table-column>
            <el-table-column label="操作" width="160" align="center" fixed="right">
                <template slot-scope="scope">
                    <span v-if="currentIndex=='index'+scope.$index">
                                <el-button size="mini" @click="editSave(scope.row)">保存</el-button>
                                <el-button size="mini" @click="editCancel">取消
                                </el-button>
                            </span>
                    <span v-else>
                        <el-button size="mini" @click="edit(scope.$index,scope.row)">编辑</el-button>
                        <el-button size="mini" type="danger" @click="del(scope.row,$event)">删除</el-button>
                    </span>
                </template>
            </el-table-column>
        </el-table>

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
  import { regionDataPlus, CodeToText, TextToCode } from 'element-china-area-data'
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
            prop: "name",
            width: '130',
            holder: '请输入标记名称',
            type: 'text',
          },
          {
            label: '仓库地(省市区)',
            prop: "provinces",
            width: '220',
            holder: '请输入仓库地(省市区)',
            type: 'cascader'
          },
          {
            label: '仓库地址',
            prop: "address",
            width: '180',
            holder: '请输入仓库地址',
            type: 'text'
          },
          {
            label: '默认仓库',
            width: '100',
            prop: "is_default",
            type: 'checkbox'
          },
          {
            label: '是否可用',
            width: '130',
            prop: "status",
            type: 'checkbox',
            doSort: true
          }
        ],
        loading: true,
        currentIndex: '',
        showMaskArr: false,
        checkboxInit: false,
        title: '新建仓库',
        getsInfo: [],
        ruleForm: {
          name: '',
          provinces: [],
          province: '',
          city: '',
          district: '',
          address: '',
          is_default: false,
          status: true
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
            type: 'checkbox'
          },
          {
            label: '是否可用',
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
        options: regionDataPlus,
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
          province: CodeToText[this.areaArr[0]],
          city: CodeToText[this.areaArr[1]],
          district: CodeToText[this.areaArr[2]],
          address: this.ruleForm.address,
          is_default: this.ruleForm.is_default,
          status: this.ruleForm.status
        };
        this.$post(this.urls.warehouses,obj)
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
              this.$message.error(arr1.join(','));
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
            this.$del(this.urls.warehouses, {ids: this.delArr})
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
                  this.$message.error(arr1.join(','));
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
      edit(index,row) {
        this.currentIndex = 'index' + index;
        this.$set(row,'provinces',[TextToCode[row.province].code, TextToCode[row.province][row.city].code, TextToCode[row.province][row.city][row.district].code])
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
          province: CodeToText[row.provinces[0]],
          city:CodeToText[row.provinces[1]],
          district:  CodeToText[row.provinces[2]],
          is_default: row.is_default,
          status: row.status
        };
        if (this.inputChange) {
          this.$patch(this.urls.warehouses + '/' + row.id, obj)
            .then(() => {
              this.refresh();
              this.currentIndex = '';
              this.inputChange = false;
              this.$message({
                message: '修改成功',
                type: 'success'
              });
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
        this.$fetch(this.urls.warehouses)
          .then(res => {
            res.data.map(item=>{
              this.$set(item,'provinces',([item.province]+''+[item.city]+''+[item.district]))});
            this.getsInfo = res.data;
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
        this.$del(this.urls.warehouses + '/' + id)
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
              this.$message.error(arr1.join(','));
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

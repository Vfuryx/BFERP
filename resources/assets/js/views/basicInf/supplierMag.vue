<template>
    <div>
        <el-tabs v-model="activeName" @tab-click="handleTabsClick">
            <el-tab-pane label="供应商信息" name="0">
                <light-table @handleSelect="handleSelectionChange" :listData="getsInfo[this.activeName]"
                             :tableHead="tableHead[this.activeName]" @editSave="editSave" @handleEdit="handleEdit"
                             @del="del" @dbClick="dbClick" :loading="loading" @edit="edit" :currentIndex="currentIndex"
                             @editCancel="editCancel" :doChange="doChange[this.activeName]"></light-table>
            </el-tab-pane>
            <el-tab-pane label="产品系列" name="1">
                <light-table @handleSelect="handleSelectionChange" :listData="getsInfo[this.activeName]"
                             :tableHead="tableHead[this.activeName]" @editSave="editSave" @handleEdit="handleEdit"
                             @del="del" :loading="loading" :currentIndex="currentIndex" @edit="edit"
                             @editCancel="editCancel" :selects="sonArr" :doChange="doChange[this.activeName]"></light-table>
            </el-tab-pane>
        </el-tabs>
        <!--新增-->
        <add-new :visible-add="showMaskArr[activeName].show" :title="title[activeName]"
                 :rule-form="ruleForm[activeName]" :rules="rules[activeName]" :add-arr="addArr[activeName]"
                 :url="url[activeName]" @submitEvent="submitForm" :new-ref="refArr[activeName]" @CB-dialog="CB_dialog"
                 :halfForm="halfForm[activeName].show" :selects="sonArr"></add-new>
        <!--修改-->
        <add-new :visible-add="editMask[this.activeName].show" :title="editTitle[activeName]" :rules="rules[activeName]" :new-ref="refArr[activeName]"
                 :rule-form="editData" :add-arr="addArr[activeName]"
                 :url="url[activeName]" @submitEvent="editForm" @CB-dialog="CB_dialog"
                 :halfForm="halfForm[activeName].show" :selects="sonArr" :leftTab="leftTab"></add-new>
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
        <div v-if="showPage">
            <Pagination :page-url="url[activeName]"></Pagination>
        </div>
        <div v-else></div>
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
            cnt: '修改',
            icon: 'bf-change',
            ent: this.editInfo,
            nClick: true
          },
          {
            cnt: '删除',
            icon: 'bf-del',
            ent: this.delMore
          },
          {
            cnt: '导入',
            icon: 'bf-in',
            ent: this.test
          },
          {
            cnt: '导出',
            icon: 'bf-out',
            ent: this.test
          },
          {
            cnt: '合并',
            icon: 'bf-merge',
            ent: this.test
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.refresh
          }
        ],
        activeName: '0',
        getsInfo: [[],[]],
        tableHead: [
          [
            {
              label: '名称',
              width: '180',
              prop: "name",
              holder: '请输入名称',
              type: 'text',
              beAble: true
            },
            {
              label: '公司',
              width: '180',
              prop: "company",
              holder: '请输入公司',
              type: 'text'
            },
            {
              label: '公司代码',
              width: '180',
              prop: "code",
              holder: '请输入公司代码',
              type: 'text'
            },
            {
              label: '省',
              width: '180',
              prop: "province",
              holder: '请输入省'
            },
            {
              label: '市',
              width: '180',
              prop: "city",
              holder: '请输入市',
              type: 'text'
            },
            {
              label: '区',
              width: '180',
              prop: "district",
              holder: '请输入区',
              type: 'text'
            },
            {
              label: '地址',
              width: '220',
              prop: "address",
              holder: '请输入地址',
              type: 'text'
            },
            {
              label: '邮编',
              width: '180',
              prop: "zipcode",
              holder: '请输入邮编',
              type: 'text'
            },
            {
              label: '联系人',
              width: '200',
              prop: "contacts",
              holder: '请输入联系人',
              type: 'text'
            },
            {
              label: '联系电话',
              width: '180',
              prop: "phone",
              holder: '请输入联系电话',
              type: 'text'
            },
            {
              label: '手机',
              width: '180',
              prop: "mobile",
              holder: '请输入手机',
              type: 'text'
            },
            {
              label: '传真',
              width: '180',
              prop: "fax",
              holder: '请输入传真',
              type: 'text'
            },
            {
              label: '邮箱',
              width: '200',
              prop: "email",
              holder: '请输入邮箱',
              type: 'text'
            },
            {
              label: '备注',
              width: '180',
              prop: "remark",
              holder: '请输入备注',
              type: 'textarea'
            },
            {
              label: '启用扫描',
              width: '160',
              prop: "is_scan",
              holder: '请选择是否启用',
              type: 'select_def'
            },
            {
              label: '采购自动计价',
              width: '160',
              prop: "auto_valuation",
              holder: '是否启用',
              type: 'select_def'
            },
            {
              label: '状态',
              width: '160',
              prop: "status",
              holder: '请选择状态',
              type: 'select_stu'
            }
          ],
          [
            {
              label: '供应商名称',
              width: '',
              prop: "suppliers",
              holder: '请选择供应商名称',
              type: 'select',
              val: this.sonArr
            },
            {
              label: '系列代码',
              width: '',
              prop: "code",
              holder: '请输入系列代码',
              type: 'text'
            },
            {
              label: '系列名称',
              width: '',
              prop: "name",
              holder: '请输入系列名称',
              type: 'text'
            },
            {
              label: '系列描述',
              width: '',
              prop: "description",
              holder: '请输入系列描述',
              type: 'textarea'
            },
            {
              label: '备注',
              width: '',
              prop: "remark",
              holder: '请输入名称',
              type: 'textarea'
            },
            {
              label: '状态',
              width: '',
              prop: "status",
              holder: '请选择状态',
              type: 'select_stu'
            }
          ]
        ],
        loading: true,
        currentIndex: '',
        url: ['/suppliers', '/series'],
        showMaskArr: [{show: false}, {show: false}],
        title: ['新增供应商', '新增产品系列'],
        ruleForm: [
          {
            name: '',
            company: '',
            code: '',
            province: '',
            city: '',
            district: '',
            address: '',
            phone: '',
            mobile: '',
            fax: '',
            email: '',
            remark: '',
            is_scan: '1',
            auto_valuation: '1',
            status: '1'
          },
          {
            suppliers_id: '',
            code: '',
            name: '',
            description: '',
            remark: '',
            status: '1'
          }],
        rules: [
          {
            name: [
              {required: true, message: '请输入供应商名称', trigger: 'blur'},
            ],
            company: [
              {required: true, message: '请输入供应商公司', trigger: 'blur'},
            ],
            code: [
              {required: true, message: '请输入公司代码', trigger: 'blur'},
            ],
            province: [
              {required: true, message: '请输入所在省', trigger: 'blur'},
            ],
            city: [
              {required: true, message: '请输入所在市', trigger: 'blur'},
            ],
            district: [
              {required: true, message: '请输入所在区', trigger: 'blur'},
            ],
            address: [
              {required: true, message: '请输入详细地址', trigger: 'blur'},
            ],
            zipcode: [
              {required: true, message: '请输入邮编', trigger: 'blur'},
            ],
            phone: [
              {required: true, message: '请输入电话', trigger: 'blur'},
            ],
            mobile: [
              {required: true, message: '请输入手机', trigger: 'blur'},
            ],
            fax: [
              {required: true, message: '请输入传真号', trigger: 'blur'},
            ],
            email: [
              {required: true, message: '请输入邮箱', trigger: 'blur'},
            ],
          },
          {
            suppliers_id: [
              {required: true, message: '请输入供应商id', trigger: 'blur'},
            ],
            code: [
              {required: true, message: '请输入系列代码', trigger: 'blur'},
            ],
            name: [
              {required: true, message: '请输入系列名称', trigger: 'blur'},
            ]
          }
        ],
        addArr: [
          [
            {
              label: '供应商名',
              prop: 'name',
              holder: '请输入供应商名称',
              type: 'text'
            },
            {
              label: '供应公司',
              prop: 'company',
              holder: '请输入供应商公司',
              type: 'text'
            },
            {
              label: '公司代码',
              prop: 'code',
              holder: '请输入公司代码',
              type: 'text',
            },
            {
              label: '省',
              prop: 'province',
              holder: '请输入所在省',
              type: 'text'
            },
            {
              label: '市',
              prop: 'city',
              holder: '请输入所在市',
              type: 'text'
            },
            {
              label: '区',
              prop: 'district',
              holder: '请输入所在区',
              type: 'text'
            },
            {
              label: '地址',
              prop: 'address',
              holder: '请输入详细地址',
              type: 'text'
            },
            {
              label: '邮编',
              prop: 'zipcode',
              holder: '请输入邮编',
              type: 'text'
            },
            {
              label: '联系人',
              prop: 'contacts',
              holder: '请输入联系人',
              type: 'text'
            },
            {
              label: '电话号码',
              prop: 'phone',
              holder: '请输入电话号码',
              type: 'tel'
            },
            {
              label: '手机号码',
              prop: 'mobile',
              holder: '请输入手机号码',
              type: 'tel'
            },
            {
              label: '传真',
              prop: 'fax',
              holder: '请输入传真',
              type: 'text'
            },
            {
              label: '邮箱',
              prop: 'email',
              holder: '请输入邮箱',
              type: 'text'
            },
            {
              label: '备注',
              prop: 'remark',
              holder: '请输入备注',
              type: 'textarea'
            },
            {
              label: '启用扫描',
              prop: 'is_scan',
              holder: '请选择是或否',
              type: 'select_def'
            },
            {
              label: '采购自动计价',
              prop: 'auto_valuation',
              holder: '请选择是或否',
              type: 'select_def'
            },
            {
              label: '状态',
              prop: 'status',
              holder: '请选择',
              type: 'select_stu'
            }
          ],
          [
            {
              label: '供应商名',
              prop: 'suppliers_id',
              holder: '请输入供应商名称',
              type: 'select',
              val: this.sonArr
            },
            {
              label: '系列代码',
              prop: 'code',
              holder: '请输入系列代码',
              type: 'text'
            },
            {
              label: '系列名称',
              prop: 'name',
              holder: '请输入系列名称',
              type: 'text'
            },
            {
              label: '系列描述',
              prop: 'description',
              holder: '请输入系列描述',
              type: 'textarea'
            },
            {
              label: '备注',
              prop: 'remark',
              holder: '请输入备注',
              type: 'textarea'
            },
            {
              label: '状态',
              prop: 'status',
              holder: '请选择',
              type: 'select_stu'
            }
          ]
        ],
        halfForm: [{show: true}, {show: false}],
        refArr: ['ruleSuppliers', 'ruleSeries'],
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
        resetValue: this.ruleForm,
        showPage: true,
        doChange: [true, false],
        sonArr:[],
        leftTab:'修改',
        editMask: [{show: false}, {show: false}],
        editTitle: ['修改产品系列信息'],
        editId:'',
        editData: {},
      }
    },
    computed: {
     /* suppliersId: {
        get: function () {
          return this.$store.state.SonData.suppliers
        },
        set: function () {
        }
      }*/
    },
    methods: {
      test() {
      },
      handleTabsClick() {
        this.loading = true;
        this.getInfo(this.url[this.activeName]);
        if(this.activeName==1){
          this.newOpt[1].nClick = false;
        }else{
          this.newOpt[1].nClick = true;
        }
      },
      addNew() {
        this.showMaskArr[this.activeName].show = true;
      },
      CB_dialog(val) {
        this.showMaskArr[this.activeName].show = val;
        this.editMask[this.activeName].show = val;
      },
      submitForm() {
       /* let addObj = {};
        if (this.activeName == '0') {
          addObj = {
            name: this.ruleForm[0].name,
            company: this.ruleForm[0].company,
            code: this.ruleForm[0].code,
            province: this.ruleForm[0].province,
            city: this.ruleForm[0].city,
            district: this.ruleForm[0].district,
            address: this.ruleForm[0].address,
            zipcode: this.ruleForm[0].zipcode,
            contacts: this.ruleForm[0].contacts,
            phone: this.ruleForm[0].phone,
            mobile: this.ruleForm[0].mobile,
            fax: this.ruleForm[0].fax,
            email: this.ruleForm[0].email,
            remark: this.ruleForm[0].remark,
            is_scan: this.ruleForm[0].is_scan,
            status: this.ruleForm[0].status,
            auto_valuationy: this.ruleForm[0].auto_valuationy
          };
        } else if (this.activeName == '1') {
          addObj = {
            suppliers_id: this.ruleForm[1].suppliers_id,
            code: this.ruleForm[1].code,
            name: this.ruleForm[1].name,
            description: this.ruleForm[1].description,
            remark: this.ruleForm[1].remark,
            status: this.ruleForm[1].status
          };
        }*/
        this.$post(this.url[this.activeName], this.ruleForm[this.activeName])
          .then(() => {
            this.$message({
              message: '添加成功',
              type: 'success'
            });
            this.showMaskArr[this.activeName].show = false;
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
        let newData = {};
        if (this.activeName == '0') {
          newData = {
            name: row.name,
            company: row.company,
            code: row.code,
            province: row.province,
            city: row.city,
            district: row.district,
            address: row.address,
            zipcode: row.zipcode,
            contacts: row.contacts,
            phone: row.phone,
            mobile: row.mobile,
            fax: row.fax,
            email: row.email,
            remark: row.remark,
            is_scan: row.is_scan,
            status: row.status,
            auto_valuation: row.auto_valuation
          }
        } else if (this.activeName == '1') {
          newData = {
            suppliers_id: row.suppliers.id,
            code: row.code,
            name: row.name,
            description: row.description,
            remark: row.remark,
            status: row.status
          }
        }
        if (this.inputChange) {
          this.$patch(this.url[this.activeName] + '/' + row.id, newData)
            .then(() => {
              this.$message({
                message: '修改成功',
                type: 'success'
              });
              this.getInfo(this.url[this.activeName]);
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
            this.getsInfo[this.activeName] = res.data;
            this.loading = false;
            let pg = res.meta.pagination;
            this.$store.dispatch('currentPage', pg.current_page);
            this.$store.commit('PER_PAGE', pg.per_page);
            this.$store.commit('PAGE_TOTAL', pg.total);
            if (url == this.url[0]) {
              // this.sonArr.push(res.data);
              let obj = {};
              obj["0"] = res.data;
              this.sonArr.push(obj);

              // this.$store.dispatch('setSuppliers', res.data)
            } else if (url == this.url[1]) {
              this.$store.dispatch('setSeries', res.data)
            }
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
        // alert(1);
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
      refresh() {
        this.loading = true;
        this.getInfo(this.url[this.activeName]);
        setTimeout(() => {
          this.loading = false;
        }, 2000);
      },
      dbClick(row) {
        let id = row.id;
        this.activeName = '1';
        this.loading = true;
        this.showPage = false;
        this.$fetch(this.url[1] + '/' + id)
          .then(res => {
            if(res){
              let arr = [];
              arr.push(res);
              this.getsInfo[this.activeName] = arr;
              this.loading = false;
            }else{
              this.$message({
                message: '没有查询到相关数据',
                type: 'info'
              });
              this.getsInfo[this.activeName] = [];
            }
          }, err => {
            console.log(err);
            this.$message.error({
              message: '查询失败'
            });
            this.loading = false;
            this.getsInfo[this.activeName] = [];
          })
      },
      editForm() {
        let obj = {
          suppliers_id: this.editData.suppliers_id,
          code: this.editData.code,
          name: this.editData.name,
          description: this.editData.description,
          remark: this.editData.remark,
          status: this.editData.status
        }
        this.$patch(this.url[this.activeName] + '/' + this.editId, obj)
          .then(() => {
            this.$message({
              message: '修改成功',
              type: 'success'
            });
            this.editMask[this.activeName].show = false;
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
      editInfo() {
        if(this.newOpt[1].nClick){
          return
        }else{
          if (this.delArr.length == 0) {
            this.$message({
              message: '没有选择要修改的数据',
              type: 'warning'
            });
            return
          } else if (this.delArr.length >= 2) {
            this.$message({
              message: '只能修改单条数据',
              type: 'warning'
            });
            return
          }
          else {
            this.editMask[this.activeName].show = true;
            this.$fetch(this.url[this.activeName] + '/' + this.editId).then(res => {
                this.editData = {
                  suppliers_id: res.suppliers.id,
                  code: res.code,
                  name: res.name,
                  description: res.description,
                  remark: res.remark,
                  status: res.status
                  }
            }, err => {
              console.log(err);
            })
          }
        }
      },
    },
    mounted() {
      this.getInfo(this.url[0]);
      this.$store.dispatch('setOpt', this.newOpt);
      let that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt', that.newOpt);
      });
    }
  }
</script>
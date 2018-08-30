<template>
    <div>
        <el-tabs v-model="activeName" @tab-click="handleTabsClick">
            <el-tab-pane label="供应商信息" name="0">
                <el-table :data="supplierVal" fit
                          @selection-change="handleSelectionChange"
                          v-loading="loading"
                          height="400"
                          @row-click="supplierRClick">
                    <el-table-column
                            type="selection"
                            width="95" align="center"
                            :checked="checkboxInit">
                    </el-table-column>
                    <el-table-column v-for="item in tableHead[0]" :label="item.label" align="center" :width="item.width" :key="item.prop">
                        <template slot-scope="scope">
                            <span v-if="item.type=='checkbox'">
                           <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
                        </span>
                            <span v-else>
                            {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column label="操作" width="90" align="center">
                        <template slot-scope="scope">
                            <el-button size="mini" type="danger" @click="delSingle(scope.row,$event)">删除</el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-tab-pane>
            <el-tab-pane label="产品系列" name="1">
                <el-table :data="seriesVal" fit
                          @selection-change="handleSelectionChange"
                          v-loading="loading"
                          height="400"
                          @row-click="seriesRClick">
                    <el-table-column
                            type="selection"
                            width="95" align="center"
                            :checked="checkboxInit">
                    </el-table-column>
                    <el-table-column v-for="item in tableHead[1]" :label="item.label" align="center" :width="item.width" :key="item.prop">
                        <template slot-scope="scope">
                            <span v-if="item.type=='checkbox'">
                           <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
                        </span>
                            <span v-else>
                            {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                        </span>
                        </template>
                    </el-table-column>
                    <el-table-column label="操作" align="center">
                        <template slot-scope="scope">
                            <el-button size="mini" type="danger" @click="delSingle(scope.row,$event)">删除</el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-tab-pane>
        </el-tabs>

        <!--新增-->
        <el-dialog :title="title[activeName]" :visible.sync="addMask[activeName]">
            <el-form :model="addVal[activeName]" :rules="addRules[activeName]" label-width="100px" :class="{'half-form':halfForm[activeName]}">
                <el-form-item v-for="(item,index) in addHead[activeName]" :key="index" :label="item.label" :prop="item.prop">
                    <span v-if="item.type=='text'">
                          <el-input v-model.trim="addVal[activeName][item.prop]" :placeholder="addVal[activeName][item.holder]"></el-input>
                    </span>
                    <span v-else-if="item.type=='select'">
                        <el-select v-model="addVal[activeName][item.prop]" :placeholder="addVal[activeName][item.holder]">
                               <span v-for="list in resData[item.stateVal]" :key="list.id">
                                    <el-option :label="list.name?list.name:list.nick" :value="list.id"></el-option>
                               </span>
                           </el-select>
                    </span>
                    <span v-else-if="item.type=='textarea'">
                         <el-input type="textarea" v-model.trim="addVal[activeName][item.prop]" :placehoder="addVal[activeName][item.holder]"></el-input>
                    </span>
                    <span v-else-if="item.type == 'cascader'">
                        <el-cascader
                                size="middle"
                                :options="options"
                                v-model="addVal[activeName][item.prop]">
                        </el-cascader>
                    </span>
                    <span v-else-if="item.type == 'password'">
                         <el-input type="password" v-model="addVal[activeName][item.prop]" :placehold="addVal[activeName][item.holder]"></el-input>
                    </span>
                    <span v-else-if="item.type == 'number'">
                         <el-input type="number" v-model="addVal[activeName][item.prop]" :placehold="addVal[activeName][item.holder]"></el-input>
                    </span>
                    <span v-else-if="item.type == 'checkbox'">
                         <el-checkbox v-model="addVal[activeName][item.prop]"></el-checkbox>
                    </span>
                </el-form-item>
            </el-form>
            <div slot="footer" class="dialog-footer">
                <el-button type="primary" @click="addConfirm">添加</el-button>
                <el-button @click="addReset">重置</el-button>
            </div>
        </el-dialog>

        <!--修改-->
        <el-dialog :title="updateTitle[activeName]" :visible.sync="updateMask">
            <el-form :model="updateVal[activeName]" :rules="addRules[activeName]" label-width="100px" :class="{'half-form':halfForm[activeName]}">
                <el-form-item v-for="(item,index) in addHead[activeName]" :key="index" :label="item.label" :prop="item.prop">
                    <span v-if="item.type=='text'">
                          <el-input v-model.trim="updateVal[activeName][item.prop]"></el-input>
                    </span>
                    <span v-else-if="item.type=='select'">
                        <el-select v-model="updateVal[activeName][item.prop]">
                               <span v-for="list in resData[item.stateVal]" :key="list.id">
                                    <el-option :label="list.name?list.name:list.nick" :value="list.id"></el-option>
                               </span>
                           </el-select>
                    </span>
                    <span v-else-if="item.type=='textarea'">
                         <el-input type="textarea" v-model.trim="updateVal[activeName][item.prop]"></el-input>
                    </span>
                    <span v-else-if="item.type == 'cascader'">
                        <el-cascader
                                size="middle"
                                :options="options"
                                v-model="updateVal[activeName][item.prop]">
                        </el-cascader>
                    </span>
                    <span v-else-if="item.type == 'number'">
                         <el-input type="number" v-model="updateVal[activeName][item.prop]"></el-input>
                    </span>
                    <span v-else-if="item.type == 'checkbox'">
                         <el-checkbox v-model="updateVal[activeName][item.prop]"></el-checkbox>
                    </span>
                </el-form-item>
            </el-form>
            <div slot="footer" class="dialog-footer">
                <el-button type="primary" @click="updateConfirm">确认</el-button>
                <el-button @click="updateCancel">取消</el-button>
            </div>
        </el-dialog>

        <!--删除-->
        <el-popover
                placement="top"
                width="160"
                v-model="showDel" slot="tip">
            <p>确定删除该条数据？</p>
            <div style="text-align: right; margin: 0">
                <el-button size="mini" type="text" @click="cancelD">取消</el-button>
                <el-button type="primary" size="mini" @click="confirmD(delUrl,delId)">确定</el-button>
            </div>
        </el-popover>

        <!--页码-->
        <Pagination :page-url="delBatchUrl" @handlePagChg="handlePagChg"></Pagination>
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
            ent: this.addInfo
          },
          {
            cnt: '修改',
            icon: 'bf-change',
            ent: this.updateInfo,
            // nClick: true
          },
          {
            cnt: '删除',
            icon: 'bf-del',
            ent: this.delBatch
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
        pagination: {
          current_page: 1,
          per_page: 0,
          page_total: 0
        },
        /*获取数据*/
        supplierVal: [],
        seriesVal: [],
        checkboxInit: false,
        tableHead: [
          [
            {
              label: '名称',
              width: '120',
              prop: "name",
              holder: '请输入名称',
              type: 'text',
              // beAble: true
            },
            {
              label: '公司',
              width: '120',
              prop: "company",
              holder: '请输入公司',
              type: 'text'
            },
            {
              label: '公司代码',
              width: '130',
              prop: "code",
              holder: '请输入公司代码',
              type: 'text'
            },
            {
              label: '省',
              width: '120',
              prop: "province",
              holder: '请输入省'
            },
            {
              label: '市',
              width: '120',
              prop: "city",
              holder: '请输入市',
              type: 'text'
            },
            {
              label: '区',
              width: '120',
              prop: "district",
              holder: '请输入区',
              type: 'text'
            },
            {
              label: '地址',
              width: '150',
              prop: "address",
              holder: '请输入地址',
              type: 'text'
            },
            {
              label: '邮编',
              width: '120',
              prop: "zipcode",
              type: 'text'
            },
            {
              label: '联系人',
              width: '120',
              prop: "contacts",
              type: 'text'
            },
            {
              label: '联系电话',
              width: '120',
              prop: "phone",
              type: 'text'
            },
            {
              label: '手机',
              width: '120',
              prop: "mobile",
              type: 'text'
            },
            {
              label: '传真',
              width: '120',
              prop: "fax",
              type: 'text'
            },
            {
              label: '邮箱',
              width: '120',
              prop: "email",
              type: 'text'
            },
            {
              label: '备注',
              width: '130',
              prop: "remark",
              type: 'textarea'
            },
            {
              label: '启用扫描',
              width: '90',
              prop: "is_scan",
              type: 'checkbox'
            },
            {
              label: '采购自动计价',
              width: '90',
              prop: "auto_valuation",
              holder: '是否启用',
              type: 'checkbox'
            },
            {
              label: '状态',
              width: '90',
              prop: "status",
              holder: '请选择状态',
              type: 'checkbox'
            }
          ],
          [
            {
              label: '供应商名称',
              width: '130',
              prop: "suppliers",
              inProp: 'name',
              holder: '请选择供应商名称',
              type: 'select'
            },
            {
              label: '系列代码',
              width: '130',
              prop: "code",
              holder: '请输入系列代码',
              type: 'text'
            },
            {
              label: '系列名称',
              width: '130',
              prop: "name",
              holder: '请输入系列名称',
              type: 'text'
            },
            {
              label: '系列描述',
              width: '150',
              prop: "description",
              holder: '请输入系列描述',
              type: 'textarea'
            },
            {
              label: '备注',
              width: '130',
              prop: "remark",
              holder: '请输入名称',
              type: 'textarea'
            },
            {
              label: '状态',
              width: '90',
              prop: "status",
              holder: '请选择状态',
              type: 'checkbox'
            }
          ]
        ],
        supplierRow:{},
        seriesRow: {},
        loading: true,
        /*新增*/
        title: ['新增供应商', '新增产品系列'],
        addMask: [false,false],
        addVal: [
          {
            name: '',
            company: '',
            code: '',
            provinces: [],
            province: '',
            city: '',
            district: '',
            address: '',
            phone: '',
            mobile: '',
            fax: '',
            email: '',
            remark: '',
            is_scan: true,
            auto_valuation: true,
            status: true
          },
          {
            suppliers_id: '',
            code: '',
            name: '',
            description: '',
            remark: '',
            status: true
          }],
        addRules: [
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
        addHead: [
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
              label: '省市区',
              prop: 'provinces',
              holder: '请选择所在省市区',
              type: 'cascader'
            },
           /* {
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
            },*/
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
              type: 'number'
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
              type: 'number'
            },
            {
              label: '手机号码',
              prop: 'mobile',
              holder: '请输入手机号码',
              type: 'number'
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
              type: 'checkbox'
            },
            {
              label: '采购自动计价',
              prop: 'auto_valuation',
              holder: '请选择是或否',
              type: 'checkbox'
            },
            {
              label: '状态',
              prop: 'status',
              holder: '请选择',
              type: 'checkbox'
            }
          ],
          [
            {
              label: '供应商名',
              prop: 'suppliers_id',
              holder: '请输入供应商名称',
              type: 'select',
              stateVal: 'suppliers'
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
              type: 'checkbox'
            }
          ]
        ],
        halfForm: [true,false],
        options: regionDataPlus,
        /*修改*/
        updateTitle: ['修改供应商','修改产品系列'],
        updateMask: false,
        updateVal: [{},{}],
        currentId: '',
        delBatchUrl: '',
        delId: '',
        showDel: false,
      }
    },
    computed:{
      resData:{
        get:function(){
          return this.$store.state.responseData
        },
        set:function(){}
      },
      urls:{
        get:function(){
          return this.$store.state.urls
        },
        set:function(){}
      }
    },
    methods: {
      test() {},
      /*获取数据*/
      fetchData() {
        let index = this.activeName-0;
        switch(index){
          case 0:
            this.$fetch(this.urls.suppliers)
              .then(res => {
                this.loading = false;
                this.supplierVal = res.data;
                let pg = res.meta.pagination;
                this.$store.dispatch('currentPage', pg.current_page);
                this.$store.commit('PER_PAGE', pg.per_page);
                this.$store.commit('PAGE_TOTAL', pg.total);
                this.delBatchUrl = this.urls.suppliers;
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
            break;
          case 1:
            this.$fetch(this.urls.series,{include:'suppliers'})
              .then(res => {
                this.loading = false;
                this.seriesVal = res.data;
                let pg = res.meta.pagination;
                this.$store.dispatch('currentPage', pg.current_page);
                this.$store.commit('PER_PAGE', pg.per_page);
                this.$store.commit('PAGE_TOTAL', pg.total);
                this.$store.dispatch('suppliers','/suppliers');
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
            break;
        }
      },
      handleTabsClick(){
        this.loading = true;
        this.fetchData();
        Object.assign(this.addVal[this.activeName],this.$options.data().addVal[this.activeName]);
        this.delBatchUrl = this.activeName =='0'?this.urls.suppliers:this.urls.series;
      },
      supplierRClick(row){this.supplierRow = row;},
      seriesRClick(row){ this.seriesRow = row;},
      /*新增*/
      addInfo(){
        this.addMask=[false,false];
        this.addMask[this.activeName] = true;
        Object.assign(this.addVal[this.activeName],this.$options.data().addVal[this.activeName])
      },
      addConfirm(){
        if(this.addMask[0] == true){
          let data = this.addVal[0];
          data.province = CodeToText[data.provinces[0]];
          data.city = CodeToText[data.provinces[1]];
          data.district = CodeToText[data.provinces[2]];
          this.$post(this.urls.suppliers,data)
            .then(()=>{
              this.addMask = [false,false];
              // this.addMask[this.activeName] = false;
              this.$message({
                message: '添加成功',
                type: 'success'
              });
              this.refresh();
            },err=>{
              Object.assign(this.addVal[this.activeName],this.$options.data().addVal[this.activeName]);
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
        }else{
          let data = this.addVal[1];
          this.$post(this.urls.series,data)
            .then(()=>{
              this.addMask = [false,false];
              this.$message({
                message: '添加成功',
                type: 'success'
              });
              this.refresh();
            },err=>{
              Object.assign(this.addVal[this.activeName],this.$options.data().addVal[this.activeName]);
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
        }
      },
      addReset() {
        Object.assign(this.addVal[this.activeName],this.$options.data().addVal[this.activeName])
      },
      /*修改*/
      updateInfo(){
        this.updateMask = true;
        let id;
        if(this.activeName=='0'){
          id=this.currentId?this.currentId:this.supplierRow.id;
          this.$fetch(this.urls.suppliers+'/'+id)
            .then(res=>{
              this.updateVal = [{
                name: res.name,
                company: res.company,
                code: res.code,
                provinces: [TextToCode[res.province].code, TextToCode[res.province][res.city].code, TextToCode[res.province][res.city][res.district].code],
                province: res.province,
                city: res.city,
                district: res.district,
                address: res.address,
                phone: res.phone,
                mobile: res.mobile,
                fax: res.fax,
                zipcode: res.zipcode,
                contacts: res.contacts,
                email: res.email,
                remark: res.remark,
                is_scan: res.is_scan,
                auto_valuation: res.auto_valuation,
                status: res.status,
              },{}];
            },err=>{})
        }else{
          id=this.currentId?this.currentId:this.seriesRow.id;
          this.$fetch(this.urls.series+'/'+id,{include:'suppliers'})
            .then(res=>{
              this.updateVal = [{},{
                suppliers_id:  res.suppliers_id,
                code:  res.code,
                name:  res.name,
                description:  res.description,
                remark:  res.remark,
                status:  res.status
              }];
            },err=>{})
        }
      },
      updateConfirm(){
        let id;
        id=this.currentId?this.currentId:this.supplierRow.id;
        if(this.activeName=='0'){
          let data = this.updateVal[this.activeName];
          data.province = CodeToText[data.provinces[0]];
          data.city = CodeToText[data.provinces[1]];
          data.district = CodeToText[data.provinces[2]];
          this.$patch(this.urls.suppliers+'/'+id,this.updateVal[0])
            .then(()=>{
              this.updateMask = false;
              this.refresh();
              this.$message({
                message:'修改成功',
                type:'success'
              })
            },err=>{
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
        }else{
          let id;
          id=this.currentId?this.currentId:this.seriesRow.id;
          this.$patch(this.urls.series+'/'+id,this.updateVal[1])
            .then(()=>{
              this.updateMask = false;
              this.refresh();
              this.$message({
                message:'修改成功',
                type:'success'
              })
            },err=>{
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
        }
      },
      updateCancel(){
        this.updateMask = false;
        this.$message({
          message: '取消修改',
          type:'info'
        })
      },
      /*分页*/
      handlePagChg(page){
        if(this.activeName == '0'){
          this.$fetch(this.urls.suppliers+'?page='+page)
            .then(res=>{
              this.supplierVal = res.data;
            })
        }else{
          this.$fetch(this.urls.series+'?page='+page,{include:'suppliers'})
            .then(res=>{
              this.seriesVal = res.data;
            })
        }
      },
      /*删除*/
      delSingle(row,e){
        this.showDel = true;
        $('.el-popper').css({left: e.x - 100 + 'px', top: e.y - 125 + 'px'});
        this.delId = row.id;
        this.delUrl = row.suppliers?this.urls.series:this.urls.suppliers;
      },
      cancelD(){
        this.showDel = false;
        this.$message({
          message: '取消删除',
          type: 'info'
        });
      },
      confirmD(url,id){
        this.$del(url+'/'+id)
          .then(()=>{
            this.$message({
              message: '删除成功',
              type: 'success'
            });
            this.showDel = false;
            this.refresh();
          },err=>{
            if (err.response) {
              this.showDel = false;
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
      /*批量删除*/
      handleSelectionChange(val){
        /*拿到id集合*/
        let delArr = [];
        val.forEach(selectedItem => {
          delArr.push(selectedItem.id);
        });
        this.ids = delArr.join(',');
        /*拿到当前id*/
        this.currentId =val.length>0?val[val.length-1].id:'';
      },
      delBatch(){
        if (this.ids.length === 0) {
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
            this.$del(this.delBatchUrl, {ids: this.ids})
              .then(() => {
                this.$message({
                  message: '删除成功',
                  type: 'success'
                });
                this.refresh();
              },err=>{
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
      /*刷新*/
      refresh(){
        this.loading = true;
        this.fetchData();
        this.platRIndex  ='';
      },
    },
    mounted() {
      this.fetchData();
      this.$store.dispatch('setOpt', this.newOpt);
      let that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt', that.newOpt);
      });
    }
  }
</script>
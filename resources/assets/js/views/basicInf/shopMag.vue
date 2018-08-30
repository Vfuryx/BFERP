<template>
    <div class="shopMag">
        <!--查询-->
        <div class="searchBox" v-if="shopPage">
            <span>
                <label>卖家昵称</label>
                <el-input v-model="searchBox.buyNick" clearable class="half" @keyup.enter.native="queryData"></el-input>
            </span>
            <span>
                <label>店铺标题</label>
                <el-input v-model="searchBox.shopTitle" clearable class="half" @keyup.enter.native="queryData"></el-input>
            </span>
        </div>

        <!--获取数据-->
        <el-tabs v-model="activeName" @tab-click="handleTabsClick">
            <el-tab-pane label="店铺信息" name="0">
                <el-table :data="shopVal" fit
                          @selection-change="handleSelectionChange"
                          v-loading="loading"
                          height="400"
                @row-click="shopRClick">
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
            <el-tab-pane label="平台信息" name="1">
                <el-table :data="platVal" fit
                          @selection-change="handleSelectionChange"
                          v-loading="loading"
                          height="400"
                          :row-class-name="platRCName"
                @row-click="platRClick">
                    <el-table-column
                            type="selection"
                            width="95" align="center"
                            :checked="checkboxInit">
                    </el-table-column>
                    <el-table-column v-for="item in tableHead[1]" :label="item.label" align="center" :width="item.width" :key="item.prop">
                        <template slot-scope="scope">
                            <span v-if="platRIndex=='index'+scope.$index">
                                <span v-if="item.type=='checkbox'">
                           <el-checkbox v-model="scope.row[item.prop]" ></el-checkbox>
                        </span>
                                <span v-else>
                           <el-input size="small" v-model.trim="scope.row[item.prop]"></el-input>
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
                    <el-table-column label="操作" width="150" align="center" fixed="right">
                        <template slot-scope="scope">
                            <span v-if="platRIndex=='index'+scope.$index">
                           <el-button size="mini" type="primary" @click="saveSingle(scope.row)">保存</el-button>
                            </span>
                            <el-button size="mini" type="danger" @click="delSingle(scope.row,$event)">删除</el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-tab-pane>
        </el-tabs>

        <!--新增-->
        <el-dialog :title="title[activeName]" :visible.sync="addMask[activeName]">
            <el-form :model="addVal[activeName]" :rules="addRules[activeName]" :ref="addRef[activeName]" label-width="100px" :class="{'half-form':moreForms[activeName]}">
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
        <el-dialog title="修改店铺信息" :visible.sync="updateMask">
            <el-form :model="updateVal" :rules="addRules[activeName]" :ref="addRef[activeName]" label-width="100px" :class="{'half-form':moreForms[activeName]}">
                <el-form-item v-for="(item,index) in addHead[activeName]" :key="index" :label="item.label" :prop="item.prop">
                    <span v-if="item.type=='text'">
                          <el-input v-model.trim="updateVal[item.prop]" :disabled="item.prop=='nick'?true:false"></el-input>
                    </span>
                    <span v-else-if="item.type=='select'">
                        <el-select v-model="updateVal[item.prop]">
                               <span v-for="list in resData[item.stateVal]" :key="list.id">
                                    <el-option :label="list.name?list.name:list.nick" :value="list.id"></el-option>
                               </span>
                           </el-select>
                    </span>
                    <span v-else-if="item.type=='textarea'">
                         <el-input type="textarea" v-model.trim="updateVal[item.prop]"></el-input>
                    </span>
                    <span v-else-if="item.type == 'cascader'">
                        <el-cascader
                                size="middle"
                                :options="options"
                                v-model="updateVal[item.prop]">
                        </el-cascader>
                    </span>
                    <span v-else-if="item.type == 'password'">
                         <el-input type="password" v-model="updateVal[item.prop]"></el-input>
                    </span>
                    <span v-else-if="item.type == 'number'">
                         <el-input type="number" v-model="updateVal[item.prop]"></el-input>
                    </span>
                    <span v-else-if="item.type == 'checkbox'">
                         <el-checkbox v-model="updateVal[item.prop]"></el-checkbox>
                    </span>
                </el-form-item>
            </el-form>
            <div slot="footer" class="dialog-footer">
                <el-button type="primary" @click="updateConfirm">修改</el-button>
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
        <Pagination :page-url="this.url[activeName]" @handlePagChg="handlePagChg"></Pagination>
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
            ent: this.addShopInfo
          },
          {
            cnt: '修改',
            icon: 'bf-change',
            ent: this.updateShop,
            nClick: false
          },
          {
            cnt: '删除',
            icon: 'bf-del',
            ent: this.delBatch
          },
          {
            cnt: '上传',
            icon: 'bf-upload',
            ent: this.test
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.refresh
          }
        ],
        /*查询*/
        shopPage: true,
        searchBox:{
          buyNick:'',
          shopTitle:''
        },
        /*获取数据*/
        activeName: '0',
        checkboxInit: false,
        loading: true,
        tableHead: [
          [
            {
              label: '卖家昵称',
              width: '120',
              prop: "nick",
              type: 'text'
            },
            {
              label: '店铺标题',
              width: '120',
              prop: "title",
              type: 'text'
            },
            {
              label: '仓库',
              width: '120',
              prop: 'warehouse',
              inProp:'name',
              type: 'text'
            },
            {
              label: '店铺返点(%)',
              width: '130',
              prop: "rebate",
              type: 'text'
            },
            {
              label: '店铺电话',
              width: '150',
              prop: "principal_mobile",
              type: 'number'
            },
            {
              label: '店铺类型',
              width: '120',
              prop: "platform",
              inProp: 'name',
              type: 'text'
            },
            {
              label: '店铺负责人',
              width: '130',
              prop: "principal",
              type: 'text'
            },
            {
              label: '发货地(省)',
              width: '130',
              prop: "province",
              type: 'text'
            },
            {
              label: '发货地(市)',
              width: '130',
              prop: "city",
              type: 'text'
            },
            {
              label: '发货地(区)',
              width: '130',
              prop: "district",
              type: 'text'
            },
            {
              label: '发货地址',
              width: '150',
              prop: "address",
              type: 'text'
            },
            {
              label: '毛利差异(%)',
              width: '130',
              prop: "gross_profit_rate",
              type: 'number'
            },
            {
              label: '电子面单',
              width: '120',
              prop: "is_waybill",
              type: 'checkbox'
            }
          ],
          [
            {
              label: '平台类型名称',
              prop: "name",
              type: 'text'
            },
            {
              label: '状态',
              prop: "status",
              type: 'checkbox'
            }
          ]
        ],
        shopVal:[],
        platVal:[],
        shopRow:[],
        currentId: '',
        pagination:{
          current_page:1,
          per_page: 0,
          page_total: 0
        },
        url:['/shops','/platforms'],
        /*新增*/
        title:['新增店铺信息','新增平台信息'],
        addMask:[false,false],
        addVal:[
          {
           nick: '',
           title: '',
           session_key: '',
           warehouse_id:'',
           shop_account:'',
           shop_passwd:'',
           rebate:'',
           principal:'',
           principal_mobile:'',
           provinces: [],
           province:'',
           city:'',
           district:'',
           address:'',
           gross_profit_rate:'',
           platform_id:'',
           is_waybill: true
         },
          {
            name:'',
            status: true
          }
        ],
        addRules:[
          {
            nick: [
              {required: true, message: '请输入卖家昵称', trigger: 'blur'},
            ],
            title: [
              {required: true, message: '请输入店铺标题', trigger: 'blur'},
            ],
            session_key: [
              {required: true, message: '请输入SessionKey', trigger: 'blur'}
            ],
            warehouse_id: [
              {required: true, message: '默认仓库必选', trigger: 'blur'}
            ],
            shop_account: [
              {required: true, message: '请输入店铺账号', trigger: 'blur'}
            ],
            shop_passwd: [
              {required: true, message: '请输入店铺密码', trigger: 'blur'}
            ],
            rebate: [
              {required: true, message: '请输入返点', trigger: 'blur'}
            ],
            principal: [
              {required: true, message: '请输入店铺负责人', trigger: 'blur'}
            ],
            principal_mobile: [
              {required: true, message: '请输入负责人电话', trigger: 'blur'}
            ],
            /*  province: [
                {required: true, message: '请输入省', trigger: 'blur'}
              ],*/
            city: [
              {required: true, message: '请输入市', trigger: 'blur'}
            ],
            district: [
              {required: true, message: '请输入区', trigger: 'blur'}
            ],
            address: [
              {required: true, message: '请输入地址', trigger: 'blur'}
            ],
            gross_profit_rate: [
              {required: true, message: '请输入毛利', trigger: 'blur'}
            ],
            platform_id: [
              {required: true, message: '请输入平台', trigger: 'blur'}
            ]
          },
          {
            name: [
              {required: true, message: '请输入仓库名称', trigger: 'blur'},
            ]
          }
        ],
        addRef:['shopForm','platForm'],
        moreForms:[true,false],
        addHead:[
          [
            {
              label: '卖家昵称',
              prop: 'nick',
              holder: '请输入卖家昵称',
              type: 'text',
            },
            {
              label: '店铺标题',
              prop: 'title',
              holder: '请输入店铺标题',
              type: 'text'
            },
            {
              label: 'SessionKey',
              prop: 'session_key',
              holder: '请输入SessionKey',
              type: 'text'
            },
            {
              label: '默认仓库',
              prop: 'warehouse_id',
              holder: '请选择仓库',
              type: 'select',
              stateVal: 'warehouses'
            },
            {
              label: '店铺账号',
              prop: 'shop_account',
              holder: '请输入店铺账号',
              type: 'text'
            },
            {
              label: '店铺密码',
              prop: 'shop_passwd',
              holder: '请输入店铺密码',
              type: 'password',
            },
            {
              label: '返点(%)',
              prop: 'rebate',
              holder: '请输入返点',
              type: 'number',
            },
            {
              label: '店铺负责人',
              prop: 'principal',
              holder: '请输入负责人',
              type: 'text'
            },
            {
              label: '负责人电话',
              prop: 'principal_mobile',
              holder: '请输入负责人电话',
              type: 'number'
            },
            {
              label: '省市区',
              prop: 'provinces',
              holder: '请选择省市区',
              type: 'cascader',
            },
            {
              label: '发货地址',
              prop: 'address',
              holder: '请输入地址',
              type: 'text'
            },
            {
              label: '毛利差异(%)',
              prop: 'gross_profit_rate',
              imgPath: '',
              holder: '请输入毛利差异',
              type: 'number'
            },
            {
              label: '平台',
              prop: 'platform_id',
              stateVal: 'platforms',
              holder: '请选择平台',
              type: 'select'
            },
            {
              label: '电子面单',
              prop: 'is_waybill',
              type: 'checkbox'
            }
          ],
          [
            {
              label:'平台名称',
              prop:'name',
              holder:'请输入平台名称',
              type: 'text'
            },
            {
              label:'状态',
              prop:'status',
              type: 'checkbox'
            }
          ]
        ],
        options: regionDataPlus,
        /*修改*/
        platRIndex: '',
        updateMask: false,
        updateVal: {},
        /*删除*/
        showDel: false,
        delUrl: '',
        delId: '',
        delBatchUrl: '',
        ids:[]
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
      },
    },
    methods:{
      test(){
        console.log(1);
      },
      /*查询*/
      queryData(){
        alert(this.searchBox);
      },
      /*获取数据*/
      fetchData() {
        let index = this.activeName-0;
        switch(index){
          case 0:
            this.$fetch(this.urls.shops,{include:'warehouse,platform'})
              .then(res => {
                this.loading = false;
                this.shopVal = res.data;
                let pg = res.meta.pagination;
                this.$store.dispatch('currentPage', pg.current_page);
                this.$store.commit('PER_PAGE', pg.per_page);
                this.$store.commit('PAGE_TOTAL', pg.total);
                this.$store.dispatch('warehouses','/warehouses');
                this.$store.dispatch('platforms','/platforms');
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
            this.$fetch(this.urls.platforms)
              .then(res => {
                this.loading = false;
                this.platVal = res.data;
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
            break;
        }
      },
      handleTabsClick(){
        this.loading = true;
        this.fetchData();
        this.shopPage = this.activeName == 0?true:false;
        Object.assign(this.addVal[this.activeName],this.$options.data().addVal[this.activeName]);
        this.newOpt[1].nClick=this.activeName=='1'?true:false;
        this.delBatchUrl = this.activeName =='0'?this.urls.shops:this.urls.platforms;
      },
      /*新增*/
      addShopInfo(){
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
          this.$post(this.urls.shops,data)
            .then(()=>{
              this.addMask[this.activeName] = false;
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
          this.$post(this.urls.platforms,data)
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
      shopRClick(row){
        this.shopRow = row;
      },
      /*修改*/
      platRCName({row,rowIndex}){row.index = rowIndex},
      platRClick(row){
        this.platRIndex = `index${row.index}`;
      },
      updateShop(){
        if(this.newOpt[1].nClick){
          return
        }else{
          this.updateMask = true;
          /*判断复选框是否有值*/
          let id;
          id=this.currentId?this.currentId:this.shopRow.id;
          this.$fetch(this.urls.shops+'/'+id)
            .then(res=>{
              this.updateVal = {
                nick: res.nick,
                title: res.title,
                session_key: res.session_key,
                warehouse_id:res.warehouse_id,
                shop_account:res.shop_account,
                shop_passwd:res.shop_passwd,
                rebate:res.rebate,
                principal:res.principal,
                principal_mobile:res.principal_mobile,
                provinces: [TextToCode[res.province].code, TextToCode[res.province][res.city].code, TextToCode[res.province][res.city][res.district].code],
                province:'',
                city:'',
                district:'',
                address:res.address,
                gross_profit_rate:res.gross_profit_rate,
                platform_id:res.platform_id,
                is_waybill: res.is_waybill
              }
            },err=>{})
        }
      },
      updateConfirm(){
        let id;
        id=this.currentId?this.currentId:this.shopRow.id;
        let data = this.updateVal;
        data.province = CodeToText[data.provinces[0]];
        data.city = CodeToText[data.provinces[1]];
        data.district = CodeToText[data.provinces[2]];
        this.$patch(this.urls.shops+'/'+id,this.updateVal)
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
      },
      updateCancel(){
        this.updateMask = false;
        this.$message({
          message: '取消修改',
          type:'info'
        })
      },
      saveSingle(row){
        this.$patch(this.urls.platforms+'/'+row.id,row)
          .then(()=>{
            this.platRIndex = '';
            this.$message({
              message: '平台信息修改成功',
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
              this.$message.error({
                message: str
              });
            }
          })
      },
      /*分页*/
      handlePagChg(page){
        this.$fetch(this.url[this.activeName]+'?page='+page)
          .then(res=>{
            this.activeName=='0'?this.shopVal = res.data:this.platVal=res.data;
          })
      },
      /*删除*/
      delSingle(row,e){
        this.showDel = true;
        $('.el-popper').css({left: e.x - 100 + 'px', top: e.y - 125 + 'px'});
        this.delId = row.id;
        this.delUrl = row.platform?this.urls.shops:this.urls.platforms;
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
              this.$message.error({
                message: str
              });
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
      this.$store.dispatch('setOpt',this.newOpt);
      let that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt',that.newOpt);
      });
    }
  }
</script>
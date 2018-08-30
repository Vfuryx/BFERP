<template>
    <div>
        <el-tabs v-model="activeName">
            <el-tab-pane label="物流公司" name="0">
                <el-table :data="logisticsData" fit
                          @selection-change="handleSelectionChange"
                          v-loading="loading"
                          height="400"
                          id="outTable"
                          @row-click="logicRowClick">
                    <el-table-column
                            type="selection"
                            width="95" align="center"
                            :checked="checkboxInit">
                    </el-table-column>
                    <el-table-column v-for="item in logisticsHead" :label="item.label" align="center" :width="item.width" :key="item.prop">
                        <template slot-scope="scope">
                            <span v-if="item.type=='checkbox'">
                                <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
                            </span>
                            <span v-else>
                                    {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                                </span>
                        </template>
                    </el-table-column>
                    <el-table-column label="操作" width="90" align="center" fixed="right">
                        <template slot-scope="scope">
                            <el-button size="mini" type="danger" @click="delSingle(scope.row,$event)">删除</el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-tab-pane>
        </el-tabs>

        <Pagination :page-url="this.urls.logistics" @handlePagChg="handlePagChg"></Pagination>

        <el-tabs v-model="btmActiveName">
            <el-tab-pane label="物流城市" name="0">
                <el-table :data="cityData" fit>
                    <el-table-column v-for="item in cityHead" :label="item.label" align="center" :width="item.width" :key="item.prop">
                        <template slot-scope="scope">
                                <span v-if="item.type=='checkbox'">
                                <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
                            </span>
                                <span v-else-if="item.type == 'select_def'">
                                    {{scope.row[item.prop]=='0'?"中转":"直达"}}
                                </span>
                                <span v-else>
                                    {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                                </span>
                        </template>
                    </el-table-column>
                    <el-table-column label="操作" width="90" align="center" fixed="right">
                        <template slot-scope="scope">
                            <el-button size="mini" type="danger" @click="delSingle(scope.row,$event)">删除</el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-tab-pane>
        </el-tabs>

        <!--新增-->
        <el-dialog title="新增物流公司" :visible.sync="addLogicMask" :class="{'more-forms':moreForms}">
            <el-button type="text">物流主信息</el-button>
            <add-new :rule-form="addLogicForm" :rules="addLogicRules" :add-arr="addLogicHead" :onlyInputs="true"></add-new>
            <el-button type="text">城市信息</el-button>
            <el-table :data="addCityVal" fit height="300" :row-class-name="addCityCName" @row-click="addCityRClick">
                <el-table-column v-for="item in addCityHead" :label="item.label" align="center" :width="item.width" :key="item.label">
                    <template slot-scope="scope">
                        <span v-if="cityIndex == 'index'+scope.$index">
                            <span v-if="item.type=='number'">
                                        <el-input size="small" type="number" v-model.trim="scope.row[item.prop]" :placeholder="item.holder"></el-input>
                            </span>
                            <span v-else-if="item.type == 'textarea'">
                                      <el-input type="textarea" size="small" v-model.trim="scope.row[item.prop]" :placeholder="item.holder"></el-input>
                                </span>
                            <span v-else-if="item.type == 'selects'">
                                    <el-select v-model="scope.row[item.prop]" :placeholder="item.holder">
                                       <span v-for="list in transfers" :key="list.value">
                                            <el-option :label="list.label" :value="list.value"></el-option>
                                       </span>
                                   </el-select>
                                </span>
                            <span v-else-if="item.type == 'cascader'">
                                <el-cascader
                                        size="middle"
                                        :options="options"
                                        :placeholder="item.holder"
                                        v-model="scope.row[item.prop]">
                                </el-cascader>
                            </span>
                            <span v-else-if="item.type == 'checkbox'">
                              <el-checkbox v-model="scope.row[item.prop]"></el-checkbox>
                            </span>
                            <span v-else>
                                 <el-input size="small" v-model.trim="scope.row[item.prop]" :placeholder="item.holder"></el-input>
                            </span>
                        </span>
                        <span v-else>
                            <span v-if="item.type=='selects'">
                                {{scope.row[item.prop]===0?"中转":"直达"}}
                            </span>
                            <span v-else-if="item.type=='cascader'">
                                <el-cascader
                                        size="middle"
                                        :options="options"
                                        v-model="scope.row[item.prop]">
                                </el-cascader>
                            </span>
                            <span v-else-if="item.type == 'checkbox'">
                                 <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
                            </span>
                            <span v-else>
                                {{scope.row[item.prop]}}
                            </span>
                        </span>
                    </template>
                </el-table-column>
                <el-table-column label="操作" width="90" align="center" fixed="right">
                    <template slot-scope="scope">
                        <el-button size="mini" type="danger" @click="addCityDtl(scope.$index)">删除</el-button>
                    </template>
                </el-table-column>
            </el-table>
            <div slot="footer" class="dialog-footer clearfix">
                <div style="float: left">
                    <el-button type="primary" @click="addCityInfo">添加城市信息</el-button>
                </div>
                <div style="float: right">
                    <el-button type="primary" @click="addConfirm">确定</el-button>
                    <el-button @click="addCancel">取消</el-button>
                </div>
            </div>
        </el-dialog>

        <!--修改-->
        <el-dialog title="修改物流公司" :visible.sync="updateLogicMask" :class="{'more-forms':moreForms}">
            <el-button type="text">物流主信息</el-button>
            <add-new :rule-form="updateLogicForm" :rules="addLogicRules" :add-arr="addLogicHead" :onlyInputs="true"></add-new>
            <el-button type="text">城市信息</el-button>
            <el-table :data="updateCityVal" fit height="300" :row-class-name="updateCityCName" @row-click="updateCityRClick">
                <el-table-column v-for="item in addCityHead" :label="item.label" align="center" :width="item.width" :key="item.label">
                    <template slot-scope="scope">
                        <span v-if="updateIndex == 'index'+scope.$index">
                            <span v-if="item.type=='number'">
                                        <el-input size="small" type="number" v-model.trim="scope.row[item.prop]" :placeholder="item.holder"></el-input>
                            </span>
                            <span v-else-if="item.type == 'textarea'">
                                      <el-input type="textarea" size="small" v-model.trim="scope.row[item.prop]" :placeholder="item.holder"></el-input>
                                </span>
                            <span v-else-if="item.type == 'selects'">
                                    <el-select v-model="scope.row[item.prop]" :placeholder="item.holder">
                                       <span v-for="list in transfers" :key="list.value">
                                            <el-option :label="list.label" :value="list.value"></el-option>
                                       </span>
                                   </el-select>
                                </span>
                            <span v-else-if="item.type == 'cascader'">
                                <el-cascader
                                        size="middle"
                                        :options="options"
                                        :placeholder="item.holder"
                                        v-model="scope.row[item.prop]">
                                </el-cascader>
                            </span>
                            <span v-else-if="item.type == 'checkbox'">
                              <el-checkbox v-model="scope.row[item.prop]"></el-checkbox>
                            </span>
                            <span v-else>
                                 <el-input size="small" v-model.trim="scope.row[item.prop]" :placeholder="item.holder"></el-input>
                            </span>
                        </span>
                        <span v-else>
                            <span v-if="item.type=='selects'">
                                {{scope.row[item.prop]===0?"中转":"直达"}}
                            </span>
                            <span v-else-if="item.type=='cascader'">
                                <el-cascader
                                        size="middle"
                                        :options="options"
                                        v-model="scope.row[item.prop]">
                                </el-cascader>
                            </span>
                             <span v-else-if="item.type == 'checkbox'">
                                 <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
                            </span>
                            <span v-else>
                                {{scope.row[item.prop]}}
                            </span>
                        </span>
                    </template>
                </el-table-column>
                <el-table-column label="操作" width="90" align="center" fixed="right">
                    <template slot-scope="scope">
                        <el-button size="mini" type="danger" @click="updateCityDtl(scope.row,scope.$index)">删除</el-button>
                    </template>
                </el-table-column>
            </el-table>
            <div slot="footer" class="dialog-footer clearfix">
                <div style="float: left">
                    <el-button type="primary" @click="addCityInfo">添加城市信息</el-button>
                </div>
                <div style="float: right">
                    <el-button type="primary" @click="updateConfirm">确定</el-button>
                    <el-button @click="updateCancel">取消</el-button>
                </div>
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
    </div>
</template>
<script>
  import FileSaver from 'file-saver'
  import XLSX from 'xlsx'
  import { mapGetters } from 'vuex'
  import { regionDataPlus, CodeToText, TextToCode } from 'element-china-area-data'
  export default {
    data() {
      return {
        newOpt: [
          {
            cnt: '新增',
            icon: 'bf-add',
            ent: this.addLogic,
          },
          {
            cnt: '修改',
            icon: 'bf-change',
            ent: this.updateLogic,
            nClick: false
          },
          {
            cnt: '删除',
            icon: 'bf-del',
            ent: this.delBatch,
          },
          {
            cnt: '导入',
            icon: 'bf-in',
            // ent: this.createP,
            ent: this.test,
          },
          {
            cnt: '导出',
            icon: 'bf-out',
            // ent: this.exportExcel,
            ent: this.test,
          },
          {
            cnt: '同步',
            icon: 'bf-sync',
            ent: this.test,
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.refresh,
          }
        ],
        /*获取数据*/
        logisticsData: [],
        activeName: '0',
        loading: true,
        logisticsHead:[
          {
            label: '物流代码',
            width: '150',
            prop: "code",
            type: 'text'
          },
          {
            label: '物流名称',
            width: '150',
            prop: "name",
            type: 'text'
          },
          {
            label: '报表格式',
            width: '130',
            prop: 'printReport',
            inProp: 'name',
            // stateVal: 'printreports',
            type: 'text'
          },
          {
            label: '运费类型',
            width: '130',
            prop: "freightType",
            inProp: 'name',
            // stateVal: 'freighttypes',
            type: 'text'
          },
          {
            label: '预计天数',
            width: '120',
            prop: "expected_days",
            type: 'number'
          },
          {
            label: '物流电话',
            width: '130',
            prop: "phone",
            type: 'number'
          },
          {
            label: '物流地址',
            width: '160',
            prop: "address",
            type: 'text'
          },
          {
            label: '备注',
            width: '120',
            prop: "remark",
            type: 'textarea'
          },
          {
            label: '是否启用',
            width: '90',
            prop: "status",
            type: 'checkbox'
          },
          {
            label: '创建时间',
            width: '200',
            prop: "created_at",
            type: 'text',
          },
        ],
        checkboxInit: false,
        btmActiveName: '0',
        logicRow: {},
        pagination: {
          current_page: 1,
          per_page: 0,
          page_total: 0
        },
        /*城市信息*/
        cityData: [],
        cityHead:[
          {
            label: '物流名称',
            width: '140',
            prop: "logistics",
            inProp: 'name',
            type: 'text'
          },
          {
            label: '省',
            width: '100',
            prop: "province",
            type: 'text'
          },
          {
            label: '市',
            width: '100',
            prop: "city",
            type: 'text'
          },
          {
            label: '区',
            width: '120',
            prop: "district",
            type: 'text'
          },
          {
            label: '提货地址',
            width: '180',
            prop: "address",
            type: 'text'
          },
          {
            label: '提货电话',
            width: '130',
            prop: "phone",
            type: 'number'
          },
          {
            label: '物流费用',
            width: '120',
            prop: "price",
            type: 'number'
          },
          {
            label: '重量单价',
            width: '120',
            prop: "weight_univalent",
            type: 'number'
          },
          {
            label: '到达天数',
            width: '120',
            prop: "expected_days",
            type: 'number'
          },
          {
            label: '直达(中转)',
            width: '120',
            prop: "route",
            type: 'select_def'
          },
          {
            label: '包邮',
            width: '90',
            prop: "is_free_shipping",
            type: 'checkbox'
          },
          {
            label: '备注',
            width: '120',
            prop: "remark",
            type: 'textarea'
          }
        ],
        /*新增*/
        addLogicMask: false,
        moreForms: true,
        addLogicForm: {
          code: '',
          name: '',
          report_id: '',
          expected_days: '',
          phone: '',
          address: '',
          freight_type_id: '',
          remark: '',
          status: true
        },
        addLogicRules:{
          code: [
            {required: true, message: '请输入物流代码', trigger: 'blur'},
          ],
          name: [
            {required: true, message: '请输入物流名称', trigger: 'blur'},
          ],
          report_id: [
            {required: true, message: '请选择报表格式', trigger: 'blur'}
          ],
          expected_days: [
            {required: true, message: '请输入预计天数', trigger: 'blur'}
          ],
          phone: [
            {required: true, message: '请输入物流电话', trigger: 'blur'}
          ],
          address: [
            {required: true, message: '请输入物流地址', trigger: 'blur'}
          ],
          freight_type_id: [
            {required: true, message: '请选择运费类型', trigger: 'blur'}
          ]
        },
        addLogicHead:[
          {
            label: '物流代码',
            prop: 'code',
            holder: '请输入物流代码',
            type: 'text'
          },
          {
            label: '物流名称',
            prop: 'name',
            holder: '请输入物流名称',
            type: 'text'
          },
          {
            label: '报表格式',
            prop: 'report_id',
            holder: '请选择报表格式',
            type: 'select',
            stateVal:'printreports'
          },
          {
            label: '运费类型',
            prop: 'freight_type_id',
            holder: '请输入运费类型',
            type: 'select',
            stateVal: 'freighttypes'
          },
          {
            label: '预计天数',
            prop: 'expected_days',
            holder: '请输入预计天数',
            type: 'number'
          },
          {
            label: '物流电话',
            prop: 'phone',
            holder: '请输入物流电话',
            type: 'number'
          },
          {
            label: '物流地址',
            prop: 'address',
            holder: '请输入物流地址',
            type: 'text'
          },
          {
            label: '状态',
            prop: 'status',
            holder: '请选择是否启用',
            type: 'checkbox'
          },
          {
            label: '备注',
            prop: 'remark',
            holder: '请输入备注',
            type: 'textarea'
          }
        ],
        addCityVal: [
          {
            provinces: [],
            province: '',
            city: '',
            district: '',
            address: '',
            phone: '',
            price: '',
            weight_univalent: '',
            expected_days: '',
            route: '',
            is_free_shipping: false,
            remark: ''
          }
        ],
        addCityHead: [
          {
            label: '省市区',
            prop: 'provinces',
            width: '220',
            holder: '请输入所在省',
            type: 'cascader'
          },
          {
            label: '提货地址',
            prop: 'address',
            width: '160',
            holder: '请输入提货地址',
            type: 'text'
          },
          {
            label: '提货电话',
            prop: 'phone',
            width: '130',
            holder: '请输入提货电话',
            type: 'number'
          },
          {
            label: '物流费用',
            prop: 'price',
            width: '120',
            holder: '请输入物流费用',
            type: 'number'
          },
          {
            label: '重量单价',
            width: '120',
            prop: 'weight_univalent',
            holder: '请输入重量单价',
            type: 'number'
          },
          {
            label: '城市到达天数',
            prop: 'expected_days',
            width: '140',
            holder: '请输入城市到达天数',
            type: 'number'
          },
          {
            label: '中转或直达',
            prop: 'route',
            width: '130',
            holder: '请选择中转或直达',
            type: 'selects'
          },
          {
            label: '包邮',
            width: '90',
            prop: 'is_free_shipping',
            holder: '请选择是否包邮',
            type: 'checkbox'
          },
          {
            label: '备注',
            width: '150',
            prop: 'remark',
            holder: '请输入备注',
            type: 'textarea'
          }
        ],
        transfers: [{label: '中转',value: '0'},{label: '直达',value: '1'},],
        options: regionDataPlus,
        cityIndex: '',
        /*修改*/
        updateLogicMask:false,
        updateLogicForm: {},
        updateCityVal: [],
        updateIndex: '',
        /*删除*/
        showDel: false,
        delUrl: '',
        delId: '',
        delBatchUrl: '',
        ids:[],
        currentId: '',
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
      test() {
        console.log(1);
      },
      /*获取数据*/
      fetchLogData(){
        this.$fetch(this.urls.logistics,{include:'cityInfos.logistics,printReport,freightType'})
          .then(res => {
            this.logisticsData = res.data;
            this.cityData = res.data[0]?res.data[0]['cityInfos'].data:[];
            this.loading = false;
            let pg = res.meta.pagination;
            this.$store.dispatch('currentPage', pg.current_page);
            this.$store.commit('PER_PAGE', pg.per_page);
            this.$store.commit('PAGE_TOTAL', pg.total);
            this.$store.dispatch('printreports','/printreports');
            this.$store.dispatch('freighttypes','/freighttypes');
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
      logicRowClick(row){
        this.cityData = row['cityInfos'].data;
        this.logicRow =row;
      },
      /*新增*/
      addLogic(){
        this.addLogicMask = true;
        this.cityIndex = 'index0';
        Object.assign(this.addLogicForm,this.$options.data().addLogicForm);
        Object.assign(this.addCityVal,this.$options.data().addCityVal);
      },
      addCityCName({row,rowIndex}){row.index = rowIndex},
      addCityRClick(row){
        this.cityIndex = `index${row.index}`;
      },
      addCityDtl(index){
        this.addCityVal.splice(index,1);
        this.$message({
          message:'删除城市信息成功',
          type:'success'
        })
      },
      addCityInfo(){
        let cityInfo = {
          provinces: [],
          province: '',
          city: '',
          district: '',
          address: '',
          phone: '',
          price: '',
          weight_univalent: '',
          expected_days: '',
          route: '',
          is_free_shipping: false,
          remark: ''
        };
        if(this.addLogicMask){
          this.addCityVal.push(cityInfo);
          this.cityIndex = 'index'+ (this.addCityVal.length-1);
        }else{
          this.updateCityVal.push(cityInfo);
          this.updateIndex = 'index'+ (this.updateCityVal.length-1);
        }
      },
      addConfirm(){
        this.addCityVal.map((item,index)=>{
          if(item.provinces.length>0){
            item.province = CodeToText[item.provinces[0]];
            item.city = CodeToText[item.provinces[1]];
            item.district = CodeToText[item.provinces[2]];
          }
          for(let i in item){
            if(item[i]===''){
              this.addCityVal.splice(index,1);
            }
          }
        });
        let data = {
          code: this.addLogicForm.code,
          name: this.addLogicForm.name,
          report_id: this.addLogicForm.report_id,
          expected_days: this.addLogicForm.expected_days,
          phone: this.addLogicForm.phone,
          address: this.addLogicForm.address,
          freight_type_id: this.addLogicForm.freight_type_id,
          remark: this.addLogicForm.remark,
          status: this.addLogicForm.status,
          city_infos: this.addCityVal
        };
        this.$post(this.urls.logistics,data)
          .then(()=>{
            this.addLogicMask = false;
            this.refresh();
            this.$message({
              message: '添加成功',
              type: 'success'
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
      addCancel(){
        this.addLogicMask = false;
        this.$message({
          message:'取消添加',
          type: 'info'
        })
      },
      /*修改*/
      updateLogic(){
        this.updateLogicMask = true;
        let id;
        id=this.currentId?this.currentId:this.logicRow.id;
        this.$fetch(this.urls.logistics+'/'+id,{include:'cityInfos.logistics,printReport,freightType'})
          .then(res=>{
            this.updateLogicForm = {
              code: res.code,
              name: res.name,
              report_id: res.report_id,
              expected_days: res.expected_days,
              phone: res.phone,
              address: res.address,
              freight_type_id: res.freight_type_id,
              remark: res.remark,
              status: res.status
            };
            res['cityInfos']['data'].map(item=>{
              this.$set(item,'provinces',[TextToCode[item.province].code,TextToCode[item.province][item.city].code,TextToCode[item.province][item.city][item.district].code])
            });
            this.updateCityVal = res['cityInfos']['data'];
          },err=>{})
      },
      updateCityCName({row,rowIndex}){row.index = rowIndex},
      updateCityRClick(row){
        this.updateIndex =  `index${row.index}`;
      },
      updateCityDtl(row,index){
        if(row.id){
          this.$del(this.urls.cityinfos+'/'+row.id)
            .then(()=>{
              this.updateCityVal.splice(index,1);
              this.$message({
                message: '删除城市信息成功',
                type: 'success'
              })
            })
        }else{
          this.updateCityVal.splice(index,1);
          this.$message({
            message: '删除城市信息成功',
            type: 'success'
          })
        }
      },
      updateConfirm(){
        let id;
        id=this.currentId?this.currentId:this.logicRow.id;
        this.updateCityVal.map((item,index)=>{
          item.province = CodeToText[item.provinces[0]];
          item.city = CodeToText[item.provinces[1]];
          item.district = CodeToText[item.provinces[2]];
          for(let i in item){
            if(item[i]==='') {
              this.updateCityVal.splice(index, 1);
            }
          }
        });
        let data = {
          code: this.updateLogicForm.code,
          name: this.updateLogicForm.name,
          report_id: this.updateLogicForm.report_id,
          expected_days: this.updateLogicForm.expected_days,
          phone: this.updateLogicForm.phone,
          address: this.updateLogicForm.address,
          freight_type_id: this.updateLogicForm.freight_type_id,
          remark: this.updateLogicForm.remark,
          status: this.updateLogicForm.status,
          city_infos: this.updateCityVal
        };
        this.$patch(this.urls.logistics+'/'+id,data)
          .then(()=>{
            this.updateLogicMask = false;
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
        this.updateLogicMask = false;
        this.$message({
          message:'取消修改',
          type: 'info'
        })
      },
      /*分页*/
      handlePagChg(page){
        this.$fetch(this.urls.logistics+'?page='+page,{include:'cityInfos.logistics,printReport,freightType'})
          .then(res=>{
            this.logisticsData = res.data;
          })
      },
      /*删除*/
      delSingle(row,e){
        this.showDel = true;
        $('.el-popper').css({left: e.x - 100 + 'px', top: e.y - 125 + 'px'});
        this.delId = row.id;
        this.delUrl = row['cityInfos']?this.urls.logistics:this.urls.cityinfos;
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
            this.$del(this.urls.logistics, {ids: this.ids})
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
                  this.$message.error(str);
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
      refresh() {
        this.loading = true;
        this.fetchLogData();
      },
    },
    mounted() {
      this.fetchLogData();
      this.$store.dispatch('setOpt', this.newOpt);
      let that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt', that.newOpt);
      });
    }
  }
</script>

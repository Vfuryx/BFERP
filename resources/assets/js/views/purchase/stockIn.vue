<template>
    <div>
        <div class="searchBox">
            <span>
                <label>入库单号</label>
                <el-input v-model="searchBox.goodsName" clearable @keyup.enter.native="getData"></el-input>
            </span>
            <span>
                <label>外部单号</label>
                <el-input v-model="searchBox.goodsName" clearable @keyup.enter.native="getData"></el-input>
            </span>
            <span>
                <label>商品编码</label>
                <el-input v-model="searchBox.goodsName" clearable @keyup.enter.native="getData"></el-input>
            </span>
            <span>
                <label>规格编码</label>
                <el-input v-model="searchBox.goodsName" clearable @keyup.enter.native="getData"></el-input>
            </span>
            <span>
                <label>采购单号</label>
                <el-input v-model="searchBox.goodsName" clearable @keyup.enter.native="getData"></el-input>
            </span>
            <span>
                <label>入库仓库</label>
                <el-select v-model="searchBox.shopNames" clearable placeholder="请选择">
                    <el-option v-for="item in searchBox.shopNames" :key="item.value" :label="item.label"
                               :value="item.value"></el-option>
                </el-select>
            </span>
        </div>
        <el-tabs v-model="topActiveName" @tab-click="clickTopTabs">
            <el-tab-pane label="新建" name="0">
                <!-- <light-table :listData="newData"
                            :tableHead="topTabsHead" @editSave="editSave" @handleEdit="handleEdit" @del="del" :loading="newLoading" :currentIndex="currentIndex" @edit="edit" @editCancel="editCancel" :nEditInRow="nEditInRow"></light-table>-->
            </el-tab-pane>
            <el-tab-pane label="已提交" name="1">
               <!-- <light-table :listData="partData"
                             :tableHead="topTabsHead" @editSave="editSave" @handleEdit="handleEdit" @del="del" :loading="partLoading" :currentIndex="currentIndex" @edit="edit" @editCancel="editCancel" :nEditInRow="nEditInRow"></light-table>-->
            </el-tab-pane>
            <el-tab-pane label="已入库" name="2">
                <!-- <light-table :listData="finishData"
                            :tableHead="topTabsHead" @editSave="editSave" @handleEdit="handleEdit" @del="del" :loading="finishLoading" :currentIndex="currentIndex" @edit="edit" @editCancel="editCancel" :nEditInRow="nEditInRow"></light-table>-->
            </el-tab-pane>
        </el-tabs>
        <Pagination :page-url="stockInUrl"></Pagination>
        <!--新建入库单-->
        <el-dialog title="新建入库单" :visible.sync="addStockMask" :class="{'more-forms':moreForms}">
            <el-button type="text">基本信息</el-button>
            <add-new :rule-form="addStockFormVal" :rules="addStockRules" :add-arr="addStockFormHead" :onlyInputs="true"></add-new>
            <el-button type="text">入库明细</el-button>
            <el-table :data="addStockVal" fit highlight-current-row  :height="300" :row-class-name="addStockRowClassName" @cell-click="addCellClick" @current-change="addCurChg">
                <el-table-column v-for="(item,index) in addStockHead" :label="item.label" align="center" :width="item.width" :key="index">
                    <template slot-scope="scope">
                       <!-- <span v-if="item.type=='select'">
                            <span v-if="scope.row[item.prop]==''"></span>
                            <span v-else-if="typeof scope.row[item.prop] =='object' && item.nmProp">

                                 {{scope.row[item.prop][item.inProp]}}
                            </span>
                            <span v-else>
                                   <span v-for="(list,index) in resData[item.stateVal]" :key="index">
                                       <span v-if="item.inProp">
                                          <span v-if="list.id==scope.row[item.prop][item.inProp]">
                                          {{list.name?list.name:''}}
                                          </span>
                                       </span>
                                       <span v-else>
                                          <span v-if="list.id==scope.row[item.prop]">
                                    {{list.name?list.name:''}}
                                </span>
                                       </span>
                            </span>
                            </span>
                        </span>
                        <span v-else>
                            {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                        </span>-->
                    </template>
                </el-table-column>
                <el-table-column v-for="each in addStockEditHead" :label="each.label" align="center" :width="each.width" :key="each.inProp">
                    <template slot-scope="scope">
                       <!-- <span v-if="addStockIndex =='index'+scope.$index">
                            <span v-if="each.type=='number'">
                                <el-input size="small" type="number" v-model="specDtlInfo[each.inProp]" :placeholder="each.holder" @change="handleEdit"></el-input>
                            </span>
                            <span v-else-if="each.type == 'textarea'">
                                      <el-input type="textarea" size="small" v-model="specDtlInfo[each.inProp]" :placeholder="each.holder" @change="handleEdit"></el-input>
                                </span>
                        </span>
                        <span v-else>
                            &lt;!&ndash;全是number类型和textarea&ndash;&gt;
                           &lt;!&ndash; <span v-if="each.type=='select'">
                                <span v-for="list in suppliers" :key="list.id">
                                           <span v-if="each.inProp">
                                              <span v-if="list.id==specDtlInfo[each.inProp]">
                                              {{list.name}}
                                              </span>
                                           </span>
                            </span>
                        </span>
                            <span v-else>
                                 {{specDtlInfo[each.inProp]}}
                             </span>&ndash;&gt;
                        </span>-->
                    </template>
                </el-table-column>
                <el-table-column label="状态" width="100">
                    <template slot-scope="scope">
                        {{"新建"}}
                    </template>
                </el-table-column>
                <el-table-column label="操作" width="150" align="center" fixed="right">
                    <template slot-scope="scope">
                        <span v-if="purDtlIndex=='index'+scope.$index">
                            <el-button size="mini" @click="purDtlSave(scope.row,scope.$index)">保存</el-button>
                            <el-button size="mini" @click="purDtlCancel">取消
                            </el-button>
                        </span>
                        <span v-else>
                                 <el-button size="mini" @click="editPurDtl(scope.row,scope.$index)">编辑</el-button>
                            <el-button size="mini" type="danger" @click="delPurDtl(scope.row,$event,scope.$index)">删除</el-button>
                        </span>
                    </template>
                </el-table-column>
            </el-table>
            <div slot="footer" class="dialog-footer clearfix">
                <div style="float: left">
                    <el-button type="primary" @click="addProDtl">增加明细</el-button>
                </div>
                <div style="float: right">
                    <el-button type="primary" @click="">确定</el-button>
                    <el-button @click="">取消</el-button>
                </div>
            </div>
        </el-dialog>
        <!--商品明细-->
        <el-dialog title="商品明细" :visible.sync="proDtlMask" :class="{'more-forms':moreForms}">
            <div class="searchBox">
                <span>
                    <label>商品编码</label>
                    <el-input v-model="searchBox.vip_name" clearable></el-input>
                </span>
                <el-button type="primary">查询</el-button>
                <el-button type="primary">导出</el-button>
                <el-button type="primary">自动填充</el-button>
            </div>
            <el-table :data="proDtlData"  fit highlight-current-row type="index" :height="500" :row-class-name="proDtlCName" @row-click="proDtlRow" @current-change="proDtlCurChg">
                <el-table-column v-for="(item,index) in proDtlHead" :label="item.label" align="center" :width="item.width" :key="index">
                    <template slot-scope="scope">
                        <span v-if="item.type=='select'">
                            <span v-if="scope.row[item.prop]==''"></span>
                            <span v-else-if="typeof scope.row[item.prop] =='object' && item.nmProp">

                                 {{scope.row[item.prop][item.nmProp]}}
                            </span>
                            <span v-else>
                                   <span v-for="(list,index) in resData[item.stateVal]" :key="index">
                                       <span v-if="item.inProp">
                                          <span v-if="list.id==scope.row[item.prop][item.inProp]">
                                          {{list.name?list.name:''}}
                                          </span>
                                       </span>
                                       <span v-else>
                                          <span v-if="list.id==scope.row[item.prop]">
                                    {{list.name?list.name:''}}
                                </span>
                                       </span>
                            </span>
                            </span>
                        </span>
                        <span v-else>
                            {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                        </span>
                    </template>
                </el-table-column>
                <el-table-column v-for="each in proDtlEditHead" :label="each.label" align="center" :width="each.width" :key="each.inProp" fixed="right">
                    <template slot-scope="scope">
                        <span v-if="proDtlIndex =='index'+scope.$index">
                            <span v-if="each.type=='number'">
                                <el-input size="small" type="number" v-model="specDtlInfo[each.inProp]" :placeholder="each.holder" @change="handleEdit"></el-input>
                            </span>
                        </span>
                        <span v-else>
                             {{specDtlInfo[each.inProp]}}
                        </span>
                    </template>
                </el-table-column>
            </el-table>
            <!--底部操作按钮-->
            <div slot="footer" class="dialog-footer clearfix">
                <div style="float: right">
                    <el-button type="primary" @click="confirmAddProDtl">添加</el-button>
                    <el-button @click="cancelAddProDtl">关闭</el-button>
                </div>
            </div>
        </el-dialog>
        <!--底部tabs-->
        <el-tabs v-model="btmActiveName" @tab-click="clickBtmTabs">
            <el-tab-pane label="入库单明细" name="0">
                入库单明细
            </el-tab-pane>
            <el-tab-pane label="入库图片" name="1">
                入库图片
            </el-tab-pane>
        </el-tabs>
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
            ent: this.edit,
          },
          {
            cnt: '删除',
            icon: 'bf-del',
            ent: this.test
          },
          {
            cnt: '提交',
            icon: 'bf-submit',
            ent: this.test,
            nClick: false
          },
          {
            cnt: '审核',
            icon: 'bf-audit',
            ent: this.test,
            nClick: false
          },
          {
            cnt: '退审',
            icon: 'bf-auditfaild',
            ent: this.test,
            nClick: false
          },
          {
            cnt: '导出',
            icon: 'bf-out',
            ent: this.test
          },
          {
            cnt: '打印',
            icon: 'bf-printer',
            ent: this.test
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.test
          }
        ],
        searchBox: {
          goodsName: '',
          shopNames: '',
          vip_name:''
        },
        stockInUrl:'/stockins',
        topActiveName:'0',
        newLoading: true,
        partLoading:true,
        finishLoading: true,
        newData:[],
        partData:[],
        finishData:[],
        btmActiveName: '0',
        loading: false,
        currentIndex:'',
        moreForms: true,
        // getsInfo:[],
        nEditInRow:false,
        // topTabsUrl:[],
        topTabsHead:[
          {
            label: '入库单号',
            width: '250',
            prop: '',
            type: 'text',
          },
          {
            label: '外部单号',
            width: '200',
            prop: '',
            type: 'text',
          },
          {
            label: '入库仓库',
            width: '150',
            prop: '',
            type: 'text',
          },
          {
            label: '供应商',
            width: '150',
            prop: '',
            type: 'text',
          },
          {
            label: '入库类型',
            width: '160',
            prop: '',
            type: 'text',
          },
          {
            label: '创建人',
            width: '160',
            prop: '',
            type: 'text',
          },
          {
            label: '创建时间',
            width: '250',
            prop: '',
            type: 'text',
          },
          {
            label: '提交状态',
            width: '150',
            prop: '',
            type: 'text',
          },
          {
            label: '入库状态',
            width: '150',
            prop: '',
            type: 'text',
          },
          {
            label: '开单时间',
            width: '230',
            prop: '',
            type: 'text',
          },
        ],
        topTabsVal:[],
        stockInDtlHead:[
          {
            label: '采购单号',
            width: '230',
            prop: '',
            type: 'text',
          },
          {
            label: '店铺',
            width: '230',
            prop: '',
            type: 'text',
          },
          {
            label: '商品编码',
            width: '180',
            prop: '',
            type: 'text',
          },
          {
            label: '商品简称',
            width: '160',
            prop: '',
            type: 'text',
          },
          {
            label: '供应商',
            width: '160',
            prop: '',
            inProp:'',
            type: 'select',
          },
          {
            label: '规格编码',
            width: '150',
            prop: '',
            type: 'text',
          },
          {
            label: '包件数',
            width: '150',
            prop: '',
            type: 'number',
          },
          {
            label: '规格名称',
            width: '260',
            prop: '',
            type: 'text',
          },
          {
            label: '入库数量',
            width: '120',
            prop: '',
            type: 'number',
          },
          {
            label: '采购成本',
            width: '120',
            prop: '',
            type: 'number',
          },
          {
            label: '仓库成本',
            width: '120',
            prop: '',
            type: 'number',
          },
          {
            label: '折扣',
            width: '120',
            prop: '',
            type: 'number',
          },
          {
            label: '总额',
            width: '120',
            prop: '',
            type: 'number',
          },
          {
            label: '备注',
            width: '120',
            prop: '',
            type: 'text',
          }
        ],
        stockInDtlVal:[],
        /*新增*/
        addStockMask:false,
        addStockFormVal:{
          warehouse_id:'',
          stock_in_types_id:'',
          stock_in_details:[]
        },
        addStockRules:{
          warehouse_id: [
            {required: true, message: '入库仓库必选', trigger: 'blur'},
          ],
          stock_in_types_id: [
            {required: true, message: '入库类型必选', trigger: 'blur'},
          ],
        },
        addStockFormHead:[
          {
            label: '入库单号',
            prop: '',
            holder: '系统自动生成',
            type: 'text',
            addChgAble: true
          },
         /* {
            label: '外部单号',
            prop: '',
            holder: '请输入外部单号',
            type: 'text',
          },*/
          {
            label: '入库仓库',
            prop: 'warehouse_id',
            holder: '请选择入库仓库',
            type: 'select',
          },
          {
            label: '入库类型',
            prop: 'stock_in_types_id',
            holder: '请选择入库类型',
            type: 'select',
          },
        /*  {
            label: '开单时间',
            prop: '',
            holder: '',
            type: 'datepicker',
          },*/
        ],
        addStockVal:[],
        addStockHead:[
          {
            label: '采购单号',
            width: '120',
            prop: '',
            inProp: "",
            type: 'text',
          },
          {
            label: '商品编码',
            width: '120',
            prop: "",
            inProp:'',
            type: 'text',
          },
          {
            label: '规格编码',
            width: '120',
            prop: "",
            inProp:'',
            type: 'text',
          }, {
            label: '商品简称',
            width: '120',
            prop: '',
            inProp: "",
            type: 'text',
          },
          {
            label: '规格名称',
            width: '150',
            prop: "",
            inProp:'',
            type: 'text',
          },
          {
            label: '包件数',
            width: '120',
            prop: "",
            inProp:'',
            type: 'number',
          },
          {
            label: '供应商',
            width: '120',
            prop: '',
            inProp: "",
            type: 'select',
          },
          {
            label: '折扣',
            width: '120',
            prop: "",
            inProp:'',
            type: 'number',
          },
          {
            label: '采购数',
            width: '120',
            prop: "",
            inProp:'',
            type: 'number',
          },
          {
            label: '已入库数',
            width: '120',
            prop: "",
            inProp:'',
            type: 'number',
          },
          {
            label: '总额',
            width: '120',
            prop: "",
            inProp:'',
            type: 'number',
          },
          {
            label: '备注',
            width: '120',
            prop: "",
            inProp:'',
            type: 'textarea',
          }
        ],
        addStockEditHead:[
          {
            label: '采购成本',
            width: '120',
            prop: "",
            inProp:'',
            type: 'number',
          },
          {
            label: '采购运费',
            width: '120',
            prop: "",
            inProp:'',
            type: 'number',
          },
          {
            label: '仓库成本',
            width: '120',
            prop: "",
            inProp:'',
            type: 'number',
          },
          {
            label: '入库数量',
            width: '120',
            prop: "",
            inProp:'',
            type: 'number',
          }
        ],
        proDtlMask: false,
        proDtlData:[],
        proDtlIndex:'',
        proDtlHead:[
          {
            label: '采购单号',
            width: '250',
            prop: '',
            inProp: "",
            type: 'text'
          },
          {
            label: '店铺',
            width: '160',
            prop: '',
            inProp: "",
            type: 'select'
          },
          {
            label: '客户名称',
            width: '120',
            prop: '',
            inProp: "",
            type: 'text'
          },
          {
            label: '商品编码',
            width: '200',
            prop: '',
            inProp: "",
            type: 'text'
          },
          {
            label: '商品简称',
            width: '160',
            prop: '',
            inProp: "",
            type: 'text'
          },
          {
            label: '规格名称',
            width: '280',
            prop: '',
            inProp: "",
            type: 'text'
          },
          {
            label: '包件数',
            width: '100',
            prop: '',
            inProp: "",
            type: 'number'
          },
          {
            label: '供应商',
            width: '120',
            prop: '',
            inProp: "",
            type: 'select'
          },
          {
            label: '折扣',
            width: '100',
            prop: '',
            inProp: "",
            type: 'number'
          },
          {
            label: '采购数',
            width: '100',
            prop: '',
            inProp: "",
            type: 'number'
          },
          {
            label: '未入库采购数',
            width: '160',
            prop: '',
            inProp: "",
            type: 'number'
          },
          {
            label: '已入库数',
            width: '120',
            prop: '',
            inProp: "",
            type: 'number'
          },
          /*计算属性*/
          {
            label: '总额',
            width: '120',
            prop: '',
            inProp: "",
            type: 'number'
          },
          {
            label: '最大入库数',
            width: '150',
            prop: '',
            inProp: "",
            type: 'number'
          },
          {
            label: '创建时间',
            width: '220',
            prop: '',
            inProp: "",
            type: 'text'
          }
        ],
        proDtlEditHead:[
          {
            label: '采购成本',
            width: '160',
            prop: '',
            inProp: "",
            type: 'number'
          },
          {
            label: '采购运费',
            width: '160',
            prop: '',
            inProp: "",
            type: 'number'
          },
         /* {
            label: '仓库成本',
            width: '160',
            prop: '',
            inProp: "",
            type: 'number'
          },*/
          {
            label: '入库数量',
            width: '120',
            prop: '',
            inProp: "",
            type: 'number'
          },
        ],
        /*新增*/
        addStockIndex:'',
        /*库存*/
        stockUrl: '/stocks',
      }
    },
    computed:{
      resData:{
        get:function(){
          return this.$store.state.responseData
        },
        set:function(){}
      }
    },
    methods:{
      test(){
        console.log(1);
      },
      /*顶部tabs切换*/
      clickTopTabs(){
        // this.getData();
      },
      getData() {
        let index = this.topActiveName-0;
        switch(index){
          case 0:
            this.newOpt[3].nClick = false;
            this.newOpt[4].nClick = true;
            this.newOpt[5].nClick = true;
            /*purchase_status 变量名待替换*/
            this.$fetch(this.stockInUrl,{purchase_status:'new'})
              .then(res => {
                this.newLoading = false;
                this.newData = res.data;
                let pg = res.meta.pagination;
                this.$store.dispatch('currentPage', pg.current_page);
                this.$store.commit('PER_PAGE', pg.per_page);
                this.$store.commit('PAGE_TOTAL', pg.total);
                /*仓库、仓库类型*/
                // this.$store.dispatch('warehouses','/warehouses');
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
            this.newOpt[3].nClick = true;
            this.newOpt[4].nClick = false;
            this.newOpt[5].nClick = false;
            this.$fetch(this.stockInUrl,{purchase_status:'section'})
              .then(res => {
                this.partLoading = false;
                this.partData = res.data;
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
          case 2:
            this.newOpt[3].nClick = true;
            this.newOpt[4].nClick = true;
            this.newOpt[5].nClick = false;
            this.$fetch(this.stockInUrl,{purchase_status:'finish'})
              .then(res => {
                this.finishLoading = false;
                this.finishData = res.data;
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
            break
        }
        /* this.$fetch(this.purchasesUrl)
           .then(res => {
             console.log(res);
             /!* this.newLoading = false;
              this.getsInfo = res.data;
              this.getsInfo.map(item=>{
                if(item.purchase_status=="新建"){
                  this.newData.push(item);
                }else if(item.purchase_status=="部分完成"){
                  this.partData.push(item);
                }else{
                  this.readyData.push(item);
                }
              });
              this.newLoading = false;
              /!*let pg = res.meta.pagination;
              this.$store.dispatch('currentPage', pg.current_page);
              this.$store.commit('PER_PAGE', pg.per_page);
              this.$store.commit('PAGE_TOTAL', pg.total);*!/
              this.$store.dispatch('warehouses','/warehouses');*!/
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
           })*/
      },
      /*修改*/
      edit(){
        /*统一外部编辑*/

      },
      editSave(){},
      editCancel(){},
      handleEdit(){},
      /*删除*/
      del(){},
      /*底部tabs切换*/
      clickBtmTabs(){},
      /*新建入库单*/
      addNew(){
        this.addStockMask = true;
        /*数据初始化*/
        this.addStockFormVal = {

        };
        /*dispatch入库仓库和入库类型*/

      },
      /*新建入库增加明细*/
      addStockRowClassName({row,rowIndex}){
        row.index = rowIndex;
      },
      addCellClick(row){
        this.addStockIndex = 'index'+ row.index;
      },
      addCurChg(currentRow,oldCurrentRow){
        /*行切换时，保存数据*/
        if(oldCurrentRow){
          // this.addStockIndex = 'index'+ row.index;
        }
      },
      /*商品明细*/
      addProDtl(){
        /*明细数据初始化*/
        this.proDtlMask = true;
        /*请求商品明细信息*/
        this.$fetch(this.stockUrl)
          .then(res=>{
            console.log(res);
            this.proDtlData = res.data;
            // this.proDtlSpec.push(res.data[0]);
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
          });

      },
      proDtlCName({row,rowIndex}){
        row.index = rowIndex;
      },
      proDtlRow(row){
        /*行点击*/
        this.proDtlIndex = 'index'+row.index;
      },
      proDtlCurChg(currentRow,oldCurrentRow){
        /*行切换*/
        if(oldCurrentRow){

        }
      },
      confirmAddProDtl(){
        /*采购成本、采购运费读取默认值，但是可修改
        * 入库数量默认0，
        * 如果入库数量为0，提示请选择需要添加的数据
        * 如果入库数量大于最大入库数，提示请选择需要添加的数据
        * 总额=采购成本*入库数量
        * 否则提示添加成功，入库数量全部清空*/

        /*把当前的row拼接输入数据传给添加页面
        * 如果只点击一行，应该把该行数据存入另外数组
        * 一行就存入当前行，多行依序存入
        * */
        this.$message({
          message: '添加商品明细成功',
          type: 'success'
        })
      },
      cancelAddProDtl(){
        this.proDtlMask = false;
      },
    },
    mounted() {
      // this.getData();
      this.$store.dispatch('setOpt', this.newOpt);
      const that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt', that.newOpt);
      });
    }
  }
</script>
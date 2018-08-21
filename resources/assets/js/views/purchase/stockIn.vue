<template>
    <div>
        <!--查询-->
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

        <!--入库-->
        <el-tabs v-model="topActiveName" @tab-click="clickTopTabs">
            <el-tab-pane label="新建" name="0">
                <el-table :data="newData" fit
                          @selection-change="handleSelectionChange"
                          v-loading="newLoading"
                          height="300"
                          @row-click="stockRowClick"
                >
                    <el-table-column
                            type="selection"
                            width="95" align="center"
                            :checked="checkboxInit">
                    </el-table-column>
                    <el-table-column v-for="item in stockHead" :label="item.label" align="center" :width="item.width" :key="item.prop">
                        <template slot-scope="scope">
                            <span v-if="item.type=='checkbox'">
                                <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
                            </span>
                            <span v-else>
                                   <span v-if="scope.row[item.prop]">
                                     {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                                </span>
                            </span>
                        </template>
                    </el-table-column>
                    <el-table-column label="操作" width="90" align="center" fixed="right">
                        <template slot-scope="scope">
                            <el-button size="mini" type="danger" @click="delStock(scope.row,$event)">删除</el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-tab-pane>
            <el-tab-pane label="已提交" name="1">
                <el-table :data="partData" fit
                          @selection-change="handleSelectionChange"
                          v-loading="partLoading"
                          height="300"
                          @row-click="stockRowClick"
                >
                    <el-table-column
                            type="selection"
                            width="95" align="center"
                            :checked="checkboxInit">
                    </el-table-column>
                    <el-table-column v-for="item in stockHead" :label="item.label" align="center" :width="item.width" :key="item.prop">
                        <template slot-scope="scope">
                            <span v-if="item.type=='checkbox'">
                                <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
                            </span>
                            <span v-else>
                                   <span v-if="scope.row[item.prop]">
                                     {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                                </span>
                            </span>
                        </template>
                    </el-table-column>
                    <el-table-column label="操作" width="90" align="center" fixed="right">
                        <template slot-scope="scope">
                            <el-button size="mini" type="danger" @click="delStock(scope.row,$event)">删除</el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-tab-pane>
            <el-tab-pane label="已入库" name="2">
                <el-table :data="finishData" fit
                          @selection-change="handleSelectionChange"
                          v-loading="finishLoading"
                          height="300"
                          @row-click="stockRowClick"
                >
                    <el-table-column
                            type="selection"
                            width="95" align="center"
                            :checked="checkboxInit">
                    </el-table-column>
                    <el-table-column v-for="item in stockHead" :label="item.label" align="center" :width="item.width" :key="item.prop">
                        <template slot-scope="scope">
                            <span v-if="item.type=='checkbox'">
                                <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
                            </span>
                            <span v-else>
                                <span v-if="scope.row[item.prop]">
                                     {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                                </span>
                            </span>
                        </template>
                    </el-table-column>
                    <el-table-column label="操作" width="90" align="center" fixed="right">
                        <template slot-scope="scope">
                            <el-button size="mini" type="danger" @click="delStock(scope.row,$event)">删除</el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-tab-pane>
        </el-tabs>

        <!--页码-->
        <Pagination :page-url="stockInUrl"></Pagination>

        <!--底部tabs-->
        <el-tabs v-model="btmActiveName" @tab-click="clickBtmTabs">
            <el-tab-pane label="入库单明细" name="0">
                入库单明细
            </el-tab-pane>
            <el-tab-pane label="入库图片" name="1">
                入库图片
            </el-tab-pane>
        </el-tabs>

        <!--新建-->
        <el-dialog title="新建入库单" :visible.sync="addStockMask" :class="{'more-forms':moreForms}">
            <el-button type="text">基本信息</el-button>
            <add-new :rule-form="addStockFormVal" :rules="addStockFormRules" :add-arr="addStockFormHead" :onlyInputs="true"></add-new>
            <el-button type="text">入库明细</el-button>
            <el-table :data="addStockTabVal" fit  height="300" :row-class-name="addStockRCName" @row-click="addStockRClick">
                <!-- @current-change="addCurChg"-->
                <el-table-column v-for="(item,index) in addStockTabHead" :label="item.label" align="center" :width="item.width" :key="index">
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
                    <el-input v-model.trim="proQuery.commodity_code" clearable placeholder="请输入商品编码" @keyup.enter.native="proQueryClick"></el-input>
                </span>
                <el-button type="primary" @click="proQueryClick">查询</el-button>
                <el-button type="primary" @click="proExport">导出</el-button>
                <el-button type="primary" @click="proAutoFill">自动填充</el-button>
            </div>
            <el-table :data="proDtlVal" fit height="230" :row-class-name="proDtlCName" @row-click="proDtlRClick">
                <el-table-column v-for="item in proDtlHead" :label="item.label" align="center" :width="item.width" :key="item.label">
                    <template slot-scope="scope">
                        <span v-if="item.prop=='extraVal'">
                            <span v-if="proDtlRIndex == 'index'+scope.$index">
                                 <el-input size="small" type="number" v-model.trim="scope.row[item.prop][item.inProp]" :placeholder="item.holder" @change="compValChg"></el-input>
                            </span>
                            <span v-else>
                                {{scope.row[item.prop][item.inProp]}}
                            </span>
                        </span>
                        <span v-else-if="item.prop">
                            <span v-if="item.type=='checkbox'">
                         <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
                     </span>
                            <span v-else-if="item.type=='select'">
                                 <span v-for="list in resData[item.stateVal]" :key="list.id">
                                    <span v-if="list.id==scope.row[item.prop][item.inProp]">
                                        {{list.name?list.name:list.title}}
                                    </span>
                                </span>
                            </span>
                            <span v-else-if="item.type == 'textarea'">
                                          <el-input type="textarea" size="small" v-model.trim="scope.row[item.prop][item.inProp]" :placeholder="item.holder" @change="compValChg"></el-input>
                                    </span>
                            <span v-else>
                             {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                        </span>
                        </span>
                    </template>
                </el-table-column>
            </el-table>
            <div slot="footer" class="dialog-footer">
                <el-button type="primary" @click="confirmAddProDtl">确定</el-button>
                <el-button @click="cancelAddProDtl">取消</el-button>
            </div>
        </el-dialog>
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
            ent: this.addNewStock
          },
          {
            cnt: '修改',
            icon: 'bf-change',
            ent: this.updateStock,
            nClick: false
          },
          {
            cnt: '删除',
            icon: 'bf-del',
            ent: this.delMore
          },
          {
            cnt: '提交',
            icon: 'bf-submit',
            ent: this.doCommit,
            nClick: false
          },
          {
            cnt: '审核',
            icon: 'bf-audit',
            ent: this.doAudit,
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
            ent: this.doPrinter,
            nClick: false
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
        topTabsVal:[],
        btmTableHead:[
          [
            {
              label: '子件图片',
              width: '120',
              prop: '',
              type: 'img',
            },
            {
              label: '采购单号',
              width: '180',
              prop: '',
              type: 'text',
            },
            {
              label: '合同编号',
              width: '180',
              prop: '',
              type: 'text',
            },
            {
              label: '店铺',
              width: '160',
              prop: '',
              type: 'text',
            },
            {
              label: '商品编码',
              width: '160',
              prop: '',
              inProp:'',
              type: 'select',
            },
            {
              label: '商品简称',
              width: '150',
              prop: '',
              type: 'text',
            },
            {
              label: '供应商',
              width: '150',
              prop: '',
              type: 'number',
            },
            {
              label: '子件编码',
              width: '260',
              prop: '',
              type: 'text',
            },
            {
              label: '包件数',
              width: '120',
              prop: '',
              type: 'number',
            },
            {
              label: '子件名称',
              width: '120',
              prop: '',
              type: 'number',
            },
            {
              label: '色号',
              width: '120',
              prop: '',
              type: 'number',
            },
            {
              label: '入库数量',
              width: '120',
              prop: 'stock_in_quantity',
              type: 'number',
            },
            {
              label: '采购成本',
              width: '120',
              prop: '',
              type: 'number',
            },
            {
              label: '采购运费',
              width: '120',
              prop: '',
              type: 'text',
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
              prop: 'total_fee',
              type: 'number',
            },
            {
              label: '备注',
              width: '120',
              prop: 'remark',
              type: 'textarea',
            }
          ],
          []
        ],
       /* addStockFormHead:[
          {
            label: '入库单号',
            prop: '',
            holder: '系统自动生成',
            type: 'text',
            addChgAble: true
          },
         /!* {
            label: '外部单号',
            prop: '',
            holder: '请输入外部单号',
            type: 'text',
          },*!/
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
        /!*  {
            label: '开单时间',
            prop: '',
            holder: '',
            type: 'datepicker',
          },*!/
        ],*/
       /* addStockHead:[
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
        ],*/
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
        proDtlData:[],
        proDtlIndex:'',
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
        /*获取数据*/
        checkboxInit: false,
        stockHead:[
          {
            label: '入库单号',
            width: '200',
            prop: 'stock_in_no',
            type: 'text',
          },
          {
            label: '入库仓库',
            width: '130',
            prop: 'warehouse',
            inProp: 'name',
            type: 'text'
          },
          {
            label: '入库类型',
            width: '130',
            prop: 'stock_in_type',
            inProp: 'name',
            type: 'text'
          },
          {
            label: '创建人',
            width: '130',
            prop: 'creator',
            type: 'text',
          },
          {
            label: '提交人',
            width: '130',
            prop: 'submitter',
            type: 'text',
          },
          {
            label: '审核人',
            width: '130',
            prop: 'auditor',
            type: 'text',
          },
          {
            label: '入库人',
            width: '130',
            prop: 'warehouer',
            type: 'text',
          },
          {
            label: '创建时间',
            width: '200',
            prop: 'created_at',
            type: 'text',
          },
          {
            label: '提交时间',
            width: '220',
            prop: 'submit_at',
            inProp: 'date',
            type: 'text'
          },
          {
            label: '提交状态',
            width: '120',
            prop: 'is_submit',
            type: 'checkbox',
          },
          {
            label: '入库状态',
            width: '120',
            prop: 'is_stock_in',
            type: 'checkbox',
          },
          {
            label: '打印状态',
            width: '120',
            prop: 'is_print',
            type: 'checkbox',
          },
          {
            label: '审核状态',
            width: '120',
            prop: 'is_audit',
            type: 'checkbox',
          },
          {
            label: '入库时间',
            width: '220',
            prop: 'stock_in_at',
            inProp: 'date',
            type: 'text'
          },
          {
            label: '打印时间',
            width: '220',
            prop: 'print_at',
            inProp: 'date',
            type: 'text',
          },
          {
            label: '审核时间',
            width: '220',
            prop: 'audit_at',
            inProp: 'date',
            type: 'text'
          }
        ],
        stockRow: {},
        /*新建*/
        addStockMask:false,
        addStockFormHead:[
          {
            label: '入库单号',
            prop: 'purchase_order_no',
            holder: '系统自动生成',
            type: 'text',
            addChgAble: true
          },
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
          }
        ],
        addStockFormVal:{
          warehouse_id:'',
          stock_in_types_id:'',
          stock_in_details:[]
        },
        addStockFormRules:{
          warehouse_id: [
            {required: true, message: '入库仓库必选', trigger: 'blur'},
          ],
          stock_in_types_id: [
            {required: true, message: '入库类型必选', trigger: 'blur'},
          ],
        },
        addStockTabVal:[],
        addStockTabHead:[
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
        /*商品明细*/
        proDtlMask: false,
        proQuery:{
          commodity_code: ''
        },
        proDtlVal: [],
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
            width: '160',
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
            label: '子件编码',
            width: '160',
            prop: '',
            inProp: "",
            type: 'text'
          },
          {
            label: '子件名称',
            width: '180',
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
            label: '采购成本',
            width: '120',
            prop: '',
            inProp: "",
            type: 'number'
          },
          {
            label: '采购运费',
            width: '120',
            prop: '',
            inProp: "",
            type: 'number'
          },
          {
            label: '仓库成本',
            width: '120',
            prop: '',
            inProp: "",
            type: 'number'
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
          {
            label: '总额',
            width: '120',
            prop: '',
            inProp: "",
            type: 'number'
          },
          {
            label: '入库数量',
            width: '120',
            prop: 'extraVal',
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
        proDtlRIndex: '',
        /*批量删除*/
        multipleSelection:[],
        hkey_path:"HKEY_CURRENT_USER\\Software\\Microsoft\\Internet Explorer\\PageSetup\\",

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
    methods:{
      test(){
        console.log(1);
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
      /*获取数据*/
      clickTopTabs(){this.fetchStockData();},
      fetchStockData() {
        let index = this.topActiveName-0;
        switch(index){
          case 0:
            this.newOpt[3].nClick = false;
            this.newOpt[4].nClick = true;
            this.newOpt[5].nClick = true;
            this.$fetch(this.urls.stockins,{status: true})
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
            this.$fetch(this.urls.stockins,{is_submit: true})
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
            this.$fetch(this.urls.stockins,{is_stock_in: true})
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
      stockRowClick(row){
        this.stockRow = row;
        this.newOpt[1].nClick = row['is_change']?true:false;
        this.newOpt[3].nClick = row['is_submit']?true:false;
        this.newOpt[4].nClick = row['is_audit']?true:false;
        this.newOpt[7].nClick = row['is_print']?true:false;
        // this.newOpt[3].nClick = row['is_submit']?true:false;
      },
      /*新增*/
      addNewStock(){
        this.addStockMask = true;
      },
      addStockRCName({row,rowIndex}){row.index = rowIndex},
      addStockRClick(){
        row.index = rowIndex;
      },
      addProDtl(){this.addProDtl = true;},
      proQueryClick(){},
      proExport(){},
      proAutoFill(){},
      proDtlCName({row,rowIndex}){row.index = rowIndex},
      proDtlRClick(row){
        this.proDtlRIndex =row.index;
      },
      confirmAddProDtl(){},
      cancelAddProDtl(){
        this.proDtlMask = false;
      },
      /*修改*/
      updateStock(){},
      /*删除单条*/
      delStock(row,e){
        this.showDel = true;
        $('.el-popper').css({left: e.x - 100 + 'px', top: e.y - 125 + 'px'});
        this.delId = row.id;
        if(row.purchase_order_no){
          this.delUrl = this.urls.purchases;
        }else if(row.purchases_id){
          this.delUrl = this.urls.purchaselists;
        }else {
          this.delUrl = this.urls.purchasedetails;
        }
      },
      confirmD(url,id) {
        this.$del(url + '/' + id)
          .then(() => {
            this.$message({
              message: '删除成功',
              type: 'success'
            });
            this.showDel = false;
            this.refresh();
            if(this.newData[0] && this.newData[0].purchase_lists[0]){
              this.purListVal = this.newData[0].purchase_lists[0];
              this.purDetailsVal = this.newData[0].purchase_lists[0].purchase_details;
            }
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
      cancelD() {
        this.showDel = false;
        this.$message({
          message: '取消删除',
          type: 'info'
        });
      },
      /*批量删除*/
      handleSelectionChange(val){
        if (val.length != 0) {
          this.updateId = val[0].id;
        } else {
          this.updateId = '';
        }
        this.multipleSelection = val;
        let del = [];
        this.multipleSelection.forEach(selectedItem => {
          del.push(selectedItem.id);
        });
        this.delArr = del.join(',');
      },
      delMore() {
        if(this.newOpt[2].nClick){
          return
        }else{
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
              this.$del(this.urls.purchases, {ids: this.delArr})
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
        }
      },
      /*刷新*/
      refresh() {
        this.newLoading = true;
        this.fetchStockData();
      },
      /*提交*/
      doCommit(){
        if (this.newOpt[3].nClick) {
          return
        } else {
          if (this.multipleSelection.length == 0) {
            this.$message({
              message: '没有选择要提交的数据',
              type: 'warning'
            });
            return
          } else if (this.multipleSelection.length >= 2) {
            this.$message({
              message: '只能修改单条数据',
              type: 'warning'
            });
            return
          }else{
            this.$put(this.urls.stockins+'/'+this.stockRow.id+'/submit')
              .then(()=>{
                this.$message({
                  message: '提交成功!',
                  type: 'success'
                })
                this.refresh();
              },err=>{
                this.$message.error(err.response.data.message);
              })
          }
        }
      },
      /*打印*/
      doPrinter(){
        if(!this.newOpt[7].nClick){
          this.$put(this.urls.stockins+'/'+this.stockRow.id+'/print')
            .then(()=>{
              this.printBtn();
              this.$message({
                message: '打印成功!',
                type: 'success'
              });
              this.refresh();
            },err=>{
              this.$message.error(err.response.data.message);
            })
        }
      },
      printBtn() {
        this.remove_ie_header_and_footer();
        let subOutputRankPrint = document.getElementById('subOutputRank-print');
        let newContent =subOutputRankPrint.innerHTML;
        let oldContent = document.body.innerHTML;
        document.body.innerHTML = newContent;
        window.print();
        window.location.reload();
        document.body.innerHTML = oldContent;
        return false;
      },
      remove_ie_header_and_footer() {
        try {
          let RegWsh = new ActiveXObject("WScript.Shell");
          RegWsh.RegWrite(this.hkey_path + "header", "");
          RegWsh.RegWrite(this.hkey_path + "footer", "");
        } catch (e) {
        }
      },
      /*审核*/
      doAudit(){
        if(!this.newOpt[4].nClick){
          this.$put(this.urls.stockins+'/'+this.stockRow.id+'/audit')
            .then(()=>{
              this.$message({
                message: '审核成功!',
                type: 'success'
              });
              this.refresh();
            },err=>{
              this.$message.error(err.response.data.message);
            })
        }
      },
      /*入库*/
    },
    mounted() {
      this.fetchStockData();
      this.$store.dispatch('setOpt', this.newOpt);
      const that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt', that.newOpt);
      });
    }
  }
</script>
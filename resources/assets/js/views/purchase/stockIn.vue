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
                          v-loading="loading"
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
                            <el-button size="mini" type="danger" @click="delSingle(scope.row,$event)">删除</el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-tab-pane>
            <el-tab-pane label="已提交" name="1">
                <el-table :data="partData" fit
                          @selection-change="handleSelectionChange"
                          v-loading="loading"
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
                            <el-button size="mini" type="danger" @click="delSingle(scope.row,$event)">删除</el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-tab-pane>
            <el-tab-pane label="已入库" name="2">
                <el-table :data="finishData" fit
                          @selection-change="handleSelectionChange"
                          v-loading="loading"
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
                            <el-button size="mini" type="danger" @click="delSingle(scope.row,$event)">删除</el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-tab-pane>
        </el-tabs>

        <!--页码-->
        <Pagination :page-url="this.urls.stockins" @handlePagChg="handlePagChg"></Pagination>

        <!--底部tabs-->
        <el-tabs v-model="btmActiveName" @tab-click="clickBtmTabs">
            <el-tab-pane label="入库单明细" name="0">
                <el-table :data="stockDtlData" fit>
                    <el-table-column v-for="item in btmTableHead[this.btmActiveName]" :label="item.label" align="center" :width="item.width" :key="item.prop">
                        <template slot-scope="scope">
                            <span v-if="item.type=='select'">
                                <span v-for="list in resData[item.stateVal]" :key="list.id">
                                    <span v-if="list.id==scope.row[item.prop]">
                                        {{list.name?list.name:list.title}}
                                    </span>
                                </span>
                            </span>
                            <span v-else-if="item.type=='img'">
                                <el-popover
                                        placement="right"
                                        trigger="hover"
                                        popper-class="picture_detail">
                       <img :src="scope.row[item.prop]">
    <img slot="reference" :src="scope.row[item.prop]" :alt="scope.row[item.alt]">
   </el-popover>
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
                            <el-button size="mini" type="danger" @click="delSingle(scope.row,$event)">删除</el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </el-tab-pane>
            <el-tab-pane label="入库图片" name="1">
                入库图片
            </el-tab-pane>
        </el-tabs>

        <!--新建-->
        <el-dialog title="新建入库单" :visible.sync="addStockMask" :class="{'more-forms':moreForms,'threeParts':threeParts}">
            <el-button type="text">基本信息</el-button>
            <add-new :rule-form="addStockFormVal" :rules="addStockFormRules" :add-arr="addStockFormHead" :onlyInputs="true"></add-new>
            <el-button type="text">入库明细</el-button>
            <el-table :data="addStockTabVal" fit height="300" :row-class-name="addStockRCName" @row-click="addStockRClick">
                <el-table-column v-for="item in addStockTabHead" :label="item.label" align="center" :width="item.width" :key="item.label">
                    <template slot-scope="scope">
                        <span v-if="item.prop=='newData'">
                            <span v-if="addStockRIndex == 'index'+scope.$index">
                                <span v-if="item.type=='number'">
                                     <el-input size="small" type="number" v-model.trim="scope.row[item.prop][item.inProp]" :placeholder="item.holder" @input="stockChg"></el-input>
                                </span>
                                <span v-else>
                                   <el-input type="textarea" v-model.trim="scope.row[item.prop][item.inProp]"></el-input>
                                </span>
                            </span>
                            <span v-else>
                                {{scope.row[item.prop][item.inProp]}}
                            </span>
                        </span>
                        <span v-else-if="item.prop">
                            <span v-if="item.type=='select'">
                                <span v-if="item.inProp">
                                    <span v-for="list in resData[item.stateVal]" :key="list.id">
                                    <span v-if="list.id==scope.row[item.prop]">
                                        {{list.name?list.name:list.title}}
                                    </span>
                                </span>
                                </span>

                                <span v-else>
                                     <span v-for="list in resData[item.stateVal]" :key="list.id">
                                    <span v-if="list.id==scope.row[item.prop]">
                                        {{list.name?list.name:list.title}}
                                    </span>
                                </span>
                                </span>
                            </span>
                            <span v-else>
                             {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                        </span>
                        </span>
                    </template>
                </el-table-column>
                <el-table-column label="操作" width="90" align="center">
                    <template slot-scope="scope">
                        <el-button size="mini" type="danger" @click="addStockDel(scope.$index)">删除</el-button>
                    </template>
                </el-table-column>
            </el-table>
            <div slot="footer" class="dialog-footer clearfix">
                <div style="float: left">
                    <el-button type="primary" @click="addProDtl">增加明细</el-button>
                </div>
                <div style="float: right">
                    <el-button type="primary" @click="addStockConfirm">确定</el-button>
                    <el-button @click="addStockCancel">取消</el-button>
                </div>
            </div>
        </el-dialog>

        <!--商品明细-->
        <el-dialog title="商品明细" :visible.sync="proDtlMask" :class="{'more-forms':moreForms,'threeParts':threeParts}">
            <div class="searchBox">
                <span>
                    <label>商品编码</label>
                    <el-input v-model.trim="proQuery.commodity_code" clearable placeholder="请输入商品编码" @keyup.enter.native="proQueryClick"></el-input>
                </span>
                <el-button type="primary" @click="proQueryClick">查询</el-button>
                <el-button type="primary" @click="proExport">导出</el-button>
                <el-button type="primary" @click="proAutoFill">自动填充</el-button>
            </div>
            <el-table :data="proDtlVal" fit height="350" :row-class-name="proDtlCName" @row-click="proDtlRClick">
                <el-table-column v-for="item in proDtlHead" :label="item.label" align="center" :width="item.width" :key="item.label">
                    <template slot-scope="scope">
                        <span v-if="item.prop=='newData'">
                            <span v-if="proDtlRIndex == 'index'+scope.$index">
                                 <el-input size="small" type="number" v-model.trim="scope.row[item.prop][item.inProp]" :placeholder="item.holder" @input="compValChg"></el-input>
                            </span>
                            <span v-else>
                                {{scope.row[item.prop][item.inProp]}}
                            </span>
                        </span>
                        <span v-else-if="item.prop">
                            <span v-if="item.type=='select'">
                                 <span v-for="list in resData[item.stateVal]" :key="list.id">
                                    <span v-if="list.id==scope.row[item.prop]">
                                        {{list.name?list.name:list.title}}
                                    </span>
                                </span>
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
                <el-button @click="cancelAddProDtl">关闭</el-button>
            </div>
        </el-dialog>

        <!--修改-->
        <el-dialog title="修改入库单" :visible.sync="updateStockMask" :class="{'more-forms':moreForms,'threeParts':threeParts}">
            <el-button type="text">基本信息</el-button>
            <add-new :rule-form="updateStockFVal" :rules="addStockFormRules" :add-arr="addStockFormHead" :onlyInputs=true :editSign=true></add-new>
            <el-button type="text">入库明细</el-button>
            <el-table :data="updateStockTabVal" fit height="300" :row-class-name="updateStockRCName" @cell-click="updateStockCClick">
                <el-table-column v-for="item in addStockTabHead" :label="item.label" align="center" :width="item.width" :key="item.label">
                    <template slot-scope="scope">
                        <span v-if="item.prop=='newData'">
                            <span v-if="updateStockRIndex == 'index'+scope.$index">
                                <span v-if="item.type=='number'">
                                     <el-input size="small" type="number" v-model.trim="scope.row[item.prop][item.inProp]" :placeholder="item.holder" @input="stockChg"></el-input>
                                </span>
                                <span v-else>
                                   <el-input type="textarea" v-model.trim="scope.row[item.prop][item.inProp]"></el-input>
                                </span>
                            </span>
                            <span v-else>
                                {{scope.row[item.prop][item.inProp]}}
                            </span>
                        </span>
                        <span v-else-if="item.prop">
                            <span v-if="item.type=='select'">
                                     <span v-for="list in resData[item.stateVal]" :key="list.id">
                                    <span v-if="list.id==scope.row[item.prop]">
                                        {{list.name?list.name:list.title}}
                                    </span>
                                </span>
                            </span>
                            <span v-else>
                             {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                        </span>
                        </span>
                    </template>
                </el-table-column>
                <el-table-column label="操作" width="90" align="center">
                    <template slot-scope="scope">
                        <el-button size="mini" type="danger" @click="updateStockDel(scope.row,scope.$index)">删除</el-button>
                    </template>
                </el-table-column>
            </el-table>
            <div slot="footer" class="dialog-footer">
                <el-button type="primary" @click="updateStockConfirm">确定</el-button>
                <el-button @click="updateStockCancel">取消</el-button>
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
            ent: this.delBatch
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
            ent: this.refresh
          }
        ],
        searchBox: {
          goodsName: '',
          shopNames: '',
          vip_name:''
        },
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
            prop: 'stockInType',
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
            type: 'text'
          },
          {
            label: '打印时间',
            width: '220',
            prop: 'print_at',
            type: 'text',
          },
          {
            label: '审核时间',
            width: '220',
            prop: 'audit_at',
            type: 'text'
          }
        ],
        stockRow: {},
        loading: true,
        newData:[],
        partData:[],
        finishData:[],
        topActiveName:'0',
        btmActiveName: '0',
        moreForms: true,
        /*入库单明细*/
        stockDtlData: [],
        btmTableHead:[
          [
            {
              label: '子件图片',
              width: '120',
              prop: 'img_url',
              type: 'img',
            },
            {
              label: '采购单号',
              width: '200',
              prop: 'purchase_order_no',
              type: 'text',
            },
            {
              label: '店铺',
              width: '160',
              prop: 'shops_id',
              type: 'select',
              stateVal:'shops'
            },
            {
              label: '商品编码',
              width: '160',
              prop: 'commodity_code',
              type: 'text',
            },
            {
              label: '商品简称',
              width: '150',
              prop: 'short_name',
              type: 'text',
            },
            {
              label: '供应商',
              width: '150',
              prop: 'suppliers_id',
              type: 'select',
              stateVal:'suppliers'
            },
            {
              label: '子件编码',
              width: '160',
              prop: 'component_code',
              type: 'text',
            },
            {
              label: '包件数',
              width: '120',
              prop: 'package_quantity',
              type: 'number',
            },
            {
              label: '子件名称',
              width: '130',
              prop: 'spec',
              type: 'number',
            },
            {
              label: '入库数量',
              width: '100',
              prop: 'stock_in_quantity',
              type: 'number',
            },
            {
              label: '采购成本',
              width: '100',
              prop: 'purchase_cost',
              type: 'number',
            },
            {
              label: '采购运费',
              width: '100',
              prop: 'purchase_freight',
              type: 'text',
            },
            {
              label: '仓库成本',
              width: '100',
              prop: 'warehouse_cost',
              type: 'number',
            },
            {
              label: '折扣',
              width: '100',
              prop: 'discount',
              type: 'number',
            },
            {
              label: '总额',
              width: '100',
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
        /*新建*/
        addStockMask:false,
        addStockFormHead:[
          {
            label: '入库单号',
            prop: 'stock_in_no',
            holder: '系统自动生成',
            width:'200',
            type: 'text',
            editChgAble: true,
            addChgAble: true
          },
          {
            label: '入库仓库',
            prop: 'warehouse_id',
            holder: '请选择入库仓库',
            type: 'select',
            stateVal: 'warehouses',
            editChgAble: true
          },
          {
            label: '入库类型',
            prop: 'stock_in_types_id',
            holder: '请选择入库类型',
            type: 'select',
            stateVal: 'stockintypes',
            editChgAble: true
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
            width: '200',
            prop: 'purchase_order_no',
            type: 'text',
          },
          {
            label: '店铺',
            width: '120',
            prop: 'shops_id',
            type: 'select',
            stateVal: 'shops'
          },
          {
            label: '商品编码',
            width: '150',
            prop: 'commodity_code',
            type: 'text',
          },
          {
            label: '商品简称',
            width: '130',
            prop: 'short_name',
            type: 'text',
          },
          {
            label: '供应商',
            width: '130',
            prop: 'suppliers_id',
            type: 'select',
            stateVal: 'suppliers'
          },
          {
            label: '子件编码',
            width: '150',
            prop: 'component_code',
            type: 'text',
          },
          {
            label: '包件数',
            width: '90',
            prop: 'package_quantity',
            type: 'number',
          },
          {
            label: '子件名称',
            width: '120',
            prop: 'spec',
            type: 'text',
          },
          {
            label: '采购成本',
            width: '100',
            prop: 'purchase_cost',
            type: 'number',
          },
          {
            label: '仓库成本',
            width: '100',
            prop: 'warehouse_cost',
            type: 'number',
          },
          {
            label: '折扣',
            width: '100',
            prop: 'discount',
            type: 'number',
          },
          {
            label: '总额',
            width: '100',
            prop: 'total_fee',
            type: 'number',
          },
          {
            label: '入库数量',
            width: '100',
            prop: 'newData',
            inProp: "stock_in_quantity",
            type: 'number',
          },
          {
            label: '备注',
            width: '130',
            prop: 'newData',
            inProp:'remark',
            type: 'textarea',
          }
        ],
        addStockRIndex: '',
        addStockRData: {},
        /*商品明细*/
        proDtlMask: false,
        proQuery:{
          commodity_code: ''
        },
        threeParts: true,
        proDtlVal: [],
        proDtlHead:[
          {
            label: '采购单号',
            width: '200',
            prop: 'purchase_order_no',
            type: 'text'
          },
          {
            label: '店铺',
            width: '160',
            prop: 'shops_id',
            type: 'select',
            stateVal: 'shops'
          },
          {
            label: '客户名称',
            width: '120',
            prop: 'client_name',
            type: 'text'
          },
          {
            label: '商品编码',
            width: '160',
            prop: 'commodity_code',
            type: 'text'
          },
          {
            label: '商品简称',
            width: '160',
            prop: 'short_name',
            type: 'text'
          },
          {
            label: '子件编码',
            width: '160',
            prop: 'component_code',
            type: 'text'
          },
          {
            label: '子件名称',
            width: '180',
            prop: 'spec',
            type: 'text'
          },
          {
            label: '包件数',
            width: '100',
            prop: 'package_quantity',
            type: 'number'
          },
          {
            label: '供应商',
            width: '120',
            prop: 'suppliers_id',
            type: 'select',
            stateVal: 'suppliers'
          },
          {
            label: '采购成本',
            width: '120',
            prop: 'purchase_cost',
            type: 'number'
          },
          {
            label: '采购运费',
            width: '120',
            prop: 'purchase_freight',
            type: 'number'
          },
          {
            label: '仓库成本',
            width: '120',
            prop: 'warehouse_cost',
            type: 'number'
          },
          {
            label: '折扣',
            width: '100',
            prop: 'discount',
            type: 'number'
          },
          {
            label: '采购数',
            width: '100',
            prop: 'purchase_quantity',
            type: 'number'
          },
          {
            label: '已入库数',
            width: '120',
            prop: 'stock_in_count',
            type: 'number'
          },
          {
            label: '总额',
            width: '120',
            prop: 'total_fee',
            type: 'number'
          },
          {
            label: '入库数量',
            width: '120',
            prop: 'newData',
            inProp: "stock_in_quantity",
            type: 'number'
          },
          {
            label: '最大入库数',
            width: '150',
            prop: 'maxStockIn',
            type: 'number'
          },
          {
            label: '创建时间',
            width: '220',
            prop: 'created_at',
            type: 'text'
          }
        ],
        proDtlRIndex: '',
        compValUpdate: false,
        proRowDate:{},
        inValidData: false,
        /*修改*/
        updateStockMask: false,
        updateIsNew: true,
        updateStockFVal: {},
        updateStockTabVal: [],
        updateStockRIndex: '',
        updateStockRData: {},
        /*删除*/
        showDel: false,
        delUrl: '',
        delId: '',
        /*批量删除*/
        ids:[],
        checkboxId: '',
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
      /*获取数据*/
      clickTopTabs(){
        this.loading =true;
        this.fetchStockData();
        this.stockDtlData = [];
        },
      fetchStockData() {
        let index = this.topActiveName-0;
        switch(index){
          case 0:
            this.newOpt[3].nClick = false;
            this.newOpt[4].nClick = true;
            this.newOpt[5].nClick = true;
            this.$fetch(this.urls.stockins,{'is_submit': false,'include':'warehouse,stockInType,stockInDetails.productComponent.product,stockInDetails.purchaseDetail.purchaseList.purchase,stockInDetails.stockIn'})
              .then(res => {
                this.stockDtlData = [];
                this.loading = false;
                this.newData = res.data;
                let pg = res.meta.pagination;
                this.$store.dispatch('currentPage', pg.current_page);
                this.$store.commit('PER_PAGE', pg.per_page);
                this.$store.commit('PAGE_TOTAL', pg.total);
                this.$store.dispatch('suppliers','/suppliers');
                this.$store.dispatch('shops','/shops');
                this.$store.dispatch('warehouses','/warehouses');
                this.$store.dispatch('stockintypes','/stockintypes');
                if(res.data[0]['stockInDetails']['data'].length>0){
                  res.data[0]['stockInDetails']['data'].map(item=>{
                    let productComponent = item.productComponent;
                    let purchaseList = item['purchaseDetail']['purchaseList'];
                    let list ={
                      id: item.id,
                      img_url: productComponent.img_url,
                      purchase_order_no:purchaseList['purchase'].purchase_order_no,
                      shops_id: item['purchaseDetail'].shops_id,
                      suppliers_id: item['purchaseDetail'].suppliers_id,
                      commodity_code: productComponent['product'].commodity_code,
                      short_name: productComponent['product'].short_name,
                      component_code: productComponent.component_code,
                      package_quantity: productComponent.package_quantity,
                      spec: productComponent.spec,
                      stock_in_quantity: item.stock_in_quantity,
                      purchase_cost: item['purchaseDetail'].purchase_cost,
                      purchase_freight: item['purchaseDetail'].purchase_freight,
                      warehouse_cost: item['purchaseDetail'].warehouse_cost,
                      discount: item['purchaseDetail'].discount,
                      total_fee: item.total_fee,
                      remark: item.remark
                    };
                    this.stockDtlData.push(list);
                  });
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
              });
            break;
          case 1:
            this.newOpt[3].nClick = true;
            this.newOpt[4].nClick = false;
            this.newOpt[5].nClick = false;
            this.$fetch(this.urls.stockins,{is_submit: true,include:'warehouse,stockInType,stockInDetails.productComponent.product,stockInDetails.purchaseDetail.purchaseList.purchase,stockInDetails.stockIn'})
              .then(res => {
                this.loading = false;
                this.partData = res.data;
                if(res.data[0]['stockInDetails']['data'].length>0){
                  res.data[0]['stockInDetails']['data'].map(item=>{
                    let productComponent = item.productComponent;
                    let purchaseList = item['purchaseDetail']['purchaseList'];
                    let list ={
                      id: item.id,
                      img_url: productComponent.img_url,
                      purchase_order_no:purchaseList['purchase'].purchase_order_no,
                      shops_id: item['purchaseDetail'].shops_id,
                      suppliers_id: item['purchaseDetail'].suppliers_id,
                      commodity_code: productComponent['product'].commodity_code,
                      short_name: productComponent['product'].short_name,
                      component_code: productComponent.component_code,
                      package_quantity: productComponent.package_quantity,
                      spec: productComponent.spec,
                      stock_in_quantity: item.stock_in_quantity,
                      purchase_cost: item['purchaseDetail'].purchase_cost,
                      purchase_freight: item['purchaseDetail'].purchase_freight,
                      warehouse_cost: item['purchaseDetail'].warehouse_cost,
                      discount: item['purchaseDetail'].discount,
                      total_fee: item.total_fee,
                      remark: item.remark
                    };
                    this.stockDtlData.push(list);
                  });
                }
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
            this.$fetch(this.urls.stockins,{'is_stock_in': true,include:'warehouse,stockInType,stockInDetails.productComponent.product,stockInDetails.purchaseDetail.purchaseList.purchase,stockInDetails.stockIn'})
              .then(res => {
                this.loading = false;
                this.finishData = res.data;
                if(res.data[0]['stockInDetails']['data'].length>0){
                  res.data[0]['stockInDetails']['data'].map(item=>{
                    let productComponent = item.productComponent;
                    let purchaseList = item['purchaseDetail']['purchaseList'];
                    let list ={
                      id: item.id,
                      img_url: productComponent.img_url,
                      purchase_order_no:purchaseList['purchase'].purchase_order_no,
                      shops_id: item['purchaseDetail'].shops_id,
                      suppliers_id: item['purchaseDetail'].suppliers_id,
                      commodity_code: productComponent['product'].commodity_code,
                      short_name: productComponent['product'].short_name,
                      component_code: productComponent.component_code,
                      package_quantity: productComponent.package_quantity,
                      spec: productComponent.spec,
                      stock_in_quantity: item.stock_in_quantity,
                      purchase_cost: item['purchaseDetail'].purchase_cost,
                      purchase_freight: item['purchaseDetail'].purchase_freight,
                      warehouse_cost: item['purchaseDetail'].warehouse_cost,
                      discount: item['purchaseDetail'].discount,
                      total_fee: item.total_fee,
                      remark: item.remark
                    };
                    this.stockDtlData.push(list);
                  });
                }
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
      },
      stockRowClick(row){
        this.stockRow = row;
        this.newOpt[1].nClick = row['is_change']?true:false;
        this.newOpt[3].nClick = row['is_submit']?true:false;
        this.newOpt[4].nClick = row['is_audit']?true:false;
        this.newOpt[7].nClick = row['is_print']?true:false;
        this.stockDtlData = [];
        if(row['stockInDetails']['data'].length>0){
          row['stockInDetails']['data'].map(item=>{
            let productComponent = item.productComponent;
            let purchaseList = item['purchaseDetail']['purchaseList'];
            let list ={
              id: item.id,
              img_url: productComponent.img_url,
              purchase_order_no:purchaseList['purchase'].purchase_order_no,
              shops_id: item['purchaseDetail'].shops_id,
              suppliers_id: item['purchaseDetail'].suppliers_id,
              commodity_code: productComponent['product'].commodity_code,
              short_name: productComponent['product'].short_name,
              component_code: productComponent.component_code,
              package_quantity: productComponent.package_quantity,
              spec: productComponent.spec,
              stock_in_quantity: item.stock_in_quantity,
              purchase_cost: item['purchaseDetail'].purchase_cost,
              purchase_freight: item['purchaseDetail'].purchase_freight,
              warehouse_cost: item['purchaseDetail'].warehouse_cost,
              discount: item['purchaseDetail'].discount,
              total_fee: item.total_fee,
              remark: item.remark
            };
            this.stockDtlData.push(list);
          });
        }
      },
      /*底部tabs*/
      clickBtmTabs(){},
      /*新增*/
      addNewStock(){
        this.addStockMask = true;
        this.addStockTabVal = [];
      },
      addStockRCName({row,rowIndex}){row.index = rowIndex},
      addStockRClick(row){
        this.addStockRIndex = 'index'+ row.index;
        this.addStockRData = row;
      },
      addProDtl(){
        this.proDtlMask = true;
        this.proDtlVal = [];
        },
      addStockDel(index){
        this.addStockTabVal.splice(index,1);
      },
      addStockConfirm(){
        let submitData = {
          warehouse_id: this.addStockFormVal.warehouse_id,
          stock_in_types_id: this.addStockFormVal.stock_in_types_id,
          stock_in_details: []
        };
        this.addStockTabVal.map(item=>{
          let stockInData = {
            purchase_details_id: item.purchase_details_id,
            product_components_id: item.product_components_id,
            stock_in_quantity: item.newData.stock_in_quantity,
            total_fee: item.total_fee,
            remark: item.newData.remark
          };
          submitData.stock_in_details.push(stockInData);
        });
        console.log('submitData',submitData);
        this.$post(this.urls.stockins,submitData)
          .then(()=>{
            this.addStockMask = false;
            this.refresh();
            this.$message({
              message: '添加入库成功',
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
              this.$message.error({
                message: str
              });
            }
          })
      },
      addStockCancel(){
        this.addStockMask = false;
      },
      stockChg(value){
        if(this.addStockMask){
          if(value>this.addStockRData.maxStockIn-0){
            this.addStockRData.newData.stock_in_quantity = '';
            this.addStockRData.total_fee = '';
            this.$message.error('入库数量超过最大入库数量，无效');
          }else{
            this.addStockRData.newData.stock_in_quantity = value;
            this.addStockRData.total_fee = (this.addStockRData.purchase_cost-0)*value;
          }
        }else{
          if(value>this.updateStockRData.maxStockIn-0){
            this.updateStockRData.newData.stock_in_quantity = '';
            this.updateStockRData.total_fee = '';
            this.$message.error('入库数量超过最大入库数量，无效');
          }else{
            this.updateStockRData.newData.stock_in_quantity = value;
            this.updateStockRData.total_fee = (this.updateStockRData.purchase_cost-0)*value;
          }
        }
      },
      /*商品明细*/
      proQueryClick(){
        this.proDtlVal = [];
        this.$fetch(this.urls.purchaselists,{'status':true,'commodity_code':this.proQuery.commodity_code,'is_audit': true,'include':'purchase.user,purchaseDetails.productComponent.product,purchaseDetails.purchaseList'})
          .then(res=>{
            res.data.map(item=>{
              if(item['purchaseDetails']['data'].length>0){
                item['purchaseDetails']['data'].map(purDtlItem=>{
                  let list = {
                    purchase_order_no: item['purchase'].purchase_order_no,
                    shops_id: purDtlItem.shops_id,
                    client_name: item['purchase'].client_name,
                    commodity_code: purDtlItem['productComponent']['product'].commodity_code,
                    short_name: purDtlItem['productComponent']['product'].short_name,
                    component_code: purDtlItem['productComponent'].component_code,
                    spec: purDtlItem['productComponent'].spec,
                    package_quantity: purDtlItem['productComponent'].package_quantity,
                    suppliers_id: purDtlItem.suppliers_id,
                    purchase_cost: purDtlItem.purchase_cost,
                    purchase_freight: purDtlItem.purchase_freight,
                    warehouse_cost: purDtlItem.warehouse_cost,
                    discount: purDtlItem.discount,
                    purchase_quantity: purDtlItem.purchase_quantity,
                    stock_in_count: purDtlItem.stock_in_count,
                    newData:{
                      stock_in_quantity: '',
                      remark: ''
                    },
                    total_fee:'',
                    maxStockIn: (purDtlItem.purchase_quantity-0)-(purDtlItem.stock_in_count-0),
                    created_at: item['purchase']['user'].created_at,
                    purchase_details_id: purDtlItem.id,
                    product_components_id:purDtlItem['productComponent'].id
                  };
                  this.proDtlVal.push(list);
                })
              }
            })
          },err=>{});
      },
      proExport(){},
      proAutoFill(){
        this.proDtlVal.map(item=>{
          item['newData'].stock_in_quantity = item.maxStockIn;
          item.total_fee = (item.maxStockIn-0) * (item.purchase_cost-0);
        })
      },
      proDtlCName({row,rowIndex}){row.index = rowIndex},
      proDtlRClick(row){
        this.proDtlRIndex = 'index'+row.index;
        this.proRowDate =row;
      },
      compValChg(value){
        if(value>this.proRowDate.maxStockIn-0){
          this.proRowDate.newData.stock_in_quantity = '';
          this.proRowDate.total_fee = '';
          this.$message.error('入库数量超过最大入库数量，无效');
        }else{
          this.proRowDate.newData.stock_in_quantity = value;
          this.proRowDate.total_fee = (this.proRowDate.purchase_cost-0)*value;
        }
      },
      confirmAddProDtl(){
        this.proDtlVal.map(item=>{
          if(item.newData.stock_in_quantity>0){
            this.addStockTabVal.push(item);
          }
        });
        this.$message({
          message: '添加成功',
          type: 'success'
        });
      },
      cancelAddProDtl(){
        this.proDtlMask = false;
      },
      /*修改*/
      updateStock(){
        if (this.newOpt[1].nClick) {
          return
        } else {
          this.updateStockMask = true;
          this.updateStockTabVal = [];
          this.$fetch(this.urls.stockins + '/' + this.stockRow.id,{'include':'stockInDetails.productComponent.product,stockInDetails.purchaseDetail.purchaseList.purchase.user'}).then(res => {
            this.updateStockFVal = {
              stock_in_no: res.stock_in_no,
              warehouse_id: res.warehouse_id,
              stock_in_types_id: res.stock_in_types_id
            };
            if(res['stockInDetails']['data'].length>0){
              res['stockInDetails']['data'].map(item=>{
                let proComp = item['productComponent'];
                let purDtl = item['purchaseDetail'];
                let list = {
                  id: item.id,
                  purchase_order_no: purDtl['purchaseList']['purchase'].purchase_order_no,
                  shops_id: purDtl.shops_id,
                  commodity_code: proComp['product'].commodity_code,
                  short_name: proComp['product'].short_name,
                  component_code: proComp.component_code,
                  spec: proComp.spec,
                  package_quantity: proComp.package_quantity,
                  suppliers_id: purDtl.suppliers_id,
                  purchase_cost: purDtl.purchase_cost,
                  purchase_freight: purDtl.purchase_freight,
                  warehouse_cost: purDtl.warehouse_cost,
                  discount: purDtl.discount,
                  purchase_quantity: purDtl.purchase_quantity,
                  stock_in_count: purDtl.stock_in_count,
                  newData:{
                    stock_in_quantity: item.stock_in_quantity,
                    remark: ''
                  },
                  total_fee: item.total_fee,
                  maxStockIn: (purDtl.purchase_quantity-0)-(purDtl.stock_in_count-0),
                  created_at: purDtl['purchaseList']['purchase']['user'].created_at,
                  purchase_details_id: item.purchase_details_id,
                  product_components_id: item.product_components_id
                };
                this.updateStockTabVal.push(list);
              })
            }
          }, err => {
            console.log(err);
          })
        }
      },
      updateStockRCName({row,rowIndex}){row.index = rowIndex;},
      updateStockCClick(row){
        this.updateStockRIndex = 'index'+row.index;
        this.updateStockRData = row;
      },
      updateStockConfirm(){
        let submit = {
          warehouse_id: this.updateStockFVal.warehouse_id,
          stock_in_types_id: this.updateStockFVal.stock_in_types_id,
          stock_in_details: []
        };
        this.updateStockTabVal.map(item=>{
          let list = {
            id: item.id,
            purchase_details_id: item.purchase_details_id,
            product_components_id: item.product_components_id,
            stock_in_quantity: item['newData'].stock_in_quantity,
            total_fee: item.total_fee,
            remark: item['newData'].remark,
          };
          submit.stock_in_details.push(list);
        });
        this.$patch(this.urls.stockins+'/'+this.stockRow.id,submit)
          .then(()=>{
            this.updateStockMask =false;
            this.refresh();
            this.$message({
              message: '修改成功',
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
      updateStockDel(row,index){
        this.$del(this.urls.stockindetails+'/'+row.id)
          .then(()=>{
            this.updateStockTabVal.splice(index,1);
            this.$message({
              message:'删除入库单明细成功',
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
      updateStockCancel(){this.updateStockMask = false;},
      /*删除单条*/
      delSingle(row,e){
        this.showDel = true;
        $('.el-popper').css({left: e.x - 100 + 'px', top: e.y - 125 + 'px'});
        this.delId = row.id;
        this.delUrl = row['stockInDetails']?this.urls.stockins:this.urls.stockindetails;
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
            this.showDel = false;
            this.refresh();
            this.$message({
              message: '删除成功',
              type: 'success'
            });
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
        this.checkboxId=val.length>0?val[val.length-1].id:'';
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
            this.$del(this.urls.stockins, {ids: this.ids})
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
      /*分页*/
      handlePagChg(page){
        let index = this.topActiveName-0;
        switch(index){
          case 0:
            this.newOpt[3].nClick = false;
            this.newOpt[4].nClick = true;
            this.newOpt[5].nClick = true;
            this.$fetch(this.urls.stockins+'?page='+page,{'is_submit': false,'include':'warehouse,stockInType,stockInDetails.productComponent.product,stockInDetails.purchaseDetail.purchaseList.purchase,stockInDetails.stockIn'})
              .then(res => {
                this.stockDtlData = [];
                this.loading = false;
                this.newData = res.data;
                if(res.data[0]['stockInDetails']['data'].length>0){
                  res.data[0]['stockInDetails']['data'].map(item=>{
                    let productComponent = item.productComponent;
                    let purchaseList = item['purchaseDetail']['purchaseList'];
                    let list ={
                      id: item.id,
                      img_url: productComponent.img_url,
                      purchase_order_no:purchaseList['purchase'].purchase_order_no,
                      shops_id: item['purchaseDetail'].shops_id,
                      suppliers_id: item['purchaseDetail'].suppliers_id,
                      commodity_code: productComponent['product'].commodity_code,
                      short_name: productComponent['product'].short_name,
                      component_code: productComponent.component_code,
                      package_quantity: productComponent.package_quantity,
                      spec: productComponent.spec,
                      stock_in_quantity: item.stock_in_quantity,
                      purchase_cost: item['purchaseDetail'].purchase_cost,
                      purchase_freight: item['purchaseDetail'].purchase_freight,
                      warehouse_cost: item['purchaseDetail'].warehouse_cost,
                      discount: item['purchaseDetail'].discount,
                      total_fee: item.total_fee,
                      remark: item.remark
                    };
                    this.stockDtlData.push(list);
                  });
                }
              }, err => {});
            break;
          case 1:
            this.newOpt[3].nClick = true;
            this.newOpt[4].nClick = false;
            this.newOpt[5].nClick = false;
            this.$fetch(this.urls.stockins+'?page='+page,{is_submit: true,include:'warehouse,stockInType,stockInDetails.productComponent.product,stockInDetails.purchaseDetail.purchaseList.purchase,stockInDetails.stockIn'})
              .then(res => {
                this.loading = false;
                this.partData = res.data;
                if(res.data[0]['stockInDetails']['data'].length>0){
                  res.data[0]['stockInDetails']['data'].map(item=>{
                    let productComponent = item.productComponent;
                    let purchaseList = item['purchaseDetail']['purchaseList'];
                    let list ={
                      id: item.id,
                      img_url: productComponent.img_url,
                      purchase_order_no:purchaseList['purchase'].purchase_order_no,
                      shops_id: item['purchaseDetail'].shops_id,
                      suppliers_id: item['purchaseDetail'].suppliers_id,
                      commodity_code: productComponent['product'].commodity_code,
                      short_name: productComponent['product'].short_name,
                      component_code: productComponent.component_code,
                      package_quantity: productComponent.package_quantity,
                      spec: productComponent.spec,
                      stock_in_quantity: item.stock_in_quantity,
                      purchase_cost: item['purchaseDetail'].purchase_cost,
                      purchase_freight: item['purchaseDetail'].purchase_freight,
                      warehouse_cost: item['purchaseDetail'].warehouse_cost,
                      discount: item['purchaseDetail'].discount,
                      total_fee: item.total_fee,
                      remark: item.remark
                    };
                    this.stockDtlData.push(list);
                  });
                }
              }, err => {});
            break;
          case 2:
            this.newOpt[3].nClick = true;
            this.newOpt[4].nClick = true;
            this.newOpt[5].nClick = false;
            this.$fetch(this.urls.stockins+'?page='+page,{'is_stock_in': true,include:'warehouse,stockInType,stockInDetails.productComponent.product,stockInDetails.purchaseDetail.purchaseList.purchase,stockInDetails.stockIn'})
              .then(res => {
                this.loading = false;
                this.finishData = res.data;
                if(res.data[0]['stockInDetails']['data'].length>0){
                  res.data[0]['stockInDetails']['data'].map(item=>{
                    let productComponent = item.productComponent;
                    let purchaseList = item['purchaseDetail']['purchaseList'];
                    let list ={
                      id: item.id,
                      img_url: productComponent.img_url,
                      purchase_order_no:purchaseList['purchase'].purchase_order_no,
                      shops_id: item['purchaseDetail'].shops_id,
                      suppliers_id: item['purchaseDetail'].suppliers_id,
                      commodity_code: productComponent['product'].commodity_code,
                      short_name: productComponent['product'].short_name,
                      component_code: productComponent.component_code,
                      package_quantity: productComponent.package_quantity,
                      spec: productComponent.spec,
                      stock_in_quantity: item.stock_in_quantity,
                      purchase_cost: item['purchaseDetail'].purchase_cost,
                      purchase_freight: item['purchaseDetail'].purchase_freight,
                      warehouse_cost: item['purchaseDetail'].warehouse_cost,
                      discount: item['purchaseDetail'].discount,
                      total_fee: item.total_fee,
                      remark: item.remark
                    };
                    this.stockDtlData.push(list);
                  });
                }
              }, err => {});
            break
        }
      },
      /*刷新*/
      refresh() {
        this.loading = true;
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
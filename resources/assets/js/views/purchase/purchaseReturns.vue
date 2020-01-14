<template>
    <div>
        <div class="searchBox">
            <span>
                <label>退货单号</label>
                <el-input v-model.trim="searchBox.returnOrder" clearable @keyup.enter.native="handleQuery"></el-input>
            </span>
            <span>
                <label>退回供应商</label>
                <el-select v-model="searchBox.supplier" clearable placeholder="请选择" @keyup.enter.native="handleQuery">
                    <el-option v-for="item in resData.suppliers" :key="item.value" :label="item.name" :value="item.id"></el-option>
                </el-select>
            </span>
        </div>

        <!--采购退货-->
        <el-tabs v-model="topActiveName" @tab-click="clickTopTabs" id="subOutputRank-print">
            <el-tab-pane label="未提交" name="0">
                <el-table :data="noSubmitData" fit
                          @selection-change="handleSelectionChange"
                          v-loading="loading"
                          height="300"
                          @row-click="purReturnRowClick">
                    <el-table-column
                            type="selection"
                            width="95" align="center"
                            :checked="checkboxInit">
                    </el-table-column>
                    <el-table-column v-for="item in purReturnHead" :label="item.label" align="center" :width="item.width" :key="item.prop">
                        <template slot-scope="scope">
                            <span v-if="item.type=='select'">
                        <span v-if="scope.row[item.prop]==''"></span>
                        <span v-else-if="typeof scope.row[item.prop] == 'object' && item.nmProp">
                            {{scope.row[item.prop][item.nmProp]}}
                        </span>
                    </span>
                            <span v-else-if="item.type=='checkbox'">
                         <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
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
            <el-tab-pane label="未审核" name="1">
                <el-table :data="noAuditData" fit
                          @selection-change="handleSelectionChange"
                          v-loading="loading"
                          height="300"
                          @row-click="purReturnRowClick">
                    <el-table-column
                            type="selection"
                            width="95" align="center"
                            :checked="checkboxInit">
                    </el-table-column>
                    <el-table-column v-for="item in purReturnHead" :label="item.label" align="center" :width="item.width" :key="item.prop">
                        <template slot-scope="scope">
                            <span v-if="item.type=='select'">
                        <span v-if="scope.row[item.prop]==''"></span>
                        <span v-else-if="typeof scope.row[item.prop] == 'object' && item.nmProp">
                            {{scope.row[item.prop][item.nmProp]}}
                        </span>
                    </span>
                            <span v-else-if="item.type=='checkbox'">
                         <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
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
            <el-tab-pane label="已审核" name="2">
                <el-table :data="alreadyAuditData" fit
                          @selection-change="handleSelectionChange"
                          v-loading="loading"
                          height="300"
                          @row-click="purReturnRowClick">
                    <el-table-column
                            type="selection"
                            width="95" align="center"
                            :checked="checkboxInit">
                    </el-table-column>
                    <el-table-column v-for="item in purReturnHead" :label="item.label" align="center" :width="item.width" :key="item.prop">
                        <template slot-scope="scope">
                            <span v-if="item.type=='select'">
                        <span v-if="scope.row[item.prop]==''"></span>
                        <span v-else-if="typeof scope.row[item.prop] == 'object' && item.nmProp">
                            {{scope.row[item.prop][item.nmProp]}}
                        </span>
                    </span>
                            <span v-else-if="item.type=='checkbox'">
                         <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
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

        <!--页码-->
        <Pagination :page-url="this.urls.purchasereturns" @handlePagChg="handlePagChg"></Pagination>

        <!--底部tabs-->
        <el-tabs v-model="btmActiveName" @tab-click="clickBtmTabs">
            <el-tab-pane label="退货单明细" name="0">
                <el-table :data="purReturnDtl" fit>
                    <el-table-column v-for="item in btmTableHead[this.btmActiveName]" :label="item.label" align="center" :width="item.width" :key="item.prop">
                        <template slot-scope="scope">
                            <span v-if="item.type=='img'">
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
                                     {{scope.row[item.prop]}}
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
            <el-tab-pane label="图片信息" name="1">
                入库图片
            </el-tab-pane>
        </el-tabs>

        <!--新增-->
        <el-dialog title="新增退货单" :visible.sync="addPurReturnMask" :class="{'more-forms':moreForms,'threeParts':threeParts}">
            <add-new :rule-form="addPurReturnFormVal"  :add-arr="addPurReturnFormHead" :onlyInputs="true"></add-new>
            <el-button type="text">退货单明细</el-button>
            <el-table :data="addPurReturnTabVal" fit height="300" :row-class-name="addPurReturnRCName" @row-click="addPurReturnRClick">
                <el-table-column v-for="item in addPurReturnTabHead" :label="item.label" align="center" :width="item.width" :key="item.label">
                    <template slot-scope="scope">
                        <span v-if="item.prop=='newData'">
                            <span v-if="addPurReturnRIndex == 'index'+scope.$index">
                                <span v-if="item.type=='number'">
                                    <span v-if="item.inProp=='purchase_return_quantity'">
                                         <el-input size="small" type="number" v-model.trim="scope.row[item.prop][item.inProp]" :placeholder="item.holder" @input="inputChg"></el-input>
                                    </span>
                                    <span v-else>
                                         <el-input size="small" type="number" v-model.trim="scope.row[item.prop][item.inProp]" :placeholder="item.holder"></el-input>
                                    </span>
                                </span>
                                <span v-else>
                                    <el-select v-model="scope.row[item.prop][item.inProp]" :placeholder="item.holder">
                               <span v-for="list in resData[item.stateVal]" :key="list.id">
                                    <el-option :label="list.name" :value="list.id"></el-option>
                               </span>
                           </el-select>
                                </span>
                            </span>
                            <span v-else>
                                <span v-if="item.type=='select'">
                                     <span v-for="(list,index) in resData[item.stateVal]" :key="index">
                                        <span v-if="list.id==scope.row[item.prop][item.inProp]">
                                            {{list.name?list.name:list.nick}}
                                    </span>
                                </span>
                                </span>
                                <span v-else>
                                    {{scope.row[item.prop][item.inProp]}}
                                </span>
                            </span>
                        </span>
                        <span v-else-if="item.prop">
                            <span v-if="item.type=='img'">
                                <el-popover  placement="right" trigger="hover"    popper-class="picture_detail">
                                    <img :src="scope.row[item.prop][item.inProp]">
                                    <img slot="reference" :src="scope.row[item.prop][item.inProp]">
                                </el-popover>
                            </span>
                            <span v-else>
                                <span v-if="scope.row[item.prop]">
                                    {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                                </span>
                            </span>
                        </span>
                    </template>
                </el-table-column>
                <el-table-column label="操作" width="90" align="center">
                    <template slot-scope="scope">
                        <el-button size="mini" type="danger" @click="addPurReturnDel(scope.$index)">删除</el-button>
                    </template>
                </el-table-column>
            </el-table>
            <div slot="footer" class="dialog-footer clearfix">
                <div style="float: left">
                    <el-button type="primary" @click="addPurReturnDtl">增加明细</el-button>
                </div>
                <div style="float: right">
                    <el-button type="primary" @click="addPurReturnConfirm">确定</el-button>
                    <el-button @click="addPurReturnCancel">取消</el-button>
                </div>
            </div>
        </el-dialog>

        <!--商品明细-->
        <el-dialog title="请选择退货商品" :visible.sync="proDtlMask" :class="{'more-forms':moreForms,'threeParts':threeParts}">
            <div class="searchBox">
                <span>
                    <label>商品编码</label>
                    <el-input v-model.trim="proQuery.commodity_code" clearable placeholder="请输入商品编码" @keyup.enter.native="proQueryClick"></el-input>
                </span>
                <span>
                    <label>子件编码</label>
                    <el-input v-model.trim="proQuery.component_code" clearable placeholder="请输入子件编码" @keyup.enter.native="proQueryClick"></el-input>
                </span>
                <span>
                    <label>所在仓库</label>
                   <el-select v-model="proQuery.warehouse_id" clearable placeholder="请选择" @keyup.enter.native="proQueryClick">
                                    <el-option
                                            v-for="item in resData.warehouses"
                                            :key="item.value"
                                            :label="item.name"
                                            :value="item.id">
                                    </el-option>
                                </el-select>
                </span>
                <el-button type="primary" @click="proQueryClick">刷新</el-button>
            </div>
            <el-table :data="proDtlVal" fit height="350" :row-class-name="proDtlCName" @row-click="proDtlRClick">
                <el-table-column v-for="item in addPurReturnTabHead" :label="item.label" align="center" :width="item.width" :key="item.label">
                    <template slot-scope="scope">
                        <span v-if="item.prop=='newData'">
                            <span v-if="proDtlRIndex == 'index'+scope.$index">
                                <span v-if="item.type=='number'">
                                    <span v-if="item.inProp=='purchase_return_quantity'">
                                         <el-input size="small" type="number" v-model.trim="scope.row[item.prop][item.inProp]" :placeholder="item.holder" @input="proInputChg"></el-input>
                                    </span>
                                    <span v-else>
                                         <el-input size="small" type="number" v-model.trim="scope.row[item.prop][item.inProp]" :placeholder="item.holder"></el-input>
                                    </span>
                                </span>
                                <span v-else>
                                    <el-select v-model="scope.row[item.prop][item.inProp]" :placeholder="item.holder">
                               <span v-for="list in resData[item.stateVal]" :key="list.id">
                                    <el-option :label="list.name" :value="list.id"></el-option>
                               </span>
                           </el-select>
                                </span>
                            </span>
                            <span v-else>
                                <span v-if="item.type=='select'">
                                     <span v-for="(list,index) in resData[item.stateVal]" :key="index">
                                        <span v-if="list.id==scope.row[item.prop][item.inProp]">
                                            {{list.name?list.name:list.nick}}
                                    </span>
                                </span>
                                </span>
                                <span v-else>
                                    {{scope.row[item.prop][item.inProp]}}
                                </span>
                            </span>
                        </span>
                        <span v-else-if="item.prop">
                            <span v-if="item.type=='img'">
                                <el-popover  placement="right" trigger="hover"    popper-class="picture_detail">
                                    <img :src="scope.row[item.prop][item.inProp]">
                                    <img slot="reference" :src="scope.row[item.prop][item.inProp]">
                                </el-popover>
                            </span>
                            <span v-else>
                                <span v-if="scope.row[item.prop]">
                                    {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                                </span>
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
        <el-dialog title="修改退货单" :visible.sync="updatePurReturnMask" :class="{'more-forms':moreForms,'threeParts':threeParts}">
            <add-new :rule-form="updatePurReturnFormVal"  :add-arr="addPurReturnFormHead" :onlyInputs="true"></add-new>
            <el-button type="text">退货单明细</el-button>
            <el-table :data="updatePurReturnTabVal" fit height="300" :row-class-name="updatePurReturnRCName" @row-click="updatePurReturnRClick">
                <el-table-column v-for="item in addPurReturnTabHead" :label="item.label" align="center" :width="item.width" :key="item.label">
                    <template slot-scope="scope">
                        <span v-if="item.prop=='newData'">
                            <span v-if="updatePurReturnRIndex == 'index'+scope.$index">
                                <span v-if="item.type=='number'">
                                    <span v-if="item.inProp=='purchase_return_quantity'">
                                         <el-input size="small" type="number" v-model.trim="scope.row[item.prop][item.inProp]" :placeholder="item.holder" @input="inputChg"></el-input>
                                    </span>
                                    <span v-else>
                                         <el-input size="small" type="number" v-model.trim="scope.row[item.prop][item.inProp]" :placeholder="item.holder"></el-input>
                                    </span>
                                </span>
                                <span v-else>
                                    <el-select v-model="scope.row[item.prop][item.inProp]" :placeholder="item.holder">
                               <span v-for="list in resData[item.stateVal]" :key="list.id">
                                    <el-option :label="list.name" :value="list.id"></el-option>
                               </span>
                           </el-select>
                                </span>
                            </span>
                            <span v-else>
                                <span v-if="item.type=='select'">
                                     <span v-for="(list,index) in resData[item.stateVal]" :key="index">
                                        <span v-if="list.id==scope.row[item.prop][item.inProp]">
                                            {{list.name?list.name:list.nick}}
                                    </span>
                                </span>
                                </span>
                                <span v-else>
                                    {{scope.row[item.prop][item.inProp]}}
                                </span>
                            </span>
                        </span>
                        <span v-else-if="item.prop">
                            <span v-if="item.type=='img'">
                                <el-popover  placement="right" trigger="hover"    popper-class="picture_detail">
                                    <img :src="scope.row[item.prop][item.inProp]">
                                    <img slot="reference" :src="scope.row[item.prop][item.inProp]">
                                </el-popover>
                            </span>
                            <span v-else>
                                <span v-if="scope.row[item.prop]">
                                    {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                                </span>
                            </span>
                        </span>
                    </template>
                </el-table-column>
                <el-table-column label="操作" width="90" align="center">
                    <template slot-scope="scope">
                        <el-button size="mini" type="danger" @click="updatePurReturnDel(scope.row,scope.$index)">删除</el-button>
                    </template>
                </el-table-column>
            </el-table>
            <div slot="footer" class="dialog-footer clearfix">
                <div style="float: left">
                    <el-button type="primary" @click="addPurReturnDtl">增加明细</el-button>
                </div>
                <div style="float: right">
                    <el-button type="primary" @click="updatePurReturnConfirm">确定</el-button>
                    <el-button @click="updatePurReturnCancel">取消</el-button>
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
  export default {
    data() {
      return {
        newOpt: [
          {
            cnt: '新增',
            icon: 'bf-add',
            ent: this.addPurReturn
          },
          {
            cnt: '修改',
            icon: 'bf-change',
            ent: this.updatePurReturn
          },
          {
            cnt: '删除',
            icon: 'bf-del',
            ent: this.test
          },
          {
            cnt: '提交',
            icon: 'bf-submit',
            ent: this.test
          },
          {
            cnt: '驳回',
            icon: 'bf-reject',
            ent: this.test
          },
          {
            cnt: '审核',
            icon: 'bf-audit',
            ent: this.test
          },
          {
            cnt: '退审',
            icon: 'bf-audit',
            ent: this.test
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
            ent: this.refresh
          }
        ],
        searchBox:{
          returnOrder:'',
          supplier:''
        },
        /*获取数据*/
        topActiveName: '0',
        checkboxInit: false,
        loading: true,
        noSubmitData: [],
        noAuditData: [],
        alreadyAuditData: [],
        purReturnHead:[
          {
            label: '退货单号',
            width: '200',
            prop: 'purchase_return_no',
            type: 'text',
          },
          {
            label: '备注',
            width: '160',
            prop: 'remark',
            type: 'text'
          },
          {
            label: '创建人',
            width: '130',
            prop: 'creator',
            type: 'text'
          },
          {
            label: '创建时间',
            width: '220',
            prop: 'created_at',
            type: 'text',
          },
          {
            label: '提交人',
            width: '130',
            prop: 'submitter',
            type: 'text',
          },
          {
            label: '提交时间',
            width: '220',
            prop: 'submit_at',
            type: 'text',
          },
          {
            label: '审核人',
            width: '130',
            prop: 'auditor',
            type: 'text',
          },
          {
            label: '审核时间',
            width: '220',
            prop: 'audit_at',
            type: 'text',
          }
        ],
        btmActiveName: '0',
        purReturnDtl: [],
        btmTableHead: [
          [
            {
              label: '子件图片',
              width: '120',
              prop: 'img_url',
              type: 'img',
            },
            {
              label: '商品编码',
              width: '160',
              prop: 'commodity_code',
              type: 'text'
            },
            {
              label: '子件编码',
              width: '130',
              prop: 'component_code',
              type: 'text'
            },
            {
              label: '商品简称',
              width: '130',
              prop: 'short_name',
              type: 'text',
            },
            {
              label: '子件名称',
              width: '130',
              prop: 'spec',
              type: 'text',
            },
            {
              label: '差价',
              width: '100',
              prop: 'price_differences',
              type: 'number',
            },
           /* {
              label: '可用数',
              width: '100',
              prop: 'auditor',
              type: 'number',
            },*/
            {
              label: '退货数',
              width: '100',
              prop: 'purchase_return_quantity',
              type: 'number',
            },
            {
              label: '退回供应商',
              width: '150',
              prop: 'supplierName',
              type: 'text',
            },
            {
              label: '退货仓库',
              width: '150',
              prop: 'warehouseName',
              type: 'text',
            },
            {
              label: '退货类型',
              width: '160',
              prop: 'purchaseReturnTypeName',
              type: 'text',
            }
          ],
          []
        ],
        curRowId: {},
        /*新增*/
        addPurReturnMask: false,
        moreForms: true,
        addPurReturnFormVal: {
          purchase_return_no: '',
          remark:'',
          status: true
        },
        addPurReturnFormHead:[
          {
            label: '退货单号',
            prop: 'purchase_return_no',
            holder: '系统自动生成',
            width:'200',
            type: 'text',
            editChgAble: true,
            addChgAble: true
          },
          {
            label: '退货备注',
            width: '150',
            prop: 'remark',
            type: 'textarea'
          },
          {
            label: '状态',
            prop: 'status',
            type: 'checkbox'
          }
        ],
        addPurReturnTabVal:[],
        addPurReturnTabHead:[
          {
            label: '子件图片',
            width: '120',
            prop: 'productComponent',
            inProp: 'img_url',
            type: 'img',
          },
          {
            label: '商品编码',
            width: '120',
            prop: 'product',
            inProp: 'commodity_code',
            type: 'text'
          },
          {
            label: '子件编码',
            width: '150',
            prop: 'productComponent',
            inProp: 'component_code',
            type: 'text',
          },
          {
            label: '商品简称',
            width: '130',
            prop: 'product',
            inProp: 'short_name',
            type: 'text',
          },
          {
            label: '子件名称',
            width: '150',
            prop: 'productComponent',
            inProp: 'spec',
            type: 'text',
          },
          {
            label: '仓库',
            width: '90',
            prop: 'warehouse',
            inProp: 'name',
            type: 'text',
          },
          {
            label: '库存数',
            width: '90',
            prop: 'quantity',
            type: 'number',
          },
          {
            label: '退货数',
            width: '120',
            prop: 'newData',
            inProp: 'purchase_return_quantity',
            type: 'number',
          },
          {
            label: '供应商',
            width: '120',
            prop: 'newData',
            inProp: 'suppliers_id',
            type: 'select',
            stateVal: 'suppliers'
          },
          {
            label: '差价',
            width: '120',
            prop: 'newData',
            inProp: 'price_differences',
            type: 'number',
          },
          {
            label: '退货类型',
            width: '150',
            prop: 'newData',
            inProp: 'purchase_return_types_id',
            type: 'select',
            stateVal: 'purchasereturntypes'
          }
        ],
        addPurReturnRIndex:'',
        proDtlMask: false,
        threeParts: true,
        proQuery:{
          commodity_code:'',
          component_code: '',
          warehouse_id:''
        },
        proDtlVal: [],
        proDtlRIndex:'',
        proRData: {},
        addProData: [],
        /*修改*/
        updatePurReturnMask: false,
        updatePurReturnFormVal: {},
        updatePurReturnTabVal: [],
        updatePurReturnRIndex: '',
        alreadyIds: [],
        /*删除*/
        showDel: false,
        delUrl: '',
        delId: '',
        /*删除批量*/
        ids:[],
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
      handleQuery(){
        this.$fetch()
          .then(res=>{},err=>{})
      },
      /*获取数据*/
      clickTopTabs(){
        this.loading = true;
        this.purReturnDtl = [];
        this.fetchData();
      },
      clickBtmTabs(){},
      // purReturnRCName({row,rowIndex}){row.index = rowIndex;},
      purReturnRowClick(row){
        this.purReturnDtl = [];
        if(row['purchaseReturnDetails']['data'].length>0){
          row['purchaseReturnDetails']['data'].map(item=>{
            let productComponent = item['stock']['productComponent'];
            let product = item['stock']['product'];
            let list ={
              id: item.id,
              img_url: productComponent.img_url,
              commodity_code:product.commodity_code,
              component_code: productComponent.component_code,
              short_name: product.short_name,
              spec: productComponent.spec,
              price_differences: item.price_differences,
              purchase_return_quantity: item.purchase_return_quantity,
              supplierName: item['supplier'].name,
              warehouseName: item['stock']['warehouse'].name,
              purchaseReturnTypeName: item['purchaseReturnType']['name'],
            };
            this.purReturnDtl.push(list);
          });
        }
        this.curRowId = row.id;
      },
      fetchData(){
        let index = this.topActiveName-0;
        switch(index){
          case 0:
            this.newOpt[1].nClick = false;
            this.newOpt[2].nClick = false;
            this.newOpt[3].nClick = false;
            this.newOpt[4].nClick = true;
            this.newOpt[5].nClick = true;
            this.newOpt[6].nClick = true;
            this.$fetch(this.urls.purchasereturns,{'is_submit': false,'include':'purchaseReturnDetails.stock.productComponent,purchaseReturnDetails.stock.product,purchaseReturnDetails.stock.warehouse,purchaseReturnDetails.supplier,purchaseReturnDetails.purchaseReturnType'})
              .then(res => {
                this.noSubmitData = res.data;
                this.loading = false;
                this.purReturnDtl = [];
                let pg = res.meta.pagination;
                this.$store.dispatch('currentPage', pg.current_page);
                this.$store.commit('PER_PAGE', pg.per_page);
                this.$store.commit('PAGE_TOTAL', pg.total);
                this.$store.dispatch('suppliers',this.urls.suppliers);
                this.$store.dispatch('purchasereturntypes',this.urls.purchasereturntypes);
                if(res.data[0]['purchaseReturnDetails']['data'].length>0){
                  res.data[0]['purchaseReturnDetails']['data'].map(item=>{
                    let productComponent = item['stock']['productComponent'];
                    let product = item['stock']['product'];
                    let list ={
                      id: item.id,
                      img_url: productComponent.img_url,
                      commodity_code:product.commodity_code,
                      component_code: productComponent.component_code,
                      short_name: product.short_name,
                      spec: productComponent.spec,
                      price_differences: item.price_differences,
                      purchase_return_quantity: item.purchase_return_quantity,
                      supplierName: item['supplier'].name,
                      warehouseName: item['stock']['warehouse'].name,
                      purchaseReturnTypeName: item['purchaseReturnType']['name'],
                    };
                    this.purReturnDtl.push(list);
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
            this.newOpt[1].nClick = true;
            this.newOpt[2].nClick = false;
            this.newOpt[3].nClick = true;
            this.newOpt[4].nClick = false;
            this.newOpt[5].nClick = false;
            this.newOpt[6].nClick = true;
            this.$fetch(this.urls.purchasereturns,{'is_audit': false,include:'purchaseReturnDetails.stock.productComponent,purchaseReturnDetails.stock.product,purchaseReturnDetails.stock.warehouse,purchaseReturnDetails.supplier,purchaseReturnDetails.purchaseReturnType'})
              .then(res => {
                this.noAuditData = res.data;
                this.loading = false;
                this.purReturnDtl = [];
                let pg = res.meta.pagination;
                this.$store.dispatch('currentPage', pg.current_page);
                this.$store.commit('PER_PAGE', pg.per_page);
                this.$store.commit('PAGE_TOTAL', pg.total);
                if(res.data[0]['purchaseReturnDetails']['data'].length>0){
                  res.data[0]['purchaseReturnDetails']['data'].map(item=>{
                    let productComponent = item['stock']['productComponent'];
                    let product = item['stock']['product'];
                    let list ={
                      id: item.id,
                      img_url: productComponent.img_url,
                      commodity_code:product.commodity_code,
                      component_code: productComponent.component_code,
                      short_name: product.short_name,
                      spec: productComponent.spec,
                      price_differences: item.price_differences,
                      purchase_return_quantity: item.purchase_return_quantity,
                      supplierName: item['supplier'].name,
                      warehouseName: item['stock']['warehouse'].name,
                      purchaseReturnTypeName: item['purchaseReturnType']['name'],
                    };
                    this.purReturnDtl.push(list);
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
          case 2:
            this.newOpt[1].nClick = true;
            this.newOpt[2].nClick = true;
            this.newOpt[3].nClick = true;
            this.newOpt[4].nClick = true;
            this.newOpt[5].nClick = true;
            this.newOpt[6].nClick = false;
            this.$fetch(this.urls.purchasereturns,{'is_audit': true,include:'purchaseReturnDetails.stock.productComponent,purchaseReturnDetails.stock.product,purchaseReturnDetails.stock.warehouse,purchaseReturnDetails.stock.warehouse,purchaseReturnDetails.supplier,purchaseReturnDetails.purchaseReturnType'})
              .then(res => {
                this.alreadyAuditData = res.data;
                this.loading = false;
                this.purReturnDtl = [];
                let pg = res.meta.pagination;
                this.$store.dispatch('currentPage', pg.current_page);
                this.$store.commit('PER_PAGE', pg.per_page);
                this.$store.commit('PAGE_TOTAL', pg.total);
                if(res.data[0]['purchaseReturnDetails']['data'].length>0){
                  res.data[0]['purchaseReturnDetails']['data'].map(item=>{
                    let productComponent = item['stock']['productComponent'];
                    let product = item['stock']['product'];
                    let list ={
                      id: item.id,
                      img_url: productComponent.img_url,
                      commodity_code:product.commodity_code,
                      component_code: productComponent.component_code,
                      short_name: product.short_name,
                      spec: productComponent.spec,
                      price_differences: item.price_differences,
                      purchase_return_quantity: item.purchase_return_quantity,
                      supplierName: item['supplier'].name,
                      warehouseName: item['stock']['warehouse'].name,
                      purchaseReturnTypeName: item['purchaseReturnType']['name'],
                    };
                    this.purReturnDtl.push(list);
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
            break
        }
      },
      /*新增*/
      addPurReturn(){
        this.addPurReturnMask = true;
        this.addPurReturnTabVal = [];
        this.addPurReturnRIndex = '';
      },
      addPurReturnRCName({row,rowIndex}){row.index = rowIndex;},
      addPurReturnRClick(row){
       this.addPurReturnRIndex = `index${row.index}`;
      },
      addPurReturnDel(index){
        this.addPurReturnTabVal.splice(index,1);
      },
      addPurReturnDtl(){
        this.proDtlMask = true;
        this.addProData = [];
        this.proDtlVal = [];
      },
      addPurReturnConfirm(){
        let submitData = {
          remark: this.addPurReturnFormVal.remark,
          status: this.addPurReturnFormVal.status,
          purchase_return_details:[]
        };
        this.addPurReturnTabVal.map(item=>{
          let purDtl = {
            stocks_id: item.id,
            purchase_return_quantity: item['newData'].purchase_return_quantity,
            suppliers_id: item['newData'].suppliers_id,
            price_differences: item['newData'].price_differences,
            purchase_return_types_id: item['newData'].purchase_return_types_id,
          };
          submitData.purchase_return_details.push(purDtl);
        });
        this.$post(this.urls.purchasereturns,submitData)
          .then(()=>{
            this.addPurReturnMask = false;
            this.refresh();
            this.$message({
              message:'新增采购退货单成功',
              type:'success'
            })
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
      addPurReturnCancel(){
        this.addPurReturnMask = false;

      },
      proDtlCName({row,rowIndex}){row.index= rowIndex;},
      proDtlRClick(row){
        this.proDtlRIndex =`index${row.index}`;
        this.proRData = row;
      },
      proInputChg(value){
        if(value>this.proRData.quantity-0){
          this.$message({
            message:'退货数大于库存数',
            type: 'info'
          });
          this.proRData.newData.purchase_return_quantity = value;
        }else{
          this.proRData.newData.purchase_return_quantity = value;
        }
      },
      inputChg(value){
        if(this.addPurReturnMask){
          if(value>this.addPurReturnTabVal.quantity-0){
            this.$message({
              message:'退货数大于库存数',
              type: 'info'
            });
            this.addPurReturnTabVal.newData.purchase_return_quantity = value;
          }else{
            this.addPurReturnTabVal.newData.purchase_return_quantity = value;
          }
        }
      },
      proQueryClick(){
        this.$fetch(this.urls.stocks,{'status':true,'include':'warehouse,product,productComponent'})
          .then(res=>{
            res.data.map(item=>{
              this.$set(item,'newData',{
                purchase_return_quantity: '',
                suppliers_id: '',
                price_differences: '',
                purchase_return_types_id:''
              })
            });
            this.proDtlVal = res.data;
          },err=>{
            console.log(err);
          })
      },
      confirmAddProDtl(){
        if(this.addPurReturnMask){
          this.proDtlVal.map(item=>{
            if(item.newData.purchase_return_quantity>0){
              if(item.newData['suppliers_id']!==undefined && item['newData'].price_differences!==undefined && item['newData'].purchase_return_types_id!==undefined){
                this.addPurReturnTabVal.push(item);
                this.$message({
                  message:'添加商品明细成功',
                  type:'success'
                });
                this.proDtlMask = false;
              }else{
                this.$message.error('数据不完整');
              }
            }
          });
        }else{
          this.proDtlVal.map(item=>{
            if(item.newData.purchase_return_quantity>0){
              if(item.newData['suppliers_id']!==undefined && item['newData'].price_differences!==undefined && item['newData'].purchase_return_types_id!==undefined){
                if(this.alreadyIds.indexOf(item.id)==-1){
                  this.updatePurReturnTabVal.push(item);
                  this.alreadyIds.push(item.id);
                  this.proDtlMask = false;
                  this.$message({
                    message:'添加商品明细成功',
                    type:'success'
                  });
                }else{
                  this.updatePurReturnTabVal.map(list=>{
                    if(list.stocks_id==item.id){
                      list.newData = item.newData;
                    }
                  });
                  this.proDtlMask = false;
                  this.$message({
                    message:'添加商品明细成功',
                    type:'success'
                  });
                }
              }else{
                this.$message.error('数据不完整');
              }
            }
          });
        }
      },
      cancelAddProDtl(){
        this.proDtlMask = false;
      },
      /*修改*/
      updatePurReturn(){
        this.alreadyIds = [];
        if (this.newOpt[1].nClick) {
          return
        } else {
          this.cancelOrder = '';
          this.updatePurOrder = '';
          this.updatePurReturnMask = true;
          this.updatePurReturnTabVal =[];
          let id = this.checkboxId?this.checkboxId:this.curRowId;
          this.$fetch(this.urls.purchasereturns + '/' + id,{'include':'purchaseReturnDetails.stock.productComponent,purchaseReturnDetails.stock.product,purchaseReturnDetails.stock.warehouse,purchaseReturnDetails.supplier,purchaseReturnDetails.purchaseReturnType'}).then(res => {
            this.updatePurReturnFormVal = {
              purchase_return_no: res.purchase_return_no,
              remark: res.remark,
              status: res.status
            };
            if(res['purchaseReturnDetails']['data'].length>0){
              res['purchaseReturnDetails']['data'].map(item=>{
                this.alreadyIds.push(item.stocks_id);
                let product = item['stock']['product'];
                let productComponent = item['stock']['productComponent'];
                let warehouse = item['stock']['warehouse'];
                let resData = {
                  id: item.id,
                  stocks_id: item.stocks_id,
                  productComponent:{
                    img_url: productComponent.img_url,
                    component_code: productComponent.component_code,
                    spec: productComponent.spec,
                  },
                  product:{
                    commodity_code: product.commodity_code,
                    short_name: product.short_name,
                  },
                  warehouse:{
                    name: warehouse.name,
                  },
                  quantity: item['stock']['quantity'],
                  newData:{
                    purchase_return_quantity: item.purchase_return_quantity,
                    suppliers_id: item.suppliers_id,
                    price_differences: item.price_differences,
                    purchase_return_types_id: item.purchase_return_types_id
                  },
                };
                this.updatePurReturnTabVal.push(resData);
              });
            }
          }, err => {
            console.log(err);
          })
        }
      },
      updatePurReturnRCName({row,rowIndex}){row.index = rowIndex},
      updatePurReturnRClick(row){
        this.updatePurReturnRIndex = `index${row.index}`;
      },
      updatePurReturnDel(row,index){
        if(row.stocks_id){
          this.$del(this.urls.purchasereturndetails+'/'+row.id)
            .then(()=>{
              this.updatePurReturnTabVal.splice(index,1);
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
        }else{
          this.updatePurReturnTabVal.splice(index,1);
          this.$message({
            message: '删除成功',
            type: 'success'
          });
        }
      },
      updatePurReturnConfirm(){
        let updateData = {
          remark: this.updatePurReturnFormVal.remark,
          status: this.updatePurReturnFormVal.status,
          purchase_return_details: []
        };
        this.updatePurReturnTabVal.map(item=>{
          if(item.stocks_id){
            let purReDtl = {
              id: item.id,
              stocks_id: item.stocks_id,
              purchase_return_quantity: item['newData'].purchase_return_quantity,
              suppliers_id: item['newData'].suppliers_id,
              price_differences: item['newData'].price_differences,
              purchase_return_types_id: item['newData'].purchase_return_types_id,
            };
            updateData['purchase_return_details'].push(purReDtl);
          }else{
            let purReDtl = {
              stocks_id: item.id,
              purchase_return_quantity: item['newData'].purchase_return_quantity,
              suppliers_id: item['newData'].suppliers_id,
              price_differences: item['newData'].price_differences,
              purchase_return_types_id: item['newData'].purchase_return_types_id,
            };
            updateData['purchase_return_details'].push(purReDtl);
          }
        });
        let id = this.checkboxId?this.checkboxId:this.curRowId;
        this.$patch(this.urls.purchasereturns+'/'+id,updateData)
          .then(()=>{
            this.updatePurReturnMask = false;
            this.refresh();
            this.$message({
              message: '退货单修改成功',
              type: 'success'
            })
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
      updatePurReturnCancel(){
        this.updatePurReturnMask = false;
        this.$message({
          message:'取消修改退货单',
          type:'info'
        })
      },
      /*删除单条*/
      delSingle(row,e){
        this.showDel = true;
        $('.el-popper').css({left: e.x - 100 + 'px', top: e.y - 125 + 'px'});
        this.delId = row.id;
        this.delUrl = row['purchaseReturnDetails']?this.urls.purchasereturns:this.urls.purchasereturndetails;
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
      /*删除批量*/
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
            this.$del(this.urls.purchasereturns, {ids: this.ids})
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
            this.newOpt[1].nClick = false;
            this.newOpt[2].nClick = false;
            this.newOpt[3].nClick = false;
            this.newOpt[4].nClick = true;
            this.newOpt[5].nClick = true;
            this.newOpt[6].nClick = true;
            this.$fetch(this.urls.purchasereturns+'?page='+page,{'is_submit': false,'include':'purchaseReturnDetails.stock.productComponent,purchaseReturnDetails.stock.product,purchaseReturnDetails.supplier,purchaseReturnDetails.purchaseReturnType'})
              .then(res => {
                this.noSubmitData = res.data;
                this.loading = false;
                this.purReturnDtl = [];
                let pg = res.meta.pagination;
                this.$store.dispatch('currentPage', pg.current_page);
                this.$store.commit('PER_PAGE', pg.per_page);
                this.$store.commit('PAGE_TOTAL', pg.total);
                if(res.data[0]['purchaseReturnDetails']['data'].length>0){
                  res.data[0]['purchaseReturnDetails']['data'].map(item=>{
                    let productComponent = item['stock']['productComponent'];
                    let product = item['stock']['product'];
                    let list ={
                      id: item.id,
                      img_url: productComponent.img_url,
                      commodity_code:product.commodity_code,
                      component_code: productComponent.component_code,
                      short_name: product.short_name,
                      spec: productComponent.spec,
                      price_differences: item.price_differences,
                      purchase_return_quantity: item.purchase_return_quantity,
                      supplierName: item['supplier'].name,
                      warehouseName: item['stock']['warehouse'].name,
                      purchaseReturnTypeName: item['purchaseReturnType']['name'],
                    };
                    this.purReturnDtl.push(list);
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
            this.newOpt[1].nClick = true;
            this.newOpt[2].nClick = false;
            this.newOpt[3].nClick = true;
            this.newOpt[4].nClick = false;
            this.newOpt[5].nClick = false;
            this.newOpt[6].nClick = true;
            this.$fetch(this.urls.purchasereturns+'?page='+page,{'is_audit': false,include:'purchaseReturnDetails.stock.productComponent,purchaseReturnDetails.stock.product,purchaseReturnDetails.supplier,purchaseReturnDetails.purchaseReturnType'})
              .then(res => {
                this.noAuditData = res.data;
                this.loading = false;
                this.purReturnDtl = [];
                let pg = res.meta.pagination;
                this.$store.dispatch('currentPage', pg.current_page);
                this.$store.commit('PER_PAGE', pg.per_page);
                this.$store.commit('PAGE_TOTAL', pg.total);
                if(res.data[0]['purchaseReturnDetails']['data'].length>0){
                  res.data[0]['purchaseReturnDetails']['data'].map(item=>{
                    let productComponent = item['stock']['productComponent'];
                    let product = item['stock']['product'];
                    let list ={
                      id: item.id,
                      img_url: productComponent.img_url,
                      commodity_code:product.commodity_code,
                      component_code: productComponent.component_code,
                      short_name: product.short_name,
                      spec: productComponent.spec,
                      price_differences: item.price_differences,
                      purchase_return_quantity: item.purchase_return_quantity,
                      supplierName: item['supplier'].name,
                      warehouseName: item['stock']['warehouse'].name,
                      purchaseReturnTypeName: item['purchaseReturnType']['name'],
                    };
                    this.purReturnDtl.push(list);
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
          case 2:
            this.newOpt[1].nClick = true;
            this.newOpt[2].nClick = true;
            this.newOpt[3].nClick = true;
            this.newOpt[4].nClick = true;
            this.newOpt[5].nClick = true;
            this.newOpt[6].nClick = false;
            this.$fetch(this.urls.purchasereturns+'?page='+page,{'is_audit': true,include:'purchaseReturnDetails.stock.productComponent,purchaseReturnDetails.stock.product,purchaseReturnDetails.stock.warehouse,purchaseReturnDetails.supplier,purchaseReturnDetails.purchaseReturnType'})
              .then(res => {
                this.alreadyAuditData = res.data;
                this.loading = false;
                this.purReturnDtl = [];
                let pg = res.meta.pagination;
                this.$store.dispatch('currentPage', pg.current_page);
                this.$store.commit('PER_PAGE', pg.per_page);
                this.$store.commit('PAGE_TOTAL', pg.total);
                if(res.data[0]['purchaseReturnDetails']['data'].length>0){
                  res.data[0]['purchaseReturnDetails']['data'].map(item=>{
                    let productComponent = item['stock']['productComponent'];
                    let product = item['stock']['product'];
                    let list ={
                      id: item.id,
                      img_url: productComponent.img_url,
                      commodity_code:product.commodity_code,
                      component_code: productComponent.component_code,
                      short_name: product.short_name,
                      spec: productComponent.spec,
                      price_differences: item.price_differences,
                      purchase_return_quantity: item.purchase_return_quantity,
                      supplierName: item['supplier'].name,
                      warehouseName: item['stock']['warehouse'].name,
                      purchaseReturnTypeName: item['purchaseReturnType']['name'],
                    };
                    this.purReturnDtl.push(list);
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
            break
        }
      },
      /*刷新*/
      refresh(){
        this.loading = true;
        this.fetchData();
      }
    },
    mounted() {
      this.fetchData();
      this.$store.dispatch('setOpt', this.newOpt);
      const that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt', that.newOpt);
      })
    }
  }
</script>
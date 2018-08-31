webpackJsonp([7],{

/***/ 451:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(517)
/* template */
var __vue_template__ = __webpack_require__(518)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources\\assets\\js\\views\\purchase\\purchaseOrder.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-50a9f65f", Component.options)
  } else {
    hotAPI.reload("data-v-50a9f65f", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 517:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      newOpt: [{
        cnt: '新增',
        icon: 'bf-add',
        ent: this.addNew
      }, {
        cnt: '修改',
        icon: 'bf-change',
        ent: this.updatePur,
        nClick: false
      }, {
        cnt: '删除',
        icon: 'bf-del',
        ent: this.delMore,
        nClick: false
      }, {
        cnt: '提交',
        icon: 'bf-submit',
        ent: this.doCommit,
        nClick: false
      }, {
        cnt: '审核',
        icon: 'bf-audit',
        ent: this.doAudit,
        nClick: false
      }, {
        cnt: '退审',
        icon: 'bf-auditfaild',
        ent: this.test
      }, {
        cnt: '导入',
        icon: 'bf-in',
        ent: this.test
      }, {
        cnt: '导出',
        icon: 'bf-out',
        ent: this.test
      }, {
        cnt: '订单采购',
        icon: 'bf-purchase',
        ent: this.test
      }, {
        cnt: '生产排单',
        icon: 'bf-machie',
        ent: this.test
      }, {
        cnt: '打印',
        icon: 'bf-printer',
        ent: this.doPrinter,
        nClick: false
      }, {
        cnt: '刷新',
        icon: 'bf-refresh',
        ent: this.refresh
      }],
      filterBox: false,
      searchBox: {
        vip_name: '',
        order_num: '',
        order_man: '',
        order_phone: '',
        order_money: '',
        order_address: '',
        order_goods: '',
        order_staff: '',
        order_promiseDate: '',
        order_workDate: '',
        order_transMStart: '',
        order_transMEnd: '',
        orderCompany: [{ label: 'ceshi', value: 0 }],
        order_customerInves: '',
        order_mark: '',
        order_flag: '',
        ordertbFlag: [{ label: 'ceshi', value: 0 }],
        order_lock: '',
        orderLock: [{ label: 'ceshi', value: 0 }],
        order_company: '',
        order_shop: '',
        orderShops: [{ label: 'ceshi', value: 0 }]
      },
      topActiveName: '0',
      tableHead: [{
        label: '采购单编号',
        width: '200',
        prop: 'purchase_order_no',
        type: 'text'
      }, {
        label: '状态',
        width: '120',
        prop: 'purchase_status',
        type: 'text'
      }, {
        label: '订单编号',
        width: '180',
        prop: 'order_no',
        type: 'text'
      }, {
        label: '创建人',
        width: '120',
        prop: 'user',
        inProp: 'username',
        type: 'text'
      },
      /* {
         label: '创建日期',
         width: '180',
         // prop: 'created_at',
         prop: '',
         type: 'text',
       },*/
      {
        label: '打印时间',
        width: '200',
        prop: 'print_at',
        inProp: 'date',
        type: 'text'
      },
      /* {
        label: '审核时间',
        width: '120',
        prop: '',
        type: 'text',
      },*/
      {
        label: '承诺发货时间',
        width: '180',
        prop: 'promise_ship_time',
        type: 'text'
      }, {
        label: '客户名',
        width: '120',
        prop: 'client_name',
        type: 'text'
      }, {
        label: '买家昵称',
        width: '120',
        prop: 'buyer_nick',
        type: 'text'
      },
      /*{
        label: '省市区',
        width: '150',
        prop: 'order_address',
        type: 'text',
      },*/
      {
        label: '采购收货人',
        width: '120',
        prop: 'receiver',
        type: 'text'
      }, {
        label: '采购收货地址',
        width: '160',
        prop: 'receiver_address',
        type: 'text'
      }, {
        label: '备注',
        width: '180',
        prop: 'remark',
        type: 'text'
      }, {
        label: '采购单来源',
        width: '140',
        prop: 'source',
        type: 'text'
      }, {
        label: '原订单业务员',
        width: '120',
        prop: 'business_personnel',
        type: 'text'
      }, {
        label: '提交',
        width: '120',
        prop: 'is_submit',
        type: 'checkbox'
      }, {
        label: '打印',
        width: '120',
        prop: 'is_print',
        type: 'checkbox'
      }, {
        label: '审核',
        width: '120',
        prop: 'is_audit',
        type: 'checkbox'
      }, {
        label: '修改',
        width: '120',
        prop: 'is_change',
        type: 'checkbox'
      }],
      getsInfo: [],
      newData: [],
      partData: [],
      finishData: [],
      newLoading: true,
      partLoading: true,
      finishLoading: true,
      delArr: [],
      updateId: '',
      multipleSelection: [],
      addPurchaseMask: false,
      moreForms: true,
      threeParts: true,
      addPurchaseSkuVal: [],
      addPurSkuStagId: [],
      /*采购明细*/
      addPurchaseSkuHead: [{
        label: 'sku名称',
        prop: 'name',
        type: 'text'
      }],
      addPurCurSkuData: {},
      addPurchaseCompHead: [{
        label: '子件图片',
        width: '120',
        prop: "img_url",
        type: 'img'
      }, {
        label: '子件编码',
        width: '120',
        prop: "component_code",
        type: 'text'
      }, {
        label: '子件名称',
        width: '120',
        prop: "spec",
        type: 'text'
      }, {
        label: '库存数',
        width: '120',
        prop: '',
        inProp: "",
        type: 'number'
      }, {
        label: '订单数',
        width: '120',
        prop: '',
        inProp: "",
        type: 'number'
      }, {
        label: '在途数',
        width: '120',
        prop: '',
        inProp: "",
        type: 'number'
      }, {
        label: '在途数(提交)',
        width: '120',
        prop: '',
        inProp: "",
        type: 'number'
      }, {
        label: '可用数',
        width: '120',
        prop: '',
        inProp: "",
        type: 'number'
      }, {
        label: '已入库数',
        width: '120',
        prop: '',
        inProp: "",
        type: 'number'
      }, {
        label: '需采购数',
        width: '120',
        prop: '',
        inProp: "",
        type: 'number'
      }, {
        label: '采购数',
        width: '120',
        prop: 'proPurchaseData',
        inProp: "purchase_quantity",
        type: 'number'
      }, {
        label: '采购店铺',
        width: '120',
        prop: 'proPurchaseData',
        inProp: "shops_id",
        stateVal: 'shops',
        type: 'select'
      }, {
        label: '供应商',
        width: '120',
        prop: 'proPurchaseData',
        inProp: "suppliers_id",
        stateVal: 'suppliers',
        holder: '请选择供应商',
        type: 'select'
      }, {
        label: '采购成本',
        width: '120',
        prop: 'proPurchaseData',
        inProp: "purchase_cost",
        holder: '请输入采购成本',
        type: 'number'
      }, {
        label: '仓库成本',
        width: '120',
        prop: 'proPurchaseData',
        inProp: "warehouse_cost",
        holder: '请输入仓库成本',
        type: 'number'
      }, {
        label: '佣金点',
        width: '120',
        prop: 'proPurchaseData',
        inProp: "commission",
        holder: '请输入佣金点',
        type: 'number'
      }, {
        label: '采购运费',
        width: '120',
        prop: 'proPurchaseData',
        inProp: "purchase_freight",
        holder: '请输入采购运费',
        type: 'number'
      }, {
        label: '折扣',
        width: '120',
        prop: 'proPurchaseData',
        inProp: "discount",
        holder: '请输入折扣',
        type: 'number'
      }, {
        label: '木架费',
        width: '120',
        prop: 'proPurchaseData',
        inProp: "wooden_frame_costs",
        holder: '请输入木架费',
        type: 'number'
      }, {
        label: '到货时间',
        width: '120',
        prop: 'proPurchaseData',
        inProp: "arrival_time",
        holder: '请输入到货时间',
        type: 'datepicker'
      }, {
        label: '备注',
        width: '120',
        prop: 'proPurchaseData',
        inProp: "remark",
        holder: '请输入备注',
        type: 'textarea'
      }],
      addPurchaseCompIndex: '',
      proMask: false,
      specDtlInfo: [],
      proCompRowIndex: '',
      patchData: [],
      idArr: [],
      showDel: false,
      delDtlIndex: '',
      combEdit: '',
      combEditVal: {},
      combProEditHead: [{
        label: '采购数',
        width: '120',
        prop: 'combEditVal',
        inProp: "purchase_quantity",
        holder: '请输入采购数',
        type: 'number'
      }, {
        label: '采购店铺',
        width: '120',
        prop: 'combEditVal',
        inProp: "shops_id",
        holder: '请输入采购店铺',
        type: 'select',
        stateVal: 'shops'
      }, {
        label: '供应商',
        width: '120',
        prop: 'combEditVal',
        inProp: "suppliers_id",
        holder: '请选择供应商',
        type: 'select',
        stateVal: 'suppliers'
      }, {
        label: '到货时间',
        width: '120',
        prop: 'combEditVal',
        inProp: "arrival_time",
        holder: '请输入到货时间',
        type: 'datepicker'
      }, {
        label: '备注',
        width: '120',
        prop: 'combEditVal',
        inProp: "remark",
        holder: '请输入备注',
        type: 'textarea'
      }],
      /*新增采购*/
      addPurchaseHead: [{
        label: '采购单号',
        prop: 'purchase_order_no',
        holder: '系统自动生成',
        type: 'text',
        addChgAble: true
      }, {
        label: '采购状态',
        prop: 'purchase_status',
        holder: '新建',
        type: 'select',
        addChgAble: true
      }, {
        label: '收货人',
        prop: 'receiver',
        holder: '请输入收货人',
        type: 'text'
      }, {
        label: '收货地址',
        prop: 'receiver_address',
        holder: '请输入收货地址',
        type: 'text'
      }, {
        label: '采购备注',
        prop: 'remark',
        holder: '请输入采购备注',
        type: 'textarea'
      }],
      addPurchaseForm: {
        receiver: '',
        receiver_address: '',
        remark: '',
        purchase_lists: []
      },
      addPurchaseRules: {
        receiver: [{ required: true, message: '收货人必填', trigger: 'blur' }],
        receiver_address: [{ required: true, message: '收货地址必填', trigger: 'blur' }]
      },
      addPurchaseCompVal: [],
      /*商品明细*/
      proQuery: {
        commodity_code: '',
        component_code: '',
        shops_id: ''
      },
      proHead: [{
        label: '商品图片',
        prop: "img",
        width: '120',
        type: 'img',
        alt: '商品图片'
      }, {
        label: '店铺',
        prop: "shop",
        inProp: 'nick',
        width: '130',
        type: 'text'
      }, {
        label: '商品简称',
        prop: "short_name",
        width: '150',
        type: 'text'
      }, {
        label: '商品编码',
        prop: "commodity_code",
        width: '160',
        type: 'text'
      }, {
        label: '商品名称',
        prop: "title",
        width: '130',
        type: 'text'
      }, {
        label: '供应商',
        prop: 'supplier',
        inProp: 'name',
        width: '130',
        type: 'text'
      }],
      proRowIndex: '',
      purRow: {},
      purIndex: '',
      activeRow: 'index0',
      proCompVal: [],
      proCompHead: [{
        label: '通用子件',
        width: '90',
        prop: "is_common",
        type: 'checkbox'
      }, {
        label: '子件图片',
        width: '120',
        prop: "img_url",
        type: 'img'
      }, {
        label: '子件编码',
        width: '120',
        prop: "component_code",
        type: 'text'
      }, {
        label: '子件名称',
        width: '120',
        prop: "spec",
        type: 'text'
      }, {
        label: '库存数',
        width: '120',
        prop: "",
        inProp: '',
        type: 'number'
      }, {
        label: '库存预警数',
        width: '120',
        prop: "inventory_warning",
        type: 'number'
      }, {
        label: '订单数',
        width: '120',
        prop: "",
        inProp: '',
        type: 'number'
      }, {
        label: '在途数',
        width: '120',
        prop: "",
        inProp: '',
        type: 'number'
      }, {
        label: '在途数(提交)',
        width: '120',
        prop: "",
        inProp: '',
        type: 'number'
      }, {
        label: '可用数',
        width: '120',
        prop: "",
        inProp: '',
        type: 'number'
      }, {
        label: '采购数',
        width: '120',
        prop: 'proPurchaseData',
        inProp: "purchase_quantity",
        holder: '请输入采购数',
        type: 'number'
      }, {
        label: '采购店铺',
        width: '120',
        prop: 'proPurchaseData',
        inProp: "shops_id",
        holder: '请选择采购店铺',
        stateVal: 'shops',
        type: 'select'
      }, {
        label: '供应商',
        width: '120',
        prop: 'proPurchaseData',
        inProp: "suppliers_id",
        holder: '请选择供应商',
        stateVal: 'suppliers',
        type: 'select'
      }, {
        label: '采购成本',
        width: '120',
        prop: 'proPurchaseData',
        inProp: 'purchase_cost',
        type: 'number'
      }, {
        label: '采购运费',
        width: '120',
        prop: 'proPurchaseData',
        inProp: 'purchase_freight',
        type: 'number'
      }, {
        label: '仓库成本',
        width: '120',
        prop: "proPurchaseData",
        inProp: "warehouse_cost",
        type: 'number'
      }, {
        label: '佣金点',
        width: '120',
        prop: "proPurchaseData",
        inProp: "commission",
        type: 'number'
      }, {
        label: '折扣',
        width: '120',
        prop: "proPurchaseData",
        inProp: "discount",
        type: 'number'
      }, {
        label: '木架费',
        width: '120',
        prop: "proPurchaseData",
        inProp: "wooden_frame_costs",
        type: 'number'
      }, {
        label: '到货时间',
        width: '155',
        prop: 'proPurchaseData',
        inProp: "arrival_time",
        holder: '请输入到货时间',
        type: 'datepicker'
      }, {
        label: '备注',
        width: '120',
        prop: 'proPurchaseData',
        inProp: "remark",
        holder: '请输入备注',
        type: 'textarea'
      }],
      proSkuVal: [],
      proSkuHead: [{
        label: 'sku名称',
        width: '120',
        prop: "name",
        type: 'text'
      }, {
        label: '组合件数',
        width: '120',
        prop: "",
        inProp: '',
        type: 'number'
      }, {
        label: '库存数',
        width: '120',
        prop: "",
        inProp: '',
        type: 'number'
      }, {
        label: '订单数',
        width: '120',
        prop: "",
        inProp: '',
        type: 'number'
      }, {
        label: '在途数(提交)',
        width: '120',
        prop: "",
        inProp: '',
        type: 'number'
      }, {
        label: '可用数',
        width: '120',
        prop: "",
        inProp: '',
        type: 'number'
      }],
      proCurSkuData: {},
      proIndex: '',
      proDtlVal: [],
      proCompValChg: false,
      proCompIndex: '',
      compStagData: [],
      compStagId: [],
      updateCompFlag: false,
      /*修改采购*/
      updatePurMask: false,
      updatePurForm: {},
      updatePurSkuVal: [],
      updatePurCompVal: [],
      updatePurCompIndex: '',
      updatePurSkuStagId: [],
      updatePurSkuIndex: '',
      updateSkuRow: [],
      updateSkuIndex: '',
      /*底部tabs*/
      checkboxInit: false,
      leftActiveName: '0',
      purListVal: [],
      purListHead: [{
        label: '采购名称',
        width: '200',
        prop: "combination",
        inProp: "name",
        type: 'text'
      }],
      rightActiveName: '0',
      purDetailsVal: [],
      delUrl: '',
      purDetailsHead: [{
        label: '子件图片',
        width: '120',
        prop: 'productComponent',
        inProp: "img_url",
        type: 'img'
      }, {
        label: '子件编码',
        width: '120',
        prop: 'productComponent',
        inProp: "component_code",
        type: 'text'
      }, {
        label: '子件名称',
        width: '160',
        prop: 'productComponent',
        inProp: "spec",
        type: 'text'
      }, {
        label: '店铺',
        width: '120',
        prop: "shops_id",
        type: 'select',
        stateVal: 'shops'
      }, {
        label: '供应商',
        width: '120',
        prop: "suppliers_id",
        type: 'select',
        stateVal: 'suppliers'
      }, {
        label: '采购数',
        width: '120',
        prop: "purchase_quantity",
        type: 'number'
      }, {
        label: '采购成本',
        width: '100',
        prop: "purchase_cost",
        type: 'number'
      }, {
        label: '采购运费',
        width: '120',
        prop: "purchase_freight",
        type: 'number'
      }, {
        label: '仓库成本',
        width: '120',
        prop: 'warehouse_cost',
        type: 'number'
      }, {
        label: '已入库数',
        width: '120',
        prop: "stock_in_count",
        type: 'number'
      }, {
        label: '佣金点',
        width: '150',
        prop: 'commission',
        type: 'number'
      }, {
        label: '折扣',
        width: '150',
        prop: 'discount',
        type: 'number'
      }, {
        label: '木架费',
        width: '120',
        prop: "wooden_frame_costs",
        type: 'checkbox'
      },
      /*{
        label: '采购总体积',
        width: '120',
        prop: "is_common",
        type: 'checkbox',
        // chgAble: false,
        // editChgAble: true,
      },*/
      {
        label: '成本价',
        width: '120',
        prop: 'productComponent',
        inProp: "cost",
        type: 'number'
      },
      /* {
         label: '成本总价',
         width: '150',
         prop: "inventory_warning",
         type: 'number'
       },*/
      {
        label: '体积',
        width: '120',
        prop: 'productComponent',
        inProp: "volume",
        type: 'number'
      }, {
        label: '库存数',
        width: '120',
        prop: "",
        type: 'number'
      }, {
        label: '订出数',
        width: '120',
        prop: "",
        type: 'number'
      }, {
        label: '在途数',
        width: '120',
        prop: "",
        type: 'number'
      }, {
        label: '在途数(提交)',
        width: '130',
        prop: "",
        type: 'number'
      }, {
        label: '可用数',
        width: '120',
        prop: "",
        type: 'number'
      }, {
        label: '需采购数',
        width: '130',
        prop: "",
        type: 'number'
      }, {
        label: '到货时间',
        width: '150',
        prop: "arrival_time",
        type: 'text'
      }, {
        label: '状态',
        width: '130',
        prop: "purchase_item_status",
        type: 'text'
      }, {
        label: '备注',
        width: '120',
        prop: "remark",
        type: 'textarea'
      }],
      hkey_path: "HKEY_CURRENT_USER\\Software\\Microsoft\\Internet Explorer\\PageSetup\\"

    };
  },

  computed: {
    resData: {
      get: function get() {
        return this.$store.state.responseData;
      },
      set: function set() {}
    },
    urls: {
      get: function get() {
        return this.$store.state.urls;
      },
      set: function set() {}
    }
  },
  methods: {
    test: function test() {
      console.log(1);
    },

    /*查询*/
    handleQuery: function handleQuery() {},
    toggleShow: function toggleShow() {
      this.filterBox = !this.filterBox;
    },
    resets: function resets() {
      this.searchBox = {};
    },

    /*获取采购数据*/
    clickTopTabs: function clickTopTabs() {
      this.fetchPurchaseData();
    },
    fetchPurchaseData: function fetchPurchaseData() {
      var _this = this;

      var index = this.topActiveName - 0;
      switch (index) {
        case 0:
          this.newOpt[1].nClick = false;
          this.newOpt[2].nClick = false;
          this.newOpt[3].nClick = false;
          this.$fetch(this.urls.purchases, { purchase_status: 'new', include: 'user,purchaseLists.purchaseDetails.productComponent,purchaseLists.combination' }).then(function (res) {
            _this.newLoading = false;
            _this.newData = res.data;
            _this.checkboxInit = false;
            var pg = res.meta.pagination;
            if (res.data[0] && res.data[0]['purchaseLists']['data'][0]) {
              _this.purListVal = res.data[0]['purchaseLists']['data'][0];
              _this.purDetailsVal = res.data[0].purchase_lists['data'][0]['purchaseDetails']['data'];
            }
            _this.$store.dispatch('currentPage', pg.current_page);
            _this.$store.commit('PER_PAGE', pg.per_page);
            _this.$store.commit('PAGE_TOTAL', pg.total);
            _this.$store.dispatch('suppliers', '/suppliers');
            _this.$store.dispatch('shops', '/shops');
          }, function (err) {
            if (err.response) {
              var arr = err.response.data.errors;
              var arr1 = [];
              for (var i in arr) {
                arr1.push(arr[i]);
              }
              var str = arr1.join(',');
              _this.$message.error({
                message: str
              });
            }
          });
          break;
        case 1:
          this.newOpt[1].nClick = true;
          this.newOpt[2].nClick = true;
          this.newOpt[3].nClick = false;
          this.$fetch(this.urls.purchases, { purchase_status: 'section', include: 'user,purchaseLists.purchaseDetails,purchaseLists.combination' }).then(function (res) {
            _this.partLoading = false;
            _this.partData = res.data;
            _this.checkboxInit = false;
            if (res.data[0] && res.data[0]['purchaseLists']['data'][0]) {
              _this.purListVal = res.data[0]['purchaseLists']['data'][0];
              _this.purDetailsVal = res.data[0].purchase_lists['data'][0]['purchaseDetails']['data'];
            }
            var pg = res.meta.pagination;
            _this.$store.dispatch('currentPage', pg.current_page);
            _this.$store.commit('PER_PAGE', pg.per_page);
            _this.$store.commit('PAGE_TOTAL', pg.total);
          }, function (err) {
            if (err.response) {
              var arr = err.response.data.errors;
              var arr1 = [];
              for (var i in arr) {
                arr1.push(arr[i]);
              }
              var str = arr1.join(',');
              _this.$message.error({
                message: str
              });
            }
          });
          break;
        case 2:
          this.newOpt[1].nClick = true;
          this.newOpt[2].nClick = true;
          this.newOpt[3].nClick = true;
          this.$fetch(this.urls.purchases, { purchase_status: 'finish', include: 'user,purchaseLists.purchaseDetails,purchaseLists.combination' }).then(function (res) {
            _this.finishLoading = false;
            _this.finishData = res.data;
            _this.checkboxInit = false;
            if (res.data[0] && res.data[0]['purchaseLists']['data'][0]) {
              _this.purListVal = res.data[0]['purchaseLists']['data'][0];
              _this.purDetailsVal = res.data[0].purchase_lists['data'][0]['purchaseDetails']['data'];
            }
            var pg = res.meta.pagination;
            _this.$store.dispatch('currentPage', pg.current_page);
            _this.$store.commit('PER_PAGE', pg.per_page);
            _this.$store.commit('PAGE_TOTAL', pg.total);
          }, function (err) {
            if (err.response) {
              var arr = err.response.data.errors;
              var arr1 = [];
              for (var i in arr) {
                arr1.push(arr[i]);
              }
              var str = arr1.join(',');
              _this.$message.error({
                message: str
              });
            }
          });
          break;
      }
    },
    purRCName: function purRCName(_ref) {
      var row = _ref.row,
          rowIndex = _ref.rowIndex;

      row.index = rowIndex;
    },
    purRowClick: function purRowClick(row) {
      this.purRow = row;
      // this.activeRow = 'index'+row.index;
      // this.$refs.newTable.toggleRowSelection(row);
      // this.$refs.partTable.toggleRowSelection(row);
      // this.$refs.finishTable.toggleRowSelection(row);
      this.purListVal = row['purchaseLists']['data'];
      this.purIndex = row.index;
      if (row['purchaseLists']['data'][0]) {
        this.purDetailsVal = row['purchaseLists']['data'][0]['purchaseDetails']['data'];
      } else {
        this.purDetailsVal = [];
      }
      this.newOpt[1].nClick = row['is_change'] ? true : false;
      this.newOpt[3].nClick = row['is_submit'] ? true : false;
      this.newOpt[10].nClick = row['is_print'] ? true : false;
      this.newOpt[4].nClick = row['is_audit'] ? true : false;
      // this.rowStyle({row, rowIndex});
    },
    purListRowClick: function purListRowClick(row) {
      this.purDetailsVal = row['purchaseDetails']['data'];
    },
    purListDtl: function purListDtl(row, e) {
      this.showDel = true;
      $('.el-popper').css({ left: e.x - 100 + 'px', top: e.y - 125 + 'px' });
      this.delId = row.id;
      if (row.purchase_order_no) {
        this.delUrl = this.urls.purchases;
      } else if (row['purchases_id']) {
        this.delUrl = this.urls.purchaselists;
      } else if (row['purchase_lists_id']) {
        this.delUrl = this.urls.purchasedetails;
      }
    },

    /*刷新*/
    refresh: function refresh() {
      this.newLoading = true;
      this.multipleSelection = [];
      this.checkboxInit = false;
      this.fetchPurchaseData();
    },

    /*新建采购单*/
    addNew: function addNew() {
      this.addPurchaseMask = true;
      this.addPurchaseForm = {
        receiver: '',
        receiver_address: '',
        remark: '',
        purchase_lists: []
      };
      this.addPurchaseSkuVal = [];
      this.addPurchaseCompVal = [];
      this.addPurSkuStagId = [];
    },
    addPurchaseDetail: function addPurchaseDetail() {
      this.proRowIndex = '0';
      this.specDtlInfo = [];
      this.proDtlVal = [];
      this.proSkuVal = [];
      this.proCompVal = [];
      this.addPurchaseSkuVal = [];
      this.proCompRowIndex = '';
      this.proMask = true;
      Object.assign(this.proQuery, this.$options.data().proQuery);
    },
    addCompCName: function addCompCName(_ref2) {
      var row = _ref2.row,
          rowIndex = _ref2.rowIndex;
      row.index = rowIndex;
    },
    addCompRowClick: function addCompRowClick(row) {
      this.addPurchaseCompIndex = 'index' + row.index;
    },
    addPurSkuRowClick: function addPurSkuRowClick(row) {
      this.addPurchaseCompVal = row.compData;
    },
    addPurSkuDel: function addPurSkuDel(index) {
      this.addPurchaseSkuVal.splice(index, 1);
      if (this.addPurchaseSkuVal.length > 0) {
        this.addPurchaseCompVal = this.addPurchaseSkuVal[0].compData;
      } else {
        this.addPurchaseCompVal = [];
      }
    },
    addPurCompDtl: function addPurCompDtl(index) {
      /* this.$confirm('此操作将永久删除该数据, 是否继续?', '提示', {
         confirmButtonText: '确定',
         cancelButtonText: '取消',
         type: 'warning'
       }).then(() => {
         this.addPurchaseSkuVal.splice(index,1);
         this.$message({
           message: '删除成功',
           type: 'success'
         });
       }).catch(() => {
         this.$message({
           type: 'info',
           message: '已取消删除'
         });
       });*/
      this.addPurchaseCompVal.splice(index, 1);
    },
    confirmAddPur: function confirmAddPur() {
      var _this2 = this;

      this.addPurchaseSkuVal.map(function (item) {
        var sku = {
          combinations_id: item.id,
          purchase_details: []
        };
        item.compData.map(function (list) {
          var comp = {
            product_components_id: list.id,
            purchase_quantity: list['proPurchaseData'].purchase_quantity,
            shops_id: list['proPurchaseData'].shops_id,
            suppliers_id: list['proPurchaseData'].suppliers_id,
            purchase_cost: list['proPurchaseData'].purchase_cost,
            warehouse_cost: list['proPurchaseData'].warehouse_cost,
            purchase_freight: list['proPurchaseData'].purchase_freight,
            commission: list['proPurchaseData'].commission,
            discount: list['proPurchaseData'].discount,
            wooden_frame_costs: list['proPurchaseData'].wooden_frame_costs,
            arrival_time: list['proPurchaseData'].arrival_time,
            remark: list['proPurchaseData'].remark
          };
          sku.purchase_details.push(comp);
        });
        _this2.addPurchaseForm.purchase_lists.push(sku);
      });
      this.$post(this.urls.purchases, this.addPurchaseForm).then(function () {
        _this2.$message({
          message: '新建采购单成功',
          type: 'success'
        });
        _this2.addPurchaseMask = false;
        _this2.refresh();
      }, function (err) {
        if (err.response) {
          var arr = err.response.data.errors;
          var arr1 = [];
          for (var i in arr) {
            arr1.push(arr[i]);
          }
          var str = arr1.join(',');
          _this2.$message.error({
            message: str
          });
        }
      });
    },
    cancelAddPur: function cancelAddPur() {
      this.addPurchaseMask = false;
      this.$message({
        message: '取消新建采购单',
        type: 'info'
      });
    },
    dateChg: function dateChg(val) {
      // this.specDtlInfo.arrival_time = val;
    },

    /*查询商品明细*/
    proQueryClick: function proQueryClick() {
      var _this3 = this;

      this.proCompValChg = false;
      this.proCompIndex = '0';
      this.compStagData = [];
      this.compStagId = [];
      this.$fetch(this.urls.products + '/search', { commodity_code: this.proQuery.commodity_code, shops_id: this.proQuery.shops_id, component_code: this.proQuery.commodity_code, include: 'productComponents,shop,supplier,goodsCategory,combinations.productComponents' }).then(function (res) {
        _this3.proDtlVal = res.data;
        if (res.data[0] && res.data[0].combinations['data'][0]['productComponents']['data'].length > 0) {
          res.data[0].combinations['data'][0]['productComponents']['data'].map(function (item) {
            _this3.$set(item, 'proPurchaseData', {
              purchase_quantity: '',
              shops_id: '',
              suppliers_id: '',
              arrival_time: '',
              remark: '',
              purchase_cost: item.purchase_cost,
              purchase_freight: item.purchase_freight,
              warehouse_cost: item.warehouse_cost,
              commission: item.commission,
              discount: item.discount,
              wooden_frame_costs: item.wooden_frame_costs
            });
          });
          _this3.proSkuVal = res.data[0].combinations['data'];
          if (res.data[0].combinations['data'][0]) {
            _this3.proCurSkuData = res.data[0].combinations['data'][0];
          }
          _this3.proCompVal = res.data[0].combinations['data'][0]['productComponents']['data'];
        }
      }, function (err) {
        if (err.response) {
          var arr = err.response.data.errors;
          var arr1 = [];
          for (var i in arr) {
            arr1.push(arr[i]);
          }
          var str = arr1.join(',');
          _this3.$message.error({
            message: str
          });
        }
      });
    },
    proRowCName: function proRowCName(_ref3) {
      var row = _ref3.row,
          rowIndex = _ref3.rowIndex;

      row.index = rowIndex;
    },
    proRowClick: function proRowClick(row) {
      var _this4 = this;

      /*有分页的取id再遍历比较，没有分页的直接去index*/
      this.proRowIndex = row.index;
      this.proCompValChg = false;
      this.compStagData = [];
      this.compStagId = [];
      this.combEdit = '';
      this.proCompRowIndex = '';
      if (row.combinations['data'][0]['productComponents']['data'].length > 0) {
        row.combinations['data'][0]['productComponents']['data'].map(function (item) {
          _this4.$set(item, 'proPurchaseData', {
            purchase_quantity: '',
            shops_id: '',
            suppliers_id: '',
            arrival_time: '',
            remark: '',
            purchase_cost: item.purchase_cost,
            purchase_freight: item.purchase_freight,
            warehouse_cost: item.warehouse_cost,
            commission: item.commission,
            discount: item.discount,
            wooden_frame_costs: item.wooden_frame_costs });
        });
      }
      this.proSkuVal = row.combinations['data'];
      this.proCurSkuData = row.combinations['data'][0];
      this.proCompVal = row.combinations['data'][0]['productComponents']['data'];
    },
    proCompCName: function proCompCName(_ref4) {
      var row = _ref4.row,
          rowIndex = _ref4.rowIndex;

      row.index = rowIndex;
    },
    compValChg: function compValChg() {
      this.proCompValChg = true;
    },
    proCompRowClick: function proCompRowClick(row) {
      var _this5 = this;

      this.proCompRowIndex = 'index' + row.index;
      this.proCompIndex = row.index;
      if (this.proCompValChg) {
        if (this.compStagData.length > 0) {
          if (this.compStagId.indexOf(row.id) == -1) {
            this.compStagData.push(row);
            this.compStagId.push(row.id);
          } else {
            this.compStagData.map(function (item, index) {
              if (item.id == row.id) {
                _this5.compStagData.splice(index, 1);
              }
            });
            this.compStagData.push(row);
          }
        } else {
          this.compStagData.push(row);
          this.compStagId.push(row.id);
        }
        this.proCompValChg = false;
      }
      var newStagData = this.compStagData;
      this.proCurSkuData['compData'] = newStagData;
    },
    confirmAddProDtl: function confirmAddProDtl() {
      var _this6 = this;

      if (this.addPurchaseMask) {
        if (this.proCurSkuData.compData.length > 0) {
          this.proCurSkuData.compData.map(function (compItem) {
            for (var i in compItem['proPurchaseData']) {
              if (compItem['proPurchaseData'][i] == '') {
                _this6.$message.error("数据不完整不能添加");
              }
            }
          });
        }
        var stagSku = this.proCurSkuData;
        if (this.addPurchaseSkuVal.length > 0) {
          if (this.addPurSkuStagId.indexOf(stagSku.id) == -1) {
            this.addPurchaseSkuVal.push(stagSku);
            this.addPurSkuStagId.push(stagSku.id);
          } else {
            this.addPurchaseSkuVal.map(function (item, index) {
              if (item.id == stagSku.id) {
                _this6.addPurchaseSkuVal.splice(index, 1);
              }
            });
            this.addPurchaseSkuVal.push(stagSku);
          }
        } else {
          this.addPurchaseSkuVal.push(stagSku);
          this.addPurSkuStagId.push(stagSku.id);
        }
        this.addPurchaseCompVal = this.addPurchaseSkuVal[0].compData;
        this.$message({
          message: '添加商品明细成功',
          type: 'success'
        });
      } else {
        /*判断sku和子件是否重复*/
        var updateStagSku = this.proCurSkuData;
        // console.log('this.updatePurSkuVal',this.updatePurSkuVal);
        if (updateStagSku.compData) {
          /*sku是否重复*/
          if (this.updatePurSkuVal.length > 0) {
            this.updatePurSkuVal.map(function (skuID) {
              _this6.updatePurSkuStagId.push(skuID.combinations_id);
            });
            if (this.updatePurSkuStagId.indexOf(updateStagSku.id) == -1) {
              this.updatePurForm.purchase_lists.push(updateStagSku);
              this.updatePurSkuStagId.push(updateStagSku.id);
              this.updatePurSkuVal.push({
                name: updateStagSku.name,
                combinations_id: updateStagSku.id,
                compData: updateStagSku.compData,
                is_newAdd: true
              });
              this.$message({
                message: '添加商品明细成功',
                type: 'success'
              });
              this.proCompRowIndex = '';
            } else {
              /*子件是否重复*/
              // console.log('this.updatePurForm',this.updatePurForm);
              this.updatePurForm.purchase_lists.map(function (purList) {
                if (purList.combinations_id == updateStagSku.id) {
                  var is_existId = [];
                  purList['purchaseDetails']['data'].map(function (item) {
                    /*遍历子件*/
                    is_existId.push({
                      id: item.id,
                      combId: item.product_components_id
                    });
                  });
                  /*替换子件id*/
                  updateStagSku.compData.map(function (compItem) {
                    for (var i in is_existId) {
                      if (is_existId[i]['combId'] == compItem.id) {
                        compItem['combId'] = is_existId[i]['id'];
                      }
                    }
                  });

                  var _loop = function _loop(i) {
                    updateStagSku.compData[i]['is_newAdd'] = true;
                    /*删除重复的子件*/
                    if (updateStagSku.compData[i]['combId']) {
                      purList['purchaseDetails']['data'].map(function (item, index) {
                        if (item.id == updateStagSku.compData[i]['combId']) {
                          purList['purchaseDetails']['data'].splice(index, 1);
                        }
                      });
                    }
                    purList['purchaseDetails']['data'].push(updateStagSku.compData[i]);
                    _this6.$message({
                      message: '添加商品明细成功',
                      type: 'success'
                    });
                    _this6.proCompRowIndex = '';
                  };

                  for (var i in updateStagSku.compData) {
                    _loop(i);
                  }
                }
              });
            }
          } else {
            updateStagSku.compData.map(function (item) {
              item['is_newAdd'] = true;
            });
            this.updatePurForm.purchase_lists.push(updateStagSku);
            this.updatePurSkuStagId.push(updateStagSku.id);
            this.updatePurSkuVal.push({
              name: updateStagSku.name,
              combinations_id: updateStagSku.id,
              compData: updateStagSku.compData,
              is_newAdd: true
            });
            this.updatePurCompVal = updateStagSku.compData;
            this.$message({
              message: '添加商品明细成功',
              type: 'success'
            });
            this.proCompRowIndex = '';
          }
        } else {
          this.$message.error("未添加商品子件");
        }
      }
    },
    proSkuCName: function proSkuCName(_ref5) {
      var row = _ref5.row,
          rowIndex = _ref5.rowIndex;

      row.index = rowIndex;
    },
    proSkuRowClick: function proSkuRowClick(row) {
      var _this7 = this;

      this.proCompValChg = false;
      this.proCompIndex = '0';
      this.compStagData = [];
      this.compStagId = [];
      this.proCompRowIndex = '';
      if (row['productComponents']['data'].length > 0) {
        row['productComponents']['data'].map(function (item) {
          _this7.$set(item, 'proPurchaseData', {
            purchase_quantity: '',
            shops_id: '',
            suppliers_id: '',
            arrival_time: '',
            remark: '',
            purchase_cost: item.purchase_cost,
            purchase_freight: item.purchase_freight,
            warehouse_cost: item.warehouse_cost,
            commission: item.commission,
            discount: item.discount,
            wooden_frame_costs: item.wooden_frame_costs
          });
        });
      }
      this.proCompVal = row['productComponents']['data'];
      // this.proCompVal = Object.assign({},row['productComponents']['data']);
      this.proCurSkuData = row;
    },
    cancelAddProDtl: function cancelAddProDtl() {
      this.proMask = false;
    },

    /*修改采购单*/
    updatePur: function updatePur() {
      var _this8 = this;

      this.updatePurSkuVal = [];
      this.updatePurCompVal = [];
      this.updatePurCompIndex = '';
      if (this.newOpt[1].nClick) {
        return;
      } else {
        if (this.multipleSelection.length == 0) {
          this.$message({
            message: '没有选择要修改的数据',
            type: 'warning'
          });
          return;
        } else if (this.multipleSelection.length >= 2) {
          this.$message({
            message: '只能修改单条数据',
            type: 'warning'
          });
          return;
        } else {
          this.updatePurMask = true;
          this.updatePurCompIndex = '0';
          this.updateSkuIndex = '0';
          this.$fetch(this.urls.purchases + '/' + this.updateId, { include: 'user,purchaseLists.purchaseDetails.productComponent,purchaseLists.combination' }).then(function (res) {
            res['purchaseLists'].data.map(function (item) {
              item['purchaseDetails'].data.map(function (list) {
                _this8.$set(list['productComponent'], 'proPurchaseData', {
                  purchase_quantity: list.purchase_quantity,
                  shops_id: list.shops_id,
                  suppliers_id: list.suppliers_id,
                  arrival_time: list.arrival_time,
                  remark: list.remark,
                  purchase_cost: list.purchase_cost,
                  purchase_freight: list.purchase_freight,
                  warehouse_cost: list.warehouse_cost,
                  commission: list.commission,
                  discount: list.discount,
                  wooden_frame_costs: list.wooden_frame_costs
                });
              });
            });
            _this8.updatePurForm = {
              purchase_order_no: res.purchase_order_no,
              receiver: res.receiver,
              receiver_address: res.receiver_address,
              remark: res.remark,
              purchase_lists: res['purchaseLists']['data']
            };
            res['purchaseLists']['data'].map(function (item) {
              _this8.updatePurSkuVal.push({
                name: item['combination']['name'],
                id: item.id,
                combinations_id: item.combinations_id,
                purchase_details: item['purchaseDetails']['data']
              });
              item['purchaseDetails']['data'].map(function (list) {
                list['productComponent']['compId'] = list.id;
              });
            });
            if (res['purchaseLists']['data'][0] && res['purchaseLists']['data'][0]['purchaseDetails']['data'].length > 0) {
              res['purchaseLists']['data'][0]['purchaseDetails']['data'].map(function (list) {
                _this8.$set(list['productComponent'], 'proPurchaseData', {
                  purchase_quantity: list.purchase_quantity,
                  shops_id: list.shops_id,
                  suppliers_id: list.suppliers_id,
                  arrival_time: list.arrival_time,
                  remark: list.remark,
                  purchase_cost: list.purchase_cost,
                  purchase_freight: list.purchase_freight,
                  warehouse_cost: list.warehouse_cost,
                  commission: list.commission,
                  discount: list.discount,
                  wooden_frame_costs: list.wooden_frame_costs
                });
                _this8.updatePurCompVal.push(list['productComponent']);
              });
            }
          }, function (err) {
            console.log(err);
          });
        }
      }
    },
    updateRowCName: function updateRowCName(_ref6) {
      var row = _ref6.row,
          rowIndex = _ref6.rowIndex;
      row.index = rowIndex;
    },
    updatePurSkuRowClick: function updatePurSkuRowClick(row) {
      var _this9 = this;

      /*行点击时，先判断该行是新增的还是数据库存在的*/
      // console.log('sku行数据',row);
      // console.log('sku提交的表单数据',this.updatePurForm);
      this.updateSkuRow = row;
      this.updateSkuIndex = row.index;
      this.updatePurCompIndex = '';
      if (row.is_newAdd) {
        this.updatePurCompVal = row.compData;
      } else {
        this.updatePurCompVal = [];
        row.purchase_details.map(function (item) {
          /*替换*/
          if (item.is_newAdd) {
            _this9.updatePurCompVal.push(item);
          } else {
            item['productComponent']['compId'] = item.id;
            _this9.$set(item['productComponent'], 'proPurchaseData', {
              purchase_quantity: item.purchase_quantity,
              shops_id: item.shops_id,
              suppliers_id: item.suppliers_id,
              arrival_time: item.arrival_time,
              remark: item.remark,
              purchase_cost: item.purchase_cost,
              purchase_freight: item.purchase_freight,
              warehouse_cost: item.warehouse_cost,
              commission: item.commission,
              discount: item.discount,
              wooden_frame_costs: item.wooden_frame_costs
            });
            _this9.updatePurCompVal.push(item['productComponent']);
          }
        });
      }
    },
    updatePurSkuDel: function updatePurSkuDel(row, index) {
      var _this10 = this;

      // console.log(this.updatePurForm.purchase_lists);
      if (row.is_newAdd) {
        /*新增sku*/
        this.updatePurSkuVal.splice(index, 1);
        if (this.updatePurSkuVal[0]) {
          this.updatePurCompVal = this.updatePurSkuVal[0].purchase_details;
        }
        this.$message({
          message: '删除采购sku成功',
          type: 'success'
        });
        this.updatePurForm.purchase_lists.map(function (item, index) {
          if (item.id == row.combinations_id) {
            _this10.updatePurForm.purchase_lists.splice(index, 1);
          }
        });
        /*从sku id数组中删除*/
        this.updatePurSkuStagId.map(function (skuItem, skuIndex) {
          if (skuItem == row.combinations_id) {
            _this10.updatePurSkuStagId.splice(skuIndex, 1);
          }
        });
      } else {
        this.$del(this.urls.purchaselists + '/' + row.id).then(function () {
          _this10.updatePurSkuVal.splice(index, 1);
          _this10.$message({
            message: '删除采购sku成功',
            type: 'success'
          });
          /*对应的子件也要删除*/
          _this10.updatePurCompVal = [];
          if (_this10.updatePurSkuVal.length > 0) {
            _this10.updatePurForm.purchase_lists.map(function (item) {
              if (item.id == _this10.updatePurSkuVal[0]['id']) {
                item['purchaseDetails']['data'].map(function (compItem) {
                  /*如果是新增的*/
                  if (compItem.is_newAdd) {
                    _this10.updatePurCompVal.push(compItem);
                  } else {
                    _this10.$set(compItem['productComponent'], 'proPurchaseData', {
                      purchase_quantity: compItem.purchase_quantity,
                      shops_id: compItem.shops_id,
                      suppliers_id: compItem.suppliers_id,
                      arrival_time: compItem.arrival_time,
                      remark: compItem.remark,
                      purchase_cost: compItem.purchase_cost,
                      purchase_freight: compItem.purchase_freight,
                      warehouse_cost: compItem.warehouse_cost,
                      commission: compItem.commission,
                      discount: compItem.discount,
                      wooden_frame_costs: compItem.wooden_frame_costs
                    });
                    _this10.updatePurCompVal.push(compItem['productComponent']);
                  }
                });
              }
            });
          }
          _this10.updatePurForm.purchase_lists.map(function (item, listIndex) {
            if (item.id == row.id) {
              _this10.updatePurForm.purchase_lists.splice(listIndex, 1);
            }
          });
          _this10.updatePurSkuStagId.map(function (skuItem, skuIndex) {
            if (skuItem == row.id) {
              _this10.updatePurSkuStagId.splice(skuIndex, 1);
            }
          });
        }, function (err) {
          if (err.response) {
            var arr = err.response.data.errors;
            var arr1 = [];
            for (var i in arr) {
              arr1.push(arr[i]);
            }
            var str = arr1.join(',');
            _this10.$message.error({
              message: str
            });
          }
        });
      }
    },
    updateCompCName: function updateCompCName(_ref7) {
      var row = _ref7.row,
          rowIndex = _ref7.rowIndex;
      row.index = rowIndex;
    },
    updateCompRowClick: function updateCompRowClick(row) {
      var _this11 = this;

      /*替换新增和修改*/
      // console.log('子件行数据',row);
      // console.log('子件提交的表单数据',this.updatePurForm);
      // console.log('子件列表',this.updatePurCompVal);
      this.updatePurCompIndex = 'index' + row.index;
      var formData = this.updatePurForm.purchase_lists[this.updateSkuIndex];
      if (this.updateCompFlag) {
        if (formData.compData) {
          /*新增 sku和子件*/
          formData.compData[row.index] = row;
          this.updateCompFlag = false;
        } else {
          if (formData['purchaseDetails']['data'][row.index].productComponent) {
            /*修改*/
            formData['purchaseDetails']['data'][row.index]['productComponent'] = row;
            this.updateCompFlag = false;
          } else {
            /*新增 替换(combId)*/
            var curRow = row;
            formData['purchaseDetails']['data'].map(function (item, index) {
              if (item.id == curRow.id) {
                formData['purchaseDetails']['data'][index] = curRow;
                _this11.updateCompFlag = false;
              }
            });
          }
        }
      }
    },
    updateComp: function updateComp() {
      this.updateCompFlag = true;
    },
    updateDelPurComp: function updateDelPurComp(row, index) {
      var _this12 = this;

      /*原有的还是替换的，都可以通过id删除*/
      // console.log('row',row);
      // console.log('updatePurCompVal',this.updatePurCompVal);
      // console.log('updatePurSkuVal',this.updatePurSkuVal);
      // console.log('updateSkuRow',this.updateSkuRow);
      // console.log('updatePurForm',this.updatePurForm.purchase_lists);
      if (this.updateSkuRow.is_newAdd) {
        /*sku新增*/
        this.updatePurCompVal.splice(index, 1);
        this.$message({
          message: '删除采购子件成功',
          type: 'success'
        });
        /*通过sku id确认唯一性*/
        this.updatePurForm.purchase_lists.map(function (item) {
          if (item.id == row.combinations_id) {
            item.compData.splice(index, 1);
          }
        });
        /*如果当前子件列表为空，sku列表也要界面消失，并且提交数据总消失*/
        if (this.updatePurCompVal.length == 0) {
          this.updatePurSkuVal.splice(this.updateSkuIndex, 1);
          this.updatePurForm.purchase_lists.map(function (list, skuIndex) {
            if (list.id == _this12.updateSkuRow.combinations_id) {
              _this12.updatePurForm.purchase_lists.splice(skuIndex, 1);
            }
          });
          this.updatePurSkuStagId.map(function (skuItem, skuIndex) {
            if (skuItem == row.combinations_id) {
              _this12.updatePurSkuStagId.splice(skuIndex, 1);
            }
          });
        }
      } else {
        if (row.is_newAdd && row.combId) {
          /*替换*/
          this.$del(this.urls.purchasedetails + '/' + row.combId).then(function () {
            _this12.updatePurCompVal.splice(index, 1);
            _this12.updatePurForm.purchase_lists.map(function (item) {
              if (item.id == _this12.updateSkuRow.id) {
                item['purchaseDetails']['data'].splice(index, 1);
              }
            });
            _this12.$message({
              message: '删除采购子件成功',
              type: 'success'
            });
            if (_this12.updatePurCompVal.length == 0) {
              _this12.updatePurSkuVal.splice(_this12.updateSkuIndex, 1);
              _this12.updatePurForm.purchase_lists.map(function (list, skuIndex) {
                if (list.id == _this12.updateSkuRow.combinations_id) {
                  _this12.updatePurForm.purchase_lists.splice(skuIndex, 1);
                }
              });
            };
            _this12.updatePurSkuStagId.map(function (skuItem, skuIndex) {
              if (skuItem == row.combinations_id) {
                _this12.updatePurSkuStagId.splice(skuIndex, 1);
              }
            });
          }, function () {
            _this12.$message.error('未找到该条数据，无法删除');
          });
        } else if (row.is_newAdd && !row.combId) {
          /*新增*/
          this.updatePurCompVal.splice(index, 1);
          this.updatePurForm.purchase_lists.map(function (item) {
            if (item.id == _this12.updateSkuRow.id) {
              item['purchaseDetails']['data'].splice(index, 1);
            }
          });
          this.$message({
            message: '删除采购子件成功',
            type: 'success'
          });
          if (this.updatePurCompVal.length == 0) {
            this.updatePurSkuVal.splice(this.updateSkuIndex, 1);
            this.updatePurForm.purchase_lists.map(function (list, skuIndex) {
              if (list.id == _this12.updateSkuRow.combinations_id) {
                _this12.updatePurForm.purchase_lists.splice(skuIndex, 1);
              }
            });
          };
          this.updatePurSkuStagId.map(function (skuItem, skuIndex) {
            if (skuItem == row.combinations_id) {
              _this12.updatePurSkuStagId.splice(skuIndex, 1);
            }
          });
        } else {
          /*删除*/
          this.$del(this.urls.purchasedetails + '/' + row.compId).then(function () {
            _this12.updatePurCompVal.splice(index, 1);
            _this12.updatePurForm.purchase_lists.map(function (item) {
              if (item.id == _this12.updateSkuRow.id) {
                item['purchaseDetails']['data'].splice(index, 1);
                // item['purchaseDetails']['data']['productComponent']=[];
              }
            });
            _this12.$message({
              message: '删除采购子件成功',
              type: 'success'
            });
            if (_this12.updatePurCompVal.length == 0) {
              _this12.updatePurSkuVal.splice(_this12.updateSkuIndex, 1);
              _this12.updatePurForm.purchase_lists.map(function (list, skuIndex) {
                if (list.id == _this12.updateSkuRow.combinations_id) {
                  _this12.updatePurForm.purchase_lists.splice(skuIndex, 1);
                }
              });
              _this12.updatePurSkuStagId.map(function (skuItem, skuIndex) {
                if (skuItem == row.combinations_id) {
                  _this12.updatePurSkuStagId.splice(skuIndex, 1);
                }
              });
            }
          }, function () {
            _this12.$message.error('未找到该条数据，无法删除');
          });
        }
      }
    },
    updateProDtl: function updateProDtl() {
      this.proMask = true;
      Object.assign(this.proQuery, this.$options.data().proQuery);
      this.proDtlVal = [];
      this.proSkuVal = [];
      this.proCompVal = [];
    },
    confirmUpdatePur: function confirmUpdatePur(id) {
      var _this13 = this;

      if (this.updatePurForm.purchase_lists.length == 0) {
        this.$message.error('采购单不能为空');
        return;
      } else {
        /*完全新增，部分新增，替换，修改*/
        var addSku = {
          receiver: this.updatePurForm.receiver,
          receiver_address: this.updatePurForm.receiver_address,
          remark: this.updatePurForm.remark,
          purchase_lists: []
        };
        this.updatePurForm.purchase_lists.map(function (item) {
          if (item.compData) {
            // console.log('add updatePurForm',this.updatePurForm.purchase_lists);
            /*新增 sku和子件*/
            var purList = {
              combinations_id: '',
              purchase_details: []
            };
            purList['combinations_id'] = item.id;
            item.compData.map(function (list) {
              var comp = {
                product_components_id: list.id,
                purchase_quantity: list['proPurchaseData'].purchase_quantity,
                shops_id: list['proPurchaseData'].shops_id,
                suppliers_id: list['proPurchaseData'].suppliers_id,
                purchase_cost: list['proPurchaseData'].purchase_cost,
                warehouse_cost: list['proPurchaseData'].warehouse_cost,
                purchase_freight: list['proPurchaseData'].purchase_freight,
                commission: list['proPurchaseData'].commission,
                discount: list['proPurchaseData'].discount,
                wooden_frame_costs: list['proPurchaseData'].wooden_frame_costs,
                arrival_time: list['proPurchaseData'].arrival_time,
                remark: list['proPurchaseData'].remark
              };
              purList['purchase_details'].push(comp);
            });
            addSku.purchase_lists.push(purList);
          } else {
            var _purList = {
              id: '',
              combinations_id: '',
              purchase_details: []
            };
            _purList['id'] = item.id;
            _purList['combinations_id'] = item.combinations_id;
            item['purchaseDetails']['data'].map(function (alreadyList) {
              /*有新增或者替换的子件*/
              if (alreadyList.is_newAdd) {
                /*外层有combId 替换子件*/
                if (alreadyList.combId) {
                  var newComp = {
                    is_newAdd: true,
                    id: alreadyList.combId,
                    product_components_id: alreadyList.id,
                    purchase_quantity: alreadyList['proPurchaseData'].purchase_quantity,
                    shops_id: alreadyList['proPurchaseData'].shops_id,
                    suppliers_id: alreadyList['proPurchaseData'].suppliers_id,
                    purchase_cost: alreadyList['proPurchaseData'].purchase_cost,
                    warehouse_cost: alreadyList['proPurchaseData'].warehouse_cost,
                    purchase_freight: alreadyList['proPurchaseData'].purchase_freight,
                    commission: alreadyList['proPurchaseData'].commission,
                    discount: alreadyList['proPurchaseData'].discount,
                    wooden_frame_costs: alreadyList['proPurchaseData'].wooden_frame_costs,
                    arrival_time: alreadyList['proPurchaseData'].arrival_time,
                    remark: alreadyList['proPurchaseData'].remark
                  };
                  _purList['purchase_details'].push(newComp);
                } else {
                  /*没有id 新增子件*/
                  var _newComp = {
                    is_newAdd: true,
                    product_components_id: alreadyList.id,
                    purchase_quantity: alreadyList['proPurchaseData'].purchase_quantity,
                    shops_id: alreadyList['proPurchaseData'].shops_id,
                    suppliers_id: alreadyList['proPurchaseData'].suppliers_id,
                    purchase_cost: alreadyList['proPurchaseData'].purchase_cost,
                    warehouse_cost: alreadyList['proPurchaseData'].warehouse_cost,
                    purchase_freight: alreadyList['proPurchaseData'].purchase_freight,
                    commission: alreadyList['proPurchaseData'].commission,
                    discount: alreadyList['proPurchaseData'].discount,
                    wooden_frame_costs: alreadyList['proPurchaseData'].wooden_frame_costs,
                    arrival_time: alreadyList['proPurchaseData'].arrival_time,
                    remark: alreadyList['proPurchaseData'].remark
                  };
                  _purList['purchase_details'].push(_newComp);
                }
              } else {
                /*修改*/
                var alreadyComp = {
                  id: alreadyList.id,
                  product_components_id: alreadyList.product_components_id,
                  purchase_quantity: alreadyList['productComponent']['proPurchaseData'].purchase_quantity,
                  shops_id: alreadyList['productComponent']['proPurchaseData'].shops_id,
                  suppliers_id: alreadyList['productComponent']['proPurchaseData'].suppliers_id,
                  purchase_cost: alreadyList['productComponent']['proPurchaseData'].purchase_cost,
                  warehouse_cost: alreadyList['productComponent']['proPurchaseData'].warehouse_cost,
                  purchase_freight: alreadyList['productComponent']['proPurchaseData'].purchase_freight,
                  commission: alreadyList['productComponent']['proPurchaseData'].commission,
                  discount: alreadyList['productComponent']['proPurchaseData'].discount,
                  wooden_frame_costs: alreadyList['productComponent']['proPurchaseData'].wooden_frame_costs,
                  arrival_time: alreadyList['productComponent']['proPurchaseData'].arrival_time,
                  remark: alreadyList['productComponent']['proPurchaseData'].remark
                };
                // console.log('alreadyComp',alreadyComp);
                _purList['purchase_details'].push(alreadyComp);
              }
            });
            addSku.purchase_lists.push(_purList);
          }
        });
        this.$patch(this.urls.purchases + '/' + id, addSku).then(function () {
          _this13.$message({
            message: '修改成功',
            type: 'success'
          });
          _this13.updatePurMask = false;
          _this13.refresh();
          _this13.multipleSelection = [];
          _this13.checkboxInit = false;
        }, function (err) {
          if (err.response) {
            var arr = err.response.data.errors;
            var arr1 = [];
            for (var i in arr) {
              arr1.push(arr[i]);
            }
            var str = arr1.join(',');
            _this13.$message.error({
              message: str
            });
          }
        });
      }
    },
    cancelUpdate: function cancelUpdate() {
      this.updatePurMask = false;
      this.$message({
        message: '取消修改采购单',
        type: 'info'
      });
    },

    /*单条删除*/
    delPur: function delPur(row, e) {
      this.showDel = true;
      $('.el-popper').css({ left: e.x - 100 + 'px', top: e.y - 125 + 'px' });
      this.delId = row.id;
      if (row.purchase_order_no) {
        this.delUrl = this.urls.purchases;
      } else if (row['purchases_id']) {
        this.delUrl = this.urls.purchaselists;
      } else if (row['purchase_lists_id']) {
        this.delUrl = this.urls.purchasedetails;
      }
    },
    rowStyle: function rowStyle(_ref8) {
      // console.log((this.purIndex) === rowIndex);
      /* if((this.purIndex) === rowIndex){
         return { "background-color": "red" }
       }*/

      var row = _ref8.row,
          rowIndex = _ref8.rowIndex;
    },
    confirmD: function confirmD(url, id) {
      var _this14 = this;

      this.$del(url + '/' + id).then(function () {
        _this14.$message({
          message: '删除成功',
          type: 'success'
        });
        _this14.showDel = false;
        _this14.refresh();
        if (_this14.newData[0] && _this14.newData[0].purchase_lists[0]) {
          _this14.purListVal = _this14.newData[0].purchase_lists[0];
          _this14.purDetailsVal = _this14.newData[0].purchase_lists[0].purchase_details;
        }
      }, function (err) {
        if (err.response) {
          _this14.showDel = false;
          var arr = err.response.data.errors;
          var arr1 = [];
          for (var i in arr) {
            arr1.push(arr[i]);
          }
          var str = arr1.join(',');
          _this14.$message.error({
            message: str
          });
        }
      });
    },
    cancelD: function cancelD() {
      this.showDel = false;
      this.$message({
        message: '取消删除',
        type: 'info'
      });
    },
    purDetailsDtl: function purDetailsDtl(row, e) {
      this.showDel = true;
      $('.el-popper').css({ left: e.x - 100 + 'px', top: e.y - 125 + 'px' });
      this.delId = row.id;
      if (row.purchase_order_no) {
        this.delUrl = this.urls.purchases;
      } else if (row['purchases_id']) {
        this.delUrl = this.urls.purchaselists;
      } else if (row['purchase_lists_id']) {
        this.delUrl = this.urls.purchasedetails;
      }
    },
    clickRightTabs: function clickRightTabs() {},

    /*批量删除 只针对新建模块*/
    handleSelectionChange: function handleSelectionChange(val) {
      if (val.length != 0) {
        this.updateId = val[0].id;
      } else {
        this.updateId = '';
      }
      this.multipleSelection = val;
      var del = [];
      this.multipleSelection.forEach(function (selectedItem) {
        del.push(selectedItem.id);
      });
      this.delArr = del.join(',');
    },
    delMore: function delMore() {
      var _this15 = this;

      if (this.newOpt[2].nClick) {
        return;
      } else {
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
          }).then(function () {
            _this15.$del(_this15.urls.purchases, { ids: _this15.delArr }).then(function () {
              _this15.$message({
                message: '删除成功',
                type: 'success'
              });
              _this15.refresh();
            }, function (err) {
              if (err.response) {
                var arr = err.response.data.errors;
                var arr1 = [];
                for (var i in arr) {
                  arr1.push(arr[i]);
                }
                var str = arr1.join(',');
                _this15.$message.error({
                  message: str
                });
              }
            });
          }).catch(function () {
            _this15.$message({
              type: 'info',
              message: '已取消删除'
            });
          });
        }
      }
    },

    /*提交  提交之后不能修改*/
    doCommit: function doCommit() {
      var _this16 = this;

      if (this.newOpt[3].nClick) {
        return;
      } else {
        if (this.multipleSelection.length == 0) {
          this.$message({
            message: '没有选择要提交的数据',
            type: 'warning'
          });
          return;
        } else if (this.multipleSelection.length >= 2) {
          this.$message({
            message: '只能修改单条数据',
            type: 'warning'
          });
          return;
        } else {
          this.$put(this.urls.purchases + '/' + this.updateId + '/submit').then(function () {
            _this16.$message({
              message: '提交成功!',
              type: 'success'
            });
            _this16.refresh();
          }, function (err) {
            _this16.$message.error(err.response.data.message);
          });
        }
      }
    },

    /*打印*/
    doPrinter: function doPrinter() {
      var _this17 = this;

      if (!this.newOpt[10].nClick) {
        this.$put(this.urls.purchases + '/' + this.purRow.id + '/print').then(function () {
          _this17.printBtn();
          _this17.$message({
            message: '打印成功!',
            type: 'success'
          });
          _this17.refresh();
        }, function (err) {
          _this17.$message.error(err.response.data.message);
        });
      }
    },
    printBtn: function printBtn() {
      this.remove_ie_header_and_footer();
      var subOutputRankPrint = document.getElementById('subOutputRank-print');
      var newContent = subOutputRankPrint.innerHTML;
      var oldContent = document.body.innerHTML;
      document.body.innerHTML = newContent;
      window.print();
      window.location.reload();
      document.body.innerHTML = oldContent;
      return false;
    },
    remove_ie_header_and_footer: function remove_ie_header_and_footer() {
      try {
        var RegWsh = new ActiveXObject("WScript.Shell");
        RegWsh.RegWrite(this.hkey_path + "header", "");
        RegWsh.RegWrite(this.hkey_path + "footer", "");
      } catch (e) {}
    },

    /*审核*/
    doAudit: function doAudit() {
      var _this18 = this;

      if (!this.newOpt[4].nClick) {
        this.$put(this.urls.purchases + '/' + this.purRow.id + '/audit').then(function () {
          _this18.$message({
            message: '审核成功!',
            type: 'success'
          });
          _this18.refresh();
        }, function (err) {
          _this18.$message.error(err.response.data.message);
        });
      }
    }
  },
  mounted: function mounted() {
    this.fetchPurchaseData();
    this.$store.dispatch('setOpt', this.newOpt);
    var that = this;
    $(window).resize(function () {
      that.$store.dispatch('setOpt', that.newOpt);
    });
  }
});

/***/ }),

/***/ 518:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("div", { staticClass: "search_box" }, [
        _c("div", { staticClass: "searchBox" }, [
          _c(
            "span",
            [
              _c("label", [_vm._v("采购单号")]),
              _vm._v(" "),
              _c("el-input", {
                attrs: { clearable: "" },
                nativeOn: {
                  keyup: function($event) {
                    if (
                      !("button" in $event) &&
                      _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                    ) {
                      return null
                    }
                    return _vm.handleQuery($event)
                  }
                },
                model: {
                  value: _vm.searchBox.vip_name,
                  callback: function($$v) {
                    _vm.$set(
                      _vm.searchBox,
                      "vip_name",
                      typeof $$v === "string" ? $$v.trim() : $$v
                    )
                  },
                  expression: "searchBox.vip_name"
                }
              })
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "span",
            [
              _c("label", [_vm._v("商品名称")]),
              _vm._v(" "),
              _c("el-input", {
                attrs: { clearable: "" },
                nativeOn: {
                  keyup: function($event) {
                    if (
                      !("button" in $event) &&
                      _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                    ) {
                      return null
                    }
                    return _vm.handleQuery($event)
                  }
                },
                model: {
                  value: _vm.searchBox.order_num,
                  callback: function($$v) {
                    _vm.$set(
                      _vm.searchBox,
                      "order_num",
                      typeof $$v === "string" ? $$v.trim() : $$v
                    )
                  },
                  expression: "searchBox.order_num"
                }
              })
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "span",
            [
              _c("label", [_vm._v("规格名称")]),
              _vm._v(" "),
              _c("el-input", {
                attrs: { clearable: "" },
                nativeOn: {
                  keyup: function($event) {
                    if (
                      !("button" in $event) &&
                      _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                    ) {
                      return null
                    }
                    return _vm.handleQuery($event)
                  }
                },
                model: {
                  value: _vm.searchBox.order_man,
                  callback: function($$v) {
                    _vm.$set(
                      _vm.searchBox,
                      "order_man",
                      typeof $$v === "string" ? $$v.trim() : $$v
                    )
                  },
                  expression: "searchBox.order_man"
                }
              })
            ],
            1
          ),
          _vm._v(" "),
          _vm.filterBox
            ? _c(
                "span",
                [
                  _c("label", [_vm._v("供应商")]),
                  _vm._v(" "),
                  _c(
                    "el-select",
                    {
                      attrs: { clearable: "", placeholder: "请选择" },
                      nativeOn: {
                        keyup: function($event) {
                          if (
                            !("button" in $event) &&
                            _vm._k(
                              $event.keyCode,
                              "enter",
                              13,
                              $event.key,
                              "Enter"
                            )
                          ) {
                            return null
                          }
                          return _vm.handleQuery($event)
                        }
                      },
                      model: {
                        value: _vm.searchBox.order_shop,
                        callback: function($$v) {
                          _vm.$set(_vm.searchBox, "order_shop", $$v)
                        },
                        expression: "searchBox.order_shop"
                      }
                    },
                    _vm._l(_vm.resData.suppliers, function(item) {
                      return _c("el-option", {
                        key: item.value,
                        attrs: { label: item.name, value: item.id }
                      })
                    })
                  )
                ],
                1
              )
            : _c(
                "span",
                [
                  _c(
                    "el-button",
                    {
                      attrs: { type: "primary" },
                      on: { click: _vm.handleQuery }
                    },
                    [_vm._v("筛选")]
                  ),
                  _vm._v(" "),
                  _c(
                    "el-button",
                    {
                      staticStyle: { "margin-right": "5px" },
                      on: { click: _vm.resets }
                    },
                    [_vm._v("重置")]
                  ),
                  _vm._v(" "),
                  _c(
                    "span",
                    { on: { click: _vm.toggleShow } },
                    [
                      _c("el-button", { attrs: { type: "text" } }, [
                        _vm._v("展开")
                      ]),
                      _vm._v(" "),
                      _c("i", {
                        staticClass: "el-icon-arrow-down",
                        staticStyle: { color: "#409EFF" }
                      })
                    ],
                    1
                  )
                ],
                1
              )
        ]),
        _vm._v(" "),
        _c(
          "div",
          {
            directives: [
              {
                name: "show",
                rawName: "v-show",
                value: _vm.filterBox,
                expression: "filterBox"
              }
            ],
            staticClass: "searchBox"
          },
          [
            _c(
              "span",
              [
                _c("label", [_vm._v("创建时间")]),
                _vm._v(" "),
                _c("el-date-picker", {
                  attrs: {
                    type: "daterange",
                    "range-separator": "至",
                    "start-placeholder": "开始日期",
                    "end-placeholder": "结束日期"
                  },
                  model: {
                    value: _vm.searchBox.order_promiseDate,
                    callback: function($$v) {
                      _vm.$set(_vm.searchBox, "order_promiseDate", $$v)
                    },
                    expression: "searchBox.order_promiseDate"
                  }
                })
              ],
              1
            ),
            _vm._v(" "),
            _c(
              "span",
              [
                _c("label", [_vm._v("打印时间")]),
                _vm._v(" "),
                _c("el-date-picker", {
                  attrs: {
                    type: "daterange",
                    "range-separator": "至",
                    "start-placeholder": "开始日期",
                    "end-placeholder": "结束日期"
                  },
                  model: {
                    value: _vm.searchBox.order_promiseDate,
                    callback: function($$v) {
                      _vm.$set(_vm.searchBox, "order_promiseDate", $$v)
                    },
                    expression: "searchBox.order_promiseDate"
                  }
                })
              ],
              1
            ),
            _vm._v(" "),
            _c(
              "span",
              [
                _c("label", [_vm._v("承诺时间")]),
                _vm._v(" "),
                _c("el-date-picker", {
                  attrs: {
                    type: "daterange",
                    "range-separator": "至",
                    "start-placeholder": "开始日期",
                    "end-placeholder": "结束日期"
                  },
                  model: {
                    value: _vm.searchBox.order_promiseDate,
                    callback: function($$v) {
                      _vm.$set(_vm.searchBox, "order_promiseDate", $$v)
                    },
                    expression: "searchBox.order_promiseDate"
                  }
                })
              ],
              1
            )
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          {
            directives: [
              {
                name: "show",
                rawName: "v-show",
                value: _vm.filterBox,
                expression: "filterBox"
              }
            ],
            staticClass: "searchBox"
          },
          [
            _c(
              "span",
              [
                _c("label", [_vm._v("到货时间")]),
                _vm._v(" "),
                _c("el-date-picker", {
                  attrs: {
                    type: "daterange",
                    "range-separator": "至",
                    "start-placeholder": "开始日期",
                    "end-placeholder": "结束日期"
                  },
                  model: {
                    value: _vm.searchBox.order_promiseDate,
                    callback: function($$v) {
                      _vm.$set(_vm.searchBox, "order_promiseDate", $$v)
                    },
                    expression: "searchBox.order_promiseDate"
                  }
                })
              ],
              1
            ),
            _vm._v(" "),
            _c(
              "span",
              [
                _c("label", [_vm._v("色号")]),
                _vm._v(" "),
                _c("el-input", {
                  attrs: { clearable: "" },
                  model: {
                    value: _vm.searchBox.order_mark,
                    callback: function($$v) {
                      _vm.$set(_vm.searchBox, "order_mark", $$v)
                    },
                    expression: "searchBox.order_mark"
                  }
                })
              ],
              1
            ),
            _vm._v(" "),
            _c(
              "span",
              [
                _c("label", [_vm._v("合同编号")]),
                _vm._v(" "),
                _c("el-input", {
                  attrs: { clearable: "" },
                  model: {
                    value: _vm.searchBox.order_mark,
                    callback: function($$v) {
                      _vm.$set(_vm.searchBox, "order_mark", $$v)
                    },
                    expression: "searchBox.order_mark"
                  }
                })
              ],
              1
            ),
            _vm._v(" "),
            _c(
              "span",
              [
                _c("label", [_vm._v("买家昵称")]),
                _vm._v(" "),
                _c("el-input", {
                  attrs: { clearable: "" },
                  model: {
                    value: _vm.searchBox.order_mark,
                    callback: function($$v) {
                      _vm.$set(_vm.searchBox, "order_mark", $$v)
                    },
                    expression: "searchBox.order_mark"
                  }
                })
              ],
              1
            )
          ]
        ),
        _vm._v(" "),
        _vm.filterBox
          ? _c(
              "div",
              { staticClass: "opt", staticStyle: { "text-align": "right" } },
              [
                _c(
                  "el-button",
                  { attrs: { type: "primary" }, on: { click: _vm.check } },
                  [_vm._v("筛选")]
                ),
                _vm._v(" "),
                _c("el-button", { on: { click: _vm.resets } }, [
                  _vm._v("重置")
                ]),
                _vm._v(" "),
                _c(
                  "span",
                  {
                    staticStyle: { display: "inline" },
                    on: { click: _vm.toggleShow }
                  },
                  [
                    _c("el-button", { attrs: { type: "text" } }, [
                      _vm._v("收起")
                    ]),
                    _vm._v(" "),
                    _c("i", {
                      staticClass: "el-icon-arrow-up",
                      staticStyle: { color: "#409EFF" }
                    })
                  ],
                  1
                )
              ],
              1
            )
          : _vm._e()
      ]),
      _vm._v(" "),
      _c(
        "el-tabs",
        {
          attrs: { id: "subOutputRank-print" },
          on: { "tab-click": _vm.clickTopTabs },
          model: {
            value: _vm.topActiveName,
            callback: function($$v) {
              _vm.topActiveName = $$v
            },
            expression: "topActiveName"
          }
        },
        [
          _c(
            "el-tab-pane",
            { attrs: { label: "新建", name: "0" } },
            [
              _c(
                "el-table",
                {
                  directives: [
                    {
                      name: "loading",
                      rawName: "v-loading",
                      value: _vm.newLoading,
                      expression: "newLoading"
                    }
                  ],
                  ref: "newTable",
                  attrs: {
                    data: _vm.newData,
                    fit: "",
                    height: "300",
                    "row-class-name": _vm.purRCName,
                    "row-style": _vm.rowStyle
                  },
                  on: {
                    "selection-change": _vm.handleSelectionChange,
                    "row-click": _vm.purRowClick
                  }
                },
                [
                  _c("el-table-column", {
                    attrs: {
                      type: "selection",
                      width: "95",
                      align: "center",
                      checked: _vm.checkboxInit
                    }
                  }),
                  _vm._v(" "),
                  _vm._l(_vm.tableHead, function(item) {
                    return _c("el-table-column", {
                      key: item.prop,
                      attrs: {
                        label: item.label,
                        align: "center",
                        width: item.width
                      },
                      scopedSlots: _vm._u([
                        {
                          key: "default",
                          fn: function(scope) {
                            return [
                              item.type == "select"
                                ? _c("span", [
                                    scope.row[item.prop] == ""
                                      ? _c("span")
                                      : typeof scope.row[item.prop] ==
                                          "object" && item.nmProp
                                        ? _c("span", [
                                            _vm._v(
                                              "\n                         " +
                                                _vm._s(
                                                  scope.row[item.prop][
                                                    item.nmProp
                                                  ]
                                                ) +
                                                "\n                     "
                                            )
                                          ])
                                        : _vm._e()
                                  ])
                                : item.type == "checkbox"
                                  ? _c(
                                      "span",
                                      [
                                        _c("el-checkbox", {
                                          attrs: { disabled: "" },
                                          model: {
                                            value: scope.row[item.prop],
                                            callback: function($$v) {
                                              _vm.$set(
                                                scope.row,
                                                item.prop,
                                                $$v
                                              )
                                            },
                                            expression: "scope.row[item.prop]"
                                          }
                                        })
                                      ],
                                      1
                                    )
                                  : item.type == "img"
                                    ? _c(
                                        "span",
                                        [
                                          _c(
                                            "el-popover",
                                            {
                                              attrs: {
                                                placement: "right",
                                                trigger: "hover",
                                                "popper-class": "picture_detail"
                                              }
                                            },
                                            [
                                              _c("img", {
                                                attrs: {
                                                  src: scope.row[item.prop]
                                                }
                                              }),
                                              _vm._v(" "),
                                              _c("img", {
                                                attrs: {
                                                  slot: "reference",
                                                  src: scope.row[item.prop],
                                                  alt: scope.row[item.alt]
                                                },
                                                slot: "reference"
                                              })
                                            ]
                                          )
                                        ],
                                        1
                                      )
                                    : _c("span", [
                                        scope.row[item.prop]
                                          ? _c("span", [
                                              _vm._v(
                                                "\n                                 " +
                                                  _vm._s(
                                                    item.inProp
                                                      ? scope.row[item.prop][
                                                          item.inProp
                                                        ]
                                                      : scope.row[item.prop]
                                                  ) +
                                                  "\n                             "
                                              )
                                            ])
                                          : _vm._e()
                                      ])
                            ]
                          }
                        }
                      ])
                    })
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: {
                      label: "操作",
                      width: "90",
                      align: "center",
                      fixed: "right"
                    },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            _c(
                              "el-button",
                              {
                                attrs: { size: "mini", type: "danger" },
                                on: {
                                  click: function($event) {
                                    _vm.delPur(scope.row, $event)
                                  }
                                }
                              },
                              [_vm._v("删除")]
                            )
                          ]
                        }
                      }
                    ])
                  })
                ],
                2
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "el-tab-pane",
            { attrs: { label: "部分完成", name: "1" } },
            [
              _c(
                "el-table",
                {
                  directives: [
                    {
                      name: "loading",
                      rawName: "v-loading",
                      value: _vm.partLoading,
                      expression: "partLoading"
                    }
                  ],
                  ref: "partTable",
                  attrs: { data: _vm.partData, fit: "", height: "300" },
                  on: {
                    "selection-change": _vm.handleSelectionChange,
                    "row-click": _vm.purRowClick
                  }
                },
                [
                  _c("el-table-column", {
                    attrs: {
                      type: "selection",
                      width: "95",
                      align: "center",
                      checked: _vm.checkboxInit
                    }
                  }),
                  _vm._v(" "),
                  _vm._l(_vm.tableHead, function(item) {
                    return _c("el-table-column", {
                      key: item.prop,
                      attrs: {
                        label: item.label,
                        align: "center",
                        width: item.width
                      },
                      scopedSlots: _vm._u([
                        {
                          key: "default",
                          fn: function(scope) {
                            return [
                              item.type == "select"
                                ? _c("span", [
                                    scope.row[item.prop] == ""
                                      ? _c("span")
                                      : typeof scope.row[item.prop] ==
                                          "object" && item.nmProp
                                        ? _c("span", [
                                            _vm._v(
                                              "\n                         " +
                                                _vm._s(
                                                  scope.row[item.prop][
                                                    item.nmProp
                                                  ]
                                                ) +
                                                "\n                     "
                                            )
                                          ])
                                        : _vm._e()
                                  ])
                                : item.type == "checkbox"
                                  ? _c(
                                      "span",
                                      [
                                        _c("el-checkbox", {
                                          attrs: { disabled: "" },
                                          model: {
                                            value: scope.row[item.prop],
                                            callback: function($$v) {
                                              _vm.$set(
                                                scope.row,
                                                item.prop,
                                                $$v
                                              )
                                            },
                                            expression: "scope.row[item.prop]"
                                          }
                                        })
                                      ],
                                      1
                                    )
                                  : item.type == "img"
                                    ? _c(
                                        "span",
                                        [
                                          _c(
                                            "el-popover",
                                            {
                                              attrs: {
                                                placement: "right",
                                                trigger: "hover",
                                                "popper-class": "picture_detail"
                                              }
                                            },
                                            [
                                              _c("img", {
                                                attrs: {
                                                  src: scope.row[item.prop]
                                                }
                                              }),
                                              _vm._v(" "),
                                              _c("img", {
                                                attrs: {
                                                  slot: "reference",
                                                  src: scope.row[item.prop],
                                                  alt: scope.row[item.alt]
                                                },
                                                slot: "reference"
                                              })
                                            ]
                                          )
                                        ],
                                        1
                                      )
                                    : _c("span", [
                                        _vm._v(
                                          "\n                     " +
                                            _vm._s(
                                              item.inProp
                                                ? scope.row[item.prop][
                                                    item.inProp
                                                  ]
                                                : scope.row[item.prop]
                                            ) +
                                            "}\n                 "
                                        )
                                      ])
                            ]
                          }
                        }
                      ])
                    })
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: {
                      label: "操作",
                      width: "90",
                      align: "center",
                      fixed: "right"
                    },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            _c(
                              "el-button",
                              {
                                attrs: { size: "mini", type: "danger" },
                                on: {
                                  click: function($event) {
                                    _vm.delPur(scope.row, $event)
                                  }
                                }
                              },
                              [_vm._v("删除")]
                            )
                          ]
                        }
                      }
                    ])
                  })
                ],
                2
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "el-tab-pane",
            { attrs: { label: "已完成", name: "2" } },
            [
              _c(
                "el-table",
                {
                  directives: [
                    {
                      name: "loading",
                      rawName: "v-loading",
                      value: _vm.finishLoading,
                      expression: "finishLoading"
                    }
                  ],
                  ref: "finishTable",
                  attrs: { data: _vm.finishData, fit: "", height: "300" },
                  on: {
                    "selection-change": _vm.handleSelectionChange,
                    "row-click": _vm.purRowClick
                  }
                },
                [
                  _c("el-table-column", {
                    attrs: {
                      type: "selection",
                      width: "95",
                      align: "center",
                      checked: _vm.checkboxInit
                    }
                  }),
                  _vm._v(" "),
                  _vm._l(_vm.tableHead, function(item) {
                    return _c("el-table-column", {
                      key: item.prop,
                      attrs: {
                        label: item.label,
                        align: "center",
                        width: item.width
                      },
                      scopedSlots: _vm._u([
                        {
                          key: "default",
                          fn: function(scope) {
                            return [
                              item.type == "select"
                                ? _c("span", [
                                    scope.row[item.prop] == ""
                                      ? _c("span")
                                      : typeof scope.row[item.prop] ==
                                          "object" && item.nmProp
                                        ? _c("span", [
                                            _vm._v(
                                              "\n                         " +
                                                _vm._s(
                                                  scope.row[item.prop][
                                                    item.nmProp
                                                  ]
                                                ) +
                                                "\n                     "
                                            )
                                          ])
                                        : _vm._e()
                                  ])
                                : item.type == "checkbox"
                                  ? _c(
                                      "span",
                                      [
                                        _c("el-checkbox", {
                                          attrs: { disabled: "" },
                                          model: {
                                            value: scope.row[item.prop],
                                            callback: function($$v) {
                                              _vm.$set(
                                                scope.row,
                                                item.prop,
                                                $$v
                                              )
                                            },
                                            expression: "scope.row[item.prop]"
                                          }
                                        })
                                      ],
                                      1
                                    )
                                  : item.type == "img"
                                    ? _c(
                                        "span",
                                        [
                                          _c(
                                            "el-popover",
                                            {
                                              attrs: {
                                                placement: "right",
                                                trigger: "hover",
                                                "popper-class": "picture_detail"
                                              }
                                            },
                                            [
                                              _c("img", {
                                                attrs: {
                                                  src: scope.row[item.prop]
                                                }
                                              }),
                                              _vm._v(" "),
                                              _c("img", {
                                                attrs: {
                                                  slot: "reference",
                                                  src: scope.row[item.prop],
                                                  alt: scope.row[item.alt]
                                                },
                                                slot: "reference"
                                              })
                                            ]
                                          )
                                        ],
                                        1
                                      )
                                    : _c("span", [
                                        _vm._v(
                                          "\n                     " +
                                            _vm._s(
                                              item.inProp
                                                ? scope.row[item.prop][
                                                    item.inProp
                                                  ]
                                                : scope.row[item.prop]
                                            ) +
                                            "\n                 "
                                        )
                                      ])
                            ]
                          }
                        }
                      ])
                    })
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: {
                      label: "操作",
                      width: "90",
                      align: "center",
                      fixed: "right"
                    },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            _c(
                              "el-button",
                              {
                                attrs: { size: "mini", type: "danger" },
                                on: {
                                  click: function($event) {
                                    _vm.delPur(scope.row, $event)
                                  }
                                }
                              },
                              [_vm._v("删除")]
                            )
                          ]
                        }
                      }
                    ])
                  })
                ],
                2
              )
            ],
            1
          )
        ],
        1
      ),
      _vm._v(" "),
      _c("Pagination", { attrs: { "page-url": this.urls.purchases } }),
      _vm._v(" "),
      _c("div", { staticClass: "clearfix" }, [
        _c(
          "div",
          { staticStyle: { float: "left" } },
          [
            _c(
              "el-tabs",
              {
                model: {
                  value: _vm.leftActiveName,
                  callback: function($$v) {
                    _vm.leftActiveName = $$v
                  },
                  expression: "leftActiveName"
                }
              },
              [
                _c(
                  "el-tab-pane",
                  { attrs: { label: "采购列表", name: "0" } },
                  [
                    _c(
                      "el-table",
                      {
                        staticStyle: { width: "230px", "margin-right": "30px" },
                        attrs: { data: _vm.purListVal, fit: "" },
                        on: { "row-click": _vm.purListRowClick }
                      },
                      [
                        _vm._l(_vm.purListHead, function(item) {
                          return _c("el-table-column", {
                            key: item.prop,
                            attrs: { label: item.label, align: "center" },
                            scopedSlots: _vm._u([
                              {
                                key: "default",
                                fn: function(scope) {
                                  return [
                                    _vm._v(
                                      "\n                                 " +
                                        _vm._s(
                                          scope.row[item.prop][item.inProp]
                                        ) +
                                        "\n                             "
                                    )
                                  ]
                                }
                              }
                            ])
                          })
                        }),
                        _vm._v(" "),
                        _c("el-table-column", {
                          attrs: {
                            label: "操作",
                            width: "90",
                            align: "center"
                          },
                          scopedSlots: _vm._u([
                            {
                              key: "default",
                              fn: function(scope) {
                                return [
                                  _c(
                                    "el-button",
                                    {
                                      attrs: { size: "mini", type: "danger" },
                                      on: {
                                        click: function($event) {
                                          _vm.purListDtl(scope.row, $event)
                                        }
                                      }
                                    },
                                    [_vm._v("删除")]
                                  )
                                ]
                              }
                            }
                          ])
                        })
                      ],
                      2
                    )
                  ],
                  1
                )
              ],
              1
            )
          ],
          1
        ),
        _vm._v(" "),
        _c(
          "div",
          { staticStyle: { overflow: "hidden" } },
          [
            _c(
              "el-tabs",
              {
                on: { "tab-click": _vm.clickRightTabs },
                model: {
                  value: _vm.rightActiveName,
                  callback: function($$v) {
                    _vm.rightActiveName = $$v
                  },
                  expression: "rightActiveName"
                }
              },
              [
                _c(
                  "el-tab-pane",
                  { attrs: { label: "采购明细", name: "0" } },
                  [
                    _c(
                      "el-table",
                      { attrs: { data: _vm.purDetailsVal, fit: "" } },
                      [
                        _vm._l(_vm.purDetailsHead, function(item) {
                          return _c("el-table-column", {
                            key: item.label,
                            attrs: {
                              label: item.label,
                              align: "center",
                              width: item.width
                            },
                            scopedSlots: _vm._u([
                              {
                                key: "default",
                                fn: function(scope) {
                                  return [
                                    item.prop
                                      ? _c("span", [
                                          item.type == "select"
                                            ? _c(
                                                "span",
                                                _vm._l(
                                                  _vm.resData[item.stateVal],
                                                  function(list) {
                                                    return _c(
                                                      "span",
                                                      { key: list.id },
                                                      [
                                                        list.id ==
                                                        scope.row[item.prop]
                                                          ? _c("span", [
                                                              _vm._v(
                                                                "\n                                                " +
                                                                  _vm._s(
                                                                    list.name
                                                                      ? list.name
                                                                      : list.title
                                                                  ) +
                                                                  "\n                                            "
                                                              )
                                                            ])
                                                          : _vm._e()
                                                      ]
                                                    )
                                                  }
                                                )
                                              )
                                            : item.type == "img"
                                              ? _c(
                                                  "span",
                                                  [
                                                    _c(
                                                      "el-popover",
                                                      {
                                                        attrs: {
                                                          placement: "right",
                                                          trigger: "hover",
                                                          "popper-class":
                                                            "picture_detail"
                                                        }
                                                      },
                                                      [
                                                        _c("img", {
                                                          attrs: {
                                                            src:
                                                              scope.row[
                                                                item.prop
                                                              ][item.inProp]
                                                          }
                                                        }),
                                                        _vm._v(" "),
                                                        _c("img", {
                                                          attrs: {
                                                            slot: "reference",
                                                            src:
                                                              scope.row[
                                                                item.prop
                                                              ][item.inProp]
                                                          },
                                                          slot: "reference"
                                                        })
                                                      ]
                                                    )
                                                  ],
                                                  1
                                                )
                                              : _c("span", [
                                                  _vm._v(
                                                    "\n                                        " +
                                                      _vm._s(
                                                        item.inProp
                                                          ? scope.row[
                                                              item.prop
                                                            ][item.inProp]
                                                          : scope.row[item.prop]
                                                      ) +
                                                      "\n                                    "
                                                  )
                                                ])
                                        ])
                                      : _vm._e()
                                  ]
                                }
                              }
                            ])
                          })
                        }),
                        _vm._v(" "),
                        _c("el-table-column", {
                          attrs: {
                            label: "操作",
                            width: "90",
                            align: "center",
                            fixed: "right"
                          },
                          scopedSlots: _vm._u([
                            {
                              key: "default",
                              fn: function(scope) {
                                return [
                                  _c(
                                    "el-button",
                                    {
                                      attrs: { size: "mini", type: "danger" },
                                      on: {
                                        click: function($event) {
                                          _vm.purDetailsDtl(scope.row, $event)
                                        }
                                      }
                                    },
                                    [_vm._v("删除")]
                                  )
                                ]
                              }
                            }
                          ])
                        })
                      ],
                      2
                    )
                  ],
                  1
                ),
                _vm._v(" "),
                _c("el-tab-pane", { attrs: { label: "唯一码", name: "1" } }, [
                  _vm._v("\n                    唯一码\n                ")
                ])
              ],
              1
            )
          ],
          1
        )
      ]),
      _vm._v(" "),
      _c(
        "el-dialog",
        {
          class: { "more-forms": _vm.moreForms, threeParts: _vm.threeParts },
          attrs: { title: "新建采购单", visible: _vm.addPurchaseMask },
          on: {
            "update:visible": function($event) {
              _vm.addPurchaseMask = $event
            }
          }
        },
        [
          _c("el-button", { attrs: { type: "text" } }, [_vm._v("基本信息")]),
          _vm._v(" "),
          _c("add-new", {
            attrs: {
              "rule-form": _vm.addPurchaseForm,
              rules: _vm.addPurchaseRules,
              "add-arr": _vm.addPurchaseHead,
              onlyInputs: true
            }
          }),
          _vm._v(" "),
          _c("div", { staticClass: "clearfix" }, [
            _c(
              "div",
              { staticStyle: { float: "left" } },
              [
                _c("el-button", { attrs: { type: "text" } }, [
                  _vm._v("采购sku")
                ]),
                _vm._v(" "),
                _c(
                  "el-table",
                  {
                    staticStyle: { width: "200px", "margin-right": "50px" },
                    attrs: {
                      data: _vm.addPurchaseSkuVal,
                      fit: "",
                      height: "300"
                    },
                    on: { "row-click": _vm.addPurSkuRowClick }
                  },
                  [
                    _vm._l(_vm.addPurchaseSkuHead, function(item) {
                      return _c("el-table-column", {
                        key: item.prop,
                        attrs: { label: item.label, align: "center" },
                        scopedSlots: _vm._u([
                          {
                            key: "default",
                            fn: function(scope) {
                              return [
                                _vm._v(
                                  "\n                             " +
                                    _vm._s(
                                      scope.row[item.prop] == ""
                                        ? ""
                                        : scope.row[item.prop]
                                    ) +
                                    "\n                             "
                                )
                              ]
                            }
                          }
                        ])
                      })
                    }),
                    _vm._v(" "),
                    _c("el-table-column", {
                      attrs: { label: "操作", width: "90", align: "center" },
                      scopedSlots: _vm._u([
                        {
                          key: "default",
                          fn: function(scope) {
                            return [
                              _c(
                                "el-button",
                                {
                                  attrs: { size: "mini", type: "danger" },
                                  on: {
                                    click: function($event) {
                                      _vm.addPurSkuDel(scope.$index)
                                    }
                                  }
                                },
                                [_vm._v("删除")]
                              )
                            ]
                          }
                        }
                      ])
                    })
                  ],
                  2
                )
              ],
              1
            ),
            _vm._v(" "),
            _c(
              "div",
              { staticStyle: { overflow: "hidden" } },
              [
                _c("el-button", { attrs: { type: "text" } }, [
                  _vm._v("采购子件")
                ]),
                _vm._v(" "),
                _c(
                  "el-table",
                  {
                    attrs: {
                      data: _vm.addPurchaseCompVal,
                      fit: "",
                      height: "300",
                      "row-class-name": _vm.addCompCName
                    },
                    on: { "row-click": _vm.addCompRowClick }
                  },
                  [
                    _vm._l(_vm.addPurchaseCompHead, function(item) {
                      return _c("el-table-column", {
                        key: item.label,
                        attrs: {
                          label: item.label,
                          align: "center",
                          width: item.width
                        },
                        scopedSlots: _vm._u([
                          {
                            key: "default",
                            fn: function(scope) {
                              return [
                                item.prop == "proPurchaseData"
                                  ? _c("span", [
                                      _vm.addPurchaseCompIndex ==
                                      "index" + scope.$index
                                        ? _c("span", [
                                            item.type == "number"
                                              ? _c(
                                                  "span",
                                                  [
                                                    _c("el-input", {
                                                      attrs: {
                                                        size: "small",
                                                        type: "number",
                                                        placeholder: item.holder
                                                      },
                                                      model: {
                                                        value:
                                                          scope.row[item.prop][
                                                            item.inProp
                                                          ],
                                                        callback: function(
                                                          $$v
                                                        ) {
                                                          _vm.$set(
                                                            scope.row[
                                                              item.prop
                                                            ],
                                                            item.inProp,
                                                            typeof $$v ===
                                                            "string"
                                                              ? $$v.trim()
                                                              : $$v
                                                          )
                                                        },
                                                        expression:
                                                          "scope.row[item.prop][item.inProp]"
                                                      }
                                                    })
                                                  ],
                                                  1
                                                )
                                              : item.type == "textarea"
                                                ? _c(
                                                    "span",
                                                    [
                                                      _c("el-input", {
                                                        attrs: {
                                                          type: "textarea",
                                                          size: "small",
                                                          placeholder:
                                                            item.holder
                                                        },
                                                        model: {
                                                          value:
                                                            scope.row[
                                                              item.prop
                                                            ][item.inProp],
                                                          callback: function(
                                                            $$v
                                                          ) {
                                                            _vm.$set(
                                                              scope.row[
                                                                item.prop
                                                              ],
                                                              item.inProp,
                                                              typeof $$v ===
                                                              "string"
                                                                ? $$v.trim()
                                                                : $$v
                                                            )
                                                          },
                                                          expression:
                                                            "scope.row[item.prop][item.inProp]"
                                                        }
                                                      })
                                                    ],
                                                    1
                                                  )
                                                : item.type == "select"
                                                  ? _c(
                                                      "span",
                                                      [
                                                        _c(
                                                          "el-select",
                                                          {
                                                            attrs: {
                                                              placeholder:
                                                                item.holder
                                                            },
                                                            model: {
                                                              value:
                                                                scope.row[
                                                                  item.prop
                                                                ][item.inProp],
                                                              callback: function(
                                                                $$v
                                                              ) {
                                                                _vm.$set(
                                                                  scope.row[
                                                                    item.prop
                                                                  ],
                                                                  item.inProp,
                                                                  $$v
                                                                )
                                                              },
                                                              expression:
                                                                "scope.row[item.prop][item.inProp]"
                                                            }
                                                          },
                                                          _vm._l(
                                                            _vm.resData[
                                                              item.stateVal
                                                            ],
                                                            function(list) {
                                                              return _c(
                                                                "span",
                                                                {
                                                                  key: list.id
                                                                },
                                                                [
                                                                  _c(
                                                                    "el-option",
                                                                    {
                                                                      attrs: {
                                                                        label: list.name
                                                                          ? list.name
                                                                          : list.title,
                                                                        value:
                                                                          list.id
                                                                      }
                                                                    }
                                                                  )
                                                                ],
                                                                1
                                                              )
                                                            }
                                                          )
                                                        )
                                                      ],
                                                      1
                                                    )
                                                  : item.type == "datepicker"
                                                    ? _c(
                                                        "span",
                                                        [
                                                          _c("el-date-picker", {
                                                            attrs: {
                                                              type: "date",
                                                              placeholder:
                                                                "选择日期",
                                                              format:
                                                                "yyyy/MM/dd",
                                                              "value-format":
                                                                "yyyy/MM/dd"
                                                            },
                                                            model: {
                                                              value:
                                                                scope.row[
                                                                  item.prop
                                                                ][item.inProp],
                                                              callback: function(
                                                                $$v
                                                              ) {
                                                                _vm.$set(
                                                                  scope.row[
                                                                    item.prop
                                                                  ],
                                                                  item.inProp,
                                                                  $$v
                                                                )
                                                              },
                                                              expression:
                                                                "scope.row[item.prop][item.inProp]"
                                                            }
                                                          })
                                                        ],
                                                        1
                                                      )
                                                    : _vm._e()
                                          ])
                                        : _c("span", [
                                            item.type == "select"
                                              ? _c(
                                                  "span",
                                                  _vm._l(
                                                    _vm.resData[item.stateVal],
                                                    function(list) {
                                                      return _c(
                                                        "span",
                                                        { key: list.id },
                                                        [
                                                          list.id ==
                                                          scope.row[item.prop][
                                                            item.inProp
                                                          ]
                                                            ? _c("span", [
                                                                _vm._v(
                                                                  "\n                                                 " +
                                                                    _vm._s(
                                                                      list.name
                                                                        ? list.name
                                                                        : list.title
                                                                    ) +
                                                                    "\n                                             "
                                                                )
                                                              ])
                                                            : _vm._e()
                                                        ]
                                                      )
                                                    }
                                                  )
                                                )
                                              : _c("span", [
                                                  _vm._v(
                                                    "\n                                 " +
                                                      _vm._s(
                                                        scope.row[item.prop][
                                                          item.inProp
                                                        ]
                                                      ) +
                                                      "\n                             "
                                                  )
                                                ])
                                          ])
                                    ])
                                  : item.prop
                                    ? _c("span", [
                                        item.type == "checkbox"
                                          ? _c(
                                              "span",
                                              [
                                                _c("el-checkbox", {
                                                  attrs: { disabled: "" },
                                                  model: {
                                                    value: scope.row[item.prop],
                                                    callback: function($$v) {
                                                      _vm.$set(
                                                        scope.row,
                                                        item.prop,
                                                        $$v
                                                      )
                                                    },
                                                    expression:
                                                      "scope.row[item.prop]"
                                                  }
                                                })
                                              ],
                                              1
                                            )
                                          : item.type == "img"
                                            ? _c(
                                                "span",
                                                [
                                                  _c(
                                                    "el-popover",
                                                    {
                                                      attrs: {
                                                        placement: "right",
                                                        trigger: "hover",
                                                        "popper-class":
                                                          "picture_detail"
                                                      }
                                                    },
                                                    [
                                                      _c("img", {
                                                        attrs: {
                                                          src:
                                                            scope.row[item.prop]
                                                        }
                                                      }),
                                                      _vm._v(" "),
                                                      _c("img", {
                                                        attrs: {
                                                          slot: "reference",
                                                          src:
                                                            scope.row[
                                                              item.prop
                                                            ],
                                                          alt:
                                                            scope.row[item.alt]
                                                        },
                                                        slot: "reference"
                                                      })
                                                    ]
                                                  )
                                                ],
                                                1
                                              )
                                            : _c("span", [
                                                _vm._v(
                                                  "\n                          " +
                                                    _vm._s(
                                                      item.inProp
                                                        ? scope.row[item.prop][
                                                            item.inProp
                                                          ]
                                                        : scope.row[item.prop]
                                                    ) +
                                                    "\n                     "
                                                )
                                              ])
                                      ])
                                    : _vm._e()
                              ]
                            }
                          }
                        ])
                      })
                    }),
                    _vm._v(" "),
                    _c("el-table-column", {
                      attrs: { label: "状态", width: "90" },
                      scopedSlots: _vm._u([
                        {
                          key: "default",
                          fn: function(scope) {
                            return [
                              _vm._v(
                                "\n                             " +
                                  _vm._s("新建") +
                                  "\n                         "
                              )
                            ]
                          }
                        }
                      ])
                    }),
                    _vm._v(" "),
                    _c("el-table-column", {
                      attrs: {
                        label: "操作",
                        width: "90",
                        align: "center",
                        fixed: "right"
                      },
                      scopedSlots: _vm._u([
                        {
                          key: "default",
                          fn: function(scope) {
                            return [
                              _c(
                                "el-button",
                                {
                                  attrs: { size: "mini", type: "danger" },
                                  on: {
                                    click: function($event) {
                                      _vm.addPurCompDtl(scope.$index)
                                    }
                                  }
                                },
                                [_vm._v("删除")]
                              )
                            ]
                          }
                        }
                      ])
                    })
                  ],
                  2
                )
              ],
              1
            )
          ]),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "dialog-footer clearfix",
              attrs: { slot: "footer" },
              slot: "footer"
            },
            [
              _c(
                "div",
                { staticStyle: { float: "left" } },
                [
                  _c(
                    "el-button",
                    {
                      attrs: { type: "primary" },
                      on: { click: _vm.addPurchaseDetail }
                    },
                    [_vm._v("增加sku/明细")]
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticStyle: { float: "right" } },
                [
                  _c(
                    "el-button",
                    {
                      attrs: { type: "primary" },
                      on: { click: _vm.confirmAddPur }
                    },
                    [_vm._v("确定")]
                  ),
                  _vm._v(" "),
                  _c("el-button", { on: { click: _vm.cancelAddPur } }, [
                    _vm._v("取消")
                  ])
                ],
                1
              )
            ]
          )
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "el-dialog",
        {
          class: { "more-forms": _vm.moreForms, threeParts: _vm.threeParts },
          attrs: { title: "商品明细", visible: _vm.proMask },
          on: {
            "update:visible": function($event) {
              _vm.proMask = $event
            }
          }
        },
        [
          _c("el-button", { attrs: { type: "text" } }, [_vm._v("选择商品")]),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "searchBox" },
            [
              _c(
                "span",
                [
                  _c("label", [_vm._v("商品编码")]),
                  _vm._v(" "),
                  _c("el-input", {
                    attrs: { clearable: "", placeholder: "请输入商品编码" },
                    nativeOn: {
                      keyup: function($event) {
                        if (
                          !("button" in $event) &&
                          _vm._k(
                            $event.keyCode,
                            "enter",
                            13,
                            $event.key,
                            "Enter"
                          )
                        ) {
                          return null
                        }
                        return _vm.proQueryClick($event)
                      }
                    },
                    model: {
                      value: _vm.proQuery.commodity_code,
                      callback: function($$v) {
                        _vm.$set(
                          _vm.proQuery,
                          "commodity_code",
                          typeof $$v === "string" ? $$v.trim() : $$v
                        )
                      },
                      expression: "proQuery.commodity_code"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "span",
                [
                  _c("label", [_vm._v("子件编码")]),
                  _vm._v(" "),
                  _c("el-input", {
                    attrs: { clearable: "", placeholder: "请输入子件编码" },
                    nativeOn: {
                      keyup: function($event) {
                        if (
                          !("button" in $event) &&
                          _vm._k(
                            $event.keyCode,
                            "enter",
                            13,
                            $event.key,
                            "Enter"
                          )
                        ) {
                          return null
                        }
                        return _vm.proQueryClick($event)
                      }
                    },
                    model: {
                      value: _vm.proQuery.component_code,
                      callback: function($$v) {
                        _vm.$set(
                          _vm.proQuery,
                          "component_code",
                          typeof $$v === "string" ? $$v.trim() : $$v
                        )
                      },
                      expression: "proQuery.component_code"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "span",
                [
                  _c("label", [_vm._v("店铺名称")]),
                  _vm._v(" "),
                  _c(
                    "el-select",
                    {
                      attrs: { clearable: "", placeholder: "请选择店铺名称" },
                      nativeOn: {
                        keyup: function($event) {
                          if (
                            !("button" in $event) &&
                            _vm._k(
                              $event.keyCode,
                              "enter",
                              13,
                              $event.key,
                              "Enter"
                            )
                          ) {
                            return null
                          }
                          return _vm.proQueryClick($event)
                        }
                      },
                      model: {
                        value: _vm.proQuery.shops_id,
                        callback: function($$v) {
                          _vm.$set(_vm.proQuery, "shops_id", $$v)
                        },
                        expression: "proQuery.shops_id"
                      }
                    },
                    _vm._l(_vm.resData.shops, function(item) {
                      return _c("el-option", {
                        key: item.value,
                        attrs: { label: item.nick, value: item.id }
                      })
                    })
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-button",
                {
                  attrs: { type: "primary" },
                  on: { click: _vm.proQueryClick }
                },
                [_vm._v("查询")]
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "el-table",
            {
              attrs: {
                data: _vm.proDtlVal,
                "highlight-current-row": "",
                height: "160",
                "row-class-name": _vm.proRowCName
              },
              on: { "row-click": _vm.proRowClick }
            },
            _vm._l(_vm.proHead, function(item) {
              return _c("el-table-column", {
                key: item.label,
                attrs: {
                  label: item.label,
                  align: "center",
                  width: item.width
                },
                scopedSlots: _vm._u([
                  {
                    key: "default",
                    fn: function(scope) {
                      return [
                        item.type == "img"
                          ? _c(
                              "span",
                              [
                                _c(
                                  "el-popover",
                                  {
                                    attrs: {
                                      placement: "right",
                                      trigger: "hover",
                                      "popper-class": "picture_detail"
                                    }
                                  },
                                  [
                                    _c("img", {
                                      attrs: { src: scope.row[item.prop] }
                                    }),
                                    _vm._v(" "),
                                    _c("img", {
                                      attrs: {
                                        slot: "reference",
                                        src: scope.row[item.prop],
                                        alt: scope.row[item.alt]
                                      },
                                      slot: "reference"
                                    })
                                  ]
                                )
                              ],
                              1
                            )
                          : _c("span", [
                              _vm._v(
                                "\n                          " +
                                  _vm._s(
                                    item.inProp
                                      ? scope.row[item.prop][item.inProp]
                                      : scope.row[item.prop]
                                  ) +
                                  "\n                     "
                              )
                            ])
                      ]
                    }
                  }
                ])
              })
            })
          ),
          _vm._v(" "),
          _c("el-button", { attrs: { type: "text" } }, [_vm._v("sku信息")]),
          _vm._v(" "),
          _c(
            "el-table",
            {
              attrs: {
                data: _vm.proSkuVal,
                fit: "",
                height: "160",
                "row-class-name": _vm.proSkuCName
              },
              on: { "row-click": _vm.proSkuRowClick }
            },
            [
              _vm._l(_vm.proSkuHead, function(item) {
                return _c("el-table-column", {
                  key: item.label,
                  attrs: {
                    label: item.label,
                    align: "center",
                    width: item.width
                  },
                  scopedSlots: _vm._u([
                    {
                      key: "default",
                      fn: function(scope) {
                        return [
                          item.prop
                            ? _c("span", [
                                _vm._v(
                                  "\n                         " +
                                    _vm._s(
                                      item.inProp
                                        ? scope.row[item.prop][item.inProp]
                                        : scope.row[item.prop]
                                    ) +
                                    "\n                        "
                                )
                              ])
                            : _vm._e()
                        ]
                      }
                    }
                  ])
                })
              }),
              _vm._v(" "),
              _vm._l(_vm.combProEditHead, function(each) {
                return _c("el-table-column", {
                  key: each.label,
                  attrs: {
                    label: each.label,
                    align: "center",
                    width: each.width
                  },
                  scopedSlots: _vm._u([
                    {
                      key: "default",
                      fn: function(scope) {
                        return [
                          _vm.combEdit == "index" + scope.$index
                            ? _c("span", [
                                each.type == "number"
                                  ? _c(
                                      "span",
                                      [
                                        _c("el-input", {
                                          attrs: {
                                            size: "small",
                                            type: "number",
                                            placeholder: each.holder
                                          },
                                          model: {
                                            value: _vm.specDtlInfo[each.inProp],
                                            callback: function($$v) {
                                              _vm.$set(
                                                _vm.specDtlInfo,
                                                each.inProp,
                                                typeof $$v === "string"
                                                  ? $$v.trim()
                                                  : $$v
                                              )
                                            },
                                            expression:
                                              "specDtlInfo[each.inProp]"
                                          }
                                        })
                                      ],
                                      1
                                    )
                                  : each.type == "textarea"
                                    ? _c(
                                        "span",
                                        [
                                          _c("el-input", {
                                            attrs: {
                                              type: "textarea",
                                              size: "small",
                                              placeholder: each.holder
                                            },
                                            model: {
                                              value:
                                                _vm.specDtlInfo[each.inProp],
                                              callback: function($$v) {
                                                _vm.$set(
                                                  _vm.specDtlInfo,
                                                  each.inProp,
                                                  typeof $$v === "string"
                                                    ? $$v.trim()
                                                    : $$v
                                                )
                                              },
                                              expression:
                                                "specDtlInfo[each.inProp]"
                                            }
                                          })
                                        ],
                                        1
                                      )
                                    : each.type == "select"
                                      ? _c(
                                          "span",
                                          [
                                            _c(
                                              "el-select",
                                              {
                                                attrs: {
                                                  placeholder: each.holder
                                                },
                                                model: {
                                                  value:
                                                    _vm.specDtlInfo[
                                                      each.inProp
                                                    ],
                                                  callback: function($$v) {
                                                    _vm.$set(
                                                      _vm.specDtlInfo,
                                                      each.inProp,
                                                      $$v
                                                    )
                                                  },
                                                  expression:
                                                    "specDtlInfo[each.inProp]"
                                                }
                                              },
                                              _vm._l(
                                                _vm.resData[each.stateVal],
                                                function(list) {
                                                  return _c(
                                                    "span",
                                                    { key: list.id },
                                                    [
                                                      _c("el-option", {
                                                        attrs: {
                                                          label: list.name,
                                                          value: list.id
                                                        }
                                                      })
                                                    ],
                                                    1
                                                  )
                                                }
                                              )
                                            )
                                          ],
                                          1
                                        )
                                      : each.type == "datepicker"
                                        ? _c(
                                            "span",
                                            [
                                              _c("el-date-picker", {
                                                attrs: {
                                                  type: "date",
                                                  placeholder: "选择日期",
                                                  format: "yyyy/MM/dd",
                                                  "value-format": "yyyy/MM/dd"
                                                },
                                                on: { change: _vm.dateChg },
                                                model: {
                                                  value:
                                                    _vm.specDtlInfo[
                                                      each.inProp
                                                    ],
                                                  callback: function($$v) {
                                                    _vm.$set(
                                                      _vm.specDtlInfo,
                                                      each.inProp,
                                                      $$v
                                                    )
                                                  },
                                                  expression:
                                                    "specDtlInfo[each.inProp]"
                                                }
                                              })
                                            ],
                                            1
                                          )
                                        : _c(
                                            "span",
                                            [
                                              _c("el-input", {
                                                attrs: {
                                                  size: "small",
                                                  placeholder: each.holder
                                                },
                                                model: {
                                                  value:
                                                    _vm.specDtlInfo[
                                                      each.inProp
                                                    ],
                                                  callback: function($$v) {
                                                    _vm.$set(
                                                      _vm.specDtlInfo,
                                                      each.inProp,
                                                      typeof $$v === "string"
                                                        ? $$v.trim()
                                                        : $$v
                                                    )
                                                  },
                                                  expression:
                                                    "specDtlInfo[each.inProp]"
                                                }
                                              })
                                            ],
                                            1
                                          )
                              ])
                            : _c("span", [
                                each.type == "select"
                                  ? _c(
                                      "span",
                                      _vm._l(
                                        _vm.resData[each.stateVal],
                                        function(list) {
                                          return _c("span", { key: list.id }, [
                                            each.inProp
                                              ? _c("span", [
                                                  list.id ==
                                                  _vm.specDtlInfo[each.inProp]
                                                    ? _c("span", [
                                                        _vm._v(
                                                          "\n                                           " +
                                                            _vm._s(list.name) +
                                                            "\n                                           "
                                                        )
                                                      ])
                                                    : _vm._e()
                                                ])
                                              : _vm._e()
                                          ])
                                        }
                                      )
                                    )
                                  : _c("span", [
                                      _vm._v(
                                        "\n                              " +
                                          _vm._s(_vm.combEditVal[each.inProp]) +
                                          "\n                          "
                                      )
                                    ])
                              ])
                        ]
                      }
                    }
                  ])
                })
              })
            ],
            2
          ),
          _vm._v(" "),
          _c("el-button", { attrs: { type: "text" } }, [_vm._v("子件列表")]),
          _vm._v(" "),
          _c(
            "el-table",
            {
              attrs: {
                data: _vm.proCompVal,
                fit: "",
                height: "230",
                "row-class-name": _vm.proCompCName
              },
              on: { "row-click": _vm.proCompRowClick }
            },
            _vm._l(_vm.proCompHead, function(item) {
              return _c("el-table-column", {
                key: item.label,
                attrs: {
                  label: item.label,
                  align: "center",
                  width: item.width
                },
                scopedSlots: _vm._u([
                  {
                    key: "default",
                    fn: function(scope) {
                      return [
                        item.prop == "proPurchaseData"
                          ? _c("span", [
                              _vm.proCompRowIndex == "index" + scope.$index
                                ? _c("span", [
                                    item.type == "number"
                                      ? _c(
                                          "span",
                                          [
                                            _c("el-input", {
                                              attrs: {
                                                size: "small",
                                                type: "number",
                                                placeholder: item.holder
                                              },
                                              on: { change: _vm.compValChg },
                                              model: {
                                                value:
                                                  scope.row[item.prop][
                                                    item.inProp
                                                  ],
                                                callback: function($$v) {
                                                  _vm.$set(
                                                    scope.row[item.prop],
                                                    item.inProp,
                                                    typeof $$v === "string"
                                                      ? $$v.trim()
                                                      : $$v
                                                  )
                                                },
                                                expression:
                                                  "scope.row[item.prop][item.inProp]"
                                              }
                                            })
                                          ],
                                          1
                                        )
                                      : item.type == "textarea"
                                        ? _c(
                                            "span",
                                            [
                                              _c("el-input", {
                                                attrs: {
                                                  type: "textarea",
                                                  size: "small",
                                                  placeholder: item.holder
                                                },
                                                on: { change: _vm.compValChg },
                                                model: {
                                                  value:
                                                    scope.row[item.prop][
                                                      item.inProp
                                                    ],
                                                  callback: function($$v) {
                                                    _vm.$set(
                                                      scope.row[item.prop],
                                                      item.inProp,
                                                      typeof $$v === "string"
                                                        ? $$v.trim()
                                                        : $$v
                                                    )
                                                  },
                                                  expression:
                                                    "scope.row[item.prop][item.inProp]"
                                                }
                                              })
                                            ],
                                            1
                                          )
                                        : item.type == "select"
                                          ? _c(
                                              "span",
                                              [
                                                _c(
                                                  "el-select",
                                                  {
                                                    attrs: {
                                                      placeholder: item.holder
                                                    },
                                                    on: {
                                                      change: _vm.compValChg
                                                    },
                                                    model: {
                                                      value:
                                                        scope.row[item.prop][
                                                          item.inProp
                                                        ],
                                                      callback: function($$v) {
                                                        _vm.$set(
                                                          scope.row[item.prop],
                                                          item.inProp,
                                                          $$v
                                                        )
                                                      },
                                                      expression:
                                                        "scope.row[item.prop][item.inProp]"
                                                    }
                                                  },
                                                  _vm._l(
                                                    _vm.resData[item.stateVal],
                                                    function(list) {
                                                      return _c(
                                                        "span",
                                                        { key: list.id },
                                                        [
                                                          _c("el-option", {
                                                            attrs: {
                                                              label: list.name
                                                                ? list.name
                                                                : list.title,
                                                              value: list.id
                                                            }
                                                          })
                                                        ],
                                                        1
                                                      )
                                                    }
                                                  )
                                                )
                                              ],
                                              1
                                            )
                                          : item.type == "datepicker"
                                            ? _c(
                                                "span",
                                                {
                                                  on: { change: _vm.compValChg }
                                                },
                                                [
                                                  _c("el-date-picker", {
                                                    attrs: {
                                                      type: "date",
                                                      placeholder: "选择日期",
                                                      format:
                                                        "yyyy-MM-dd HH:mm:ss",
                                                      "value-format":
                                                        "yyyy-MM-dd HH:mm:ss"
                                                    },
                                                    model: {
                                                      value:
                                                        scope.row[item.prop][
                                                          item.inProp
                                                        ],
                                                      callback: function($$v) {
                                                        _vm.$set(
                                                          scope.row[item.prop],
                                                          item.inProp,
                                                          $$v
                                                        )
                                                      },
                                                      expression:
                                                        "scope.row[item.prop][item.inProp]"
                                                    }
                                                  })
                                                ],
                                                1
                                              )
                                            : _vm._e()
                                  ])
                                : _c("span", [
                                    item.type == "select"
                                      ? _c(
                                          "span",
                                          _vm._l(
                                            _vm.resData[item.stateVal],
                                            function(list) {
                                              return _c(
                                                "span",
                                                { key: list.id },
                                                [
                                                  list.id ==
                                                  scope.row[item.prop][
                                                    item.inProp
                                                  ]
                                                    ? _c("span", [
                                                        _vm._v(
                                                          "\n                                     " +
                                                            _vm._s(
                                                              list.name
                                                                ? list.name
                                                                : list.title
                                                            ) +
                                                            "\n                                 "
                                                        )
                                                      ])
                                                    : _vm._e()
                                                ]
                                              )
                                            }
                                          )
                                        )
                                      : _c("span", [
                                          _vm._v(
                                            "\n                                 " +
                                              _vm._s(
                                                scope.row[item.prop][
                                                  item.inProp
                                                ]
                                              ) +
                                              "\n                             "
                                          )
                                        ])
                                  ])
                            ])
                          : item.prop
                            ? _c("span", [
                                item.type == "checkbox"
                                  ? _c(
                                      "span",
                                      [
                                        _c("el-checkbox", {
                                          attrs: { disabled: "" },
                                          model: {
                                            value: scope.row[item.prop],
                                            callback: function($$v) {
                                              _vm.$set(
                                                scope.row,
                                                item.prop,
                                                $$v
                                              )
                                            },
                                            expression: "scope.row[item.prop]"
                                          }
                                        })
                                      ],
                                      1
                                    )
                                  : item.type == "img"
                                    ? _c(
                                        "span",
                                        [
                                          _c(
                                            "el-popover",
                                            {
                                              attrs: {
                                                placement: "right",
                                                trigger: "hover",
                                                "popper-class": "picture_detail"
                                              }
                                            },
                                            [
                                              _c("img", {
                                                attrs: {
                                                  src: scope.row[item.prop]
                                                }
                                              }),
                                              _vm._v(" "),
                                              _c("img", {
                                                attrs: {
                                                  slot: "reference",
                                                  src: scope.row[item.prop],
                                                  alt: scope.row[item.alt]
                                                },
                                                slot: "reference"
                                              })
                                            ]
                                          )
                                        ],
                                        1
                                      )
                                    : _c("span", [
                                        _vm._v(
                                          "\n                          " +
                                            _vm._s(
                                              item.inProp
                                                ? scope.row[item.prop][
                                                    item.inProp
                                                  ]
                                                : scope.row[item.prop]
                                            ) +
                                            "\n                     "
                                        )
                                      ])
                              ])
                            : _vm._e()
                      ]
                    }
                  }
                ])
              })
            })
          ),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "dialog-footer",
              attrs: { slot: "footer" },
              slot: "footer"
            },
            [
              _c(
                "el-button",
                {
                  attrs: { type: "primary" },
                  on: { click: _vm.confirmAddProDtl }
                },
                [_vm._v("确定")]
              ),
              _vm._v(" "),
              _c("el-button", { on: { click: _vm.cancelAddProDtl } }, [
                _vm._v("取消")
              ])
            ],
            1
          )
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "el-dialog",
        {
          class: { "more-forms": _vm.moreForms, threeParts: _vm.threeParts },
          attrs: { title: "修改采购单", visible: _vm.updatePurMask },
          on: {
            "update:visible": function($event) {
              _vm.updatePurMask = $event
            }
          }
        },
        [
          _c("el-button", { attrs: { type: "text" } }, [_vm._v("基本信息")]),
          _vm._v(" "),
          _c("add-new", {
            attrs: {
              "rule-form": _vm.updatePurForm,
              rules: _vm.addPurchaseRules,
              "add-arr": _vm.addPurchaseHead,
              onlyInputs: true
            }
          }),
          _vm._v(" "),
          _c("div", { staticClass: "clearfix" }, [
            _c(
              "div",
              { staticStyle: { float: "left" } },
              [
                _c("el-button", { attrs: { type: "text" } }, [
                  _vm._v("采购sku")
                ]),
                _vm._v(" "),
                _c(
                  "el-table",
                  {
                    staticStyle: { width: "200px", "margin-right": "50px" },
                    attrs: {
                      data: _vm.updatePurSkuVal,
                      fit: "",
                      height: "300",
                      "row-class-name": _vm.updateRowCName
                    },
                    on: { "row-click": _vm.updatePurSkuRowClick }
                  },
                  [
                    _vm._l(_vm.addPurchaseSkuHead, function(item) {
                      return _c("el-table-column", {
                        key: item.prop,
                        attrs: { label: item.label, align: "center" },
                        scopedSlots: _vm._u([
                          {
                            key: "default",
                            fn: function(scope) {
                              return [
                                _vm._v(
                                  "\n                             " +
                                    _vm._s(scope.row[item.prop]) +
                                    "\n                         "
                                )
                              ]
                            }
                          }
                        ])
                      })
                    }),
                    _vm._v(" "),
                    _c("el-table-column", {
                      attrs: { label: "操作", width: "90", align: "center" },
                      scopedSlots: _vm._u([
                        {
                          key: "default",
                          fn: function(scope) {
                            return [
                              _c(
                                "el-button",
                                {
                                  attrs: { size: "mini", type: "danger" },
                                  on: {
                                    click: function($event) {
                                      _vm.updatePurSkuDel(
                                        scope.row,
                                        scope.$index
                                      )
                                    }
                                  }
                                },
                                [_vm._v("删除")]
                              )
                            ]
                          }
                        }
                      ])
                    })
                  ],
                  2
                )
              ],
              1
            ),
            _vm._v(" "),
            _c(
              "div",
              { staticStyle: { overflow: "hidden" } },
              [
                _c("el-button", { attrs: { type: "text" } }, [
                  _vm._v("采购子件")
                ]),
                _vm._v(" "),
                _c(
                  "el-table",
                  {
                    attrs: {
                      data: _vm.updatePurCompVal,
                      fit: "",
                      height: "300",
                      "row-class-name": _vm.updateCompCName
                    },
                    on: { "row-click": _vm.updateCompRowClick }
                  },
                  [
                    _vm._l(_vm.addPurchaseCompHead, function(item) {
                      return _c("el-table-column", {
                        key: item.label,
                        attrs: {
                          label: item.label,
                          align: "center",
                          width: item.width
                        },
                        scopedSlots: _vm._u([
                          {
                            key: "default",
                            fn: function(scope) {
                              return [
                                item.prop == "proPurchaseData"
                                  ? _c("span", [
                                      _vm.updatePurCompIndex ==
                                      "index" + scope.$index
                                        ? _c("span", [
                                            item.type == "number"
                                              ? _c(
                                                  "span",
                                                  [
                                                    _c("el-input", {
                                                      attrs: {
                                                        size: "small",
                                                        type: "number",
                                                        placeholder: item.holder
                                                      },
                                                      on: {
                                                        input: _vm.updateComp
                                                      },
                                                      model: {
                                                        value:
                                                          scope.row[item.prop][
                                                            item.inProp
                                                          ],
                                                        callback: function(
                                                          $$v
                                                        ) {
                                                          _vm.$set(
                                                            scope.row[
                                                              item.prop
                                                            ],
                                                            item.inProp,
                                                            typeof $$v ===
                                                            "string"
                                                              ? $$v.trim()
                                                              : $$v
                                                          )
                                                        },
                                                        expression:
                                                          "scope.row[item.prop][item.inProp]"
                                                      }
                                                    })
                                                  ],
                                                  1
                                                )
                                              : item.type == "textarea"
                                                ? _c(
                                                    "span",
                                                    [
                                                      _c("el-input", {
                                                        attrs: {
                                                          type: "textarea",
                                                          size: "small",
                                                          placeholder:
                                                            item.holder
                                                        },
                                                        on: {
                                                          input: _vm.updateComp
                                                        },
                                                        model: {
                                                          value:
                                                            scope.row[
                                                              item.prop
                                                            ][item.inProp],
                                                          callback: function(
                                                            $$v
                                                          ) {
                                                            _vm.$set(
                                                              scope.row[
                                                                item.prop
                                                              ],
                                                              item.inProp,
                                                              typeof $$v ===
                                                              "string"
                                                                ? $$v.trim()
                                                                : $$v
                                                            )
                                                          },
                                                          expression:
                                                            "scope.row[item.prop][item.inProp]"
                                                        }
                                                      })
                                                    ],
                                                    1
                                                  )
                                                : item.type == "select"
                                                  ? _c(
                                                      "span",
                                                      [
                                                        _c(
                                                          "el-select",
                                                          {
                                                            attrs: {
                                                              placeholder:
                                                                item.holder
                                                            },
                                                            on: {
                                                              change:
                                                                _vm.updateComp
                                                            },
                                                            model: {
                                                              value:
                                                                scope.row[
                                                                  item.prop
                                                                ][item.inProp],
                                                              callback: function(
                                                                $$v
                                                              ) {
                                                                _vm.$set(
                                                                  scope.row[
                                                                    item.prop
                                                                  ],
                                                                  item.inProp,
                                                                  $$v
                                                                )
                                                              },
                                                              expression:
                                                                "scope.row[item.prop][item.inProp]"
                                                            }
                                                          },
                                                          _vm._l(
                                                            _vm.resData[
                                                              item.stateVal
                                                            ],
                                                            function(list) {
                                                              return _c(
                                                                "span",
                                                                {
                                                                  key: list.id
                                                                },
                                                                [
                                                                  _c(
                                                                    "el-option",
                                                                    {
                                                                      attrs: {
                                                                        label: list.name
                                                                          ? list.name
                                                                          : list.title,
                                                                        value:
                                                                          list.id
                                                                      }
                                                                    }
                                                                  )
                                                                ],
                                                                1
                                                              )
                                                            }
                                                          )
                                                        )
                                                      ],
                                                      1
                                                    )
                                                  : item.type == "datepicker"
                                                    ? _c(
                                                        "span",
                                                        [
                                                          _c("el-date-picker", {
                                                            attrs: {
                                                              type: "date",
                                                              placeholder:
                                                                "选择日期",
                                                              format:
                                                                "yyyy-MM-dd",
                                                              "value-format":
                                                                "yyyy-MM-dd"
                                                            },
                                                            on: {
                                                              change:
                                                                _vm.updateComp
                                                            },
                                                            model: {
                                                              value:
                                                                scope.row[
                                                                  item.prop
                                                                ][item.inProp],
                                                              callback: function(
                                                                $$v
                                                              ) {
                                                                _vm.$set(
                                                                  scope.row[
                                                                    item.prop
                                                                  ],
                                                                  item.inProp,
                                                                  $$v
                                                                )
                                                              },
                                                              expression:
                                                                "scope.row[item.prop][item.inProp]"
                                                            }
                                                          })
                                                        ],
                                                        1
                                                      )
                                                    : _vm._e()
                                          ])
                                        : _c("span", [
                                            item.type == "select"
                                              ? _c(
                                                  "span",
                                                  _vm._l(
                                                    _vm.resData[item.stateVal],
                                                    function(list) {
                                                      return _c(
                                                        "span",
                                                        { key: list.id },
                                                        [
                                                          list.id ==
                                                          scope.row[item.prop][
                                                            item.inProp
                                                          ]
                                                            ? _c("span", [
                                                                _vm._v(
                                                                  "\n                                                 " +
                                                                    _vm._s(
                                                                      list.name
                                                                        ? list.name
                                                                        : list.title
                                                                    ) +
                                                                    "\n                                             "
                                                                )
                                                              ])
                                                            : _vm._e()
                                                        ]
                                                      )
                                                    }
                                                  )
                                                )
                                              : _c("span", [
                                                  _vm._v(
                                                    "\n                                 " +
                                                      _vm._s(
                                                        scope.row[item.prop][
                                                          item.inProp
                                                        ]
                                                      ) +
                                                      "\n                             "
                                                  )
                                                ])
                                          ])
                                    ])
                                  : item.prop
                                    ? _c("span", [
                                        item.type == "checkbox"
                                          ? _c(
                                              "span",
                                              [
                                                _c("el-checkbox", {
                                                  attrs: { disabled: "" },
                                                  model: {
                                                    value: scope.row[item.prop],
                                                    callback: function($$v) {
                                                      _vm.$set(
                                                        scope.row,
                                                        item.prop,
                                                        $$v
                                                      )
                                                    },
                                                    expression:
                                                      "scope.row[item.prop]"
                                                  }
                                                })
                                              ],
                                              1
                                            )
                                          : item.type == "img"
                                            ? _c(
                                                "span",
                                                [
                                                  _c(
                                                    "el-popover",
                                                    {
                                                      attrs: {
                                                        placement: "right",
                                                        trigger: "hover",
                                                        "popper-class":
                                                          "picture_detail"
                                                      }
                                                    },
                                                    [
                                                      _c("img", {
                                                        attrs: {
                                                          src:
                                                            scope.row[item.prop]
                                                        }
                                                      }),
                                                      _vm._v(" "),
                                                      _c("img", {
                                                        attrs: {
                                                          slot: "reference",
                                                          src:
                                                            scope.row[
                                                              item.prop
                                                            ],
                                                          alt:
                                                            scope.row[item.alt]
                                                        },
                                                        slot: "reference"
                                                      })
                                                    ]
                                                  )
                                                ],
                                                1
                                              )
                                            : _c("span", [
                                                _vm._v(
                                                  "\n                          " +
                                                    _vm._s(
                                                      item.inProp
                                                        ? scope.row[item.prop][
                                                            item.inProp
                                                          ]
                                                        : scope.row[item.prop]
                                                    ) +
                                                    "\n                     "
                                                )
                                              ])
                                      ])
                                    : _vm._e()
                              ]
                            }
                          }
                        ])
                      })
                    }),
                    _vm._v(" "),
                    _c("el-table-column", {
                      attrs: { label: "状态", width: "90" },
                      scopedSlots: _vm._u([
                        {
                          key: "default",
                          fn: function(scope) {
                            return [
                              _vm._v(
                                "\n                             " +
                                  _vm._s("新建") +
                                  "\n                         "
                              )
                            ]
                          }
                        }
                      ])
                    }),
                    _vm._v(" "),
                    _c("el-table-column", {
                      attrs: {
                        label: "操作",
                        width: "90",
                        align: "center",
                        fixed: "right"
                      },
                      scopedSlots: _vm._u([
                        {
                          key: "default",
                          fn: function(scope) {
                            return [
                              _c(
                                "el-button",
                                {
                                  attrs: { size: "mini", type: "danger" },
                                  on: {
                                    click: function($event) {
                                      _vm.updateDelPurComp(
                                        scope.row,
                                        scope.$index
                                      )
                                    }
                                  }
                                },
                                [_vm._v("删除")]
                              )
                            ]
                          }
                        }
                      ])
                    })
                  ],
                  2
                )
              ],
              1
            )
          ]),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "dialog-footer clearfix",
              attrs: { slot: "footer" },
              slot: "footer"
            },
            [
              _c(
                "div",
                { staticStyle: { float: "left" } },
                [
                  _c(
                    "el-button",
                    {
                      attrs: { type: "primary" },
                      on: { click: _vm.updateProDtl }
                    },
                    [_vm._v("增加明细")]
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticStyle: { float: "right" } },
                [
                  _c(
                    "el-button",
                    {
                      attrs: { type: "primary" },
                      on: {
                        click: function($event) {
                          _vm.confirmUpdatePur(_vm.updateId)
                        }
                      }
                    },
                    [_vm._v("确定")]
                  ),
                  _vm._v(" "),
                  _c("el-button", { on: { click: _vm.cancelUpdate } }, [
                    _vm._v("取消")
                  ])
                ],
                1
              )
            ]
          )
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "el-popover",
        {
          attrs: { slot: "tip", placement: "top", width: "160" },
          slot: "tip",
          model: {
            value: _vm.showDel,
            callback: function($$v) {
              _vm.showDel = $$v
            },
            expression: "showDel"
          }
        },
        [
          _c("p", [_vm._v("确定删除该条数据？")]),
          _vm._v(" "),
          _c(
            "div",
            { staticStyle: { "text-align": "right", margin: "0" } },
            [
              _c(
                "el-button",
                {
                  attrs: { size: "mini", type: "text" },
                  on: { click: _vm.cancelD }
                },
                [_vm._v("取消")]
              ),
              _vm._v(" "),
              _c(
                "el-button",
                {
                  attrs: { type: "primary", size: "mini" },
                  on: {
                    click: function($event) {
                      _vm.confirmD(_vm.delUrl, _vm.delId)
                    }
                  }
                },
                [_vm._v("确定")]
              )
            ],
            1
          )
        ]
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-50a9f65f", module.exports)
  }
}

/***/ })

});
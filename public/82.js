webpackJsonp([82],{

/***/ 451:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(531)
/* template */
var __vue_template__ = __webpack_require__(659)
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
Component.options.__file = "resources\\assets\\js\\views\\order\\customerService.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-7769224c", Component.options)
  } else {
    hotAPI.reload("data-v-7769224c", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 531:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__ = __webpack_require__(41);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_element_china_area_data___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_element_china_area_data__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
        cnt: '增加',
        icon: 'bf-add',
        ent: this.addCustomer,
        ref: 'add'
      }, {
        cnt: '修改',
        icon: 'bf-change',
        ent: this.test
      }, {
        cnt: '删除',
        icon: 'bf-del',
        ent: this.test
      }, {
        cnt: '锁定',
        icon: 'bf-lock',
        ent: this.test
      }, {
        cnt: '解锁',
        icon: 'bf-delock',
        ent: this.test
      }, {
        cnt: '审核',
        icon: 'bf-audit',
        ent: this.test
      }, {
        cnt: '退审',
        icon: 'bf-auditfaild',
        ent: this.test
      }, {
        cnt: '导出',
        icon: 'bf-out',
        ent: this.test
      }, {
        cnt: '合并',
        icon: 'bf-merge',
        ent: this.test
      }, {
        cnt: '拆分',
        icon: 'bf-node',
        ent: this.test
      }, {
        cnt: '转刷单',
        icon: 'bf-transa',
        ent: this.test
      }, {
        cnt: '上一条',
        icon: 'bf-beforeItem',
        ent: this.test
      }, {
        cnt: '下一条',
        icon: 'bf-nextItem',
        ent: this.test
      }, {
        cnt: '转补款',
        icon: 'bf-transferAcc',
        ent: this.test
      }, {
        cnt: '订单关联',
        icon: 'bf-asso',
        ent: this.test
      }, {
        cnt: '取消关联',
        icon: 'bf-cancelAsso',
        ent: this.test
      }, {
        cnt: '通知发货',
        icon: 'bf-deliNotice',
        ent: this.test
      }, {
        cnt: '打印',
        icon: 'bf-printer',
        ent: this.test
      }, {
        cnt: '转送款',
        icon: 'bf-giveMoney',
        ent: this.test
      }, {
        cnt: '刷新',
        icon: 'bf-refresh',
        ent: this.test
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
      /*获取数据*/
      activeName: '0',
      leftTopActiveName: '0',
      leftBtmActiveName: '0',
      rightActiveName: '0',
      orderListData: [{
        label: '系统订单',
        width: '180',
        prop: 'stock_in_no',
        type: 'text'
      }, {
        label: '淘宝单号',
        width: '180',
        prop: 'warehouse',
        inProp: 'name',
        type: 'text'
      }, {
        label: '店铺昵称',
        width: '150',
        prop: 'stockInType',
        inProp: 'name',
        type: 'text'
      }, {
        label: '业务员账号',
        width: '140',
        prop: 'creator',
        type: 'text'
      }, {
        label: '业务员姓名',
        width: '140',
        prop: 'submitter',
        type: 'text'
      }, {
        label: '锁定人姓名',
        width: '130',
        prop: 'auditor',
        type: 'text'
      }, {
        label: '买家昵称',
        width: '130',
        prop: 'warehouer',
        type: 'text'
      }, {
        label: '客户类型',
        width: '130',
        prop: 'created_at',
        type: 'text'
      }, {
        label: '淘宝旗帜',
        width: '130',
        prop: 'submit_at',
        type: 'text'
      }, {
        label: '物流公司',
        width: '140',
        prop: 'is_submit',
        type: 'text'
      }, {
        label: '快递费用',
        width: '120',
        prop: 'is_stock_in',
        type: 'number'
      }, {
        label: '其他费用',
        width: '120',
        prop: 'is_print',
        type: 'number'
      }, {
        label: '收货人',
        width: '130',
        prop: 'is_audit',
        type: 'text'
      }, {
        label: '省',
        width: '120',
        prop: 'stock_in_at',
        type: 'text'
      }, {
        label: '市',
        width: '120',
        prop: 'stock_in_at',
        type: 'text'
      }, {
        label: '区',
        width: '120',
        prop: 'stock_in_at',
        type: 'text'
      }, {
        label: '收货地址',
        width: '180',
        prop: 'print_at',
        type: 'text'
      }, {
        label: '供应商',
        width: '130',
        prop: 'audit_at',
        type: 'text'
      }, {
        label: '配送商',
        width: '130',
        prop: 'is_stock_in',
        type: 'text'
      }, {
        label: '发货仓库',
        width: '130',
        prop: 'is_print',
        type: 'text'
      }, {
        label: '配送电话',
        width: '150',
        prop: 'is_audit',
        type: 'number'
      }, {
        label: '配送类型',
        width: '130',
        prop: 'stock_in_at',
        type: 'text'
      }, {
        label: '配送方式',
        width: '130',
        prop: 'stock_in_at',
        type: 'text'
      }, {
        label: '送货费',
        width: '120',
        prop: 'stock_in_at',
        type: 'number'
      }, {
        label: '搬楼费',
        width: '120',
        prop: 'print_at',
        type: 'number'
      }, {
        label: '安装费',
        width: '120',
        prop: 'audit_at',
        type: 'number'
      }, {
        label: '配送总计',
        width: '130',
        prop: 'stock_in_at',
        type: 'number'
      }, {
        label: '配送单号',
        width: '180',
        prop: 'stock_in_at',
        type: 'text'
      }, {
        label: '客审时间',
        width: '160',
        prop: 'stock_in_at',
        type: 'text'
      }, {
        label: '拍单时间',
        width: '160',
        prop: 'print_at',
        type: 'text'
      }, {
        label: '支付日期',
        width: '160',
        prop: 'audit_at',
        type: 'text'
      }, {
        label: '承诺发货日期',
        width: '160',
        prop: 'is_stock_in',
        type: 'text'
      }, {
        label: '商品数量',
        width: '120',
        prop: 'is_print',
        type: 'number'
      }, {
        label: '(实际售价+其他费用)',
        width: '150',
        prop: 'is_audit',
        type: 'number'
      }, {
        label: '商家优惠金额',
        width: '130',
        prop: 'stock_in_at',
        type: 'number'
      }, {
        label: '标记总金额',
        width: '130',
        prop: 'stock_in_at',
        type: 'number'
      }, {
        label: '支付总金额',
        width: '130',
        prop: 'stock_in_at',
        type: 'number'
      }, {
        label: '实际总售价',
        width: '130',
        prop: 'print_at',
        type: 'number'
      }, {
        label: '木架费',
        width: '120',
        prop: 'audit_at',
        type: 'number'
      }, {
        label: '优惠返现',
        width: '120',
        prop: 'stock_in_at',
        type: 'number'
      }, {
        label: '好评返现',
        width: '120',
        prop: 'stock_in_at',
        type: 'number'
      }, {
        label: '拆分主订单',
        width: '130',
        prop: 'stock_in_at',
        type: 'text'
      }, {
        label: '标记人',
        width: '130',
        prop: 'print_at',
        type: 'text'
      }, {
        label: '标记名称',
        width: '130',
        prop: 'audit_at',
        type: 'text'
      }, {
        label: '标记时间',
        width: '160',
        prop: 'is_stock_in',
        type: 'text'
      }, {
        label: '订单来源',
        width: '130',
        prop: 'is_print',
        type: 'text'
      }, {
        label: '分阶段金额',
        width: '130',
        prop: 'is_audit',
        type: 'number'
      }, {
        label: '分阶段状态',
        width: '130',
        prop: 'stock_in_at',
        type: 'text'
      }, {
        label: '服务车金额',
        width: '130',
        prop: 'stock_in_at',
        type: 'number'
      }, {
        label: '服务车信息',
        width: '150',
        prop: 'stock_in_at',
        type: 'text'
      }, {
        label: '门店收款方式',
        width: '130',
        prop: 'print_at',
        type: 'text'
      }, {
        label: '门店订单金额',
        width: '140',
        prop: 'audit_at',
        type: 'number'
      }, {
        label: '门店欠款金额',
        width: '140',
        prop: 'stock_in_at',
        type: 'number'
      }, {
        label: '线下单价汇总',
        width: '140',
        prop: 'stock_in_at',
        type: 'number'
      }, {
        label: '线下金额汇总',
        width: '140',
        prop: 'stock_in_at',
        type: 'number'
      }, {
        label: '发票快递费',
        width: '130',
        prop: 'print_at',
        type: 'number'
      }, {
        label: '线下优惠汇总',
        width: '140',
        prop: 'audit_at',
        type: 'number'
      }, {
        label: '送货类型-京东',
        width: '140',
        prop: 'is_stock_in',
        type: 'text'
      }, {
        label: '线下实际金额汇总',
        width: '140',
        prop: 'is_print',
        type: 'number'
      }, {
        label: '支付方式-京东',
        width: '140',
        prop: 'is_audit',
        type: 'text'
      }, {
        label: '需要发票',
        width: '90',
        prop: 'stock_in_at',
        type: 'checkbox'
      }, {
        label: '余额支付金额-京东',
        width: '140',
        prop: 'stock_in_at',
        type: 'number'
      }, {
        label: '订单状态-京东',
        width: '140',
        prop: 'stock_in_at',
        type: 'text'
      }, {
        label: '发票信息',
        width: '160',
        prop: 'print_at',
        type: 'text'
      }, {
        label: '纳税识别号',
        width: '180',
        prop: 'audit_at',
        type: 'text'
      }, {
        label: '纳税注册地址',
        width: '180',
        prop: 'stock_in_at',
        type: 'text'
      }, {
        label: '纳税注册电话',
        width: '140',
        prop: 'stock_in_at',
        type: 'number'
      }, {
        label: '纳税开户银行',
        width: '130',
        prop: 'stock_in_at',
        type: 'text'
      }, {
        label: '纳税银行账号',
        width: '180',
        prop: 'print_at',
        type: 'number'
      }, {
        label: '发票信息-唯品会',
        width: '180',
        prop: 'audit_at',
        type: 'text'
      }, {
        label: 'PO单号-唯品会',
        width: '180',
        prop: 'is_stock_in',
        type: 'text'
      }, {
        label: '促销优惠金额-唯品会',
        width: '150',
        prop: 'is_print',
        type: 'number'
      }, {
        label: '期望收货时间-唯品会',
        width: '160',
        prop: 'is_audit',
        type: 'text'
      }, {
        label: '买家留言',
        width: '150',
        prop: 'stock_in_at',
        type: 'text'
      }, {
        label: '客服备注',
        width: '150',
        prop: 'stock_in_at',
        type: 'text'
      }, {
        label: '卖家备注',
        width: '150',
        prop: 'stock_in_at',
        type: 'text'
      }, {
        label: '补件原因',
        width: '150',
        prop: 'print_at',
        type: 'text'
      }, {
        label: '已驳回',
        width: '90',
        prop: 'audit_at',
        type: 'checkbox'
      }, {
        label: '分阶段',
        width: '90',
        prop: 'stock_in_at',
        type: 'checkbox'
      }, {
        label: '服务车',
        width: '90',
        prop: 'stock_in_at',
        type: 'checkbox'
      }, {
        label: '赠品',
        width: '90',
        prop: 'stock_in_at',
        type: 'checkbox'
      }, {
        label: '红包',
        width: '90',
        prop: 'print_at',
        type: 'checkbox'
      }, {
        label: '已打印',
        width: '90',
        prop: 'audit_at',
        type: 'checkbox'
      }, {
        label: '锁定',
        width: '90',
        prop: 'is_stock_in',
        type: 'checkbox'
      }, {
        label: '合并订单',
        width: '90',
        prop: 'is_print',
        type: 'checkbox'
      }, {
        label: '拆分订单',
        width: '90',
        prop: 'is_audit',
        type: 'checkbox'
      }, {
        label: '关联订单',
        width: '90',
        prop: 'stock_in_at',
        type: 'checkbox'
      }, {
        label: '接单人',
        width: '120',
        prop: 'stock_in_at',
        type: 'text'
      }, {
        label: '税号',
        width: '160',
        prop: 'stock_in_at',
        type: 'text'
      }, {
        label: '收据',
        width: '130',
        prop: 'print_at',
        type: 'text'
      }, {
        label: '(订单总额+服务车金额)',
        width: '150',
        prop: 'audit_at',
        type: 'number'
      }, {
        label: '店铺分组',
        width: '120',
        prop: 'stock_in_at',
        type: 'text'
      }, {
        label: '关联单号',
        width: '160',
        prop: 'stock_in_at',
        type: 'text'
      }, {
        label: '退款信息',
        width: '130',
        prop: 'stock_in_at',
        type: 'text'
      }, {
        label: '锁定人账号',
        width: '140',
        prop: 'print_at',
        type: 'text'
      }, {
        label: '退审',
        width: '90',
        prop: 'audit_at',
        type: 'checkbox'
      }, {
        label: '库存占用',
        width: '90',
        prop: 'is_stock_in',
        type: 'checkbox'
      }, {
        label: '需要核销',
        width: '90',
        prop: 'is_print',
        type: 'checkbox'
      }, {
        label: '等通知发货',
        width: '90',
        prop: 'is_audit',
        type: 'checkbox'
      }],
      orderListHead: [],
      loading: true,
      checkboxInit: false,
      orderListIndex: '',
      /*新增*/
      addCustomerMask: false,
      moreForms: true,
      threeParts: true,
      addCustomerFormVal: {
        shops_id: '',
        member_nick: '',
        logistics_id: '',
        billing_way: '',
        promise_ship_time: '',
        freight_types_id: '',
        expected_freight: '',
        distributions_id: '',
        distribution_methods_id: '',
        deliver_goods_fee: '',
        move_upstairs_fee: '',
        installation_fee: '',
        total_distribution_fee: '',
        distribution_phone: '',
        distribution_no: '',
        distribution_types_id: '',
        service_car_info: '',
        take_delivery_goods_fee: '',
        take_delivery_goods_ways_id: '',
        express_fee: '',
        service_car_fee: '',
        cancel_after_verification_code: '',
        wooden_frame_costs: '',
        preferential_cashback: '',
        favorable_cashback: '',
        customer_types_id: '',
        is_invoice: '',
        invoice_express_fee: '',
        express_invoice_title: '',
        contract_no: '',
        payment_methods_id: '',
        deposit: '',
        document_title: '',
        warehouses_id: '',
        payment_date: '',
        interest_concessions: '',
        is_notice: '',
        is_cancel_after_verification: '',
        accept_order_user: '',
        tax_number: '',
        receipt: '',
        logistics_remark: '',
        seller_remark: '',
        customer_service_remark: '',
        buyer_message: '',
        status: ''
      },
      addCustomerFormRules: {
        shops_id: [{ required: true, message: '店铺必选', trigger: 'blur' }],
        logistics_id: [{ required: true, message: ' 物流必选', trigger: 'blur' }],
        billing_way: [{ required: true, message: '计费方式必选', trigger: 'blur' }],
        freight_types_id: [{ required: true, message: '运费类型必选', trigger: 'blur' }],
        distributions_id: [{ required: true, message: '配送方式必选', trigger: 'blur' }],
        take_delivery_goods_fee: [{ required: true, message: '提货费用必填', trigger: 'blur' }],
        customer_types_id: [{ required: true, message: '客户类型必选', trigger: 'blur' }],
        payment_methods_id: [{ required: true, message: '付款方式必选', trigger: 'blur' }],
        warehouses_id: [{ required: true, message: '发货仓库必选', trigger: 'blur' }]
      },
      addCustomerFormHead: [{
        label: '单据来源',
        prop: '',
        holder: '系统自动生成',
        width: '200',
        type: 'text',
        editChgAble: true,
        addChgAble: true
      }, {
        label: '单据编号',
        prop: '',
        holder: '系统自动生成',
        type: 'text',
        editChgAble: true,
        addChgAble: true
      }, {
        label: '店铺名称',
        prop: 'shops_id',
        holder: '请选择店铺',
        type: 'select',
        stateVal: 'shops',
        editChgAble: true
      }, {
        label: '会员昵称',
        prop: 'member_nick',
        holder: '请输入会员昵称',
        type: 'text'
      }, {
        label: '物流公司',
        prop: 'logistics_id',
        holder: '请选择物流公司',
        type: 'select',
        stateVal: 'logistics'
      }, {
        label: '计费方式',
        choiceName: ['按体积', '按重量'],
        prop: 'billing_way',
        type: 'radio'
      }, {
        label: '承诺日期',
        prop: 'promise_ship_time',
        type: 'DatePicker'
      }, {
        label: '运费类型',
        prop: 'freight_types_id',
        holder: '请选择运费类型',
        type: 'select',
        stateVal: 'freighttypes'
      }, {
        label: '预计运费',
        prop: 'expected_freight',
        holder: '请输入预计运费',
        type: 'number'
      }, {
        label: '配送公司',
        prop: 'distributions_id',
        holder: '请选择配送公司',
        type: 'select',
        stateVal: 'distributions'
      }, {
        label: '配送方式',
        prop: 'distribution_methods_id',
        holder: '请选择配送方式',
        type: 'select',
        stateVal: 'distmets'
      }, {
        label: '送货费用',
        prop: 'deliver_goods_fee',
        holder: '请输入送货费用',
        type: 'number'
      }, {
        label: '搬楼费用',
        prop: 'move_upstairs_fee',
        holder: '请输入搬楼费用',
        type: 'number'
      }, {
        label: '安装费用',
        prop: 'installation_fee',
        holder: '请输入安装费用',
        type: 'number'
      }, {
        label: '配送总计',
        prop: 'total_distribution_fee',
        holder: '请输入配送总计',
        type: 'number'
      }, {
        label: '送货费用',
        prop: 'deliver_goods_fee',
        holder: '请输入送货费用',
        type: 'number'
      }, {
        label: '配送电话',
        prop: 'distribution_phone',
        holder: '请输入配送电话',
        type: 'number'
      }, {
        label: '配送单号',
        prop: 'distribution_no',
        holder: '请输入配送单号',
        type: 'number'
      }, {
        label: '配送类型',
        prop: 'distribution_types_id',
        holder: '请选择配送类型',
        type: 'select',
        stateVal: 'distributiontypes'
      }, {
        label: '配送信息',
        prop: 'service_car_info',
        holder: '请输入配送信息',
        type: 'text'
      }, {
        label: '提货费用',
        prop: 'take_delivery_goods_fee',
        holder: '请输入提货费用',
        type: 'number'
      }, {
        label: '提货方式',
        prop: 'take_delivery_goods_ways_id',
        holder: '请选择提货方式',
        type: 'select',
        stateVal: 'takedeliverygoodsways'
      }, {
        label: '快递费用',
        prop: 'express_fee',
        holder: '请输入快递费用',
        type: 'number'
      }, {
        label: '家装服务',
        prop: 'service_car_fee',
        holder: '请输入家装服务',
        type: 'number'
      }, {
        label: '核销码',
        prop: 'cancel_after_verification_code',
        holder: '请输入核销码',
        type: 'text'
      }, {
        label: '木架费',
        prop: 'wooden_frame_costs',
        holder: '请输入木架费',
        type: 'number'
      }, {
        label: '优惠返现',
        prop: 'preferential_cashback',
        holder: '请输入优惠返现',
        type: 'number'
      }, {
        label: '好评返现',
        prop: 'favorable_cashback',
        holder: '请输入好评返现',
        type: 'number'
      }, {
        label: '客户类型',
        prop: 'customer_types_id',
        holder: '请输入客户类型',
        type: 'select',
        stateVal: 'customertypes'
      }, {
        label: '发票',
        prop: 'is_invoice',
        type: 'checkbox'
      }, {
        label: '抬头',
        prop: 'express_invoice_title',
        holder: '请输入发票抬头',
        type: 'text'
      }, {
        label: '发票快递费',
        prop: 'invoice_express_fee',
        holder: '请输入发票快递费',
        type: 'number'
      }, {
        label: '合同单号',
        prop: 'contract_no',
        holder: '请输入合同单号',
        type: 'text'
      }, {
        label: '付款方式',
        prop: 'payment_methods_id',
        holder: '请选择付款方式',
        type: 'select',
        stateVal: 'paymentmethods'
      }, {
        label: '门店定金',
        prop: 'deposit',
        holder: '请输入门店定金',
        type: 'number'
      }, {
        label: '单据头',
        prop: 'document_title',
        holder: '请输入单据头',
        type: 'text'
      }, {
        label: '发货仓库',
        holder: '请选择发货仓库',
        prop: 'warehouses_id',
        type: 'select',
        stateVal: 'warehouses'
      }, {
        label: '收款日期',
        prop: 'payment_date',
        type: 'DatePicker'
      }, {
        label: '让利金额',
        prop: 'interest_concessions',
        holder: '请输入让利金额',
        type: 'number'
      }, {
        label: '等通知发货',
        prop: 'is_notice',
        type: 'checkbox'
      }, {
        label: '是否核销',
        prop: 'is_cancel_after_verification',
        type: 'checkbox'
      }, {
        label: '接单用户',
        prop: 'accept_order_user',
        holder: '请输入接单用户',
        type: 'text'
      }, {
        label: '税号',
        prop: 'tax_number',
        holder: '请输入税号',
        type: 'text'
      }, {
        label: '收据',
        prop: 'receipt',
        holder: '请输入收据',
        type: 'text'
      }, {
        label: '物流备注',
        prop: 'logistics_remark',
        holder: '请输入物流备注',
        type: 'textarea'
      }, {
        label: '卖家备注',
        holder: '请输入卖家备注',
        prop: 'seller_remark',
        type: 'textarea'
      }, {
        label: '客服备注',
        holder: '请输入客服备注',
        prop: 'customer_service_remark',
        type: 'textarea'
      }, {
        label: '买家留言',
        holder: '请输入买家留言',
        prop: 'buyer_message',
        type: 'textarea'
      }, {
        label: '开启订单',
        prop: 'status',
        type: 'checkbox'
      }],
      addActiveName: '0',
      proData: [],
      options: __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["regionDataPlus"],
      addHead: [[{
        label: '子件图片',
        width: '120',
        prop: 'img_url',
        type: 'img'
      }, {
        label: '商品编码',
        width: '140',
        prop: 'commodity_code',
        type: 'text'
      }, {
        label: '子件编码',
        width: '140',
        prop: 'component_code',
        type: 'text'
      }, {
        label: '商品简称',
        width: '130',
        prop: 'short_name',
        type: 'text'
      }, {
        label: '子件名称',
        width: '120',
        prop: 'spec',
        type: 'text'
      }, {
        label: '颜色',
        width: '120',
        prop: 'color',
        type: 'text'
      }, {
        label: '材质',
        width: '120',
        prop: 'materials',
        type: 'text'
      }, {
        label: '功能',
        width: '120',
        prop: 'function',
        type: 'text'
      }, {
        label: '特殊',
        width: '120',
        prop: 'special',
        type: 'text'
      }, {
        label: '其他',
        width: '120',
        prop: 'other',
        type: 'text'
      }, {
        label: '淘宝售价',
        width: '130',
        prop: 'tb_price',
        type: 'number'
      }, {
        label: '标准售价',
        width: '130',
        prop: 'price',
        type: 'number'
      }, {
        label: '最低销售价格',
        width: '140',
        prop: 'lowest_price',
        type: 'number'
      }, {
        label: '最高销售价格',
        width: '140',
        prop: 'highest_price',
        type: 'number'
      }, {
        label: '包件数',
        width: '130',
        prop: 'package_quantity',
        type: 'number'
      },
      /* {
         label: '金额(线下)',
         width: '130',
         prop: 'under_line_total_amount',
         type: 'number',
       },
       {
         label: '实际金额(线下)',
         width: '130',
         prop: 'under_line_payment',
         type: 'number',
       },*/
      {
        label: '数量',
        width: '120',
        prop: 'newData',
        inProp: 'quantity',
        type: 'number'
      }, {
        label: '体积',
        width: '120',
        prop: 'newData',
        inProp: 'total_volume',
        type: 'number'
      }, {
        label: '油漆',
        width: '120',
        prop: 'newData',
        inProp: 'paint',
        type: 'text'
      }, {
        label: '印刷费用',
        width: '120',
        prop: 'newData',
        inProp: 'printing_fee',
        type: 'number'
      }, {
        label: '需要印刷',
        width: '90',
        prop: 'newData',
        inProp: 'is_printing',
        type: 'checkbox'
      }, {
        label: '备注',
        width: '120',
        prop: 'newData',
        inProp: 'remark',
        type: 'textarea'
      }, {
        label: '现货',
        width: '90',
        prop: 'newData',
        inProp: 'is_spot_goods',
        type: 'checkbox'
      }, {
        label: '单价(线下)',
        width: '130',
        prop: 'newData',
        inProp: 'under_line_univalent',
        type: 'number'
      }, {
        label: '优惠(线下)',
        width: '130',
        prop: 'newData',
        inProp: 'under_line_preferential',
        type: 'number'
      }], [{
        label: '姓名',
        prop: 'receiver_name',
        holder: '请输入姓名',
        type: 'text'
      }, {
        label: '固定电话',
        prop: 'receiver_phone',
        holder: '请输入固定电话',
        type: 'number'
      }, {
        label: '手机',
        prop: 'receiver_mobile',
        holder: '请输入手机号码',
        type: 'number'
      }, {
        label: '省市区',
        prop: 'provinces',
        type: 'cascader'
      }, {
        label: '地址',
        prop: 'receiver_address',
        type: 'text'
      }, {
        label: '邮编',
        prop: 'receiver_zip',
        holder: '请输入邮编',
        type: 'text'
      }], [{
        label: '类型名称',
        prop: 'payment_methods_id',
        type: 'select',
        stateVal: 'feetypes'
      }, {
        label: '金额',
        prop: 'payment',
        type: 'number'
      }]],
      proMask: false,
      proQuery: {
        commodity_code: '',
        component_code: '',
        shops_id: '',
        short_name: ''
      },
      proSkuHead: [{
        label: '产品图片',
        width: '120',
        prop: "img",
        type: 'img'
      }, {
        label: '商品编码',
        width: '120',
        prop: "commodity_code",
        type: 'text'
      }, {
        label: '工厂型号',
        width: '120',
        prop: "factory_model",
        type: 'text'
      }, {
        label: '商品简称',
        width: '120',
        prop: "short_name",
        type: 'text'
      }, {
        label: '类别名称',
        width: '120',
        prop: "goodsCategory",
        inProp: 'name',
        type: 'text'
      }, {
        label: '商品备注',
        width: '120',
        prop: "remark",
        type: 'text'
      }],
      proSkuVal: [],
      toggleText: false,
      toggleHeight: true,
      clickFlag: false,
      proCurSkuData: {},
      proCompVal: [],
      proCompHead: [{
        label: '组合',
        width: '90',
        prop: 'is_common',
        type: 'checkbox'
      }, {
        label: '子件图片',
        width: '120',
        prop: 'img_url',
        type: 'img'
      }, {
        label: '子件编码',
        width: '140',
        prop: 'component_code',
        type: 'text'
      }, {
        label: '子件名称',
        width: '120',
        prop: 'spec',
        type: 'text'
      }, {
        label: '颜色',
        width: '120',
        prop: 'color',
        type: 'text'
      }, {
        label: '材质',
        width: '120',
        prop: 'materials',
        type: 'text'
      }, {
        label: '功能',
        width: '120',
        prop: 'function',
        type: 'text'
      }, {
        label: '特殊',
        width: '120',
        prop: 'special',
        type: 'text'
      }, {
        label: '其他',
        width: '120',
        prop: 'other',
        type: 'text'
      }, {
        label: '淘宝售价',
        width: '130',
        prop: 'tb_price',
        type: 'number'
      }, {
        label: '标准售价',
        width: '130',
        prop: 'price',
        type: 'number'
      }, {
        label: '最低销售价格',
        width: '140',
        prop: 'lowest_price',
        type: 'number'
      }, {
        label: '最高销售价格',
        width: '140',
        prop: 'highest_price',
        type: 'number'
      }, {
        label: '体积',
        width: '120',
        prop: 'volume',
        type: 'number'
      }, {
        label: '包件数',
        width: '130',
        prop: 'package_quantity',
        type: 'number'
      }, {
        label: '停产',
        width: '90',
        prop: 'is_stop_pro',
        type: 'checkbox'
      }, {
        label: '数量',
        width: '120',
        prop: 'newData',
        inProp: 'quantity',
        type: 'number'
      }, {
        label: '油漆',
        width: '120',
        prop: 'newData',
        inProp: 'paint',
        type: 'text'
      }, {
        label: '需要印刷',
        width: '90',
        prop: 'newData',
        inProp: 'is_printing',
        type: 'checkbox'
      }, {
        label: '印刷费用',
        width: '120',
        prop: 'newData',
        inProp: 'printing_fee',
        type: 'number'
      }, {
        label: '现货',
        width: '90',
        prop: 'newData',
        inProp: 'is_spot_goods',
        type: 'checkbox'
      }, {
        label: '单价(线下)',
        width: '130',
        prop: 'newData',
        inProp: 'under_line_univalent',
        type: 'number'
      }, {
        label: '优惠(线下)',
        width: '130',
        prop: 'newData',
        inProp: 'under_line_preferential',
        type: 'number'
      }],
      proCompRowIndex: '',
      proSubmitData: [],
      proIds: [],
      addIds: [],
      proCompRow: {},
      proRIndex: '',
      receiveInfo: {
        receiver_name: '',
        receiver_phone: '',
        receiver_mobile: '',
        provinces: [],
        receiver_state: '',
        receiver_city: '',
        receiver_district: '',
        receiver_address: '',
        receiver_zip: ''
      },
      halfForm: true,
      expenseData: [{
        payment_methods_id: '',
        payment: ''
      }],
      expenseRIndex: ''

    };
  },

  computed: {
    list: function list() {
      var _search = this.searchBox.vip_name;
      var arr = [];
      for (var i = 0; i < this.tableData3.length; i++) {
        if (this.tableData3[i].name.search(_search) != -1) {
          arr.push(this.tableData3[i]);
        }
      }
      return arr;
    },
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
  filters: {
    /*conditions: function(items){
      let searchRegex = new RegExp(this.searchBox.vip_name, 'i');
      let arr=[];
      for(let i= 0, j = items.length; i < j; i++){
        arr[i] = {};
        arr[i].contacters = [];
        for(let item = 0, len = items[i].contacters.length; item < len; item++){
          if(searchRegex.test(items[i].contacters[item].name) || searchRegex.test(items[i].contacters[item].enterpriseName) || searchRegex.test(items[i].contacters[item].phoneNumber) || searchRegex.test(items[i].contacters[item].uniqueID)){
            arr[i].firstLetter = items[i].firstLetter;
            arr[i].contacters.push(items[i].contacters[item]);
          }
        }
      }
      return arr;
    }
    */
  },
  methods: {
    toggleShow: function toggleShow() {
      this.filterBox = !this.filterBox;
    },
    test: function test() {
      console.log(1);
    },

    /*获取数据*/
    outerHandleClick: function outerHandleClick(tab, event) {},
    fetchData: function fetchData() {
      var _this = this;

      this.$fetch(this.urls.customerservicedepts, { 'include': 'shop,logistic,freightType,distribution,distributionMethod,distributionType,takeDeliveryGoodsWay,customerType,paymentMethod,warehouses,orderItems,businessPersonnel,locker,paymentDetails' }).then(function (res) {
        _this.$store.dispatch('warehouses', '/warehouses');
        _this.$store.dispatch('feetypes', '/feetypes');
        _this.$store.dispatch('shops', '/shops');
        _this.$store.dispatch('logistics', '/logistics');
      }, function (err) {});
    },
    leftHandleClick: function leftHandleClick() {},
    rightHandleClick: function rightHandleClick() {},
    orderListRClick: function orderListRClick() {},

    /*新增*/
    addCustomer: function addCustomer() {
      this.addCustomerMask = true;
      this.addIds = [];
      this.proData = [];
      this.proRIndex = '';
      this.$store.dispatch('freighttypes', '/freighttypes');
      this.$store.dispatch('distributions', '/distributions');
      this.$store.dispatch('distmets', '/distmets');
      this.$store.dispatch('distributiontypes', '/distributiontypes');
      this.$store.dispatch('takedeliverygoodsways', '/takedeliverygoodsways');
      this.$store.dispatch('customertypes', '/customertypes');
    },
    proQueryClick: function proQueryClick() {
      var _this2 = this;

      this.proCompVal = [];
      this.$fetch(this.urls.products, { 'status': true, 'commodity_code': this.proQuery.commodity_code, 'component_code': this.proQuery.component_code, 'shops_id': this.proQuery.shops_id, 'short_name': this.proQuery.short_name, 'include': 'productComponents.product,shop,supplier,goodsCategory,combinations.productComponents' }).then(function (res) {
        _this2.proSkuVal = res.data;
        var comb = res.data[0]['combinations']['data'];
        if (comb.length > 0 && comb[0]['productComponents']['data'].length > 0) {
          comb[0]['productComponents']['data'].map(function (item) {
            _this2.$set(item, 'products_id', comb[0].pid);
            _this2.$set(item, 'combinations_id', comb[0].id);
            _this2.$set(item, 'commodity_code', res.data[0].commodity_code);
            _this2.$set(item, 'short_name', res.data[0].short_name);
            _this2.$set(item, 'newData', {
              quantity: '',
              paint: '',
              is_printing: false,
              printing_fee: '',
              is_spot_goods: true,
              under_line_univalent: '',
              under_line_preferential: '',
              total_volume: res['data'][0].volume
            });
            _this2.proCompVal.push(item);
          });
        }
      }, function (err) {});
    },
    addHandleClick: function addHandleClick() {},
    addProRCName: function addProRCName(_ref) {
      var row = _ref.row,
          rowIndex = _ref.rowIndex;
      row.index = rowIndex;
    },
    addProRowClick: function addProRowClick(row) {
      this.proRIndex = 'index' + row.index;
    },
    addDelPro: function addDelPro(index) {
      this.proData.splice(index, 1);
    },
    addCustomerConfirm: function addCustomerConfirm() {
      var forData = this.addCustomerFormVal;
      var submitData = {
        shops_id: forData.shops_id,
        member_nick: forData.member_nick,
        logistics_id: forData.logistics_id,
        billing_way: forData.billing_way,
        promise_ship_time: forData.promise_ship_time,
        freight_types_id: forData.freight_types_id,
        expected_freight: forData.expected_freight,
        distributions_id: forData.distributions_id,
        distribution_methods_id: forData.distribution_methods_id,
        deliver_goods_fee: forData.deliver_goods_fee,
        move_upstairs_fee: forData.move_upstairs_fee,
        installation_fee: forData.installation_fee,
        total_distribution_fee: forData.total_distribution_fee,
        distribution_phone: forData.distribution_phone,
        distribution_no: forData.distribution_no,
        distribution_types_id: forData.distribution_types_id,
        service_car_info: forData.service_car_info,
        take_delivery_goods_fee: forData.take_delivery_goods_fee,
        take_delivery_goods_ways_id: forData.take_delivery_goods_ways_id,
        express_fee: forData.express_fee,
        service_car_fee: forData.service_car_fee,
        cancel_after_verification_code: forData.cancel_after_verification_code,
        wooden_frame_costs: forData.wooden_frame_costs,
        preferential_cashback: forData.preferential_cashback,
        favorable_cashback: forData.favorable_cashback,
        customer_types_id: forData.customer_types_id,
        is_invoice: forData.is_invoice,
        invoice_express_fee: forData.invoice_express_fee,
        express_invoice_title: forData.express_invoice_title,
        contract_no: forData.contract_no,
        payment_methods_id: forData.payment_methods_id,
        deposit: forData.deposit,
        document_title: forData.document_title,
        warehouses_id: forData.warehouses_id,
        payment_date: forData.payment_date,
        interest_concessions: forData.interest_concessions,
        is_notice: forData.is_notice,
        is_cancel_after_verification: forData.is_cancel_after_verification,
        accept_order_user: forData.accept_order_user,
        tax_number: forData.tax_number,
        receipt: forData.receipt,
        logistics_remark: forData.logistics_remark,
        seller_remark: forData.seller_remark,
        customer_service_remark: forData.customer_service_remark,
        buyer_message: forData.buyer_message,
        status: forData.status,
        receiver_name: this.receiveInfo.receiver_name,
        receiver_phone: this.receiveInfo.receiver_phone,
        receiver_mobile: this.receiveInfo.receiver_mobile,
        receiver_state: __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["CodeToText"][this.receiveInfo.provinces[0]],
        receiver_city: __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["CodeToText"][this.receiveInfo.provinces[1]],
        receiver_district: __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["CodeToText"][this.receiveInfo.provinces[2]],
        receiver_address: this.receiveInfo.receiver_address,
        receiver_zip: this.receiveInfo.receiver_zip,
        order_items: [],
        payment_details: []
      };
      this.proData.map(function (item) {
        var proD = {
          products_id: item['newData'].products_id,
          combinations_id: item['newData'].combinations_id,
          total_volume: item['newData'].total_volume,
          paint: item['newData'].paint,
          is_printing: item['newData'].is_printing,
          printing_fee: item['newData'].printing_fee,
          is_spot_goods: item['newData'].is_spot_goods,
          under_line_univalent: item['newData'].under_line_univalent,
          under_line_total_amount: item['newData'].under_line_total_amount,
          under_line_preferential: item['newData'].under_line_preferential
        };
        submitData.order_items.push(proD);
      });
      this.expenseData.map(function (list) {
        var expenseD = {
          payment: list.payment,
          payment_methods_id: list.payment_methods_id
        };
        submitData.order_items.push(expenseD);
      });
      console.log('submitData', submitData);
    },
    addCustomerCancel: function addCustomerCancel() {
      this.addCustomerMask = false;
      this.$message({
        message: '取消新增订单明细',
        type: 'success'
      });
    },

    /*商品明细*/
    addProDtl: function addProDtl() {
      this.proMask = true;
      Object.assign(this.proQuery, this.$options.data().proQuery);
      this.proSkuVal = [];
      this.proCompVal = [];
      this.proIds = [];
    },
    toggleForm: function toggleForm() {
      /*展开  partHide
      * 折叠  没有partHide*/
      this.clickFlag = !this.clickFlag;
      this.toggleText = !this.toggleText;
      if (this.clickFlag) {
        $('#form').removeClass('hidePart');
        $('#elTabs').removeClass('hidePart');
      } else {
        $('#form').addClass('hidePart');
        $('#elTabs').addClass('hidePart');
      }
    },
    proSkuRowClick: function proSkuRowClick(row) {
      var _this3 = this;

      this.proCompVal = [];
      this.proCompRowIndex = '';
      var comb = row['combinations']['data'];
      if (comb.length > 0) {
        comb.map(function (list) {
          if (list['productComponents']['data'].length > 0) {
            list['productComponents']['data'].map(function (proComp) {
              _this3.$set(item, 'products_id', list.pid);
              _this3.$set(item, 'combinations_id', list.id);
              _this3.$set(item, 'commodity_code', row.commodity_code);
              _this3.$set(item, 'short_name', row.short_name);
              _this3.$set(proComp, 'newData', {
                quantity: '',
                paint: '',
                is_printing: false,
                printing_fee: '0.0',
                is_spot_goods: false,
                under_line_univalent: '0.0',
                under_line_preferential: '0.0',
                total_volume: row.volume
              });
              _this3.proCompVal.push(item);
            });
          }
        });
      }
    },
    proSkuCName: function proSkuCName() {},
    proCompCName: function proCompCName(_ref2) {
      var row = _ref2.row,
          rowIndex = _ref2.rowIndex;
      row.index = rowIndex;
    },
    proCompRowClick: function proCompRowClick(row) {
      this.proCompRowIndex = 'index' + row.index;
      this.proCompRow = row;
    },
    quantityChg: function quantityChg(value) {
      var _this4 = this;

      if (value > 0) {
        var proCRow = this.proCompRow;
        // console.log('proCRow',proCRow);
        if (this.proIds.indexOf(proCRow.id) == -1) {
          this.proIds.push(proCRow.id);
          this.proSubmitData.push(proCRow);
        } else {
          this.proSubmitData.map(function (list, index) {
            if (list.id == proCRow.id) {
              _this4.proSubmitData.splice(index, 1);
              _this4.proSubmitData.push(proCRow);
            }
          });
          // console.log('proSubmitData',this.proSubmitData);
        }
      }
    },
    confirmAddProDtl: function confirmAddProDtl() {
      var _this5 = this;

      this.proSubmitData.map(function (item) {
        if (_this5.addIds.indexOf(item.id) == -1) {
          _this5.proData.push(item);
          _this5.addIds.push(item.id);
          _this5.$message({
            message: '添加商品信息成功',
            type: 'success'
          });
        } else {
          _this5.proData.map(function (list, index) {
            if (list.id == item.id) {
              _this5.proData.splice(index, 1);
              _this5.proData.push(item);
              _this5.$message({
                message: '添加商品信息成功',
                type: 'success'
              });
            }
          });
        }
      });
    },
    cancelAddProDtl: function cancelAddProDtl() {
      this.proMask = false;
    },
    addDelExpense: function addDelExpense(index) {
      this.expenseData.splice(index, 1);
      this.$message({
        message: '删除成功',
        type: 'success'
      });
    },
    addExpenseRCName: function addExpenseRCName(_ref3) {
      var row = _ref3.row,
          rowIndex = _ref3.rowIndex;
      row.index = rowIndex;
    },
    addExpenseRClick: function addExpenseRClick(row) {
      this.expenseRIndex = 'index' + row.index;
    },

    /*新增行*/
    addExpenseLine: function addExpenseLine() {
      this.expenseData.push({
        payment_methods_id: '',
        payment: ''
      });
    },
    toggleSelection: function toggleSelection(rows) {
      var _this6 = this;

      if (rows) {
        rows.forEach(function (row) {
          _this6.$refs.multipleTable.toggleRowSelection(row);
        });
      } else {
        this.$refs.multipleTable.clearSelection();
      }
    },
    handleSelectionChange: function handleSelectionChange(val) {
      this.multipleSelection = val;
    },
    resets: function resets() {
      this.searchBox = {};
    }
  },
  mounted: function mounted() {
    this.fetchData();
    this.$store.dispatch('setOpt', this.newOpt);
    var that = this;
    $(window).resize(function () {
      that.$store.dispatch('setOpt', that.newOpt);
    });
  }
});

/***/ }),

/***/ 659:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c(
        "el-tabs",
        {
          on: { "tab-click": _vm.outerHandleClick },
          model: {
            value: _vm.activeName,
            callback: function($$v) {
              _vm.activeName = $$v
            },
            expression: "activeName"
          }
        },
        [
          _c(
            "el-tab-pane",
            { attrs: { label: "订单列表", name: "0" } },
            [
              _c("div", [
                _c("div", { staticClass: "searchBox" }, [
                  _c(
                    "span",
                    [
                      _c("label", [_vm._v("会员名称")]),
                      _c("el-input", {
                        attrs: { clearable: "" },
                        model: {
                          value: _vm.searchBox.vip_name,
                          callback: function($$v) {
                            _vm.$set(_vm.searchBox, "vip_name", $$v)
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
                      _c("label", [_vm._v("订单编号")]),
                      _c("el-input", {
                        attrs: { clearable: "" },
                        model: {
                          value: _vm.searchBox.order_num,
                          callback: function($$v) {
                            _vm.$set(_vm.searchBox, "order_num", $$v)
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
                      _c("label", [_vm._v("收货人")]),
                      _c("el-input", {
                        attrs: { clearable: "" },
                        model: {
                          value: _vm.searchBox.order_man,
                          callback: function($$v) {
                            _vm.$set(_vm.searchBox, "order_man", $$v)
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
                          _c("label", [_vm._v("收货手机")]),
                          _c("el-input", {
                            attrs: { clearable: "" },
                            model: {
                              value: _vm.searchBox.order_phone,
                              callback: function($$v) {
                                _vm.$set(_vm.searchBox, "order_phone", $$v)
                              },
                              expression: "searchBox.order_phone"
                            }
                          })
                        ],
                        1
                      )
                    : _c(
                        "span",
                        [
                          _c("el-button", { attrs: { type: "primary" } }, [
                            _vm._v("筛选")
                          ]),
                          _vm._v(" "),
                          _c("el-button", [_vm._v("重置")]),
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
                        _c("label", [_vm._v("收货地址")]),
                        _c("el-input", {
                          attrs: { clearable: "" },
                          model: {
                            value: _vm.searchBox.order_address,
                            callback: function($$v) {
                              _vm.$set(_vm.searchBox, "order_address", $$v)
                            },
                            expression: "searchBox.order_address"
                          }
                        })
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "span",
                      [
                        _c("label", [_vm._v("所属店铺")]),
                        _vm._v(" "),
                        _c(
                          "el-select",
                          {
                            attrs: { clearable: "", placeholder: "请选择" },
                            model: {
                              value: _vm.searchBox.order_shop,
                              callback: function($$v) {
                                _vm.$set(_vm.searchBox, "order_shop", $$v)
                              },
                              expression: "searchBox.order_shop"
                            }
                          },
                          _vm._l(_vm.searchBox.orderShops, function(item) {
                            return _c("el-option", {
                              key: item.value,
                              attrs: { label: item.label, value: item.value }
                            })
                          })
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "span",
                      [
                        _c("label", [_vm._v("包含商品")]),
                        _c("el-input", {
                          attrs: { clearable: "" },
                          model: {
                            value: _vm.searchBox.order_goods,
                            callback: function($$v) {
                              _vm.$set(_vm.searchBox, "order_goods", $$v)
                            },
                            expression: "searchBox.order_goods"
                          }
                        })
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "span",
                      [
                        _c("label", [_vm._v("业务员")]),
                        _c("el-input", {
                          attrs: { clearable: "" },
                          model: {
                            value: _vm.searchBox.order_staff,
                            callback: function($$v) {
                              _vm.$set(_vm.searchBox, "order_staff", $$v)
                            },
                            expression: "searchBox.order_staff"
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
                        _c("label", [_vm._v("卖家备注")]),
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
                        _c("label", [_vm._v("物流公司")]),
                        _vm._v(" "),
                        _c(
                          "el-select",
                          {
                            attrs: { clearable: "", placeholder: "请选择" },
                            model: {
                              value: _vm.searchBox.order_company,
                              callback: function($$v) {
                                _vm.$set(_vm.searchBox, "order_company", $$v)
                              },
                              expression: "searchBox.order_company"
                            }
                          },
                          _vm._l(_vm.searchBox.orderCompany, function(item) {
                            return _c("el-option", {
                              key: item.value,
                              attrs: { label: item.label, value: item.value }
                            })
                          })
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "span",
                      [
                        _c("label", [_vm._v("淘宝旗帜")]),
                        _vm._v(" "),
                        _c(
                          "el-select",
                          {
                            attrs: { clearable: "", placeholder: "请选择" },
                            model: {
                              value: _vm.searchBox.order_flag,
                              callback: function($$v) {
                                _vm.$set(_vm.searchBox, "order_flag", $$v)
                              },
                              expression: "searchBox.order_flag"
                            }
                          },
                          _vm._l(_vm.searchBox.ordertbFlag, function(item) {
                            return _c("el-option", {
                              key: item.value,
                              attrs: { label: item.label, value: item.value }
                            })
                          })
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "span",
                      [
                        _c("label", [_vm._v("锁定状态")]),
                        _vm._v(" "),
                        _c(
                          "el-select",
                          {
                            attrs: { clearable: "", placeholder: "请选择" },
                            model: {
                              value: _vm.searchBox.order_lock,
                              callback: function($$v) {
                                _vm.$set(_vm.searchBox, "order_lock", $$v)
                              },
                              expression: "searchBox.order_lock"
                            }
                          },
                          _vm._l(_vm.searchBox.orderLock, function(item) {
                            return _c("el-option", {
                              key: item.value,
                              attrs: { label: item.label, value: item.value }
                            })
                          })
                        )
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
                        _c("label", [_vm._v("承诺日期")]),
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
                        _c("label", [_vm._v("业务日期")]),
                        _vm._v(" "),
                        _c("el-date-picker", {
                          attrs: {
                            type: "daterange",
                            "range-separator": "至",
                            "start-placeholder": "开始日期",
                            "end-placeholder": "结束日期"
                          },
                          model: {
                            value: _vm.searchBox.order_workDate,
                            callback: function($$v) {
                              _vm.$set(_vm.searchBox, "order_workDate", $$v)
                            },
                            expression: "searchBox.order_workDate"
                          }
                        })
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "span",
                      [
                        _c("label", [_vm._v("客审日期")]),
                        _vm._v(" "),
                        _c("el-date-picker", {
                          attrs: {
                            type: "daterange",
                            "range-separator": "至",
                            "start-placeholder": "开始日期",
                            "end-placeholder": "结束日期"
                          },
                          model: {
                            value: _vm.searchBox.order_customerInves,
                            callback: function($$v) {
                              _vm.$set(
                                _vm.searchBox,
                                "order_customerInves",
                                $$v
                              )
                            },
                            expression: "searchBox.order_customerInves"
                          }
                        })
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "span",
                      { staticClass: "transMoney" },
                      [
                        _c("label", [_vm._v("交易金额")]),
                        _vm._v(" "),
                        _c("el-input", {
                          attrs: { type: "number", clearable: "" },
                          model: {
                            value: _vm.searchBox.order_transMStart,
                            callback: function($$v) {
                              _vm.$set(_vm.searchBox, "order_transMStart", $$v)
                            },
                            expression: "searchBox.order_transMStart"
                          }
                        }),
                        _vm._v("\n                             至"),
                        _c("el-input", {
                          attrs: { type: "number", clearable: "" },
                          model: {
                            value: _vm.searchBox.order_transMEnd,
                            callback: function($$v) {
                              _vm.$set(_vm.searchBox, "order_transMEnd", $$v)
                            },
                            expression: "searchBox.order_transMEnd"
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
                      { staticStyle: { "text-align": "right" } },
                      [
                        _c("el-button", { attrs: { type: "primary" } }, [
                          _vm._v("筛选")
                        ]),
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
                  model: {
                    value: _vm.leftBtmActiveName,
                    callback: function($$v) {
                      _vm.leftBtmActiveName = $$v
                    },
                    expression: "leftBtmActiveName"
                  }
                },
                [
                  _c("el-tab-pane", { attrs: { label: "商品信息", name: "0" } })
                ],
                1
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "el-tab-pane",
            { attrs: { label: "订单明细", name: "1" } },
            [
              _c("div", [
                _c("div", { staticClass: "searchBox" }, [
                  _c(
                    "span",
                    [
                      _c("label", [_vm._v("会员名称")]),
                      _c("el-input", {
                        attrs: { clearable: "" },
                        model: {
                          value: _vm.searchBox.vip_name,
                          callback: function($$v) {
                            _vm.$set(_vm.searchBox, "vip_name", $$v)
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
                      _c("label", [_vm._v("订单编号")]),
                      _c("el-input", {
                        attrs: { clearable: "" },
                        model: {
                          value: _vm.searchBox.order_num,
                          callback: function($$v) {
                            _vm.$set(_vm.searchBox, "order_num", $$v)
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
                      _c("label", [_vm._v("收货人")]),
                      _c("el-input", {
                        attrs: { clearable: "" },
                        model: {
                          value: _vm.searchBox.order_man,
                          callback: function($$v) {
                            _vm.$set(_vm.searchBox, "order_man", $$v)
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
                          _c("label", [_vm._v("收货手机")]),
                          _c("el-input", {
                            attrs: { clearable: "" },
                            model: {
                              value: _vm.searchBox.order_phone,
                              callback: function($$v) {
                                _vm.$set(_vm.searchBox, "order_phone", $$v)
                              },
                              expression: "searchBox.order_phone"
                            }
                          })
                        ],
                        1
                      )
                    : _c(
                        "span",
                        [
                          _c("el-button", { attrs: { type: "primary" } }, [
                            _vm._v("筛选")
                          ]),
                          _vm._v(" "),
                          _c("el-button", [_vm._v("重置")]),
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
                        _c("label", [_vm._v("收货地址")]),
                        _c("el-input", {
                          attrs: { clearable: "" },
                          model: {
                            value: _vm.searchBox.order_address,
                            callback: function($$v) {
                              _vm.$set(_vm.searchBox, "order_address", $$v)
                            },
                            expression: "searchBox.order_address"
                          }
                        })
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "span",
                      [
                        _c("label", [_vm._v("所属店铺")]),
                        _vm._v(" "),
                        _c(
                          "el-select",
                          {
                            attrs: { clearable: "", placeholder: "请选择" },
                            model: {
                              value: _vm.searchBox.order_shop,
                              callback: function($$v) {
                                _vm.$set(_vm.searchBox, "order_shop", $$v)
                              },
                              expression: "searchBox.order_shop"
                            }
                          },
                          _vm._l(_vm.searchBox.orderShops, function(item) {
                            return _c("el-option", {
                              key: item.value,
                              attrs: { label: item.label, value: item.value }
                            })
                          })
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "span",
                      [
                        _c("label", [_vm._v("包含商品")]),
                        _c("el-input", {
                          attrs: { clearable: "" },
                          model: {
                            value: _vm.searchBox.order_goods,
                            callback: function($$v) {
                              _vm.$set(_vm.searchBox, "order_goods", $$v)
                            },
                            expression: "searchBox.order_goods"
                          }
                        })
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "span",
                      [
                        _c("label", [_vm._v("业务员")]),
                        _c("el-input", {
                          attrs: { clearable: "" },
                          model: {
                            value: _vm.searchBox.order_staff,
                            callback: function($$v) {
                              _vm.$set(_vm.searchBox, "order_staff", $$v)
                            },
                            expression: "searchBox.order_staff"
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
                        _c("label", [_vm._v("卖家备注")]),
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
                        _c("label", [_vm._v("物流公司")]),
                        _vm._v(" "),
                        _c(
                          "el-select",
                          {
                            attrs: { clearable: "", placeholder: "请选择" },
                            model: {
                              value: _vm.searchBox.order_company,
                              callback: function($$v) {
                                _vm.$set(_vm.searchBox, "order_company", $$v)
                              },
                              expression: "searchBox.order_company"
                            }
                          },
                          _vm._l(_vm.searchBox.orderCompany, function(item) {
                            return _c("el-option", {
                              key: item.value,
                              attrs: { label: item.label, value: item.value }
                            })
                          })
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "span",
                      [
                        _c("label", [_vm._v("淘宝旗帜")]),
                        _vm._v(" "),
                        _c(
                          "el-select",
                          {
                            attrs: { clearable: "", placeholder: "请选择" },
                            model: {
                              value: _vm.searchBox.order_flag,
                              callback: function($$v) {
                                _vm.$set(_vm.searchBox, "order_flag", $$v)
                              },
                              expression: "searchBox.order_flag"
                            }
                          },
                          _vm._l(_vm.searchBox.ordertbFlag, function(item) {
                            return _c("el-option", {
                              key: item.value,
                              attrs: { label: item.label, value: item.value }
                            })
                          })
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "span",
                      [
                        _c("label", [_vm._v("锁定状态")]),
                        _vm._v(" "),
                        _c(
                          "el-select",
                          {
                            attrs: { clearable: "", placeholder: "请选择" },
                            model: {
                              value: _vm.searchBox.order_lock,
                              callback: function($$v) {
                                _vm.$set(_vm.searchBox, "order_lock", $$v)
                              },
                              expression: "searchBox.order_lock"
                            }
                          },
                          _vm._l(_vm.searchBox.orderLock, function(item) {
                            return _c("el-option", {
                              key: item.value,
                              attrs: { label: item.label, value: item.value }
                            })
                          })
                        )
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
                        _c("label", [_vm._v("承诺日期")]),
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
                        _c("label", [_vm._v("业务日期")]),
                        _vm._v(" "),
                        _c("el-date-picker", {
                          attrs: {
                            type: "daterange",
                            "range-separator": "至",
                            "start-placeholder": "开始日期",
                            "end-placeholder": "结束日期"
                          },
                          model: {
                            value: _vm.searchBox.order_workDate,
                            callback: function($$v) {
                              _vm.$set(_vm.searchBox, "order_workDate", $$v)
                            },
                            expression: "searchBox.order_workDate"
                          }
                        })
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "span",
                      [
                        _c("label", [_vm._v("客审日期")]),
                        _vm._v(" "),
                        _c("el-date-picker", {
                          attrs: {
                            type: "daterange",
                            "range-separator": "至",
                            "start-placeholder": "开始日期",
                            "end-placeholder": "结束日期"
                          },
                          model: {
                            value: _vm.searchBox.order_customerInves,
                            callback: function($$v) {
                              _vm.$set(
                                _vm.searchBox,
                                "order_customerInves",
                                $$v
                              )
                            },
                            expression: "searchBox.order_customerInves"
                          }
                        })
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "span",
                      { staticClass: "transMoney" },
                      [
                        _c("label", [_vm._v("交易金额")]),
                        _vm._v(" "),
                        _c("el-input", {
                          attrs: { type: "number", clearable: "" },
                          model: {
                            value: _vm.searchBox.order_transMStart,
                            callback: function($$v) {
                              _vm.$set(_vm.searchBox, "order_transMStart", $$v)
                            },
                            expression: "searchBox.order_transMStart"
                          }
                        }),
                        _vm._v("\n                             至"),
                        _c("el-input", {
                          attrs: { type: "number", clearable: "" },
                          model: {
                            value: _vm.searchBox.order_transMEnd,
                            callback: function($$v) {
                              _vm.$set(_vm.searchBox, "order_transMEnd", $$v)
                            },
                            expression: "searchBox.order_transMEnd"
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
                      { staticStyle: { "text-align": "right" } },
                      [
                        _c("el-button", { attrs: { type: "primary" } }, [
                          _vm._v("筛选")
                        ]),
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
                  on: { "tab-click": _vm.rightHandleClick },
                  model: {
                    value: _vm.rightActiveName,
                    callback: function($$v) {
                      _vm.rightActiveName = $$v
                    },
                    expression: "rightActiveName"
                  }
                },
                [
                  _c("el-tab-pane", {
                    attrs: { label: "商品明细", name: "0" }
                  }),
                  _vm._v(" "),
                  _c("el-tab-pane", {
                    attrs: { label: "支付明细", name: "1" }
                  }),
                  _vm._v(" "),
                  _c("el-tab-pane", {
                    attrs: { label: "内部便签", name: "2" }
                  }),
                  _vm._v(" "),
                  _c("el-tab-pane", {
                    attrs: { label: "操作记录", name: "3" }
                  }),
                  _vm._v(" "),
                  _c("el-tab-pane", {
                    attrs: { label: "关联信息", name: "4" }
                  }),
                  _vm._v(" "),
                  _c("el-tab-pane", {
                    attrs: { label: "其他费用", name: "5" }
                  }),
                  _vm._v(" "),
                  _c("el-tab-pane", {
                    attrs: { label: "驳回原因", name: "6" }
                  }),
                  _vm._v(" "),
                  _c("el-tab-pane", {
                    attrs: { label: "优惠列表", name: "7" }
                  }),
                  _vm._v(" "),
                  _c("el-tab-pane", { attrs: { label: "订单图片", name: "8" } })
                ],
                1
              ),
              _vm._v("\n             订单明细\n         ")
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
          staticClass: "bigDialog",
          class: { "more-forms": _vm.moreForms, threeParts: _vm.threeParts },
          attrs: { title: "订单明细", visible: _vm.addCustomerMask },
          on: {
            "update:visible": function($event) {
              _vm.addCustomerMask = $event
            }
          }
        },
        [
          _c(
            "div",
            { staticClass: "clearfix" },
            [
              _c(
                "el-button",
                { staticStyle: { float: "left" }, attrs: { type: "text" } },
                [_vm._v("基础信息")]
              ),
              _vm._v(" "),
              _c(
                "el-button",
                {
                  staticStyle: {
                    float: "right",
                    padding: "6px 10px",
                    "font-size": "12px",
                    "margin-bottom": "5px"
                  },
                  attrs: { type: "primary" },
                  on: { click: _vm.toggleForm }
                },
                [_vm._v(_vm._s(_vm.toggleText ? "折叠" : "展开"))]
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "el-form",
            {
              staticClass: "customerAddForm hidePart",
              attrs: {
                model: _vm.addCustomerFormVal,
                rules: _vm.addCustomerFormRules,
                id: "form"
              }
            },
            _vm._l(_vm.addCustomerFormHead, function(item, index) {
              return _c(
                "el-form-item",
                { key: index, attrs: { label: item.label, prop: item.prop } },
                [
                  item.type == "text"
                    ? _c("span", [
                        item.inProp
                          ? _c(
                              "span",
                              [
                                _c("el-input", {
                                  attrs: {
                                    placeholder: item.holder,
                                    disabled: item.addChgAble
                                  },
                                  model: {
                                    value:
                                      _vm.addCustomerFormVal[item.prop][
                                        item.inProp
                                      ],
                                    callback: function($$v) {
                                      _vm.$set(
                                        _vm.addCustomerFormVal[item.prop],
                                        item.inProp,
                                        typeof $$v === "string"
                                          ? $$v.trim()
                                          : $$v
                                      )
                                    },
                                    expression:
                                      "addCustomerFormVal[item.prop][item.inProp]"
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
                                    placeholder: item.holder,
                                    disabled: item.addChgAble
                                  },
                                  model: {
                                    value: _vm.addCustomerFormVal[item.prop],
                                    callback: function($$v) {
                                      _vm.$set(
                                        _vm.addCustomerFormVal,
                                        item.prop,
                                        typeof $$v === "string"
                                          ? $$v.trim()
                                          : $$v
                                      )
                                    },
                                    expression: "addCustomerFormVal[item.prop]"
                                  }
                                })
                              ],
                              1
                            )
                      ])
                    : item.type == "number"
                      ? _c(
                          "span",
                          [
                            _c("el-input", {
                              attrs: {
                                type: "number",
                                placeholder: item.holder,
                                disabled: item.addChgAble
                              },
                              model: {
                                value: _vm.addCustomerFormVal[item.prop],
                                callback: function($$v) {
                                  _vm.$set(
                                    _vm.addCustomerFormVal,
                                    item.prop,
                                    typeof $$v === "string" ? $$v.trim() : $$v
                                  )
                                },
                                expression: "addCustomerFormVal[item.prop]"
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
                                    placeholder: item.holder,
                                    disabled: item.addChgAble
                                  },
                                  model: {
                                    value: _vm.addCustomerFormVal[item.prop],
                                    callback: function($$v) {
                                      _vm.$set(
                                        _vm.addCustomerFormVal,
                                        item.prop,
                                        $$v
                                      )
                                    },
                                    expression: "addCustomerFormVal[item.prop]"
                                  }
                                },
                                _vm._l(_vm.resData[item.stateVal], function(
                                  list
                                ) {
                                  return _c(
                                    "span",
                                    { key: list.id },
                                    [
                                      _c("el-option", {
                                        attrs: {
                                          label: list.name
                                            ? list.name
                                            : list.nick,
                                          value: list.id
                                        }
                                      })
                                    ],
                                    1
                                  )
                                })
                              )
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
                                    placehode: item.holder
                                  },
                                  model: {
                                    value: _vm.addCustomerFormVal[item.prop],
                                    callback: function($$v) {
                                      _vm.$set(
                                        _vm.addCustomerFormVal,
                                        item.prop,
                                        typeof $$v === "string"
                                          ? $$v.trim()
                                          : $$v
                                      )
                                    },
                                    expression: "addCustomerFormVal[item.prop]"
                                  }
                                })
                              ],
                              1
                            )
                          : item.type == "checkbox"
                            ? _c(
                                "span",
                                [
                                  _c("el-checkbox", {
                                    attrs: { disabled: item.chgAble },
                                    model: {
                                      value: _vm.addCustomerFormVal[item.prop],
                                      callback: function($$v) {
                                        _vm.$set(
                                          _vm.addCustomerFormVal,
                                          item.prop,
                                          $$v
                                        )
                                      },
                                      expression:
                                        "addCustomerFormVal[item.prop]"
                                    }
                                  })
                                ],
                                1
                              )
                            : item.type == "radio"
                              ? _c(
                                  "span",
                                  [
                                    _c(
                                      "el-radio",
                                      {
                                        attrs: { label: "volume" },
                                        model: {
                                          value:
                                            _vm.addCustomerFormVal[item.prop],
                                          callback: function($$v) {
                                            _vm.$set(
                                              _vm.addCustomerFormVal,
                                              item.prop,
                                              $$v
                                            )
                                          },
                                          expression:
                                            "addCustomerFormVal[item.prop]"
                                        }
                                      },
                                      [_vm._v(_vm._s(item.choiceName[0]))]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "el-radio",
                                      {
                                        attrs: { label: "weight" },
                                        model: {
                                          value:
                                            _vm.addCustomerFormVal[item.prop],
                                          callback: function($$v) {
                                            _vm.$set(
                                              _vm.addCustomerFormVal,
                                              item.prop,
                                              $$v
                                            )
                                          },
                                          expression:
                                            "addCustomerFormVal[item.prop]"
                                        }
                                      },
                                      [_vm._v(_vm._s(item.choiceName[1]))]
                                    )
                                  ],
                                  1
                                )
                              : item.type == "DatePicker"
                                ? _c(
                                    "span",
                                    [
                                      _c("el-date-picker", {
                                        attrs: {
                                          type: "date",
                                          format: "yyyy-MM-dd",
                                          "value-format": "yyyy-MM-dd",
                                          placeholder: "选择日期"
                                        },
                                        model: {
                                          value:
                                            _vm.addCustomerFormVal[item.prop],
                                          callback: function($$v) {
                                            _vm.$set(
                                              _vm.addCustomerFormVal,
                                              item.prop,
                                              $$v
                                            )
                                          },
                                          expression:
                                            "addCustomerFormVal[item.prop]"
                                        }
                                      })
                                    ],
                                    1
                                  )
                                : _vm._e()
                ]
              )
            })
          ),
          _vm._v(" "),
          _c(
            "el-tabs",
            {
              staticClass: "hidePart",
              attrs: { id: "elTabs" },
              on: { "tab-click": _vm.addHandleClick },
              model: {
                value: _vm.addActiveName,
                callback: function($$v) {
                  _vm.addActiveName = $$v
                },
                expression: "addActiveName"
              }
            },
            [
              _c(
                "el-tab-pane",
                { attrs: { label: "商品信息", name: "0" } },
                [
                  _c(
                    "el-table",
                    {
                      attrs: {
                        data: _vm.proData,
                        fit: "",
                        "row-class-name": _vm.addProRCName
                      },
                      on: { "row-click": _vm.addProRowClick }
                    },
                    [
                      _vm._l(_vm.addHead[_vm.addActiveName], function(item) {
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
                                  item.prop == "newData"
                                    ? _c("span", [
                                        _vm.proRIndex == "index" + scope.$index
                                          ? _c("span", [
                                              item.type == "number"
                                                ? _c(
                                                    "span",
                                                    [
                                                      _c("el-input", {
                                                        attrs: {
                                                          size: "small",
                                                          type: "number",
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
                                                : item.type == "checkbox"
                                                  ? _c(
                                                      "span",
                                                      [
                                                        _c("el-checkbox", {
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
                                                  : _c(
                                                      "span",
                                                      [
                                                        _c("el-input", {
                                                          attrs: {
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
                                            ])
                                          : _c("span", [
                                              item.type == "checkbox"
                                                ? _c(
                                                    "span",
                                                    [
                                                      _c("el-checkbox", {
                                                        attrs: { disabled: "" },
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
                                                      value:
                                                        scope.row[item.prop],
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
                                                              scope.row[
                                                                item.prop
                                                              ]
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
                                                              scope.row[
                                                                item.alt
                                                              ]
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
                                                          ? scope.row[
                                                              item.prop
                                                            ][item.inProp]
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
                                        _vm.addDelPro(scope.$index)
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
                { attrs: { label: "收货信息", name: "1" } },
                [
                  _c(
                    "el-form",
                    { staticClass: "half", attrs: { model: _vm.receiveInfo } },
                    _vm._l(_vm.addHead[_vm.addActiveName], function(
                      item,
                      index
                    ) {
                      return _c(
                        "el-form-item",
                        {
                          key: index,
                          attrs: { label: item.label, prop: item.label }
                        },
                        [
                          item.type == "number"
                            ? _c(
                                "span",
                                [
                                  _c("el-input", {
                                    attrs: {
                                      type: "number",
                                      placeholder: item.holder
                                    },
                                    model: {
                                      value: _vm.receiveInfo[item.prop],
                                      callback: function($$v) {
                                        _vm.$set(
                                          _vm.receiveInfo,
                                          item.prop,
                                          typeof $$v === "string"
                                            ? $$v.trim()
                                            : $$v
                                        )
                                      },
                                      expression: "receiveInfo[item.prop]"
                                    }
                                  })
                                ],
                                1
                              )
                            : item.type == "cascader"
                              ? _c(
                                  "span",
                                  [
                                    _c("el-cascader", {
                                      attrs: {
                                        size: "large",
                                        options: _vm.options
                                      },
                                      model: {
                                        value: _vm.receiveInfo[item.prop],
                                        callback: function($$v) {
                                          _vm.$set(
                                            _vm.receiveInfo,
                                            item.prop,
                                            $$v
                                          )
                                        },
                                        expression: "receiveInfo[item.prop]"
                                      }
                                    })
                                  ],
                                  1
                                )
                              : _c(
                                  "span",
                                  [
                                    _c("el-input", {
                                      attrs: { placeholder: item.holder },
                                      model: {
                                        value: _vm.receiveInfo[item.prop],
                                        callback: function($$v) {
                                          _vm.$set(
                                            _vm.receiveInfo,
                                            item.prop,
                                            typeof $$v === "string"
                                              ? $$v.trim()
                                              : $$v
                                          )
                                        },
                                        expression: "receiveInfo[item.prop]"
                                      }
                                    })
                                  ],
                                  1
                                )
                        ]
                      )
                    })
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-tab-pane",
                { attrs: { label: "费用类型", name: "2" } },
                [
                  _c(
                    "el-table",
                    {
                      attrs: {
                        data: _vm.expenseData,
                        fit: "",
                        "row-class-name": _vm.addExpenseRCName
                      },
                      on: { "row-click": _vm.addExpenseRClick }
                    },
                    [
                      _vm._l(_vm.addHead[_vm.addActiveName], function(item) {
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
                                  _vm.expenseRIndex == "index" + scope.$index
                                    ? _c("span", [
                                        item.type == "select"
                                          ? _c(
                                              "span",
                                              [
                                                _c(
                                                  "el-select",
                                                  {
                                                    attrs: {
                                                      placeholder: item.holder
                                                    },
                                                    model: {
                                                      value:
                                                        scope.row[item.prop],
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
                                          : _c(
                                              "span",
                                              [
                                                _c("el-input", {
                                                  attrs: {
                                                    size: "small",
                                                    type: "number",
                                                    placeholder: item.holder
                                                  },
                                                  model: {
                                                    value: scope.row[item.prop],
                                                    callback: function($$v) {
                                                      _vm.$set(
                                                        scope.row,
                                                        item.prop,
                                                        typeof $$v === "string"
                                                          ? $$v.trim()
                                                          : $$v
                                                      )
                                                    },
                                                    expression:
                                                      "scope.row[item.prop]"
                                                  }
                                                })
                                              ],
                                              1
                                            )
                                      ])
                                    : _c("span", [
                                        item.type == "select"
                                          ? _c(
                                              "span",
                                              _vm._l(
                                                _vm.resData[item.stateVal],
                                                function(list, index) {
                                                  return _c(
                                                    "span",
                                                    { key: index },
                                                    [
                                                      list.id ==
                                                      scope.row[item.prop]
                                                        ? _c("span", [
                                                            _vm._v(
                                                              "\n                                              " +
                                                                _vm._s(
                                                                  list.name
                                                                ) +
                                                                "\n                                          "
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
                                                  _vm._s(scope.row[item.prop]) +
                                                  "\n                             "
                                              )
                                            ])
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
                                        _vm.addDelExpense(scope.$index)
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
                  _vm.addActiveName == "0"
                    ? _c(
                        "el-button",
                        {
                          attrs: { type: "primary" },
                          on: { click: _vm.addProDtl }
                        },
                        [_vm._v("添加商品")]
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  _vm.addActiveName == "2"
                    ? _c(
                        "el-button",
                        {
                          attrs: { type: "primary" },
                          on: { click: _vm.addExpenseLine }
                        },
                        [_vm._v("新增行")]
                      )
                    : _vm._e()
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
                      on: { click: _vm.addCustomerConfirm }
                    },
                    [_vm._v("确定")]
                  ),
                  _vm._v(" "),
                  _c("el-button", { on: { click: _vm.addCustomerCancel } }, [
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
                  _c("label", [_vm._v("商品类别")]),
                  _vm._v(" "),
                  _c(
                    "el-select",
                    {
                      attrs: { clearable: "", placeholder: "请选择商品类别" },
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
                "span",
                [
                  _c("label", [_vm._v("商品简称")]),
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
                      value: _vm.proQuery.short_name,
                      callback: function($$v) {
                        _vm.$set(
                          _vm.proQuery,
                          "short_name",
                          typeof $$v === "string" ? $$v.trim() : $$v
                        )
                      },
                      expression: "proQuery.short_name"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "span",
                [
                  _c("label", [_vm._v("组合筛选")]),
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
                  _c("label", [_vm._v("成品筛选")]),
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
                data: _vm.proSkuVal,
                fit: "",
                height: "250",
                "row-class-name": _vm.proSkuCName
              },
              on: { "row-click": _vm.proSkuRowClick }
            },
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
                                      "\n                            " +
                                        _vm._s(
                                          item.inProp
                                            ? scope.row[item.prop][item.inProp]
                                            : scope.row[item.prop]
                                        ) +
                                        "\n                        "
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
                        item.prop == "newData"
                          ? _c("span", [
                              _vm.proCompRowIndex == "index" + scope.$index
                                ? _c("span", [
                                    item.type == "number"
                                      ? _c("span", [
                                          item.inProp == "quantity"
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
                                                      input: _vm.quantityChg
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
                                            : _c(
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
                                                      callback: function($$v) {
                                                        _vm.$set(
                                                          scope.row[item.prop],
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
                                        ])
                                      : _c(
                                          "span",
                                          [
                                            _c("el-checkbox", {
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
                                  ])
                                : _c("span", [
                                    item.type == "checkbox"
                                      ? _c(
                                          "span",
                                          [
                                            _c("el-checkbox", {
                                              attrs: { disabled: "" },
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
                _vm._v("关闭")
              ])
            ],
            1
          )
        ],
        1
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-7769224c", module.exports)
  }
}

/***/ })

});
webpackJsonp([17],{

/***/ 453:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(533)
/* template */
var __vue_template__ = __webpack_require__(534)
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
Component.options.__file = "resources\\assets\\js\\views\\order\\merchandiser.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-1f23cf0a", Component.options)
  } else {
    hotAPI.reload("data-v-1f23cf0a", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 533:
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

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      newOpt: [{
        cnt: '修改',
        icon: 'bf-change',
        ent: this.test,
        nClick: true
      }, {
        cnt: '驳回',
        icon: 'bf-reject',
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
        cnt: '发货',
        icon: 'bf-deliver',
        ent: this.test,
        nClick: true
      }, {
        cnt: '结算',
        icon: 'bf-finSettle',
        ent: this.test,
        nClick: true
      }, {
        cnt: '批量处理',
        icon: 'bf-node',
        ent: this.test,
        nClick: true
      }, {
        cnt: '导出',
        icon: 'bf-out',
        ent: this.test
      }, {
        cnt: '合并',
        icon: 'bf-merge',
        ent: this.test,
        nClick: true
      }, {
        cnt: '拆分',
        icon: 'bf-node',
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
        cnt: '订单采购',
        icon: 'bf-purchase',
        ent: this.test
      }, {
        cnt: '生产排单',
        icon: 'bf-machie',
        ent: this.test
      }, {
        cnt: '刷新',
        icon: 'bf-refresh',
        ent: this.refresh
      }],
      /*获取数据*/
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
      activeName: '0',
      leftTopActiveName: '0',
      rightActiveName: '0',
      orderListData: [],
      orderListHead: [{
        label: '系统订单',
        width: '220',
        prop: 'system_order_no',
        type: 'text'
      }, {
        label: '淘宝单号',
        width: '220',
        prop: 'taobao_oid',
        type: 'text'
      }, {
        label: '店铺昵称',
        width: '150',
        prop: 'shop',
        inProp: 'title',
        type: 'text'
      }, {
        label: '业务员账号',
        width: '140',
        prop: 'businessPersonnel',
        inProp: 'username',
        type: 'text'
      }, {
        label: '业务员姓名',
        width: '140',
        prop: 'businessPersonnel',
        inProp: 'username',
        type: 'text'
      }, {
        label: '锁定人姓名',
        width: '130',
        prop: 'businessPersonnel',
        inProp: 'username',
        type: 'text'
      }, {
        label: '买家昵称',
        width: '130',
        prop: 'member_nick',
        type: 'text'
      }, {
        label: '客户类型',
        width: '130',
        prop: 'customerType',
        inProp: 'name',
        type: 'text'
      }, {
        label: '淘宝旗帜',
        width: '130',
        prop: 'seller_flag',
        type: 'flag'
      }, {
        label: '物流公司',
        width: '140',
        prop: 'logistic',
        inProp: 'name',
        type: 'text'
      }, {
        label: '快递费用',
        width: '120',
        prop: 'express_fee',
        type: 'number'
      },
      /* {
         label: '其他费用',
         width: '120',
         prop: 'is_print',
         type: 'number',
       },*/
      {
        label: '收货人',
        width: '130',
        prop: 'receiver_name',
        type: 'text'
      }, {
        label: '省',
        width: '120',
        prop: 'receiver_state',
        type: 'text'
      }, {
        label: '市',
        width: '120',
        prop: 'receiver_city',
        type: 'text'
      }, {
        label: '区',
        width: '120',
        prop: 'receiver_district',
        type: 'text'
      }, {
        label: '收货地址',
        width: '180',
        prop: 'receiver_address',
        type: 'text'
      }, {
        label: '配送商',
        width: '130',
        prop: 'distribution',
        inProp: 'name',
        type: 'text'
      }, {
        label: '发货仓库',
        width: '130',
        prop: 'warehouses',
        inProp: 'name',
        type: 'text'
      }, {
        label: '配送电话',
        width: '150',
        prop: 'distribution',
        inProp: 'phone',
        type: 'number'
      }, {
        label: '配送类型',
        width: '130',
        prop: 'distributionType',
        inProp: 'name',
        type: 'text'
      }, {
        label: '配送方式',
        width: '130',
        prop: 'distributionMethod',
        inProp: 'name',
        type: 'text'
      }, {
        label: '送货费',
        width: '120',
        prop: 'deliver_goods_fee',
        type: 'number'
      }, {
        label: '搬楼费',
        width: '120',
        prop: 'move_upstairs_fee',
        type: 'number'
      }, {
        label: '安装费',
        width: '120',
        prop: 'installation_fee',
        type: 'number'
      }, {
        label: '配送总计',
        width: '130',
        prop: 'total_distribution_fee',
        type: 'number'
      }, {
        label: '配送单号',
        width: '180',
        prop: 'distribution_no',
        type: 'text'
      }, {
        label: '客审时间',
        width: '180',
        prop: 'audit_at',
        type: 'text'
      }, {
        label: '拍单时间',
        width: '180',
        prop: 'created',
        type: 'text'
      }, {
        label: '支付日期',
        width: '180',
        prop: 'payment_date',
        type: 'text'
      }, {
        label: '承诺发货日期',
        width: '180',
        prop: 'promise_ship_time',
        type: 'text'
      },
      /* {
         label: '商品数量',
         width: '120',
         prop: 'is_print',
         type: 'number',
       },*/
      /* {
         label: '(实际售价+其他费用)',
         width: '150',
         prop: '',
         type: 'number',
       },
       {
         label: '商家优惠金额',
         width: '130',
         prop: '',
         type: 'number'
       },
       {
         label: '标记总金额',
         width: '130',
         prop: '',
         type: 'number'
       },
       {
         label: '支付总金额',
         width: '130',
         prop: '',
         type: 'number'
       },
       {
         label: '实际总售价',
         width: '130',
         prop: '',
         type: 'number',
       },*/
      {
        label: '木架费',
        width: '120',
        prop: 'wooden_frame_costs',
        type: 'number'
      }, {
        label: '优惠返现',
        width: '120',
        prop: 'preferential_cashback',
        type: 'number'
      }, {
        label: '好评返现',
        width: '120',
        prop: 'favorable_cashback',
        type: 'number'
      },
      /* {
         label: '拆分主订单',
         width: '130',
         prop: 'is_split',
         type: 'checkbox'
       },*/
      /* {
         label: '标记人',
         width: '130',
         prop: '',
         type: 'text',
       },
       {
         label: '标记名称',
         width: '130',
         prop: '',
         type: 'text'
       },
       {
         label: '标记时间',
         width: '160',
         prop: '',
         type: 'text',
       },*/
      {
        label: '订单来源',
        width: '130',
        prop: 'order_source',
        type: 'text'
      },
      /* {
        label: '分阶段金额',
        width: '130',
        prop: '',
        type: 'number',
      },
      {
        label: '分阶段状态',
        width: '130',
        prop: '',
        type: 'text'
      },*/
      {
        label: '服务车金额',
        width: '130',
        prop: 'service_car_fee',
        type: 'number'
      }, {
        label: '服务车信息',
        width: '150',
        prop: 'service_car_info',
        type: 'text'
      }, {
        label: '门店收款方式',
        width: '130',
        prop: 'paymentMethod',
        inProp: 'name',
        type: 'text'
      }, {
        label: '门店订单金额',
        width: '140',
        prop: 'deposit',
        type: 'number'
      },
      /* {
         label: '门店欠款金额',
         width: '140',
         prop: '',
         type: 'number'
       },
       {
         label: '线下单价汇总',
         width: '140',
         prop: '',
         type: 'number'
       },
       {
         label: '线下金额汇总',
         width: '140',
         prop: '',
         type: 'number'
       },*/
      {
        label: '发票快递费',
        width: '130',
        prop: 'invoice_express_fee',
        type: 'number'
      },
      /* {
         label: '线下优惠汇总',
         width: '140',
         prop: '',
         type: 'number'
       },*/
      /* {
         label: '送货类型-京东',
         width: '140',
         prop: '',
         type: 'text',
       },
       {
         label: '线下实际金额汇总',
         width: '140',
         prop: '',
         type: 'number',
       },
       {
         label: '支付方式-京东',
         width: '140',
         prop: '',
         type: 'text',
       },*/
      {
        label: '需要发票',
        width: '90',
        prop: 'is_invoice',
        type: 'checkbox'
      },
      /*  {
          label: '余额支付金额-京东',
          width: '140',
          prop: '',
          type: 'number'
        },*/
      {
        label: '订单状态',
        width: '140',
        prop: 'order_status',
        type: 'text'
      }, {
        label: '发票信息',
        width: '160',
        prop: 'print_at',
        type: 'text'
      }, {
        label: '纳税识别号',
        width: '180',
        prop: 'tax_number',
        type: 'text'
      },
      /* {
         label: '纳税注册地址',
         width: '180',
         prop: '',
         type: 'text'
       },
       {
         label: '纳税注册电话',
         width: '140',
         prop: '',
         type: 'number'
       },
       {
         label: '纳税开户银行',
         width: '130',
         prop: '',
         type: 'text'
       },
       {
         label: '纳税银行账号',
         width: '180',
         prop: '',
         type: 'number',
       },
       {
         label: '发票信息-唯品会',
         width: '180',
         prop: '',
         type: 'text'
       },*/
      /* {
         label: 'PO单号-唯品会',
         width: '180',
         prop: '',
         type: 'text',
       },
       {
         label: '促销优惠金额-唯品会',
         width: '150',
         prop: '',
         type: 'number',
       },
       {
         label: '期望收货时间-唯品会',
         width: '160',
         prop: '',
         type: 'text',
       },*/
      {
        label: '买家留言',
        width: '150',
        prop: 'buyer_message',
        type: 'text'
      }, {
        label: '客服备注',
        width: '150',
        prop: 'customer_service_remark',
        type: 'text'
      }, {
        label: '卖家备注',
        width: '150',
        prop: 'customer_service_remark',
        type: 'text'
      },
      /* {
         label: '补件原因',
         width: '150',
         prop: '',
         type: 'text',
       },*/
      /* {
         label: '已驳回',
         width: '90',
         prop: '',
         type: 'checkbox'
       },
        {
         label: '分阶段',
         width: '90',
         prop: '',
         type: 'checkbox'
       },*/
      /*{
        label: '服务车',
        width: '90',
        prop: '',
        type: 'checkbox'
      },*/
      /* {
         label: '赠品',
         width: '90',
         prop: '',
         type: 'checkbox'
       },
       {
         label: '红包',
         width: '90',
         prop: '',
         type: 'checkbox',
       },
       {
         label: '已打印',
         width: '90',
         prop: '',
         type: 'checkbox'
       },*/
      /* {
         label: '锁定',
         width: '90',
         prop: '',
         type: 'checkbox',
       },*/
      {
        label: '合并订单',
        width: '90',
        prop: 'is_merge',
        type: 'checkbox'
      }, {
        label: '拆分订单',
        width: '90',
        prop: 'is_split',
        type: 'checkbox'
      }, {
        label: '关联订单',
        width: '90',
        prop: 'is_association',
        type: 'checkbox'
      }, {
        label: '接单人',
        width: '120',
        prop: 'accept_order_user',
        type: 'text'
      }, {
        label: '收据',
        width: '130',
        prop: 'receipt',
        type: 'text'
      },
      /* {
         label: '(订单总额+服务车金额)',
         width: '150',
         prop: '',
         type: 'number'
       },*/
      /* {
         label: '店铺分组',
         width: '120',
         prop: '',
         type: 'text'
       },*/
      {
        label: '关联单号',
        width: '220',
        prop: 'association_taobao_oid',
        type: 'text'
      }, {
        label: '退款信息',
        width: '130',
        prop: 'refund_info',
        type: 'text'
      }, {
        label: '锁定人账号',
        width: '140',
        prop: 'locker',
        inProp: 'username',
        type: 'text'
      },
      /* {
         label: '退审',
         width: '90',
         prop: '',
         type: 'checkbox'
       },
       {
         label: '库存占用',
         width: '90',
         prop: '',
         type: 'checkbox',
       },*/
      {
        label: '需要核销',
        width: '90',
        prop: 'is_cancel_after_verification',
        type: 'checkbox'
      }, {
        label: '等通知发货',
        width: '90',
        prop: 'is_notice',
        type: 'checkbox'
      }],
      loading: true,
      checkboxInit: false,
      orderListIndex: '',
      alreadyHandle: [],
      orderDtlFormVal: {},
      orderDtlFormHead: [{
        label: '系统单号',
        prop: 'system_order_no',
        type: 'text'
      }, {
        label: '淘宝单号',
        prop: 'taobao_oid',
        type: 'text'
      }, {
        label: '交易号',
        prop: 'taobao_tid',
        type: 'text'
      }, {
        label: '单号失联',
        prop: 'association_taobao_oid',
        type: 'text'
      }, {
        label: '所属店铺',
        prop: 'shop_name',
        type: 'text'
      }, {
        label: '业务员',
        prop: 'business_personnel_name',
        type: 'text'
      }, {
        label: '买家昵称',
        prop: 'member_nick',
        type: 'text'
      }, {
        label: '收货人',
        prop: 'receiver_name',
        type: 'text'
      }, {
        label: '手机',
        prop: 'receiver_mobile',
        type: 'text'
      }, {
        label: '电话',
        prop: 'receiver_phone',
        type: 'text'
      }, {
        label: '详细地址',
        prop: 'receiver_address',
        type: 'text'
      }, {
        label: '快递费用',
        prop: 'express_fee',
        type: 'number'
      },
      /*{
        label: '标准总金额',
        prop: 'move_upstairs_fee',
        type: 'number'
      },*/
      {
        label: '运费类型',
        prop: 'freight_types_name',
        type: 'text'
      }, {
        label: '预付运费',
        prop: 'expected_freight',
        type: 'number'
      },
      /*{
        label: '支付总金额',
        prop: 'distribution_phone',
        type: 'number'
      },
      {
        label: '三包类型',
        prop: 'distribution_no',
        type: 'text'
      },
      {
        label: '三包费用',
        prop: '',
        type: 'number'
      },*/
      {
        label: '物流成本',
        prop: 'deliver_goods_fee',
        type: 'number'
      },
      /*   {
           label: '订单总额',
           prop: '',
           type: 'number'
         },*/
      /*  {
          label: '订单时间',
          prop: '',
          type: 'text'
        },*/
      {
        label: '付款时间',
        prop: 'payment_date',
        type: 'text'
      }, {
        label: '承诺时间',
        prop: 'promise_ship_time',
        type: 'text'
      }, {
        label: '物流公司',
        prop: 'logistic_name',
        type: 'text'
      }, {
        label: '配送方式',
        prop: 'distribution_method',
        type: 'text'
      }, {
        label: '配送信息',
        prop: 'service_car_info',
        type: 'text'
      }, {
        label: '费用类型',
        prop: 'deliver_goods_fee',
        type: 'text'
      }, {
        label: '配送商',
        prop: 'distribution_name',
        type: 'text'
      }, {
        label: '配送电话',
        prop: 'distribution_phone',
        type: 'text'
      }, {
        label: '配送类型',
        prop: 'distributionType_name',
        type: 'text'
      }, {
        label: '配送总计',
        prop: 'total_distribution_fee',
        type: 'number'
      }, {
        label: '客服备注',
        prop: 'customer_service_remark',
        type: 'textarea'
      }, {
        label: '卖家备注',
        prop: 'seller_remark',
        type: 'textarea'
      }, {
        label: '买家留言',
        prop: 'buyer_message',
        type: 'textarea'
      }],
      proDtlData: [],
      curRowId: '',
      curRowData: {},
      orderDtlHead: [[{
        label: 'sku名称',
        width: '160',
        prop: 'name',
        type: 'text'
      }, {
        label: '数量',
        width: '130',
        prop: 'quantity',
        type: 'number'
      }, {
        label: '油漆',
        width: '120',
        prop: 'paint',
        type: 'text'
      }, {
        label: '需要印刷',
        width: '120',
        prop: 'is_printing',
        type: 'checkbox'
      }, {
        label: '总体积',
        width: '120',
        prop: 'total_volume',
        type: 'number'
      }, {
        label: '印刷费用',
        width: '140',
        prop: 'printing_fee',
        type: 'number'
      }, {
        label: '现货',
        width: '120',
        prop: 'is_spot_goods',
        type: 'checkbox'
      }, {
        label: '单价(线下)',
        width: '150',
        prop: 'under_line_univalent',
        type: 'number'
      }, {
        label: '优惠(线下)',
        width: '150',
        prop: 'under_line_preferential',
        type: 'number'
      }], [{
        label: '支付金额',
        prop: 'payment',
        type: 'number'
      }, {
        label: '支付方式',
        prop: 'payment_methods_id',
        type: 'select',
        stateVal: 'paymentmethods'
      }, {
        label: '交易号',
        prop: 'taobao_tid',
        type: 'text'
      }, {
        label: '来源单号',
        prop: 'taobao_oid',
        type: 'text'
      }], [], []],
      payDtlData: []
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

    /*获取数据*/
    toggleShow: function toggleShow() {
      this.filterBox = !this.filterBox;
    },
    outerHandleClick: function outerHandleClick() {
      var index = this.activeName - 0;
      switch (index) {
        case 0:
          this.fetchData();
          break;
        case 1:
          var data = this.orderListData[0];
          /*商品*/
          if (data) {
            this.orderDtlFormVal = {
              system_order_no: data.system_order_no,
              taobao_oid: data.taobao_oid,
              taobao_tid: data.taobao_tid,
              association_taobao_oid: data.association_taobao_oid,
              shop_name: data['shop']['title'],
              business_personnel_name: data['businessPersonnel'] ? data['businessPersonnel']['username'] : '',
              member_nick: data.member_nick,
              receiver_name: data.receiver_name,
              receiver_mobile: data.receiver_mobile,
              receiver_phone: data.receiver_phone,
              receiver_address: data.receiver_address,
              express_fee: data.express_fee,
              freight_types_name: data['freightType']['name'],
              expected_freight: data.expected_freight,
              deliver_goods_fee: data.deliver_goods_fee,
              payment_date: data.payment_date,
              promise_ship_time: data.promise_ship_time,
              distribution_name: data['distribution']['name'],
              distribution_method: data['distributionMethod']['name'],
              service_car_info: data['service_car_info'],
              distribution_phone: data['distribution_phone'],
              buyer_message: data['buyer_message'],
              logistic_name: data['logistic']['name'],
              distributionType_name: data['distributionType']['name'],
              total_distribution_fee: data['total_distribution_fee'],
              customer_service_remark: data['customer_service_remark'],
              seller_remark: data['seller_remark']
            };
          }
          if (data['orderItems']['data'].length > 0) {
            data['orderItems']['data'].map(function (item) {
              item['name'] = item['combination']['name'];
              item['productComp'] = item['combination']['productComponents']['data'];
            });
          }
          this.proDtlData = data['orderItems']['data'];
          /*支付明细*/
          this.payDtlData = data['paymentDetails']['data'];
          break;
      }
    },
    fetchData: function fetchData() {
      var _this = this;

      var index = this.leftTopActiveName - 0;
      switch (index) {
        /*已财审*/
        case 0:
          var notTrial = [];
          this.$fetch(this.urls.customerservicedepts, { 'order_status': 30, 'include': 'shop,logistic,freightType,distribution,distributionMethod,distributionType,takeDeliveryGoodsWay,customerType,paymentMethod,warehouses,orderItems.combination.productComponents,orderItems.product,businessPersonnel,locker,paymentDetails.paymentMethod,paymentDetails.order' }).then(function (res) {
            if (res.data.length > 0) {
              res.data.map(function (item) {
                notTrial.push(item);
              });
            }
          }, function (err) {
            console.log(err);
          });
          this.$fetch(this.urls.customerservicedepts, { 'order_status': 50, 'include': 'shop,logistic,freightType,distribution,distributionMethod,distributionType,takeDeliveryGoodsWay,customerType,paymentMethod,warehouses,orderItems.combination.productComponents,orderItems.product,businessPersonnel,locker,paymentDetails.paymentMethod,paymentDetails.order' }).then(function (res) {
            if (res.data.length > 0) {
              res.data.map(function (item) {
                notTrial.push(item);
              });
            }
          }, function (err) {
            console.log(err);
          });
          setTimeout(function () {
            _this.loading = false;
            _this.orderListData = notTrial;
            Object.assign(_this.orderListData, notTrial);
          }, 2000);
          break;
        case 1:
          this.$fetch(this.urls.customerservicedepts, { 'order_status': 60, 'include': 'shop,logistic,freightType,distribution,distributionMethod,distributionType,takeDeliveryGoodsWay,customerType,paymentMethod,warehouses,orderItems,businessPersonnel,locker,paymentDetails' }).then(function (res) {
            _this.loading = false;
            _this.alreadyHandle = res.data;
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
              _this.$message.error(arr1.join(','));
            }
          });
          break;
      }
    },
    leftHandleClick: function leftHandleClick() {
      this.loading = true;
      this.fetchData();
    },
    rightHandleClick: function rightHandleClick() {},
    orderListRClick: function orderListRClick(row) {
      if (row['locker_id'] == 0) {
        this.newOpt[1].nClick = true;
        this.newOpt[2].nClick = true;
        this.newOpt[3].nClick = false;
        this.newOpt[4].nClick = true;
        this.newOpt[8].nClick = true;
        this.newOpt[9].nClick = true;
        this.newOpt[14].nClick = true;
        if (row['order_status'] == "已客审") {
          this.newOpt[5].nClick = true;
          this.newOpt[6].nClick = false;
        } else {
          this.newOpt[5].nClick = false;
          this.newOpt[6].nClick = true;
        }
      } else {
        this.newOpt[1].nClick = false;
        this.newOpt[2].nClick = false;
        this.newOpt[3].nClick = true;
        this.newOpt[4].nClick = false;
        this.newOpt[5].nClick = false;
        this.newOpt[6].nClick = true;
        this.newOpt[8].nClick = false;
        this.newOpt[9].nClick = false;
        this.newOpt[14].nClick = false;
      }
      this.curRowId = row.id;
      this.curRowData = row;
    },
    orderDbClick: function orderDbClick(row) {
      this.activeName = '1';
      var data = row;
      if (data) {
        this.orderDtlFormVal = {
          system_order_no: data.system_order_no,
          taobao_oid: data.taobao_oid,
          taobao_tid: data.taobao_tid,
          association_taobao_oid: data.association_taobao_oid,
          shop_name: data['shop']['title'],
          business_personnel_name: data['businessPersonnel'] ? data['businessPersonnel']['username'] : '',
          member_nick: data.member_nick,
          receiver_name: data.receiver_name,
          receiver_mobile: data.receiver_mobile,
          receiver_phone: data.receiver_phone,
          receiver_address: data.receiver_address,
          express_fee: data.express_fee,
          freight_types_name: data['freightType']['name'],
          expected_freight: data.expected_freight,
          deliver_goods_fee: data.deliver_goods_fee,
          payment_date: data.payment_date,
          promise_ship_time: data.promise_ship_time,
          distribution_name: data['distribution']['name'],
          distribution_method: data['distributionMethod']['name'],
          service_car_info: data['service_car_info'],
          distribution_phone: data['distribution_phone'],
          buyer_message: data['buyer_message'],
          logistic_name: data['logistic']['name'],
          distributionType_name: data['distributionType']['name'],
          total_distribution_fee: data['total_distribution_fee'],
          customer_service_remark: data['customer_service_remark'],
          seller_remark: data['seller_remark']
        };
      }
      this.proDtlData = row['orderItems']['data'];
      if (row['orderItems']['data'].length > 0) {
        row['orderItems']['data'].map(function (item) {
          item['name'] = item['combination']['name'];
          item['productComp'] = item['combination']['productComponents']['data'];
        });
      }
      /*支付明细*/
      this.payDtlData = row['paymentDetails']['data'];
    },
    proDtlRClick: function proDtlRClick(row) {},
    resets: function resets() {
      this.searchBox = {};
    },

    /*批量删除*/
    handleSelectionChange: function handleSelectionChange(val) {
      console.log(val);
      /*拿到id集合*/
      var delArr = [];
      val.forEach(function (selectedItem) {
        delArr.push(selectedItem.id);
      });
      this.ids = delArr.join(',');
      /*拿到当前id*/
      this.checkboxId = val.length > 0 ? val[val.length - 1].id : '';
      this.curRowData = val.length > 0 ? val[val.length - 1] : '';
      this.mergerIds = val;
    },
    delBatch: function delBatch() {
      var _this2 = this;

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
        }).then(function () {
          _this2.$del(_this2.urls.customerservicedepts, { ids: _this2.ids }).then(function () {
            _this2.refresh();
            _this2.$message({
              message: '删除成功',
              type: 'success'
            });
          }, function (err) {
            if (err.response) {
              var arr = err.response.data.errors;
              var arr1 = [];
              for (var i in arr) {
                arr1.push(arr[i]);
              }
              var str = arr1.join(',');
              _this2.$message.error(str);
            }
          });
        }).catch(function () {
          _this2.$message({
            type: 'info',
            message: '已取消删除'
          });
        });
      }
    },

    /*页码*/
    handlePagChg: function handlePagChg(page) {
      var _this3 = this;

      this.$fetch(this.urls.logistics + '?page=' + page, { include: 'cityInfos.logistics,printReport,freightType' }).then(function (res) {
        _this3.logisticsData = res.data;
      });
    },
    refresh: function refresh() {
      this.loading = true;
      this.fetchData();
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

/***/ 534:
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
                  staticStyle: { height: "400px" },
                  on: { "tab-click": _vm.leftHandleClick },
                  model: {
                    value: _vm.leftTopActiveName,
                    callback: function($$v) {
                      _vm.leftTopActiveName = $$v
                    },
                    expression: "leftTopActiveName"
                  }
                },
                [
                  _c(
                    "el-tab-pane",
                    { attrs: { label: "未货审", name: "0" } },
                    [
                      _c(
                        "el-table",
                        {
                          directives: [
                            {
                              name: "loading",
                              rawName: "v-loading",
                              value: _vm.loading,
                              expression: "loading"
                            }
                          ],
                          attrs: {
                            data: _vm.orderListData,
                            fit: "",
                            height: "350"
                          },
                          on: {
                            "selection-change": _vm.handleSelectionChange,
                            "row-click": _vm.orderListRClick,
                            "row-dblclick": _vm.orderDbClick
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
                          _vm._l(_vm.orderListHead, function(item) {
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
                                      item.type == "checkbox"
                                        ? _c("span", [
                                            item.inProp
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
                                                    _c("el-checkbox", {
                                                      attrs: { disabled: "" },
                                                      model: {
                                                        value:
                                                          scope.row[item.prop],
                                                        callback: function(
                                                          $$v
                                                        ) {
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
                                          ])
                                        : item.type == "flag"
                                          ? _c("span", [
                                              scope.row[item.prop] == 0
                                                ? _c("span", [
                                                    _c("i", {
                                                      staticClass:
                                                        "iconfont bf-flag"
                                                    })
                                                  ])
                                                : scope.row[item.prop] == 1
                                                  ? _c("span", [
                                                      _c("i", {
                                                        staticClass:
                                                          "iconfont bf-flag",
                                                        staticStyle: {
                                                          color: "red"
                                                        }
                                                      })
                                                    ])
                                                  : scope.row[item.prop] == 2
                                                    ? _c("span", [
                                                        _c("i", {
                                                          staticClass:
                                                            "iconfont bf-flag",
                                                          staticStyle: {
                                                            color: "yellow"
                                                          }
                                                        })
                                                      ])
                                                    : scope.row[item.prop] == 3
                                                      ? _c("span", [
                                                          _c("i", {
                                                            staticClass:
                                                              "iconfont bf-flag",
                                                            staticStyle: {
                                                              color: "green"
                                                            }
                                                          })
                                                        ])
                                                      : scope.row[item.prop] ==
                                                        4
                                                        ? _c("span", [
                                                            _c("i", {
                                                              staticClass:
                                                                "iconfont bf-flag",
                                                              staticStyle: {
                                                                color: "blue"
                                                              }
                                                            })
                                                          ])
                                                        : scope.row[
                                                            item.prop
                                                          ] == 5
                                                          ? _c("span", [
                                                              _c("i", {
                                                                staticClass:
                                                                  "iconfont bf-flag",
                                                                staticStyle: {
                                                                  color:
                                                                    "purple"
                                                                }
                                                              })
                                                            ])
                                                          : _vm._e()
                                            ])
                                          : _c("span", [
                                              scope.row[item.prop]
                                                ? _c("span", [
                                                    _vm._v(
                                                      "\n                                  " +
                                                        _vm._s(
                                                          item.inProp
                                                            ? scope.row[
                                                                item.prop
                                                              ][item.inProp]
                                                            : scope.row[
                                                                item.prop
                                                              ]
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
                                            _vm.delSingle(scope.row, $event)
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
                    { attrs: { label: "已货审", name: "1" } },
                    [
                      _c(
                        "el-table",
                        {
                          directives: [
                            {
                              name: "loading",
                              rawName: "v-loading",
                              value: _vm.loading,
                              expression: "loading"
                            }
                          ],
                          attrs: {
                            data: _vm.alreadyHandle,
                            fit: "",
                            height: "350"
                          },
                          on: {
                            "selection-change": _vm.handleSelectionChange,
                            "row-click": _vm.orderListRClick,
                            "row-dblclick": _vm.orderDbClick
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
                          _vm._l(_vm.orderListHead, function(item) {
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
                                      item.type == "checkbox"
                                        ? _c("span", [
                                            item.inProp
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
                                                    _c("el-checkbox", {
                                                      attrs: { disabled: "" },
                                                      model: {
                                                        value:
                                                          scope.row[item.prop],
                                                        callback: function(
                                                          $$v
                                                        ) {
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
                                          ])
                                        : item.type == "flag"
                                          ? _c("span", [
                                              scope.row[item.prop] == 0
                                                ? _c("span", [
                                                    _c("i", {
                                                      staticClass:
                                                        "iconfont bf-flag"
                                                    })
                                                  ])
                                                : scope.row[item.prop] == 1
                                                  ? _c("span", [
                                                      _c("i", {
                                                        staticClass:
                                                          "iconfont bf-flag",
                                                        staticStyle: {
                                                          color: "red"
                                                        }
                                                      })
                                                    ])
                                                  : scope.row[item.prop] == 2
                                                    ? _c("span", [
                                                        _c("i", {
                                                          staticClass:
                                                            "iconfont bf-flag",
                                                          staticStyle: {
                                                            color: "yellow"
                                                          }
                                                        })
                                                      ])
                                                    : scope.row[item.prop] == 3
                                                      ? _c("span", [
                                                          _c("i", {
                                                            staticClass:
                                                              "iconfont bf-flag",
                                                            staticStyle: {
                                                              color: "green"
                                                            }
                                                          })
                                                        ])
                                                      : scope.row[item.prop] ==
                                                        4
                                                        ? _c("span", [
                                                            _c("i", {
                                                              staticClass:
                                                                "iconfont bf-flag",
                                                              staticStyle: {
                                                                color: "blue"
                                                              }
                                                            })
                                                          ])
                                                        : scope.row[
                                                            item.prop
                                                          ] == 5
                                                          ? _c("span", [
                                                              _c("i", {
                                                                staticClass:
                                                                  "iconfont bf-flag",
                                                                staticStyle: {
                                                                  color:
                                                                    "purple"
                                                                }
                                                              })
                                                            ])
                                                          : _vm._e()
                                            ])
                                          : _c("span", [
                                              scope.row[item.prop]
                                                ? _c("span", [
                                                    _vm._v(
                                                      "\n                                  " +
                                                        _vm._s(
                                                          item.inProp
                                                            ? scope.row[
                                                                item.prop
                                                              ][item.inProp]
                                                            : scope.row[
                                                                item.prop
                                                              ]
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
                                            _vm.delSingle(scope.row, $event)
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
            "el-tab-pane",
            { attrs: { label: "订单明细", name: "1" } },
            [
              _c(
                "el-form",
                {
                  staticClass: "quarter_turn",
                  attrs: { model: _vm.orderDtlFormVal }
                },
                _vm._l(_vm.orderDtlFormHead, function(item) {
                  return _c(
                    "el-form-item",
                    {
                      key: item.label,
                      attrs: { label: item.label, prop: item.prop }
                    },
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
                                        disabled: ""
                                      },
                                      model: {
                                        value:
                                          _vm.orderDtlFormVal[item.prop][
                                            item.inProp
                                          ],
                                        callback: function($$v) {
                                          _vm.$set(
                                            _vm.orderDtlFormVal[item.prop],
                                            item.inProp,
                                            typeof $$v === "string"
                                              ? $$v.trim()
                                              : $$v
                                          )
                                        },
                                        expression:
                                          "orderDtlFormVal[item.prop][item.inProp]"
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
                                        disabled: ""
                                      },
                                      model: {
                                        value: _vm.orderDtlFormVal[item.prop],
                                        callback: function($$v) {
                                          _vm.$set(
                                            _vm.orderDtlFormVal,
                                            item.prop,
                                            typeof $$v === "string"
                                              ? $$v.trim()
                                              : $$v
                                          )
                                        },
                                        expression: "orderDtlFormVal[item.prop]"
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
                                    disabled: ""
                                  },
                                  model: {
                                    value: _vm.orderDtlFormVal[item.prop],
                                    callback: function($$v) {
                                      _vm.$set(
                                        _vm.orderDtlFormVal,
                                        item.prop,
                                        typeof $$v === "string"
                                          ? $$v.trim()
                                          : $$v
                                      )
                                    },
                                    expression: "orderDtlFormVal[item.prop]"
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
                                      placehode: item.holder
                                    },
                                    model: {
                                      value: _vm.orderDtlFormVal[item.prop],
                                      callback: function($$v) {
                                        _vm.$set(
                                          _vm.orderDtlFormVal,
                                          item.prop,
                                          typeof $$v === "string"
                                            ? $$v.trim()
                                            : $$v
                                        )
                                      },
                                      expression: "orderDtlFormVal[item.prop]"
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
                  _c(
                    "el-tab-pane",
                    { attrs: { label: "商品明细", name: "0" } },
                    [
                      _c(
                        "el-table",
                        { attrs: { data: _vm.proDtlData, fit: "" } },
                        [
                          _vm._l(
                            _vm.orderDtlHead[_vm.rightActiveName],
                            function(item) {
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
                                          : _c("span", [
                                              _vm._v(
                                                "\n                                     " +
                                                  _vm._s(
                                                    item.inProp
                                                      ? scope.row[item.prop][
                                                          item.inProp
                                                        ]
                                                      : scope.row[item.prop]
                                                  ) +
                                                  "\n                                 "
                                              )
                                            ])
                                      ]
                                    }
                                  }
                                ])
                              })
                            }
                          ),
                          _vm._v(" "),
                          _c("el-table-column", {
                            attrs: { type: "expand", fixed: "left" },
                            scopedSlots: _vm._u([
                              {
                                key: "default",
                                fn: function(scope) {
                                  return [
                                    _c(
                                      "el-table",
                                      {
                                        attrs: {
                                          data: scope.row["productComp"],
                                          fit: ""
                                        }
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
                                                  item.prop
                                                    ? _c("span", [
                                                        item.type == "checkbox"
                                                          ? _c(
                                                              "span",
                                                              [
                                                                _c(
                                                                  "el-checkbox",
                                                                  {
                                                                    attrs: {
                                                                      disabled:
                                                                        ""
                                                                    },
                                                                    model: {
                                                                      value:
                                                                        scope
                                                                          .row[
                                                                          item
                                                                            .prop
                                                                        ],
                                                                      callback: function(
                                                                        $$v
                                                                      ) {
                                                                        _vm.$set(
                                                                          scope.row,
                                                                          item.prop,
                                                                          $$v
                                                                        )
                                                                      },
                                                                      expression:
                                                                        "scope.row[item.prop]"
                                                                    }
                                                                  }
                                                                )
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
                                                                        placement:
                                                                          "right",
                                                                        trigger:
                                                                          "hover",
                                                                        "popper-class":
                                                                          "picture_detail"
                                                                      }
                                                                    },
                                                                    [
                                                                      _c(
                                                                        "img",
                                                                        {
                                                                          attrs: {
                                                                            src:
                                                                              scope
                                                                                .row[
                                                                                item
                                                                                  .prop
                                                                              ]
                                                                          }
                                                                        }
                                                                      ),
                                                                      _vm._v(
                                                                        " "
                                                                      ),
                                                                      _c(
                                                                        "img",
                                                                        {
                                                                          attrs: {
                                                                            slot:
                                                                              "reference",
                                                                            src:
                                                                              scope
                                                                                .row[
                                                                                item
                                                                                  .prop
                                                                              ],
                                                                            alt:
                                                                              scope
                                                                                .row[
                                                                                item
                                                                                  .alt
                                                                              ]
                                                                          },
                                                                          slot:
                                                                            "reference"
                                                                        }
                                                                      )
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
                                                                        ? scope
                                                                            .row[
                                                                            item
                                                                              .prop
                                                                          ][
                                                                            item
                                                                              .inProp
                                                                          ]
                                                                        : scope
                                                                            .row[
                                                                            item
                                                                              .prop
                                                                          ]
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
                                            _vm.delSingle(scope.row, $event)
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
                    { attrs: { label: "支付明细", name: "1" } },
                    [
                      _c(
                        "el-table",
                        { attrs: { data: _vm.payDtlData, fit: "" } },
                        [
                          _vm._l(
                            _vm.orderDtlHead[_vm.rightActiveName],
                            function(item) {
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
                                                              "\n                                            " +
                                                                _vm._s(
                                                                  list.name
                                                                    ? list.name
                                                                    : ""
                                                                ) +
                                                                "\n                                        "
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
                                                "\n                                     " +
                                                  _vm._s(
                                                    item.inProp
                                                      ? scope.row[item.prop][
                                                          item.inProp
                                                        ]
                                                      : scope.row[item.prop]
                                                  ) +
                                                  "\n                                 "
                                              )
                                            ])
                                      ]
                                    }
                                  }
                                ])
                              })
                            }
                          ),
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
                                            _vm.delSingle(scope.row, $event)
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
                  _c("el-tab-pane", { attrs: { label: "优惠列表", name: "7" } })
                ],
                1
              )
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-1f23cf0a", module.exports)
  }
}

/***/ })

});
webpackJsonp([66],{

/***/ 474:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(650)
/* template */
var __vue_template__ = __webpack_require__(651)
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

/***/ 650:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vuex__ = __webpack_require__(15);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
        ent: this.editPur,
        nClick: false
      }, {
        cnt: '删除',
        icon: 'bf-del',
        ent: this.delMore,
        nClick: false
      }, {
        cnt: '提交',
        icon: 'bf-submit',
        ent: this.test,
        nClick: false
      }, {
        cnt: '审核',
        icon: 'bf-audit',
        ent: this.test
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
        ent: this.test
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
      currentIndex: '',
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
        prop: 'user_id',
        type: 'text'
      }, {
        label: '创建日期',
        width: '180',
        prop: 'created_at',
        type: 'text'
      }, {
        label: '打印时间',
        width: '180',
        prop: '',
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
        prop: 'promise_delivery_time',
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
      }, {
        label: '省市区',
        width: '150',
        prop: '',
        type: 'text'
      },
      /*{
       label: '采购收货人',
       width: '120',
       prop: '',
       type: 'text',
      },*/
      {
        label: '采购收货地址',
        width: '160',
        prop: 'order_address',
        type: 'text'
      },
      /* {
        label: '合同编号',
        width: '120',
        prop: '',
        type: 'text',
      },*/
      {
        label: '备注',
        width: '140',
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
        prop: 'salesman',
        type: 'text'
      }, {
        label: '提交',
        width: '120',
        prop: 'is_submit',
        type: 'select_def'
      }, {
        label: '打印',
        width: '120',
        prop: 'is_print',
        type: 'select_def'
      }, {
        label: '审核',
        width: '120',
        prop: 'is_check',
        type: 'select_def'
      }, {
        label: '修改',
        width: '120',
        prop: 'is_change',
        type: 'select_def'
      }],
      nEditInRow: [true, true, true],
      btmActiveName: '0',
      purchasesUrl: '/purchases',
      getsInfo: [],
      newData: [],
      partData: [],
      finishData: [],
      newLoading: true,
      partLoading: true,
      finishLoading: true,
      delArr: [],
      editId: '',
      multipleSelection: [],
      addNewPurchase: false,
      newPurchaseVal: {
        receiver: '',
        receiver_address: '',
        warehouse_id: '',
        remark: '',
        purchase_details: []
      },
      newPurchaseRules: {
        receiver: [{ required: true, message: '收货人必填', trigger: 'blur' }],
        receiver_address: [{ required: true, message: '收货地址必填', trigger: 'blur' }],
        warehouse_id: [{ required: true, message: '仓库必选', trigger: 'blur' }]
      },
      purchaseHead: [{
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
      moreForms: true,
      threeParts: true,
      purchaseDetailVal: [],
      /*采购明细*/
      purchaseDtlHead: [{
        label: '规格图片',
        width: '120',
        // prop: 'specInfo',
        prop: "img_url",
        type: 'text'
      },
      /* {
         label: '商品编码',
         width: '120',
         prop: "goods",
         inProp:'commodity_code',
         type: 'text',
       },
       {
         label: '商品简称',
         width: '120',
         prop: "goods",
         inProp:'short_name',
         type: 'text',
       },*/
      {
        label: '规格编码',
        width: '120',
        // prop: 'specInfo',
        prop: "spec_code",
        type: 'text'
      }, {
        label: '规格名称',
        width: '120',
        prop: 'specInfo',
        inProp: "spec",
        type: 'text'
      }, {
        label: '库存数',
        width: '120',
        prop: '',
        inProp: "",
        type: 'text'
      }, {
        label: '订单数',
        width: '120',
        prop: '',
        inProp: "",
        type: 'text'
      }, {
        label: '在途数',
        width: '120',
        prop: '',
        inProp: "",
        type: 'text'
      }, {
        label: '在途数(提交)',
        width: '120',
        prop: '',
        inProp: "",
        type: 'text'
      }, {
        label: '可用数',
        width: '120',
        prop: '',
        inProp: "",
        type: 'text'
      }, {
        label: '已入库数',
        width: '120',
        prop: '',
        inProp: "",
        type: 'text'
      }, {
        label: '需采购数',
        width: '120',
        prop: '',
        inProp: "",
        type: 'text'
      }],
      purchaseDtlEditHead: [{
        label: '采购数',
        width: '120',
        prop: 'addInfo',
        inProp: "purchase_quantity",
        holder: '请输入采购数',
        type: 'number'
      }, {
        label: '采购店铺',
        width: '120',
        prop: 'addInfo',
        inProp: "shops_id",
        holder: '请输入采购店铺',
        type: 'text'
      }, {
        label: '供应商',
        width: '120',
        prop: 'addInfo',
        inProp: "suppliers_id",
        holder: '请选择供应商',
        type: 'select'
      }, {
        label: '采购成本',
        width: '120',
        prop: 'addInfo',
        inProp: "purchase_cost",
        holder: '请输入采购成本',
        type: 'number'
      }, {
        label: '仓库成本',
        width: '120',
        prop: 'addInfo',
        inProp: "warehouse_cost",
        holder: '请输入仓库成本',
        type: 'number'
      }, {
        label: '佣金点',
        width: '120',
        prop: 'addInfo',
        inProp: "commission",
        holder: '请输入佣金点',
        type: 'number'
      },
      /* {
         label: '采购总成本',
         width: '120',
         prop: 'addInfo',
         inProp: "",
         holder: '请输入规格编号',
         type: 'text',
       },*/
      {
        label: '采购运费',
        width: '120',
        prop: 'addInfo',
        inProp: "purchase_freight",
        holder: '请输入采购运费',
        type: 'number'
      }, {
        label: '折扣',
        width: '120',
        prop: 'addInfo',
        inProp: "discount",
        holder: '请输入折扣',
        type: 'number'
      }, {
        label: '色号',
        width: '120',
        prop: 'addInfo',
        inProp: "colour_num",
        holder: '请输入色号',
        type: 'text'
      }, {
        label: '油漆',
        width: '120',
        prop: 'addInfo',
        inProp: "paint",
        holder: '请输入油漆',
        type: 'text'
      }, {
        label: '木架费',
        width: '120',
        prop: 'addInfo',
        inProp: "wooden_frame_costs",
        holder: '请输入木架费',
        type: 'number'
      }, {
        label: '到货时间',
        width: '120',
        prop: 'addInfo',
        inProp: "arrival_time",
        holder: '请输入到货时间',
        type: 'datepicker'
      }, {
        label: '备注',
        width: '120',
        prop: 'addInfo',
        inProp: "remark",
        holder: '请输入备注',
        type: 'textarea'
      }],
      addPurchaseDetailMask: false,
      proIndex: '',
      proDtlData: [],
      // proDtlSpec:[],
      proVal: [],
      proHead: [{
        label: '店铺',
        prop: "shop_nick",
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
        label: '供应商',
        prop: 'supplier',
        inProp: 'name',
        width: '130',
        type: 'text'
      }],
      specVal: [],
      specHead: [{
        label: '组合商品',
        width: '90',
        prop: "is_combination",
        type: 'checkbox'
      }, {
        label: '规格图片',
        width: '120',
        prop: "img_url",
        type: 'text'
      }, {
        label: '规格编码',
        width: '120',
        prop: "spec_code",
        type: 'text'
      }, {
        label: '规格名称',
        width: '120',
        prop: "spec",
        type: 'text'
      }, {
        label: '库存预警数',
        width: '120',
        prop: "inventory_warning",
        type: 'text'
      }, {
        label: '采购运费',
        width: '120',
        prop: 'purchase_freight',
        type: 'text'
      }, {
        label: '仓库成本',
        width: '120',
        prop: "warehouse_cost",
        type: 'number'
      }, {
        label: '佣金点',
        width: '120',
        prop: "commission",
        type: 'number'
      }, {
        label: '折扣',
        width: '120',
        prop: "discount",
        type: 'number'
      }, {
        label: '木架费',
        width: '120',
        prop: "wooden_frame_costs",
        type: 'number'
      }],
      goodsUrl: '/goods',
      specUrl: '/productspecs',
      warehouseUrl: '/stocks',
      specDtlInfo: [],
      /*  specDtlInfo:{
          purchase_quantity: '',
          shops_id: '',
          suppliers_id:'',
          arrival_time:'',
          remark:''
        },*/
      specDtlArr: [],
      specInfoArr: [],
      /*手动输入值*/
      specHeadEdit: [{
        label: '采购数',
        width: '120',
        // prop: 'specDtlInfo',
        prop: "purchase_quantity",
        holder: '请输入采购数',
        type: 'number'
      }, {
        label: '采购店铺',
        width: '120',
        // prop: 'specDtlInfo',
        prop: "shops_id",
        holder: '请输入采购店铺',
        stateVal: 'shops',
        type: 'select'
      }, {
        label: '供应商',
        width: '120',
        // prop: 'specDtlInfo',
        prop: "suppliers_id",
        holder: '请选择供应商',
        stateVal: 'suppliers',
        type: 'select'
      }, {
        label: '到货时间',
        width: '155',
        // prop: 'specDtlInfo',
        prop: "arrival_time",
        holder: '请输入到货时间',
        type: 'datepicker'
      }, {
        label: '备注',
        width: '120',
        prop: 'specDtlInfo',
        inProp: "remark",
        holder: '请输入备注',
        type: 'textarea'
      }],
      specIndex: '',
      patchData: [],
      idArr: [],
      purDtlIndex: [],
      showDel: false,
      delDtlIndex: '',
      chgPurchase: false,
      chgPurchaseVal: {},
      purchaseChgVal: {},
      purDetailsUlr: '/purchasedetails',
      currentRowSpec: {},
      wareHousesId: '',
      combProVal: [],
      combProHead: [{
        label: '规格图片',
        width: '160',
        prop: 'com_pro_spec',
        inProp: "img_url",
        type: 'text'
      }, {
        label: '规格编码',
        width: '160',
        prop: 'com_pro_spec',
        inProp: "spec_code",
        type: 'text'
      }, {
        label: '规格名称',
        width: '250',
        prop: "com_pro_spec",
        inProp: 'spec',
        type: 'text'
      }, {
        label: '采购成本',
        width: '120',
        prop: 'com_pro_spec',
        inProp: "purchase_cost",
        type: 'number'
      }, {
        label: '仓库成本',
        width: '120',
        prop: 'com_pro_spec',
        inProp: "warehouse_cost",
        type: 'number'
      }, {
        label: '佣金点',
        width: '120',
        prop: 'com_pro_spec',
        inProp: "commission",
        type: 'number'
      }, {
        label: '折扣',
        width: '120',
        prop: 'com_pro_spec',
        inProp: "discount",
        type: 'number'
      }, {
        label: '木架费',
        width: '120',
        prop: 'com_pro_spec',
        inProp: "wooden_frame_costs",
        type: 'number'
      }],
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
      /*商品明细*/
      searchPro: {
        commodity_code: '',
        spec_code: '',
        shops_id: ''
      },
      // specRowIndex: 0,
      specData: [],
      combData: []
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
    check: function check() {},
    toggleShow: function toggleShow() {
      this.filterBox = !this.filterBox;
    },
    resets: function resets() {
      this.searchBox = {};
    },

    /*获取采购数据*/
    getData: function getData() {
      var _this = this;

      var index = this.topActiveName - 0;
      switch (index) {
        case 0:
          this.newOpt[1].nClick = false;
          this.newOpt[2].nClick = false;
          this.newOpt[3].nClick = false;
          this.$fetch(this.urls.purchases, { purchase_status: 'new' }).then(function (res) {
            _this.newLoading = false;
            _this.newData = res.data;
            var pg = res.meta.pagination;
            _this.$store.dispatch('currentPage', pg.current_page);
            _this.$store.commit('PER_PAGE', pg.per_page);
            _this.$store.commit('PAGE_TOTAL', pg.total);
            _this.$store.dispatch('warehouses', '/warehouses');
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
          this.$fetch(this.purchasesUrl, { purchase_status: 'section' }).then(function (res) {
            _this.partLoading = false;
            _this.partData = res.data;
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
          this.$fetch(this.purchasesUrl, { purchase_status: 'finish' }).then(function (res) {
            _this.finishLoading = false;
            _this.finishData = res.data;
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

    /*顶部tabs切换*/
    clickTopTabs: function clickTopTabs() {
      this.getData();
    },

    /*新建采购单*/
    addNew: function addNew() {
      this.addNewPurchase = true;
      /*新增时数据更新*/
      this.newPurchaseVal = {
        receiver: '',
        receiver_address: '',
        warehouse_id: '',
        remark: '',
        purchase_details: []
      };
      this.purchaseDetailVal = [];
    },

    /*新建时增加明细*/
    addPurchaseDetail: function addPurchaseDetail() {
      /*初始化*/
      // this.proDtlSpec = [];
      this.specDtlArr = [];
      this.wareHousesId = '';
      this.specIndex = '';
      this.addPurchaseDetailMask = true;
      this.$store.dispatch('suppliers', '/suppliers');
      this.$store.dispatch('warehouses', '/warehouses');
      this.$store.dispatch('shops', '/shops');
    },
    rowSpecIndex: function rowSpecIndex(_ref) {
      var row = _ref.row,
          rowIndex = _ref.rowIndex;

      row.index = rowIndex;
    },

    /*商品行点击*/
    togglePro: function togglePro(row) {
      this.specData = row.productspecs;
      this.combData = row.productspecs[0].combinations;
      /* let specDtlInfo = {
         purchase_quantity: '',
         shops_id: '',
         suppliers_id:'',
         arrival_time:'',
         remark:''
       }*/

      /*输入采购信息初始化*/
      // this.specDtlArr[row.index] = specDtlInfo;
    },
    specRowClassName: function specRowClassName(_ref2) {
      var row = _ref2.row,
          rowIndex = _ref2.rowIndex;

      row.index = rowIndex;
    },

    /*规格行点击*/
    specRowClick: function specRowClick(row) {
      this.combData = row.combinations;
      this.specIndex = 'index' + row.index;
      /*
      * 规格只能编辑不能删除及其他
      * 子规格的采购数、采购店铺、供应商、仓库成本、佣金点、折扣、色号、油漆、木架费、到货时间与父规格保持一致
      * */
      this.currentRowSpec = row;
      /*直接拼接当前行*/
      // this.currentRowSpec.pur_inputs=this.specDtlInfo;
      // console.log(this.currentRowSpec);
      /*切换时
      如果没有组合，就不提示
      如果是组合数据，提示是否保存当前数据，如果保存就保存数据，否则显示原数据不保存*/
      /* switch(row.pro_specs.is_combination){
         /!*不管是否组合，序号唯一
         * 根据序号替换*!/
         case 0:
           /!*没有组合
           * 数组替换*!/
           break;
         case 1:
           /!*组合
           * 编辑完成之后点击当前行，不提示
           * 只要有数据变化，点击其他行，提示是否保存数据
           * 如果保存就保存数据，否则还原数据，新添加的清空*!/
           /!**!/
           this.$confirm('此操作将永久删除该文件, 是否继续?', '提示', {
             confirmButtonText: '确定',
             cancelButtonText: '取消',
             type: 'warning'
           }).then(() => {
             /!*数据去重存入新数组*!/
             // Object.assign(this.$data.currentRowSpec[row.index],row);
             // Object.assign(this.$data.currentRowSpec[row.index].pur_inputs,this.specDtlInfo);
             this.$message({
               type: 'success',
               message: '删除成功!'
             });
           }).catch(() => {
             /!*恢复原数据*!/
             Object.assign(this.$data.specDtlInfo, this.$options.data().specDtlInfo);
            /!* this.specDtlInfo ={
               purchase_quantity: '',
               shops_id: '',
               suppliers_id:'',
               arrival_time:'',
               remark:''
             }*!/
             this.$message({
               type: 'info',
               message: '已取消删除'
             });
           });
       }*/
    },
    sonSpecRowClassName: function sonSpecRowClassName(_ref3) {
      var row = _ref3.row,
          rowIndex = _ref3.rowIndex;

      row.index = rowIndex;
    },
    sonSpecRowClick: function sonSpecRowClick(row) {
      /*子规格点击哪行处于编辑模式
      * 可编辑部分不会影响到父规格*/
    },

    /*确定增加明细*/
    confirmAddPDetail: function confirmAddPDetail() {
      /*点击确定，不取消面板，把有数据传送给新增采购单页面*/
      // this.purchaseDetailVal = this.patchData;
      /*如果当前有两条数据*/
      // console.log(this.specDtlInfo);
      /*清空所有 提示添加成功*/
      /*  this.$message({
          message:'添加成功',
          type: 'success'
        });*/
      /* for(let list in this.specDtlInfo){
         if(list=='purchase_quantity' && this.specDtlInfo['purchase_quantity']==''){
           this.$message({
             message: '采购数不能为空',
             type: 'info'
           })
           return
         }else if(this.specDtlInfo[list]==''){
           this.$message({
             message: '数据不完整',
             type: 'info'
           })
         }
       }
       this.currentRowSpec['purInfo']=this.specDtlInfo;*/
      this.newPurchaseVal = this.currentRowSpec;
      console.log(this.currentRowSpec);
    },

    /*取消添加商品明细*/

    /*根据id获取商品明细数据*/
    /*  getProInfo(){
        this.$fetch(this.warehouseUrl,
          {warehouse_id:this.wareHousesId})
            .then(res=>{
              this.proDtlData = res.data;
              this.proDtlSpec.push(res.data[0]);
            },err=>{});
        },*/
    handleEdit: function handleEdit() {},
    edit: function edit() {},
    editSave: function editSave() {},
    editCancel: function editCancel() {},

    /*底部tabs切换*/
    clickBtmTabs: function clickBtmTabs() {},

    /*删除单条*/
    del: function del(row, e) {
      this.showDel = true;
      $('.el-popper').css({ left: e.x - 100 + 'px', top: e.y - 125 + 'px' });
      this.delId = row.id;
    },
    cancelD: function cancelD() {
      this.showDel = false;
      this.$message({
        message: '取消删除',
        type: 'info'
      });
    },
    confirmD: function confirmD(id) {
      var _this2 = this;

      this.$del(this.purchasesUrl + '/' + id).then(function () {
        _this2.$message({
          message: '删除成功',
          type: 'success'
        });
        _this2.showDel = false;
        /*执行对应页面的刷新并停留在对应tab页面*/
        _this2.refresh();
      }, function (err) {
        if (err.response) {
          _this2.showDel = false;
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

    /*刷新*/
    refresh: function refresh() {
      /*要分情况
      * 在新建页面刷新，仍停留在新建
      * 在部分完成，仍停留在部分完成
      * 在已完成，仍停留在已完成
      * 执行对应页面的刷新,并停留在对应页面*/
      this.stockLoading = true;
      this.getData();
    },

    /*批量删除 只针对新建模块*/
    delMore: function delMore() {
      var _this3 = this;

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
            _this3.$del(_this3.purchasesUrl, { ids: _this3.delArr }).then(function () {
              _this3.$message({
                message: '删除成功',
                type: 'success'
              });
              _this3.refresh();
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
          }).catch(function () {
            _this3.$message({
              type: 'info',
              message: '已取消删除'
            });
          });
        }
      }
    },
    handleSelectionChange: function handleSelectionChange(val) {
      if (val.length != 0) {
        this.editId = val[0].id;
      } else {
        this.editId = '';
      }
      this.multipleSelection = val;
      var del = [];
      this.multipleSelection.forEach(function (selectedItem) {
        del.push(selectedItem.id);
      });
      this.delArr = del.join(',');
    },

    /*新增数据 只针对新建模块*/

    /*确定添加采购单*/
    confirmAddPur: function confirmAddPur() {
      var _this4 = this;

      /*提交数据，发送请求*/
      /*遍历purchaseDetailVal，每一条数据都push进去*/
      this.purchaseDetailVal.map(function (item) {
        var obj = {
          product_specs_id: item.specInfo.id,
          purchase_quantity: item.addInfo.purchase_quantity,
          shops_id: item.addInfo.shops_id,
          suppliers_id: item.addInfo.suppliers_id,
          purchase_cost: item.addInfo.purchase_cost,
          warehouse_cost: item.addInfo.warehouse_cost,
          purchase_freight: item.addInfo.purchase_freight,
          commission: item.addInfo.commission,
          discount: item.addInfo.discount,
          colour_num: item.addInfo.colour_num,
          paint: item.addInfo.paint,
          wooden_frame_costs: item.addInfo.wooden_frame_costs,
          arrival_time: item.addInfo.arrival_time,
          remark: item.addInfo.remark
        };
        _this4.newPurchaseVal.purchase_details.push(obj);
      });
      this.$post(this.purchasesUrl, this.newPurchaseVal).then(function () {
        _this4.$message({
          message: '新建采购单成功',
          type: 'success'
        });
        _this4.addNewPurchase = false;
        _this4.refresh();
      }, function (err) {
        if (err.response) {
          var arr = err.response.data.errors;
          var arr1 = [];
          for (var i in arr) {
            arr1.push(arr[i]);
          }
          var str = arr1.join(',');
          _this4.$message.error({
            message: str
          });
        }
      });
    },
    cancelAdd: function cancelAdd() {
      this.addNewPurchase = false;
      this.$message({
        message: '取消新建采购单',
        type: 'info'
      });
      this.newPurchaseVal = {
        receiver: '',
        receiver_address: '',
        warehouse_id: '',
        remark: '',
        purchase_details: []
      };
    },

    /*增加明细*/
    cancelAddPDetail: function cancelAddPDetail() {
      this.addPurchaseDetailMask = false;
      this.$message({
        message: '取消添加商品明细',
        type: 'info'
      });
      this.purchaseDetailVal = [];
    },

    /*点击编辑按钮*/
    editSpec: function editSpec(row) {
      this.specIndex = 'index' + row.index;
    },
    specCancel: function specCancel() {
      this.specIndex = '';
    },

    /*保存编辑的商品明细*/
    specSave: function specSave(row) {
      var _this5 = this;

      console.log(row);
      /*点击保存，当前信息更新
      * 点击确定，才会把所有的
      * 点击哪行哪一行打开哪一行的编辑模式*/
      /*如果编辑过就需要进行添加
      * 规格id唯一，根据规格进行判断*/
      var index = row.index;
      var id = row.id;
      // this.specInfoArr[index]=this.specDtlInfo;
      this.specIndex = '';
      var obj = {
        goods: this.proVal[0].goods,
        specInfo: row,
        addInfo: this.specInfoArr[index]
      };
      if (this.patchData.length == 0) {
        this.patchData.push(obj);
        this.idArr.push(obj.specInfo.id);
      } else {
        this.patchData.map(function (item) {
          /*遍历每一项，是否有id存在，存在的话，删除当前项，然后push,否则直接push*/
          if (_this5.idArr.indexOf(obj.specInfo.id >= 0)) {
            /*如果id存在,替换掉*/
            _this5.patchData.splice(_this5.idArr.indexOf(obj.specInfo.id), 1);
            _this5.patchData.push(obj);
          } else {
            _this5.patchData.push(obj);
            _this5.idArr.push(obj.specInfo.id);
          }
        });
      }
    },


    /*商品明细行点击*/

    /*商品明细确定*/

    dateChangebirthday: function dateChangebirthday(val) {
      // this.specDtlInfo.arrival_time = val;
    },

    /*删除明细*/
    delPurDtl: function delPurDtl(row, e, index) {
      var _this6 = this;

      this.$confirm('此操作将永久删除该数据, 是否继续?', '提示', {
        confirmButtonText: '确定',
        cancelButtonText: '取消',
        type: 'warning'
      }).then(function () {
        _this6.purchaseDetailVal.splice(index, 1);
        _this6.$message({
          message: '删除成功',
          type: 'success'
        });
      }).catch(function () {
        _this6.$message({
          type: 'info',
          message: '已取消删除'
        });
      });
    },
    purDtlCancel: function purDtlCancel() {
      this.purDtlIndex = '';
    },
    editPurDtl: function editPurDtl(row, index) {
      this.purDtlIndex = 'index' + index;
      /*点击编辑也替换保存数据*/
      // this.purchaseDetailVal[index].addInfo = this.specDtlInfo;
    },
    purDtlSave: function purDtlSave(row, index) {
      this.purDtlIndex = '';
      /*保存时替换保存数据*/
      // this.purchaseDetailVal[index].addInfo = this.specDtlInfo;
    },

    /*修改采购单*/
    editPur: function editPur() {
      var _this7 = this;

      if (this.newOpt[1].nClick) {
        return;
      } else {
        /*如果没有选择要修改的项*/
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
          this.chgPurchase = true;
          this.$patch(this.purchasesUrl + '/' + this.editId).then(function (res) {
            _this7.chgPurchaseVal = {
              receiver: res.receiver,
              receiver_address: res.receiver_address,
              warehouse_id: res.warehouse_id,
              remark: res.remark,
              purchase_details: res.purchase_details
            };
            _this7.$store.dispatch('suppliers', '/suppliers');
          }, function (err) {
            console.log(err);
          });
        }
      }
    },
    confirmEditPur: function confirmEditPur(id) {
      var _this8 = this;

      /*接收id 更新数据，发送请求*/
      /*确定时，如果没有明细数据，提示不能为空*/
      if (this.chgPurchaseVal.purchase_details.length == 0) {
        this.$message({
          message: '明细数据不能为空',
          type: 'info'
        });
        return;
      } else {
        this.$patch(this.purchasesUrl + '/' + id, this.chgPurchaseVal).then(function () {
          console.log(_this8.chgPurchaseVal);
          _this8.$message({
            message: '修改成功',
            type: 'success'
          });
          _this8.chgPurchase = false;
          _this8.refresh();
        }, function (err) {
          if (err.response) {
            var arr = err.response.data.errors;
            var arr1 = [];
            for (var i in arr) {
              arr1.push(arr[i]);
            }
            var str = arr1.join(',');
            _this8.$message.error({
              message: str
            });
          }
        });
      }
    },
    cancelEdit: function cancelEdit() {
      this.chgPurchase = false;
    },

    /*修改时增加明细*/
    addChgPurDtl: function addChgPurDtl() {
      var _this9 = this;

      this.proVal = [];
      this.specVal = [];
      /*初始化*/
      /*this.specDtlInfo={
        purchase_quantity: '',
        shops_id: '',
        suppliers_id:'',
        // purchase_cost:'',
        // purchase_freight:'',
        // warehouse_cost:'',
        // commission:'',
        // discount:'',
        // colour_num:'',
        // paint:'',
        // wooden_frame_costs:'',
        arrival_time:'',
        remark:''
      };*/
      this.addPurchaseDetailMask = true;
      /*获取到仓库id，然后发送请求仓库信息*/
      var id = this.chgPurchaseVal.warehouse_id;
      this.$fetch(this.warehouseUrl + '/' + id).then(function (res) {
        _this9.proVal.push(res);
        _this9.specVal.push(res.pro_specs);
      }, function (err) {});
    },
    editPurChg: function editPurChg(row, index) {
      this.purDtlIndex = 'index' + index;
    },
    delPurChg: function delPurChg(row, index) {
      var _this10 = this;

      /*前后端一起删除*/
      var _self = this;
      this.$confirm('此操作将永久删除该数据, 是否继续?', '提示', {
        confirmButtonText: '确定',
        cancelButtonText: '取消',
        type: 'warning'
      }).then(function () {
        _self.$delete(_self.purDetailsUlr + '/' + row.id).then(function () {
          _self.$message({
            message: '删除成功',
            info: 'success'
          });
          _self.chgPurchaseVal.purchase_details.splice(index, 1);
        }, function (err) {});
      }).catch(function () {
        _this10.$message({
          type: 'info',
          message: '已取消删除'
        });
      });
    },
    savePurChg: function savePurChg() {
      this.purDtlIndex = '';
    },

    /*查询商品明细*/
    searchProClick: function searchProClick() {
      var _this11 = this;

      this.$fetch(this.urls.goods, this.searchPro).then(function (res) {
        // console.log(res);
        _this11.proDtlData = res.data;
        _this11.specData = res.data[0].productspecs;
        _this11.combData = res.data[0].productspecs[0].combinations;
      }, function (err) {
        if (err.response) {
          var arr = err.response.data.errors;
          var arr1 = [];
          for (var i in arr) {
            arr1.push(arr[i]);
          }
          var str = arr1.join(',');
          _this11.$message.error({
            message: str
          });
        }
      });
    }
  },
  mounted: function mounted() {
    this.getData();
    this.$store.dispatch('setOpt', this.newOpt);
    var that = this;
    $(window).resize(function () {
      that.$store.dispatch('setOpt', that.newOpt);
    });
  }
});

/***/ }),

/***/ 651:
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
              _c("label", [_vm._v("商品名称")]),
              _vm._v(" "),
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
              _c("label", [_vm._v("规格名称")]),
              _vm._v(" "),
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
                  _c("label", [_vm._v("供应商")]),
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
              )
            : _c(
                "span",
                [
                  _c(
                    "el-button",
                    { attrs: { type: "primary" }, on: { click: _vm.check } },
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
              _c("light-table", {
                attrs: {
                  listData: _vm.newData,
                  tableHead: _vm.tableHead,
                  loading: _vm.newLoading,
                  currentIndex: _vm.currentIndex,
                  nEditInRow: _vm.nEditInRow[this.topActiveName],
                  height: 400
                },
                on: {
                  editSave: _vm.editSave,
                  handleEdit: _vm.handleEdit,
                  del: _vm.del,
                  edit: _vm.edit,
                  editCancel: _vm.editCancel,
                  handleSelect: _vm.handleSelectionChange
                }
              })
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "el-tab-pane",
            { attrs: { label: "部分完成", name: "1" } },
            [
              _c("light-table", {
                attrs: {
                  listData: _vm.partData,
                  loading: _vm.partLoading,
                  tableHead: _vm.tableHead,
                  currentIndex: _vm.currentIndex,
                  nEditInRow: _vm.nEditInRow[this.topActiveName],
                  height: 400
                },
                on: {
                  editSave: _vm.editSave,
                  handleEdit: _vm.handleEdit,
                  del: _vm.del,
                  edit: _vm.edit,
                  editCancel: _vm.editCancel
                }
              })
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "el-tab-pane",
            { attrs: { label: "已完成", name: "2" } },
            [
              _c("light-table", {
                attrs: {
                  listData: _vm.finishData,
                  loading: _vm.finishLoading,
                  tableHead: _vm.tableHead,
                  currentIndex: _vm.currentIndex,
                  nEditInRow: _vm.nEditInRow[this.topActiveName],
                  height: 400
                },
                on: {
                  editSave: _vm.editSave,
                  handleEdit: _vm.handleEdit,
                  del: _vm.del,
                  edit: _vm.edit,
                  editCancel: _vm.editCancel
                }
              })
            ],
            1
          )
        ],
        1
      ),
      _vm._v(" "),
      _c("Pagination", { attrs: { "page-url": _vm.purchasesUrl } }),
      _vm._v(" "),
      _c(
        "el-tabs",
        {
          on: { "tab-click": _vm.clickBtmTabs },
          model: {
            value: _vm.btmActiveName,
            callback: function($$v) {
              _vm.btmActiveName = $$v
            },
            expression: "btmActiveName"
          }
        },
        [
          _c("el-tab-pane", { attrs: { label: "采购单明细", name: "0" } }, [
            _vm._v("\n            采购单明细\n        ")
          ]),
          _vm._v(" "),
          _c("el-tab-pane", { attrs: { label: "组合展示列表", name: "1" } }, [
            _vm._v("\n            组合展示列表\n        ")
          ]),
          _vm._v(" "),
          _c("el-tab-pane", { attrs: { label: "唯一码", name: "2" } }, [
            _vm._v("\n            唯一码\n        ")
          ])
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "el-dialog",
        {
          class: { "more-forms": _vm.moreForms, threeParts: _vm.threeParts },
          attrs: { title: "新建采购单", visible: _vm.addNewPurchase },
          on: {
            "update:visible": function($event) {
              _vm.addNewPurchase = $event
            }
          }
        },
        [
          _c("el-button", { attrs: { type: "text" } }, [_vm._v("基本信息")]),
          _vm._v(" "),
          _c("add-new", {
            attrs: {
              "rule-form": _vm.newPurchaseVal,
              rules: _vm.newPurchaseRules,
              "add-arr": _vm.purchaseHead,
              onlyInputs: true
            }
          }),
          _vm._v(" "),
          _c("el-button", { attrs: { type: "text" } }, [_vm._v("采购明细")]),
          _vm._v(" "),
          _c(
            "el-table",
            {
              attrs: {
                data: _vm.purchaseDetailVal,
                fit: "",
                "highlight-current-row": "",
                type: "index",
                height: 300
              }
            },
            [
              _vm._l(_vm.purchaseDtlHead, function(item, index) {
                return _c("el-table-column", {
                  key: index,
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
                          item.type == "color"
                            ? _c("span", [
                                _c("span", {
                                  staticClass: "tableColor",
                                  style: { backgroundColor: scope.row.color }
                                }),
                                _vm._v(
                                  "\n                     " +
                                    _vm._s(scope.row[item.prop]) +
                                    "\n                        "
                                )
                              ])
                            : item.type == "select_stu"
                              ? _c("span", [
                                  _c("i", {
                                    staticClass: "showStatus",
                                    class: {
                                      statusActive:
                                        scope.row.status == 0 ? false : true
                                    }
                                  }),
                                  _vm._v(
                                    "\n                             " +
                                      _vm._s(
                                        scope.row[item.prop] == 0
                                          ? "停用"
                                          : "启用"
                                      ) +
                                      "\n                        "
                                  )
                                ])
                              : item.type == "select_def"
                                ? _c("span", [
                                    _vm._v(
                                      "\n                             " +
                                        _vm._s(
                                          scope.row[item.prop] == 0
                                            ? "否"
                                            : "是"
                                        ) +
                                        "\n                        "
                                    )
                                  ])
                                : item.type == "select"
                                  ? _c("span", [
                                      scope.row[item.prop] == ""
                                        ? _c("span", [
                                            _vm._v(
                                              "\n                            {{}}\n                        "
                                            )
                                          ])
                                        : typeof scope.row[item.prop] ==
                                          "object"
                                          ? _c("span", [
                                              _vm._v(
                                                "\n\n                             " +
                                                  _vm._s(
                                                    scope.row[item.prop][
                                                      item.inProp
                                                    ]
                                                  ) +
                                                  "\n                        "
                                              )
                                            ])
                                          : _c(
                                              "span",
                                              _vm._l(
                                                _vm.resData[_vm.each.stateVal],
                                                function(list, index) {
                                                  return _c(
                                                    "span",
                                                    { key: index },
                                                    [
                                                      item.inProp
                                                        ? _c("span", [
                                                            list.id ==
                                                            scope.row[
                                                              item.prop
                                                            ][item.inProp]
                                                              ? _c("span", [
                                                                  _vm._v(
                                                                    "\n                                      " +
                                                                      _vm._s(
                                                                        list.name
                                                                          ? list.name
                                                                          : ""
                                                                      ) +
                                                                      "\n                                      "
                                                                  )
                                                                ])
                                                              : _vm._e()
                                                          ])
                                                        : _c("span", [
                                                            list.id ==
                                                            scope.row[item.prop]
                                                              ? _c("span", [
                                                                  _vm._v(
                                                                    "\n                                " +
                                                                      _vm._s(
                                                                        list.name
                                                                          ? list.name
                                                                          : ""
                                                                      ) +
                                                                      "\n                            "
                                                                  )
                                                                ])
                                                              : _vm._e()
                                                          ])
                                                    ]
                                                  )
                                                }
                                              )
                                            )
                                    ])
                                  : _c("span", [
                                      item.inProp
                                        ? _c("span", [
                                            _vm._v(
                                              "\n                                 " +
                                                _vm._s(
                                                  scope.row[item.prop][
                                                    item.inProp
                                                  ]
                                                ) +
                                                "\n                            "
                                            )
                                          ])
                                        : _c("span", [
                                            _vm._v(
                                              "\n                                 " +
                                                _vm._s(scope.row[item.prop]) +
                                                "\n                            "
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
              _vm._l(_vm.purchaseDtlEditHead, function(each) {
                return _c("el-table-column", {
                  key: each.inProp,
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
                          _vm.purDtlIndex == "index" + scope.$index
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
                                          on: { change: _vm.handleEdit },
                                          model: {
                                            value: _vm.specDtlInfo[each.inProp],
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
                                            on: { change: _vm.handleEdit },
                                            model: {
                                              value:
                                                _vm.specDtlInfo[each.inProp],
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
                                                on: {
                                                  change: _vm.dateChangebirthday
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
                                                on: { change: _vm.handleEdit },
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
                                                          "\n                                          " +
                                                            _vm._s(list.name) +
                                                            "\n                                          "
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
                                        "\n                             " +
                                          _vm._s(_vm.specDtlInfo[each.inProp]) +
                                          "\n                         "
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
                attrs: { label: "状态", width: "100" },
                scopedSlots: _vm._u([
                  {
                    key: "default",
                    fn: function(scope) {
                      return [
                        _vm._v(
                          "\n                    " +
                            _vm._s("新建") +
                            "\n                "
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
                  width: "150",
                  align: "center",
                  fixed: "right"
                },
                scopedSlots: _vm._u([
                  {
                    key: "default",
                    fn: function(scope) {
                      return [
                        _vm.purDtlIndex == "index" + scope.$index
                          ? _c(
                              "span",
                              [
                                _c(
                                  "el-button",
                                  {
                                    attrs: { size: "mini" },
                                    on: {
                                      click: function($event) {
                                        _vm.purDtlSave(scope.row, scope.$index)
                                      }
                                    }
                                  },
                                  [_vm._v("保存")]
                                ),
                                _vm._v(" "),
                                _c(
                                  "el-button",
                                  {
                                    attrs: { size: "mini" },
                                    on: { click: _vm.purDtlCancel }
                                  },
                                  [_vm._v("取消\n                        ")]
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
                                    attrs: { size: "mini" },
                                    on: {
                                      click: function($event) {
                                        _vm.editPurDtl(scope.row, scope.$index)
                                      }
                                    }
                                  },
                                  [_vm._v("编辑")]
                                ),
                                _vm._v(" "),
                                _c(
                                  "el-button",
                                  {
                                    attrs: { size: "mini", type: "danger" },
                                    on: {
                                      click: function($event) {
                                        _vm.delPurDtl(
                                          scope.row,
                                          $event,
                                          scope.$index
                                        )
                                      }
                                    }
                                  },
                                  [_vm._v("删除")]
                                )
                              ],
                              1
                            )
                      ]
                    }
                  }
                ])
              })
            ],
            2
          ),
          _vm._v(" "),
          _c("el-button", { attrs: { type: "text" } }, [
            _vm._v("组合展示列表")
          ]),
          _vm._v(" "),
          _c(
            "el-table",
            {
              attrs: {
                data: _vm.purchaseDetailVal,
                fit: "",
                "highlight-current-row": "",
                type: "index",
                height: 160
              }
            },
            [
              _vm._l(_vm.purchaseDtlHead, function(item, index) {
                return _c("el-table-column", {
                  key: index,
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
                          item.type == "color"
                            ? _c("span", [
                                _c("span", {
                                  staticClass: "tableColor",
                                  style: { backgroundColor: scope.row.color }
                                }),
                                _vm._v(
                                  "\n                     " +
                                    _vm._s(scope.row[item.prop]) +
                                    "\n                        "
                                )
                              ])
                            : item.type == "select_stu"
                              ? _c("span", [
                                  _c("i", {
                                    staticClass: "showStatus",
                                    class: {
                                      statusActive:
                                        scope.row.status == 0 ? false : true
                                    }
                                  }),
                                  _vm._v(
                                    "\n                             " +
                                      _vm._s(
                                        scope.row[item.prop] == 0
                                          ? "停用"
                                          : "启用"
                                      ) +
                                      "\n                        "
                                  )
                                ])
                              : item.type == "select_def"
                                ? _c("span", [
                                    _vm._v(
                                      "\n                             " +
                                        _vm._s(
                                          scope.row[item.prop] == 0
                                            ? "否"
                                            : "是"
                                        ) +
                                        "\n                        "
                                    )
                                  ])
                                : item.type == "select"
                                  ? _c("span", [
                                      scope.row[item.prop] == ""
                                        ? _c("span", [
                                            _vm._v(
                                              "\n                            {{}}\n                        "
                                            )
                                          ])
                                        : typeof scope.row[item.prop] ==
                                          "object"
                                          ? _c("span", [
                                              _vm._v(
                                                "\n\n                             " +
                                                  _vm._s(
                                                    scope.row[item.prop][
                                                      item.inProp
                                                    ]
                                                  ) +
                                                  "\n                        "
                                              )
                                            ])
                                          : _c(
                                              "span",
                                              _vm._l(
                                                _vm.resData[_vm.each.stateVal],
                                                function(list, index) {
                                                  return _c(
                                                    "span",
                                                    { key: index },
                                                    [
                                                      item.inProp
                                                        ? _c("span", [
                                                            list.id ==
                                                            scope.row[
                                                              item.prop
                                                            ][item.inProp]
                                                              ? _c("span", [
                                                                  _vm._v(
                                                                    "\n                                      " +
                                                                      _vm._s(
                                                                        list.name
                                                                          ? list.name
                                                                          : ""
                                                                      ) +
                                                                      "\n                                      "
                                                                  )
                                                                ])
                                                              : _vm._e()
                                                          ])
                                                        : _c("span", [
                                                            list.id ==
                                                            scope.row[item.prop]
                                                              ? _c("span", [
                                                                  _vm._v(
                                                                    "\n                                " +
                                                                      _vm._s(
                                                                        list.name
                                                                          ? list.name
                                                                          : ""
                                                                      ) +
                                                                      "\n                            "
                                                                  )
                                                                ])
                                                              : _vm._e()
                                                          ])
                                                    ]
                                                  )
                                                }
                                              )
                                            )
                                    ])
                                  : _c("span", [
                                      item.inProp
                                        ? _c("span", [
                                            _vm._v(
                                              "\n                                 " +
                                                _vm._s(
                                                  scope.row[item.prop][
                                                    item.inProp
                                                  ]
                                                ) +
                                                "\n                            "
                                            )
                                          ])
                                        : _c("span", [
                                            _vm._v(
                                              "\n                                 " +
                                                _vm._s(scope.row[item.prop]) +
                                                "\n                            "
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
              _vm._l(_vm.purchaseDtlEditHead, function(each) {
                return _c("el-table-column", {
                  key: each.inProp,
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
                          _vm.purDtlIndex == "index" + scope.$index
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
                                          on: { change: _vm.handleEdit },
                                          model: {
                                            value: _vm.specDtlInfo[each.inProp],
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
                                            on: { change: _vm.handleEdit },
                                            model: {
                                              value:
                                                _vm.specDtlInfo[each.inProp],
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
                                                on: {
                                                  change: _vm.dateChangebirthday
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
                                                on: { change: _vm.handleEdit },
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
                                                          "\n                                          " +
                                                            _vm._s(list.name) +
                                                            "\n                                          "
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
                                        "\n                             " +
                                          _vm._s(_vm.specDtlInfo[each.inProp]) +
                                          "\n                         "
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
                attrs: { label: "状态", width: "100" },
                scopedSlots: _vm._u([
                  {
                    key: "default",
                    fn: function(scope) {
                      return [
                        _vm._v(
                          "\n                    " +
                            _vm._s("新建") +
                            "\n                "
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
                  width: "150",
                  align: "center",
                  fixed: "right"
                },
                scopedSlots: _vm._u([
                  {
                    key: "default",
                    fn: function(scope) {
                      return [
                        _vm.purDtlIndex == "index" + scope.$index
                          ? _c(
                              "span",
                              [
                                _c(
                                  "el-button",
                                  {
                                    attrs: { size: "mini" },
                                    on: {
                                      click: function($event) {
                                        _vm.purDtlSave(scope.row, scope.$index)
                                      }
                                    }
                                  },
                                  [_vm._v("保存")]
                                ),
                                _vm._v(" "),
                                _c(
                                  "el-button",
                                  {
                                    attrs: { size: "mini" },
                                    on: { click: _vm.purDtlCancel }
                                  },
                                  [_vm._v("取消\n                        ")]
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
                                    attrs: { size: "mini" },
                                    on: {
                                      click: function($event) {
                                        _vm.editPurDtl(scope.row, scope.$index)
                                      }
                                    }
                                  },
                                  [_vm._v("编辑")]
                                ),
                                _vm._v(" "),
                                _c(
                                  "el-button",
                                  {
                                    attrs: { size: "mini", type: "danger" },
                                    on: {
                                      click: function($event) {
                                        _vm.delPurDtl(
                                          scope.row,
                                          $event,
                                          scope.$index
                                        )
                                      }
                                    }
                                  },
                                  [_vm._v("删除")]
                                )
                              ],
                              1
                            )
                      ]
                    }
                  }
                ])
              })
            ],
            2
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
                  _c(
                    "el-button",
                    {
                      attrs: { type: "primary" },
                      on: { click: _vm.addPurchaseDetail }
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
                      on: { click: _vm.confirmAddPur }
                    },
                    [_vm._v("确定")]
                  ),
                  _vm._v(" "),
                  _c("el-button", { on: { click: _vm.cancelAdd } }, [
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
          class: { "more-forms": _vm.moreForms },
          attrs: { title: "修改采购单", visible: _vm.chgPurchase },
          on: {
            "update:visible": function($event) {
              _vm.chgPurchase = $event
            }
          }
        },
        [
          _c("add-new", {
            attrs: {
              "rule-form": _vm.chgPurchaseVal,
              rules: _vm.newPurchaseRules,
              "add-arr": _vm.purchaseHead,
              onlyInputs: true,
              hasSelect: true
            }
          }),
          _vm._v(" "),
          _c("el-button", { on: { click: function($event) {} } }, [
            _vm._v("添加采购明细信息")
          ]),
          _vm._v(" "),
          _c(
            "el-table",
            {
              attrs: {
                data: _vm.chgPurchaseVal.purchase_details,
                fit: "",
                "highlight-current-row": "",
                type: "index",
                height: 300
              }
            },
            [
              _vm._l(_vm.purchaseDtlEditHead, function(each) {
                return _c("el-table-column", {
                  key: each.inProp,
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
                          _vm.purDtlIndex == "index" + scope.$index
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
                                          on: { change: _vm.handleEdit },
                                          model: {
                                            value: scope.row[each.inProp],
                                            callback: function($$v) {
                                              _vm.$set(
                                                scope.row,
                                                each.inProp,
                                                $$v
                                              )
                                            },
                                            expression: "scope.row[each.inProp]"
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
                                            on: { change: _vm.handleEdit },
                                            model: {
                                              value: scope.row[each.inProp],
                                              callback: function($$v) {
                                                _vm.$set(
                                                  scope.row,
                                                  each.inProp,
                                                  $$v
                                                )
                                              },
                                              expression:
                                                "scope.row[each.inProp]"
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
                                                  value: scope.row[each.inProp],
                                                  callback: function($$v) {
                                                    _vm.$set(
                                                      scope.row,
                                                      each.inProp,
                                                      $$v
                                                    )
                                                  },
                                                  expression:
                                                    "scope.row[each.inProp]"
                                                }
                                              },
                                              _vm._l(_vm.suppliers, function(
                                                list
                                              ) {
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
                                              })
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
                                                on: {
                                                  change: _vm.dateChangebirthday
                                                },
                                                model: {
                                                  value: scope.row[each.inProp],
                                                  callback: function($$v) {
                                                    _vm.$set(
                                                      scope.row,
                                                      each.inProp,
                                                      $$v
                                                    )
                                                  },
                                                  expression:
                                                    "scope.row[each.inProp]"
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
                                                on: { change: _vm.handleEdit },
                                                model: {
                                                  value: scope.row[each.inProp],
                                                  callback: function($$v) {
                                                    _vm.$set(
                                                      scope.row,
                                                      each.inProp,
                                                      $$v
                                                    )
                                                  },
                                                  expression:
                                                    "scope.row[each.inProp]"
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
                                      _vm._l(_vm.suppliers, function(list) {
                                        return _c("span", { key: list.id }, [
                                          each.inProp
                                            ? _c("span", [
                                                list.id ==
                                                scope.row[each.inProp]
                                                  ? _c("span", [
                                                      _vm._v(
                                                        "\n                                          " +
                                                          _vm._s(list.name) +
                                                          "\n                                          "
                                                      )
                                                    ])
                                                  : _vm._e()
                                              ])
                                            : _vm._e()
                                        ])
                                      })
                                    )
                                  : _c("span", [
                                      _vm._v(
                                        "\n                             " +
                                          _vm._s(scope.row[each.inProp]) +
                                          "\n                         "
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
                attrs: { label: "状态", width: "100" },
                scopedSlots: _vm._u([
                  {
                    key: "default",
                    fn: function(scope) {
                      return [
                        _vm._v(
                          "\n                    " +
                            _vm._s("新建") +
                            "\n                "
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
                  width: "150",
                  align: "center",
                  fixed: "right"
                },
                scopedSlots: _vm._u([
                  {
                    key: "default",
                    fn: function(scope) {
                      return [
                        _vm.purDtlIndex == "index" + scope.$index
                          ? _c(
                              "span",
                              [
                                _c(
                                  "el-button",
                                  {
                                    attrs: { size: "mini" },
                                    on: {
                                      click: function($event) {
                                        _vm.savePurChg(scope.row, scope.$index)
                                      }
                                    }
                                  },
                                  [_vm._v("保存")]
                                ),
                                _vm._v(" "),
                                _c(
                                  "el-button",
                                  {
                                    attrs: { size: "mini" },
                                    on: { click: _vm.purDtlCancel }
                                  },
                                  [_vm._v("取消\n                        ")]
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
                                    attrs: { size: "mini" },
                                    on: {
                                      click: function($event) {
                                        _vm.editPurChg(scope.row, scope.$index)
                                      }
                                    }
                                  },
                                  [_vm._v("编辑")]
                                ),
                                _vm._v(" "),
                                _c(
                                  "el-button",
                                  {
                                    attrs: { size: "mini", type: "danger" },
                                    on: {
                                      click: function($event) {
                                        _vm.delPurChg(scope.row, scope.$index)
                                      }
                                    }
                                  },
                                  [_vm._v("删除")]
                                )
                              ],
                              1
                            )
                      ]
                    }
                  }
                ])
              })
            ],
            2
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
                  _c(
                    "el-button",
                    {
                      attrs: { type: "primary" },
                      on: { click: _vm.addChgPurDtl }
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
                          _vm.confirmEditPur(_vm.editId)
                        }
                      }
                    },
                    [_vm._v("确定")]
                  ),
                  _vm._v(" "),
                  _c("el-button", { on: { click: _vm.cancelEdit } }, [
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
          attrs: { title: "商品明细", visible: _vm.addPurchaseDetailMask },
          on: {
            "update:visible": function($event) {
              _vm.addPurchaseDetailMask = $event
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
                        return _vm.searchProClick($event)
                      }
                    },
                    model: {
                      value: _vm.searchPro.commodity_code,
                      callback: function($$v) {
                        _vm.$set(_vm.searchPro, "commodity_code", $$v)
                      },
                      expression: "searchPro.commodity_code"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "span",
                [
                  _c("label", [_vm._v("规格编码")]),
                  _vm._v(" "),
                  _c("el-input", {
                    attrs: { clearable: "", placeholder: "请输入规格编码" },
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
                        return _vm.searchProClick($event)
                      }
                    },
                    model: {
                      value: _vm.searchPro.spec_code,
                      callback: function($$v) {
                        _vm.$set(_vm.searchPro, "spec_code", $$v)
                      },
                      expression: "searchPro.spec_code"
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
                          return _vm.searchProClick($event)
                        }
                      },
                      model: {
                        value: _vm.searchPro.shops_id,
                        callback: function($$v) {
                          _vm.$set(_vm.searchPro, "shops_id", $$v)
                        },
                        expression: "searchPro.shops_id"
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
                  on: { click: _vm.searchProClick }
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
                data: _vm.proDtlData,
                "highlight-current-row": "",
                type: "index",
                height: "160",
                "row-class-name": _vm.rowSpecIndex
              },
              on: { "row-click": _vm.togglePro }
            },
            [
              _c("light-table", {
                attrs: {
                  tableHead: _vm.proHead,
                  onlyTableColumn: true,
                  hasSelect: true
                }
              })
            ],
            1
          ),
          _vm._v(" "),
          _c("el-button", { attrs: { type: "text" } }, [_vm._v("规格")]),
          _vm._v(" "),
          _c(
            "el-table",
            {
              attrs: {
                data: _vm.specData,
                fit: "",
                "highlight-current-row": "",
                type: "index",
                height: "230",
                "row-class-name": _vm.specRowClassName
              },
              on: { "row-click": _vm.specRowClick }
            },
            [
              _vm._l(_vm.specHead, function(item, index) {
                return _c("el-table-column", {
                  key: index,
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
                          item.type == "color"
                            ? _c("span", [
                                _c("span", {
                                  staticClass: "tableColor",
                                  style: { backgroundColor: scope.row.color }
                                }),
                                _vm._v(
                                  "\n                     " +
                                    _vm._s(scope.row[item.prop]) +
                                    "\n                        "
                                )
                              ])
                            : item.type == "select_stu"
                              ? _c("span", [
                                  _c("i", {
                                    staticClass: "showStatus",
                                    class: {
                                      statusActive:
                                        scope.row.status == 0 ? false : true
                                    }
                                  }),
                                  _vm._v(
                                    "\n                             " +
                                      _vm._s(
                                        scope.row[item.prop] == 0
                                          ? "停用"
                                          : "启用"
                                      ) +
                                      "\n                        "
                                  )
                                ])
                              : item.type == "select_def"
                                ? _c("span", [
                                    _vm._v(
                                      "\n                             " +
                                        _vm._s(
                                          scope.row[item.prop] == 0
                                            ? "否"
                                            : "是"
                                        ) +
                                        "\n                        "
                                    )
                                  ])
                                : item.type == "select"
                                  ? _c("span", [
                                      scope.row[item.prop] == ""
                                        ? _c("span", [
                                            _vm._v(
                                              "\n                            {{}}\n                        "
                                            )
                                          ])
                                        : typeof scope.row[item.prop] ==
                                            "object" && scope.row[item.nameProp]
                                          ? _c("span", [
                                              _vm._v(
                                                "\n                             " +
                                                  _vm._s(
                                                    scope.row[item.prop][
                                                      item.nameProp
                                                    ]
                                                  ) +
                                                  "\n                        "
                                              )
                                            ])
                                          : _c(
                                              "span",
                                              _vm._l(
                                                _vm.resData[item.stateVal],
                                                function(list, index) {
                                                  return _c(
                                                    "span",
                                                    { key: index },
                                                    [
                                                      item.inProp
                                                        ? _c("span", [
                                                            list.id ==
                                                            scope.row[
                                                              item.prop
                                                            ][item.inProp]
                                                              ? _c("span", [
                                                                  _vm._v(
                                                                    "\n                                      " +
                                                                      _vm._s(
                                                                        list.name
                                                                          ? list.name
                                                                          : ""
                                                                      ) +
                                                                      "\n                                      "
                                                                  )
                                                                ])
                                                              : _vm._e()
                                                          ])
                                                        : _c("span", [
                                                            list.id ==
                                                            scope.row[item.prop]
                                                              ? _c("span", [
                                                                  _vm._v(
                                                                    "\n                                " +
                                                                      _vm._s(
                                                                        list.name
                                                                          ? list.name
                                                                          : ""
                                                                      ) +
                                                                      "\n                            "
                                                                  )
                                                                ])
                                                              : _vm._e()
                                                          ])
                                                    ]
                                                  )
                                                }
                                              )
                                            )
                                    ])
                                  : item.type == "checkbox"
                                    ? _c(
                                        "span",
                                        [
                                          _c(
                                            "el-checkbox",
                                            {
                                              attrs: {
                                                checked:
                                                  scope.row[item.prop][
                                                    item.inProp
                                                  ] == 1
                                                    ? true
                                                    : false,
                                                disabled: ""
                                              }
                                            },
                                            [
                                              _vm._v(
                                                _vm._s(
                                                  scope.row[item.prop][
                                                    item.inProp
                                                  ]
                                                )
                                              )
                                            ]
                                          )
                                        ],
                                        1
                                      )
                                    : _c("span", [
                                        item.inProp
                                          ? _c("span", [
                                              _vm._v(
                                                "\n                                 " +
                                                  _vm._s(
                                                    scope.row[item.prop][
                                                      item.inProp
                                                    ]
                                                  ) +
                                                  "\n                            "
                                              )
                                            ])
                                          : _c("span", [
                                              _vm._v(
                                                "\n                                 " +
                                                  _vm._s(scope.row[item.prop]) +
                                                  "\n                            "
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
              _vm._l(_vm.specHeadEdit, function(each) {
                return _c("el-table-column", {
                  key: each.inProp,
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
                          _vm.specIndex == "index" + scope.$index
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
                                          on: { change: _vm.handleEdit },
                                          model: {
                                            value:
                                              _vm.specDtlInfo[scope.$index][
                                                each.prop
                                              ],
                                            callback: function($$v) {
                                              _vm.$set(
                                                _vm.specDtlInfo[scope.$index],
                                                each.prop,
                                                $$v
                                              )
                                            },
                                            expression:
                                              "specDtlInfo[scope.$index][each.prop]"
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
                                            on: { change: _vm.handleEdit },
                                            model: {
                                              value:
                                                _vm.specDtlInfo[scope.$index][
                                                  each.prop
                                                ],
                                              callback: function($$v) {
                                                _vm.$set(
                                                  _vm.specDtlInfo[scope.$index],
                                                  each.prop,
                                                  $$v
                                                )
                                              },
                                              expression:
                                                "specDtlInfo[scope.$index][each.prop]"
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
                                                      scope.$index
                                                    ][each.prop],
                                                  callback: function($$v) {
                                                    _vm.$set(
                                                      _vm.specDtlInfo[
                                                        scope.$index
                                                      ],
                                                      each.prop,
                                                      $$v
                                                    )
                                                  },
                                                  expression:
                                                    "specDtlInfo[scope.$index][each.prop]"
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
                                                on: {
                                                  change: _vm.dateChangebirthday
                                                },
                                                model: {
                                                  value:
                                                    _vm.specDtlInfo[
                                                      scope.$index
                                                    ][each.prop],
                                                  callback: function($$v) {
                                                    _vm.$set(
                                                      _vm.specDtlInfo[
                                                        scope.$index
                                                      ],
                                                      each.prop,
                                                      $$v
                                                    )
                                                  },
                                                  expression:
                                                    "specDtlInfo[scope.$index][each.prop]"
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
                                                on: { change: _vm.handleEdit },
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
                              ])
                            : _c("span")
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
          _c("el-button", { attrs: { type: "text" } }, [
            _vm._v("组合商品信息")
          ]),
          _vm._v(" "),
          _c(
            "el-table",
            {
              attrs: {
                data: _vm.combData,
                fit: "",
                "highlight-current-row": "",
                height: "160",
                "row-class-name": _vm.sonSpecRowClassName
              },
              on: { "row-click": _vm.sonSpecRowClick }
            },
            [
              _vm._l(_vm.combProHead, function(item, index) {
                return _c("el-table-column", {
                  key: index,
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
                                  : typeof scope.row[item.prop] == "object" &&
                                    item.nmProp
                                    ? _c("span", [
                                        _vm._v(
                                          "\n\n                             " +
                                            _vm._s(
                                              scope.row[item.prop][item.inProp]
                                            ) +
                                            "\n                        "
                                        )
                                      ])
                                    : _c(
                                        "span",
                                        _vm._l(
                                          _vm.resData[item.stateVal],
                                          function(list, index) {
                                            return _c("span", { key: index }, [
                                              item.inProp
                                                ? _c("span", [
                                                    list.id ==
                                                    scope.row[item.prop][
                                                      item.inProp
                                                    ]
                                                      ? _c("span", [
                                                          _vm._v(
                                                            "\n                                      " +
                                                              _vm._s(
                                                                list.name
                                                                  ? list.name
                                                                  : ""
                                                              ) +
                                                              "\n                                      "
                                                          )
                                                        ])
                                                      : _vm._e()
                                                  ])
                                                : _c("span", [
                                                    list.id ==
                                                    scope.row[item.prop]
                                                      ? _c("span", [
                                                          _vm._v(
                                                            "\n                                " +
                                                              _vm._s(
                                                                list.name
                                                                  ? list.name
                                                                  : ""
                                                              ) +
                                                              "\n                            "
                                                          )
                                                        ])
                                                      : _vm._e()
                                                  ])
                                            ])
                                          }
                                        )
                                      )
                              ])
                            : _c("span", [
                                _vm._v(
                                  "\n                         " +
                                    _vm._s(
                                      item.inProp
                                        ? scope.row[item.prop][item.inProp]
                                        : scope.row[item.prop]
                                    ) +
                                    "\n                    "
                                )
                              ])
                        ]
                      }
                    }
                  ])
                })
              }),
              _vm._v(" "),
              _vm._l(_vm.combProEditHead, function(each) {
                return _c("el-table-column", {
                  key: each.inProp,
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
                                          on: { change: _vm.handleEdit },
                                          model: {
                                            value: _vm.specDtlInfo[each.inProp],
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
                                            on: { change: _vm.handleEdit },
                                            model: {
                                              value:
                                                _vm.specDtlInfo[each.inProp],
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
                                                on: {
                                                  change: _vm.dateChangebirthday
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
                                                on: { change: _vm.handleEdit },
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
                                                          "\n                                          " +
                                                            _vm._s(list.name) +
                                                            "\n                                          "
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
                                        "\n                             " +
                                          _vm._s(_vm.combEditVal[each.inProp]) +
                                          "\n                         "
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
                { staticStyle: { float: "right" } },
                [
                  _c(
                    "el-button",
                    {
                      attrs: { type: "primary" },
                      on: { click: _vm.confirmAddPDetail }
                    },
                    [_vm._v("确定")]
                  ),
                  _vm._v(" "),
                  _c("el-button", { on: { click: _vm.cancelAddPDetail } }, [
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
                      _vm.confirmD(_vm.delId)
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
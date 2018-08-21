webpackJsonp([5],{

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
Component.options.__file = "resources\\assets\\js\\views\\purchase\\stockIn.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-1918eaed", Component.options)
  } else {
    hotAPI.reload("data-v-1918eaed", Component.options)
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
var _methods;

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
        ent: this.addNewStock
      }, {
        cnt: '修改',
        icon: 'bf-change',
        ent: this.updateStock,
        nClick: false
      }, {
        cnt: '删除',
        icon: 'bf-del',
        ent: this.delMore
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
        ent: this.test,
        nClick: false
      }, {
        cnt: '导出',
        icon: 'bf-out',
        ent: this.test
      }, {
        cnt: '打印',
        icon: 'bf-printer',
        ent: this.doPrinter,
        nClick: false
      }, {
        cnt: '刷新',
        icon: 'bf-refresh',
        ent: this.test
      }],
      searchBox: {
        goodsName: '',
        shopNames: '',
        vip_name: ''
      },
      stockInUrl: '/stockins',
      topActiveName: '0',
      newLoading: true,
      partLoading: true,
      finishLoading: true,
      newData: [],
      partData: [],
      finishData: [],
      btmActiveName: '0',
      loading: false,
      currentIndex: '',
      moreForms: true,
      topTabsVal: [],
      btmTableHead: [[{
        label: '子件图片',
        width: '120',
        prop: '',
        type: 'img'
      }, {
        label: '采购单号',
        width: '180',
        prop: '',
        type: 'text'
      }, {
        label: '合同编号',
        width: '180',
        prop: '',
        type: 'text'
      }, {
        label: '店铺',
        width: '160',
        prop: '',
        type: 'text'
      }, {
        label: '商品编码',
        width: '160',
        prop: '',
        inProp: '',
        type: 'select'
      }, {
        label: '商品简称',
        width: '150',
        prop: '',
        type: 'text'
      }, {
        label: '供应商',
        width: '150',
        prop: '',
        type: 'number'
      }, {
        label: '子件编码',
        width: '260',
        prop: '',
        type: 'text'
      }, {
        label: '包件数',
        width: '120',
        prop: '',
        type: 'number'
      }, {
        label: '子件名称',
        width: '120',
        prop: '',
        type: 'number'
      }, {
        label: '色号',
        width: '120',
        prop: '',
        type: 'number'
      }, {
        label: '入库数量',
        width: '120',
        prop: 'stock_in_quantity',
        type: 'number'
      }, {
        label: '采购成本',
        width: '120',
        prop: '',
        type: 'number'
      }, {
        label: '采购运费',
        width: '120',
        prop: '',
        type: 'text'
      }, {
        label: '仓库成本',
        width: '120',
        prop: '',
        type: 'number'
      }, {
        label: '折扣',
        width: '120',
        prop: '',
        type: 'number'
      }, {
        label: '总额',
        width: '120',
        prop: 'total_fee',
        type: 'number'
      }, {
        label: '备注',
        width: '120',
        prop: 'remark',
        type: 'textarea'
      }], []],
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
      addStockEditHead: [{
        label: '采购成本',
        width: '120',
        prop: "",
        inProp: '',
        type: 'number'
      }, {
        label: '采购运费',
        width: '120',
        prop: "",
        inProp: '',
        type: 'number'
      }, {
        label: '仓库成本',
        width: '120',
        prop: "",
        inProp: '',
        type: 'number'
      }, {
        label: '入库数量',
        width: '120',
        prop: "",
        inProp: '',
        type: 'number'
      }],
      proDtlData: [],
      proDtlIndex: '',
      proDtlEditHead: [{
        label: '采购成本',
        width: '160',
        prop: '',
        inProp: "",
        type: 'number'
      }, {
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
      }],
      /*新增*/
      addStockIndex: '',
      /*库存*/
      stockUrl: '/stocks',
      /*获取数据*/
      checkboxInit: false,
      stockHead: [{
        label: '入库单号',
        width: '200',
        prop: 'stock_in_no',
        type: 'text'
      }, {
        label: '入库仓库',
        width: '130',
        prop: 'warehouse',
        inProp: 'name',
        type: 'text'
      }, {
        label: '入库类型',
        width: '130',
        prop: 'stock_in_type',
        inProp: 'name',
        type: 'text'
      }, {
        label: '创建人',
        width: '130',
        prop: 'creator',
        type: 'text'
      }, {
        label: '提交人',
        width: '130',
        prop: 'submitter',
        type: 'text'
      }, {
        label: '审核人',
        width: '130',
        prop: 'auditor',
        type: 'text'
      }, {
        label: '入库人',
        width: '130',
        prop: 'warehouer',
        type: 'text'
      }, {
        label: '创建时间',
        width: '200',
        prop: 'created_at',
        type: 'text'
      }, {
        label: '提交时间',
        width: '220',
        prop: 'submit_at',
        inProp: 'date',
        type: 'text'
      }, {
        label: '提交状态',
        width: '120',
        prop: 'is_submit',
        type: 'checkbox'
      }, {
        label: '入库状态',
        width: '120',
        prop: 'is_stock_in',
        type: 'checkbox'
      }, {
        label: '打印状态',
        width: '120',
        prop: 'is_print',
        type: 'checkbox'
      }, {
        label: '审核状态',
        width: '120',
        prop: 'is_audit',
        type: 'checkbox'
      }, {
        label: '入库时间',
        width: '220',
        prop: 'stock_in_at',
        inProp: 'date',
        type: 'text'
      }, {
        label: '打印时间',
        width: '220',
        prop: 'print_at',
        inProp: 'date',
        type: 'text'
      }, {
        label: '审核时间',
        width: '220',
        prop: 'audit_at',
        inProp: 'date',
        type: 'text'
      }],
      stockRow: {},
      /*新建*/
      addStockMask: false,
      addStockFormHead: [{
        label: '入库单号',
        prop: 'purchase_order_no',
        holder: '系统自动生成',
        type: 'text',
        addChgAble: true
      }, {
        label: '入库仓库',
        prop: 'warehouse_id',
        holder: '请选择入库仓库',
        type: 'select'
      }, {
        label: '入库类型',
        prop: 'stock_in_types_id',
        holder: '请选择入库类型',
        type: 'select'
      }],
      addStockFormVal: {
        warehouse_id: '',
        stock_in_types_id: '',
        stock_in_details: []
      },
      addStockFormRules: {
        warehouse_id: [{ required: true, message: '入库仓库必选', trigger: 'blur' }],
        stock_in_types_id: [{ required: true, message: '入库类型必选', trigger: 'blur' }]
      },
      addStockTabVal: [],
      addStockTabHead: [{
        label: '采购单号',
        width: '230',
        prop: '',
        type: 'text'
      }, {
        label: '店铺',
        width: '230',
        prop: '',
        type: 'text'
      }, {
        label: '商品编码',
        width: '180',
        prop: '',
        type: 'text'
      }, {
        label: '商品简称',
        width: '160',
        prop: '',
        type: 'text'
      }, {
        label: '供应商',
        width: '160',
        prop: '',
        inProp: '',
        type: 'select'
      }, {
        label: '规格编码',
        width: '150',
        prop: '',
        type: 'text'
      }, {
        label: '包件数',
        width: '150',
        prop: '',
        type: 'number'
      }, {
        label: '规格名称',
        width: '260',
        prop: '',
        type: 'text'
      }, {
        label: '入库数量',
        width: '120',
        prop: '',
        type: 'number'
      }, {
        label: '采购成本',
        width: '120',
        prop: '',
        type: 'number'
      }, {
        label: '仓库成本',
        width: '120',
        prop: '',
        type: 'number'
      }, {
        label: '折扣',
        width: '120',
        prop: '',
        type: 'number'
      }, {
        label: '总额',
        width: '120',
        prop: '',
        type: 'number'
      }, {
        label: '备注',
        width: '120',
        prop: '',
        type: 'text'
      }],
      /*商品明细*/
      proDtlMask: false,
      proQuery: {
        commodity_code: ''
      },
      proDtlVal: [],
      proDtlHead: [{
        label: '采购单号',
        width: '250',
        prop: '',
        inProp: "",
        type: 'text'
      }, {
        label: '店铺',
        width: '160',
        prop: '',
        inProp: "",
        type: 'select'
      }, {
        label: '客户名称',
        width: '120',
        prop: '',
        inProp: "",
        type: 'text'
      }, {
        label: '商品编码',
        width: '160',
        prop: '',
        inProp: "",
        type: 'text'
      }, {
        label: '商品简称',
        width: '160',
        prop: '',
        inProp: "",
        type: 'text'
      }, {
        label: '子件编码',
        width: '160',
        prop: '',
        inProp: "",
        type: 'text'
      }, {
        label: '子件名称',
        width: '180',
        prop: '',
        inProp: "",
        type: 'text'
      }, {
        label: '包件数',
        width: '100',
        prop: '',
        inProp: "",
        type: 'number'
      }, {
        label: '供应商',
        width: '120',
        prop: '',
        inProp: "",
        type: 'select'
      }, {
        label: '采购成本',
        width: '120',
        prop: '',
        inProp: "",
        type: 'number'
      }, {
        label: '采购运费',
        width: '120',
        prop: '',
        inProp: "",
        type: 'number'
      }, {
        label: '仓库成本',
        width: '120',
        prop: '',
        inProp: "",
        type: 'number'
      }, {
        label: '折扣',
        width: '100',
        prop: '',
        inProp: "",
        type: 'number'
      }, {
        label: '采购数',
        width: '100',
        prop: '',
        inProp: "",
        type: 'number'
      }, {
        label: '未入库采购数',
        width: '160',
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
        label: '总额',
        width: '120',
        prop: '',
        inProp: "",
        type: 'number'
      }, {
        label: '入库数量',
        width: '120',
        prop: 'extraVal',
        inProp: "",
        type: 'number'
      }, {
        label: '最大入库数',
        width: '150',
        prop: '',
        inProp: "",
        type: 'number'
      }, {
        label: '创建时间',
        width: '220',
        prop: '',
        inProp: "",
        type: 'text'
      }],
      proDtlRIndex: '',
      /*批量删除*/
      multipleSelection: [],
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
  methods: (_methods = {
    test: function test() {
      console.log(1);
    },

    /*修改*/
    edit: function edit() {
      /*统一外部编辑*/

    },
    editSave: function editSave() {},
    editCancel: function editCancel() {},
    handleEdit: function handleEdit() {},

    /*删除*/
    del: function del() {},

    /*底部tabs切换*/
    clickBtmTabs: function clickBtmTabs() {},

    /*新建入库增加明细*/
    addStockRowClassName: function addStockRowClassName(_ref) {
      var row = _ref.row,
          rowIndex = _ref.rowIndex;

      row.index = rowIndex;
    },
    addCellClick: function addCellClick(row) {
      this.addStockIndex = 'index' + row.index;
    },
    addCurChg: function addCurChg(currentRow, oldCurrentRow) {
      /*行切换时，保存数据*/
      if (oldCurrentRow) {
        // this.addStockIndex = 'index'+ row.index;
      }
    },

    /*商品明细*/
    addProDtl: function addProDtl() {
      var _this = this;

      /*明细数据初始化*/
      this.proDtlMask = true;
      /*请求商品明细信息*/
      this.$fetch(this.stockUrl).then(function (res) {
        console.log(res);
        _this.proDtlData = res.data;
        // this.proDtlSpec.push(res.data[0]);
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
    },
    proDtlCName: function proDtlCName(_ref2) {
      var row = _ref2.row,
          rowIndex = _ref2.rowIndex;

      row.index = rowIndex;
    },
    proDtlRow: function proDtlRow(row) {
      /*行点击*/
      this.proDtlIndex = 'index' + row.index;
    },
    proDtlCurChg: function proDtlCurChg(currentRow, oldCurrentRow) {
      /*行切换*/
      if (oldCurrentRow) {}
    },
    confirmAddProDtl: function confirmAddProDtl() {
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
      });
    },
    cancelAddProDtl: function cancelAddProDtl() {
      this.proDtlMask = false;
    },

    /*获取数据*/
    clickTopTabs: function clickTopTabs() {
      this.fetchStockData();
    },
    fetchStockData: function fetchStockData() {
      var _this2 = this;

      var index = this.topActiveName - 0;
      switch (index) {
        case 0:
          this.newOpt[3].nClick = false;
          this.newOpt[4].nClick = true;
          this.newOpt[5].nClick = true;
          this.$fetch(this.urls.stockins, { status: true }).then(function (res) {
            _this2.newLoading = false;
            _this2.newData = res.data;
            var pg = res.meta.pagination;
            _this2.$store.dispatch('currentPage', pg.current_page);
            _this2.$store.commit('PER_PAGE', pg.per_page);
            _this2.$store.commit('PAGE_TOTAL', pg.total);
            /*仓库、仓库类型*/
            // this.$store.dispatch('warehouses','/warehouses');
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
          break;
        case 1:
          this.newOpt[3].nClick = true;
          this.newOpt[4].nClick = false;
          this.newOpt[5].nClick = false;
          this.$fetch(this.urls.stockins, { is_submit: true }).then(function (res) {
            _this2.partLoading = false;
            _this2.partData = res.data;
            var pg = res.meta.pagination;
            _this2.$store.dispatch('currentPage', pg.current_page);
            _this2.$store.commit('PER_PAGE', pg.per_page);
            _this2.$store.commit('PAGE_TOTAL', pg.total);
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
          break;
        case 2:
          this.newOpt[3].nClick = true;
          this.newOpt[4].nClick = true;
          this.newOpt[5].nClick = false;
          this.$fetch(this.urls.stockins, { is_stock_in: true }).then(function (res) {
            _this2.finishLoading = false;
            _this2.finishData = res.data;
            var pg = res.meta.pagination;
            _this2.$store.dispatch('currentPage', pg.current_page);
            _this2.$store.commit('PER_PAGE', pg.per_page);
            _this2.$store.commit('PAGE_TOTAL', pg.total);
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
    stockRowClick: function stockRowClick(row) {
      this.stockRow = row;
      this.newOpt[1].nClick = row['is_change'] ? true : false;
      this.newOpt[3].nClick = row['is_submit'] ? true : false;
      this.newOpt[4].nClick = row['is_audit'] ? true : false;
      this.newOpt[7].nClick = row['is_print'] ? true : false;
      // this.newOpt[3].nClick = row['is_submit']?true:false;
    },

    /*新增*/
    addNewStock: function addNewStock() {
      this.addStockMask = true;
    },
    addStockRCName: function addStockRCName(_ref3) {
      var row = _ref3.row,
          rowIndex = _ref3.rowIndex;
      row.index = rowIndex;
    },
    addStockRClick: function addStockRClick() {
      row.index = rowIndex;
    }
  }, _defineProperty(_methods, 'addProDtl', function addProDtl() {
    this.addProDtl = true;
  }), _defineProperty(_methods, 'proQueryClick', function proQueryClick() {}), _defineProperty(_methods, 'proExport', function proExport() {}), _defineProperty(_methods, 'proAutoFill', function proAutoFill() {}), _defineProperty(_methods, 'proDtlCName', function proDtlCName(_ref4) {
    var row = _ref4.row,
        rowIndex = _ref4.rowIndex;
    row.index = rowIndex;
  }), _defineProperty(_methods, 'proDtlRClick', function proDtlRClick(row) {
    this.proDtlRIndex = row.index;
  }), _defineProperty(_methods, 'confirmAddProDtl', function confirmAddProDtl() {}), _defineProperty(_methods, 'cancelAddProDtl', function cancelAddProDtl() {
    this.proDtlMask = false;
  }), _defineProperty(_methods, 'updateStock', function updateStock() {}), _defineProperty(_methods, 'delStock', function delStock(row, e) {
    this.showDel = true;
    $('.el-popper').css({ left: e.x - 100 + 'px', top: e.y - 125 + 'px' });
    this.delId = row.id;
    if (row.purchase_order_no) {
      this.delUrl = this.urls.purchases;
    } else if (row.purchases_id) {
      this.delUrl = this.urls.purchaselists;
    } else {
      this.delUrl = this.urls.purchasedetails;
    }
  }), _defineProperty(_methods, 'confirmD', function confirmD(url, id) {
    var _this3 = this;

    this.$del(url + '/' + id).then(function () {
      _this3.$message({
        message: '删除成功',
        type: 'success'
      });
      _this3.showDel = false;
      _this3.refresh();
      if (_this3.newData[0] && _this3.newData[0].purchase_lists[0]) {
        _this3.purListVal = _this3.newData[0].purchase_lists[0];
        _this3.purDetailsVal = _this3.newData[0].purchase_lists[0].purchase_details;
      }
    }, function (err) {
      if (err.response) {
        _this3.showDel = false;
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
  }), _defineProperty(_methods, 'cancelD', function cancelD() {
    this.showDel = false;
    this.$message({
      message: '取消删除',
      type: 'info'
    });
  }), _defineProperty(_methods, 'handleSelectionChange', function handleSelectionChange(val) {
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
  }), _defineProperty(_methods, 'delMore', function delMore() {
    var _this4 = this;

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
          _this4.$del(_this4.urls.purchases, { ids: _this4.delArr }).then(function () {
            _this4.$message({
              message: '删除成功',
              type: 'success'
            });
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
        }).catch(function () {
          _this4.$message({
            type: 'info',
            message: '已取消删除'
          });
        });
      }
    }
  }), _defineProperty(_methods, 'refresh', function refresh() {
    this.newLoading = true;
    this.fetchStockData();
  }), _defineProperty(_methods, 'doCommit', function doCommit() {
    var _this5 = this;

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
        this.$put(this.urls.stockins + '/' + this.stockRow.id + '/submit').then(function () {
          _this5.$message({
            message: '提交成功!',
            type: 'success'
          });
          _this5.refresh();
        }, function (err) {
          _this5.$message.error(err.response.data.message);
        });
      }
    }
  }), _defineProperty(_methods, 'doPrinter', function doPrinter() {
    var _this6 = this;

    if (!this.newOpt[7].nClick) {
      this.$put(this.urls.stockins + '/' + this.stockRow.id + '/print').then(function () {
        _this6.printBtn();
        _this6.$message({
          message: '打印成功!',
          type: 'success'
        });
        _this6.refresh();
      }, function (err) {
        _this6.$message.error(err.response.data.message);
      });
    }
  }), _defineProperty(_methods, 'printBtn', function printBtn() {
    this.remove_ie_header_and_footer();
    var subOutputRankPrint = document.getElementById('subOutputRank-print');
    var newContent = subOutputRankPrint.innerHTML;
    var oldContent = document.body.innerHTML;
    document.body.innerHTML = newContent;
    window.print();
    window.location.reload();
    document.body.innerHTML = oldContent;
    return false;
  }), _defineProperty(_methods, 'remove_ie_header_and_footer', function remove_ie_header_and_footer() {
    try {
      var RegWsh = new ActiveXObject("WScript.Shell");
      RegWsh.RegWrite(this.hkey_path + "header", "");
      RegWsh.RegWrite(this.hkey_path + "footer", "");
    } catch (e) {}
  }), _defineProperty(_methods, 'doAudit', function doAudit() {
    var _this7 = this;

    if (!this.newOpt[4].nClick) {
      this.$put(this.urls.stockins + '/' + this.stockRow.id + '/audit').then(function () {
        _this7.$message({
          message: '审核成功!',
          type: 'success'
        });
        _this7.refresh();
      }, function (err) {
        _this7.$message.error(err.response.data.message);
      });
    }
  }), _methods),
  mounted: function mounted() {
    this.fetchStockData();
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
      _c("div", { staticClass: "searchBox" }, [
        _c(
          "span",
          [
            _c("label", [_vm._v("入库单号")]),
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
                  return _vm.getData($event)
                }
              },
              model: {
                value: _vm.searchBox.goodsName,
                callback: function($$v) {
                  _vm.$set(_vm.searchBox, "goodsName", $$v)
                },
                expression: "searchBox.goodsName"
              }
            })
          ],
          1
        ),
        _vm._v(" "),
        _c(
          "span",
          [
            _c("label", [_vm._v("外部单号")]),
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
                  return _vm.getData($event)
                }
              },
              model: {
                value: _vm.searchBox.goodsName,
                callback: function($$v) {
                  _vm.$set(_vm.searchBox, "goodsName", $$v)
                },
                expression: "searchBox.goodsName"
              }
            })
          ],
          1
        ),
        _vm._v(" "),
        _c(
          "span",
          [
            _c("label", [_vm._v("商品编码")]),
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
                  return _vm.getData($event)
                }
              },
              model: {
                value: _vm.searchBox.goodsName,
                callback: function($$v) {
                  _vm.$set(_vm.searchBox, "goodsName", $$v)
                },
                expression: "searchBox.goodsName"
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
              attrs: { clearable: "" },
              nativeOn: {
                keyup: function($event) {
                  if (
                    !("button" in $event) &&
                    _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                  ) {
                    return null
                  }
                  return _vm.getData($event)
                }
              },
              model: {
                value: _vm.searchBox.goodsName,
                callback: function($$v) {
                  _vm.$set(_vm.searchBox, "goodsName", $$v)
                },
                expression: "searchBox.goodsName"
              }
            })
          ],
          1
        ),
        _vm._v(" "),
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
                  return _vm.getData($event)
                }
              },
              model: {
                value: _vm.searchBox.goodsName,
                callback: function($$v) {
                  _vm.$set(_vm.searchBox, "goodsName", $$v)
                },
                expression: "searchBox.goodsName"
              }
            })
          ],
          1
        ),
        _vm._v(" "),
        _c(
          "span",
          [
            _c("label", [_vm._v("入库仓库")]),
            _vm._v(" "),
            _c(
              "el-select",
              {
                attrs: { clearable: "", placeholder: "请选择" },
                model: {
                  value: _vm.searchBox.shopNames,
                  callback: function($$v) {
                    _vm.$set(_vm.searchBox, "shopNames", $$v)
                  },
                  expression: "searchBox.shopNames"
                }
              },
              _vm._l(_vm.searchBox.shopNames, function(item) {
                return _c("el-option", {
                  key: item.value,
                  attrs: { label: item.label, value: item.value }
                })
              })
            )
          ],
          1
        )
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
                  attrs: { data: _vm.newData, fit: "", height: "300" },
                  on: {
                    "selection-change": _vm.handleSelectionChange,
                    "row-click": _vm.stockRowClick
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
                  _vm._l(_vm.stockHead, function(item) {
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
                              item.type == "checkbox"
                                ? _c(
                                    "span",
                                    [
                                      _c("el-checkbox", {
                                        attrs: { disabled: "" },
                                        model: {
                                          value: scope.row[item.prop],
                                          callback: function($$v) {
                                            _vm.$set(scope.row, item.prop, $$v)
                                          },
                                          expression: "scope.row[item.prop]"
                                        }
                                      })
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
                                              "\n                            "
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
                                    _vm.delStock(scope.row, $event)
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
            { attrs: { label: "已提交", name: "1" } },
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
                  attrs: { data: _vm.partData, fit: "", height: "300" },
                  on: {
                    "selection-change": _vm.handleSelectionChange,
                    "row-click": _vm.stockRowClick
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
                  _vm._l(_vm.stockHead, function(item) {
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
                              item.type == "checkbox"
                                ? _c(
                                    "span",
                                    [
                                      _c("el-checkbox", {
                                        attrs: { disabled: "" },
                                        model: {
                                          value: scope.row[item.prop],
                                          callback: function($$v) {
                                            _vm.$set(scope.row, item.prop, $$v)
                                          },
                                          expression: "scope.row[item.prop]"
                                        }
                                      })
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
                                              "\n                            "
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
                                    _vm.delStock(scope.row, $event)
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
            { attrs: { label: "已入库", name: "2" } },
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
                  attrs: { data: _vm.finishData, fit: "", height: "300" },
                  on: {
                    "selection-change": _vm.handleSelectionChange,
                    "row-click": _vm.stockRowClick
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
                  _vm._l(_vm.stockHead, function(item) {
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
                              item.type == "checkbox"
                                ? _c(
                                    "span",
                                    [
                                      _c("el-checkbox", {
                                        attrs: { disabled: "" },
                                        model: {
                                          value: scope.row[item.prop],
                                          callback: function($$v) {
                                            _vm.$set(scope.row, item.prop, $$v)
                                          },
                                          expression: "scope.row[item.prop]"
                                        }
                                      })
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
                                              "\n                            "
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
                                    _vm.delStock(scope.row, $event)
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
      _c("Pagination", { attrs: { "page-url": _vm.stockInUrl } }),
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
          _c("el-tab-pane", { attrs: { label: "入库单明细", name: "0" } }, [
            _vm._v("\n            入库单明细\n        ")
          ]),
          _vm._v(" "),
          _c("el-tab-pane", { attrs: { label: "入库图片", name: "1" } }, [
            _vm._v("\n            入库图片\n        ")
          ])
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "el-dialog",
        {
          class: { "more-forms": _vm.moreForms },
          attrs: { title: "新建入库单", visible: _vm.addStockMask },
          on: {
            "update:visible": function($event) {
              _vm.addStockMask = $event
            }
          }
        },
        [
          _c("el-button", { attrs: { type: "text" } }, [_vm._v("基本信息")]),
          _vm._v(" "),
          _c("add-new", {
            attrs: {
              "rule-form": _vm.addStockFormVal,
              rules: _vm.addStockFormRules,
              "add-arr": _vm.addStockFormHead,
              onlyInputs: true
            }
          }),
          _vm._v(" "),
          _c("el-button", { attrs: { type: "text" } }, [_vm._v("入库明细")]),
          _vm._v(" "),
          _c(
            "el-table",
            {
              attrs: {
                data: _vm.addStockTabVal,
                fit: "",
                height: "300",
                "row-class-name": _vm.addStockRCName
              },
              on: { "row-click": _vm.addStockRClick }
            },
            [
              _vm._l(_vm.addStockTabHead, function(item, index) {
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
                        return undefined
                      }
                    }
                  ])
                })
              }),
              _vm._v(" "),
              _vm._l(_vm.addStockEditHead, function(each) {
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
                        return undefined
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
                      on: { click: _vm.addProDtl }
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
                      on: { click: function($event) {} }
                    },
                    [_vm._v("确定")]
                  ),
                  _vm._v(" "),
                  _c("el-button", { on: { click: function($event) {} } }, [
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
          attrs: { title: "商品明细", visible: _vm.proDtlMask },
          on: {
            "update:visible": function($event) {
              _vm.proDtlMask = $event
            }
          }
        },
        [
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
                "el-button",
                {
                  attrs: { type: "primary" },
                  on: { click: _vm.proQueryClick }
                },
                [_vm._v("查询")]
              ),
              _vm._v(" "),
              _c(
                "el-button",
                { attrs: { type: "primary" }, on: { click: _vm.proExport } },
                [_vm._v("导出")]
              ),
              _vm._v(" "),
              _c(
                "el-button",
                { attrs: { type: "primary" }, on: { click: _vm.proAutoFill } },
                [_vm._v("自动填充")]
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
                fit: "",
                height: "230",
                "row-class-name": _vm.proDtlCName
              },
              on: { "row-click": _vm.proDtlRClick }
            },
            _vm._l(_vm.proDtlHead, function(item) {
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
                        item.prop == "extraVal"
                          ? _c("span", [
                              _vm.proDtlRIndex == "index" + scope.$index
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
                                            scope.row[item.prop][item.inProp],
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
                                : _c("span", [
                                    _vm._v(
                                      "\n                            " +
                                        _vm._s(
                                          scope.row[item.prop][item.inProp]
                                        ) +
                                        "\n                        "
                                    )
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
                                  : item.type == "select"
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
                                                        "\n                                    " +
                                                          _vm._s(
                                                            list.name
                                                              ? list.name
                                                              : list.title
                                                          ) +
                                                          "\n                                "
                                                      )
                                                    ])
                                                  : _vm._e()
                                              ]
                                            )
                                          }
                                        )
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
                                      : _c("span", [
                                          _vm._v(
                                            "\n                         " +
                                              _vm._s(
                                                item.inProp
                                                  ? scope.row[item.prop][
                                                      item.inProp
                                                    ]
                                                  : scope.row[item.prop]
                                              ) +
                                              "\n                    "
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-1918eaed", module.exports)
  }
}

/***/ })

});
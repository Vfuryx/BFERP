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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
        ent: this.delBatch
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
        ent: this.refresh
      }],
      searchBox: {
        goodsName: '',
        shopNames: '',
        vip_name: ''
      },
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
        prop: 'stockInType',
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
        type: 'text'
      }, {
        label: '打印时间',
        width: '220',
        prop: 'print_at',
        type: 'text'
      }, {
        label: '审核时间',
        width: '220',
        prop: 'audit_at',
        type: 'text'
      }],
      stockRow: {},
      loading: true,
      newData: [],
      partData: [],
      finishData: [],
      topActiveName: '0',
      btmActiveName: '0',
      moreForms: true,
      /*入库单明细*/
      stockDtlData: [],
      btmTableHead: [[{
        label: '子件图片',
        width: '120',
        prop: 'img_url',
        type: 'img'
      }, {
        label: '采购单号',
        width: '200',
        prop: 'purchase_order_no',
        type: 'text'
      }, {
        label: '店铺',
        width: '160',
        prop: 'shops_id',
        type: 'select',
        stateVal: 'shops'
      }, {
        label: '商品编码',
        width: '160',
        prop: 'commodity_code',
        type: 'text'
      }, {
        label: '商品简称',
        width: '150',
        prop: 'short_name',
        type: 'text'
      }, {
        label: '供应商',
        width: '150',
        prop: 'suppliers_id',
        type: 'select',
        stateVal: 'suppliers'
      }, {
        label: '子件编码',
        width: '160',
        prop: 'component_code',
        type: 'text'
      }, {
        label: '包件数',
        width: '120',
        prop: 'package_quantity',
        type: 'number'
      }, {
        label: '子件名称',
        width: '130',
        prop: 'spec',
        type: 'number'
      }, {
        label: '入库数量',
        width: '100',
        prop: 'stock_in_quantity',
        type: 'number'
      }, {
        label: '采购成本',
        width: '100',
        prop: 'purchase_cost',
        type: 'number'
      }, {
        label: '采购运费',
        width: '100',
        prop: 'purchase_freight',
        type: 'text'
      }, {
        label: '仓库成本',
        width: '100',
        prop: 'warehouse_cost',
        type: 'number'
      }, {
        label: '折扣',
        width: '100',
        prop: 'discount',
        type: 'number'
      }, {
        label: '总额',
        width: '100',
        prop: 'total_fee',
        type: 'number'
      }, {
        label: '备注',
        width: '120',
        prop: 'remark',
        type: 'textarea'
      }], []],
      /*新建*/
      addStockMask: false,
      addStockFormHead: [{
        label: '入库单号',
        prop: 'stock_in_no',
        holder: '系统自动生成',
        width: '200',
        type: 'text',
        editChgAble: true,
        addChgAble: true
      }, {
        label: '入库仓库',
        prop: 'warehouse_id',
        holder: '请选择入库仓库',
        type: 'select',
        stateVal: 'warehouses',
        editChgAble: true
      }, {
        label: '入库类型',
        prop: 'stock_in_types_id',
        holder: '请选择入库类型',
        type: 'select',
        stateVal: 'stockintypes',
        editChgAble: true
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
        width: '200',
        prop: 'purchase_order_no',
        type: 'text'
      }, {
        label: '店铺',
        width: '120',
        prop: 'shops_id',
        type: 'select',
        stateVal: 'shops'
      }, {
        label: '商品编码',
        width: '150',
        prop: 'commodity_code',
        type: 'text'
      }, {
        label: '商品简称',
        width: '130',
        prop: 'short_name',
        type: 'text'
      }, {
        label: '供应商',
        width: '130',
        prop: 'suppliers_id',
        type: 'select',
        stateVal: 'suppliers'
      }, {
        label: '子件编码',
        width: '150',
        prop: 'component_code',
        type: 'text'
      }, {
        label: '包件数',
        width: '90',
        prop: 'package_quantity',
        type: 'number'
      }, {
        label: '子件名称',
        width: '120',
        prop: 'spec',
        type: 'text'
      }, {
        label: '采购成本',
        width: '100',
        prop: 'purchase_cost',
        type: 'number'
      }, {
        label: '仓库成本',
        width: '100',
        prop: 'warehouse_cost',
        type: 'number'
      }, {
        label: '折扣',
        width: '100',
        prop: 'discount',
        type: 'number'
      }, {
        label: '总额',
        width: '100',
        prop: 'total_fee',
        type: 'number'
      }, {
        label: '入库数量',
        width: '100',
        prop: 'newData',
        inProp: "stock_in_quantity",
        type: 'number'
      }, {
        label: '备注',
        width: '130',
        prop: 'newData',
        inProp: 'remark',
        type: 'textarea'
      }],
      addStockRIndex: '',
      addStockRData: {},
      /*商品明细*/
      proDtlMask: false,
      proQuery: {
        commodity_code: ''
      },
      threeParts: true,
      proDtlVal: [],
      proDtlHead: [{
        label: '采购单号',
        width: '200',
        prop: 'purchase_order_no',
        type: 'text'
      }, {
        label: '店铺',
        width: '160',
        prop: 'shops_id',
        type: 'select',
        stateVal: 'shops'
      }, {
        label: '客户名称',
        width: '120',
        prop: 'client_name',
        type: 'text'
      }, {
        label: '商品编码',
        width: '160',
        prop: 'commodity_code',
        type: 'text'
      }, {
        label: '商品简称',
        width: '160',
        prop: 'short_name',
        type: 'text'
      }, {
        label: '子件编码',
        width: '160',
        prop: 'component_code',
        type: 'text'
      }, {
        label: '子件名称',
        width: '180',
        prop: 'spec',
        type: 'text'
      }, {
        label: '包件数',
        width: '100',
        prop: 'package_quantity',
        type: 'number'
      }, {
        label: '供应商',
        width: '120',
        prop: 'suppliers_id',
        type: 'select',
        stateVal: 'suppliers'
      }, {
        label: '采购成本',
        width: '120',
        prop: 'purchase_cost',
        type: 'number'
      }, {
        label: '采购运费',
        width: '120',
        prop: 'purchase_freight',
        type: 'number'
      }, {
        label: '仓库成本',
        width: '120',
        prop: 'warehouse_cost',
        type: 'number'
      }, {
        label: '折扣',
        width: '100',
        prop: 'discount',
        type: 'number'
      }, {
        label: '采购数',
        width: '100',
        prop: 'purchase_quantity',
        type: 'number'
      }, {
        label: '已入库数',
        width: '120',
        prop: 'stock_in_count',
        type: 'number'
      }, {
        label: '总额',
        width: '120',
        prop: 'total_fee',
        type: 'number'
      }, {
        label: '入库数量',
        width: '120',
        prop: 'newData',
        inProp: "stock_in_quantity",
        type: 'number'
      }, {
        label: '最大入库数',
        width: '150',
        prop: 'maxStockIn',
        type: 'number'
      }, {
        label: '创建时间',
        width: '220',
        prop: 'created_at',
        type: 'text'
      }],
      proDtlRIndex: '',
      compValUpdate: false,
      proRowDate: {},
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
      ids: [],
      checkboxId: '',
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

    /*获取数据*/
    clickTopTabs: function clickTopTabs() {
      this.loading = true;
      this.fetchStockData();
      this.stockDtlData = [];
    },
    fetchStockData: function fetchStockData() {
      var _this = this;

      var index = this.topActiveName - 0;
      switch (index) {
        case 0:
          this.newOpt[3].nClick = false;
          this.newOpt[4].nClick = true;
          this.newOpt[5].nClick = true;
          this.$fetch(this.urls.stockins, { 'is_submit': false, 'include': 'warehouse,stockInType,stockInDetails.productComponent.product,stockInDetails.purchaseDetail.purchaseList.purchase,stockInDetails.stockIn' }).then(function (res) {
            _this.stockDtlData = [];
            _this.loading = false;
            _this.newData = res.data;
            var pg = res.meta.pagination;
            _this.$store.dispatch('currentPage', pg.current_page);
            _this.$store.commit('PER_PAGE', pg.per_page);
            _this.$store.commit('PAGE_TOTAL', pg.total);
            _this.$store.dispatch('suppliers', '/suppliers');
            _this.$store.dispatch('shops', '/shops');
            _this.$store.dispatch('warehouses', '/warehouses');
            _this.$store.dispatch('stockintypes', '/stockintypes');
            if (res.data[0]['stockInDetails']['data'].length > 0) {
              res.data[0]['stockInDetails']['data'].map(function (item) {
                var productComponent = item.productComponent;
                var purchaseList = item['purchaseDetail']['purchaseList'];
                var list = {
                  id: item.id,
                  img_url: productComponent.img_url,
                  purchase_order_no: purchaseList['purchase'].purchase_order_no,
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
                _this.stockDtlData.push(list);
              });
            }
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
          this.newOpt[3].nClick = true;
          this.newOpt[4].nClick = false;
          this.newOpt[5].nClick = false;
          this.$fetch(this.urls.stockins, { is_submit: true, include: 'warehouse,stockInType,stockInDetails.productComponent.product,stockInDetails.purchaseDetail.purchaseList.purchase,stockInDetails.stockIn' }).then(function (res) {
            _this.loading = false;
            _this.partData = res.data;
            if (res.data[0]['stockInDetails']['data'].length > 0) {
              res.data[0]['stockInDetails']['data'].map(function (item) {
                var productComponent = item.productComponent;
                var purchaseList = item['purchaseDetail']['purchaseList'];
                var list = {
                  id: item.id,
                  img_url: productComponent.img_url,
                  purchase_order_no: purchaseList['purchase'].purchase_order_no,
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
                _this.stockDtlData.push(list);
              });
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
          this.newOpt[3].nClick = true;
          this.newOpt[4].nClick = true;
          this.newOpt[5].nClick = false;
          this.$fetch(this.urls.stockins, { 'is_stock_in': true, include: 'warehouse,stockInType,stockInDetails.productComponent.product,stockInDetails.purchaseDetail.purchaseList.purchase,stockInDetails.stockIn' }).then(function (res) {
            _this.loading = false;
            _this.finishData = res.data;
            if (res.data[0]['stockInDetails']['data'].length > 0) {
              res.data[0]['stockInDetails']['data'].map(function (item) {
                var productComponent = item.productComponent;
                var purchaseList = item['purchaseDetail']['purchaseList'];
                var list = {
                  id: item.id,
                  img_url: productComponent.img_url,
                  purchase_order_no: purchaseList['purchase'].purchase_order_no,
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
                _this.stockDtlData.push(list);
              });
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
    stockRowClick: function stockRowClick(row) {
      var _this2 = this;

      this.stockRow = row;
      this.newOpt[1].nClick = row['is_change'] ? true : false;
      this.newOpt[3].nClick = row['is_submit'] ? true : false;
      this.newOpt[4].nClick = row['is_audit'] ? true : false;
      this.newOpt[7].nClick = row['is_print'] ? true : false;
      this.stockDtlData = [];
      if (row['stockInDetails']['data'].length > 0) {
        row['stockInDetails']['data'].map(function (item) {
          var productComponent = item.productComponent;
          var purchaseList = item['purchaseDetail']['purchaseList'];
          var list = {
            id: item.id,
            img_url: productComponent.img_url,
            purchase_order_no: purchaseList['purchase'].purchase_order_no,
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
          _this2.stockDtlData.push(list);
        });
      }
    },

    /*底部tabs*/
    clickBtmTabs: function clickBtmTabs() {},

    /*新增*/
    addNewStock: function addNewStock() {
      this.addStockMask = true;
      this.addStockTabVal = [];
    },
    addStockRCName: function addStockRCName(_ref) {
      var row = _ref.row,
          rowIndex = _ref.rowIndex;
      row.index = rowIndex;
    },
    addStockRClick: function addStockRClick(row) {
      this.addStockRIndex = 'index' + row.index;
      this.addStockRData = row;
    },
    addProDtl: function addProDtl() {
      this.proDtlMask = true;
      this.proDtlVal = [];
    },
    addStockDel: function addStockDel(index) {
      this.addStockTabVal.splice(index, 1);
    },
    addStockConfirm: function addStockConfirm() {
      var _this3 = this;

      var submitData = {
        warehouse_id: this.addStockFormVal.warehouse_id,
        stock_in_types_id: this.addStockFormVal.stock_in_types_id,
        stock_in_details: []
      };
      this.addStockTabVal.map(function (item) {
        var stockInData = {
          purchase_details_id: item.purchase_details_id,
          product_components_id: item.product_components_id,
          stock_in_quantity: item.newData.stock_in_quantity,
          total_fee: item.total_fee,
          remark: item.newData.remark
        };
        submitData.stock_in_details.push(stockInData);
      });
      console.log('submitData', submitData);
      this.$post(this.urls.stockins, submitData).then(function () {
        _this3.addStockMask = false;
        _this3.refresh();
        _this3.$message({
          message: '添加入库成功',
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
          _this3.$message.error({
            message: str
          });
        }
      });
    },
    addStockCancel: function addStockCancel() {
      this.addStockMask = false;
    },
    stockChg: function stockChg(value) {
      if (this.addStockMask) {
        if (value > this.addStockRData.maxStockIn - 0) {
          this.addStockRData.newData.stock_in_quantity = '';
          this.addStockRData.total_fee = '';
          this.$message.error('入库数量超过最大入库数量，无效');
        } else {
          this.addStockRData.newData.stock_in_quantity = value;
          this.addStockRData.total_fee = (this.addStockRData.purchase_cost - 0) * value;
        }
      } else {
        if (value > this.updateStockRData.maxStockIn - 0) {
          this.updateStockRData.newData.stock_in_quantity = '';
          this.updateStockRData.total_fee = '';
          this.$message.error('入库数量超过最大入库数量，无效');
        } else {
          this.updateStockRData.newData.stock_in_quantity = value;
          this.updateStockRData.total_fee = (this.updateStockRData.purchase_cost - 0) * value;
        }
      }
    },

    /*商品明细*/
    proQueryClick: function proQueryClick() {
      var _this4 = this;

      this.proDtlVal = [];
      this.$fetch(this.urls.purchaselists, { 'status': true, 'commodity_code': this.proQuery.commodity_code, 'is_audit': true, 'include': 'purchase.user,purchaseDetails.productComponent.product,purchaseDetails.purchaseList' }).then(function (res) {
        res.data.map(function (item) {
          if (item['purchaseDetails']['data'].length > 0) {
            item['purchaseDetails']['data'].map(function (purDtlItem) {
              var list = {
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
                newData: {
                  stock_in_quantity: '',
                  remark: ''
                },
                total_fee: '',
                maxStockIn: purDtlItem.purchase_quantity - 0 - (purDtlItem.stock_in_count - 0),
                created_at: item['purchase']['user'].created_at,
                purchase_details_id: purDtlItem.id,
                product_components_id: purDtlItem['productComponent'].id
              };
              _this4.proDtlVal.push(list);
            });
          }
        });
      }, function (err) {});
    },
    proExport: function proExport() {},
    proAutoFill: function proAutoFill() {
      this.proDtlVal.map(function (item) {
        item['newData'].stock_in_quantity = item.maxStockIn;
        item.total_fee = (item.maxStockIn - 0) * (item.purchase_cost - 0);
      });
    },
    proDtlCName: function proDtlCName(_ref2) {
      var row = _ref2.row,
          rowIndex = _ref2.rowIndex;
      row.index = rowIndex;
    },
    proDtlRClick: function proDtlRClick(row) {
      this.proDtlRIndex = 'index' + row.index;
      this.proRowDate = row;
    },
    compValChg: function compValChg(value) {
      if (value > this.proRowDate.maxStockIn - 0) {
        this.proRowDate.newData.stock_in_quantity = '';
        this.proRowDate.total_fee = '';
        this.$message.error('入库数量超过最大入库数量，无效');
      } else {
        this.proRowDate.newData.stock_in_quantity = value;
        this.proRowDate.total_fee = (this.proRowDate.purchase_cost - 0) * value;
      }
    },
    confirmAddProDtl: function confirmAddProDtl() {
      var _this5 = this;

      this.proDtlVal.map(function (item) {
        if (item.newData.stock_in_quantity > 0) {
          _this5.addStockTabVal.push(item);
        }
      });
      this.$message({
        message: '添加成功',
        type: 'success'
      });
    },
    cancelAddProDtl: function cancelAddProDtl() {
      this.proDtlMask = false;
    },

    /*修改*/
    updateStock: function updateStock() {
      var _this6 = this;

      if (this.newOpt[1].nClick) {
        return;
      } else {
        this.updateStockMask = true;
        this.updateStockTabVal = [];
        this.$fetch(this.urls.stockins + '/' + this.stockRow.id, { 'include': 'stockInDetails.productComponent.product,stockInDetails.purchaseDetail.purchaseList.purchase.user' }).then(function (res) {
          _this6.updateStockFVal = {
            stock_in_no: res.stock_in_no,
            warehouse_id: res.warehouse_id,
            stock_in_types_id: res.stock_in_types_id
          };
          if (res['stockInDetails']['data'].length > 0) {
            res['stockInDetails']['data'].map(function (item) {
              var proComp = item['productComponent'];
              var purDtl = item['purchaseDetail'];
              var list = {
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
                newData: {
                  stock_in_quantity: item.stock_in_quantity,
                  remark: ''
                },
                total_fee: item.total_fee,
                maxStockIn: purDtl.purchase_quantity - 0 - (purDtl.stock_in_count - 0),
                created_at: purDtl['purchaseList']['purchase']['user'].created_at,
                purchase_details_id: item.purchase_details_id,
                product_components_id: item.product_components_id
              };
              _this6.updateStockTabVal.push(list);
            });
          }
        }, function (err) {
          console.log(err);
        });
      }
    },
    updateStockRCName: function updateStockRCName(_ref3) {
      var row = _ref3.row,
          rowIndex = _ref3.rowIndex;
      row.index = rowIndex;
    },
    updateStockCClick: function updateStockCClick(row) {
      this.updateStockRIndex = 'index' + row.index;
      this.updateStockRData = row;
    },
    updateStockConfirm: function updateStockConfirm() {
      var _this7 = this;

      var submit = {
        warehouse_id: this.updateStockFVal.warehouse_id,
        stock_in_types_id: this.updateStockFVal.stock_in_types_id,
        stock_in_details: []
      };
      this.updateStockTabVal.map(function (item) {
        var list = {
          id: item.id,
          purchase_details_id: item.purchase_details_id,
          product_components_id: item.product_components_id,
          stock_in_quantity: item['newData'].stock_in_quantity,
          total_fee: item.total_fee,
          remark: item['newData'].remark
        };
        submit.stock_in_details.push(list);
      });
      this.$patch(this.urls.stockins + '/' + this.stockRow.id, submit).then(function () {
        _this7.updateStockMask = false;
        _this7.refresh();
        _this7.$message({
          message: '修改成功',
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
          _this7.$message.error(str);
        }
      });
    },
    updateStockDel: function updateStockDel(row, index) {
      var _this8 = this;

      this.$del(this.urls.stockindetails + '/' + row.id).then(function () {
        _this8.updateStockTabVal.splice(index, 1);
        _this8.$message({
          message: '删除入库单明细成功',
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
          _this8.$message.error(str);
        }
      });
    },
    updateStockCancel: function updateStockCancel() {
      this.updateStockMask = false;
    },

    /*删除单条*/
    delSingle: function delSingle(row, e) {
      this.showDel = true;
      $('.el-popper').css({ left: e.x - 100 + 'px', top: e.y - 125 + 'px' });
      this.delId = row.id;
      this.delUrl = row['stockInDetails'] ? this.urls.stockins : this.urls.stockindetails;
    },
    cancelD: function cancelD() {
      this.showDel = false;
      this.$message({
        message: '取消删除',
        type: 'info'
      });
    },
    confirmD: function confirmD(url, id) {
      var _this9 = this;

      this.$del(url + '/' + id).then(function () {
        _this9.showDel = false;
        _this9.refresh();
        _this9.$message({
          message: '删除成功',
          type: 'success'
        });
      }, function (err) {
        if (err.response) {
          _this9.showDel = false;
          var arr = err.response.data.errors;
          var arr1 = [];
          for (var i in arr) {
            arr1.push(arr[i]);
          }
          var str = arr1.join(',');
          _this9.$message.error(str);
        }
      });
    },

    /*批量删除*/
    handleSelectionChange: function handleSelectionChange(val) {
      /*拿到id集合*/
      var delArr = [];
      val.forEach(function (selectedItem) {
        delArr.push(selectedItem.id);
      });
      this.ids = delArr.join(',');
      /*拿到当前id*/
      this.checkboxId = val.length > 0 ? val[val.length - 1].id : '';
    },
    delBatch: function delBatch() {
      var _this10 = this;

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
          _this10.$del(_this10.urls.stockins, { ids: _this10.ids }).then(function () {
            _this10.$message({
              message: '删除成功',
              type: 'success'
            });
            _this10.refresh();
          }, function (err) {
            if (err.response) {
              var arr = err.response.data.errors;
              var arr1 = [];
              for (var i in arr) {
                arr1.push(arr[i]);
              }
              var str = arr1.join(',');
              _this10.$message.error(str);
            }
          });
        }).catch(function () {
          _this10.$message({
            type: 'info',
            message: '已取消删除'
          });
        });
      }
    },

    /*分页*/
    handlePagChg: function handlePagChg(page) {
      var _this11 = this;

      var index = this.topActiveName - 0;
      switch (index) {
        case 0:
          this.newOpt[3].nClick = false;
          this.newOpt[4].nClick = true;
          this.newOpt[5].nClick = true;
          this.$fetch(this.urls.stockins + '?page=' + page, { 'is_submit': false, 'include': 'warehouse,stockInType,stockInDetails.productComponent.product,stockInDetails.purchaseDetail.purchaseList.purchase,stockInDetails.stockIn' }).then(function (res) {
            _this11.stockDtlData = [];
            _this11.loading = false;
            _this11.newData = res.data;
            if (res.data[0]['stockInDetails']['data'].length > 0) {
              res.data[0]['stockInDetails']['data'].map(function (item) {
                var productComponent = item.productComponent;
                var purchaseList = item['purchaseDetail']['purchaseList'];
                var list = {
                  id: item.id,
                  img_url: productComponent.img_url,
                  purchase_order_no: purchaseList['purchase'].purchase_order_no,
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
                _this11.stockDtlData.push(list);
              });
            }
          }, function (err) {});
          break;
        case 1:
          this.newOpt[3].nClick = true;
          this.newOpt[4].nClick = false;
          this.newOpt[5].nClick = false;
          this.$fetch(this.urls.stockins + '?page=' + page, { is_submit: true, include: 'warehouse,stockInType,stockInDetails.productComponent.product,stockInDetails.purchaseDetail.purchaseList.purchase,stockInDetails.stockIn' }).then(function (res) {
            _this11.loading = false;
            _this11.partData = res.data;
            if (res.data[0]['stockInDetails']['data'].length > 0) {
              res.data[0]['stockInDetails']['data'].map(function (item) {
                var productComponent = item.productComponent;
                var purchaseList = item['purchaseDetail']['purchaseList'];
                var list = {
                  id: item.id,
                  img_url: productComponent.img_url,
                  purchase_order_no: purchaseList['purchase'].purchase_order_no,
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
                _this11.stockDtlData.push(list);
              });
            }
          }, function (err) {});
          break;
        case 2:
          this.newOpt[3].nClick = true;
          this.newOpt[4].nClick = true;
          this.newOpt[5].nClick = false;
          this.$fetch(this.urls.stockins + '?page=' + page, { 'is_stock_in': true, include: 'warehouse,stockInType,stockInDetails.productComponent.product,stockInDetails.purchaseDetail.purchaseList.purchase,stockInDetails.stockIn' }).then(function (res) {
            _this11.loading = false;
            _this11.finishData = res.data;
            if (res.data[0]['stockInDetails']['data'].length > 0) {
              res.data[0]['stockInDetails']['data'].map(function (item) {
                var productComponent = item.productComponent;
                var purchaseList = item['purchaseDetail']['purchaseList'];
                var list = {
                  id: item.id,
                  img_url: productComponent.img_url,
                  purchase_order_no: purchaseList['purchase'].purchase_order_no,
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
                _this11.stockDtlData.push(list);
              });
            }
          }, function (err) {});
          break;
      }
    },

    /*刷新*/
    refresh: function refresh() {
      this.loading = true;
      this.fetchStockData();
    },

    /*提交*/
    doCommit: function doCommit() {
      var _this12 = this;

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
            _this12.$message({
              message: '提交成功!',
              type: 'success'
            });
            _this12.refresh();
          }, function (err) {
            _this12.$message.error(err.response.data.message);
          });
        }
      }
    },

    /*打印*/
    doPrinter: function doPrinter() {
      var _this13 = this;

      if (!this.newOpt[7].nClick) {
        this.$put(this.urls.stockins + '/' + this.stockRow.id + '/print').then(function () {
          _this13.printBtn();
          _this13.$message({
            message: '打印成功!',
            type: 'success'
          });
          _this13.refresh();
        }, function (err) {
          _this13.$message.error(err.response.data.message);
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
      var _this14 = this;

      if (!this.newOpt[4].nClick) {
        this.$put(this.urls.stockins + '/' + this.stockRow.id + '/audit').then(function () {
          _this14.$message({
            message: '审核成功!',
            type: 'success'
          });
          _this14.refresh();
        }, function (err) {
          _this14.$message.error(err.response.data.message);
        });
      }
    }
  },
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
                      value: _vm.loading,
                      expression: "loading"
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
                                            "\n                                  " +
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
            { attrs: { label: "已提交", name: "1" } },
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
                                            "\n                                  " +
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
            { attrs: { label: "已入库", name: "2" } },
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
                                            "\n                                  " +
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
      ),
      _vm._v(" "),
      _c("Pagination", {
        attrs: { "page-url": this.urls.stockins },
        on: { handlePagChg: _vm.handlePagChg }
      }),
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
          _c(
            "el-tab-pane",
            { attrs: { label: "入库单明细", name: "0" } },
            [
              _c(
                "el-table",
                { attrs: { data: _vm.stockDtlData, fit: "" } },
                [
                  _vm._l(_vm.btmTableHead[this.btmActiveName], function(item) {
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
                                ? _c(
                                    "span",
                                    _vm._l(_vm.resData[item.stateVal], function(
                                      list
                                    ) {
                                      return _c("span", { key: list.id }, [
                                        list.id == scope.row[item.prop]
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
                                      ])
                                    })
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
                                              "\n                                  " +
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
          _c("el-tab-pane", { attrs: { label: "入库图片", name: "1" } }, [
            _vm._v("\n             入库图片\n         ")
          ])
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "el-dialog",
        {
          class: { "more-forms": _vm.moreForms, threeParts: _vm.threeParts },
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
              _vm._l(_vm.addStockTabHead, function(item) {
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
                                _vm.addStockRIndex == "index" + scope.$index
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
                                                on: { input: _vm.stockChg },
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
                                        : _c(
                                            "span",
                                            [
                                              _c("el-input", {
                                                attrs: { type: "textarea" },
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
                                    ])
                                  : _c("span", [
                                      _vm._v(
                                        "\n                             " +
                                          _vm._s(
                                            scope.row[item.prop][item.inProp]
                                          ) +
                                          "\n                         "
                                      )
                                    ])
                              ])
                            : item.prop
                              ? _c("span", [
                                  item.type == "select"
                                    ? _c("span", [
                                        item.inProp
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
                                          : _c(
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
                                      ])
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
                                _vm.addStockDel(scope.$index)
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
                      on: { click: _vm.addStockConfirm }
                    },
                    [_vm._v("确定")]
                  ),
                  _vm._v(" "),
                  _c("el-button", { on: { click: _vm.addStockCancel } }, [
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
                height: "350",
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
                        item.prop == "newData"
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
                                        on: { input: _vm.compValChg },
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
                                      "\n                             " +
                                        _vm._s(
                                          scope.row[item.prop][item.inProp]
                                        ) +
                                        "\n                         "
                                    )
                                  ])
                            ])
                          : item.prop
                            ? _c("span", [
                                item.type == "select"
                                  ? _c(
                                      "span",
                                      _vm._l(
                                        _vm.resData[item.stateVal],
                                        function(list) {
                                          return _c("span", { key: list.id }, [
                                            list.id == scope.row[item.prop]
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
                                          ])
                                        }
                                      )
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
      ),
      _vm._v(" "),
      _c(
        "el-dialog",
        {
          class: { "more-forms": _vm.moreForms, threeParts: _vm.threeParts },
          attrs: { title: "修改入库单", visible: _vm.updateStockMask },
          on: {
            "update:visible": function($event) {
              _vm.updateStockMask = $event
            }
          }
        },
        [
          _c("el-button", { attrs: { type: "text" } }, [_vm._v("基本信息")]),
          _vm._v(" "),
          _c("add-new", {
            attrs: {
              "rule-form": _vm.updateStockFVal,
              rules: _vm.addStockFormRules,
              "add-arr": _vm.addStockFormHead,
              onlyInputs: true,
              editSign: true
            }
          }),
          _vm._v(" "),
          _c("el-button", { attrs: { type: "text" } }, [_vm._v("入库明细")]),
          _vm._v(" "),
          _c(
            "el-table",
            {
              attrs: {
                data: _vm.updateStockTabVal,
                fit: "",
                height: "300",
                "row-class-name": _vm.updateStockRCName
              },
              on: { "cell-click": _vm.updateStockCClick }
            },
            [
              _vm._l(_vm.addStockTabHead, function(item) {
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
                                _vm.updateStockRIndex == "index" + scope.$index
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
                                                on: { input: _vm.stockChg },
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
                                        : _c(
                                            "span",
                                            [
                                              _c("el-input", {
                                                attrs: { type: "textarea" },
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
                                    ])
                                  : _c("span", [
                                      _vm._v(
                                        "\n                             " +
                                          _vm._s(
                                            scope.row[item.prop][item.inProp]
                                          ) +
                                          "\n                         "
                                      )
                                    ])
                              ])
                            : item.prop
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
                                                list.id == scope.row[item.prop]
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
                                _vm.updateStockDel(scope.row, scope.$index)
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
                  on: { click: _vm.updateStockConfirm }
                },
                [_vm._v("确定")]
              ),
              _vm._v(" "),
              _c("el-button", { on: { click: _vm.updateStockCancel } }, [
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-1918eaed", module.exports)
  }
}

/***/ })

});
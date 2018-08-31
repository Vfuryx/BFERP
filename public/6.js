webpackJsonp([6],{

/***/ 454:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(523)
/* template */
var __vue_template__ = __webpack_require__(524)
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
Component.options.__file = "resources\\assets\\js\\views\\purchase\\purchaseReturns.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-543edb94", Component.options)
  } else {
    hotAPI.reload("data-v-543edb94", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 523:
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

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      newOpt: [{
        cnt: '新增',
        icon: 'bf-add',
        ent: this.addPurReturn
      }, {
        cnt: '修改',
        icon: 'bf-change',
        ent: this.updatePurReturn
      }, {
        cnt: '删除',
        icon: 'bf-del',
        ent: this.test
      }, {
        cnt: '提交',
        icon: 'bf-submit',
        ent: this.test
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
        icon: 'bf-audit',
        ent: this.test
      }, {
        cnt: '导出',
        icon: 'bf-out',
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
      searchBox: {
        returnOrder: '',
        supplier: ''
      },
      /*获取数据*/
      topActiveName: '0',
      checkboxInit: false,
      loading: true,
      noSubmitData: [],
      noAuditData: [],
      alreadyAuditData: [],
      purReturnHead: [{
        label: '退货单号',
        width: '200',
        prop: 'purchase_return_no',
        type: 'text'
      }, {
        label: '备注',
        width: '160',
        prop: 'remark',
        type: 'text'
      }, {
        label: '创建人',
        width: '130',
        prop: 'creator',
        type: 'text'
      }, {
        label: '创建时间',
        width: '220',
        prop: 'created_at',
        type: 'text'
      }, {
        label: '提交人',
        width: '130',
        prop: 'submitter',
        type: 'text'
      }, {
        label: '提交时间',
        width: '220',
        prop: 'submit_at',
        type: 'text'
      }, {
        label: '审核人',
        width: '130',
        prop: 'auditor',
        type: 'text'
      }, {
        label: '审核时间',
        width: '220',
        prop: 'audit_at',
        type: 'text'
      }],
      btmActiveName: '0',
      purReturnDtl: [],
      btmTableHead: [[{
        label: '子件图片',
        width: '120',
        prop: 'img_url',
        type: 'img'
      }, {
        label: '商品编码',
        width: '160',
        prop: 'commodity_code',
        type: 'text'
      }, {
        label: '子件编码',
        width: '130',
        prop: 'component_code',
        type: 'text'
      }, {
        label: '商品简称',
        width: '130',
        prop: 'short_name',
        type: 'text'
      }, {
        label: '子件名称',
        width: '130',
        prop: 'spec',
        type: 'text'
      }, {
        label: '差价',
        width: '100',
        prop: 'price_differences',
        type: 'number'
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
        type: 'number'
      }, {
        label: '退回供应商',
        width: '150',
        prop: 'supplierName',
        type: 'text'
      }, {
        label: '退货仓库',
        width: '150',
        prop: 'warehouseName',
        type: 'text'
      }, {
        label: '退货类型',
        width: '160',
        prop: 'purchaseReturnTypeName',
        type: 'text'
      }], []],
      curRowId: {},
      /*新增*/
      addPurReturnMask: false,
      moreForms: true,
      addPurReturnFormVal: {
        purchase_return_no: '',
        remark: '',
        status: true
      },
      addPurReturnFormHead: [{
        label: '退货单号',
        prop: 'purchase_return_no',
        holder: '系统自动生成',
        width: '200',
        type: 'text',
        editChgAble: true,
        addChgAble: true
      }, {
        label: '退货备注',
        width: '150',
        prop: 'remark',
        type: 'textarea'
      }, {
        label: '状态',
        prop: 'status',
        type: 'checkbox'
      }],
      addPurReturnTabVal: [],
      addPurReturnTabHead: [{
        label: '子件图片',
        width: '120',
        prop: 'productComponent',
        inProp: 'img_url',
        type: 'img'
      }, {
        label: '商品编码',
        width: '120',
        prop: 'product',
        inProp: 'commodity_code',
        type: 'text'
      }, {
        label: '子件编码',
        width: '150',
        prop: 'productComponent',
        inProp: 'component_code',
        type: 'text'
      }, {
        label: '商品简称',
        width: '130',
        prop: 'product',
        inProp: 'short_name',
        type: 'text'
      }, {
        label: '子件名称',
        width: '150',
        prop: 'productComponent',
        inProp: 'spec',
        type: 'text'
      }, {
        label: '仓库',
        width: '90',
        prop: 'warehouse',
        inProp: 'name',
        type: 'text'
      }, {
        label: '库存数',
        width: '90',
        prop: 'quantity',
        type: 'number'
      }, {
        label: '退货数',
        width: '120',
        prop: 'newData',
        inProp: 'purchase_return_quantity',
        type: 'number'
      }, {
        label: '供应商',
        width: '120',
        prop: 'newData',
        inProp: 'suppliers_id',
        type: 'select',
        stateVal: 'suppliers'
      }, {
        label: '差价',
        width: '120',
        prop: 'newData',
        inProp: 'price_differences',
        type: 'number'
      }, {
        label: '退货类型',
        width: '150',
        prop: 'newData',
        inProp: 'purchase_return_types_id',
        type: 'select',
        stateVal: 'purchasereturntypes'
      }],
      addPurReturnRIndex: '',
      proDtlMask: false,
      threeParts: true,
      proQuery: {
        commodity_code: '',
        component_code: '',
        warehouse_id: ''
      },
      proDtlVal: [],
      proDtlRIndex: '',
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
      ids: []
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
    handleQuery: function handleQuery() {
      this.$fetch().then(function (res) {}, function (err) {});
    },

    /*获取数据*/
    clickTopTabs: function clickTopTabs() {
      this.loading = true;
      this.purReturnDtl = [];
      this.fetchData();
    },
    clickBtmTabs: function clickBtmTabs() {},

    // purReturnRCName({row,rowIndex}){row.index = rowIndex;},
    purReturnRowClick: function purReturnRowClick(row) {
      var _this = this;

      this.purReturnDtl = [];
      if (row['purchaseReturnDetails']['data'].length > 0) {
        row['purchaseReturnDetails']['data'].map(function (item) {
          var productComponent = item['stock']['productComponent'];
          var product = item['stock']['product'];
          var list = {
            id: item.id,
            img_url: productComponent.img_url,
            commodity_code: product.commodity_code,
            component_code: productComponent.component_code,
            short_name: product.short_name,
            spec: productComponent.spec,
            price_differences: item.price_differences,
            purchase_return_quantity: item.purchase_return_quantity,
            supplierName: item['supplier'].name,
            warehouseName: item['stock']['warehouse'].name,
            purchaseReturnTypeName: item['purchaseReturnType']['name']
          };
          _this.purReturnDtl.push(list);
        });
      }
      this.curRowId = row.id;
    },
    fetchData: function fetchData() {
      var _this2 = this;

      var index = this.topActiveName - 0;
      switch (index) {
        case 0:
          this.newOpt[1].nClick = false;
          this.newOpt[2].nClick = false;
          this.newOpt[3].nClick = false;
          this.newOpt[4].nClick = true;
          this.newOpt[5].nClick = true;
          this.newOpt[6].nClick = true;
          this.$fetch(this.urls.purchasereturns, { 'is_submit': false, 'include': 'purchaseReturnDetails.stock.productComponent,purchaseReturnDetails.stock.product,purchaseReturnDetails.stock.warehouse,purchaseReturnDetails.supplier,purchaseReturnDetails.purchaseReturnType' }).then(function (res) {
            _this2.noSubmitData = res.data;
            _this2.loading = false;
            _this2.purReturnDtl = [];
            var pg = res.meta.pagination;
            _this2.$store.dispatch('currentPage', pg.current_page);
            _this2.$store.commit('PER_PAGE', pg.per_page);
            _this2.$store.commit('PAGE_TOTAL', pg.total);
            _this2.$store.dispatch('suppliers', _this2.urls.suppliers);
            _this2.$store.dispatch('purchasereturntypes', _this2.urls.purchasereturntypes);
            if (res.data[0]['purchaseReturnDetails']['data'].length > 0) {
              res.data[0]['purchaseReturnDetails']['data'].map(function (item) {
                var productComponent = item['stock']['productComponent'];
                var product = item['stock']['product'];
                var list = {
                  id: item.id,
                  img_url: productComponent.img_url,
                  commodity_code: product.commodity_code,
                  component_code: productComponent.component_code,
                  short_name: product.short_name,
                  spec: productComponent.spec,
                  price_differences: item.price_differences,
                  purchase_return_quantity: item.purchase_return_quantity,
                  supplierName: item['supplier'].name,
                  warehouseName: item['stock']['warehouse'].name,
                  purchaseReturnTypeName: item['purchaseReturnType']['name']
                };
                _this2.purReturnDtl.push(list);
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
              _this2.$message.error({
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
          this.$fetch(this.urls.purchasereturns, { 'is_audit': false, include: 'purchaseReturnDetails.stock.productComponent,purchaseReturnDetails.stock.product,purchaseReturnDetails.stock.warehouse,purchaseReturnDetails.supplier,purchaseReturnDetails.purchaseReturnType' }).then(function (res) {
            _this2.noAuditData = res.data;
            _this2.loading = false;
            _this2.purReturnDtl = [];
            var pg = res.meta.pagination;
            _this2.$store.dispatch('currentPage', pg.current_page);
            _this2.$store.commit('PER_PAGE', pg.per_page);
            _this2.$store.commit('PAGE_TOTAL', pg.total);
            if (res.data[0]['purchaseReturnDetails']['data'].length > 0) {
              res.data[0]['purchaseReturnDetails']['data'].map(function (item) {
                var productComponent = item['stock']['productComponent'];
                var product = item['stock']['product'];
                var list = {
                  id: item.id,
                  img_url: productComponent.img_url,
                  commodity_code: product.commodity_code,
                  component_code: productComponent.component_code,
                  short_name: product.short_name,
                  spec: productComponent.spec,
                  price_differences: item.price_differences,
                  purchase_return_quantity: item.purchase_return_quantity,
                  supplierName: item['supplier'].name,
                  warehouseName: item['stock']['warehouse'].name,
                  purchaseReturnTypeName: item['purchaseReturnType']['name']
                };
                _this2.purReturnDtl.push(list);
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
              _this2.$message.error({
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
          this.$fetch(this.urls.purchasereturns, { 'is_audit': true, include: 'purchaseReturnDetails.stock.productComponent,purchaseReturnDetails.stock.product,purchaseReturnDetails.stock.warehouse,purchaseReturnDetails.stock.warehouse,purchaseReturnDetails.supplier,purchaseReturnDetails.purchaseReturnType' }).then(function (res) {
            _this2.alreadyAuditData = res.data;
            _this2.loading = false;
            _this2.purReturnDtl = [];
            var pg = res.meta.pagination;
            _this2.$store.dispatch('currentPage', pg.current_page);
            _this2.$store.commit('PER_PAGE', pg.per_page);
            _this2.$store.commit('PAGE_TOTAL', pg.total);
            if (res.data[0]['purchaseReturnDetails']['data'].length > 0) {
              res.data[0]['purchaseReturnDetails']['data'].map(function (item) {
                var productComponent = item['stock']['productComponent'];
                var product = item['stock']['product'];
                var list = {
                  id: item.id,
                  img_url: productComponent.img_url,
                  commodity_code: product.commodity_code,
                  component_code: productComponent.component_code,
                  short_name: product.short_name,
                  spec: productComponent.spec,
                  price_differences: item.price_differences,
                  purchase_return_quantity: item.purchase_return_quantity,
                  supplierName: item['supplier'].name,
                  warehouseName: item['stock']['warehouse'].name,
                  purchaseReturnTypeName: item['purchaseReturnType']['name']
                };
                _this2.purReturnDtl.push(list);
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
              _this2.$message.error({
                message: str
              });
            }
          });
          break;
      }
    },

    /*新增*/
    addPurReturn: function addPurReturn() {
      this.addPurReturnMask = true;
      this.addPurReturnTabVal = [];
      this.addPurReturnRIndex = '';
    },
    addPurReturnRCName: function addPurReturnRCName(_ref) {
      var row = _ref.row,
          rowIndex = _ref.rowIndex;
      row.index = rowIndex;
    },
    addPurReturnRClick: function addPurReturnRClick(row) {
      this.addPurReturnRIndex = 'index' + row.index;
    },
    addPurReturnDel: function addPurReturnDel(index) {
      this.addPurReturnTabVal.splice(index, 1);
    },
    addPurReturnDtl: function addPurReturnDtl() {
      this.proDtlMask = true;
      this.addProData = [];
      this.proDtlVal = [];
    },
    addPurReturnConfirm: function addPurReturnConfirm() {
      var _this3 = this;

      var submitData = {
        remark: this.addPurReturnFormVal.remark,
        status: this.addPurReturnFormVal.status,
        purchase_return_details: []
      };
      this.addPurReturnTabVal.map(function (item) {
        var purDtl = {
          stocks_id: item.id,
          purchase_return_quantity: item['newData'].purchase_return_quantity,
          suppliers_id: item['newData'].suppliers_id,
          price_differences: item['newData'].price_differences,
          purchase_return_types_id: item['newData'].purchase_return_types_id
        };
        submitData.purchase_return_details.push(purDtl);
      });
      this.$post(this.urls.purchasereturns, submitData).then(function () {
        _this3.addPurReturnMask = false;
        _this3.refresh();
        _this3.$message({
          message: '新增采购退货单成功',
          type: 'success'
        });
      }, function (err) {
        if (err.response) {
          _this3.showDel = false;
          var arr = err.response.data.errors;
          var arr1 = [];
          for (var i in arr) {
            arr1.push(arr[i]);
          }
          var str = arr1.join(',');
          _this3.$message.error(str);
        }
      });
    },
    addPurReturnCancel: function addPurReturnCancel() {
      this.addPurReturnMask = false;
    },
    proDtlCName: function proDtlCName(_ref2) {
      var row = _ref2.row,
          rowIndex = _ref2.rowIndex;
      row.index = rowIndex;
    },
    proDtlRClick: function proDtlRClick(row) {
      this.proDtlRIndex = 'index' + row.index;
      this.proRData = row;
    },
    proInputChg: function proInputChg(value) {
      if (value > this.proRData.quantity - 0) {
        this.$message({
          message: '退货数大于库存数',
          type: 'info'
        });
        this.proRData.newData.purchase_return_quantity = value;
      } else {
        this.proRData.newData.purchase_return_quantity = value;
      }
    },
    inputChg: function inputChg(value) {
      if (this.addPurReturnMask) {
        if (value > this.addPurReturnTabVal.quantity - 0) {
          this.$message({
            message: '退货数大于库存数',
            type: 'info'
          });
          this.addPurReturnTabVal.newData.purchase_return_quantity = value;
        } else {
          this.addPurReturnTabVal.newData.purchase_return_quantity = value;
        }
      }
    },
    proQueryClick: function proQueryClick() {
      var _this4 = this;

      this.$fetch(this.urls.stocks, { 'status': true, 'include': 'warehouse,product,productComponent' }).then(function (res) {
        res.data.map(function (item) {
          _this4.$set(item, 'newData', {
            purchase_return_quantity: '',
            suppliers_id: '',
            price_differences: '',
            purchase_return_types_id: ''
          });
        });
        _this4.proDtlVal = res.data;
      }, function (err) {
        console.log(err);
      });
    },
    confirmAddProDtl: function confirmAddProDtl() {
      var _this5 = this;

      if (this.addPurReturnMask) {
        this.proDtlVal.map(function (item) {
          if (item.newData.purchase_return_quantity > 0) {
            if (item.newData['suppliers_id'] !== undefined && item['newData'].price_differences !== undefined && item['newData'].purchase_return_types_id !== undefined) {
              _this5.addPurReturnTabVal.push(item);
              _this5.$message({
                message: '添加商品明细成功',
                type: 'success'
              });
              _this5.proDtlMask = false;
            } else {
              _this5.$message.error('数据不完整');
            }
          }
        });
      } else {
        this.proDtlVal.map(function (item) {
          if (item.newData.purchase_return_quantity > 0) {
            if (item.newData['suppliers_id'] !== undefined && item['newData'].price_differences !== undefined && item['newData'].purchase_return_types_id !== undefined) {
              if (_this5.alreadyIds.indexOf(item.id) == -1) {
                _this5.updatePurReturnTabVal.push(item);
                _this5.alreadyIds.push(item.id);
                _this5.proDtlMask = false;
                _this5.$message({
                  message: '添加商品明细成功',
                  type: 'success'
                });
              } else {
                _this5.updatePurReturnTabVal.map(function (list) {
                  if (list.stocks_id == item.id) {
                    list.newData = item.newData;
                  }
                });
                _this5.proDtlMask = false;
                _this5.$message({
                  message: '添加商品明细成功',
                  type: 'success'
                });
              }
            } else {
              _this5.$message.error('数据不完整');
            }
          }
        });
      }
    },
    cancelAddProDtl: function cancelAddProDtl() {
      this.proDtlMask = false;
    },

    /*修改*/
    updatePurReturn: function updatePurReturn() {
      var _this6 = this;

      this.alreadyIds = [];
      if (this.newOpt[1].nClick) {
        return;
      } else {
        this.cancelOrder = '';
        this.updatePurOrder = '';
        this.updatePurReturnMask = true;
        this.updatePurReturnTabVal = [];
        var id = this.checkboxId ? this.checkboxId : this.curRowId;
        this.$fetch(this.urls.purchasereturns + '/' + id, { 'include': 'purchaseReturnDetails.stock.productComponent,purchaseReturnDetails.stock.product,purchaseReturnDetails.stock.warehouse,purchaseReturnDetails.supplier,purchaseReturnDetails.purchaseReturnType' }).then(function (res) {
          _this6.updatePurReturnFormVal = {
            purchase_return_no: res.purchase_return_no,
            remark: res.remark,
            status: res.status
          };
          if (res['purchaseReturnDetails']['data'].length > 0) {
            res['purchaseReturnDetails']['data'].map(function (item) {
              _this6.alreadyIds.push(item.stocks_id);
              var product = item['stock']['product'];
              var productComponent = item['stock']['productComponent'];
              var warehouse = item['stock']['warehouse'];
              var resData = {
                id: item.id,
                stocks_id: item.stocks_id,
                productComponent: {
                  img_url: productComponent.img_url,
                  component_code: productComponent.component_code,
                  spec: productComponent.spec
                },
                product: {
                  commodity_code: product.commodity_code,
                  short_name: product.short_name
                },
                warehouse: {
                  name: warehouse.name
                },
                quantity: item['stock']['quantity'],
                newData: {
                  purchase_return_quantity: item.purchase_return_quantity,
                  suppliers_id: item.suppliers_id,
                  price_differences: item.price_differences,
                  purchase_return_types_id: item.purchase_return_types_id
                }
              };
              _this6.updatePurReturnTabVal.push(resData);
            });
          }
        }, function (err) {
          console.log(err);
        });
      }
    },
    updatePurReturnRCName: function updatePurReturnRCName(_ref3) {
      var row = _ref3.row,
          rowIndex = _ref3.rowIndex;
      row.index = rowIndex;
    },
    updatePurReturnRClick: function updatePurReturnRClick(row) {
      this.updatePurReturnRIndex = 'index' + row.index;
    },
    updatePurReturnDel: function updatePurReturnDel(row, index) {
      var _this7 = this;

      if (row.stocks_id) {
        this.$del(this.urls.purchasereturndetails + '/' + row.id).then(function () {
          _this7.updatePurReturnTabVal.splice(index, 1);
          _this7.$message({
            message: '删除成功',
            type: 'success'
          });
        }, function (err) {
          if (err.response) {
            _this7.showDel = false;
            var arr = err.response.data.errors;
            var arr1 = [];
            for (var i in arr) {
              arr1.push(arr[i]);
            }
            var str = arr1.join(',');
            _this7.$message.error(str);
          }
        });
      } else {
        this.updatePurReturnTabVal.splice(index, 1);
        this.$message({
          message: '删除成功',
          type: 'success'
        });
      }
    },
    updatePurReturnConfirm: function updatePurReturnConfirm() {
      var _this8 = this;

      var updateData = {
        remark: this.updatePurReturnFormVal.remark,
        status: this.updatePurReturnFormVal.status,
        purchase_return_details: []
      };
      this.updatePurReturnTabVal.map(function (item) {
        if (item.stocks_id) {
          var purReDtl = {
            id: item.id,
            stocks_id: item.stocks_id,
            purchase_return_quantity: item['newData'].purchase_return_quantity,
            suppliers_id: item['newData'].suppliers_id,
            price_differences: item['newData'].price_differences,
            purchase_return_types_id: item['newData'].purchase_return_types_id
          };
          updateData['purchase_return_details'].push(purReDtl);
        } else {
          var _purReDtl = {
            stocks_id: item.id,
            purchase_return_quantity: item['newData'].purchase_return_quantity,
            suppliers_id: item['newData'].suppliers_id,
            price_differences: item['newData'].price_differences,
            purchase_return_types_id: item['newData'].purchase_return_types_id
          };
          updateData['purchase_return_details'].push(_purReDtl);
        }
      });
      var id = this.checkboxId ? this.checkboxId : this.curRowId;
      this.$patch(this.urls.purchasereturns + '/' + id, updateData).then(function () {
        _this8.updatePurReturnMask = false;
        _this8.refresh();
        _this8.$message({
          message: '退货单修改成功',
          type: 'success'
        });
      }, function (err) {
        if (err.response) {
          _this8.showDel = false;
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
    updatePurReturnCancel: function updatePurReturnCancel() {
      this.updatePurReturnMask = false;
      this.$message({
        message: '取消修改退货单',
        type: 'info'
      });
    },

    /*删除单条*/
    delSingle: function delSingle(row, e) {
      this.showDel = true;
      $('.el-popper').css({ left: e.x - 100 + 'px', top: e.y - 125 + 'px' });
      this.delId = row.id;
      this.delUrl = row['purchaseReturnDetails'] ? this.urls.purchasereturns : this.urls.purchasereturndetails;
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
        _this9.$message({
          message: '删除成功',
          type: 'success'
        });
        _this9.showDel = false;
        _this9.refresh();
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

    /*删除批量*/
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
          _this10.$del(_this10.urls.purchasereturns, { ids: _this10.ids }).then(function () {
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
          this.newOpt[1].nClick = false;
          this.newOpt[2].nClick = false;
          this.newOpt[3].nClick = false;
          this.newOpt[4].nClick = true;
          this.newOpt[5].nClick = true;
          this.newOpt[6].nClick = true;
          this.$fetch(this.urls.purchasereturns + '?page=' + page, { 'is_submit': false, 'include': 'purchaseReturnDetails.stock.productComponent,purchaseReturnDetails.stock.product,purchaseReturnDetails.supplier,purchaseReturnDetails.purchaseReturnType' }).then(function (res) {
            _this11.noSubmitData = res.data;
            _this11.loading = false;
            _this11.purReturnDtl = [];
            var pg = res.meta.pagination;
            _this11.$store.dispatch('currentPage', pg.current_page);
            _this11.$store.commit('PER_PAGE', pg.per_page);
            _this11.$store.commit('PAGE_TOTAL', pg.total);
            if (res.data[0]['purchaseReturnDetails']['data'].length > 0) {
              res.data[0]['purchaseReturnDetails']['data'].map(function (item) {
                var productComponent = item['stock']['productComponent'];
                var product = item['stock']['product'];
                var list = {
                  id: item.id,
                  img_url: productComponent.img_url,
                  commodity_code: product.commodity_code,
                  component_code: productComponent.component_code,
                  short_name: product.short_name,
                  spec: productComponent.spec,
                  price_differences: item.price_differences,
                  purchase_return_quantity: item.purchase_return_quantity,
                  supplierName: item['supplier'].name,
                  warehouseName: item['stock']['warehouse'].name,
                  purchaseReturnTypeName: item['purchaseReturnType']['name']
                };
                _this11.purReturnDtl.push(list);
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
              _this11.$message.error({
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
          this.$fetch(this.urls.purchasereturns + '?page=' + page, { 'is_audit': false, include: 'purchaseReturnDetails.stock.productComponent,purchaseReturnDetails.stock.product,purchaseReturnDetails.supplier,purchaseReturnDetails.purchaseReturnType' }).then(function (res) {
            _this11.noAuditData = res.data;
            _this11.loading = false;
            _this11.purReturnDtl = [];
            var pg = res.meta.pagination;
            _this11.$store.dispatch('currentPage', pg.current_page);
            _this11.$store.commit('PER_PAGE', pg.per_page);
            _this11.$store.commit('PAGE_TOTAL', pg.total);
            if (res.data[0]['purchaseReturnDetails']['data'].length > 0) {
              res.data[0]['purchaseReturnDetails']['data'].map(function (item) {
                var productComponent = item['stock']['productComponent'];
                var product = item['stock']['product'];
                var list = {
                  id: item.id,
                  img_url: productComponent.img_url,
                  commodity_code: product.commodity_code,
                  component_code: productComponent.component_code,
                  short_name: product.short_name,
                  spec: productComponent.spec,
                  price_differences: item.price_differences,
                  purchase_return_quantity: item.purchase_return_quantity,
                  supplierName: item['supplier'].name,
                  warehouseName: item['stock']['warehouse'].name,
                  purchaseReturnTypeName: item['purchaseReturnType']['name']
                };
                _this11.purReturnDtl.push(list);
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
              _this11.$message.error({
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
          this.$fetch(this.urls.purchasereturns + '?page=' + page, { 'is_audit': true, include: 'purchaseReturnDetails.stock.productComponent,purchaseReturnDetails.stock.product,purchaseReturnDetails.stock.warehouse,purchaseReturnDetails.supplier,purchaseReturnDetails.purchaseReturnType' }).then(function (res) {
            _this11.alreadyAuditData = res.data;
            _this11.loading = false;
            _this11.purReturnDtl = [];
            var pg = res.meta.pagination;
            _this11.$store.dispatch('currentPage', pg.current_page);
            _this11.$store.commit('PER_PAGE', pg.per_page);
            _this11.$store.commit('PAGE_TOTAL', pg.total);
            if (res.data[0]['purchaseReturnDetails']['data'].length > 0) {
              res.data[0]['purchaseReturnDetails']['data'].map(function (item) {
                var productComponent = item['stock']['productComponent'];
                var product = item['stock']['product'];
                var list = {
                  id: item.id,
                  img_url: productComponent.img_url,
                  commodity_code: product.commodity_code,
                  component_code: productComponent.component_code,
                  short_name: product.short_name,
                  spec: productComponent.spec,
                  price_differences: item.price_differences,
                  purchase_return_quantity: item.purchase_return_quantity,
                  supplierName: item['supplier'].name,
                  warehouseName: item['stock']['warehouse'].name,
                  purchaseReturnTypeName: item['purchaseReturnType']['name']
                };
                _this11.purReturnDtl.push(list);
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
              _this11.$message.error({
                message: str
              });
            }
          });
          break;
      }
    },

    /*刷新*/
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

/***/ 524:
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
            _c("label", [_vm._v("退货单号")]),
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
                value: _vm.searchBox.returnOrder,
                callback: function($$v) {
                  _vm.$set(
                    _vm.searchBox,
                    "returnOrder",
                    typeof $$v === "string" ? $$v.trim() : $$v
                  )
                },
                expression: "searchBox.returnOrder"
              }
            })
          ],
          1
        ),
        _vm._v(" "),
        _c(
          "span",
          [
            _c("label", [_vm._v("退回供应商")]),
            _vm._v(" "),
            _c(
              "el-select",
              {
                attrs: { clearable: "", placeholder: "请选择" },
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
                  value: _vm.searchBox.supplier,
                  callback: function($$v) {
                    _vm.$set(_vm.searchBox, "supplier", $$v)
                  },
                  expression: "searchBox.supplier"
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
            { attrs: { label: "未提交", name: "0" } },
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
                  attrs: { data: _vm.noSubmitData, fit: "", height: "300" },
                  on: {
                    "selection-change": _vm.handleSelectionChange,
                    "row-click": _vm.purReturnRowClick
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
                  _vm._l(_vm.purReturnHead, function(item) {
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
            { attrs: { label: "未审核", name: "1" } },
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
                  attrs: { data: _vm.noAuditData, fit: "", height: "300" },
                  on: {
                    "selection-change": _vm.handleSelectionChange,
                    "row-click": _vm.purReturnRowClick
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
                  _vm._l(_vm.purReturnHead, function(item) {
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
            { attrs: { label: "已审核", name: "2" } },
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
                  attrs: { data: _vm.alreadyAuditData, fit: "", height: "300" },
                  on: {
                    "selection-change": _vm.handleSelectionChange,
                    "row-click": _vm.purReturnRowClick
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
                  _vm._l(_vm.purReturnHead, function(item) {
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
        attrs: { "page-url": this.urls.purchasereturns },
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
            { attrs: { label: "退货单明细", name: "0" } },
            [
              _c(
                "el-table",
                { attrs: { data: _vm.purReturnDtl, fit: "" } },
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
                                    scope.row[item.prop]
                                      ? _c("span", [
                                          _vm._v(
                                            "\n                                  " +
                                              _vm._s(scope.row[item.prop]) +
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
          _c("el-tab-pane", { attrs: { label: "图片信息", name: "1" } }, [
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
          attrs: { title: "新增退货单", visible: _vm.addPurReturnMask },
          on: {
            "update:visible": function($event) {
              _vm.addPurReturnMask = $event
            }
          }
        },
        [
          _c("add-new", {
            attrs: {
              "rule-form": _vm.addPurReturnFormVal,
              "add-arr": _vm.addPurReturnFormHead,
              onlyInputs: true
            }
          }),
          _vm._v(" "),
          _c("el-button", { attrs: { type: "text" } }, [_vm._v("退货单明细")]),
          _vm._v(" "),
          _c(
            "el-table",
            {
              attrs: {
                data: _vm.addPurReturnTabVal,
                fit: "",
                height: "300",
                "row-class-name": _vm.addPurReturnRCName
              },
              on: { "row-click": _vm.addPurReturnRClick }
            },
            [
              _vm._l(_vm.addPurReturnTabHead, function(item) {
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
                                _vm.addPurReturnRIndex == "index" + scope.$index
                                  ? _c("span", [
                                      item.type == "number"
                                        ? _c("span", [
                                            item.inProp ==
                                            "purchase_return_quantity"
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
                                                        input: _vm.inputChg
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
                                        : _c(
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
                                                    scope.row[item.prop][
                                                      item.inProp
                                                    ]
                                                      ? _c("span", [
                                                          _vm._v(
                                                            "\n                                         " +
                                                              _vm._s(
                                                                list.name
                                                                  ? list.name
                                                                  : list.nick
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
                                                attrs: {
                                                  src:
                                                    scope.row[item.prop][
                                                      item.inProp
                                                    ]
                                                }
                                              }),
                                              _vm._v(" "),
                                              _c("img", {
                                                attrs: {
                                                  slot: "reference",
                                                  src:
                                                    scope.row[item.prop][
                                                      item.inProp
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
                                _vm.addPurReturnDel(scope.$index)
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
                      on: { click: _vm.addPurReturnDtl }
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
                      on: { click: _vm.addPurReturnConfirm }
                    },
                    [_vm._v("确定")]
                  ),
                  _vm._v(" "),
                  _c("el-button", { on: { click: _vm.addPurReturnCancel } }, [
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
          attrs: { title: "请选择退货商品", visible: _vm.proDtlMask },
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
                  _c("label", [_vm._v("所在仓库")]),
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
                          return _vm.proQueryClick($event)
                        }
                      },
                      model: {
                        value: _vm.proQuery.warehouse_id,
                        callback: function($$v) {
                          _vm.$set(_vm.proQuery, "warehouse_id", $$v)
                        },
                        expression: "proQuery.warehouse_id"
                      }
                    },
                    _vm._l(_vm.resData.warehouses, function(item) {
                      return _c("el-option", {
                        key: item.value,
                        attrs: { label: item.name, value: item.id }
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
                [_vm._v("刷新")]
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
            _vm._l(_vm.addPurReturnTabHead, function(item) {
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
                                ? _c("span", [
                                    item.type == "number"
                                      ? _c("span", [
                                          item.inProp ==
                                          "purchase_return_quantity"
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
                                                      input: _vm.proInputChg
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
                                            _c(
                                              "el-select",
                                              {
                                                attrs: {
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
                                                  scope.row[item.prop][
                                                    item.inProp
                                                  ]
                                                    ? _c("span", [
                                                        _vm._v(
                                                          "\n                                         " +
                                                            _vm._s(
                                                              list.name
                                                                ? list.name
                                                                : list.nick
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
                                              attrs: {
                                                src:
                                                  scope.row[item.prop][
                                                    item.inProp
                                                  ]
                                              }
                                            }),
                                            _vm._v(" "),
                                            _c("img", {
                                              attrs: {
                                                slot: "reference",
                                                src:
                                                  scope.row[item.prop][
                                                    item.inProp
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
          attrs: { title: "修改退货单", visible: _vm.updatePurReturnMask },
          on: {
            "update:visible": function($event) {
              _vm.updatePurReturnMask = $event
            }
          }
        },
        [
          _c("add-new", {
            attrs: {
              "rule-form": _vm.updatePurReturnFormVal,
              "add-arr": _vm.addPurReturnFormHead,
              onlyInputs: true
            }
          }),
          _vm._v(" "),
          _c("el-button", { attrs: { type: "text" } }, [_vm._v("退货单明细")]),
          _vm._v(" "),
          _c(
            "el-table",
            {
              attrs: {
                data: _vm.updatePurReturnTabVal,
                fit: "",
                height: "300",
                "row-class-name": _vm.updatePurReturnRCName
              },
              on: { "row-click": _vm.updatePurReturnRClick }
            },
            [
              _vm._l(_vm.addPurReturnTabHead, function(item) {
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
                                _vm.updatePurReturnRIndex ==
                                "index" + scope.$index
                                  ? _c("span", [
                                      item.type == "number"
                                        ? _c("span", [
                                            item.inProp ==
                                            "purchase_return_quantity"
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
                                                        input: _vm.inputChg
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
                                        : _c(
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
                                                    scope.row[item.prop][
                                                      item.inProp
                                                    ]
                                                      ? _c("span", [
                                                          _vm._v(
                                                            "\n                                         " +
                                                              _vm._s(
                                                                list.name
                                                                  ? list.name
                                                                  : list.nick
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
                                                attrs: {
                                                  src:
                                                    scope.row[item.prop][
                                                      item.inProp
                                                    ]
                                                }
                                              }),
                                              _vm._v(" "),
                                              _c("img", {
                                                attrs: {
                                                  slot: "reference",
                                                  src:
                                                    scope.row[item.prop][
                                                      item.inProp
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
                                _vm.updatePurReturnDel(scope.row, scope.$index)
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
                      on: { click: _vm.addPurReturnDtl }
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
                      on: { click: _vm.updatePurReturnConfirm }
                    },
                    [_vm._v("确定")]
                  ),
                  _vm._v(" "),
                  _c(
                    "el-button",
                    { on: { click: _vm.updatePurReturnCancel } },
                    [_vm._v("取消")]
                  )
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-543edb94", module.exports)
  }
}

/***/ })

});
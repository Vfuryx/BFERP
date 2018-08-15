webpackJsonp([61],{

/***/ 641:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(648)
/* template */
var __vue_template__ = __webpack_require__(649)
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

/***/ 648:
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
        ent: this.edit
      }, {
        cnt: '删除',
        icon: 'bf-del',
        ent: this.test
      }, {
        cnt: '提交',
        icon: 'bf-submit',
        ent: this.test,
        nClick: false
      }, {
        cnt: '审核',
        icon: 'bf-audit',
        ent: this.test,
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
        ent: this.test
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
      // getsInfo:[],
      nEditInRow: false,
      // topTabsUrl:[],
      topTabsHead: [{
        label: '入库单号',
        width: '250',
        prop: '',
        type: 'text'
      }, {
        label: '外部单号',
        width: '200',
        prop: '',
        type: 'text'
      }, {
        label: '入库仓库',
        width: '150',
        prop: '',
        type: 'text'
      }, {
        label: '供应商',
        width: '150',
        prop: '',
        type: 'text'
      }, {
        label: '入库类型',
        width: '160',
        prop: '',
        type: 'text'
      }, {
        label: '创建人',
        width: '160',
        prop: '',
        type: 'text'
      }, {
        label: '创建时间',
        width: '250',
        prop: '',
        type: 'text'
      }, {
        label: '提交状态',
        width: '150',
        prop: '',
        type: 'text'
      }, {
        label: '入库状态',
        width: '150',
        prop: '',
        type: 'text'
      }, {
        label: '开单时间',
        width: '230',
        prop: '',
        type: 'text'
      }],
      topTabsVal: [],
      stockInDtlHead: [{
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
      stockInDtlVal: [],
      /*新增*/
      addStockMask: false,
      addStockFormVal: {
        warehouse_id: '',
        stock_in_types_id: '',
        stock_in_details: []
      },
      addStockRules: {
        warehouse_id: [{ required: true, message: '入库仓库必选', trigger: 'blur' }],
        stock_in_types_id: [{ required: true, message: '入库类型必选', trigger: 'blur' }]
      },
      addStockFormHead: [{
        label: '入库单号',
        prop: '',
        holder: '系统自动生成',
        type: 'text',
        addChgAble: true
      },
      /* {
         label: '外部单号',
         prop: '',
         holder: '请输入外部单号',
         type: 'text',
       },*/
      {
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
      addStockVal: [],
      addStockHead: [{
        label: '采购单号',
        width: '120',
        prop: '',
        inProp: "",
        type: 'text'
      }, {
        label: '商品编码',
        width: '120',
        prop: "",
        inProp: '',
        type: 'text'
      }, {
        label: '规格编码',
        width: '120',
        prop: "",
        inProp: '',
        type: 'text'
      }, {
        label: '商品简称',
        width: '120',
        prop: '',
        inProp: "",
        type: 'text'
      }, {
        label: '规格名称',
        width: '150',
        prop: "",
        inProp: '',
        type: 'text'
      }, {
        label: '包件数',
        width: '120',
        prop: "",
        inProp: '',
        type: 'number'
      }, {
        label: '供应商',
        width: '120',
        prop: '',
        inProp: "",
        type: 'select'
      }, {
        label: '折扣',
        width: '120',
        prop: "",
        inProp: '',
        type: 'number'
      }, {
        label: '采购数',
        width: '120',
        prop: "",
        inProp: '',
        type: 'number'
      }, {
        label: '已入库数',
        width: '120',
        prop: "",
        inProp: '',
        type: 'number'
      }, {
        label: '总额',
        width: '120',
        prop: "",
        inProp: '',
        type: 'number'
      }, {
        label: '备注',
        width: '120',
        prop: "",
        inProp: '',
        type: 'textarea'
      }],
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
      proDtlMask: false,
      proDtlData: [],
      proDtlIndex: '',
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
        width: '200',
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
        label: '规格名称',
        width: '280',
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
      },
      /*计算属性*/
      {
        label: '总额',
        width: '120',
        prop: '',
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
      stockUrl: '/stocks'
    };
  },

  computed: {
    resData: {
      get: function get() {
        return this.$store.state.responseData;
      },
      set: function set() {}
    }
  },
  methods: {
    test: function test() {
      console.log(1);
    },

    /*顶部tabs切换*/
    clickTopTabs: function clickTopTabs() {
      // this.getData();
    },
    getData: function getData() {
      var _this = this;

      var index = this.topActiveName - 0;
      switch (index) {
        case 0:
          this.newOpt[3].nClick = false;
          this.newOpt[4].nClick = true;
          this.newOpt[5].nClick = true;
          /*purchase_status 变量名待替换*/
          this.$fetch(this.stockInUrl, { purchase_status: 'new' }).then(function (res) {
            _this.newLoading = false;
            _this.newData = res.data;
            var pg = res.meta.pagination;
            _this.$store.dispatch('currentPage', pg.current_page);
            _this.$store.commit('PER_PAGE', pg.per_page);
            _this.$store.commit('PAGE_TOTAL', pg.total);
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
          this.$fetch(this.stockInUrl, { purchase_status: 'section' }).then(function (res) {
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
          this.newOpt[3].nClick = true;
          this.newOpt[4].nClick = true;
          this.newOpt[5].nClick = false;
          this.$fetch(this.stockInUrl, { purchase_status: 'finish' }).then(function (res) {
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

    /*新建入库单*/
    addNew: function addNew() {
      this.addStockMask = true;
      /*数据初始化*/
      this.addStockFormVal = {};
      /*dispatch入库仓库和入库类型*/
    },

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
      var _this2 = this;

      /*明细数据初始化*/
      this.proDtlMask = true;
      /*请求商品明细信息*/
      this.$fetch(this.stockUrl).then(function (res) {
        console.log(res);
        _this2.proDtlData = res.data;
        // this.proDtlSpec.push(res.data[0]);
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
    }
  },
  mounted: function mounted() {
    // this.getData();
    this.$store.dispatch('setOpt', this.newOpt);
    var that = this;
    $(window).resize(function () {
      that.$store.dispatch('setOpt', that.newOpt);
    });
  }
});

/***/ }),

/***/ 649:
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
          _c("el-tab-pane", { attrs: { label: "新建", name: "0" } }),
          _vm._v(" "),
          _c("el-tab-pane", { attrs: { label: "已提交", name: "1" } }),
          _vm._v(" "),
          _c("el-tab-pane", { attrs: { label: "已入库", name: "2" } })
        ],
        1
      ),
      _vm._v(" "),
      _c("Pagination", { attrs: { "page-url": _vm.stockInUrl } }),
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
              rules: _vm.addStockRules,
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
                data: _vm.addStockVal,
                fit: "",
                "highlight-current-row": "",
                height: 300,
                "row-class-name": _vm.addStockRowClassName
              },
              on: {
                "cell-click": _vm.addCellClick,
                "current-change": _vm.addCurChg
              }
            },
            [
              _vm._l(_vm.addStockHead, function(item, index) {
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
              _c("el-button", { attrs: { type: "primary" } }, [_vm._v("查询")]),
              _vm._v(" "),
              _c("el-button", { attrs: { type: "primary" } }, [_vm._v("导出")]),
              _vm._v(" "),
              _c("el-button", { attrs: { type: "primary" } }, [
                _vm._v("自动填充")
              ])
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "el-table",
            {
              attrs: {
                data: _vm.proDtlData,
                fit: "",
                "highlight-current-row": "",
                type: "index",
                height: 500,
                "row-class-name": _vm.proDtlCName
              },
              on: {
                "row-click": _vm.proDtlRow,
                "current-change": _vm.proDtlCurChg
              }
            },
            [
              _vm._l(_vm.proDtlHead, function(item, index) {
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
                                              scope.row[item.prop][item.nmProp]
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
                                  "\n                        " +
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
              _vm._l(_vm.proDtlEditHead, function(each) {
                return _c("el-table-column", {
                  key: each.inProp,
                  attrs: {
                    label: each.label,
                    align: "center",
                    width: each.width,
                    fixed: "right"
                  },
                  scopedSlots: _vm._u([
                    {
                      key: "default",
                      fn: function(scope) {
                        return [
                          _vm.proDtlIndex == "index" + scope.$index
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
                                  : _vm._e()
                              ])
                            : _c("span", [
                                _vm._v(
                                  "\n                         " +
                                    _vm._s(_vm.specDtlInfo[each.inProp]) +
                                    "\n                    "
                                )
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
                      on: { click: _vm.confirmAddProDtl }
                    },
                    [_vm._v("添加")]
                  ),
                  _vm._v(" "),
                  _c("el-button", { on: { click: _vm.cancelAddProDtl } }, [
                    _vm._v("关闭")
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
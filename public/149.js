webpackJsonp([149],{

/***/ 490:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(682)
/* template */
var __vue_template__ = __webpack_require__(683)
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
Component.options.__file = "resources\\assets\\js\\views\\stock\\inventoryInquire.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-396ab26a", Component.options)
  } else {
    hotAPI.reload("data-v-396ab26a", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 682:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vuex__ = __webpack_require__(15);
var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
        cnt: '删除',
        icon: 'bf-del',
        ent: this.delMore
      }, {
        cnt: '导出',
        icon: 'bf-out',
        ent: this.test
      }, {
        cnt: '一键恢复',
        icon: 'bf-recovery',
        ent: this.test
      }, {
        cnt: '还原',
        icon: 'bf-reduce',
        ent: this.test
      }, {
        cnt: '写入',
        icon: 'bf-write',
        ent: this.addIn
      }, {
        cnt: '刷新',
        icon: 'bf-refresh',
        ent: this.test
      }],
      searchBox: {
        vip_name: ''
      },
      filterBox: false,
      stockInfo: [],
      stockHead: [{
        label: '商品图片',
        width: '120',
        prop: "goods",
        inProp: 'img',
        holder: '请选择商品图片',
        type: 'text'
      }, {
        label: '商品编码',
        width: '120',
        prop: "goods",
        inProp: 'commodity_code',
        holder: '请选择商品编码',
        type: 'text'
      }, {
        label: '规格编码',
        width: '120',
        prop: "pro_specs",
        inProp: 'spec_code',
        holder: '请选择产品规格编码',
        type: 'text'
      }, {
        label: '商品名称',
        width: '120',
        prop: "goods",
        inProp: 'short_name',
        holder: '请选择产品规格编码',
        type: 'text'
      }, {
        label: '规格',
        width: '80',
        prop: "pro_specs",
        inProp: "spec",
        holder: '请选择产品规格编码',
        type: 'text'
      }, {
        label: '颜色',
        width: '80',
        prop: "pro_specs",
        inProp: "color",
        holder: '请选择产品规格编码',
        type: 'text'
      }, {
        label: '材质',
        width: '80',
        prop: "pro_specs",
        inProp: "materials",
        holder: '请选择产品规格编码',
        type: 'text'
      },
      /* {
         label: '功能',
         width: '300',
         prop: "pro_specs[function]",
         holder: '请选择产品规格编码',
         type: 'select',
       },
       {
         label: '特殊',
         width: '300',
         prop: "pro_specs[special]",
         holder: '请选择产品规格编码',
         type: 'select',
       },*/
      {
        label: '其他',
        width: '80',
        prop: "pro_specs",
        inProp: "other",
        holder: '请选择产品规格编码',
        type: 'text'
      },
      /* {
         label: '规格一',
         width: '300',
         prop: "product_specs",
         holder: '请选择产品规格编码',
         type: 'select',
       },*/
      {
        label: '预警数量',
        width: '120',
        prop: "pro_specs",
        inProp: "inventory_warning",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '可售预警数',
        width: '130',
        prop: "pro_specs",
        inProp: "available_warning",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '库存数',
        width: '100',
        prop: "quantity",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '实际库存数',
        width: '120',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '订单数',
        width: '120',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '可用数',
        width: '120',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '可售数',
        width: '120',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '可售数/按未审核计算',
        width: '180',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '已货审数',
        width: '120',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '已打印数',
        width: '120',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '在途数',
        width: '100',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '退货在途数',
        width: '180',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '残损数',
        width: '100',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '借出数',
        width: '100',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '报废数',
        width: '100',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '售出数',
        width: '100',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '库龄',
        width: '80',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '单价',
        width: '80',
        prop: "pro_specs",
        inProp: "price",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '成本',
        width: '80',
        prop: "pro_specs",
        inProp: "cost",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '仓库成本',
        width: '120',
        prop: "pro_specs",
        inProp: "warehouse_cost",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '订单总成本',
        width: '140',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '库存数/按已打印算',
        width: '180',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '库存总成本',
        width: '160',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '近期采购成本',
        width: '180',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '近期库存总成本',
        width: '180',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '所在仓库',
        width: '120',
        prop: "warehouse",
        inProp: "name",
        holder: '请选择产品规格编码',
        type: 'text'
      }, {
        label: '遗忘数',
        width: '100',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '包件数',
        width: '100',
        prop: "pro_specs",
        inProp: "package_quantity",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '长度',
        width: '80',
        prop: "pro_specs",
        inProp: "length",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '体积',
        width: '80',
        prop: "pro_specs",
        inProp: "volume",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '总体积',
        width: '100',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '总长度',
        width: '100',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '最新到货时间',
        width: '180',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'text'
      }, {
        label: '采购运费',
        width: '120',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '启用',
        width: '80',
        prop: "status",
        holder: '请选择是否启用',
        type: 'select_def'
      }, {
        label: '停产',
        width: '80',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'select_stu'
      }, {
        label: '可售数预警',
        width: '130',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'number'
      }, {
        label: '可用数预警',
        width: '130',
        prop: "",
        inProp: "",
        holder: '请选择产品规格编码',
        type: 'number'
      }],
      stockLoading: true,
      currentIndex: '',
      stockUrl: '/stocks',
      btmActiveName: '0',
      editInRow: true,
      showAddIn: false,
      checkboxInit: false,
      chgStockNum: [],
      addRowIndex: '',
      selectedWare: [],
      clickChoicePro: false,
      choiceWare: '',
      ableWProUrl: '/saveableproduct',
      ableWriteHead: [{
        label: '商品编码',
        width: '120',
        prop: "commodity_code",
        type: 'text'
      }, {
        label: '规格编码',
        width: '120',
        prop: "pro_specs",
        type: 'text'
      }, {
        label: '商品简称',
        width: '120',
        prop: "short_name",
        type: 'text'
      }, {
        label: '规格',
        // width: '80',
        prop: "spec",
        type: 'text'
      }, {
        label: '颜色',
        width: '80',
        prop: "color",
        type: 'text'
      }, {
        label: '材质',
        width: '80',
        prop: "materials",
        type: 'text'
      }],
      ableWriteData: [],
      ableWLoad: true,
      bWRowIndex: '',
      bWRowStock: [],
      submitWPro: [],
      goodsIds: [],
      specIds: [],
      showDel: false,
      delArr: []
    };
  },

  methods: {
    test: function test() {
      console.log(1);
    },
    check: function check() {},
    resets: function resets() {
      this.searchBox = {};
    },
    toggleShow: function toggleShow() {
      this.filterBox = !this.filterBox;
    },
    editSave: function editSave() {},
    handleEdit: function handleEdit() {
      this.inputChange = true;
    },
    edit: function edit() {},
    editCancel: function editCancel() {},
    clickBtmTabs: function clickBtmTabs() {},
    rowClick: function rowClick() {},

    /*获取库存数据*/
    fetchData: function fetchData() {
      var _this = this;

      this.$fetch(this.stockUrl).then(function (res) {
        _this.stockInfo = res.data;
        _this.stockLoading = false;
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
    },

    /*写入*/
    addIn: function addIn() {
      this.showAddIn = true;
      this.$store.dispatch('warehouses', '/warehouses');
      this.resetWrite();
      /*每次点击多有库存数清0即执行一次重置*/
      this.resetWrite();
    },
    rowClickAdd: function rowClickAdd(row) {
      this.addRowIndex = 'index' + row.index;
    },
    rowClassName: function rowClassName(_ref) {
      var row = _ref.row,
          rowIndex = _ref.rowIndex;

      row.index = rowIndex;
    },
    cancelWrite: function cancelWrite() {
      this.showAddIn = false;
    },
    resetWrite: function resetWrite() {
      this.chgStockNum = [];
      this.addRowIndex = '';
    },
    handleWareChg: function handleWareChg(val) {
      this.selectedWare = val;
      /*如果选择了仓库，拿到仓库id*/
      if (this.selectedWare.length > 0) {
        this.choiceWare = val[0].id;
      }
    },
    beWPro: function beWPro(_ref2) {
      var row = _ref2.row,
          rowIndex = _ref2.rowIndex;

      row.index = rowIndex;
    },
    syncStockNum: function syncStockNum(index) {
      this.bWRowStock[index] = this.bWRowStock[index];
    },
    bWProRow: function bWProRow(row) {
      this.bWRowIndex = 'index' + row.index;
      /*  let obj={
            warehouse_id: this.choiceWare,
            goods_id: row.goods_id,
            pro_specs_id: row.product_spec_id,
            quantity: this.bWRowStock[row.index],
        };
        let arr=[];
        if(obj.quantity){
          arr.push(obj);
          arr.map(item=>{
            if(this.submitWPro.length == 0){
              this.submitWPro.push(item);
              this.goodsIds.push(item.goods_id)
              this.specIds.push(item.pro_specs_id)
            }else if(this.goodsIds.indexOf(item.goods_id)==-1 || this.specIds.indexOf(item.pro_specs_id)==-1){
              this.submitWPro.push(item);
              this.goodsIds.push(item.goods_id)
              this.specIds.push(item.pro_specs_id)
            }else{
              this.submitWPro.map(list=>{
                if(list.stocks.goods_id==item.goods_id&&list.pro_specs_id==item.stocks.pro_specs_id){
                  list.quantity = item.quantity
                }
              });
            }
          })
        }*/
    },
    curChg: function curChg(currentRow, oldCurrentRow) {
      var _this2 = this;

      if (oldCurrentRow) {
        var obj = {
          warehouse_id: this.choiceWare,
          goods_id: oldCurrentRow.goods_id,
          pro_specs_id: oldCurrentRow.product_spec_id,
          quantity: this.bWRowStock[oldCurrentRow.index]
        };
        var arr = [];
        if (obj.quantity) {
          arr.push(obj);
          arr.map(function (item) {
            if (_this2.submitWPro.length == 0) {
              _this2.submitWPro.push(item);
              _this2.goodsIds.push(item.goods_id);
              _this2.specIds.push(item.pro_specs_id);
            } else if (_this2.goodsIds.indexOf(item.goods_id) == -1 || _this2.specIds.indexOf(item.pro_specs_id) == -1) {
              _this2.submitWPro.push(item);
              _this2.goodsIds.push(item.goods_id);
              _this2.specIds.push(item.pro_specs_id);
            } else {
              _this2.submitWPro.map(function (list) {
                if (list.stocks.goods_id == item.goods_id && list.pro_specs_id == item.stocks.pro_specs_id) {
                  list.quantity = item.quantity;
                }
              });
            }
          });
        }
      }
    },
    confirmWrite: function confirmWrite() {
      /*如果没有勾选仓库，提示请勾选仓库
      * 如果没有选择要写入的商品，提示选择要写入的商品*/
      if (this.selectedWare.length == 0) {
        this.$message({
          message: '请勾选仓库',
          type: 'info'
        });
        return;
      } else if (!this.clickChoicePro) {
        this.$message({
          message: '请选择需要加入库存的商品',
          type: 'info'
        });
        return;
      }
    },
    wPro: function wPro() {
      var _this3 = this;

      /*清空写入库存数*/
      this.bWRowStock = [];
      /*恢复写入库存数的非编辑状态*/
      this.bWRowIndex = '';
      /*清空要写入的库存数组*/
      this.submitWPro = [];
      this.clickChoicePro = true;
      this.$fetch(this.stockUrl + this.ableWProUrl, { warehouses_id: this.choiceWare }).then(function (res) {
        _this3.ableWriteData = res.data;
        _this3.ableWLoad = false;
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
    confirmWIn: function confirmWIn() {
      var _this4 = this;

      this.clickChoicePro = false;
      this.showAddIn = false;
      this.$post(this.stockUrl, { 'stocks': this.submitWPro }).then(function () {
        _this4.$message({
          message: '写入仓库成功',
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
          _this4.$message.error({
            message: str
          });
        }
      });
    },
    cancelWIn: function cancelWIn() {
      this.clickChoicePro = false;
    },

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
      var _this5 = this;

      this.$del(this.stockUrl + '/' + id).then(function () {
        _this5.$message({
          message: '删除成功',
          type: 'success'
        });
        _this5.showDel = false;
        _this5.refresh();
      }, function (err) {
        if (err.response) {
          _this5.showDel = false;
          var arr = err.response.data.errors;
          var arr1 = [];
          for (var i in arr) {
            arr1.push(arr[i]);
          }
          var str = arr1.join(',');
          _this5.$message.error({
            message: str
          });
        }
      });
    },

    /*刷新*/
    refresh: function refresh() {
      this.stockLoading = true;
      this.fetchData(this.stockUrl);
    },

    /*批量删除*/
    delMore: function delMore() {
      var _this6 = this;

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
          _this6.$del(_this6.stockUrl, { ids: _this6.delArr }).then(function () {
            _this6.$message({
              message: '删除成功',
              type: 'success'
            });
            _this6.refresh();
          }, function (err) {
            if (err.response) {
              var arr = err.response.data.errors;
              var arr1 = [];
              for (var i in arr) {
                arr1.push(arr[i]);
              }
              var str = arr1.join(',');
              _this6.$message.error({
                message: str
              });
            }
          });
        }).catch(function () {
          _this6.$message({
            type: 'info',
            message: '已取消删除'
          });
        });
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
    }
  },
  computed: _extends({}, Object(__WEBPACK_IMPORTED_MODULE_0_vuex__["b" /* mapGetters */])(['warehouses'])),
  created: function created() {},
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

/***/ 683:
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
              _c("label", [_vm._v("名称/标题")]),
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
          _c(
            "span",
            [
              _c("label", [_vm._v("规格编码")]),
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
          _vm.filterBox
            ? _c(
                "span",
                [
                  _c("label", [_vm._v("规格名称")]),
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
                _c("label", [_vm._v("仓库名称")]),
                _vm._v(" "),
                _c(
                  "el-select",
                  {
                    attrs: { clearable: "", placeholder: "请选择" },
                    model: {
                      value: _vm.searchBox.vip_name,
                      callback: function($$v) {
                        _vm.$set(_vm.searchBox, "vip_name", $$v)
                      },
                      expression: "searchBox.vip_name"
                    }
                  },
                  _vm._l(_vm.searchBox.vip_name, function(item) {
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
                _c("label", [_vm._v("供应商")]),
                _vm._v(" "),
                _c(
                  "el-select",
                  {
                    attrs: { clearable: "", placeholder: "请选择" },
                    model: {
                      value: _vm.searchBox.vip_name,
                      callback: function($$v) {
                        _vm.$set(_vm.searchBox, "vip_name", $$v)
                      },
                      expression: "searchBox.vip_name"
                    }
                  },
                  _vm._l(_vm.searchBox.vip_name, function(item) {
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
                _c("label", [_vm._v("商品类别")]),
                _vm._v(" "),
                _c(
                  "el-select",
                  {
                    attrs: { clearable: "", placeholder: "请选择" },
                    model: {
                      value: _vm.searchBox.vip_name,
                      callback: function($$v) {
                        _vm.$set(_vm.searchBox, "vip_name", $$v)
                      },
                      expression: "searchBox.vip_name"
                    }
                  },
                  _vm._l(_vm.searchBox.vip_name, function(item) {
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
      _c("light-table", {
        attrs: {
          listData: _vm.stockInfo,
          tableHead: _vm.stockHead,
          loading: _vm.stockLoading,
          currentIndex: _vm.currentIndex,
          editInRow: _vm.editInRow,
          height: 400
        },
        on: {
          handleSelect: _vm.handleSelectionChange,
          editSave: _vm.editSave,
          handleEdit: _vm.handleEdit,
          del: _vm.del,
          edit: _vm.edit,
          editCancel: _vm.editCancel,
          rowClick: _vm.rowClick
        }
      }),
      _vm._v(" "),
      _c("Pagination", { attrs: { "page-url": _vm.stockUrl } }),
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
          _c("el-tab-pane", { attrs: { label: "供应商汇总信息", name: "0" } }, [
            _vm._v("\n            供应商汇总信息\n        ")
          ]),
          _vm._v(" "),
          _c("el-tab-pane", { attrs: { label: "供应商采购批次", name: "1" } }, [
            _vm._v("\n            供应商采购批次\n        ")
          ]),
          _vm._v(" "),
          _c(
            "el-tab-pane",
            { attrs: { label: "库存(删除/还原)记录", name: "2" } },
            [_vm._v("\n            库存(删除/还原)记录\n        ")]
          )
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "el-dialog",
        {
          attrs: { title: "插入库存记录", visible: _vm.showAddIn },
          on: {
            "update:visible": function($event) {
              _vm.showAddIn = $event
            }
          }
        },
        [
          _c(
            "el-table",
            {
              attrs: {
                data: _vm.warehouses,
                fit: "",
                "highlight-current-row": "",
                type: "index",
                "max-height": "300",
                "row-class-name": _vm.rowClassName
              },
              on: {
                "row-click": _vm.rowClickAdd,
                "selection-change": _vm.handleWareChg
              }
            },
            [
              _c("el-table-column", {
                attrs: {
                  type: "selection",
                  align: "center",
                  checked: _vm.checkboxInit
                }
              }),
              _vm._v(" "),
              _c("el-table-column", {
                attrs: { align: "center", label: "仓库名称", prop: "name" }
              }),
              _vm._v(" "),
              _c("el-table-column", {
                attrs: { align: "center", label: "默认库存数" },
                scopedSlots: _vm._u([
                  {
                    key: "default",
                    fn: function(scope) {
                      return [
                        _vm.addRowIndex == "index" + scope.$index
                          ? _c(
                              "span",
                              [
                                _c("el-input", {
                                  attrs: { size: "small" },
                                  model: {
                                    value: _vm.chgStockNum[scope.$index],
                                    callback: function($$v) {
                                      _vm.$set(
                                        _vm.chgStockNum,
                                        scope.$index,
                                        $$v
                                      )
                                    },
                                    expression: "chgStockNum[scope.$index]"
                                  }
                                })
                              ],
                              1
                            )
                          : _c("span", [
                              _vm.chgStockNum[scope.$index]
                                ? _c("span", [
                                    _vm._v(
                                      "\n                            " +
                                        _vm._s(_vm.chgStockNum[scope.$index]) +
                                        "\n                        "
                                    )
                                  ])
                                : _c("span", [
                                    _vm._v(
                                      "\n                             " +
                                        _vm._s(0) +
                                        "\n                        "
                                    )
                                  ])
                            ])
                      ]
                    }
                  }
                ])
              })
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
                  _c(
                    "el-button",
                    { attrs: { type: "primary" }, on: { click: _vm.wPro } },
                    [_vm._v("写入商品")]
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
                      on: { click: _vm.confirmWrite }
                    },
                    [_vm._v("确定")]
                  ),
                  _vm._v(" "),
                  _c("el-button", { on: { click: _vm.resetWrite } }, [
                    _vm._v("重置")
                  ]),
                  _vm._v(" "),
                  _c("el-button", { on: { click: _vm.cancelWrite } }, [
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
          attrs: { title: "商品写入", visible: _vm.clickChoicePro },
          on: {
            "update:visible": function($event) {
              _vm.clickChoicePro = $event
            }
          }
        },
        [
          _c(
            "div",
            [
              _c("label", [_vm._v("模糊条件")]),
              _vm._v(" "),
              _c("el-input", {
                staticStyle: { width: "60%", margin: "0 10px 0 5px" },
                attrs: { clearable: "" }
              }),
              _vm._v(" "),
              _c("el-button", { attrs: { type: "primary" } }, [_vm._v("查询")])
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "el-table",
            {
              directives: [
                {
                  name: "loading",
                  rawName: "v-loading",
                  value: _vm.ableWLoad,
                  expression: "ableWLoad"
                }
              ],
              staticStyle: { margin: "10px 0" },
              attrs: {
                data: _vm.ableWriteData,
                fit: "",
                "highlight-current-row": "",
                "max-height": "300",
                "element-loading-spinner": "el-icon-loading",
                "element-loading-background": "rgba(0, 0, 0, 0.6)",
                "row-class-name": _vm.beWPro
              },
              on: { "row-click": _vm.bWProRow, "current-change": _vm.curChg }
            },
            [
              _vm._l(_vm.ableWriteHead, function(item, index) {
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
                          _vm._v(
                            "\n                    " +
                              _vm._s(scope.row[item.prop]) +
                              "\n                "
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
                  width: "120",
                  align: "center",
                  fixed: "right",
                  label: "写入库存"
                },
                scopedSlots: _vm._u([
                  {
                    key: "default",
                    fn: function(scope) {
                      return [
                        _vm.bWRowIndex == "index" + scope.$index
                          ? _c(
                              "span",
                              [
                                _c("el-input", {
                                  attrs: { size: "small" },
                                  model: {
                                    value: _vm.bWRowStock[scope.$index],
                                    callback: function($$v) {
                                      _vm.$set(
                                        _vm.bWRowStock,
                                        scope.$index,
                                        $$v
                                      )
                                    },
                                    expression: "bWRowStock[scope.$index]"
                                  }
                                })
                              ],
                              1
                            )
                          : _c("span", [
                              _vm.bWRowStock[scope.$index]
                                ? _c("span", [
                                    _vm._v(
                                      "\n                            " +
                                        _vm._s(_vm.bWRowStock[scope.$index]) +
                                        "\n                        "
                                    )
                                  ])
                                : _c("span")
                            ])
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
            { staticStyle: { "text-align": "right" } },
            [
              _c(
                "el-button",
                { attrs: { type: "primary" }, on: { click: _vm.confirmWIn } },
                [_vm._v("确认")]
              ),
              _vm._v(" "),
              _c("el-button", { on: { click: _vm.cancelWIn } }, [
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-396ab26a", module.exports)
  }
}

/***/ })

});
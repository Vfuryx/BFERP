webpackJsonp([16],{

/***/ 459:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(542)
/* template */
var __vue_template__ = __webpack_require__(543)
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
Component.options.__file = "resources\\assets\\js\\views\\basicInf\\shopMag.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-7ed42261", Component.options)
  } else {
    hotAPI.reload("data-v-7ed42261", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 542:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__ = __webpack_require__(66);
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


/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      newOpt: [{
        cnt: '新增',
        icon: 'bf-add',
        ent: this.addShopInfo
      }, {
        cnt: '修改',
        icon: 'bf-change',
        ent: this.updateShop,
        nClick: false
      }, {
        cnt: '删除',
        icon: 'bf-del',
        ent: this.delBatch
      }, {
        cnt: '上传',
        icon: 'bf-upload',
        ent: this.test
      }, {
        cnt: '刷新',
        icon: 'bf-refresh',
        ent: this.refresh
      }],
      /*查询*/
      shopPage: true,
      searchBox: {
        buyNick: '',
        shopTitle: ''
      },
      /*获取数据*/
      activeName: '0',
      checkboxInit: false,
      loading: true,
      tableHead: [[{
        label: '卖家昵称',
        width: '120',
        prop: "nick",
        type: 'text'
      }, {
        label: '店铺标题',
        width: '120',
        prop: "title",
        type: 'text'
      }, {
        label: '仓库',
        width: '120',
        prop: 'warehouse',
        inProp: 'name',
        type: 'text'
      }, {
        label: '店铺返点(%)',
        width: '130',
        prop: "rebate",
        type: 'text'
      }, {
        label: '店铺电话',
        width: '150',
        prop: "principal_mobile",
        type: 'number'
      }, {
        label: '店铺类型',
        width: '120',
        prop: "platform",
        inProp: 'name',
        type: 'text'
      }, {
        label: '店铺负责人',
        width: '130',
        prop: "principal",
        type: 'text'
      }, {
        label: '发货地(省)',
        width: '130',
        prop: "province",
        type: 'text'
      }, {
        label: '发货地(市)',
        width: '130',
        prop: "city",
        type: 'text'
      }, {
        label: '发货地(区)',
        width: '130',
        prop: "district",
        type: 'text'
      }, {
        label: '发货地址',
        width: '150',
        prop: "address",
        type: 'text'
      }, {
        label: '毛利差异(%)',
        width: '130',
        prop: "gross_profit_rate",
        type: 'number'
      }, {
        label: '电子面单',
        width: '120',
        prop: "is_waybill",
        type: 'checkbox'
      }], [{
        label: '平台类型名称',
        prop: "name",
        type: 'text'
      }, {
        label: '状态',
        prop: "status",
        type: 'checkbox'
      }]],
      shopVal: [],
      platVal: [],
      shopRow: [],
      currentId: '',
      pagination: {
        current_page: 1,
        per_page: 0,
        page_total: 0
      },
      url: ['/shops', '/platforms'],
      /*新增*/
      title: ['新增店铺信息', '新增平台信息'],
      addMask: [false, false],
      addVal: [{
        nick: '',
        title: '',
        session_key: '',
        warehouse_id: '',
        shop_account: '',
        shop_passwd: '',
        rebate: '',
        principal: '',
        principal_mobile: '',
        provinces: [],
        province: '',
        city: '',
        district: '',
        address: '',
        gross_profit_rate: '',
        platform_id: '',
        is_waybill: true
      }, {
        name: '',
        status: true
      }],
      addRules: [{
        nick: [{ required: true, message: '请输入卖家昵称', trigger: 'blur' }],
        title: [{ required: true, message: '请输入店铺标题', trigger: 'blur' }],
        session_key: [{ required: true, message: '请输入SessionKey', trigger: 'blur' }],
        warehouse_id: [{ required: true, message: '默认仓库必选', trigger: 'blur' }],
        shop_account: [{ required: true, message: '请输入店铺账号', trigger: 'blur' }],
        shop_passwd: [{ required: true, message: '请输入店铺密码', trigger: 'blur' }],
        rebate: [{ required: true, message: '请输入返点', trigger: 'blur' }],
        principal: [{ required: true, message: '请输入店铺负责人', trigger: 'blur' }],
        principal_mobile: [{ required: true, message: '请输入负责人电话', trigger: 'blur' }],
        /*  province: [
            {required: true, message: '请输入省', trigger: 'blur'}
          ],*/
        city: [{ required: true, message: '请输入市', trigger: 'blur' }],
        district: [{ required: true, message: '请输入区', trigger: 'blur' }],
        address: [{ required: true, message: '请输入地址', trigger: 'blur' }],
        gross_profit_rate: [{ required: true, message: '请输入毛利', trigger: 'blur' }],
        platform_id: [{ required: true, message: '请输入平台', trigger: 'blur' }]
      }, {
        name: [{ required: true, message: '请输入仓库名称', trigger: 'blur' }]
      }],
      addRef: ['shopForm', 'platForm'],
      moreForms: [true, false],
      addHead: [[{
        label: '卖家昵称',
        prop: 'nick',
        holder: '请输入卖家昵称',
        type: 'text'
      }, {
        label: '店铺标题',
        prop: 'title',
        holder: '请输入店铺标题',
        type: 'text'
      }, {
        label: 'SessionKey',
        prop: 'session_key',
        holder: '请输入SessionKey',
        type: 'text'
      }, {
        label: '默认仓库',
        prop: 'warehouse_id',
        holder: '请选择仓库',
        type: 'select',
        stateVal: 'warehouses'
      }, {
        label: '店铺账号',
        prop: 'shop_account',
        holder: '请输入店铺账号',
        type: 'text'
      }, {
        label: '店铺密码',
        prop: 'shop_passwd',
        holder: '请输入店铺密码',
        type: 'password'
      }, {
        label: '返点(%)',
        prop: 'rebate',
        holder: '请输入返点',
        type: 'number'
      }, {
        label: '店铺负责人',
        prop: 'principal',
        holder: '请输入负责人',
        type: 'text'
      }, {
        label: '负责人电话',
        prop: 'principal_mobile',
        holder: '请输入负责人电话',
        type: 'number'
      }, {
        label: '省市区',
        prop: 'provinces',
        holder: '请选择省市区',
        type: 'cascader'
      }, {
        label: '发货地址',
        prop: 'address',
        holder: '请输入地址',
        type: 'text'
      }, {
        label: '毛利差异(%)',
        prop: 'gross_profit_rate',
        imgPath: '',
        holder: '请输入毛利差异',
        type: 'number'
      }, {
        label: '平台',
        prop: 'platform_id',
        stateVal: 'platforms',
        holder: '请选择平台',
        type: 'select'
      }, {
        label: '电子面单',
        prop: 'is_waybill',
        type: 'checkbox'
      }], [{
        label: '平台名称',
        prop: 'name',
        holder: '请输入平台名称',
        type: 'text'
      }, {
        label: '状态',
        prop: 'status',
        type: 'checkbox'
      }]],
      options: __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["regionDataPlus"],
      /*修改*/
      platRIndex: '',
      updateMask: false,
      updateVal: {},
      /*删除*/
      showDel: false,
      delUrl: '',
      delId: '',
      delBatchUrl: '',
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

    /*查询*/
    queryData: function queryData() {
      alert(this.searchBox);
    },

    /*获取数据*/
    fetchData: function fetchData() {
      var _this = this;

      var index = this.activeName - 0;
      switch (index) {
        case 0:
          this.$fetch(this.urls.shops, { include: 'warehouse,platform' }).then(function (res) {
            _this.loading = false;
            _this.shopVal = res.data;
            var pg = res.meta.pagination;
            _this.$store.dispatch('currentPage', pg.current_page);
            _this.$store.commit('PER_PAGE', pg.per_page);
            _this.$store.commit('PAGE_TOTAL', pg.total);
            _this.$store.dispatch('warehouses', '/warehouses');
            _this.$store.dispatch('platforms', '/platforms');
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
          this.$fetch(this.urls.platforms).then(function (res) {
            _this.loading = false;
            _this.platVal = res.data;
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
    handleTabsClick: function handleTabsClick() {
      this.loading = true;
      this.fetchData();
      this.shopPage = this.activeName == 0 ? true : false;
      Object.assign(this.addVal[this.activeName], this.$options.data().addVal[this.activeName]);
      this.newOpt[1].nClick = this.activeName == '1' ? true : false;
      this.delBatchUrl = this.activeName == '0' ? this.urls.shops : this.urls.platforms;
    },

    /*新增*/
    addShopInfo: function addShopInfo() {
      this.addMask = [false, false];
      this.addMask[this.activeName] = true;
      Object.assign(this.addVal[this.activeName], this.$options.data().addVal[this.activeName]);
    },
    addConfirm: function addConfirm() {
      var _this2 = this;

      if (this.addMask[0] == true) {
        var data = this.addVal[0];
        data.province = __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["CodeToText"][data.provinces[0]];
        data.city = __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["CodeToText"][data.provinces[1]];
        data.district = __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["CodeToText"][data.provinces[2]];
        this.$post(this.urls.shops, data).then(function () {
          _this2.addMask[_this2.activeName] = false;
          _this2.$message({
            message: '添加成功',
            type: 'success'
          });
          _this2.refresh();
        }, function (err) {
          Object.assign(_this2.addVal[_this2.activeName], _this2.$options.data().addVal[_this2.activeName]);
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
      } else {
        var _data = this.addVal[1];
        this.$post(this.urls.platforms, _data).then(function () {
          _this2.addMask = [false, false];
          _this2.$message({
            message: '添加成功',
            type: 'success'
          });
          _this2.refresh();
        }, function (err) {
          Object.assign(_this2.addVal[_this2.activeName], _this2.$options.data().addVal[_this2.activeName]);
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
      }
    },
    addReset: function addReset() {
      Object.assign(this.addVal[this.activeName], this.$options.data().addVal[this.activeName]);
    },
    shopRClick: function shopRClick(row) {
      this.shopRow = row;
    },

    /*修改*/
    platRCName: function platRCName(_ref) {
      var row = _ref.row,
          rowIndex = _ref.rowIndex;
      row.index = rowIndex;
    },
    platRClick: function platRClick(row) {
      this.platRIndex = 'index' + row.index;
    },
    updateShop: function updateShop() {
      var _this3 = this;

      if (this.newOpt[1].nClick) {
        return;
      } else {
        this.updateMask = true;
        /*判断复选框是否有值*/
        var id = void 0;
        id = this.currentId ? this.currentId : this.shopRow.id;
        this.$fetch(this.urls.shops + '/' + id).then(function (res) {
          _this3.updateVal = {
            nick: res.nick,
            title: res.title,
            session_key: res.session_key,
            warehouse_id: res.warehouse_id,
            shop_account: res.shop_account,
            shop_passwd: res.shop_passwd,
            rebate: res.rebate,
            principal: res.principal,
            principal_mobile: res.principal_mobile,
            provinces: [__WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["TextToCode"][res.province].code, __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["TextToCode"][res.province][res.city].code, __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["TextToCode"][res.province][res.city][res.district].code],
            province: '',
            city: '',
            district: '',
            address: res.address,
            gross_profit_rate: res.gross_profit_rate,
            platform_id: res.platform_id,
            is_waybill: res.is_waybill
          };
        }, function (err) {});
      }
    },
    updateConfirm: function updateConfirm() {
      var _this4 = this;

      var id = void 0;
      id = this.currentId ? this.currentId : this.shopRow.id;
      var data = this.updateVal;
      data.province = __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["CodeToText"][data.provinces[0]];
      data.city = __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["CodeToText"][data.provinces[1]];
      data.district = __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["CodeToText"][data.provinces[2]];
      this.$patch(this.urls.shops + '/' + id, this.updateVal).then(function () {
        _this4.updateMask = false;
        _this4.refresh();
        _this4.$message({
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
          _this4.$message.error(str);
        }
      });
    },
    updateCancel: function updateCancel() {
      this.updateMask = false;
      this.$message({
        message: '取消修改',
        type: 'info'
      });
    },
    saveSingle: function saveSingle(row) {
      var _this5 = this;

      this.$patch(this.urls.platforms + '/' + row.id, row).then(function () {
        _this5.platRIndex = '';
        _this5.$message({
          message: '平台信息修改成功',
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
          _this5.$message.error({
            message: str
          });
        }
      });
    },

    /*分页*/
    handlePagChg: function handlePagChg(page) {
      var _this6 = this;

      this.$fetch(this.url[this.activeName] + '?page=' + page).then(function (res) {
        _this6.activeName == '0' ? _this6.shopVal = res.data : _this6.platVal = res.data;
      });
    },

    /*删除*/
    delSingle: function delSingle(row, e) {
      this.showDel = true;
      $('.el-popper').css({ left: e.x - 100 + 'px', top: e.y - 125 + 'px' });
      this.delId = row.id;
      this.delUrl = row.platform ? this.urls.shops : this.urls.platforms;
    },
    cancelD: function cancelD() {
      this.showDel = false;
      this.$message({
        message: '取消删除',
        type: 'info'
      });
    },
    confirmD: function confirmD(url, id) {
      var _this7 = this;

      this.$del(url + '/' + id).then(function () {
        _this7.$message({
          message: '删除成功',
          type: 'success'
        });
        _this7.showDel = false;
        _this7.refresh();
      }, function (err) {
        if (err.response) {
          _this7.showDel = false;
          var arr = err.response.data.errors;
          var arr1 = [];
          for (var i in arr) {
            arr1.push(arr[i]);
          }
          var str = arr1.join(',');
          _this7.$message.error({
            message: str
          });
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
      this.currentId = val.length > 0 ? val[val.length - 1].id : '';
    },
    delBatch: function delBatch() {
      var _this8 = this;

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
          _this8.$del(_this8.delBatchUrl, { ids: _this8.ids }).then(function () {
            _this8.$message({
              message: '删除成功',
              type: 'success'
            });
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
        }).catch(function () {
          _this8.$message({
            type: 'info',
            message: '已取消删除'
          });
        });
      }
    },

    /*刷新*/
    refresh: function refresh() {
      this.loading = true;
      this.fetchData();
      this.platRIndex = '';
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

/***/ 543:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "shopMag" },
    [
      _vm.shopPage
        ? _c("div", { staticClass: "searchBox" }, [
            _c(
              "span",
              [
                _c("label", [_vm._v("卖家昵称")]),
                _vm._v(" "),
                _c("el-input", {
                  staticClass: "half",
                  attrs: { clearable: "" },
                  nativeOn: {
                    keyup: function($event) {
                      if (
                        !("button" in $event) &&
                        _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                      ) {
                        return null
                      }
                      return _vm.queryData($event)
                    }
                  },
                  model: {
                    value: _vm.searchBox.buyNick,
                    callback: function($$v) {
                      _vm.$set(_vm.searchBox, "buyNick", $$v)
                    },
                    expression: "searchBox.buyNick"
                  }
                })
              ],
              1
            ),
            _vm._v(" "),
            _c(
              "span",
              [
                _c("label", [_vm._v("店铺标题")]),
                _vm._v(" "),
                _c("el-input", {
                  staticClass: "half",
                  attrs: { clearable: "" },
                  nativeOn: {
                    keyup: function($event) {
                      if (
                        !("button" in $event) &&
                        _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                      ) {
                        return null
                      }
                      return _vm.queryData($event)
                    }
                  },
                  model: {
                    value: _vm.searchBox.shopTitle,
                    callback: function($$v) {
                      _vm.$set(_vm.searchBox, "shopTitle", $$v)
                    },
                    expression: "searchBox.shopTitle"
                  }
                })
              ],
              1
            )
          ])
        : _vm._e(),
      _vm._v(" "),
      _c(
        "el-tabs",
        {
          on: { "tab-click": _vm.handleTabsClick },
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
            { attrs: { label: "店铺信息", name: "0" } },
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
                  attrs: { data: _vm.shopVal, fit: "", height: "400" },
                  on: {
                    "selection-change": _vm.handleSelectionChange,
                    "row-click": _vm.shopRClick
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
                  _vm._l(_vm.tableHead[0], function(item) {
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
            { attrs: { label: "平台信息", name: "1" } },
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
                    data: _vm.platVal,
                    fit: "",
                    height: "400",
                    "row-class-name": _vm.platRCName
                  },
                  on: {
                    "selection-change": _vm.handleSelectionChange,
                    "row-click": _vm.platRClick
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
                  _vm._l(_vm.tableHead[1], function(item) {
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
                              _vm.platRIndex == "index" + scope.$index
                                ? _c("span", [
                                    item.type == "checkbox"
                                      ? _c(
                                          "span",
                                          [
                                            _c("el-checkbox", {
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
                                      : _c(
                                          "span",
                                          [
                                            _c("el-input", {
                                              attrs: { size: "small" },
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
                                            "\n                        " +
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
                      width: "150",
                      align: "center",
                      fixed: "right"
                    },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            _vm.platRIndex == "index" + scope.$index
                              ? _c(
                                  "span",
                                  [
                                    _c(
                                      "el-button",
                                      {
                                        attrs: {
                                          size: "mini",
                                          type: "primary"
                                        },
                                        on: {
                                          click: function($event) {
                                            _vm.saveSingle(scope.row)
                                          }
                                        }
                                      },
                                      [_vm._v("保存")]
                                    )
                                  ],
                                  1
                                )
                              : _vm._e(),
                            _vm._v(" "),
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
      _c(
        "el-dialog",
        {
          attrs: {
            title: _vm.title[_vm.activeName],
            visible: _vm.addMask[_vm.activeName]
          },
          on: {
            "update:visible": function($event) {
              _vm.$set(_vm.addMask, _vm.activeName, $event)
            }
          }
        },
        [
          _c(
            "el-form",
            {
              ref: _vm.addRef[_vm.activeName],
              class: { "half-form": _vm.moreForms[_vm.activeName] },
              attrs: {
                model: _vm.addVal[_vm.activeName],
                rules: _vm.addRules[_vm.activeName],
                "label-width": "100px"
              }
            },
            _vm._l(_vm.addHead[_vm.activeName], function(item, index) {
              return _c(
                "el-form-item",
                { key: index, attrs: { label: item.label, prop: item.prop } },
                [
                  item.type == "text"
                    ? _c(
                        "span",
                        [
                          _c("el-input", {
                            attrs: {
                              placeholder:
                                _vm.addVal[_vm.activeName][item.holder]
                            },
                            model: {
                              value: _vm.addVal[_vm.activeName][item.prop],
                              callback: function($$v) {
                                _vm.$set(
                                  _vm.addVal[_vm.activeName],
                                  item.prop,
                                  typeof $$v === "string" ? $$v.trim() : $$v
                                )
                              },
                              expression: "addVal[activeName][item.prop]"
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
                                    _vm.addVal[_vm.activeName][item.holder]
                                },
                                model: {
                                  value: _vm.addVal[_vm.activeName][item.prop],
                                  callback: function($$v) {
                                    _vm.$set(
                                      _vm.addVal[_vm.activeName],
                                      item.prop,
                                      $$v
                                    )
                                  },
                                  expression: "addVal[activeName][item.prop]"
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
                                  placehoder:
                                    _vm.addVal[_vm.activeName][item.holder]
                                },
                                model: {
                                  value: _vm.addVal[_vm.activeName][item.prop],
                                  callback: function($$v) {
                                    _vm.$set(
                                      _vm.addVal[_vm.activeName],
                                      item.prop,
                                      typeof $$v === "string" ? $$v.trim() : $$v
                                    )
                                  },
                                  expression: "addVal[activeName][item.prop]"
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
                                    size: "middle",
                                    options: _vm.options
                                  },
                                  model: {
                                    value:
                                      _vm.addVal[_vm.activeName][item.prop],
                                    callback: function($$v) {
                                      _vm.$set(
                                        _vm.addVal[_vm.activeName],
                                        item.prop,
                                        $$v
                                      )
                                    },
                                    expression: "addVal[activeName][item.prop]"
                                  }
                                })
                              ],
                              1
                            )
                          : item.type == "password"
                            ? _c(
                                "span",
                                [
                                  _c("el-input", {
                                    attrs: {
                                      type: "password",
                                      placehold:
                                        _vm.addVal[_vm.activeName][item.holder]
                                    },
                                    model: {
                                      value:
                                        _vm.addVal[_vm.activeName][item.prop],
                                      callback: function($$v) {
                                        _vm.$set(
                                          _vm.addVal[_vm.activeName],
                                          item.prop,
                                          $$v
                                        )
                                      },
                                      expression:
                                        "addVal[activeName][item.prop]"
                                    }
                                  })
                                ],
                                1
                              )
                            : item.type == "number"
                              ? _c(
                                  "span",
                                  [
                                    _c("el-input", {
                                      attrs: {
                                        type: "number",
                                        placehold:
                                          _vm.addVal[_vm.activeName][
                                            item.holder
                                          ]
                                      },
                                      model: {
                                        value:
                                          _vm.addVal[_vm.activeName][item.prop],
                                        callback: function($$v) {
                                          _vm.$set(
                                            _vm.addVal[_vm.activeName],
                                            item.prop,
                                            $$v
                                          )
                                        },
                                        expression:
                                          "addVal[activeName][item.prop]"
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
                                            _vm.addVal[_vm.activeName][
                                              item.prop
                                            ],
                                          callback: function($$v) {
                                            _vm.$set(
                                              _vm.addVal[_vm.activeName],
                                              item.prop,
                                              $$v
                                            )
                                          },
                                          expression:
                                            "addVal[activeName][item.prop]"
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
            "div",
            {
              staticClass: "dialog-footer",
              attrs: { slot: "footer" },
              slot: "footer"
            },
            [
              _c(
                "el-button",
                { attrs: { type: "primary" }, on: { click: _vm.addConfirm } },
                [_vm._v("添加")]
              ),
              _vm._v(" "),
              _c("el-button", { on: { click: _vm.addReset } }, [_vm._v("重置")])
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
          attrs: { title: "修改店铺信息", visible: _vm.updateMask },
          on: {
            "update:visible": function($event) {
              _vm.updateMask = $event
            }
          }
        },
        [
          _c(
            "el-form",
            {
              ref: _vm.addRef[_vm.activeName],
              class: { "half-form": _vm.moreForms[_vm.activeName] },
              attrs: {
                model: _vm.updateVal,
                rules: _vm.addRules[_vm.activeName],
                "label-width": "100px"
              }
            },
            _vm._l(_vm.addHead[_vm.activeName], function(item, index) {
              return _c(
                "el-form-item",
                { key: index, attrs: { label: item.label, prop: item.prop } },
                [
                  item.type == "text"
                    ? _c(
                        "span",
                        [
                          _c("el-input", {
                            attrs: {
                              disabled: item.prop == "nick" ? true : false
                            },
                            model: {
                              value: _vm.updateVal[item.prop],
                              callback: function($$v) {
                                _vm.$set(
                                  _vm.updateVal,
                                  item.prop,
                                  typeof $$v === "string" ? $$v.trim() : $$v
                                )
                              },
                              expression: "updateVal[item.prop]"
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
                                model: {
                                  value: _vm.updateVal[item.prop],
                                  callback: function($$v) {
                                    _vm.$set(_vm.updateVal, item.prop, $$v)
                                  },
                                  expression: "updateVal[item.prop]"
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
                                attrs: { type: "textarea" },
                                model: {
                                  value: _vm.updateVal[item.prop],
                                  callback: function($$v) {
                                    _vm.$set(
                                      _vm.updateVal,
                                      item.prop,
                                      typeof $$v === "string" ? $$v.trim() : $$v
                                    )
                                  },
                                  expression: "updateVal[item.prop]"
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
                                    size: "middle",
                                    options: _vm.options
                                  },
                                  model: {
                                    value: _vm.updateVal[item.prop],
                                    callback: function($$v) {
                                      _vm.$set(_vm.updateVal, item.prop, $$v)
                                    },
                                    expression: "updateVal[item.prop]"
                                  }
                                })
                              ],
                              1
                            )
                          : item.type == "password"
                            ? _c(
                                "span",
                                [
                                  _c("el-input", {
                                    attrs: { type: "password" },
                                    model: {
                                      value: _vm.updateVal[item.prop],
                                      callback: function($$v) {
                                        _vm.$set(_vm.updateVal, item.prop, $$v)
                                      },
                                      expression: "updateVal[item.prop]"
                                    }
                                  })
                                ],
                                1
                              )
                            : item.type == "number"
                              ? _c(
                                  "span",
                                  [
                                    _c("el-input", {
                                      attrs: { type: "number" },
                                      model: {
                                        value: _vm.updateVal[item.prop],
                                        callback: function($$v) {
                                          _vm.$set(
                                            _vm.updateVal,
                                            item.prop,
                                            $$v
                                          )
                                        },
                                        expression: "updateVal[item.prop]"
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
                                          value: _vm.updateVal[item.prop],
                                          callback: function($$v) {
                                            _vm.$set(
                                              _vm.updateVal,
                                              item.prop,
                                              $$v
                                            )
                                          },
                                          expression: "updateVal[item.prop]"
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
                  on: { click: _vm.updateConfirm }
                },
                [_vm._v("修改")]
              ),
              _vm._v(" "),
              _c("el-button", { on: { click: _vm.updateCancel } }, [
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
      ),
      _vm._v(" "),
      _c("Pagination", {
        attrs: { "page-url": this.url[_vm.activeName] },
        on: { handlePagChg: _vm.handlePagChg }
      })
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-7ed42261", module.exports)
  }
}

/***/ })

});
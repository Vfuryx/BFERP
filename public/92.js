webpackJsonp([92],{

/***/ 504:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(719)
/* template */
var __vue_template__ = __webpack_require__(720)
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

/***/ 719:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__ = __webpack_require__(66);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_element_china_area_data___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_element_china_area_data__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_vuex__ = __webpack_require__(15);
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
        cnt: '删除',
        icon: 'bf-del',
        ent: this.delMore
      }, {
        cnt: '上传',
        icon: 'bf-upload',
        ent: this.test
      }, {
        cnt: '刷新',
        icon: 'bf-refresh',
        ent: this.refresh
      }],
      activeName: '0',
      shopInfo: [],
      checkboxInit: false,
      inputChange: false,
      changeIndex: '',
      multipleSelection: [],
      loading: true,
      url: ['/shops', '/platforms'],
      ruleForm: {
        nick: '',
        title: '',
        session_key: '',
        warehouse_id: '',
        shop_account: '',
        shop_passwd: '',
        rebate: '',
        principal: '',
        principal_mobile: '',
        province: '',
        city: '',
        district: '',
        address: '',
        gross_profit_rate: '',
        platform_id: '',
        is_waybill: '1'
      },
      rules: {
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
      },
      showDel: false,
      delId: '',
      delArr: [],
      getsInfo: [[], [], []],
      /*添加面板*/
      title: ['新增库存', '新增平台'],
      refArr: ['', 'ruleStore', 'rulePlatform'],
      newRuleForm: [{
        name: '',
        status: '1'
      }],
      newRules: [{
        name: [{ required: true, message: '请输入仓库名称', trigger: 'blur' }]
      }],
      addArr: [[{
        label: '平台名称',
        prop: 'name',
        holder: '请输入平台名称',
        type: 'text'
      }, {
        label: '状态',
        prop: 'status',
        holder: '请选择状态',
        type: 'select_stu'
      }]],
      showMaskArr: [{ show: false }, { show: false }],
      pagination: {
        current_page: 1,
        per_page: 0,
        page_total: 0
      },
      searchBox: {
        buyNick: '',
        shopTitle: ''
      },
      shopPage: true,
      areaArr: [],
      dataList: []
    };
  },
  created: function created() {
    this.$store.dispatch('getWareHouse', '/warehouses');
    this.$store.dispatch('getPlatForm', '/platforms');
  },

  computed: _extends({}, Object(__WEBPACK_IMPORTED_MODULE_1_vuex__["b" /* mapGetters */])(['wareHouse', 'platForm'])),
  methods: {
    test: function test() {
      console.log(1);
    },

    /*获取时设置页码 */
    getShopInfo: function getShopInfo(url) {
      var _this = this;

      this.$fetch(url).then(function (res) {
        _this.getsInfo[_this.activeName] = res.data;
        _this.loading = false;
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

    /*增加*/
    addNew: function addNew() {
      this.showMaskArr[this.activeName].show = true;
    },
    CB_dialog: function CB_dialog(val) {
      this.showMaskArr[this.activeName].show = val;
    },
    submitForm: function submitForm(formName) {
      var _this2 = this;

      this.$refs[formName].validate(function (valid) {
        if (valid) {
          _this2.$post(_this2.url[_this2.activeName], _this2.ruleForm).then(function () {
            _this2.$message({
              message: '添加成功',
              type: 'success'
            });
            _this2.showMaskArr[_this2.activeName].show = false;
            _this2.resetForm('ruleForm');
            _this2.getShopInfo(_this2.url[_this2.activeName]);
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
        } else {
          console.log('error submit!!');
          return false;
        }
      });
    },
    submitForm1: function submitForm1() {
      var _this3 = this;

      var addObj = {
        name: this.newRuleForm[1].name,
        status: this.newRuleForm[1].status
      };
      this.$post(this.url[1], addObj).then(function () {
        _this3.$message({
          message: '添加成功',
          type: 'success'
        });
        _this3.showMaskArr[_this3.activeName].show = false;
        _this3.getShopInfo(_this3.url[_this3.activeName]);
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
    resetForm: function resetForm(formName) {
      this.$refs[formName].resetFields();
    },

    /*删除*/
    delClick: function delClick(row, e) {
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
      var _this4 = this;

      this.$del(this.url[this.activeName] + '/' + id).then(function () {
        _this4.$message({
          message: '删除成功',
          type: 'success'
        });
        _this4.showDel = false;
        _this4.refresh();
      }, function (err) {
        if (err.response) {
          _this4.showDel = false;
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

    /*修改*/
    handleEdit: function handleEdit() {
      this.inputChange = true;
    },
    editType: function editType(row, index) {
      this.changeIndex = 'index' + index;
    },
    editSave: function editSave(index, row) {
      var _this5 = this;

      var newData = {};
      if (this.activeName == '0') {
        newData = {
          nick: row.nick,
          title: row.title,
          session_key: row.session_key,
          warehouse: row.warehouse.id,
          shop_account: row.shop_account,
          rebate: row.rebate,
          principal: row.principal,
          principal_mobile: row.principal_mobile,
          province: row.province,
          city: row.city,
          district: row.district,
          address: row.address,
          gross_profit_rate: row.gross_profit_rate,
          platform: row.platform.id,
          is_waybill: row.is_waybill
        };
      } else if (this.activeName == '1') {
        newData = {
          name: row.name,
          status: row.status
        };
      }
      if (this.inputChange) {
        this.$patch(this.url[this.activeName] + '/' + row.id, newData).then(function () {
          _this5.$message({
            message: '修改成功',
            type: 'success'
          });
          _this5.getShopInfo(_this5.url[_this5.activeName]);
          _this5.changeIndex = '';
          _this5.inputChange = false;
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
      } else {
        this.$message({
          message: '数据未改动',
          type: 'info'
        });
      }
    },
    editCancel: function editCancel() {
      this.$message({
        message: '取消修改',
        type: 'info'
      });
      this.changeIndex = '';
    },

    /*多删*/
    toggleChecked: function toggleChecked() {
      this.checkboxInit = !this.checkboxInit;
    },
    handleSelectionChange: function handleSelectionChange(val) {
      this.multipleSelection = val;
      var del = [];
      this.multipleSelection.forEach(function (selectedItem) {
        del.push(selectedItem.id);
      });
      this.delArr = del.join(',');
    },
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
          _this6.$del(_this6.url[_this6.activeName], { ids: _this6.delArr }).then(function () {
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

    /*刷新*/
    refresh: function refresh() {
      var _this7 = this;

      this.loading = true;
      this.getShopInfo(this.url[this.activeName]);
      setTimeout(function () {
        _this7.loading = false;
      }, 2000);
    },
    handleTabsClick: function handleTabsClick() {
      this.loading = true;
      this.getShopInfo(this.url[this.activeName]);
      this.shopPage = this.activeName == 0 ? true : false;
    },
    getData: function getData() {
      alert(this.searchBox);
    }
  },
  mounted: function mounted() {
    console.log(this.wareHouse);
    this.getShopInfo(this.url[0]);
    this.$store.dispatch('setOpt', this.newOpt);
    var that = this;
    $(window).resize(function () {
      that.$store.dispatch('setOpt', that.newOpt);
    });
  }
});

/***/ }),

/***/ 720:
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
                      return _vm.getData($event)
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
                      return _vm.getData($event)
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
                  attrs: {
                    data: _vm.getsInfo[0],
                    fit: "",
                    "highlight-current-row": "",
                    type: "index",
                    "element-loading-text": "拼命加载中",
                    "element-loading-spinner": "el-icon-loading",
                    "element-loading-background": "rgba(0, 0, 0, 0.6)"
                  },
                  on: { "selection-change": _vm.handleSelectionChange }
                },
                [
                  _c("el-table-column", {
                    attrs: {
                      type: "selection",
                      width: "95",
                      align: "center",
                      checked: _vm.checkboxInit
                    },
                    on: { change: _vm.toggleChecked }
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: { label: "卖家昵称", align: "center", width: "180" },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            _vm.changeIndex == "index" + scope.$index
                              ? _c(
                                  "span",
                                  [
                                    _c("el-input", {
                                      attrs: {
                                        size: "small",
                                        placeholder: "请输入卖家昵称"
                                      },
                                      on: { change: _vm.handleEdit },
                                      model: {
                                        value: scope.row.nick,
                                        callback: function($$v) {
                                          _vm.$set(scope.row, "nick", $$v)
                                        },
                                        expression: "scope.row.nick"
                                      }
                                    })
                                  ],
                                  1
                                )
                              : _c("span", [
                                  _vm._v(
                                    "\n                           " +
                                      _vm._s(scope.row.nick) +
                                      "\n                       "
                                  )
                                ])
                          ]
                        }
                      }
                    ])
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: { label: "店铺标题", align: "center", width: "200" },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            _vm.changeIndex == "index" + scope.$index
                              ? _c(
                                  "span",
                                  [
                                    _c("el-input", {
                                      attrs: {
                                        size: "small",
                                        placeholder: "输入店铺标题"
                                      },
                                      on: { change: _vm.handleEdit },
                                      model: {
                                        value: scope.row.title,
                                        callback: function($$v) {
                                          _vm.$set(scope.row, "title", $$v)
                                        },
                                        expression: "scope.row.title"
                                      }
                                    })
                                  ],
                                  1
                                )
                              : _c("span", [
                                  _vm._v(
                                    "\n                           " +
                                      _vm._s(scope.row.title) +
                                      "\n                       "
                                  )
                                ])
                          ]
                        }
                      }
                    ])
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: { label: "仓库", align: "center", width: "200" },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            _vm.changeIndex == "index" + scope.$index
                              ? _c(
                                  "span",
                                  [
                                    _c(
                                      "el-select",
                                      {
                                        attrs: { placeholder: "请选择仓库" },
                                        on: { change: _vm.handleEdit },
                                        model: {
                                          value: scope.row.warehouse.name,
                                          callback: function($$v) {
                                            _vm.$set(
                                              scope.row.warehouse,
                                              "name",
                                              $$v
                                            )
                                          },
                                          expression: "scope.row.warehouse.name"
                                        }
                                      },
                                      _vm._l(_vm.warehouse, function(item) {
                                        return _c("el-option", {
                                          key: item.id,
                                          attrs: {
                                            label: item.name,
                                            value: item.id
                                          }
                                        })
                                      })
                                    )
                                  ],
                                  1
                                )
                              : _c("span", [
                                  _vm._v(
                                    "\n                           " +
                                      _vm._s(scope.row.warehouse.name) +
                                      "\n                       "
                                  )
                                ])
                          ]
                        }
                      }
                    ])
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: {
                      label: "店铺返点(%)",
                      align: "center",
                      width: "160"
                    },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            _vm.changeIndex == "index" + scope.$index
                              ? _c(
                                  "span",
                                  [
                                    _c("el-input", {
                                      attrs: {
                                        size: "small",
                                        type: "number",
                                        placeholder: "输入店铺返点"
                                      },
                                      on: { change: _vm.handleEdit },
                                      model: {
                                        value: scope.row.title,
                                        callback: function($$v) {
                                          _vm.$set(scope.row, "title", $$v)
                                        },
                                        expression: "scope.row.title"
                                      }
                                    })
                                  ],
                                  1
                                )
                              : _c("span", [
                                  _vm._v(
                                    "\n                           " +
                                      _vm._s(scope.row.rebate) +
                                      "\n                       "
                                  )
                                ])
                          ]
                        }
                      }
                    ])
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: { label: "店铺电话", align: "center", width: "200" },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            _vm.changeIndex == "index" + scope.$index
                              ? _c(
                                  "span",
                                  [
                                    _c("el-input", {
                                      attrs: {
                                        size: "small",
                                        placeholder: "输入电话"
                                      },
                                      on: { change: _vm.handleEdit },
                                      model: {
                                        value: scope.row.principal_mobile,
                                        callback: function($$v) {
                                          _vm.$set(
                                            scope.row,
                                            "principal_mobile",
                                            $$v
                                          )
                                        },
                                        expression: "scope.row.principal_mobile"
                                      }
                                    })
                                  ],
                                  1
                                )
                              : _c("span", [
                                  _vm._v(
                                    "\n                           " +
                                      _vm._s(scope.row.principal_mobile) +
                                      "\n                       "
                                  )
                                ])
                          ]
                        }
                      }
                    ])
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: { label: "店铺类型", align: "center", width: "180" },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            _vm.changeIndex == "index" + scope.$index
                              ? _c(
                                  "span",
                                  [
                                    _c(
                                      "el-select",
                                      {
                                        attrs: { placeholder: "选择店铺类型" },
                                        on: { change: _vm.handleEdit },
                                        model: {
                                          value: scope.row.platform.name,
                                          callback: function($$v) {
                                            _vm.$set(
                                              scope.row.platform,
                                              "name",
                                              $$v
                                            )
                                          },
                                          expression: "scope.row.platform.name"
                                        }
                                      },
                                      _vm._l(_vm.platform, function(item) {
                                        return _c("el-option", {
                                          key: item.id,
                                          attrs: {
                                            label: item.name,
                                            value: item.id
                                          }
                                        })
                                      })
                                    )
                                  ],
                                  1
                                )
                              : _c("span", [
                                  _vm._v(
                                    "\n                           " +
                                      _vm._s(scope.row.platform.name) +
                                      "\n                       "
                                  )
                                ])
                          ]
                        }
                      }
                    ])
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: {
                      label: "店铺负责人",
                      align: "center",
                      width: "200"
                    },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            _vm.changeIndex == "index" + scope.$index
                              ? _c(
                                  "span",
                                  [
                                    _c("el-input", {
                                      attrs: {
                                        size: "small",
                                        placeholder: "输入负责人"
                                      },
                                      on: { change: _vm.handleEdit },
                                      model: {
                                        value: scope.row.principal,
                                        callback: function($$v) {
                                          _vm.$set(scope.row, "principal", $$v)
                                        },
                                        expression: "scope.row.principal"
                                      }
                                    })
                                  ],
                                  1
                                )
                              : _c("span", [
                                  _vm._v(
                                    "\n                           " +
                                      _vm._s(scope.row.principal) +
                                      "\n                       "
                                  )
                                ])
                          ]
                        }
                      }
                    ])
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: {
                      label: "发货地(省)",
                      align: "center",
                      width: "180"
                    },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            _vm.changeIndex == "index" + scope.$index
                              ? _c(
                                  "span",
                                  [
                                    _c("el-input", {
                                      attrs: {
                                        size: "small",
                                        placeholder: "输入省"
                                      },
                                      on: { change: _vm.handleEdit },
                                      model: {
                                        value: scope.row.province,
                                        callback: function($$v) {
                                          _vm.$set(scope.row, "province", $$v)
                                        },
                                        expression: "scope.row.province"
                                      }
                                    })
                                  ],
                                  1
                                )
                              : _c("span", [
                                  _vm._v(
                                    "\n                           " +
                                      _vm._s(scope.row.province) +
                                      "\n                       "
                                  )
                                ])
                          ]
                        }
                      }
                    ])
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: {
                      label: "发货地(市)",
                      align: "center",
                      width: "180"
                    },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            _vm.changeIndex == "index" + scope.$index
                              ? _c(
                                  "span",
                                  [
                                    _c("el-input", {
                                      attrs: {
                                        size: "small",
                                        placeholder: "输入市"
                                      },
                                      on: { change: _vm.handleEdit },
                                      model: {
                                        value: scope.row.city,
                                        callback: function($$v) {
                                          _vm.$set(scope.row, "city", $$v)
                                        },
                                        expression: "scope.row.city"
                                      }
                                    })
                                  ],
                                  1
                                )
                              : _c("span", [
                                  _vm._v(
                                    "\n                           " +
                                      _vm._s(scope.row.city) +
                                      "\n                       "
                                  )
                                ])
                          ]
                        }
                      }
                    ])
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: {
                      label: "发货地(区)",
                      align: "center",
                      width: "180"
                    },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            _vm.changeIndex == "index" + scope.$index
                              ? _c(
                                  "span",
                                  [
                                    _c("el-input", {
                                      attrs: {
                                        size: "small",
                                        placeholder: "输入市"
                                      },
                                      on: { change: _vm.handleEdit },
                                      model: {
                                        value: scope.row.district,
                                        callback: function($$v) {
                                          _vm.$set(scope.row, "district", $$v)
                                        },
                                        expression: "scope.row.district"
                                      }
                                    })
                                  ],
                                  1
                                )
                              : _c("span", [
                                  _vm._v(
                                    "\n                           " +
                                      _vm._s(scope.row.district) +
                                      "\n                       "
                                  )
                                ])
                          ]
                        }
                      }
                    ])
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: { label: "发货地址", align: "center", width: "180" },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            _vm.changeIndex == "index" + scope.$index
                              ? _c(
                                  "span",
                                  [
                                    _c("el-input", {
                                      attrs: {
                                        size: "small",
                                        placeholder: "输入地址"
                                      },
                                      on: { change: _vm.handleEdit },
                                      model: {
                                        value: scope.row.address,
                                        callback: function($$v) {
                                          _vm.$set(scope.row, "address", $$v)
                                        },
                                        expression: "scope.row.address"
                                      }
                                    })
                                  ],
                                  1
                                )
                              : _c("span", [
                                  _vm._v(
                                    "\n                           " +
                                      _vm._s(scope.row.address) +
                                      "\n                       "
                                  )
                                ])
                          ]
                        }
                      }
                    ])
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: {
                      label: "毛利差异(%)",
                      align: "center",
                      width: "180"
                    },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            _vm.changeIndex == "index" + scope.$index
                              ? _c(
                                  "span",
                                  [
                                    _c("el-input", {
                                      attrs: {
                                        size: "small",
                                        type: "number",
                                        placeholder: "输入毛利"
                                      },
                                      on: { change: _vm.handleEdit },
                                      model: {
                                        value: scope.row.gross_profit_rate,
                                        callback: function($$v) {
                                          _vm.$set(
                                            scope.row,
                                            "gross_profit_rate",
                                            $$v
                                          )
                                        },
                                        expression:
                                          "scope.row.gross_profit_rate"
                                      }
                                    })
                                  ],
                                  1
                                )
                              : _c("span", [
                                  _vm._v(
                                    "\n                           " +
                                      _vm._s(scope.row.gross_profit_rate) +
                                      "\n                       "
                                  )
                                ])
                          ]
                        }
                      }
                    ])
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: { label: "电子面单", align: "center", width: "180" },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            _vm.changeIndex == "index" + scope.$index
                              ? _c(
                                  "span",
                                  [
                                    _c(
                                      "el-select",
                                      {
                                        attrs: { placeholder: "请选择是或否" },
                                        on: { change: _vm.handleEdit },
                                        model: {
                                          value: scope.row.is_waybill,
                                          callback: function($$v) {
                                            _vm.$set(
                                              scope.row,
                                              "is_waybill",
                                              $$v
                                            )
                                          },
                                          expression: "scope.row.is_waybill"
                                        }
                                      },
                                      [
                                        _c("el-option", {
                                          attrs: { label: "是", value: "1" }
                                        }),
                                        _vm._v(" "),
                                        _c("el-option", {
                                          attrs: { label: "否", value: "0" }
                                        })
                                      ],
                                      1
                                    )
                                  ],
                                  1
                                )
                              : _c("span", [
                                  _c("i", {
                                    staticClass: "showStatus",
                                    class: {
                                      statusActive:
                                        scope.row.is_waybill == 0 ? false : true
                                    }
                                  }),
                                  _vm._v(
                                    "\n                           " +
                                      _vm._s(
                                        scope.row.is_waybill == 0 ? "否" : "是"
                                      ) +
                                      "\n                       "
                                  )
                                ])
                          ]
                        }
                      }
                    ])
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: { label: "操作", width: "220", align: "center" },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            _vm.changeIndex == "index" + scope.$index
                              ? _c(
                                  "span",
                                  [
                                    _c(
                                      "el-button",
                                      {
                                        attrs: { size: "mini" },
                                        on: {
                                          click: function($event) {
                                            _vm.editSave(
                                              scope.$index,
                                              scope.row
                                            )
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
                                        on: { click: _vm.editCancel }
                                      },
                                      [
                                        _vm._v(
                                          "取消\n                           "
                                        )
                                      ]
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
                                            _vm.editType(
                                              scope.row,
                                              scope.$index
                                            )
                                          }
                                        }
                                      },
                                      [_vm._v("编辑")]
                                    )
                                  ],
                                  1
                                ),
                            _vm._v(" "),
                            _c(
                              "el-button",
                              {
                                attrs: { size: "mini", type: "danger" },
                                on: {
                                  click: function($event) {
                                    _vm.delClick(scope.row, $event)
                                  }
                                }
                              },
                              [_vm._v("删除\n                           ")]
                            )
                          ]
                        }
                      }
                    ])
                  })
                ],
                1
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
                    data: _vm.getsInfo[1],
                    fit: "",
                    "highlight-current-row": "",
                    type: "index",
                    "element-loading-text": "拼命加载中",
                    "element-loading-spinner": "el-icon-loading",
                    "element-loading-background": "rgba(0, 0, 0, 0.6)"
                  },
                  on: { "selection-change": _vm.handleSelectionChange }
                },
                [
                  _c("el-table-column", {
                    attrs: {
                      type: "selection",
                      width: "95",
                      align: "center",
                      checked: _vm.checkboxInit
                    },
                    on: { change: _vm.toggleChecked }
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: { label: "平台类型名称", align: "center" },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            _vm.changeIndex == "index" + scope.$index
                              ? _c(
                                  "span",
                                  [
                                    _c("el-input", {
                                      attrs: {
                                        size: "small",
                                        placeholder: "请输入仓库名称"
                                      },
                                      on: { change: _vm.handleEdit },
                                      model: {
                                        value: scope.row.name,
                                        callback: function($$v) {
                                          _vm.$set(scope.row, "name", $$v)
                                        },
                                        expression: "scope.row.name"
                                      }
                                    })
                                  ],
                                  1
                                )
                              : _c("span", [
                                  _vm._v(
                                    "\n                           " +
                                      _vm._s(scope.row.name) +
                                      "\n                       "
                                  )
                                ])
                          ]
                        }
                      }
                    ])
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: { label: "状态", align: "center" },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            _vm.changeIndex == "index" + scope.$index
                              ? _c(
                                  "span",
                                  [
                                    _c(
                                      "el-select",
                                      {
                                        attrs: { placeholder: "请选择状态" },
                                        on: { change: _vm.handleEdit },
                                        model: {
                                          value: scope.row.status,
                                          callback: function($$v) {
                                            _vm.$set(scope.row, "status", $$v)
                                          },
                                          expression: "scope.row.status"
                                        }
                                      },
                                      [
                                        _c("el-option", {
                                          attrs: { label: "启用", value: "1" }
                                        }),
                                        _vm._v(" "),
                                        _c("el-option", {
                                          attrs: { label: "停用", value: "0" }
                                        })
                                      ],
                                      1
                                    )
                                  ],
                                  1
                                )
                              : _c("span", [
                                  _c("i", {
                                    staticClass: "showStatus",
                                    class: {
                                      statusActive:
                                        scope.row.status == 0 ? false : true
                                    }
                                  }),
                                  _vm._v(
                                    "\n                           " +
                                      _vm._s(
                                        scope.row.status == 0 ? "停用" : "启用"
                                      ) +
                                      "\n                       "
                                  )
                                ])
                          ]
                        }
                      }
                    ])
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: { label: "操作", width: "220", align: "center" },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            _vm.changeIndex == "index" + scope.$index
                              ? _c(
                                  "span",
                                  [
                                    _c(
                                      "el-button",
                                      {
                                        attrs: { size: "mini" },
                                        on: {
                                          click: function($event) {
                                            _vm.editSave(
                                              scope.$index,
                                              scope.row
                                            )
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
                                        on: { click: _vm.editCancel }
                                      },
                                      [
                                        _vm._v(
                                          "取消\n                           "
                                        )
                                      ]
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
                                            _vm.editType(
                                              scope.row,
                                              scope.$index
                                            )
                                          }
                                        }
                                      },
                                      [_vm._v("编辑")]
                                    )
                                  ],
                                  1
                                ),
                            _vm._v(" "),
                            _c(
                              "el-button",
                              {
                                attrs: { size: "mini", type: "danger" },
                                on: {
                                  click: function($event) {
                                    _vm.delClick(scope.row, $event)
                                  }
                                }
                              },
                              [_vm._v("删除\n                           ")]
                            )
                          ]
                        }
                      }
                    ])
                  })
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
        "el-dialog",
        {
          attrs: { title: "新增店铺信息", visible: _vm.showMaskArr[0].show },
          on: {
            "update:visible": function($event) {
              _vm.$set(_vm.showMaskArr[0], "show", $event)
            }
          }
        },
        [
          _c(
            "el-form",
            {
              ref: "ruleForm",
              staticClass: "half-form",
              attrs: {
                model: _vm.ruleForm,
                rules: _vm.rules,
                "label-width": "100px"
              }
            },
            [
              _c(
                "el-form-item",
                { attrs: { label: "卖家昵称", prop: "nick" } },
                [
                  _c("el-input", {
                    attrs: { placehold: "请输入卖家昵称" },
                    model: {
                      value: _vm.ruleForm.nick,
                      callback: function($$v) {
                        _vm.$set(_vm.ruleForm, "nick", $$v)
                      },
                      expression: "ruleForm.nick"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "店铺标题\n", prop: "title" } },
                [
                  _c("el-input", {
                    attrs: { placehold: "请输入店铺标题" },
                    model: {
                      value: _vm.ruleForm.title,
                      callback: function($$v) {
                        _vm.$set(_vm.ruleForm, "title", $$v)
                      },
                      expression: "ruleForm.title"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "SessionKey\n", prop: "session_key" } },
                [
                  _c("el-input", {
                    attrs: { placehold: "请输入SessionKey" },
                    model: {
                      value: _vm.ruleForm.session_key,
                      callback: function($$v) {
                        _vm.$set(_vm.ruleForm, "session_key", $$v)
                      },
                      expression: "ruleForm.session_key"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "默认仓库\n", prop: "warehouse_id" } },
                [
                  _c(
                    "el-select",
                    {
                      attrs: { placeholder: "请选择仓库" },
                      model: {
                        value: _vm.ruleForm.warehouse_id,
                        callback: function($$v) {
                          _vm.$set(_vm.ruleForm, "warehouse_id", $$v)
                        },
                        expression: "ruleForm.warehouse_id"
                      }
                    },
                    _vm._l(_vm.wareHouse, function(item) {
                      return _c("el-option", {
                        key: item.id,
                        attrs: { label: item.name, value: item.id }
                      })
                    })
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "店铺账号" } },
                [
                  _c("el-input", {
                    attrs: { placehold: "请输入店铺账号" },
                    model: {
                      value: _vm.ruleForm.shop_account,
                      callback: function($$v) {
                        _vm.$set(_vm.ruleForm, "shop_account", $$v)
                      },
                      expression: "ruleForm.shop_account"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "店铺密码\n" } },
                [
                  _c("el-input", {
                    attrs: { type: "password", placehold: "请输入店铺密码" },
                    model: {
                      value: _vm.ruleForm.shop_passwd,
                      callback: function($$v) {
                        _vm.$set(_vm.ruleForm, "shop_passwd", $$v)
                      },
                      expression: "ruleForm.shop_passwd"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "返点(%)\n" } },
                [
                  _c("el-input", {
                    attrs: { type: "number", placehold: "请输入返点" },
                    model: {
                      value: _vm.ruleForm.rebate,
                      callback: function($$v) {
                        _vm.$set(_vm.ruleForm, "rebate", $$v)
                      },
                      expression: "ruleForm.rebate"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "店铺负责人", prop: "principal" } },
                [
                  _c("el-input", {
                    attrs: { placehold: "请输入负责人" },
                    model: {
                      value: _vm.ruleForm.principal,
                      callback: function($$v) {
                        _vm.$set(_vm.ruleForm, "principal", $$v)
                      },
                      expression: "ruleForm.principal"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "负责人电话", prop: "principal_mobile" } },
                [
                  _c("el-input", {
                    attrs: { type: "tel", placehold: "请输入负责人电话" },
                    model: {
                      value: _vm.ruleForm.principal_mobile,
                      callback: function($$v) {
                        _vm.$set(_vm.ruleForm, "principal_mobile", $$v)
                      },
                      expression: "ruleForm.principal_mobile"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "发货地(省)", prop: "province" } },
                [
                  _c("el-input", {
                    attrs: { placehold: "请输入省" },
                    model: {
                      value: _vm.ruleForm.province,
                      callback: function($$v) {
                        _vm.$set(_vm.ruleForm, "province", $$v)
                      },
                      expression: "ruleForm.province"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "发货地(市)", prop: "city" } },
                [
                  _c("el-input", {
                    attrs: { placehold: "请输入市" },
                    model: {
                      value: _vm.ruleForm.city,
                      callback: function($$v) {
                        _vm.$set(_vm.ruleForm, "city", $$v)
                      },
                      expression: "ruleForm.city"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "发货地(区)", prop: "district" } },
                [
                  _c("el-input", {
                    attrs: { placehold: "请输入区" },
                    model: {
                      value: _vm.ruleForm.district,
                      callback: function($$v) {
                        _vm.$set(_vm.ruleForm, "district", $$v)
                      },
                      expression: "ruleForm.district"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "发货地址", prop: "address" } },
                [
                  _c("el-input", {
                    attrs: { placehold: "请输入地址" },
                    model: {
                      value: _vm.ruleForm.address,
                      callback: function($$v) {
                        _vm.$set(_vm.ruleForm, "address", $$v)
                      },
                      expression: "ruleForm.address"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "毛利差异(%)", prop: "gross_profit_rate" } },
                [
                  _c("el-input", {
                    attrs: { type: "number", placehold: "请输入区" },
                    model: {
                      value: _vm.ruleForm.gross_profit_rate,
                      callback: function($$v) {
                        _vm.$set(_vm.ruleForm, "gross_profit_rate", $$v)
                      },
                      expression: "ruleForm.gross_profit_rate"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "平台", prop: "platform_id" } },
                [
                  _c(
                    "el-select",
                    {
                      model: {
                        value: _vm.ruleForm.platform_id,
                        callback: function($$v) {
                          _vm.$set(_vm.ruleForm, "platform_id", $$v)
                        },
                        expression: "ruleForm.platform_id"
                      }
                    },
                    _vm._l(_vm.platForm, function(item) {
                      return _c("el-option", {
                        key: item.id,
                        attrs: { label: item.name, value: item.id }
                      })
                    })
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "电子面单" } },
                [
                  _c(
                    "el-select",
                    {
                      attrs: { placeholder: "请选择是否使用" },
                      model: {
                        value: _vm.ruleForm.is_waybill,
                        callback: function($$v) {
                          _vm.$set(_vm.ruleForm, "is_waybill", $$v)
                        },
                        expression: "ruleForm.is_waybill"
                      }
                    },
                    [
                      _c("el-option", { attrs: { label: "否", value: "0" } }),
                      _vm._v(" "),
                      _c("el-option", { attrs: { label: "是", value: "1" } })
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
                  on: {
                    click: function($event) {
                      _vm.submitForm("ruleForm")
                    }
                  }
                },
                [_vm._v("添加")]
              ),
              _vm._v(" "),
              _c(
                "el-button",
                {
                  on: {
                    click: function($event) {
                      _vm.resetForm("ruleForm")
                    }
                  }
                },
                [_vm._v("重置")]
              )
            ],
            1
          )
        ],
        1
      ),
      _vm._v(" "),
      _c("add-new", {
        attrs: {
          "visible-add": _vm.showMaskArr[1].show,
          title: _vm.title[1],
          "rule-form": _vm.newRuleForm[1],
          rules: _vm.newRules[1],
          "add-arr": _vm.addArr[1],
          url: _vm.url[1],
          "new-ref": _vm.refArr[1]
        },
        on: { submitEvent: _vm.submitForm1, "CB-dialog": _vm.CB_dialog }
      }),
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
      ),
      _vm._v(" "),
      _c("Pagination", { attrs: { "page-url": _vm.url[_vm.activeName] } }),
      _vm._v("\n\n       " + _vm._s(_vm.wareHouse) + "\n   ")
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
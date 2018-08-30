webpackJsonp([83],{

/***/ 462:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(548)
/* template */
var __vue_template__ = __webpack_require__(549)
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
Component.options.__file = "resources\\assets\\js\\views\\basicInf\\expenseTypeMag.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-0fb355e6", Component.options)
  } else {
    hotAPI.reload("data-v-0fb355e6", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 548:
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

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      newOpt: [{
        cnt: '新增',
        icon: 'bf-add',
        ent: this.addExpense
      }, {
        cnt: '删除',
        icon: 'bf-del',
        ent: this.delMore
      }, {
        cnt: '刷新',
        icon: 'bf-refresh',
        ent: this.refresh
      }],
      expenseType: [],
      checkboxInit: false,
      inputChange: false,
      changeIndex: '',
      multipleSelection: [],
      loading: true,
      showAdd: false,
      ruleForm: {
        type: '',
        name: '',
        code: '',
        default: false,
        mark: '',
        status: true
      },
      rules: {
        type: [{ required: true, message: '请输入标记代码', trigger: 'blur' }],
        name: [{ required: true, message: '请输入标记代码', trigger: 'blur' }],
        code: [{ required: true, message: '请输入标记代码', trigger: 'blur' }],
        mark: [{ required: true, message: '请输入标记代码', trigger: 'blur' }]
      },
      pagination: {
        current_page: 1,
        total: 0,
        per_page: 0
      },
      showDel: false,
      delId: '',
      delArr: [],
      defArr: [{
        value: '0',
        label: '0-否'
      }, {
        value: '1',
        label: '1-是'
      }],
      status: [{
        value: '0',
        label: '0-停用'
      }, {
        value: '1',
        label: '1-启用'
      }],
      feeCage: [],
      activeName: 'type',
      expenseCage: [],
      showCage: false,
      ruleForm2: {
        name: '',
        status: '1'
      },
      rules2: {
        name: [{ required: true, message: '请输入标记代码', trigger: 'blur' }]
      },
      showDel2: false,
      cateIndex: ''
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
    getExpenseType: function getExpenseType() {
      var _this = this;

      this.$fetch(this.urls.feetypes, { include: 'feeCategory' }).then(function (res) {
        _this.expenseType = res.data;
        _this.loading = false;
        var pg = res.meta.pagination;
        _this.$store.dispatch('feecates', '/feecates');
        _this.pagination.current_page = pg.current_page;
        _this.pagination.total = pg.total;
        _this.pagination.per_page = pg.per_page;
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
    addExpense: function addExpense() {
      this.showAdd = true;
    },
    submitForm: function submitForm(formName) {
      var _this2 = this;

      this.$refs[formName].validate(function (valid) {
        if (valid) {
          var data = {
            fee_category_id: _this2.ruleForm.type,
            name: _this2.ruleForm.name,
            code: _this2.ruleForm.code,
            remark: _this2.ruleForm.mark,
            is_default: _this2.ruleForm.default,
            status: _this2.ruleForm.status
          };
          _this2.$post(_this2.urls.feetypes, data).then(function () {
            _this2.showAdd = false;
            _this2.resetForm('ruleForm');
            _this2.getExpenseType();
            _this2.$message({
              message: '添加成功',
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
    resetForm: function resetForm(formName) {
      this.$refs[formName].resetFields();
    },
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
    handleEdit: function handleEdit() {
      this.inputChange = true;
    },
    editType: function editType(row, index) {
      this.changeIndex = 'index' + index;
    },
    editCate: function editCate(row, index) {
      this.cateIndex = 'index' + index;
    },
    editSave: function editSave(index, row) {
      var _this3 = this;

      var newData = {
        id: row.id,
        fee_category_id: row.fee_category_id,
        name: row.name,
        code: row.code,
        is_default: row.is_default,
        status: row.status,
        remark: row.remark
      };
      this.$patch(this.urls.feetypes + '/' + row.id, newData).then(function () {
        _this3.loading = true;
        _this3.getExpenseType();
        setTimeout(function () {
          _this3.loading = false;
          _this3.$message({
            message: '修改成功',
            type: 'success'
          });
          _this3.changeIndex = '';
          _this3.inputChange = false;
        }, 2000);
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
    delClick: function delClick(row, e) {
      this.showDel = true;
      $('.el-popper').css({ left: e.x - 100 + 'px', top: e.y - 125 + 'px' });
      this.delId = row.id;
    },
    editCancel: function editCancel() {
      this.$message({
        message: '取消修改',
        type: 'info'
      });
      this.changeIndex = '';
    },
    refresh: function refresh() {
      var _this4 = this;

      this.loading = true;
      this.getExpenseType();
      setTimeout(function () {
        _this4.loading = false;
      }, 2000);
    },
    handleCurrentChange: function handleCurrentChange(val) {
      var _this5 = this;

      this.$fetch(this.urls.feetypes + '?page=' + val).then(function (res) {
        _this5.expenseType = res.data;
        var pg = res.meta.pagination;
        _this5.pagination.current_page = pg.current_page;
      }, function (err) {
        _this5.$message.error({
          message: err.message
        });
      });
    },
    cancelD: function cancelD() {
      this.showDel = false;
      this.showDel2 = false;
      this.$message({
        message: '取消删除',
        type: 'info'
      });
    },
    confirmD: function confirmD(id) {
      var _this6 = this;

      this.$del(this.urls.feetypes + id).then(function () {
        _this6.showDel = false;
        _this6.getExpenseType();
        _this6.$message({
          message: '删除成功',
          type: 'success'
        });
      }, function (err) {
        if (err.response) {
          _this6.showDel = false;
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
    },
    delMore: function delMore() {
      var _this7 = this;

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
          _this7.$del(_this7.urls.feetypes, { ids: _this7.delArr }).then(function () {
            _this7.$message({
              message: '删除成功',
              type: 'success'
            });
            _this7.getExpenseType();
          }, function (err) {
            if (err.response) {
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
        }).catch(function () {
          _this7.$message({
            type: 'info',
            message: '已取消删除'
          });
        });
      }
    },

    //  获取费用类别
    getExpenseCage: function getExpenseCage() {
      var _this8 = this;

      this.$fetch(this.urls.feecates).then(function (res) {
        _this8.feeCage = res.data;
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
    },
    handleClick: function handleClick() {
      if ($('#tab-type').hasClass('is-active')) {
        this.newOpt[0].ent = this.addExpenseCage;
        this.newOpt[1].ent = this.delMoreCage;
        this.newOpt[2].ent = this.refreshCage;
        $('#page').hide();
      } else {
        this.newOpt[0].ent = this.addExpense;
        this.newOpt[1].ent = this.delMore;
        this.newOpt[2].ent = this.refresh;
        $('#page').show();
      }
    },

    //  新增
    addExpenseCage: function addExpenseCage() {
      this.showCage = true;
      this.ruleForm2.name = '';
    },
    submitForm2: function submitForm2(formName) {
      var _this9 = this;

      this.$refs[formName].validate(function (valid) {
        if (valid) {
          var data = {
            name: _this9.ruleForm2.name,
            status: _this9.ruleForm2.status
          };
          _this9.$post(_this9.urls.feecates, data).then(function () {
            _this9.showCage = false;
            _this9.getExpenseCage();
            _this9.$message({
              message: '添加成功',
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
              _this9.$message.error({
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

    //  删除
    delMoreCage: function delMoreCage() {
      var _this10 = this;

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
          _this10.$del(_this10.urls.feecates, { ids: _this10.delArr }).then(function () {
            _this10.getExpenseCage();
            _this10.$message({
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
              _this10.$message.error({
                message: str
              });
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
    refreshCage: function refreshCage() {
      var _this11 = this;

      this.loading = true;
      this.getExpenseCage();
      setTimeout(function () {
        _this11.loading = false;
      }, 2000);
    },
    delClick2: function delClick2(row, e) {
      this.showDel2 = true;
      $('.el-popper').css({ left: e.x - 100 + 'px', top: e.y - 125 + 'px' });
      this.delId = row.id;
    },
    confirmD2: function confirmD2(id) {
      var _this12 = this;

      this.$del(this.urls.feecates + '/' + id).then(function () {
        _this12.showDel2 = false;
        _this12.getExpenseCage();
        _this12.$message({
          message: '删除成功',
          type: 'success'
        });
      }, function (err) {
        if (err.response) {
          _this12.showDel2 = false;
          var arr = err.response.data.errors;
          var arr1 = [];
          for (var i in arr) {
            arr1.push(arr[i]);
          }
          var str = arr1.join(',');
          _this12.$message.error({
            message: str
          });
        }
      });
    },
    editCancel2: function editCancel2() {
      this.cateIndex = '';
      this.$message({
        message: '取消修改',
        type: 'info'
      });
    },
    editSave2: function editSave2(index, row) {
      var _this13 = this;

      var newData = {
        id: row.id,
        name: row.name,
        status: row.status
      };
      this.$patch(this.urls.feecates + '/' + row.id, newData).then(function () {
        _this13.loading = true;
        _this13.getExpenseCage();
        _this13.loading = false;
        _this13.cateIndex = '';
        _this13.inputChange = false;
        _this13.$message({
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
          _this13.$message.error({
            message: str
          });
        }
      });
    }
  },
  mounted: function mounted() {
    this.$store.dispatch('setOpt', this.newOpt);
    var that = this;
    $(window).resize(function () {
      that.$store.dispatch('setOpt', that.newOpt);
    });
    this.getExpenseType();
    this.getExpenseCage();
  }
});

/***/ }),

/***/ 549:
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
          on: { "tab-click": _vm.handleClick },
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
            { attrs: { label: "费用类型管理", name: "type" } },
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
                  attrs: { data: _vm.expenseType, fit: "", height: "400" },
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
                    attrs: { label: "类别", align: "center", width: "160" },
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
                                        attrs: {
                                          size: "small",
                                          placeholder: "请选择类型"
                                        },
                                        on: { change: _vm.handleEdit },
                                        model: {
                                          value: scope.row.fee_category_id,
                                          callback: function($$v) {
                                            _vm.$set(
                                              scope.row,
                                              "fee_category_id",
                                              $$v
                                            )
                                          },
                                          expression:
                                            "scope.row.fee_category_id"
                                        }
                                      },
                                      _vm._l(_vm.resData["feecates"], function(
                                        item
                                      ) {
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
                                    "\n                            " +
                                      _vm._s(scope.row["feeCategory"].name) +
                                      "\n                        "
                                  )
                                ])
                          ]
                        }
                      }
                    ])
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: { label: "类型名称", align: "center", width: "160" },
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
                                        placeholder: "输入名称"
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
                                    "\n                            " +
                                      _vm._s(scope.row.name) +
                                      "\n                        "
                                  )
                                ])
                          ]
                        }
                      }
                    ])
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: { label: "代码", align: "center", width: "200" },
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
                                        placeholder: "输入代码"
                                      },
                                      on: { change: _vm.handleEdit },
                                      model: {
                                        value: scope.row.code,
                                        callback: function($$v) {
                                          _vm.$set(scope.row, "code", $$v)
                                        },
                                        expression: "scope.row.code"
                                      }
                                    })
                                  ],
                                  1
                                )
                              : _c("span", [
                                  _vm._v(
                                    "\n                            " +
                                      _vm._s(scope.row.code) +
                                      "\n                        "
                                  )
                                ])
                          ]
                        }
                      }
                    ])
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: { label: "默认", align: "center", width: "120" },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            _vm.changeIndex == "index" + scope.$index
                              ? _c(
                                  "span",
                                  [
                                    _c("el-checkbox", {
                                      model: {
                                        value: scope.row.is_default,
                                        callback: function($$v) {
                                          _vm.$set(scope.row, "is_default", $$v)
                                        },
                                        expression: "scope.row.is_default"
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
                                        value: scope.row.is_default,
                                        callback: function($$v) {
                                          _vm.$set(scope.row, "is_default", $$v)
                                        },
                                        expression: "scope.row.is_default"
                                      }
                                    })
                                  ],
                                  1
                                )
                          ]
                        }
                      }
                    ])
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: { label: "状态", align: "center", width: "120" },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            _vm.changeIndex == "index" + scope.$index
                              ? _c(
                                  "span",
                                  [
                                    _c("el-checkbox", {
                                      model: {
                                        value: scope.row.status,
                                        callback: function($$v) {
                                          _vm.$set(scope.row, "status", $$v)
                                        },
                                        expression: "scope.row.status"
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
                                        value: scope.row.status,
                                        callback: function($$v) {
                                          _vm.$set(scope.row, "status", $$v)
                                        },
                                        expression: "scope.row.status"
                                      }
                                    })
                                  ],
                                  1
                                )
                          ]
                        }
                      }
                    ])
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: { label: "备注", width: "160", align: "center" },
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
                                        placeholder: "输入备注",
                                        type: "textarea"
                                      },
                                      on: { change: _vm.handleEdit },
                                      model: {
                                        value: scope.row.remark,
                                        callback: function($$v) {
                                          _vm.$set(scope.row, "remark", $$v)
                                        },
                                        expression: "scope.row.remark"
                                      }
                                    })
                                  ],
                                  1
                                )
                              : _c("span", [
                                  _vm._v(
                                    "\n                            " +
                                      _vm._s(scope.row.remark) +
                                      "\n                        "
                                  )
                                ])
                          ]
                        }
                      }
                    ])
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: { label: "操作", align: "center" },
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
                                          "取消\n                            "
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
                              [_vm._v("删除\n                            ")]
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
            { attrs: { label: "费用类别管理", name: "cage" } },
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
                  attrs: { data: _vm.feeCage, fit: "", height: "400" },
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
                    attrs: { label: "名称", align: "center" },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            _vm.cateIndex == "index" + scope.$index
                              ? _c(
                                  "span",
                                  [
                                    _c("el-input", {
                                      attrs: {
                                        size: "small",
                                        placeholder: "输入名称"
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
                                    "\n                            " +
                                      _vm._s(scope.row.name) +
                                      "\n                        "
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
                            _vm.cateIndex == "index" + scope.$index
                              ? _c(
                                  "span",
                                  [
                                    _c("el-checkbox", {
                                      model: {
                                        value: scope.row.status,
                                        callback: function($$v) {
                                          _vm.$set(scope.row, "status", $$v)
                                        },
                                        expression: "scope.row.status"
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
                                        value: scope.row.status,
                                        callback: function($$v) {
                                          _vm.$set(scope.row, "status", $$v)
                                        },
                                        expression: "scope.row.status"
                                      }
                                    })
                                  ],
                                  1
                                )
                          ]
                        }
                      }
                    ])
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: { label: "操作", align: "center" },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            _vm.cateIndex == "index" + scope.$index
                              ? _c(
                                  "span",
                                  [
                                    _c(
                                      "el-button",
                                      {
                                        attrs: { size: "mini" },
                                        on: {
                                          click: function($event) {
                                            _vm.editSave2(
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
                                        on: { click: _vm.editCancel2 }
                                      },
                                      [
                                        _vm._v(
                                          "取消\n                            "
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
                                            _vm.editCate(
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
                                    _vm.delClick2(scope.row, $event)
                                  }
                                }
                              },
                              [_vm._v("删除\n                            ")]
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
          attrs: { title: "新增费用类型", visible: _vm.showAdd },
          on: {
            "update:visible": function($event) {
              _vm.showAdd = $event
            }
          }
        },
        [
          _c(
            "el-form",
            {
              ref: "ruleForm",
              staticClass: "demo-ruleForm",
              attrs: {
                model: _vm.ruleForm,
                rules: _vm.rules,
                "label-width": "100px"
              }
            },
            [
              _c(
                "el-form-item",
                { attrs: { label: "费用类别", prop: "type" } },
                [
                  _c(
                    "el-select",
                    {
                      attrs: { placeholder: "请选择状态" },
                      model: {
                        value: _vm.ruleForm.type,
                        callback: function($$v) {
                          _vm.$set(_vm.ruleForm, "type", $$v)
                        },
                        expression: "ruleForm.type"
                      }
                    },
                    _vm._l(_vm.resData["feecates"], function(item) {
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
                { attrs: { label: "费用名称\n", prop: "name" } },
                [
                  _c("el-input", {
                    attrs: { placehold: "请输入标记名称" },
                    model: {
                      value: _vm.ruleForm.name,
                      callback: function($$v) {
                        _vm.$set(_vm.ruleForm, "name", $$v)
                      },
                      expression: "ruleForm.name"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "费用代码\n", prop: "code" } },
                [
                  _c("el-input", {
                    attrs: { placehold: "请输入标记名称" },
                    model: {
                      value: _vm.ruleForm.code,
                      callback: function($$v) {
                        _vm.$set(_vm.ruleForm, "code", $$v)
                      },
                      expression: "ruleForm.code"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "类别备注\n", prop: "mark" } },
                [
                  _c("el-input", {
                    attrs: { type: "textarea", placehold: "请输入标记名称" },
                    model: {
                      value: _vm.ruleForm.mark,
                      callback: function($$v) {
                        _vm.$set(_vm.ruleForm, "mark", $$v)
                      },
                      expression: "ruleForm.mark"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "是否默认\n", prop: "default" } },
                [
                  _c("el-checkbox", {
                    model: {
                      value: _vm.ruleForm.default,
                      callback: function($$v) {
                        _vm.$set(_vm.ruleForm, "default", $$v)
                      },
                      expression: "ruleForm.default"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "状态", prop: "status" } },
                [
                  _c("el-checkbox", {
                    model: {
                      value: _vm.ruleForm.status,
                      callback: function($$v) {
                        _vm.$set(_vm.ruleForm, "status", $$v)
                      },
                      expression: "ruleForm.status"
                    }
                  })
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
      _c(
        "el-dialog",
        {
          attrs: { title: "新增费用类别", visible: _vm.showCage },
          on: {
            "update:visible": function($event) {
              _vm.showCage = $event
            }
          }
        },
        [
          _c(
            "el-form",
            {
              ref: "ruleForm2",
              staticClass: "demo-ruleForm",
              attrs: {
                model: _vm.ruleForm2,
                rules: _vm.rules2,
                "label-width": "100px"
              }
            },
            [
              _c(
                "el-form-item",
                { attrs: { label: "费用名称\n", prop: "name" } },
                [
                  _c("el-input", {
                    attrs: { placehold: "请输入标记名称" },
                    model: {
                      value: _vm.ruleForm2.name,
                      callback: function($$v) {
                        _vm.$set(_vm.ruleForm2, "name", $$v)
                      },
                      expression: "ruleForm2.name"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "状态" } },
                [
                  _c(
                    "el-select",
                    {
                      attrs: { placeholder: "请选择状态" },
                      model: {
                        value: _vm.ruleForm2.status,
                        callback: function($$v) {
                          _vm.$set(_vm.ruleForm2, "status", $$v)
                        },
                        expression: "ruleForm2.status"
                      }
                    },
                    [
                      _c("el-option", { attrs: { label: "停用", value: "0" } }),
                      _vm._v(" "),
                      _c("el-option", { attrs: { label: "启用", value: "1" } })
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
                      _vm.submitForm2("ruleForm2")
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
                      _vm.resetForm("ruleForm2")
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
      _c(
        "div",
        { ref: "pagination", attrs: { id: "page" } },
        [
          _c("el-pagination", {
            attrs: {
              "current-page": _vm.pagination.current_page,
              "page-size": _vm.pagination.per_page,
              layout: "total, prev, pager, next, jumper",
              total: _vm.pagination.total
            },
            on: { "current-change": _vm.handleCurrentChange }
          })
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
      ),
      _vm._v(" "),
      _c(
        "el-popover",
        {
          attrs: { slot: "tip", placement: "top", width: "160" },
          slot: "tip",
          model: {
            value: _vm.showDel2,
            callback: function($$v) {
              _vm.showDel2 = $$v
            },
            expression: "showDel2"
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
                      _vm.confirmD2(_vm.delId)
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-0fb355e6", module.exports)
  }
}

/***/ })

});
webpackJsonp([107],{

/***/ 471:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(5)
/* script */
var __vue_script__ = __webpack_require__(693)
/* template */
var __vue_template__ = __webpack_require__(694)
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
Component.options.__file = "resources\\assets\\js\\views\\basicInf\\freightType.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-298d19fe", Component.options)
  } else {
    hotAPI.reload("data-v-298d19fe", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 693:
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
      freightType: [],
      checkboxInit: false,
      inputChange: false,
      changeIndex: '',
      multipleSelection: [],
      loading: true,
      showAdd: false,
      ruleForm: {
        name: '',
        default: '0',
        status: '1'
      },
      rules: {
        name: [{ required: true, message: '请输入标记代码', trigger: 'blur' }]
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
      }]
    };
  },

  methods: {
    //修改opt宽度
    changeOptWidth: function changeOptWidth() {
      this.$store.state.opt.opts = this.newOpt;
      this.$store.commit('change', this.newOpt);
    },
    getFreightType: function getFreightType() {
      var _this = this;

      this.$fetch('/freighttypes').then(function (res) {
        _this.freightType = res.data;
        _this.loading = false;
        var pg = res.meta.pagination;
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
            name: _this2.ruleForm.name,
            is_default: _this2.ruleForm.default,
            status: _this2.ruleForm.status
          };
          _this2.$post('/freighttypes', data).then(function () {
            _this2.$message({
              message: '添加成功',
              type: 'success'
            });
            _this2.showAdd = false;
            _this2.getFreightType();
            _this2.resetForm('ruleForm');
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
    editSave: function editSave(index, row) {
      var _this3 = this;

      var newData = {
        id: row.id,
        name: row.name,
        is_default: row.is_default,
        status: row.status
      };
      if (this.inputChange) {
        this.$patch('/freighttypes/' + row.id, newData).then(function () {
          _this3.loading = true;
          _this3.getFreightType();
          _this3.loading = false;
          _this3.$message({
            message: '修改成功',
            type: 'success'
          });
          _this3.changeIndex = '';
          _this3.inputChange = false;
          /*  setTimeout(() => {
              this.loading = false;
              this.$message({
                message: '修改成功',
                type: 'success'
              });
              this.changeIndex = '';
              this.inputChange = false;
            }, 2000)*/
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
      } else {
        this.$message({
          message: '数据未改动',
          type: 'info'
        });
      }
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
      this.getFreightType();
      setTimeout(function () {
        _this4.loading = false;
      }, 2000);
    },
    handleCurrentChange: function handleCurrentChange(val) {
      var _this5 = this;

      this.$fetch('/freighttypes?page=' + val).then(function (res) {
        _this5.freightType = res.data;
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
      this.$message({
        message: '取消删除',
        type: 'info'
      });
    },
    confirmD: function confirmD(id) {
      var _this6 = this;

      this.$del('/freighttypes/' + id).then(function () {
        _this6.$message({
          message: '删除成功',
          type: 'success'
        });
        _this6.showDel = false;
        _this6.getFreightType();
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
          _this7.$del("/freighttypes", { ids: _this7.delArr }).then(function () {
            _this7.$message({
              message: '删除成功',
              type: 'success'
            });
            _this7.getFreightType();
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
    }
  },
  mounted: function mounted() {
    this.changeOptWidth();
    var that = this;
    $(window).resize(function () {
      that.changeOptWidth();
    });
    this.getFreightType();
  }
});

/***/ }),

/***/ 694:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
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
            data: _vm.freightType,
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
            attrs: { label: "名称", align: "center", width: "250" },
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
                              attrs: { size: "small", placeholder: "输入名称" },
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
            attrs: { label: "默认", align: "center", width: "250" },
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
                                attrs: { placeholder: "状态" },
                                on: { change: _vm.handleEdit },
                                model: {
                                  value: scope.row.is_default,
                                  callback: function($$v) {
                                    _vm.$set(scope.row, "is_default", $$v)
                                  },
                                  expression: "scope.row.is_default"
                                }
                              },
                              _vm._l(_vm.defArr, function(item) {
                                return _c("el-option", {
                                  key: item.value,
                                  attrs: {
                                    label: item.label,
                                    value: item.value
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
                              _vm._s(scope.row.is_default == 0 ? "否" : "是") +
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
            attrs: { label: "状态", align: "center", width: "250" },
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
                                attrs: { placeholder: "状态" },
                                on: { change: _vm.handleEdit },
                                model: {
                                  value: scope.row.status,
                                  callback: function($$v) {
                                    _vm.$set(scope.row, "status", $$v)
                                  },
                                  expression: "scope.row.status"
                                }
                              },
                              _vm._l(_vm.status, function(item) {
                                return _c("el-option", {
                                  key: item.value,
                                  attrs: {
                                    label: item.label,
                                    value: item.value
                                  }
                                })
                              })
                            )
                          ],
                          1
                        )
                      : _c("span", [
                          _c("i", {
                            staticClass: "showStatus",
                            class: {
                              statusActive: scope.row.status == 0 ? false : true
                            }
                          }),
                          _vm._v(
                            "\n                            " +
                              _vm._s(scope.row.status == 0 ? "停用" : "启用") +
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
                                    _vm.editSave(scope.$index, scope.row)
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
                              [_vm._v("取消\n                            ")]
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
                                    _vm.editType(scope.row, scope.$index)
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
                      [_vm._v("删除\n                    ")]
                    )
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
        "el-dialog",
        {
          attrs: { title: "新增运费类型", visible: _vm.showAdd },
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
                { attrs: { label: "运费类型\n", prop: "name" } },
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
                { attrs: { label: "是否默认\n", prop: "default" } },
                [
                  _c(
                    "el-select",
                    {
                      attrs: { placeholder: "请选择是或否" },
                      model: {
                        value: _vm.ruleForm.default,
                        callback: function($$v) {
                          _vm.$set(_vm.ruleForm, "default", $$v)
                        },
                        expression: "ruleForm.default"
                      }
                    },
                    [
                      _c("el-option", { attrs: { label: "0-否", value: "0" } }),
                      _vm._v(" "),
                      _c("el-option", { attrs: { label: "1-是", value: "1" } })
                    ],
                    1
                  )
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
                        value: _vm.ruleForm.status,
                        callback: function($$v) {
                          _vm.$set(_vm.ruleForm, "status", $$v)
                        },
                        expression: "ruleForm.status"
                      }
                    },
                    [
                      _c("el-option", { attrs: { label: "停用", value: "0" } }),
                      _vm._v(" "),
                      _c("el-option", {
                        attrs: { label: "启用", value: "1", selected: "" }
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-298d19fe", module.exports)
  }
}

/***/ })

});
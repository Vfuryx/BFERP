webpackJsonp([5],{

/***/ 465:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(682)
}
var normalizeComponent = __webpack_require__(5)
/* script */
var __vue_script__ = __webpack_require__(684)
/* template */
var __vue_template__ = __webpack_require__(685)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = "data-v-1d4fcfeb"
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
Component.options.__file = "resources\\assets\\js\\views\\basicInf\\accountType.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-1d4fcfeb", Component.options)
  } else {
    hotAPI.reload("data-v-1d4fcfeb", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 682:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(683);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(8)("38194b9e", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../node_modules/_css-loader@0.28.11@css-loader/index.js!../../../../../node_modules/_vue-loader@13.7.2@vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-1d4fcfeb\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/_sass-loader@6.0.7@sass-loader/lib/loader.js!../../../../../node_modules/_vue-loader@13.7.2@vue-loader/lib/selector.js?type=styles&index=0!./accountType.vue", function() {
     var newContent = require("!!../../../../../node_modules/_css-loader@0.28.11@css-loader/index.js!../../../../../node_modules/_vue-loader@13.7.2@vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-1d4fcfeb\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/_sass-loader@6.0.7@sass-loader/lib/loader.js!../../../../../node_modules/_vue-loader@13.7.2@vue-loader/lib/selector.js?type=styles&index=0!./accountType.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 683:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(6)(false);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 684:
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

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      newOpt: [{
        cnt: '新增',
        icon: 'bf-add',
        ent: this.addType
      }, {
        cnt: '删除',
        icon: 'bf-del',
        ent: this.delMore
      }, {
        cnt: '刷新',
        icon: 'bf-refresh',
        ent: this.refresh
      }],
      accountType: [],
      showMask: false,
      ruleForm: {
        name: '',
        status: ''
      },
      rules: {
        name: [{ required: true, message: '请输入类型名', trigger: 'blur' }],
        status: [{ required: true, message: '请选择状态', trigger: 'change' }]
      },
      pagination: {
        current_page: 1,
        total: 0,
        per_page: 0
      },
      showDel: false,
      delId: '',
      delArr: [],
      checkboxInit: false,
      multipleSelection: [],
      changeIndex: '',
      inputChange: false,
      status: [{
        value: '0',
        label: '0-停用'
      }, {
        value: '1',
        label: '1-启用'
      }],
      loading: true
    };
  },

  methods: {
    //修改opt宽度
    changeOptWidth: function changeOptWidth() {
      this.$store.state.opt.opts = this.newOpt;
      this.$store.commit('change', this.newOpt);
    },

    //获取数据
    getAccountType: function getAccountType() {
      var _this = this;

      this.$fetch('/acctypes').then(function (res) {
        _this.accountType = res.data;
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

    //新增
    addType: function addType() {
      this.showMask = true;
    },

    //添加
    submitForm: function submitForm(formName) {
      var _this2 = this;

      this.$refs[formName].validate(function (valid) {
        if (valid) {
          var data = {
            name: _this2.ruleForm.name,
            status: _this2.ruleForm.status
          };
          _this2.$post('/acctypes', data).then(function () {
            _this2.$message({
              message: '添加成功',
              type: 'success'
            });
            _this2.showMask = false;
            _this2.getAccountType();
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

    //格式化输入
    resetForm: function resetForm(formName) {
      this.$refs[formName].resetFields();
    },

    //分页请求
    handleCurrentChange: function handleCurrentChange(val) {
      var _this3 = this;

      this.$fetch('/acctypes?page=' + val).then(function (res) {
        _this3.accountType = res.data;
        var pg = res.meta.pagination;
        _this3.pagination.current_page = pg.current_page;
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

    //刷新
    refresh: function refresh() {
      var _this4 = this;

      this.loading = true;
      this.getAccountType();
      setTimeout(function () {
        _this4.loading = false;
      }, 2000);
    },

    //点击删除
    delClick: function delClick(row, e) {
      this.showDel = true;
      $('.el-popper').css({ left: e.x - 100 + 'px', top: e.y - 125 + 'px' });
      this.delId = row.id;
    },

    //执行删除
    delConfirm: function delConfirm(id) {
      var _this5 = this;

      this.$del('/acctypes/' + id).then(function () {
        _this5.$message({
          message: '删除成功',
          type: 'success'
        });
        _this5.showDel = false;
        _this5.getAccountType();
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

    //取消删除
    delCancel: function delCancel() {
      this.showDel = false;
      this.$message({
        message: '取消删除',
        type: 'info'
      });
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

    //批量删除
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
          _this6.$del("/acctypes", { ids: _this6.delArr }).then(function () {
            _this6.$message({
              message: '删除成功',
              type: 'success'
            });
            _this6.getAccountType();
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

    //  修改
    editType: function editType(row, index) {
      this.changeIndex = 'index' + index;
    },
    handleEdit: function handleEdit() {
      this.inputChange = true;
    },

    //保存修改
    editSave: function editSave(index, row) {
      var _this7 = this;

      var newData = {
        id: row.id,
        name: row.name,
        status: row.status
      };
      if (this.inputChange) {
        this.$patch('/acctypes/' + row.id, newData).then(function () {
          _this7.$message({
            message: '修改成功',
            type: 'success'
          });
          _this7.changeIndex = '';
          _this7.inputChange = false;
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
    }
  },
  mounted: function mounted() {
    this.changeOptWidth();
    var that = this;
    $(window).resize(function () {
      that.changeOptWidth();
    });
    this.getAccountType();
    this.handleCurrentChange(1);
  }
});

/***/ }),

/***/ 685:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
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
              data: _vm.accountType,
              fit: "",
              "highlight-current-row": "",
              type: "index",
              "element-loading-text": "拼命加载中",
              "element-loading-spinner": "el-icon-loading",
              "element-loading-background": "rgba(0, 0, 0, 0.8)"
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
              attrs: { label: "类型", align: "center", width: "220" },
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
                                  placeholder: "输入类型"
                                },
                                on: {
                                  change: function($event) {
                                    _vm.handleEdit(scope.$index, scope.row)
                                  }
                                },
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
                              "\n                        " +
                                _vm._s(scope.row.name) +
                                "\n                    "
                            )
                          ])
                    ]
                  }
                }
              ])
            }),
            _vm._v(" "),
            _c("el-table-column", {
              attrs: { label: "状态", align: "center", width: "220" },
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
                                  on: {
                                    change: function($event) {
                                      _vm.handleEdit(scope.$index, scope.row)
                                    }
                                  },
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
                                statusActive:
                                  scope.row.status == 0 ? false : true
                              }
                            }),
                            _vm._v(
                              "\n                        " +
                                _vm._s(
                                  scope.row.status == 0 ? "停用" : "启用"
                                ) +
                                "\n                    "
                            )
                          ])
                    ]
                  }
                }
              ])
            }),
            _vm._v(" "),
            _c("el-table-column", {
              attrs: { prop: "created_at", label: "创建时间", align: "center" }
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
            attrs: { title: "新增记账类型", visible: _vm.showMask },
            on: {
              "update:visible": function($event) {
                _vm.showMask = $event
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
                  { attrs: { label: "类型", prop: "name" } },
                  [
                    _c("el-input", {
                      attrs: { placehold: "" },
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
                  { attrs: { label: "状态", prop: "status" } },
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
                        _c("el-option", {
                          attrs: { label: "停用", value: "0" }
                        }),
                        _vm._v(" "),
                        _c("el-option", {
                          attrs: { label: "启用", value: "1" }
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
          { ref: "pagination" },
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
                    on: { click: _vm.delCancel }
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
                        _vm.delConfirm(_vm.delId)
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
      ]
    ],
    2
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-1d4fcfeb", module.exports)
  }
}

/***/ })

});
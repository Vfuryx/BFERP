webpackJsonp([96],{

/***/ 458:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(5)
/* script */
var __vue_script__ = __webpack_require__(665)
/* template */
var __vue_template__ = __webpack_require__(666)
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
Component.options.__file = "resources\\assets\\js\\views\\basicInf\\proCategoryMag.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-17964058", Component.options)
  } else {
    hotAPI.reload("data-v-17964058", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 665:
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
      goodsType: [],
      checkboxInit: false,
      inputChange: false,
      changeIndex: '',
      multipleSelection: [],
      loading: true,
      showAdd: false,
      ruleForm: {
        code: '',
        name: '',
        description: '',
        remark: '',
        status: 1
      },
      rules: {
        code: [{ required: true, message: '请输入商品代码', trigger: 'blur' }],
        name: [{ required: true, message: '请输入商品名称', trigger: 'blur' }]
      },
      pagination: {
        current_page: 1,
        total: 0,
        per_page: 0
      },
      showDel: false,
      delId: '',
      delArr: [],
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
    changeOptWidth: function changeOptWidth() {
      this.$store.state.opt.opts = this.newOpt;
      this.$store.commit('change', this.newOpt);
    },
    getGoodsType: function getGoodsType() {
      var _this = this;

      this.$fetch('/goodscates').then(function (res) {
        _this.goodsType = res.data;
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
            code: _this2.ruleForm.code,
            name: _this2.ruleForm.name,
            description: _this2.ruleForm.description,
            remark: _this2.ruleForm.remark,
            status: _this2.ruleForm.status
          };
          _this2.$post('/goodscates', data).then(function () {
            _this2.$message({
              message: '添加成功',
              type: 'success'
            });
            _this2.showAdd = false;
            _this2.getGoodsType();
            _this2.resetForm('ruleForm');
            _this2.ruleForm.description = '';
            _this2.ruleForm.remark = '';
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
        code: row.code,
        name: row.name,
        status: row.status,
        remark: row.remark,
        description: row.description
      };
      if (this.inputChange) {
        this.$patch('/goodscates/' + row.id, newData).then(function () {
          _this3.loading = true;
          _this3.getGoodsType();
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
      this.getGoodsType();
      setTimeout(function () {
        _this4.loading = false;
      }, 2000);
    },
    handleCurrentChange: function handleCurrentChange(val) {
      var _this5 = this;

      this.$fetch('/goodscates?page=' + val).then(function (res) {
        _this5.goodsType = res.data;
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

      this.$del('/goodscates/' + id).then(function () {
        _this6.$message({
          message: '删除成功',
          type: 'success'
        });
        _this6.showDel = false;
        _this6.getGoodsType();
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
          _this7.$del("/goodscates", { ids: _this7.delArr }).then(function () {
            _this7.$message({
              message: '删除成功',
              type: 'success'
            });
            _this7.getGoodsType();
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
    this.getGoodsType();
  }
});

/***/ }),

/***/ 666:
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
            data: _vm.goodsType,
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
            attrs: { label: "商品类别", align: "center", width: "180" },
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
                              attrs: { size: "small", placeholder: "商品类别" },
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
            attrs: { label: "类别代码", align: "center", width: "180" },
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
                              attrs: { size: "small", placeholder: "类别代码" },
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
            attrs: { label: "状态", align: "center", width: "200" },
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
            attrs: { label: "商品描述", align: "center", width: "200" },
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
                                type: "textarea",
                                size: "small",
                                placeholder: "输入描述"
                              },
                              on: { change: _vm.handleEdit },
                              model: {
                                value: scope.row.description,
                                callback: function($$v) {
                                  _vm.$set(scope.row, "description", $$v)
                                },
                                expression: "scope.row.description"
                              }
                            })
                          ],
                          1
                        )
                      : _c("span", [
                          _vm._v(
                            "\n                            " +
                              _vm._s(scope.row.description) +
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
            attrs: { label: "商品备注", align: "center", width: "200" },
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
                                type: "textarea",
                                size: "small",
                                placeholder: "输入备注"
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
          attrs: { title: "新增商品类别", visible: _vm.showAdd },
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
                { attrs: { label: "类别代码", prop: "code" } },
                [
                  _c("el-input", {
                    attrs: { placehold: "请输入代码" },
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
                { attrs: { label: "类别名称\n", prop: "name" } },
                [
                  _c("el-input", {
                    attrs: { placehold: "请输入名称" },
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
                { attrs: { label: "商品描述\n" } },
                [
                  _c("el-input", {
                    attrs: { type: "textarea", placehold: "请输入描述" },
                    model: {
                      value: _vm.ruleForm.description,
                      callback: function($$v) {
                        _vm.$set(_vm.ruleForm, "description", $$v)
                      },
                      expression: "ruleForm.description"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "商品备注\n" } },
                [
                  _c("el-input", {
                    attrs: { type: "textarea", placehold: "请输入备注" },
                    model: {
                      value: _vm.ruleForm.remark,
                      callback: function($$v) {
                        _vm.$set(_vm.ruleForm, "remark", $$v)
                      },
                      expression: "ruleForm.remark"
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-17964058", module.exports)
  }
}

/***/ })

});
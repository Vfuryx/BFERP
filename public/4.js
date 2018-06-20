webpackJsonp([4],{

/***/ 455:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(659)
}
var normalizeComponent = __webpack_require__(5)
/* script */
var __vue_script__ = __webpack_require__(661)
/* template */
var __vue_template__ = __webpack_require__(662)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = "data-v-553ae4d4"
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
Component.options.__file = "resources\\assets\\js\\views\\basicInf\\markerColorMag.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-553ae4d4", Component.options)
  } else {
    hotAPI.reload("data-v-553ae4d4", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 659:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(660);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(8)("292c9f8d", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../node_modules/_css-loader@0.28.11@css-loader/index.js!../../../../../node_modules/_vue-loader@13.7.2@vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-553ae4d4\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/_sass-loader@6.0.7@sass-loader/lib/loader.js!../../../../../node_modules/_vue-loader@13.7.2@vue-loader/lib/selector.js?type=styles&index=0!./markerColorMag.vue", function() {
     var newContent = require("!!../../../../../node_modules/_css-loader@0.28.11@css-loader/index.js!../../../../../node_modules/_vue-loader@13.7.2@vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-553ae4d4\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/_sass-loader@6.0.7@sass-loader/lib/loader.js!../../../../../node_modules/_vue-loader@13.7.2@vue-loader/lib/selector.js?type=styles&index=0!./markerColorMag.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 660:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(6)(false);
// imports


// module
exports.push([module.i, "\n.el-table_1_column_7 .cell i[data-v-553ae4d4] {\n  margin-right: 5px;\n  cursor: pointer;\n}\n", ""]);

// exports


/***/ }),

/***/ 661:
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
        ent: this.addNew
      }, {
        cnt: '刷新',
        icon: 'bf-refresh',
        ent: this.addNew
      }],
      colors: [],
      multipleTable: [],
      multipleSelection: [],
      checkboxInit: false,
      showMask: false,
      visible2: false,
      dele: '',
      cancelDel: '',
      newId: '',
      options: [{ value: '0', label: 0 }, { value: 1, label: 1 }],
      ruleForm: {
        code: '',
        name: '',
        color: '',
        status: '',
        desc: ''
      },
      rules: {
        code: [{ required: true, message: '请输入标记代码', trigger: 'blur' }],
        name: [{ required: true, message: '请输入标记名称', trigger: 'blur' }],
        status: [{ required: true, message: '请选择状态', trigger: 'change' }],
        desc: [{ required: true, message: '请填写描述', trigger: 'blur' }]
      }
    };
  },

  methods: {
    get: function get() {
      this.$http.get('http://bferp.test/api/markcolors').then(function (res) {
        this.colors = res.body.data;
      }, function (err) {
        console.log(err);
      });
    },
    addNew: function addNew() {
      $('.mask').css({ left: $('.logo').width() - 1 + 'px' });
      var leftW = $('.logo').width() * 0.5 + $('.inner').width() * 0.5;
      $('.inner').css({ marginLeft: -leftW + 'px' });
      this.showMask = true;
      $('.el-form-item__error').css({ left: 50 + 'px' });
    },
    submitForm: function submitForm(formName) {
      var _this = this;

      this.$refs[formName].validate(function (valid) {
        if (valid) {
          var url = 'http://bferp.test/api/markcolors';
          _this.$http.post(url, {
            markcode: _this.ruleForm.code,
            markname: _this.ruleForm.name,
            color: _this.ruleForm.color,
            description: _this.ruleForm.desc,
            status: _this.ruleForm.status
          }, { emulateJSON: true }).then(function (res) {
            _this.$message({
              message: '添加成功',
              type: 'success'
            });
            _this.showMask = false;
            _this.get();
          }).catch(function (err) {
            if (err.body.status_code === 422) {
              var arr = err.body.errors;
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
        } else {
          console.log('error submit!!');
          return false;
        }
      });
    },
    resetForm: function resetForm(formName) {
      this.$refs[formName].resetFields();
    },
    closeMask: function closeMask() {
      this.showMask = false;
    },
    edit: function edit(a) {
      console.log(a);
    },
    confirmD: function confirmD(id) {
      var _this2 = this;

      this.$http.delete('http://bferp.test/api/markcolors/' + id).then(function (res) {
        _this2.$message({
          message: '删除成功',
          type: 'success'
        });
        _this2.visible2 = false;
        _this2.get();
      }).catch(function (err) {
        _this2.visible2 = false;
        if (err.body.status_code === 404) {
          _this2.$message.error({
            message: '没有查询到相关数据'
          });
        }
      });
    },
    cancelD: function cancelD() {
      this.visible2 = false;
      this.$message({
        message: '取消删除',
        type: 'info'
      });
    },
    del: function del(b, e) {
      this.visible2 = true;
      $('.el-popper').css({ left: e.x - 100 + 'px', top: e.y - 125 + 'px' });
      this.newId = b;
    },
    toggleChecked: function toggleChecked() {
      this.checkboxInit = !this.checkboxInit;
    },
    selsChange: function selsChange(sels) {
      this.sels = sels;
    },
    handleCurrentChange: function handleCurrentChange(row, event, column) {}
  },
  create: function create() {},
  mounted: function mounted() {
    this.$store.state.opt.opts = this.newOpt;
    this.$store.commit('change', this.newOpt);
    var that = this;
    $(window).resize(function () {
      return function () {
        that.$store.state.opt.opts = that.newOpt;
        that.$store.commit('change', that.newOpt);
      }();
    });
    this.get();
  }
});

/***/ }),

/***/ 662:
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
          ref: "multipleTable",
          attrs: { data: _vm.colors, fit: "", "highlight-current-row": "" },
          on: {
            "row-click": _vm.handleCurrentChange,
            "selection-change": _vm.selsChange
          }
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
            attrs: { label: "标记代码", align: "center" },
            scopedSlots: _vm._u([
              {
                key: "default",
                fn: function(scope) {
                  return [
                    _vm._v(
                      "\n                " +
                        _vm._s(scope.row.markcode) +
                        "\n            "
                    )
                  ]
                }
              }
            ])
          }),
          _vm._v(" "),
          _c("el-table-column", {
            attrs: { label: "标记名称", width: "180", align: "center" },
            scopedSlots: _vm._u([
              {
                key: "default",
                fn: function(scope) {
                  return [_c("span", [_vm._v(_vm._s(scope.row.markname))])]
                }
              }
            ])
          }),
          _vm._v(" "),
          _c("el-table-column", {
            attrs: { label: "颜色", width: "180", align: "center" },
            scopedSlots: _vm._u([
              {
                key: "default",
                fn: function(scope) {
                  return [
                    _c("el-color-picker", {
                      model: {
                        value: scope.row.color,
                        callback: function($$v) {
                          _vm.$set(scope.row, "color", $$v)
                        },
                        expression: "scope.row.color"
                      }
                    })
                  ]
                }
              }
            ])
          }),
          _vm._v(" "),
          _c("el-table-column", {
            attrs: { label: "描述", width: "180", align: "center" },
            scopedSlots: _vm._u([
              {
                key: "default",
                fn: function(scope) {
                  return [
                    _vm._v(
                      "\n                " +
                        _vm._s(scope.row.description) +
                        "\n            "
                    )
                  ]
                }
              }
            ])
          }),
          _vm._v(" "),
          _c("el-table-column", {
            attrs: { align: "center", label: "状态", width: "200" },
            scopedSlots: _vm._u([
              {
                key: "default",
                fn: function(scope) {
                  return [
                    _c("span", [
                      _vm._v(_vm._s(scope.row.status === 0 ? "停用" : "启用"))
                    ])
                  ]
                }
              }
            ])
          }),
          _vm._v(" "),
          _c("el-table-column", {
            attrs: { label: "操作", width: "180", align: "center" },
            scopedSlots: _vm._u([
              {
                key: "default",
                fn: function(scope) {
                  return [
                    _c("i", {
                      staticClass: "el-icon-edit",
                      on: {
                        click: function($event) {
                          _vm.edit(scope.row.id)
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("i", {
                      staticClass: "el-icon-delete",
                      on: {
                        click: function($event) {
                          _vm.del(scope.row.id, $event)
                        }
                      },
                      model: {
                        value: _vm.newId,
                        callback: function($$v) {
                          _vm.newId = $$v
                        },
                        expression: "newId"
                      }
                    })
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
        "el-popover",
        {
          attrs: { slot: "tip", placement: "top", width: "160" },
          slot: "tip",
          model: {
            value: _vm.visible2,
            callback: function($$v) {
              _vm.visible2 = $$v
            },
            expression: "visible2"
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
                      _vm.confirmD(_vm.newId)
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
        "el-dialog",
        {
          attrs: { title: "新增颜色标记", visible: _vm.showMask },
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
                { attrs: { label: "标记代码", prop: "code" } },
                [
                  _c("el-input", {
                    attrs: { placehold: "" },
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
                { attrs: { label: "标记名称", prop: "name" } },
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
                { attrs: { label: "颜色" } },
                [
                  _c("el-color-picker", {
                    model: {
                      value: _vm.ruleForm.color,
                      callback: function($$v) {
                        _vm.$set(_vm.ruleForm, "color", $$v)
                      },
                      expression: "ruleForm.color"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "状态", prop: "state" } },
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
                      _c("el-option", { attrs: { label: "0", value: "0" } }),
                      _vm._v(" "),
                      _c("el-option", { attrs: { label: "1", value: "1" } })
                    ],
                    1
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "描述", prop: "desc" } },
                [
                  _c("el-input", {
                    attrs: { type: "textarea", placehode: "请输入描述" },
                    model: {
                      value: _vm.ruleForm.desc,
                      callback: function($$v) {
                        _vm.$set(_vm.ruleForm, "desc", $$v)
                      },
                      expression: "ruleForm.desc"
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-553ae4d4", module.exports)
  }
}

/***/ })

});
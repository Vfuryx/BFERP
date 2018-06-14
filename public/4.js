webpackJsonp([4],{

/***/ 449:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(654)
}
var normalizeComponent = __webpack_require__(5)
/* script */
var __vue_script__ = __webpack_require__(656)
/* template */
var __vue_template__ = __webpack_require__(657)
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

/***/ 654:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(655);
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

/***/ 655:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(6)(false);
// imports


// module
exports.push([module.i, "\n.mask[data-v-553ae4d4] {\n  width: 100%;\n  height: 100%;\n  position: fixed;\n  top: 0;\n  background-color: #cccccc;\n  z-index: 100;\n}\n.mask h2[data-v-553ae4d4] {\n    color: #444;\n}\n.mask .inner[data-v-553ae4d4] {\n    background-color: #fff;\n    text-align: center;\n    border-radius: 10px;\n    width: 600px;\n    height: 500px;\n    position: absolute;\n    left: 50%;\n    top: 50%;\n    margin-top: -250px;\n}\n.mask .inner .el-input.el-input--medium[data-v-553ae4d4], .mask .inner .el-textarea[data-v-553ae4d4], .mask .inner .el-select[data-v-553ae4d4] {\n      width: 92%;\n      margin-left: -35px !important;\n}\n.mask .inner .close[data-v-553ae4d4] {\n      cursor: pointer;\n      position: absolute;\n      right: 20px;\n      top: 20px;\n}\n", ""]);

// exports


/***/ }),

/***/ 656:
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
      showMask: false,
      value: '',
      code: '',
      mColor: '',
      textarea: '',

      options: [{ value: '0', label: 0 }, { value: 1, label: 1 }],

      ruleForm: {
        code: '2',
        name: '2',
        color: 'yellow',
        status: '2',
        desc: '2'
      },
      rules: {
        code: [{ required: true, message: '请输入标记代码', trigger: 'blur' }],
        name: [{ required: true, message: '请输入标记名称', trigger: 'blur' }],
        /*color: [
          { required: true, message: '请输入标记名称', trigger: 'blur' },
        ],*/
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
      /* this.$http.post(
         'http://bferp.test/api/markcolors',
         {
           markcode: this.ruleForm.code,
           markname: this.ruleForm.name,
           color: this.ruleForm.color,
           description: this.ruleForm.desc,
           status: this.ruleForm.status
         },
         {emulateJSON: true}
       )
         .then((res) => {
           alert('success');
         })
         .catch((err) => {
           console.log(err);
         });*/
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
          }, { emulateJSON: false }).then(function (res) {
            console.log(res);
            alert('添加成功');
          }).catch(function (err) {
            console.log(err);
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
      $('.close').parents('.mask').hide();
    }
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

/***/ 657:
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
          attrs: {
            data: _vm.colors,
            border: "",
            fit: "",
            "highlight-current-row": ""
          }
        },
        [
          _c("el-table-column", {
            attrs: { type: "selection", width: "95", align: "center" }
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
            attrs: {
              align: "center",
              label: "状态：0=停用，1=启用",
              width: "200"
            },
            scopedSlots: _vm._u([
              {
                key: "default",
                fn: function(scope) {
                  return [_c("span", [_vm._v(_vm._s(scope.row.status))])]
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
          directives: [
            {
              name: "show",
              rawName: "v-show",
              value: _vm.showMask,
              expression: "showMask"
            }
          ],
          staticClass: "mask"
        },
        [
          _c(
            "div",
            { staticClass: "inner" },
            [
              _c("h2", [_vm._v("新增颜色标记")]),
              _vm._v(" "),
              _c("i", {
                staticClass: "iconfont bf-close close",
                on: { click: _vm.closeMask }
              }),
              _vm._v(" "),
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
                          _c("el-option", {
                            attrs: { label: "0", value: "0" }
                          }),
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
                        attrs: { type: "textarea" },
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
                  ),
                  _vm._v(" "),
                  _c(
                    "el-form-item",
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-553ae4d4", module.exports)
  }
}

/***/ })

});
webpackJsonp([6],{

/***/ 447:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(595)
}
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(597)
/* template */
var __vue_template__ = __webpack_require__(598)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = "data-v-37b409a6"
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
Component.options.__file = "resources\\assets\\js\\views\\dashboard\\index.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-37b409a6", Component.options)
  } else {
    hotAPI.reload("data-v-37b409a6", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 595:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(596);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(6)("5dfc1aa3", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../node_modules/_css-loader@0.28.11@css-loader/index.js!../../../../../node_modules/_vue-loader@13.7.2@vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-37b409a6\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/_sass-loader@6.0.7@sass-loader/lib/loader.js!../../../../../node_modules/_vue-loader@13.7.2@vue-loader/lib/selector.js?type=styles&index=0!./index.vue", function() {
     var newContent = require("!!../../../../../node_modules/_css-loader@0.28.11@css-loader/index.js!../../../../../node_modules/_vue-loader@13.7.2@vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-37b409a6\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../node_modules/_sass-loader@6.0.7@sass-loader/lib/loader.js!../../../../../node_modules/_vue-loader@13.7.2@vue-loader/lib/selector.js?type=styles&index=0!./index.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 596:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(4)(false);
// imports


// module
exports.push([module.i, "\n.dashboard-container[data-v-37b409a6] {\n  margin: 30px;\n}\n.dashboard-text[data-v-37b409a6] {\n  font-size: 30px;\n  line-height: 46px;\n}\n", ""]);

// exports


/***/ }),

/***/ 597:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vuex__ = __webpack_require__(22);
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



/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'dashboard',
  data: function data() {
    return {
      newOpt: [],
      title: '新增',
      formDialog: {
        title: '测试',
        dialogFormVisible: false,
        form: [{
          label: '名称',
          type: 'text',
          formLabelWidth: '120px',
          name: 'hh'
        }, {
          label: '代码',
          type: 'text',
          formLabelWidth: '120px',
          name: 'vv'
        }, {
          label: '状态',
          type: 'select',
          formLabelWidth: '120px',
          ps: {
            s: '1'
          },
          status: [{
            label: '是',
            value: 1
          }, {
            label: '否',
            value: 0
          }]
        }]
      }
    };
  },

  computed: _extends({}, Object(__WEBPACK_IMPORTED_MODULE_0_vuex__["b" /* mapGetters */])(['name', 'roles']), {
    getKey: function getKey() {
      var arr = this.formDialog.form.ps;
    }
  }),
  components: {
    // addM
  },
  methods: {
    toggle: function toggle() {
      this.formDialog.dialogFormVisible = !this.formDialog.dialogFormVisible;
    },
    confirmAdd: function confirmAdd() {
      console.log(1);
    },
    cancelAdd: function cancelAdd() {
      console.log(2);
    }
  },
  mounted: function mounted() {
    this.$store.state.opt.opts = this.newOpt;
  }
});

/***/ }),

/***/ 598:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c(
      "div",
      { staticClass: "dashboard-container" },
      [
        _c("p", { staticClass: "dashboard-text" }, [
          _vm._v("name:" + _vm._s(_vm.name))
        ]),
        _vm._v(" "),
        _c(
          "p",
          { staticClass: "dashboard-text" },
          [
            _vm._v("roles:\n            "),
            _vm._l(_vm.roles, function(role) {
              return _c("span", { key: role }, [_vm._v(_vm._s(role))])
            })
          ],
          2
        ),
        _vm._v(" "),
        _c("el-button", { on: { click: _vm.toggle } }, [_vm._v("默认按钮")]),
        _vm._v(" "),
        _c(
          "el-dialog",
          {
            attrs: {
              title: _vm.formDialog.title,
              visible: _vm.formDialog.dialogFormVisible
            },
            on: {
              "update:visible": function($event) {
                _vm.$set(_vm.formDialog, "dialogFormVisible", $event)
              }
            }
          },
          [
            _c(
              "el-form",
              _vm._l(_vm.formDialog.form, function(item, index) {
                return _c(
                  "el-form-item",
                  {
                    key: item.key,
                    attrs: {
                      label: item.label,
                      "label-width": item.formLabelWidth
                    }
                  },
                  [
                    item.type == "text"
                      ? _c(
                          "span",
                          [
                            _c("el-input", {
                              attrs: { "auto-complete": "off" },
                              model: {
                                value: _vm.name,
                                callback: function($$v) {
                                  _vm.name = $$v
                                },
                                expression: "name"
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
                                    value: item.ps,
                                    callback: function($$v) {
                                      _vm.$set(item, "ps", $$v)
                                    },
                                    expression: "item.ps"
                                  }
                                },
                                _vm._l(item.status, function(list) {
                                  return _c("el-option", {
                                    key: list.key,
                                    attrs: {
                                      label: list.label,
                                      value: list.value
                                    }
                                  })
                                })
                              )
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
                _c("el-button", { on: { click: _vm.cancelAdd } }, [
                  _vm._v("取 消")
                ]),
                _vm._v(" "),
                _c(
                  "el-button",
                  { attrs: { type: "primary" }, on: { click: _vm.confirmAdd } },
                  [_vm._v("确 定")]
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
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-37b409a6", module.exports)
  }
}

/***/ })

});
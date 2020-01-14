webpackJsonp([114],{

/***/ 488:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(614)
/* template */
var __vue_template__ = __webpack_require__(615)
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
Component.options.__file = "resources\\assets\\js\\views\\basicInf\\distributeMag.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-62ecc016", Component.options)
  } else {
    hotAPI.reload("data-v-62ecc016", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 614:
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

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      newOpt: [{
        cnt: '新增',
        icon: 'bf-add',
        ent: this.test
      }, {
        cnt: '修改',
        icon: 'bf-change',
        ent: this.test
      }, {
        cnt: '删除',
        icon: 'bf-del',
        ent: this.test
      }, {
        cnt: '导入',
        icon: 'bf-in',
        ent: this.test
      }, {
        cnt: '导出',
        icon: 'bf-out',
        ent: this.test
      }, {
        cnt: '刷新',
        icon: 'bf-refresh',
        ent: this.test
      }],
      searchBox: {
        buyNick: '',
        shopTitle: ''
      },
      currentPage: true
    };
  },

  methods: {
    test: function test() {
      console.log(1);
    },
    getData: function getData() {
      alert(this.searchBox);
      console.log(this.searchBox);
    }
  },
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
  }
});

/***/ }),

/***/ 615:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _vm.currentPage
      ? _c("div", { staticClass: "searchBox" }, [
          _c(
            "span",
            [
              _c("label", [_vm._v("产品类别")]),
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
              _c("label", [_vm._v("配送商")]),
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
          ),
          _vm._v(" "),
          _c(
            "span",
            [
              _c("label", [_vm._v("省")]),
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
          ),
          _vm._v(" "),
          _c(
            "span",
            [
              _c("label", [_vm._v("市")]),
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
          ),
          _vm._v(" "),
          _c(
            "span",
            [
              _c("label", [_vm._v("区")]),
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
    _c("h2", [_vm._v("配送管理")])
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-62ecc016", module.exports)
  }
}

/***/ })

});
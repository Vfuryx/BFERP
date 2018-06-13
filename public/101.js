webpackJsonp([101],{

/***/ 449:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(5)
/* script */
var __vue_script__ = __webpack_require__(654)
/* template */
var __vue_template__ = __webpack_require__(655)
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
      multipleTable: []
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
      alert(1);
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

    this.get();
  }
});

/***/ }),

/***/ 655:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
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
                  "\n            " + _vm._s(scope.row.markcode) + "\n        "
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
                  "\n           " + _vm._s(scope.row.description) + "\n        "
                )
              ]
            }
          }
        ])
      }),
      _vm._v(" "),
      _c("el-table-column", {
        attrs: { align: "center", label: "状态：0=停用，1=启用", width: "200" },
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
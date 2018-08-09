webpackJsonp([86],{

/***/ 498:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(698)
/* template */
var __vue_template__ = __webpack_require__(699)
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
Component.options.__file = "resources\\assets\\js\\views\\dwnCenter\\orderDwn.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-4ccc13b4", Component.options)
  } else {
    hotAPI.reload("data-v-4ccc13b4", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 698:
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

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      newOpt: [{
        cnt: '下载',
        icon: 'bf-dwn',
        ent: this.test
      }],
      searchBox: {
        shop_name: '',
        dwn_type: '',
        pro_num: '',
        order_num: '',
        shopNames: [{ label: '店铺1', value: 0 }, { label: '店铺2', value: 1 }],
        work_date: ''
      },
      tableData3: [],
      multipleSelection: []
    };
  },

  methods: {
    test: function test() {
      console.log(1);
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

/***/ 699:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("h2", [_vm._v("订单下载")]),
      _vm._v(" "),
      _c("div", { staticClass: "box" }, [
        _c(
          "span",
          [
            _c("label", [_vm._v("店铺名称")]),
            _vm._v(" "),
            _c(
              "el-select",
              {
                attrs: { clearable: "", placeholder: "请选择" },
                model: {
                  value: _vm.searchBox.shop_name,
                  callback: function($$v) {
                    _vm.$set(_vm.searchBox, "shop_name", $$v)
                  },
                  expression: "searchBox.shop_name"
                }
              },
              _vm._l(_vm.searchBox.shopNames, function(item) {
                return _c("el-option", {
                  key: item.value,
                  attrs: { label: item.label, value: item.value }
                })
              })
            )
          ],
          1
        ),
        _vm._v(" "),
        _c(
          "span",
          [
            _c("label", [_vm._v("业务日期")]),
            _vm._v(" "),
            _c("el-date-picker", {
              attrs: {
                type: "daterange",
                "range-separator": "至",
                "start-placeholder": "开始日期",
                "end-placeholder": "结束日期"
              },
              model: {
                value: _vm.searchBox.work_date,
                callback: function($$v) {
                  _vm.$set(_vm.searchBox, "work_date", $$v)
                },
                expression: "searchBox.work_date"
              }
            })
          ],
          1
        ),
        _vm._v(" "),
        _c(
          "span",
          [
            _c("label", [_vm._v("买家昵称")]),
            _vm._v(" "),
            _c("el-input", {
              attrs: { clearable: "" },
              model: {
                value: _vm.searchBox.pro_num,
                callback: function($$v) {
                  _vm.$set(_vm.searchBox, "pro_num", $$v)
                },
                expression: "searchBox.pro_num"
              }
            })
          ],
          1
        ),
        _vm._v(" "),
        _c(
          "span",
          [
            _c("label", [_vm._v("订单编号")]),
            _vm._v(" "),
            _c("el-input", {
              attrs: { clearable: "" },
              model: {
                value: _vm.searchBox.order_num,
                callback: function($$v) {
                  _vm.$set(_vm.searchBox, "order_num", $$v)
                },
                expression: "searchBox.order_num"
              }
            })
          ],
          1
        )
      ]),
      _vm._v(" "),
      _c(
        "el-table",
        {
          ref: "multipleTable",
          staticStyle: { width: "100%" },
          attrs: { data: _vm.tableData3, "tooltip-effect": "dark" },
          on: { "selection-change": _vm.handleSelectionChange }
        },
        [
          _c("el-table-column", { attrs: { type: "selection", width: "55" } }),
          _vm._v(" "),
          _c("el-table-column", {
            attrs: { label: "订单交易号", width: "120" }
          }),
          _vm._v(" "),
          _c("el-table-column", {
            attrs: { prop: "", label: "应付金额", width: "120" }
          }),
          _vm._v(" "),
          _c("el-table-column", {
            attrs: { prop: "", label: "实付金额", "show-overflow-tooltip": "" }
          }),
          _vm._v(" "),
          _c("el-table-column", {
            attrs: { prop: "", label: "买家昵称", "show-overflow-tooltip": "" }
          }),
          _vm._v(" "),
          _c("el-table-column", {
            attrs: { prop: "", label: "创建时间", "show-overflow-tooltip": "" }
          }),
          _vm._v(" "),
          _c("el-table-column", {
            attrs: { prop: "", label: "订单状态", "show-overflow-tooltip": "" }
          }),
          _vm._v(" "),
          _c("el-table-column", {
            attrs: {
              prop: "",
              label: "分阶段状态",
              "show-overflow-tooltip": ""
            }
          })
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-4ccc13b4", module.exports)
  }
}

/***/ })

});
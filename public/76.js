webpackJsonp([76],{

/***/ 396:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(5)
/* script */
var __vue_script__ = __webpack_require__(541)
/* template */
var __vue_template__ = __webpack_require__(542)
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
Component.options.__file = "resources\\assets\\js\\views\\order\\customerService.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-7769224c", Component.options)
  } else {
    hotAPI.reload("data-v-7769224c", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 541:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      newOpt: [{
        cnt: '增加',
        icon: 'bf-add',
        ent: this.test,
        ref: 'add'
      }, {
        cnt: '修改',
        icon: 'bf-change',
        ent: this.test
      }, {
        cnt: '删除',
        icon: 'bf-del',
        ent: this.test
      }, {
        cnt: '锁定',
        icon: 'bf-lock',
        ent: this.test
      }, {
        cnt: '解锁',
        icon: 'bf-delock',
        ent: this.test
      }, {
        cnt: '审核',
        icon: 'bf-audit',
        ent: this.test
      }, {
        cnt: '退审',
        icon: 'bf-auditfaild',
        ent: this.test
      }, {
        cnt: '导出',
        icon: 'bf-out',
        ent: this.test
      }, {
        cnt: '合并',
        icon: 'bf-merge',
        ent: this.test
      }, {
        cnt: '拆分',
        icon: 'bf-node',
        ent: this.test
      }, {
        cnt: '转刷单',
        icon: 'bf-transa',
        ent: this.test
      }, {
        cnt: '上一条',
        icon: 'bf-beforeItem',
        ent: this.test
      }, {
        cnt: '下一条',
        icon: 'bf-nextItem',
        ent: this.test
      }, {
        cnt: '转补款',
        icon: 'bf-transferAcc',
        ent: this.test
      }, {
        cnt: '订单关联',
        icon: 'bf-asso',
        ent: this.test
      }, {
        cnt: '取消关联',
        icon: 'bf-cancelAsso',
        ent: this.test
      }, {
        cnt: '通知发货',
        icon: 'bf-deliNotice',
        ent: this.test
      }, {
        cnt: '打印',
        icon: 'bf-printer',
        ent: this.test
      }, {
        cnt: '转送款',
        icon: 'bf-giveMoney',
        ent: this.test
      }, {
        cnt: '刷新',
        icon: 'bf-refresh',
        ent: this.test
      }]
    };
  },

  computed: {},
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

/***/ 542:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm._m(0)
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", [_c("h2", [_vm._v("customerService客服部")])])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-7769224c", module.exports)
  }
}

/***/ })

});
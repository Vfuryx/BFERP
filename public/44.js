webpackJsonp([44],{

/***/ 478:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(592)
/* template */
var __vue_template__ = __webpack_require__(593)
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
Component.options.__file = "resources\\assets\\js\\views\\basicInf\\logisticsArea.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-2a2e12b8", Component.options)
  } else {
    hotAPI.reload("data-v-2a2e12b8", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 592:
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
        cnt: '新增',
        icon: 'bf-add',
        ent: this.addNew
      }, {
        cnt: '删除',
        icon: 'bf-del',
        ent: this.doDelMore
      }, {
        cnt: '刷新',
        icon: 'bf-refresh',
        ent: this.refresh
      }],
      tableKey: [[{
        label: '区域编码',
        width: '',
        prop: "code",
        holder: '请输入区域编码',
        type: 'text'
      }, {
        label: '区域名称',
        width: '',
        prop: "name",
        holder: '请输入区域名称',
        type: 'text'
      }, {
        label: '启用',
        width: '',
        prop: "status",
        holder: '请选择是否启用',
        type: 'select_def',
        doSort: true
      }]],
      url: ['/logisticsareas'],
      title: ['新增区域'],
      ruleForm: [{
        code: '',
        name: '',
        status: '1'
      }],
      rules: [{
        code: [{ required: true, message: '请输入区域编码', trigger: 'blur' }],
        name: [{ required: true, message: '请输入区域名称', trigger: 'blur' }]
      }],
      addArr: [[{
        label: '区域代码',
        prop: 'code',
        holder: '请输入区域代码',
        type: 'text'
      }, {
        label: '区域名称',
        prop: 'name',
        holder: '请输入区域名称',
        type: 'text'
      }, {
        label: '状态',
        prop: 'status',
        holder: '请选择是否启用',
        type: 'select_def'
      }]]
    };
  },

  methods: {
    addNew: function addNew() {
      this.$store.dispatch('setShowAdd', true);
    },
    edit: function edit(row) {
      var obj = {
        id: row.id,
        code: row.markcode,
        name: row.markname,
        status: row.status
      };
      this.$store.dispatch('setRow', row);
      this.$store.dispatch('setUrl', this.url[0] + "/");
      this.$store.dispatch('doEdit', obj);
    },
    doDelMore: function doDelMore() {
      this.$refs.tabs.$emit('delMore');
    },
    refresh: function refresh() {
      this.$store.dispatch('refresh');
    }
  },
  mounted: function mounted() {
    this.$store.dispatch('setTabs', false);
    this.$store.dispatch('setOpt', this.newOpt);
    var that = this;
    $(window).resize(function () {
      that.$store.dispatch('setOpt', that.newOpt);
    });
  }
});

/***/ }),

/***/ 593:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("v-tabs", {
        ref: "tabs",
        attrs: {
          "table-key": _vm.tableKey,
          url: _vm.url,
          title: _vm.title,
          "rule-form": _vm.ruleForm,
          rules: _vm.rules,
          "add-arr": _vm.addArr
        },
        on: { edit: _vm.edit }
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-2a2e12b8", module.exports)
  }
}

/***/ })

});
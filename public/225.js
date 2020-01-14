webpackJsonp([225],{

/***/ 516:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(743)
/* template */
var __vue_template__ = __webpack_require__(744)
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
Component.options.__file = "resources\\assets\\js\\views\\basicInf\\invoiceConf.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-303ba3d5", Component.options)
  } else {
    hotAPI.reload("data-v-303ba3d5", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 743:
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
        label: '报表文件',
        width: '220',
        prop: "file",
        holder: '请输入报表文件',
        type: 'text'
      }, {
        label: '报表名称',
        width: '220',
        prop: "name",
        holder: '请输入报表名称',
        type: 'text'
      }, {
        label: '报表格式',
        width: '200',
        prop: "paper_format",
        holder: '请输入报表格式',
        type: 'text'
      }, {
        label: '状态',
        width: '220',
        prop: "status",
        holder: '请选择是否启用',
        type: 'select_stu'
      }]],
      url: ['/printreports'],
      title: ['添加报表格式'],
      ruleForm: [{
        file: '',
        name: '',
        paper_format: '',
        status: '1'
      }],
      rules: [{
        file: [{ required: true, message: '请输入文件', trigger: 'blur' }],
        name: [{ required: true, message: '请输入报表名', trigger: 'blur' }],
        paper_format: [{ required: true, message: '请输入报表格式', trigger: 'blur' }]
      }],
      addArr: [[{
        label: '报表文件',
        prop: 'file',
        holder: '请输入报表文件',
        type: 'text'
      }, {
        label: '报表名称',
        prop: 'name',
        holder: '请输入报表名称',
        type: 'text'
      }, {
        label: '报表格式',
        prop: 'paper_format',
        holder: '请输入报表格式',
        type: 'text'
      }, {
        label: '状态',
        prop: 'status',
        holder: '请选择状态',
        type: 'select_stu'
      }]]
    };
  },

  methods: {
    //新增
    addNew: function addNew() {
      this.$store.dispatch('setShowAdd', true);
    },
    edit: function edit(row) {
      var obj = {
        file: row.file,
        name: row.name,
        paper_format: row.paper_format,
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

/***/ 744:
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-303ba3d5", module.exports)
  }
}

/***/ })

});
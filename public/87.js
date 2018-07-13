webpackJsonp([87],{

/***/ 500:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(706)
/* template */
var __vue_template__ = __webpack_require__(707)
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
Component.options.__file = "resources\\assets\\js\\views\\basicInf\\warehouseMag.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-3a269c48", Component.options)
  } else {
    hotAPI.reload("data-v-3a269c48", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 706:
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
        label: '仓库名称',
        width: '180',
        prop: "name",
        holder: '请输入标记名称',
        type: 'text'
      }, {
        label: '仓库地址',
        width: '260',
        prop: "address",
        holder: '请输入仓库地址',
        type: 'text',
        lists: 'more_prop'
      }, {
        label: '是否默认仓库',
        width: '160',
        prop: "is_default",
        holder: '描述',
        type: 'select_def'
      }, {
        label: '是否可用',
        width: '160',
        prop: "status",
        holder: '状态',
        type: 'select_stu',
        doSort: true
      }]],
      url: ['/warehouses'],
      title: ['新建仓库'],
      ruleForm: [{
        name: '',
        province: '',
        city: '',
        district: '',
        address: '',
        is_default: '0',
        status: '1'
      }],
      rules: [{
        name: [{ required: true, message: '请输入仓库名称', trigger: 'blur' }],
        province: [{ required: true, message: '请输入仓库地址(省)', trigger: 'blur' }],
        city: [{ required: true, message: '请输入仓库地址(市)', trigger: 'blur' }],
        district: [{ required: true, message: '请输入仓库地址(区)', trigger: 'blur' }],
        address: [{ required: true, message: '请输入仓库地址(县)', trigger: 'blur' }]

      }],
      addArr: [[{
        label: '仓库名称',
        prop: 'name',
        holder: '请输入仓库名称',
        type: 'text'
      }, {
        label: '地址(省)',
        prop: 'province',
        holder: '请输入仓库地址(省)',
        type: 'text'
      }, {
        label: '地址(市)',
        prop: 'city',
        holder: '请输入仓库地址(市)',
        type: 'text'
      }, {
        label: '地址(区)',
        prop: 'district',
        holder: '请输入仓库地址(区)',
        type: 'text'
      }, {
        label: '地址(县)',
        prop: 'address',
        holder: '请输入县及以下地址',
        type: 'text'
      }, {
        label: '是否默认',
        prop: 'is_default',
        holder: '请选择是否默认',
        type: 'select_def'
      }, {
        label: '是否可用',
        prop: 'status',
        holder: '请选择是否可用',
        type: 'select_stu'
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
        name: row.name,
        province: row.province,
        city: row.city,
        district: row.district,
        address: row.address,
        is_default: row.is_default,
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

/***/ 707:
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-3a269c48", module.exports)
  }
}

/***/ })

});
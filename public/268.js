webpackJsonp([268],{

/***/ 559:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(3)
/* script */
var __vue_script__ = __webpack_require__(843)
/* template */
var __vue_template__ = __webpack_require__(844)
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
Component.options.__file = "resources\\assets\\js\\components\\index.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-7e6399ea", Component.options)
  } else {
    hotAPI.reload("data-v-7e6399ea", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 843:
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

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      //操作
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
      //表格
      tableKey: [{
        label: '标记代码',
        width: '',
        prop: "markcode",
        holder: '代码'
      }, {
        label: '标记名称',
        width: '180',
        prop: "markname",
        holder: '名称'
      }, {
        label: '颜色',
        width: '180',
        prop: "color",
        holder: '颜色',
        type: 'color'
      }, {
        label: '描述',
        width: '180',
        prop: "description",
        holder: '描述'
      }, {
        label: '状态',
        width: '200',
        prop: "status",
        holder: '状态',
        type: 'select'
      }],
      url: '/markcolors',
      //新增
      showAdd: false,
      title: '新增',
      ruleForm: {
        markcode: '',
        markname: '',
        color: '',
        status: '1',
        description: ''
      },
      rules: {
        markcode: [{ required: true, message: '请输入标记代码', trigger: 'blur' }],
        markname: [{ required: true, message: '请输入标记名称', trigger: 'blur' }],
        color: [{ required: true, message: '请选择颜色', trigger: 'blur' }]
      },
      addArr: [{
        label: '标记代码',
        prop: 'markcode',
        holder: '请输入标记代码',
        type: 'text'
      }, {
        label: '标记名称',
        prop: 'markname',
        holder: '请输入标记名称',
        type: 'text'
      }, {
        label: '标记颜色',
        prop: 'color',
        type: 'pickColor'
      }, {
        label: '状态',
        prop: 'status',
        holder: '请选择状态',
        type: 'select'
      }, {
        label: '描述',
        prop: 'description',
        holder: '请输入描述',
        type: 'textarea'
      }]
    };
  },

  methods: {
    //新增
    addNew: function addNew() {
      this.$store.dispatch('setShowAdd', true);
    },
    edit: function edit(row) {
      var obj = {
        id: row.id,
        markcode: row.markcode,
        markname: row.markname,
        color: row.color,
        description: row.description,
        status: row.status
      };
      this.$store.dispatch('setRow', row);
      this.$store.dispatch('setUrl', this.url + "/");
      this.$store.dispatch('doEdit', obj);
    },
    doDelMore: function doDelMore() {
      this.$refs.table.$emit('delMore');
    },
    refresh: function refresh() {
      this.$refs.table.$emit('refresh');
    }
  },
  mounted: function mounted() {
    this.$store.dispatch('setOpt', this.newOpt);
    var that = this;
    $(window).resize(function () {
      that.$store.dispatch('setOpt', that.newOpt);
    });
  }
});

/***/ }),

/***/ 844:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("my-table", {
        ref: "table",
        attrs: { "table-key": _vm.tableKey, url: _vm.url },
        on: { edit: _vm.edit }
      }),
      _vm._v(" "),
      _c("add-mask", {
        attrs: {
          showMask: _vm.showAdd,
          title: _vm.title,
          "rule-form": _vm.ruleForm,
          rules: _vm.rules,
          "add-arr": _vm.addArr,
          url: _vm.url
        }
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-7e6399ea", module.exports)
  }
}

/***/ })

});
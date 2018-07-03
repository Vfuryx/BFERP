webpackJsonp([230],{

/***/ 490:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(3)
/* script */
var __vue_script__ = __webpack_require__(699)
/* template */
var __vue_template__ = __webpack_require__(700)
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
Component.options.__file = "resources\\assets\\js\\views\\basicInf\\proCategoryMag.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-17964058", Component.options)
  } else {
    hotAPI.reload("data-v-17964058", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 699:
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
      goodsType: [{
        label: '商品类别',
        width: '180',
        prop: "name",
        holder: '请输入商品类别',
        type: 'text'
      }, {
        label: '类别代码',
        width: '180',
        prop: "code",
        holder: '请输入类别代码',
        type: 'text'
      }, {
        label: '状态',
        width: '200',
        prop: "status",
        holder: '请选择状态',
        type: 'select_stu'
      }, {
        label: '商品描述',
        width: '200',
        prop: "description",
        holder: '请输入描述',
        type: 'textarea'
      }, {
        label: '商品备注',
        width: '200',
        prop: "remark",
        holder: '请输入备注',
        type: 'textarea'
      }],
      url: '/goodscates',
      //新增
      showAdd: false,
      title: '新增商品类别',
      ruleForm: {
        code: '',
        name: '',
        description: '',
        remark: '',
        status: '1'
      },
      rules: {
        code: [{ required: true, message: '请输入标记代码', trigger: 'blur' }],
        name: [{ required: true, message: '请输入标记名称', trigger: 'blur' }]
      },
      addArr: [{
        label: '类别代码',
        prop: 'code',
        holder: '请输入代码',
        type: 'text'
      }, {
        label: '类别名称',
        prop: 'name',
        holder: '请输入名称',
        type: 'text'
      }, {
        label: '商品描述',
        prop: 'description',
        type: 'textarea'
      }, {
        label: '商品备注',
        prop: 'remark',
        type: 'textarea'
      }, {
        label: '状态',
        prop: 'status',
        holder: '请选择状态',
        type: 'select_stu'
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
        code: row.code,
        name: row.name,
        status: row.status,
        remark: row.remark,
        description: row.description
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

/***/ 700:
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
        attrs: { "table-key": _vm.goodsType, url: _vm.url },
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-17964058", module.exports)
  }
}

/***/ })

});
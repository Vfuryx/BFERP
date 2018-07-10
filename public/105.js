webpackJsonp([105],{

/***/ 497:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(704)
/* template */
var __vue_template__ = __webpack_require__(705)
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
Component.options.__file = "resources\\assets\\js\\views\\basicInf\\logisticsMag.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-54de388c", Component.options)
  } else {
    hotAPI.reload("data-v-54de388c", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 704:
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
        ent: this.delMore
      }, {
        cnt: '导入',
        icon: 'bf-in',
        ent: this.test
      }, {
        cnt: '导出',
        icon: 'bf-out',
        ent: this.test
      }, {
        cnt: '同步',
        icon: 'bf-sync',
        ent: this.test
      }, {
        cnt: '刷新',
        icon: 'bf-refresh',
        ent: this.test
      }],
      activeName: 'first',
      lightKey: [{
        label: '物流代码',
        width: '180',
        prop: "code",
        holder: '请输入物流代码',
        type: 'text'
      }, {
        label: '物流名称',
        width: '180',
        prop: "name",
        holder: '请输入物流名称',
        type: 'text'
      }, {
        label: '报表格式',
        width: '220',
        prop: 'report',
        innerProp: ['paper_format'],
        holder: '请输入报表格式',
        type: 'text'
      }, {
        label: '物流区域',
        width: '300',
        prop: "logistics_area",
        innerProp: ['code', 'name'],
        holder: '请输入区域',
        type: 'text'
      }, {
        label: '预计到达天数',
        width: '260',
        prop: "expected_days",
        holder: '请输入天数',
        type: 'text'
      }, {
        label: '发货订单数',
        width: '250',
        prop: "expected_days",
        holder: '请输入天数',
        type: 'text'
      }, {
        label: '物流损坏货物次数',
        width: '280',
        prop: "expected_days",
        holder: '请输入天数',
        type: 'text'
      }, {
        label: '运费类型',
        width: '250',
        prop: "freight_type",
        innerProp: 'name',
        holder: '请输入运费类型',
        type: 'text'
      }, {
        label: '物流电话',
        width: '250',
        prop: "phone",
        holder: '请输入天数',
        type: 'text'
      }, {
        label: '物流地址',
        width: '260',
        prop: "address",
        holder: '请输入天数',
        type: 'text'
      }, {
        label: '备注',
        width: '200',
        prop: "remark",
        holder: '请输入天数',
        type: 'text'
      }, {
        label: '创建时间',
        width: '200',
        prop: "created_at",
        holder: '请输入天数',
        type: 'text'
      }, {
        label: '是否启用',
        width: '180',
        prop: "status",
        holder: '请输入天数',
        type: 'text'
      }],
      newLogistic: [],
      logisticCity: [{
        label: '省',
        width: '180',
        prop: "code",
        holder: '请输入物流代码',
        type: 'text'
      }, {
        label: '市',
        width: '180',
        prop: "code",
        holder: '请输入物流代码',
        type: 'text'
      }, {
        label: '区',
        width: '180',
        prop: "code",
        holder: '请输入物流代码',
        type: 'text'
      }, {
        label: '提货地址',
        width: '180',
        prop: "code",
        holder: '请输入物流代码',
        type: 'text'
      }, {
        label: '提货电话',
        width: '180',
        prop: "code",
        holder: '请输入物流代码',
        type: 'text'
      }, {
        label: '物流费用',
        width: '180',
        prop: "code",
        holder: '请输入物流代码',
        type: 'text'
      }, {
        label: '重量单价',
        width: '180',
        prop: "code",
        holder: '请输入物流代码',
        type: 'text'
      }, {
        label: '城市到达天数',
        width: '180',
        prop: "code",
        holder: '请输入物流代码',
        type: 'text'
      }, {
        label: '中转或直达',
        width: '180',
        prop: "code",
        holder: '请输入物流代码',
        type: 'text'
      }, {
        label: '包邮',
        width: '180',
        prop: "code",
        holder: '请输入物流代码',
        type: 'text'
      }, {
        label: '备注',
        width: '180',
        prop: "code",
        holder: '请输入物流代码',
        type: 'text'
      }],
      damageGoods: [{
        label: '系统单号',
        width: '180',
        prop: "code",
        holder: '请输入物流代码',
        type: 'text'
      }, {
        label: '商品编码',
        width: '180',
        prop: "code",
        holder: '请输入物流代码',
        type: 'text'
      }, {
        label: '规格编码',
        width: '180',
        prop: "code",
        holder: '请输入物流代码',
        type: 'text'
      }, {
        label: '商品名称',
        width: '180',
        prop: "code",
        holder: '请输入物流代码',
        type: 'text'
      }, {
        label: '规格名称',
        width: '180',
        prop: "code",
        holder: '请输入物流代码',
        type: 'text'
      }, {
        label: '损坏数量',
        width: '180',
        prop: "code",
        holder: '请输入物流代码',
        type: 'text'
      }, {
        label: '损坏金额',
        width: '180',
        prop: "code",
        holder: '请输入物流代码',
        type: 'text'
      }, {
        label: '损坏来源',
        width: '180',
        prop: "code",
        holder: '请输入物流代码',
        type: 'text'
      }, {
        label: '备注',
        width: '180',
        prop: "code",
        holder: '请输入物流代码',
        type: 'text'
      }, {
        label: '创建人',
        width: '180',
        prop: "code",
        holder: '请输入物流代码',
        type: 'text'
      }, {
        label: '创建时间',
        width: '180',
        prop: "code",
        holder: '请输入物流代码',
        type: 'text'
      }],
      loading: true,
      newId: '',
      url: '/logistics',
      showAdd: false,
      title: ['新增物流公司', '新增城市信息', '添加损坏商品'],
      ruleForm: [{
        code: '',
        name: '',
        report_id: '',
        logistics_area_id: '',
        expected_days: '',
        phone: '',
        address: '',
        freight_type_id: '',
        remark: '',
        status: '1'
      }, {
        code: '',
        name: ''
      }],
      rules: [{
        code: [{ required: true, message: '请输入物流代码', trigger: 'blur' }],
        name: [{ required: true, message: '请输入物流名称', trigger: 'blur' }],
        report_id: [{ required: true, message: '请输入报表格式', trigger: 'blur' }],
        expected_days: [{ required: true, message: '请输入预计天数', trigger: 'blur' }]
      }],
      addArr: [[{
        label: '物流代码',
        prop: 'code',
        holder: '请输入物流代码',
        type: 'text'
      }, {
        label: '物流名称',
        prop: 'name',
        holder: '请输入物流名称',
        type: 'text'
      }, {
        label: '报表格式',
        prop: 'report_id',
        holder: '请输入报表格式',
        type: 'text'
      }, {
        label: '物流区域',
        prop: 'logistics_area_id',
        holder: '请选择状态',
        type: 'text'
      }, {
        label: '预计天数',
        prop: 'expected_days',
        holder: '请输入预计天数',
        type: 'text'
      }, {
        label: '物流电话',
        prop: 'phone',
        holder: '请输入物流电话',
        type: 'text'
      }, {
        label: '物流地址',
        prop: 'address',
        holder: '请输入物流地址',
        type: 'text'
      }, {
        label: '运费类型',
        prop: 'freight_type_id',
        holder: '请输入运费类型',
        type: 'text'
      }, {
        label: '备注',
        prop: 'remark',
        holder: '请输入备注',
        type: 'textarea'
      }, {
        label: '是否启用',
        prop: 'status',
        holder: '请选择是否启用',
        type: 'select_def'
      }]]
    };
  },

  computed: {
    delArr: {
      get: function get() {
        return this.$store.state.LightTable.delArr;
      },
      set: function set() {}
    }
  },
  methods: {
    test: function test() {
      console.log(1);
    },

    //获取
    getAllData: function getAllData(url) {
      var _this = this;

      this.$fetch(url).then(function (res) {
        console.log(res);
        _this.$store.dispatch('setArr', res.data);
        _this.loading = false;
        /*let pg = res.meta.pagination;
          this.pagination.current_page = pg.current_page;
          this.pagination.total = pg.total;
          this.pagination.per_page = pg.per_page;*/
      }, function (err) {
        _this.$message.error({
          message: err.message
        });
      });
    },

    //删除
    delList: function delList(info) {
      console.log(info);
      console.log(info[0].index);
      this.$store.dispatch('setShow', true);
      $('.el-popper').css({ left: info[1].x - 100 + 'px', top: info[2].y - 125 + 'px' });
      this.newId = "/" + info[0].index;
    },

    //新增
    addNew: function addNew() {
      this.$store.dispatch('setShowAdd', true);
    },

    //批量删除
    delMore: function delMore() {
      var _this2 = this;

      this.$store.dispatch('setUrl', this.url);
      this.$store.dispatch('setDelArr', this.delArr);
      this.$store.dispatch('delMore').then(function () {
        _this2.getData();
      });
    },
    handleClick: function handleClick(tab, event) {
      if (tab.name == 'first') {
        this.getAllData(this.url[0]);
        this.url = '/logistics';
      } else if (tab.name == 'second') {
        this.getAllData(this.url[1]);
        this.url = '/logistics';
      } else {
        this.getAllData(this.url[2]);
        this.url = '/damagedgoods';
      }
    }
  },
  mounted: function mounted() {
    this.getAllData('/logistics');
    this.$store.dispatch('setOpt', this.newOpt);
    var that = this;
    $(window).resize(function () {
      that.$store.dispatch('setOpt', that.newOpt);
    });
  }
});

/***/ }),

/***/ 705:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c(
        "el-tabs",
        {
          on: { "tab-click": _vm.handleClick },
          model: {
            value: _vm.activeName,
            callback: function($$v) {
              _vm.activeName = $$v
            },
            expression: "activeName"
          }
        },
        [
          _c(
            "el-tab-pane",
            { attrs: { label: "物流公司", name: "first" } },
            [
              _c("light-table", {
                attrs: { "light-key": _vm.lightKey, loading: _vm.loading },
                on: { "del-list": _vm.delList }
              })
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "el-tab-pane",
            { attrs: { label: "物流城市", name: "second" } },
            [
              _c("light-table", {
                attrs: { "light-key": _vm.logisticCity, loading: _vm.loading }
              })
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "el-tab-pane",
            { attrs: { label: "损坏商品", name: "third" } },
            [
              _c("light-table", {
                attrs: { "light-key": _vm.damageGoods, loading: _vm.loading }
              })
            ],
            1
          )
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-54de388c", module.exports)
  }
}

/***/ })

});
webpackJsonp([108],{

/***/ 498:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(701)
/* template */
var __vue_template__ = __webpack_require__(702)
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
Component.options.__file = "resources\\assets\\js\\views\\basicInf\\goodsMag.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-609d93e9", Component.options)
  } else {
    hotAPI.reload("data-v-609d93e9", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 701:
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
        ent: this.editInfo,
        nClick: false
      }, {
        cnt: '删除',
        icon: 'bf-del',
        ent: this.delMore
      }, {
        cnt: '审核',
        icon: 'bf-audit',
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
        cnt: '停止生产',
        icon: 'bf-stop',
        ent: this.test
      }, {
        cnt: '刷新',
        icon: 'bf-refresh',
        ent: this.refresh
      }],
      activeName: '0',
      goodsInfo: [],
      goodsHead: [{
        label: '产品图片',
        width: '250',
        prop: "img",
        holder: '请输入产品图片',
        type: 'text'
      },
      /* {
         label: '产品系列',
         width: '250',
         prop: "category_id",
         holder: '请选择产品系列',
         type: 'select',
         val: this.sonArr
       },*/
      {
        label: '工厂型号',
        width: '250',
        prop: "factory_model",
        holder: '请输入工厂型号',
        type: 'text'
      }, {
        label: '商品编码',
        width: '250',
        prop: "commodity_code",
        holder: '请输入商品编码',
        type: 'text'
      }, {
        label: '店铺名称',
        width: '250',
        prop: "nick",
        holder: '请选择店铺名称',
        type: 'text'
        /* type: 'select',
         val: this.sonArr*/
      }, {
        label: '产品类别',
        width: '250',
        prop: "category",
        holder: '请选择产品类别',
        type: 'select',
        val: this.sonArr
      }, {
        label: '供货商',
        width: '250',
        prop: 'supplier',
        holder: '请选择供货商',
        type: 'select',
        val: this.sonArr
      }, {
        label: '京东编码',
        width: '300',
        prop: "jd_sn",
        holder: '请输入京东编码',
        type: 'text'
      }, {
        label: '唯品会码',
        width: '300',
        prop: "vips_sn",
        holder: '请输入唯品会编码',
        type: 'text'
      }, {
        label: '商品简称',
        width: '250',
        prop: "short_name",
        holder: '请输入商品简称',
        type: 'text'
      }, {
        label: '商品标题',
        width: '260',
        prop: "title",
        holder: '请输入商品标题',
        type: 'text'
      }, {
        label: '备注',
        width: '250',
        prop: "remark",
        holder: '请输入备注',
        type: 'textarea'
      }, {
        label: '是否停产',
        width: '220',
        prop: "is_stop_pro",
        holder: '请选择是否停产',
        type: 'select_def'
      }, {
        label: '是否启用',
        width: '220',
        prop: "status",
        holder: '请选择是否启用',
        type: 'select_def'
      }],
      goodsChange: false,
      goodsUrl: '/goods',
      goodsLoading: true,
      showMask: false,
      /*存储的当前id商品对应的规格等信息*/
      getsInfo: [[], [], []],
      tableHead: [[], [{
        label: '规格编号',
        width: '300',
        prop: "spec_code",
        holder: '请输入规格编号',
        type: 'text',
        beAble: true
      }, {
        label: '京东规格编号',
        width: '300',
        prop: "jd_specs_code",
        holder: '请输入京东规格编号',
        type: 'text'
      },
      /* {
         label: '商品简称',
         width: '250',
         prop: "goods",
         holder: '请选择商品简称',
         type: 'select',
         val: this.sonArr,
         beAble:true
       },*/
      {
        label: '唯品会规格编号',
        width: '300',
        prop: "vips_specs_code",
        holder: '请输入唯品会规格编号',
        type: 'text'
        // val: this.sonArr
      }, {
        label: '规格图片',
        width: '260',
        prop: "logistics",
        holder: '请输入图片地址',
        type: 'text'
      }, {
        label: '淘宝价格',
        width: '230',
        prop: "tb_price",
        holder: '请输入淘宝价格',
        type: 'number'
      }, {
        label: '成本价格',
        width: '230',
        prop: "cost",
        holder: '请输入所成本价格',
        type: 'number'
      }, {
        label: '销售价格',
        width: '230',
        prop: "price",
        holder: '请输入销售价格',
        type: 'number'
      }, {
        label: '仓库成本',
        width: '230',
        prop: "warehouse_cost",
        holder: '请输入仓库成本',
        type: 'number'
      }, {
        label: '折扣',
        width: '220',
        prop: "discount",
        holder: '请输入折扣',
        type: 'number'
      }, {
        label: '佣金点',
        width: '220',
        prop: "commission",
        holder: '请输入佣金点',
        type: 'number'
      }, {
        label: '木架费',
        width: '220',
        prop: "wooden_frame_costs",
        holder: '请输入木架费',
        type: 'number'
      }, {
        label: '采购运费',
        width: '220',
        prop: "purchase_freight",
        holder: '请输入采购运费',
        type: 'number'
      }, {
        label: '是否组合',
        width: '200',
        prop: "is_combination",
        holder: '请选择是否组合',
        type: 'select_def'
      }, {
        label: '包件数量',
        width: '220',
        prop: "package_quantity",
        holder: '请输入包件数量',
        type: 'number'
      }, {
        label: '库存预警数量',
        width: '220',
        prop: "inventory_warning",
        holder: '请输入库存预警数量',
        type: 'number'
      }, {
        label: '采购预警天数',
        width: '220',
        prop: "purchase_days_warning",
        holder: '请输入采购预警天数',
        type: 'number'
      }, {
        label: '产品配送类别',
        width: '250',
        prop: "distribution_method",
        holder: '请输入产品配送类别',
        type: 'select',
        val: this.sonArr
      }, {
        label: '可售数预警数量',
        width: '220',
        prop: "available_warning",
        holder: '请输入可售数预警数量',
        type: 'number'
      }, {
        label: '规格',
        width: '250',
        prop: "spec",
        holder: '请输入规格',
        type: 'text'
      }, {
        label: '颜色',
        width: '250',
        prop: "color",
        holder: '请输入颜色',
        type: 'text'
      }, {
        label: '材质',
        width: '250',
        prop: "materials",
        holder: '请输入材质',
        type: 'text'
      }, {
        label: '功能',
        width: '250',
        prop: "function",
        holder: '请输入功能',
        type: 'text'
      }, {
        label: '特殊',
        width: '250',
        prop: "special",
        holder: '请输入特殊',
        type: 'text'
      }, {
        label: '其他',
        width: '250',
        prop: "other",
        holder: '请输入其他',
        type: 'text'
      }, {
        label: '长度',
        width: '250',
        prop: "length",
        holder: '请输入长度',
        type: 'number'
      }, {
        label: '宽度',
        width: '250',
        prop: "width",
        holder: '请输入宽度',
        type: 'number'
      }, {
        label: '高度',
        width: '250',
        prop: "height",
        holder: '请输入高度',
        type: 'number'
      }, {
        label: '体积',
        width: '250',
        prop: "volume",
        holder: '请输入体积',
        type: 'number'
      }, {
        label: '重量',
        width: '250',
        prop: "weight",
        holder: '请输入重量',
        type: 'number'
      }, {
        label: '备注',
        width: '230',
        prop: "remark",
        holder: '请输入备注',
        type: 'textarea'
      }, {
        label: '是否成品',
        width: '220',
        prop: "finished_pro",
        holder: '请选择是否是成品',
        type: 'select_def'
      }, {
        label: '是否停产',
        width: '220',
        prop: "is_stop_pro",
        holder: '请选择是否是停产',
        type: 'select_def'
      }, {
        label: '状态',
        width: '220',
        prop: "status",
        holder: '请选择状态',
        type: 'select_stu'
      }], [{
        label: '产品规格编码',
        width: '',
        prop: "product_specs",
        holder: '请选择产品规格编码',
        type: 'select',
        val: this.sonArr
      }, {
        label: '组合产品规格编码',
        width: '',
        prop: "com_pro_specs",
        holder: '请选择组合产品规格编码',
        type: 'select',
        val: this.sonArr
      }, {
        label: ' 组合件数',
        width: '',
        prop: "count",
        holder: '请输入 组合件数',
        type: 'number'
      }, {
        label: '状态',
        width: '',
        prop: "status",
        type: 'select_stu'
      }], []],
      loading: true,
      currentIndex: '',
      url: ['', '/productspecs'],
      title: '新增商品',
      ruleForm: {
        commodity_code: '',
        jd_sn: '',
        vips_sn: '',
        factory_model: '',
        short_name: '',
        nick: '',
        supplier_id: '',
        category_id: '',
        remark: '',
        title: '',
        img: '',
        url: '',
        is_stop_pro: '0',
        status: '1',
        productspecs: ''
      },
      rules: {
        commodity_code: [{ required: true, message: '请输入商品编码', trigger: 'blur' }],
        jd_sn: [{ required: true, message: '请输入京东编号', trigger: 'blur' }],
        vips_sn: [{ required: true, message: '请输入唯品会编号', trigger: 'blur' }],
        factory_model: [{ required: true, message: '请输入工厂型号', trigger: 'blur' }],
        short_name: [{ required: true, message: '请输入商品简称', trigger: 'blur' }],
        nick: [{ required: true, message: '请输入店铺名称', trigger: 'blur' }],
        supplier_id: [{ required: true, message: '请选择供应商', trigger: 'blur' }],
        category_id: [{ required: true, message: '请选择产品类别', trigger: 'blur' }],
        title: [{ required: true, message: '请输入商品标题', trigger: 'blur' }],
        img: [{ required: true, message: '请输入商品图片', trigger: 'blur' }],
        url: [{ required: true, message: '请输入商品网址', trigger: 'blur' }],
        productspecs: [{ required: true, message: '请选择产品规格', trigger: 'blur' }]
      },
      addArr: [
      /* {
         label: '产品规格',
         prop: 'productspecs',
         holder: '请选择产品规格',
         type: 'select',
         val: this.sonArr
       },*/
      {
        label: '商品编号',
        prop: 'commodity_code',
        holder: '请输入商品编号',
        type: 'text',
        nChange: true
        // beAble:true
      }, {
        label: '京东编码',
        prop: 'jd_sn',
        holder: '请输入京东编码',
        type: 'text'
      }, {
        label: '唯品会码',
        prop: 'vips_sn',
        holder: '请输入唯品会码',
        type: 'text'
      }, {
        label: '店铺昵称',
        prop: 'nick',
        holder: '请选择店铺昵称',
        type: 'text'
        /* type: 'select',
         val: this.sonArr*/
      }, {
        label: '产品类别',
        prop: 'category_id',
        holder: '请选择产品类别',
        type: 'select',
        val: this.sonArr
      }, {
        label: '供应商',
        prop: 'supplier_id',
        holder: '请选择供应商',
        type: 'select',
        val: this.sonArr
      }, {
        label: '工厂型号',
        prop: 'factory_model',
        holder: '请输入工厂型号',
        type: 'text'
      }, {
        label: '商品简称',
        prop: 'short_name',
        holder: '请输入商品简称',
        type: 'text',
        nChange: true
        // beAble: true
      }, {
        label: '商品标题',
        prop: 'title',
        holder: '请输入商品标题',
        type: 'text'
      }, {
        label: '商品图片',
        prop: 'img',
        holder: '请输入商品图片',
        type: 'text'
      }, {
        label: '商品网址',
        prop: 'url',
        holder: '请选择商品网址',
        type: 'url'
      }, {
        label: '备注',
        prop: 'remark',
        holder: '请输入备注',
        type: 'textarea'
      }, {
        label: '是否停产',
        prop: 'is_stop_pro',
        holder: '请选择是否停产',
        type: 'select_stu'
      }, {
        label: '状态',
        prop: 'status',
        holder: '请选择是否启用',
        type: 'select_stu'
      }],
      editArr: [
      /* {
         label: '产品规格',
         prop: 'productspecs',
         holder: '请选择产品规格',
         type: 'select',
         val: this.sonArr
       },*/
      {
        label: '商品编号',
        prop: 'commodity_code',
        holder: '请输入商品编号',
        type: 'text',
        nChange: true,
        beAble: true
      }, {
        label: '京东编码',
        prop: 'jd_sn',
        holder: '请输入京东编码',
        type: 'text'
      }, {
        label: '唯品会码',
        prop: 'vips_sn',
        holder: '请输入唯品会码',
        type: 'text'
      }, {
        label: '店铺昵称',
        prop: 'nick',
        holder: '请选择店铺昵称',
        type: 'text'
        /* type: 'select',
         val: this.sonArr*/
      }, {
        label: '产品类别',
        prop: 'category_id',
        holder: '请选择产品类别',
        type: 'select',
        val: this.sonArr
      }, {
        label: '供应商',
        prop: 'supplier_id',
        holder: '请选择供应商',
        type: 'select',
        val: this.sonArr
      }, {
        label: '工厂型号',
        prop: 'factory_model',
        holder: '请输入工厂型号',
        type: 'text'
      }, {
        label: '商品简称',
        prop: 'short_name',
        holder: '请输入商品简称',
        type: 'text',
        nChange: true
        // beAble: true
      }, {
        label: '商品标题',
        prop: 'title',
        holder: '请输入商品标题',
        type: 'text'
      }, {
        label: '商品图片',
        prop: 'img',
        holder: '请输入商品图片',
        type: 'text'
      }, {
        label: '商品网址',
        prop: 'url',
        holder: '请选择商品网址',
        type: 'url'
      }, {
        label: '备注',
        prop: 'remark',
        holder: '请输入备注',
        type: 'textarea'
      }, {
        label: '是否停产',
        prop: 'is_stop_pro',
        holder: '请选择是否停产',
        type: 'select_stu'
      }, {
        label: '状态',
        prop: 'status',
        holder: '请选择是否启用',
        type: 'select_stu'
      }],
      halfForm: true,
      refArr: 'ruleGoods',
      showDel: false,
      delId: '',
      inputChange: false,
      multipleSelection: [],
      delArr: [],
      sonArr: [],
      pagination: {
        current_page: 1,
        per_page: 0,
        page_total: 0
      },
      doChange: [false, false, false],
      editTitle: '修改商品信息',
      editMask: false,
      editId: '',
      editData: {},
      leftTab: '修改',
      showComb: false,
      CombForm: {},
      combRules: {},
      checkboxInit: false,
      multipleTable: [],
      tData: [],
      countComp: '',
      compRow: {},
      combIndex: '',
      specRow: {},
      searchBox: {
        goodsName: '',
        shopNames: '',
        supplier: '',
        kinds: '',
        isComb: false,
        isStop: false,
        isStatus: false
      },
      moreForms: true
    };
  },

  methods: {
    test: function test() {},
    addNew: function addNew() {
      this.showMask = true;
    },
    CB_dialog: function CB_dialog(val) {
      this.showMask = val;
      this.editMask = val;
    },
    submitForm: function submitForm() {
      var _this = this;

      this.$post(this.goodsUrl, this.ruleForm).then(function () {
        _this.$message({
          message: '添加成功',
          type: 'success'
        });
        _this.showMask = false;
        _this.refresh();
      }, function (err) {
        if (err.response) {
          var arr = err.response.data.errors;
          var arr1 = [];
          for (var i in arr) {
            arr1.push(arr[i]);
          }
          var str = arr1.join(',');
          _this.$message.error({
            message: str
          });
        }
      });
    },

    /*处理批量删除*/
    handleSelectionChange: function handleSelectionChange(val) {
      console.log(1);
      if (val.length != 0) {
        this.editId = val[0].id;
      } else {
        this.editId = '';
      }
      this.multipleSelection = val;
      console.log(this.multipleSelection);
      var del = [];
      this.multipleSelection.forEach(function (selectedItem) {
        del.push(selectedItem.id);
      });
      this.delArr = del.join(',');
    },
    delMore: function delMore() {
      var _this2 = this;

      if (this.delArr.length === 0) {
        this.$message({
          message: '没有选中数据',
          type: 'warning'
        });
      } else {
        this.$confirm('此操作将永久删除该数据, 是否继续?', '提示', {
          confirmButtonText: '确定',
          cancelButtonText: '取消',
          type: 'warning'
        }).then(function () {
          _this2.$del(_this2.url[_this2.activeName], { ids: _this2.delArr }).then(function () {
            _this2.$message({
              message: '删除成功',
              type: 'success'
            });
            _this2.refresh();
          }, function (err) {
            if (err.response) {
              var arr = err.response.data.errors;
              var arr1 = [];
              for (var i in arr) {
                arr1.push(arr[i]);
              }
              var str = arr1.join(',');
              _this2.$message.error({
                message: str
              });
            }
          });
        }).catch(function () {
          _this2.$message({
            type: 'info',
            message: '已取消删除'
          });
        });
      }
    },

    /*修改保存*/
    edit: function edit(index) {
      this.currentIndex = 'index' + index;
    },
    editCancel: function editCancel() {
      this.$message({
        message: '取消修改',
        type: 'info'
      });
      this.currentIndex = '';
    },
    editSave: function editSave(row) {
      var _this3 = this;

      var newData = {};
      if (this.activeName == '0') {
        newData = {
          code: row.code,
          name: row.name,
          report: row.report,
          expected_days: row.expected_days,
          phone: row.phone,
          address: row.address,
          freight_type: row.freight_type,
          remark: row.remark,
          status: row.status
        };
      } else if (this.activeName == '1') {
        newData = {
          logistics: row.logistics.id,
          province: row.province,
          city: row.city,
          district: row.district,
          address: row.address,
          phone: row.phone,
          price: row.price,
          weight_univalent: row.weight_univalent,
          expected_days: row.expected_days,
          route: row.route,
          is_free_shipping: row.is_free_shipping,
          remark: row.remark
        };
      } else if (this.activeName == '2') {
        newData = {
          order_no: row.order_no,
          good_sn: row.good_sn,
          standard_code: row.standard_code,
          quantity: row.quantity,
          money: row.money,
          remark: row.remark
          // status: row.status
        };
      } else if (this.activeName == '3') {
        newData = {
          file: row.file,
          name: row.name,
          paper_format: row.paper_format,
          status: row.status
        };
      }
      if (this.inputChange) {
        this.$patch(this.url[this.activeName] + '/' + row.id, newData).then(function () {
          _this3.$message({
            message: '修改成功',
            type: 'success'
          });
          _this3.getInfo(_this3.url[_this3.activeName]);
          _this3.currentIndex = '';
          _this3.inputChange = false;
          _this3.refresh();
        }, function (err) {
          if (err.response) {
            var arr = err.response.data.errors;
            var arr1 = [];
            for (var i in arr) {
              arr1.push(arr[i]);
            }
            var str = arr1.join(',');
            _this3.$message.error({
              message: str
            });
          }
        });
      } else {
        this.$message({
          message: '数据未改动',
          type: 'info'
        });
      }
    },
    handleEdit: function handleEdit() {
      this.inputChange = true;
    },
    getSonData: function getSonData(url, propVal) {
      var _this4 = this;

      this.$fetch(url).then(function (res) {
        var obj = {};
        obj[propVal] = res.data;
        _this4.sonArr.push(obj);
      }, function () {});
    },

    /*获取商品信息*/
    getGoodsInfo: function getGoodsInfo() {
      var _this5 = this;

      this.goodsLoading = true;
      this.$fetch(this.goodsUrl).then(function (res) {
        _this5.goodsInfo = res.data;
        _this5.goodsLoading = false;
        var pg = res.meta.pagination;
        _this5.$store.dispatch('currentPage', pg.current_page);
        _this5.$store.commit('PER_PAGE', pg.per_page);
        _this5.$store.commit('PAGE_TOTAL', pg.total);
        var obj = {};
        obj["2"] = res.data;
        _this5.sonArr.push(obj);
      }, function (err) {
        if (err.response) {
          var arr = err.response.data.errors;
          var arr1 = [];
          for (var i in arr) {
            arr1.push(arr[i]);
          }
          var str = arr1.join(',');
          _this5.$message.error({
            message: str
          });
        }
      });
    },

    /*切换tab时只显示id为第一条商品的规格及其他*/
    handleTabsClick: function handleTabsClick() {
      var _this6 = this;

      this.loading = true;
      var id = this.goodsInfo[0].id;
      this.$fetch(this.url[this.activeName] + '/' + id).then(function (res) {
        _this6.loading = false;
        _this6.getsInfo[_this6.activeName] = res.data;
        if (_this6.url[_this6.activeName] == '/productspecs') {
          _this6.tData = res.data;
          var obj = {};
          obj["0"] = res.data;
          _this6.sonArr.push(obj);
        }
      }, function (err) {
        if (err.response) {
          var arr = err.response.data.errors;
          var arr1 = [];
          for (var i in arr) {
            arr1.push(arr[i]);
          }
          var str = arr1.join(',');
          _this6.$message.error({
            message: str
          });
        }
      });
    },

    /*在商品中单击时，tab显示为id为当前商品的规格及其他*/
    rowClick: function rowClick(row) {
      var _this7 = this;

      console.log(row);
      var id = row.id;
      this.$fetch(this.url[this.activeName] + '/' + id).then(function (res) {
        _this7.loading = false;
        _this7.getsInfo[_this7.activeName] = res.data;
        if (_this7.url[_this7.activeName] == '/productspecs') {
          _this7.tData = res.data;
          var obj = {};
          obj["0"] = res.data;
          _this7.sonArr.push(obj);
        }
      }, function (err) {
        if (err.response) {
          var arr = err.response.data.errors;
          var arr1 = [];
          for (var i in arr) {
            arr1.push(arr[i]);
          }
          var str = arr1.join(',');
          _this7.$message.error({
            message: str
          });
        }
      });
    },
    del: function del(row, e) {
      this.showDel = true;
      $('.el-popper').css({ left: e.x - 100 + 'px', top: e.y - 125 + 'px' });
      this.delId = row.id;
    },
    cancelD: function cancelD() {
      this.showDel = false;
      this.$message({
        message: '取消删除',
        type: 'info'
      });
    },
    confirmD: function confirmD(id) {
      var _this8 = this;

      this.$del(this.goodsUrl + '/' + id).then(function () {
        _this8.$message({
          message: '删除成功',
          type: 'success'
        });
        _this8.showDel = false;
        _this8.refresh();
      }, function (err) {
        if (err.response) {
          _this8.showDel = false;
          var arr = err.response.data.errors;
          var arr1 = [];
          for (var i in arr) {
            arr1.push(arr[i]);
          }
          var str = arr1.join(',');
          _this8.$message.error({
            message: str
          });
        }
      });
    },
    refresh: function refresh() {
      var _this9 = this;

      this.goodsLoading = true;
      this.getGoodsInfo();
      setTimeout(function () {
        _this9.goodsLoading = false;
      }, 2000);
    },

    /*修改商品信息*/
    editInfo: function editInfo() {
      var _this10 = this;

      /*如果修改按钮是不可点击状态*/
      if (this.newOpt[1].nClick) {
        return;
      } else {
        /*如果没有选择要修改的项*/
        if (this.multipleSelection.length == 0) {
          this.$message({
            message: '没有选择要修改的数据',
            type: 'warning'
          });
          return;
        } else if (this.multipleSelection.length >= 2) {
          this.$message({
            message: '只能修改单条数据',
            type: 'warning'
          });
          return;
        } else {
          this.editMask = true;
          this.$fetch(this.goodsUrl + '/' + this.editId).then(function (res) {
            _this10.editData = {
              commodity_code: res.commodity_code,
              jd_sn: res.jd_sn,
              vips_sn: res.vips_sn,
              factory_model: res.factory_model,
              short_name: res.short_name,
              nick: res.nick,
              supplier_id: res.supplier.id,
              category_id: res.category.id,
              remark: res.remark,
              title: res.title,
              img: res.img,
              url: res.url,
              is_stop_pro: res.is_stop_pro,
              status: res.status
              // productspecs: res.productspecs
            };
          }, function (err) {
            console.log(err);
          });
        }
      }
    },
    editForm: function editForm() {
      var _this11 = this;

      var obj = {};
      if (this.activeName == 0) {
        obj = {
          commodity_code: this.editData.commodity_code,
          jd_sn: this.editData.jd_sn,
          vips_sn: this.editData.vips_sn,
          factory_model: this.editData.factory_model,
          short_name: this.editData.short_name,
          nick: this.editData.nick,
          supplier_id: this.editData.supplier_id,
          category_id: this.editData.category_id,
          remark: this.editData.remark,
          title: this.editData.title,
          img: this.editData.img,
          url: this.editData.url,
          is_stop_pro: this.editData.is_stop_pro,
          status: this.editData.status,
          productspecs: this.editData.productspecs
        };
      } else if (this.activeName == 1) {
        obj = {
          goods_id: this.editData.goods_id,
          spec_code: this.editData.spec_code,
          jd_specs_code: this.editData.jd_specs_code,
          vips_specs_code: this.editData.vips_specs_code,
          tb_price: this.editData.tb_price,
          cost: this.editData.cost,
          price: this.editData.price,
          highest_price: this.editData.highest_price,
          lowest_price: this.editData.lowest_price,
          warehouse_cost: this.editData.warehouse_cost,
          assembly_price: this.editData.assembly_price,
          discount: this.editData.discount,
          commission: this.editData.commission,
          is_combination: this.editData.is_combination,
          package_quantity: this.editData.package_quantity,
          package_costs: this.editData.package_costs,
          wooden_frame_costs: this.editData.wooden_frame_costs,
          purchase_freight: this.editData.purchase_freight,
          inventory_warning: this.editData.inventory_warning,
          purchase_days_warning: this.editData.purchase_days_warning,
          available_warning: this.editData.available_warning,
          distribution_method_id: this.editData.distribution_method_id,
          bar_code: this.editData.bar_code,
          img_url: this.editData.img_url,
          spec: this.editData.spec,
          color: this.editData.color,
          function: this.editData.function,
          special: this.editData.special,
          other: this.editData.other,
          length: this.editData.length,
          width: this.editData.width,
          height: this.editData.height,
          volume: this.editData.volume,
          weight: this.editData.weight,
          remark: this.editData.remark,
          finished_pro: this.editData.finished_pro,
          is_stop_pro: this.editData.is_stop_pro,
          status: this.editData.status
        };
      } else {
        obj = {
          product_specs: this.editData.product_specs,
          com_pro_specs: this.editData.com_pro_specs,
          count: this.editData.count,
          status: this.editData.status
        };
      }
      this.$patch(this.url[this.activeName] + '/' + this.editId, obj).then(function () {
        _this11.$message({
          message: '修改成功',
          type: 'success'
        });
        _this11.editMask[_this11.activeName].show = false;
        _this11.refresh();
      }, function (err) {
        if (err.response) {
          var arr = err.response.data.errors;
          var arr1 = [];
          for (var i in arr) {
            arr1.push(arr[i]);
          }
          var str = arr1.join(',');
          _this11.$message.error({
            message: str
          });
        }
      });
    },
    addComb: function addComb(row) {
      this.specRow = row;
      this.showComb = true;
      this.$fetch('/combinations').then(function (res) {
        console.log(res);
      }, function (err) {});
    },
    choiceComb: function choiceComb(row) {
      this.compRow = row;
      this.combIndex = 'index' + row.id;
    },
    confirmAddComb: function confirmAddComb() {
      var _this12 = this;

      /*如果没有输入件数，提示输入
      * 如果没有双击确认，提示选择
      * 都有的话，直接进入到产品规格子集中，弹框关闭*/
      if (this.combIndex == '') {
        this.$message({
          message: '请双击选择要添加的组合',
          type: 'info'
        });
        return;
      } else if (this.countComp == 0) {
        this.$message({
          message: '请选择要添加的组合个数',
          type: 'info'
        });
        return;
      } else {
        var obj = {
          product_specs_id: this.specRow.id,
          com_pro_specs_id: this.compRow.id,
          count: this.countComp
        };
        this.$post('/combinations', obj).then(function (res) {
          _this12.$message({
            message: '添加组合成功',
            type: 'success'
          });
          _this12.showComb = false;

          _this12.combIndex = '';
          _this12.countComp = 0;
          obj = {};
          console.log(res);
        }, function (err) {});
      }
    },
    getData: function getData() {
      console.log(this.searchBox);
    },

    /*规格信息单击进行修改*/
    rowEdit: function rowEdit() {
      this.currentIndex = 'index' + index;
    }
  },
  mounted: function mounted() {
    this.getGoodsInfo();
    this.getSonData('/suppliers', '5');
    this.getSonData('/goodscates', '4');
    this.getSonData('/distmets', '17');
    this.$store.dispatch('setOpt', this.newOpt);
    var that = this;
    $(window).resize(function () {
      that.$store.dispatch('setOpt', that.newOpt);
    });
  }
});

/***/ }),

/***/ 702:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("div", { staticClass: "goodsSearchBox" }, [
        _c(
          "span",
          [
            _c("label", [_vm._v("商品名称")]),
            _vm._v(" "),
            _c("el-input", {
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
                value: _vm.searchBox.goodsName,
                callback: function($$v) {
                  _vm.$set(_vm.searchBox, "goodsName", $$v)
                },
                expression: "searchBox.goodsName"
              }
            })
          ],
          1
        ),
        _vm._v(" "),
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
                  value: _vm.searchBox.shopNames,
                  callback: function($$v) {
                    _vm.$set(_vm.searchBox, "shopNames", $$v)
                  },
                  expression: "searchBox.shopNames"
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
            _c("label", [_vm._v("供货商")]),
            _vm._v(" "),
            _c(
              "el-select",
              {
                attrs: { clearable: "", placeholder: "请选择" },
                model: {
                  value: _vm.searchBox.supplier,
                  callback: function($$v) {
                    _vm.$set(_vm.searchBox, "supplier", $$v)
                  },
                  expression: "searchBox.supplier"
                }
              },
              _vm._l(_vm.searchBox.supplier, function(item) {
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
            _c("label", [_vm._v("类别")]),
            _vm._v(" "),
            _c(
              "el-select",
              {
                attrs: { clearable: "", placeholder: "请选择" },
                model: {
                  value: _vm.searchBox.kinds,
                  callback: function($$v) {
                    _vm.$set(_vm.searchBox, "kinds", $$v)
                  },
                  expression: "searchBox.kinds"
                }
              },
              _vm._l(_vm.searchBox.kinds, function(item) {
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
            _c(
              "el-checkbox",
              {
                model: {
                  value: _vm.searchBox.isComb,
                  callback: function($$v) {
                    _vm.$set(_vm.searchBox, "isComb", $$v)
                  },
                  expression: "searchBox.isComb"
                }
              },
              [_vm._v("组合产品")]
            ),
            _vm._v(" "),
            _c(
              "el-checkbox",
              {
                model: {
                  value: _vm.searchBox.isStop,
                  callback: function($$v) {
                    _vm.$set(_vm.searchBox, "isStop", $$v)
                  },
                  expression: "searchBox.isStop"
                }
              },
              [_vm._v("停产")]
            ),
            _vm._v(" "),
            _c(
              "el-checkbox",
              {
                model: {
                  value: _vm.searchBox.isStatus,
                  callback: function($$v) {
                    _vm.$set(_vm.searchBox, "isStatus", $$v)
                  },
                  expression: "searchBox.isStatus"
                }
              },
              [_vm._v("启用")]
            )
          ],
          1
        )
      ]),
      _vm._v(" "),
      _c("light-table", {
        attrs: {
          listData: _vm.goodsInfo,
          tableHead: _vm.goodsHead,
          loading: _vm.goodsLoading,
          currentIndex: _vm.currentIndex,
          selects: _vm.sonArr,
          doChange: _vm.goodsChange,
          height: 300
        },
        on: {
          handleSelect: _vm.handleSelectionChange,
          editSave: _vm.editSave,
          handleEdit: _vm.handleEdit,
          del: _vm.del,
          edit: _vm.edit,
          editCancel: _vm.editCancel,
          rowClick: _vm.rowClick
        }
      }),
      _vm._v(" "),
      _c("div", [_c("Pagination", { attrs: { "page-url": _vm.goodsUrl } })], 1),
      _vm._v(" "),
      _c(
        "el-tabs",
        {
          on: { "tab-click": _vm.handleTabsClick },
          model: {
            value: _vm.activeName,
            callback: function($$v) {
              _vm.activeName = $$v
            },
            expression: "activeName"
          }
        },
        [
          _c("el-tab-pane", { attrs: { label: "淘宝信息", name: "0" } }, [
            _vm._v("\n            淘宝信息\n        ")
          ]),
          _vm._v(" "),
          _c(
            "el-tab-pane",
            { attrs: { label: "规格信息", name: "1" } },
            [
              _c("light-table", {
                attrs: {
                  listData: _vm.getsInfo[this.activeName],
                  tableHead: _vm.tableHead[this.activeName],
                  loading: _vm.loading,
                  currentIndex: _vm.currentIndex,
                  doChange: _vm.doChange[this.activeName]
                },
                on: {
                  editSave: _vm.editSave,
                  handleEdit: _vm.handleEdit,
                  del: _vm.del,
                  edit: _vm.edit,
                  editCancel: _vm.editCancel
                }
              })
            ],
            1
          ),
          _vm._v(" "),
          _c("el-tab-pane", { attrs: { label: "商品网站", name: "2" } }, [
            _vm._v("\n            商品网站\n        ")
          ]),
          _vm._v(" "),
          _c("el-tab-pane", { attrs: { label: "操作记录", name: "3" } }, [
            _vm._v("\n            操作记录\n        ")
          ])
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "el-dialog",
        {
          class: { "more-forms": _vm.moreForms },
          attrs: { title: _vm.title, visible: _vm.showMask },
          on: {
            "update:visible": function($event) {
              _vm.showMask = $event
            },
            close: _vm.close
          }
        },
        [
          _c(
            "el-form",
            {
              ref: "addGoods",
              class: { "half-form": _vm.halfForm },
              attrs: {
                model: _vm.ruleForm,
                rules: _vm.rules,
                "label-width": "100px"
              }
            },
            _vm._l(_vm.addArr, function(item, index) {
              return _c(
                "el-form-item",
                { key: index, attrs: { label: item.label, prop: item.prop } },
                [
                  item.type == "text"
                    ? _c(
                        "span",
                        [
                          _c("el-input", {
                            attrs: {
                              placehold: item.holder,
                              disabled: item.beAble
                            },
                            model: {
                              value: _vm.ruleForm[item.prop],
                              callback: function($$v) {
                                _vm.$set(_vm.ruleForm, item.prop, $$v)
                              },
                              expression: "ruleForm[item.prop]"
                            }
                          })
                        ],
                        1
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  item.type == "tel"
                    ? _c(
                        "span",
                        [
                          _c("el-input", {
                            attrs: {
                              type: "tel",
                              placehold: item.holder,
                              disabled: item.beAble
                            },
                            model: {
                              value: _vm.ruleForm[item.prop],
                              callback: function($$v) {
                                _vm.$set(_vm.ruleForm, item.prop, $$v)
                              },
                              expression: "ruleForm[item.prop]"
                            }
                          })
                        ],
                        1
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  item.type == "number"
                    ? _c(
                        "span",
                        [
                          _c("el-input", {
                            attrs: {
                              type: "number",
                              placehold: item.holder,
                              disabled: item.beAble
                            },
                            model: {
                              value: _vm.ruleForm[item.prop],
                              callback: function($$v) {
                                _vm.$set(_vm.ruleForm, item.prop, $$v)
                              },
                              expression: "ruleForm[item.prop]"
                            }
                          })
                        ],
                        1
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  item.type == "url"
                    ? _c(
                        "span",
                        [
                          _c("el-input", {
                            attrs: {
                              type: "url",
                              placehold: item.holder,
                              disabled: item.beAble
                            },
                            model: {
                              value: _vm.ruleForm[item.prop],
                              callback: function($$v) {
                                _vm.$set(_vm.ruleForm, item.prop, $$v)
                              },
                              expression: "ruleForm[item.prop]"
                            }
                          })
                        ],
                        1
                      )
                    : item.type == "pickColor"
                      ? _c(
                          "span",
                          [
                            _c("el-color-picker", {
                              model: {
                                value: _vm.ruleForm[item.prop],
                                callback: function($$v) {
                                  _vm.$set(_vm.ruleForm, item.prop, $$v)
                                },
                                expression: "ruleForm[item.prop]"
                              }
                            })
                          ],
                          1
                        )
                      : item.type == "select_stu"
                        ? _c(
                            "span",
                            [
                              _c(
                                "el-select",
                                {
                                  attrs: {
                                    placeholder: item.holder,
                                    disabled: item.beAble
                                  },
                                  model: {
                                    value: _vm.ruleForm[item.prop],
                                    callback: function($$v) {
                                      _vm.$set(_vm.ruleForm, item.prop, $$v)
                                    },
                                    expression: "ruleForm[item.prop]"
                                  }
                                },
                                [
                                  _c("el-option", {
                                    attrs: { label: "停用", value: "0" }
                                  }),
                                  _vm._v(" "),
                                  _c("el-option", {
                                    attrs: { label: "启用", value: "1" }
                                  })
                                ],
                                1
                              )
                            ],
                            1
                          )
                        : item.type == "select_def"
                          ? _c(
                              "span",
                              [
                                _c(
                                  "el-select",
                                  {
                                    attrs: {
                                      placeholder: item.holder,
                                      disabled: item.beAble
                                    },
                                    model: {
                                      value: _vm.ruleForm[item.prop],
                                      callback: function($$v) {
                                        _vm.$set(_vm.ruleForm, item.prop, $$v)
                                      },
                                      expression: "ruleForm[item.prop]"
                                    }
                                  },
                                  [
                                    _c("el-option", {
                                      attrs: { label: "否", value: "0" }
                                    }),
                                    _vm._v(" "),
                                    _c("el-option", {
                                      attrs: { label: "是", value: "1" }
                                    })
                                  ],
                                  1
                                )
                              ],
                              1
                            )
                          : item.type == "select"
                            ? _c(
                                "span",
                                [
                                  _c(
                                    "el-select",
                                    {
                                      attrs: {
                                        placeholder: item.holder,
                                        disabled: item.beAble
                                      },
                                      model: {
                                        value: _vm.ruleForm[item.prop],
                                        callback: function($$v) {
                                          _vm.$set(_vm.ruleForm, item.prop, $$v)
                                        },
                                        expression: "ruleForm[item.prop]"
                                      }
                                    },
                                    _vm._l(_vm.selects, function(iList) {
                                      return _c("span", { key: iList.id }, [
                                        iList[index]
                                          ? _c(
                                              "span",
                                              _vm._l(iList[index], function(
                                                list
                                              ) {
                                                return _c("el-option", {
                                                  key: list.id,
                                                  attrs: {
                                                    label: list.name,
                                                    value: list.id
                                                  }
                                                })
                                              })
                                            )
                                          : _vm._e()
                                      ])
                                    })
                                  )
                                ],
                                1
                              )
                            : item.type == "textarea"
                              ? _c(
                                  "span",
                                  [
                                    _c("el-input", {
                                      attrs: {
                                        type: "textarea",
                                        placehode: item.holder
                                      },
                                      model: {
                                        value: _vm.ruleForm[item.prop],
                                        callback: function($$v) {
                                          _vm.$set(_vm.ruleForm, item.prop, $$v)
                                        },
                                        expression: "ruleForm[item.prop]"
                                      }
                                    })
                                  ],
                                  1
                                )
                              : _vm._e()
                ]
              )
            })
          ),
          _vm._v(" "),
          _c("light-table", {
            attrs: {
              listData: _vm.getsInfo[1],
              tableHead: _vm.tableHead[1],
              loading: _vm.loading,
              currentIndex: _vm.currentIndex,
              doChange: _vm.doChange[1]
            },
            on: {
              editSave: _vm.editSave,
              handleEdit: _vm.handleEdit,
              del: _vm.del,
              edit: _vm.edit,
              editCancel: _vm.editCancel
            }
          }),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "dialog-footer clearfix",
              attrs: { slot: "footer" },
              slot: "footer"
            },
            [
              _c(
                "div",
                { staticStyle: { float: "left" } },
                [
                  _c(
                    "el-button",
                    { attrs: { type: "primary" }, on: { click: _vm.addComb } },
                    [_vm._v("添加组合")]
                  ),
                  _vm._v(" "),
                  _c(
                    "el-button",
                    {
                      on: {
                        click: function($event) {
                          _vm.resetForm(_vm.goodsInfo)
                        }
                      }
                    },
                    [_vm._v("删除组合")]
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticStyle: { float: "right" } },
                [
                  _c(
                    "el-button",
                    {
                      attrs: { type: "primary" },
                      on: { click: _vm.submitForm }
                    },
                    [_vm._v("修改")]
                  ),
                  _vm._v(" "),
                  _c(
                    "el-button",
                    {
                      on: {
                        click: function($event) {
                          _vm.resetForm(_vm.addGoods)
                        }
                      }
                    },
                    [_vm._v("重置")]
                  )
                ],
                1
              )
            ]
          )
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "el-popover",
        {
          attrs: { slot: "tip", placement: "top", width: "160" },
          slot: "tip",
          model: {
            value: _vm.showDel,
            callback: function($$v) {
              _vm.showDel = $$v
            },
            expression: "showDel"
          }
        },
        [
          _c("p", [_vm._v("确定删除该条数据？")]),
          _vm._v(" "),
          _c(
            "div",
            { staticStyle: { "text-align": "right", margin: "0" } },
            [
              _c(
                "el-button",
                {
                  attrs: { size: "mini", type: "text" },
                  on: { click: _vm.cancelD }
                },
                [_vm._v("取消")]
              ),
              _vm._v(" "),
              _c(
                "el-button",
                {
                  attrs: { type: "primary", size: "mini" },
                  on: {
                    click: function($event) {
                      _vm.confirmD(_vm.delId)
                    }
                  }
                },
                [_vm._v("确定")]
              )
            ],
            1
          )
        ]
      ),
      _vm._v(" "),
      _c(
        "el-dialog",
        {
          staticClass: "goodsMag",
          attrs: { title: "选择商品", visible: _vm.showComb },
          on: {
            "update:visible": function($event) {
              _vm.showComb = $event
            }
          }
        },
        [
          _c(
            "div",
            [
              _c("label", [_vm._v("名称或编号")]),
              _vm._v(" "),
              _c("el-input", {
                staticStyle: { width: "60%", margin: "0 10px 0 5px" },
                attrs: { clearable: "" }
              }),
              _vm._v(" "),
              _c("el-button", { attrs: { type: "primary" } }, [_vm._v("查询")])
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "el-table",
            {
              directives: [
                {
                  name: "loading",
                  rawName: "v-loading",
                  value: _vm.loading,
                  expression: "loading"
                }
              ],
              ref: "multipleTable",
              attrs: {
                data: _vm.tData,
                fit: "",
                "highlight-current-row": "",
                type: "index",
                "element-loading-text": "拼命加载中",
                "element-loading-spinner": "el-icon-loading",
                "element-loading-background": "rgba(0, 0, 0, 0.6)",
                "max-height": "360"
              },
              on: {
                "selection-change": _vm.handleSelectionChange,
                "row-dblclick": _vm.choiceComb
              }
            },
            [
              _c("el-table-column", {
                attrs: { label: "组合", width: "55", type: "selection" }
              }),
              _vm._v(" "),
              _c("el-table-column", {
                attrs: {
                  prop: "goods.commodity_code",
                  label: "商品编码",
                  width: "160",
                  align: "center"
                }
              }),
              _vm._v(" "),
              _c("el-table-column", {
                attrs: {
                  prop: "spec_code",
                  label: "规格编码",
                  width: "160",
                  align: "center"
                }
              }),
              _vm._v(" "),
              _c("el-table-column", {
                attrs: {
                  prop: "goods.short_name",
                  label: "商品名称",
                  width: "180",
                  "show-overflow-tooltip": "",
                  align: "center"
                }
              }),
              _vm._v(" "),
              _c("el-table-column", {
                attrs: {
                  prop: "spec",
                  label: "规格名称",
                  width: "260",
                  "show-overflow-tooltip": "",
                  align: "center"
                }
              }),
              _vm._v(" "),
              _c("el-table-column", {
                attrs: {
                  label: "是否成品",
                  width: "160",
                  "show-overflow-tooltip": "",
                  align: "center"
                },
                scopedSlots: _vm._u([
                  {
                    key: "default",
                    fn: function(scope) {
                      return [
                        _vm._v(
                          _vm._s(scope.row.finished_pro == 0 ? "否" : "是")
                        )
                      ]
                    }
                  }
                ])
              }),
              _vm._v(" "),
              _c("el-table-column", {
                attrs: {
                  label: "组合件数",
                  width: "160",
                  "show-overflow-tooltip": "",
                  align: "center",
                  fixed: "right"
                },
                scopedSlots: _vm._u([
                  {
                    key: "default",
                    fn: function(scope) {
                      return [
                        _vm.combIndex == "index" + scope.row.id
                          ? _c("span", [
                              _c("input", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.countComp,
                                    expression: "countComp"
                                  }
                                ],
                                staticStyle: { width: "62px" },
                                attrs: { type: "number" },
                                domProps: { value: _vm.countComp },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.countComp = $event.target.value
                                  }
                                }
                              })
                            ])
                          : _c("span", [
                              _vm._v(
                                "\n                        " +
                                  _vm._s(0) +
                                  "\n                    "
                              )
                            ])
                      ]
                    }
                  }
                ])
              })
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "div",
            { staticStyle: { "text-align": "right" } },
            [
              _c(
                "el-button",
                {
                  attrs: { type: "primary" },
                  on: { click: _vm.confirmAddComb }
                },
                [_vm._v("确认")]
              ),
              _vm._v(" "),
              _c("el-button", [_vm._v("取消")])
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-609d93e9", module.exports)
  }
}

/***/ })

});
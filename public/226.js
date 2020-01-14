webpackJsonp([226],{

/***/ 501:
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      newC: '',
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
      addInfoRef: 'goods',
      activeName: '0',
      goodsInfo: [],
      goodsHead: [{
        label: '产品图片',
        width: '200',
        prop: "img",
        type: 'text'
      }, {
        label: '店铺名称',
        width: '150',
        prop: "shop_nick",
        type: 'text'
      }, {
        label: '供货商',
        width: '150',
        prop: 'supplier',
        nmProp: 'name',
        type: 'select'
      }, {
        label: '产品类别',
        width: '120',
        prop: "category",
        nmProp: 'name',
        type: 'select'
      }, {
        label: '工厂型号',
        width: '120',
        prop: "factory_model",
        type: 'text'
      }, {
        label: '商品编码',
        width: '180',
        prop: "commodity_code",
        type: 'text'
      }, {
        label: '京东商品编码',
        width: '180',
        prop: "jd_sn",
        type: 'text'
      }, {
        label: '唯品会商品编码',
        width: '180',
        prop: "vips_sn",
        type: 'text'
      }, {
        label: '商品简称',
        width: '120',
        prop: "short_name",
        type: 'text'
      }, {
        label: '商品标题',
        width: '150',
        prop: "title",
        type: 'text'
      }, {
        label: '备注',
        width: '120',
        prop: "remark",
        type: 'textarea'
      }, {
        label: '停产',
        width: '80',
        prop: "is_stop_pro",
        type: 'checkbox'
      }, {
        label: '启用',
        width: '80',
        prop: "status",
        type: 'checkbox'
      }],
      goodsUrl: '/goods',
      goodsLoading: true,
      showMask: false,
      getsInfo: [[], [], []],
      btmTableHead: [[], [{
        label: '规格编码',
        width: '160',
        prop: "spec_code",
        type: 'text'
      }, {
        label: '京东规格编号',
        width: '180',
        prop: "jd_specs_code",
        type: 'text'
      }, {
        label: '唯品会规格编号',
        width: '180',
        prop: "vips_specs_code",
        type: 'text'
      },
      /* {
         label: '规格图片',
         width: '120',
         prop: "img_url",
         holder: '请输入图片地址',
         type: 'text'
       },*/
      {
        label: '淘宝价格',
        width: '120',
        prop: "tb_price",
        type: 'number'
      }, {
        label: '成本价格',
        width: '120',
        prop: "cost",
        type: 'number'
      }, {
        label: '销售价格',
        width: '120',
        prop: "price",
        type: 'number'
      }, {
        label: '仓库成本',
        width: '120',
        prop: "warehouse_cost",
        type: 'number'
      }, {
        label: '折扣',
        width: '120',
        prop: "discount",
        type: 'number'
      }, {
        label: '佣金点',
        width: '100',
        prop: "commission",
        type: 'number'
      }, {
        label: '木架费',
        width: '120',
        prop: "wooden_frame_costs",
        type: 'number'
      }, {
        label: '采购运费',
        width: '120',
        prop: "purchase_freight",
        type: 'number'
      }, {
        label: '组合',
        width: '120',
        prop: "is_combination",
        type: 'checkbox',
        chgAble: false,
        editChgAble: true
      }, {
        label: '包件数量',
        width: '120',
        prop: "package_quantity",
        type: 'number'
      }, {
        label: '库存预警数量',
        width: '150',
        prop: "inventory_warning",
        type: 'number'
      }, {
        label: '采购预警天数',
        width: '150',
        prop: "purchase_days_warning",
        // holder: '请输入采购预警天数',
        type: 'number'
      }, {
        label: '产品配送类别',
        width: '150',
        prop: 'distribution_method_id',
        stateVal: 'distmets',
        type: 'select'
      }, {
        label: '规格',
        width: '200',
        prop: "spec",
        // holder: '请输入规格',
        type: 'text'
      },
      /*{
        label: '最高价格',
        width: '120',
        prop: "highest_price",
        holder: '请输入最高价格',
        type: 'number'
      },
      {
        label: '成本价格',
        width: '120',
        prop: "cost",
        holder: '请输入所成本价格',
        type: 'number'
      },
      {
        label: '装配价格',
        width: '120',
        prop: "assembly_price",
        holder: '请输入装配价格',
        type: 'number'
      },
      {
        label: '最低价格',
        width: '120',
        prop: "lowest_price",
        holder: '请输入最低价格',
        type: 'number'
      },
      {
        label: '销售价格',
        width: '120',
        prop: "price",
        holder: '请输入销售价格',
        type: 'number'
      },
      {
        label: '打包费用',
        width: '120',
        prop: "package_costs",
        holder: '请输入打包费用',
        type: 'number'
      },
       {
        label: '条形码',
        width: '100',
        prop: "bar_code",
        holder: '请输入佣金点',
        type: 'text'
      },
      {
        label: '可售数预警数量',
        width: '180',
        prop: "available_warning",
        holder: '请输入可售数预警数量',
        type: 'number'
      },
      */
      {
        label: '颜色',
        width: '120',
        prop: "color",
        // holder: '请输入颜色',
        type: 'text'
      }, {
        label: '材质',
        width: '130',
        prop: "materials",
        // holder: '请输入材质',
        type: 'text'
      }, {
        label: '功能',
        width: '100',
        prop: "function",
        // holder: '请输入功能',
        type: 'text'
      }, {
        label: '特殊',
        width: '130',
        prop: "special",
        // holder: '请输入特殊',
        type: 'text'
      }, {
        label: '其他',
        width: '150',
        prop: "other",
        // holder: '请输入其他',
        type: 'text'
      }, {
        label: '长度',
        width: '120',
        prop: "longness",
        // holder: '请输入长度',
        type: 'number'
      }, {
        label: '宽度',
        width: '120',
        prop: "width",
        // holder: '请输入宽度',
        type: 'number'
      }, {
        label: '高度',
        width: '120',
        prop: "height",
        // holder: '请输入高度',
        type: 'number'
      }, {
        label: '体积',
        width: '120',
        prop: "volume",
        // holder: '请输入体积',
        type: 'number'
      }, {
        label: '重量',
        width: '120',
        prop: "weight",
        // holder: '请输入重量',
        type: 'number'
      }, {
        label: '备注',
        width: '150',
        prop: "remark",
        // holder: '请输入备注',
        type: 'textarea'
      }, {
        label: '成品',
        width: '120',
        prop: "finished_pro",
        // holder: '请选择是否是成品',
        type: 'checkbox'
      }, {
        label: '停产',
        width: '120',
        prop: "is_stop_pro",
        // holder: '请选择是否是停产',
        type: 'checkbox'
      }], [{
        label: '产品规格编码',
        width: '150',
        prop: "product_specs",
        holder: '请选择产品规格编码',
        type: 'select',
        val: this.sonArr
      }, {
        label: '组合产品规格编码',
        width: '150',
        prop: "com_pro_specs",
        holder: '请选择组合产品规格编码',
        type: 'select',
        val: this.sonArr
      }, {
        label: ' 组合件数',
        width: '120',
        prop: "count",
        holder: '请输入 组合件数',
        type: 'number'
      }, {
        label: '状态',
        width: '80',
        prop: "status",
        type: 'select_stu'
      }], []],
      chgSpecVal: [],
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
        shops_id: '',
        shop_nick: '',
        supplier_id: '',
        category_id: '',
        remark: '',
        title: '',
        img: '',
        url: '',
        is_stop_pro: false,
        status: true,
        productspecs: []
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
      addArr: [{
        label: '商品编码',
        prop: 'commodity_code',
        holder: '请输入商品编号',
        type: 'text',
        addChgAble: false,
        editChgAble: true
      }, {
        label: '京东编码',
        prop: 'jd_sn',
        holder: '请输入京东编码',
        type: 'text'
      }, {
        label: '唯品会编码',
        prop: 'vips_sn',
        holder: '请输入唯品会编码',
        type: 'text'
      }, {
        label: '工厂型号',
        prop: 'factory_model',
        holder: '请输入工厂型号',
        type: 'text'
      }, {
        label: '商品简称',
        prop: 'short_name',
        holder: '请输入商品简称',
        type: 'text'
      }, {
        label: '卖家昵称',
        prop: 'shops_id',
        holder: '请选择卖家昵称',
        type: 'select',
        stateVal: 'shops'
      }, {
        label: '供货厂商',
        prop: 'supplier_id',
        holder: '请选择供货厂商',
        type: 'select',
        stateVal: 'suppliers'
      }, {
        label: '商品类别',
        prop: 'category_id',
        holder: '请选择产品类别',
        type: 'select',
        stateVal: 'goodscates'
      }, {
        label: '商品备注',
        prop: 'remark',
        holder: '请输入商品备注',
        type: 'textarea'
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
      }],
      /*子件信息*/
      specHead: [
      /*{
        label: '商品简称',
        width: '120',
        prop: "",
        type: 'text',
      },*/
      {
        label: '规格编码',
        width: '160',
        prop: "spec_code",
        type: 'text'
      }, {
        label: '京东规格编号',
        width: '180',
        prop: "jd_specs_code",
        type: 'text'
      }, {
        label: '唯品会规格编号',
        width: '180',
        prop: "vips_specs_code",
        type: 'text'
      },
      /* {
         label: '规格图片',
         width: '120',
         prop: "img_url",
         holder: '请输入图片地址',
         type: 'text'
       },*/
      {
        label: '淘宝价格',
        width: '120',
        prop: "tb_price",
        type: 'number'
      }, {
        label: '成本价格',
        width: '120',
        prop: "cost",
        type: 'number'
      }, {
        label: '销售价格',
        width: '120',
        prop: "price",
        type: 'number'
      }, {
        label: '最低销售价格',
        width: '120',
        prop: "lowest_price",
        type: 'number'
      }, {
        label: '最高销售价格',
        width: '120',
        prop: "highest_price",
        type: 'number'
      }, {
        label: '仓库成本',
        width: '120',
        prop: "warehouse_cost",
        type: 'number'
      }, {
        label: '配装价格',
        width: '120',
        prop: "assembly_price",
        type: 'number'
      }, {
        label: '折扣',
        width: '120',
        prop: "discount",
        type: 'number'
      }, {
        label: '佣金点',
        width: '100',
        prop: "commission",
        type: 'number'
      }, {
        label: '组合',
        width: '120',
        prop: "is_combination",
        type: 'checkbox'
      }, {
        label: '包件数量',
        width: '120',
        prop: "package_quantity",
        type: 'number'
      }, {
        label: '打包费',
        width: '120',
        prop: "package_costs",
        type: 'number'
      }, {
        label: '木架费',
        width: '120',
        prop: "wooden_frame_costs",
        type: 'number'
      }, {
        label: '采购运费',
        width: '120',
        prop: "purchase_freight",
        type: 'number'
      }, {
        label: '库存预警数量',
        width: '150',
        prop: "inventory_warning",
        // holder: '请输入库存预警数量',
        type: 'number'
      }, {
        label: '采购预警天数',
        width: '150',
        prop: "purchase_days_warning",
        // holder: '请输入采购预警天数',
        type: 'number'
      }, {
        label: '可售数预警',
        width: '150',
        prop: "available_warning",
        // holder: '请输入采购预警天数',
        type: 'number'
      }, {
        label: '产品配送类别',
        width: '150',
        prop: 'distribution_method_id',
        holder: '请选择产品配送类别',
        stateVal: 'distmets',
        type: 'select'
      }, {
        label: '条形码',
        width: '120',
        prop: "bar_code",
        type: 'text'
      }, {
        label: '图片地址',
        width: '120',
        prop: "img_url",
        type: 'text'
      }, {
        label: '规格',
        width: '200',
        prop: "spec",
        // holder: '请输入规格',
        type: 'text'
      }, {
        label: '颜色',
        width: '120',
        prop: "color",
        // holder: '请输入颜色',
        type: 'text'
      }, {
        label: '材质',
        width: '130',
        prop: "materials",
        // holder: '请输入材质',
        type: 'text'
      }, {
        label: '功能',
        width: '100',
        prop: "function",
        // holder: '请输入功能',
        type: 'text'
      }, {
        label: '特殊',
        width: '130',
        prop: "special",
        // holder: '请输入特殊',
        type: 'text'
      }, {
        label: '其他',
        width: '150',
        prop: "other",
        // holder: '请输入其他',
        type: 'text'
      }, {
        label: '长度(mm)',
        width: '120',
        prop: "longness",
        // holder: '请输入长度',
        type: 'number'
      }, {
        label: '宽度(mm)',
        width: '120',
        prop: "width",
        // holder: '请输入宽度',
        type: 'number'
      }, {
        label: '高度(mm)',
        width: '120',
        prop: "height",
        // holder: '请输入高度',
        type: 'number'
      }, {
        label: '体积(m3)',
        width: '120',
        prop: "volume",
        // holder: '请输入体积',
        type: 'number'
      }, {
        label: '重量',
        width: '120',
        prop: "weight",
        // holder: '请输入重量',
        type: 'number'
      }, {
        label: '备注',
        width: '150',
        prop: "remark",
        // holder: '请输入备注',
        type: 'textarea'
      }, {
        label: '成品',
        width: '120',
        prop: "finished_pro",
        // holder: '请选择是否是成品',
        type: 'checkbox'
      }, {
        label: '停产',
        width: '120',
        prop: "is_stop_pro",
        // holder: '请选择是否是停产',
        type: 'checkbox'
      }, {
        label: '仓库',
        width: '120',
        prop: "",
        holder: '请选择仓库',
        stateVal: '',
        type: 'select'
      }, {
        label: '入库数量',
        width: '120',
        prop: "",
        holder: '请选择入库数量',
        type: 'number'
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
      moreForms: true,
      newArr: [],
      specIndex: '',
      combCount: [],
      combArr: [],
      idNew: [],
      combinationsArr: [],
      fetchCombData: [],
      specAddIndex: '',
      combRowIndex: '',
      sonData: [],
      specRowInfo: {},
      /*新数据*/
      // goodsSpec:[{is_combination: false,finished_pro: true,is_stop_pro: false}],
      goodsSpec: [],
      selectPro: [{
        label: '成品',
        width: '80',
        prop: "finished_pro",
        type: 'checkbox',
        /*false 可点击 不写默认false 即不写是可点击*/
        clickAble: true
      }, {
        label: '组合',
        width: '86',
        prop: "is_combination",
        type: 'checkbox',
        /*true不可点击*/
        clickAble: true
      }, {
        label: '商品编码',
        width: '150',
        prop: "goods",
        inProp: "commodity_code",
        type: 'text'
      }, {
        label: '规格编码',
        width: '150',
        prop: "spec_code",
        type: 'text'
      }, {
        label: '商品名称',
        width: '150',
        prop: "goods",
        inProp: 'short_name',
        type: 'text'
      }, {
        label: '规格名称',
        width: '200',
        prop: "spec",
        type: 'text'
      }],
      /*选取规格默认值*/
      pushData: { is_combination: false, finished_pro: true, is_stop_pro: false },
      /*点击时push规格数据*/
      specKey: {
        spec_code: '',
        jd_specs_code: '',
        vips_specs_code: '',
        tb_price: '',
        cost: '',
        price: '',
        highest_price: '',
        lowest_price: '',
        warehouse_cost: '',
        assembly_price: '',
        discount: '',
        commission: '',
        is_combination: '0',
        package_quantity: '',
        package_costs: '',
        wooden_frame_costs: '',
        purchase_freight: '',
        inventory_warning: '',
        purchase_days_warning: '',
        available_warning: '',
        distribution_method_id: '',
        bar_code: '',
        img_url: '',
        spec: '',
        color: '',
        materials: '',
        function: '',
        special: '',
        other: '',
        longness: '',
        width: '',
        height: '',
        volume: '',
        weight: '',
        remark: '',
        finished_pro: true,
        is_stop_pro: false,
        combinations: [],
        combSpecData: []
      },
      combData: [],
      combHead: [{
        label: '商品简称',
        // width: '120',
        prop: "goods",
        inProp: "short_name",
        type: 'text'
      }, {
        label: '商品编码',
        // width: '160',
        prop: "goods",
        inProp: "commodity_code",
        type: 'text'
      }, {
        label: '规格编码',
        // width: '160',
        prop: "spec_code",
        type: 'text'
      }, {
        label: '淘宝价格',
        // width: '120',
        prop: "tb_price",
        type: 'number'
      }, {
        label: '成本价格',
        // width: '120',
        prop: "cost",
        type: 'number'
      }, {
        label: '销售价格',
        // width: '120',
        prop: "price",
        type: 'number'
      }, {
        label: '包件数量',
        // width: '120',
        prop: "package_quantity",
        type: 'number'
      }, {
        label: '规格',
        // width: '150',
        prop: "spec",
        type: 'text'
      }, {
        label: '颜色',
        // width: '120',
        prop: "color",
        type: 'text'
      }, {
        label: '材质',
        // width: '130',
        prop: "materials",
        type: 'text'
      }, {
        label: '特殊',
        // width: '130',
        prop: "special",
        type: 'text'
      }, {
        label: '其他',
        // width: '150',
        prop: "other",
        type: 'text'
      }, {
        label: '体积',
        // width: '120',
        prop: "volume",
        type: 'number'
      }, {
        label: '成品',
        prop: "finished_pro",
        type: 'checkbox'
      }, {
        label: '最低销售价格',
        // width: '120',
        prop: "lowest_price",
        type: 'number'
      }, {
        label: '最高销售价格',
        // width: '120',
        prop: "highest_price",
        type: 'number'
      }],
      btmSpecHead: [{
        label: '规格编码',
        // width: '160',
        prop: 'com_pro_spec',
        inProp: "spec_code",
        type: 'text'
      }, {
        label: '京东规格编码',
        // width: '180',
        prop: 'com_pro_spec',
        inProp: "jd_specs_code",
        type: 'text'
      }, {
        label: '唯品会规格编码',
        // width: '180',
        prop: 'com_pro_spec',
        inProp: "vips_specs_code",
        type: 'text'
      }, {
        label: '淘宝价格',
        // width: '120',
        prop: 'com_pro_spec',
        inProp: "tb_price",
        type: 'number'
      }, {
        label: '成本价格',
        // width: '120',
        prop: 'com_pro_spec',
        inProp: "cost",
        type: 'number'
      }, {
        label: '销售价格',
        // width: '120',
        prop: 'com_pro_spec',
        inProp: "price",
        type: 'number'
      }, {
        label: '折扣',
        // width: '120',
        prop: 'com_pro_spec',
        inProp: "discount",
        type: 'number'
      }, {
        label: '木架费',
        // width: '120',
        prop: 'com_pro_spec',
        inProp: "wooden_frame_costs",
        type: 'number'
      }, {
        label: '包件数量',
        // width: '120',
        prop: 'com_pro_spec',
        inProp: "package_quantity",
        type: 'number'
      }, {
        label: '规格',
        // width: '150',
        prop: 'com_pro_spec',
        inProp: "spec",
        type: 'text'
      }, {
        label: '颜色',
        // width: '120',
        prop: 'com_pro_spec',
        inProp: "color",
        type: 'text'
      }, {
        label: '材质',
        // width: '130',
        prop: 'com_pro_spec',
        inProp: "materials",
        type: 'text'
      }, {
        label: '特殊',
        // width: '130',
        prop: 'com_pro_spec',
        inProp: "special",
        type: 'text'
      }, {
        label: '其他',
        // width: '150',
        prop: 'com_pro_spec',
        inProp: "other",
        type: 'text'
      }, {
        label: '体积',
        // width: '120',
        prop: 'com_pro_spec',
        inProp: "volume",
        type: 'number'
      }, {
        label: '成品',
        // width: '120',
        prop: 'com_pro_spec',
        inProp: "finished_pro",
        type: 'checkbox'
      }, {
        label: '最低销售价格',
        // width: '120',
        prop: 'com_pro_spec',
        inProp: "lowest_price",
        type: 'number'
      }, {
        label: '最高销售价格',
        // width: '120',
        prop: 'com_pro_spec',
        inProp: "highest_price",
        type: 'number'
      }],
      editSpecIndex: '',
      combUrl: '/combinations',
      editIndex: 0,
      inputChg: false,
      chgEId: '',
      conditionPro: ''
    };
  },

  computed: {
    resData: {
      get: function get() {
        return this.$store.state.responseData;
      },
      set: function set() {}
    },
    urls: {
      get: function get() {
        return this.$store.state.urls;
      },
      set: function set() {}
    }
  },
  methods: {
    toggleChecked: function toggleChecked() {
      this.checkboxInit = !this.checkboxInit;
    },
    test: function test() {},

    /*点击添加商品*/
    addNew: function addNew() {
      this.showMask = true;
      this.resetAddInfo();
    },
    CB_dialog: function CB_dialog(val) {
      this.showMask = val;
      this.editMask = val;
    },

    /*提交添加数据*/
    submitForm: function submitForm() {
      var _this = this;

      /*提交数据时，如果规格中有空白项目，踢除
      * 修改规格中的组合字段
      * 如果组合字段长度大于0，默认组合自动开启
      * */
      var obj = this.ruleForm;
      obj.productspecs.map(function (item, index) {
        if (!item.spec_code) {
          /*如果是空的话，删除规格*/
          obj.productspecs.splice(index, 1);
        } else {
          obj.productspecs[index].combSpecData = [];
        }
      });
      this.resData.shops.map(function (item) {
        if (item.id == _this.ruleForm.shops_id) {
          _this.ruleForm.shop_nick = item.nick;
        }
      });
      this.$post(this.goodsUrl, obj).then(function () {
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
    resetAddInfo: function resetAddInfo() {
      Object.assign(this.$data.ruleForm, this.$options.data().ruleForm);
      Object.assign(this.$data.specKey, this.$options.data().specKey);
      this.ruleForm.productspecs.push(this.specKey);
      this.newC = 'index0';
      this.specIndex = 0;
    },

    /*取消添加*/
    cancelAdd: function cancelAdd() {
      this.showMask = false;
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
      var _this2 = this;

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
          _this2.$message({
            message: '修改成功',
            type: 'success'
          });
          _this2.getInfo(_this2.url[_this2.activeName]);
          _this2.currentIndex = '';
          _this2.inputChange = false;
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

    /*获取商品信息*/
    getGoodsInfo: function getGoodsInfo() {
      var _this3 = this;

      this.goodsLoading = true;
      this.$fetch(this.urls.goods).then(function (res) {
        _this3.goodsLoading = false;
        _this3.goodsInfo = res.data;
        // if(res.data[0] && res.data[0].productspecs){
        if (res.data[0] && res.data[0].productspecs) {
          _this3.goodsSpec = res.data[0].productspecs;
          /* if(res.data[0].productspecs.length==0){
             this.goodsSpec=[];
           }else{
             res.data[0].productspecs.map(item=>{
               this.goodsSpec.push(item);
             });
           }*/
        }
        var pg = res.meta.pagination;
        _this3.$store.dispatch('currentPage', pg.current_page);
        _this3.$store.commit('PER_PAGE', pg.per_page);
        _this3.$store.commit('PAGE_TOTAL', pg.total);
        /*请求数据成功之后，请求需要的所有子数据*/
        _this3.$store.dispatch('shops', '/shops');
        _this3.$store.dispatch('suppliers', '/suppliers');
        _this3.$store.dispatch('goodscates', '/goodscates');
        _this3.$store.dispatch('distmets', '/distmets');
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
    },

    /*切换tab时只显示id为第一条商品的规格及其他*/
    /*添加sku*/
    addSku: function addSku(row) {},
    handleTabsClick: function handleTabsClick() {
      this.loading = true;
      // let id = this.goodsInfo[0].id;
      if (this.activeName == 1) {
        /* this.$fetch(this.url[this.activeName] + '/' + id)
           .then(res => {
             this.loading = false;
             this.getsInfo[this.activeName]=[];
             this.getsInfo[this.activeName].push(res);
           }, err => {
             if (err.response) {
               let arr = err.response.data.errors;
               let arr1 = [];
               for (let i in arr) {
                 arr1.push(arr[i]);
               }
               let str = arr1.join(',');
               this.$message.error({
                 message: str
               });
             }
           })*/
      }
    },

    /*在商品中单击时，tab显示为id为当前商品的规格及其他*/
    proRowClick: function proRowClick(row) {
      this.goodsSpec = row.productspecs;
      /*if(row.productspecs.length==0){
        this.goodsSpec=[];
      }else{
        // this.goodsSpec=[{is_combination:'',finished_pro:'',is_stop_pro:''}];
       /!* row.productspecs.map(item=>{
          this.goodsSpec.push(item);
        });*!/
      }*/
    },

    /*删除单条*/
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
      var _this4 = this;

      this.$del(this.goodsUrl + '/' + id).then(function () {
        _this4.$message({
          message: '删除成功',
          type: 'success'
        });
        _this4.showDel = false;
        _this4.refresh();
      }, function (err) {
        if (err.response) {
          _this4.showDel = false;
          var arr = err.response.data.errors;
          var arr1 = [];
          for (var i in arr) {
            arr1.push(arr[i]);
          }
          var str = arr1.join(',');
          _this4.$message.error({
            message: str
          });
        }
      });
    },

    /*批量删除*/
    delMore: function delMore() {
      var _this5 = this;

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
          _this5.$del(_this5.goodsUrl, { ids: _this5.delArr }).then(function () {
            _this5.$message({
              message: '删除成功',
              type: 'success'
            });
            _this5.refresh();
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
        }).catch(function () {
          _this5.$message({
            type: 'info',
            message: '已取消删除'
          });
        });
      }
    },
    handleSelectionChange: function handleSelectionChange(val) {
      if (val.length != 0) {
        this.editId = val[0].id;
      } else {
        this.editId = '';
      }
      this.multipleSelection = val;
      var del = [];
      this.multipleSelection.forEach(function (selectedItem) {
        del.push(selectedItem.id);
      });
      this.delArr = del.join(',');
    },

    /*页面刷新*/
    refresh: function refresh() {
      this.goodsLoading = true;
      this.getGoodsInfo();
      /*setTimeout(() => {
        this.goodsLoading = false;
      }, 2000);*/
    },

    /*修改商品信息*/
    editInfo: function editInfo() {
      var _this6 = this;

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
          this.editSpecIndex = '';
          this.$fetch(this.goodsUrl + '/' + this.editId).then(function (res) {
            _this6.editData = {
              commodity_code: res.commodity_code,
              jd_sn: res.jd_sn,
              vips_sn: res.vips_sn,
              factory_model: res.factory_model,
              short_name: res.short_name,
              shops_id: res.shops_id,
              supplier_id: res.supplier.id,
              category_id: res.category.id,
              remark: res.remark,
              title: res.title,
              img: res.img,
              url: res.url,
              productspecs: res.productspecs
            };
          }, function (err) {
            console.log(err);
          });
        }
      }
    },
    editForm: function editForm() {
      var _this7 = this;

      var obj = {
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
      this.$patch(this.goodsUrl + '/' + this.editId, obj).then(function () {
        _this7.$message({
          message: '修改成功',
          type: 'success'
        });
        _this7.editMask = false;
        _this7.refresh();
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
    editAddSpec: function editAddSpec() {
      var obj = {
        spec_code: '',
        jd_specs_code: '',
        vips_specs_code: '',
        tb_price: '',
        cost: '',
        price: '',
        highest_price: '',
        lowest_price: '',
        warehouse_cost: '',
        assembly_price: '',
        discount: '',
        commission: '',
        is_combination: '0',
        package_quantity: '',
        package_costs: '',
        wooden_frame_costs: '',
        purchase_freight: '',
        inventory_warning: '',
        purchase_days_warning: '',
        available_warning: '',
        distribution_method_id: '',
        bar_code: '',
        img_url: '',
        spec: '',
        color: '',
        materials: '',
        function: '',
        special: '',
        other: '',
        longness: '',
        width: '',
        height: '',
        volume: '',
        weight: '',
        remark: '',
        finished_pro: '',
        is_stop_pro: ''
      };
      if (this.editData.productspecs.length > 0 && !this.editData.productspecs[this.editData.productspecs.length - 1].spec_code) {
        this.$message({
          message: '规格编码为空时不能添加新规格',
          type: 'info'
        });
      } else {
        this.editData.productspecs.push(obj);
      }
    },
    getData: function getData() {
      console.log(this.searchBox);
    },

    /*规格信息单击进行修改*/
    rowEdit: function rowEdit() {
      this.currentIndex = 'index' + index;
    },
    tableRowClassName: function tableRowClassName(_ref) {
      var row = _ref.row,
          rowIndex = _ref.rowIndex;

      row.index = rowIndex;
    },

    /*规格*/
    specRowClick: function specRowClick(row) {
      this.specIndex = row.index;
      // this.newC = 'index' + row.index;
    },
    specSave: function specSave(index, row) {
      var specKey = {
        spec_code: '',
        jd_specs_code: '',
        vips_specs_code: '',
        tb_price: '',
        cost: '',
        price: '',
        highest_price: '',
        lowest_price: '',
        warehouse_cost: '',
        assembly_price: '',
        discount: '',
        commission: '',
        is_combination: '0',
        package_quantity: '',
        package_costs: '',
        wooden_frame_costs: '',
        purchase_freight: '',
        inventory_warning: '',
        purchase_days_warning: '',
        available_warning: '',
        distribution_method_id: '',
        bar_code: '',
        img_url: '',
        spec: '',
        color: '',
        materials: '',
        function: '',
        special: '',
        other: '',
        longness: '',
        width: '',
        height: '',
        volume: '',
        weight: '',
        remark: '',
        finished_pro: '1',
        is_stop_pro: '0',
        combinations: [],
        combSpecData: []
      };
      if (!row.spec_code) {
        this.$message.error({
          message: '规格编码不能为空'
        });
      } else {
        if (this.ruleForm.productspecs.length == 0) {
          Object.assign(this.ruleForm.productspecs[index], row);
          this.ruleForm.productspecs.push(specKey);
          this.newC = 'index' + (index + 1);
        } else {
          var addNewLine = true;
          this.ruleForm.productspecs.map(function (item) {
            if (item.spec_code == '') {
              addNewLine = false;
            }
          });
          if (!addNewLine) {
            this.newC = '';
          } else {
            Object.assign(this.ruleForm.productspecs[index], row);
            this.ruleForm.productspecs.push(specKey);
            this.newC = 'index' + (index + 1);
          }
        }
      }
    },
    specEdit: function specEdit(row) {
      this.newC = 'index' + row.index;
      /*更新数据*/
      Object.assign(this.ruleForm.productspecs[row.index], row);
      this.specIndex = row.index;
    },

    /*修改时添加规格*/
    addSpec: function addSpec() {
      var specKey = {
        spec_code: '',
        jd_specs_code: '',
        vips_specs_code: '',
        tb_price: '',
        cost: '',
        price: '',
        highest_price: '',
        lowest_price: '',
        warehouse_cost: '',
        assembly_price: '',
        discount: '',
        commission: '',
        is_combination: '0',
        package_quantity: '',
        package_costs: '',
        wooden_frame_costs: '',
        purchase_freight: '',
        inventory_warning: '',
        purchase_days_warning: '',
        available_warning: '',
        distribution_method_id: '',
        bar_code: '',
        img_url: '',
        spec: '',
        color: '',
        materials: '',
        function: '',
        special: '',
        other: '',
        longness: '',
        width: '',
        height: '',
        volume: '',
        weight: '',
        remark: '',
        finished_pro: '1',
        is_stop_pro: '0',
        combinations: [],
        combSpecData: []
      };
      var obj = this.editData.productspecs;
      var addLine = true;
      obj.map(function (item) {
        if (item.spec_code == '') {
          addLine = false;
        } else {
          addLine = true;
        }
      });
      if (addLine) {
        obj.push(specKey);
        this.editSpecIndex = 'index' + (obj.length - 1);
      } else {
        this.editSpecIndex = 'index' + (obj.length - 1);
        this.$message.error({
          message: "有规格编码为空时不能添加新规格"
        });
      }
    },

    /*添加组合*/
    addComb: function addComb() {
      //数据初始化
      this.combArr = [];
      this.combCount = [];
      this.combIndex = '';
      this.idNew = [];
      /*修改*/
      /* if(this.editMask){
         this.showComb = true;
         if(this.chgOrNew=='edit'){
           /!*修改时修改规格*!/
           this.$fetch(this.urls.productspecs,{'is_combination':'false'}).then(res => {
             this.combData = res.data;
           });
         }else if(this.chgOrNew=='new'){
           /!*修改时添加规格*!/
           this.$fetch(this.urls.productspecs,{'is_combination':'false'}).then(res => {
             this.combData = res.data;
           });
         }
       }else if(this.showMask){
         /!*添加*!/
         if(!this.ruleForm.commodity_code){
           this.$message.error({
             message: '商品编码不能为空'
           });
           return
         }else if(!this.ruleForm.productspecs[0].spec_code){
           /!*规格编码不能为空*!/
           this.$message.error({
             message: '规格编码不能为空'
           });
           return
         }else{
           this.showComb = true;
           this.$fetch(this.url[1],{'is_combination':'false'}).then(res => {
             this.combData = res.data;
           }, err => {});
         }
       }*/
      if (this.editMask) {
        this.showComb = true;
      } else if (this.showMask) {
        if (!this.ruleForm.commodity_code) {
          this.$message.error({
            message: '商品编码不能为空'
          });
          return;
        } else if (!this.ruleForm.productspecs[0].spec_code) {
          /*规格编码不能为空*/
          this.$message.error({
            message: '规格编码不能为空'
          });
          return;
        } else {
          this.showComb = true;
        }
      }
    },
    setHeadStyle: function setHeadStyle() {
      return 'header-style';
    },
    combClassName: function combClassName(_ref2) {
      var row = _ref2.row,
          rowIndex = _ref2.rowIndex;

      row.index = rowIndex;
    },
    proRClick: function proRClick(row) {
      this.combIndex = 'index' + row.index;
    },
    handleBlur: function handleBlur(row) {
      var obj = {
        com_pro_specs_id: row.id,
        count: this.combCount[row.index]
      };
      var arr = this.combArr;
      if (obj.count) {
        if (arr.length == 0) {
          arr.push(obj);
          this.idNew.push(obj.com_pro_specs_id);
        } else {
          if (this.idNew.indexOf(obj.com_pro_specs_id) == -1) {
            this.idNew.push(obj.com_pro_specs_id);
            arr.push(obj);
          } else {
            arr.map(function (item) {
              if (item.com_pro_specs_id == obj.com_pro_specs_id) {
                item.count = obj.count;
              }
            });
          }
        }
      }
    },
    getPro: function getPro() {
      var _this8 = this;

      if (this.chgEId) {
        /*修改时修改规格*/
        this.$fetch(this.urls.productspecs, { 'is_combination': 'false', except_id: this.chgEId, spec_code: this.conditionPro }).then(function (res) {
          _this8.combData = res.data;
        });
      } else {
        /*修改时添加规格*/
        this.$fetch(this.urls.productspecs, { 'is_combination': 'false', spec_code: this.conditionPro }).then(function (res) {
          _this8.combData = res.data;
        });
      }
    },
    confirmAddComb: function confirmAddComb() {
      var _this9 = this;

      /*确认添加时
      * 如果是修改状态
      * 拼接combination
      * */
      this.showComb = false;
      var targetVal = void 0;
      if (this.showMask) {
        targetVal = this.ruleForm.productspecs[this.specIndex];
      } else if (this.editMask) {
        /*如果是修改*/
        targetVal = this.editData.productspecs[this.editIndex];
      }
      targetVal.is_combination = true;
      this.combArr.map(function (item) {
        _this9.$fetch(_this9.url[1] + '/' + item.com_pro_specs_id).then(function (res) {
          for (var i = 0; i < item.count; i++) {
            if (_this9.showMask) {
              targetVal.combSpecData.push(res);
              targetVal.combinations.push({ 'com_pro_specs_id': item.com_pro_specs_id });
            } else if (_this9.editMask) {
              targetVal.combinations.push({ 'com_pro_spec': res, 'com_pro_specs_id': item.com_pro_specs_id });
            }
            targetVal.tb_price = targetVal.tb_price - 0 + (res.tb_price - 0);
            targetVal.cost = targetVal.cost - 0 + (res.cost - 0);
            targetVal.lowest_price = targetVal.lowest_price - 0 + (res.lowest_price - 0);
            targetVal.price = targetVal.price - 0 + (res.price - 0);
            targetVal.highest_price = targetVal.highest_price - 0 + (res.highest_price - 0);
            targetVal.warehouse_cost = targetVal.warehouse_cost - 0 + (res.warehouse_cost - 0);
            targetVal.assembly_price = targetVal.assembly_price - 0 + (res.assembly_price - 0);
            targetVal.package_quantity = targetVal.package_quantity - 0 + (res.package_quantity - 0);
            targetVal.package_costs = targetVal.package_costs - 0 + (res.package_costs - 0);
            targetVal.wooden_frame_costs = targetVal.wooden_frame_costs - 0 + (res.wooden_frame_costs - 0);
            targetVal.purchase_freight = targetVal.purchase_freight - 0 + (res.purchase_freight - 0);
            targetVal.longness = targetVal.longness - 0 + (res.longness - 0);
            targetVal.width = targetVal.width - 0 + (res.width - 0);
            targetVal.height = targetVal.height - 0 + (res.height - 0);
            targetVal.volume = targetVal.volume - 0 + (res.volume - 0);
            targetVal.weight = targetVal.weight - 0 + (res.weight - 0);
          }
        });
      });
    },
    cancelAddComb: function cancelAddComb() {
      /*取消添加
      * 清空数据*/
      this.specIndex = '';
      this.combCount = [];
      this.showComb = false;
    },

    /*删除组合*/
    delComb: function delComb(index, row) {
      /*前端界面删除*/
      /*点击删除是更新specIndex*/
      var list = this.ruleForm.productspecs[this.specIndex];
      list.tb_price -= row.tb_price - 0;
      list.cost -= row.cost - 0;
      list.lowest_price -= row.lowest_price - 0;
      list.price -= row.price - 0;
      list.highest_price -= row.highest_price - 0;
      list.warehouse_cost -= row.warehouse_cost - 0;
      list.assembly_price -= row.assembly_price - 0;
      list.package_quantity -= row.package_quantity - 0;
      list.package_costs -= row.package_costs - 0;
      list.wooden_frame_costs -= row.wooden_frame_costs - 0;
      list.purchase_freight -= row.purchase_freight - 0;
      list.longness -= row.longness - 0;
      list.width -= row.width - 0;
      list.height -= row.height - 0;
      list.volume -= row.volume - 0;
      list.weight -= row.weight - 0;
      /* this.combArr.map(item=>{
         if(item.com_pro_specs_id==row.id){
           if(item.count>0){
             item.count--;
           }else{
             item.count=0;
           }
         }
       });*/
      this.ruleForm.productspecs[this.specIndex].combSpecData.splice(index, 1);
      this.$message({
        message: '删除规格成功',
        type: 'success'
      });
      /*如果长度为0，是否组合为false*/
      if (this.ruleForm.productspecs[this.specIndex].combSpecData.length == 0) {
        this.ruleForm.productspecs[this.specIndex].is_combination = false;
      }
    },

    /*商品规格筛选数据*/
    chgStatue: function chgStatue(prop) {},

    /*修改*/
    confirmEdit: function confirmEdit() {
      var _this10 = this;

      var obj = this.editData;
      obj.productspecs.map(function (item, index) {
        if (!item.spec_code) {
          /*如果是空的话，删除规格*/
          obj.productspecs.splice(index, 1);
        }
        if (item.combinations.length > 0) {
          item.combinations.map(function (list) {
            list.com_pro_spec = [];
          });
        }
      });

      this.resData.shops.map(function (item) {
        if (item.id == obj.shops_id) {
          obj.shop_nick = item.nick;
        }
      });
      this.$patch(this.goodsUrl + '/' + this.editId, this.editData).then(function () {
        _this10.$message({
          message: '修改成功',
          type: 'success'
        });
        _this10.editMask = false;
        _this10.refresh();
        _this10.chgEId = '';
      }, function (err) {
        if (err.response) {
          var arr = err.response.data.errors;
          var arr1 = [];
          for (var i in arr) {
            arr1.push(arr[i]);
          }
          var str = arr1.join(',');
          _this10.$message.error({
            message: str
          });
        }
      });
    },
    cancelEdit: function cancelEdit() {
      this.editMask = false;
      this.chgEId = '';
    },
    saveEdit: function saveEdit(index, row) {
      this.editSpecIndex = '';
      var item = this.editData.productspecs[this.editIndex];
      item.spec_code = row.spec_code;
      item.jd_specs_code = row.jd_specs_code;
      item.vips_specs_code = row.vips_specs_code;
      item.tb_price = row.tb_price;
      item.cost = row.cost;
      item.price = row.price;
      item.warehouse_cost = row.warehouse_cost;
      item.commission = row.commission;
      item.wooden_frame_costs = row.wooden_frame_costs;
      item.purchase_freight = row.purchase_freight;
      item.package_quantity = row.package_quantity;
      item.inventory_warning = row.inventory_warning;
      item.purchase_days_warning = row.purchase_days_warning;
      item.distribution_method_id = row.distribution_method_id;
      item.spec = row.spec;
      item.color = row.color;
      item.materials = row.materials;
      item.function = row.function;
      item.special = row.special;
      item.other = row.other;
      item.longness = row.longness;
      item.width = row.width;
      item.height = row.height;
      item.volume = row.volume;
      item.weight = row.weight;
      item.remark = row.remark;
      item.finished_pro = row.finished_pro;
      item.is_stop_pro = row.is_stop_pro;
      item.width = row.width;
      item.combinations = row.combinations;
    },
    openEdit: function openEdit(index) {
      this.editSpecIndex = 'index' + index;
      this.editIndex = index;
    },
    delSonSpec: function delSonSpec(index, row) {
      var _this11 = this;

      var specData = this.editData.productspecs[this.editIndex];
      var curVal = row.com_pro_spec;
      if (row.id) {
        /*如果row.id存在，说明是数据库里面的，要发请求删除*/
        this.$del(this.combUrl + '/' + row.id).then(function () {
          specData.combinations.splice(index, 1);
          _this11.$message({
            message: '删除成功',
            type: 'success'
          });
          specData.tb_price -= curVal.tb_price - 0;
          specData.cost -= curVal.cost - 0;
          specData.lowest_price -= curVal.lowest_price - 0;
          specData.price -= curVal.price - 0;
          specData.highest_price -= curVal.highest_price - 0;
          specData.warehouse_cost -= curVal.warehouse_cost - 0;
          specData.assembly_price -= curVal.assembly_price - 0;
          specData.package_quantity -= curVal.package_quantity - 0;
          specData.package_costs -= curVal.package_costs - 0;
          specData.wooden_frame_costs -= curVal.wooden_frame_costs - 0;
          specData.purchase_freight -= curVal.purchase_freight - 0;
          specData.longness -= curVal.longness - 0;
          specData.width -= curVal.width - 0;
          specData.height -= curVal.height - 0;
          specData.volume -= curVal.volume - 0;
          specData.weight -= curVal.weight - 0;
        });
      } else {
        /*否则是新添加的还没有存库，只需前端删除*/
        specData.combinations.splice(index, 1);
        this.$message({
          message: '删除成功',
          type: 'success'
        });
        specData.tb_price -= curVal.tb_price - 0;
        specData.cost -= curVal.cost - 0;
        specData.lowest_price -= curVal.lowest_price - 0;
        specData.price -= curVal.price - 0;
        specData.highest_price -= curVal.highest_price - 0;
        specData.warehouse_cost -= curVal.warehouse_cost - 0;
        specData.assembly_price -= curVal.assembly_price - 0;
        specData.package_quantity -= curVal.package_quantity - 0;
        specData.package_costs -= curVal.package_costs - 0;
        specData.wooden_frame_costs -= curVal.wooden_frame_costs - 0;
        specData.purchase_freight -= curVal.purchase_freight - 0;
        specData.longness -= curVal.longness - 0;
        specData.width -= curVal.width - 0;
        specData.height -= curVal.height - 0;
        specData.volume -= curVal.volume - 0;
        specData.weight -= curVal.weight - 0;
      }
      specData.combinations.length > 0 ? specData.is_combination = true : specData.is_combination = false;
    },

    /*要追加到哪条规格 修改时行切换*/
    editRowCName: function editRowCName(_ref3) {
      var row = _ref3.row,
          rowIndex = _ref3.rowIndex;

      row.index = rowIndex;
    },
    editRowClick: function editRowClick(row) {
      this.editIndex = row.index;
      this.chgEId = row.id ? row.id : '';
    },
    goodsRowCName: function goodsRowCName(_ref4) {
      var row = _ref4.row,
          rowIndex = _ref4.rowIndex;

      if (rowIndex % 2 == 1) {
        return 'warning-row';
      } else if (rowIndex % 2 == 0) {
        return 'success-row';
      }
      return '';
    }
  },
  mounted: function mounted() {
    this.getGoodsInfo();
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
      _c("div", { staticClass: "searchBox" }, [
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
      _c(
        "el-table",
        {
          directives: [
            {
              name: "loading",
              rawName: "v-loading",
              value: _vm.goodsLoading,
              expression: "goodsLoading"
            }
          ],
          attrs: {
            data: _vm.goodsInfo,
            fit: "",
            height: "400",
            "row-class-name": _vm.goodsRowCName
          },
          on: {
            "selection-change": _vm.handleSelectionChange,
            "row-click": _vm.proRowClick
          }
        },
        [
          _c("el-table-column", {
            attrs: {
              type: "selection",
              width: "95",
              align: "center",
              checked: _vm.checkboxInit
            },
            on: { change: _vm.toggleChecked }
          }),
          _vm._v(" "),
          _vm._l(_vm.goodsHead, function(item, index) {
            return _c("el-table-column", {
              key: index,
              attrs: { label: item.label, align: "center", width: item.width },
              scopedSlots: _vm._u([
                {
                  key: "default",
                  fn: function(scope) {
                    return [
                      item.type == "select"
                        ? _c("span", [
                            scope.row[item.prop] == ""
                              ? _c("span")
                              : typeof scope.row[item.prop] == "object" &&
                                item.nmProp
                                ? _c("span", [
                                    _vm._v(
                                      "\n                        " +
                                        _vm._s(
                                          scope.row[item.prop][item.nmProp]
                                        ) +
                                        "\n                    "
                                    )
                                  ])
                                : _c(
                                    "span",
                                    _vm._l(_vm.resData[item.stateVal], function(
                                      list,
                                      index
                                    ) {
                                      return _c("span", { key: index }, [
                                        item.inProp
                                          ? _c("span", [
                                              list.id ==
                                              scope.row[item.prop][item.inProp]
                                                ? _c("span", [
                                                    _vm._v(
                                                      "\n                                    " +
                                                        _vm._s(list.name) +
                                                        "\n                                "
                                                    )
                                                  ])
                                                : _vm._e()
                                            ])
                                          : _c("span", [
                                              list.id == scope.row[item.prop]
                                                ? _c("span", [
                                                    _vm._v(
                                                      "\n                                    " +
                                                        _vm._s(list.name) +
                                                        "\n                                "
                                                    )
                                                  ])
                                                : _vm._e()
                                            ])
                                      ])
                                    })
                                  )
                          ])
                        : item.type == "checkbox"
                          ? _c("span", [
                              item.inProp
                                ? _c(
                                    "span",
                                    [
                                      _c("el-checkbox", {
                                        attrs: { disabled: true },
                                        model: {
                                          value:
                                            scope.row[item.prop][item.inProp],
                                          callback: function($$v) {
                                            _vm.$set(
                                              scope.row[item.prop],
                                              item.inProp,
                                              $$v
                                            )
                                          },
                                          expression:
                                            "scope.row[item.prop][item.inProp]"
                                        }
                                      })
                                    ],
                                    1
                                  )
                                : _c(
                                    "span",
                                    [
                                      _c("el-checkbox", {
                                        attrs: { disabled: true },
                                        model: {
                                          value: scope.row[item.prop],
                                          callback: function($$v) {
                                            _vm.$set(scope.row, item.prop, $$v)
                                          },
                                          expression: "scope.row[item.prop]"
                                        }
                                      })
                                    ],
                                    1
                                  )
                            ])
                          : _c("span", [
                              _vm._v(
                                "\n                    " +
                                  _vm._s(
                                    item.inProp
                                      ? scope.row[item.prop][item.inProp]
                                      : scope.row[item.prop]
                                  ) +
                                  "\n                "
                              )
                            ])
                    ]
                  }
                }
              ])
            })
          }),
          _vm._v(" "),
          _c("el-table-column", {
            attrs: {
              label: "操作",
              width: "180",
              align: "center",
              fixed: "right"
            },
            scopedSlots: _vm._u([
              {
                key: "default",
                fn: function(scope) {
                  return [
                    _c(
                      "el-button",
                      {
                        attrs: { size: "mini", type: "primary" },
                        on: {
                          click: function($event) {
                            _vm.addSku(scope.row)
                          }
                        }
                      },
                      [_vm._v("添加sku")]
                    ),
                    _vm._v(" "),
                    _c(
                      "el-button",
                      {
                        attrs: { size: "mini", type: "danger" },
                        on: {
                          click: function($event) {
                            _vm.del(scope.row, $event)
                          }
                        }
                      },
                      [_vm._v("删除")]
                    )
                  ]
                }
              }
            ])
          })
        ],
        2
      ),
      _vm._v(" "),
      _c("Pagination", { attrs: { "page-url": _vm.goodsUrl } }),
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
            { attrs: { label: "子件列表", name: "1" } },
            [
              _c(
                "el-table",
                {
                  staticStyle: { width: "100%" },
                  attrs: { data: _vm.goodsSpec }
                },
                [
                  _vm._l(_vm.btmTableHead[this.activeName], function(
                    item,
                    index
                  ) {
                    return _c("el-table-column", {
                      key: index,
                      attrs: {
                        label: item.label,
                        align: "center",
                        width: item.width
                      },
                      scopedSlots: _vm._u([
                        {
                          key: "default",
                          fn: function(scope) {
                            return [
                              item.prop
                                ? _c("span", [
                                    item.type == "select"
                                      ? _c(
                                          "span",
                                          _vm._l(
                                            _vm.resData[item.stateVal],
                                            function(list, index) {
                                              return _c(
                                                "span",
                                                { key: index },
                                                [
                                                  list.id ==
                                                  scope.row[item.prop]
                                                    ? _c("span", [
                                                        _vm._v(
                                                          "\n                                        " +
                                                            _vm._s(list.name) +
                                                            "\n                                    "
                                                        )
                                                      ])
                                                    : _vm._e()
                                                ]
                                              )
                                            }
                                          )
                                        )
                                      : item.type == "checkbox"
                                        ? _c("span", [
                                            scope.row[item.prop] == 1
                                              ? _c(
                                                  "span",
                                                  [
                                                    _c("el-checkbox", {
                                                      attrs: {
                                                        checked: true,
                                                        disabled: ""
                                                      }
                                                    })
                                                  ],
                                                  1
                                                )
                                              : _c(
                                                  "span",
                                                  [
                                                    _c("el-checkbox", {
                                                      attrs: {
                                                        checked: false,
                                                        disabled: ""
                                                      }
                                                    })
                                                  ],
                                                  1
                                                )
                                          ])
                                        : _c("span", [
                                            _vm._v(
                                              "\n                             " +
                                                _vm._s(scope.row[item.prop]) +
                                                "\n                        "
                                            )
                                          ])
                                  ])
                                : _vm._e()
                            ]
                          }
                        }
                      ])
                    })
                  }),
                  _vm._v(" "),
                  _c("el-table-column", {
                    attrs: { type: "expand", fixed: "left" },
                    scopedSlots: _vm._u([
                      {
                        key: "default",
                        fn: function(scope) {
                          return [
                            scope.row.combinations.length > 0
                              ? _c(
                                  "span",
                                  [
                                    _c(
                                      "el-table",
                                      {
                                        attrs: {
                                          data: scope.row.combinations,
                                          fit: "",
                                          "highlight-current-row": "",
                                          "max-height": "300",
                                          "header-cell-class-name":
                                            _vm.setHeadStyle
                                        }
                                      },
                                      _vm._l(_vm.btmSpecHead, function(
                                        item,
                                        index
                                      ) {
                                        return _c("el-table-column", {
                                          key: index,
                                          attrs: {
                                            label: item.label,
                                            align: "center",
                                            width: item.width,
                                            sortable: item.doSort,
                                            prop: item.prop
                                          },
                                          scopedSlots: _vm._u([
                                            {
                                              key: "default",
                                              fn: function(scope) {
                                                return [
                                                  item.type == "checkbox"
                                                    ? _c(
                                                        "span",
                                                        [
                                                          _c("el-checkbox", {
                                                            attrs: {
                                                              disabled: ""
                                                            },
                                                            model: {
                                                              value:
                                                                scope.row[
                                                                  item.prop
                                                                ][item.inProp],
                                                              callback: function(
                                                                $$v
                                                              ) {
                                                                _vm.$set(
                                                                  scope.row[
                                                                    item.prop
                                                                  ],
                                                                  item.inProp,
                                                                  $$v
                                                                )
                                                              },
                                                              expression:
                                                                "scope.row[item.prop][item.inProp]"
                                                            }
                                                          })
                                                        ],
                                                        1
                                                      )
                                                    : _c("span", [
                                                        _vm._v(
                                                          "\n                            " +
                                                            _vm._s(
                                                              item.inProp
                                                                ? scope.row[
                                                                    item.prop
                                                                  ][item.inProp]
                                                                : scope.row[
                                                                    item.prop
                                                                  ]
                                                            ) +
                                                            "\n                        "
                                                        )
                                                      ])
                                                ]
                                              }
                                            }
                                          ])
                                        })
                                      })
                                    )
                                  ],
                                  1
                                )
                              : _vm._e()
                          ]
                        }
                      }
                    ])
                  })
                ],
                2
              )
            ],
            1
          ),
          _vm._v(" "),
          _c("el-tab-pane", { attrs: { label: "sku信息", name: "2" } }, [
            _vm._v("\n            sku信息\n        ")
          ]),
          _vm._v(" "),
          _c("el-tab-pane", { attrs: { label: "商品网站", name: "3" } }, [
            _vm._v("\n            商品网站\n        ")
          ]),
          _vm._v(" "),
          _c("el-tab-pane", { attrs: { label: "操作记录", name: "4" } }, [
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
            }
          }
        },
        [
          _c("add-new", {
            ref: "addNew",
            attrs: {
              "rule-form": _vm.ruleForm,
              rules: _vm.rules,
              "add-arr": _vm.addArr,
              "son-ref": _vm.addInfoRef,
              onlyInputs: true
            }
          }),
          _vm._v(" "),
          _c("el-button", { attrs: { type: "text" } }, [_vm._v("子件信息")]),
          _vm._v(" "),
          _c(
            "el-table",
            {
              attrs: {
                data: _vm.ruleForm.productspecs,
                fit: "",
                "highlight-current-row": "",
                height: "300",
                "row-class-name": _vm.tableRowClassName
              },
              on: { "row-click": _vm.specRowClick }
            },
            [
              _vm._l(_vm.specHead, function(item, index) {
                return _c("el-table-column", {
                  key: index,
                  attrs: {
                    label: item.label,
                    align: "center",
                    width: item.width
                  },
                  scopedSlots: _vm._u([
                    {
                      key: "default",
                      fn: function(scope) {
                        return [
                          _vm.newC == "index" + scope.$index
                            ? _c("span", [
                                item.type == "number"
                                  ? _c(
                                      "span",
                                      [
                                        _c("el-input", {
                                          attrs: {
                                            size: "small",
                                            type: "number",
                                            placeholder: item.holder,
                                            disabled: item.beAble
                                          },
                                          on: { change: _vm.handleEdit },
                                          model: {
                                            value: scope.row[item.prop],
                                            callback: function($$v) {
                                              _vm.$set(
                                                scope.row,
                                                item.prop,
                                                $$v
                                              )
                                            },
                                            expression: "scope.row[item.prop]"
                                          }
                                        })
                                      ],
                                      1
                                    )
                                  : item.type == "url"
                                    ? _c(
                                        "span",
                                        [
                                          _c("el-input", {
                                            attrs: {
                                              size: "small",
                                              type: "url",
                                              placeholder: item.holder,
                                              disabled: item.beAble
                                            },
                                            on: { change: _vm.handleEdit },
                                            model: {
                                              value: scope.row[item.prop],
                                              callback: function($$v) {
                                                _vm.$set(
                                                  scope.row,
                                                  item.prop,
                                                  $$v
                                                )
                                              },
                                              expression: "scope.row[item.prop]"
                                            }
                                          })
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
                                                size: "small",
                                                placeholder: item.holder
                                              },
                                              on: { change: _vm.handleEdit },
                                              model: {
                                                value: scope.row[item.prop],
                                                callback: function($$v) {
                                                  _vm.$set(
                                                    scope.row,
                                                    item.prop,
                                                    $$v
                                                  )
                                                },
                                                expression:
                                                  "scope.row[item.prop]"
                                              }
                                            })
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
                                                    placeholder: item.holder
                                                  },
                                                  model: {
                                                    value: scope.row[item.prop],
                                                    callback: function($$v) {
                                                      _vm.$set(
                                                        scope.row,
                                                        item.prop,
                                                        $$v
                                                      )
                                                    },
                                                    expression:
                                                      "scope.row[item.prop]"
                                                  }
                                                },
                                                _vm._l(
                                                  _vm.resData[item.stateVal],
                                                  function(list) {
                                                    return _c(
                                                      "span",
                                                      { key: list.id },
                                                      [
                                                        _c("el-option", {
                                                          attrs: {
                                                            label: list.name,
                                                            value: list.id
                                                          }
                                                        })
                                                      ],
                                                      1
                                                    )
                                                  }
                                                )
                                              )
                                            ],
                                            1
                                          )
                                        : item.type == "checkbox"
                                          ? _c(
                                              "span",
                                              [
                                                _c("el-checkbox", {
                                                  attrs: {
                                                    disabled:
                                                      item.prop ==
                                                      "is_combination"
                                                        ? true
                                                        : false
                                                  },
                                                  model: {
                                                    value: scope.row[item.prop],
                                                    callback: function($$v) {
                                                      _vm.$set(
                                                        scope.row,
                                                        item.prop,
                                                        $$v
                                                      )
                                                    },
                                                    expression:
                                                      "scope.row[item.prop]"
                                                  }
                                                })
                                              ],
                                              1
                                            )
                                          : _c(
                                              "span",
                                              [
                                                _c("el-input", {
                                                  attrs: {
                                                    size: "small",
                                                    placeholder: item.holder,
                                                    disabled: item.beAble
                                                  },
                                                  on: {
                                                    change: _vm.handleEdit
                                                  },
                                                  model: {
                                                    value: scope.row[item.prop],
                                                    callback: function($$v) {
                                                      _vm.$set(
                                                        scope.row,
                                                        item.prop,
                                                        $$v
                                                      )
                                                    },
                                                    expression:
                                                      "scope.row[item.prop]"
                                                  }
                                                })
                                              ],
                                              1
                                            )
                              ])
                            : _c("span", [
                                item.type == "select"
                                  ? _c("span", [
                                      scope.row[item.prop] == ""
                                        ? _c("span")
                                        : _c(
                                            "span",
                                            _vm._l(
                                              _vm.resData[item.stateVal],
                                              function(list, index) {
                                                return _c(
                                                  "span",
                                                  { key: index },
                                                  [
                                                    list.id ==
                                                    scope.row[item.prop]
                                                      ? _c("span", [
                                                          _vm._v(
                                                            "\n                                                " +
                                                              _vm._s(
                                                                list.name
                                                              ) +
                                                              "\n                                       "
                                                          )
                                                        ])
                                                      : _vm._e()
                                                  ]
                                                )
                                              }
                                            )
                                          )
                                    ])
                                  : item.type == "checkbox"
                                    ? _c(
                                        "span",
                                        [
                                          _c("el-checkbox", {
                                            attrs: { disabled: "" },
                                            model: {
                                              value: scope.row[item.prop],
                                              callback: function($$v) {
                                                _vm.$set(
                                                  scope.row,
                                                  item.prop,
                                                  $$v
                                                )
                                              },
                                              expression: "scope.row[item.prop]"
                                            }
                                          })
                                        ],
                                        1
                                      )
                                    : _c("span", [
                                        _vm._v(
                                          "\n                             " +
                                            _vm._s(
                                              item.inProp
                                                ? scope.row[item.prop][
                                                    item.inProp
                                                  ]
                                                : scope.row[item.prop]
                                            ) +
                                            "\n                        "
                                        )
                                      ])
                              ])
                        ]
                      }
                    }
                  ])
                })
              }),
              _vm._v(" "),
              _c("el-table-column", {
                attrs: { type: "expand", fixed: "left" },
                scopedSlots: _vm._u([
                  {
                    key: "default",
                    fn: function(scope) {
                      return [
                        scope.row.combinations.length > 0
                          ? _c(
                              "span",
                              [
                                _c(
                                  "el-table",
                                  {
                                    attrs: {
                                      data: scope.row.combSpecData,
                                      "highlight-current-row": "",
                                      height: "300",
                                      fit: "",
                                      "header-cell-class-name": _vm.setHeadStyle
                                    }
                                  },
                                  [
                                    _vm._l(_vm.combHead, function(item, index) {
                                      return _c("el-table-column", {
                                        key: index,
                                        attrs: {
                                          label: item.label,
                                          align: "center",
                                          width: item.width,
                                          sortable: item.doSort,
                                          prop: item.prop
                                        },
                                        scopedSlots: _vm._u([
                                          {
                                            key: "default",
                                            fn: function(scope) {
                                              return [
                                                item.type == "checkbox"
                                                  ? _c(
                                                      "span",
                                                      [
                                                        _c("el-checkbox", {
                                                          attrs: {
                                                            disabled: ""
                                                          },
                                                          model: {
                                                            value:
                                                              scope.row[
                                                                item.prop
                                                              ],
                                                            callback: function(
                                                              $$v
                                                            ) {
                                                              _vm.$set(
                                                                scope.row,
                                                                item.prop,
                                                                $$v
                                                              )
                                                            },
                                                            expression:
                                                              "scope.row[item.prop]"
                                                          }
                                                        })
                                                      ],
                                                      1
                                                    )
                                                  : _c("span", [
                                                      _vm._v(
                                                        _vm._s(
                                                          item.inProp
                                                            ? scope.row[
                                                                item.prop
                                                              ][item.inProp]
                                                            : scope.row[
                                                                item.prop
                                                              ]
                                                        )
                                                      )
                                                    ])
                                              ]
                                            }
                                          }
                                        ])
                                      })
                                    }),
                                    _vm._v(" "),
                                    _c("el-table-column", {
                                      attrs: {
                                        label: "操作",
                                        align: "center",
                                        width: "90"
                                      },
                                      scopedSlots: _vm._u([
                                        {
                                          key: "default",
                                          fn: function(scope) {
                                            return [
                                              _c(
                                                "el-button",
                                                {
                                                  attrs: {
                                                    size: "mini",
                                                    type: "danger"
                                                  },
                                                  on: {
                                                    click: function($event) {
                                                      _vm.delComb(
                                                        scope.$index,
                                                        scope.row
                                                      )
                                                    }
                                                  }
                                                },
                                                [_vm._v("删除")]
                                              )
                                            ]
                                          }
                                        }
                                      ])
                                    })
                                  ],
                                  2
                                )
                              ],
                              1
                            )
                          : _vm._e()
                      ]
                    }
                  }
                ])
              }),
              _vm._v(" "),
              _c("el-table-column", {
                attrs: {
                  label: "操作",
                  width: "136",
                  align: "center",
                  fixed: "right"
                },
                scopedSlots: _vm._u([
                  {
                    key: "default",
                    fn: function(scope) {
                      return [
                        _vm.newC == "index" + scope.$index
                          ? _c(
                              "span",
                              [
                                _c(
                                  "el-button",
                                  {
                                    attrs: { size: "mini", type: "success" },
                                    on: {
                                      click: function($event) {
                                        _vm.specSave(scope.$index, scope.row)
                                      }
                                    }
                                  },
                                  [_vm._v("保存")]
                                )
                              ],
                              1
                            )
                          : _c(
                              "span",
                              [
                                _c(
                                  "el-button",
                                  {
                                    attrs: { size: "mini", type: "primary" },
                                    on: {
                                      click: function($event) {
                                        _vm.specEdit(scope.row)
                                      }
                                    }
                                  },
                                  [_vm._v("编辑")]
                                )
                              ],
                              1
                            )
                      ]
                    }
                  }
                ])
              })
            ],
            2
          ),
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
                    [_vm._v("添加")]
                  ),
                  _vm._v(" "),
                  _c("el-button", { on: { click: _vm.resetAddInfo } }, [
                    _vm._v("重置")
                  ]),
                  _vm._v(" "),
                  _c("el-button", { on: { click: _vm.cancelAdd } }, [
                    _vm._v("取消")
                  ])
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
        "el-dialog",
        {
          class: { "more-forms": _vm.moreForms },
          attrs: { title: "修改商品", visible: _vm.editMask },
          on: {
            "update:visible": function($event) {
              _vm.editMask = $event
            }
          }
        },
        [
          _c("add-new", {
            ref: "addNew",
            attrs: {
              "rule-form": _vm.editData,
              rules: _vm.rules,
              "add-arr": _vm.addArr,
              "son-ref": _vm.addInfoRef,
              onlyInputs: true,
              editSign: true
            }
          }),
          _vm._v(" "),
          _c("el-button", { attrs: { type: "text" } }, [_vm._v("规格信息")]),
          _vm._v(" "),
          _c(
            "el-table",
            {
              attrs: {
                data: _vm.editData.productspecs,
                fit: "",
                "highlight-current-row": "",
                type: "index",
                "max-height": "300",
                "row-class-name": _vm.editRowCName
              },
              on: { "row-click": _vm.editRowClick }
            },
            [
              _vm._l(_vm.btmTableHead[1], function(item, index) {
                return _c("el-table-column", {
                  key: index,
                  attrs: {
                    label: item.label,
                    align: "center",
                    width: item.width
                  },
                  scopedSlots: _vm._u([
                    {
                      key: "default",
                      fn: function(scope) {
                        return [
                          _vm.editSpecIndex == "index" + scope.$index
                            ? _c("span", [
                                item.type == "number"
                                  ? _c(
                                      "span",
                                      [
                                        _c("el-input", {
                                          attrs: {
                                            size: "small",
                                            type: "number",
                                            placeholder: item.holder,
                                            disabled: item.beAble
                                          },
                                          on: { change: _vm.handleEdit },
                                          model: {
                                            value: scope.row[item.prop],
                                            callback: function($$v) {
                                              _vm.$set(
                                                scope.row,
                                                item.prop,
                                                $$v
                                              )
                                            },
                                            expression: "scope.row[item.prop]"
                                          }
                                        })
                                      ],
                                      1
                                    )
                                  : item.type == "url"
                                    ? _c(
                                        "span",
                                        [
                                          _c("el-input", {
                                            attrs: {
                                              size: "small",
                                              type: "url",
                                              placeholder: item.holder,
                                              disabled: item.beAble
                                            },
                                            on: { change: _vm.handleEdit },
                                            model: {
                                              value: scope.row[item.prop],
                                              callback: function($$v) {
                                                _vm.$set(
                                                  scope.row,
                                                  item.prop,
                                                  $$v
                                                )
                                              },
                                              expression: "scope.row[item.prop]"
                                            }
                                          })
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
                                                size: "small",
                                                placeholder: item.holder
                                              },
                                              on: { change: _vm.handleEdit },
                                              model: {
                                                value: scope.row[item.prop],
                                                callback: function($$v) {
                                                  _vm.$set(
                                                    scope.row,
                                                    item.prop,
                                                    $$v
                                                  )
                                                },
                                                expression:
                                                  "scope.row[item.prop]"
                                              }
                                            })
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
                                                    placeholder: item.holder
                                                  },
                                                  model: {
                                                    value: scope.row[item.prop],
                                                    callback: function($$v) {
                                                      _vm.$set(
                                                        scope.row,
                                                        item.prop,
                                                        $$v
                                                      )
                                                    },
                                                    expression:
                                                      "scope.row[item.prop]"
                                                  }
                                                },
                                                _vm._l(
                                                  _vm.resData[item.stateVal],
                                                  function(list) {
                                                    return _c(
                                                      "span",
                                                      { key: list.id },
                                                      [
                                                        _c("el-option", {
                                                          attrs: {
                                                            label: list.name,
                                                            value: list.id
                                                          }
                                                        })
                                                      ],
                                                      1
                                                    )
                                                  }
                                                )
                                              )
                                            ],
                                            1
                                          )
                                        : item.type == "checkbox"
                                          ? _c(
                                              "span",
                                              [
                                                _c("el-checkbox", {
                                                  attrs: {
                                                    disabled:
                                                      item.prop ==
                                                      "is_combination"
                                                        ? true
                                                        : false
                                                  },
                                                  model: {
                                                    value: scope.row[item.prop],
                                                    callback: function($$v) {
                                                      _vm.$set(
                                                        scope.row,
                                                        item.prop,
                                                        $$v
                                                      )
                                                    },
                                                    expression:
                                                      "scope.row[item.prop]"
                                                  }
                                                })
                                              ],
                                              1
                                            )
                                          : _c(
                                              "span",
                                              [
                                                _c("el-input", {
                                                  attrs: {
                                                    size: "small",
                                                    placeholder: item.holder,
                                                    disabled: item.beAble
                                                  },
                                                  on: {
                                                    change: _vm.handleEdit
                                                  },
                                                  model: {
                                                    value: scope.row[item.prop],
                                                    callback: function($$v) {
                                                      _vm.$set(
                                                        scope.row,
                                                        item.prop,
                                                        $$v
                                                      )
                                                    },
                                                    expression:
                                                      "scope.row[item.prop]"
                                                  }
                                                })
                                              ],
                                              1
                                            )
                              ])
                            : _c("span", [
                                item.type == "select"
                                  ? _c("span", [
                                      scope.row[item.prop] == ""
                                        ? _c("span")
                                        : _c(
                                            "span",
                                            _vm._l(
                                              _vm.resData[item.stateVal],
                                              function(list, index) {
                                                return _c(
                                                  "span",
                                                  { key: index },
                                                  [
                                                    list.id ==
                                                    scope.row[item.prop]
                                                      ? _c("span", [
                                                          _vm._v(
                                                            "\n                                                " +
                                                              _vm._s(
                                                                list.name
                                                              ) +
                                                              "\n                                       "
                                                          )
                                                        ])
                                                      : _vm._e()
                                                  ]
                                                )
                                              }
                                            )
                                          )
                                    ])
                                  : item.type == "checkbox"
                                    ? _c(
                                        "span",
                                        [
                                          _c("el-checkbox", {
                                            attrs: { disabled: "" },
                                            model: {
                                              value: scope.row[item.prop],
                                              callback: function($$v) {
                                                _vm.$set(
                                                  scope.row,
                                                  item.prop,
                                                  $$v
                                                )
                                              },
                                              expression: "scope.row[item.prop]"
                                            }
                                          })
                                        ],
                                        1
                                      )
                                    : _c("span", [
                                        _vm._v(
                                          "\n                             " +
                                            _vm._s(
                                              item.inProp
                                                ? scope.row[item.prop][
                                                    item.inProp
                                                  ]
                                                : scope.row[item.prop]
                                            ) +
                                            "\n                        "
                                        )
                                      ])
                              ])
                        ]
                      }
                    }
                  ])
                })
              }),
              _vm._v(" "),
              _c("el-table-column", {
                attrs: { type: "expand", fixed: "left" },
                scopedSlots: _vm._u([
                  {
                    key: "default",
                    fn: function(scope) {
                      return [
                        scope.row.combinations.length > 0
                          ? _c(
                              "span",
                              [
                                _c(
                                  "el-table",
                                  {
                                    attrs: {
                                      data: scope.row.combinations,
                                      "highlight-current-row": "",
                                      "max-height": "300",
                                      fit: "",
                                      "header-cell-class-name": _vm.setHeadStyle
                                    }
                                  },
                                  [
                                    _vm._l(_vm.btmSpecHead, function(
                                      item,
                                      index
                                    ) {
                                      return _c("el-table-column", {
                                        key: index,
                                        attrs: {
                                          label: item.label,
                                          align: "center"
                                        },
                                        scopedSlots: _vm._u([
                                          {
                                            key: "default",
                                            fn: function(scope) {
                                              return [
                                                item.inProp
                                                  ? _c("span", [
                                                      item.type == "checkbox"
                                                        ? _c(
                                                            "span",
                                                            [
                                                              _c(
                                                                "el-checkbox",
                                                                {
                                                                  attrs: {
                                                                    disabled: ""
                                                                  },
                                                                  model: {
                                                                    value:
                                                                      scope.row[
                                                                        item
                                                                          .prop
                                                                      ][
                                                                        item
                                                                          .inProp
                                                                      ],
                                                                    callback: function(
                                                                      $$v
                                                                    ) {
                                                                      _vm.$set(
                                                                        scope
                                                                          .row[
                                                                          item
                                                                            .prop
                                                                        ],
                                                                        item.inProp,
                                                                        $$v
                                                                      )
                                                                    },
                                                                    expression:
                                                                      "scope.row[item.prop][item.inProp]"
                                                                  }
                                                                }
                                                              )
                                                            ],
                                                            1
                                                          )
                                                        : _c("span", [
                                                            _vm._v(
                                                              _vm._s(
                                                                item.inProp
                                                                  ? scope.row[
                                                                      item.prop
                                                                    ][
                                                                      item
                                                                        .inProp
                                                                    ]
                                                                  : scope.row[
                                                                      item.prop
                                                                    ]
                                                              )
                                                            )
                                                          ])
                                                    ])
                                                  : _vm._e()
                                              ]
                                            }
                                          }
                                        ])
                                      })
                                    }),
                                    _vm._v(" "),
                                    _c("el-table-column", {
                                      attrs: {
                                        label: "操作",
                                        align: "center",
                                        width: "90"
                                      },
                                      scopedSlots: _vm._u([
                                        {
                                          key: "default",
                                          fn: function(scope) {
                                            return [
                                              _c(
                                                "el-button",
                                                {
                                                  attrs: {
                                                    size: "mini",
                                                    type: "danger"
                                                  },
                                                  on: {
                                                    click: function($event) {
                                                      _vm.delSonSpec(
                                                        scope.$index,
                                                        scope.row
                                                      )
                                                    }
                                                  }
                                                },
                                                [_vm._v("删除")]
                                              )
                                            ]
                                          }
                                        }
                                      ])
                                    })
                                  ],
                                  2
                                )
                              ],
                              1
                            )
                          : _vm._e()
                      ]
                    }
                  }
                ])
              }),
              _vm._v(" "),
              _c("el-table-column", {
                attrs: {
                  label: "操作",
                  width: "160",
                  align: "center",
                  fixed: "right"
                },
                scopedSlots: _vm._u([
                  {
                    key: "default",
                    fn: function(scope) {
                      return [
                        _vm.editSpecIndex == "index" + scope.$index
                          ? _c(
                              "span",
                              [
                                _c(
                                  "el-button",
                                  {
                                    attrs: { size: "mini", type: "success" },
                                    on: {
                                      click: function($event) {
                                        _vm.saveEdit(scope.$index, scope.row)
                                      }
                                    }
                                  },
                                  [_vm._v("保存")]
                                )
                              ],
                              1
                            )
                          : _c(
                              "span",
                              [
                                _c(
                                  "el-button",
                                  {
                                    attrs: { size: "mini", type: "primary" },
                                    on: {
                                      click: function($event) {
                                        _vm.openEdit(scope.$index)
                                      }
                                    }
                                  },
                                  [_vm._v("编辑")]
                                )
                              ],
                              1
                            )
                      ]
                    }
                  }
                ])
              })
            ],
            2
          ),
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
                    { attrs: { type: "primary" }, on: { click: _vm.addSpec } },
                    [_vm._v("添加规格")]
                  ),
                  _vm._v(" "),
                  _c(
                    "el-button",
                    { attrs: { type: "primary" }, on: { click: _vm.addComb } },
                    [_vm._v("添加组合")]
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
                      on: { click: _vm.confirmEdit }
                    },
                    [_vm._v("确定")]
                  ),
                  _vm._v(" "),
                  _c("el-button", { on: { click: _vm.cancelEdit } }, [
                    _vm._v("取消")
                  ])
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
              _c("label", [_vm._v("规格名称")]),
              _vm._v(" "),
              _c("el-input", {
                staticStyle: { width: "60%", margin: "0 10px 0 5px" },
                attrs: { clearable: "" },
                nativeOn: {
                  keyup: function($event) {
                    if (
                      !("button" in $event) &&
                      _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                    ) {
                      return null
                    }
                    return _vm.getPro($event)
                  }
                },
                model: {
                  value: _vm.conditionPro,
                  callback: function($$v) {
                    _vm.conditionPro = $$v
                  },
                  expression: "conditionPro"
                }
              }),
              _vm._v(" "),
              _c(
                "el-button",
                { attrs: { type: "primary" }, on: { click: _vm.getPro } },
                [_vm._v("查询")]
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "el-table",
            {
              attrs: {
                data: _vm.combData,
                fit: "",
                "highlight-current-row": "",
                height: "400",
                "row-class-name": _vm.combClassName
              },
              on: { "row-click": _vm.proRClick }
            },
            [
              _c("light-table", {
                attrs: { tableHead: _vm.selectPro, onlyTableColumn: true }
              }),
              _vm._v(" "),
              _c("el-table-column", {
                attrs: {
                  width: "150",
                  align: "center",
                  fixed: "right",
                  label: "组合件数"
                },
                scopedSlots: _vm._u([
                  {
                    key: "default",
                    fn: function(scope) {
                      return [
                        _vm.combIndex == "index" + scope.$index
                          ? _c(
                              "span",
                              [
                                _c("el-input", {
                                  attrs: { size: "small", type: "number" },
                                  on: {
                                    blur: function($event) {
                                      _vm.handleBlur(scope.row)
                                    }
                                  },
                                  model: {
                                    value: _vm.combCount[scope.$index],
                                    callback: function($$v) {
                                      _vm.$set(_vm.combCount, scope.$index, $$v)
                                    },
                                    expression: "combCount[scope.$index]"
                                  }
                                })
                              ],
                              1
                            )
                          : _c("span", [
                              _vm._v(
                                "\n                        " +
                                  _vm._s(
                                    _vm.combCount[scope.$index]
                                      ? _vm.combCount[scope.$index]
                                      : 0
                                  ) +
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
              _c("el-button", { on: { click: _vm.cancelAddComb } }, [
                _vm._v("取消")
              ])
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
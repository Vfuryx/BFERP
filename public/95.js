webpackJsonp([95],{

/***/ 469:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(567)
/* template */
var __vue_template__ = __webpack_require__(568)
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
Component.options.__file = "resources\\assets\\js\\views\\basicInf\\productsMag.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-5ab9ee33", Component.options)
  } else {
    hotAPI.reload("data-v-5ab9ee33", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 567:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_axios__ = __webpack_require__(11);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_axios___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_axios__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
        ent: this.addPro
      }, {
        cnt: '修改',
        icon: 'bf-change',
        ent: this.editPro,
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
      searchBox: {
        productsName: '',
        shopNames: '',
        supplier: '',
        kinds: '',
        isComb: false,
        isStop: false,
        isStatus: false
      },
      /*获取数据*/
      productsHead: [{
        label: '产品图片',
        width: '200',
        prop: "img",
        type: 'img',
        alt: '商品图片'
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
        prop: "goodsCategory",
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
      productsVal: [],
      productsLoading: true,
      checkboxInit: false,
      /*底部tabs*/
      activeName: '0',
      productsCompVal: [],
      btmTableHead: [[], [{
        label: '子件图片',
        width: '120',
        prop: "img_url",
        type: 'img'
      }, {
        label: '子件编码',
        width: '160',
        prop: "component_code",
        type: 'text'
      }, {
        label: '京东子件编号',
        width: '180',
        prop: "jd_component_code",
        type: 'text'
      }, {
        label: '唯品会子件编号',
        width: '180',
        prop: "vips_component_code",
        type: 'text'
      }, {
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
        label: '通用',
        width: '120',
        prop: "is_common",
        type: 'checkbox'
        // chgAble: false,
        // editChgAble: true,
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
        type: 'text'
      }, {
        label: '颜色',
        width: '120',
        prop: "color",
        type: 'text'
      }, {
        label: '材质',
        width: '130',
        prop: "materials",
        type: 'text'
      }, {
        label: '功能',
        width: '100',
        prop: "function",
        type: 'text'
      }, {
        label: '特殊',
        width: '130',
        prop: "special",
        type: 'text'
      }, {
        label: '其他',
        width: '150',
        prop: "other",
        type: 'text'
      }, {
        label: '长度',
        width: '120',
        prop: "longness",
        type: 'number'
      }, {
        label: '宽度',
        width: '120',
        prop: "width",
        type: 'number'
      }, {
        label: '高度',
        width: '120',
        prop: "height",
        type: 'number'
      }, {
        label: '体积',
        width: '120',
        prop: "volume",
        type: 'number'
      }, {
        label: '重量',
        width: '120',
        prop: "weight",
        type: 'number'
      }, {
        label: '备注',
        width: '150',
        prop: "remark",
        type: 'textarea'
      }, {
        label: '成品',
        width: '120',
        prop: "finished_pro",
        type: 'checkbox'
      }, {
        label: '停产',
        width: '120',
        prop: "is_stop_pro",
        type: 'checkbox'
      }], [{
        label: 'sku名称',
        prop: "name",
        type: 'text'
      }, {
        label: '包含子件',
        prop: "productComponents",
        inProp: 'spec',
        type: 'text'
      }, {
        label: '最近修改时间',
        prop: "updated_at",
        type: 'text'
      }], []],
      productsSkuVal: [],
      proId: '',
      /*新增*/
      moreForms: true,
      addProMask: false,
      proForm: {
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
        product_components: [{
          component_code: '',
          jd_component_code: '',
          vips_component_code: '',
          tb_price: '',
          cost: '',
          price: '',
          highest_price: '',
          lowest_price: '',
          warehouse_cost: '',
          assembly_price: '',
          discount: '',
          commission: '',
          is_common: false,
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
          is_stop_pro: false
        }]
      },
      proRules: {
        commodity_code: [{ required: true, message: '请输入商品编码', trigger: 'blur' }],
        short_name: [{ required: true, message: '请输入商品简称', trigger: 'blur' }],
        shop_nick: [{ required: true, message: '请选择店铺名称', trigger: 'blur' }],
        supplier_id: [{ required: true, message: '请选择供应商', trigger: 'blur' }],
        category_id: [{ required: true, message: '请选择产品类别', trigger: 'blur' }],
        title: [{ required: true, message: '请输入商品标题', trigger: 'blur' }]
      },
      addProHead: [{
        label: '商品编码',
        prop: 'commodity_code',
        holder: '请输入商品编号',
        type: 'text'
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
        stateVal: 'shops',
        type: 'select'
      }, {
        label: '供货厂商',
        prop: 'supplier_id',
        holder: '请选择供货厂商',
        stateVal: 'suppliers',
        type: 'select'
      }, {
        label: '商品标题',
        prop: 'title',
        holder: '请输入商品标题',
        type: 'text'
      }, {
        label: '商品网址',
        prop: 'url',
        holder: '请输入商品网址',
        type: 'text'
      }, {
        label: '商品类别',
        prop: 'category_id',
        holder: '请选择产品类别',
        stateVal: 'goodscates',
        type: 'select'
      }, {
        label: '商品备注',
        prop: 'remark',
        holder: '请输入商品备注',
        type: 'textarea'
      }, {
        label: '商品图片',
        prop: 'img',
        imgPath: '',
        holder: '请输入商品图片',
        type: 'img'
      }],
      noUpload: true,
      compCurIndex: 'index0',
      compIndexNum: '0',
      compHead: [{
        label: '子件图片',
        width: '120',
        prop: "img_url",
        type: 'img',
        imgPath: ''
      }, {
        label: '子件编码',
        width: '160',
        prop: "component_code",
        type: 'text'
      }, {
        label: '京东子件编号',
        width: '180',
        prop: "jd_component_code",
        type: 'text'
      }, {
        label: '唯品会子件编号',
        width: '180',
        prop: "vips_component_code",
        type: 'text'
      }, {
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
        label: '通用',
        width: '120',
        prop: "is_common",
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
        type: 'number'
      }, {
        label: '采购预警天数',
        width: '150',
        prop: "purchase_days_warning",
        type: 'number'
      }, {
        label: '可售数预警',
        width: '150',
        prop: "available_warning",
        type: 'number'
      }, {
        label: '产品配送类别',
        width: '150',
        prop: 'distribution_method_id',
        stateVal: 'distmets',
        type: 'select'
      }, {
        label: '条形码',
        width: '120',
        prop: "bar_code",
        type: 'text'
      }, {
        label: '规格',
        width: '200',
        prop: "spec",
        type: 'text'
      }, {
        label: '颜色',
        width: '120',
        prop: "color",
        type: 'text'
      }, {
        label: '材质',
        width: '130',
        prop: "materials",
        type: 'text'
      }, {
        label: '功能',
        width: '100',
        prop: "function",
        type: 'text'
      }, {
        label: '特殊',
        width: '130',
        prop: "special",
        type: 'text'
      }, {
        label: '其他',
        width: '150',
        prop: "other",
        type: 'text'
      }, {
        label: '长度(mm)',
        width: '120',
        prop: "longness",
        type: 'number'
      }, {
        label: '宽度(mm)',
        width: '120',
        prop: "width",
        type: 'number'
      }, {
        label: '高度(mm)',
        width: '120',
        prop: "height",
        type: 'number'
      }, {
        label: '体积(m3)',
        width: '120',
        prop: "volume",
        type: 'number'
      }, {
        label: '重量',
        width: '120',
        prop: "weight",
        type: 'number'
      }, {
        label: '备注',
        width: '150',
        prop: "remark",
        type: 'textarea'
      }, {
        label: '成品',
        width: '120',
        prop: "finished_pro",
        type: 'checkbox'
      }, {
        label: '停产',
        width: '120',
        prop: "is_stop_pro",
        type: 'checkbox'
      }],
      compUpload: 'upload0',
      showChgBtn: false,
      tableChgBtn: '',
      /*删除*/
      showDel: false,
      delId: '',
      delArr: [],
      proSelection: '',
      /*修改*/
      updateProMask: false,
      updateId: '',
      updateProIndex: '',
      updateForm: {},
      componentShowChg: true,
      updateCompUpload: 'upload0',
      updateRwIndex: '0',
      updateChgBtn: false,
      addSku: false,
      /*transfer*/
      skuForm: {
        pid: '',
        name: '',
        product_components: []
      },
      skuRules: {
        name: [{ required: true, message: 'sku名称不能为空!', trigger: 'blur' }]
      },
      compList: [],
      allComp: [],
      filterMethod: function filterMethod(query, item) {
        return item.component_code.indexOf(query) > -1;
      },

      noUpdate: '',
      delUrl: '',
      updateSkuMask: false,
      updateSkuForm: {},
      updateSkuId: '',
      alreadyCompId: [],
      updateCompList: [],
      updateList: [],
      updateCompId: []
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
    handleQuery: function handleQuery() {},

    /*获取商品数据*/
    getProducts: function getProducts() {
      var _this = this;

      this.$fetch(this.urls.products, { include: 'productComponents,shop,supplier,goodsCategory,combinations.productComponents' }).then(function (res) {
        _this.productsLoading = false;
        _this.productsVal = res.data;
        if (res.data[0]) {
          _this.proId = res.data[0].id;
          // this.productsCompVal = res.data[0].product_components;
          _this.productsCompVal = res.data[0]['productComponents'].data;
          // this.productsSkuVal = res.data[0].combinations;
          _this.productsSkuVal = res.data[0]['combinations'].data;
        }
        var pg = res.meta.pagination;
        _this.$store.dispatch('currentPage', pg.current_page);
        _this.$store.commit('PER_PAGE', pg.per_page);
        _this.$store.commit('PAGE_TOTAL', pg.total);
        /*请求子数据*/
        _this.$store.dispatch('shops', '/shops');
        _this.$store.dispatch('suppliers', '/suppliers');
        _this.$store.dispatch('goodscates', '/goodscates');
        _this.$store.dispatch('distmets', '/distmets');
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
    proRowCName: function proRowCName(_ref) {
      var row = _ref.row,
          rowIndex = _ref.rowIndex;

      row.index = rowIndex;
    },
    proRowClick: function proRowClick(row) {
      this.proId = row.id;
      this.productsCompVal = row['productComponents'].data;
      this.productsSkuVal = row['combinations'].data;
      // this.$refs.multipleTable.toggleRowSelection(row);
    },

    /*底部tabs*/
    handleTabsClick: function handleTabsClick() {},

    /*新增*/
    addPro: function addPro() {
      this.addProMask = true;
      this.compCurIndex = 'index0';
      this.compUpload = 'upload0';
      this.resetAddPro();
    },
    addSkuMth: function addSkuMth(row) {
      var _this2 = this;

      this.addSku = true;
      this.allComp = [];
      this.compList = [];
      this.allComp = [];
      this.skuForm.pid = row.id;
      this.skuForm.name = '';
      this.skuForm.product_components = [];
      this.proId = row.id;
      var compId = [];
      row['productComponents']['data'].map(function (item) {
        _this2.allComp.push(item);
      });
      this.allComp.map(function (item) {
        compId.push(item.id);
      });
      this.$store.dispatch('products', '/products');
      this.$fetch(this.urls.productcomponents, { 'is_common': true }).then(function (res) {
        res.data.map(function (item) {
          if (compId.indexOf(item.id) == -1) {
            _this2.allComp.push(item);
          }
        });
        _this2.allComp.map(function (list) {
          if (list.is_common) {
            _this2.compList.push({
              label: list.spec + '(\u901A\u7528)',
              key: list.id,
              component_code: list.component_code
            });
          } else {
            _this2.compList.push({
              label: list.spec,
              key: list.id,
              component_code: list.component_code
            });
          }
        });
      }, function (err) {});
    },
    confirmAddSku: function confirmAddSku() {
      var _this3 = this;

      this.$post(this.urls.combinations, this.skuForm).then(function () {
        _this3.addSku = false;
        _this3.$message({
          message: '添加sku成功',
          type: 'success'
        });
        _this3.refresh();
        /* this.productsSkuVal.map(item=>{
           if(item.id==this.proId){
             this.productsSkuVal = item.combinations;
           }
         })*/
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
    cancelAddSku: function cancelAddSku() {
      this.addSku = false;
    },
    addComb: function addComb() {
      var combKey = {
        component_code: '',
        jd_component_code: '',
        vips_component_code: '',
        tb_price: '',
        cost: '',
        price: '',
        highest_price: '',
        lowest_price: '',
        warehouse_cost: '',
        assembly_price: '',
        discount: '',
        commission: '',
        is_common: false,
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
        is_stop_pro: false
      };
      if (this.proForm.product_components.length > 0 && !this.proForm.product_components[this.proForm.product_components.length - 1].component_code) {
        this.$message({
          message: '商品编码或者子件编码为空时不能添加新规格',
          type: 'info'
        });
      } else {
        this.proForm.product_components.push(combKey);
        this.compIndexNum = this.proForm.product_components.length - 1;
        this.compUpload = 'upload' + this.compIndexNum;
        this.compCurIndex = 'index' + this.compIndexNum;
      }
    },
    confirmAddPro: function confirmAddPro() {
      var _this4 = this;

      var formData = this.proForm;
      formData.product_components.map(function (item, index) {
        if (!item.component_code) {
          formData.product_components.splice(index, 1);
        }
      });
      this.resData.shops.map(function (item) {
        if (item.id == formData.shops_id) {
          formData.shop_nick = item.nick;
        }
      });
      this.$post(this.urls.products, formData).then(function () {
        _this4.$message({
          message: '添加成功',
          type: 'success'
        });
        _this4.addProMask = false;
        _this4.refresh();
      }, function (err) {
        if (err.response) {
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
    resetAddPro: function resetAddPro() {
      Object.assign(this.proForm, this.$options.data().proForm);
      this.noUpload = true;
      this.compUpload = 'upload0';
    },
    cancelAddPro: function cancelAddPro() {
      this.addProMask = false;
    },

    /*子件*/
    compRowCName: function compRowCName(_ref2) {
      var row = _ref2.row,
          rowIndex = _ref2.rowIndex;

      row.index = rowIndex;
    },
    compRowClick: function compRowClick(row) {
      this.compCurIndex = 'index' + row.index;
      this.compIndexNum = row.index;
      if (row.img_url) {
        this.tableChgBtn = 'show' + row.index;
      } else {
        this.compUpload = 'upload' + row.index;
      }
    },
    judgeFm: function judgeFm(file) {
      var isJPG = file.type === 'image/jpeg';
      var isGIF = file.type === 'image/gif';
      var isPNG = file.type === 'image/png';

      if (!isJPG && !isGIF && !isPNG) {
        this.$message.error("上传图片必须是JPG/GIF/PNG 格式!");
      }
    },
    beforeUpload: function beforeUpload(file) {
      var _this5 = this;

      this.showChgBtn = false;
      this.judgeFm(file);
      var formData = new FormData();
      formData.append('image', file);
      __WEBPACK_IMPORTED_MODULE_0_axios___default.a.post(this.urls.uploadimages, formData).then(function (res) {
        var imageInfo = res.data.meta;
        if (imageInfo.status_code == 201) {
          _this5.noUpload = false;
          _this5.showChgBtn = true;
          _this5.proForm.img = res.data.path;
        }
      }).catch(function (err) {});
    },
    updateFormUpload: function updateFormUpload(file) {
      var _this6 = this;

      this.componentShowChg = false;
      this.judgeFm(file);
      var formData = new FormData();
      formData.append('image', file);
      __WEBPACK_IMPORTED_MODULE_0_axios___default.a.post(this.urls.uploadimages, formData).then(function (res) {
        var imageInfo = res.data.meta;
        if (imageInfo.status_code == 201) {
          _this6.noUpdate = false;
          _this6.componentShowChg = true;
          _this6.updateForm.img = res.data.path;
        }
      }).catch(function (err) {});
    },
    beforeUploadComp: function beforeUploadComp(file) {
      var _this7 = this;

      this.tableChgBtn = '';
      this.judgeFm(file);
      var formData = new FormData();
      formData.append('image', file);
      __WEBPACK_IMPORTED_MODULE_0_axios___default.a.post(this.urls.uploadimages, formData).then(function (res) {
        var imageInfo = res.data.meta;
        if (imageInfo.status_code == 201) {
          _this7.compUpload = '';
          _this7.tableChgBtn = 'show' + _this7.compIndexNum;
          _this7.proForm.product_components[_this7.compIndexNum].img_url = res.data.path;
        }
      }).catch(function (err) {});
    },
    updateTableUpload: function updateTableUpload(file) {
      var _this8 = this;

      this.updateChgBtn = '';
      this.judgeFm(file);
      var formData = new FormData();
      formData.append('image', file);
      __WEBPACK_IMPORTED_MODULE_0_axios___default.a.post(this.urls.uploadimages, formData).then(function (res) {
        var imageInfo = res.data.meta;
        if (imageInfo.status_code == 201) {
          _this8.updateCompUpload = '';
          _this8.updateChgBtn = 'show' + _this8.updateRwIndex;
          _this8.updateForm.product_components[_this8.updateRwIndex].img_url = res.data.path;
        }
      }).catch(function (err) {});
    },

    /*修改*/
    updateCName: function updateCName(_ref3) {
      var row = _ref3.row,
          rowIndex = _ref3.rowIndex;

      row.index = rowIndex;
    },
    updateProRowClick: function updateProRowClick(row) {
      this.updateRwIndex = row.index;
      this.updateProIndex = 'index' + row.index;
      if (row.img_url) {
        this.updateChgBtn = 'show' + row.index;
      } else {
        this.updateChgBtn = 'upload' + row.index;
      }
    },
    editPro: function editPro() {
      var _this9 = this;

      if (this.proSelection.length == 0) {
        this.$message({
          message: '没有选择要修改的数据',
          type: 'warning'
        });
        return;
      } else if (this.proSelection.length >= 2) {
        this.$message({
          message: '只能修改单条数据',
          type: 'warning'
        });
        return;
      } else {
        this.updateProMask = true;
        this.updateProIndex = '';
        this.$fetch(this.urls.products + '/' + this.updateId, { include: 'productComponents,shop,supplier,goodsCategory,combinations.productComponents' }).then(function (res) {
          console.log('res', res);
          _this9.updateForm = {
            commodity_code: res.commodity_code,
            jd_sn: res.jd_sn,
            vips_sn: res.vips_sn,
            factory_model: res.factory_model,
            short_name: res.short_name,
            shops_id: res.shops_id,
            supplier_id: res.supplier.id,
            category_id: res.category_id,
            remark: res.remark,
            title: res.title,
            img: res.img,
            url: res.url,
            product_components: res['productComponents'].data
          };
          if (_this9.updateForm.url) {
            _this9.noUpdate = false;
          } else {
            _this9.noUpdate = true;
          }
        }, function (err) {
          console.log(err);
        });
      }
    },
    componentBfUpload: function componentBfUpload(file) {
      var _this10 = this;

      this.componentShowChg = false;
      this.judgeFm(file);
      var formData = new FormData();
      formData.append('image', file);
      __WEBPACK_IMPORTED_MODULE_0_axios___default.a.post(this.urls.uploadimages, formData).then(function (res) {
        var imageInfo = res.data.meta;
        if (imageInfo.status_code == 201) {
          _this10.componentShowChg = true;
          _this10.updateForm.img = res.data.path;
        }
      }).catch(function (err) {});
    },
    updateAddComb: function updateAddComb() {
      var updateCombKey = {
        component_code: '',
        jd_component_code: '',
        vips_component_code: '',
        tb_price: '',
        cost: '',
        price: '',
        highest_price: '',
        lowest_price: '',
        warehouse_cost: '',
        assembly_price: '',
        discount: '',
        commission: '',
        is_common: false,
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
        is_stop_pro: false
      };
      if (this.updateForm.product_components.length > 0 && !this.updateForm.product_components[this.updateForm.product_components.length - 1].component_code) {
        this.$message({
          message: '商品编码或者子件编码为空时不能添加新规格',
          type: 'info'
        });
      } else {
        this.updateForm.product_components.push(updateCombKey);
        this.updateRwIndex = this.updateForm.product_components.length - 1;
        this.updateCompUpload = 'upload' + this.updateRwIndex;
        this.updateProIndex = 'index' + this.updateRwIndex;
      }
    },
    confirmUpdate: function confirmUpdate() {
      var _this11 = this;

      this.$patch(this.urls.products + '/' + this.updateId, this.updateForm).then(function () {
        _this11.updateProMask = false;
        _this11.$message({
          message: '商品修改成功',
          type: 'success'
        });
        _this11.refresh();
      }, function (err) {
        if (err.response) {
          var arr = err.response.data.errors;
          var arr1 = [];
          for (var i in arr) {
            arr1.push(arr[i]);
          }
          var str = arr1.join(',');
          _this11.$message.error(str);
        }
      });
    },
    cancelUpdate: function cancelUpdate() {
      this.updateProMask = false;
    },
    editSku: function editSku(row) {
      var _this12 = this;

      this.updateSkuMask = true;
      this.updateSkuId = row.id;
      this.alreadyCompId = [];
      this.updateCompList = [];
      this.updateCompId = [];
      this.updateList = [];
      this.$store.dispatch('products', '/products');
      this.$fetch(this.urls.combinations + '/' + row.id, { include: 'productComponents,product,orderItems' }).then(function (res) {
        res['productComponents']['data'].map(function (item) {
          _this12.alreadyCompId.push(item.id);
        });
        _this12.updateSkuForm = {
          pid: res.product.id,
          name: res.name,
          product_components: _this12.alreadyCompId
        };
        _this12.productsCompVal.map(function (item) {
          _this12.updateList.push(item);
        });
        if (_this12.updateList.length > 0) {
          _this12.updateList.map(function (item) {
            _this12.updateCompId.push(item.id);
          });
        } else {
          _this12.updateCompId = [];
        }
        _this12.$fetch(_this12.urls.productcomponents, { 'is_common': true }).then(function (res) {
          res.data.map(function (item) {
            if (_this12.updateCompId.indexOf(item.id) == -1) {
              _this12.updateList.push(item);
            }
          });
          _this12.updateList.map(function (list) {
            if (list.is_common) {
              _this12.updateCompList.push({
                label: list.spec + '(\u901A\u7528)',
                key: list.id,
                component_code: list.component_code
              });
            } else {
              _this12.updateCompList.push({
                label: list.spec,
                key: list.id,
                component_code: list.component_code
              });
            }
          });
        }, function (err) {});
      }, function (err) {
        if (err.response) {
          var arr = err.response.data.errors;
          var arr1 = [];
          for (var i in arr) {
            arr1.push(arr[i]);
          }
          var str = arr1.join(',');
          _this12.$message.error({
            message: str
          });
        }
      });
    },
    confirmUpdateSku: function confirmUpdateSku() {
      var _this13 = this;

      this.$patch(this.urls.combinations + '/' + this.updateSkuId, this.updateSkuForm).then(function () {
        _this13.updateSkuMask = false;
        _this13.$message({
          message: '修改sku成功',
          type: 'success'
        });
        _this13.refresh();
      }, function (err) {
        if (err.response) {
          var arr = err.response.data.errors;
          var arr1 = [];
          for (var i in arr) {
            arr1.push(arr[i]);
          }
          var str = arr1.join(',');
          _this13.$message.error({
            message: str
          });
        }
      });
    },
    cancelUpdateSku: function cancelUpdateSku() {
      this.updateSkuMask = false;
    },
    compSave: function compSave() {},
    compEdit: function compEdit() {},

    /*单条删除*/
    delPro: function delPro(row, e) {
      this.showDel = true;
      $('.el-popper').css({ left: e.x - 100 + 'px', top: e.y - 125 + 'px' });
      this.delId = row.id;
      if (row.pid && row.component_code) {
        this.delUrl = 'productcomponents';
      } else if (row.combinations && row.product_components) {
        this.delUrl = 'products';
      } else {
        this.delUrl = 'combinations';
      }
    },
    cancelD: function cancelD() {
      this.showDel = false;
      this.$message({
        message: '取消删除',
        type: 'info'
      });
    },
    confirmD: function confirmD(id) {
      var _this14 = this;

      this.$del(this.urls[this.delUrl] + '/' + id).then(function () {
        _this14.$message({
          message: '删除成功',
          type: 'success'
        });
        _this14.showDel = false;
        _this14.refresh();
      }, function (err) {
        if (err.response) {
          _this14.showDel = false;
          var arr = err.response.data.errors;
          var arr1 = [];
          for (var i in arr) {
            arr1.push(arr[i]);
          }
          var str = arr1.join(',');
          _this14.$message.error({
            message: str
          });
        }
      });
    },

    /*批量删除*/
    handleSelectionChange: function handleSelectionChange(val) {
      if (val.length != 0) {
        this.updateId = val[0].id;
      } else {
        this.updateId = '';
      }
      this.proSelection = val;
      var del = [];
      val.forEach(function (selectedItem) {
        del.push(selectedItem.id);
      });
      this.delArr = del.join(',');
    },
    delMore: function delMore() {
      var _this15 = this;

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
          _this15.$del(_this15.urls.products, { ids: _this15.delArr }).then(function () {
            _this15.$message({
              message: '删除成功',
              type: 'success'
            });
            _this15.refresh();
          }, function (err) {
            if (err.response) {
              var arr = err.response.data.errors;
              var arr1 = [];
              for (var i in arr) {
                arr1.push(arr[i]);
              }
              var str = arr1.join(',');
              _this15.$message.error(str);
            }
          });
        }).catch(function () {
          _this15.$message({
            type: 'info',
            message: '已取消删除'
          });
        });
      }
    },

    /*刷新*/
    refresh: function refresh() {
      this.productsLoading = true;
      this.getProducts();
    },

    /*分页*/
    handlePagChg: function handlePagChg(page) {
      var _this16 = this;

      this.$fetch(this.urls.products + '?page=' + page, { include: 'productComponents,shop,supplier,goodsCategory,combinations.productComponents' }).then(function (res) {
        _this16.logisticsData = res.data;
      });
    },

    /*其他*/
    test: function test() {}
  },
  mounted: function mounted() {
    this.getProducts();
    this.$store.dispatch('setOpt', this.newOpt);
    var that = this;
    $(window).resize(function () {
      that.$store.dispatch('setOpt', that.newOpt);
    });
  }
});

/***/ }),

/***/ 568:
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
                  return _vm.handleQuery($event)
                }
              },
              model: {
                value: _vm.searchBox.productsName,
                callback: function($$v) {
                  _vm.$set(
                    _vm.searchBox,
                    "productsName",
                    typeof $$v === "string" ? $$v.trim() : $$v
                  )
                },
                expression: "searchBox.productsName"
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
                nativeOn: {
                  keyup: function($event) {
                    if (
                      !("button" in $event) &&
                      _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                    ) {
                      return null
                    }
                    return _vm.handleQuery($event)
                  }
                },
                model: {
                  value: _vm.searchBox.shopNames,
                  callback: function($$v) {
                    _vm.$set(
                      _vm.searchBox,
                      "shopNames",
                      typeof $$v === "string" ? $$v.trim() : $$v
                    )
                  },
                  expression: "searchBox.shopNames"
                }
              },
              _vm._l(_vm.resData.shops, function(item) {
                return _c("el-option", {
                  key: item.value,
                  attrs: { label: item.nick, value: item.id }
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
                nativeOn: {
                  keyup: function($event) {
                    if (
                      !("button" in $event) &&
                      _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                    ) {
                      return null
                    }
                    return _vm.handleQuery($event)
                  }
                },
                model: {
                  value: _vm.searchBox.supplier,
                  callback: function($$v) {
                    _vm.$set(_vm.searchBox, "supplier", $$v)
                  },
                  expression: "searchBox.supplier"
                }
              },
              _vm._l(_vm.resData.suppliers, function(item) {
                return _c("el-option", {
                  key: item.value,
                  attrs: { label: item.name, value: item.id }
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
                nativeOn: {
                  keyup: function($event) {
                    if (
                      !("button" in $event) &&
                      _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                    ) {
                      return null
                    }
                    return _vm.handleQuery($event)
                  }
                },
                model: {
                  value: _vm.searchBox.kinds,
                  callback: function($$v) {
                    _vm.$set(_vm.searchBox, "kinds", $$v)
                  },
                  expression: "searchBox.kinds"
                }
              },
              _vm._l(_vm.resData.goodscates, function(item) {
                return _c("el-option", {
                  key: item.value,
                  attrs: { label: item.name, value: item.id }
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
                nativeOn: {
                  keyup: function($event) {
                    if (
                      !("button" in $event) &&
                      _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                    ) {
                      return null
                    }
                    return _vm.handleQuery($event)
                  }
                },
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
                nativeOn: {
                  keyup: function($event) {
                    if (
                      !("button" in $event) &&
                      _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                    ) {
                      return null
                    }
                    return _vm.handleQuery($event)
                  }
                },
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
                nativeOn: {
                  keyup: function($event) {
                    if (
                      !("button" in $event) &&
                      _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                    ) {
                      return null
                    }
                    return _vm.handleQuery($event)
                  }
                },
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
              value: _vm.productsLoading,
              expression: "productsLoading"
            }
          ],
          ref: "multipleTable",
          attrs: {
            data: _vm.productsVal,
            fit: "",
            height: "400",
            "row-class-name": _vm.proRowCName
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
            }
          }),
          _vm._v(" "),
          _vm._l(_vm.productsHead, function(item) {
            return _c("el-table-column", {
              key: item.prop,
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
                                      "\n                          " +
                                        _vm._s(
                                          scope.row[item.prop][item.nmProp]
                                        ) +
                                        "\n                      "
                                    )
                                  ])
                                : _vm._e()
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
                                      _vm.$set(scope.row, item.prop, $$v)
                                    },
                                    expression: "scope.row[item.prop]"
                                  }
                                })
                              ],
                              1
                            )
                          : item.type == "img"
                            ? _c(
                                "span",
                                [
                                  _c(
                                    "el-popover",
                                    {
                                      attrs: {
                                        placement: "right",
                                        trigger: "hover",
                                        "popper-class": "picture_detail"
                                      }
                                    },
                                    [
                                      _c("img", {
                                        attrs: { src: scope.row[item.prop] }
                                      }),
                                      _vm._v(" "),
                                      _c("img", {
                                        attrs: {
                                          slot: "reference",
                                          src: scope.row[item.prop],
                                          alt: scope.row[item.alt]
                                        },
                                        slot: "reference"
                                      })
                                    ]
                                  )
                                ],
                                1
                              )
                            : _c("span", [
                                _vm._v(
                                  "\n                      " +
                                    _vm._s(scope.row[item.prop]) +
                                    "\n                  "
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
                            _vm.addSkuMth(scope.row)
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
                            _vm.delPro(scope.row, $event)
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
      _c("Pagination", {
        attrs: { "page-url": this.urls.products },
        on: { handlePagChg: _vm.handlePagChg }
      }),
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
            _vm._v("\n              淘宝信息\n          ")
          ]),
          _vm._v(" "),
          _c(
            "el-tab-pane",
            { attrs: { label: "子件列表", name: "1" } },
            [
              _c(
                "el-table",
                { attrs: { data: _vm.productsCompVal } },
                [
                  _vm._l(_vm.btmTableHead[this.activeName], function(item) {
                    return _c("el-table-column", {
                      key: item.label,
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
                                                          "\n                                          " +
                                                            _vm._s(list.name) +
                                                            "\n                                      "
                                                        )
                                                      ])
                                                    : _vm._e()
                                                ]
                                              )
                                            }
                                          )
                                        )
                                      : item.type == "img"
                                        ? _c(
                                            "span",
                                            [
                                              _c(
                                                "el-popover",
                                                {
                                                  attrs: {
                                                    placement: "right",
                                                    trigger: "hover",
                                                    "popper-class":
                                                      "picture_detail"
                                                  }
                                                },
                                                [
                                                  _c("img", {
                                                    attrs: {
                                                      src: scope.row[item.prop]
                                                    }
                                                  }),
                                                  _vm._v(" "),
                                                  _c("img", {
                                                    attrs: {
                                                      slot: "reference",
                                                      src: scope.row[item.prop],
                                                      alt: scope.row[item.alt]
                                                    },
                                                    slot: "reference"
                                                  })
                                                ]
                                              )
                                            ],
                                            1
                                          )
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
                                                    expression:
                                                      "scope.row[item.prop]"
                                                  }
                                                })
                                              ],
                                              1
                                            )
                                          : _c("span", [
                                              _vm._v(
                                                "\n                               " +
                                                  _vm._s(scope.row[item.prop]) +
                                                  "\n                          "
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
                      width: "100",
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
                                attrs: { size: "mini", type: "danger" },
                                on: {
                                  click: function($event) {
                                    _vm.delPro(scope.row, $event)
                                  }
                                }
                              },
                              [_vm._v("删除子件")]
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
          ),
          _vm._v(" "),
          _c(
            "el-tab-pane",
            { attrs: { label: "sku信息", name: "2" } },
            [
              _c(
                "el-table",
                { attrs: { data: _vm.productsSkuVal } },
                [
                  _vm._l(_vm.btmTableHead[this.activeName], function(item) {
                    return _c("el-table-column", {
                      key: item.label,
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
                                    item.inProp
                                      ? _c(
                                          "span",
                                          _vm._l(
                                            scope.row[item.prop]["data"],
                                            function(skuList) {
                                              return _c(
                                                "span",
                                                { key: skuList.id },
                                                [
                                                  _c(
                                                    "el-tag",
                                                    {
                                                      staticStyle: {
                                                        "margin-right": "5px"
                                                      }
                                                    },
                                                    [
                                                      _vm._v(
                                                        _vm._s(
                                                          "" +
                                                            skuList[item.inProp]
                                                        )
                                                      )
                                                    ]
                                                  )
                                                ],
                                                1
                                              )
                                            }
                                          )
                                        )
                                      : _c("span", [
                                          _vm._v(
                                            "\n                                      " +
                                              _vm._s(scope.row[item.prop]) +
                                              "\n                                  "
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
                                    _vm.editSku(scope.row)
                                  }
                                }
                              },
                              [_vm._v("修改sku")]
                            ),
                            _vm._v(" "),
                            _c(
                              "el-button",
                              {
                                attrs: { size: "mini", type: "danger" },
                                on: {
                                  click: function($event) {
                                    _vm.delPro(scope.row, $event)
                                  }
                                }
                              },
                              [_vm._v("删除sku")]
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
          ),
          _vm._v(" "),
          _c("el-tab-pane", { attrs: { label: "商品网站", name: "3" } }, [
            _vm._v("\n              商品网站\n          ")
          ]),
          _vm._v(" "),
          _c("el-tab-pane", { attrs: { label: "操作记录", name: "4" } }, [
            _vm._v("\n              操作记录\n          ")
          ])
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "el-dialog",
        {
          class: { "more-forms": _vm.moreForms },
          attrs: { title: "新增商品", visible: _vm.addProMask },
          on: {
            "update:visible": function($event) {
              _vm.addProMask = $event
            }
          }
        },
        [
          _c(
            "el-form",
            {
              ref: "addNew",
              attrs: {
                model: _vm.proForm,
                rules: _vm.proRules,
                "label-width": "100px"
              }
            },
            _vm._l(_vm.addProHead, function(item, index) {
              return _c(
                "el-form-item",
                { key: index, attrs: { label: item.label, prop: item.prop } },
                [
                  item.type == "text"
                    ? _c(
                        "span",
                        [
                          _c("el-input", {
                            attrs: { placeholder: item.holder },
                            model: {
                              value: _vm.proForm[item.prop],
                              callback: function($$v) {
                                _vm.$set(
                                  _vm.proForm,
                                  item.prop,
                                  typeof $$v === "string" ? $$v.trim() : $$v
                                )
                              },
                              expression: "proForm[item.prop]"
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
                              attrs: { type: "url", placeholder: item.holder },
                              model: {
                                value: _vm.ruleForm[item.prop],
                                callback: function($$v) {
                                  _vm.$set(
                                    _vm.ruleForm,
                                    item.prop,
                                    typeof $$v === "string" ? $$v.trim() : $$v
                                  )
                                },
                                expression: "ruleForm[item.prop]"
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
                                  attrs: { placeholder: item.holder },
                                  model: {
                                    value: _vm.proForm[item.prop],
                                    callback: function($$v) {
                                      _vm.$set(_vm.proForm, item.prop, $$v)
                                    },
                                    expression: "proForm[item.prop]"
                                  }
                                },
                                _vm._l(_vm.resData[item.stateVal], function(
                                  list
                                ) {
                                  return _c(
                                    "span",
                                    { key: list.id },
                                    [
                                      _c("el-option", {
                                        attrs: {
                                          label: list.name
                                            ? list.name
                                            : list.nick,
                                          value: list.id
                                        }
                                      })
                                    ],
                                    1
                                  )
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
                                    placehoder: item.holder
                                  },
                                  model: {
                                    value: _vm.proForm[item.prop],
                                    callback: function($$v) {
                                      _vm.$set(
                                        _vm.proForm,
                                        item.prop,
                                        typeof $$v === "string"
                                          ? $$v.trim()
                                          : $$v
                                      )
                                    },
                                    expression: "proForm[item.prop]"
                                  }
                                })
                              ],
                              1
                            )
                          : item.type == "img"
                            ? _c("span", [
                                _vm.noUpload
                                  ? _c(
                                      "span",
                                      [
                                        _c(
                                          "el-upload",
                                          {
                                            staticClass: "upload-demo",
                                            attrs: {
                                              action: "",
                                              "before-upload": _vm.beforeUpload
                                            }
                                          },
                                          [
                                            _c(
                                              "el-button",
                                              {
                                                attrs: {
                                                  size: "small",
                                                  type: "primary"
                                                }
                                              },
                                              [_vm._v("点击上传")]
                                            )
                                          ],
                                          1
                                        )
                                      ],
                                      1
                                    )
                                  : _c(
                                      "span",
                                      [
                                        _c("img", {
                                          attrs: { src: _vm.proForm[item.prop] }
                                        }),
                                        _vm._v(" "),
                                        _c(
                                          "el-upload",
                                          {
                                            staticClass: "chgDiv",
                                            attrs: {
                                              action: "",
                                              "before-upload": _vm.beforeUpload
                                            }
                                          },
                                          [
                                            _c("el-button", {
                                              directives: [
                                                {
                                                  name: "show",
                                                  rawName: "v-show",
                                                  value: _vm.showChgBtn,
                                                  expression: "showChgBtn"
                                                }
                                              ],
                                              staticClass: "chg",
                                              attrs: {
                                                type: "primary",
                                                icon: "el-icon-edit",
                                                size: "mini"
                                              }
                                            })
                                          ],
                                          1
                                        )
                                      ],
                                      1
                                    )
                              ])
                            : _vm._e()
                ]
              )
            })
          ),
          _vm._v(" "),
          _c("el-button", { attrs: { type: "text" } }, [_vm._v("子件信息")]),
          _vm._v(" "),
          _c(
            "el-table",
            {
              attrs: {
                data: _vm.proForm.product_components,
                fit: "",
                height: "300",
                "row-class-name": _vm.compRowCName
              },
              on: { "row-click": _vm.compRowClick }
            },
            _vm._l(_vm.compHead, function(item, index) {
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
                        _vm.compCurIndex == "index" + scope.$index
                          ? _c("span", [
                              item.type == "number"
                                ? _c(
                                    "span",
                                    [
                                      _c("el-input", {
                                        attrs: {
                                          size: "small",
                                          type: "number",
                                          placeholder: item.holder
                                        },
                                        model: {
                                          value: scope.row[item.prop],
                                          callback: function($$v) {
                                            _vm.$set(
                                              scope.row,
                                              item.prop,
                                              typeof $$v === "string"
                                                ? $$v.trim()
                                                : $$v
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
                                            placeholder: item.holder
                                          },
                                          model: {
                                            value: scope.row[item.prop],
                                            callback: function($$v) {
                                              _vm.$set(
                                                scope.row,
                                                item.prop,
                                                typeof $$v === "string"
                                                  ? $$v.trim()
                                                  : $$v
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
                                            model: {
                                              value: scope.row[item.prop],
                                              callback: function($$v) {
                                                _vm.$set(
                                                  scope.row,
                                                  item.prop,
                                                  typeof $$v === "string"
                                                    ? $$v.trim()
                                                    : $$v
                                                )
                                              },
                                              expression: "scope.row[item.prop]"
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
                                        : item.type == "img"
                                          ? _c("span", [
                                              _vm.compUpload ==
                                              "upload" + scope.$index
                                                ? _c(
                                                    "span",
                                                    [
                                                      _c(
                                                        "el-upload",
                                                        {
                                                          attrs: {
                                                            action: "",
                                                            "before-upload":
                                                              _vm.beforeUploadComp
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "el-button",
                                                            {
                                                              attrs: {
                                                                size: "small",
                                                                type: "primary"
                                                              }
                                                            },
                                                            [_vm._v("点击上传")]
                                                          )
                                                        ],
                                                        1
                                                      )
                                                    ],
                                                    1
                                                  )
                                                : _c(
                                                    "span",
                                                    [
                                                      _c("img", {
                                                        attrs: {
                                                          src:
                                                            scope.row[item.prop]
                                                        }
                                                      }),
                                                      _vm._v(" "),
                                                      _c(
                                                        "el-upload",
                                                        {
                                                          staticClass: "chgDiv",
                                                          attrs: {
                                                            action: "",
                                                            "before-upload":
                                                              _vm.beforeUpload
                                                          }
                                                        },
                                                        [
                                                          _c("el-button", {
                                                            directives: [
                                                              {
                                                                name: "show",
                                                                rawName:
                                                                  "v-show",
                                                                value:
                                                                  _vm.tableChgBtn ==
                                                                  "show" +
                                                                    scope.$index,
                                                                expression:
                                                                  "tableChgBtn=='show'+scope.$index"
                                                              }
                                                            ],
                                                            staticClass: "chg",
                                                            attrs: {
                                                              type: "primary",
                                                              icon:
                                                                "el-icon-edit",
                                                              size: "mini"
                                                            }
                                                          })
                                                        ],
                                                        1
                                                      )
                                                    ],
                                                    1
                                                  )
                                            ])
                                          : _c(
                                              "span",
                                              [
                                                _c("el-input", {
                                                  attrs: {
                                                    size: "small",
                                                    placeholder: item.holder
                                                  },
                                                  model: {
                                                    value: scope.row[item.prop],
                                                    callback: function($$v) {
                                                      _vm.$set(
                                                        scope.row,
                                                        item.prop,
                                                        typeof $$v === "string"
                                                          ? $$v.trim()
                                                          : $$v
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
                                                          "\n                                           " +
                                                            _vm._s(list.name) +
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
                                  : item.type == "img"
                                    ? _c("span", [
                                        _c("img", {
                                          attrs: {
                                            src: scope.row[item.prop],
                                            alt: ""
                                          }
                                        })
                                      ])
                                    : _c("span", [
                                        _vm._v(
                                          "\n                               " +
                                            _vm._s(scope.row[item.prop]) +
                                            "\n                          "
                                        )
                                      ])
                            ])
                      ]
                    }
                  }
                ])
              })
            })
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
                    [_vm._v("添加子件")]
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
                      on: { click: _vm.confirmAddPro }
                    },
                    [_vm._v("确定添加")]
                  ),
                  _vm._v(" "),
                  _c(
                    "el-button",
                    { attrs: { type: "info" }, on: { click: _vm.resetAddPro } },
                    [_vm._v("重置")]
                  ),
                  _vm._v(" "),
                  _c(
                    "el-button",
                    {
                      attrs: { type: "warning" },
                      on: { click: _vm.cancelAddPro }
                    },
                    [_vm._v("取消")]
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
                      _vm.confirmD(_vm.delId, _vm.delUrl)
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
          class: { "more-forms": _vm.moreForms },
          attrs: { title: "修改商品", visible: _vm.updateProMask },
          on: {
            "update:visible": function($event) {
              _vm.updateProMask = $event
            }
          }
        },
        [
          _c(
            "el-form",
            {
              attrs: {
                model: _vm.updateForm,
                rules: _vm.proRules,
                "label-width": "100px"
              }
            },
            _vm._l(_vm.addProHead, function(item, index) {
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
                              disabled:
                                item.prop == "commodity_code" ? true : false
                            },
                            model: {
                              value: _vm.updateForm[item.prop],
                              callback: function($$v) {
                                _vm.$set(
                                  _vm.updateForm,
                                  item.prop,
                                  typeof $$v === "string" ? $$v.trim() : $$v
                                )
                              },
                              expression: "updateForm[item.prop]"
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
                              attrs: { type: "url" },
                              model: {
                                value: _vm.updateForm[item.prop],
                                callback: function($$v) {
                                  _vm.$set(
                                    _vm.updateForm,
                                    item.prop,
                                    typeof $$v === "string" ? $$v.trim() : $$v
                                  )
                                },
                                expression: "updateForm[item.prop]"
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
                                  model: {
                                    value: _vm.updateForm[item.prop],
                                    callback: function($$v) {
                                      _vm.$set(_vm.updateForm, item.prop, $$v)
                                    },
                                    expression: "updateForm[item.prop]"
                                  }
                                },
                                _vm._l(_vm.resData[item.stateVal], function(
                                  list
                                ) {
                                  return _c(
                                    "span",
                                    { key: list.id },
                                    [
                                      _c("el-option", {
                                        attrs: {
                                          label: list.name
                                            ? list.name
                                            : list.nick,
                                          value: list.id
                                        }
                                      })
                                    ],
                                    1
                                  )
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
                                  attrs: { type: "textarea" },
                                  model: {
                                    value: _vm.updateForm[item.prop],
                                    callback: function($$v) {
                                      _vm.$set(
                                        _vm.updateForm,
                                        item.prop,
                                        typeof $$v === "string"
                                          ? $$v.trim()
                                          : $$v
                                      )
                                    },
                                    expression: "updateForm[item.prop]"
                                  }
                                })
                              ],
                              1
                            )
                          : item.type == "img"
                            ? _c("span", [
                                _vm.noUpdate
                                  ? _c(
                                      "span",
                                      [
                                        _c(
                                          "el-upload",
                                          {
                                            staticClass: "upload-demo",
                                            attrs: {
                                              action: "",
                                              "before-upload":
                                                _vm.beforeUploadComp
                                            }
                                          },
                                          [
                                            _c(
                                              "el-button",
                                              {
                                                attrs: {
                                                  size: "small",
                                                  type: "primary"
                                                }
                                              },
                                              [_vm._v("点击上传")]
                                            )
                                          ],
                                          1
                                        )
                                      ],
                                      1
                                    )
                                  : _c(
                                      "span",
                                      [
                                        _c("img", {
                                          attrs: {
                                            src: _vm.updateForm[item.prop]
                                          }
                                        }),
                                        _vm._v(" "),
                                        _c(
                                          "el-upload",
                                          {
                                            staticClass: "chgDiv",
                                            attrs: {
                                              action: "",
                                              "before-upload":
                                                _vm.updateFormUpload
                                            }
                                          },
                                          [
                                            _c("el-button", {
                                              directives: [
                                                {
                                                  name: "show",
                                                  rawName: "v-show",
                                                  value: _vm.componentShowChg,
                                                  expression: "componentShowChg"
                                                }
                                              ],
                                              staticClass: "chg",
                                              attrs: {
                                                type: "primary",
                                                icon: "el-icon-edit",
                                                size: "mini"
                                              }
                                            })
                                          ],
                                          1
                                        )
                                      ],
                                      1
                                    )
                              ])
                            : _vm._e()
                ]
              )
            })
          ),
          _vm._v(" "),
          _c("el-button", { attrs: { type: "text" } }, [_vm._v("子件信息")]),
          _vm._v(" "),
          _c(
            "el-table",
            {
              attrs: {
                data: _vm.updateForm.product_components,
                fit: "",
                height: "300",
                "row-class-name": _vm.updateCName
              },
              on: { "row-click": _vm.updateProRowClick }
            },
            _vm._l(_vm.compHead, function(item, index) {
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
                        _vm.updateProIndex == "index" + scope.$index
                          ? _c("span", [
                              item.type == "number"
                                ? _c(
                                    "span",
                                    [
                                      _c("el-input", {
                                        attrs: {
                                          size: "small",
                                          type: "number"
                                        },
                                        model: {
                                          value: scope.row[item.prop],
                                          callback: function($$v) {
                                            _vm.$set(
                                              scope.row,
                                              item.prop,
                                              typeof $$v === "string"
                                                ? $$v.trim()
                                                : $$v
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
                                          attrs: { size: "small", type: "url" },
                                          model: {
                                            value: scope.row[item.prop],
                                            callback: function($$v) {
                                              _vm.$set(
                                                scope.row,
                                                item.prop,
                                                typeof $$v === "string"
                                                  ? $$v.trim()
                                                  : $$v
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
                                              size: "small"
                                            },
                                            model: {
                                              value: scope.row[item.prop],
                                              callback: function($$v) {
                                                _vm.$set(
                                                  scope.row,
                                                  item.prop,
                                                  typeof $$v === "string"
                                                    ? $$v.trim()
                                                    : $$v
                                                )
                                              },
                                              expression: "scope.row[item.prop]"
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
                                                          label: list.name
                                                            ? list.name
                                                            : list.nick,
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
                                        : item.type == "img"
                                          ? _c("span", [
                                              _vm.updateCompUpload ==
                                              "upload" + scope.$index
                                                ? _c(
                                                    "span",
                                                    [
                                                      _c(
                                                        "el-upload",
                                                        {
                                                          attrs: {
                                                            action: "",
                                                            "before-upload":
                                                              _vm.updateTableUpload
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "el-button",
                                                            {
                                                              attrs: {
                                                                size: "small",
                                                                type: "primary"
                                                              }
                                                            },
                                                            [_vm._v("点击上传")]
                                                          )
                                                        ],
                                                        1
                                                      )
                                                    ],
                                                    1
                                                  )
                                                : _c(
                                                    "span",
                                                    [
                                                      _c("img", {
                                                        attrs: {
                                                          src:
                                                            scope.row[item.prop]
                                                        }
                                                      }),
                                                      _vm._v(" "),
                                                      _c(
                                                        "el-upload",
                                                        {
                                                          staticClass: "chgDiv",
                                                          attrs: {
                                                            action: "",
                                                            "before-upload":
                                                              _vm.beforeUploadComp
                                                          }
                                                        },
                                                        [
                                                          _c("el-button", {
                                                            directives: [
                                                              {
                                                                name: "show",
                                                                rawName:
                                                                  "v-show",
                                                                value:
                                                                  _vm.updateChgBtn ==
                                                                  "show" +
                                                                    scope.$index,
                                                                expression:
                                                                  "updateChgBtn=='show'+scope.$index"
                                                              }
                                                            ],
                                                            staticClass: "chg",
                                                            attrs: {
                                                              type: "primary",
                                                              icon:
                                                                "el-icon-edit",
                                                              size: "mini"
                                                            }
                                                          })
                                                        ],
                                                        1
                                                      )
                                                    ],
                                                    1
                                                  )
                                            ])
                                          : _c(
                                              "span",
                                              [
                                                _c("el-input", {
                                                  attrs: { size: "small" },
                                                  model: {
                                                    value: scope.row[item.prop],
                                                    callback: function($$v) {
                                                      _vm.$set(
                                                        scope.row,
                                                        item.prop,
                                                        typeof $$v === "string"
                                                          ? $$v.trim()
                                                          : $$v
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
                                                          "\n                                                  " +
                                                            _vm._s(
                                                              list.name
                                                                ? list.name
                                                                : list.nick
                                                            ) +
                                                            "\n                                         "
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
                                  : item.type == "img"
                                    ? _c("span", [
                                        _c("img", {
                                          attrs: { src: scope.row[item.prop] }
                                        })
                                      ])
                                    : _c("span", [
                                        _vm._v(
                                          "\n                               " +
                                            _vm._s(scope.row[item.prop]) +
                                            "\n                          "
                                        )
                                      ])
                            ])
                      ]
                    }
                  }
                ])
              })
            })
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
                    {
                      attrs: { type: "primary" },
                      on: { click: _vm.updateAddComb }
                    },
                    [_vm._v("添加子件")]
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
                      on: { click: _vm.confirmUpdate }
                    },
                    [_vm._v("确定")]
                  ),
                  _vm._v(" "),
                  _c("el-button", { on: { click: _vm.cancelUpdate } }, [
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
          attrs: { title: "添加Sku", visible: _vm.addSku },
          on: {
            "update:visible": function($event) {
              _vm.addSku = $event
            }
          }
        },
        [
          _c(
            "el-form",
            {
              attrs: {
                model: _vm.skuForm,
                rules: _vm.skuRules,
                "label-width": "100px"
              }
            },
            [
              _c(
                "el-form-item",
                { attrs: { label: "所属商品" } },
                [
                  _c(
                    "el-select",
                    {
                      model: {
                        value: _vm.skuForm.pid,
                        callback: function($$v) {
                          _vm.$set(_vm.skuForm, "pid", $$v)
                        },
                        expression: "skuForm.pid"
                      }
                    },
                    _vm._l(_vm.resData.products, function(list) {
                      return _c(
                        "span",
                        { key: list.id },
                        [
                          _c("el-option", {
                            attrs: { label: list.short_name, value: list.id }
                          })
                        ],
                        1
                      )
                    })
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "sku名称" } },
                [
                  _c("el-input", {
                    model: {
                      value: _vm.skuForm.name,
                      callback: function($$v) {
                        _vm.$set(_vm.skuForm, "name", $$v)
                      },
                      expression: "skuForm.name"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "选择子件" } },
                [
                  _c("el-transfer", {
                    attrs: {
                      filterable: "",
                      "filter-method": _vm.filterMethod,
                      "filter-placeholder": "请输入子件编码",
                      titles: ["子件列表", "添加列表"],
                      data: _vm.compList
                    },
                    model: {
                      value: _vm.skuForm.product_components,
                      callback: function($$v) {
                        _vm.$set(_vm.skuForm, "product_components", $$v)
                      },
                      expression: "skuForm.product_components"
                    }
                  })
                ],
                1
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "dialog-footer",
              attrs: { slot: "footer" },
              slot: "footer"
            },
            [
              _c(
                "el-button",
                {
                  attrs: { type: "primary" },
                  on: { click: _vm.confirmAddSku }
                },
                [_vm._v("确定")]
              ),
              _vm._v(" "),
              _c("el-button", { on: { click: _vm.cancelAddSku } }, [
                _vm._v("取消")
              ])
            ],
            1
          )
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "el-dialog",
        {
          attrs: { title: "修改Sku", visible: _vm.updateSkuMask },
          on: {
            "update:visible": function($event) {
              _vm.updateSkuMask = $event
            }
          }
        },
        [
          _c(
            "el-form",
            {
              attrs: {
                model: _vm.updateSkuForm,
                rules: _vm.skuRules,
                "label-width": "100px"
              }
            },
            [
              _c(
                "el-form-item",
                { attrs: { label: "所属商品" } },
                [
                  _c(
                    "el-select",
                    {
                      attrs: { disabled: "" },
                      model: {
                        value: _vm.updateSkuForm.pid,
                        callback: function($$v) {
                          _vm.$set(_vm.updateSkuForm, "pid", $$v)
                        },
                        expression: "updateSkuForm.pid"
                      }
                    },
                    _vm._l(_vm.resData.products, function(list) {
                      return _c(
                        "span",
                        { key: list.created_at },
                        [
                          _c("el-option", {
                            attrs: { label: list.short_name, value: list.id }
                          })
                        ],
                        1
                      )
                    })
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "sku名称" } },
                [
                  _c("el-input", {
                    model: {
                      value: _vm.updateSkuForm.name,
                      callback: function($$v) {
                        _vm.$set(_vm.updateSkuForm, "name", $$v)
                      },
                      expression: "updateSkuForm.name"
                    }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "el-form-item",
                { attrs: { label: "选择子件" } },
                [
                  _c("el-transfer", {
                    attrs: {
                      filterable: "",
                      "filter-method": _vm.filterMethod,
                      "filter-placeholder": "请输入子件编码",
                      titles: ["子件列表", "添加列表"],
                      data: _vm.updateCompList
                    },
                    model: {
                      value: _vm.updateSkuForm.product_components,
                      callback: function($$v) {
                        _vm.$set(_vm.updateSkuForm, "product_components", $$v)
                      },
                      expression: "updateSkuForm.product_components"
                    }
                  })
                ],
                1
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "dialog-footer",
              attrs: { slot: "footer" },
              slot: "footer"
            },
            [
              _c(
                "el-button",
                {
                  attrs: { type: "primary" },
                  on: { click: _vm.confirmUpdateSku }
                },
                [_vm._v("确定")]
              ),
              _vm._v(" "),
              _c("el-button", { on: { click: _vm.cancelUpdateSku } }, [
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-5ab9ee33", module.exports)
  }
}

/***/ })

});
webpackJsonp([27],{

/***/ 475:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(587)
/* template */
var __vue_template__ = __webpack_require__(588)
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
Component.options.__file = "resources\\assets\\js\\views\\basicInf\\supplierMag.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-82f1fe6a", Component.options)
  } else {
    hotAPI.reload("data-v-82f1fe6a", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 587:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__ = __webpack_require__(41);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_element_china_area_data___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_element_china_area_data__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
        ent: this.addInfo
      }, {
        cnt: '修改',
        icon: 'bf-change',
        ent: this.updateInfo
        // nClick: true
      }, {
        cnt: '删除',
        icon: 'bf-del',
        ent: this.delBatch
      }, {
        cnt: '导入',
        icon: 'bf-in',
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
        cnt: '刷新',
        icon: 'bf-refresh',
        ent: this.refresh
      }],
      activeName: '0',
      pagination: {
        current_page: 1,
        per_page: 0,
        page_total: 0
      },
      /*获取数据*/
      supplierVal: [],
      seriesVal: [],
      checkboxInit: false,
      tableHead: [[{
        label: '名称',
        width: '120',
        prop: "name",
        holder: '请输入名称',
        type: 'text'
        // beAble: true
      }, {
        label: '公司',
        width: '120',
        prop: "company",
        holder: '请输入公司',
        type: 'text'
      }, {
        label: '公司代码',
        width: '130',
        prop: "code",
        holder: '请输入公司代码',
        type: 'text'
      }, {
        label: '省',
        width: '120',
        prop: "province",
        holder: '请输入省'
      }, {
        label: '市',
        width: '120',
        prop: "city",
        holder: '请输入市',
        type: 'text'
      }, {
        label: '区',
        width: '120',
        prop: "district",
        holder: '请输入区',
        type: 'text'
      }, {
        label: '地址',
        width: '150',
        prop: "address",
        holder: '请输入地址',
        type: 'text'
      }, {
        label: '邮编',
        width: '120',
        prop: "zipcode",
        type: 'text'
      }, {
        label: '联系人',
        width: '120',
        prop: "contacts",
        type: 'text'
      }, {
        label: '联系电话',
        width: '120',
        prop: "phone",
        type: 'text'
      }, {
        label: '手机',
        width: '120',
        prop: "mobile",
        type: 'text'
      }, {
        label: '传真',
        width: '120',
        prop: "fax",
        type: 'text'
      }, {
        label: '邮箱',
        width: '120',
        prop: "email",
        type: 'text'
      }, {
        label: '备注',
        width: '130',
        prop: "remark",
        type: 'textarea'
      }, {
        label: '启用扫描',
        width: '90',
        prop: "is_scan",
        type: 'checkbox'
      }, {
        label: '采购自动计价',
        width: '90',
        prop: "auto_valuation",
        holder: '是否启用',
        type: 'checkbox'
      }, {
        label: '状态',
        width: '90',
        prop: "status",
        holder: '请选择状态',
        type: 'checkbox'
      }], [{
        label: '供应商名称',
        width: '130',
        prop: "suppliers",
        inProp: 'name',
        holder: '请选择供应商名称',
        type: 'select'
      }, {
        label: '系列代码',
        width: '130',
        prop: "code",
        holder: '请输入系列代码',
        type: 'text'
      }, {
        label: '系列名称',
        width: '130',
        prop: "name",
        holder: '请输入系列名称',
        type: 'text'
      }, {
        label: '系列描述',
        width: '150',
        prop: "description",
        holder: '请输入系列描述',
        type: 'textarea'
      }, {
        label: '备注',
        width: '130',
        prop: "remark",
        holder: '请输入名称',
        type: 'textarea'
      }, {
        label: '状态',
        width: '90',
        prop: "status",
        holder: '请选择状态',
        type: 'checkbox'
      }]],
      supplierRow: {},
      seriesRow: {},
      loading: true,
      /*新增*/
      title: ['新增供应商', '新增产品系列'],
      addMask: [false, false],
      addVal: [{
        name: '',
        company: '',
        code: '',
        provinces: [],
        province: '',
        city: '',
        district: '',
        address: '',
        phone: '',
        mobile: '',
        fax: '',
        email: '',
        remark: '',
        is_scan: true,
        auto_valuation: true,
        status: true
      }, {
        suppliers_id: '',
        code: '',
        name: '',
        description: '',
        remark: '',
        status: true
      }],
      addRules: [{
        name: [{ required: true, message: '请输入供应商名称', trigger: 'blur' }],
        company: [{ required: true, message: '请输入供应商公司', trigger: 'blur' }],
        code: [{ required: true, message: '请输入公司代码', trigger: 'blur' }],
        province: [{ required: true, message: '请输入所在省', trigger: 'blur' }],
        city: [{ required: true, message: '请输入所在市', trigger: 'blur' }],
        district: [{ required: true, message: '请输入所在区', trigger: 'blur' }],
        address: [{ required: true, message: '请输入详细地址', trigger: 'blur' }],
        zipcode: [{ required: true, message: '请输入邮编', trigger: 'blur' }],
        phone: [{ required: true, message: '请输入电话', trigger: 'blur' }],
        mobile: [{ required: true, message: '请输入手机', trigger: 'blur' }],
        fax: [{ required: true, message: '请输入传真号', trigger: 'blur' }],
        email: [{ required: true, message: '请输入邮箱', trigger: 'blur' }]
      }, {
        suppliers_id: [{ required: true, message: '请输入供应商id', trigger: 'blur' }],
        code: [{ required: true, message: '请输入系列代码', trigger: 'blur' }],
        name: [{ required: true, message: '请输入系列名称', trigger: 'blur' }]
      }],
      addHead: [[{
        label: '供应商名',
        prop: 'name',
        holder: '请输入供应商名称',
        type: 'text'
      }, {
        label: '供应公司',
        prop: 'company',
        holder: '请输入供应商公司',
        type: 'text'
      }, {
        label: '公司代码',
        prop: 'code',
        holder: '请输入公司代码',
        type: 'text'
      }, {
        label: '省市区',
        prop: 'provinces',
        holder: '请选择所在省市区',
        type: 'cascader'
      },
      /* {
         label: '省',
         prop: 'province',
         holder: '请输入所在省',
         type: 'text'
       },
       {
         label: '市',
         prop: 'city',
         holder: '请输入所在市',
         type: 'text'
       },
       {
         label: '区',
         prop: 'district',
         holder: '请输入所在区',
         type: 'text'
       },*/
      {
        label: '地址',
        prop: 'address',
        holder: '请输入详细地址',
        type: 'text'
      }, {
        label: '邮编',
        prop: 'zipcode',
        holder: '请输入邮编',
        type: 'number'
      }, {
        label: '联系人',
        prop: 'contacts',
        holder: '请输入联系人',
        type: 'text'
      }, {
        label: '电话号码',
        prop: 'phone',
        holder: '请输入电话号码',
        type: 'number'
      }, {
        label: '手机号码',
        prop: 'mobile',
        holder: '请输入手机号码',
        type: 'number'
      }, {
        label: '传真',
        prop: 'fax',
        holder: '请输入传真',
        type: 'text'
      }, {
        label: '邮箱',
        prop: 'email',
        holder: '请输入邮箱',
        type: 'text'
      }, {
        label: '备注',
        prop: 'remark',
        holder: '请输入备注',
        type: 'textarea'
      }, {
        label: '启用扫描',
        prop: 'is_scan',
        holder: '请选择是或否',
        type: 'checkbox'
      }, {
        label: '采购自动计价',
        prop: 'auto_valuation',
        holder: '请选择是或否',
        type: 'checkbox'
      }, {
        label: '状态',
        prop: 'status',
        holder: '请选择',
        type: 'checkbox'
      }], [{
        label: '供应商名',
        prop: 'suppliers_id',
        holder: '请输入供应商名称',
        type: 'select',
        stateVal: 'suppliers'
      }, {
        label: '系列代码',
        prop: 'code',
        holder: '请输入系列代码',
        type: 'text'
      }, {
        label: '系列名称',
        prop: 'name',
        holder: '请输入系列名称',
        type: 'text'
      }, {
        label: '系列描述',
        prop: 'description',
        holder: '请输入系列描述',
        type: 'textarea'
      }, {
        label: '备注',
        prop: 'remark',
        holder: '请输入备注',
        type: 'textarea'
      }, {
        label: '状态',
        prop: 'status',
        holder: '请选择',
        type: 'checkbox'
      }]],
      halfForm: [true, false],
      options: __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["regionDataPlus"],
      /*修改*/
      updateTitle: ['修改供应商', '修改产品系列'],
      updateMask: false,
      updateVal: [{}, {}],
      currentId: '',
      delBatchUrl: '',
      delId: '',
      showDel: false
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
    test: function test() {},

    /*获取数据*/
    fetchData: function fetchData() {
      var _this = this;

      var index = this.activeName - 0;
      switch (index) {
        case 0:
          this.$fetch(this.urls.suppliers).then(function (res) {
            _this.loading = false;
            _this.supplierVal = res.data;
            var pg = res.meta.pagination;
            _this.$store.dispatch('currentPage', pg.current_page);
            _this.$store.commit('PER_PAGE', pg.per_page);
            _this.$store.commit('PAGE_TOTAL', pg.total);
            _this.delBatchUrl = _this.urls.suppliers;
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
          break;
        case 1:
          this.$fetch(this.urls.series, { include: 'suppliers' }).then(function (res) {
            _this.loading = false;
            _this.seriesVal = res.data;
            var pg = res.meta.pagination;
            _this.$store.dispatch('currentPage', pg.current_page);
            _this.$store.commit('PER_PAGE', pg.per_page);
            _this.$store.commit('PAGE_TOTAL', pg.total);
            _this.$store.dispatch('suppliers', '/suppliers');
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
          break;
      }
    },
    handleTabsClick: function handleTabsClick() {
      this.loading = true;
      this.fetchData();
      Object.assign(this.addVal[this.activeName], this.$options.data().addVal[this.activeName]);
      this.delBatchUrl = this.activeName == '0' ? this.urls.suppliers : this.urls.series;
    },
    supplierRClick: function supplierRClick(row) {
      this.supplierRow = row;
    },
    seriesRClick: function seriesRClick(row) {
      this.seriesRow = row;
    },

    /*新增*/
    addInfo: function addInfo() {
      this.addMask = [false, false];
      this.addMask[this.activeName] = true;
      Object.assign(this.addVal[this.activeName], this.$options.data().addVal[this.activeName]);
    },
    addConfirm: function addConfirm() {
      var _this2 = this;

      if (this.addMask[0] == true) {
        var data = this.addVal[0];
        data.province = __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["CodeToText"][data.provinces[0]];
        data.city = __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["CodeToText"][data.provinces[1]];
        data.district = __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["CodeToText"][data.provinces[2]];
        this.$post(this.urls.suppliers, data).then(function () {
          _this2.addMask = [false, false];
          // this.addMask[this.activeName] = false;
          _this2.$message({
            message: '添加成功',
            type: 'success'
          });
          _this2.refresh();
        }, function (err) {
          Object.assign(_this2.addVal[_this2.activeName], _this2.$options.data().addVal[_this2.activeName]);
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
        var _data = this.addVal[1];
        this.$post(this.urls.series, _data).then(function () {
          _this2.addMask = [false, false];
          _this2.$message({
            message: '添加成功',
            type: 'success'
          });
          _this2.refresh();
        }, function (err) {
          Object.assign(_this2.addVal[_this2.activeName], _this2.$options.data().addVal[_this2.activeName]);
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
      }
    },
    addReset: function addReset() {
      Object.assign(this.addVal[this.activeName], this.$options.data().addVal[this.activeName]);
    },

    /*修改*/
    updateInfo: function updateInfo() {
      var _this3 = this;

      this.updateMask = true;
      var id = void 0;
      if (this.activeName == '0') {
        id = this.currentId ? this.currentId : this.supplierRow.id;
        this.$fetch(this.urls.suppliers + '/' + id).then(function (res) {
          _this3.updateVal = [{
            name: res.name,
            company: res.company,
            code: res.code,
            provinces: [__WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["TextToCode"][res.province].code, __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["TextToCode"][res.province][res.city].code, __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["TextToCode"][res.province][res.city][res.district].code],
            province: res.province,
            city: res.city,
            district: res.district,
            address: res.address,
            phone: res.phone,
            mobile: res.mobile,
            fax: res.fax,
            zipcode: res.zipcode,
            contacts: res.contacts,
            email: res.email,
            remark: res.remark,
            is_scan: res.is_scan,
            auto_valuation: res.auto_valuation,
            status: res.status
          }, {}];
        }, function (err) {});
      } else {
        id = this.currentId ? this.currentId : this.seriesRow.id;
        this.$fetch(this.urls.series + '/' + id, { include: 'suppliers' }).then(function (res) {
          _this3.updateVal = [{}, {
            suppliers_id: res.suppliers_id,
            code: res.code,
            name: res.name,
            description: res.description,
            remark: res.remark,
            status: res.status
          }];
        }, function (err) {});
      }
    },
    updateConfirm: function updateConfirm() {
      var _this4 = this;

      var id = void 0;
      id = this.currentId ? this.currentId : this.supplierRow.id;
      if (this.activeName == '0') {
        var data = this.updateVal[this.activeName];
        data.province = __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["CodeToText"][data.provinces[0]];
        data.city = __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["CodeToText"][data.provinces[1]];
        data.district = __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["CodeToText"][data.provinces[2]];
        this.$patch(this.urls.suppliers + '/' + id, this.updateVal[0]).then(function () {
          _this4.updateMask = false;
          _this4.refresh();
          _this4.$message({
            message: '修改成功',
            type: 'success'
          });
        }, function (err) {
          if (err.response) {
            var arr = err.response.data.errors;
            var arr1 = [];
            for (var i in arr) {
              arr1.push(arr[i]);
            }
            var str = arr1.join(',');
            _this4.$message.error(str);
          }
        });
      } else {
        var _id = void 0;
        _id = this.currentId ? this.currentId : this.seriesRow.id;
        this.$patch(this.urls.series + '/' + _id, this.updateVal[1]).then(function () {
          _this4.updateMask = false;
          _this4.refresh();
          _this4.$message({
            message: '修改成功',
            type: 'success'
          });
        }, function (err) {
          if (err.response) {
            var arr = err.response.data.errors;
            var arr1 = [];
            for (var i in arr) {
              arr1.push(arr[i]);
            }
            var str = arr1.join(',');
            _this4.$message.error(str);
          }
        });
      }
    },
    updateCancel: function updateCancel() {
      this.updateMask = false;
      this.$message({
        message: '取消修改',
        type: 'info'
      });
    },

    /*分页*/
    handlePagChg: function handlePagChg(page) {
      var _this5 = this;

      if (this.activeName == '0') {
        this.$fetch(this.urls.suppliers + '?page=' + page).then(function (res) {
          _this5.supplierVal = res.data;
        });
      } else {
        this.$fetch(this.urls.series + '?page=' + page, { include: 'suppliers' }).then(function (res) {
          _this5.seriesVal = res.data;
        });
      }
    },

    /*删除*/
    delSingle: function delSingle(row, e) {
      this.showDel = true;
      $('.el-popper').css({ left: e.x - 100 + 'px', top: e.y - 125 + 'px' });
      this.delId = row.id;
      this.delUrl = row.suppliers ? this.urls.series : this.urls.suppliers;
    },
    cancelD: function cancelD() {
      this.showDel = false;
      this.$message({
        message: '取消删除',
        type: 'info'
      });
    },
    confirmD: function confirmD(url, id) {
      var _this6 = this;

      this.$del(url + '/' + id).then(function () {
        _this6.$message({
          message: '删除成功',
          type: 'success'
        });
        _this6.showDel = false;
        _this6.refresh();
      }, function (err) {
        if (err.response) {
          _this6.showDel = false;
          var arr = err.response.data.errors;
          var arr1 = [];
          for (var i in arr) {
            arr1.push(arr[i]);
          }
          var str = arr1.join(',');
          _this6.$message.error(str);
        }
      });
    },

    /*批量删除*/
    handleSelectionChange: function handleSelectionChange(val) {
      /*拿到id集合*/
      var delArr = [];
      val.forEach(function (selectedItem) {
        delArr.push(selectedItem.id);
      });
      this.ids = delArr.join(',');
      /*拿到当前id*/
      this.currentId = val.length > 0 ? val[val.length - 1].id : '';
    },
    delBatch: function delBatch() {
      var _this7 = this;

      if (this.ids.length === 0) {
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
          _this7.$del(_this7.delBatchUrl, { ids: _this7.ids }).then(function () {
            _this7.$message({
              message: '删除成功',
              type: 'success'
            });
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
        }).catch(function () {
          _this7.$message({
            type: 'info',
            message: '已取消删除'
          });
        });
      }
    },

    /*刷新*/
    refresh: function refresh() {
      this.loading = true;
      this.fetchData();
      this.platRIndex = '';
    }
  },
  mounted: function mounted() {
    this.fetchData();
    this.$store.dispatch('setOpt', this.newOpt);
    var that = this;
    $(window).resize(function () {
      that.$store.dispatch('setOpt', that.newOpt);
    });
  }
});

/***/ }),

/***/ 588:
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
          _c(
            "el-tab-pane",
            { attrs: { label: "供应商信息", name: "0" } },
            [
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
                  attrs: { data: _vm.supplierVal, fit: "", height: "400" },
                  on: {
                    "selection-change": _vm.handleSelectionChange,
                    "row-click": _vm.supplierRClick
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
                  _vm._l(_vm.tableHead[0], function(item) {
                    return _c("el-table-column", {
                      key: item.prop,
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
                              item.type == "checkbox"
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
                                : _c("span", [
                                    _vm._v(
                                      "\n                        " +
                                        _vm._s(
                                          item.inProp
                                            ? scope.row[item.prop][item.inProp]
                                            : scope.row[item.prop]
                                        ) +
                                        "\n                    "
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
                    attrs: { label: "操作", width: "90", align: "center" },
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
                                    _vm.delSingle(scope.row, $event)
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
          ),
          _vm._v(" "),
          _c(
            "el-tab-pane",
            { attrs: { label: "产品系列", name: "1" } },
            [
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
                  attrs: { data: _vm.seriesVal, fit: "", height: "400" },
                  on: {
                    "selection-change": _vm.handleSelectionChange,
                    "row-click": _vm.seriesRClick
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
                  _vm._l(_vm.tableHead[1], function(item) {
                    return _c("el-table-column", {
                      key: item.prop,
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
                              item.type == "checkbox"
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
                                : _c("span", [
                                    _vm._v(
                                      "\n                        " +
                                        _vm._s(
                                          item.inProp
                                            ? scope.row[item.prop][item.inProp]
                                            : scope.row[item.prop]
                                        ) +
                                        "\n                    "
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
                    attrs: { label: "操作", align: "center" },
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
                                    _vm.delSingle(scope.row, $event)
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
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "el-dialog",
        {
          attrs: {
            title: _vm.title[_vm.activeName],
            visible: _vm.addMask[_vm.activeName]
          },
          on: {
            "update:visible": function($event) {
              _vm.$set(_vm.addMask, _vm.activeName, $event)
            }
          }
        },
        [
          _c(
            "el-form",
            {
              class: { "half-form": _vm.halfForm[_vm.activeName] },
              attrs: {
                model: _vm.addVal[_vm.activeName],
                rules: _vm.addRules[_vm.activeName],
                "label-width": "100px"
              }
            },
            _vm._l(_vm.addHead[_vm.activeName], function(item, index) {
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
                              placeholder:
                                _vm.addVal[_vm.activeName][item.holder]
                            },
                            model: {
                              value: _vm.addVal[_vm.activeName][item.prop],
                              callback: function($$v) {
                                _vm.$set(
                                  _vm.addVal[_vm.activeName],
                                  item.prop,
                                  typeof $$v === "string" ? $$v.trim() : $$v
                                )
                              },
                              expression: "addVal[activeName][item.prop]"
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
                                  placeholder:
                                    _vm.addVal[_vm.activeName][item.holder]
                                },
                                model: {
                                  value: _vm.addVal[_vm.activeName][item.prop],
                                  callback: function($$v) {
                                    _vm.$set(
                                      _vm.addVal[_vm.activeName],
                                      item.prop,
                                      $$v
                                    )
                                  },
                                  expression: "addVal[activeName][item.prop]"
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
                                  placehoder:
                                    _vm.addVal[_vm.activeName][item.holder]
                                },
                                model: {
                                  value: _vm.addVal[_vm.activeName][item.prop],
                                  callback: function($$v) {
                                    _vm.$set(
                                      _vm.addVal[_vm.activeName],
                                      item.prop,
                                      typeof $$v === "string" ? $$v.trim() : $$v
                                    )
                                  },
                                  expression: "addVal[activeName][item.prop]"
                                }
                              })
                            ],
                            1
                          )
                        : item.type == "cascader"
                          ? _c(
                              "span",
                              [
                                _c("el-cascader", {
                                  attrs: {
                                    size: "middle",
                                    options: _vm.options
                                  },
                                  model: {
                                    value:
                                      _vm.addVal[_vm.activeName][item.prop],
                                    callback: function($$v) {
                                      _vm.$set(
                                        _vm.addVal[_vm.activeName],
                                        item.prop,
                                        $$v
                                      )
                                    },
                                    expression: "addVal[activeName][item.prop]"
                                  }
                                })
                              ],
                              1
                            )
                          : item.type == "password"
                            ? _c(
                                "span",
                                [
                                  _c("el-input", {
                                    attrs: {
                                      type: "password",
                                      placehold:
                                        _vm.addVal[_vm.activeName][item.holder]
                                    },
                                    model: {
                                      value:
                                        _vm.addVal[_vm.activeName][item.prop],
                                      callback: function($$v) {
                                        _vm.$set(
                                          _vm.addVal[_vm.activeName],
                                          item.prop,
                                          $$v
                                        )
                                      },
                                      expression:
                                        "addVal[activeName][item.prop]"
                                    }
                                  })
                                ],
                                1
                              )
                            : item.type == "number"
                              ? _c(
                                  "span",
                                  [
                                    _c("el-input", {
                                      attrs: {
                                        type: "number",
                                        placehold:
                                          _vm.addVal[_vm.activeName][
                                            item.holder
                                          ]
                                      },
                                      model: {
                                        value:
                                          _vm.addVal[_vm.activeName][item.prop],
                                        callback: function($$v) {
                                          _vm.$set(
                                            _vm.addVal[_vm.activeName],
                                            item.prop,
                                            $$v
                                          )
                                        },
                                        expression:
                                          "addVal[activeName][item.prop]"
                                      }
                                    })
                                  ],
                                  1
                                )
                              : item.type == "checkbox"
                                ? _c(
                                    "span",
                                    [
                                      _c("el-checkbox", {
                                        model: {
                                          value:
                                            _vm.addVal[_vm.activeName][
                                              item.prop
                                            ],
                                          callback: function($$v) {
                                            _vm.$set(
                                              _vm.addVal[_vm.activeName],
                                              item.prop,
                                              $$v
                                            )
                                          },
                                          expression:
                                            "addVal[activeName][item.prop]"
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
                { attrs: { type: "primary" }, on: { click: _vm.addConfirm } },
                [_vm._v("添加")]
              ),
              _vm._v(" "),
              _c("el-button", { on: { click: _vm.addReset } }, [_vm._v("重置")])
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
          attrs: {
            title: _vm.updateTitle[_vm.activeName],
            visible: _vm.updateMask
          },
          on: {
            "update:visible": function($event) {
              _vm.updateMask = $event
            }
          }
        },
        [
          _c(
            "el-form",
            {
              class: { "half-form": _vm.halfForm[_vm.activeName] },
              attrs: {
                model: _vm.updateVal[_vm.activeName],
                rules: _vm.addRules[_vm.activeName],
                "label-width": "100px"
              }
            },
            _vm._l(_vm.addHead[_vm.activeName], function(item, index) {
              return _c(
                "el-form-item",
                { key: index, attrs: { label: item.label, prop: item.prop } },
                [
                  item.type == "text"
                    ? _c(
                        "span",
                        [
                          _c("el-input", {
                            model: {
                              value: _vm.updateVal[_vm.activeName][item.prop],
                              callback: function($$v) {
                                _vm.$set(
                                  _vm.updateVal[_vm.activeName],
                                  item.prop,
                                  typeof $$v === "string" ? $$v.trim() : $$v
                                )
                              },
                              expression: "updateVal[activeName][item.prop]"
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
                                  value:
                                    _vm.updateVal[_vm.activeName][item.prop],
                                  callback: function($$v) {
                                    _vm.$set(
                                      _vm.updateVal[_vm.activeName],
                                      item.prop,
                                      $$v
                                    )
                                  },
                                  expression: "updateVal[activeName][item.prop]"
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
                                  value:
                                    _vm.updateVal[_vm.activeName][item.prop],
                                  callback: function($$v) {
                                    _vm.$set(
                                      _vm.updateVal[_vm.activeName],
                                      item.prop,
                                      typeof $$v === "string" ? $$v.trim() : $$v
                                    )
                                  },
                                  expression: "updateVal[activeName][item.prop]"
                                }
                              })
                            ],
                            1
                          )
                        : item.type == "cascader"
                          ? _c(
                              "span",
                              [
                                _c("el-cascader", {
                                  attrs: {
                                    size: "middle",
                                    options: _vm.options
                                  },
                                  model: {
                                    value:
                                      _vm.updateVal[_vm.activeName][item.prop],
                                    callback: function($$v) {
                                      _vm.$set(
                                        _vm.updateVal[_vm.activeName],
                                        item.prop,
                                        $$v
                                      )
                                    },
                                    expression:
                                      "updateVal[activeName][item.prop]"
                                  }
                                })
                              ],
                              1
                            )
                          : item.type == "number"
                            ? _c(
                                "span",
                                [
                                  _c("el-input", {
                                    attrs: { type: "number" },
                                    model: {
                                      value:
                                        _vm.updateVal[_vm.activeName][
                                          item.prop
                                        ],
                                      callback: function($$v) {
                                        _vm.$set(
                                          _vm.updateVal[_vm.activeName],
                                          item.prop,
                                          $$v
                                        )
                                      },
                                      expression:
                                        "updateVal[activeName][item.prop]"
                                    }
                                  })
                                ],
                                1
                              )
                            : item.type == "checkbox"
                              ? _c(
                                  "span",
                                  [
                                    _c("el-checkbox", {
                                      model: {
                                        value:
                                          _vm.updateVal[_vm.activeName][
                                            item.prop
                                          ],
                                        callback: function($$v) {
                                          _vm.$set(
                                            _vm.updateVal[_vm.activeName],
                                            item.prop,
                                            $$v
                                          )
                                        },
                                        expression:
                                          "updateVal[activeName][item.prop]"
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
                  on: { click: _vm.updateConfirm }
                },
                [_vm._v("确认")]
              ),
              _vm._v(" "),
              _c("el-button", { on: { click: _vm.updateCancel } }, [
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
                      _vm.confirmD(_vm.delUrl, _vm.delId)
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
      _c("Pagination", {
        attrs: { "page-url": _vm.delBatchUrl },
        on: { handlePagChg: _vm.handlePagChg }
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-82f1fe6a", module.exports)
  }
}

/***/ })

});
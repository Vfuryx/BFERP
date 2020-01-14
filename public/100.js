webpackJsonp([100],{

/***/ 660:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(661)
/* template */
var __vue_template__ = __webpack_require__(662)
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
Component.options.__file = "resources\\assets\\js\\views\\basicInf\\orderManageSubData.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-b870bffa", Component.options)
  } else {
    hotAPI.reload("data-v-b870bffa", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 661:
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
        cnt: '刷新',
        icon: 'bf-refresh',
        ent: this.refresh
      }],
      tabHead: [[{
        label: '提货方式',
        prop: "name",
        holder: '请输入提货方式',
        type: 'text'
      }, {
        label: '状态',
        prop: "status",
        type: 'checkbox'
      }], [{
        label: '付款方式',
        prop: "name",
        holder: '请输入付款方式',
        type: 'text'
      }, {
        label: '状态',
        prop: "status",
        type: 'checkbox'
      }], [{
        label: '客户类型',
        prop: "name",
        holder: '请输入客户类型',
        type: 'text'
      }, {
        label: '状态',
        prop: "status",
        type: 'checkbox'
      }]],
      // url:['/distmets','/stockintypes'],
      title: ['新增提货方式', '新增付款方式', '新增客户类型'],
      ruleForm: [{
        name: '',
        status: true
      }, {
        name: '',
        status: true
      }, {
        name: '',
        status: true
      }],
      rules: [{
        name: [{ required: true, message: '请输入提货方式', trigger: 'blur' }]
      }, {
        name: [{ required: true, message: '请输入付款方式', trigger: 'blur' }]
      }, {
        name: [{ required: true, message: '请输入客户类型', trigger: 'blur' }]
      }],
      addArr: [[{
        label: '提货方式',
        prop: 'name',
        holder: '请输入提货方式',
        type: 'text'
      }, {
        label: '状态',
        prop: 'status',
        type: 'checkbox'
      }], [{
        label: '付款方式',
        prop: 'name',
        holder: '请输入付款方式',
        type: 'text'
      }, {
        label: '状态',
        prop: 'status',
        type: 'checkbox'
      }], [{
        label: '客户类型',
        prop: 'name',
        holder: '请输入客户类型',
        type: 'text'
      }, {
        label: '状态',
        prop: 'status',
        type: 'checkbox'
      }]],
      activeName: '0',
      getsData: [],
      loading: true,
      currentIndex: '',
      /*新增*/
      showMask: false,
      showDel: false,
      editId: '',
      inputChange: false,
      delArr: [],
      multipleSelection: [],
      // refArr:['distri','stock'],
      takeDelGoodsData: [],
      payMethodsData: [],
      customerTypesData: []

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
    /*获取数据*/
    tabsClick: function tabsClick() {
      this.loading = true;
      this.fetchStockData();
    },
    fetchStockData: function fetchStockData() {
      var _this = this;

      var index = this.activeName - 0;
      switch (index) {
        case 0:
          this.$fetch(this.urls.takedeliverygoodsways).then(function (res) {
            _this.stockDtlData = [];
            _this.loading = false;
            _this.takeDelGoodsData = res.data;
            var pg = res.meta.pagination;
            _this.$store.dispatch('currentPage', pg.current_page);
            _this.$store.commit('PER_PAGE', pg.per_page);
            _this.$store.commit('PAGE_TOTAL', pg.total);
          }, function (err) {
            if (err.response) {
              var arr = err.response.data.errors;
              var arr1 = [];
              for (var i in arr) {
                arr1.push(arr[i]);
              }
              _this.$message.error(arr1.join(','));
            }
          });
          break;
        case 1:
          this.$fetch(this.urls.paymentmethods).then(function (res) {
            _this.loading = false;
            _this.payMethodsData = res.data;
            var pg = res.meta.pagination;
            _this.$store.dispatch('currentPage', pg.current_page);
            _this.$store.commit('PER_PAGE', pg.per_page);
            _this.$store.commit('PAGE_TOTAL', pg.total);
          }, function (err) {
            if (err.response) {
              var arr = err.response.data.errors;
              var arr1 = [];
              for (var i in arr) {
                arr1.push(arr[i]);
              }
              _this.$message.error(arr1.join(','));
            }
          });
          break;
        case 2:
          this.$fetch(this.urls.customertypes).then(function (res) {
            _this.loading = false;
            _this.customerTypesData = res.data;
            var pg = res.meta.pagination;
            _this.$store.dispatch('currentPage', pg.current_page);
            _this.$store.commit('PER_PAGE', pg.per_page);
            _this.$store.commit('PAGE_TOTAL', pg.total);
          }, function (err) {
            if (err.response) {
              var arr = err.response.data.errors;
              var arr1 = [];
              for (var i in arr) {
                arr1.push(arr[i]);
              }
              _this.$message.error(arr1.join(','));
            }
          });
          break;
      }
    },

    /*新增*/
    addNew: function addNew() {
      this.showMask = true;
    },
    CB_dialog: function CB_dialog(val) {
      this.showMask = val;
    },
    submitForm: function submitForm() {
      var _this2 = this;

      this.$post(this.url[this.activeName], this.ruleForm[this.activeName]).then(function () {
        _this2.$message({
          message: '添加成功',
          type: 'success'
        });
        _this2.showMask = false;
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
    },

    /*修改*/
    edit: function edit(index) {
      this.currentIndex = 'index' + index;
    },
    handleEdit: function handleEdit() {
      this.inputChange = true;
    },
    editCancel: function editCancel() {
      this.$message({
        message: '取消修改',
        type: 'info'
      });
      this.currentIndex = '';
    },
    editSave: function editSave(row) {
      /* this.$patch(this.url[this.activeName] + '/' + row.id, row)
         .then(() => {
           this.$message({
             message: '修改成功',
             type: 'success'
           });
           this.currentIndex = '';
           this.inputChange = false;
           this.refresh();
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
             })
           }
         })*/
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
      /*  this.$del(this.url[this.activeName] + '/' + id)
          .then(() => {
            this.$message({
              message: '删除成功',
              type: 'success'
            });
            this.showDel = false;
            this.refresh();
          }, err => {
            if (err.response) {
              this.showDel = false;
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
    },

    /*批量删除*/
    delMore: function delMore() {
      var _this3 = this;

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
          /* this.$del(this.url[this.activeName], {ids: this.delArr})
             .then(() => {
               this.$message({
                 message: '删除成功',
                 type: 'success'
               });
               this.refresh();
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
        }).catch(function () {
          _this3.$message({
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
      this.loading = true;
      this.fetchStockData();
    },

    /*分页*/
    handlePagChg: function handlePagChg(page) {
      var _this4 = this;

      this.$fetch(this.urls.logistics + '?page=' + page, { include: 'cityInfos.logistics,printReport,freightType' }).then(function (res) {
        _this4.logisticsData = res.data;
      });
    }
  },
  mounted: function mounted() {
    this.fetchStockData();
    this.$store.dispatch('setOpt', this.newOpt);
    var that = this;
    $(window).resize(function () {
      that.$store.dispatch('setOpt', that.newOpt);
    });
  }
});

/***/ }),

/***/ 662:
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
          on: { "tab-click": _vm.tabsClick },
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
            { attrs: { label: "提货方式管理", name: "0" } },
            [
              _c("light-table", {
                attrs: {
                  listData: _vm.takeDelGoodsData,
                  tableHead: _vm.tabHead[_vm.activeName],
                  loading: _vm.loading,
                  currentIndex: _vm.currentIndex
                },
                on: {
                  editSave: _vm.editSave,
                  handleEdit: _vm.handleEdit,
                  del: _vm.del,
                  edit: _vm.edit,
                  editCancel: _vm.editCancel,
                  handleSelect: _vm.handleSelectionChange
                }
              })
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "el-tab-pane",
            { attrs: { label: "付款方式管理", name: "1" } },
            [
              _c("light-table", {
                attrs: {
                  listData: _vm.payMethodsData,
                  tableHead: _vm.tabHead[_vm.activeName],
                  loading: _vm.loading,
                  currentIndex: _vm.currentIndex
                },
                on: {
                  editSave: _vm.editSave,
                  handleEdit: _vm.handleEdit,
                  del: _vm.del,
                  edit: _vm.edit,
                  editCancel: _vm.editCancel,
                  handleSelect: _vm.handleSelectionChange
                }
              })
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "el-tab-pane",
            { attrs: { label: "客户类型管理", name: "2" } },
            [
              _c("light-table", {
                attrs: {
                  listData: _vm.customerTypesData,
                  tableHead: _vm.tabHead[_vm.activeName],
                  loading: _vm.loading,
                  currentIndex: _vm.currentIndex
                },
                on: {
                  editSave: _vm.editSave,
                  handleEdit: _vm.handleEdit,
                  del: _vm.del,
                  edit: _vm.edit,
                  editCancel: _vm.editCancel,
                  handleSelect: _vm.handleSelectionChange
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
      _c("Pagination", {
        attrs: {
          "page-url":
            _vm.activeName == "0"
              ? _vm.urls.takedeliverygoodsways
              : _vm.activeName == "1"
                ? _vm.urls.paymentmethods
                : _vm.urls.customertypes
        },
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-b870bffa", module.exports)
  }
}

/***/ })

});
webpackJsonp([232],{

/***/ 517:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(745)
/* template */
var __vue_template__ = __webpack_require__(746)
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
Component.options.__file = "resources\\assets\\js\\views\\basicInf\\distributeMthMag.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-adecdc02", Component.options)
  } else {
    hotAPI.reload("data-v-adecdc02", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 745:
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
      disHead: [{
        label: '配送方式',
        prop: "name",
        holder: '配送方式',
        type: 'text'
      }, {
        label: '状态',
        prop: "status",
        holder: '状态',
        // type: 'select_stu',
        type: 'checkbox',
        doSort: true,
        chgAble: true,
        editChgAble: false
      }],
      stockHead: [{
        label: '入库方式方式',
        prop: "name",
        holder: '配送方式',
        type: 'text'
      }, {
        label: '状态',
        prop: "status",
        holder: '状态',
        // type: 'select_stu',
        type: 'checkbox',
        doSort: true,
        chgAble: true,
        editChgAble: false
      }],
      url: ['/distmets', '/stockintypes'],
      title: ['新增配送方式', '新增入库方式'],
      ruleForm: [{
        name: '',
        status: true
      }, {
        name: '',
        status: true
      }],
      rules: [{
        name: [{ required: true, message: '请输入配送方式', trigger: 'blur' }]
      }, {
        name: [{ required: true, message: '请输入入库方式', trigger: 'blur' }]
      }],
      addArr: [[{
        label: '配送方式',
        prop: 'name',
        holder: '请输入配送方式',
        type: 'text'
      }, {
        label: '状态',
        prop: 'status',
        holder: '请选择状态',
        // type: 'select_stu'
        type: 'checkbox'
      }], [{
        label: '入库方式',
        prop: 'name',
        holder: '请输入入库方式',
        type: 'text'
      }, {
        label: '状态',
        prop: 'status',
        holder: '请选择状态',
        // type: 'select_stu'
        type: 'checkbox'
      }]],
      activeName: '0',
      getsData: [],
      loading: [true, true],
      currentIndex: '',
      /*新增*/
      showMask: false,
      showDel: false,
      editId: '',
      inputChange: false,
      delArr: [],
      multipleSelection: [],
      refArr: ['distri', 'stock']
    };
  },

  methods: {
    //新增
    addNew: function addNew() {
      this.showMask = true;
    },
    CB_dialog: function CB_dialog(val) {
      this.showMask = val;
    },
    submitForm: function submitForm() {
      var _this = this;

      this.$post(this.url[this.activeName], this.ruleForm[this.activeName]).then(function () {
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
    tabsClick: function tabsClick() {
      this.loading = [true, true];
      this.getData(this.url[this.activeName]);
    },
    getData: function getData(url) {
      var _this2 = this;

      this.$fetch(url).then(function (res) {
        _this2.loading[_this2.activeName] = false;
        _this2.getsData = res.data;
        var pg = res.meta.pagination;
        _this2.$store.dispatch('currentPage', pg.current_page);
        _this2.$store.commit('PER_PAGE', pg.per_page);
        _this2.$store.commit('PAGE_TOTAL', pg.total);
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
      var _this3 = this;

      this.$patch(this.url[this.activeName] + '/' + row.id, row).then(function () {
        _this3.$message({
          message: '修改成功',
          type: 'success'
        });
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
      var _this4 = this;

      this.$del(this.url[this.activeName] + '/' + id).then(function () {
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
          _this5.$del(_this5.url[_this5.activeName], { ids: _this5.delArr }).then(function () {
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
      this.loading = [true, true];
      this.getData(this.url[this.activeName]);
    }
  },
  mounted: function mounted() {
    this.getData(this.url[this.activeName]);
    this.$store.dispatch('setOpt', this.newOpt);
    var that = this;
    $(window).resize(function () {
      that.$store.dispatch('setOpt', that.newOpt);
    });
  }
});

/***/ }),

/***/ 746:
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
            { attrs: { label: "配送方式管理", name: "0" } },
            [
              _c("light-table", {
                attrs: {
                  listData: _vm.getsData,
                  tableHead: _vm.disHead,
                  loading: _vm.loading[_vm.activeName],
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
            { attrs: { label: "入库方式管理", name: "1" } },
            [
              _c("light-table", {
                attrs: {
                  listData: _vm.getsData,
                  tableHead: _vm.stockHead,
                  loading: _vm.loading[_vm.activeName],
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
      _c("add-new", {
        attrs: {
          "visible-add": _vm.showMask,
          title: _vm.title[_vm.activeName],
          "rule-form": _vm.ruleForm[_vm.activeName],
          rules: _vm.rules[_vm.activeName],
          "add-arr": _vm.addArr[_vm.activeName],
          url: _vm.url[_vm.activeName],
          "new-ref": _vm.refArr[_vm.activeName]
        },
        on: { submitEvent: _vm.submitForm, "CB-dialog": _vm.CB_dialog }
      }),
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
      _c("Pagination", { attrs: { "page-url": _vm.url[_vm.activeName] } })
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-adecdc02", module.exports)
  }
}

/***/ })

});
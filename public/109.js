webpackJsonp([109],{

/***/ 521:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(756)
/* template */
var __vue_template__ = __webpack_require__(757)
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
Component.options.__file = "resources\\assets\\js\\views\\basicInf\\freightType.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-298d19fe", Component.options)
  } else {
    hotAPI.reload("data-v-298d19fe", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 756:
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
      getsInfo: [],
      tableHead: [{
        label: '名称',
        width: '250',
        prop: "name",
        holder: '输入名称',
        type: 'text'
      }, {
        label: '默认',
        width: '250',
        prop: "is_default",
        holder: '默认值',
        type: 'select_def'
      }, {
        label: '状态',
        width: '250',
        prop: "status",
        holder: '状态',
        type: 'select_stu',
        doSort: true
      }],
      loading: true,
      currentIndex: '',
      url: '/freighttypes',
      showMaskArr: false,
      title: '新增运费类型',
      ruleForm: {
        name: '',
        is_default: '0',
        status: '1'
      },
      rules: {
        name: [{ required: true, message: '请输入运费类型', trigger: 'blur' }]
      },
      addArr: [{
        label: '运费类型',
        prop: 'name',
        holder: '请输入运费类型',
        type: 'text'
      }, {
        label: '是否默认',
        prop: 'is_default',
        holder: '请选择是或否',
        type: 'select_def'
      }, {
        label: '状态',
        prop: 'status',
        holder: '请选择状态',
        type: 'select_stu'
      }],
      refArr: 'ruleForm',
      showDel: false,
      delId: '',
      inputChange: false,
      multipleSelection: [],
      delArr: [],
      pagination: {
        current_page: 1,
        per_page: 0,
        page_total: 0
      }
    };
  },

  methods: {
    test: function test() {},
    addNew: function addNew() {
      this.ruleForm.name = '';
      this.showMaskArr = true;
    },
    CB_dialog: function CB_dialog(val) {
      this.showMaskArr = val;
    },
    submitForm: function submitForm() {
      var _this = this;

      this.$post(this.url, this.ruleForm).then(function () {
        _this.$message({
          message: '添加成功',
          type: 'success'
        });
        _this.showMaskArr = false;
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
      this.multipleSelection = val;
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
          _this2.$del(_this2.url, { ids: _this2.delArr }).then(function () {
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

      var obj = {
        id: row.id,
        name: row.name,
        is_default: row.is_default,
        status: row.status
      };
      if (this.inputChange) {
        this.$patch(this.url + '/' + row.id, obj).then(function () {
          _this3.$message({
            message: '修改成功',
            type: 'success'
          });
          _this3.getInfo(_this3.url);
          _this3.currentIndex = '';
          _this3.inputChange = false;
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
    getInfo: function getInfo(url) {
      var _this4 = this;

      this.showPage = true;
      this.$fetch(url).then(function (res) {
        _this4.getsInfo = res.data;
        _this4.$store.dispatch('setFreights', res.data);
        _this4.loading = false;
        var pg = res.meta.pagination;
        _this4.$store.dispatch('currentPage', pg.current_page);
        _this4.$store.commit('PER_PAGE', pg.per_page);
        _this4.$store.commit('PAGE_TOTAL', pg.total);
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
      var _this5 = this;

      this.$del(this.url + '/' + id).then(function () {
        _this5.$message({
          message: '删除成功',
          type: 'success'
        });
        _this5.showDel = false;
        _this5.refresh();
      }, function (err) {
        if (err.response) {
          _this5.showDel = false;
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
    refresh: function refresh() {
      var _this6 = this;

      this.loading = true;
      this.getInfo(this.url);
      setTimeout(function () {
        _this6.loading = false;
      }, 2000);
    }
  },
  mounted: function mounted() {
    this.getInfo(this.url);
    this.$store.dispatch('setOpt', this.newOpt);
    var that = this;
    $(window).resize(function () {
      that.$store.dispatch('setOpt', that.newOpt);
    });
  }
});

/***/ }),

/***/ 757:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("light-table", {
        attrs: {
          listData: _vm.getsInfo,
          tableHead: _vm.tableHead,
          loading: _vm.loading,
          currentIndex: _vm.currentIndex
        },
        on: {
          handleSelect: _vm.handleSelectionChange,
          editSave: _vm.editSave,
          handleEdit: _vm.handleEdit,
          del: _vm.del,
          edit: _vm.edit,
          editCancel: _vm.editCancel
        }
      }),
      _vm._v(" "),
      _c("add-new", {
        attrs: {
          "visible-add": _vm.showMaskArr,
          title: _vm.title,
          "rule-form": _vm.ruleForm,
          rules: _vm.rules,
          "add-arr": _vm.addArr,
          url: _vm.url,
          "new-ref": _vm.refArr
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
      _c("Pagination", { attrs: { "page-url": _vm.url } })
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-298d19fe", module.exports)
  }
}

/***/ })

});
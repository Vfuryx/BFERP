webpackJsonp([20],{

/***/ 460:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(544)
/* template */
var __vue_template__ = __webpack_require__(545)
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
Component.options.__file = "resources\\assets\\js\\views\\basicInf\\purchaseReturnTypes.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-ed5ae468", Component.options)
  } else {
    hotAPI.reload("data-v-ed5ae468", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 544:
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
      tableHead: [{
        label: '采购退货类型',
        prop: "name",
        holder: '请输入采购退货类型',
        type: 'text'
      }, {
        label: '状态',
        prop: "status",
        type: 'checkbox'
      }, {
        label: '创建时间',
        prop: "created_at",
        type: 'text',
        chgAble: true
      }],
      loading: true,
      currentIndex: '',
      showMaskArr: false,
      title: '新建采购退货类型',
      getsInfo: [],
      ruleForm: {
        name: '',
        status: true
      },
      rules: {
        name: [{ required: true, message: '请输入采购退货类型名称', trigger: 'blur' }]
      },
      addArr: [{
        label: '采购退货类型',
        prop: 'name',
        holder: '请输入采购退货类型名称',
        type: 'text'
      }, {
        label: '状态',
        prop: 'status',
        type: 'checkbox'
      }],
      refArr: 'ruleWare',
      showDel: false,
      delId: '',
      inputChange: false,
      multipleSelection: [],
      delArr: [],
      pagination: {
        current_page: 1,
        per_page: 0,
        page_total: 0
      },
      areaArr: [],
      doChange: true
    };
  },

  computed: {
    urls: {
      get: function get() {
        return this.$store.state.urls;
      },
      set: function set() {}
    }
  },
  methods: {
    addNew: function addNew() {
      this.ruleForm.name = '';
      this.showMaskArr = true;
    },
    CB_dialog: function CB_dialog(val) {
      this.showMaskArr = val;
    },
    submitForm: function submitForm() {
      var _this = this;

      var obj = {
        name: this.ruleForm.name,
        status: this.ruleForm.status
      };
      this.$post(this.urls.purchasereturntypes, obj).then(function () {
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
          _this2.$del(_this2.urls.purchasereturntypes, { ids: _this2.delArr }).then(function () {
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
        name: row.name,
        status: row.status
      };
      if (this.inputChange) {
        this.$patch(this.urls.purchasereturntypes + '/' + row.id, obj).then(function () {
          _this3.$message({
            message: '修改成功',
            type: 'success'
          });
          _this3.getInfo();
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
    getInfo: function getInfo() {
      var _this4 = this;

      this.showPage = true;
      this.$fetch(this.urls.purchasereturntypes).then(function (res) {
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
          _this4.$message.error(str);
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

      this.$del(this.urls.purchasereturntypes + '/' + id).then(function () {
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
      this.getInfo();
      setTimeout(function () {
        _this6.loading = false;
      }, 2000);
    },
    handleArea: function handleArea(value) {
      this.areaArr = value;
    }
  },
  mounted: function mounted() {
    this.getInfo();
    this.$store.dispatch('setOpt', this.newOpt);
    var that = this;
    $(window).resize(function () {
      that.$store.dispatch('setOpt', that.newOpt);
    });
  }
});

/***/ }),

/***/ 545:
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
          currentIndex: _vm.currentIndex,
          height: 400
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
          url: _vm.urls.purchasereturntypes,
          "new-ref": _vm.refArr
        },
        on: {
          submitEvent: _vm.submitForm,
          "CB-dialog": _vm.CB_dialog,
          handleArea: _vm.handleArea
        }
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
      _c("Pagination", { attrs: { "page-url": _vm.urls.purchasereturntypes } })
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-ed5ae468", module.exports)
  }
}

/***/ })

});
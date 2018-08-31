webpackJsonp([11],{

/***/ 459:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(542)
/* template */
var __vue_template__ = __webpack_require__(543)
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
Component.options.__file = "resources\\assets\\js\\views\\basicInf\\warehouseMag.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-3a269c48", Component.options)
  } else {
    hotAPI.reload("data-v-3a269c48", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 542:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__ = __webpack_require__(66);
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
        label: '仓库名称',
        prop: "name",
        width: '130',
        holder: '请输入标记名称',
        type: 'text'
      }, {
        label: '仓库地(省市区)',
        prop: "provinces",
        width: '220',
        holder: '请输入仓库地(省市区)',
        type: 'cascader'
      }, {
        label: '仓库地址',
        prop: "address",
        width: '180',
        holder: '请输入仓库地址',
        type: 'text'
      }, {
        label: '默认仓库',
        width: '100',
        prop: "is_default",
        type: 'checkbox'
      }, {
        label: '是否可用',
        width: '130',
        prop: "status",
        type: 'checkbox',
        doSort: true
      }],
      loading: true,
      currentIndex: '',
      showMaskArr: false,
      checkboxInit: false,
      title: '新建仓库',
      getsInfo: [],
      ruleForm: {
        name: '',
        provinces: [],
        province: '',
        city: '',
        district: '',
        address: '',
        is_default: false,
        status: true
      },
      rules: {
        name: [{ required: true, message: '请输入仓库名称', trigger: 'blur' }],
        address: [{ required: true, message: '请输入仓库详细地址', trigger: 'blur' }]
      },
      addArr: [{
        label: '仓库名称',
        prop: 'name',
        holder: '请输入仓库名称',
        type: 'text'
      }, {
        label: '地区',
        prop: '',
        holder: '请输入仓库所在省市区',
        type: 'cascader'
      }, {
        label: '地址',
        prop: 'address',
        holder: '请输入详细地址',
        type: 'text'
      }, {
        label: '是否默认',
        prop: 'is_default',
        holder: '请选择是否默认',
        type: 'checkbox'
      }, {
        label: '是否可用',
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
      options: __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["regionDataPlus"]
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
        province: __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["CodeToText"][this.areaArr[0]],
        city: __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["CodeToText"][this.areaArr[1]],
        district: __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["CodeToText"][this.areaArr[2]],
        address: this.ruleForm.address,
        is_default: this.ruleForm.is_default,
        status: this.ruleForm.status
      };
      this.$post(this.urls.warehouses, obj).then(function () {
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
          _this.$message.error(arr1.join(','));
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
          _this2.$del(_this2.urls.warehouses, { ids: _this2.delArr }).then(function () {
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
              _this2.$message.error(arr1.join(','));
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
    edit: function edit(index, row) {
      this.currentIndex = 'index' + index;
      this.$set(row, 'provinces', [__WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["TextToCode"][row.province].code, __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["TextToCode"][row.province][row.city].code, __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["TextToCode"][row.province][row.city][row.district].code]);
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
        address: row.address,
        province: __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["CodeToText"][row.provinces[0]],
        city: __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["CodeToText"][row.provinces[1]],
        district: __WEBPACK_IMPORTED_MODULE_0_element_china_area_data__["CodeToText"][row.provinces[2]],
        is_default: row.is_default,
        status: row.status
      };
      if (this.inputChange) {
        this.$patch(this.urls.warehouses + '/' + row.id, obj).then(function () {
          _this3.refresh();
          _this3.currentIndex = '';
          _this3.inputChange = false;
          _this3.$message({
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

      this.$fetch(this.urls.warehouses).then(function (res) {
        res.data.map(function (item) {
          _this4.$set(item, 'provinces', [item.province] + '' + [item.city] + '' + [item.district]);
        });
        _this4.getsInfo = res.data;
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

      this.$del(this.urls.warehouses + '/' + id).then(function () {
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
          _this5.$message.error(arr1.join(','));
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

/***/ 543:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
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
          ref: "multipleTable",
          attrs: { data: _vm.getsInfo, fit: "", height: "400" },
          on: { "selection-change": _vm.handleSelectionChange }
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
          _vm._l(_vm.tableHead, function(item, index) {
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
                      _vm.currentIndex == "index" + scope.$index
                        ? _c("span", [
                            item.type == "checkbox"
                              ? _c(
                                  "span",
                                  [
                                    _c("el-checkbox", {
                                      on: { change: _vm.handleEdit },
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
                              : item.type == "cascader"
                                ? _c(
                                    "span",
                                    [
                                      _c("el-cascader", {
                                        attrs: {
                                          size: "middle",
                                          options: _vm.options
                                        },
                                        on: { change: _vm.handleEdit },
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
                                : _c(
                                    "span",
                                    [
                                      _c("el-input", {
                                        attrs: {
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
                          ])
                        : _c("span", [
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
                                    "\n                    " +
                                      _vm._s(
                                        item.inProp
                                          ? scope.row[item.prop][item.inProp]
                                          : scope.row[item.prop]
                                      ) +
                                      "\n        "
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
                    _vm.currentIndex == "index" + scope.$index
                      ? _c(
                          "span",
                          [
                            _c(
                              "el-button",
                              {
                                attrs: { size: "mini" },
                                on: {
                                  click: function($event) {
                                    _vm.editSave(scope.row)
                                  }
                                }
                              },
                              [_vm._v("保存")]
                            ),
                            _vm._v(" "),
                            _c(
                              "el-button",
                              {
                                attrs: { size: "mini" },
                                on: { click: _vm.editCancel }
                              },
                              [_vm._v("取消\n                            ")]
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
                                attrs: { size: "mini" },
                                on: {
                                  click: function($event) {
                                    _vm.edit(scope.$index, scope.row)
                                  }
                                }
                              },
                              [_vm._v("编辑")]
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-3a269c48", module.exports)
  }
}

/***/ })

});
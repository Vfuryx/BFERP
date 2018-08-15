webpackJsonp([66],{

/***/ 642:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(650)
/* template */
var __vue_template__ = __webpack_require__(651)
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
Component.options.__file = "resources\\assets\\js\\views\\purchase\\cancelPurchase.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-5737f279", Component.options)
  } else {
    hotAPI.reload("data-v-5737f279", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 650:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
var _methods;

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
        ent: this.test
      }, {
        cnt: '删除',
        icon: 'bf-del',
        ent: this.test
      }, {
        cnt: '提交',
        icon: 'bf-submit',
        ent: this.test
      }, {
        cnt: '导出',
        icon: 'bf-out',
        ent: this.test
      }, {
        cnt: '刷新',
        icon: 'bf-refresh',
        ent: this.test
      }],
      searchBox: {
        goodsName: ''
      },
      activeName: '0',
      tabs: [{
        label: '新建',
        name: '0'
      }, {
        label: '已完成',
        name: '1'
      }],
      loading: [true, true],
      tabsHead: [{
        label: '取消单号',
        prop: '',
        type: 'text'
      }, {
        label: '采购单号',
        prop: '',
        type: 'text'
      },
      /* {
         label: '合同编号',
         width: '150',
         prop: '',
         type: 'text',
       },*/
      {
        label: '类型',
        prop: '',
        type: 'text'
      }, {
        label: '创建人',
        prop: '',
        type: 'text'
      }, {
        label: '提交人',
        prop: '',
        type: 'text'
      }, {
        label: '创建时间',
        prop: '',
        type: 'text'
      }, {
        label: '提交时间',
        prop: '',
        type: 'text'
      }],
      tabsData: [],
      purchase_status: ['新建', 'finish'],
      /*新增*/
      cancelPurMask: false,
      cancelHead: [{
        label: '采购单号',
        prop: '',
        type: 'text'
      }, {
        label: '商品编码',
        prop: '',
        type: 'text'
      }, {
        label: '供应商',
        prop: '',
        type: 'select'
      }, {
        label: '商品简称',
        prop: '',
        type: 'text'
      }, {
        label: '规格编码',
        prop: '',
        type: 'text'
      }, {
        label: '规格名称',
        prop: '',
        type: 'text'
      }, {
        label: '采购数',
        prop: '',
        type: 'text'
      }, {
        label: '已入库数',
        prop: '',
        type: 'text'
      }],
      cancelNum: [],
      /*修改*/
      nEditInRow: false,
      moreForms: true,
      purOrderMask: false,
      purHead: [{
        label: '采购单号',
        prop: 'purchase_order_no',
        type: 'text'
      }, {
        label: '创建时间',
        prop: 'created_at',
        type: 'text'
      }, {
        label: '创建人',
        prop: 'user_id',
        type: 'text'
      }],
      purVal: [],
      purOrderRow: {},
      addStockVal: []
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
  /*采购单只获取新建和部分完成的*/
  methods: (_methods = {
    test: function test() {
      console.log(1);
    },
    clickTabs: function clickTabs() {
      var index = this.activeName - 0;
      switch (index) {
        case 0:
          this.newOpt[0].nClick = false;
          this.newOpt[1].nClick = false;
          this.newOpt[2].nClick = false;
          this.newOpt[3].nClick = false;
          break;
        case 1:
          this.newOpt[0].nClick = true;
          this.newOpt[1].nClick = true;
          this.newOpt[2].nClick = true;
          this.newOpt[3].nClick = true;
          break;
      }
      this.loading = [true, true];
      this.getData();
    },

    /*获取数据*/
    getData: function getData() {
      var _this = this;

      this.$fetch(this.urls.cancelpurchases, { purchase_status: this.purchase_status[this.activeName] }).then(function (res) {
        _this.loading[_this.activeName] = false;
        _this.tabsData[_this.activeName] = res.data;
        var pg = res.meta.pagination;
        _this.$store.dispatch('currentPage', pg.current_page);
        _this.$store.commit('PER_PAGE', pg.per_page);
        _this.$store.commit('PAGE_TOTAL', pg.total);
        /*仓库、仓库类型*/
        // this.$store.dispatch('warehouses','/warehouses');
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
      /*
      let index = this.activeName-0;
      switch(index){
        case 0:
          this.newOpt[0].nClick = false;
          this.newOpt[1].nClick = false;
          this.newOpt[2].nClick = false;
          this.newOpt[3].nClick = false;
          this.$fetch(this.urls.cancelpurchases,{purchase_status:'new'})
            .then(res => {
              this.loading = false;
              this.newData = res.data;
              let pg = res.meta.pagination;
              this.$store.dispatch('currentPage', pg.current_page);
              this.$store.commit('PER_PAGE', pg.per_page);
              this.$store.commit('PAGE_TOTAL', pg.total);
              /!*仓库、仓库类型*!/
              // this.$store.dispatch('warehouses','/warehouses');
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
            });
          break;
        case 1:
          this.newOpt[0].nClick = true;
          this.newOpt[1].nClick = true;
          this.newOpt[2].nClick = true;
          this.newOpt[3].nClick = true;
          this.$fetch(this.stockInUrl,{purchase_status:'section'})
            .then(res => {
              this.partLoading = false;
              this.partData = res.data;
              let pg = res.meta.pagination;
              this.$store.dispatch('currentPage', pg.current_page);
              this.$store.commit('PER_PAGE', pg.per_page);
              this.$store.commit('PAGE_TOTAL', pg.total);
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
            });
          break;
        case 2:
          this.newOpt[3].nClick = true;
          this.newOpt[4].nClick = true;
          this.newOpt[5].nClick = false;
          this.$fetch(this.stockInUrl,{purchase_status:'finish'})
            .then(res => {
              this.finishLoading = false;
              this.finishData = res.data;
              let pg = res.meta.pagination;
              this.$store.dispatch('currentPage', pg.current_page);
              this.$store.commit('PER_PAGE', pg.per_page);
              this.$store.commit('PAGE_TOTAL', pg.total);
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
            });
          break
      }
      /!* this.$fetch(this.purchasesUrl)
         .then(res => {
           console.log(res);
           /!* this.newLoading = false;
            this.getsInfo = res.data;
            this.getsInfo.map(item=>{
              if(item.purchase_status=="新建"){
                this.newData.push(item);
              }else if(item.purchase_status=="部分完成"){
                this.partData.push(item);
              }else{
                this.readyData.push(item);
              }
            });
            this.newLoading = false;
            /!*let pg = res.meta.pagination;
            this.$store.dispatch('currentPage', pg.current_page);
            this.$store.commit('PER_PAGE', pg.per_page);
            this.$store.commit('PAGE_TOTAL', pg.total);*!/
            this.$store.dispatch('warehouses','/warehouses');*!/
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
         })*!/
      },*/
    },

    /*新增*/
    addNew: function addNew() {
      this.cancelPurMask = true;
    },
    selectPurOrder: function selectPurOrder() {
      /*获取采购单数据*/
      this.purOrderMask = true;
      var obj = [];
      this.$fetch(this.urls.purchases, { 'purchase_status': 'new' }).then(function (res) {
        obj.push(res.data);
      }, function (err) {
        console.log(err);
      });
      this.$fetch(this.urls.purchases, { 'purchase_status': 'section' }).then(function (res) {
        obj.push(res.data);
      }, function (err) {
        console.log(err);
      });
      this.purVal = obj;
    },
    selectPur: function selectPur(row) {
      console.log(row);
      this.purOrderRow = row;
    },
    confirmPurOrder: function confirmPurOrder() {
      this.purOrderMask = false;
      /*点击确定，传递当前id*/
      /*每次只能选择一行，拿到当前行的采购单号，然后填充采购单号，并显示单号下面的数据*/
    },
    cancelPurOrder: function cancelPurOrder() {
      this.purOrderMask = false;
    },
    cancelRowName: function cancelRowName(_ref) {
      var row = _ref.row,
          rowIndex = _ref.rowIndex;

      row.index = rowIndex;
    },

    /*监控输入框变化*/
    handleEdit: function handleEdit() {},

    /*单元格点击*/
    addCellClick: function addCellClick(row, column, cell, event) {},

    /*行切换*/
    addCurChg: function addCurChg(currentRow, oldCurrentRow) {
      if (oldCurrentRow) {}
    },

    /*自动填充*/
    autoFill: function autoFill() {
      /*所有的取消数量等于采购数*/
    },

    /*取消填充*/
    cancelFill: function cancelFill() {
      /*所有的取消数量归零*/
    },
    confirmAdd: function confirmAdd() {
      this.cancelPurMask = false;
    },
    cancelAdd: function cancelAdd() {
      this.cancelPurMask = false;
    }
  }, _defineProperty(_methods, 'handleEdit', function handleEdit() {}), _defineProperty(_methods, 'editSave', function editSave() {}), _defineProperty(_methods, 'edit', function edit() {}), _defineProperty(_methods, 'editCancel', function editCancel() {}), _defineProperty(_methods, 'del', function del() {}), _methods),
  mounted: function mounted() {
    // this.getData();
    this.$store.dispatch('setOpt', this.newOpt);
    var that = this;
    $(window).resize(function () {
      that.$store.dispatch('setOpt', that.newOpt);
    });
  }
});

/***/ }),

/***/ 651:
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
            _c("label", [_vm._v("取消单号")]),
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
            _c("label", [_vm._v("创建人")]),
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
            _c("label", [_vm._v("提交人")]),
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
        )
      ]),
      _vm._v(" "),
      _c(
        "el-tabs",
        {
          on: { "tab-click": _vm.clickTabs },
          model: {
            value: _vm.activeName,
            callback: function($$v) {
              _vm.activeName = $$v
            },
            expression: "activeName"
          }
        },
        _vm._l(_vm.tabs, function(item) {
          return _c(
            "el-tab-pane",
            { attrs: { label: item.label, name: item.name } },
            [
              _c("light-table", {
                attrs: {
                  listData: _vm.tabsData,
                  tableHead: _vm.tabsHead,
                  loading: _vm.loading[_vm.activeName],
                  nEditInRow: _vm.nEditInRow
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
          )
        })
      ),
      _vm._v(" "),
      _c("Pagination", { attrs: { "page-url": _vm.urls["cancelpurchases"] } }),
      _vm._v(" "),
      _c(
        "el-dialog",
        {
          class: { "more-forms": _vm.moreForms },
          attrs: { title: "取消采购单", visible: _vm.cancelPurMask },
          on: {
            "update:visible": function($event) {
              _vm.cancelPurMask = $event
            }
          }
        },
        [
          _c("el-button", { attrs: { type: "text" } }, [_vm._v("基本信息")]),
          _vm._v(" "),
          _c("div", { staticClass: "searchBox cancelPur" }, [
            _c(
              "span",
              [
                _c("label", [_vm._v("取消采购单号")]),
                _vm._v(" "),
                _c("el-input", {
                  attrs: { placeholder: "系统自动生成", disabled: "" }
                })
              ],
              1
            ),
            _vm._v(" "),
            _c(
              "span",
              [
                _c("label", [_vm._v("采购单号")]),
                _vm._v(" "),
                _c("el-input", { attrs: { disabled: "" } }),
                _vm._v(" "),
                _c("i", {
                  staticClass: "el-icon-more cancelIcon",
                  on: { click: _vm.selectPurOrder }
                }),
                _vm._v(" "),
                _c(
                  "el-button",
                  { attrs: { type: "primary" }, on: { click: _vm.autoFill } },
                  [_vm._v("自动填充")]
                ),
                _vm._v(" "),
                _c("el-button", { on: { click: _vm.cancelFill } }, [
                  _vm._v("取消填充")
                ])
              ],
              1
            )
          ]),
          _vm._v(" "),
          _c("el-button", { attrs: { type: "text" } }, [
            _vm._v("取消采购明细")
          ]),
          _vm._v(" "),
          _c(
            "el-table",
            {
              attrs: {
                data: _vm.addStockVal,
                fit: "",
                "highlight-current-row": "",
                height: 300,
                "row-class-name": _vm.cancelRowName
              },
              on: {
                "cell-click": _vm.addCellClick,
                "current-change": _vm.addCurChg
              }
            },
            [
              _vm._l(_vm.cancelHead, function(item, index) {
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
                        return undefined
                      }
                    }
                  ])
                })
              }),
              _vm._v(" "),
              _c("el-table-column", {
                attrs: { label: "取消数量", align: "center", width: "90" },
                scopedSlots: _vm._u([
                  {
                    key: "default",
                    fn: function(scope) {
                      return [
                        _c("el-input", {
                          attrs: {
                            size: "small",
                            type: "number",
                            placeholder: _vm.each.holder
                          },
                          on: { change: _vm.handleEdit },
                          model: {
                            value: _vm.cancelNum[scope.$index],
                            callback: function($$v) {
                              _vm.$set(_vm.cancelNum, scope.$index, $$v)
                            },
                            expression: "cancelNum[scope.$index]"
                          }
                        })
                      ]
                    }
                  }
                ])
              }),
              _vm._v(" "),
              _c("el-table-column", {
                attrs: {
                  label: "操作",
                  width: "90",
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
                                _vm.delPurDtl(scope.row)
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
                { attrs: { type: "primary" }, on: { click: _vm.confirmAdd } },
                [_vm._v("确定")]
              ),
              _vm._v(" "),
              _c("el-button", { on: { click: _vm.cancelAdd } }, [
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
          attrs: { title: "选择采购单", visible: _vm.purOrderMask },
          on: {
            "update:visible": function($event) {
              _vm.purOrderMask = $event
            }
          }
        },
        [
          _c(
            "el-table",
            {
              attrs: {
                data: _vm.purVal,
                fit: "",
                "highlight-current-row": "",
                height: 300
              },
              on: { "row-click": _vm.selectPur }
            },
            _vm._l(_vm.purHead, function(item, index) {
              return _c("el-table-column", {
                key: index,
                attrs: { label: item.label, align: "center" },
                scopedSlots: _vm._u([
                  {
                    key: "default",
                    fn: function(scope) {
                      return [
                        _vm._v(
                          "\n                    " +
                            _vm._s(scope.row[item.prop]) +
                            "\n                "
                        )
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
              staticClass: "dialog-footer",
              attrs: { slot: "footer" },
              slot: "footer"
            },
            [
              _c(
                "el-button",
                {
                  attrs: { type: "primary" },
                  on: { click: _vm.confirmPurOrder }
                },
                [_vm._v("确定")]
              ),
              _vm._v(" "),
              _c("el-button", { on: { click: _vm.cancelPurOrder } }, [
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
    require("vue-loader/node_modules/vue-hot-reload-api")      .rerender("data-v-5737f279", module.exports)
  }
}

/***/ })

});
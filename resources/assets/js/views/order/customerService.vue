<template>
    <div>
        <el-tabs v-model="activeName" @tab-click="handleClick">
            <el-tab-pane label="订单列表" name="order_list">
                <div>
                    <div class="search_box" ref="searchValue">
                        <div class="box">
                            <span><label>会员名称</label><el-input v-model="searchBox.vip_name" clearable></el-input></span>
                            <span><label>订单编号</label><el-input v-model="searchBox.order_num" clearable></el-input></span>
                            <span><label>收货人</label><el-input v-model="searchBox.order_man" clearable></el-input></span>
                            <span v-if="filterBox"><label>收货手机</label><el-input v-model="searchBox.order_phone" clearable></el-input></span>
                            <span v-else>
                                <el-button type="primary">筛选</el-button>
                                <el-button>重置</el-button>
                                <span @click="toggleShow">
                                    <el-button type="text">展开</el-button>
                                    <i class="el-icon-arrow-down" style="color:#409EFF"></i>
                                </span>
                            </span>
                        </div>
                        <div class="box" v-show="filterBox">
                            <span><label>收货地址</label><el-input v-model="searchBox.order_address" clearable></el-input></span>
                            <span>
                                <label>所属店铺</label>
                                <el-select v-model="searchBox.order_shop" clearable placeholder="请选择">
                                    <el-option
                                            v-for="item in searchBox.orderShops"
                                            :key="item.value"
                                            :label="item.label"
                                            :value="item.value">
                                    </el-option>
                                </el-select>
                            </span>
                            <span><label>包含商品</label><el-input v-model="searchBox.order_goods" clearable></el-input></span>
                            <span><label>业务员</label><el-input v-model="searchBox.order_staff" clearable></el-input></span>
                        </div>
                        <div class="box" v-show="filterBox">
                            <span><label>卖家备注</label><el-input v-model="searchBox.order_mark" clearable></el-input></span>
                            <span>
                                <label>物流公司</label>
                                <el-select v-model="searchBox.order_company" clearable placeholder="请选择">
                                    <el-option
                                            v-for="item in searchBox.orderCompany"
                                            :key="item.value"
                                            :label="item.label"
                                            :value="item.value">
                                    </el-option>
                                </el-select>
                            </span>
                            <span>
                                <label>淘宝旗帜</label>
                                <el-select v-model="searchBox.order_flag" clearable placeholder="请选择">
                                    <el-option
                                            v-for="item in searchBox.ordertbFlag"
                                            :key="item.value"
                                            :label="item.label"
                                            :value="item.value">
                                    </el-option>
                                </el-select>
                            </span>
                            <span>
                                <label>锁定状态</label>
                                 <el-select v-model="searchBox.order_lock" clearable placeholder="请选择">
                                     <el-option
                                             v-for="item in searchBox.orderLock"
                                             :key="item.value"
                                             :label="item.label"
                                             :value="item.value">
                                     </el-option>
                                 </el-select>
                            </span>
                        </div>
                        <div class="box" v-show="filterBox">
                            <span>
                                <label>承诺日期</label>
                                 <el-date-picker
                                         v-model="searchBox.order_promiseDate"
                                         type="daterange"
                                         range-separator="至"
                                         start-placeholder="开始日期"
                                         end-placeholder="结束日期">
                                 </el-date-picker>
                            </span>
                            <span>
                                <label>业务日期</label>
                                <el-date-picker
                                        v-model="searchBox.order_workDate"
                                        type="daterange"
                                        range-separator="至"
                                        start-placeholder="开始日期"
                                        end-placeholder="结束日期">
                                 </el-date-picker>
                            </span>
                            <span>
                                <label>客审日期</label>
                                 <el-date-picker
                                         v-model="searchBox.order_customerInves"
                                         type="daterange"
                                         range-separator="至"
                                         start-placeholder="开始日期"
                                         end-placeholder="结束日期">
                                 </el-date-picker>
                            </span>
                            <span class="transMoney">
                                <label>交易金额</label>
                                <el-input type="number" v-model="searchBox.order_transMStart" clearable></el-input>
                                至<el-input type="number" v-model="searchBox.order_transMEnd" clearable></el-input>
                            </span>
                        </div>
                        <div v-if="filterBox" style="text-align: right">
                            <el-button type="primary">筛选</el-button>
                            <el-button @click="resets">重置</el-button>
                            <span @click="toggleShow" style="display: inline">
                                <el-button type="text">收起</el-button>
                                <i class="el-icon-arrow-up" style="color:#409EFF"></i>
                            </span>
                        </div>
                    </div>
                    <el-tabs v-model="activeName2" type="card" @tab-click="handleClick">
                        <!--<el-tab-pane label="未处理" name="first">
                            <el-table
                                    ref="multipleTable"
                                    :data="tableData3"
                                    tooltip-effect="dark"
                                    style="width: 100%"
                                    @selection-change="handleSelectionChange">
                                <el-table-column
                                        type="selection"
                                        width="55">
                                </el-table-column>
                                <el-table-column
                                        label="日期"
                                        width="120">
                                    <template slot-scope="scope">{{ scope.row.date }}</template>
                                </el-table-column>
                                <el-table-column
                                        prop="name"
                                        label="姓名"
                                        width="120">
                                </el-table-column>
                                <el-table-column
                                        prop="address"
                                        label="地址"
                                        show-overflow-tooltip>
                                </el-table-column>
                            </el-table>
                        </el-tab-pane>-->
                        <el-tab-pane label="未处理" name="first">
                            <el-table
                                    ref="multipleTable"
                                    :data="list"
                                    tooltip-effect="dark"
                                    style="width: 100%"
                                    @selection-change="handleSelectionChange">
                                <el-table-column
                                        type="selection"
                                        width="55">
                                </el-table-column>

                                <el-table-column v-for="item in table"
                                                 :key="item.id"
                                                 :label="item.label"
                                                 width="120">
                                    <template slot-scope="scope">{{ scope.row[item.prop] }}</template>
                                </el-table-column>
                            </el-table>
                        </el-tab-pane>
                        <el-tab-pane label="已处理" name="second">
                            <el-table
                                    ref="multipleTable"
                                    :data="tableData3"
                                    tooltip-effect="dark"
                                    style="width: 100%"
                                    @selection-change="handleSelectionChange">
                                <el-table-column
                                        type="selection"
                                        width="55">
                                </el-table-column>
                                <el-table-column
                                        label="日期"
                                        width="120">
                                    <template slot-scope="scope">{{ scope.row.date }}</template>
                                </el-table-column>
                                <el-table-column
                                        prop="name"
                                        label="姓名"
                                        width="120">
                                </el-table-column>
                                <el-table-column
                                        prop="address"
                                        label="地址"
                                        show-overflow-tooltip>
                                </el-table-column>
                            </el-table>
                        </el-tab-pane>
                        <el-tab-pane label="等通知发货" name="third">
                            <el-table
                                    ref="multipleTable"
                                    :data="tableData3"
                                    tooltip-effect="dark"
                                    style="width: 100%"
                                    @selection-change="handleSelectionChange">
                                <el-table-column
                                        type="selection"
                                        width="55">
                                </el-table-column>
                                <el-table-column
                                        label="日期"
                                        width="120">
                                    <template slot-scope="scope">{{ scope.row.date }}</template>
                                </el-table-column>
                                <el-table-column
                                        prop="name"
                                        label="姓名"
                                        width="120">
                                </el-table-column>
                                <el-table-column
                                        prop="address"
                                        label="地址"
                                        show-overflow-tooltip>
                                </el-table-column>
                            </el-table>
                        </el-tab-pane>
                    </el-tabs>
                </div>
            </el-tab-pane>
            <el-tab-pane label="订单明细" name="order_detail">
                订单明细
            </el-tab-pane>
        </el-tabs>
    </div>
</template>
<script>
  export default {
    data() {
      return {
        newOpt: [
          {
            cnt: '增加',
            icon: 'bf-add',
            ent: this.test,
            ref: 'add'
          },
          {
            cnt: '修改',
            icon: 'bf-change',
            ent: this.test
          },
          {
            cnt: '删除',
            icon: 'bf-del',
            ent: this.test
          },
          {
            cnt: '锁定',
            icon: 'bf-lock',
            ent: this.test
          },
          {
            cnt: '解锁',
            icon: 'bf-delock',
            ent: this.test
          },
          {
            cnt: '审核',
            icon: 'bf-audit',
            ent: this.test
          },
          {
            cnt: '退审',
            icon: 'bf-auditfaild',
            ent: this.test
          },
          {
            cnt: '导出',
            icon: 'bf-out',
            ent: this.test
          },
          {
            cnt: '合并',
            icon: 'bf-merge',
            ent: this.test
          },
          {
            cnt: '拆分',
            icon: 'bf-node',
            ent: this.test
          },
          {
            cnt: '转刷单',
            icon: 'bf-transa',
            ent: this.test
          },
          {
            cnt: '上一条',
            icon: 'bf-beforeItem',
            ent: this.test
          },
          {
            cnt: '下一条',
            icon: 'bf-nextItem',
            ent: this.test
          },
          {
            cnt: '转补款',
            icon: 'bf-transferAcc',
            ent: this.test
          },
          {
            cnt: '订单关联',
            icon: 'bf-asso',
            ent: this.test
          },
          {
            cnt: '取消关联',
            icon: 'bf-cancelAsso',
            ent: this.test
          },
          {
            cnt: '通知发货',
            icon: 'bf-deliNotice',
            ent: this.test
          },
          {
            cnt: '打印',
            icon: 'bf-printer',
            ent: this.test
          },
          {
            cnt: '转送款',
            icon: 'bf-giveMoney',
            ent: this.test
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.test
          }
        ],
        filterBox: false,
        searchBox:{
          vip_name: '',
          order_num: '',
          order_man: '',
          order_phone: '',
          order_money: '',
          order_address: '',
          order_goods: '',
          order_staff: '',
          order_promiseDate: '',
          order_workDate: '',
          order_transMStart: '',
          order_transMEnd: '',
          orderCompany: [
            {label:'ceshi',value:0}
          ],
          order_customerInves: '',
          order_mark: '',
          order_flag: '',
          ordertbFlag: [
            {label:'ceshi',value:0}
          ],
          order_lock: '',
          orderLock: [
            {label:'ceshi',value:0}
          ],
          order_company: '',
          order_shop: '',
          orderShops: [
            {label:'ceshi',value:0}
          ],
        },
        activeName: 'order_list',
        activeName2: 'first',
        table:[{label:'日期',prop:'date'},{label:'姓名',prop:'name'},{label:'地址',prop:'address'}],
        tableData3: [
          {
            date: '2016-05-03',
            name: 'zhangsan',
            address: '上海市普陀区金沙江路 1518 弄'
          },
          {
            date: '2016-05-03',
            name: 'zhang san',
            address: 'geg市普陀区金沙江路 1518 弄'
          },
          {
            date: '2016-05-02',
            name: '李四',
            address: '北京市普陀区金沙江路 1518 弄'
          },
          {
            date: '2016-05-02',
            name: '张武',
            address: '上海市普陀区金沙江路 1518 弄'
          }],
        multipleSelection: []
      }
    },
    computed: {
      list: function() {
        let _search = this.searchBox.vip_name;
        let arr=[];
        for(let i=0;i<this.tableData3.length;i++)
        {
          if(this.tableData3[i].name.search(_search)!=-1 ){
            arr.push(this.tableData3[i]);
          }
        }
        return arr;
      },
    },
    filters: {
      /*conditions: function(items){
        let searchRegex = new RegExp(this.searchBox.vip_name, 'i');
        let arr=[];
        for(let i= 0, j = items.length; i < j; i++){
          arr[i] = {};
          arr[i].contacters = [];
          for(let item = 0, len = items[i].contacters.length; item < len; item++){
            if(searchRegex.test(items[i].contacters[item].name) || searchRegex.test(items[i].contacters[item].enterpriseName) || searchRegex.test(items[i].contacters[item].phoneNumber) || searchRegex.test(items[i].contacters[item].uniqueID)){
              arr[i].firstLetter = items[i].firstLetter;
              arr[i].contacters.push(items[i].contacters[item]);
            }
          }
        }
        return arr;
      }
*/
    },
    methods: {
      toggleShow(){
        this.filterBox = !this.filterBox;
      },
      test() {
        console.log(1);
      },
      handleClick(tab, event) {
        console.log(tab, event);
      },
      toggleSelection(rows) {
        if (rows) {
          rows.forEach(row => {
            this.$refs.multipleTable.toggleRowSelection(row);
          });
        } else {
          this.$refs.multipleTable.clearSelection();
        }
      },
      handleSelectionChange(val) {
        this.multipleSelection = val;
      },
      resets(){
        this.searchBox = {};
      }
    },
    mounted() {
      this.$store.state.opt.opts = this.newOpt;
      this.$store.commit('change', this.newOpt);
      const that = this;
      $(window).resize(() => {
        return (() => {
          that.$store.state.opt.opts = that.newOpt;
          that.$store.commit('change', that.newOpt);
        })()
      })
    }
  }
</script>
<style lang="scss" scoped>
    .search_btn{
        margin-bottom: 10px;
    }
    .box {
        display: flex;
        width: 100%;
        margin-bottom: 10px;
        align-items: center;

        span {
            flex: 1;
            margin-left: 5px;

            label {
                font-size: 14px;
                color: rgba(0, 0, 0, .85);
                font-weight: 500;
                width: 56px;
                display: inline-block;
                text-align: right;
            }

            &.transMoney{
                .el-input{
                    width: 31%;
                }
            }

            .el-select,.el-date-editor {
                margin-left: 3px;
                width: 72%;
            }

            .el-input{
                margin-left: 6px;
                width: 73%;
            }

        }
    }
</style>
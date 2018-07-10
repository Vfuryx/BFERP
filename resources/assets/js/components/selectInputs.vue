<template>
    <div>
        <el-tabs v-model="activeName" @tab-click="handleClick">
            <el-tab-pane label="订单列表" name="order_list">
                <div>
                    <h2>搜索条件</h2>
                    <div class="search_box">
                        <div class="box">
                            <span><label>会员名称</label><el-input v-model="vip_name" clearable></el-input></span>
                            <span><label>订单编号</label><el-input v-model="order_num" clearable></el-input></span>
                            <span><label>收货人</label><el-input v-model="order_man" clearable></el-input></span>
                            <span><label>收货手机</label><el-input v-model="order_phone" clearable></el-input></span>
                            <span><label>收货地址</label><el-input v-model="order_address" clearable></el-input></span>
                        </div>
                        <div class="box">

                            <span>
                                <label>所属店铺</label>
                                <el-select v-model="order_shop" clearable placeholder="请选择">
                                    <el-option
                                            v-for="item in orderShops"
                                            :key="item.value"
                                            :label="item.label"
                                            :value="item.value">
                                    </el-option>
                                </el-select>
                            </span>
                            <span><label>包含商品</label><el-input v-model="order_goods" clearable></el-input></span>
                            <span><label>业务员</label><el-input v-model="order_staff" clearable></el-input></span>
                        </div>
                        <div class="box">
                            <span><label>卖家备注</label><el-input v-model="order_mark" clearable></el-input></span>
                            <span>
                                <label>物流公司</label>
                                <el-select v-model="order_company" clearable placeholder="请选择">
                                    <el-option
                                            v-for="item in orderCompany"
                                            :key="item.value"
                                            :label="item.label"
                                            :value="item.value">
                                    </el-option>
                                </el-select>
                            </span>
                            <span>
                                <label>淘宝旗帜</label>
                                <el-select v-model="order_flag" clearable placeholder="请选择">
                                    <el-option
                                            v-for="item in ordertbFlag"
                                            :key="item.value"
                                            :label="item.label"
                                            :value="item.value">
                                    </el-option>
                                </el-select>
                            </span>
                            <span>
                                <label>锁定状态</label>
                                 <el-select v-model="order_lock" clearable placeholder="请选择">
                                     <el-option
                                             v-for="item in orderLock"
                                             :key="item.value"
                                             :label="item.label"
                                             :value="item.value">
                                     </el-option>
                                 </el-select>
                            </span>
                        </div>
                        <div class="box">
                            <span>
                                <label>承诺日期</label>
                                 <el-date-picker
                                         v-model="order_promiseDate"
                                         type="daterange"
                                         range-separator="至"
                                         start-placeholder="开始日期"
                                         end-placeholder="结束日期">
                                 </el-date-picker>
                            </span>
                            <span>
                                <label>业务日期</label>
                                <el-date-picker
                                        v-model="order_workDate"
                                        type="daterange"
                                        range-separator="至"
                                        start-placeholder="开始日期"
                                        end-placeholder="结束日期">
                                 </el-date-picker>
                            </span>
                        </div>
                        <div class="box">
                            <span>
                                <label>交易金额</label>
                                <el-input type="number" v-model="order_transMStart" clearable></el-input>
                                至
                                  <el-input type="number" v-model="order_transMEnd" clearable></el-input>
                            </span>
                            <span>
                                <label>客审日期</label>
                                 <el-date-picker
                                         v-model="order_customerInves"
                                         type="daterange"
                                         range-separator="至"
                                         start-placeholder="开始日期"
                                         end-placeholder="结束日期">
                                 </el-date-picker>
                            </span>
                        </div>
                    </div>
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
        activeName: 'order_list',
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
        orderCompany: [],
        order_customerInves: '',
        order_mark: '',
        order_flag: '',
        ordertbFlag: [],
        order_lock: '',
        orderLock: [],
        order_company: '',
        order_shop: '',
        orderShops: [],
      }
    },
    computed: {},
    methods: {
      test() {
        console.log(1);
      },
      handleClick(tab, event) {
        console.log(tab, event);
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
        }

        .el-select {
            margin-left: 3px;
            width: 72%;
        }

        .el-input, .el-date-editor {
            margin-left: 6px;
            width: 73%;

            .el-input__inner {
                /*height: 32px;*/
                line-height: 32px;
                padding: 0;
            }

            span.el-range-separator {
                width: 15%;
            }

            i.el-range-input {
                width: 35%;
            }
        }
    }
</style>
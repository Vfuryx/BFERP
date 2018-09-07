<template>
    <div>
        <el-tabs v-model="activeName" @tab-click="outerHandleClick">
            <el-tab-pane label="订单列表" name="0">
                <div>
                    <div class="searchBox">
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
                    <div class="searchBox" v-show="filterBox">
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
                    <div class="searchBox" v-show="filterBox">
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
                    <div class="searchBox" v-show="filterBox">
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
                <el-tabs v-model="leftTopActiveName" @tab-click="leftHandleClick" style="height: 400px;">
                    <el-tab-pane label="未货审" name="0">
                        <el-table :data="orderListData" fit
                                  @selection-change="handleSelectionChange"
                                  v-loading="loading"
                                  height="350"
                                  @row-click="orderListRClick"
                                  @row-dblclick="orderDbClick">
                            <el-table-column
                                    type="selection"
                                    width="95" align="center"
                                    :checked="checkboxInit">
                            </el-table-column>
                            <el-table-column v-for="item in orderListHead" :label="item.label" align="center" :width="item.width" :key="item.label">
                                <template slot-scope="scope">
                                    <span v-if="item.type=='checkbox'">
                                        <span v-if="item.inProp">
                                             <el-checkbox v-model="scope.row[item.prop][item.inProp]" disabled></el-checkbox>
                                              </span>
                                        <span v-else>
                                            <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
                                        </span>
                                    </span>
                                    <span v-else-if="item.type=='flag'">
                                        <span v-if="scope.row[item.prop]==0">
                             <i class="iconfont bf-flag"></i>
                                        </span>
                                        <span v-else-if="scope.row[item.prop]==1">
                        <i class="iconfont bf-flag" style="color:red"></i>
                                        </span>
                                         <span v-else-if="scope.row[item.prop]==2">
                        <i class="iconfont bf-flag" style="color:yellow"></i>
                                        </span>
                                         <span v-else-if="scope.row[item.prop]==3">
                        <i class="iconfont bf-flag" style="color:green"></i>
                                        </span>
                                         <span v-else-if="scope.row[item.prop]==4">
                        <i class="iconfont bf-flag" style="color:blue"></i>
                                        </span>
                                         <span v-else-if="scope.row[item.prop]==5">
                        <i class="iconfont bf-flag" style="color:purple"></i>
                                        </span>
                                    </span>
                                    <span v-else>
                                        <span v-if="scope.row[item.prop]">
                                     {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                                </span>
                            </span>
                                </template>
                            </el-table-column>
                            <el-table-column label="操作" width="90" align="center" fixed="right">
                                <template slot-scope="scope">
                                    <el-button size="mini" type="danger" @click="delSingle(scope.row,$event)">删除</el-button>
                                </template>
                            </el-table-column>
                        </el-table>
                    </el-tab-pane>
                    <el-tab-pane label="已货审" name="1">
                        <el-table :data="alreadyHandle" fit
                                  @selection-change="handleSelectionChange"
                                  v-loading="loading"
                                  height="350"
                                  @row-click="orderListRClick"
                                  @row-dblclick="orderDbClick">
                            <el-table-column
                                    type="selection"
                                    width="95" align="center"
                                    :checked="checkboxInit">
                            </el-table-column>
                            <el-table-column v-for="item in orderListHead" :label="item.label" align="center" :width="item.width" :key="item.label">
                                <template slot-scope="scope">
                                    <span v-if="item.type=='checkbox'">
                                        <span v-if="item.inProp">
                                             <el-checkbox v-model="scope.row[item.prop][item.inProp]" disabled></el-checkbox>
                                              </span>
                                        <span v-else>
                                            <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
                                        </span>
                                    </span>
                                    <span v-else-if="item.type=='flag'">
                                        <span v-if="scope.row[item.prop]==0">
                             <i class="iconfont bf-flag"></i>
                                        </span>
                                        <span v-else-if="scope.row[item.prop]==1">
                        <i class="iconfont bf-flag" style="color:red"></i>
                                        </span>
                                         <span v-else-if="scope.row[item.prop]==2">
                        <i class="iconfont bf-flag" style="color:yellow"></i>
                                        </span>
                                         <span v-else-if="scope.row[item.prop]==3">
                        <i class="iconfont bf-flag" style="color:green"></i>
                                        </span>
                                         <span v-else-if="scope.row[item.prop]==4">
                        <i class="iconfont bf-flag" style="color:blue"></i>
                                        </span>
                                         <span v-else-if="scope.row[item.prop]==5">
                        <i class="iconfont bf-flag" style="color:purple"></i>
                                        </span>
                                    </span>
                                    <span v-else>
                                        <span v-if="scope.row[item.prop]">
                                     {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                                </span>
                            </span>
                                </template>
                            </el-table-column>
                            <el-table-column label="操作" width="90" align="center" fixed="right">
                                <template slot-scope="scope">
                                    <el-button size="mini" type="danger" @click="delSingle(scope.row,$event)">删除</el-button>
                                </template>
                            </el-table-column>
                        </el-table>
                    </el-tab-pane>
                </el-tabs>
            </el-tab-pane>
            <el-tab-pane label="订单明细" name="1">
                <el-form :model="orderDtlFormVal" class="quarter_turn">
                    <el-form-item v-for="item in orderDtlFormHead" :key="item.label" :label="item.label" :prop="item.prop">
                        <span v-if="item.type=='text'">
                         <span v-if="item.inProp">
                            <el-input v-model.trim="orderDtlFormVal[item.prop][item.inProp]" :placeholder="item.holder" disabled></el-input>
                        </span>
                        <span v-else>
                          <el-input v-model.trim="orderDtlFormVal[item.prop]" :placeholder="item.holder" disabled></el-input>
                    </span>
                    </span>
                        <span v-else-if="item.type=='number'">
                       <el-input type="number" v-model.trim="orderDtlFormVal[item.prop]" :placeholder="item.holder" disabled></el-input>
                    </span>
                        <span v-else-if="item.type=='textarea'">
                         <el-input type="textarea" v-model.trim="orderDtlFormVal[item.prop]" :placehode="item.holder"></el-input>
                    </span>
                    </el-form-item>
                </el-form>
                <el-tabs v-model="rightActiveName" @tab-click="rightHandleClick">
                    <el-tab-pane label="商品明细" name="0">
                        <el-table :data="proDtlData" fit>
                            <el-table-column v-for="item in orderDtlHead[rightActiveName]" :label="item.label" align="center" :width="item.width" :key="item.label">
                                <template slot-scope="scope">
                                    <span v-if="item.type=='checkbox'">
                                        <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
                                    </span>
                                    <span v-else>
                                        {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                                    </span>
                                </template>
                            </el-table-column>
                            <el-table-column type="expand" fixed="left">
                                <template slot-scope="scope">
                                    <el-table :data="scope.row['productComp']" fit>
                                        <el-table-column v-for="item in proCompHead" :label="item.label" align="center" :width="item.width" :key="item.label">
                                            <template slot-scope="scope">
                                <span v-if="item.prop">
                                    <span v-if="item.type=='checkbox'">
                                <el-checkbox v-model="scope.row[item.prop]" disabled></el-checkbox>
                     </span>
                                    <span v-else-if="item.type=='img'">
                                <el-popover
                                        placement="right"
                                        trigger="hover"
                                        popper-class="picture_detail">
                       <img :src="scope.row[item.prop]">
    <img slot="reference" :src="scope.row[item.prop]" :alt="scope.row[item.alt]">
   </el-popover>
                            </span>
                                    <span v-else>
                             {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                        </span>
                                </span>
                                            </template>
                                        </el-table-column>
                                    </el-table>
                                </template>
                            </el-table-column>
                            <el-table-column label="操作" width="90" align="center">
                                <template slot-scope="scope">
                                    <el-button size="mini" type="danger" @click="delSingle(scope.row,$event)">删除</el-button>
                                </template>
                            </el-table-column>
                        </el-table>
                    </el-tab-pane>
                    <el-tab-pane label="支付明细" name="1">
                        <el-table :data="payDtlData" fit>
                            <el-table-column v-for="item in orderDtlHead[rightActiveName]" :label="item.label" align="center" :width="item.width" :key="item.label">
                                <template slot-scope="scope">
                                    <span v-if="item.type=='select'">
                                       <span v-for="(list,index) in resData[item.stateVal]" :key="index">
                                           <span v-if="list.id==scope.row[item.prop]">
                                               {{list.name?list.name:''}}
                                           </span>
                                        </span>
                                    </span>
                                    <span v-else>
                                        {{item.inProp?scope.row[item.prop][item.inProp]:scope.row[item.prop]}}
                                    </span>
                                </template>
                            </el-table-column>
                            <el-table-column label="操作" width="90" align="center">
                                <template slot-scope="scope">
                                    <el-button size="mini" type="danger" @click="delSingle(scope.row,$event)">删除</el-button>
                                </template>
                            </el-table-column>
                        </el-table>
                    </el-tab-pane>
                    <el-tab-pane label="内部便签" name="2">

                    </el-tab-pane>
                    <el-tab-pane label="操作记录" name="3">

                    </el-tab-pane>
                    <el-tab-pane label="关联信息" name="4">

                    </el-tab-pane>
                    <el-tab-pane label="其他费用" name="5">

                    </el-tab-pane>
                    <el-tab-pane label="驳回原因" name="6">

                    </el-tab-pane>
                    <el-tab-pane label="优惠列表" name="7">

                    </el-tab-pane>
                </el-tabs>
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
            cnt: '修改',
            icon: 'bf-change',
            ent: this.test,
            nClick: true
          },
          {
            cnt: '驳回',
            icon: 'bf-reject',
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
            cnt: '发货',
            icon: 'bf-deliver',
            ent: this.test,
            nClick: true
          },
          {
            cnt: '结算',
            icon: 'bf-finSettle',
            ent: this.test,
            nClick: true
          },
          {
            cnt: '批量处理',
            icon: 'bf-node',
            ent: this.test,
            nClick: true
          },
          {
            cnt: '导出',
            icon: 'bf-out',
            ent: this.test
          },
          {
            cnt: '合并',
            icon: 'bf-merge',
            ent: this.test,
            nClick: true
          },
          {
            cnt: '拆分',
            icon: 'bf-node',
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
            cnt: '订单采购',
            icon: 'bf-purchase',
            ent: this.test
          },
          {
            cnt: '生产排单',
            icon: 'bf-machie',
            ent: this.test
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.refresh
          }
        ],
        /*获取数据*/
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
        activeName: '0',
        leftTopActiveName:'0',
        rightActiveName: '0',
        orderListData: [],
        orderListHead: [
          {
            label: '系统订单',
            width: '220',
            prop: 'system_order_no',
            type: 'text',
          },
          {
            label: '淘宝单号',
            width: '220',
            prop: 'taobao_oid',
            type: 'text'
          },
          {
            label: '店铺昵称',
            width: '150',
            prop: 'shop',
            inProp: 'title',
            type: 'text'
          },
          {
            label: '业务员账号',
            width: '140',
            prop: 'businessPersonnel',
            inProp: 'username',
            type: 'text',
          },
          {
            label: '业务员姓名',
            width: '140',
            prop: 'businessPersonnel',
            inProp: 'username',
            type: 'text',
          },
          {
            label: '锁定人姓名',
            width: '130',
            prop: 'businessPersonnel',
            inProp: 'username',
            type: 'text',
          },
          {
            label: '买家昵称',
            width: '130',
            prop: 'member_nick',
            type: 'text',
          },
          {
            label: '客户类型',
            width: '130',
            prop: 'customerType',
            inProp:'name',
            type: 'text',
          },
          {
            label: '淘宝旗帜',
            width: '130',
            prop: 'seller_flag',
            type: 'flag'
          },
          {
            label: '物流公司',
            width: '140',
            prop: 'logistic',
            inProp: 'name',
            type: 'text',
          },
          {
            label: '快递费用',
            width: '120',
            prop: 'express_fee',
            type: 'number',
          },
          /* {
             label: '其他费用',
             width: '120',
             prop: 'is_print',
             type: 'number',
           },*/
          {
            label: '收货人',
            width: '130',
            prop: 'receiver_name',
            type: 'text',
          },
          {
            label: '省',
            width: '120',
            prop: 'receiver_state',
            type: 'text'
          },
          {
            label: '市',
            width: '120',
            prop: 'receiver_city',
            type: 'text'
          },
          {
            label: '区',
            width: '120',
            prop: 'receiver_district',
            type: 'text'
          },
          {
            label: '收货地址',
            width: '180',
            prop: 'receiver_address',
            type: 'text',
          },
          {
            label: '配送商',
            width: '130',
            prop: 'distribution',
            inProp: 'name',
            type: 'text',
          },
          {
            label: '发货仓库',
            width: '130',
            prop: 'warehouses',
            inProp:'name',
            type: 'text',
          },
          {
            label: '配送电话',
            width: '150',
            prop: 'distribution',
            inProp: 'phone',
            type: 'number',
          },
          {
            label: '配送类型',
            width: '130',
            prop: 'distributionType',
            inProp: 'name',
            type: 'text'
          },
          {
            label: '配送方式',
            width: '130',
            prop: 'distributionMethod',
            inProp: 'name',
            type: 'text'
          },
          {
            label: '送货费',
            width: '120',
            prop: 'deliver_goods_fee',
            type: 'number'
          },
          {
            label: '搬楼费',
            width: '120',
            prop: 'move_upstairs_fee',
            type: 'number',
          },
          {
            label: '安装费',
            width: '120',
            prop: 'installation_fee',
            type: 'number'
          },
          {
            label: '配送总计',
            width: '130',
            prop: 'total_distribution_fee',
            type: 'number'
          },
          {
            label: '配送单号',
            width: '180',
            prop: 'distribution_no',
            type: 'text'
          },
          {
            label: '客审时间',
            width: '180',
            prop: 'audit_at',
            type: 'text'
          },
          {
            label: '拍单时间',
            width: '180',
            prop: 'created',
            type: 'text',
          },
          {
            label: '支付日期',
            width: '180',
            prop: 'payment_date',
            type: 'text'
          },
          {
            label: '承诺发货日期',
            width: '180',
            prop: 'promise_ship_time',
            type: 'text',
          },
          /* {
             label: '商品数量',
             width: '120',
             prop: 'is_print',
             type: 'number',
           },*/
          /* {
             label: '(实际售价+其他费用)',
             width: '150',
             prop: '',
             type: 'number',
           },
           {
             label: '商家优惠金额',
             width: '130',
             prop: '',
             type: 'number'
           },
           {
             label: '标记总金额',
             width: '130',
             prop: '',
             type: 'number'
           },
           {
             label: '支付总金额',
             width: '130',
             prop: '',
             type: 'number'
           },
           {
             label: '实际总售价',
             width: '130',
             prop: '',
             type: 'number',
           },*/
          {
            label: '木架费',
            width: '120',
            prop: 'wooden_frame_costs',
            type: 'number'
          },
          {
            label: '优惠返现',
            width: '120',
            prop: 'preferential_cashback',
            type: 'number'
          },
          {
            label: '好评返现',
            width: '120',
            prop: 'favorable_cashback',
            type: 'number'
          },
          /* {
             label: '拆分主订单',
             width: '130',
             prop: 'is_split',
             type: 'checkbox'
           },*/
          /* {
             label: '标记人',
             width: '130',
             prop: '',
             type: 'text',
           },
           {
             label: '标记名称',
             width: '130',
             prop: '',
             type: 'text'
           },
           {
             label: '标记时间',
             width: '160',
             prop: '',
             type: 'text',
           },*/
          {
            label: '订单来源',
            width: '130',
            prop: 'order_source',
            type: 'text',
          },
          /* {
            label: '分阶段金额',
            width: '130',
            prop: '',
            type: 'number',
          },
          {
            label: '分阶段状态',
            width: '130',
            prop: '',
            type: 'text'
          },*/
          {
            label: '服务车金额',
            width: '130',
            prop: 'service_car_fee',
            type: 'number'
          },
          {
            label: '服务车信息',
            width: '150',
            prop: 'service_car_info',
            type: 'text'
          },
          {
            label: '门店收款方式',
            width: '130',
            prop: 'paymentMethod',
            inProp: 'name',
            type: 'text',
          },
          {
            label: '门店订单金额',
            width: '140',
            prop: 'deposit',
            type: 'number'
          },
          /* {
             label: '门店欠款金额',
             width: '140',
             prop: '',
             type: 'number'
           },
           {
             label: '线下单价汇总',
             width: '140',
             prop: '',
             type: 'number'
           },
           {
             label: '线下金额汇总',
             width: '140',
             prop: '',
             type: 'number'
           },*/
          {
            label: '发票快递费',
            width: '130',
            prop: 'invoice_express_fee',
            type: 'number',
          },
          /* {
             label: '线下优惠汇总',
             width: '140',
             prop: '',
             type: 'number'
           },*/
          /* {
             label: '送货类型-京东',
             width: '140',
             prop: '',
             type: 'text',
           },
           {
             label: '线下实际金额汇总',
             width: '140',
             prop: '',
             type: 'number',
           },
           {
             label: '支付方式-京东',
             width: '140',
             prop: '',
             type: 'text',
           },*/
          {
            label: '需要发票',
            width: '90',
            prop: 'is_invoice',
            type: 'checkbox'
          },
          /*  {
              label: '余额支付金额-京东',
              width: '140',
              prop: '',
              type: 'number'
            },*/
          {
            label: '订单状态',
            width: '140',
            prop: 'order_status',
            type: 'text'
          },
          {
            label: '发票信息',
            width: '160',
            prop: 'print_at',
            type: 'text',
          },
          {
            label: '纳税识别号',
            width: '180',
            prop: 'tax_number',
            type: 'text'
          },
          /* {
             label: '纳税注册地址',
             width: '180',
             prop: '',
             type: 'text'
           },
           {
             label: '纳税注册电话',
             width: '140',
             prop: '',
             type: 'number'
           },
           {
             label: '纳税开户银行',
             width: '130',
             prop: '',
             type: 'text'
           },
           {
             label: '纳税银行账号',
             width: '180',
             prop: '',
             type: 'number',
           },
           {
             label: '发票信息-唯品会',
             width: '180',
             prop: '',
             type: 'text'
           },*/
          /* {
             label: 'PO单号-唯品会',
             width: '180',
             prop: '',
             type: 'text',
           },
           {
             label: '促销优惠金额-唯品会',
             width: '150',
             prop: '',
             type: 'number',
           },
           {
             label: '期望收货时间-唯品会',
             width: '160',
             prop: '',
             type: 'text',
           },*/
          {
            label: '买家留言',
            width: '150',
            prop: 'buyer_message',
            type: 'text'
          },
          {
            label: '客服备注',
            width: '150',
            prop: 'customer_service_remark',
            type: 'text'
          },
          {
            label: '卖家备注',
            width: '150',
            prop: 'customer_service_remark',
            type: 'text'
          },
          /* {
             label: '补件原因',
             width: '150',
             prop: '',
             type: 'text',
           },*/
          /* {
             label: '已驳回',
             width: '90',
             prop: '',
             type: 'checkbox'
           },

           {
             label: '分阶段',
             width: '90',
             prop: '',
             type: 'checkbox'
           },*/
          /*{
            label: '服务车',
            width: '90',
            prop: '',
            type: 'checkbox'
          },*/
          /* {
             label: '赠品',
             width: '90',
             prop: '',
             type: 'checkbox'
           },
           {
             label: '红包',
             width: '90',
             prop: '',
             type: 'checkbox',
           },
           {
             label: '已打印',
             width: '90',
             prop: '',
             type: 'checkbox'
           },*/
          /* {
             label: '锁定',
             width: '90',
             prop: '',
             type: 'checkbox',
           },*/
          {
            label: '合并订单',
            width: '90',
            prop: 'is_merge',
            type: 'checkbox',
          },
          {
            label: '拆分订单',
            width: '90',
            prop: 'is_split',
            type: 'checkbox',
          },
          {
            label: '关联订单',
            width: '90',
            prop: 'is_association',
            type: 'checkbox'
          },
          {
            label: '接单人',
            width: '120',
            prop: 'accept_order_user',
            type: 'text'
          },
          {
            label: '收据',
            width: '130',
            prop: 'receipt',
            type: 'text',
          },
          /* {
             label: '(订单总额+服务车金额)',
             width: '150',
             prop: '',
             type: 'number'
           },*/
          /* {
             label: '店铺分组',
             width: '120',
             prop: '',
             type: 'text'
           },*/
          {
            label: '关联单号',
            width: '220',
            prop: 'association_taobao_oid',
            type: 'text'
          },
          {
            label: '退款信息',
            width: '130',
            prop: 'refund_info',
            type: 'text'
          },
          {
            label: '锁定人账号',
            width: '140',
            prop: 'locker',
            inProp: 'username',
            type: 'text',
          },
          /* {
             label: '退审',
             width: '90',
             prop: '',
             type: 'checkbox'
           },
           {
             label: '库存占用',
             width: '90',
             prop: '',
             type: 'checkbox',
           },*/
          {
            label: '需要核销',
            width: '90',
            prop: 'is_cancel_after_verification',
            type: 'checkbox',
          },
          {
            label: '等通知发货',
            width: '90',
            prop: 'is_notice',
            type: 'checkbox',
          }
        ],
        loading: true,
        checkboxInit: false,
        orderListIndex: '',
        alreadyHandle: [],
        orderDtlFormVal: {},
        orderDtlFormHead: [
          {
            label: '系统单号',
            prop: 'system_order_no',
            type: 'text'
          },
          {
            label: '淘宝单号',
            prop: 'taobao_oid',
            type: 'text',
          },
          {
            label: '交易号',
            prop: 'taobao_tid',
            type: 'text'
          },
          {
            label: '单号失联',
            prop: 'association_taobao_oid',
            type: 'text'
          },
          {
            label: '所属店铺',
            prop: 'shop_name',
            type: 'text'
          },
          {
            label: '业务员',
            prop: 'business_personnel_name',
            type: 'text'
          },
          {
            label: '买家昵称',
            prop: 'member_nick',
            type: 'text'
          },
          {
            label: '收货人',
            prop: 'receiver_name',
            type: 'text'
          },
          {
            label: '手机',
            prop: 'receiver_mobile',
            type: 'text'
          },
          {
            label: '电话',
            prop: 'receiver_phone',
            type: 'text'
          },
          {
            label: '详细地址',
            prop: 'receiver_address',
            type: 'text'
          },
          {
            label: '快递费用',
            prop: 'express_fee',
            type: 'number'
          },
          /*{
            label: '标准总金额',
            prop: 'move_upstairs_fee',
            type: 'number'
          },*/
          {
            label: '运费类型',
            prop: 'freight_types_name',
            type: 'text'
          },
          {
            label: '预付运费',
            prop: 'expected_freight',
            type: 'number'
          },
          /*{
            label: '支付总金额',
            prop: 'distribution_phone',
            type: 'number'
          },
          {
            label: '三包类型',
            prop: 'distribution_no',
            type: 'text'
          },
          {
            label: '三包费用',
            prop: '',
            type: 'number'
          },*/
          {
            label: '物流成本',
            prop: 'deliver_goods_fee',
            type: 'number'
          },
          /*   {
               label: '订单总额',
               prop: '',
               type: 'number'
             },*/
          /*  {
              label: '订单时间',
              prop: '',
              type: 'text'
            },*/
          {
            label: '付款时间',
            prop: 'payment_date',
            type: 'text'
          },
          {
            label: '承诺时间',
            prop: 'promise_ship_time',
            type: 'text'
          },
          {
            label: '物流公司',
            prop: 'logistic_name',
            type: 'text'
          },
          {
            label: '配送方式',
            prop: 'distribution_method',
            type: 'text'
          },
          {
            label: '配送信息',
            prop: 'service_car_info',
            type: 'text'
          },
          {
            label: '费用类型',
            prop: 'deliver_goods_fee',
            type: 'text'
          },
          {
            label: '配送商',
            prop: 'distribution_name',
            type: 'text'
          },
          {
            label: '配送电话',
            prop: 'distribution_phone',
            type: 'text'
          },
          {
            label: '配送类型',
            prop: 'distributionType_name',
            type: 'text'
          },
          {
            label: '配送总计',
            prop: 'total_distribution_fee',
            type: 'number'
          },
          {
            label: '客服备注',
            prop: 'customer_service_remark',
            type: 'textarea'
          },
          {
            label: '卖家备注',
            prop: 'seller_remark',
            type: 'textarea'
          },
          {
            label: '买家留言',
            prop: 'buyer_message',
            type: 'textarea'
          },
        ],
        proDtlData: [],
        curRowId:'',
        curRowData: {},
        orderDtlHead: [
          [
            {
              label: 'sku名称',
              width: '160',
              prop:'name',
              type: 'text'
            },
            {
              label: '数量',
              width: '130',
              prop: 'quantity',
              type: 'number',
            },
            {
              label: '油漆',
              width: '120',
              prop: 'paint',
              type: 'text',
            },
            {
              label: '需要印刷',
              width: '120',
              prop: 'is_printing',
              type: 'checkbox',
            },
            {
              label: '总体积',
              width: '120',
              prop: 'total_volume',
              type: 'number',
            },
            {
              label: '印刷费用',
              width: '140',
              prop: 'printing_fee',
              type: 'number',
            },
            {
              label: '现货',
              width: '120',
              prop: 'is_spot_goods',
              type: 'checkbox',
            },
            {
              label: '单价(线下)',
              width: '150',
              prop: 'under_line_univalent',
              type: 'number'
            },
            {
              label: '优惠(线下)',
              width: '150',
              prop: 'under_line_preferential',
              type: 'number',
            }
          ],
          [
            {
              label: '支付金额',
              prop: 'payment',
              type: 'number',
            },
            {
              label: '支付方式',
              prop: 'payment_methods_id',
              type: 'select',
              stateVal: 'paymentmethods'
            },
            {
              label: '交易号',
              prop: 'taobao_tid',
              type: 'text',
            },
            {
              label: '来源单号',
              prop: 'taobao_oid',
              type: 'text',
            }
          ],
          [],
          []
        ],
        payDtlData: [],
      }
    },
    computed: {
      resData:{
        get:function(){
          return this.$store.state.responseData
        },
        set:function(){}
      },
      urls:{
        get:function(){
          return this.$store.state.urls
        },
        set:function(){}
      }
    },
    methods:{
      test(){
        console.log(1);
      },
      /*获取数据*/
      toggleShow(){
        this.filterBox = !this.filterBox;
      },
      outerHandleClick() {
        let index = this.activeName-0;
        switch(index){
          case 0:
            this.fetchData();
            break;
          case 1:
            let data = this.orderListData[0];
            /*商品*/
            if(data){
              this.orderDtlFormVal = {
                system_order_no: data.system_order_no,
                taobao_oid: data.taobao_oid,
                taobao_tid: data.taobao_tid,
                association_taobao_oid: data.association_taobao_oid,
                shop_name: data['shop']['title'],
                business_personnel_name: data['businessPersonnel'] ? data['businessPersonnel']['username'] : '',
                member_nick: data.member_nick,
                receiver_name: data.receiver_name,
                receiver_mobile: data.receiver_mobile,
                receiver_phone: data.receiver_phone,
                receiver_address: data.receiver_address,
                express_fee: data.express_fee,
                freight_types_name: data['freightType']['name'],
                expected_freight: data.expected_freight,
                deliver_goods_fee: data.deliver_goods_fee,
                payment_date: data.payment_date,
                promise_ship_time: data.promise_ship_time,
                distribution_name: data['distribution']['name'],
                distribution_method: data['distributionMethod']['name'],
                service_car_info: data['service_car_info'],
                distribution_phone: data['distribution_phone'],
                buyer_message: data['buyer_message'],
                logistic_name: data['logistic']['name'],
                distributionType_name: data['distributionType']['name'],
                total_distribution_fee: data['total_distribution_fee'],
                customer_service_remark: data['customer_service_remark'],
                seller_remark: data['seller_remark'],
              }
            }
            if(data['orderItems']['data'].length>0){
              data['orderItems']['data'].map(item=>{
                item['name'] = item['combination']['name'];
                item['productComp'] = item['combination']['productComponents']['data'];
              })
            }
            this.proDtlData = data['orderItems']['data'];
            /*支付明细*/
            this.payDtlData = data['paymentDetails']['data'];
            break;
        }
      },
      fetchData(){
        let index = this.leftTopActiveName-0;
        switch(index){
          /*已财审*/
          case 0:
            let notTrial =[];
            this.$fetch(this.urls.customerservicedepts,{'order_status': 30,'include':'shop,logistic,freightType,distribution,distributionMethod,distributionType,takeDeliveryGoodsWay,customerType,paymentMethod,warehouses,orderItems.combination.productComponents,orderItems.product,businessPersonnel,locker,paymentDetails.paymentMethod,paymentDetails.order'})
              .then(res => {
                if(res.data.length>0){
                  res.data.map(item=>{
                    notTrial.push(item);
                  })
                }
              }, err => {console.log(err);});
            this.$fetch(this.urls.customerservicedepts,{'order_status': 50,'include':'shop,logistic,freightType,distribution,distributionMethod,distributionType,takeDeliveryGoodsWay,customerType,paymentMethod,warehouses,orderItems.combination.productComponents,orderItems.product,businessPersonnel,locker,paymentDetails.paymentMethod,paymentDetails.order'})
              .then(res => {
                if(res.data.length>0){
                  res.data.map(item=>{
                    notTrial.push(item);
                  })
                }
              }, err => {console.log(err);});
            setTimeout(()=>{
              this.loading = false;
              this.orderListData = notTrial;
              Object.assign(this.orderListData,notTrial)
            },2000)
            break;
          case 1:
            this.$fetch(this.urls.customerservicedepts,{'order_status': 60,'include':'shop,logistic,freightType,distribution,distributionMethod,distributionType,takeDeliveryGoodsWay,customerType,paymentMethod,warehouses,orderItems,businessPersonnel,locker,paymentDetails'})
              .then(res => {
                this.loading = false;
                this.alreadyHandle = res.data;
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
                  this.$message.error(arr1.join(','));
                }
              });
            break;
        }
      },
      leftHandleClick(){
        this.loading = true;
        this.fetchData();
      },
      rightHandleClick(){},
      orderListRClick(row){
        if(row['locker_id'] == 0){
          this.newOpt[1].nClick = true;
          this.newOpt[2].nClick = true;
          this.newOpt[3].nClick = false;
          this.newOpt[4].nClick = true;
          this.newOpt[8].nClick = true;
          this.newOpt[9].nClick = true;
          this.newOpt[14].nClick = true;
          if(row['order_status']=="已客审"){
            this.newOpt[5].nClick = true;
            this.newOpt[6].nClick = false;
          }else{
            this.newOpt[5].nClick = false;
            this.newOpt[6].nClick = true;
          }
        }else{
          this.newOpt[1].nClick = false;
          this.newOpt[2].nClick = false;
          this.newOpt[3].nClick = true;
          this.newOpt[4].nClick = false;
          this.newOpt[5].nClick = false;
          this.newOpt[6].nClick = true;
          this.newOpt[8].nClick = false;
          this.newOpt[9].nClick = false;
          this.newOpt[14].nClick = false;
        }
        this.curRowId = row.id;
        this.curRowData = row;

      },
      orderDbClick(row){
        this.activeName = '1';
        let data = row;
        if(data){
          this.orderDtlFormVal={
            system_order_no: data.system_order_no,
            taobao_oid: data.taobao_oid,
            taobao_tid: data.taobao_tid,
            association_taobao_oid: data.association_taobao_oid,
            shop_name: data['shop']['title'],
            business_personnel_name: data['businessPersonnel']?data['businessPersonnel']['username']:'',
            member_nick: data.member_nick,
            receiver_name: data.receiver_name,
            receiver_mobile: data.receiver_mobile,
            receiver_phone: data.receiver_phone,
            receiver_address: data.receiver_address,
            express_fee: data.express_fee,
            freight_types_name: data['freightType']['name'],
            expected_freight: data.expected_freight,
            deliver_goods_fee: data.deliver_goods_fee,
            payment_date: data.payment_date,
            promise_ship_time: data.promise_ship_time,
            distribution_name: data['distribution']['name'],
            distribution_method: data['distributionMethod']['name'],
            service_car_info: data['service_car_info'],
            distribution_phone: data['distribution_phone'],
            buyer_message: data['buyer_message'],
            logistic_name: data['logistic']['name'],
            distributionType_name: data['distributionType']['name'],
            total_distribution_fee: data['total_distribution_fee'],
            customer_service_remark: data['customer_service_remark'],
            seller_remark: data['seller_remark'],
          }
        }
        this.proDtlData = row['orderItems']['data'];
        if(row['orderItems']['data'].length>0){
          row['orderItems']['data'].map(item=>{
            item['name'] = item['combination']['name'];
            item['productComp'] = item['combination']['productComponents']['data'];
          })
        }
        /*支付明细*/
        this.payDtlData = row['paymentDetails']['data'];
      },
      proDtlRClick(row){},
      resets(){
        this.searchBox = {};
      },
      /*批量删除*/
      handleSelectionChange(val){
        console.log(val);
        /*拿到id集合*/
        let delArr = [];
        val.forEach(selectedItem => {
          delArr.push(selectedItem.id);
        });
        this.ids = delArr.join(',');
        /*拿到当前id*/
        this.checkboxId=val.length>0?val[val.length-1].id:'';
        this.curRowData=val.length>0?val[val.length-1]:'';
        this.mergerIds = val;
      },
      delBatch(){
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
          }).then(() => {
            this.$del(this.urls.customerservicedepts, {ids: this.ids})
              .then(() => {
                this.refresh();
                this.$message({
                  message: '删除成功',
                  type: 'success'
                });
              },err=>{
                if (err.response) {
                  let arr = err.response.data.errors;
                  let arr1 = [];
                  for (let i in arr) {
                    arr1.push(arr[i]);
                  }
                  let str = arr1.join(',');
                  this.$message.error(str);
                }
              })
          }).catch(() => {
            this.$message({
              type: 'info',
              message: '已取消删除'
            });
          });
        }
      },
      /*页码*/
      handlePagChg(page){
        this.$fetch(this.urls.logistics+'?page='+page,{include:'cityInfos.logistics,printReport,freightType'})
          .then(res=>{
            this.logisticsData = res.data;
          })
      },
      refresh(){
        this.loading = true;
        this.fetchData();
      },
    },
    mounted() {
      this.fetchData();
      this.$store.dispatch('setOpt', this.newOpt);
      let that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt', that.newOpt);
      });
    }
  }
</script>
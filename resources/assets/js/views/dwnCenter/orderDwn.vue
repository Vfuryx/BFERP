<template>
    <div>
        <h2>订单下载</h2>
        <div class="box">
            <span>
                <label>店铺名称</label>
                <el-select v-model="searchBox.shop_name" clearable placeholder="请选择"><el-option v-for="item in searchBox.shopNames" :key="item.value" :label="item.label" :value="item.value"></el-option></el-select>
            </span>
            <span>
               <label>业务日期</label>
                 <el-date-picker
                         v-model="searchBox.work_date"
                         type="daterange"
                         range-separator="至"
                         start-placeholder="开始日期"
                         end-placeholder="结束日期"></el-date-picker>
            </span>
            <span>
                <label>买家昵称</label>
                <el-input v-model="searchBox.pro_num" clearable></el-input>
            </span>
            <span>
                <label>订单编号</label>
                <el-input v-model="searchBox.order_num" clearable></el-input>
            </span>
        </div>
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
                    label="订单交易号"
                    width="120">
                <!--<template slot-scope="scope">{{ scope.row.date }}</template>-->
            </el-table-column>
            <el-table-column
                    prop=""
                    label="应付金额"
                    width="120">
            </el-table-column>
            <el-table-column
                    prop=""
                    label="实付金额"
                    show-overflow-tooltip>
            </el-table-column>
            <el-table-column
                    prop=""
                    label="买家昵称"
                    show-overflow-tooltip>
            </el-table-column>

            <el-table-column
                    prop=""
                    label="创建时间"
                    show-overflow-tooltip>
            </el-table-column>
            <el-table-column
                    prop=""
                    label="订单状态"
                    show-overflow-tooltip>
            </el-table-column>
            <el-table-column
                    prop=""
                    label="分阶段状态"
                    show-overflow-tooltip>
            </el-table-column>
        </el-table>
    </div>
</template>
<script>
  export default {
    data() {
      return {
        newOpt: [
          {
            cnt: '下载',
            icon: 'bf-dwn',
            ent: this.test
          }
        ],
        searchBox:{
          shop_name:'',
          dwn_type:'',
          pro_num:'',
          order_num:'',
          shopNames:[
            {label: '店铺1', value: 0},
            {label: '店铺2', value: 1},
          ],
          work_date:''
        },
        tableData3:[],
        multipleSelection: []
      }
    },
    methods:{
      test(){
        console.log(1);
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
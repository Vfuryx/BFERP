<template>
    <div>
        <div class="search_box">
            <div class="searchBox">
                <span>
                    <label>名称/标题</label>
                    <el-input v-model="searchBox.vip_name" clearable></el-input>
                </span>
                <span>
                    <label>商品编码</label>
                    <el-input v-model="searchBox.vip_name" clearable></el-input>
                </span>
                <span>
                    <label>规格编码</label>
                    <el-input v-model="searchBox.vip_name" clearable></el-input>
                </span>
                <span v-if="filterBox">
                    <label>规格名称</label>
                    <el-input v-model="searchBox.vip_name" clearable></el-input>
                </span>
                <span v-else>
                    <el-button type="primary" @click="check">筛选</el-button>
                    <el-button @click="resets" style="margin-right: 5px">重置</el-button>
                                <span @click="toggleShow">
                                    <el-button type="text">展开</el-button>
                                    <i class="el-icon-arrow-down" style="color:#409EFF"></i>
                                </span>
                            </span>
            </div>
            <div class="searchBox" v-show="filterBox">
                <span>
                     <label>仓库名称</label>
                     <el-select v-model="searchBox.vip_name" clearable placeholder="请选择">
                         <el-option v-for="item in searchBox.vip_name" :key="item.value" :label="item.label" :value="item.value"></el-option>
                     </el-select>
                 </span>
                <span>
                     <label>供应商</label>
                     <el-select v-model="searchBox.vip_name" clearable placeholder="请选择">
                         <el-option v-for="item in searchBox.vip_name" :key="item.value" :label="item.label" :value="item.value"></el-option>
                     </el-select>
                 </span>
                <span>
                     <label>商品类别</label>
                     <el-select v-model="searchBox.vip_name" clearable placeholder="请选择">
                         <el-option v-for="item in searchBox.vip_name" :key="item.value" :label="item.label" :value="item.value"></el-option>
                     </el-select>
                 </span>
            </div>
            <div class="opt" v-if="filterBox" style="text-align: right">
                <el-button type="primary" @click="check">筛选</el-button>
                <el-button @click="resets">重置</el-button>
                <span @click="toggleShow" style="display: inline">
                                <el-button type="text">收起</el-button>
                                <i class="el-icon-arrow-up" style="color:#409EFF"></i>
                            </span>
            </div>
        </div>
        <!--产品库存-->
        <light-table :listData="stockInfo" @handleSelect="handleSelectionChange"
                     :tableHead="stockHead" @editSave="editSave" @handleEdit="handleEdit"
                     @del="del" :loading="stockLoading" @edit="edit" :currentIndex="currentIndex" @editCancel="editCancel"
                     :editInRow="editInRow" :height="400" @rowClick="rowClick"></light-table>
        <!--页码-->
        <Pagination :page-url="stockUrl"></Pagination>
        <!--底部tabs-->
        <el-tabs v-model="btmActiveName" @tab-click="clickBtmTabs">
            <el-tab-pane label="供应商汇总信息" name="0">
                供应商汇总信息
            </el-tab-pane>
            <el-tab-pane label="供应商采购批次" name="1">
                供应商采购批次
            </el-tab-pane>
            <el-tab-pane label="库存(删除/还原)记录" name="2">
                库存(删除/还原)记录
            </el-tab-pane>
        </el-tabs>
        <!--写入库存信息-->
        <el-dialog title="插入库存记录" :visible.sync="showAddIn">
            <el-table :data="warehouses" fit highlight-current-row
                      type="index" max-height="300" @row-click="rowClickAdd" :row-class-name="rowClassName" @selection-change="handleWareChg">
                <el-table-column
                        type="selection"
                        align="center"
                        :checked="checkboxInit">
                </el-table-column>
                <el-table-column
                         align="center" label="仓库名称" prop="name">
                </el-table-column>
                <el-table-column align="center" label="默认库存数">
                    <template slot-scope="scope">
                        <span v-if="addRowIndex=='index'+scope.$index">
                            <el-input size="small" v-model="chgStockNum[scope.$index]"></el-input>
                        </span>
                        <span v-else>
                            <span v-if="chgStockNum[scope.$index]">
                                {{chgStockNum[scope.$index]}}
                            </span>
                            <span v-else>
                                 {{0}}
                            </span>
                        </span>
                    </template>
                </el-table-column>
            </el-table>
            <div slot="footer" class="dialog-footer clearfix">
                <div style="float: left">
                    <el-button type="primary" @click="wPro">写入商品</el-button>
                </div>
                <div style="float: right">
                    <el-button type="primary" @click="confirmWrite">确定</el-button>
                    <el-button @click="resetWrite">重置</el-button>
                    <el-button @click="cancelWrite">取消</el-button>
                </div>
            </div>
        </el-dialog>
        <!--可写入商品-->
        <el-dialog title="商品写入" :visible.sync="clickChoicePro">
            <div>
                <label>模糊条件</label>
                <el-input clearable style="width: 60%;margin:0 10px 0 5px;"></el-input>
                <el-button type="primary">查询</el-button>
            </div>
            <el-table :data="ableWriteData" fit highlight-current-row
                      max-height="300" @row-click="bWProRow" v-loading="ableWLoad"  element-loading-spinner="el-icon-loading"  element-loading-background="rgba(0, 0, 0, 0.6)" :row-class-name="beWPro"   @current-change="curChg"
                      style="margin: 10px 0;"
            >
                <el-table-column v-for="(item,index) in ableWriteHead" :label="item.label" align="center" :width="item.width" :key="index">
                    <template slot-scope="scope">
                        {{scope.row[item.prop]}}
                    </template>
                </el-table-column>
                <el-table-column width="120" align="center" fixed="right" label="写入库存">
                    <template slot-scope="scope">
                        <span v-if="bWRowIndex=='index'+scope.$index">
                            <el-input size="small" v-model="bWRowStock[scope.$index]"></el-input>
                        </span>
                        <span v-else>
                            <span v-if="bWRowStock[scope.$index]">
                                {{bWRowStock[scope.$index]}}
                            </span>
                            <span v-else></span>
                        </span>
                    </template>
                </el-table-column>
            </el-table>
            <div style="text-align: right;">
                <el-button type="primary" @click="confirmWIn">确认</el-button>
                <el-button @click="cancelWIn">取消</el-button>
            </div>
        </el-dialog>
        <!--删除单条-->
        <el-popover
                placement="top"
                width="160"
                v-model="showDel" slot="tip">
            <p>确定删除该条数据？</p>
            <div style="text-align: right; margin: 0">
                <el-button size="mini" type="text" @click="cancelD">取消</el-button>
                <el-button type="primary" size="mini" @click="confirmD(delId)">确定</el-button>
            </div>
        </el-popover>
    </div>
</template>
<script>
  import { mapGetters } from 'vuex'
  export default {
    data() {
      return {
        newOpt: [
          {
            cnt: '删除',
            icon: 'bf-del',
            ent: this.delMore
          },
          {
            cnt: '导出',
            icon: 'bf-out',
            ent: this.test
          },
          {
            cnt: '一键恢复',
            icon: 'bf-recovery',
            ent: this.test
          },
          {
            cnt: '还原',
            icon: 'bf-reduce',
            ent: this.test
          },
          {
            cnt: '写入',
            icon: 'bf-write',
            ent: this.addIn
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.test
          }
        ],
        searchBox: {
          vip_name: '',
        },
        filterBox: false,
        stockInfo:[],
        stockHead:[
          {
            label: '商品图片',
            width: '120',
            prop: "goods",
            inProp:'img',
            holder: '请选择商品图片',
            type: 'text',
          },
          {
            label: '商品编码',
            width: '120',
            prop: "goods",
            inProp:'commodity_code',
            holder: '请选择商品编码',
            type: 'text',
          },
          {
            label: '规格编码',
            width: '120',
            prop: "pro_specs",
            inProp:'spec_code',
            holder: '请选择产品规格编码',
            type: 'text',
          },
          {
            label: '商品名称',
            width: '120',
            prop: "goods",
            inProp: 'short_name',
            holder: '请选择产品规格编码',
            type: 'text',
          },
          {
            label: '规格',
            width: '80',
            prop: "pro_specs",
            inProp: "spec",
            holder: '请选择产品规格编码',
            type: 'text',
          },
          {
            label: '颜色',
            width: '80',
            prop: "pro_specs",
            inProp: "color",
            holder: '请选择产品规格编码',
            type: 'text',
          },
          {
            label: '材质',
            width: '80',
            prop: "pro_specs",
            inProp: "materials",
            holder: '请选择产品规格编码',
            type: 'text',
          },
         /* {
            label: '功能',
            width: '300',
            prop: "pro_specs[function]",
            holder: '请选择产品规格编码',
            type: 'select',
          },
          {
            label: '特殊',
            width: '300',
            prop: "pro_specs[special]",
            holder: '请选择产品规格编码',
            type: 'select',
          },*/
          {
            label: '其他',
            width: '80',
            prop: "pro_specs",
            inProp: "other",
            holder: '请选择产品规格编码',
            type: 'text',
          },
         /* {
            label: '规格一',
            width: '300',
            prop: "product_specs",
            holder: '请选择产品规格编码',
            type: 'select',
          },*/
          {
            label: '预警数量',
            width: '120',
            prop: "pro_specs",
            inProp: "inventory_warning",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '可售预警数',
            width: '130',
            prop: "pro_specs",
            inProp: "available_warning",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '库存数',
            width: '100',
            prop: "quantity",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '实际库存数',
            width: '120',
            prop: "",
            inProp: "",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '订单数',
            width: '120',
            prop: "",
            inProp: "",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '可用数',
            width: '120',
            prop: "",
            inProp: "",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '可售数',
            width: '120',
            prop: "",
            inProp: "",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '可售数/按未审核计算',
            width: '180',
            prop: "",
            inProp: "",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '已货审数',
            width: '120',
            prop: "",
            inProp: "",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '已打印数',
            width: '120',
            prop: "",
            inProp: "",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '在途数',
            width: '100',
            prop: "",
            inProp: "",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '退货在途数',
            width: '180',
            prop: "",
            inProp: "",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '残损数',
            width: '100',
            prop: "",
            inProp: "",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '借出数',
            width: '100',
            prop: "",
            inProp: "",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '报废数',
            width: '100',
            prop: "",
            inProp: "",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '售出数',
            width: '100',
            prop: "",
            inProp: "",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '库龄',
            width: '80',
            prop: "",
            inProp: "",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '单价',
            width: '80',
            prop: "pro_specs",
            inProp: "price",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '成本',
            width: '80',
            prop: "pro_specs",
            inProp: "cost",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '仓库成本',
            width: '120',
            prop: "pro_specs",
            inProp: "warehouse_cost",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '订单总成本',
            width: '140',
            prop: "",
            inProp: "",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '库存数/按已打印算',
            width: '180',
            prop: "",
            inProp: "",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '库存总成本',
            width: '160',
            prop: "",
            inProp: "",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '近期采购成本',
            width: '180',
            prop: "",
            inProp: "",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '近期库存总成本',
            width: '180',
            prop: "",
            inProp: "",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '所在仓库',
            width: '120',
            prop: "warehouse",
            inProp: "name",
            holder: '请选择产品规格编码',
            type: 'text',
          },
          {
            label: '遗忘数',
            width: '100',
            prop: "",
            inProp: "",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '包件数',
            width: '100',
            prop: "pro_specs",
            inProp: "package_quantity",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '长度',
            width: '80',
            prop: "pro_specs",
            inProp: "length",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '体积',
            width: '80',
            prop: "pro_specs",
            inProp: "volume",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '总体积',
            width: '100',
            prop: "",
            inProp: "",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '总长度',
            width: '100',
            prop: "",
            inProp: "",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '最新到货时间',
            width: '180',
            prop: "",
            inProp: "",
            holder: '请选择产品规格编码',
            type: 'text',
          },
          {
            label: '采购运费',
            width: '120',
            prop: "",
            inProp: "",
            holder: '请选择产品规格编码',
            type: 'number',
          },
          {
            label: '启用',
            width: '80',
            prop: "status",
            holder: '请选择是否启用',
            type: 'select_def',
          },
          {
            label: '停产',
            width: '80',
            prop: "",
            inProp: "",
            holder: '请选择产品规格编码',
            type: 'select_stu',
          },
           {
            label: '可售数预警',
            width: '130',
            prop: "",
             inProp: "",
            holder: '请选择产品规格编码',
            type: 'number',
          },
           {
            label: '可用数预警',
            width: '130',
            prop: "",
             inProp: "",
            holder: '请选择产品规格编码',
            type: 'number',
          }
        ],
        stockLoading: true,
        currentIndex:'',
        stockUrl:'/stocks',
        btmActiveName:'0',
        editInRow: true,
        showAddIn: false,
        checkboxInit: false,
        chgStockNum:[],
        addRowIndex:'',
        selectedWare:[],
        clickChoicePro:false,
        choiceWare:'',
        ableWProUrl:'/saveableproduct',
        ableWriteHead:[
          {
            label: '商品编码',
            width: '120',
            prop: "commodity_code",
            type: 'text',
          },
          {
            label: '规格编码',
            width: '120',
            prop: "pro_specs",
            type: 'text',
          },
          {
            label: '商品简称',
            width: '120',
            prop: "short_name",
            type: 'text',
          },

          {
            label: '规格',
            // width: '80',
            prop: "spec",
            type: 'text',
          },
          {
            label: '颜色',
            width: '80',
            prop: "color",
            type: 'text',
          },
          {
            label: '材质',
            width: '80',
            prop: "materials",
            type: 'text',
          }
        ],
        ableWriteData:[],
        ableWLoad:true,
        bWRowIndex:'',
        bWRowStock:[],
        submitWPro:[],
        goodsIds:[],
        specIds:[],
        showDel:false,
        delArr:[],
      }
    },
    methods:{
      test(){
        console.log(1);
      },
      check(){},
      resets(){
        this.searchBox = {};
      },
      toggleShow(){
        this.filterBox = !this.filterBox;
      },
      editSave(){},
      handleEdit() {
        this.inputChange = true;
      },
      edit(){},
      editCancel(){},
      clickBtmTabs(){},
      rowClick(){},
      /*获取库存数据*/
      fetchData(){
        this.$fetch(this.stockUrl)
          .then(res => {
            this.stockInfo = res.data;
            this.stockLoading = false;
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
          })
      },
      /*写入*/
      addIn(){
        this.showAddIn = true;
        this.$store.dispatch('warehouses','/warehouses');
        this.resetWrite();
        /*每次点击多有库存数清0即执行一次重置*/
        this.resetWrite();
      },
      rowClickAdd(row){
        this.addRowIndex = 'index'+row.index;
      },
      rowClassName({row,rowIndex}){
        row.index = rowIndex;
      },
      cancelWrite(){
        this.showAddIn = false;
      },
      resetWrite(){
        this.chgStockNum = [];
        this.addRowIndex = '';
      },
      handleWareChg(val){
        this.selectedWare=val;
        /*如果选择了仓库，拿到仓库id*/
        if(this.selectedWare.length>0){
          this.choiceWare = val[0].id;
        }
      },
      beWPro({row,rowIndex}){
        row.index = rowIndex;
      },
      syncStockNum(index){
        this.bWRowStock[index]= this.bWRowStock[index];
      },
      bWProRow(row){
        this.bWRowIndex = 'index'+row.index;
      /*  let obj={
            warehouse_id: this.choiceWare,
            goods_id: row.goods_id,
            pro_specs_id: row.product_spec_id,
            quantity: this.bWRowStock[row.index],
        };
        let arr=[];
        if(obj.quantity){
          arr.push(obj);
          arr.map(item=>{
            if(this.submitWPro.length == 0){
              this.submitWPro.push(item);
              this.goodsIds.push(item.goods_id)
              this.specIds.push(item.pro_specs_id)
            }else if(this.goodsIds.indexOf(item.goods_id)==-1 || this.specIds.indexOf(item.pro_specs_id)==-1){
              this.submitWPro.push(item);
              this.goodsIds.push(item.goods_id)
              this.specIds.push(item.pro_specs_id)
            }else{
              this.submitWPro.map(list=>{
                if(list.stocks.goods_id==item.goods_id&&list.pro_specs_id==item.stocks.pro_specs_id){
                  list.quantity = item.quantity
                }
              });
            }
          })
        }*/
      },
      curChg(currentRow,oldCurrentRow){
        if(oldCurrentRow){
          let obj={
            warehouse_id: this.choiceWare,
            goods_id: oldCurrentRow.goods_id,
            pro_specs_id: oldCurrentRow.product_spec_id,
            quantity: this.bWRowStock[oldCurrentRow.index],
          };
          let arr=[];
          if(obj.quantity){
            arr.push(obj);
            arr.map(item=>{
              if(this.submitWPro.length == 0){
                this.submitWPro.push(item);
                this.goodsIds.push(item.goods_id)
                this.specIds.push(item.pro_specs_id)
              }else if(this.goodsIds.indexOf(item.goods_id)==-1 || this.specIds.indexOf(item.pro_specs_id)==-1){
                this.submitWPro.push(item);
                this.goodsIds.push(item.goods_id)
                this.specIds.push(item.pro_specs_id)
              }else{
                this.submitWPro.map(list=>{
                  if(list.stocks.goods_id==item.goods_id&&list.pro_specs_id==item.stocks.pro_specs_id){
                    list.quantity = item.quantity
                  }
                });
              }
            })
          }
        }
      },
      confirmWrite(){
        /*如果没有勾选仓库，提示请勾选仓库
        * 如果没有选择要写入的商品，提示选择要写入的商品*/
        if(this.selectedWare.length==0){
          this.$message({
            message: '请勾选仓库',
            type:'info'
          });
          return
        }else if(!this.clickChoicePro){
          this.$message({
            message: '请选择需要加入库存的商品',
            type:'info'
          });
          return
        }
      },
      wPro(){
        /*清空写入库存数*/
        this.bWRowStock = [];
        /*恢复写入库存数的非编辑状态*/
        this.bWRowIndex = '';
        /*清空要写入的库存数组*/
        this.submitWPro = [];
        this.clickChoicePro = true;
        this.$fetch(this.stockUrl+this.ableWProUrl,{warehouses_id:this.choiceWare}).then(res=>{
          this.ableWriteData = res.data;
          this.ableWLoad = false;
        },err=>{
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
        })
      },
      confirmWIn(){
        this.clickChoicePro = false;
        this.showAddIn = false;
        this.$post(this.stockUrl,{'stocks':this.submitWPro})
          .then(()=>{
            this.$message({
              message: '写入仓库成功',
              type:'success'
            });
          },err=>{
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
          })
      },
      cancelWIn(){
        this.clickChoicePro = false;
      },
      /*删除单条*/
      del(row,e){
        this.showDel = true;
        $('.el-popper').css({left: e.x - 100 + 'px', top: e.y - 125 + 'px'});
        this.delId = row.id;
      },
      cancelD(){
        this.showDel = false;
        this.$message({
          message: '取消删除',
          type: 'info'
        });
      },
      confirmD(id){
        this.$del(this.stockUrl + '/' + id)
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
          })
      },
      /*刷新*/
      refresh() {
        this.stockLoading = true;
        this.fetchData(this.stockUrl);
      },
      /*批量删除*/
      delMore() {
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
          }).then(() => {
            this.$del(this.stockUrl, {ids: this.delArr})
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
              })
          }).catch(() => {
            this.$message({
              type: 'info',
              message: '已取消删除'
            });
          });
        }
      },
      handleSelectionChange(val) {
        if (val.length != 0) {
          this.editId = val[0].id;
        } else {
          this.editId = '';
        }
        this.multipleSelection = val;
        let del = [];
        this.multipleSelection.forEach(selectedItem => {
          del.push(selectedItem.id);
        });
        this.delArr = del.join(',');
      },
    },
    computed:{
      ...mapGetters([
        'warehouses'
      ])
    },
    created(){

    },
    mounted() {
      this.fetchData();
      this.$store.dispatch('setOpt', this.newOpt);
      const that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt', that.newOpt);
      })
    }
  }
</script>
<template>
    <div>
        <el-tabs v-model="activeName" @tab-click="tabsClick">
            <el-tab-pane label="提货方式管理" name="0">
                <light-table :listData="takeDelGoodsData"
                             :tableHead="tabHead[activeName]" @editSave="editSave" @handleEdit="handleEdit" @del="delSingle" :loading="loading" :currentIndex="currentIndex" @edit="edit" @editCancel="editCancel"  @handleSelect="handleSelectionChange"></light-table>
            </el-tab-pane>
            <el-tab-pane label="付款方式管理" name="1">
                <light-table :listData="payMethodsData"
                             :tableHead="tabHead[activeName]" @editSave="editSave" @handleEdit="handleEdit" @del="delSingle" :loading="loading" :currentIndex="currentIndex" @edit="edit" @editCancel="editCancel"  @handleSelect="handleSelectionChange"></light-table>
            </el-tab-pane>
            <el-tab-pane label="客户类型管理" name="2">
                <light-table :listData="customerTypesData"
                             :tableHead="tabHead[activeName]" @editSave="editSave" @handleEdit="handleEdit" @del="delSingle" :loading="loading" :currentIndex="currentIndex" @edit="edit" @editCancel="editCancel"  @handleSelect="handleSelectionChange"></light-table>
            </el-tab-pane>
        </el-tabs>

        <!--新增-->
        <add-new :visible-add="showMask" :title="title[activeName]"
                 :rule-form="ruleForm[activeName]" :rules="rules[activeName]" :add-arr="addArr[activeName]"
                 :url="activeName=='0'?urls.takedeliverygoodsways:(activeName=='1'?urls.paymentmethods:urls.customertypes)" @submitEvent="submitForm" :new-ref="refArr[activeName]" @CB-dialog="CB_dialog"></add-new>

        <!--删除-->
        <el-popover
                placement="top"
                width="160"
                v-model="showDel" slot="tip">
            <p>确定删除该条数据？</p>
            <div style="text-align: right; margin: 0">
                <el-button size="mini" type="text" @click="cancelD">取消</el-button>
                <el-button type="primary" size="mini" @click="confirmD(delUrl,delId)">确定</el-button>
            </div>
        </el-popover>

        <Pagination :page-url="activeName=='0'?urls.takedeliverygoodsways:(activeName=='1'?urls.paymentmethods:urls.customertypes)" @handlePagChg="handlePagChg"></Pagination>
    </div>
</template>
<script>
  export default {
    data(){
      return {
        newOpt: [
          {
            cnt: '新增',
            icon: 'bf-add',
            ent: this.addNew
          },
          {
            cnt: '删除',
            icon: 'bf-del',
            ent: this.delBatch
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.refresh
          }
        ],
        tabHead:[
          [
            {
              label: '提货方式',
              prop: "name",
              holder:'请输入提货方式',
              type: 'text'
            },
            {
              label: '状态',
              prop: "status",
              type: 'checkbox'
            }
          ],
          [
            {
              label: '付款方式',
              prop: "name",
              holder:'请输入付款方式',
              type: 'text'
            },
            {
              label: '状态',
              prop: "status",
              type: 'checkbox'
            }
          ],
          [
            {
              label: '客户类型',
              prop: "name",
              holder:'请输入客户类型',
              type: 'text'
            },
            {
              label: '状态',
              prop: "status",
              type: 'checkbox'
            }
          ]
        ],
        title: ['新增提货方式','新增付款方式','新增客户类型'],
        ruleForm: [
          {
            name: '',
            status: true
          },
          {
            name: '',
            status: true
          },
          {
            name: '',
            status: true
          },
        ],
        rules:[
          {
            name:
              [{required: true, message: '请输入提货方式', trigger: 'blur'}]
          },
          {
            name:
              [{required: true, message: '请输入付款方式', trigger: 'blur'}]
          },
          {
            name:
              [{required: true, message: '请输入客户类型', trigger: 'blur'}]
          },
        ],
        addArr:[
          [
            {
              label:'提货方式',
              prop:'name',
              holder:'请输入提货方式',
              type: 'text'
            },
            {
              label:'状态',
              prop:'status',
              type: 'checkbox'
            }
          ],
          [
            {
              label:'付款方式',
              prop:'name',
              holder:'请输入付款方式',
              type: 'text'
            },
            {
              label:'状态',
              prop:'status',
              type: 'checkbox'
            }
          ],
          [
            {
              label:'客户类型',
              prop:'name',
              holder:'请输入客户类型',
              type: 'text'
            },
            {
              label:'状态',
              prop:'status',
              type: 'checkbox'
            }
          ]
        ],
        activeName:'0',
        getsData:[],
        loading: true,
        currentIndex:'',
        /*新增*/
        showMask: false,
        editId:'',
        inputChange: false,
        delArr:[],
        multipleSelection:[],
        refArr:['goodsWays','paymentmethods','customertypes'],
        takeDelGoodsData: [],
        payMethodsData:[],
        customerTypesData: [],
        /*删除*/
        showDel: false,
        delUrl: '',
        delId: '',
        /*批量*/
        ids:[],
        checkboxId: ''

      }
    },
    computed:{
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
      /*获取数据*/
      tabsClick(){
        this.loading=true;
        this.fetchStockData();
      },
      fetchStockData() {
        let index = this.activeName-0;
        switch(index){
          case 0:
            this.$fetch(this.urls.takedeliverygoodsways)
              .then(res => {
                this.stockDtlData = [];
                this.loading = false;
                this.takeDelGoodsData = res.data;
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
          case 1:
            this.$fetch(this.urls.paymentmethods)
              .then(res => {
                this.loading = false;
                this.payMethodsData = res.data;
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
          case 2:
            this.$fetch(this.urls.customertypes)
              .then(res => {
                this.loading = false;
                this.customerTypesData = res.data;
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
            break
        }
      },
      /*新增*/
      addNew(){
        this.showMask = true;
      },
      CB_dialog(val) {
        this.showMask = val;
      },
      submitForm(){
        let url = this.activeName=='0'?this.urls.takedeliverygoodsways:(this.activeName=='1'?this.urls.paymentmethods:this.urls.customertypes);
        this.$post(url,this.ruleForm[this.activeName])
          .then(() => {
            this.$message({
              message: '添加成功',
              type: 'success'
            });
            this.showMask = false;
            this.refresh();
          },err => {
            if (err.response) {
              let arr = err.response.data.errors;
              let arr1 = [];
              for (let i in arr) {
                arr1.push(arr[i]);
              }
              this.$message.error(arr1.join(','));
            }
          })
      },
      /*修改*/
      edit(index){
        this.currentIndex = 'index'+index;
      },
      handleEdit() {
        this.inputChange = true;
      },
      editCancel(){
        this.$message({
          message: '取消修改',
          type: 'info'
        });
        this.currentIndex = '';
      },
      editSave(row){
        let url = this.activeName=='0'?this.urls.takedeliverygoodsways:(this.activeName=='1'?this.urls.paymentmethods:this.urls.customertypes);
        this.$patch(url + '/' + row.id, row)
          .then(() => {
            this.$message({
              message: '修改成功',
              type: 'success'
            });
            this.currentIndex = '';
            this.inputChange = false;
            this.refresh();
          }, err => {
            if (err.response) {
              let arr = err.response.data.errors;
              let arr1 = [];
              for (let i in arr) {
                arr1.push(arr[i]);
              }
              this.$message.error(arr1.join(','))
            }
          })
      },
      /*删除单条*/
      delSingle(row,e){
        this.showDel = true;
        $('.el-popper').css({left: e.x - 100 + 'px', top: e.y - 125 + 'px'});
        this.delId = row.id;
        this.delUrl = this.activeName=='0'?this.urls.takedeliverygoodsways:(this.activeName=='1'?this.urls.paymentmethods:this.urls.customertypes);
      },
      cancelD(){
        this.showDel = false;
        this.$message({
          message: '取消删除',
          type: 'info'
        });
      },
      confirmD(url,id){
        this.$del(url+'/'+id)
          .then(()=>{
            this.$message({
              message: '删除成功',
              type: 'success'
            });
            this.showDel = false;
            this.refresh();
          },err=>{
            if (err.response) {
              this.showDel = false;
              let arr = err.response.data.errors;
              let arr1 = [];
              for (let i in arr) {
                arr1.push(arr[i]);
              }
              this.$message.error(arr1.join(','));
            }
          })
      },
      /*批量删除*/
      handleSelectionChange(val){
        /*拿到id集合*/
        let delArr = [];
        val.forEach(selectedItem => {
          delArr.push(selectedItem.id);
        });
        this.ids = delArr.join(',');
        /*拿到当前id*/
        this.checkboxId=val.length>0?val[val.length-1].id:'';
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
            this.$del(this.delUrl, {ids: this.ids})
              .then(() => {
                this.$message({
                  message: '删除成功',
                  type: 'success'
                });
                this.refresh();
              },err=>{
                if (err.response) {
                  let arr = err.response.data.errors;
                  let arr1 = [];
                  for (let i in arr) {
                    arr1.push(arr[i]);
                  }
                  this.$message.error(arr1.join(','));
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
      /*页面刷新*/
      refresh() {
        this.loading = true;
        this.fetchStockData();
      },
      /*分页*/
      handlePagChg(page){
        let url = this.activeName=='0'?this.urls.takedeliverygoodsways:(this.activeName=='1'?this.urls.paymentmethods:this.urls.customertypes);
        this.$fetch(url+'?page='+page)
          .then(res=>{
            if(this.activeName=='0'){
              this.takeDelGoodsData = res.data;
            }else if(this.activeName=='1'){
              this.payMethodsData = res.data;
            }else{
              this.customerTypesData = res.data;
            }
          })
      },
    },
    mounted(){
      this.fetchStockData();
      this.$store.dispatch('setOpt',this.newOpt);
      let that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt',that.newOpt);
      });
    }
  }
</script>

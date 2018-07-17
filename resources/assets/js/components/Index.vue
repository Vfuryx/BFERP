<!--
<template>
    <div>
        <my-table :table-key="tableKey" @edit="edit" ref="table" :url="url" id="MyTable" ></my-table>

        &lt;!&ndash;新增&ndash;&gt;
        <add-mask :showMask="showAdd" :title="title" :rule-form="ruleForm" :rules="rules" :add-arr="addArr" :url="url"></add-mask>

        &lt;!&ndash; 导入 &ndash;&gt;
        <el-dialog title="导入" :visible.sync="dialogImportVisible" :modal-append-to-body="false" :close-on-click-modal="false" class="dialog-import">
            <div :class="{'import-content': importFlag === 1, 'hide-dialog': importFlag !== 1}">
                <el-upload class="upload-demo"
                           :action="importUrl"
                           :name ="name"
                           :headers="importHeaders"
                           :on-preview="handlePreview"
                           :on-remove="handleRemove"
                           :before-upload="beforeUpload"
                           :on-error="uploadFail"
                           :on-success="uploadSuccess"
                           :file-list="fileList"
                           :with-credentials="withCredentials">
                    &lt;!&ndash; 是否支持发送cookie信息 &ndash;&gt;
                    <el-button size="small" type="primary" :disabled="processing">{{uploadTip}}</el-button>
                    <div slot="tip" class="el-upload__tip">只能上传excel文件</div>
                </el-upload>
                <div class="download-template">
                    &lt;!&ndash;<a class="btn-download" @click="download">
                        <i class="icon-download"></i>下载模板</a>&ndash;&gt;
                </div>
            </div>
            <div :class="{'import-failure': importFlag === 2, 'hide-dialog': importFlag !== 2}" >
                <div class="failure-tips">
                    <i class="el-icon-warning"></i>导入失败</div>
                <div class="failure-reason">
                    <h4>失败原因</h4>
                    <ul>
                        <li v-for="(error,index) in errorResults" :key="index">第{{error.rowIdx + 1}}行，错误：{{error.column}},{{error.value}},{{error.errorInfo}}</li>
                    </ul>
                </div>
            </div>
        </el-dialog>

    </div>
</template>
<script>
  import FileSaver from 'file-saver'
  import XLSX from 'xlsx'
  import * as scheduleApi from '../api/schedule.js'
  export default {
    data(){
      return {
        //操作
        newOpt: [
          {
            cnt: '新增',
            icon: 'bf-add',
            ent: this.addNew
          },
          {
            cnt: '删除',
            icon: 'bf-del',
            ent: this.doDelMore
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.refresh
          },
          {
            cnt: '导出',
            icon: 'bf-refresh',
            ent: this.exportExcel
          },
          {
            cnt: '导入',
            icon: 'bf-refresh',
            ent: this.exportExcel
          }
        ],
        //表格
        tableKey:[
          {
            label: '标记代码',
            width: '',
            prop: "markcode",
            holder:'代码'
          },
           {
            label: '标记名称',
            width: '180',
             prop: "markname",
             holder: '名称'
          },
           {
            label: '颜色',
            width: '180',
             prop: "color",
             holder: '颜色',
             type: 'color'
          },
           {
            label: '描述',
            width: '180',
             prop: "description",
             holder: '描述'
          },
           {
            label: '状态',
            width: '200',
             prop: "status",
             holder: '状态',
             type: 'select'
          }
        ],
        url:'/markcolors',
        //新增
        showAdd: false,
        title: '新增标记颜色',
        ruleForm: {
          markcode: '',
          markname: '',
          color: '',
          status:'1',
        description:''
        },
        rules: {
          markcode: [
            {required: true, message: '请输入标记代码', trigger: 'blur'},
          ],
          markname: [
            {required: true, message: '请输入标记名称', trigger: 'blur'},
          ],
          color: [
            {required: true, message: '请选择颜色', trigger: 'blur'}
          ]
        },
        addArr:[
          {
            label:'标记代码',
            prop:'markcode',
            holder:'请输入标记代码',
            type: 'text'
          },
          {
            label:'标记名称',
            prop:'markname',
            holder:'请输入标记名称',
            type: 'text'
          },
          {
            label:'标记颜色',
            prop:'color',
            type: 'pickColor',
          },
          {
            label:'状态',
            prop:'status',
            holder:'请选择状态',
            type: 'select'
          },
          {
            label:'描述',
            prop:'description',
            holder:'请输入描述',
            type: 'textarea'
          }
        ],

        importUrl:'/markcolors',//后台接口config.admin_url+'rest/schedule/import/'
        importHeaders:{
          enctype:'multipart/form-data',
          cityCode:''
        },
        name: 'import',
        fileList: [],
        withCredentials: true,
        processing: false,
        uploadTip:'点击上传',
        importFlag:1,
        dialogImportVisible:false,
        errorResults:[]
      }
    },
    methods:{
      //新增
      addNew(){
        this.$store.dispatch('setShowAdd',true);
      },

      edit(row){
        let obj = {
          id: row.id,
          markcode: row.markcode,
          markname: row.markname,
          color: row.color,
          description: row.description,
          status: row.status
        };
        this.$store.dispatch('setRow',row);
        this.$store.dispatch('setUrl',this.url+"/");
        this.$store.dispatch('doEdit',obj);
      },

      doDelMore(){
        this.$refs.table.$emit('delMore')
      },

      refresh(){
        this.$refs.table.$emit('refresh')
      },

      exportExcel () {
        let wb = XLSX.utils.table_to_book(document.querySelector('#MyTable'));
        let wbout = XLSX.write(wb, { bookType: 'xlsx', bookSST: true, type: 'array' });
        try {
          FileSaver.saveAs(new Blob([wbout], { type: 'application/octet-stream' }),'用户提交返利表.xlsx');
        } catch (e)
        {
          if (typeof console !== 'undefined')
            console.log(e, wbout)
        }
        return wbout
      },

      importData() {
        this.importFlag = 1
        this.fileList = []
        this.uploadTip = '点击上传'
        this.processing = false
        this.dialogImportVisible = true
      },
      outportData() {
        scheduleApi.downloadTemplate()
      },
      handlePreview(file) {
        //可以通过 file.response 拿到服务端返回数据
      },
      handleRemove(file, fileList) {
        //文件移除
      },
      beforeUpload(file){
        //上传前配置
        this.importHeaders.cityCode='上海'//可以配置请求头
        let excelfileExtend = ".xls,.xlsx"//设置文件格式
        let fileExtend = file.name.substring(file.name.lastIndexOf('.')).toLowerCase();
        if (excelfileExtend.indexOf(fileExtend) <= -1) {
          this.$message.error('文件格式错误')
          return false
        }
        this.uploadTip = '正在处理中...'
        this.processing = true
      },
      //上传错误
      uploadFail(err, file, fileList) {
        this.uploadTip = '点击上传'
        this.processing = false
        this.$message.error(err)
      },
      //上传成功
      uploadSuccess(response, file, fileList) {
        this.uploadTip = '点击上传'
        this.processing = false
        if (response.status === -1) {
          this.errorResults = response.data
          if (this.errorResults) {
            this.importFlag = 2
          } else {
            this.dialogImportVisible = false
            this.$message.error(response.errorMsg)
          }
        } else {
          this.importFlag = 3
          this.dialogImportVisible = false
          this.$message.info('导入成功')
          this.doSearch()
        }
      },
    },
    mounted(){
      this.$store.dispatch('setOpt',this.newOpt);
      let that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt',that.newOpt);
      });
    }
  }
</script>

-->
<template>
    <el-table
            :data="tableData5"
            style="width: 100%">
        <el-table-column type="expand">
            <template slot-scope="props">
                <el-table
                        :data="tableData"
                        style="width: 100%">
                    <el-table-column
                            prop="date"
                            label="日期"
                            sortable
                            width="180"
                            :filters="[{text: '2016-05-01', value: '2016-05-01'}, {text: '2016-05-02', value: '2016-05-02'}, {text: '2016-05-03', value: '2016-05-03'}, {text: '2016-05-04', value: '2016-05-04'}]"
                            :filter-method="filterHandler"
                    >
                    </el-table-column>
                    <el-table-column
                            prop="name"
                            label="姓名"
                            width="180">
                    </el-table-column>
                    <el-table-column
                            prop="address"
                            label="地址"
                            :formatter="formatter">
                    </el-table-column>
                    <el-table-column
                            prop="tag"
                            label="标签"
                            width="100"
                            :filters="[{ text: '家', value: '家' }, { text: '公司', value: '公司' }]"
                            :filter-method="filterTag"
                            filter-placement="bottom-end">
                        <template slot-scope="scope">
                            <el-tag
                                    :type="scope.row.tag === '家' ? 'primary' : 'success'"
                                    disable-transitions>{{scope.row.tag}}</el-tag>
                        </template>
                    </el-table-column>
                </el-table>
            </template>
        </el-table-column>
        <el-table-column
                label="商品 ID"
                prop="id">
        </el-table-column>
        <el-table-column
                label="商品名称"
                prop="name">
        </el-table-column>
        <el-table-column
                label="描述"
                prop="desc">
        </el-table-column>
    </el-table>
</template>

<style>
    .demo-table-expand {
        font-size: 0;
    }
    .demo-table-expand label {
        width: 90px;
        color: #99a9bf;
    }
    .demo-table-expand .el-form-item {
        margin-right: 0;
        margin-bottom: 0;
        width: 50%;
    }
</style>

<script>
  export default {
    data() {
      return {
        tableData5: [
          {
          id: '12987122',
          name: '好滋好味鸡蛋仔',
          category: '江浙小吃、小吃零食',
          desc: '荷兰优质淡奶，奶香浓而不腻',
          address: '上海市普陀区真北路',
          shop: '王小虎夫妻店',
          shopId: '10333'
        }, {
          id: '12987123',
          name: '好滋好味鸡蛋仔',
          category: '江浙小吃、小吃零食',
          desc: '荷兰优质淡奶，奶香浓而不腻',
          address: '上海市普陀区真北路',
          shop: '王小虎夫妻店',
          shopId: '10333'
        }, {
          id: '12987125',
          name: '好滋好味鸡蛋仔',
          category: '江浙小吃、小吃零食',
          desc: '荷兰优质淡奶，奶香浓而不腻',
          address: '上海市普陀区真北路',
          shop: '王小虎夫妻店',
          shopId: '10333'
        }, {
          id: '12987126',
          name: '好滋好味鸡蛋仔',
          category: '江浙小吃、小吃零食',
          desc: '荷兰优质淡奶，奶香浓而不腻',
          address: '上海市普陀区真北路',
          shop: '王小虎夫妻店',
          shopId: '10333'
        }],
        tableData: [{
          date: '2016-05-02',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1518 弄',
          tag: '家'
        }, {
          date: '2016-05-04',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1517 弄',
          tag: '公司'
        }, {
          date: '2016-05-01',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1519 弄',
          tag: '家'
        }, {
          date: '2016-05-03',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1516 弄',
          tag: '公司'
        }]
      }
    },
    methods: {
      formatter(row, column) {
        return row.address;
      },
      filterTag(value, row) {
        return row.tag === value;
      },
      filterHandler(value, row, column) {
        const property = column['property'];
        return row[property] === value;
      }
    }
  }
</script>
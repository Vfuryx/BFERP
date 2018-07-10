<template>
    <div>
        <my-table :table-key="tableKey" @edit="edit" ref="table" :url="url" id="MyTable" ></my-table>

        <!--新增-->
        <add-mask :showMask="showAdd" :title="title" :rule-form="ruleForm" :rules="rules" :add-arr="addArr" :url="url"></add-mask>

        <!-- 导入 -->
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
                    <!-- 是否支持发送cookie信息 -->
                    <el-button size="small" type="primary" :disabled="processing">{{uploadTip}}</el-button>
                    <div slot="tip" class="el-upload__tip">只能上传excel文件</div>
                </el-upload>
                <div class="download-template">
                    <!--<a class="btn-download" @click="download">
                        <i class="icon-download"></i>下载模板</a>-->
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


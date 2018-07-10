<template>
    <div>
    <p>
        <el-table
                ref="multipleTable"
                :data="tableData3"
                tooltip-effect="dark"
                border
                style="width: 80%"
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
    <p style="margin-top: 20px">
        <el-button @click="toggleSelection([tableData3[1], tableData3[2]])">切换第二、第三行的选中状态</el-button>
        <el-button @click="toggleSelection()">取消选择</el-button>
        <el-button type="primary" @click="importData">导入</el-button>
        <el-button type="primary" @click="outportData">导出</el-button>
    </p>
    <!-- 导入 -->
    <el-dialog title="导入" :visible.sync="dialogImportVisible" :modal-append-to-body="false" :close-on-click-modal="false" class="dialog-import">
        <p :class="{'import-content': importFlag === 1, 'hide-dialog': importFlag !== 1}">
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
                       :with-credentials="withCredentials"></el-upload></p>
                <!-- 是否支持发送cookie信息 -->
                <el-button size="small" type="primary" :disabled="processing">{{uploadTip}}</el-button>
        <p slot="tip" class="el-uploadtip">只能上传excel文件</p>
        <!--</el-upload>-->
        <p class="download-template">
            <a class="btn-download" @click="download">
                <i class="icon-download"></i>下载模板</a>
        </p>
        <!--</p>-->
        <p :class="{'import-failure': importFlag === 2, 'hide-dialog': importFlag !== 2}" ></p>
        <p class="failure-tips">
            <i class="el-icon-warning"></i>导入失败</p>
        <p class="failure-reason">
        <h4>失败原因</h4>
        <ul>
            <li v-for="(error,index) in errorResults" :key="index">第{{error.rowIdx + 1}}行，错误：{{error.column}},{{error.value}},{{error.errorInfo}}</li>
        </ul>
    </el-dialog>
        <h2>{{this.$store.state.SonData.reports}}</h2>
        <h2>{{this.$store.state.SonData.freights}}</h2>
    </div>
</template>
<script>
  import * as scheduleApi from '../api/schedule.js'
  export default {
    data() {
      return {
        tableData3: [
          {
            date: "2016-05-03",
            name: "王小虎",
            address: "上海市普陀区金沙江路 1518 弄"
          },
          {
            date: "2016-05-02",
            name: "王小虎",
            address: "上海市普陀区金沙江路 1518 弄"
          },
          {
            date: "2016-05-04",
            name: "王小虎",
            address: "上海市普陀区金沙江路 1518 弄"
          },
          {
            date: "2016-05-01",
            name: "王小虎",
            address: "上海市普陀区金沙江路 1518 弄"
          },
          {
            date: "2016-05-08",
            name: "王小虎",
            address: "上海市普陀区金沙江路 1518 弄"
          },
          {
            date: "2016-05-06",
            name: "王小虎",
            address: "上海市普陀区金沙江路 1518 弄"
          },
          {
            date: "2016-05-07",
            name: "王小虎",
            address: "上海市普陀区金沙江路 1518 弄"
          }
        ],
        multipleSelection: [],
        importUrl:'www.baidu.com',//后台接口config.admin_url+'rest/schedule/import/'
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
      };
    },
    methods: {
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
        //复选框选择回填函数,val返回一整行的数据
        this.multipleSelection = val;
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
      //下载模板
      download() {
        //调用后台模板方法,和导出类似
        scheduleApi.downloadTemplate()
      },
    }
  };
</script>
<style scoped>
    .hide-dialog{
        display:none;
    }
</style>
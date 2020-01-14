<!--
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
    &lt;!&ndash; 导入 &ndash;&gt;
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
                &lt;!&ndash; 是否支持发送cookie信息 &ndash;&gt;
                <el-button size="small" type="primary" :disabled="processing">{{uploadTip}}</el-button>
        <p slot="tip" class="el-uploadtip">只能上传excel文件</p>
        &lt;!&ndash;</el-upload>&ndash;&gt;
        <p class="download-template">
            <a class="btn-download" @click="download">
                <i class="icon-download"></i>下载模板</a>
        </p>
        &lt;!&ndash;</p>&ndash;&gt;
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
</style>-->
<!--这个组件主要用来研究upload这个elementui的上传插件组件-->

<!--<template>
    <el-upload class="upload-demo" action="" ref="upload" :auto-upload='false' :on-change='changeUpload' accept="image/jpeg,image/gif,image/png,image/bmp">
        <div size="small" class="upload_btn"><div style="height:40px"></div><i class="iconfont icon-jiahao"></i><p style="line-height:0">点击上传</p></div>
    </el-upload>
</template>
<script>
  export default {
    name: 'regShopImg',
    data () {
      return {
        imageUrl: '',
        imgthing: {}
      }
    },
    props: ['imgN', 'nameN'],
    methods: {
      changeUpload (file, fileList) {
        console.log(file)
        // 判断图片大小
        if (fileList[0].size < 1100000) {
          // 判断图片格式是否为jpg,png,jepg,gif
          var fileName=fileList[0].name
          // var suffixIndex=fileName.lastIndexOf(".")
          // var suffix=fileName.substring(suffixIndex+1).toUpperCase()
          var suffix = fileName.substring(fileName.lastIndexOf(".")+1).toUpperCase()
          if (suffix=="BMP"||suffix=="JPG"||suffix=="JPEG"||suffix=="PNG"||suffix=="GIF") {
            this.fileList = fileList
            this.$nextTick(
              () => {
                var i = this.imgN
                let uploadLists = document.getElementsByClassName('el-upload-list')
                let uploadListsN = uploadLists[i]
                let uploadListLi = uploadListsN.children
                uploadListsN.setAttribute('style', 'position: absolute;height: 160px;margin-top: 0;margin-left: 300px;width: 260px;overflow: hidden')
                let liA = uploadListLi[0]
                // 试着获取bolb里面的数据&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;S
                //获取图片的Blob值
                function getImageBlob(url, cb) {
                  var xhr          = new XMLHttpRequest()
                  xhr.open("get", url, true)
                  xhr.responseType = "blob"
                  xhr.onload       = function() {
                    if (this.status == 200) {
                      if(cb) cb(this.response)
                    }
                  }
                  xhr.send()
                }
                function preView(url){
                  let reader    = new FileReader()
                  getImageBlob(url, function(blob){
                    reader.readAsDataURL(blob)
                  })
                  reader.onload = function(e) {
                    // 获取bolb里面数据时,生成预览
                    var img = document.createElement("img")
                    img.src = e.target.result
                    // 获取bolb里面数据时,生成预览
                    let imgElement = document.createElement('img')
                    imgElement.setAttribute('src', fileList[0].url)
                    imgElement.setAttribute('style', 'max-width:100%;padding-left:0')
                    if (liA.lastElementChild.nodeName !== 'IMG') {
                      liA.appendChild(imgElement)
                    }
                    // 把base64的信息放到imgthing的file里
                    file.base64 = e.target.result
                  }
                }
                preView(fileList[0].url)
                // 试着获取bolb里面的数据-&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;E
                // 不获取bolb里面数据时,生成预览
                // let imgElement = document.createElement('img')
                // imgElement.setAttribute('src', fileList[0].url)
                // imgElement.setAttribute('style', 'max-width:100%;padding-left:0')
                // if (liA.lastElementChild.nodeName !== 'IMG') {
                //   liA.appendChild(imgElement)
                // }
              }
            )
            // 修改nameN名字对应的数据,在一个页面使用多个不同字段图片上传，为了复用组件
            if (this.nameN === 'identityCard_Z') {
              this.imgthing.identityCard_Z = file
            }
            if (this.nameN === 'identityCard_F') {
              this.imgthing.identityCard_F = file
            }
            if (this.nameN === 'identityCard_S') {
              this.imgthing.identityCard_S = file
            }
            this.$emit('imgthing', this.imgthing)
          } else {
            this.$message.error('文件类型不正确,请重新上传！')
          }
        } else {
          this.$message.error('图片大小超过1M,请重新上传')
        }
      }
    }
  }
</script>

<style scoped lang="scss">
    // 上传
    .upload-demo{width:260px;height:160px;
        .upload_btn{width:260px;height:160px;background:#f2f2f2}
        .el-upload__tip{margin:0;float:left}
    }
</style>
-->
<template>
    <el-transfer
            filterable
            :filter-method="filterMethod"
            filter-placeholder="请输入城市拼音"
            v-model="value2"
            :data="data2">
    </el-transfer>
</template>

<script>
  export default {
    data() {
      const generateData2 = _ => {
        const data = [];
        const cities = ['上海', '北京', '广州', '深圳', '南京', '西安', '成都'];
        const pinyin = ['shanghai', 'beijing', 'guangzhou', 'shenzhen', 'nanjing', 'xian', 'chengdu'];
        cities.forEach((city, index) => {
          data.push({
            label: city,
            key: index,
            pinyin: pinyin[index]
          });
        });
        return data;
      };
      return {
        data2: generateData2(),
        value2: [],
        filterMethod(query, item) {
          return item.pinyin.indexOf(query) > -1;
        }
      };
    }
  };
</script>
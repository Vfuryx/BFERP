<template>
    <div>
        <v-tabs :table-key="tableKey" :url="url" @edit="edit" ref="tabs" :title="title" :rule-form="ruleForm" :rules="rules" :add-arr="addArr"></v-tabs>
    </div>
</template>
<script>
  export default {
    data() {
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
            ent: this.doDelMore
          },
          {
            cnt: '刷新',
            icon: 'bf-refresh',
            ent: this.refresh
          }
        ],
        tableKey:[[
          {
            label: '报表文件',
            width: '220',
            prop: "file",
            holder: '请输入报表文件',
            type: 'text'
          },
          {
            label: '报表名称',
            width: '220',
            prop: "name",
            holder: '请输入报表名称',
            type: 'text'
          },
          {
            label: '报表格式',
            width: '200',
            prop: "paper_format",
            holder: '请输入报表格式',
            type: 'text'
          },
          {
            label: '状态',
            width: '220',
            prop: "status",
            holder: '请选择是否启用',
            type: 'select_stu'
          }
        ]],
        url:['/printreports'],
        title: ['添加报表格式'],
        ruleForm: [{
          file: '',
          name: '',
          paper_format: '',
          status: '1'
        }],
        rules: [{
          file: [
            {required: true, message: '请输入文件', trigger: 'blur'},
          ],
          name: [
            {required: true, message: '请输入报表名', trigger: 'blur'},
          ],
          paper_format: [
            {required: true, message: '请输入报表格式', trigger: 'blur'},
          ]
        }],
        addArr:[[
          {
            label: '报表文件',
            prop: 'file',
            holder: '请输入报表文件',
            type: 'text'
          },
          {
            label: '报表名称',
            prop: 'name',
            holder: '请输入报表名称',
            type: 'text'
          },
          {
            label: '报表格式',
            prop: 'paper_format',
            holder: '请输入报表格式',
            type: 'text'
          },
          {
            label: '状态',
            prop: 'status',
            holder: '请选择状态',
            type: 'select_stu'
          }
        ]]
      }
    },
    methods:{
      //新增
      addNew(){
        this.$store.dispatch('setShowAdd',true);
      },

      edit(row){
        let obj = {
          file: row.file,
          name: row.name,
          paper_format: row.paper_format,
          status: row.status
        };
        this.$store.dispatch('setRow',row);
        this.$store.dispatch('setUrl',this.url[0]+"/");
        this.$store.dispatch('doEdit',obj);
      },

      doDelMore(){
        this.$refs.tabs.$emit('delMore')
      },
      refresh(){
        this.$store.dispatch('refresh');
      },
    },
    mounted() {
      this.$store.dispatch('setTabs',false);
      this.$store.dispatch('setOpt',this.newOpt);
      let that = this;
      $(window).resize(() => {
        that.$store.dispatch('setOpt',that.newOpt);
      });
    }
  }
</script>
<template>
    <div>
        <my-table :table-key="tableKey" @edit="edit" ref="table" :url="url"></my-table>

        <!--新增-->
        <add-mask :showMask="showAdd" :title="title" :rule-form="ruleForm" :rules="rules" :add-arr="addArr" :url="url"></add-mask>
    </div>
</template>
<script>
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
        title: '新增',
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
        ]
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


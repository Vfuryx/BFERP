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
        tableKey:[
          [
            {
              label: '区域编码',
              width: '',
              prop: "code",
              holder:'请输入区域编码',
              type: 'text'
            },
            {
              label: '区域名称',
              width: '',
              prop: "name",
              holder: '请输入区域名称',
              type: 'text'
            },
            {
              label: '启用',
              width: '',
              prop: "status",
              holder: '请选择是否启用',
              type: 'select_def',
              doSort: true
            }
          ]
        ],
        url:['/logisticsareas'],
        title: ['新增区域'],
        ruleForm: [{
          code: '',
          name: '',
          status:'1'
        }],
        rules: [{
          code: [
            {required: true, message: '请输入区域编码', trigger: 'blur'},
          ],
          name: [
            {required: true, message: '请输入区域名称', trigger: 'blur'},
          ],
        }],
        addArr:[[
          {
            label:'区域代码',
            prop:'code',
            holder:'请输入区域代码',
            type: 'text'
          },
          {
            label:'区域名称',
            prop:'name',
            holder:'请输入区域名称',
            type: 'text'
          },
          {
            label:'状态',
            prop:'status',
            holder:'请选择是否启用',
            type: 'select_def'
          },
        ]]
      }
    },
    methods:{
      addNew(){
        this.$store.dispatch('setShowAdd',true);
      },
      edit(row){
        let obj = {
          id: row.id,
          code: row.markcode,
          name: row.markname,
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
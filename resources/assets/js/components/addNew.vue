<template>
    <div class="addNew">
        <div v-if="onlyInputs">
            <el-form :model="ruleForm" :rules="rules" :ref="newRef" label-width="100px" :class="{'half-form':halfForm}">
                <el-form-item v-for="(item,index) in addArr" :key="index" :label="item.label" :prop="item.prop">
                    <span v-if="item.type=='text'">
                        <span v-if="item.inProp">
                            <el-input v-model.trim="ruleForm[item.prop][item.inProp]" :placeholder="item.holder" :disabled="editSign?item.editChgAble:item.addChgAble"></el-input>
                        </span>
                        <span v-else>
                          <el-input v-model.trim="ruleForm[item.prop]" :placeholder="item.holder" :disabled="editSign?item.editChgAble:item.addChgAble"></el-input>
                        </span>
                    </span>
                    <span v-else-if="item.type=='tel'">
                       <el-input type="tel" v-model.trim="ruleForm[item.prop]" :placeholder="item.holder" :disabled="editSign?item.editChgAble:item.addChgAble"></el-input>
                    </span>
                    <span v-else-if="item.type=='number'">
                       <el-input type="number" v-model.trim="ruleForm[item.prop]" :placeholder="item.holder" :disabled="editSign?item.editChgAble:item.addChgAble"></el-input>
                    </span>
                    <span v-else-if="item.type=='url'">
                       <el-input type="url" v-model.trim="ruleForm[item.prop]" :placeholder="item.holder" :disabled="editSign?item.editChgAble:item.addChgAble"></el-input>
                    </span>
                    <span v-else-if="item.type=='pickColor'">
                       <el-color-picker v-model="ruleForm[item.prop]"></el-color-picker>
                    </span>
                    <span v-else-if="item.type=='select_stu'">
                        <el-select v-model.trim="ruleForm[item.prop]" :placeholder="item.holder" :disabled="editSign?item.editChgAble:item.addChgAble">
                        <el-option label="停用" value="0"></el-option>
                        <el-option label="启用" value="1"></el-option>
                    </el-select>
                    </span>
                    <span v-else-if="item.type=='select_def'">
                        <el-select v-model.trim="ruleForm[item.prop]" :placeholder="item.holder" :disabled="editSign?item.editChgAble:item.addChgAble">
                        <el-option label="否" value="0"></el-option>
                        <el-option label="是" value="1"></el-option>
                    </el-select>
                    </span>
                    <span v-else-if="item.type=='select'">
                        <el-select v-model.trim="ruleForm[item.prop]" :placeholder="item.holder" :disabled="editSign?item.editChgAble:item.addChgAble">
                               <span v-for="list in sonArr[item.stateVal]" :key="list.id">
                                    <el-option :label="list.name?list.name:list.nick" :value="list.id"></el-option>
                               </span>
                           </el-select>
                    </span>
                    <span v-else-if="item.type=='textarea'">
                         <el-input type="textarea" v-model.trim="ruleForm[item.prop]" :placehoder="item.holder"></el-input>
                    </span>
                    <span v-else-if="item.type=='cascader'">
                         <el-cascader
                                 size="large"
                                 :options="options"
                                 v-model="selectedOptions"
                                 @change="handleArea">
                         </el-cascader>
                    </span>
                    <span v-else-if="item.type=='checkbox'">
                            <el-checkbox v-model="ruleForm[item.prop]" :disabled="editSign?item.editChgAble:item.chgAble"></el-checkbox>
                    </span>
                    <span v-else-if="item.type=='img'">
                            <img :src="ruleForm[item.prop]">
                             <el-upload class="chgDiv" action="" :before-upload="beforeUpload">
                                     <el-button type="primary" icon="el-icon-edit" size="mini" class="chg" v-show="showChgBtn"></el-button>
                                 </el-upload>
                    </span>
                </el-form-item>
            </el-form>
        </div>
        <div v-else>
            <el-dialog :title="title" :visible.sync="showAdd" @close="close" :class="{'more-forms':moreForms}">
                <el-form :model="ruleForm" :rules="rules" :ref="newRef" label-width="100px" :class="{'half-form':halfForm}">
                    <el-form-item v-for="(item,index) in addArr" :key="index" :label="item.label" :prop="item.prop">
                    <span v-if="item.type=='text'">
                         <span v-if="item.inProp">
                            <el-input v-model.trim="ruleForm[item.prop][item.inProp]" :placeholder="item.holder" :disabled="editSign?item.editChgAble:item.addChgAble"></el-input>
                        </span>
                        <span v-else>
                          <el-input v-model.trim="ruleForm[item.prop]" :placeholder="item.holder" :disabled="editSign?item.editChgAble:item.addChgAble"></el-input>
                    </span>
                    </span>
                        <span v-if="item.type=='tel'">
                       <el-input type="tel" v-model.trim="ruleForm[item.prop]" :placeholder="item.holder" :disabled="editSign?item.editChgAble:item.addChgAble"></el-input>
                    </span>
                        <span v-else-if="item.type=='number'">
                       <el-input type="number" v-model.trim="ruleForm[item.prop]" :placeholder="item.holder" :disabled="editSign?item.editChgAble:item.addChgAble"></el-input>
                    </span>
                        <span v-else-if="item.type=='url'">
                       <el-input type="url" v-model.trim="ruleForm[item.prop]" :placeholder="item.holder" :disabled="editSign?item.editChgAble:item.addChgAble"></el-input>
                    </span>
                        <span v-else-if="item.type=='pickColor'">
                       <el-color-picker v-model="ruleForm[item.prop]"></el-color-picker>
                    </span>
                        <span v-else-if="item.type=='select_stu'">
                        <el-select v-model.trim="ruleForm[item.prop]" :placeholderer="item.holder" :disabled="editSign?item.editChgAble:item.addChgAble">
                        <el-option label="停用" value="0"></el-option>
                        <el-option label="启用" value="1"></el-option>
                    </el-select>
                    </span>
                        <span v-else-if="item.type=='select_def'">
                        <el-select v-model.trim="ruleForm[item.prop]" :placeholderer="item.holder" :disabled="editSign?item.editChgAble:item.addChgAble">
                        <el-option label="否" value="0"></el-option>
                        <el-option label="是" value="1"></el-option>
                    </el-select>
                    </span>
                        <span v-else-if="item.type=='select'">
                             <el-select v-model="ruleForm[item.prop]" :placeholder="item.holder" :disabled="editSign?item.editChgAble:item.addChgAble">
                                      <span v-for="list in sonArr[item.stateVal]" :key="list.id">
                                    <el-option :label="list.name?list.name:list.nick" :value="list.id"></el-option>
                               </span>
                           </el-select>
                    </span>
                        <span v-else-if="item.type=='textarea'">
                         <el-input type="textarea" v-model.trim="ruleForm[item.prop]" :placehode="item.holder"></el-input>
                    </span>
                        <span v-else-if="item.type=='cascader'">
                         <el-cascader
                                 size="large"
                                 :options="options"
                                 v-model="selectedOptions"
                                 @change="handleArea">
                         </el-cascader>
                    </span>
                        <span v-else-if="item.type=='checkbox'">
                            <el-checkbox v-model="ruleForm[item.prop]" :disabled="editSign?item.editChgAble:item.chgAble"></el-checkbox>
                        </span>
                        <span v-else-if="item.type=='img'">
                           <img :src="ruleForm[item.prop]">
                             <el-upload class="chgDiv" action="" :before-upload="beforeUpload">
                                     <el-button type="primary" icon="el-icon-edit" size="mini" class="chg" v-show="showChgBtn"></el-button>
                                 </el-upload>
                        </span>
                    </el-form-item>
                </el-form>
                <div slot="footer" class="dialog-footer">
                    <el-button type="primary" @click="submitForm(newRef,url)">{{this.leftTab?this.leftTab:'添加'}}</el-button>
                    <el-button @click="resetForm(newRef)">重置</el-button>
                </div>
            </el-dialog>
        </div>
    </div>
</template>
<script>
  import { regionDataPlus,CodeToText } from 'element-china-area-data'
  import { mapGetters } from 'vuex'
  export default {
    props: ['visibleAdd','title', 'ruleForm', 'rules', 'addArr','submitData','url','newRef','halfForm','selects','leftTab','moreForms','onlyInputs','hasSelect','editSign','showChgBtn'],
    data() {
      return {
        showAdd: false,
        options: regionDataPlus,
        selectedOptions: [],
        newArr:[],
      }
    },
    watch:{
      visibleAdd:function(newValue){
        this.showAdd = newValue
      },
    },
    computed:{
      sonArr:{
        get:function(){
          return this.$store.state.responseData
        },
        set:function(){}
      },
    },
    created () {},
    methods: {
      submitForm(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            this.$emit('submitEvent');
          } else {
            console.log('error submit!!');
            return false;
          }
        });
      },
      resetForm(formName) {
        this.$refs[formName].resetFields();
      },
      close(){
        this.resetForm(this.newRef);
        this.$emit('CB-dialog',false)
      },
      handleArea (value) {
        this.$emit('handleArea',value)
      },
      changeVal(val,indexNum){
        this.newArr={};
        this.newArr[indexNum] = this.$store.state.responseData[val];
      },
      beforeUpload(file){
        this.$emit('componentBfUpload',file)
      },
    },
    mounted(){}
  }
</script>
<style>

</style>

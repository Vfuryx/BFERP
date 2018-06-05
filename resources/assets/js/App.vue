<template>
    <div>
        <h1>hello,{{msg}}</h1>
        <router-view></router-view>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                msg: 'vue'
            }
        }
    }
</script>
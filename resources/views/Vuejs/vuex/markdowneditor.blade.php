//url
https://vuejsexamples.com/vue-markdown-editor-component-for-vue-js/
///////////////////////in app.js
import 'v-markdown-editor/dist/v-markdown-editor.css';
import Vue from 'vue'
import Editor from 'v-markdown-editor'
// global register
Vue.use(Editor);

////////instALL
npm install --save @fortawesome/fontawesome-free

<template>
    <div class="container">
        <markdown-editor v-model="value"></markdown-editor>
    </div>
</template>


<script>
   
    export default {

        data() {
            return {
                value: 'Hello world!'
            }

        }

    }

</script>
<template>
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card card-default">
              <div class="card-header">Create Blog Component</div>

              <div class="card-body">
                  I'm the Create Component component.
              </div>

                <ckeditor
                    :editor="editor"
                    v-model="editorData"
                    :config="editorConfig"
                ></ckeditor>
              <button @click="check()">Check</button>
          </div>
      </div>
  </div>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import UploadAdapter from "../utils/UploadAdapter";
export default {
    data() {
        return {
            editorData: '',
            editor: ClassicEditor,
            editorConfig: {
                extraPlugins: [this.uploader],
            },
        }
    },
    mounted() {
        console.log('Component create mounted.')
        // console.log(this.$CKEditor);
    },
    methods: {
        uploader(editor) {
            editor.plugins.get("FileRepository").createUploadAdapter = (loader) => {
                return new UploadAdapter(loader);
            };
        },
        check() {
            console.log(this.editorData);
        },
    },
}
</script>
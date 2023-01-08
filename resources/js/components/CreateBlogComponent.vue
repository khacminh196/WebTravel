<template>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">Create Blog</div>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Image</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="form-group">
                    <label for="ckeditor">Body</label>
                    <!-- <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor> -->
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</template>

<script>
// import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
// import UploadAdapter from "../utils/UploadAdapter";
export default {
    data() {
        return {
            // editorData: '',
            // editor: ClassicEditor,
            // editorConfig: {
            //     extraPlugins: [this.uploader],
            // },
        }
    },
    mounted() {
        console.log('Component create mounted.')
        // console.log(this.$CKEditor);
    },
    methods: {
        // uploader(editor) {
        //     editor.plugins.get("FileRepository").createUploadAdapter = (loader) => {
        //         return new UploadAdapter(loader);
        //     };
        // },
        check() {
            console.log(this.editorData);
        },
    },
}
</script>

<style lang="scss">
.card-default {
    padding: 10px;
}
</style>

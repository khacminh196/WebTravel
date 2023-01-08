@extends('admin.index')
@section('content')
<form action="{{ route('admin.blog.update', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
	@csrf
    <img src="{{ asset($data->image_link) }}" id="image" alt="">
	<input type="file" name="image" id="image_input" onchange="changeImage()"><br>
	Title: <input type="text" name="title" value="{{ $data->title }}"><br>
	Description: <textarea name="description" cols="30" rows="10">{{ $data->description }}</textarea><br>
	Body: <textarea name="body" id="editor">
        {{ $data->body }}
    </textarea>
	<button>Submit</button>
</form>

<script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
<script>
	class MyUploadAdapter {
		constructor(loader) {
			this.loader = loader;
		}

		upload() {
			return this.loader.file
				.then(file => new Promise((resolve, reject) => {
					this._initRequest();
					this._initListeners(resolve, reject, file);
					this._sendRequest(file);
				}));
		}

		abort() {
			if (this.xhr) {
				this.xhr.abort();
			}
		}

		_initRequest() {
			const xhr = this.xhr = new XMLHttpRequest();

			xhr.open('POST', "{{route('upload', ['_token' => csrf_token() ])}}", true);
			xhr.responseType = 'json';
		}

		_initListeners(resolve, reject, file) {
			const xhr = this.xhr;
			const loader = this.loader;
			const genericErrorText = `Couldn't upload file: ${ file.name }.`;

			xhr.addEventListener('error', () => reject(genericErrorText));
			xhr.addEventListener('abort', () => reject());
			xhr.addEventListener('load', () => {
				const response = xhr.response;

				if (!response || response.error) {
					return reject(response && response.error ? response.error.message : genericErrorText);
				}

				resolve({
					default: response.data.url
				});
			});

			if (xhr.upload) {
				xhr.upload.addEventListener('progress', evt => {
					if (evt.lengthComputable) {
						loader.uploadTotal = evt.total;
						loader.uploaded = evt.loaded;
					}
				});
			}
		}

		_sendRequest(file) {
			const data = new FormData();

			data.append('upload', file);

			this.xhr.send(data);
		}
	}

	function MyCustomUploadAdapterPlugin(editor) {
		editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
			return new MyUploadAdapter(loader);
		};
	}

	ClassicEditor
		.create(document.querySelector('#editor'), {
			extraPlugins: [MyCustomUploadAdapterPlugin],
		})
		.catch(error => {
			console.error(error);
		});
</script>
<script>
    function changeImage() {
        let image = document.getElementById('image_input').files;
        document.getElementById('image').src = URL.createObjectURL(image[0]);
    }
</script>
@endsection
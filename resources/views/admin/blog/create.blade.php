@extends('admin.index')
@section('content')
<div class="comment-form-wrap pt-5">
	<h3 class="mb-5" style="font-size: 20px; font-weight: bold;">Create blog</h3>
	<form action="" method="post" enctype="multipart/form-data" class="p-5 bg-light">
		@csrf
		<div class="form-group">
			<label for="name">Image *</label>
			<input type="file" name="image">
		</div>
		<div class="form-group">
			<label for="name">Title *</label>
			<input type="text" name="title"><br>
		</div>
		<div class="form-group">
			<label for="email">Category *</label>
			<select name="category_id" id="">
				@foreach ($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="website">Description</label>
			<textarea name="description" id="message" cols="10" rows="4" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<label for="message">Body</label>
			<textarea name="body" id="editor"></textarea>
		</div>
		<div class="form-group">
			<input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
		</div>

	</form>
</div>

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
@endsection
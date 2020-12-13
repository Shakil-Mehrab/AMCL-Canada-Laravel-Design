https://github.com/yusufshakeel/tinymce
or
https://github.com/UniSharp/laravel-filemanager/blob/master/docs/installation.md


<!-- etuku enough -->
@section('js')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });

    </script>
@endsection



<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
</head>
</html>


<textarea name="content" class="form-control my-editor">{!! old('content') !!}</textarea>
<script>
  var editor_config = {
    path_absolute : "{{URL::to('/')}}/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>

 </body>
</html>
//git
composer require unisharp/laravel-filemanager:~1.8
//Add service providers
UniSharp\LaravelFilemanager\LaravelFilemanagerServiceProvider::class,
Intervention\Image\ImageServiceProvider::class,
//And add class aliases
'Image' => Intervention\Image\Facades\Image::class,
//git
php artisan vendor:publish --tag=lfm_config
php artisan vendor:publish --tag=lfm_public

//config/lfm.php
<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Routing
    |--------------------------------------------------------------------------
    */

    // Include to pre-defined routes from package or not. Middlewares
    'use_package_routes' => true,

    // Middlewares which should be applied to all package routes.
    // For laravel 5.1 and before, remove 'web' from the array.


    'middlewares' => ['web'],//changed by shakil



    // The url to this package. Change it if necessary.
    'url_prefix' => 'laravel-filemanager',

    /*
    |--------------------------------------------------------------------------
    | Multi-User Mode
    |--------------------------------------------------------------------------
    */

    // If true, private folders will be created for each signed-in user.


    'allow_multi_user' => false,//changed by shakil


    // If true, share folder will be created when allow_multi_user is true.
    'allow_share_folder' => true,

    // Flexible way to customize client folders accessibility
    // If you want to customize client folders, publish tag="lfm_handler"
    // Then you can rewrite userField function in App\Handler\ConfigHander class
    // And set 'user_field' to App\Handler\ConfigHander::class
    // Ex: The private folder of user will be named as the user id.
    'user_field' => UniSharp\LaravelFilemanager\Handlers\ConfigHandler::class,

    /*
    |--------------------------------------------------------------------------
    | Working Directory
    |--------------------------------------------------------------------------
    */

    // Which folder to store files in project, fill in 'public', 'resources', 'storage' and so on.
    // You should create routes to serve images if it is not set to public.
    'base_directory' => 'public',



    'images_folder_name' => 'public/photos',//changed by shakil
    'files_folder_name'  => 'public/files',//changed by shakil


    'shared_folder_name' => 'shares',
    'thumb_folder_name'  => 'thumbs',

    /*
    |--------------------------------------------------------------------------
    | Startup Views
    |--------------------------------------------------------------------------
    */

    // The default display type for items.
    // Supported: "grid", "list"
    'images_startup_view' => 'grid',
    'files_startup_view' => 'list',

    /*
    |--------------------------------------------------------------------------
    | Upload / Validation
    |--------------------------------------------------------------------------
    */

    // If true, the uploaded file will be renamed to uniqid() + file extension.


    'rename_file' => false,//changed by shakil



    // If rename_file set to false and this set to true, then non-alphanumeric characters in filename will be replaced.



    'alphanumeric_filename' => true,//changed by shakil




    // If true, non-alphanumeric folder name will be rejected.
    'alphanumeric_directory' => false,

    // If true, the uploading file's size will be verified for over than max_image_size/max_file_size.
    'should_validate_size' => false,

    'max_image_size' => 50000,
    'max_file_size' => 50000,

    // If true, the uploading file's mime type will be valid in valid_image_mimetypes/valid_file_mimetypes.
    'should_validate_mime' => false,

    // available since v1.3.0
    'valid_image_mimetypes' => [
        'image/jpeg',
        'image/pjpeg',
        'image/png',
        'image/gif',
        'image/svg+xml',
    ],

    // If true, image thumbnails would be created during upload
    'should_create_thumbnails' => true,

    // Create thumbnails automatically only for listed types.
    'raster_mimetypes' => [
        'image/jpeg',
        'image/pjpeg',
        'image/png',
    ],

    // permissions to be set when create a new folder or when it creates automatically with thumbnails
    'create_folder_mode' => 0755,

    // permissions to be set on file upload.
    'create_file_mode' => 0644,
    
    // If true, it will attempt to chmod the file after upload
    'should_change_file_mode' => true,

    // available since v1.3.0
    // only when '/laravel-filemanager?type=Files'
    'valid_file_mimetypes' => [
        'image/jpeg',
        'image/pjpeg',
        'image/png',
        'image/gif',
        'image/svg+xml',
        'application/pdf',
        'text/plain',
    ],

    /*
    |--------------------------------------------------------------------------
    | Image / Folder Setting
    |--------------------------------------------------------------------------
    */

    'thumb_img_width' => 200,
    'thumb_img_height' => 200,

    /*
    |--------------------------------------------------------------------------
    | File Extension Information
    |--------------------------------------------------------------------------
    */

    'file_type_array' => [
        'pdf'  => 'Adobe Acrobat',
        'doc'  => 'Microsoft Word',
        'docx' => 'Microsoft Word',
        'xls'  => 'Microsoft Excel',
        'xlsx' => 'Microsoft Excel',
        'zip'  => 'Archive',
        'gif'  => 'GIF Image',
        'jpg'  => 'JPEG Image',
        'jpeg' => 'JPEG Image',
        'png'  => 'PNG Image',
        'ppt'  => 'Microsoft PowerPoint',
        'pptx' => 'Microsoft PowerPoint',
    ],

    'file_icon_array' => [
        'pdf'  => 'fa-file-pdf-o',
        'doc'  => 'fa-file-word-o',
        'docx' => 'fa-file-word-o',
        'xls'  => 'fa-file-excel-o',
        'xlsx' => 'fa-file-excel-o',
        'zip'  => 'fa-file-archive-o',
        'gif'  => 'fa-file-image-o',
        'jpg'  => 'fa-file-image-o',
        'jpeg' => 'fa-file-image-o',
        'png'  => 'fa-file-image-o',
        'ppt'  => 'fa-file-powerpoint-o',
        'pptx' => 'fa-file-powerpoint-o',
    ],

    /*
    |--------------------------------------------------------------------------
    | php.ini override
    |--------------------------------------------------------------------------
    |
    | These values override your php.ini settings before uploading files
    | Set these to false to ingnore and apply your php.ini settings
    |
    | Please note that the 'upload_max_filesize' & 'post_max_size'
    | directives are not supported.
    */
    'php_ini_overrides' => [
        'memory_limit'        => '256M',
    ],

];
//double quote removing
https://stackoverflow.com/questions/12111887/how-to-remove-double-quotes-from-a-string?fbclid=IwAR3mV0M1uQjUjm0h2cZzvv5i_qpqM1NZ0EtKjWwKGE6Ki5cK8-P3obKNPc0

@php echo str_replace('"', ' ',$product->detail); @endphp
@php echo ltrim($product->detail,'"'); @endphp
// in resourcwe
'short_description' =>  Str::limit(strip_tags($this->description), 200,'...'),

// in vue js
<div class="text" v-html="nDescrip"></div>
computed: {
    nDescrip() {
      return this.newsOne.description;
    }
  }


// forala
https://froala.com/wysiwyg-editor/examples/textarea/
// source are in zip in public folder
    <link rel="stylesheet" href="{{ asset('forala/css/froala_editor.pkgd.min.css') }}">
    <textarea id="froala-editor">Initialize the Froala WYSIWYG HTML Editor on a textarea.</textarea>

    <script type="text/javascript" src="{{ asset('forala/js/froala_editor.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js">
    </script>
    <script>
        new FroalaEditor('textarea#froala-editor', {
            documentReady: true
        })

    </script>



// ck editor
https://unisharp.github.io/laravel-filemanager/integration
https://unisharp.github.io/laravel-filemanager/
<form wire:submit.prevent="create"  >
    <div >
        <input type="text" wire:model="title" class="form-control" /><br>
    </div>
    <div wire:ignore>
        <label for="">Short Description</label><br>
        <textarea id="my-editor" name="desc" wire:model="desc"
            class="form-control"></textarea><br>
    </div>

    <input type="submit" value="Submit" class="btn btn-success">
</form>
{{-- @push('scripts') --}}
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };

</script>
<script>
    CKEDITOR.replace('my-editor').on('change',function(e){
        @this.set('desc',e.editor.getData());
    });

</script>
{{-- @endpush --}}

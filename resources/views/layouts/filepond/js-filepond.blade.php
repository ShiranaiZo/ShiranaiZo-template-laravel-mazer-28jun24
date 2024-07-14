<script src="{{ asset('assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}"></script>
<script src="{{ asset('assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}"></script>
<script src="{{ asset('assets/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js') }}"></script>
<script src="{{ asset('assets/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}"></script>
<script src="{{ asset('assets/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js') }}"></script>
<script src="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
<script src="{{ asset('assets/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js') }}"></script>
<script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
<script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
<script src="{{ asset('assets/static/js/pages/filepond.js') }}"></script>

<script>
    FilePond.create(document.querySelector(".image-preview-filepond"), {
        credits: null,
        allowImagePreview: true,
        allowImageFilter: false,
        allowImageExifOrientation: false,
        allowImageCrop: false,
        acceptedFileTypes: ["image/png", "image/jpg", "image/jpeg"],
        labelIdle: `
            Drag & Drop your files or <span class="filepond--label-action" tabindex="0">Browse</span>
        `,
        fileValidateTypeDetectType: (source, type) =>
            new Promise((resolve, reject) => {
            resolve(type)
            }),
        storeAsFile: true,
    })
</script>

/*------------------------------------*\
    #FILE UPLOAD
\*------------------------------------*/

/* This allows us to style a html file upload element and display
    the filenames of the files that the user has selected to be uploaded.

    Note - code below reuqired the flag object be activated.

<div class="file-upload">
    <div class="flag">
        <div class="flag__component flag--top">
            <input type="file" class="file-upload__file js-file-upload__file" name="file-upload" id="file-upload" multiple>
            <label class="btn btn--md btn--alpha file-upload__label js-file-upload__label" for="file-upload">Bläddra</label>
        </div>
        <div class="flag__body flag--top">
            <ul class="bare-list push--left" id="files"></ul>
        </div>
    </div>
</div>


*/



// WW.fileUpload = function($) {
//     'use strict';
//     $('#file-upload').on('change', function() {
//         for (var i = 0; i < $(this).get(0).files.length; ++i) {
//             $('#files').append('<li>' + $(this).get(0).files[i].name +'</li>');
//         }
//     });
//     return this;
// };

// Place in main.js: .fileUpload($)


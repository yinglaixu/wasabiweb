WW.rentOut = function($){

    var id = 0;

    function init() {

        $('#attached-images').on('change', '.image-files', function () {
            var uniqueId;
            var file_element = $(this);
            uniqueId = 'input-' + id++;

            // Getting all the on-screen-images at this moment
            var images = $('.remove-image');
            var currentImages = $('.remove-current-image');
            var images_count = images.length + currentImages.length;

            if( images_count === 6 ) {

                alert('Max 6 images / Max 6 bilder');

            } else {

                // Ready to append a new <img> and write the chosen image to it.
                previewImage(this.files[0], uniqueId, file_element);
            }
        });

        $('#preview-images').on('click', '.remove-image', function() {
            var that = $(this);
            var fileInputId = that.data('id');
            $('#'+fileInputId).remove();
            that.fadeOut('fast', function(){
                that.remove();
            });
        });

        $('#landlordform').submit(function(e) {

            var from, to, sixMonthInMs, fromDate, toDate, imageCount;

            imageCount = $('ul#preview-images > li').length;
            from = document.getElementById('date-from').value;
            to = document.getElementById('date-to').value;
            sixMonthInMs = 15778476000;

            fromDate = new Date(from).getTime();
            toDate = new Date(to).getTime();


            if(imageCount < 3){
                alert('Heads Up! You will need to upload minimum 3 pictures of your home. This will help you to find more tenants. / Påminnelse! Du måste ladda upp minst 3 bilder på ditt objekt. Detta kommer hjälpa dig att hitta fler hyresgäster till ditt objekt.');
                e.preventDefault();
                e.stopPropagation();
            }

            else if( (toDate - fromDate) < sixMonthInMs ) {
                alert('The period must be more then 6 month / Uthyrningsperioden måste vara längre än 6 månader.');
                e.preventDefault();
                e.stopPropagation();
            }
            else{
                $('body').addClass('is-loading');
            }
        });
    }


    function previewImage(file, uniqueId, file_element) {

        var imgId, reader;
        imgId = uniqueId + '-img';

        if( file.type.match(/image.*/) ) {

            // Load image to FileReader
            reader = new FileReader();
            // When file is loaded to the memory
            reader.onload = function() {

                var image = new Image();
                // When image is loaded with a src file
                image.onload = function() {

                    var html, newImage, cloned;
                    var div = $('#attached-images');

                    html = `<li class="o-grid__item u-1/3 u-1/4@xs-up u-1/5@sm-up u-1/6@md-up remove-image" data-id="${uniqueId}">
                                <div class="c-svg-icon c-svg-icon--remove-img">
                                    <img src="" alt="" id="${imgId}" style="display: none">
                                    <svg class="c-svg-icon__svg c-svg-icon--remove-img__svg">
                                        <use xlink:href="http://localhost/renthia/wp-content/themes/wasabiweb/build/img/sprite.svg#icon-cross"></use>
                                    </svg>
                                </div>
                            </li>`;
                    $('#preview-images').append(html);

                    newImage = document.getElementById(imgId);
                    newImage.src = reader.result;

                    $('#'+imgId).fadeIn('fast');

                    // Clone the fileinput, the cloned element looses its filelist (ready to take in another file)
                    cloned = file_element.clone();
                    cloned.insertAfter(file_element);

                    // Stash (hide & move) the element with the chosen file(s)
                    file_element.hide();
                    file_element.appendTo(div);
                    $(file_element).attr({id: uniqueId, name: 'images[]'});

                };
                image.src = reader.result;
            };
            reader.readAsDataURL(file);

        } else {

            // console.warn('Invalid image');
        }
    }

    init();

    return this;
};

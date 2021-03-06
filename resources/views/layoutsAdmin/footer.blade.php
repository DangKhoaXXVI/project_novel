        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="{{ asset('template/admin/dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->
                <!-- Scripts -->

                <script type="text/javascript">
            const toggle = document.querySelector('.toggle');
            const main_all = document.querySelector('.main_all');

            toggle.onclick = function() {
                toggle.classList.toggle('active');
                main_all.classList.toggle('dark');

                var theme;

                if(toggle.classList.contains('active')) {
                    theme = "DARK";
                } else {
                    theme = "LIGHT";
                }

                localStorage.setItem("PageTheme", JSON.stringify(theme));
            }

            let GetTheme = JSON.parse(localStorage.getItem("PageTheme"));

            if(GetTheme === "DARK") {
                main_all.classList.toggle('dark');
                toggle.classList.toggle('active');
            }

        </script>
        
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('rating/starrr.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>        
        <script type="text/javascript">
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:false,
                autoplay: true,
                autoplayHoverPause: true,
                autoplayTimeout: 3000,
                smartSpeed: 500,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:4
                    }
                }
            })
        </script>
        <script type="text/javascript">
            $('.select-chapter').on('change', function(){
                var url = $(this).val();
                if(url) {
                    window.location = url;
                }
                return false;
            });

            current_chapter();
            function current_chapter() {
                var url = window.location.href;
                $('.select-chapter').find('option[value="' + url + '"]').attr("selected", true);
            }

        </script>

<script src="//cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('status'))
    <script>
        Swal.fire({
            icon: 'success',
            title: "{{ session('status') }}",
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif       
        
<!-- @if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'L???i...',
            text: '',
            showConfirmButton: false,
        })
    </script>
@endif -->

    <script type="text/javascript">
        CKEDITOR.replace('chapter_content');
        CKEDITOR.replace('summary_content');
        CKEDITOR.replace('comment_content');
        CKEDITOR.replace('topic_content');
    </script>


    <script type="text/javascript">
        flatpickr("#birthday-pk", {
            dateFormat: "d-m-Y",
        });
    </script>
    

    <script src="../rating/starrr.js"></script>

    <script>
        $('#star1').starrr({
        change: function(e, value){
            if (value) {
                // $('.your-choice-was').show();
                // $('.your-novel-is').show();
                $('.choice').text(value);
                $('#rating_star').val(value);
                $('#formRating').submit();
            } else {
                $('.your-choice-was').hide();
            }
        }
        });

        $('#star2').starrr({
        change: function(e, value){
            if (value) {
                Swal.fire({
                    icon: 'error',
                    title: 'Kh??ng th??? ????nh gi??...',
                    text: 'B???n c???n ????ng nh???p ????? ????nh gi??!',
                    showConfirmButton: false,
                    footer: '<a href="/log-in">????ng nh???p</a>'
                })
            } else {
                $('.your-choice-was').hide();
            }
        }
        });

    </script>
        
    <script>
        function submitFavorite() {
            $('#formFavorite').submit();
        }

        function submitFavoriteFail() {
            Swal.fire({
                icon: 'error',
                title: 'Kh??ng th??? th??m v??o y??u th??ch...',
                text: 'B???n c???n ????ng nh???p ????? th??m truy???n v??o danh s??ch y??u th??ch!',
                showConfirmButton: false,
                footer: '<a href="/log-in">????ng nh???p</a>'
            })
        }

        function submitRemoveFavoriteList() {
            $('#removeFormFavorite').submit();
        }


    </script>

    <script>
        let isShowCmt = true;
        $(document).on('click', '.do-reply', function(ev) {
            ev.preventDefault();
            var id = $(this).data('id');
            var reply_form = '.reply-form-' + id;
            if(isShowCmt) {
                $('.replyForm').slideUp();
                $(reply_form).slideDown();
                isShowCmt = false;
            }
            else {
                $(reply_form).slideUp();
                isShowCmt = true;
            }
        })
    </script>

    
    <script type="text/javascript">
        function ChangeToSlug()
            {
                var slug;
            
                //L???y text t??? th??? input title 
                slug = document.getElementById("slug").value;
                slug = slug.toLowerCase();
                //?????i k?? t??? c?? d???u th??nh kh??ng d???u
                    slug = slug.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'a');
                    slug = slug.replace(/??|??|???|???|???|??|???|???|???|???|???/gi, 'e');
                    slug = slug.replace(/i|??|??|???|??|???/gi, 'i');
                    slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'o');
                    slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???/gi, 'u');
                    slug = slug.replace(/??|???|???|???|???/gi, 'y');
                    slug = slug.replace(/??/gi, 'd');
                    //X??a c??c k?? t??? ?????t bi???t
                    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                    //?????i kho???ng tr???ng th??nh k?? t??? g???ch ngang
                    slug = slug.replace(/ /gi, "-");
                    //?????i nhi???u k?? t??? g???ch ngang li??n ti???p th??nh 1 k?? t??? g???ch ngang
                    //Ph??ng tr?????ng h???p ng?????i nh???p v??o qu?? nhi???u k?? t??? tr???ng
                    slug = slug.replace(/\-\-\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-/gi, '-');
                    //X??a c??c k?? t??? g???ch ngang ??? ?????u v?? cu???i
                    slug = '@' + slug + '@';
                    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                    //In slug ra textbox c?? id ???slug???
                document.getElementById('convert_slug').value = slug;
            }
    </script>

    <script type="text/javascript">
        function ChangeToSlugAuthor()
            {
                var slugAuthor;
            
                //L???y text t??? th??? input title 
                slugAuthor = document.getElementById("slug_author").value;
                slugAuthor = slugAuthor.toLowerCase();
                //?????i k?? t??? c?? d???u th??nh kh??ng d???u
                    slugAuthor = slugAuthor.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'a');
                    slugAuthor = slugAuthor.replace(/??|??|???|???|???|??|???|???|???|???|???/gi, 'e');
                    slugAuthor = slugAuthor.replace(/i|??|??|???|??|???/gi, 'i');
                    slugAuthor = slugAuthor.replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'o');
                    slugAuthor = slugAuthor.replace(/??|??|???|??|???|??|???|???|???|???|???/gi, 'u');
                    slugAuthor = slugAuthor.replace(/??|???|???|???|???/gi, 'y');
                    slugAuthor = slugAuthor.replace(/??/gi, 'd');
                    //X??a c??c k?? t??? ?????t bi???t
                    slugAuthor = slugAuthor.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                    //?????i kho???ng tr???ng th??nh k?? t??? g???ch ngang
                    slugAuthor = slugAuthor.replace(/ /gi, "-");
                    //?????i nhi???u k?? t??? g???ch ngang li??n ti???p th??nh 1 k?? t??? g???ch ngang
                    //Ph??ng tr?????ng h???p ng?????i nh???p v??o qu?? nhi???u k?? t??? tr???ng
                    slugAuthor = slugAuthor.replace(/\-\-\-\-\-/gi, '-');
                    slugAuthor = slugAuthor.replace(/\-\-\-\-/gi, '-');
                    slugAuthor = slugAuthor.replace(/\-\-\-/gi, '-');
                    slugAuthor = slugAuthor.replace(/\-\-/gi, '-');
                    //X??a c??c k?? t??? g???ch ngang ??? ?????u v?? cu???i
                    slugAuthor = '@' + slugAuthor + '@';
                    slugAuthor = slugAuthor.replace(/\@\-|\-\@|\@/gi, '');
                    //In slug ra textbox c?? id ???slug???
                document.getElementById('convert_slug_author').value = slugAuthor;
            }
    </script>

<script type="text/javascript">
        function ChangeToSlugTopicTitle()
            {
                var slugTopicTitle;
            
                //L???y text t??? th??? input title 
                slugTopicTitle = document.getElementById("slug_title").value;
                slugTopicTitle = slugTopicTitle.toLowerCase();
                //?????i k?? t??? c?? d???u th??nh kh??ng d???u
                    slugTopicTitle = slugTopicTitle.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'a');
                    slugTopicTitle = slugTopicTitle.replace(/??|??|???|???|???|??|???|???|???|???|???/gi, 'e');
                    slugTopicTitle = slugTopicTitle.replace(/i|??|??|???|??|???/gi, 'i');
                    slugTopicTitle = slugTopicTitle.replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'o');
                    slugTopicTitle = slugTopicTitle.replace(/??|??|???|??|???|??|???|???|???|???|???/gi, 'u');
                    slugTopicTitle = slugTopicTitle.replace(/??|???|???|???|???/gi, 'y');
                    slugTopicTitle = slugTopicTitle.replace(/??/gi, 'd');
                    //X??a c??c k?? t??? ?????t bi???t
                    slugTopicTitle = slugTopicTitle.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                    //?????i kho???ng tr???ng th??nh k?? t??? g???ch ngang
                    slugTopicTitle = slugTopicTitle.replace(/ /gi, "-");
                    //?????i nhi???u k?? t??? g???ch ngang li??n ti???p th??nh 1 k?? t??? g???ch ngang
                    //Ph??ng tr?????ng h???p ng?????i nh???p v??o qu?? nhi???u k?? t??? tr???ng
                    slugTopicTitle = slugTopicTitle.replace(/\-\-\-\-\-/gi, '-');
                    slugTopicTitle = slugTopicTitle.replace(/\-\-\-\-/gi, '-');
                    slugTopicTitle = slugTopicTitle.replace(/\-\-\-/gi, '-');
                    slugTopicTitle = slugTopicTitle.replace(/\-\-/gi, '-');
                    //X??a slugTopicTitlec??c k?? t??? g???ch ngang ??? ?????u v?? cu???i
                    slugTopicTitle = '@' + slugTopicTitle + '@';
                    slugTopicTitle = slugTopicTitle.replace(/\@\-|\-\@|\@/gi, '');
                    //In slug ra textbox c?? id ???slug???
                document.getElementById('convert_slug_title').value = slugTopicTitle;
            }
    </script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>        
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

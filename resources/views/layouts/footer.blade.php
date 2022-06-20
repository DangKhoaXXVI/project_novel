            <footer>
                <div class="container">
                    <span class="right-footer">Liên hệ: <a href="mailto:0306191431@caothang.edu.vn" target="_blank" style="color: #5fff46">Shinokawa</a></span>
                    <span class="left-footer">© ShinoNovel 2022 - Website đọc Tiểu Thuyết</span>
                </div>
            </footer>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>        
        <script type="text/javascript">
            $('.owl-carousel').owlCarousel({
                loop:false,
                margin:10,
                nav:false,
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

<script src="//cdn.ckeditor.com/4.19.0/full/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('chapter_content');
        CKEDITOR.replace('summary_content');
    </script>
    
    <script type="text/javascript">
        function ChangeToSlug()
            {
                var slug;
            
                //Lấy text từ thẻ input title 
                slug = document.getElementById("slug").value;
                slug = slug.toLowerCase();
                //Đổi ký tự có dấu thành không dấu
                    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                    slug = slug.replace(/đ/gi, 'd');
                    //Xóa các ký tự đặt biệt
                    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                    //Đổi khoảng trắng thành ký tự gạch ngang
                    slug = slug.replace(/ /gi, "-");
                    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                    slug = slug.replace(/\-\-\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-\-/gi, '-');
                    slug = slug.replace(/\-\-/gi, '-');
                    //Xóa các ký tự gạch ngang ở đầu và cuối
                    slug = '@' + slug + '@';
                    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                    //In slug ra textbox có id “slug”
                document.getElementById('convert_slug').value = slug;
            }
    </script>

    <script type="text/javascript">
        function ChangeToSlugAuthor()
            {
                var slugAuthor;
            
                //Lấy text từ thẻ input title 
                slugAuthor = document.getElementById("slug_author").value;
                slugAuthor = slugAuthor.toLowerCase();
                //Đổi ký tự có dấu thành không dấu
                    slugAuthor = slugAuthor.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                    slugAuthor = slugAuthor.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                    slugAuthor = slugAuthor.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                    slugAuthor = slugAuthor.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                    slugAuthor = slugAuthor.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                    slugAuthor = slugAuthor.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                    slugAuthor = slugAuthor.replace(/đ/gi, 'd');
                    //Xóa các ký tự đặt biệt
                    slugAuthor = slugAuthor.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                    //Đổi khoảng trắng thành ký tự gạch ngang
                    slugAuthor = slugAuthor.replace(/ /gi, "-");
                    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                    slugAuthor = slugAuthor.replace(/\-\-\-\-\-/gi, '-');
                    slugAuthor = slugAuthor.replace(/\-\-\-\-/gi, '-');
                    slugAuthor = slugAuthor.replace(/\-\-\-/gi, '-');
                    slugAuthor = slugAuthor.replace(/\-\-/gi, '-');
                    //Xóa các ký tự gạch ngang ở đầu và cuối
                    slugAuthor = '@' + slugAuthor + '@';
                    slugAuthor = slugAuthor.replace(/\@\-|\-\@|\@/gi, '');
                    //In slug ra textbox có id “slug”
                document.getElementById('convert_slug_author').value = slugAuthor;
            }
    </script>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        
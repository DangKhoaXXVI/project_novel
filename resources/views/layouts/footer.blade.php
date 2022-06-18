<footer style="background-color: #333; padding: 30px 10px;">
                <div class="container">
                    <span class="right" style="color: #fff; font-weight: 700; margin-right: 20px; float: right;">Liên hệ: <a href="mailto:0306191431@caothang.edu.vn" target="_blank" style="color: #5fff46">Shinokawa</a></span>
                    <span style="color: #fff; font-weight: 700; margin-right: 20px;">© ShinoNovel 2022 - Website đọc Tiểu Thuyết</span>
                </div>
            </footer>
        <!-- Scripts -->
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
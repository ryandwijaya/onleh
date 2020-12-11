
   
     </div>
    </div>

    
    <!--====================  footer area ====================-->
    <div class="footer-area">
        <div class="footer-copyright">
            <div class="container wide">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copyright-wrapper footer-copyright-wrapper--default-footer">
                            <div class="container">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-lg-2 col-md-2">
                                        <div class="footer-logo">
											<a href="<?= base_url() ?>">
												<img src="<?= base_url() ?>assets/frontend/img/logo.jpg" style="width: 25px;height: 25px;" class="img-fluid ml-2" alt="" width="80%"> <span class="font-weight-bold">NADHIRA NAPOLEON</span>
											</a>
                                        </div>
                                    </div>

                                    <div class="col-lg-7 col-md-5">

                                        <div class="copyright-text">

                                            Copyright &copy; <?= date('Y') ?> <a href="#" target="_blank">Astri</a>. All Rights Reserved.
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-5">
                                        <div class="copyright-social-wrapper">
                                            <ul class="copyright-social">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="search-overlay" id="search-overlay">
        <a href="javascript:void(0)" class="close-search-overlay" id="close-search-overlay">
            <i class="ion-ios-close-empty"></i>
        </a>

        <!--=======  search form  =======-->

        <div class="search-form">
            <form action="#">
                <input type="search" placeholder="Search entire store here ...">
                <button type="submit"><i class="ion-android-search"></i></button>
            </form>
        </div>

        <!--=======  End of search form  =======-->
    </div>

    <!--====================  End of search overlay  ====================-->
    <!--====================  quick view ====================-->

    
    <!--====================  End of quick view  ====================-->

    <!-- scroll to top  -->
    <div id="scroll-top">
        <span>Back to top</span><i class="ion-chevron-right"></i><i class="ion-chevron-right"></i>
    </div>
    <!-- end of scroll to top -->
    <!--=============================================
    =            JS files        =
    =============================================-->

    <!-- Vendor JS -->
    <script src="<?= base_url() ?>assets/frontend/js/vendors.js"></script>

    <!-- Active JS -->
    <script src="<?= base_url() ?>assets/frontend/js/active.js"></script>
    <script src="<?= base_url() ?>assets/frontend/js/produk/add-keranjang.js"></script>
    <script src="<?= base_url() ?>assets/frontend/js/rajaongkir/daerah.js"></script>
    <!--=====  End of JS files ======-->
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
    $(function() {
    var timeout = 3000; // in miliseconds (3*1000)

    $('.hide-it').delay(timeout).fadeOut(300);
    });
	$('.dropify').dropify();
    </script>
	 <script type="text/javascript">
		 $(document).ready(function(){
			 $('.form-checkbox').click(function(){
				 if($(this).is(':checked')){
					 $('.form-password').attr('type','text');
				 }else{
					 $('.form-password').attr('type','password');
				 }
			 });
		 });
	 </script>

</body>



</html>

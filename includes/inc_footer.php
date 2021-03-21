 <footer id="main_footer" class="bg-ft">
 	<div class="container">
	 	<div class="flex-ft">
			<div class="logo-ft" align="center">
				<a href="/" title="Trang chủ">
				<img src="/images/logo.webp" class="ft-logo" alt="ft-logo" ></a>
			</div>
			<div class="text-ft">
				<div class="lien_he">
					<h3>Liên Hệ</h3>
					<table border="0">
						<tr>
							<td><img class="mgr ft-ic" src="/images/mail-ic.svg" alt="mail-ic"></td>
							<td><p>Email: muathecaonhanh.net@gmail.com</p></td>
						</tr>
						<tr>
							<td><img class="mgr ft-ic" src="/images/phone-ic.svg" alt="phone-ic"></td>
							<td><p>SĐT: 0982600485</p></td>
						</tr>
						<tr>
							<td><img class="mgr ft-ic" src="/images/loca-ic.svg" alt="location-ic"></td>
							<td><p>Đ/c: 43 Chùa Hà, Định Trung, Vĩnh Yên, Vĩnh Phúc, Việt Nam</p></td>
						</tr>	
					</table>
				</div>
				<!-- <div class="doi_tac">
					<h3>Đối tác liên kết</h3>
					<a id="link_dt" href=" https://timviec365.vn"> https://timviec365.vn</a>
					<p class="">Website hỗ trợ tìm việc làm uy tín</p>
					<p class="">Tìm việc làm nhanh: <a href="">TẠI ĐÂY</a></p>
					<p class="">Tạo cv xin việc để ứng tuyển: <a href="">TẠI ĐÂY</a></p>
				</div> -->
			</div>
		</div>	
 	</div>	 
 </footer>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
		document.addEventListener("DOMContentLoaded", function() {
		  var lazyloadImages = document.querySelectorAll("img.lazy");    
		  var lazyloadThrottleTimeout;
		  
		  function lazyload () {
		    if(lazyloadThrottleTimeout) {
		      clearTimeout(lazyloadThrottleTimeout);
		    }    
		    
		    lazyloadThrottleTimeout = setTimeout(function() {
		        var scrollTop = window.pageYOffset;
		        lazyloadImages.forEach(function(img) {
		            if(img.offsetTop < (window.innerHeight + scrollTop)) {
		              img.src = img.dataset.src;
		              img.classList.remove('lazy');
		            }
		        });
		        if(lazyloadImages.length == 0) { 
		          document.removeEventListener("scroll", lazyload);
		          window.removeEventListener("resize", lazyload);
		          window.removeEventListener("orientationChange", lazyload);
		        }
		    }, 20);
		  }
		  
		  document.addEventListener("scroll", lazyload);
		  window.addEventListener("resize", lazyload);
		  window.addEventListener("orientationChange", lazyload);
		});
    </script>	
     
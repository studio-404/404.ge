<?php
@include("website/parts/top.php");
@include("website/parts/search.php");
?>
<main>
		<section class="product-view">
			<section class="product-image">
				<div class="img">
					<ul>
						<li class="prev" onclick="slider.prev(0)">
							<i class="fa fa-arrow-left" aria-hidden="true"></i>
						</li>
						<li class="img-item active">
							<img src="https://www.enterprise.com/content/dam/global-vehicle-images/cars/FORD_FOCU_2012-1.png" width="100%" alt="" height="520" />
						</li>
						<li class="img-item">
							<img src="https://images-na.ssl-images-amazon.com/images/I/41aB0EYi0fL._SX425_.jpg" width="100%" alt="" height="520" />
						</li>
						<li class="img-item">
							<img src="https://images-na.ssl-images-amazon.com/images/I/71BVmwyGwlS._UY500_.png" width="100%" alt="" height="520"/>
						</li>
						<li class="next" onclick="slider.next(0)">
							<i class="fa fa-arrow-right" aria-hidden="true"></i>
						</li>
						<li class="info"></li>
					</ul>
				</div>
			</section>
			<section class="product-details">
				<div class="info">
					<p class="stars">
						<i class="fa fa-star" aria-hidden="true" title="1 ვარსკვლავი"></i>
						<i class="fa fa-star" aria-hidden="true" title="2 ვარსკვლავი"></i>
						<i class="fa fa-star" aria-hidden="true" title="3 ვარსკვლავი"></i>
						<i class="fa fa-star-half-o" aria-hidden="true" title="4 ვარსკვლავი"></i>
						<i class="fa fa-star-o" aria-hidden="true" title="5 ვარსკვლავი"></i>
					</p>
				</div>
				<div class="info">
					<p><font># 5451515</font></p>
				</div>
				<div class="info">
					<p><font>მაგადი მაისური</font></p>
				</div>
				<div class="info">
					<p><b>დამატების თარიღი:</b> 26/07/2016</p>
				</div>
				<div class="info">
					<p><b>ღირებულება:</b> 300.00 GEL</p>
				</div>
				<div class="info">
					<p><b>მდგომარეობა:</b> ახალი</p>
				</div>
				<div class="info">
					<p><b>ეკრანის ზომა:</b> 27 ინჩი</p>
				</div>
				<div class="info">
					<p><b>ვიდეო ბარათი:</b> 512 MB</p>
				</div>
				<div class="info">
					<p><b>ოპერატიული მეხსიერება (RAM):</b> 2 GB</p>
				</div>
				<div class="info">
					<p><b>პროცესორის ტიპი:</b> Intel Core i7</p>
				</div>
				<div class="info">
					<p class="button">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
						&nbsp;წერილის მიწერა
					</p>
				</div>
				<div class="info">
					<p class="button">
						<i class="fa fa-heart" aria-hidden="true"></i>
						&nbsp;ფავორიტებში დამატება
					</p>
				</div>

				<div class="info">
					<p class="button">
						<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
						&nbsp;განცხადების გასაჩივრება
					</p>
				</div>

			</section>

			<section class="product-description">
				<div class="info">
					<p><b>აღწერა:</b></p>
				</div>
				<div class="info">
					<p>hp elitebook 8460p intel core i7 AMD radionis ძლიერი ვიდეო ბარათით 6gb ოპერატიული 320ვიჩესტერი,ეკრანის გაპართოება 1600/900 ძალიან მაგარი ლეპტოპი! ალუმინის მსუბუქი კორპუსი, არის იდეალურ მდგომარეობაში ახალივითაა. კომპიუტერი შემუშავებულია სამხედრო სტანდარტების დაცვით , ერთ-ერთი უძლიერესი მოდელი, ბიზნესკლასი, გადადით ლინკზე (https://www.youtube.com/watch?v=GIxECenyfR8) 320vinchesteri, . web cam,dwd/rw, usb ports, კლავიატურის განათება, ახალი ელემენტი. მოყვება დამტენი. ნახეთ ჩემი ყველა განცხადება! შესაძლებელია ადგილზე მიტანა, საკურიერო მომსახურება ფასიანია! შესაძლებელია "თი ბი სი" ბანკის 0% განვადება </p>
				</div>
			</section>

			<section class="product-map">
				<div class="info" style="margin:0 10px 10px 10px; line-height: 25px; color: #e57373;">
					<p><font>მდებარეობა: </font></p>
				</div>
				<div id="map"></div>
			    <script>
			      var map;
			      function initMap() {
			        var myLatLng = { lat: 41.689747753270375, lng: 44.79520250251619 };
			        map = new google.maps.Map(document.getElementById('map'), {
			          center: myLatLng,
			          zoom: 18
			        });		

			        var marker = new google.maps.Marker({
						position: myLatLng,
						map: map,
						icon: "<?=$c::WEBSITE?>/public/img/icon.png"
					});
			      }
			      initMap();
			    </script>
		</section>

		</section>
		
</main>
<div class="clear"></div>
<?php
@include("website/parts/bottom.php");
?>
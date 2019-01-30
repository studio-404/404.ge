<seclect class="mobile-detected"><b>რუკით ძიებისთვის გთხოვთ გადმოწეროთ მობილურის აპლიკაცია: <a href="" target="_blank">Android</a></b> <br /> <a href="<?=$c::WEBSITE?>">უკან დაბრუნება</a></seclect>
<section id="map"></section>
<section id="map-search">
	<section class="map-search-icon" onclick="website.showSearch('open')"><i class="fa fa-search" aria-hidden="true"></i></section>
	<section class="map-search-content">
		<form action="" method="get">
				<a href="<?=$c::WEBSITE?>" class="header-logo">
					<section class="logo"><i class="fa fa-barcode" aria-hidden="true"></i></section>
				</a>
					<label>კატეგორია: </label>
					<section class="select-box" id="icat1">
					<div class="selected">
						<span>აირჩიეთ</span> <i class="fa fa-arrow-down" aria-hidden="true"></i>
					</div>
					<select class="selector" data-selectbox="icat1" data-status="closed">
						<optgroup label="ავტო"> 
							<option>BMW</option>
							<option>BMW</option>
							<option>BMW</option>
						</optgroup>
						<optgroup label="ავტო">
							<option>უძრავი ქონება</option>
							<option>უძრავი ქონება</option>
							<option>უძრავი ქონება</option>
						</optgroup>
					</select>
				</section>
					<label>საკვანძო სიტყვა: </label>
					<input type="text" name="search" value="" />
					

					<label>ფასი:</label>
					<section class="range">
						<input type="text" name="" value="" placeholder="დან" />
						<input type="text" name="" value="" placeholder="მდე" />
					</section>

					<label>ოპერატიული მეხსიერება:</label>
					<section class="checkboxes-rounded active r" id="r1" onclick="website.checkboxCheckRounded('r','r1')">
						<section class="b"><i class="fa fa-check" aria-hidden="true"></i></section>
						<section class="t">1 გეგაბაიტი</section>
					</section>

					<section class="checkboxes-rounded r" id="r2" onclick="website.checkboxCheckRounded('r','r2')">
						<section class="b"><i class="fa fa-check" aria-hidden="true"></i></section>
						<section class="t">2 გეგაბაიტი</section>
					</section>

					<section class="checkboxes-rounded r" id="r3" onclick="website.checkboxCheckRounded('r','r3')">
						<section class="b"><i class="fa fa-check" aria-hidden="true"></i></section>
						<section class="t">12 გეგაბაიტი</section>
					</section>


					<label>მონიტორის ზომა: </label>
					<section class="checkboxes active" id="c1" onclick="website.checkboxCheck('c1')">
						<section class="b"><i class="fa fa-check" aria-hidden="true"></i></section>
						<section class="t">17 დიუმი</section>
					</section>
					<section class="checkboxes" id="c2" onclick="website.checkboxCheck('c2')">
						<section class="b"><i class="fa fa-check" aria-hidden="true"></i></section>
						<section class="t">18 დიუმი</section>
					</section>
					<section class="buttons">

						<a href="<?=$c::WEBSITE?>map?search=as" class="button" target="_blank">
							<i class="fa fa-map-marker" aria-hidden="true"></i> ძებნა
						</a>						
					</section>
				</form>
	</section>

</section>
<script type="text/javascript">
var marker_points = [
	[
		41.72303632446153, 
		44.80065275123445, 
		'<div id="iw-container">' +
		'<div class="iw-title">ფორდი 320 ძალიან იაფად</div>' +
		'<div class="iw-content">' +
		'<img src="https://www.enterprise.com/content/dam/global-vehicle-images/cars/FORD_FOCU_2012-1.png" alt="Porcelain Factory of Vista Alegre" width="150" />' +
		'<div class="iw-subTitle">35 000 GEL</div>' +
		'<p>იაპონური იდიალურ მდგომარეობაში...იაპონური იდიალურ მდგომარეობაში იაპონური იდიალურ მდგომარეობაში იაპონური იდიალურ მდგომარეობაში <br /><a href="http://404.ge/view/5151515">ნახვა</a></p>' +
		'<div class="iw-subTitle">'+
		'<i class="fa fa-star" aria-hidden="true" title="1 ვარსკვლავი"></i><i class="fa fa-star" aria-hidden="true" title="2 ვარსკვლავი"></i><i class="fa fa-star" aria-hidden="true" title="3 ვარსკვლავი"></i><i class="fa fa-star-half-o" aria-hidden="true" title="4 ვარსკვლავი"></i><i class="fa fa-star-o" aria-hidden="true" title="5 ვარსკვლავი"></i>'
		+'</div>' +
		'</div>' +
		'<div class="iw-bottom-gradient"></div>' +
		'</div>', 
		website.publicFolder + "img/icon2.png"
	],
	[
		41.74303632446153, 
		44.82065275123445, 
		'<div id="iw-container">' +
		'<div class="iw-title">ფორდი 320 ძალიან იაფად 222</div>' +
		'<div class="iw-content">' +
		'<img src="https://www.enterprise.com/content/dam/global-vehicle-images/cars/FORD_FOCU_2012-1.png" alt="Porcelain Factory of Vista Alegre" width="150" />' +
		'<div class="iw-subTitle">35 000 GEL</div>' +
		'<p>იაპონური იდიალურ მდგომარეობაში...იაპონური იდიალურ მდგომარეობაში იაპონური იდიალურ მდგომარეობაში იაპონური იდიალურ მდგომარეობაში <br /><a href="http://404.ge/view/5151515">ნახვა</a></p>' +
		'<div class="iw-subTitle">'+
		'<i class="fa fa-star" aria-hidden="true" title="1 ვარსკვლავი"></i><i class="fa fa-star" aria-hidden="true" title="2 ვარსკვლავი"></i><i class="fa fa-star" aria-hidden="true" title="3 ვარსკვლავი"></i><i class="fa fa-star-half-o" aria-hidden="true" title="4 ვარსკვლავი"></i><i class="fa fa-star-o" aria-hidden="true" title="5 ვარსკვლავი"></i>'
		+'</div>' +
		'</div>' +
		'<div class="iw-bottom-gradient"></div>' +
		'</div>', 
		website.publicFolder + "img/icon3.png"
	],
	[
		41.76303632446153, 
		44.84065275123445, 
		'<div id="iw-container">' +
		'<div class="iw-title">ფორდი 320 ძალიან იაფად 333</div>' +
		'<div class="iw-content">' +
		'<img src="https://www.enterprise.com/content/dam/global-vehicle-images/cars/FORD_FOCU_2012-1.png" alt="Porcelain Factory of Vista Alegre" width="150" />' +
		'<div class="iw-subTitle">35 000 GEL</div>' +
		'<p>იაპონური იდიალურ მდგომარეობაში...იაპონური იდიალურ მდგომარეობაში იაპონური იდიალურ მდგომარეობაში იაპონური იდიალურ მდგომარეობაში <br /><a href="http://404.ge/view/5151515">ნახვა</a></p>' +
		'<div class="iw-subTitle">'+
		'<i class="fa fa-star" aria-hidden="true" title="1 ვარსკვლავი"></i><i class="fa fa-star" aria-hidden="true" title="2 ვარსკვლავი"></i><i class="fa fa-star" aria-hidden="true" title="3 ვარსკვლავი"></i><i class="fa fa-star-half-o" aria-hidden="true" title="4 ვარსკვლავი"></i><i class="fa fa-star-o" aria-hidden="true" title="5 ვარსკვლავი"></i>'
		+'</div>' +
		'</div>' +
		'<div class="iw-bottom-gradient"></div>' +
		'</div>', 
		website.publicFolder + "img/icon1.png"
	],
];
website.mapInitialize(marker_points);
</script>
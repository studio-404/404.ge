<?php
@include("website/parts/top.php");
@include("website/parts/search.php");
@include("website/parts/navigation.php");

$make = new \lib\functions\form\make();
?>
<main>
		<section class="filter">
			<section class="box">
				<h2><i class="fa fa-list" aria-hidden="true"></i> <?=$lang->index("category")?></h2>
				<?=$cache->index("currentSlugTitle")?>
				<?=$cache->index("subNavCat")?>				
			</section>

			<section class="box">
				<h2><i class="fa fa-search-plus" aria-hidden="true"></i> გაფართოებული ძებნა</h2>
				<form action="" method="get">
					<p class="chosen">
						ნანახია: <span>526</span> განცხადება
					</p>
					
					<?php
					/* Search input */
					echo $make::label(array(
						"for"=>"search",
						"name"=>"საკვანძო სიტყვა",
						"require"=>"false"
					));
					echo $make::inputText(array(
						"name"=>"search",
						"id"=>"search",
						"class"=>"search",
						"value"=>"",
						"placeholder"=>"",
						"disabled"=>"false",
						"autocomplete"=>"off" 
					));

					/* Price Range */
					echo $make::label(array(
						"for"=>"fromname",
						"name"=>"ფასი",
						"require"=>"false"
					));
					echo $make::range(array(
						array(
							"name"=>"fromname",
							"id"=>"fromname",
							"class"=>"fromname",
							"value"=>"",
							"placeholder"=>"დან",
							"autocomplete"=>"off"
						),
						array(
							"name"=>"toname",
							"id"=>"toname",
							"class"=>"toname",
							"value"=>"",
							"placeholder"=>"მდე",
							"autocomplete"=>"off"
						)
					));

					/* round checkboxes */
					echo $make::label(array(
						"for"=>"memory",
						"name"=>"ოპერატიული მეხსიერება",
						"require"=>"false"
					));
					echo $make::roundCheckboxes(array(
						"id"=>"memory",
						"name"=>"memory",
						"mainClass" => "memory",
						"items" => array(
							array("baseid" => "5", "title" => "1 გეგაბაიტი"), 
							array("baseid" => "8", "title" => "2 გეგაბაიტი"), 
							array("baseid" => "10", "title" => "3 გეგაბაიტი")  
						)
					), 10);
					?>



					<!-- <label>მონიტორის ზომა: </label> -->
					<?php
					echo $make::label(array(
						"for"=>"monitor",
						"name"=>"მონიტორის ზომა",
						"require"=>"false"
					));
					echo $make::cornerCheckboxes(array(
						"id"=>"monitor",
						"name"=>"monitor",
						"mainClass" => "monitor",
						"items" => array(
							array("baseid" => "5", "title" => "1 გეგაბაიტი"), 
							array("baseid" => "8", "title" => "2 გეგაბაიტი"), 
							array("baseid" => "10", "title" => "3 გეგაბაიტი")  
						)
					), 10);
					?>

					<section class="buttons">
						<a href="" class="button">
							<i class="fa fa-search" aria-hidden="true"></i> <?=$lang->index("search")?>
						</a>

						<a href="<?=$c::WEBSITE?>map?search=as" class="button" target="_blank">
							<i class="fa fa-map-marker" aria-hidden="true"></i> <?=$lang->index("searchMap")?>
						</a>

						<a href="" class="button">
							<i class="fa fa-bookmark" aria-hidden="true"></i> <?=$lang->index("searchSave")?>
						</a>						
					</section>
				</form>
				
			</section>
		</section>
		<section class="product-list">
			<section class="catproduct">
				<section class="img">
					<img src="https://www.enterprise.com/content/dam/global-vehicle-images/cars/FORD_FOCU_2012-1.png" width="100%" alt=""/>
					<p class="info">
						<i class="fa fa-camera-retro" aria-hidden="true"></i> 
						5
					</p>
				</section>
				<section class="content">
					<p class="price">250 GEL</p>
					<p class="title"><a href="">ტყავის დივანი ძალიან იაფად</a></p>
					<p class="stars">
							<i class="fa fa-star" aria-hidden="true" title="1 ვარსკვლავი"></i>
							<i class="fa fa-star" aria-hidden="true" title="2 ვარსკვლავი"></i>
							<i class="fa fa-star" aria-hidden="true" title="3 ვარსკვლავი"></i>
							<i class="fa fa-star-half-o" aria-hidden="true" title="4 ვარსკვლავი"></i>
							<i class="fa fa-star-o" aria-hidden="true" title="5 ვარსკვლავი"></i>
					</p>
					<p class="description">იყიდება ტყავის დივანი ძალიან იაფად, არის ძალიან კარგ მდგომარეობაში იყიდება ტყავის დივანი ძალიან იაფად, არის ძალიან კარგ მდგომარეობაში იყიდება ტყავის დივანი ძალიან იაფად, არის ძალიან კარგ მდგომარეობაში იყიდება ტყავის დივანი ძალიან იაფად, არის ძალიან კარგ მდგომარეობაში ...</p>
					<a href="<?=$c::WEBSITE?>view/5151515" class="readmore">
						<i class="fa fa-info" aria-hidden="true"></i> ნახე მეტი
					</a>
				</section>
			</section>

			<section class="catproduct">
				<section class="img">
					<img src="https://www.enterprise.com/content/dam/global-vehicle-images/cars/FORD_FOCU_2012-1.png" width="100%" alt=""/>
					<p class="info">
						<i class="fa fa-camera-retro" aria-hidden="true"></i> 
						5
					</p>
				</section>
				<section class="content">
					<p class="price">250 GEL</p>
					<p class="title"><a href="">ტყავის დივანი ძალიან იაფად</a></p>
					<p class="stars">
							<i class="fa fa-star" aria-hidden="true" title="1 ვარსკვლავი"></i>
							<i class="fa fa-star" aria-hidden="true" title="2 ვარსკვლავი"></i>
							<i class="fa fa-star" aria-hidden="true" title="3 ვარსკვლავი"></i>
							<i class="fa fa-star-half-o" aria-hidden="true" title="4 ვარსკვლავი"></i>
							<i class="fa fa-star-o" aria-hidden="true" title="5 ვარსკვლავი"></i>
					</p>
					<p class="description">იყიდება ტყავის დივანი ძალიან იაფად, არის ძალიან კარგ მდგომარეობაში იყიდება ტყავის დივანი ძალიან იაფად, არის ძალიან კარგ მდგომარეობაში იყიდება ტყავის დივანი ძალიან იაფად, არის ძალიან კარგ მდგომარეობაში იყიდება ტყავის დივანი ძალიან იაფად, არის ძალიან კარგ მდგომარეობაში ...</p>
					<a href="<?=$c::WEBSITE?>view/5151515" class="readmore">
						<i class="fa fa-info" aria-hidden="true"></i> ნახე მეტი
					</a>
				</section>
			</section>

			<section class="catproduct">
				<section class="img">
					<img src="https://www.enterprise.com/content/dam/global-vehicle-images/cars/FORD_FOCU_2012-1.png" width="100%" alt=""/>
					<p class="info">
						<i class="fa fa-camera-retro" aria-hidden="true"></i> 
						5
					</p>
				</section>
				<section class="content">
					<p class="price">250 GEL</p>
					<p class="title"><a href="">ტყავის დივანი ძალიან იაფად</a></p>
					<p class="stars">
							<i class="fa fa-star" aria-hidden="true" title="1 ვარსკვლავი"></i>
							<i class="fa fa-star" aria-hidden="true" title="2 ვარსკვლავი"></i>
							<i class="fa fa-star" aria-hidden="true" title="3 ვარსკვლავი"></i>
							<i class="fa fa-star-half-o" aria-hidden="true" title="4 ვარსკვლავი"></i>
							<i class="fa fa-star-o" aria-hidden="true" title="5 ვარსკვლავი"></i>
					</p>
					<p class="description">იყიდება ტყავის დივანი ძალიან იაფად, არის ძალიან კარგ მდგომარეობაში იყიდება ტყავის დივანი ძალიან იაფად, არის ძალიან კარგ მდგომარეობაში იყიდება ტყავის დივანი ძალიან იაფად, არის ძალიან კარგ მდგომარეობაში იყიდება ტყავის დივანი ძალიან იაფად, არის ძალიან კარგ მდგომარეობაში ...</p>
					<a href="<?=$c::WEBSITE?>view/5151515" class="readmore">
						<i class="fa fa-info" aria-hidden="true"></i> ნახე მეტი
					</a>
				</section>
			</section>

			<section class="catproduct">
				<section class="img">
					<img src="https://www.enterprise.com/content/dam/global-vehicle-images/cars/FORD_FOCU_2012-1.png" width="100%" alt=""/>
					<p class="info">
						<i class="fa fa-camera-retro" aria-hidden="true"></i> 
						5
					</p>
				</section>
				<section class="content">
					<p class="price">250 GEL</p>
					<p class="title"><a href="">ტყავის დივანი ძალიან იაფად</a></p>
					<p class="stars">
							<i class="fa fa-star" aria-hidden="true" title="1 ვარსკვლავი"></i>
							<i class="fa fa-star" aria-hidden="true" title="2 ვარსკვლავი"></i>
							<i class="fa fa-star" aria-hidden="true" title="3 ვარსკვლავი"></i>
							<i class="fa fa-star-half-o" aria-hidden="true" title="4 ვარსკვლავი"></i>
							<i class="fa fa-star-o" aria-hidden="true" title="5 ვარსკვლავი"></i>
					</p>
					<p class="description">იყიდება ტყავის დივანი ძალიან იაფად, არის ძალიან კარგ მდგომარეობაში იყიდება ტყავის დივანი ძალიან იაფად, არის ძალიან კარგ მდგომარეობაში იყიდება ტყავის დივანი ძალიან იაფად, არის ძალიან კარგ მდგომარეობაში იყიდება ტყავის დივანი ძალიან იაფად, არის ძალიან კარგ მდგომარეობაში ...</p>
					<a href="<?=$c::WEBSITE?>view/5151515" class="readmore">
						<i class="fa fa-info" aria-hidden="true"></i> ნახე მეტი
					</a>
				</section>
			</section>

			<section class="catproduct">
				<section class="img">
					<img src="https://www.enterprise.com/content/dam/global-vehicle-images/cars/FORD_FOCU_2012-1.png" width="100%" alt=""/>
					<p class="info">
						<i class="fa fa-camera-retro" aria-hidden="true"></i> 
						5
					</p>
				</section>
				<section class="content">
					<p class="price">250 GEL</p>
					<p class="title"><a href="">ტყავის დივანი ძალიან იაფად</a></p>
					<p class="stars">
							<i class="fa fa-star" aria-hidden="true" title="1 ვარსკვლავი"></i>
							<i class="fa fa-star" aria-hidden="true" title="2 ვარსკვლავი"></i>
							<i class="fa fa-star" aria-hidden="true" title="3 ვარსკვლავი"></i>
							<i class="fa fa-star-half-o" aria-hidden="true" title="4 ვარსკვლავი"></i>
							<i class="fa fa-star-o" aria-hidden="true" title="5 ვარსკვლავი"></i>
					</p>
					<p class="description">იყიდება ტყავის დივანი ძალიან იაფად, არის ძალიან კარგ მდგომარეობაში იყიდება ტყავის დივანი ძალიან იაფად, არის ძალიან კარგ მდგომარეობაში იყიდება ტყავის დივანი ძალიან იაფად, არის ძალიან კარგ მდგომარეობაში იყიდება ტყავის დივანი ძალიან იაფად, არის ძალიან კარგ მდგომარეობაში ...</p>
					<a href="<?=$c::WEBSITE?>view/5151515" class="readmore">
						<i class="fa fa-info" aria-hidden="true"></i> ნახე მეტი
					</a>
				</section>
			</section>

			<section class="catproduct">
				<section class="img">
					<img src="https://www.enterprise.com/content/dam/global-vehicle-images/cars/FORD_FOCU_2012-1.png" width="100%" alt=""/>
					<p class="info">
						<i class="fa fa-camera-retro" aria-hidden="true"></i> 
						5
					</p>
				</section>
				<section class="content">
					<p class="price">250 GEL</p>
					<p class="title"><a href="">ტყავის დივანი ძალიან იაფად</a></p>
					<p class="stars">
							<i class="fa fa-star" aria-hidden="true" title="1 ვარსკვლავი"></i>
							<i class="fa fa-star" aria-hidden="true" title="2 ვარსკვლავი"></i>
							<i class="fa fa-star" aria-hidden="true" title="3 ვარსკვლავი"></i>
							<i class="fa fa-star-half-o" aria-hidden="true" title="4 ვარსკვლავი"></i>
							<i class="fa fa-star-o" aria-hidden="true" title="5 ვარსკვლავი"></i>
					</p>
					<p class="description">იყიდება ტყავის დივანი ძალიან იაფად, არის ძალიან კარგ მდგომარეობაში იყიდება ტყავის დივანი ძალიან იაფად, არის ძალიან კარგ მდგომარეობაში იყიდება ტყავის დივანი ძალიან იაფად, არის ძალიან კარგ მდგომარეობაში იყიდება ტყავის დივანი ძალიან იაფად, არის ძალიან კარგ მდგომარეობაში ...</p>
					<a href="<?=$c::WEBSITE?>view/5151515" class="readmore">
						<i class="fa fa-info" aria-hidden="true"></i> ნახე მეტი
					</a>
				</section>
			</section>


		</section>
</main>
<div class="clear"></div>
<?php
@include("website/parts/bottom.php");
?>
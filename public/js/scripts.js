$(document).ready(function(){
	website.mobileNav();
	slider.bootstrap();
});

$(document).on("change", ".selector", function(){
	var selectbox = $(this).attr("data-selectbox"); 
	var val = $(this).val();
	website.dropdown(selectbox, val);
});

$(document).on("click", "main .slidebox .label", function(){
	var content = $(this).attr("data-content");
	if($("i", this).hasClass("fa-arrow-down")){
		$("i", this).removeClass("fa-arrow-down");
		$("i", this).addClass("fa-arrow-up");
		$("."+content).slideDown("slow");
	}else{
		$("i", this).removeClass("fa-arrow-up");
		$("i", this).addClass("fa-arrow-down");
		$("."+content).slideUp("slow");
	}
});

var website = {
	name: "Tree",
	home: "http://404.ge",
	publicFolder: "http://404.ge/public/",
	ajax: "http://404.ge/index.php",
	pleaseWait: "გთხოვთ დაიცადოთ ...",
	checkboxCheck: function(th, i){
		th = typeof th !== 'undefined' ? th : '';
		if($("#" + th).hasClass("active")){
			$("#" + th).removeClass("active");
		}else{
			$("#" + th).addClass("active");
		}
		var a = [];
		// console.log(i);
		$("."+i).each(function(){
			if($(this).hasClass("active")){
				a.push($(".t", this).attr("data-baseid"));
			}
		});
		console.log(a.join());
		$("#"+i).val(a.join());
		// console.log(a);
	},
	checkboxCheckRounded: function(main, th, hidden){
		main = typeof main !== 'undefined' ? main : '';
		th = typeof th !== 'undefined' ? th : '';

		$("."+main).removeClass("active"); 
		$("#" + th).addClass("active");
		var baseid = $("#" + th + " .t").attr("data-baseid");
		$("#"+hidden).val(baseid);
	},
	mobileNav: function(){
		var list = $("header section .desktop ul").html();
		$("header section .mobile ul").html(list);
		var t = $("header section .mobile ul .home a").attr("data-title");
		$("header section .mobile ul .home a").html(t);
		$("header section .mobile ul").append("<li class=\"line\"></li>");
		var list2 = $("section .navigation ul").html();
		$("header section .mobile ul").append(list2);
	},
	mobileNavClick: function(){
		var s = $("header section .mobile").attr("data-status");
		if(s == "closed"){
			$("header .top-nav .mobile ul").slideDown("slow"); 
			$("header section .mobile").attr("data-status","opend");
			$("header .top-nav .mobile p i").removeClass("fa-bars").addClass("fa-times");
		}else{
			$("header .top-nav .mobile ul").slideUp("slow"); 
			$("header section .mobile").attr("data-status","closed");
			$("header .top-nav .mobile p i").removeClass("fa-times").addClass("fa-bars");
		}
	}, 
	popup: function(s, csrf, t){
		s = typeof s !== 'undefined' ? s : '';
		if(s=="close"){
			$(".popup").css("display","none");
			$(".mask").css("display","none");
			$(".mask i").css("display","none");
		}else{
			$(".mask").css("display","block");
			$(".mask i").css("display","block");
			$.post(website.ajax, { ajax:"true", csrf:csrf, type: t }, function(data){
				var obj = $.parseJSON(data);
				$(".popup .header span").html(obj.popup_title);
				if(obj.error=="true"){
					$(".popup .content").html("<p>"+obj.message+"</p>");
				}else{
					$(".popup .content").html(obj.form);
				}
				$(".mask i").css("display","none");
				$(".popup").css("display","block");
			});
			// var myLatLng = { lat: 41.689747753270375, lng: 44.79520250251619 };
			// var map = new google.maps.Map(document.getElementById('addMapCordinates'), 
			// {
			// 	center: myLatLng,
			// 	zoom: 14
			// });	
			// var marker = new google.maps.Marker({
			// 	position: myLatLng,
			// 	map: map,
			// 	icon: website.publicFolder + "img/icon.png", 
			// 	draggable:true
			// });
			// google.maps.event.addListener(marker, 'click', function (event) {
			//     document.getElementById("lat").value = "lat: "+this.getPosition().lat();
			//     document.getElementById("lng").value = "lng: "+this.getPosition().lng();
			// });

	  		// google.maps.event.addListener(marker, 'drag', function (event) {
			// 	document.getElementById("lat").value = "lat: "+this.getPosition().lat();
			//     document.getElementById("lng").value = "lng: "+this.getPosition().lng();
			// });

	  		// google.maps.event.addListener(marker, 'dragend', function (event) {
			// 	document.getElementById("lat").value = "lat: "+this.getPosition().lat();
			//     document.getElementById("lng").value = "lng: "+this.getPosition().lng();
			// });
		}
	}, 
	dropdown: function(m,v){
		$("#"+m+" .selected span").text(v);
	},
	mapInitialize: function(marker_points){
		var offsetHeight = $(window).height();
		$("#map").css("height", offsetHeight+"px"); 
		$("#map-search").css("height", offsetHeight+"px"); 
		$("#map-search .map-search-content").css("height", offsetHeight+"px"); 

		var map = new google.maps.Map(document.getElementById("map"), {
			zoom: 12,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});
		var infoWindow = new google.maps.InfoWindow(), bounds = new google.maps.LatLngBounds(), position, marker;
		for (i = 0; i < marker_points.length; i++) {
			position = new google.maps.LatLng(marker_points[i][0], marker_points[i][1]);
			marker = new google.maps.Marker({
		    	position: position,
		    	map: map,
		    	icon: marker_points[i][3]
		  	});
			bounds.extend(position);

	        google.maps.event.addListener(marker, 'click', (function(marker, i) {
	            return function() {
	                infoWindow.close();
	                website.showSearch("close");
	                infoWindow.setContent(marker_points[i][2]);
	                infoWindow.open(map, marker);
	            }
	        })(marker, i));
	        map.fitBounds(bounds);
		};

		google.maps.event.addListener(map, 'click', function() {
		    	infoWindow.close();
		    	website.showSearch("close");
		});

		google.maps.event.addListener(infoWindow, 'domready', function() {
		    var iwOuter = $('.gm-style-iw');
			var iwBackground = iwOuter.prev();

		    iwBackground.children(':nth-child(2)').css({'display' : 'none'});
			iwBackground.children(':nth-child(4)').css({'display' : 'none'});
			iwOuter.parent().parent().css({left: '115px'});
			iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});
			iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});
			iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});
			var iwCloseBtn = iwOuter.next();
			iwCloseBtn.css({opacity: '1', right: '38px', top: '3px', border: '7px solid #e57373', 'border-radius': '0', 'box-shadow': '0 0 5px #e57373'});
			if($('.iw-content').height() < 140){
		      $('.iw-bottom-gradient').css({display: 'none'});
		    }
			iwCloseBtn.mouseout(function(){
				$(this).css({opacity: '1'});
			});
		});
	},
	showSearch: function(s){
		if(s=="open"){
			$("#map-search").animate({'right': '0px'}, 500);
			$("#map-search .map-search-icon").attr("onclick","website.showSearch('close')").html("<i class=\"fa fa-times\" aria-hidden=\"true\"></i>");
		}else{
			$("#map-search").animate({'right': '-270px'}, 500);
			$("#map-search .map-search-icon").attr("onclick","website.showSearch('open')").html("<i class=\"fa fa-search\" aria-hidden=\"true\"></i>");
		}
	},
	register: function(registerid){
		$("#" + registerid + " .msg").html(this.pleaseWait);
		var csrf = $("#" + registerid + " input[name='csrf']").val();
		csrf = typeof csrf !== 'undefined' ? csrf : "false";
		var val = new Array();
		$("#" + registerid + " .formdata").each(function(){
			var v = typeof $(this).val() !== 'undefined' ? $(this).val() : "empty";
			val.push(v);
		});
		var send_val = JSON.stringify(val);
		$.post(
			website.ajax, 
			{ 
				ajax:"true", 
				type: "register", 
				csrf:csrf, 
				val:send_val 
			}, 
			function(data){
				var obj = $.parseJSON(data);
				$("#" + registerid + " .msg").html(obj.message);
				if(obj.error=="false"){
					$(".mask").css("display","block");
					$(".popup").css({"display":"block"});
					$(".popup .header span").html(obj.title);				

					$(".popup .content").html(obj.form);

				}
			}
		);
	},
	signOut: function(){
		$.post(
			website.ajax, 
			{ 
				ajax:"true", 
				type: "signout"
			}, 
			function(data){
				location.href = website.home;
			}
		);
	},
	auth: function(authid){
		$("#" + authid + " .msg").html(this.pleaseWait);
		var csrf = $("#" + authid + " input[name='csrf']").val();
		csrf = typeof csrf !== 'undefined' ? csrf : "false";
		var val = new Array();
		$("#" + authid + " .formdata").each(function(){
			var v = typeof $(this).val() !== 'undefined' ? $(this).val() : "empty";
			val.push(v);
		});
		var send_val = JSON.stringify(val);
		$.post(
			website.ajax, 
			{ 
				ajax:"true", 
				type: "signin",
				csrf: csrf,
				val: send_val
			}, 
			function(data){
				var obj = $.parseJSON(data);
				$("#" + authid + " .msg").html(obj.message);
				if(obj.error=="false"){
					location.href = obj.redirect;
				}
			}
		);
	},
	approve: function(type, lastid){
		var mobileMsg = $("#mobileMsg").val();
		mobileMsg = typeof mobileMsg !== 'undefined' ? mobileMsg : "false";
		$.post(
			website.ajax, 
			{ 
				ajax:"true", 
				type: type,
				id: lastid,
				v: mobileMsg
			}, 
			function(data){
				var obj = $.parseJSON(data);
				if(obj.error=="false"){
					location.href = obj.redirect;
				}
			}
		);
	},
	recover: function(type, csrf){
		$(".mask i").css("display","block");
		$.post(
			website.ajax, 
			{ 
				ajax:"true", 
				type: type,
				csrf: csrf
			}, 
			function(data){
				var obj = $.parseJSON(data);
				website.scrollTop();
				$(".mask").css("display","block");
				$(".mask i").css("display","none");
				$(".popup").css({"display":"block"});
				$(".popup .header span").html(obj.title);	
				if(obj.error=="false"){
					$(".popup .content").html(obj.form);
				}else{
					$(".popup .content").html(obj.message);
				}
			}
		);
	}, 
	recoverPassword: function(csrf){
		var mob = $("#mobile_recovery_password").val(); 
		mob = typeof mob !== 'undefined' ? mob : "false";
		csrf = typeof csrf !== 'undefined' ? csrf : "false";
		$.post(
			website.ajax, 
			{ 
				ajax:"true", 
				type: "recoverpassword",
				csrf: csrf,
				m: mob
			}, 
			function(data){
				var obj = $.parseJSON(data);
				website.scrollTop();
				$(".mask").css("display","block");
				$(".mask i").css("display","none");
				$(".popup").css({"display":"block"});
				$(".popup .header span").html(obj.title);	
				$(".popup .content").html(obj.message);
			}
		);
	},
	scrollTop: function(){
		var body = $("html, body");
		body.stop().animate({scrollTop:0}, '500', 'swing', function() { 
		});
	},
	fileUpload: function(dragableArea, bgfile){
		var obj = $("."+dragableArea);
		var hidden_input = $('#'+bgfile);

		obj.on('click', function(e){
			hidden_input.click();
		});

		hidden_input.on('change',function(e){
			e.stopPropagation();
			e.preventDefault();
			$(this).css({"border":"none"});
			var files = e.target.files;
			if(files.length >= 2){ alert("Multiple file not allowed!"); }
			else{
				var file = files[0];
				// $('#img').html('<p>Loading...</p>'); 
				console.log("Loading...");
				website.upfile(file);
			}
		});

		obj.on('dragover', function(e){
			e.stopPropagation();
			e.preventDefault();
			$(this).css({"border":"solid 1px #ef4836"});
		});

		obj.on('dragleave', function(e){
			e.stopPropagation();
			e.preventDefault();
			$(this).css({"border":"none"});
		});

		obj.on('drop', function(e){
			e.stopPropagation();
			e.preventDefault();
			$(this).css({"border":"none"});


			var files = e.originalEvent.dataTransfer.files;
			if(files.length >= 2){ alert("Multiple file not allowed!"); }
			else{
				var file = files[0];
				// $('#img').html('<p>Loading...</p>'); 
				console.log("Loading...");
				website.upfile(file);
			}
		});
	},
	upfile: function(file){
		var fileName = file.name;
		var ex = fileName.split(".");
		var extLast = ex[ex.length - 1].toLowerCase();

		xhr = new XMLHttpRequest();
		xhr.open('post', website.ajax, true);
		//set header

		var rforeign = /[^\u0000-\u007f]/;
		if (rforeign.test(file.name)) {
		  alert("File name error !");
		  return false;
		}
		
		xhr.setRequestHeader('Content-Type','multipart/form-data');
		xhr.setRequestHeader('X-File-Name',file.name);
		xhr.setRequestHeader('X-File-Size',file.size);
		xhr.setRequestHeader('X-File-Type',file.type);
		if(extLast!="jpg"){
			alert("Please drop jpg file !");
			console.log("No Image");
			return false;
		}
		xhr.send(file);

		xhr.onreadystatechange = function(e){
			if(xhr.readyState == 4){
				if(xhr.status == 200){
					var res = xhr.responseText;
					var obj = $.parseJSON(res);
					// $('#img').html(obj.image_tag);
					// $('#studio_upfile').val(obj.image_filename);
					console.log(obj.image_tag);
					console.log(obj.image_filename);					
				}
			}
		}
	},
	clickElement: function(elem){
		$(elem).click();
	}
}

var slider = {
	container: "main .product-view .product-image",
	imageItem: "main .product-view .product-image .img .img-item",
	prevButton: "main .product-view .product-image .img ul .prev",
	nextButton: "main .product-view .product-image .img ul .next",
	currentPos: 0, 
	info: function(){ 
		return this.container + " .img ul .info";
	}, 
	bootstrap: function(){
		var c = this.imageCount();
		var i = this.info();
		$(i).html("<i class=\"fa fa-camera\" aria-hidden=\"true\"></i> <span>1 - "+c+"</span>"); 
	},
	next: function(n){
		n = typeof n !== 'undefined' ? n : 1;
		var i = this.info();
		if(n>=(this.imageCount() - 1)){
			this.currentPos = 0;
		}else{
			this.currentPos = n + 1;
		}
		$(this.imageItem).removeClass("active");
		$(this.imageItem).eq(this.currentPos).addClass("active");
		$(this.prevButton).attr("onclick","slider.prev("+this.currentPos+")");
		$(this.nextButton).attr("onclick","slider.next("+this.currentPos+")");
		$(i).html("<i class=\"fa fa-camera\" aria-hidden=\"true\"></i> <span>"+(this.currentPos + 1)+" - "+this.imageCount()+"</span>"); 
	},
	prev: function(n){
		n = typeof n !== 'undefined' ? n : 1;
		var i = this.info();
		if(n <= 0){
			this.currentPos = (this.imageCount() - 1);
		}else{
			this.currentPos = n - 1;
		}
		$(this.imageItem).removeClass("active");
		$(this.imageItem).eq(this.currentPos).addClass("active");
		$(this.prevButton).attr("onclick","slider.prev("+this.currentPos+")");
		$(this.nextButton).attr("onclick","slider.next("+this.currentPos+")");
		$(i).html("<i class=\"fa fa-camera\" aria-hidden=\"true\"></i> <span>"+(this.currentPos + 1)+" - "+this.imageCount()+"</span>"); 
	},
	imageCount: function(){
		var c = $(this.imageItem).length;
		return c;
	}
}
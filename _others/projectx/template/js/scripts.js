var AJAX = "http://404.ge/_others/projectx/admin.php?page=ajax"
$(document).on("click",".addCompany",function(){
	$(".loader").show();	
	popmeup("addcompany",""); 	
});

$(document).on("click",".delete-company",function(){
	var companyid = $(this).data("companyid"); 
	$(".loader").show();	
	popmeup("deletecompany",companyid); 	
});

$(document).on("click",".edit-company",function(){
	var companyid = $(this).data("companyid"); 
	$(".loader").show();	
	popmeup("editcompany",companyid); 	
});

$(document).on("click",".deleteWebsite",function(){
	var website = $(this).data("website"); 
	$(".loader").show();	
	popmeup("deleteWebsite",website); 	
});


$(document).on("click",".editWebsite",function(){
	var website = $(this).data("website"); 
	$(".loader").show();	
	popmeup("editWebsite",website); 	
});

$(document).on("click",".button-yes",function(){
	var popuptype = $("#popuptype").val(); 
	
	if(popuptype=="addcompany"){
		$(".popup-box").hide();
		$(".loader").show();
		var companyname = $("#companyname").val(); 
		$.post(AJAX, { t:popuptype, c:companyname }, function(data){
			if(data=="Done"){
				location.reload();
			}else{
				alert("მოხდა შეცდომა !");
				location.reload();
			}
		});
	}else if(popuptype=="addWebsite"){ 
		var addwebsite = $(this).data("addwebsite");
		$(".popup-box").hide();
		$(".loader").show();
		var website = $("#website").val(); 
		var paydate = $("#paydate").val(); 
		var duedate = $("#duedate").val(); 
		var price = $("#price").val(); 
		$.post(AJAX, { t:popuptype, cid:addwebsite, w:website, p:paydate, d:duedate, pr:price }, function(data){
			if(data=="Done"){
				location.reload();
			}else{
				alert("მოხდა შეცდომა !");
				location.reload();
			}
		});
	}else if(popuptype=="deleteWebsite"){ 
		var deletewebsite = $(this).data("deletewebsite");
		$(".popup-box").hide();
		$(".loader").show();

		$.post(AJAX, { t:popuptype, did:deletewebsite }, function(data){
			if(data=="Done"){
				location.reload(); 
			}else{
				alert("მოხდა შეცდომა !"); 
				location.reload(); 
			}
		});
	}else if(popuptype=="deletecompany"){ 
		var deletecompany = $(this).data("deletecompany");
		$(".popup-box").hide();
		$(".loader").show();

		$.post(AJAX, { t:popuptype, did:deletecompany }, function(data){
			if(data=="Done"){
				location.reload(); 
			}else{
				alert("მოხდა შეცდომა !"); 
				location.reload(); 
			}
		});
	}else if(popuptype=="editcompany"){ 
		var editcompany = $(this).data("editcompany");
		var companyname_edit = $("#companyname_edit").val();
		$(".popup-box").hide();
		$(".loader").show();

		$.post(AJAX, { t:"editcompanyform", cid:editcompany, txt:companyname_edit }, function(data){
			if(data=="Done"){
				location.reload(); 
			}else{
				alert("მოხდა შეცდომა !"); 
			}
		});
	}else if(popuptype=="editWebsite"){ 
		var editwebsite = $(this).data("editwebsite");
		var website = $("#website").val();
		var paydate = $("#paydate").val();
		var duedate = $("#duedate").val();
		var price = $("#price").val();
		$(".popup-box").hide();
		$(".loader").show();

		$.post(AJAX, { t:"editwebsite", cid:editwebsite, w:website, p:paydate, d:duedate, pr:price }, function(data){
			if(data=="Done"){
				location.reload(); 
			}else{
				alert("მოხდა შეცდომა !"); 
			}
		});
	}


});

$(document).on("click",".button-no",function(){
	location.reload(); 	
});

$(document).on("click",".addWebsite",function(){
	var companyid = $(this).data("companyid"); 
	$(".loader").show();	
	popmeup("addWebsite",companyid);
});

function popmeup(type,additional){
	window.scrollTo(0,0);
	if(type=="addcompany"){
		$("#popuptype").val("addcompany");
		$(".popup-header").text("კომპანიის დამატება");
		$(".popup").fadeIn();
		$(".button-yes").text("დამატება"); 
		$(".button-yes").attr("data-addcompany",additional); 
		$(".loader").fadeOut("slow",function(){ 
			$(".popup-body").html(forms());
			$(".popup-box").show();
		});
	}else if(type=="deletecompany"){
		$("#popuptype").val("deletecompany");
		$(".popup-header").text("კომპანიის წაშლა");
		$(".button-yes").text("წაშლა"); 
		$(".button-yes").attr("data-deletecompany",additional); 
		$(".popup").fadeIn();
		$(".loader").fadeOut("slow",function(){
			$(".popup-body").html(forms());
			$(".popup-box").show();
		});
	}else if(type=="editcompany"){
		$("#popuptype").val("editcompany");
		$(".popup-header").text("კომპანიის რედაქტირება");
		$(".popup").fadeIn();
		$(".button-yes").text("რედაქტირება"); 
		$(".button-yes").attr("data-editcompany",additional); 
		$(".loader").fadeOut("slow",function(){
			$(".popup-body").html(forms());
			$.post(AJAX, { t:"editcompany", cid:additional },function(data){
				$("#companyname_edit").val(data);
				$(".popup-box").fadeIn();				
			});
			
		});
	}else if(type=="addWebsite"){
		$("#popuptype").val("addWebsite");
		$(".popup-header").text("ვებ გვერდის დამატება");
		$(".popup").fadeIn();
		$(".button-yes").text("დამატება"); 
		$(".button-yes").attr("data-addwebsite",additional); 
		$(".loader").fadeOut("slow",function(){
			$(".popup-box").show();
			$(".popup-body").html(forms());
		});
	}else if(type=="deleteWebsite"){
		$("#popuptype").val("deleteWebsite");
		$(".popup-header").text("ვებ გვერდის წაშლა");
		$(".popup").fadeIn();
		$(".button-yes").text("წაშლა"); 
		$(".button-yes").attr("data-deletewebsite",additional); 
		$(".loader").fadeOut("slow",function(){
			$(".popup-box").show();
			$(".popup-body").html(forms());
		});
	}else if(type=="editWebsite"){
		$("#popuptype").val("editWebsite");
		$(".popup-header").text("ვებ გვერდის რედაქტირება");
		$(".popup").fadeIn();
		$(".button-yes").text("რედაქტირება"); 
		$(".button-yes").attr("data-editwebsite",additional); 
		$(".loader").fadeOut("slow",function(){
			$(".popup-body").html(forms());
			$("#website").val($("#website_"+additional).text());
			$("#paydate").val($("#gadaixada_"+additional).text());
			$("#duedate").val($("#gadasaxdeli_"+additional).text());
			$("#price").val($("#price_"+additional).text());
			$(".popup-box").fadeIn();	
		});
	}

}

function forms(){
	var out = '';
	var type = $("#popuptype").val();
	if(type=="addcompany"){
		out += '<label>კომპანიის დასახელება: </label>';
		out += '<input type="text" name="companyname" id="companyname" value="" />';
	}else if(type=="deletecompany"){
		out += 'გსურთ აღნიშნული კომპანიის წაშლა ?';
	}else if(type=="editcompany"){
		out += '<label>კომპანიის დასახელება: </label>';
		out += '<input type="text" name="companyname_edit" id="companyname_edit" value="" />';
	}else if(type=="addWebsite"){
		out += '<label>ვებ გვერდი: </label>';
		out += '<input type="text" name="website" id="website" value="" />';
		out += '<label>გადახდის თარიღი: ( dd/mm/YYYY )</label>';
		out += '<input type="text" name="paydate" id="paydate" class="datepicker" value="" />';
		out += '<label>გადასახდელი აქვს: ( dd/mm/YYYY )</label>';
		out += '<input type="text" name="duedate" id="duedate" class="datepicker" value="" />';
		out += '<label>ღირებულება: </label>';
		out += '<input type="text" name="price" id="price" value="" />';
	}else if(type=="deleteWebsite"){
		out += 'გსურთ აღნიშნული ვებ გვერდი წაშლა ?';
	}else if(type=="editWebsite"){
		out += '<label>ვებ გვერდი: </label>';
		out += '<input type="text" name="website" id="website" value="" />';
		out += '<label>გადახდის თარიღი: ( dd/mm/YYYY )</label>';
		out += '<input type="text" name="paydate" id="paydate" class="datepicker" value="" />';
		out += '<label>გადასახდელი აქვს: ( dd/mm/YYYY )</label>';
		out += '<input type="text" name="duedate" id="duedate" class="datepicker" value="" />';
		out += '<label>ღირებულება: </label>';
		out += '<input type="text" name="price" id="price" value="" />';
	}
	return out;
}
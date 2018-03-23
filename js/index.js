$(function(){
	//更改头像
	window.changeImg = function(){
		var _file = this;
		var data = new FormData($("#upfile-form")[0]);
		$.ajax({
			url : 'php/imgUpload.php',
			type : 'POST',
			data : data,
			dataType : 'JSON',
			cache: false,
            processData: false,
            contentType: false,
            success : function(data){
            	var data = JSON.stringify(data);
            	alert(data);
            }
		})
        return false;;
	};
	
	//点击搜索
	$(".search-btn").on('click',function(){
		var keyword = $(".sreach-from input").val();
		if(keyword == ""){
			$(".sreach-from input").html("关键词不能为空");
		}else{
			//alert("关键词为："+$(".sreach-from input").val());
			window.location.href = './index.php?keyword='+keyword;
		}
		return false;
	});
	
	//回车事件搜索功能
	$(".sreach-from input").keydown(function(event){
		var e = event || window.event;
		if(e.keyCode == 13){
			var keyword = $.trim($(this).val());
			if(keyword != ""){
				window.location.href = './index.php?keyword='+keyword;
			}else{
				$(this).val("关键词不能为空");
			}
			
		}
	});
	
	//点击评论
	
	
	//点击发布作品
	$(".commit-work > button").on('click',function(){
		window.location.href = "release.php";
		
	});
	
	//
});
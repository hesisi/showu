$(function(){
	//上传头像
	window.fileSelected = function() {
	    var _this = $(this);
	    var file = this.files[0];
	    var rFilter = /^(image\/bmp|image\/gif|image\/jpeg|image\/png|image\/tiff)$/i;
	    if(!rFilter.test(file.type)) {
	        alert("文件格式必须为图片");
	        return;
	    }
	    /*开始进行网络加载*/
	    _this.css("display", "none");    //目的是为了屏蔽点击事件
	    var reader = new FileReader() , image = new Image() ,
	        canvas = document.createElement("canvas") , ctx = canvas.getContext("2d");
	    reader.onload = function() {        //文件加载完成
	        var url = reader.result;
	        image.src = url;
	    };
	    image.onload = function() {        //图片加载完成
	        var w = image.naturalWidth , h = image.naturalHeight ,
	            scale = 3;        //图片缩放比例，这里是把图片大小高宽均缩小3倍
	        canvas.width = w / scale;
	        canvas.height = h / scale;
	        ctx.drawImage(image, 0 , 0 , w , h ,
	            0 , 0 , canvas.width , canvas.height);
	        fileUpload();    
	    };
	    reader.readAsDataURL(file);        //用文件加载器加载文件
	    function fileUpload() {        //文件上传方法
	        var quality = 0.3;        //图片的质量，这里设置的是0.3
	        var data = canvas.toDataURL("image/jpeg", quality);//获取画布图片，并且要jpg格式
	        data = data.split(',')[1];
	        data = window.atob(data);
	        var ia = new Uint8Array(data.length);
	        for(var i = 0; i < data.length; i++) {
	            ia[i] = data.charCodeAt(i);
	        }
	        var blob = new Blob([ia], {            //以上均为二进制参数处理，从而获取一个blob对象
	            type: "image/jpeg"
	        });
	        var fd = new FormData(document.getElementById("uploadForm"));
	        fd.append("XXX"  , blob , "upload.jpg");    //向form中加入图片数据，name属性是XXX，文件名是upload.jpg
	        var xhr = new XMLHttpRequest();
	        xhr.addEventListener('load', function(resUpload) {
	            _this.css("display", "");
	            //请求成功
	        }, false);
	        xhr.addEventListener('error', function(){
	            _this.css("display", "");
	            //请求失败
	        }, false);
	        xhr.addEventListener('abort', function(){
	            _this.css("display", "");
	            //上传终止
	        }, false);
	        xhr.open('POST', "http://XXXXXXXXXXXXX");//请求地址
	        xhr.send(fd);//发送
	    }
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
	
});
$(function(){
	//关键词搜索
	var urlParam = window.location.search;
	//var url = window.location.href;

	urlParam = urlParam.substring(1,urlParam.length);
	var keyWord = urlParam.split("&")[0].split("=")[1];  //关键词
	var pageNo = urlParam.split("&")[1].split("=")[1];   //页码数
	var pageSize = urlParam.split("&")[2].split("=")[1];  //每页显示的数量
	
	//utf-8编码
	keyWord = decodeURI(keyWord);
	search(keyword,pageNo,pageSize);
	
	function search(str,num,size){
		$.ajax({
			method : 'post',
			url : 'php/search.php',
			dataType : 'JSON',
			data : '{"keyWords":"'+str+'","pageNo:"'+num+'",pageSize:'+size+'"}';
			success : function(data){
				//处理返回回来的JSON数据
			}
		});
	}
	
});
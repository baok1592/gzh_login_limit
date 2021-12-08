export default {		
	h5_login() {
		const that=this
		var ua = navigator.userAgent.toLowerCase();
		var isWeixin = ua.indexOf('micromessenger') != -1;
		if (!isWeixin && this.merge_mode != 2) {
			console.log('非微信浏览器打开，登陆方式为开放平台关联登录，暂不登陆，请前往微信浏览器打开');
			return;
		}  		
		console.log('微信浏览器打开，登陆方式为公众号'); 	
		let end_url = this.fun_site_url()
		window.location.href = end_url;
	},
	//设置跳转网址
	fun_site_url(){		
		var site_url = "http://card.ruhuashop.com/h5/#/";	//设置微信公众号授权的地址
		var site_root=""
		var strs = [];
		var obj={}
		if (site_url.indexOf('?') != -1) { 
			var url_one = site_url.split('?'); 			
			var url_two = url_one[1].split('&');
			for(let i of url_two){ 
				const j= i.split('=')
				obj[j[0]] = j[1]
			} 
			site_root=url_one[0].split('h5/')[0]; 		
		}else{
			site_root=site_url.split('h5/')[0];
		}
		console.log("obj",obj);  
		console.log("jump",site_root + 'weixin/gzh_code');
		let end_url = site_root + 'weixin/gzh_code?type=rhedu';	//这里type的值就是数据库中添加的数据，根据type的值不同获取不同的回调地址
		return end_url;		
	}

}

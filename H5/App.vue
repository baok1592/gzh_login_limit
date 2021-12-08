<script>
	import loginModel from './common/login.js';
	export default {
		onLaunch: function() {
			console.log('App Launch')
			this.get_href();
		},
		onShow: function() {
			console.log('App Show')
		},
		onHide: function() {
			console.log('App Hide')
		},
		methods:{
			get_href(){
				var site_url = window.location.href;
				var site_root=""
				var strs = [];
				var obj={}
				if(site_url.indexOf('?')==-1){	//如果没有携带参数直接登陆，否则保存参数之后再登陆
					let token = uni.getStorageSync('token');	
					if(token){			
						console.log("有token")
					}else{
						loginModel.h5_login() 
					} 
				}else{	
					var url_one = site_url.split('?');
					var url_two = url_one[1].split('&');
					for(let i of url_two){ 
						const j= i.split('=')
						obj[j[0]] = j[1]
					} 
					console.log(obj)
					this.setStorage(obj)
				}
			},
			setStorage(data){
				if(data.code){
					console.log('2222')
					let token = uni.getStorageSync('token');
					if(token){
						console.log("有token")
					}else{
						uni.request({
							url: "http://card.ruhuashop.com/weixin/get_gzh_token",
							data: data,
							method:"get",
							header: {
								token:uni.getStorageSync("token")  	    		 	    			
							},
						}).then(data=>{
							let[error,res] =data;
							uni.setStorageSync('token',res.data.token)
							console.log(res)
						})
					}
					
				}else{
					console.log('1111')
					uni.setStorageSync('query',data)
				}
			},
		}
	}
</script>

<style>
	/*每个页面公共css */
</style>

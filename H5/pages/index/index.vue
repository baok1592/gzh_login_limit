<template>
	<view>
		<h1 style="margin-top: 50rpx;">返回的值：</h1>
		  {{title}}
	</view>
</template>

<script>
	export default {
		data() {
			return {
				title: '未登录',
			}
		},
		onShow() {
			let token =uni.getStorageSync("token");
			if(token){
				this.title=token
			}
			this.weixin();
		},
		methods:{
			weixin(){
				var ua = navigator.userAgent.toLowerCase();
				var isWeixin = ua.indexOf('micromessenger') != -1;
				if (!isWeixin && this.merge_mode != 2) {
					
					this.title="非微信浏览器打开，登陆方式为开放平台关联登录，暂不登陆，请前往微信浏览器打开"
				}  	
			}
		}
		
	}
</script>

<style>
	.center{
		text-align: center;
	}
</style>

<template>
	<view>
		<button type="primary" @click="get_info()">点击授权头像</button>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				
			}
		},
		methods: {
			get_info(){
				let end_url = 'http://card.ruhuashop.com/weixin/gzh_upinfo?type=rhedu'; //这里type的值就是数据库中添加的数据，根据type的值不同获取不同的回调地址
				window.location.href=end_url;
			}
		}
	}
</script>

<style>

</style>

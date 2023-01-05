<template>
	<div class="header">
		<div class="title">
			<span style="font-size: 24pt; font-weight: bold; color: White">Company name</span>
			<div class="loginDisplay">
				<a href="#">Profile</a>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "Header",
	data() {
		return {

		};
	},
	created() {
		console.log("xxxx");
	},
	methods: {

	},
};
</script>

<style>
.header {
  height: 100px;
  margin: 0;
  padding: 0px 10px;
  position: relative;
  width: 100%;
  background: #212529;
}
.title {
  position: relative;
  width: 98%;
  line-height: 100px;
}
.loginDisplay {
  color: #FFFFFF;
  font-size: 1.1em;
  position: absolute;
  right: 0;
  text-align: center;
  top: 0;
} 
</style>
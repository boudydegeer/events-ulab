<template src="./template.html"></template>

<script lang="coffee" type="text/coffeescript">
	module.exports =
		props :
			id : null

			price :
				type: Number
				default : 0

			amount :
				type: Number
				default : 0

			discount :
				type: Number
				default : 0

			code : ""
</script>

<style></style>
<template src="template.html"></template>

<script lang="coffee" type="text/coffeescript">
	_  = require 'lodash'

	module.exports =
		props :	['code', 'whenApplied']
		data :
			() =>
				text : ""
				errors : ""
				valid : false
				coupon :
					code : ""
					discount : 0
					description : ""

		methods :
			validate : () ->
				@$http.get '/api/coupons/' + @code
					.then @success, @error

			success : (response) ->
				@coupon = response.data
				@valid = true
				@whenApplied(@coupon)

			error : () ->
				@valid = false
				@coupon = {
					discount: 0
					code: ''
					description: 'Lo sentimos ese código no existe.';
				}
				@whenApplied(@coupon)


</script>

<style></style>

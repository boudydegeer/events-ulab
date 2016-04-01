<template src="template.html"></template>
<script lang="coffee" type="text/coffeescript">
	module.exports =
		props:
			taxes:
				default: 0
			ticket :
				default :
					price : 0
			coupon:
				default :
					discount : 0
					description : ""
					code : ""
			event :
				default :
					title : ""

		filters:
			price : (cost) ->
				cost / 100;

			coupon: (cost) ->
				cost - (@coupon.discount / 100 * cost);

			discount: (cost, discount) ->
				- (cost - (cost  * (1 - (discount / 100))));

			finalPrice: (cost, discount) ->
				cost  * (1 - (discount / 100));

			vat: (cost) ->
				cost * (@taxes / 100) ;
</script>
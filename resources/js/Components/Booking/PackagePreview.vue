<script setup>
const props = defineProps({
	package: Object,
})

</script>

<template>
	<div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
		<aside class="uk-card-media-left uk-cover-container">
			<img :src="package.image_url" :alt="`${package.name} Package Cover Image`" uk-cover width="680" height="510" loading="lazy">
			<canvas height="510" width="680"></canvas>
		</aside>
		<div>
			<div class="uk-card-body">
				<h3 class="uk-card-title uk-text-bold uk-margin-remove-bottom">{{ package.name }}</h3>
				<h4 class="uk-h2 uk-text-bold uk-text-success">{{ package.formatted_price }}</h4>
				<p class="uk-margin-remove-top">{{ package.overview }}</p>
			</div>
			<div class="uk-card-footer uk-padding-small uk-flex uk-flex-between uk-flex-middle">
				<div>
<!--					<p>-->
<!--						<span class="uk-text-muted">Scheduled On: </span>-->
<!--						<span class="uk-text-emphasis">{{ scheduled_date }}</span>-->
<!--					</p>-->
				</div>
				<div class="uk-text-right@m">
					<p class="uk-text-muted uk-margin-remove"><span class="uk-text-emphasis">{{ package.people_range }}</span> persons</p>
				</div>
			</div>
		</div>
	</div>
</template>

<style scoped >
.uk-cover-container  {
		background: rgba(139, 194, 158,0.1);
	}
</style>

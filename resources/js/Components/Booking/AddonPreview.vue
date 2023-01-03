<script setup>
const props = defineProps({
	addon: Object,
})
</script>

<template>
	<div class="uk-grid uk-grid-small uk-flex-middle" uk-grid>
		<div class="uk-width-expand">
			<p class="uk-margin-remove">{{ addon.name }}</p>
		</div>

		<div class="uk-width-auto uk-flex uk-flex-middle uk-flex-between">
			<p class="uk-margin-remove uk-text-bold uk-text-success">{{ addon.formatted_price }}</p>
			<button class="uk-icon uk-margin-small-left close-button"
					uk-icon="icon: close"
					@click="$emit('removeAddon', addon.id)"
			></button>
		</div>
	</div>
</template>

<style scoped>

</style>

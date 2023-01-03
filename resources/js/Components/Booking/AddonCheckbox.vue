<script setup>
const props = defineProps({
	name: String,
	price: String,
	description: {
		type: String,
		default: '',
	}
})
</script>

<template>
	<div
		class="uk-panel uk-card uk-card-small uk-card-body uk-card-default uk-border-rounded"
	>
		<div
			class="uk-grid uk-grid-small"
			uk-grid
		>
			<div class="uk-width-auto uk-form-controls">
				<input
					id="addon1"
					class="uk-checkbox uk-border-rounded"
					type="checkbox"
				/>
			</div>

			<div class="uk-width-expand">
				<div
					class="uk-grid uk-grid-small"
					uk-grid
				>
					<div class="uk-width-expand@m uk-width-1-1">
						<label
							class="uk-form-label uk-h5 uk-text-bold"
							for="addon1"
						>
							{{ name }}
						</label>
						<p class="uk-text-meta uk-margin-remove">{{ description }}</p>
					</div>
					<div class="uk-width-auto@m uk-width-1-1">
						<p class="uk-margin-remove uk-text-primary uk-text-bold">
							{{ price }}
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<style scoped>

</style>

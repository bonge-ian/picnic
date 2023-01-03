<script setup>
import { computed } from "vue";

const props = defineProps({
	message: String,
	status: {
		type: String,
		default: 'default'
	},
	close: {
		type: Boolean,
		default: true,
	}
})

const alert_class = computed(() => {
	const classes = {
		default:  'uk-alert-default',
		primary: 'uk-alert-primary',
		warning: 'uk-alert-warning',
		danger: 'uk-alert-danger',
		success: 'uk-alert-success',
	}
	return classes[props.status];
});

</script>

<template>
	<div class="uk-alert" :class="alert_class" uk-alert>
		<a v-if="close" class="uk-alert-close" uk-close></a>
		<p>{{ message }}</p>
	</div>
</template>

<style scoped>

</style>

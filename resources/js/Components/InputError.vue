<script setup>
defineProps(['message']);
</script>

<template>
	<p v-show="message" class="uk-text-danger uk-margin-small">{{ message }}</p>
</template>

<style scoped>

</style>

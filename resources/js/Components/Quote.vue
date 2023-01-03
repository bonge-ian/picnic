<script setup>
import { loremIpsum } from "lorem-ipsum";

const props = defineProps({
	author: String,
	// quote: String,
	// avatar: String,
})

const quote = loremIpsum({
	count: Math.floor(Math.random() * 10),
	paragraphLowerBound: 3,  // Min. number of sentences per paragraph.
	paragraphUpperBound: 7,  // Max. number of sentences per paragarph.
	random: Math.random,
	sentenceLowerBound: 5,   // Min. number of words per sentence.
	sentenceUpperBound: 15,
})

</script>

<template>
	<figure class="uk-card uk-card-default uk-card-large uk-card-body uk-border-rounded">
		<img
			:alt="`${author} Avatar`"
			:src="`https://avatars.dicebear.com/api/avataaars/${author}.svg`"
			class="uk-border-circle"
			height="80"
			width="80"
		/>
		<h5 class="uk-h5 uk-margin-medium-top uk-margin-remove-bottom">{{ author }}</h5>
		<p class="uk-panel uk-margin-top">
			{{ quote }}
		</p>
		<figcaption class="uk-margin-top">
			<a href="#">@{{ author }}</a>
		</figcaption>
	</figure>
</template>

<style scoped>

</style>

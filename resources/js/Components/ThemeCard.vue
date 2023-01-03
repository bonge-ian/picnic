<script setup>
import { useGetImageUrl } from "@/Composables/image_url_helper";

const props = defineProps({
	title: String,
	coverImageUrl: String,
	overview: String,
	gallery: Array,
})

const getImageAlt = (isCoverImage = false) => isCoverImage
	? `${props.title} Cover Image`
	: `${props.title} Gallery`;

</script>

<template>
	<article
		class="uk-grid-column-large uk-grid-margin uk-grid"
		uk-grid
	>
		<div class="uk-width-1-3@l uk-visible@l uk-first-column">
			<div
				class="uk-visible@l uk-margin uk-scrollspy-inview"
				uk-scrollspy-class
			>
				<picture class="uk-cover-container">
					<canvas
						height="607"
						width="410"
					></canvas>
					<img
						:alt="getImageAlt(true)"
						:src="useGetImageUrl(`themes/${coverImageUrl}`)"
						decoding="async"
						height="607"
						loading="lazy"
						uk-cover
						width="410"
					/>
				</picture>
			</div>
		</div>
		<div class="uk-grid-item-match uk-flex-middle uk-width-2-3@l">
			<div class="uk-panel uk-width-1-1">
				<div class="uk-panel uk-margin-remove-first-child uk-hidden@l uk-margin">
					<div
						class="uk-child-width-expand uk-grid uk-grid-stack"
						uk-grid
					>
						<div class="uk-width-1-3@s">
							<picture class="uk-cover-container">
								<canvas
									height="904"
									width="610"
								></canvas>
								<img
									:alt="getImageAlt(true)"
									:src="useGetImageUrl(`themes/${coverImageUrl}`)"
									decoding="async"
									height="904"
									loading="lazy"
									uk-cover
									width="610"
								/>
							</picture>
						</div>
						<div class="uk-margin-remove-first-child">
							<h2 class="uk-margin-top uk-margin-remove-bottom uk-text-capitalize uk-text-bold">
								{{ title }}
							</h2>

							<div class="uk-panel uk-margin-top">
								{{ overview }}
							</div>
						</div>
					</div>
				</div>
				<div
					class="uk-panel uk-margin-remove-first-child uk-visible@l uk-margin uk-scrollspy-inview"
					uk-scrollspy-class="uk-animation-fade"
				>
					<h2 class="uk-margin-top uk-margin-remove-bottom uk-text-bold">{{ title }}</h2>

					<p class="el-content uk-panel uk-margin-top uk-margin-medium-bottom">
						{{ overview }}
					</p>
				</div>
				<h3 class="uk-h4 uk-heading-bullet">How it went</h3>
				<div class="uk-margin">
					<div
						class="uk-child-width-1-2 uk-child-width-1-4@s uk-grid-column-small uk-grid-match uk-grid"
						uk-grid
						uk-lightbox="animation: slide"
					>
						<div v-for="(galleryImage, index) in gallery" :key="index">
							<a
								:data-alt="getImageAlt(false)"
								:data-caption="`${title} Showcase`"
								:href="useGetImageUrl(`themes/${galleryImage}`)"
								class="uk-panel uk-cover-container"
							>
								<canvas
									height="180"
									width="300"
								></canvas>
								<img
									:alt="getImageAlt(false)"
									:src="useGetImageUrl(`themes/${galleryImage}`)"
									decoding="async"
									loading="lazy"
									uk-cover
								/>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</article>
</template>

<style scoped>

</style>

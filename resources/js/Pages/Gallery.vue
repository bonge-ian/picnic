<script setup>
import {Link} from '@inertiajs/inertia-vue3';
import GuestLayout from "@/Layouts/GuestLayout.vue";
import {useGetImageUrl} from "@/Composables/image_url_helper";
import {computed} from "vue";

const folder = 'portfolio';
const imagesRange = _.range(1, 20);
// let imagesUrl = import.meta.glob("../../images/portfolio/*.(jpg|JPG|png|PNG|svg)", { as: "url", eager: true });
// let imagesUrl = import.meta.glob("../../images/portfolio/*.jpg", { as: "url", eager: true });

const urls = computed(() => {
	let a = [];
	imagesRange.forEach(image => {
		let p = `${folder}/${image}.jpg`

		a.push(useGetImageUrl(p));
	})

	return a;
})

</script>

<template>
	<GuestLayout>

		<section class="uk-section uk-section-large uk-section-default">
			<div class="uk-container uk-container-small">
				<div class="uk-text-center uk-width-1-1">
					<hr class="uk-divider-small"/>
					<h2 class="uk-h3 uk-text-emphasis">Small, but honest work<span class="uk-text-primary">.</span></h2>
					<h1 class="uk-heading-medium uk-text-bold">
						<span class="uk-text-highlight-underline-below">Gratify</span> your incertitude,
						<br class="uk-visible@m"/>with our
						<span class="uk-text-highlight-underline-below-tertiary">breathtaking portfolio</span
						><span class="uk-text-tertiary">.</span>
					</h1>
					<hr class="uk-divider-small uk-margin-medium-top"/>

					<div class="uk-margin-large">
						<div
							class="uk-flex-middle uk-grid-small uk-child-width-auto uk-flex-center uk-grid"
							uk-grid=""
						>
							<div class="uk-first-column">
								<a
									class="uk-button uk-button-primary uk-button-large"
									href="#gallery"
									uk-scroll
								>
									Start browsing
								</a>
							</div>
							<div>
								<Link
									:href="route('pages.showcase.themed.picnics')"
									class="uk-button uk-button-tertiary uk-button-large"
								>
									Explore our themed picnics.
								</Link>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section
			id="gallery"
			class="uk-section uk-section-large uk-section-default"
		>
			<div class="uk-container uk-container-xlarge">
				<article
					class="uk-grid uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2 uk-grid-match"
					uk-grid="masonry: true; parallax: 200"
					uk-lightbox=""
				>
					<div v-for="(image, index) in urls" :key="index">
						<div class="uk-panel">
							<a :href="image">
								<img
									:src="image"
									alt=""
									height="480"
									loading="lazy"
									width="640"
								/>
							</a>
						</div>
					</div>

				</article>
			</div>
		</section>
	</GuestLayout>

</template>

<style scoped>

</style>

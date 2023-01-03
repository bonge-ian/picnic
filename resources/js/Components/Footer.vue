<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { computed } from 'vue';

const currentDateAsJson = computed(() => new Date().toJSON());
const formattedDate = computed(() => new Intl.DateTimeFormat(document.documentElement.lang, {
	year: 'numeric',
}).format());

</script>


<template>
	<footer
		class="uk-section-default uk-position-z-index-negative uk-section uk-section-large uk-sticky"
		uk-sticky="position: bottom; overflow-flip: true; start: -100%; end: 0;"
	>
		<div class="uk-container uk-container-small">
			<div
				class="uk-margin-xlarge uk-grid"
				uk-grid
			>
				<div class="uk-width-1-2 uk-width-auto@s uk-width-1-3@m uk-first-column">
					<h3 class="uk-h5 uk-text-bold">Wonderland Picnics</h3>
					<ul class="uk-list uk-margin-medium">
						<li>
							<Link :href="route('pages.packages')"
								  class="uk-link-heading"
							>
								Packages
							</Link>
						</li>
						<li>
							<Link :href="route('pages.gallery')"
								  class="uk-link-heading"
							>
								Gallery
							</Link>
						</li>
						<li>
							<Link :href="route('pages.showcase.themed.picnics')"
								  class="uk-link-heading"
							>
								Themed Picnics
							</Link>
						</li>

					</ul>
				</div>

				<div class="uk-width-1-2 uk-width-auto@s uk-width-1-3@m">
					<h3 class="uk-h5 uk-text-bold">About</h3>
					<ul class="uk-list uk-margin-medium">
						<li>
							<Link :href="route('pages.about')"
								  class="uk-link-heading"
							>
								About us
							</Link>
						</li>
						<li>
							<a
								class="uk-link-heading"
								href="#"
							>
								How it works
							</a>
						</li>
						<li>
							<a class="uk-link-heading"
							   href="mailto:info@bonge-inc.co.ke"
							>
								Contact us
							</a>
						</li>
					</ul>
				</div>
				<div class="uk-width-1-2 uk-width-auto@s uk-width-1-3@m">
					<h3 class="uk-h5 uk-text-bold">Follow Us</h3>
					<ul class="uk-list uk-margin-medium">
						<li>
							<div
								class="uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle uk-grid"
								uk-grid=""
							>
								<div class="uk-width-auto uk-first-column">
									<a
										aria-label="YouTube"
										href="https://www.youtube.com/wonderlandpicnics"
										target="_blank"
									>
											<span
												class="uk-text-emphasis uk-icon"
												uk-icon="icon: youtube;"
											>
											</span>
									</a>
								</div>
								<div>
									<div class="uk-panel">
										<a
											class="uk-link-heading uk-margin-remove-last-child"
											href="https://www.youtube.com/wonderlandpicnics"
											target="_blank"
										>
											YouTube
										</a>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div
								class="uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle uk-grid"
								uk-grid=""
							>
								<div class="uk-width-auto uk-first-column">
									<a
										aria-label="Tiktok"
										href="https://github.com/wonderlandpicnics"
										target="_blank"
									>
										<span
											class="uk-text-emphasis uk-icon"
											uk-icon="icon: tiktok;"
										>
											</span>
									</a>
								</div>
								<div>
									<div class="uk-panel">
										<a
											class="uk-link-heading uk-margin-remove-last-child"
											href="https://github.com/wonderlandpicnics"
											target="_blank"
										>
											Tiktok
										</a>
									</div>
								</div>
							</div>
						</li>

						<li>
							<div
								class="uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle uk-grid"
								uk-grid=""
							>
								<div class="uk-width-auto uk-first-column">
									<a
										aria-label="Instagram"
										href="https://github.com/wonderlandpicnics"
										target="_blank"
									><span
										class="uk-text-emphasis uk-icon"
										uk-icon="icon: instagram;"
									>
											</span>
									</a>
								</div>
								<div>
									<div class="uk-panel">
										<a
											class="uk-link-heading uk-margin-remove-last-child"
											href="https://github.com/wonderlandpicnics"
											target="_blank"
										>
											Instagram
										</a>
									</div>
								</div>
							</div>
						</li>

						<li>
							<div
								class="uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle uk-grid"
								uk-grid=""
							>
								<div class="uk-width-auto uk-first-column">
									<a
										aria-label="Twitter"
										href="https://twitter.com/wonderlandpicnics"
										target="_blank"
									>
											<span
												class="uk-text-emphasis uk-icon"
												uk-icon="icon: twitter;"
											>
											</span>
									</a>
								</div>
								<div>
									<div class="uk-panel">
										<a
											class="uk-link-heading uk-margin-remove-last-child"
											href="https://twitter.com/wonderlandpicnics"
											target="_blank"
										>
											Twitter
										</a>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div
				class="tm-grid-expand uk-child-width-1-1 uk-margin-remove-vertical uk-grid uk-grid-stack"
				uk-grid=""
			>
				<div class="uk-width-1-1 uk-first-column">
					<div class="uk-panel uk-text-small uk-text-center">
						©
						<time :datetime="currentDateAsJson">{{ formattedDate }}</time>
						Circle. All rights reserved.<br/>Powered
						by
						<a
							class="uk-link-heading"
							href="https://bonge-inc.co.ke/"
							target="_blank"
						>
							Bonge Inc
						</a>
						.
					</div>
				</div>
			</div>
		</div>
	</footer>
</template>

<style scoped>

</style>

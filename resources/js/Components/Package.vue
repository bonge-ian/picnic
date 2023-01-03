<script setup>
import { computed } from "vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
	title: String,
	peopleRange: String,
	price: String,
	imageUrl: String,
	details: Array,
	slug:String,
});

const imageAlt = computed(() => `${props.title} Package Showcase`)

</script>

<template>
	<article
		class="uk-grid-large uk-margin-xlarge uk-grid uk-padding-large-vertical"
		uk-grid
		:id="slug"
	>
		<div
			id="package"
			class="uk-grid-item-match uk-width-2-3@l uk-first-column"
		>
			<div class="uk-panel uk-width-1-1">
				<div class="uk-panel uk-margin-remove-first-child uk-margin uk-margin-remove-top">
					<div class="uk-child-width-expand uk-grid-column-large uk-grid"
						 uk-grid
					>
						<div class="uk-width-1-2@s uk-flex-last@s">
							<picture class="uk-cover-container">
								<canvas
									height="915"
									width="610"
								></canvas>
								<img
									:alt="imageAlt"
									:src="imageUrl"
									loading="lazy"
									uk-cover="width: 610;height: 915"
								/>
							</picture>
						</div>
						<div
							class="uk-margin-remove-first-child uk-first-column"
							uk-parallax="x: -5vw,0;  easing: 0; target: !#package>*; end: 40vh + 100% ; media: @s;"
						>
							<h2 class="uk-h1 uk-margin-top uk-margin-remove-bottom">{{ title }}</h2>
							<hr class="uk-divider-small uk-border-tertiary"/>
							<p class="uk-text-lead uk-margin-remove-bottom">What to expect ({{ peopleRange }} PAX)</p>
							<div
								class="uk-margin-large-top uk-grid uk-child-width-1-1 uk-grid-small"
								uk-grid
							>
								<div v-for="(detail, index) in details" :key="index">
									<div
										class="uk-child-width-expand uk-grid-small uk-flex-middle uk-grid"
										uk-grid=""
									>
										<div class="uk-width-auto uk-first-column">
											<img
												alt=""
												height="24"
												src="../../images/tick.svg"
												uk-svg
												width="24"
											/>
										</div>
										<div class="uk-margin-remove-first-child">
											<p class="uk-text-muted uk-margin-remove">
												{{ detail }}
											</p>
										</div>
									</div>
								</div>
							</div>

							<div class="uk-margin-large-top">
								<Link
									class="uk-button uk-button-primary uk-button-large"
									:href="route('bookings.create', {_query :{
										package: slug
									}})"
								>
									Book now
								</Link>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="uk-grid-item-match uk-width-1-3@l">
			<div
				class="uk-panel uk-width-1-1"
				uk-parallax="x: 5vw,0;  easing: 0; target: !#package>*; end: 40vh + 100% ; media: @s;"
			>
				<h5 class="uk-margin-remove-bottom">Only at</h5>
				<h3 class="uk-heading-small uk-text-success uk-text-bold uk-margin-small-top">
					{{ price }}
				</h3>

				<h4 class="uk-text-bold uk-margin-large-top">Addons</h4>
				<hr class="uk-divider-small uk-margin-medium-bottom"/>
				<ul class="uk-list uk-list-divider">
					<li>
						<div
							class="uk-child-width-expand@m uk-grid-small uk-grid"
							uk-grid
						>
							<div class="uk-width-small@m uk-text-break uk-first-column">
								<h5 class="el-title uk-margin-remove">Card</h5>
							</div>
							<div class="uk-text-right@m">
								<p class="uk-margin-remove uk-panel uk-text-emphasis">Ksh, 200</p>
							</div>
						</div>
					</li>
					<li>
						<div
							class="uk-child-width-expand@m uk-grid-small uk-grid"
							uk-grid
						>
							<div class="uk-width-small@m uk-text-break uk-first-column">
								<h5 class="el-title uk-margin-remove">Chocolate</h5>
							</div>
							<div class="uk-text-right@m">
								<p class="uk-margin-remove uk-panel uk-text-emphasis">Ksh, 400</p>
							</div>
						</div>
					</li>
					<li>
						<div
							class="uk-child-width-expand@m uk-grid-small uk-grid"
							uk-grid
						>
							<div class="uk-width-small@m uk-text-break uk-first-column">
								<h5 class="el-title uk-margin-remove">Wine</h5>
							</div>
							<div class="uk-text-right@m">
								<p class="uk-margin-remove uk-panel uk-text-emphasis">Ksh, 1,400</p>
							</div>
						</div>
					</li>
					<li>
						<div
							class="uk-child-width-expand@m uk-grid-small uk-grid"
							uk-grid
						>
							<div class="uk-width-small@m uk-text-break uk-first-column">
								<h5 class="el-title uk-margin-remove">Beer</h5>
							</div>
							<div class="uk-text-right@m">
								<p class="uk-margin-remove uk-panel uk-text-emphasis">
									Ksh, 200 (per bottle/can)
								</p>
							</div>
						</div>
					</li>
				</ul>

				<h5 class="uk-h2 uk-text-bold uk-text-danger uk-heading-bullet">Note</h5>
				<div class="uk-tile uk-tile-muted uk-tile-small">
					<ul class="uk-list uk-list-divider">
						<li>Place orders at least 48 hrs earlier for proper planning</li>
						<li>Price is not inclusive of food/venue charges</li>
					</ul>
				</div>
			</div>
		</div>
	</article>
</template>

<style scoped>

</style>

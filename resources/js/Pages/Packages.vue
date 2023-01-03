<script setup>

import GuestLayout from "@/Layouts/GuestLayout.vue";
import Package from "@/Components/Package.vue";
import { onMounted, ref } from "vue";
import { useGetQueryParameters } from "@/Composables/get_query_parameters";

const props = defineProps({
	packages: Array,
});
const scroll_button = ref(null);

onMounted(() => {
	let selected_package = useGetQueryParameters('selected_package');

	if (selected_package) {
		setTimeout(() => {
			UIkit.scroll(scroll_button.value).scrollTo(`#${selected_package}`);
		}, 1200)
	}
})

</script>

<template>
	<GuestLayout>
		<section
			class="uk-section-default uk-section uk-section-large uk-flex uk-flex-center uk-flex-middle uk-flex-column"
			uk-height-viewport="offset-top: true"
		>
			<div class="uk-container uk-container-xsmall uk-text-center">
				<hr class="uk-divider-small"/>
				<h2 class="uk-h3 uk-text-bold uk-text-secondary uk-margin-remove-bottom">Picnic Bundles.</h2>

				<h1 class="uk-text-bold uk-heading-small">
					<span class="uk-text-danger">No matter</span> what you are celebrating, <br class="uk-visible@m"/>
					We’ve got you <span class="uk-text-primary"> covered! </span>
				</h1>
				<p class="uk-text-lead">
					Choose the
					<span class="uk-text-background uk-text-bold">right </span>
					<span class="uk-text-danger uk-text-bold"> package</span> for your
					<span class="uk-text-background uk-text-bold">ultimate experience</span>.
				</p>
				<a
					class="uk-button uk-button-primary uk-button-large uk-margin"
					href="#packages"
					uk-scroll
				>
					Get started
				</a>
				<hr class="uk-divider-small uk-margin-medium-top"/>
			</div>
		</section>

		<section
			id="packages"
			class="uk-section-muted uk-position-z-index-negative uk-section uk-sticky"
			uk-sticky="position: bottom; overflow-flip: true; start: -100%; end: 0;"
		>
			<div class="uk-container uk-container-small uk-text-center">
				<h2 class="uk-h1 uk-text-background uk-text-bold">Our curated picnic bundles</h2>
				<p class="uk-text-lead uk-margin-remove-bottom">
					Each picnic we create is
					<span class="uk-text-highlight-underline-below-tertiary">beautifully unique</span>.
				</p>

				<p class="uk-text-lead uk-margin-small-top">
					All packages are
					<span class="uk-text-emphasis uk-text-highlight-underline-below">customizable</span>,
					<br class="uk-visible@m"/>if you have any special requests
					<a
						class="uk-link"
						href="#"
					>
						feel free to reach out
					</a>
					and we will do everything in our power to accommodate!
				</p>
				<button class="uk-button uk-button-large uk-button-default">Get custom quote</button>
			</div>
		</section>

		<section class="uk-section-large uk-section-default uk-section">
			<div class="uk-container uk-container-xlarge">
				<div v-for="(picnicPackage, index) in packages" :key="index">
					<Package :details="picnicPackage.details"
							 :image-url="picnicPackage.image_url"
							 :people-range="picnicPackage.people_range"
							 :price="picnicPackage.price"
							 :title="picnicPackage.name"
							 :slug="picnicPackage.slug"
					/>
				</div>
			</div>
		</section>

		<section class="uk-section uk-section-secondary">
			<div class="uk-container">
				<div
					class="uk-grid uk-grid-large uk-flex-middle"
					uk-grid
				>
					<div class="uk-width-expand@m">
						<div class="uk-panel">
							<h2 class="uk-text-bold">Planning a bigger celebration?</h2>
							<p class="uk-margin-remove uk-text-muted">
								We’ve got you covered. If your celebration requires more than 3 tables, please get in
								touch with us to receive custom pricing for your luxury picnic experience.
							</p>
						</div>
					</div>
					<div class="uk-width-auto@m">
						<div class="uk-panel">
							<a
								class="uk-button uk-button-large uk-button-danger"
								href="#"
							>
								Get a quote</a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="uk-section uk-section-large uk-section-default">
			<div class="uk-container ">
				<div
					class="uk-margin-remove-bottom uk-child-width-1-1 uk-margin-xlarge uk-grid uk-grid-stack"
					uk-grid=""
				>
					<div class="uk-width-1-1 uk-first-column">
						<h2 class="uk-width-large@m uk-text-secondary uk-text-bold">Enquiries that you may have.</h2>
					</div>
				</div>

				<div
					class="uk-grid uk-child-width-1-1 uk-child-width-1-2@m uk-grid-stack uk-grid-large"
					uk-grid
				>
					<div>
						<ul uk-accordion="collapsible: true;transition: ease-in-out">
							<li>
								<a
									class="uk-accordion-title"
									href="#"
								>
									How does Wonderland Picnics work
								</a>
								<div class="uk-accordion-content uk-panel">
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad ducimus similique unde
									quae incidunt nostrum quasi facilis odit laboriosam sint?
								</div>
							</li>
							<li>
								<a
									class="uk-accordion-title"
									href="#"
								>
									Can I book for an event less than 24hours?
								</a>
								<div class="uk-accordion-content uk-panel">
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo facilis consectetur
									fugiat culpa minus odio deserunt obcaecati vitae quas, nisi commodi excepturi
									reiciendis labore voluptatum enim? Necessitatibus molestiae cupiditate est quis
									alias amet at deserunt, nisi sit earum eaque libero?
								</div>
							</li>
							<li>
								<a
									class="uk-accordion-title"
									href="#"
								>
									Is there a discount offered?
								</a>
								<div class="uk-accordion-content uk-panel">
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus ad recusandae
									voluptatibus similique ab amet modi, asperiores vero magni nam quasi dignissimos
									natus autem, corrupti repudiandae ipsa provident minima, reprehenderit in
									accusantium distinctio atque sapiente cupiditate omnis! Autem, iure impedit.
								</div>
							</li>
							<li>
								<a
									class="uk-accordion-title"
									href="#"
								>
									Do you capture all types of events
								</a>
								<div class="uk-accordion-content uk-panel">
									Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos atque
									praesentium nobis esse harum, perspiciatis sequi doloremque! Eum ipsa, libero sint
									quisquam sapiente impedit assumenda cupiditate fugit nobis modi incidunt odio saepe
									sed deleniti hic? Suscipit praesentium possimus reprehenderit, incidunt sint sunt
									totam neque rerum sit doloribus explicabo debitis laborum ipsam reiciendis. Labore
									ullam ratione repellat alias. Distinctio molestiae, voluptatibus reiciendis fuga,
									doloremque cumque porro obcaecati numquam eius maiores eum sed dolorem optio quos
									neque accusantium magnam dolor adipisci sapiente.
								</div>
							</li>
						</ul>
					</div>
					<div>
						<ul uk-accordion="collapsible: true;transition: ease-in-out">
							<li>
								<a
									class="uk-accordion-title"
									href="#"
								>
									How does Wonderland Picnics work
								</a>
								<div class="uk-accordion-content uk-panel">
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad ducimus similique unde
									quae incidunt nostrum quasi facilis odit laboriosam sint?
								</div>
							</li>
							<li>
								<a
									class="uk-accordion-title"
									href="#"
								>
									Can I book for an event less than 24hours?
								</a>
								<div class="uk-accordion-content uk-panel">
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo facilis consectetur
									fugiat culpa minus odio deserunt obcaecati vitae quas, nisi commodi excepturi
									reiciendis labore voluptatum enim? Necessitatibus molestiae cupiditate est quis
									alias amet at deserunt, nisi sit earum eaque libero?
								</div>
							</li>
							<li>
								<a
									class="uk-accordion-title"
									href="#"
								>
									Is there a discount offered?
								</a>
								<div class="uk-accordion-content uk-panel">
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus ad recusandae
									voluptatibus similique ab amet modi, asperiores vero magni nam quasi dignissimos
									natus autem, corrupti repudiandae ipsa provident minima, reprehenderit in
									accusantium distinctio atque sapiente cupiditate omnis! Autem, iure impedit.
								</div>
							</li>
							<li>
								<a
									class="uk-accordion-title"
									href="#"
								>
									Do you capture all types of events
								</a>
								<div class="uk-accordion-content uk-panel">
									Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos atque
									praesentium nobis esse harum, perspiciatis sequi doloremque! Eum ipsa, libero sint
									quisquam sapiente impedit assumenda cupiditate fugit nobis modi incidunt odio saepe
									sed deleniti hic? Suscipit praesentium possimus reprehenderit, incidunt sint sunt
									totam neque rerum sit doloribus explicabo debitis laborum ipsam reiciendis. Labore
									ullam ratione repellat alias. Distinctio molestiae, voluptatibus reiciendis fuga,
									doloremque cumque porro obcaecati numquam eius maiores eum sed dolorem optio quos
									neque accusantium magnam dolor adipisci sapiente.
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<a id="js-scroll-trigger" ref="scroll_button" href="#" uk-scroll uk-hidden></a>
	</GuestLayout>

</template>

<style scoped>

</style>

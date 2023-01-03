<script setup>
import { Link } from '@inertiajs/inertia-vue3';</script>

<template>
	<div
		id="mobile-nav"
		class="uk-dropbar uk-dropbar-top"
		uk-drop="mode: click;animation: reveal-top; animate-out: true; duration: 300;stretch: true;bg-scroll: false;flip:false;toggle:false"
	>
		<div class="uk-flex uk-flex-column">
			<div class="uk-margin-auto-bottom">
				<div
					class="uk-grid uk-child-width-1-1 uk-grid-stack"
					uk-grid=""
				>
					<div class="uk-first-column">
						<div class="uk-panel">
							<ul
								class="uk-nav uk-nav-default uk-nav-divider"
								uk-nav
							>
								<li :class="{'uk-active' : route().current('pages.index')}">
									<Link :href="route('pages.index')">
										Home
									</Link>
								</li>
								<li :class="{'uk-active' : route().current('pages.packages')}">
									<Link :href="route('pages.packages')">
										Packages
									</Link>
								</li>
								<li :class="{'uk-active' : route().current('pages.gallery')}">
									<Link :href="route('pages.gallery')">
										Gallery
									</Link>
								</li>
								<li :class="{'uk-active' : route().current('pages.about')}">
									<Link :href="route('pages.about')">
										About us
									</Link>
								</li>
								<li>
									<a href="mailto:info@bonge-inc.co.ke">
										Contact us
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="uk-grid-margin uk-first-column">
						<div class="uk-panel">
							<div
								class="uk-child-width-1-1 uk-grid-margin uk-grid uk-grid-stack"
								uk-grid
							>
								<div class="uk-width-1-1 uk-first-column">
									<div>
										<Link class="uk-width-1-1 uk-button uk-button-primary"
											  :href="route('bookings.create')"
										>
											Book Appointment
										</Link>
									</div>

									<div class="uk-h6 uk-hidden@s uk-margin uk-text-center">
										<a class="uk-link-heading"
										   href="tel:+254712467523"
										>
											+254-712-467-523
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<style scoped>

</style>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import MobileNav from "@/Components/MobileNav.vue";</script>

<template>
	<header
		class="uk-background-default header"
		uk-sticky="start: 200;animation: uk-animation-slide-top show-on-up: true;sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky"
	>
		<div class="uk-navbar-container uk-border-bottom">
			<div class="uk-container uk-container-large">
				<nav
					class="uk-navbar"
					uk-navbar="dropbar: true;mode: click"
				>
					<div class="uk-navbar-left">
						<Link
							class="uk-logo uk-navbar-item"
							:href="route('pages.index')"
							uk-icon="icon: wonderland;ratio: 4"
						>
						</Link>
					</div>
					<div class="uk-navbar-center uk-visible@m">
						<ul class="uk-navbar-nav">
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
					<div class="uk-navbar-right">
						<div class="uk-navbar-item uk-visible@m">
							<Link as="button"
								  class="uk-button uk-button-primary"
								  :href="route('bookings.create')"
							>
								Book Now
							</Link>
						</div>
						<a
							aria-expanded="false"
							aria-haspopup="true"
							class="uk-navbar-toggle uk-navbar-toggle-animate uk-icon uk-navbar-toggle-icon uk-hidden@m"
							href="#mobile-nav"
							uk-navbar-toggle-icon
							uk-toggle="target: #mobile-nav"
						>
						</a>
					</div>

				</nav>

				<MobileNav/>
			</div>
		</div>
	</header>
</template>

<style scoped>

</style>

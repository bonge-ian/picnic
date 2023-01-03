<script setup>

import GuestLayout from "@/Layouts/GuestLayout.vue";
import ThemeCard from "@/Components/ThemeCard.vue";

const themes = [
	{
		title: "The Maasai Vibe",
		coverImageUrl: 'maasai/1.jpg',
		overview: "Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut labore et " +
			"dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip " +
			"ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore " +
			"eu fugiat nulla pariatur.",
		gallery: [
			'maasai/2.jpg',
			'maasai/3.jpg',
			'maasai/4.jpg',
		],

	},
	{
		title: "Black and Gold Plush",
		coverImageUrl: 'black-gold/4.jpg',
		overview: "Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut labore et " +
			"dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip " +
			"ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore " +
			"eu fugiat nulla pariatur.",
		gallery: [
			'black-gold/1.jpg',
			'black-gold/2.jpg',
			'black-gold/3.jpg',
		],

	},
	{
		title: "Black and White Plush",
		coverImageUrl: 'black-white/4.jpg',
		overview: "Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut labore et " +
			"dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip " +
			"ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore " +
			"eu fugiat nulla pariatur.",
		gallery: [
			'black-white/1.jpg',
			'black-white/2.jpg',
			'black-white/3.jpg',
		],

	},
	{
		title: "Rustic Vibe",
		coverImageUrl: 'rustic-vibe/4.jpg',
		overview: "Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut labore et " +
			"dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip " +
			"ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore " +
			"eu fugiat nulla pariatur.",
		gallery: [
			'rustic-vibe/1.jpg',
			'rustic-vibe/2.jpg',
			'rustic-vibe/3.jpg',
		],

	},
	{
		title: "Khanga Vibe",
		coverImageUrl: 'khanga/6.jpg',
		overview: "Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut labore et " +
			"dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip " +
			"ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore " +
			"eu fugiat nulla pariatur.",
		gallery: [
			'khanga/1.jpg',
			'khanga/2.jpg',
			'khanga/3.jpg',
			'khanga/4.jpg',
			'khanga/5.jpg',
		],

	},
	{
		title: "By The Lake",
		coverImageUrl: 'by-the-lake/4.jpg',
		overview: "Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut labore et " +
			"dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip " +
			"ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore " +
			"eu fugiat nulla pariatur.",
		gallery: [
			'by-the-lake/1.jpg',
			'by-the-lake/2.jpg',
			'by-the-lake/3.jpg',
		],
	},
	{
		title: "Secondary Plush Vibe",
		coverImageUrl: 'plush-vibe2/3.jpg',
		overview: "Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut labore et " +
			"dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip " +
			"ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore " +
			"eu fugiat nulla pariatur.",
		gallery: [
			'plush-vibe2/1.jpg',
			'plush-vibe2/2.jpg',
		],
	},
	{
		title: "Plush Vibe",
		coverImageUrl: 'plush-vibe/5.jpg',
		overview: "Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut labore et " +
			"dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip " +
			"ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore " +
			"eu fugiat nulla pariatur.",
		gallery: [
			'plush-vibe/1.jpg',
			'plush-vibe/2.jpg',
			'plush-vibe/3.jpg',
			'plush-vibe/4.jpg',
		],
	},
]

</script>

<template>
	<GuestLayout>
		<section class="uk-section uk-section-muted uk-section-large">
			<div class="uk-container uk-container-xsmall">
				<div class="uk-text-center">
					<h2 class="uk-text-primary uk-margin-remove-bottom">Past Events</h2>
					<h1 class="uk-text-bold">Explore our <span class="uk-text-primary">awesome</span> porfolio</h1>
					<a
						class="uk-button uk-button-primary uk-button-large uk-margin-medium-top uk-margin-large-bottom"
						href="#themed-showcase"
						uk-scroll
					>
						Check us out
					</a>
				</div>
			</div>
		</section>

		<section id="themed-showcase"
				 class="uk-section-large uk-section uk-section-default"
				 uk-scrollspy="target: [uk-scrollspy-class]; cls: uk-animation-slide-left-small; delay: false;"
		>
			<div class="uk-container uk-container-large">
				<div
					class="uk-grid uk-grid-large uk-child-width-1-1"
					uk-grid
				>
					<div v-for="(theme,index) in themes" :key="index">
						<ThemeCard :cover-image-url="theme.coverImageUrl"
								   :gallery="theme.gallery"
								   :overview="theme.overview"
								   :title="theme.title"
						/>

					</div>


				</div>
			</div>
		</section>
	</GuestLayout>
</template>

<style scoped>

</style>

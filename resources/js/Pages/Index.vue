<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import GuestLayout from "@/Layouts/GuestLayout.vue";
import about_svg from '../../images/about-us.svg';
import fun_jpg from '../../images/fun.jpg';
import contact_jpg from '../../images/contact.jpg';
import Quote from "@/Components/Quote.vue";
import Alert from "@/Components/Alert.vue";

const quoteRange = _.range(1, 15);

</script>

<template>
	<GuestLayout>
		<section class="uk-section uk-section-default">
			<div class="uk-container">
				<div
					class="placeholder uk-width-2-3@m uk-align-center"
					style="height: 5.625rem"
				>

						<div v-if="$page.props.flash.message">
							<Alert :message="$page.props.flash.message"/>
						</div>
						<div v-if="$page.props.error.message">
							<Alert :message="$page.props.error.message" status="danger"/>
						</div>

				</div>
				<div
					class="uk-grid uk-child-width-1-1 uk-grid-margin uk-grid-stack"
					uk-grid
				>
					<div class="uk-grid-item-match uk-first-column uk-width-1-1">
						<div class="uk-panel uk-text-center">
							<h1 class="uk-heading-medium uk-text-bold">
								<span class="uk-text-background">Revitilize</span> with nature,
								<br class="uk-visible@m"/>
								and create <span class="uk-text-background">memorable</span> experiences
							</h1>
							<p class="uk-text-lead uk-margin uk-width-xlarge uk-margin-auto uk-panel">
								From small intimate gatherings to capacious and lavish affairs, our picnics are
								memorable, magical, perfectly planned and beautifully executed.
							</p>
							<div class="uk-margin-medium">
								<div
									class="uk-flex-middle uk-grid-small uk-child-width-auto uk-flex-center uk-grid"
									uk-grid
								>
									<div>
										<Link
											class="uk-button uk-button-primary uk-button-large"
											:href="route('bookings.create')"
										>
											Book Now
										</Link>
									</div>
									<div>
										<a
											class="uk-button uk-button-default uk-button-large"
											href="#how-it-works"
											uk-scroll
										>
											Learn more
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div
					class="uk-grid uk-child-width-1-1 uk-grid-margin uk-grid-stack"
					uk-grid
				>
					<div class="uk-grid-item-match uk-width-1-1 uk-first-column">
						<div class="uk-panel">
							<div
								class="uk-position-relative uk-margin-remove-vertical uk-text-center"
								uk-parallax="scale: 1,1.2; easing: 0.5; start: 100%;"
							>
								<a
									href="#hero-video"
									uk-toggle="target: #hero-video"
								>
									<img
										alt=""
										class="uk-border-rounded"
										height="900"
										loading="eager"
										src="../../images/hero.jpg"
										width="1200"
									/>
								</a>
							</div>
							<div
								class="uk-disabled uk-position-absolute uk-position-center uk-width-1-1 uk-text-center"
							>
								<img
									alt=""
									class="play-image"
									height="84"
									loading="eager"
									src="../../images/play.svg"
									width="84"
								/>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<Teleport to="body">
			<!-- This is the modal -->
			<div
				id="hero-video"
				class="uk-modal uk-flex-top"
				uk-modal
			>
				<div class="uk-modal-dialog uk-width-auto uk-margin-auto-vertical">
					<button
						class="uk-modal-close-outside"
						type="button"
						uk-close
					></button>
					<iframe
						allowfullscreen
						height="720"
						src="https://player.vimeo.com/video/581362395?title=0&portrait=0&byline=0&autoplay=1&muted=true"
						title="Wonderland Picnics"
						uk-responsive
						uk-video="autoplay: inview;automute: true"
						width="1280"
					></iframe>
				</div>
			</div>
		</Teleport>

		<section
			id="who-are-we"
			class="uk-section-default"
		>
			<div
				:data-src="about_svg"
				class="uk-background-norepeat uk-background-top-right uk-background-image@s uk-section uk-section-xlarge"
				uk-img
				uk-parallax="bgx: -80,-80; bgy: 160,410; easing: 1"
			>
				<div class="uk-container uk-container-xlarge">
					<div
						class="uk-grid-large uk-grid-margin-large uk-grid"
						uk-grid
					>
						<div class="uk-width-xlarge@l uk-first-column">
							<h2 class="uk-h5 uk-text-primary">Who are we</h2>
							<h3 class="uk-h1 uk-margin-remove-vertical">
								Changing events experiences, <br class="uk-visible@m"/>
								one picnic a time <span class="uk-text-primary">.</span>
							</h3>

							<div class="uk-panel uk-margin-large uk-width-xlarge">
								We’re an event planning service, with a knack of picnic themed parties. We are proud to
								provide an ultimate picnic experience so you can relax and enjoy this magic moment and
								create unforgettable memories amongst your loved ones.
							</div>

							<div class="uk-margin">
								<Link
									:href="route('pages.about')"
									class="uk-button uk-button-large uk-button-secondary"
								>
									About us
								</Link>
							</div>
						</div>
						<div class="uk-width-expand@l">
							<aside class="uk-margin">
								<div class="uk-child-width-1-2 uk-grid-match uk-grid">
									<div>
										<figure class="uk-panel uk-margin-large-top@m">
											<img
												alt=""
												height="795"
												loading="lazy"
												src="../../images/about-1.jpg"
												width="530"
											/>

										</figure>
									</div>
									<div>
										<figure class="uk-panel">
											<img
												alt=""
												height="795"
												loading="lazy"
												src="../../images/about-2.jpg"
												width="530"
											/>
										</figure>
									</div>
								</div>
							</aside>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="how-it-works"
				 class="uk-section uk-section-muted uk-section-xlarge"
		>
			<div class="uk-container">
				<div class="uk-width-1-1 uk-text-center uk-margin-large">
					<h2 class="uk-heading-small uk-text-bold">Only 3 simple steps</h2>
					<hr class="uk-divider-small"/>
				</div>
				<div
					class="uk-child-width-1-1 uk-child-width-1-3@s uk-grid-large uk-grid-match uk-grid uk-text-center"
					uk-grid
				>
					<div>
						<div class="uk-panel uk-card uk-box-shadow-medium uk-card-hover uk-card-body uk-border-rounded">
							<h5>Step 1</h5>
							<div
								class="uk-border-rounded uk-icon uk-text-primary"
								uk-icon="icon: calender-check; ratio: 3"
							></div>
							<h3 class="uk-card-title uk-margin-medium-top uk-margin-remove-bottom uk-text-bold">
								Choose a Date
							</h3>
							<p class="uk-panel uk-margin-top">
								Choose a time and place and we’ll take care of the rest! Your picnic will be set up and
								perfected 15 minutes before your arrival. When you are finished, we come back to clean
								and pack everything away!
							</p>
						</div>
					</div>
					<div>
						<div class="uk-panel uk-card uk-box-shadow-medium uk-card-hover uk-card-body uk-border-rounded">
							<h5>Step 2</h5>
							<div
								class="uk-border-rounded uk-icon uk-text-primary"
								uk-icon="icon: location-plus; ratio: 3"
							></div>
							<h3 class="uk-card-title uk-margin-medium-top uk-margin-remove-bottom uk-text-bold">
								Pick your preferred location
							</h3>
							<p class="uk-panel uk-margin-top">
								We bring the picnic to you! If you haven’t got a place, give us a call and we’ll help
								you find the perfect spot!
							</p>
						</div>
					</div>
					<div>
						<div class="uk-panel uk-card uk-box-shadow-medium uk-card-hover uk-card-body uk-border-rounded">
							<h5>Step 3</h5>
							<div
								class="uk-border-rounded uk-icon uk-text-primary"
								uk-icon="icon: customize; ratio: 3"
							></div>
							<h3 class="uk-card-title uk-margin-medium-top uk-margin-remove-bottom uk-text-bold">
								Customize your experience
							</h3>
							<p class="uk-panel uk-margin-top">
								Pick one of our packages and customize them to your liking. Have a unique request? Beep
								us for a personalized quote.
							</p>
						</div>
					</div>
				</div>

				<div class="uk-width-1-1 uk-text-center uk-margin-large">
					<Link
						class="uk-button uk-button-large uk-button-primary"
						:href="route('bookings.create')"
					>
						Start now.
					</Link>
				</div>
			</div>
		</section>

		<section class="uk-section uk-section-xlarge uk-section-default">
			<div class="uk-container uk-container-large">
				<div
					class="uk-grid uk-flex-bottom"
					uk-grid
				>
					<div class="uk-width-2-3@m">
						<h5 class="uk-text-primary">Portofolio</h5>
						<h2 class="uk-h1 uk-width-xlarge uk-margin-remove-vertical uk-text-capitalize">
							Check out our past events
						</h2>
					</div>
					<div class="uk-width-1-3@m">
						<div class="uk-margin uk-text-right@m">
							<Link
								class="uk-button uk-button-large uk-button-primary"
								:href="route('pages.gallery')"
							>
								Our Gallery
							</Link>
						</div>
					</div>
				</div>
				<div
					class="uk-grid-small  uk-grid"
					uk-grid
				>
					<div class="uk-width-1-2@m uk-first-column">
						<div class="uk-cover-container uk-panel">
							<canvas height="900"
									width="600"
							></canvas>
							<img alt=""
								 height="900"
								 loading="lazy"
								 src="../../images/port8.jpg"
								 uk-cover
								 width="700"
							>
						</div>
					</div>
					<div class="uk-width-1-2@m">
						<div class="uk-margin uk-margin-remove-bottom uk-cover-container">
							<canvas height="449"
									width="600"
							></canvas>
							<img alt=""
								 height="449"
								 loading="lazy"
								 src="../../images/port5.jpg"
								 uk-cover
								 width="600"
							>
						</div>
						<div class="uk-grid-margin-small">
							<div class="uk-child-width-1-1 uk-child-width-1-2@s uk-grid-small uk-grid"
								 uk-grid
							>
								<div>
									<div class="uk-cover-container">
										<canvas height="438"
												width="340"
										></canvas>
										<img alt=""
											 loading="lazy"
											 src="../../images/package6.jpg"
											 uk-cover
										>
									</div>
								</div>
								<div>
									<div class="uk-cover-container">
										<canvas height="438"
												width="340"
										></canvas>
										<img alt=""
											 loading="lazy"
											 src="../../images/package7.jpg"
											 uk-cover
										>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div
					class="uk-grid-small uk-margin uk-grid"
					uk-grid
				>
					<div class="uk-width-1-2@m">
						<div class="uk-cover-container uk-panel">
							<canvas height="900"
									width="600"
							></canvas>
							<img alt=""
								 height="900"
								 loading="lazy"
								 src="../../images/port9.jpg"
								 uk-cover
								 width="700"
							>
						</div>
					</div>
					<div class="uk-width-1-2@m uk-flex-first">
						<div class="uk-margin uk-margin-remove-bottom uk-cover-container">
							<canvas height="449"
									width="600"
							></canvas>
							<img alt=""
								 height="449"
								 loading="lazy"
								 src="../../images/port3.jpg"
								 uk-cover
								 width="600"
							>
						</div>
						<div class="uk-grid-margin-small">
							<div class="uk-child-width-1-1 uk-child-width-1-2@s uk-grid-small uk-grid"
								 uk-grid
							>
								<div>
									<div class="uk-cover-container">
										<canvas height="438"
												width="340"
										></canvas>
										<img alt=""
											 loading="lazy"
											 src="../../images/setup2.jpg"
											 uk-cover
										>
									</div>
								</div>
								<div>
									<div class="uk-cover-container">
										<canvas height="438"
												width="340"
										></canvas>
										<img alt=""
											 loading="lazy"
											 src="../../images/setup3.jpg"
											 uk-cover
										>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="uk-section uk-section-default uk-padding-remove-top">
			<div class="uk-container uk-container-large">
				<div
					:data-src="fun_jpg"
					class="uk-background-cover uk-background-top-right uk-background-norepeat"
					uk-img="loading:lazy;width: 1920; height: 1080;"
				>
					<div
						class="uk-width-1-1 primary-gradient-overlay"
					>
						<div class="uk-text-center uk-text-left@m uk-width-2-3@m uk-width-1-1 uk-light uk-panel">
							<div class="uk-tile uk-tile-xlarge uk-padding-xlarge@l">
								<h4 class="uk-text-primary uk-text-bold">
									We bring magical events to life <span class="uk-text-tertiary">.</span>
								</h4>
								<h2 class="uk-heading-small uk-text-bold">
									<span class="uk-text-tertiary">Wonderland</span>, Where all the fun begins 🌻
								</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="uk-section uk-section-large uk-section-secondary uk-preserve-color">
			<div class="uk-container uk-container-xsmall">
				<div class="uk-text-center uk-width-1-1">
					<h2 class="uk-heading-small uk-text-bold uk-text-tertiary">What our customers say about us.</h2>
					<hr class="uk-divider-small uk-border-tertiary"/>
				</div>
			</div>

			<div class="uk-width-1-1 uk-margin-xlarge-top">
				<div
					class="uk-slider uk-margin uk-slider-container"
					uk-slider="autoplay: true;finite: true"
				>
					<div
						class="uk-position-relative uk-visible-toggle"
						tabindex="-1"
					>
						<ul class="uk-slider-items uk-grid uk-grid-small">
							<li v-for="(author, index) in quoteRange"
								class="uk-width-5-6 uk-width-1-2@s uk-width-1-3@m uk-width-1-5@xl">
								<Quote :author="`Author ${author}`"/>
							</li>

						</ul>
						<div class="uk-visible@xl uk-hidden-hover uk-hidden-touch">
							<a
								aria-label="Previous slide"
								class="uk-slidenav-large uk-position-medium uk-position-center-left uk-icon uk-slidenav-previous uk-slidenav"
								href="#"
								uk-slidenav-previous=""
								uk-slider-item="previous"
							>
							</a>
							<a
								aria-label="Next slide"
								class="uk-slidenav-large uk-position-medium uk-position-center-right uk-icon uk-slidenav-next uk-slidenav"
								href="#"
								uk-slidenav-next=""
								uk-slider-item="next"
							>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="uk-section uk-section-default">
			<div class="uk-container uk-container-xlarge">
				<div
					:data-src="contact_jpg"
					class="uk-width-1-1 uk-background-cover uk-background-norepeat uk-background-tertiary uk-background-blend-darken"
					uk-img="loading: lazy;"
				>
					<div class="uk-text-center uk-tile uk-tile-xlarge">
						<h3 class="uk-heading-small uk-text-bold uk-margin-xlarge-bottom uk-text-white">
							Don’t be shy, <span class="uk-text-tertiary">say hi.</span>
						</h3>
						<h2
							class="uk-heading-medium uk-text-bold uk-margin-xlarge-top uk-margin-remove-bottom uk-text-white"
						>
							Give us a call.
						</h2>

						<div class="uk-margin-small">
							<div
								class="uk-flex-middle uk-grid-small uk-child-width-auto uk-flex-center uk-grid"
								uk-grid
							>
								<div>
									<Link
										class="uk-button uk-button-primary uk-button-large"
										:href="route('bookings.create')"
									>
										Book Now
									</Link>
								</div>
								<div>
									<a
										class="uk-button uk-button-secondary uk-button-large"
										:href="route('pages.gallery')"
									>
										View our past events
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</GuestLayout>
</template>

<style lang="scss"
	   scoped
>
.play-image {
	border-radius: 50%;
	box-shadow: 0 0 0 0 #a6d0b4;
	transform: scale(1);
	animation: pulse 2s infinite;
	margin-top: -42px;
}

@media(min-width: 60rem) {
	#who-are-we > div {
		padding-top: 17.5rem;
	}
}

.primary-gradient-overlay {
	background: linear-gradient(
			100deg,
			rgba(106, 161, 131, 0.8979866981115969) 0%,
			rgba(166, 208, 180, 0.7271183507726613) 30%,
			rgba(166, 208, 208, 0.38538165609479025) 60%,
			rgba(190, 239, 196, 0.43019958326565855) 100%
	);
}
</style>

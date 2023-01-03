<script setup>
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
	booking: Object,
})
</script>

<template>
	<section class="uk-section uk-section-default">
		<div class="uk-container">
			<div
				class="placeholder"
				style="height: 5.625rem"
			></div>
			<div
				class="uk-grid uk-child-width-1-1 uk-grid-margin uk-grid-stack"
				uk-grid
			>
				<div class="uk-grid-item-match uk-first-column uk-width-1-1">
					<div class="uk-panel uk-text-center">
						<h1 class="uk-text-bold">
							<span class="uk-icon uk-text-success" uk-icon="icon: success; ratio: 5"></span>
						</h1>
						<p class="uk-text-lead uk-margin uk-width-xlarge uk-margin-auto uk-panel">
							Thank you for booking with us. <br class="uk-visible@m">One of our representatives will contact you shortly to confirm your booking details.
						</p>
						<div class="uk-margin-medium">
							<div
								class="uk-flex-middle uk-grid-small uk-child-width-auto uk-flex-center uk-grid"
								uk-grid
							>
								<div>
									<Link method="get" as="button" type="button" class="uk-button uk-button-danger uk-button-large"
										:href="route('bookings.cancel', booking.hash)"
									>
										Cancel your booking
									</Link>
								</div>
								<div>
									<Link
										class="uk-button uk-button-default uk-button-large"
										:href="route('pages.index')"
									>
										Go back home
									</Link>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>

	<section class="uk-section uk-section-large">
		<div class="uk-container">
			<div class="uk-grid-column-large uk-grid-margin uk-grid" uk-grid>
				<div class="uk-width-2-3@s uk-first-column">
					<div class="uk-panel">
						<p class="uk-text-lead uk-margin">
							Your booking for {{ booking.package.name }} package
						</p>
						<hr class="uk-divider-small uk-margin-medium">
						<h3 class="uk-text-bold">Billing Details</h3>
						<ul class="uk-list uk-list-large uk-list-divider">
							<li>
								<div class="uk-child-width-expand@m uk-grid-small uk-grid" uk-grid="">
									<div class="uk-width-small@m uk-text-break uk-first-column">
										<h4 class="uk-margin-remove uk-h5">Name</h4>
									</div>
									<div>
										<p class="uk-panel uk-margin-remove uk-text-right">{{ booking.first_name }} {{ booking.last_name }}</p>
									</div>
								</div>
							</li>
							<li>
								<div class="uk-child-width-expand@m uk-grid-small uk-grid" uk-grid="">
									<div class="uk-width-small@m uk-text-break uk-first-column">
										<h4 class="uk-margin-remove uk-h5">Email</h4>
									</div>
									<div>
										<p class="uk-panel uk-margin-remove uk-text-right">{{ booking.email }}</p>
									</div>
								</div>
							</li>
							<li>
								<div class="uk-child-width-expand@m uk-grid-small uk-grid" uk-grid="">
									<div class="uk-width-small@m uk-text-break uk-first-column">
										<h4 class="uk-margin-remove uk-h5">Phone</h4>
									</div>
									<div>
										<p class="uk-panel uk-margin-remove uk-text-right">{{ booking.phone }}</p>
									</div>
								</div>
							</li>

						</ul>
						<h3 class="uk-text-bold">Booking Details</h3>
						<ul class="uk-list uk-list-large uk-list-divider">
							<li>
								<div class="uk-child-width-expand@m uk-grid-small uk-grid" uk-grid="">
									<div class="uk-width-small@m uk-text-break uk-first-column">
										<h4 class="uk-margin-remove uk-h5">Date</h4>
									</div>
									<div>
										<p class="uk-panel uk-margin-remove uk-text-right">{{ booking.formatted_date }}</p>
									</div>
								</div>
							</li>
							<li>
								<div class="uk-child-width-expand@m uk-grid-small uk-grid" uk-grid="">
									<div class="uk-width-small@m uk-text-break uk-first-column">
										<h4 class="uk-margin-remove uk-h5">Starts at</h4>
									</div>
									<div>
										<p class="uk-panel uk-margin-remove uk-text-right">{{ booking.formatted_starts_at }}</p>
									</div>
								</div>
							</li>
							<li>
								<div class="uk-child-width-expand@m uk-grid-small uk-grid" uk-grid="">
									<div class="uk-width-small@m uk-text-break uk-first-column">
										<h4 class="uk-margin-remove uk-h5">Ends at</h4>
									</div>
									<div>
										<p class="uk-panel uk-margin-remove uk-text-right">{{ booking.formatted_ends_at }}</p>
									</div>
								</div>
							</li>
							<li>
								<div class="uk-child-width-expand@m uk-grid-small uk-grid" uk-grid="">
									<div class="uk-width-small@m uk-text-break uk-first-column">
										<h4 class="uk-margin-remove uk-h5">Total Hours</h4>
									</div>
									<div>
										<p class="uk-panel uk-margin-remove uk-text-right">{{ booking.duration }}</p>
									</div>
								</div>
							</li>
							<li v-if="booking.preferred_location">
								<div class="uk-child-width-expand@m uk-grid-small uk-grid" uk-grid="">
									<div class="uk-width-small@m uk-text-break uk-first-column">
										<h4 class="uk-margin-remove uk-h5">Location</h4>
									</div>
									<div>
										<p class="uk-panel uk-margin-remove uk-text-right">{{ booking.preferred_location }}</p>
									</div>
								</div>
							</li>
							<li v-if="booking.notes">
								<div class="uk-child-width-expand@m uk-grid-small uk-grid" uk-grid="">
									<div class="uk-width-small@m uk-text-break uk-first-column">
										<h4 class="uk-margin-remove uk-h5">Notes</h4>
									</div>
									<div>
										<p class="uk-panel uk-margin-remove uk-text-right">{{ booking.notes }}</p>
									</div>
								</div>
							</li>
							<li v-if="booking.addons.length">
								<div class="uk-child-width-expand@m uk-grid-small uk-grid" uk-grid="">
									<div class="uk-width-small@m uk-text-break uk-first-column">
										<h4 class="uk-margin-remove uk-h5">Addons</h4>
									</div>
									<div class="uk-flex uk-flex-right">
											<ul class="uk-list uk-list-disc uk-list-primary">
											<li v-for="addon in booking.addons" :key="addon.id" class="uk-text-capitalize">{{ addon.name}}</li>
										</ul>
									</div>
								</div>
							</li>
							<li>
								<div class="uk-child-width-expand@m uk-grid-small uk-grid" uk-grid="">
									<div class="uk-width-small@m uk-text-break uk-first-column">
										<h4 class="uk-margin-remove uk-text-bold">Total price</h4>
									</div>
									<div>
										<p class="uk-panel uk-margin-remove uk-text-right uk-text-bold">{{ booking.formatted_price }}</p>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="uk-width-1-3@s">
					<div class="uk-margin uk-margin-remove-top">
						<a href="#" class="uk-cover-container">
							<img :src="booking.package.image_url" :alt="`${booking.package.name} Package Cover Image`" width="610" height="904" uk-cover="">
							<canvas width="610" height="904"></canvas>
						</a>
					</div>
					<h3>Package Details</h3>
					<ul class="uk-list uk-list-large uk-list-divider">
						<li>
							<div class="uk-child-width-expand@m uk-grid-small uk-grid" uk-grid="">
								<div class="uk-width-small@m uk-text-break uk-first-column">
									<h4 class="uk-margin-remove uk-h5">Package</h4>
								</div>
								<div>
									<p class="uk-panel uk-margin-remove">{{ booking.package.name }}</p>
								</div>
							</div>

						</li>
						<li>
							<div class="uk-child-width-expand@m uk-grid-small uk-grid" uk-grid="">
								<div class="uk-width-small@m uk-text-break uk-first-column">
									<h4 class="uk-margin-remove uk-h5">Price</h4>
								</div>
								<div>
									<p class="uk-panel uk-margin-remove">{{ booking.package.formatted_price }}</p>
								</div>
							</div>

						</li>
					</ul>
					<hr class="uk-margin-medium">
					<Link method="get" as="button" type="button" class="uk-button uk-button-danger uk-button-large uk-width-1-1"
						  :href="route('bookings.cancel', booking.hash)"
					>
						Cancel your booking
					</Link>
				</div>

			</div>
		</div>
	</section>


</template>

<style scoped>

</style>

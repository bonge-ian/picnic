<script setup>

import { computed, onMounted, ref, watch } from "vue";
import flatpickr from "flatpickr";
import 'flatpickr/dist/flatpickr.css';
import { Link, useForm } from "@inertiajs/inertia-vue3";
import axios from "axios";
import InputError from "@/Components/InputError.vue";
import PackagePreview from "@/Components/Booking/PackagePreview.vue";
import AddonPreview from "@/Components/Booking/AddonPreview.vue";
import Alert from "@/Components/Alert.vue";


const props = defineProps({
	packages: Array,
	addons: Array,
})
const form = useForm({
	package: -1,
	selected_date: '',
	selected_time: '',
	first_name: '',
	last_name: '',
	email: '',
	phone: '',
	terms: false,
	addons: [],
	has_preferred_location: false,
	preferred_location: null,
	notes: '',
	total: 0,
})
let time_slots = ref({});
let calender = ref({});
const selected_package = computed(() => {
	if (form.package < 0) {
		return {};
	}
	return props.packages.find((p) => p.id === form.package);
});
const selected_addons = computed({
	get() {
		if ( ! form.addons.length) {
			return [];
		}

		return props.addons.filter(addon => form.addons.includes(addon.id));
	},
	set(newValue) {

	}
});
const totals = computed(() => {
	let package_price = selected_package.value.price_as_int;
	let addons_sum = selected_addons.value.map(a => a.price_as_int).reduce((p, c) => p + c, 0);
	let sum = package_price + addons_sum;
	let total;

	if (!isNaN(sum)) {
		form.total = sum;
		total =  sum / 100;
	} else {
		total = 0;
	}

	return total.toLocaleString('en-KE', {style: 'currency', currency: 'KES'});
})


onMounted(() => {
	calender = flatpickr('#booking-date', {
		altInput: true,
		altFormat: 'F j, Y',
		dateFormat: 'Y-m-d',
		weekNumbers: true,
		allowInput: true,
		prevArrow: `<svg xmlns='http://www.w3.org/2000/svg'  viewBox='0 0 24 24' fill='#a6d0b4' width='24' height='24'><path d="m4.431 12.822 13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-1.569-.823l-13 9a1.003 1.003 0 0 0 0 1.645z"></path></svg>`,
		nextArrow: `<svg xmlns='http://www.w3.org/2000/svg'  viewBox='0 0 24 24' fill='#a6d0b4' width='24' height='24'><path d="M5.536 21.886a1.004 1.004 0 0 0 1.033-.064l13-9a1 1 0 0 0 0-1.644l-13-9A1 1 0 0 0 5 3v18a1 1 0 0 0 .536.886z"></path></svg>`,
		onReady: (selectedDates, dateStr, instance) => instance.altInput.disabled = form.package < 0,
		onChange: async function (selectedDates, dateStr, instance) {
			if (form.package === -1 || ! dateStr) {
				return;
			}

			try {
				const response = await axios.post(
					route('bookings.time_slots', {package: form.package}),
					{
						selected_date: dateStr,
					}
				);

				if (response.data.length || Object.keys(response.data).length) {
					time_slots.value = response.data;
					form.clearErrors('timeslots', 'selected_date')
				} else {
					if (time_slots) {
						time_slots.value = {};
					}

					form.errors.timeslots = "There are no time slots for the selected date";
				}
			} catch (error) {
				if (error.response.data) {
					form.errors = {
						selected_date: error.response.data.message
					}
				}
			}

		},
	});
	getPackageFromRequest();
});

watch(() => form.package, (newPackage, oldPackage) => {
	if (newPackage < 0) {

 		form.reset();
		clearSelectedDate();
		selected_addons.value = [];

		return;
	}

	if (newPackage !== oldPackage && (form.selected_date && form.selected_time || time_slots)) {
		form.reset('selected_time', 'selected_date', 'addons');
		clearSelectedDate();
		selected_addons.value = [];
	}

	let disabled_dates = props.packages.find(p => p.id === newPackage).notify_period_in_days

	calender.set("disable", [ disabled_dates ]);

	calender.set("minDate", disabled_dates.to)

	calender.altInput.disabled = newPackage < 0;

});

const submit = () => {
	form.post(route('bookings.store'), {
			// onFinish: () => form.reset('password'),
			preserveScroll: true,
			onError: errors => {
				console.log(errors);
				if ('booking_failed' in errors) {
					UIkit.notification({
						message: `<span class="uk-icon" uk-icon='icon: error'></span> ${errors.booking_failed}`,
						status: 'danger',
						pos: 'top-center',
						timeout: 5000
					})
				}
			}
		});
};

const clearSelectedDate = () => {
	if ( ! calender) {
		return;
	}

	calender.clear();
	time_slots.value = {};
	form.clearErrors('timeslots', 'selected_date', 'selected_time');
}

const removeAddon = (addon) => {
	form.addons.splice(form.addons.indexOf(addon), 1);
}

const getPackageFromRequest = () => {
	const package_slug = (new URLSearchParams(window.location.search)).get('package');

	if ( ! package_slug) {
		return;
	}

	let package_from_url = props.packages.find(p => p.slug === package_slug);
	form.package = package_from_url.id;
	selected_package.value = package_from_url

}

</script>

<template>

	<div class="uk-grid uk-grid-small uk-child-width-1-2@m uk-child-width-1-1 booking-container"
		 uk-grid>
		<div class="uk-section-default">
			<div class="uk-width-1-1">

				<div class="uk-tile uk-tile">
					<div class="uk-container uk-container-small">
						<Link :href="route('pages.index')"
							  class="uk-button uk-button-text"
						>
							<span class="uk-icon uk-margin-small-right" uk-icon="icon: arrow-left; ratio: 1.2"></span>
							Back Home
						</Link>
					</div>
				</div>

			</div>
			<div class="uk-tile uk-tile-large uk-padding-small-top">
				<div class="uk-container uk-container-small">
					<h1 class="uk-text-bold uk-margin-remove-top">Begin your path to a great experience</h1>
					<hr class="uk-divider-small uk-margin-medium-bottom"/>

					<h2 class="uk-h3 uk-text-bold uk-margin-remove">Step <span class="uk-text-primary">one.</span>
					</h2>
					<h3 class="uk-margin-remove-top uk-text-bold uk-text-success">
						Customize your experience
					</h3>

					<form class="uk-grid uk-child-width-1-1 uk-grid-medium uk-form-stacked" uk-grid
						  @submit.prevent="submit">
						<div v-if="form.errors.email">{{ form.errors.email }}</div>
						<div>
							<label
								class="uk-form-label uk-text-default uk-margin"
								for="package"
							>
								Select a package
							</label>
							<div class="uk-form-controls">
								<select id="package"
										v-model="form.package"
										:class="{'uk-form-danger': form.errors.package}"
										class="uk-select uk-border-rounded"
										name="package"
								>
									<option value="-1">Choose a picnic package</option>

									<option
										v-for="picnic_package in packages" :value=picnic_package.id>
										{{ picnic_package.name }}
									</option>
								</select>
							</div>
							<InputError :message="form.errors.package"/>
						</div>

						<Transition name="fadeInUp">
							<div v-show="form.package && form.package > 0">
								<h3 class="uk-text-bold uk-text-secondary">Addons</h3>
								<div
									class="uk-grid uk-child-width-1-2@m uk-child-width-1-1 uk-grid-small uk-grid-match"
									uk-grid
								>
									<div v-for="addon in addons" :key="addon.id">
										<div
											class="uk-panel uk-card uk-card-small uk-card-body uk-card-default uk-border-rounded"
										>
											<div
												class="uk-grid uk-grid-small"
												uk-grid
											>
												<div class="uk-width-auto uk-form-controls">
													<input :id="`addon_${addon.id}`"
														   v-model="form.addons"
														   :value="addon.id"
														   class="uk-checkbox uk-border-rounded"
														   type="checkbox"
													/>
												</div>

												<div class="uk-width-expand">
													<div
														class="uk-grid uk-grid-small"
														uk-grid
													>
														<div class="uk-width-expand@m uk-width-1-1">
															<label
																:for="`addon_${addon.id}`"
																class="uk-form-label uk-h5 uk-text-bold"
															>
																{{ addon.name }}
															</label>
<!--															<p class="uk-text-meta uk-margin-remove">{{ addon.description}}</p>-->
														</div>
														<div class="uk-width-auto@m uk-width-1-1">
															<p class="uk-margin-remove uk-text-primary uk-text-bold">
																{{ addon.formatted_price }}
															</p>
														</div>
													</div>
												</div>
											</div>

										</div>
									</div>

								</div>
								<InputError :message="form.errors.addons"/>
							</div>
						</Transition>

						<div>
							<label
								class="uk-form-label uk-text-default uk-margin-small-bottom"
								for="notes"
							>
								Custom notes
							</label>

							<div class="uk-form-controls">
									<textarea id="notes"
											  v-model="form.notes"
											  :class="{'uk-form-danger': form.errors.notes}"
											  aria-label="notes"
											  class="uk-textarea uk-border-rounded"
											  placeholder="Add any other detail that will make your experience more enthralling."
											  rows="3"
									></textarea>

							</div>
							<InputError :message="form.errors.notes"/>
						</div>

						<div>
							<label for="has_preferred_location">
								<input id="has_preferred_location"
									   v-model="form.has_preferred_location"
									   :class="{'uk-form-danger': form.errors.has_preferred_location}"
									   class="uk-checkbox uk-border-rounded"
									   type="checkbox"
								/>
								Do you have a preferred location?
							</label>
						</div>

						<Transition name="fadeInUp">
							<div v-show="form.has_preferred_location">
								<label
									class="uk-form-label uk-text-default"
									for="preferred_location"
								>
									Location
								</label>
								<div class="uk-form-controls">
									<input id="location"
										   v-model="form.preferred_location"
										   :class="{'uk-form-danger': form.errors.preferred_location}"
										   class="uk-input uk-border-rounded"
										   name="preferred_location"
										   placeholder="Choose your preferred location"
										   type="text"
									/>
								</div>
								<InputError :message="form.errors.preferred_location"/>
							</div>
						</Transition>
						<hr/>

						<div class="uk-margin-medium uk-margin-small-bottom">
							<h2 class="uk-h3 uk-text-bold uk-margin-remove-bottom">
								Step <span class="uk-text-primary">two.</span>
							</h2>
							<h3 class="uk-margin-remove uk-text-bold uk-text-success">Pick a date</h3>
						</div>

						<div>
							<label
								class="uk-form-label uk-text-default uk-margin"
								for="booking-date"
							>
								Choose a date
							</label>
							<div class="uk-form-controls uk-position-relative">

								<input id="booking-date"
									   v-model="form.selected_date"
									   :class="{'uk-form-danger': form.errors.selected_date}"
									   class="uk-input uk-border-rounded"
									   name="booking-date"
									   placeholder="Pick your perfect date."
									   type="date"
								/>
								<button
									class="uk-form-icon uk-form-icon-flip uk-icon close-button"
									type="button"
									uk-icon="icon: close"
									@click.prevent="clearSelectedDate"></button>
							</div>


							<InputError :message="form.errors.selected_date"/>
						</div>

						<Transition name="fadeInUp">
							<div v-show="Object.keys(time_slots).length">
								<h4 class="uk-margin">Time slots</h4>
								<div
									class="uk-grid uk-grid-row-medium uk-grid-column-small uk-flex-middle uk-child-width-auto"
									uk-grid
								>
									<div v-for="(slot,timestamp) in time_slots" :key="timestamp">
										<div class="uk-panel">
											<input :id="timestamp"
												   v-model="form.selected_time"
												   :class="{'uk-form-danger': form.errors.selected_time}"
												   :name="timestamp"
												   :value="timestamp"
												   class="uk-radio uk-hidden time-slot"
												   type="radio"
											/>
											<label
												:class="{'uk-form-danger': form.errors.selected_time}"
												:for="timestamp"
												class="uk-form-label time-slot-label uk-card-body uk-card uk-card-default"
											>
												<span v-show="form.selected_time === timestamp"
													  class="uk-icon"
													  uk-icon="icon: check;ratio: 0.8"></span>
												{{ slot }}
											</label>
										</div>
									</div>

								</div>
								<InputError :message="form.errors.selected_time"/>
<!--								<InputError :message="errors.timeslots"/>-->
							</div>
						</Transition>
						<InputError :message="form.errors.timeslots"/>
						<hr/>

						<div class="uk-margin-medium uk-margin-small-bottom">
							<h2 class="uk-h3 uk-text-bold uk-margin-remove-bottom">
								Step <span class="uk-text-primary">three.</span>
							</h2>
							<h3 class="uk-margin-remove uk-text-bold uk-text-success">Your Contact Information</h3>
						</div>

						<div class="uk-width-1-2@m">
							<label
								class="uk-form-label uk-text-default uk-margin-small-bottom"
								for="firstname"
							>
								Firstname
							</label>
							<div class="uk-form-controls">
								<input id="firstname"
									   v-model="form.first_name"
									   :class="{'uk-form-danger': form.errors.first_name}"
									   class="uk-input uk-border-rounded"
									   name="firstname"
									   placeholder="Your firstname, e.g. Alice"
									   type="text"
								/>
							</div>
							<InputError :message="form.errors.first_name"/>
						</div>
						<div class="uk-width-1-2@m">
							<label
								class="uk-form-label uk-text-default uk-margin-small-bottom"
								for="lastname"
							>
								Lastname
							</label>
							<div class="uk-form-controls">
								<input id="lastname"
									   v-model="form.last_name"
									   :class="{'uk-form-danger': form.errors.last_name}"
									   class="uk-input uk-border-rounded"
									   name="lastname"
									   placeholder="Your lastname, e.g. Waithera"
									   type="text"
								/>
							</div>
							<InputError :message="form.errors.last_name"/>
						</div>
						<div class="uk-width-1-2@m">
							<label
								class="uk-form-label uk-text-default uk-margin-small-bottom"
								for="email"
							>
								Email
							</label>
							<div class="uk-form-controls">
								<input id="email"
									   v-model="form.email"
									   :class="{'uk-form-danger': form.errors.email}"
									   class="uk-input uk-border-rounded"
									   name="email"
									   placeholder="Your email, e.g. alice@gmail.com"
									   type="email"
								/>
							</div>
							<InputError :message="form.errors.email"/>
						</div>
						<div class="uk-width-1-2@m">
							<label
								class="uk-form-label uk-text-default uk-margin-small-bottom"
								for="phone"
							>
								Phone
							</label>
							<div class="uk-form-controls">
								<input id="phone"
									   v-model="form.phone"
									   :class="{'uk-form-danger': form.errors.phone}"
									   class="uk-input uk-border-rounded"
									   name="phone"
									   placeholder="Your phone number, e.g. +254711472962 or 07123456789"
									   type="text"
								/>
							</div>
							<InputError :message="form.errors.phone"/>
						</div>
						<div>
							<label for="terms">
								<input id="terms"
									   v-model="form.terms"
									   :class="{'uk-form-danger': form.errors.terms}"
									   class="uk-checkbox uk-border-rounded"
									   name="lets choose for you"
									   required
									   type="checkbox"
								/>
								I agree to the
								<a
									class="uk-link"
									href="#"
								>
									terms and conditions
								</a>
							</label>
							<InputError :message="form.errors.terms"/>
						</div>

						<div v-show="form.package > 1" class="uk-hidden@m">
							<button id="mobile-booking-summary"
									:disabled="form.package < 0"
									class="uk-width-1-1 uk-border-rounded uk-button uk-button-tertiary uk-button-large"
									type="button"
									uk-toggle="target: #booking-summary">
								View your booking summary
							</button>
						</div>

						<div>
							<button
								:class="Object.keys(form.errors).length ? 'uk-button-danger' : 'uk-button-primary' "
								:disabled="form.processing"
								class="uk-width-1-1 uk-button uk-button-large uk-border-rounded booking-button"
								type="submit"
							>
								Book your picnic
							</button>
						</div>

					</form>
				</div>
			</div>
		</div>
		<div class="uk-section-muted uk-visible@m">
			<div class="uk-tile uk-tile-large">
				<div class="uk-container uk-container-small">
					<aside class="uk-position-z-index uk-panel uk-sticky"
						   uk-sticky="offset: 180;end: !.booking-container; media: @m;">
						<h2 class="uk-h1 uk-text-bold">Your booking details.</h2>
						<hr class="uk-divider-small uk-margin-medium-bottom"/>
						<div class="uk-grid uk-child-width-1-1 uk-grid-medium" uk-grid>
							<Transition name="bounceInUp">
								<div v-if="Object.keys(selected_package).length">
									<div class="uk-panel">
										<PackagePreview :package="selected_package"/>

									</div>
								</div>
							</Transition>
							<div v-if="selected_addons.length">
								<ul class="uk-list uk-list-divider uk-margin-medium-top">
									<li v-for="selected in selected_addons" :key="selected.id">
										<AddonPreview :addon="selected" @remove-addon="removeAddon"/>
									</li>
								</ul>
								<hr>
							</div>
							<div>
								<div class="uk-grid uk-grid-divider uk-child-width-1-1 uk-grid-small" uk-grid>
									<div>
										<div class="uk-grid uk-grid-small" uk-grid>
											<div class="uk-width-expand">
												<p class="uk-margin-remove uk-text-secondary uk-text-bold">Subtotal</p>
											</div>
											<div class="uk-width-auto">
												<p class="uk-margin-remove uk-text-bold uk-text-lead">{{
														totals
													}}</p>
											</div>
										</div>
									</div>
									<div>
										<div class="uk-grid uk-grid-small  uk-margin-large-bottom" uk-grid>
											<div class="uk-width-expand">
												<p class="uk-margin-remove uk-text-secondary uk-text-bold">Total</p>
											</div>
											<div class="uk-width-auto">
												<p class="uk-margin-remove uk-text-bold uk-text-lead">{{
														totals
													}}</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div>
								<div class="uk-panel">
									<Alert
										message="The price does not include venue prices or any other expense that is not part of the package or addons selected."
										:close="false"
									/>
								</div>
							</div>
						</div>
					</aside>
				</div>
			</div>
		</div>


	</div>


	<aside id="booking-summary"
		   class="uk-modal uk-modal-full"
		   uk-modal
	>
		<div class="uk-modal-dialog uk-padding">
			<button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
			<div class="uk-grid uk-child-width-1-1 uk-grid-medium" uk-grid>

				<div v-if="Object.keys(selected_package).length">
					<div class="uk-panel">
						<PackagePreview :package="selected_package"/>

					</div>
				</div>

				<div v-if="selected_addons.length">
					<ul class="uk-list uk-list-divider uk-margin-medium-top">
						<li v-for="selected in selected_addons" :key="selected.id">
							<AddonPreview :addon="selected" @remove-addon="removeAddon"/>
						</li>
					</ul>
					<hr>
				</div>
				<div>
					<div class="uk-grid uk-grid-divider uk-child-width-1-1 uk-grid-small" uk-grid>
						<div>
							<div class="uk-grid uk-grid-small" uk-grid>
								<div class="uk-width-expand">
									<p class="uk-margin-remove uk-text-secondary uk-text-bold">Subtotal</p>
								</div>
								<div class="uk-width-auto">
									<p class="uk-margin-remove uk-text-bold uk-text-lead">{{
											totals
										}}</p>
								</div>
							</div>
						</div>
						<div>
							<div class="uk-grid uk-grid-small  uk-margin-large-bottom" uk-grid>
								<div class="uk-width-expand">
									<p class="uk-margin-remove uk-text-secondary uk-text-bold">Total</p>
								</div>
								<div class="uk-width-auto">
									<p class="uk-margin-remove uk-text-bold uk-text-lead">{{
											totals
										}}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</aside>
</template>

<style scoped>

.fadeInUp-enter-active {
	animation: fadeInUp 0.5s;
}

.fadeInUp-leave-active {
	animation: fadeInUp 0.5s reverse;
}

.bounceInUp-enter-active {
	animation: bounceInUp 0.85s;
}

.bounceInUp-leave-active {
	animation: bounceInUp 0.85s reverse
}

@keyframes fadeInUp {
	from {
		opacity: 0;
		transform: translate3d(0, 100%, 0);
	}

	to {
		opacity: 1;
		transform: translate3d(0, 0, 0);
	}
}

@keyframes bounceInUp {
	from,
	60%,
	75%,
	90%,
	to {
		animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
	}

	from {
		opacity: 0;
		transform: translate3d(0, 3000px, 0) scaleY(5);
	}

	60% {
		opacity: 1;
		transform: translate3d(0, -20px, 0) scaleY(0.9);
	}

	75% {
		transform: translate3d(0, 10px, 0) scaleY(0.95);
	}

	90% {
		transform: translate3d(0, -5px, 0) scaleY(0.985);
	}

	to {
		transform: translate3d(0, 0, 0);
	}
}


.time-slot-label {
	padding: 0.625rem;
}

.time-slot:checked ~ label.uk-form-label {
	background-color: #6aa183;
	color: #f6faf7 !important;
}


</style>

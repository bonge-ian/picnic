<script setup>
import partner_jpg from '../../images/partner.jpg';
import GuestLayout from "@/Layouts/GuestLayout.vue";</script>

<template>
	<GuestLayout>
		<section class="uk-section-default uk-section uk-section-large">
			<div class="uk-container uk-container-small uk-text-center">
				<header class="uk-margin-large-top uk-margin-xlarge-bottom">
					<h1 class="uk-h3 uk-text-secondary uk-text-bold uk-text-uppercase uk-margin-remove-bottom">
						About us.
					</h1>
					<h2 class="uk-heading-small uk-text-bold">
						Changing events <span class="uk-text-background">experiences</span>, <br class="uk-visible@m"/>
						one <span class="uk-text-background">picnic</span> a time<span class="uk-text-background"
					>.</span
					>
					</h2>
					<hr class="uk-divider-small"/>
					<div class="uk-width-large@m uk-text-center uk-align-center">
						<p class="uk-text-lead">
							Every single day, gives us hope & new chance to begin again, win & shine🥂
						</p>
					</div>
				</header>
			</div>

			<div class="uk-container">
				<div
					class="uk-width-1-1 uk-position-relative uk-margin-top uk-margin-xlarge uk-margin-remove-bottom"
					uk-parallax="scale: 1.3,1; easing: 0; start: -20%; end: 50vh + 50%;"
				>
					<figure class="uk-position-relative uk-position-z-index-zero">
						<img
							alt=""
							height="1336"
							loading="eager"
							src="../../images/about-hero.jpg"
							width="1919"
						/>
					</figure>
				</div>
			</div>
		</section>

		<section class="uk-section uk-section-large">
			<div class="uk-container uk-container-large">
				<article class="uk-tile-muted uk-tile uk-tile-large">
					<div class="uk-width-1-1">
						<div class="uk-panel uk-padding-large uk-padding-remove-vertical">
							<h2 class="uk-h1 uk-text-bold uk-text-center">
								Where it all began<span class="uk-text-tertiary">.</span>
							</h2>
							<div
								class="uk-grid uk-grid-large uk-child-width-1-3@m"
								uk-grid
							>
								<div>
									<div
										class="uk-panel"
										uk-parallax="y: 30,0; opacity: 0.3,1; easing: 1; end: 60vh + 60%;"
									>
										<h3 class="uk-text-left@m uk-text-center uk-h2">Founded in 2019</h3>
										<hr class="uk-divider-small"/>
									</div>
								</div>
								<div>
									<div
										class="uk-panel"
										uk-parallax="y: 70,0; opacity: 0.4,1; easing: 1; end: 70vh + 70%;"
									>
										<h4 class="uk-text-primary">Our Vison</h4>
										<p>
											Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos velit beatae
											reprehenderit veritatis cupiditate voluptatibus vitae deleniti culpa ea
											quaerat dolore, eius ratione dignissimos quis fugit! Odit ipsum recusandae
											dolores.
										</p>
									</div>
								</div>
								<div>
									<div
										class="uk-panel"
										uk-parallax="y: 90,0; opacity: 0.4,1; easing: 1; end: 70vh + 70%;"
									>
										<h4 class="uk-text-primary">Our Evolution</h4>
										<p>
											Dignissim et dis. Ipsum scelerisque amet lorem volutpat tortor nunc nascetur
											volutpat lorem rutrum sed neque suscipit diam.
										</p>
										<p>
											Nunc maecenas quisque wisi magna venenatis. Suspendisse congue eleifend arcu
											felis neque vitae mollis vel et scelerisque dolor.
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</article>
			</div>
		</section>

		<section class="uk-section uk-section-default uk-section-large">
			<div class="uk-container">
				<div class="uk-grid-margin uk-container uk-container-xsmall">
					<div
						class="uk-child-width-1-1 uk-grid uk-grid-stack"
						uk-grid
					>
						<div class="uk-width-1-1 uk-first-column">
							<h2 class="uk-h1 uk-position-relative uk-text-bold uk-position-z-index">
								20+ <br class="uk-visible@s"/>Events
							</h2>
						</div>
					</div>

					<div
						id="events"
						class="tm-grid-expand uk-grid-small uk-margin-large uk-grid"
						uk-grid
					>
						<div class="uk-grid-item-match uk-flex-middle uk-width-expand@s uk-width-expand@m">
							<div class="uk-panel uk-width-1-1">
								<div
									class="uk-visible@s uk-position-relative uk-margin-small uk-text-right"
									uk-parallax="x: -5vw,0; y: -10vh,0; easing: 0; target: !#events>*; end: 40vh + 100% ; media: @s;"
								>
									<div class="uk-cover-container">
										<img
											alt=""
											class="uk-border-rounded"
											loading="lazy"
											src="../../images/left1.jpg"
											uk-cover
										/>
										<canvas
											height="300"
											width="300"
										></canvas>
									</div>
								</div>
								<div
									class="uk-position-relative uk-margin-small uk-text-right"
									uk-parallax="x: -15vw,0; y: 15vh,0; easing: 0; target: !#events>*; end: 35vh + 100% ; media: @s;"
								>
									<div class="uk-cover-container">
										<canvas
											height="376"
											width="610"
										></canvas>
										<img
											alt=""
											class="uk-border-rounded"
											loading="lazy"
											src="../../images/left2.jpg"
											uk-cover
										/>
									</div>
								</div>
							</div>
						</div>
						<div class="uk-grid-item-match uk-width-2-5@s uk-width-2-5@m">
							<div class="uk-panel uk-width-1-1">
								<div
									class="uk-position-relative uk-margin-small"
									uk-parallax="y: -8vh,0; easing: 0; target: !#events>*; end: 40vh + 100% ; media: @s;"
								>
									<div class="uk-cover-container">
										<canvas
											height="407"
											width="610"
										></canvas>
										<img
											alt=""
											class="uk-border-rounded"
											loading="lazy"
											src="../../images/middle.jpg"
											uk-cover
										/>
									</div>
								</div>

								<div
									class="uk-position-relative uk-text-center"
									uk-parallax="y: 15vh,0; easing: 0; target: !#events>*; end: 35vh + 100% ; media: @s;"
								>
									<div
										class="uk-child-width-1-2 uk-grid-small uk-grid"
										uk-grid=""
									>
										<div class="uk-first-column">
											<div class="uk-light">
												<div
													class="el-item uk-border-rounded uk-inline-clip uk-transition-toggle"
												>
													<div class="uk-light">
														<picture class="uk-cover-container">
															<canvas
																height="470"
																width="300"
															></canvas>
															<img
																alt=""
																class="uk-transition-opaque"
																loading="lazy"
																src="../../images/bottom1.jpg"
																uk-cover
															/>
														</picture>
													</div>
												</div>
											</div>
										</div>
										<div>
											<div class="uk-light">
												<div
													class="el-item uk-border-rounded uk-inline-clip uk-transition-toggle"
												>
													<div class="uk-light">
														<picture class="uk-cover-container">
															<canvas
																height="470"
																width="300"
															></canvas>
															<img
																alt=""
																class="uk-transition-opaque"
																loading="lazy"
																src="../../images/bottom2.jpg"
																uk-cover
															/>
														</picture>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- <div
									id="page#1"
									class="uk-visible@s uk-position-absolute uk-width-1-1"
									uk-parallax="rotate: 0,360; easing: 1; target: !#events>*;"
									style="left: 50%; top: 50%; transform: rotate(66.8412deg)"
								>
									<img
										src="/demo/circle/images/styles/white-purple/swirl-bg.svg"
										class=""
										alt=""
										loading="lazy"
										width="745"
										height="745"
									/>
								</div> -->
							</div>
						</div>
						<div class="uk-grid-item-match uk-flex-middle uk-width-expand@s uk-width-expand@m uk-visible@s">
							<div class="uk-panel uk-width-1-1">
								<div
									class="uk-visible@s uk-position-relative uk-margin-small"
									uk-parallax="x: 5vw,0; y: -10vh,0; easing: 0; target: !#events>*; end: 40vh + 100% ; media: @s;"
								>
									<picture class="uk-cover-container">
										<canvas
											height="255"
											width="255"
										></canvas>
										<img
											alt=""
											class="uk-transition-opaque"
											loading="lazy"
											src="../../images/right1.jpg"
											uk-cover
										/>
									</picture>
								</div>

								<div
									class="uk-visible@s uk-position-relative uk-margin-small"
									uk-parallax="x: 15vw,0; y: 15vh,0; easing: 0; target: !#events>*; end: 35vh + 100% ; media: @s;"
								>
									<picture class="uk-cover-container">
										<canvas
											height="457"
											width="610"
										></canvas>
										<img
											alt=""
											class="uk-transition-opaque"
											loading="lazy"
											src="../../images/right2.jpg"
											uk-cover
										/>
									</picture>
								</div>
							</div>
						</div>
					</div>
					<div
						class="tm-grid-expand uk-child-width-1-1 uk-grid-margin uk-grid uk-grid-stack"
						uk-grid=""
					>
						<div class="uk-width-1-1 uk-first-column">
							<div
								class="uk-panel uk-text-large uk-margin uk-width-2xlarge uk-margin-auto uk-text-center"
							>
								We love a great story. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero ex
								sed, quaerat nihil officiis nostrum nemo maxime beatae consequuntur est.
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section
			class="uk-section uk-section-large uk-section-default uk-position-z-index-negative uk-sticky"
			uk-sticky="position: bottom; overflow-flip: true; start: -100%; end: 0;"
		>
			<div class="uk-container uk-container-large">
				<div
					class="uk-grid-large uk-grid"
					uk-grid
				>
					<div class="uk-width-1-3@m uk-first-column">
						<h5 class="uk-h5 uk-text-primary uk-text-left@m uk-text-center uk-text-bold">
							What Sets Us Apart
						</h5>
						<h2 class="uk-margin-remove-vertical uk-text-left@m uk-text-center uk-text-bold">
							We Are Wonderland, <br class="uk-visible@m"/>
							Where all the <br class="uk-visible@m"/>
							fun begins.
						</h2>
					</div>
					<div class="uk-width-2-3@m">
						<div class="uk-margin-large">
							<div
								class="uk-child-width-1-1 uk-child-width-1-2@s uk-grid-large uk-grid-match uk-grid"
								uk-grid
							>
								<div>
									<div class="uk-panel">
										<div
											class="uk-child-width-expand uk-grid-column-medium uk-grid-row-small uk-grid"
											uk-grid
										>
											<div class="uk-width-auto@s">
												<img
													alt="Check icon with a light green background"
													height="39"
													loading="lazy"
													src="../../images/tick.svg"
													uk-svg
													width="39"
												/>
											</div>
											<div>
												<h4 class="uk-margin-remove-bottom">Pitch perfect planning</h4>
												<p>
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi
													officia explicabo repudiandae nisi ipsum? Voluptatum!
												</p>
											</div>
										</div>
									</div>
								</div>
								<div>
									<div class="uk-panel">
										<div
											class="uk-child-width-expand uk-grid-column-medium uk-grid-row-small uk-grid"
											uk-grid
										>
											<div class="uk-width-auto@s">
												<img
													alt="Check icon with a light green background"
													height="39"
													loading="lazy"
													src="../../images/tick.svg"
													uk-svg
													width="39"
												/>
											</div>
											<div>
												<h4 class="uk-margin-remove-bottom">Attention to detail</h4>
												<p>
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi
													officia explicabo repudiandae nisi ipsum? Voluptatum!
												</p>
											</div>
										</div>
									</div>
								</div>
								<div>
									<div class="uk-panel">
										<div
											class="uk-child-width-expand uk-grid-column-medium uk-grid-row-small uk-grid"
											uk-grid
										>
											<div class="uk-width-auto@s">
												<img
													alt="Check icon with a light green background"
													height="39"
													loading="lazy"
													src="../../images/tick.svg"
													uk-svg
													width="39"
												/>
											</div>
											<div>
												<h4 class="uk-margin-remove-bottom">Memorable experiences</h4>
												<p>
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi
													officia explicabo repudiandae nisi ipsum? Voluptatum!
												</p>
											</div>
										</div>
									</div>
								</div>
								<div>
									<div class="uk-panel">
										<div
											class="uk-child-width-expand uk-grid-column-medium uk-grid-row-small uk-grid"
											uk-grid
										>
											<div class="uk-width-auto@s">
												<img
													alt="Check icon with a light green background"
													height="39"
													loading="lazy"
													src="../../images/tick.svg"
													uk-svg
													width="39"
												/>
											</div>
											<div>
												<h4 class="uk-margin-remove-bottom">Light on your pockets</h4>
												<p>
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi
													officia explicabo repudiandae nisi ipsum? Voluptatum!
												</p>
											</div>
										</div>
									</div>
								</div>
								<div>
									<div class="uk-panel">
										<div
											class="uk-child-width-expand uk-grid-column-medium uk-grid-row-small uk-grid"
											uk-grid
										>
											<div class="uk-width-auto@s">
												<img
													alt="Check icon with a light green background"
													height="39"
													loading="lazy"
													src="../../images/tick.svg"
													uk-svg
													width="39"
												/>
											</div>
											<div>
												<h4 class="uk-margin-remove-bottom">Anything goes</h4>
												<p>
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi
													officia explicabo repudiandae nisi ipsum? Voluptatum!
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="uk-section uk-section-xlarge">
			<div class="uk-container uk-container-large">
				<div class="uk-width-1-1 uk-text-center uk-margin-large">
					<h2 class="uk-heading-small uk-text-bold uk-margin-large uk-text-background">
						Meet our leadership team
					</h2>
				</div>
				<div
					class="uk-grid uk-grid-medium uk-child-width-1-2 uk-child-width-1-1"
					uk-grid="parallax: 150"
				>
					<div class="uk-flex uk-flex-center uk-flex-middle">
						<div class="uk-light">
							<div class="uk-box-shadow-large uk-box-shadow-hover-xlarge uk-inline-clip">
								<div class="uk-light">
									<img
										alt="CEO"
										height="700"
										src="../../images/alice.jpg"
										width="700"
									/>
								</div>
								<div class="uk-position-bottom-left">
									<div class="uk-panel uk-padding uk-margin-remove-first-child">
										<div class="el-title uk-h3 uk-margin-top uk-margin-remove-bottom">
											Wanjiku Kiragu
										</div>
										<div class="el-meta">CEO / Creative Director</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="uk-flex uk-flex-center uk-flex-middle">
						<div class="uk-light">
							<div class="uk-box-shadow-large uk-box-shadow-hover-xlarge uk-inline-clip">
								<div class="uk-light">
									<img
										alt="CEO"
										height="700"
										src="../../images/rep1.jpg"
										width="700"
									/>
								</div>
								<div class="uk-position-bottom-left">
									<div class="uk-panel uk-padding uk-margin-remove-first-child">
										<div class="el-title uk-h3 uk-margin-top uk-margin-remove-bottom">
											Wanja Wairimu
										</div>
										<div class="el-meta">Marketing Director</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="uk-flex uk-flex-center uk-flex-middle">
						<div class="uk-light">
							<div class="uk-box-shadow-large uk-box-shadow-hover-xlarge uk-inline-clip">
								<div class="uk-light">
									<img
										alt="CEO"
										height="500"
										src="../../images/rep2.jpg"
										width="888"
									/>
								</div>
								<div class="uk-position-bottom-left">
									<div class="uk-panel uk-padding uk-margin-remove-first-child">
										<div class="el-title uk-h3 uk-margin-top uk-margin-remove-bottom">
											Wangari Mbugua
										</div>
										<div class="el-meta">Event Organizer</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="uk-flex uk-flex-center uk-flex-middle">
						<div class="uk-light">
							<div class="uk-box-shadow-large uk-box-shadow-hover-xlarge uk-inline-clip">
								<div class="uk-light">
									<img
										alt="CEO"
										height="467"
										src="../../images/rep3.jpg"
										width="700"
									/>
								</div>
								<div class="uk-position-bottom-left">
									<div class="uk-panel uk-padding uk-margin-remove-first-child">
										<div class="el-title uk-h3 uk-margin-top uk-margin-remove-bottom">Riggy G.</div>
										<div class="el-meta">Media Director</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="uk-section uk-preserve-color">
			<div
				:data-src="partner_jpg"
				class="uk-background-norepeat uk-background-cover uk-background-center-center uk-section uk-section-large uk-background-primary uk-background-blend-soft-light"
				uk-img="loading:lazy;width: 2400;height: 1600"
			>
				<div class="uk-container uk-container-large uk-grid-margin">
					<div class="uk-tile uk-tile-large uk-width-2-3@m">
						<div
							class="uk-grid-stack uk-grid uk-child-width-1-1"
							uk-grid
						>
							<div>
								<h2
									class="uk-h1 uk-position-relative uk-width-xlarge uk-text-left@s uk-text-center uk-text-tertiary uk-text-bold"
								>
									Become a partner
								</h2>
								<p class="uk-text-emphasis uk-text-bold uk-text-lead">
									Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores repellat ex
									laudantium a sequi delectus voluptate maxime iure similique cupiditate.
								</p>
								<a
									class="uk-button uk-button-large uk-button-secondary"
									href="#"
								>
									Get in touch
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</GuestLayout>

</template>

<style scoped>

</style>

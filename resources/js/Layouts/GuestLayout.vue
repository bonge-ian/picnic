<script setup>
import Navbar from "@/Components/Navbar.vue";
import Footer from "@/Components/Footer.vue";</script>

<template>
	<div class="uk-position-z-index-zero uk-position-relative">
		<Navbar/>

		<main class="uk-position-z-index-zero uk-position-relative">
			<slot/>
		</main>

		<Footer/>
	</div>
</template>

<style scoped>

</style>

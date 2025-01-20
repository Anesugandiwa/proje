<template>
<nav class="bg-gray-800  flex justify-between items-center">
    <div>
        <a href="/contact">
            <img  src="/images/logo.jpg" alt="Logo Loading">
        </a>

    </div>
    <ul class="flex space-x-4">

        <li>
            <!-- <router-link to="/" class="text-white hover:text-gray-300">Home</router-link> -->
             <InertiaLink class="inertiaLink mx-1" :href="route('contact')">
                <v-btn class="text-white hover:text-grey-300" variant="text" color="primary">
                    Home
                </v-btn>

             </InertiaLink>
        </li>

        <li>
            <!-- <router-link to="/contact" class="text-white hover:text-gray-300">Contact</router-link> -->
            <InertiaLink  :href="route('contact')">
                <v-btn class="text-white hover:text-grey-300" variant="text" color="primary">
                    Contact
                </v-btn>

             </InertiaLink>

        </li>

    </ul>



</nav>
<v-main>
    <slot/>
</v-main>
<Footer></Footer>
</template>
<script>

import Footer from './Footer.vue';
export default{
    name: 'NavBar',

};

</script>
<style>
nav{
    border-bottom: 1px solid blue;
    height: 50px;
    padding: 0.5rem 1rem;
}
img{
    height: 10%;
    width: 10%;
    border-radius: 100%;
}
</style>

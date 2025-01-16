<template>
<nav class="bg-gray-800 p-4 flex justify-between items-center">
    <div>
        <InertiaLink class="inertiaLink" :href>
            <img  src="/images/logo.jpg" alt="Logo Loading">
        </InertiaLink>
    </div>
    <ul class="flex space-x-4">

        <li>
            <!-- <router-link to="/" class="text-white hover:text-gray-300">Home</router-link> -->
             <InertiaLink class="inertiaLinkMenu mx-1" :href>
                <v-btn class="text-white hover:text-grey-300" variant="text" color="primary">
                    Home
                </v-btn>

             </InertiaLink>
        </li>

        <li>
            <!-- <router-link to="/contact" class="text-white hover:text-gray-300">Contact</router-link> -->
            <InertiaLink class="inertiaLinkMenu mx-1" :href>
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
}
img{
    height: 10%;
    width: 10%;
    border-radius: 100%;
}
</style>

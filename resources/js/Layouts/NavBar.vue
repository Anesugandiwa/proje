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
             
                <v-btn>
                    Home
                </v-btn>

        </li>

        <li>
            <!-- <router-link to="/contact" class="text-white hover:text-gray-300">Contact</router-link> -->
             <v-btn>
                    <a href="/contact">Contact</a>

                </v-btn>
            </li>
            <li>
                <v-btn >
                   <a href="/about"> Home</a>
                </v-btn>

            </li>
            <li>
                <v-btn class="primary" :href="filamentLoginUrl">
                   LogIn
                </v-btn>
                <v-btn v-if="$page.props.auth.user" color="error" @click="logout">
                    Logout
                </v-btn>
            </li>


    </ul>



</nav>
<v-main>
    <slot/>
</v-main>
<Footer></Footer>
</template>
<script>
import {Link} from '@inertiajs/vue3';
import Footer from './Footer.vue';
export default{
    name: 'NavBar',
    components:{
        Link,
        
    },
    data(){
        return{
            filamentLoginUrl:'/admin/login',
        };
    },
    methods: {
        logout(){
            this.$inertia.post('/logout');
        },
    }

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
    /* border-radius: 100%; */
}
</style>

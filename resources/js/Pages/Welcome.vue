<template>
    <v-app>
        <NavBar/>
        <v-main>
            <v-container>
                <v-row>
                    <v-col cols="12" sm="6">
                        <v-carousel  :height="mdAndUp ? 600 : 350" cycle :show-arrows="false" hide-delimiter-background>
                            <v-carousel-item src="/images/img1.jpg" contain class="rounded-0"></v-carousel-item>

                            <v-carousel-item src = "/images/img3.jpg" ></v-carousel-item>
                            
                            <v-carousel-item src = "/images/img3.jpg" ></v-carousel-item>

                            <v-carousel-item src = "/images/img5.jpg" ></v-carousel-item>

                        </v-carousel>
                

                    </v-col>
                    <v-col cols ="12" sm="6" class="d-flex flex-column ">
                        <v-row>
                            <v-col >
                                <Calender class="full-height" />

                            </v-col>
                        </v-row>
                       

                    </v-col>

                </v-row>
            </v-container>



        </v-main>
        <Footer></Footer>
    </v-app>

</template>
<script>
import Calender from '@/Pages/Calender.vue';
import NavBar from "@/Layouts/NavBar.vue";
import Footer from "@/Layouts/Footer.vue";

export default {
    name : 'welcome',

    components: {
        Calender,
        NavBar,
        Footer,
    }

};


</script>

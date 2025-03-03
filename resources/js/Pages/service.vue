<template>
    <v-app>
        <NavBar/>
        <v-main>
            <v-container class="p-0">
                <v-img
                src="images/service.jpg"
                class="w-100"
                height="300"
                
                cover
              
                
                >
                
                <v-row class="fill-height" align="center" justify="center">
                    <v-col cols="12" class="text-center text-white">
                        <h1 class="text-h4 font-weight-bold">Eight2Five</h1>
                    </v-col>
                </v-row>
            </v-img>
        </v-container>
        <div class="text-center ">
            <v-card class="pa-5">
                <h1 class="text-center font-weight-bold">Our popular products</h1>
            </v-card>
           
        
        </div>
        <div>
            <v-card class="pa-5">
                <h5 class="text-center font-weight-bold">Our  Service resources at your fingertips</h5>
            </v-card>
        </div>
        <v-container>
            <v-row class="d-flex flex-wrap" justify="space-around">
                <v-col cols="12" sm="6" md="4" lg="3">
                    <v-card class="elevation-3">
                        <v-img
                        src="/images/img1.jpg"
                        height="200px"
                        cover>
                        </v-img>
                        <v-card-title class="text-h6 font-weight-bold">
                            Private Office
                        </v-card-title>
                        <v-card-text>
                            A premium office space for Startups and SME’s.
                        </v-card-text>

                    </v-card>
                </v-col>
                
                <v-col cols="12" sm="6" md="4" lg="3">
                    <v-card class="elevation-3">
                        <v-img
                        src="/images/img1.jpg"
                        height="200px"
                        cover>
                    </v-img>
                    <v-card-title class="text-h6 font-weight-bold">
                        Private Office
                    </v-card-title>
                    <v-card-text>
                        A premium office space for Startups and SME’s.
                    </v-card-text>
                </v-card>
            </v-col>
            <v-col cols="12" sm="6" md="4" lg="3">
                <v-card class="elevation-3">
                    <v-img
                    src="/images/img1.jpg"
                    height="200px"
                    cover></v-img>
                    <v-card-title class="text-h6 font-weight-bold">
                        Private office
                    </v-card-title>
                    <v-card-text>
                        A premium office space for startups and SME'S.
                    </v-card-text>

                </v-card>
            </v-col>
            <v-col cols="12" sm="6" md="4" lg="3">
                <v-card class="elevation-3">
                    <v-img
                    src="/images/img1.jpg"
                    height="200px"
                    cover></v-img>
                    <v-card-title class="text-h6 font-weight-bold">
                        Private office
                    </v-card-title>
                    <v-card-text>
                        A premium office space for startups and SME'S.
                    </v-card-text>

                </v-card>
            </v-col>
        </v-row>
    </v-container>
 </v-main>
 <Footer/>
</v-app>

</template>
<script>
import NavBar from '@/Layouts/NavBar.vue';
import Footer from '@/Layouts/Footer.vue';

export default{
    components: {
        NavBar,
        Footer,
    }
}
</script>
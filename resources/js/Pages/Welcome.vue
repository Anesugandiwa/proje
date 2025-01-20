<template>
    <v-app>
        <NavBar/>
        <v-main>
            <v-container>
                <v-row>
                    <v-col cols ="10">
                        <Calender/>

                    </v-col>

                </v-row>
            </v-container>



        </v-main>
    </v-app>

</template>
<script>
import Calender from '@/Pages/Calender.vue';
import NavBar from "@/Layouts/NavBar.vue";

export default {
    name : 'welcome',

    components: {
        Calender,
        NavBar
    }

};


</script>

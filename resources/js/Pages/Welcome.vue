<template>
    <v-container class="my-10" fluid>
        <v-row>
            <v-col cols="12" sm="6">
                <v-carousel class="rounded-lg" cycle :show-arrows="false" hide-delimiter-background>
                    <v-carousel-item
                        src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
                        cover
                    ></v-carousel-item>

                    <v-carousel-item
                        src="https://cdn.vuetifyjs.com/images/cards/hotel.jpg"
                        cover
                    ></v-carousel-item>

                    <v-carousel-item
                        src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
                        cover
                    ></v-carousel-item>
                </v-carousel>
            </v-col>
            <v-col cols="12" sm="6">
                <v-row class="glass">
                    <v-card>
                        <v-card-item>
                    <v-card-title>
                        Meeting Room East
                    </v-card-title>
                    <v-card-text>
                        this is meeting Room
                    </v-card-text>

                  </v-card-item>
                    </v-card>

                </v-row>
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
import NavBar from "@/Layouts/NavBar.vue";


export default {
    layout:NavBar,
}
</script>

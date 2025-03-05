<template>
     <v-app>
        <NavBar/>
        
            <v-container class="p-0">
                <v-img
                src="images/img1.jpg"
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
      <v-container class="d-flex justify-right">
        <v-row class="d-flex flex-wrap" justify="space-around">
            <v-col cols="12" sm="7">  <section class="contact-hero">
                    <v-container>
                        <div class="text-center mb-3 mt-5">
                            <h3 class="hero-h12 text-white">
                                Contact Us
                            </h3>
                        </div>
                    </v-container>
                </section>
                <section class ="mt-n16 white glass mx-lg-5 mx-2">
                    <v-card variant="flat">
                        <v-row>
                            <v-col  order-md="last" cols="12" md="7">
                                <div class="glass">
                                    <v-card-title>
                                        Contact Us
                                    </v-card-title>
                                    
                                    <v-form @submit.prevent="SendContact" class="form-container">
                                        <v-text-field
                                        v-model="name"
                                        label="Enter your name"
                                        outlined
                                        required
                                        class="mb-4 custom-text-field"
                                        prepend-inner-icon="mdi-account"
                                        :color="nameHover || nameFocus ? 'primary' : ''"
                                        @focus="nameFocus = true"
                                        @blur="nameFocus = false"
                                        @mouseover="nameHover = true"
                                        @mouseleave="nameHover = false"
                                        />
                                        
                                        <v-text-field
                                        v-model="company"
                                        label="Company Name"
                                        outlined
                                        required
                                        class="mb-4"
                                        prepend-inner-icon="mdi-office-building"
                                        />
                                        
                                        <v-text-field
                                        v-model="email"
                                        label="email"
                                        outlined
                                        required
                                        class="mb-4"
                                        prepend-inner-text="mdi-email"
                                        type="email"
                                        :rules="[v => !!v || 'Email is required', v => /.+@.+\..+/.test(v) || 'Email must be valid']"
                                        />
                                    
                                        <v-text-field
                                        v-model="phone"
                                        label ="Phone"
                                        outline
                                        required
                                        prepend-inner-icon="mdi-phone"
                                        type="tel"

                                        />


                                        <v-textarea
                                        v-model="message"
                                        label ="message"
                                        required
                                        class="mb-4"
                                        prepend-inner-icon="mdi-message"
                                        rows="4"
                                        />
                                        
                                        <v-btn type="submit" color="primary" block large>Submit</v-btn>
                                    </v-form>
                                </div>
                            </v-col>

                        </v-row>
                    </v-card>
                </section>
                

            </v-col>
            <v-col cols="12" sm="5">
                <div class="glass">
                    <v-card-title>
                        Contact Info
                    </v-card-title>
                    <v-card-text>
                        <h1 class="text-h5">
                            Physical Address

                        </h1><br>
                        <p>
                            Fourth Floor, Three Anchor House, Jason Moyo Avenue, Central Business District, Harare, Zimbabwe
                        </p>

                        <h1 class="text-h5">
                            Email

                        </h1><br>
                        <p>
                            info@eight2five.com
                        </p>
                        <h1 class="text-h5">
                            Call Center

                        </h1><br>
                        <p>
                            800 123 456
                        </p>
                        <h1 class="text-h5">
                            WhatsApp 

                        </h1><br>
                        <p>
                            +263 780 250 091
                        </p>
                        <h1 class="text-h5">
                            Follow Us

                        </h1><br>
                        <v-icon size="50" color="blue darken-2" class="mr-3">mdi-facebook</v-icon>
                        <v-icon size="50" color="blue darken-2" class="mr-3">mdi-instagram</v-icon>
                        <v-icon size="50" color="blue">mdi-linkedin</v-icon>

                        
                        
                    </v-card-text>
                </div>
            </v-col>

        </v-row>

        </v-container>
       
        </v-app>
      
             <Footer></Footer>
        </template>
<script>
import NavBar from '@/Layouts/NavBar.vue';
import Footer from "@/Layouts/Footer.vue";

export default{
    name: 'contact',
    components: {
        NavBar,
        Footer,

    },
    data(){
        return{
            form:this.$inertia.form({
                name: '',
                email: '',
                phone :  '',
                message: '',
                company: '',

            }),
            nameHover: false,
               
            
        }
    },

    methods:{
        SendContact(){
            this.form.post(route(''),{
                onerror:()=>{
                    this.form.processing = null
                },

                onSuccess:()=>{
                    this.form.reset()
                },
            })
        }
    }


}
</script>
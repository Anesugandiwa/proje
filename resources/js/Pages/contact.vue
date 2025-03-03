<template>
     <v-app>
        <NavBar/>
      <v-container class="d-flex justify-center">
       
           
            
            <v-main>
                <section class="contact-hero">
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
                                    
                                    <v-form @submit.prevent="SendContact">
                                        <v-text-field
                                        v-model="name"
                                        label="Enter your name"
                                        outlined
                                        required
                                        />
                                        
                                        <v-text-field
                                        v-model="company"
                                        label="Company Name"
                                        outlined
                                        required
                                        />
                                        
                                        <v-text-field
                                        v-model="email"
                                        label="email"
                                        outlined
                                        required
                                        />
                                    
                                        <v-text-field
                                        v-model="phone"
                                        label ="Phone"
                                        outline
                                        required
                                        />


                                        <v-textarea
                                        v-model="message"
                                        label ="message"
                                        required
                                        />
                                        
                                        <v-btn type="submit" color="primary">Submit</v-btn>
                                    </v-form>
                                </div>
                            </v-col>
                        </v-row>
                    </v-card>
                </section>
            </v-main>
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

            })
               
            
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
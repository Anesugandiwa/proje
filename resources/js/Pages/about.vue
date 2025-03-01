<template>
  <v-app>
    <NavBar/> 
    <v-main>
      <v-container>
        <v-row>
          <v-col cols="12" sm="7">
            <v-card>
              <v-card-title class="text-primary">
                About Us
              </v-card-title>
              <v-card-text>
                <p class="text-body-1">
                  Welcome to <strong>Eight2Five Innovation Hub</strong>, a dynamic space designed to support and grow small businesses. 
                  We provide entrepreneurs with the tools, mentorship, and resources needed to scale their ventures.
                </p>
                
                <h3 class="text-h5 mt-5" >Our Mission</h3>
                <p class="text-body-1">
                  To empower startups and entrepreneurs by offering a collaborative workspace, access to industry experts, 
                  and funding opportunities.
                </p>
                <h3 class="text-h5 mt-5">What We Offer</h3>
                <ol class="text-body-1">
                  <li>Co-working spaces with high-speed internet</li>
                  <li>Business mentorship & training programs</li>
                  <li>Networking events & startup funding access</li>
                  <li>Technology support and innovation labs</li>
                </ol>
                
                <h3 class="text-h5 mt-5">Get in Touch</h3>
                <p class="text-body-1">
                  Visit us at 3 Anchor House<br>
                  Corner first street and Jason Moyo <br>
                   or reach out via email at <a href="mailto:info@eight2five.com">info@eight2five.com</a>.
                </p>

              </v-card-text>
            </v-card>
        

          </v-col>
          <v-col cols="12" sm="5" >
            <v-row>
              <v-col>
                <img src="/images/img1.jpg" alt="" class="w-100 h-auto ma-4 elevation-3 rounded-lg">
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
import NavBar from '@/Layouts/NavBar.vue';
import Footer from '@/Layouts/Footer.vue';

export default{
 
  components:{
    NavBar,
    Footer,
  }
}
</script>
  
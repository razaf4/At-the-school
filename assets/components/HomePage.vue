<template>
<div>
    <v-card style="margin-bottom:6px;">
      <!-- menu tabs -->
      <v-app-bar color="#009688">
        <v-app-bar-nav-icon @click="drawer = !drawer" style="color:white;"></v-app-bar-nav-icon>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        <v-toolbar-title> <a href="/student/add_student" style="text-decoration:none; color:white;">SUPPORT ETUDIANT</a> </v-toolbar-title>&nbsp;&nbsp;&nbsp;
        <v-toolbar-title> <a href="/pointage/seance" style="text-decoration:none; color:white;">POINTAGE</a> </v-toolbar-title>&nbsp;&nbsp;&nbsp;
        <v-toolbar-title> <a href="#" style="text-decoration:none; color:white;">MENU 3</a> </v-toolbar-title>
        <v-spacer></v-spacer>
        <a href="/setting/year" style="text-decoration:none; color:white;"><b-icon icon="gear" style="color:white;" aria-hidden="true"></b-icon></a>
      </v-app-bar>
    </v-card>
    <!-- left navigation  -->
          <v-app style="float:left;">
            <v-navigation-drawer v-model="drawer" bottom temporary  style="background: lightgray; height: 590px">
              <v-list nav dense>
                <v-list-item-avatar>
                    <v-img src="https://randomuser.me/api/portraits/men/85.jpg"></v-img>
                </v-list-item-avatar>
                <v-list-item-group v-model="group" active-class="deep-purple--text text--accent-4">
                  
                  <v-list-item>
                    <v-list-item-title> SETTINGS</v-list-item-title>
                  </v-list-item>

                  <v-list-item> 
                    <v-list-item-title> ACCOUNT</v-list-item-title>
                  </v-list-item>

                  <v-list-item>
                    <v-list-item-title> USER</v-list-item-title>
                  </v-list-item>

                  <v-list-item>
                    <a href="/security/logout">
                      <v-list-item-title> LOGOUT </v-list-item-title>
                    </a>
                  </v-list-item>
                </v-list-item-group>
              </v-list>
            </v-navigation-drawer>
      </v-app>
  </div>
</template>
 
<script>
 import AddStudent from './student/AddStudent.vue'
  export default {
    name: 'HomePage',
    components: {AddStudent},
    data: () => ({
      drawer: false,
      group: null,
      tab: null
    }),

    watch: {
      group () {
        this.drawer = false
      },
    }
  }
</script>
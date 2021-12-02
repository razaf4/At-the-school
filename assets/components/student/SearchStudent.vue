<template>
    <v-app style="height: 60px;">
      <!-- Sous-menu -->
      <v-bottom-navigation color="teal" grow>
        
          <v-btn href="/student/inscription_student">
            <span>New Inscription</span>
            <v-icon>mdi-history</v-icon>
          </v-btn>

        <v-btn href="/student/import_list_student">
          <span>Import list of student</span>
          <b-icon icon="tag-fill"></b-icon>
        </v-btn>

        <v-btn href="/student/search_list_student" style="background-color: #009688;">
          <span style="color: white;">Search student</span>
          <v-icon style="color: white;">mdi-map-marker</v-icon>
        </v-btn>

        <v-btn href="#">
          <span>Favorites</span>
          <v-icon>mdi-heart</v-icon>
        </v-btn>

        <v-btn href="#">
          <span>Nearby</span>
          <v-icon>mdi-map-marker</v-icon>
        </v-btn>
      </v-bottom-navigation>
    </v-app>
</template>

<script>
  export default {
        name: 'SearchStudent'
        }
</script>
<template>
    <v-app style="height: 60px;">
      <!-- Sous-menu -->
      <v-bottom-navigation color="teal" grow>
        
          <v-btn href="#">
            <span>New Inscription</span>
            <v-icon>mdi-history</v-icon>
          </v-btn>

        <v-btn href="#">
          <span>Import list of student</span>
          <b-icon icon="tag-fill"></b-icon>
        </v-btn>

        <v-btn href="#">
          <span>Search student</span>
          <v-icon>mdi-map-marker</v-icon>
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
        name: 'AddSeance'
    }
</script>
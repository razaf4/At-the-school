<template>
    <v-app>
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

        <v-btn href="#">
          <span>Nearby</span>
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
    <!-- Data -->
      <v-simple-table dense>
        <template v-slot:default>
          <thead>
            <tr>
              <th class="text-left">
                Name
              </th>
              <th class="text-left">
                Calories
              </th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="item in desserts"
              :key="item.name"
            >
              <td>{{ item.name }}</td>
              <td>{{ item.calories }}</td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>
    </v-app>
</template>
<script>
    export default {
        name: 'AddStudent',
        data () {
            return {
              desserts: [
                {
                  name: 'Frozen Yogurt',
                  calories: 159,
                },
                {
                  name: 'Ice cream sandwich',
                  calories: 237,
                },
                {
                  name: 'Eclair',
                  calories: 262,
                },
                {
                  name: 'Cupcake',
                  calories: 305,
                },
                {
                  name: 'Gingerbread',
                  calories: 356,
                },
                {
                  name: 'Jelly bean',
                  calories: 375,
                },
                {
                  name: 'Lollipop',
                  calories: 392,
                },
                {
                  name: 'Honeycomb',
                  calories: 408,
                },
                {
                  name: 'Donut',
                  calories: 452,
                },
                {
                  name: 'KitKat',
                  calories: 518,
                },
              ],
            }
          },
    }
</script>
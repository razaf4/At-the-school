<template>
    <v-app>
      <!-- Sous-menu -->
      <v-bottom-navigation color="teal" grow>
        
          <v-btn href="/student/inscription_student">
            <span>New Inscription</span>
            <v-icon>mdi-history</v-icon>
          </v-btn>

        <v-btn href="/student/import_list_student" style="background-color: #009688;">
          <span style="color: white;">Import list of student</span>
          <b-icon style="color: white;" icon="tag-fill"></b-icon>
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
      
      <!-- form of import -->
      <div class="row">
        <div class="col-lg-10">
        <validation-observer ref="observer" v-slot="{ invalid }">
            <form @submit.prevent="submit">
                <div class="row">
                  <div class="col-lg-4">
                    <validation-provider v-slot="{ errors }" name="Date" rules="required">
                        <v-select v-model="date" :items="items_date" :error-messages="errors" label="College-Year" data-vv-name="date" required></v-select>
                    </validation-provider>
                    
                  </div>
                  <div class="col-lg-4">
                    <validation-provider v-slot="{ errors }" name="Date" rules="required">
                        <v-select v-model="date1" :items="items_date" :error-messages="errors" data-vv-name="date1" required></v-select>
                    </validation-provider>
                  </div>
                </div>

                <validation-provider v-slot="{ errors }" name="Level" rules="required">
                    <v-select v-model="niveau" :items="items_niveau" :error-messages="errors" label="Level" data-vv-name="niveau" required></v-select>
                </validation-provider>
                
                <validation-provider v-slot="{ errors }" name="Branch" rules="required">
                    <v-select v-model="parcours" :items="items_parcours" :error-messages="errors" label="Branch" data-vv-name="parcours" required></v-select>
                </validation-provider>
                
                <validation-provider v-slot="{ errors }" name="File" rules="required">
                    <v-file-input v-model="file" :rules="rules" :error-messages="errors" accept="image/png, image/jpeg, image/bmp" placeholder="Pick an avatar" prepend-icon="mdi-camera" label="Avatar"></v-file-input>
                </validation-provider>

                <v-btn class="mr-4" style="color: #009688;" type="submit" :disabled="invalid">Import</v-btn>
                <v-btn @click="clear">clear</v-btn>
            </form>
        </validation-observer>
        </div>
    </div>
    </v-app>
</template>
<script>
  import { required} from 'vee-validate/dist/rules'
  import { extend, ValidationObserver, ValidationProvider, setInteractionMode } from 'vee-validate'
  setInteractionMode('eager')
  extend('required', {
    ...required,
    message: '{_field_} can not be empty',
    })
   export default {
    name: 'ImportStudent',
    components: {
        ValidationProvider,
        ValidationObserver,
    },
    data () {
      return {
        date: '',
        date1 : '',
        niveau: '',
        parcours: '',
        items_date: ['2000', '2001', '2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023', '2024', '2025', '2026', '2027', '2028', '2029', '2030'],
        items_niveau: ['L1', 'L2', 'L3', 'M1', 'M2'],
        items_parcours: ['GB', 'SR', 'IG'],
        file: [],
        
        }
      },
    methods: {
      submit () {
        this.$refs.observer.validate()
      },
      clear () {
        this.date = null
        this.date1 = null
        this.niveau = null
        this.parcours = null
        this.file = null
        this.$refs.observer.reset()
      }
      }
    }
</script>
<template>
    <v-app>
      <!-- Sous-menu -->
      <v-bottom-navigation color="teal" grow>
        
          <v-btn href="/student/inscription_student" style="background-color: #009688;">
            <span style="color: white;">New Inscription</span>
            <v-icon style="color: white;">mdi-history</v-icon>
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

      <!-- inscription's form -->
    <div class="row">
        <div class="col-lg-10">
        <validation-observer ref="observer" v-slot="{ invalid }">
            <form @submit.prevent="submit">
                <validation-provider v-slot="{ errors }" name="Matricule" rules="required">
                    <v-text-field v-model="matricule" :error-messages="errors" label="Matricule(Scan the card)" disabled required></v-text-field>
                </validation-provider>
                <validation-provider v-slot="{ errors }" name="Photo" rules="required">
                    <v-file-input v-model="photo" :rules="rules" :error-messages="errors" accept="image/png, image/jpeg, image/bmp" placeholder="Pick an avatar" prepend-icon="mdi-camera" label="Avatar"></v-file-input>
                </validation-provider>
                <validation-provider v-slot="{ errors }" name="Name" rules="required">
                    <v-text-field v-model="name" :error-messages="errors" label="Name" required></v-text-field>
                </validation-provider>
                <validation-provider v-slot="{ errors }" name="niveau" rules="required">
                    <v-select v-model="niveau" :items="items_niveau" :error-messages="errors" label="Level" data-vv-name="niveau" required></v-select>
                </validation-provider>
                <validation-provider v-slot="{ errors }" name="parcours" rules="required">
                    <v-select v-model="parcours" :items="items_parcours" :error-messages="errors" label="Branch" data-vv-name="parcours" required></v-select>
                </validation-provider>
                <validation-provider v-slot="{ errors }" name="phoneNumber" :rules="{required: true, digits: 12}">
                    <v-text-field v-model="phoneNumber" :counter="12" placeholder="Ex:261321000000" :error-messages="errors" label="Phone Number" required></v-text-field>
                </validation-provider>
                <validation-provider v-slot="{ errors }" name="email" rules="required|email">
                    <v-text-field v-model="email" :error-messages="errors" placeholder="attheschool@gmail.com" label="E-mail" required></v-text-field>
                </validation-provider>
                <validation-provider v-slot="{ errors }" name="sexe" rules="required">
                    <v-select v-model="sexe" :items="items_sexe" :error-messages="errors" label="Sexe" data-vv-name="sexe" required></v-select>
                </validation-provider>
                <validation-provider v-slot="{ errors }" name="naissance" rules="required">
                    <v-text-field v-model="naissance" type="date" :error-messages="errors" placeholder="Date de naissance" label="Naissance" required></v-text-field>
                </validation-provider>

                <v-btn class="mr-4" style="color: #009688;" type="submit" :disabled="invalid">Inscrire</v-btn>
                <v-btn @click="clear">clear</v-btn>
            </form>
        </validation-observer>
        </div>
    </div>
    </v-app>
</template>
<script>
    import { required, digits, email, max, regex } from 'vee-validate/dist/rules'
    import { extend, ValidationObserver, ValidationProvider, setInteractionMode } from 'vee-validate'
    
    setInteractionMode('eager')

    extend('digits', {
    ...digits,
    message: '{_field_} needs to be {length} digits. ({_value_})',
    })

    extend('required', {
    ...required,
    message: '{_field_} can not be empty',
    })

    extend('max', {
    ...max,
    message: '{_field_} may not be greater than {length} characters',
    })

    extend('regex', {
    ...regex,
    message: '{_field_} {_value_} does not match {regex}',
    })

    extend('email', {
    ...email,
    message: 'Email must be valid',
    })

    export default {
        name: 'InscriptionStudent',
        components: {
        ValidationProvider,
        ValidationObserver,
    },
    data: () => ({
      matricule: '',
      photo: '',
      name: '',
      niveau: '',
      parcours: '',
      phoneNumber: '',
      email: '',
      sexe: null,
      naissance: '',
      items_niveau: [
        'L1',
        'L2',
        'L3',
        'M1',
        'M2'
      ],
      items_parcours: [
        'GB',
        'SR',
        'IG'
      ],
      items_sexe: [
        'Féminin',
        'Masculin'
      ]
    }),

    methods: {
      submit () {
        this.$refs.observer.validate()
      },
      clear () {
        this.matricule = ''
        this.photo = ''
        this.name = ''
        this.niveau = null
        this.parcours = null
        this.phoneNumber = ''
        this.email = ''
        this.sexe = null
        this.naissance = ''
        this.$refs.observer.reset()
      },
    },
  }
</script>
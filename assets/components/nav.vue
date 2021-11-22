<!-- left navigation  -->
        <div class="row">
          <div class="col-lg-3">
            <v-navigation-drawer v-model="drawer" bottom temporary  style="background: lightgray;">
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
                    <v-list-item-title> LOGOUT </v-list-item-title>
                  </v-list-item>
                </v-list-item-group>
              </v-list>
            </v-navigation-drawer>
          </div>
          <div class="col-lg-9">
            
          </div>
        </div>
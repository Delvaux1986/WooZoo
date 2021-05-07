<template>
  <app-Layout>
    <div class="container w-80">
      <h2 class="text-center mb-2">Récapitulatif Repas</h2>
      <!-- SPECIES TABLE  -->
      <table class="table text-center table-bordered">
        <thead class="table-dark w-80">
          <tr>
            <th>#</th>
            <th>Famille</th>
            <th>Type de nourriture</th>
            <th>H - Repas Espèce Matin</th>
            <th>Nourris Matin</th>
            <th>H - Repas Espèce Soir</th>
            <th>Nourris Soir</th>
            <!-- <th>Enclos</th> -->
          </tr>
        </thead>
        <tbody v-for="specie in this.species" :key="specie.id">
          <tr>
            <td>
              <a :href="route('species.show', specie)">{{ specie.id }}</a>
            </td>
            <td>{{ specie.family ? specie.family : "N/A" }}</td>
            <td>{{ specie.food_type ? specie.food_type : "N/A" }}</td>
            <td>{{ specie.lunchtime ? specie.lunchtime.substr(0, 5) : "N/A" }}</td>
            <td>
              <div class="form-check form-switch d-flex justify-content-center">
                <input
                  v-if="specie.feedSpecie === 1"
                  class="form-check-input"
                  type="checkbox"
                  id="specieFirstLunchtime"
                  checked
                  :v-model="specieFirstLunchtime"
                  @change="changeFirstLunchtime(specie)"
                />
                <input
                  v-else
                  class="form-check-input"
                  type="checkbox"
                  id="specieFirstLunchtime"
                  :v-model="specieFirstLunchtime"
                  @change="changeFirstLunchtime(specie)"
                />
              </div>
            </td>
            <td>{{ specie.lunchtimeTwo ? specie.lunchtimeTwo.substr(0, 5) : "N/A" }}</td>
            <td>
              <div class="form-check form-switch d-flex justify-content-center">
                <input
                  v-if="specie.feedSpecieTwo"
                  class="form-check-input"
                  type="checkbox"
                  id="specieSecondLunchtime"
                  checked
                  :v-model="specieSecondLunchtime"
                  @change="changeSecondLunchtime(specie)"
                />
                <input
                  v-else
                  class="form-check-input"
                  type="checkbox"
                  id="specieSecondLunchtime"
                  :v-model="specieSecondLunchtime"
                  @change="changeSecondLunchtime(specie)"
                />
              </div>
            </td>
            <!-- <td v-if="specie.specie_enclosure[0].enclosure">
              {{ specie.specie_enclosure[0].enclosure ? specie.specie_enclosure[0].enclosure.name : "N/A" }}
            </td> -->
            <!-- <td v-else>N/A</td> -->
          </tr>
        </tbody>
        <!-- ANIMALS TABLE  -->
      </table>
      <h2 class="text-center mb-2">Récapitulatif Animaux</h2>
      <table class="table text-center table-bordered">
        <thead class="table-dark w-80">
          <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Famille</th>
            <th>H - Repas Individu</th>
            <th>Nourris</th>
            <th>Régime Spécial</th>
          </tr>
        </thead>
        <tbody v-for="pet in this.animals" :key="pet.id">
          <tr>
            <td>
              <a :href="route('animals.show', pet)">{{ pet.id }}</a>
            </td>
            <td>{{ pet.name }}</td>
            <td>{{ pet.specie ? pet.specie.family : "N/A" }}</td>
            <td>{{ pet.lunchtime ? pet.lunchtime.substr(0, 5) : "N/A" }}</td>
            <td>
              <div class="form-check form-switch d-flex justify-content-center">
                <input
                  v-if="pet.feeds === 1"
                  class="form-check-input"
                  type="checkbox"
                  id="flexSwitchCheckChecked"
                  checked
                  :v-model="petFeed"
                  @change="changePetFeed(pet)"
                />
                <input
                  v-else
                  class="form-check-input"
                  type="checkbox"
                  id="flexSwitchCheckChecked"
                  :v-model="petFeed"
                  @change="changePetFeed(pet)"
                />
              </div>
            </td>
            <td v-if="pet.special_diet">{{ pet.special_diet }}</td>
            <td v-else>{{ pet.specie.food_type}}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- USERS TABLE  -->
    <div class="container">
      <h3 class="text-center mb-2">Soigneurs</h3>
      <table class="table text-center table-bordered mt-5">
        <thead class="table-dark w-80">
          <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Rôle</th>
            <th>Tel</th>
            <th>Présent</th>
            <th>E-mail</th>
          </tr>
        </thead>
        <tbody v-for="user in this.users" :key="user.id">
          <tr>
            <td>{{ user.id }}</td>
            <td>{{ user.name }}</td>
            <td>{{ user.role }}</td>
            <td>{{ user.phone ? "0" + user.phone : "N/A" }}</td>
            <td>{{ user.worktoday ? user.worktoday : "N/A" }}</td>
            <td>{{ user.email ? user.email : "N/A" }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- ENCLOS TABLE  -->
    <div class="container">
      <h2 class="text-center mb-2">Enclos</h2>
      <table class="table text-center table-bordered mt-5">
        <thead class="table-dark w-80">
          <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Description</th>
            <!-- <th>Par</th> -->
          </tr>
        </thead>
        <tbody v-for="enclos in this.enclosures" :key="enclos.id">
          <tr>
            <td>{{ enclos.id }}</td>
            <td>{{ enclos.name }}</td>
            <td>{{ enclos.description }}</td>
            <!-- <td>{{ enclos.specie_enclosure ? enclos.specie_enclosure.length+' espèce(s) ' : "N/A" }}</td> -->
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
  </app-Layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },
  props: {
    animals: Object,
    users: Object,
    enclosures: Object,
    species: Object,
  },
  mounted() {
    console.log("Component Home mounted.");
    console.log();
  },
  data() {
    return {
      specieFirstLunchtime: [],
      specieSecondLunchtime: [],
      petFeed: [],
    };
  },
  methods: {
    // 3 METHODS FOR UPDATE FEED ON SPECIE & ANIMAL
    changeFirstLunchtime(specie) {
      if (specie.feedSpecie === 0) {
        specie.feedSpecie = 1;
      } else if (specie.feedSpecie === 1) {
        specie.feedSpecie = 0;
      }

      this.$inertia.post(
        "/species/firstLunchtime/" + specie.id + "/" + specie.feedSpecie
      );
      console.log(this.specie);
    },
    changeSecondLunchtime(specie) {
      if (specie.feedSpecieTwo === 0) {
        specie.feedSpecieTwo = 1;
      } else if (specie.feedSpecieTwo === 1) {
        specie.feedSpecieTwo = 0;
      }
      this.$inertia.post(
        "/species/secondLunchtime/" + specie.id + "/" + specie.feedSpecieTwo
      );
    },
    changePetFeed(pet) {
      console.log(pet);
      if (pet.feeds === 0) pet.feeds = 1;
      else if (pet.feeds === 1) pet.feeds = 0;
      this.$inertia.post("/animals/feeds/" + pet.id + "/" + pet.feeds);
    },
  },
};
</script>

<style>
</style>

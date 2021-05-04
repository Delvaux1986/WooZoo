<template>
    <app-Layout>
        <div class="container w-80">
                <h2 class="text-center mb-2">Récapitulatif Repas</h2>
                    <table class="table text-center table-bordered">
                        <thead class="table-dark w-80">
                            <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Espèce</th>
                            <th>Famille</th>
                            <th>H - Repas Individu</th>
                            <th>Nourris</th>
                            <th>Régime Spécial</th>
                            <th>Enclos</th>
                            </tr>
                        </thead>
                        <tbody v-for="pet in this.animals" :key="pet.id">
                            <tr>
                                <td><a :href="route('animals.show' , pet)">{{pet.id}}</a></td>
                                <td>{{pet.name}}</td>
                                <td>{{pet.specie ? pet.specie.specie : 'N/A'}}</td>
                                <td>{{pet.specie ? pet.specie.family : 'N/A'}}</td>
                                <td>{{pet.specie ? pet.specie.lunchtime : 'N/A'}}</td>
                                <td>{{ pet.feeds ? 'Fais' : 'Pas fais'}}</td>
                                <td>{{pet.special_diet ? pet.special_diet : 'N/A'}}</td>
                                <td v-if="pet.specie">{{  pet.specie.enclosure ? pet.specie.enclosure.name : 'N/A'}}</td>
                                <td v-else>N/A</td>
                                
                            </tr>
                        </tbody>
                    </table>
        </div>
        <!-- {{pet.specie.enclosure_id ? pet.specie.enclosure.name : 'N/A'}} -->
        
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
                                <td>{{user.id}}</td>
                                <td>{{user.name}}</td>
                                <td>{{user.role}}</td>
                                <td>{{user.phone ? '0'+ user.phone : 'N/A'}}</td>
                                <td>{{user.worktoday ? user.worktoday  : 'N/A'}}</td>
                                <td>{{user.email ? user.email : 'N/A'}}</td>
                                
                            </tr>
                        </tbody>
                    </table>
        </div>
        <div class="container">
            <h2 class="text-center mb-2">Enclos</h2>
                    <table class="table text-center table-bordered mt-5">
                        <thead class="table-dark w-80">
                            <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Occupé</th>
                            <th>Par</th>
                            </tr>
                        </thead>
                        <tbody v-for="enclos in this.enclosures" :key="enclos.id">
                            <tr>
                                <td>{{enclos.id}}</td>
                                <td>{{enclos.name}}</td>
                                <td>{{enclos.description}}</td>
                                <td>{{enclos.occupy ?  enclos.occupy : 'N/A'}}</td>
                                <td>{{enclos.specie ? enclos.specie.family  : 'N/A'}}</td>
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
        animals:Object,
        users:Object,
        enclosures:Object
    }
        ,
    mounted() {
        console.log("Component Home mounted.");
        // console.log(this.enclosures);
    },
    data () {
        
    },
    
  
}
</script>

<style>
    
</style>

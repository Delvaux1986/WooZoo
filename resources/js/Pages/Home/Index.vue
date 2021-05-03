<template>
    <app-Layout>
        <div class="container w-80">
                <h2 class="text-center mb-5">Animaux</h2>
                    <table class="table text-center table-bordered">
                        <thead class="table-dark w-80">
                            <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Espece</th>
                            <th>Famille</th>
                            <th>Heure manger</th>
                            <th>Nourris</th>
                            <th>Special Diet</th>
                            <th>Enclos</th>
                            </tr>
                        </thead>
                        <tbody v-for="pet in this.animals" :key="pet.id">
                            <tr>
                                <td><a :href="route('animals.show' , pet)">{{pet.id}}</a></td>
                                <td>{{pet.name}}</td>
                                <td>{{pet.specie.specie ? pet.specie.specie : 'N/A'}}</td>
                                <td>{{pet.specie.family ? pet.specie.family : 'N/A'}}</td>
                                <td>{{pet.specie.lunchtime ? pet.specie.lunchtime : 'N/A'}}</td>
                                <td>{{ pet.feeds ? 'Fais' : 'Pas fais'}}</td>
                                <td>{{pet.special_diet ? pet.special_diet : 'N/A'}}</td>
                                <td>{{pet.specie.enclosure_id ? pet.specie.enclosure.name : 'N/A' }}</td>
                                
                            </tr>
                        </tbody>
                    </table>
        </div>
        <!-- {{pet.specie.enclosure_id ? pet.specie.enclosure.name : 'N/A'}} -->
        
        <div class="container">
                <h2 class="text-center mb-5">Soigneurs</h2>
                    <table class="table text-center table-bordered mt-5">
                        <thead class="table-dark w-80">
                            <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Role</th>
                            <th>Tel</th>
                            <th>Travail Auj</th>
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
            <h2 class="text-center mb-5">Enclos</h2>
                    <table class="table text-center table-bordered mt-5">
                        <thead class="table-dark w-80">
                            <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Occuper</th>
                            <th>Par</th>
                            </tr>
                        </thead>
                        <tbody v-for="enclos in this.enclosures" :key="enclos.id">
                            <tr>
                                <td>{{enclos.id}}</td>
                                <td>{{enclos.name}}</td>
                                <td>{{enclos.description}}</td>
                                <td>{{enclos.occupy ?  enclos.occupy : 'N/A'}}</td>
                                <td>{{enclos.specie.family ? enclos.specie.family  : 'N/A'}}</td>
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
        console.log(this.enclosures);
    },
  
}
</script>

<style>
    *{
        
        font-size: 18px;
        font-weight: 500;
    }
</style>

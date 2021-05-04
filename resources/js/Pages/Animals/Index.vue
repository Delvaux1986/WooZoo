<template>
    <app-layout>
        <div class="container">
            <h2 class="text-center mb-5 ">Animaux</h2>
            <inertia-link :href="route('animals.create')" class="btn btn-outline-primary mb-3">Ajouter</inertia-link>
                <table class="table text-center table-bordered w-80">
                    <thead class="table-dark ">
                        <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Espece</th>
                        <th>Famille</th>
                        <th>Heure de manger Espece</th>
                        <th>Heure pour cet animal</th>
                        <td>Special Diet</td>
                        <td>Enclos</td>
                        <th v-if="user.role === 'Admin'">Update</th>
                        <th v-if="user.role === 'Admin'">Delete</th>
                        </tr>
                    </thead>
                    <tbody v-for="pet in this.animals" :key="pet.id">
                        <tr>
                            <td><a :href="route('animals.show' , pet)">{{pet.id}}</a></td>
                            <td>{{pet.name ? pet.name : 'N/A'}}</td>
                            <td>{{pet.specie ? pet.specie.specie : 'N/A'}}</td>
                            <td>{{pet.specie ? pet.specie.family : 'N/A'}}</td>
                            <td>{{pet.specie ? pet.specie.lunchtime : 'N/A'}}</td>
                            <td>{{ pet.lunchtime ? pet.lunchtime : 'N/A'}}</td>
                            <td>{{ pet.special_diet ? pet.special_diet : 'N/A'}}</td>
                            <td v-if="pet.specie">{{  pet.specie.enclosure ? pet.specie.enclosure.name : 'N/A'}}</td>
                            <td v-else>N/A</td>
                            <td v-if="user.role === 'Admin'"> 
                                <a :href="route('animals.edit', pet.id)">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                    
                            </td>
                            <td v-if="user.role === 'Admin'">
                                <a :href="route('animals.delete', pet.id)">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
        </div> 
    </app-layout>
</template>




<script>

import AppLayout from "./../../Layouts/AppLayout";

export default {
    components: {
        AppLayout,
        },
  
        props: {
            animals:Object,
            user : Object,
        }
        ,
    mounted() {
        console.log("Component Home mounted.");
        console.log(this.animals);
    },
  
}
</script>
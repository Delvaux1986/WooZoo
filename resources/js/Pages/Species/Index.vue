<template>
    <app-layout>
        <div class="container">
            <h2 class="text-center mb-5 ">Especes</h2>
            <!-- <inertia-link :href="route('animals.create')" class="btn btn-outline-primary mb-3">Ajouter</inertia-link> -->
                
                <table class="table text-center table-bordered w-80">
                    <thead class="table-dark ">
                        <tr>
                        <th>#</th>
                        <th>Espece</th>
                        <th>Family</th>
                        <th>Type de nourriture</th>
                        <th>Heure de manger</th>
                        <td>Enclos</td>
                        <th v-if="user.role === 'Admin'">Update</th>
                        <th v-if="user.role === 'Admin'">Delete</th>
                        </tr>
                    </thead>
                    <tbody v-for="specie in this.species" :key="specie.id">
                        <tr>
                            <td><a :href="route('species.show' , specie)">{{specie.id}}</a></td>
                             <td>{{specie.specie ? specie.specie : 'N/A'}}</td>
                            <td>{{specie.family ? specie.family : 'N/A'}}</td>
                            <td>{{ specie.food_type ? specie.food_type: 'N/A' }}</td>
                            <td>{{ specie.lunchtime ? specie.lunchtime : 'N/A'}}</td>
                            <td>{{ specie.enclosure_id ? specie.enclosure.name : 'N/A'}}</td>
                            <td v-if="user.role === 'Admin'"> 
                                <a :href="route('species.edit', specie.id)">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                    
                            </td>
                            <td v-if="user.role === 'Admin'">
                                <a href="">
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
            species:Object,
            user : Object,
        }
        ,
    mounted() {
        console.log("Component Home mounted.");
        console.log(this.species);
    },
  
}
</script>
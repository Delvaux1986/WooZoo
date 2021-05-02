<template>
    <app-layout>
        <div class="container">
            <h2 class="text-center mb-5 ">Animals</h2>
                <table class="table text-center table-bordered w-80">
                    <thead class="table-dark ">
                        <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Specie</th>
                        <th>Family</th>
                        <th>Lunch Time</th>
                        <th v-if="user.role === 'Admin'">Update</th>
                        <th v-if="user.role === 'Admin'">Delete</th>
                        </tr>
                    </thead>
                    <tbody v-for="pet in this.animals" :key="pet.id">
                        <tr>
                            <td><a :href="route('animals.show' , pet)">{{pet.id}}</a></td>
                            <td>{{pet.name}}</td>
                            <td>{{pet.specie.specie ? pet.specie.specie : 'N/A'}}</td>
                            <td>{{pet.specie.family ? pet.specie.family : 'N/A'}}</td>
                            <td>{{pet.specie.lunchtime ? pet.specie.lunchtime : 'N/A'}}</td>
                            <td v-if="user.role === 'Admin'"> 
                                <a :href="route('animals.edit', pet.id)">
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
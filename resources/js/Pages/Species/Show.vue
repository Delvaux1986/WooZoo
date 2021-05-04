<template>
    <app-Layout>
        <div class="container d-flex justify-content-center mt-5">
            <div class='card d-flex w-50 '>
            <div class="card-body">
                <div class="card-title text-center bg-dark text-info"><h5>{{ this.specie.specie }}</h5></div>
                <div class="card-body text-center">
                    <ul class="card-text list-group list-group-flush">
                        <li class="list-group-item">Espèce : {{ this.specie.specie ? this.specie.specie: 'N/A'}}</li>
                            
                        <li class="list-group-item">Famille : {{ this.specie.family ? this.specie.family : 'N/A'}}</li>
                        <li class="list-group-item">Type de nourriture : {{ this.specie.food_type ? this.specie.food_type : 'N/A'}}</li>
                        <li class="list-group-item">H - Repas Espèce : {{ this.specie.lunchtime ? this.specie.lunchtime : 'N/A'}}</li>
                        <li class="list-group-item">Enclos : {{ this.specie.enclosure.name ? this.specie.enclosure.name : 'N/A'}}</li>
                        <li class="list-group-item">Enclos Description  : {{this.specie.enclosure.description ? this.specie.enclosure.description : 'N/A'}}</li>
                    </ul>
                    <div  v-if="user.role === 'Admin'" class="d-flex justify-content-between">
                        <inertia-link :href="route('species.edit', this.specie.id)" class="btn btn-outline-warning">Editer</inertia-link>
                        <inertia-link :href="route('species.delete', this.specie.id)" class="btn btn-outline-danger">Supprimer</inertia-link>
                    </div>
                    

                </div>
            </div>
            </div>
            
                <!-- <div v-for="pet in this.specie.pets" :key="pet.id" class="">
                    <p class="text-center">  {{ pet.name ? '- '+pet.name : 'Aucun'}}</p>
                </div> -->
            
        </div>
        
    </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

    export default {
        components : {
            AppLayout
        },
    
        props: {
            specie:Object,
            user:Object,
        },
                

        mounted() {
            console.log("Component specie.show mounted.");
            console.log(this.specie);
            
        },
        
    }
    
</script>
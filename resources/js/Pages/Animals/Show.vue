<template>
    <app-Layout>
        <div class="container d-flex justify-content-center mt-5">
            <div class='card d-flex w-50 '>
            <div class="card-body">
                <div class="card-title text-center bg-dark text-info"><h5>{{ animal.name }}</h5></div>
                <div class="card-body text-center">
                    <ul class="card-text list-group list-group-flush">
                        <li class="list-group-item">Specie : {{ animal.specie.specie ? animal.specie.specie : 'N/A'}}</li>
                        <li class="list-group-item">Family : {{ animal.specie.family ? animal.specie.family : 'N/A'}}</li>
                        <li class="list-group-item">Food type : {{ animal.specie.food_type ? animal.specie.food_type : 'N/A'}}</li>
                        <li class="list-group-item">Special Diet : {{ animal.special_diet ? animal.special_diet : 'N/A'}}</li>
                        <li class="list-group-item">Lunch time : {{ animal.specie.lunchtime ? animal.specie.lunchtime : 'N/A'}}</li>
                        <li class="list-group-item">Allready feed : {{ animal.feeds ? animal.feeds : 'N/A'}}</li>
                        <li class="list-group-item">Record : {{ animal.created_at ? animal.created_at  : 'N/A'}}</li>
                        <li class="list-group-item">Healer(s) : {{ animal.user_id ? animal.user_id : 'N/A'}}</li>


                    </ul>
                    <div  v-if="user.role === 'Admin'" class="d-flex justify-content-between">
                        <inertia-link :href="route('animals.edit', animal.id)" class="btn btn-outline-warning">Edit</inertia-link>
                        
                        <button class="btn btn-outline-danger">Delete</button>
                    </div>
                    

                </div>
            </div>
            </div>
        </div>
        
    </app-layout>
</template>

<script>
import Input from '../../Jetstream/Input.vue';

import AppLayout from "./../../Layouts/AppLayout";

    export default {
        components : {
            AppLayout
        },
    
        props: {
            animal:Object,
            user:Object,
        },
                

        mounted() {
            console.log("Component animals.show mounted.");
            console.log(this.animal);
            
        },
        
    }
    
</script>

<style scoped>
    main{
        display:flex;
        justify-content: center;
    }
</style>
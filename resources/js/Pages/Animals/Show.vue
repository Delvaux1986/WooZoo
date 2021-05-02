<template>
    <app-Layout>
        <div class="container d-flex justify-content-center mt-5">
            <div class='card d-flex w-50 '>
            <div class="card-body">
                <div class="card-title text-center bg-dark text-info"><h5>{{ pet.pet.name }}</h5></div>
                <div class="card-body text-center">
                    <ul class="card-text list-group list-group-flush">
                        <li class="list-group-item">Specie : {{ pet.pet.specie.specie ? pet.pet.specie.specie : 'N/A'}}</li>
                        <li class="list-group-item">Family : {{ pet.pet.specie.family ? pet.pet.specie.family : 'N/A'}}</li>
                        <li class="list-group-item">Food type : {{ pet.pet.specie.food_type ? pet.pet.specie.food_type : 'N/A'}}</li>
                        <li class="list-group-item">Lunch time : {{ pet.pet.specie.lunchtime ? pet.pet.specie.lunchtime : 'N/A'}}</li>
                        <li class="list-group-item">Allready feed : {{ pet.pet.feeds ? pet.pet.feeds : 'N/A'}}</li>
                        <li class="list-group-item">Record : {{ pet.pet.created_at ? pet.pet.created_at  : 'N/A'}}</li>
                        <li class="list-group-item">Healer(s) : {{ pet.pet.user_id ? pet.pet.user_id : 'N/A'}}</li>


                    </ul>
                    <div  v-if="user.user.role === 'Admin'" class="d-flex justify-content-between">
                        <button class="btn btn-outline-warning">Edit</button>
                        <button class="btn btn-outline-danger">Delete</button>
                    </div>
                    

                </div>
            </div>
            </div>
        </div>
        
    </app-layout>
</template>

<script>

import AppLayout from "./../../Layouts/AppLayout";

    export default {
        components : {
            AppLayout
        },
        props: 
                ['pet' , 'user'],

        mounted() {
            console.log("Component animals.show mounted.");
            console.log(this.user.user);
            
        },
        
    }
    
</script>

<style scoped>
    main{
        display:flex;
        justify-content: center;
    }
</style>
<template>
    <app-Layout>
        <div class='card'>
            <div class="card-body">
                <div class="card-title text-center"><h5>{{ thisPet.name }}</h5></div>
                <div class="card-body">
                    <ul class="card-text text-center">
                        <li>Specie : {{ thisPet.specie.specie ? thisPet.specie.specie : 'N/A'}}</li>
                        <li>Family : {{ thisPet.specie.family ? thisPet.specie.family : 'N/A'}}</li>
                        <li>Food type : {{ thisPet.specie.food_type ? thisPet.specie.food_type : 'N/A'}}</li>
                        <li>Lunch time : {{ thisPet.specie.lunchtime ? thisPet.specie.lunchtime : 'N/A'}}</li>
                        <li>Allready feed : {{ thisPet.feeds ? thisPet.feeds : 'N/A'}}</li>
                        <li>Record : {{ thisPet.created_at ? thisPet.created_at  : 'N/A'}}</li>
                        <li>Healer(s) : {{ thisPet.user_id ? thisPet.user_id : 'N/A'}}</li>


                    </ul>

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
                ['thisPet'],

        mounted() {
            console.log("Component animals.show mounted.");
            console.log(this.thisPet);
    },
    }
</script>
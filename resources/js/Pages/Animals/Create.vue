<template>
    <app-layout>
        <div class="container">
            <h2 class="text-center text-primary">Ajouter un animal au parc</h2>
            <form action="" method="post" class="d-flex flex-column justify-content-around form-group">
                <div class="row">
                    <div class="col">
                        <label for="newAnimalName">Nom :</label>
                        <input class="form-control mb-1" id="newAnimalName" name="newAnimalName" type="text"  v-model="form.newAnimalName">
                    </div>
                    <div class="col">
                        <label for="newAnimalSpecie">Espece :</label>
                        <select class="form-control mb-1" id="newAnimalSpecie" name="newAnimalSpecie"   v-model="form.newAnimalSpecie">
                            <option v-for="specie in this.specieslist" :key="specie.id" :value="specie.id">{{ specie.specie}}</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="newAnimalFamily">Famille :</label>
                        <select class="form-control mb-1" id="newAnimalFamily" name="newAnimalFamily"   v-model="form.newAnimalFamily">
                            <option v-for="family in this.specieslist" :key="family.id" :value="family.id">{{ family.family ? family.family : 'N/A'}}</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="newAnimalLunchtime">Heure de manger :</label>
                        <input type="text" class="form-control mb-1" id="newAnimalLunchtime" name="newAnimalLunchtime" v-model="form.newAnimalLunchtime">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="newAnimalSpecialDiet">Repas particulier :</label>
                        <input type="text" class="form-control mb-1" id="newAnimalSpecialDiet" name="newAnimalSpecialDiet" v-model="form.newAnimalSpecialDiet">
                    </div>
                    <div class="col"></div>
                </div>
            </form>
        </div>

    </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";
    export default {
        components: {
            AppLayout,
        },
        props : {
            'specieslist': Object
        },
        data() {
            return {
                time:new Date(),
                form:{
                    newAnimalName : '',
                    newAnimalSpecie : '',
                    newAnimalFamily : '',
                    newAnimalLunchtime : '',
                    newAnimalSpecialDiet : ''
                }
            }
        }
    }
</script>
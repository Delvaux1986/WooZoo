<template>
<app-layout>
    <div class="container">
        <h2 class="text-center text-primary">Ajouter une éspèce au parc</h2>
        <form :action="route('species.store' )" @submit.prevent="submit" method="post" class="d-flex flex-column justify-content-around form-group">
            <div class="row">
                <div class="col">
                    <label for="newSpecieName">Espece :</label>
                    <input class="form-control mb-1" id="newSpecieName" name="newSpecieName" type="text" v-model="form.newSpecieName">
                </div>
                <div class="col">
                    <label for="newSpecieFamily">Famille :</label>
                    <input type="text" class="form-control mb-1" id="newSpecieFamily" name="newSpecieFamily" v-model="form.newSpecieFamily">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="newSpecieFoodType">Type de nourriture :</label>
                    <input type="text" class="form-control mb-1" id="newSpecieFoodType" name="newSpecieFoodType" v-model="form.newSpecieFoodType">
                </div>
                <div class="col">
                    <label for="newSpecieLunchtime">H - Repas matin :</label>
                    <input type="time" min="06:00" max="13:00" class="form-control mb-1" id="newSpecieLunchtime" name="newSpecieLunchtime" v-model="form.newSpecieLunchtime">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="newSpecieLunchtimeTwo">H - Repas soir :</label>
                    <input type="time" min="13:00" max="23:00" class="form-control mb-1" id="newSpecieLunchtimeTwo" name="newSpecieLunchtimeTwo" v-model="form.newSpecieLunchtimeTwo">
                </div>
                <div class="col">
                    <label for="newSpecieEnclosureId">Enclos :</label>
                    <select class="form-control mb-1" name="newSpecieEnclosureId" id="newSpecieEnclosureId" v-model="form.newSpecieEnclosureId">
                        <option v-for="enclos in this.enclosurelist" :key="enclos.id" :value="enclos.name">{{ enclos.name }}</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mt-5">
                    <button type="submit" value="Ajouter" class="btn btn-outline-warning">Ajouter</button>
                </div>

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
    props: {
        'enclosurelist': Object
    },
    mounted() {
        console.log('Component Species/create mounted.');
    },
    data() {
        return {
            time: new Date(),
            form: {
                newSpecieName: '',
                newSpecieFamily: '',
                newSpecieFoodType: '',
                newSpecieLunchtime: '',
                newSpecieEnclosureId: '',
                newSpecieLunchtimeTwo : '',
            }
        }
    },
    methods: {
        submit() {
            this.$inertia.post('/species/store', this.form)
        }
    }
}
</script>

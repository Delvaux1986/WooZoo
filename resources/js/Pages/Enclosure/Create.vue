<template>
<app-layout>
    <div class="container">
        <h2 class="text-center text-primary">Ajouter un animal au parc</h2>
        <form :action="route('enclosures.store' )" @submit.prevent="submit" method="post" class="d-flex flex-column justify-content-around form-group">
            <div class="row">
                <div class="col">
                    <label for="newEnclosName">Nom :</label>
                    <input class="form-control mb-1" id="newEnclosName" name="newEnclosName" type="text" v-model="form.newEnclosName">
                </div>
                <div class="col">
                    <label for="newEnclosDescription">Description :</label>
                    <input type="text" class="form-control mb-1" id="newEnclosDescription" name="newEnclosDescription" v-model="form.newEnclosDescription">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="newEnclosOccupy">Occuper :</label>
                    <select class="form-control mb-1" name="newEnclosOccupy" id="newEnclosOccupy" v-model="form.newEnclosOccupy">
                        <option value="0">Non</option>
                        <option value="1">Oui</option>
                    </select>
                </div>
                <div class="col">
                    <label for="newEnclosSpecieId">Par :</label>
                    <select class="form-control mb-1" id="newEnclosSpecieId" name="newEnclosSpecieId" v-model="form.newEnclosSpecieId">
                        <option v-for="family in this.specieslist" :key="family.id" :value="family.id">{{ family.family ? family.family : 'N/A'}}</option>
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
        'specieslist': Object
    },
    data() {
        return {
            time: new Date(),
            form: {
                newEnclosName: '',
                newEnclosDescription: '',
                newEnclosOccupy: '',
                newEnclosSpecieId: '',

            }
        }
    },
    methods: {
        submit() {
            this.$inertia.post('/enclosure/store', this.form)
        }
    }
}
</script>

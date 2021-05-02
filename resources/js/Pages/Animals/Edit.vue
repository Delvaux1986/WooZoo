<template>
    <app-layout>
        <div class="container">
            <h2 class="text-center mb-5 text-info">{{this.animal.animal.name}}</h2>
            <form @submit.prevent="submit" class="d-flex flex-column justify-content-around form-group" action="#" v-for="attr in this.animal" :key="attr.id">
                <div class="row">
                    <div class="col">
                        <label for="petName">Name :</label>
                        <input class="form-control mb-1" id="petName" name="petName" type="text" :placeholder="attr.name">
                        
                    </div>
                    <div class="col">
                        <label for="petSpecie">Specie :</label>
                            <select class="form-control mb-1" name="petSpecie" id="petSpecie" type="text" :placeholder="attr.specie.specie">
                                <option v-for="specie in this.specieslist.species" :key="specie.id" :value="specie.id">{{specie.specie}}</option>
                            </select>
                    </div>
                </div>    
                <div class="row">
                    <div class="col">
                        <label for="petFamily">Family : </label>
                    <input class="form-control mb-1" name="petFamily" id="petFamily" type="text" :placeholder="attr.specie.family">
                    </div>
                    <div class="col">
                        <label for="petLunchtime">Lunch time :</label>
                        <vue-datepicker-local v-model="attr.specie.lunchtime" clearable name="petLunchtime" format="HH:mm:ss" class="form-control mb-1">{{}} </vue-datepicker-local>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="petFeeds">Animal feed : </label>
                        <select name="petFeeds" id="petFeeds" class="form-control mb-1">
                            <option selected>Select</option>
                            <option value="0">False</option>
                            <option value="1">True</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="petHealer">Healer</label>
                        <select name="petHealer" id="petHealer" class="form-control mb-1">
                            <option v-for="healer in this.userslist.users" :key="healer.id" :value="healer.id" :v-if="healer.worktoday === 0">{{healer.name}}</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="petFoodType">Food type</label>
                        <input class="form-control mb-1" type="text" id="petFoodType" name="petFoodType" :placeholder="attr.specie.food_type">
                    </div>
                    <div class="col">
                        <label for="petEnclosure">Enclosures</label>
                        <select name="petEnclosure" id="petEnclosure" class="form-control mb-1">
                            <option>Select a enclosure</option>
                            <option v-for="enclosure in this.enclosurelist.enclosures" :key="enclosure.id" :value="enclosure.id">{{enclosure.name}}</option>
                        </select>
                        
                    </div>
                </div>
                <div class="col mt-5">
                    <div class="btn btn-outline-warning">Submit</div>
                </div>
            </form>
        </div>
        
    </app-layout>
</template>

<script>

    import AppLayout from "./../../Layouts/AppLayout";
    import VueDatepickerLocal from 'vue-datepicker-local'

    export default {
        components: {
            AppLayout,
            VueDatepickerLocal
            },
    
            props: [
                    'animal',
                    'user', 
                    'userslist',
                    'specieslist',
                    'enclosurelist',
                     ]
            ,
        mounted() {
            console.log("Component Animals.edit mounted.");
            console.log(this.enclosurelist.enclosures);
        },
        data () {
            return{
                time: new Date(),
                
            }     
        },
        methods: {
            submit(){
                //SUBMIT FORM TO UPDATE METHOD
            }
        }
  
}
</script>
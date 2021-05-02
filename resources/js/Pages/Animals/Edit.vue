<template>
    <app-layout>
        <div class="container">
            <h2 class="text-center mb-5 text-info">{{this.animal.animal.name}}</h2>
            <form class="d-flex flex-column justify-content-around form-group" action="#" v-for="attr in this.animal" :key="attr.id">
                <div class="row">
                    <div class="col">
                        <label for="petName">Name :</label>
                        <input class="form-control mb-1" id="petName" name="petName" type="text" :placeholder="attr.name">
                        
                    </div>
                    <div class="col">
                        <label for="petSpecie">Specie :</label>
                            <input class="form-control mb-1" name="petSpecie" id="petSpecie" type="text" :placeholder="attr.specie.specie">
                        
                    </div>
                </div>    
                <div class="row">
                    <div class="col">
                        <label for="petFamily">Family : </label>
                    <input class="form-control mb-1" name="petFamily" id="petFamily" type="text" :placeholder="attr.specie.family">
                    </div>
                    <div class="col">
                        <label for="petLunchtime">Lunch time :</label>
                        <vue-datepicker-local v-model="emptyTime" clearable name="petLunchtime" format="HH:mm:ss" class="form-control mb-1">{{attr.specie.lunchtime}} </vue-datepicker-local>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="petFeeds">Animal feed : </label>
                        <select name="petFeeds" id="petFeeds" class="form-control mb-1">
                            <option v-if="attr.feeds === 0" value="0">FALSE</option>
                            <option v-if="attr.feeds === 1" value="1">TRUE</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="petHealer">Healer</label>
                        <select name="petHealer" id="petHealer" class="form-control mb-1">
                            <option v-for="healer in this.userslist.users" :key="healer.id" value="{{healer.id}}">{{healer.name}}</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
                
                
                
                <input class="form-control mb-1" type="text" :placeholder="attr.feeds">
                <input class="form-control mb-1" type="text" :placeholder="attr.name">
                <input class="form-control mb-1" type="text" :placeholder="attr.name">
                <button type="btn btn-primary">Submit</button>
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
    
            props: ['animal', 'user', 'userslist']
            ,
        mounted() {
            console.log("Component Animals.edit mounted.");
            console.log(this.userslist.users);
        },
        data () {
            return{
                time: new Date(),
                
            }
            
            
            
  }
  
}
</script>
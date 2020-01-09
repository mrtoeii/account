<template>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <b-button v-b-modal.modal-1>Add</b-button>
                    <b-modal id="modal-1" title="Create Account" hide-footer>
                        <form @submit.prevent="onSubmit" enctype="multipart/form-data" ref="myForm">
                            <div class="form-group">
                                <label for="Type">Type </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="revenue" v-model="type">
                                    <label class="form-check-label" for="inlineRadio1">Revenue</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="expenses" v-model="type">
                                    <label class="form-check-label" for="inlineRadio2">Expenses</label>
                                </div>
                                <span v-if="errors.type" class="error">{{errors.type[0]}}</span>
                            </div>
                            <div class="form-group">
                                <label for="Date">Date </label>
                                 <date-pick 
                                    v-model="date"
                                    :isDateDisabled="isFutureDate"
                                 >
                                 </date-pick>
                                 <span v-if="errors.date" class="error">{{errors.date[0]}}</span>
                            </div>
                             <div class="form-group">
                                <label for="List">List</label>
                                <input type="text" class="form-control" v-model="list" >
                                <span v-if="errors.list" class="error">{{errors.list[0]}}</span>
                            </div>
                            <div class="form-group">
                                <label for="Amount">Amount</label>
                                <input type="text" class="form-control" v-model="amount">
                                <span v-if="errors.amount" class="error">{{errors.amount[0]}}</span>
                            </div>
                            <div class="form-group">
                                <label for="Description">Description</label>
                                <textarea class="form-control" rows="3" v-model="description"></textarea>
                                <span v-if="errors.description" class="error">{{errors.description[0]}}</span>
                            </div>
                            <div class="form-group">
                                <label for="">Receipt</label>
                                <input type="file" class="form-control-file" v-on:change="onImageChange">
                                <span v-if="errors.type='image'" class="error">{{errors.msg}}</span>
                            </div>
                            <div class="form-group">
                               <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </b-modal>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                     Account123
                </div>
            </div>
        </div>
    </div>


</template>
<script>
    import DatePick from 'vue-date-pick';
    import Swal from 'sweetalert2'
    import 'vue-date-pick/dist/vueDatePick.css';
    export default {
        components: {DatePick},
        data(){
            return{
                type:'',
                date:'',
                list:'',
                amount:'',
                description:'',
                receipt:'',
                errors:[]
            }
        },
        methods:{
           
            isFutureDate(date) {
                const currentDate = new Date();
                return date > currentDate;
            },
            onImageChange(e){
                this.receipt = e.target.files[0];
            },
            onSubmit:function (e){
                this.errors = []
                e.preventDefault();
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
                var data = new FormData();
                data.append('type', this.type);
                data.append('date', this.date);
                data.append('list', this.list);
                data.append('amount', this.amount);
                data.append('description', this.description);
                data.append('image', this.receipt);                
                axios.post('./account.insert',data,config) 
                .then(response => { 
                    if(response.data.status==200){
                        Swal.fire(
                            response.data.msg,
                            'Added Account',
                            'success'
                        )
                    }else if (response.data.status==500) {
                        if (response.data.type=='image') {
                            this.errors = response.data
                        }
                    }
                   
                })
                .catch(error=>{
                    if(error.response.status==422){
                        // console.log(error.response.data.errors);
                        this.errors = error.response.data.errors
                    }
                   
                });
            }
        }
    }
</script>
